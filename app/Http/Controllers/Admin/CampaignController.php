<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    // ─── Campaigns CRUD ──────────────────────────────────────────────────────

    public function index()
    {
        $campaigns = Campaign::latest()->get();
        return view('admin.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.campaigns.create');
    }

    public function edit(Campaign $campaign)
    {
        return view('admin.campaigns.edit', compact('campaign'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'hero_title'     => 'nullable|string',
            'hero_text'      => 'nullable|string',
            'hero_image'     => 'nullable|image',
            'banner_image'   => 'nullable|image',
            'countdown_date' => 'nullable|date',
            'stats'          => 'nullable|string',
            'sections'       => 'nullable|string',
        ]);

        $heroImage = $request->hasFile('hero_image')
            ? $request->file('hero_image')->store('campaigns', 'public')
            : null;

        $bannerImage = $request->hasFile('banner_image')
            ? $request->file('banner_image')->store('campaigns', 'public')
            : null;

        Campaign::create([
            'title'              => $request->title,
            'slug'               => Str::slug($request->title),
            'hero_title'         => $request->hero_title,
            'hero_text'          => $request->hero_text,
            'hero_image'         => $heroImage,
            'banner_image'       => $bannerImage,
            'show_banner'        => $request->boolean('show_banner'),
            'show_countdown'     => $request->boolean('show_countdown'),
            'countdown_date'     => $request->countdown_date,
            'stats'              => $request->stats ? json_decode($request->stats, true) : [],
            'testimonial'        => $request->testimonial,
            'primary_cta_text'   => $request->primary_cta_text,
            'primary_cta_link'   => $request->primary_cta_link,
            'secondary_cta_text' => $request->secondary_cta_text,
            'secondary_cta_link' => $request->secondary_cta_link,
            'show_in_menu'       => $request->boolean('show_in_menu'),
            'menu_title'         => $request->menu_title,
            'sections'           => $request->sections ? json_decode($request->sections, true) : [],
            'layout'             => json_encode([]),
        ]);

        return redirect()
            ->route('admin.campaigns.index')
            ->with('success', 'Campaign created successfully');
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'hero_title'     => 'nullable|string',
            'hero_text'      => 'nullable|string',
            'hero_image'     => 'nullable|image',
            'banner_image'   => 'nullable|image',
            'countdown_date' => 'nullable|date',
        ]);

        $heroImage = $campaign->hero_image;
        if ($request->hasFile('hero_image')) {
            if ($campaign->hero_image) {
                Storage::disk('public')->delete($campaign->hero_image);
            }
            $heroImage = $request->file('hero_image')->store('campaigns', 'public');
        }

        $bannerImage = $campaign->banner_image;
        if ($request->hasFile('banner_image')) {
            if ($campaign->banner_image) {
                Storage::disk('public')->delete($campaign->banner_image);
            }
            $bannerImage = $request->file('banner_image')->store('campaigns', 'public');
        }

        $campaign->update([
            'title'              => $request->title,
            'slug'               => Str::slug($request->title),
            'hero_title'         => $request->hero_title,
            'hero_text'          => $request->hero_text,
            'hero_image'         => $heroImage,
            'banner_image'       => $bannerImage,
            'show_banner'        => $request->boolean('show_banner'),
            'show_countdown'     => $request->boolean('show_countdown'),
            'countdown_date'     => $request->countdown_date,
            'stats'              => $request->stats ? json_decode($request->stats, true) : [],
            'testimonial'        => $request->testimonial,
            'primary_cta_text'   => $request->primary_cta_text,
            'primary_cta_link'   => $request->primary_cta_link,
            'secondary_cta_text' => $request->secondary_cta_text,
            'secondary_cta_link' => $request->secondary_cta_link,
            'show_in_menu'       => $request->boolean('show_in_menu'),
            'menu_title'         => $request->menu_title,
            'sections'           => $request->sections ? json_decode($request->sections, true) : [],
        ]);

        return redirect()
            ->route('admin.campaigns.index')
            ->with('success', 'Campaign updated successfully');
    }

    public function destroy(Campaign $campaign)
    {
        if ($campaign->hero_image) {
            Storage::disk('public')->delete($campaign->hero_image);
        }
        if ($campaign->banner_image) {
            Storage::disk('public')->delete($campaign->banner_image);
        }
        $campaign->delete();

        return redirect()
            ->route('admin.campaigns.index')
            ->with('success', 'Campaign deleted successfully');
    }

    // ─── Public view ─────────────────────────────────────────────────────────

    public function show($slug)
    {
        $campaign = Campaign::where('slug', $slug)->firstOrFail();
        return view('campaign', compact('campaign'));
    }

    // ─── Page Builder ─────────────────────────────────────────────────────────

    /**
     * Open the drag-and-drop builder for a campaign.
     * The layout is stored as a JSON string and decoded for the view.
     * No migration/transform is done here; the builder itself handles versioning.
     */
    public function builder(Campaign $campaign)
    {
        // Ensure layout is always a clean JSON string (handle legacy array casts)
        if (empty($campaign->getRawOriginal('layout'))) {
            $campaign->update(['layout' => json_encode([])]);
        }

        return view('admin.campaigns.builder', compact('campaign'));
    }

    /**
     * Persist the builder layout (called by the builder's Save button via fetch).
     * Expects JSON body: { layout: "<json string>" }
     */
    public function updateLayout(Request $request, $id)
    {
        $request->validate([
            'layout' => 'required|string',
        ]);

        $campaign = Campaign::findOrFail($id);

        // Validate it is actually valid JSON before storing
        $decoded = json_decode($request->layout, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['status' => 'error', 'message' => 'Invalid JSON layout'], 422);
        }

        $campaign->layout = $request->layout;
        $campaign->save();

        return response()->json(['status' => 'saved']);
    }

    // ─── Image Upload ─────────────────────────────────────────────────────────

    /**
     * Single image upload endpoint used by the builder's image block settings panel.
     * Returns: { url: "..." }
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:5120', // 5 MB max
        ]);

        $path = $request->file('image')->store('builder', 'public');

        return response()->json([
            'url' => Storage::disk('public')->url($path),
        ]);
    }
}
