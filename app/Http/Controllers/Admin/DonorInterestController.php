<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonorInterest;
use Illuminate\Http\Request;

class DonorInterestController extends Controller
{
    public function index()
    {
        $donors = DonorInterest::query()

            ->when(request('search'), function ($query) {
                $search = request('search');

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                });
            })
            ->when(request('type'), function ($query) {
                $query->where('type', request('type'));
            })

            ->latest()
            ->paginate(15);

        return view('admin.scholaship-donor.index', compact('donors'));
    }

    public function show($id)
    {
        $donor = DonorInterest::findOrFail($id);

        return view('admin.scholaship-donor.show', compact('donor'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string',

            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',

            'country' => 'nullable|string',
            'occupation' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'bio' => 'nullable|string',
            'children_count' => 'nullable|integer',
            'preferred_age' => 'nullable|string',
            'preferred_location' => 'nullable|string',
            'students_count' => 'nullable|integer',
            'preferred_field' => 'nullable|string',
            'institution_type' => 'nullable|string',

            'duration' => 'nullable|string',
            'notes' => 'nullable|string',
            'agree' => 'nullable|boolean',
        ]);

        $data['agree'] = $request->has('agree');

        DonorInterest::create($data);

        return back()->with('success', 'Thank you for your interest!');
    }

    public function destroy($id)
    {
        $donor = DonorInterest::find($id);
        $donor->delete();
        return back()->with('success', 'Prospective Donor Deleted');
    }

}
