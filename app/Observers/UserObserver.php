<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{
    public function creating(User $user): void
    {
        if ($user->password === null) {
            $user->password = 'password_is_not_set';
        }
    }

    public function created(User $user): void
    {
        $user->sendPasswordResetNotification(Str::random(60));
    }
}
