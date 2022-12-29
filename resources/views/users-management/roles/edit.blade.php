@extends('layouts.backend')

@section('title', trans('usersManagement/roles.create'))
@section('content')
    <x-layouts.backend.hero :title="'<i class=\'fas fa-user-tag\'></i> ' . trans('usersManagement/roles.edit')">
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/users.users_management')"/>
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/roles.roles')" :url="route('users-management.roles.index')"/>
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/roles.edit')" :is-active="true"/>
    </x-layouts.backend.hero>

    <x-layouts.backend.errors/>
    <div class="content">
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <x-form.model :model="$role" :action="route('users-management.roles.update', $role)">
                    <div class="row">
                        <div class="col-md-3">
                            <x-form.text name="name" :title="trans('validation.attributes.name')"/>
                        </div>

                        <div class="col-md-12">
                            <hr>
                        </div>
                        @foreach($permissions as $id => $name)
                            <div class="col-md-3">
                                <x-form.checkbox name="permissions[]" :value="$id" :title="$name" :checked="$role->permissions->find($id) !== null"/>
                            </div>
                        @endforeach
                        <div class="col-md-12 text-end">
                            <x-form.save/>
                        </div>
                    </div>
                </x-form.model>
            </div>
        </div>
    </div>

@endsection
