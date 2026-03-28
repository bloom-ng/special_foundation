<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CampaignController extends Controller
{

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
            'title' => 'required|string|max:255',
            'hero_title' => 'nullable|string',
            'hero_text' => 'nullable|string',
            'hero_image' => 'nullable|image',
            'banner_image' => 'nullable|image',
            'countdown_date' => 'nullable|date',
            'stats' => 'nullable|string',
            'sections' => 'nullable|string',
        ]);

        // IMAGE UPLOADS
        $heroImage = null;
        if ($request->hasFile('hero_image')) {
            $heroImage = $request->file('hero_image')->store('campaigns', 'public');
        }

        $bannerImage = null;
        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image')->store('campaigns', 'public');
        }

        // SLUG
        $slug = Str::slug($request->title);
        $stats = $request->stats ? json_decode($request->stats, true) : [];
        $sections = $request->sections ? json_decode($request->sections, true) : [];


        Campaign::create([
            'title' => $request->title,
            'slug' => $slug,

            'hero_title' => $request->hero_title,
            'hero_text' => $request->hero_text,
            'hero_image' => $heroImage,

            'banner_image' => $bannerImage,
            'show_banner' => $request->has('show_banner'),

            'show_countdown' => $request->has('show_countdown'),
            'countdown_date' => $request->countdown_date,
            'stats' => $stats,
            'testimonial' => $request->testimonial,

            'primary_cta_text' => $request->primary_cta_text,
            'primary_cta_link' => $request->primary_cta_link,

            'secondary_cta_text' => $request->secondary_cta_text,
            'secondary_cta_link' => $request->secondary_cta_link,

            'show_in_menu' => $request->has('show_in_menu'),
            'menu_title' => $request->menu_title,

            'sections' => $sections,
        ]);

        return redirect()->route('admin.campaigns.index')
            ->with('success', 'Campaign created successfully');
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'hero_title' => 'nullable|string',
            'hero_text' => 'nullable|string',
            'hero_image' => 'nullable|image',
            'banner_image' => 'nullable|image',
            'countdown_date' => 'nullable|date',
        ]);
        $slug = Str::slug($request->title);
        $heroImage = $campaign->hero_image;

        if ($request->hasFile('hero_image')) {

            // delete old image
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
        $stats = $request->stats
            ? json_decode($request->stats, true)
            : [];
        $campaign->update([
            'title' => $request->title,
            'slug' => $slug,

            'hero_title' => $request->hero_title,
            'hero_text' => $request->hero_text,
            'hero_image' => $heroImage,

            'banner_image' => $bannerImage,
            'show_banner' => $request->has('show_banner'),

            'show_countdown' => $request->has('show_countdown'),
            'countdown_date' => $request->countdown_date,
            'stats' => $stats,
            'testimonial' => $request->testimonial,

            'primary_cta_text' => $request->primary_cta_text,
            'primary_cta_link' => $request->primary_cta_link,

            'secondary_cta_text' => $request->secondary_cta_text,
            'secondary_cta_link' => $request->secondary_cta_link,
            'show_in_menu' => $request->has('show_in_menu'),
            'menu_title' => $request->menu_title,

            'sections' => $request->sections
                ? json_decode($request->sections, true)
                : [],
        ]);

        return redirect()
            ->route('admin.campaigns.index')
            ->with('success', 'Campaign updated successfully');
    }

    public function show($slug)
    {
        $campaign = Campaign::where('slug', $slug)->firstOrFail();

        return view('campaign', compact('campaign'));
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

        return redirect()->route('admin.campaigns.index')
            ->with('success', 'Campaign deleted successfully');
    }
}
