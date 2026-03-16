<?php

namespace App\Http\Controllers;


use App\Models\BeneficiaryApplication;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class BeneficiaryApplicationController extends Controller
{
    public function index()
    {
        $applications = BeneficiaryApplication::query()
            ->when(request()->query('search', '') != '', function ($query) {
                $query->where('name', 'like', '%' . request()->query('search') . '%');
                $query->orWhere('email', 'like', '%' . request()->query('search') . '%');
                $query->orWhere('contact_number', 'like', '%' . request()->query('search') . '%');
                return $query;
            })->latest()
            ->paginate(20);

        return view('admin.application.beneficiary.index')
            ->with('applications', $applications)
            ->with('programmeMapping', BeneficiaryApplication::getProgrammeMapping());
    }

    public function show($id)
    {
        $application = BeneficiaryApplication::find($id);
        return view('admin.application.beneficiary.show')
            ->with('application', $application)
            ->with('programmeMapping', BeneficiaryApplication::getProgrammeMapping());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string',
            'area_of_residence' => 'required|string',
            'purpose_of_application' => 'string',
            'programme' => 'required|numeric',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string',
            'state_of_origin' => 'nullable|string',
            'father_occupation' => 'nullable|string',
            'mother_occupation' => 'nullable|string',
            'school_name' => 'nullable|string',
            'class_grade' => 'nullable|string',
            'beneficiary_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $application = new BeneficiaryApplication;
        $application->name = $request->name;
        $application->email = $request->email;
        $application->contact_number = $request->contact_number;
        $application->area_of_residence = $request->area_of_residence;
        $application->purpose_of_application = $request->purpose_of_application;
        $application->programme = $request->programme;
        $application->date_of_birth = $request->date_of_birth;
        $application->gender = $request->gender;
        $application->state_of_origin = $request->state_of_origin;
        $application->father_occupation = $request->father_occupation;
        $application->mother_occupation = $request->mother_occupation;
        $application->school_name = $request->school_name;
        $application->class_grade = $request->class_grade;

        if ($request->hasFile('beneficiary_image')) {
            $imagePath = $request->file('beneficiary_image')
                ->store('beneficiaries', 'public');
            $application->beneficiary_image = $imagePath;
        }

        $application->save();

        try {
            \Illuminate\Support\Facades\Notification::route('mail', env('MAIL_ADMIN_ADDRESS'))
                ->notify(new \App\Notifications\AppEvent([
                    'action' => "New beneficiary application",
                    'link' => '/admin/beneficiaries',
                ]));
        } catch (\Exception $e) {
            \Log::error('Error sending beneficiary application notification: ' . $e->getMessage());
        }

        return back()->with('success', 'Application Created');
    }


    public function destroy($id)
    {
        $application = BeneficiaryApplication::find($id);
        $application->delete();
        return back()->with('success', 'Application Deleted');
    }
}
