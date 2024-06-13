<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnerApplication;

class PartnerApplicationController extends Controller
{

    public function index()
    {
        $applications = PartnerApplication::latest()->paginate(15);
        return view('admin.application.partner.index')
            ->with('applications', $applications);
    }

    public function show($id)
    {
        $application = PartnerApplication::find($id);
        return view('admin.application.partner.show')
            ->with('application', $application);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string',
            'area_of_residence' => 'required|string',
            'purpose_of_application' => 'string',
        ]);

        $application = new PartnerApplication;
        $application->name = $request->name;
        $application->email = $request->email;
        $application->contact_number = $request->contact_number;
        $application->area_of_residence = $request->area_of_residence;
        $application->purpose_of_application = $request->purpose_of_application;
        $application->save();
        return back()->with('success', 'Application Submitted Successfully');
    }


    public function destroy($id)
    {
        $application = PartnerApplication::find($id);
        $application->delete();
        return back()->with('success', 'Application Deleted');
    }
}
