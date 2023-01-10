<?php

namespace App\Http\Livewire\Datatables;

use App\Http\Livewire\WithToastNotificationsTrait;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UsersTable extends Component
{
    use WithDataTablesTrait, WithDeleteModelTrait, WithToastNotificationsTrait;

    public Collection $roles;

    public function mount(): void
    {
        $this->roles = Role::pluck('name', 'id');
    }

    public function render(): View
    {
        return view('livewire.datatables.users-table', [
            'users' => $this->getRows(),
        ]);
    }

    public function getRowsQuery(): Builder
    {
        return User::query()
            ->when(!empty($this->search['id'] ?? null), fn(Builder $builder) => $builder->where('id', $this->search['id']))
            ->when(!empty($this->search['full_name'] ?? null), fn(Builder $builder) => $builder->whereRaw('CONCAT(first_name, " ", last_name) LIKE ?', "%{$this->search['full_name']}%"))
            ->when(!empty($this->search['email'] ?? null), fn(Builder $builder) => $builder->where('email', 'like', $this->search['email'].'%'))
            ->when(!empty($this->search['role_id'] ?? null), fn(Builder $builder) => $builder->whereRelation('roles', 'id', $this->search['role_id']))
            ->with('roles');
    }
}
