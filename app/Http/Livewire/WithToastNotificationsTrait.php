<?php

namespace App\Http\Livewire;

trait WithToastNotificationsTrait
{
    public function toast(): void
    {
        $this->dispatchBrowserEvent('livewire:toast');
    }

}
