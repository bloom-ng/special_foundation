<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        if ($request->status === 'active') {
            // Set all other events to inactive
            Event::where('status', 'active')->update(['status' => 'inactive']);
        }

        $imagePath = $request->file('image')->store('events', 'public');
        
        Event::create([
            'name' => $request->name,
            'date' => $request->date,
            'content' => $request->content,
            'image' => $imagePath,
            'status' => $request->status
        ]);

        return redirect('/admin/events')->with('success', 'Event created successfully');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        if ($request->status === 'active') {
            // Set all other events to inactive
            Event::where('id', '!=', $event->id)
                 ->where('status', 'active')
                 ->update(['status' => 'inactive']);
        }

        $data = [
            'name' => $request->name,
            'date' => $request->date,
            'content' => $request->content,
            'status' => $request->status
        ];

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);

        return redirect('/admin/events')->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event)
    {
        // Delete the image if it exists
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();
        return redirect('/admin/events')->with('success', 'Event deleted successfully');
    }

    public function showRegistration(Event $event)
    {
        if (!$event || $event->status !== 'active') {
            return redirect('/')->with('error', 'This event is not currently active.');
        }
        return view('events.register', compact('event'));
    }

    public function submitRegistration(Request $request, $eventId)
    {
        $event = Event::find($eventId);
        
        if (!$event || $event->status !== 'active') {
            return redirect('/')->with('error', 'This event is not currently active.');
        }

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'will_attend' => 'required|boolean'
        ]);

        $entry = EventEntry::create([
            'event_id' => $event->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'company' => $request->company ?? '',
            'will_attend' => $request->will_attend
        ]);

        try {
            // Send email notification
            Mail::raw("New event registration for {$event->name}\n\n" .
                "Name: {$request->first_name} {$request->last_name}\n" .
                "Email: {$request->email}\n" .
                "Phone: {$request->phone_number}\n" .
                "Company: " . ($request->company ?? 'Not provided') . "\n" .
                "Will Attend: " . ($request->will_attend ? 'Yes' : 'No'), 
                function($message) use ($event) {
                    $message->to('info@specialfoundation.com')
                            ->subject("New Registration for {$event->name}");
                }
            );
        } catch (\Exception $e) {
            // If email fails, still return success since registration was saved
            \Log::error('Failed to send registration email: ' . $e->getMessage());
        }

        return redirect('/')->with('success', 'Thank you for registering for the event!');
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
