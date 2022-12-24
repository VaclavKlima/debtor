<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    public function __construct(public string $name, public bool $checked = false, public ?string $title = null, public ?string $value = null)
    {
    }

    public function render(): View
    {
        return view('components.form.checkbox');
    }
}
