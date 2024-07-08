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
                            ->when(request()->query('search','') != '', function ($query) {
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
        ]);

        $application = new BeneficiaryApplication;
        $application->name = $request->name;
        $application->email = $request->email;
        $application->contact_number = $request->contact_number;
        $application->area_of_residence = $request->area_of_residence;
        $application->purpose_of_application = $request->purpose_of_application;
        $application->programme = $request->programme;
        $application->save();
        return back()->with('success', 'Application Created');
    }


    public function destroy($id)
    {
        $application = BeneficiaryApplication::find($id);
        $application->delete();
        return back()->with('success', 'Application Deleted');
    }
}
