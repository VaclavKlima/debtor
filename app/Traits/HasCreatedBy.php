<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait HasCreatedBy
{
    protected static function bootHasCreatedBy(): void
    {
        static::creating(function ($model) {
            if (Auth::check()) {
                $model->created_by = Auth::id();
                $model->updated_by = Auth::id();
            }
        });
    }
}
