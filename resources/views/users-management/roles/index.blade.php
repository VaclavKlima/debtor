@extends('layouts.backend')

@section('title', trans('usersManagement/roles.roles'))
@section('content')
    <x-layouts.backend.hero :title="'<i class=\'fas fa-user-tag\'></i> ' . trans('usersManagement/roles.roles')">
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/users.users_management')"/>
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/roles.roles')" :is-active="true"/>
    </x-layouts.backend.hero>

    <x-layouts.backend.status-messages/>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-content block-content-full">

                <livewire:datatables.roles-table/>

            </div>
        </div>
    </div>

@endsection
