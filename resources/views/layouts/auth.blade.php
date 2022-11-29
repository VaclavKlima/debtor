<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>OneUI - Bootstrap 5 Admin Template &amp; UI Framework</title>

    <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <!-- Modules -->
    @yield('css')
    @vite(['resources/sass/main.scss', 'resources/js/oneui/app.js'])
    @yield('js')
</head>

<body>

<div id="page-container">
    <main id="main-container" class="remember-theme">
        <div class="bg-image" style="background-image: url('{{ asset('media/auth-background.webp') }}');">
            <div class="row g-0 bg-primary-dark-op">
                <div class="hero-static col-lg-4 d-none d-lg-flex flex-column justify-content-center">
                    <div class="p-4 p-xl-5 flex-grow-1 d-flex align-items-center">
                        <div class="w-100">
                            <a class="link-fx fw-semibold fs-2 text-white" href="index.html">
                                Debtor
                                <span class="fw-normal">2.0</span>
                            </a>
                            <p class="text-white-75 me-xl-8 mt-2">
                                Welcome to your amazing app. Feel free to login and start managing your projects and clients.
                            </p>
                        </div>
                    </div>
                    <div class="p-4 p-xl-5 d-xl-flex justify-content-between align-items-center fs-sm">
                        <p class="fw-medium text-white-50 mb-0">
                            <strong>OneUI 5.4</strong> ©
                            <span data-toggle="year-copy" class="js-year-copy-enabled">2022</span>
                        </p>
                        <ul class="list list-inline mb-0 py-2">
                            <li class="list-inline-item">
                                <a class="text-white-75 fw-medium" href="javascript:void(0)">Legal</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-white-75 fw-medium" href="javascript:void(0)">Contact</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-white-75 fw-medium" href="javascript:void(0)">Terms</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="hero-static col-lg-8 d-flex flex-column align-items-center bg-body-extra-light">
                    <div class="p-3 w-100 d-lg-none text-center">
                        <a class="link-fx fw-semibold fs-3 text-dark" href="index.html">
                            Debtor
                            <span class="fw-normal">2.0</span>
                        </a>
                    </div>
                    <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
                        @yield('content')
                    </div>
                    <div class="px-4 py-3 w-100 d-lg-none d-flex flex-column flex-sm-row justify-content-between fs-sm text-center text-sm-start">
                        <p class="fw-medium text-black-50 py-2 mb-0">
                            <strong>OneUI 5.4</strong> ©
                            <span data-toggle="year-copy" class="js-year-copy-enabled">2022</span>
                        </p>
                        <ul class="list list-inline py-2 mb-0">
                            <li class="list-inline-item">
                                <a class="text-muted fw-medium" href="javascript:void(0)">Legal</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted fw-medium" href="javascript:void(0)">Contact</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted fw-medium" href="javascript:void(0)">Terms</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>

</html>
