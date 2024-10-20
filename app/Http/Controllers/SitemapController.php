<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [
            URL::to('/'),
            URL::to('/homepage'),
            URL::to('/who-we-are'),
            URL::to('/social-media-posts'),
            URL::to('/forms'),
            URL::to('/inspire-program'),
            URL::to('/special-scholarship-program'),
            URL::to('/mentorship-program'),
            URL::to('/summer-school-program'),
            URL::to('/life-long-program'),
            URL::to('/school-build'),
            URL::to('/get-involved'),
            URL::to('/donate'),
            URL::to('/gallery'),
            URL::to('/blogs'),
            URL::to('/project')
        ];

        $posts = Post::published()->get();
        foreach ($posts as $post) {
            $urls[] = URL::to('/blog/' . $post->slug);
        }

        $sitemap = view('sitemap', ["urls" => $urls])->render();
        return response($sitemap, 200)->header('Content-Type', 'text/xml');
    }
}
