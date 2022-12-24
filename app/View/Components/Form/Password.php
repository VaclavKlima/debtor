<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Password extends Component
{
    public function __construct(public string $name, public ?string $title = null)
    {
    }

    public function render(): View
    {
        return view('components.form.input', [
            'type' => 'password',
            'value' => null,
            'model' => null,
        ]);
    }
}
