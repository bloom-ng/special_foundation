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
       return view('admin.newsletter.index')->with('newsletters', $newsletters);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        Newsletter::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return back()->with('success', 'Newsletter Created');
    }

    public function delete(Newsletter $newsletter)
    {
        $newsletter->delete();
        return back()->with('success', 'Newsletter Deleted');
    }

}
