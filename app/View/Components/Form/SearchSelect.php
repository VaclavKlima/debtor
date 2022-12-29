<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class SearchSelect extends Component
{
    public function __construct(
        public string $name,
        public ?string $title = null,
        public array|Collection $options = [],
        public string|int|null $selected = null
    ) {
        //
    }

    public function render(): View
    {
        return view('components.form.search-select');
    }
}
