@extends('layouts.backend')
@section('content')
    <x-layouts.backend.hero :title="'<i class=\'fas fa-users\'></i> ' . trans('usersManagement/users.users')">
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/users.users_management')"/>
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/users.users')" :is-active="true"/>
    </x-layouts.backend.hero>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-content block-content-full">

                <livewire:datatables.clients-table/>

            </div>
        </div>
    </div>


@endsection
