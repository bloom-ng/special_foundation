<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date',
            'content' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->file('image')) {
            $path = $request->file('image')->store('public/events');
            $validated['image'] = Storage::url($path);
        }

        Event::create($validated);

        return redirect('/admin/events')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required|date',
            'content' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->file('image')) {
            // Delete old image
            if ($event->image) {
                Storage::delete(str_replace('/storage', 'public', $event->image));
            }
            
            $path = $request->file('image')->store('public/events');
            $validated['image'] = Storage::url($path);
        }

        $event->update($validated);

        return redirect('/admin/events')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::delete(str_replace('/storage', 'public', $event->image));
        }
        
        $event->delete();

        return redirect('/admin/events')->with('success', 'Event deleted successfully!');
    }
}
