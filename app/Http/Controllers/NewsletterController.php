<?php

namespace App\Http\Controllers;


use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    // Display all content of DB
    public function index()
    {
        $newsletters = Newsletter::all();
        return view('newsletters.index', compact('newsletters'));
    }

    // Show the form for creating a new resource - asin the frontend action calling
    public function create()
    {
        return view('newsletters.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:newsletter',
        ]);

        Newsletter::create($request->all());

        return redirect()->route('newsletters.index')
                         ->with('success', 'Newsletter entry created successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(Newsletter $newsletter)
    {   
        // $post = Post::find(1);
        $newsletter->delete();

        return redirect()->route('newsletters.index')
                         ->with('success', 'Newsletter entry deleted successfully.');
    }
}
