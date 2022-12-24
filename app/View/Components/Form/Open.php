<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Open extends Component
{
    public function __construct(public string $action, public string $method = 'POST')
    {
    }

    public function render(): View
    {
        return view('components.form.open', [
            'action' => $this->action,
            'method' => $this->method,
        ]);
    }
}
