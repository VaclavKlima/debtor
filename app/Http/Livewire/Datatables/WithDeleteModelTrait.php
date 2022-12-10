<?php

namespace App\Http\Livewire\Datatables;


use App\Http\Livewire\NotificationTypes;
use Illuminate\Support\Facades\Auth;

trait WithDeleteModelTrait
{
    public function delete(int $id, string $class, ?string $permission): void
    {
        if (!empty($permission) && Auth::user()->cannot($permission)) {
            $this->toast(trans('global.you_dont_have_permission'), NotificationTypes::Danger);
            return;
        }

        if (class_exists($class)) {
            $class::find($id)->delete();
            $this->toast(trans('global.model_deleted'), NotificationTypes::Success);
        } else {
            $this->toast(trans('global.model_dont_exists'), NotificationTypes::Danger);
        }
    }
}
