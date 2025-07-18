<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SummerSchool;
use App\Models\SummerSchoolVolunteerEntry;
use Illuminate\Http\Request;

class SummerSchoolEntryController extends Controller
{
    public function entries($programId)
    {
        $program = SummerSchool::findOrFail($programId);
        $entries = $program->volunteerEntries()->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.summer-school.entries', compact('program', 'entries'));
    }

    public function downloadCsv($programId)
    {
        $program = SummerSchool::findOrFail($programId);
        $entries = $program->volunteerEntries()->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=summer_school_volunteers.csv',
        ];

        $callback = function() use ($entries, $program) {
            $file = fopen('php://output', 'w');
            // Add headers
            fputcsv($file, [
                'First Name',
                'Last Name',
                'Email',
                'Phone Number',
                'Profession',
                'Preferred Locations',
                'Volunteering With',
                'T-shirt Size',
                'Available Dates',
                'Date Registered'
            ]);
            // Add data rows
            foreach ($entries as $entry) {
                fputcsv($file, [
                    $entry->first_name,
                    $entry->last_name,
                    $entry->email,
                    $entry->phone_number,
                    $entry->profession,
                    implode('; ', json_decode($entry->preferred_locations, true)),
                    $entry->volunteering_with,
                    $entry->tshirt_size,
                    $entry->available_dates,
                    $entry->created_at->format('Y-m-d H:i:s')
                ]);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}
