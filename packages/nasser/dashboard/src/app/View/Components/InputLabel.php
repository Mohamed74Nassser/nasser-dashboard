<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class InputLabel extends Component
{
    /**
     * Create the component instance.
     */
    public function __construct(
        public string $value,
        public string $for = ''
    ) {}

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.input-label');
    }
} 