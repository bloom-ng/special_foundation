<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SummerSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SummerSchoolController extends Controller
{
    public function index()
    {
        $programs = SummerSchool::latest()->get();
        return view('admin.summer-school.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.summer-school.create');
    }

    public function store(Request $request)
    {
        // Decode volunteer_locations JSON string to array for validation
        if ($request->has('volunteer_locations') && is_string($request->volunteer_locations)) {
            $request->merge([
                'volunteer_locations' => json_decode($request->volunteer_locations, true) ?? []
            ]);
        }
        $validated = $request->validate([
            'banner' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'volunteer_locations' => 'required|array|min:1',
            'volunteer_locations.*' => 'string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->status === 'active') {
            SummerSchool::where('status', 'active')->update(['status' => 'inactive']);
        }

        $bannerPath = $request->file('banner')->store('summer-school', 'public');

        $program = SummerSchool::create([
            'banner' => $bannerPath,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'volunteer_locations' => json_encode($request->volunteer_locations),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.summer-school.index')->with('success', 'Summer School program created successfully');
    }

    public function edit(SummerSchool $program)
    {
        return view('admin.summer-school.edit', compact('program'));
    }

    public function update(Request $request, SummerSchool $program)
    {
        // Decode volunteer_locations JSON string to array for validation
        if ($request->has('volunteer_locations') && is_string($request->volunteer_locations)) {
            $request->merge([
                'volunteer_locations' => json_decode($request->volunteer_locations, true) ?? []
            ]);
        }
        $validated = $request->validate([
            'banner' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'volunteer_locations' => 'required|array|min:1',
            'volunteer_locations.*' => 'string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->status === 'active') {
            SummerSchool::where('id', '!=', $program->id)
                ->where('status', 'active')
                ->update(['status' => 'inactive']);
        }

        $data = [
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'volunteer_locations' => json_encode($request->volunteer_locations),
            'status' => $request->status,
        ];

        if ($request->hasFile('banner')) {
            if ($program->banner && Storage::disk('public')->exists($program->banner)) {
                Storage::disk('public')->delete($program->banner);
            }
            $data['banner'] = $request->file('banner')->store('summer-school', 'public');
        }

        $program->update($data);

        return redirect()->route('admin.summer-school.index')->with('success', 'Summer School program updated successfully');
    }

    public function destroy(SummerSchool $program)
    {
        if ($program->banner && Storage::disk('public')->exists($program->banner)) {
            Storage::disk('public')->delete($program->banner);
        }
        $program->delete();
        return redirect()->route('admin.summer-school.index')->with('success', 'Summer School program deleted successfully');
    }

    public function showRegistration(SummerSchool $program)
    {
        if (!$program || $program->status !== 'active') {
            return redirect('/')->with('error', 'This summer school program is not currently active.');
        }
        return view('summer-school.register', compact('program'));
    }

    public function submitRegistration(Request $request, $programId)
    {
        $program = SummerSchool::find($programId);
        if (!$program || $program->status !== 'active') {
            return redirect('/')->with('error', 'This summer school program is not currently active.');
        }
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'profession' => 'required|string|max:255',
            'preferred_locations' => 'required|array|min:1',
            'preferred_locations.*' => 'string|max:255',
            'volunteering_with' => 'nullable|string',
            'tshirt_size' => 'required|in:XS,S,M,L,XL,XXL',
            'available_dates' => 'required|string',
        ]);
        try {
            $entry = \App\Models\SummerSchoolVolunteerEntry::create([
                'summer_school_id' => $program->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'profession' => $request->profession,
                'preferred_locations' => json_encode($request->preferred_locations),
                'volunteering_with' => $request->volunteering_with,
                'tshirt_size' => $request->tshirt_size,
                'available_dates' => $request->available_dates,
            ]);
            return redirect('/')->with('success', 'Thank you for signing up as a volunteer!');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'An error occurred while submitting your registration: ' . $e->getMessage()]);
        }
    }
}
