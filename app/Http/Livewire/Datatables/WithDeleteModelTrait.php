<?php

namespace App\Http\Livewire\Datatables;


use Illuminate\Support\Facades\Auth;

trait WithDeleteModelTrait
{
    public function delete(int $id, string $class, ?string $permission): void
    {
        $permission = 'asdsd';
        if (!empty($permission) && Auth::user()->cannot($permission)) {
            $this->toast();

            return;
        }

        if (class_exists($class)) {
            dd($class::find($id));
            $class::find($id)->delete();


        } else {
            dd($class);
        }
    }
}
