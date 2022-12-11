<?php

namespace App\View\Components\Layouts\Backend;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class SidebarLinkGroup extends Component
{
    public function __construct(
        public string $title,
        public bool $isActive = false,
        public string $icon = 'fas fa-bars',
        public ?string $permission = null,
    ) {
        //
    }

    public function render(): View|string
    {
        if (isset($this->permission) && Auth::user()->cannot($this->permission)) {
            return '';
        }

        return view('components.layouts.backend.sidebar-link-group');
    }
}
