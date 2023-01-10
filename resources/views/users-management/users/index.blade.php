@extends('layouts.backend')

@section('title', trans('usersManagement/users.users'))
@section('content')
    <x-layouts.backend.hero :title="'<i class=\'fas fa-users\'></i> ' . trans('usersManagement/users.users')">
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/users.users_management')"/>
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/users.users')" :is-active="true"/>
    </x-layouts.backend.hero>

    <x-layouts.backend.status-messages/>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-content block-content-full">

                <livewire:datatables.users-table/>

            </div>
        </div>
    </div>


@endsection
