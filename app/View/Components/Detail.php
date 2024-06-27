<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Detail extends Component
{
    public $name;
    public $content;
    public $link;
    public $image;
    /**
     * Create a new component instance.
     */
    public function __construct($name = '', $content = '', $image = '', $link = '')
    {
        $this->name = $name;
        $this->content = $content;
        $this->link = $link;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.detail');
    }
}
