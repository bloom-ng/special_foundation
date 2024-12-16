<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volunteer;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::query()
        ->when(request()->query('search','') != '', function ($query) {
            $query->where('full_name', 'like', '%' . request()->query('search') . '%');
            $query->orWhere('email', 'like', '%' . request()->query('search') . '%');
            $query->orWhere('contact_number', 'like', '%' . request()->query('search') . '%');
            $query->orWhere('gender', 'like', '%' . request()->query('search') . '%');
            return $query;
        })->latest()->paginate(20);

        return view('admin.volunteer.index')
            ->with('genderMapping', Volunteer::getGenderMapping())
            ->with('volunteers', $volunteers);
    }

    public function show($id)
    {
        $volunteer = Volunteer::find($id);

        return view('admin.volunteer.show')
            ->with('volunteer', $volunteer)
            ->with('sourceMapping', Volunteer::getSourceMapping())
            ->with('genderMapping', Volunteer::getGenderMapping())
            ->with('availabilityMapping', Volunteer::getAvailabilityMapping())
            ->with('interestMapping', Volunteer::getInterestMapping())
            ->with("timesPerWeekMapping", Volunteer::getTimesPerWeekMapping())
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
            'availability*' => 'required',
            'specify_time' => 'nullable',
            'specify_time_to' => 'nullable',
            'times_per_week_month' => 'nullable',
            'other' => 'nullable',
            'interests*' => 'nullable',
            'religious_affirmation' => 'nullable',
            'source' => 'string',
        ]);

        $from = $request->specify_time ?? "00:00";
        $to = $request->specify_time_to ?? "00:00";
        $availability = [$request->availability];

        $volunteer = new Volunteer;
        $volunteer->full_name = $request->full_name;
        $volunteer->email = $request->email;
        $volunteer->gender = $request->gender;
        $volunteer->contact_number = $request->contact_number;
        $volunteer->area_of_residence = $request->area_of_residence;
        $volunteer->availability = json_encode($availability);
        $volunteer->specify_time = $from . " - " . $to;
        $volunteer->times_per_week_month = $request->times_per_week_month ?? "";
        $volunteer->other = $request->other ?? "";
        $volunteer->interests = json_encode($request->interests) ?? "";
        $volunteer->religious_affirmation = $request->religious_affirmation ?? "";
        $volunteer->source = $request->source ?? Volunteer::SOURCE_OTHER;
        $volunteer->save();

        try {
            \Illuminate\Support\Facades\Notification::route('mail', env('MAIL_ADMIN_ADDRESS'))
                ->notify(new \App\Notifications\AppEvent([
                'action' => "New volunteer application",
                'link' => '/admin/volunteers',
            ]));
        } catch (\Exception $e) {
            \Log::error('Error sending volunteer application notification: ' . $e->getMessage());
        }

        return back()->with('success', 'Submitted Successfully');
    }


    public function destroy($id)
    {
        $volunteer = Volunteer::find($id);
        $volunteer->delete();
        return back()->with('success', 'Volunteer Application Deleted');
    }
}
