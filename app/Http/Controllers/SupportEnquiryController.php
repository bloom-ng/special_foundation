<?php

namespace App\Http\Controllers;

use App\Models\SupportEnquiry;
use App\Models\SupportOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;

class SupportEnquiryController extends Controller
{
    /**
     * The public Ways to Support page.
     */
    public function page()
    {
        return view('ways-to-support', [
            'groups' => SupportOption::grouped(),
            'supportTypes' => SupportEnquiry::getSupportTypes(),
            'selectedType' => SupportEnquiry::labelForType(request()->query('type')),
        ]);
    }

    /**
     * Deep link into the enquiry form with a support type pre-selected.
     */
    public function form(Request $request)
    {
        return redirect('/ways-to-support?type=' . urlencode((string) $request->query('type')) . '#enquiry');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:60',
            'country' => 'nullable|string|max:120',
            'support_type' => ['required', Rule::in(array_values(SupportEnquiry::getSupportTypes()))],
            'occasion_date' => 'nullable|date',
            'fundraising_goal' => 'nullable|string|max:120',
            'message' => 'nullable|string|max:5000',
        ]);

        $enquiry = SupportEnquiry::create($validated);

        $this->notifyTeam($enquiry);

        return redirect('/ways-to-support#enquiry')
            ->with('success', 'Thank you. A member of our team will reach out within 3 working days.');
    }

    private function notifyTeam(SupportEnquiry $enquiry): void
    {
        $recipients = array_values(array_filter(
            (array) config('support.enquiry_recipients', [])
        ));

        if ($recipients === []) {
            return;
        }

        try {
            Notification::route('mail', $recipients)
                ->notify(new \App\Notifications\AppEvent([
                    'action' => 'New Ways to Support enquiry (' . $enquiry->support_type . ') from ' . $enquiry->full_name,
                    'link' => '/admin/support-enquiries',
                ]));
        } catch (\Exception $e) {
            Log::error('Error sending support enquiry notification: ' . $e->getMessage());
        }
    }

    // --- Admin ---

    public function index()
    {
        $enquiries = SupportEnquiry::latest()->paginate(25);

        return view('admin.support-enquiries.index', compact('enquiries'));
    }

    public function destroy(SupportEnquiry $supportEnquiry)
    {
        $supportEnquiry->delete();

        return back()->with('success', 'Enquiry deleted');
    }
}
