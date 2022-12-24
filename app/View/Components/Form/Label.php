<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Label extends Component
{
    public function __construct(public string $for, public string $title)
    {
    }

    public function render(): View
    {
        return view('components.form.label');
    }
}
