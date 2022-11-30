<?php

namespace App\View\Components\Layouts\Backend;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class SidebarLink extends Component
{
    public function __construct(
        public string $title,
        public string $url = '#',
        public string $icon = 'fa-solid fa-square-up-right',
        public bool $isActive = false,
        public ?string $permission = null,
    ) {
        //
    }

    public function render(): string|View
    {
        if (isset($this->permission) && Auth::user()->cannot($this->permission)) {
            return '';
        }

        return view('components.layouts.backend.sidebar-link');
    }
}
