@extends('layouts.auth')

@section('content')
    <div class="w-100">
        <div class="text-center mb-5">
            <p class="mb-3">
                <img src="{{ asset('media/favicons/coin64x64.png') }}" alt="Debtor logo">
            </p>
            <h1 class="fw-bold mb-2">
                {{ trans('global.sign_in') }}
            </h1>
            <p class="fw-medium text-muted">
                {{ trans('global.please_login') }}
            </p>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-sm-8 col-xl-4">
                {{ Form::open(['url' => route('login')]) }}
                <div class="mb-4">
                    {{ Form::bsEmail('email', null, null, ['class' => 'form-control-lg form-control-alt py-3', 'placeholder' => trans('validation.attributes.email')]) }}
                </div>
                <div class="mb-4">
                    {{ Form::bsPassword('password', null,  ['class' => 'form-control-lg form-control-alt py-3', 'placeholder' => trans('validation.attributes.password')]) }}
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <a class="text-muted fs-sm fw-medium d-block d-lg-inline-block mb-1" href="{{ route('password.request') }}">
                            {{ trans('global.forgot_password') }}
                        </a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-lg btn-alt-primary">
                            <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> {{ trans('global.sign_in') }}
                        </button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
