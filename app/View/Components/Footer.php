<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Download;

class Footer extends Component
{
    public $downloads;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->downloads = Download::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer', [
            'downloads' => $this->downloads,
        ]);
    }
}
