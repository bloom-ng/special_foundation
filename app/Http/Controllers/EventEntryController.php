<?php

namespace App\Http\Controllers;

use App\Models\EventEntry;
use Illuminate\Http\Request;

class EventEntryController extends Controller
{
    public function index()
    {
        $entries = EventEntry::with('event')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.event-entries.index', compact('entries'));
    }

    public function downloadCsv()
    {
        $entries = EventEntry::with('event')->get();
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=event_entries.csv',
        ];

        $callback = function() use ($entries) {
            $file = fopen('php://output', 'w');
            
            // Add headers
            fputcsv($file, [
                'Event Name',
                'First Name',
                'Last Name',
                'Email',
                'Phone Number',
                'Company',
                'Will Attend',
                'Registration Date'
            ]);

            // Add data rows
            foreach ($entries as $entry) {
                fputcsv($file, [
                    $entry->event ? $entry->event->name : 'Event Deleted',
                    $entry->first_name,
                    $entry->last_name,
                    $entry->email,
                    $entry->phone_number,
                    $entry->company ?: 'Not provided',
                    $entry->will_attend ? 'Yes' : 'No',
                    $entry->created_at->format('Y-m-d H:i:s')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
