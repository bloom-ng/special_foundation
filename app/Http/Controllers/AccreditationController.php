<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccreditationController extends Controller
{
    public function index()
    {
        $accreditations = Accreditation::latest()->get();
        return view('admin.accreditations.index', compact('accreditations'));
    }

    public function create()
    {
        return view('admin.accreditations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:4096',
            'status' => 'required|in:active,inactive',
        ]);

        $imagePath = $request->file('image')->store('accreditations', 'public');

        Accreditation::create([
            'name' => $validated['name'],
            'image' => $imagePath,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.accreditations.index')->with('success', 'Accreditation created successfully');
    }

    public function edit(Accreditation $accreditation)
    {
        return view('admin.accreditations.edit', compact('accreditation'));
    }

    public function update(Request $request, Accreditation $accreditation)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:4096',
            'status' => 'required|in:active,inactive',
        ]);

        $data = [
            'name' => $validated['name'],
            'status' => $validated['status'],
        ];

        if ($request->hasFile('image')) {
            if ($accreditation->image && Storage::disk('public')->exists($accreditation->image)) {
                Storage::disk('public')->delete($accreditation->image);
            }
            $data['image'] = $request->file('image')->store('accreditations', 'public');
        }

        $accreditation->update($data);

        return redirect()->route('admin.accreditations.index')->with('success', 'Accreditation updated successfully');
    }

    public function destroy(Accreditation $accreditation)
    {
        if ($accreditation->image && Storage::disk('public')->exists($accreditation->image)) {
            Storage::disk('public')->delete($accreditation->image);
        }
        $accreditation->delete();
        return redirect()->route('admin.accreditations.index')->with('success', 'Accreditation deleted successfully');
    }
}
