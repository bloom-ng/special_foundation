<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::query()
                        ->when(request()->query('search','') != '', function ($query) {
                            $query->where('name', 'like', '%' . request()->query('search') . '%');
                            $query->orWhere('email', 'like', '%' . request()->query('search') . '%');
                            $query->orWhere('contact_number', 'like', '%' . request()->query('search') . '%');
                            return $query;
                        })
                        ->latest()
                        ->paginate(15);
        return view('admin.donation.index')
            ->with('donations', $donations);
    }

    public function show($id)
    {
        $donation = Donation::find($id);
        return view('admin.donation.show')
            ->with('donation', $donation)
            ->with('sourceMapping', Donation::getSourceMapping())
            ;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string',
            'source' => 'numeric',
        ]);

        $donation = new Donation;
        $donation->name = $request->name;
        $donation->email = $request->email;
        $donation->contact_number = $request->contact_number;
        $donation->comments = $request->comments;
        $donation->source = $request->source ?? 10;
        $donation->save();
        return back()->with('success', 'Submitted Successfully');
    }


    public function destroy($id)
    {
        $donation = Donation::find($id);
        $donation->delete();
        return back()->with('success', 'Prospective Donor Deleted');
    }
}
