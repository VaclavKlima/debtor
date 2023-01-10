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
                <x-form.model :action="route('user-profile.update')" :model="$user" files method="PUT">
                    <div class="row">
                        <div class="col-md-3">
                            <x-form.text name="first_name" :title="trans('validation.attributes.first_name')"/>
                        </div>
                        <div class="col-md-3">
                            <x-form.text name="last_name" :title="trans('validation.attributes.last_name')"/>
                        </div>
                        <div class="col-md-3">
                            <x-form.email name="email" :title="trans('validation.attributes.email')"/>
                        </div>
                        <div class="col-md-3">
                            <x-form.file name="profile_image" :title="trans('validation.attributes.profile_image')"/>
                        </div>
                        <div class="col-md-3">
                            <x-form.text name="bank_account_number" :title="trans('validation.attributes.bank_account_number')"/>
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
