<?php

namespace App\Http\Controllers;

use App\Models\SummerSchoolWaitlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class SummerSchoolWaitlistController extends Controller
{
    public function index()
    {
        $entries = SummerSchoolWaitlist::query()
            ->when(request()->query('search', '') != '', function ($query) {
                $search = request()->query('search');

                $query->where(function ($q) use ($search) {
                    $q->where('centre_name', 'like', '%' . $search . '%')
                        ->orWhere('contact_person', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('contact_number', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(20);

        return view('admin.summer-school-waitlist.index', compact('entries'));
    }

    public function show($id)
    {
        $entry = SummerSchoolWaitlist::findOrFail($id);

        return view('admin.summer-school-waitlist.show', compact('entry'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'centre_name' => 'required|string',
            'contact_person' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string',
            'location' => 'required|string',
            'state' => 'required|string',
            'lga' => 'required|string',
            'number_of_children' => 'nullable|integer|min:1',
            'age_class_range' => 'nullable|string',
            'education_status' => 'nullable|array',
            'education_status.*' => [Rule::in(SummerSchoolWaitlist::getEducationStatuses())],
            'participation_type' => 'nullable|array',
            'participation_type.*' => [Rule::in(SummerSchoolWaitlist::getParticipationTypes())],
            'reason_for_consideration' => 'nullable|string',
            'additional_information' => 'nullable|string',
        ]);

        SummerSchoolWaitlist::create($data);

        try {
            \Illuminate\Support\Facades\Notification::route('mail', env('MAIL_ADMIN_ADDRESS'))
                ->notify(new \App\Notifications\AppEvent([
                    'action' => "New summer school waitlist entry",
                    'link' => '/admin/summer-school-waitlist',
                ]));
        } catch (\Exception $e) {
            Log::error('Error sending summer school waitlist notification: ' . $e->getMessage());
        }

        return back()->with('success', 'Thank you! You have been added to the waitlist.');
    }

    public function destroy($id)
    {
        $entry = SummerSchoolWaitlist::findOrFail($id);
        $entry->delete();

        return back()->with('success', 'Waitlist Entry Deleted');
    }
}
