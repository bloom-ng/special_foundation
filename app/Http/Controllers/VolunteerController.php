<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::latest()->paginate(15);
        return view('admin.volunteer.index')
            ->with('volunteers', $volunteers);
    }

    public function show($id)
    {
        $volunteer = Volunteer::find($id);
        return view('admin.volunteer.show')
            ->with('volunteer', $volunteer)
            ->with('sourceMapping', Volunteer::getSourceMapping())
            ;
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'full_name' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string',
            'area_of_residence' => 'required|string',
            'availability' => 'required',
            'specify_time' => 'nullable',
            'times_per_week_month' => 'nullable',
            'other' => 'nullable',
            'interests' => 'nullable',
            'religious_affirmation' => 'nullable',
            'source' => 'string',
        ]);

        $volunteer = new Volunteer;
        $volunteer->full_name = $request->full_name;
        $volunteer->email = $request->email;
        $volunteer->gender = $request->gender;
        $volunteer->contact_number = $request->contact_number;
        $volunteer->area_of_residence = $request->area_of_residence;
        $volunteer->availability = $request->availability;
        $volunteer->specify_time = $request->specify_time ?? "";
        $volunteer->times_per_week_month = $request->times_per_week_month ?? "";
        $volunteer->other = $request->other ?? "";
        $volunteer->interests = $request->interests ?? "";
        $volunteer->religious_affirmation = $request->religious_affirmation ?? "";
        $volunteer->source = $request->source ?? Volunteer::SOURCE_OTHER;
        $volunteer->save();
        return back()->with('success', 'Submitted Successfully');
    }


    public function destroy($id)
    {
        $volunteer = Volunteer::find($id);
        $volunteer->delete();
        return back()->with('success', 'Volunteer Application Deleted');
    }
}
