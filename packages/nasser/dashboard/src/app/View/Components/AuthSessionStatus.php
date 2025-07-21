<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AuthSessionStatus extends Component
{
    /**
     * Create the component instance.
     */
    public function __construct(
        public ?string $status = null,
        public string $class = ''
    ) {}

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.auth-session-status');
    }
} 