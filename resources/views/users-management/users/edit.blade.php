@extends('layouts.backend')

@section('title', trans('usersManagement/users.create'))
@section('content')
    <x-layouts.backend.hero :title="'<i class=\'fas fa-users\'></i> ' . trans('usersManagement/users.create')">
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/users.users_management')"/>
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/users.users')" :url="route('users-management.users.index')"/>
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/users.edit')" :is-active="true"/>
    </x-layouts.backend.hero>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <x-form.model :model="$user" :action="route('users-management.users.update', $user)">
                    <div class="row">
                        <div class="col-md-3">
                            <x-form.text name="name" :title="trans('validation.attributes.name')"/>
                        </div>
                        <div class="col-md-3">
                            <x-form.email name="email" :title="trans('validation.attributes.email')"/>
                        </div>

                        <div class="col-md-3">
                            <x-form.search-select-multiple name="roles[]" :title="trans('usersManagement/roles.roles')" :options="$roles" :selected="$user->roles->pluck('id')"/>
                        </div>

                        <div class="col-md-12 text-end">
                            <x-form.save/>
                        </div>
                    </div>
                </x-form.model>
            </div>
        </div>
    </div>

@endsection
