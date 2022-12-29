<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class File extends Component
{
    public function __construct(
        public string $name,
        public ?string $title = null,
        public ?string $value = null
    ) {
        //
    }

    public function render(): View
    {
        return view('components.form.input', [
            'type' => 'file',
            'model' => null,
        ]);
    }
}
