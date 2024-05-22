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
       return view('index')->with('newsletters', $newsletters);
    }

}
