<?php

namespace App\Http\Livewire\Datatables;

use App\Http\Livewire\WithToastNotificationsTrait;
use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;

class MyOrdersTable extends Component
{
    use WithDataTablesTrait, WithDeleteModelTrait, WithToastNotificationsTrait;

    public Collection $users;

    public string $type = 'all';

    public function mount(): void
    {
        $this->users = User::pluck('name', 'id');
    }

    public function render(): View
    {
        return view('livewire.datatables.my-orders-table', [
            'orders' => $this->getRows(),
        ]);
    }

    public function getRowsQuery(): Builder
    {
        return Order::query()
            ->when($this->type, fn(Builder $builder) => match ($this->type) {
                default => $builder,
                'pending' => $builder->where('status', 'pending'),
                'accepted' => $builder->where('status', 'accepted'),
                'rejected' => $builder->where('status', 'rejected'),
                'delivered' => $builder->where('status', 'delivered'),
            });
    }


}
