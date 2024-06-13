<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BeneficiaryForm extends Component
{
    public $programme;
    /**
     * Create a new component instance.
     */
    public function __construct($programme)
    {
        $this->programme = $programme;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.beneficiary-form');
    }
}
