@extends('layouts.backend')

@section('title', trans('global.profile'))
@section('content')

    <x-layouts.backend.hero :title="'<i class=\'fas fa-user\'></i> ' . trans('global.profile') . ' - '. $user->name">
        <x-layouts.backend.breadcrumb :title="trans('global.dashboard')" :url="route('home.index')"/>
        <x-layouts.backend.breadcrumb :title="trans('global.profile')" :is-active="true"/>
    </x-layouts.backend.hero>

    <x-layouts.backend.errors/>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                {{ Form::model($user, ['url' => route('user-profile.update', $user->id), 'method' => 'PUT', 'files' => true]) }}
                <div class="row">
                    <div class="col-md-3">
                        {{ Form::bsText('name', trans('validation.attributes.name')) }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::bsText('email', trans('validation.attributes.email')) }}
                    </div>
                    <div class="col-md-3">
                        <!-- Profile image -->
                        {{ Form::bsFile('profile_image', trans('validation.attributes.profile_image')) }}
                    </div>
                    <div class="col-md-12 text-end">
                        {{ Form::bsSave() }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
