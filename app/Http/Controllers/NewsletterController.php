<?php

namespace App\Http\Controllers;


use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class NewsletterController extends Controller
{
    // Display all content of DB
    public function index()
    {
       $newsletters = Newsletter::query()
                        ->when(request()->query('search','') != '', function (Builder $query) {
                            $query->where('name', 'like', '%' . request()->query('search') . '%');
                            $query->orWhere('email', 'like', '%' . request()->query('search') . '%');
                            return $query;
                        })
                        ->latest()
                        ->paginate(15);
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
        return back()->with('success', 'Successfully Subscribed To Our Newsletter');
    }

    public function delete(Newsletter $newsletter)
    {
        $newsletter->delete();
        return back()->with('success', 'Newsletter Deleted');
    }

}
