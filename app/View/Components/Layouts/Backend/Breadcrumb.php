<?php

namespace App\View\Components\Layouts\Backend;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public function __construct(
        public string $title,
        public ?string $url = null,
        public bool $isActive = false,
    ) {
        //
    }

    public function render(): View
    {
        return view('components.layouts.backend.breadcrumb');
    }
}
