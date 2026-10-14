<?php

namespace App\Http\Controllers;

use App\Models\MentorshipInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class MentorshipInterestController extends Controller
{
    public function index()
    {
        $interests = MentorshipInterest::query()
            ->when(request()->query('search', '') != '', function ($query) {
                $search = request()->query('search');

                $query->where(function ($q) use ($search) {
                    $q->where('organisation_name', 'like', '%' . $search . '%')
                        ->orWhere('contact_person', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('contact_number', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(20);

        return view('admin.mentorship-interest.index', compact('interests'));
    }

    public function show($id)
    {
        $interest = MentorshipInterest::findOrFail($id);

        return view('admin.mentorship-interest.show', compact('interest'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'organisation_name' => 'required|string',
            'contact_person' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string',
            'location' => 'required|string',
            'lga' => 'required|string',
            'number_of_students' => 'nullable|integer|min:1',
            'age_class_range' => 'nullable|string',
            'support_areas' => 'nullable|array',
            'support_areas.*' => [Rule::in(MentorshipInterest::getSupportAreas())],
            'support_area_other' => 'nullable|string',
            'session_goals' => 'nullable|string',
            'additional_information' => 'nullable|string',
        ]);

        if (! in_array(MentorshipInterest::SUPPORT_AREA_OTHER, $data['support_areas'] ?? [], true)) {
            $data['support_area_other'] = null;
        }

        MentorshipInterest::create($data);

        try {
            \Illuminate\Support\Facades\Notification::route('mail', env('MAIL_ADMIN_ADDRESS'))
                ->notify(new \App\Notifications\AppEvent([
                    'action' => "New mentorship/career day interest",
                    'link' => '/admin/mentorship-interests',
                ]));
        } catch (\Exception $e) {
            Log::error('Error sending mentorship interest notification: ' . $e->getMessage());
        }

        return back()->with('success', 'Thank you for your interest! We will get back to you shortly.');
    }

    public function destroy($id)
    {
        $interest = MentorshipInterest::findOrFail($id);
        $interest->delete();

        return back()->with('success', 'Interest Deleted');
    }
}
