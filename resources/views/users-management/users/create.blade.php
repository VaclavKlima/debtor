@extends('layouts.backend')

@section('title', trans('usersManagement/users.create'))
@section('content')
    <x-layouts.backend.hero :title="'<i class=\'fas fa-users\'></i> ' . trans('usersManagement/users.create')">
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/users.users_management')"/>
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/users.users')" :url="route('users-management.users.index')"/>
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/users.create')" :is-active="true"/>
    </x-layouts.backend.hero>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                {{ Form::open(['url' => route('users-management.users.store')]) }}
                <div class="row">
                    <div class="col-md-3">
                        {{ Form::bsText('name', trans('validation.attributes.name')) }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::bsEmail('email', trans('validation.attributes.email')) }}
                    </div>

                    <div class="col-md-3">
                        {{ Form::bsMultipleSelect('roles[]', trans('usersManagement/roles.roles'), $roles) }}
                    </div>

                    <div class="col-md-12 text-end">
                        {!! Form::bsSave() !!}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
