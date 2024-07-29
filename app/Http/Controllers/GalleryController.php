<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::query()
                                ->when(request()->query('search','') != '', function ($query) {
                                    $query->where('name', 'like', '%' . request()->query('search') . '%');
                                    return $query;
                                })
                                ->latest()
                                ->paginate();

        return view('admin.gallery.index', ['galleries' => $galleries]);
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', ['gallery' => $gallery]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable',

           
        ]);
        
        $gallery = new Gallery;
        if ($request->hasFile('doc')) {
            $url = $request->file('doc');
            $path = $request->file('doc')->storeAs('public/galleries', rand(1000,9999) .  $url->getClientOriginalName());
            $gallery->url = $path;
        }
        $gallery->title = $request->title ?? '...';
        $gallery->type = $request->type;
        $gallery->value = $request->value;
        $gallery->save();

        return back()->with('success', 'Media Added');
        
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'nullable',
            
        ]);
        
        if ($request->hasFile('doc')) {
            $url = $request->file('doc');
            $path = $request->file('doc')->storeAs('public/galleries', rand(1000,9999) . $url->getClientOriginalName());
            $gallery->url = $path;
        }
        $gallery->title = $request->title ?? '...';
        $gallery->type = $request->type;
        $gallery->value = $request->value;
        $gallery->save();

        return back()->with('success', 'Media Updated');
        
    }

    public function destroy(Gallery $gallery)
    {
        Storage::delete($gallery->id);
        $gallery->delete();
        return back()->with('success', 'Media Deleted');
    }
}
