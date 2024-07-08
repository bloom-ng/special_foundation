<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{

    public function index()
    {
        $downloads = Download::query()
                                ->when(request()->query('search','') != '', function ($query) {
                                    $query->where('name', 'like', '%' . request()->query('search') . '%');
                                    return $query;
                                })
                                ->latest()
                                ->get();

        return view('admin.download.index', ['downloads' => $downloads]);
    }

    public function create()
    {
        return view('admin.download.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'doc' => [
                'required','max:21000',
            ],
        ]);
        
        $download = new Download;
        $url = $request->file('doc');
        $path = $request->file('doc')->storeAs('public/downloads', $url->getClientOriginalName());
        $download->name = $request->name;
        $download->url = $path;
        $download->type = Download::TYPE_DEFAULT;
        $download->save();

        return redirect('/admin/downloads');
        
    }

    public function destroy(Download $download)
    {
        Storage::delete($download->url);
        $download->delete();
        return back()->with('success', 'Document Deleted');
    }
    
}
