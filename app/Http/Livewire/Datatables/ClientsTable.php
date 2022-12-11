<?php

namespace App\Http\Livewire\Datatables;

use App\Http\Livewire\WithToastNotificationsTrait;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ClientsTable extends Component
{
    use WithDataTablesTrait, WithDeleteModelTrait, WithToastNotificationsTrait;

    public Collection $roles;

    public function mount(): void
    {
        $this->roles = Role::pluck('name', 'id');

    }

    public function render(): View
    {
        return view('livewire.datatables.clients-table', [
            'users' => $this->getRows(),
        ]);
    }

    public function getRowsQuery(): Builder
    {
        return User::query()
            ->when(!empty($this->search['id'] ?? null), fn(Builder $builder) => $builder->where('id', $this->search['id']))
            ->when(!empty($this->search['name'] ?? null), fn(Builder $builder) => $builder->where('name', 'like', $this->search['name'].'%'))
            ->when(!empty($this->search['email'] ?? null), fn(Builder $builder) => $builder->where('email', 'like', $this->search['email'].'%'))
            ->when(!empty($this->search['role_id'] ?? null), fn(Builder $builder) => $builder->whereRelation('roles', 'id', $this->search['role_id']))
            ->with('roles');
    }

    private function getSortable(string $sortBy = 'asc'): array
    {
        return [
            'role_id' => static fn(Builder $builder) => $builder->orderBy('model_has_roles.model_type'),
        ];
    }
}
