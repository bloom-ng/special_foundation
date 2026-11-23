<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::with('accreditation')->orderBy('category', 'asc')->ordered()->get();

        return view('admin.awards.index', compact('awards'));
    }

    public function create()
    {
        return view('admin.awards.create', [
            'accreditations' => Accreditation::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateAward($request);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('awards', 'public');
        } else {
            unset($validated['image']);
        }

        Award::create($validated);

        return redirect()->route('admin.awards.index')->with('success', 'Award created successfully');
    }

    public function edit(Award $award)
    {
        return view('admin.awards.edit', [
            'award' => $award,
            'accreditations' => Accreditation::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Award $award)
    {
        $validated = $this->validateAward($request);

        if ($request->hasFile('image')) {
            if ($award->image && Storage::disk('public')->exists($award->image)) {
                Storage::disk('public')->delete($award->image);
            }
            $validated['image'] = $request->file('image')->store('awards', 'public');
        } else {
            unset($validated['image']);
        }

        $award->update($validated);

        return redirect()->route('admin.awards.index')->with('success', 'Award updated successfully');
    }

    public function destroy(Award $award)
    {
        if ($award->image && Storage::disk('public')->exists($award->image)) {
            Storage::disk('public')->delete($award->image);
        }

        $award->delete();

        return redirect()->route('admin.awards.index')->with('success', 'Award deleted successfully');
    }

    /**
     * @return array<string, mixed>
     */
    private function validateAward(Request $request): array
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'nullable|string|max:10',
            'category' => ['required', Rule::in(array_keys(Award::getCategories()))],
            'recognition' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:2048',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',
            'accreditation_id' => 'nullable|exists:accreditations,id',
            'status' => 'required|in:active,inactive',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        return $validated;
    }
}
