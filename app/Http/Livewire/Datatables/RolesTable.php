<?php

namespace App\Http\Livewire\Datatables;

use App\Http\Livewire\WithToastNotificationsTrait;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTable extends Component
{
    use WithDataTablesTrait, WithDeleteModelTrait, WithToastNotificationsTrait;

    public Collection $permissions;

    public function mount(): void
    {
        $this->permissions = Permission::pluck('name', 'id');
    }

    public function render(): View
    {
        return view('livewire.datatables.roles-table', [
            'roles' => $this->getRows(),
        ]);
    }

    public function getRowsQuery(): Builder
    {
        return Role::query()
            ->when(!empty($this->search['id'] ?? null), fn(Builder $builder) => $builder->where('id', $this->search['id']))
            ->when(!empty($this->search['name'] ?? null), fn(Builder $builder) => $builder->where('name', 'like', $this->search['name'].'%'))
            ->when(!empty($this->search['permission_id'] ?? null), fn(Builder $builder) => $builder->whereRelation('permissions', 'id', $this->search['permission_id']))
            ->with('permissions');
    }
}
