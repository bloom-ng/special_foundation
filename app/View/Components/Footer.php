<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Download;
use App\Models\Post;

class Footer extends Component
{
    public $downloads;
    public $featured_blogs;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->downloads = Download::all();
        $this->featured_blogs = Post::where('is_featured', 1)
                                ->published()->latest('published_at')
                                ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer', [
            'downloads' => $this->downloads,
            'featured_blogs' => $this->featured_blogs->shuffle()->take(4)
        ]);
    }
}
