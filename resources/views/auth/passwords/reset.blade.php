@extends('layouts.auth')
@section('title', trans('global.password_reset'))
@section('content')
    <div class="w-100">
        <div class="text-center mb-5">
            <p class="mb-3">
                <img src="{{ asset('media/favicons/coin64x64.png') }}" alt="Debtor logo">
            </p>
            <h1 class="fw-bold mb-2">
                @lang('global.password_reset')
            </h1>
            <p class="fw-medium text-muted">
                @lang('auth.enter_email_to_reset_password')
            </p>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-sm-8 col-xl-4">
                <x-form.open :action="route('password.update')">
                    <x-form.hidden name="token" :value="$token"/>

                    <div class="mb-4">
                        <x-form.email name="email" :value="$email" class="form-control-lg form-control-alt py-3" :placeholder="trans('validation.attributes.email')"/>
                    </div>
                    <div class="mb-4">
                        <x-form.password name="password" class="form-control-lg form-control-alt py-3" :placeholder="trans('validation.attributes.password')"/>
                    </div>
                    <div class="mb-4">
                        <x-form.password name="password_confirmation" class="form-control-lg form-control-alt py-3" :placeholder="trans('validation.attributes.password_confirmation')"/>
                    </div>
                    <div class="d-flex justify-content-end align-items-center mb-4">
                        <div>
                            <x-form.save class="btn btn-lg btn-alt-primary">
                                <i class="fa fa-fw fa-sign-in-alt me-1  opacity-50"></i> @lang('auth.reset_password')
                            </x-form.save>
                        </div>
                    </div>
                </x-form.open>
            </div>
        </div>
    </div>
@endsection
