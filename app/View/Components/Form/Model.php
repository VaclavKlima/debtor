<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Model extends Component
{
    public function __construct(public $model, public string $action, public string $method = 'PUT')
    {
    }

    public function render(): View
    {
        return view('components.form.model');
    }
}
