@extends('layouts.auth')

@section('content')
    <div class="w-100">
        <div class="text-center mb-5">
            <p class="mb-3">
                <i class="fa fa-2x fa-circle-notch text-primary-light"></i>
            </p>
            <h1 class="fw-bold mb-2">
                Reset password.
            </h1>
            <p class="fw-medium text-muted">
                Please enter email in order to reset password.
            </p>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-sm-8 col-xl-4">
                {{ Form::open(['url' => route('password.email')]) }}
                <div class="mb-4">
                    {{ Form::bsEmail('email', null, null, ['class' => 'form-control-lg form-control-alt py-3', 'placeholder' => 'Email']) }}
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <a class="text-muted fs-sm fw-medium d-block d-lg-inline-block mb-1" href="{{ route('login') }}">
                            Back to login
                        </a>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-lg btn-alt-primary">
                            <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Send Password Reset link
                        </button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
