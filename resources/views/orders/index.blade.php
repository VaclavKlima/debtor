@extends('layouts.backend')

@section('title', trans('usersManagement/roles.roles'))
@section('content')
    <x-layouts.backend.hero :title="'<i class=\'si si-bag\'></i> ' . trans('orders.my_orders')">
        <x-layouts.backend.breadcrumb :title="trans('orders.my_orders')" :is-active="true"/>
    </x-layouts.backend.hero>

    <x-layouts.backend.status-messages/>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <a class="btn btn-alt-success" href="{{ route('orders.create') }}">Create new order</a>
                {{--                <livewire:datatables.roles-table/>--}}

            </div>
        </div>
    </div>

@endsection
