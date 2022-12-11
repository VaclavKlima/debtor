@props(['column' => '', 'sortBy' => 'desc', 'sortColumn' => 'id'])
<th class="pointer hover-primary" wire:click="sort('{{ $column }}', '{{ $sortBy === 'desc' ? 'asc' : 'desc' }}')">
    {{ $slot }}&nbsp;
    <span style="position: relative">
        <i @class(['fas fa-caret-up','text-primary' => $sortBy === 'desc' && $sortColumn === $column]) style="position: absolute; top: -1px"></i>
        <i @class(['fas fa-caret-down','text-primary' => $sortBy === 'asc' && $sortColumn === $column]) style="position: absolute; top: 6px"></i>
    </span>
</th>
