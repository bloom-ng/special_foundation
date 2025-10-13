<?php

namespace App\Http\Controllers;

use App\Models\MediaMention;
use Illuminate\Http\Request;

class MediaMentionController extends Controller
{
    public function index()
    {
        $mentions = MediaMention::query()
            ->when(request()->query('search', '') !== '', function ($query) {
                $query->where('title', 'like', '%' . request()->query('search') . '%');
            })
            ->latest()
            ->paginate();

        return view('admin.media-mentions.index', compact('mentions'));
    }

    public function create()
    {
        return view('admin.media-mentions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:2048'],
        ]);

        MediaMention::create($validated);

        return redirect('/admin/media-mentions')->with('success', 'Media mention added');
    }

    public function edit(MediaMention $mediaMention)
    {
        return view('admin.media-mentions.edit', ['mention' => $mediaMention]);
    }

    public function update(Request $request, MediaMention $mediaMention)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:2048'],
        ]);

        $mediaMention->update($validated);

        return redirect('/admin/media-mentions')->with('success', 'Media mention updated');
    }

    public function destroy(MediaMention $mediaMention)
    {
        $mediaMention->delete();
        return redirect('/admin/media-mentions')->with('success', 'Media mention deleted');
    }
}
