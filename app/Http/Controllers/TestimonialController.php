<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'quote' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = $request->file('image')->store('testimonials', 'public');

        $testimonial = Testimonial::create([
            'name' => $validated['name'],
            'role' => $validated['role'] ?? null,
            'quote' => $validated['quote'],
            'image' => $imagePath,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'quote' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $data = [
            'name' => $validated['name'],
            'role' => $validated['role'] ?? null,
            'quote' => $validated['quote'],
            'status' => $validated['status'],
        ];

        if ($request->hasFile('image')) {
            if ($testimonial->image && Storage::disk('public')->exists($testimonial->image)) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image && Storage::disk('public')->exists($testimonial->image)) {
            Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully');
    }
}
