<?php

namespace App\Http\Livewire\Datatables;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

trait WithDataTablesTrait
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public int $perPage = 10;
    public array $getColumns = ['*'];
    public string $pageName = 'page';
    public array $search = [];
    public string $sortColumn = 'id';
    public string $sortBy = 'desc';

    public function mountWithDataTablesTrait(): void
    {
        $this->perPage = Session::get('livewire.datatables.per_page', 10);
    }

    public function getRows(): LengthAwarePaginator
    {
        return $this->getRowsQuery()
            ->orderBy($this->sortColumn, $this->sortBy)
            ->paginate(
                perPage: $this->perPage,
                columns: $this->getColumns,
                pageName: $this->pageName,
            );
    }

    public function updatedPerPage($value): void
    {
        Session::put('livewire.datatables.per_page', $value);
        $this->resetPage($this->pageName);
    }

    public function sort(string $column, string $direction): void
    {
        $this->sortColumn = $column;
        $this->sortBy = $direction;
    }


}
