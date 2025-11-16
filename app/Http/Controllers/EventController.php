<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

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
        \Log::info('Event store method called');
        \Log::info('Request data:', $request->all());

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'date' => 'required|date',
                'content' => 'required|string',
                'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'image_width' => 'nullable|integer|min:1|max:2000',
                'image_height' => 'nullable|integer|min:1|max:2000',
                'status' => 'required|in:active,inactive',
                'link' => 'nullable|url|max:500',
                'needs_countdown' => 'nullable|boolean'
            ]);

            \Log::info('Validation passed');

            if ($request->status === 'active') {
                Event::where('status', 'active')->update(['status' => 'inactive']);
            }

            if ($request->hasFile('image')) {
                \Log::info('Processing image file');
                $image = $request->file('image');
                $imagePath = null;
                
                if ($request->filled(['image_width', 'image_height'])) {
                    \Log::info('Resizing image with dimensions:', [
                        'width' => $request->image_width,
                        'height' => $request->image_height
                    ]);
                    
                    $img = Image::make($image);
                    $img->resize($request->image_width, $request->image_height, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $img->save(storage_path('app/public/events/' . $filename));
                    $imagePath = 'events/' . $filename;
                } else {
                    \Log::info('Storing image without resizing');
                    $imagePath = $image->store('events', 'public');
                }
            }
            
            $event = Event::create([
                'name' => $request->name,
                'date' => $request->date,
                'content' => $request->content,
                'image' => $imagePath,
                'status' => $request->status,
                'image_width' => $request->filled('image_width') ? $request->image_width : null,
                'image_height' => $request->filled('image_height') ? $request->image_height : null,
                'link' => $request->filled('link') ? $request->link : null,
                'needs_countdown' => $request->has('needs_countdown') // true if checked, false if unchecked
            ]);

            \Log::info('Event created successfully', ['event_id' => $event->id]);
            return redirect()->route('admin.events.index')->with('success', 'Event created successfully');

        } catch (\Exception $e) {
            \Log::error('Error in event creation: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the event: ' . $e->getMessage()]);
        }
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
            'image_width' => 'nullable|integer|min:1|max:2000',
            'image_height' => 'nullable|integer|min:1|max:2000',
            'status' => 'required|in:active,inactive',
            'link' => 'nullable|url|max:500',
            'needs_countdown' => 'nullable|boolean'
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
            'status' => $request->status,
            'link' => $request->filled('link') ? $request->link : null,
            'needs_countdown' => $request->has('needs_countdown')
        ];

        if ($request->hasFile('image')) {
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }

            $image = $request->file('image');
            if ($request->filled(['image_width', 'image_height'])) {
                $image = Image::make($image)
                    ->resize($request->image_width, $request->image_height, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                
                $filename = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $image->save(storage_path('app/public/events/' . $filename));
                $data['image'] = 'events/' . $filename;
            } else {
                $data['image'] = $request->file('image')->store('events', 'public');
            }
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
            'company' => 'required|string|max:255',
            'will_attend' => 'required|string|in:yes,no,maybe'
        ]);

        try {
            $entry = EventEntry::create([
                'event_id' => $event->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'company' => $request->company ?? '',
                'will_attend' => $request->will_attend
            ]);

            \Log::info('Registration created successfully', ['entry_id' => $entry->id]);

            try {
                // Send email notification
                Mail::raw("New event registration for {$event->name}\n\n" .
                    "Name: {$request->first_name} {$request->last_name}\n" .
                    "Email: {$request->email}\n" .
                    "Phone: {$request->phone_number}\n" .
                    "Company: " . ($request->company ?? 'Not provided') . "\n" .
                    "Will Attend: " . ($request->will_attend), 
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
        } catch (\Exception $e) {
            \Log::error('Error in registration creation: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the registration: ' . $e->getMessage()]);
        }
    }

    public function entries($id)
    {
        $event = Event::findOrFail($id);
        $entries = $event->entries()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.events.entries', compact('event', 'entries'));
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
                    $entry->will_attend,
                    $entry->created_at->format('Y-m-d H:i:s')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
