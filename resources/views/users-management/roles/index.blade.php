@extends('layouts.backend')
@section('content')
    <x-layouts.backend.hero :title="'<i class=\'fas fa-user-tag\'></i> ' . trans('usersManagement/roles.roles')">
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/users.users_management')"/>
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/roles.roles')" :is-active="true"/>
    </x-layouts.backend.hero>

    <livewire:datatables.clients-table/>
@endsection
