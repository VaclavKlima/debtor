<?php

namespace App\Http\Livewire;

enum NotificationTypes: string
{
    case Success = 'success';
    case Info = 'info';
    case Warning = 'warning';
    case Danger = 'danger';
    case Error = 'error';
}
