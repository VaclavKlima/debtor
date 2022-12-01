<?php

namespace App\Http\Livewire\Datatables;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ClientsTable extends Component
{
    use WithDataTablesTrait;

    public function render(): View
    {
        return view('livewire.datatables.clients-table', [
            'users' => $this->getRows(),
        ]);
    }

    public function getRowsQuery(): Builder
    {
        return User::query()
            ->with('roles');
    }
}
