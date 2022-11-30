<?php

namespace App\View\Components\Layouts\Backend;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    public function __construct(
        public string $title,
    ) {
        //
    }

    public function render(): View
    {
        return view('components.layouts.backend.hero');
    }
}
