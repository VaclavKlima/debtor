@extends('layouts.backend')

@section('title', trans('usersManagement/roles.create'))
@section('content')
    <x-layouts.backend.hero :title="'<i class=\'fas fa-user-tag\'></i> ' . trans('usersManagement/roles.create')">
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/users.users_management')"/>
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/roles.roles')" :url="route('users_management.roles.index')"/>
        <x-layouts.backend.breadcrumb :title="trans('usersManagement/roles.create')" :is-active="true"/>
    </x-layouts.backend.hero>

    <x-layouts.backend.errors/>
    <div class="content">
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                {{ Form::open(['url' => route('users-management.roles.store')]) }}
                <div class="row">
                    <div class="col-md-3">
                        {{ Form::bsText('name', trans('validation.attributes.name')) }}
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>
                    @foreach($permissions as $id => $name)
                        <div class="col-md-3">
                            {{ Form::bsCheckbox("permissions[{$id}]", $name, $id) }}
                        </div>
                    @endforeach
                    <div class="col-md-12 text-end">
                        {!! Form::bsSave() !!}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
