<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Pagination\LengthAwarePaginator;

class Pagination extends Component
{
    /**
     * Create the component instance.
     */
    public function __construct(
        public LengthAwarePaginator $paginator,
        public string $label = 'items'
    ) {}

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.pagination');
    }
} 