<?php

namespace App\Http\Livewire;

trait WithToastNotificationsTrait
{
    public function toast(string $message, NotificationTypes $type = NotificationTypes::info, string $icon = 'fa fa-info-circle'): void
    {
        $this->dispatchBrowserEvent('livewire:toast', [
            'message' => $message,
            'icon' => $icon,
            'type' => $type,
        ]);
    }
}
