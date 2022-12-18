<?php

namespace App\Http\Livewire\Datatables;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

trait WithDataTablesTrait
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public bool $useCache = false;
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
        return $this->cache(function () {
            return $this->getRowsQuery()
                ->orderBy($this->sortColumn, $this->sortBy)
                ->paginate(
                    perPage: $this->perPage,
                    columns: $this->getColumns,
                    pageName: $this->pageName,
                );
        });
    }

    public function getRowsQuery(): Builder
    {
        return Model::query();
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

    public function cache($callback)
    {
        $cacheKey = $this->id;

        if ($this->useCache && cache()->has($cacheKey)) {
            return cache()->get($cacheKey);
        }

        $result = $callback();

        cache()->put($cacheKey, $result);

        return $result;
    }
}
