<?php

namespace App\Http\Controllers;

use App\Models\SchoolBuildInterest;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class SchoolBuildInterestController extends Controller
{
    public function index()
    {
        $interests = SchoolBuildInterest::query()
            ->when(request()->query('search', '') != '', function ($query) {
                $search = request()->query('search');

                $query->where(function ($q) use ($search) {
                    $q->where('school_name', 'like', '%' . $search . '%')
                        ->orWhere('contact_person', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('contact_number', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(20);

        return view('admin.school-build-interest.index', compact('interests'));
    }

    public function show($id)
    {
        $interest = SchoolBuildInterest::findOrFail($id);

        return view('admin.school-build-interest.show', compact('interest'));
    }

    public function store(Request $request, CloudinaryService $cloudinary)
    {
        $data = $request->validate([
            'school_name' => 'required|string',
            'contact_person' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string',
            'school_address' => 'required|string',
            'state' => 'required|string',
            'lga' => 'required|string',
            'number_of_students' => 'nullable|integer|min:1',
            'property_ownership' => 'nullable|array',
            'property_ownership.*' => [Rule::in(SchoolBuildInterest::getOwnershipOptions())],
            'school_needs' => 'nullable|string',
            'needs_details' => 'nullable|string',
            'photos' => 'nullable|array|max:6',
            'photos.*' => 'image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $photos = [];

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                try {
                    $photos[] = $cloudinary->isConfigured()
                        ? $cloudinary->uploadSchoolBuildPhoto($photo)
                        : $photo->store('school-builds', 'public');
                } catch (\Throwable $e) {
                    Log::error('Error uploading school build photo: ' . $e->getMessage());

                    return back()
                        ->withErrors(['photos' => 'We could not upload the school photos. Please try again.'])
                        ->withInput();
                }
            }
        }

        $data['photos'] = $photos;

        SchoolBuildInterest::create($data);

        try {
            \Illuminate\Support\Facades\Notification::route('mail', env('MAIL_ADMIN_ADDRESS'))
                ->notify(new \App\Notifications\AppEvent([
                    'action' => "New school build expression of interest",
                    'link' => '/admin/school-build-interests',
                ]));
        } catch (\Exception $e) {
            Log::error('Error sending school build interest notification: ' . $e->getMessage());
        }

        return back()->with('success', 'Thank you for your interest! We will get back to you shortly.');
    }

    public function destroy($id)
    {
        $interest = SchoolBuildInterest::findOrFail($id);
        $interest->delete();

        return back()->with('success', 'Interest Deleted');
    }
}
