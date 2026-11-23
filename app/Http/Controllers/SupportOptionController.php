<?php

namespace App\Http\Controllers;

use App\Models\SupportOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SupportOptionController extends Controller
{
    public function index()
    {
        $options = SupportOption::orderBy('group', 'asc')->ordered()->get();

        return view('admin.support-options.index', compact('options'));
    }

    public function create()
    {
        return view('admin.support-options.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateOption($request);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('support-options', 'public');
        }

        SupportOption::create($validated);

        return redirect()->route('admin.support-options.index')->with('success', 'Card created successfully');
    }

    public function edit(SupportOption $supportOption)
    {
        return view('admin.support-options.edit', ['option' => $supportOption]);
    }

    public function update(Request $request, SupportOption $supportOption)
    {
        $validated = $this->validateOption($request);

        if ($request->hasFile('image')) {
            if ($supportOption->image && Storage::disk('public')->exists($supportOption->image)) {
                Storage::disk('public')->delete($supportOption->image);
            }
            $validated['image'] = $request->file('image')->store('support-options', 'public');
        } else {
            unset($validated['image']);
        }

        $supportOption->update($validated);

        return redirect()->route('admin.support-options.index')->with('success', 'Card updated successfully');
    }

    public function destroy(SupportOption $supportOption)
    {
        if ($supportOption->image && Storage::disk('public')->exists($supportOption->image)) {
            Storage::disk('public')->delete($supportOption->image);
        }

        $supportOption->delete();

        return redirect()->route('admin.support-options.index')->with('success', 'Card deleted successfully');
    }

    public function toggle(SupportOption $supportOption)
    {
        $supportOption->status = $supportOption->status === 'active' ? 'inactive' : 'active';
        $supportOption->save();

        return back()->with(
            'success',
            $supportOption->title . ' is now ' . ($supportOption->status === 'active' ? 'shown on' : 'hidden from') . ' the page'
        );
    }

    private function validateOption(Request $request): array
    {
        $validated = $request->validate([
            'group' => ['required', Rule::in(array_keys(SupportOption::getGroups()))],
            'title' => 'required|string|max:255',
            'body' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',
            'button_label' => 'required|string|max:120',
            'button_url' => 'required|string|max:2048',
            'secondary_label' => 'nullable|string|max:120',
            'secondary_url' => 'nullable|string|max:2048',
            'track_id' => 'nullable|string|max:64',
            'status' => 'required|in:active,inactive',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        return $validated;
    }
}
