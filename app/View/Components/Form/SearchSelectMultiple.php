<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class SearchSelectMultiple extends Component
{
    public function __construct(
        public string $name,
        public ?string $title = null,
        public array|Collection $options = [],
        public array|Collection $selected = []
    ) {
        //
    }

    public function render(): View
    {
        return view('components.form.search-select-multiple');
    }
}
