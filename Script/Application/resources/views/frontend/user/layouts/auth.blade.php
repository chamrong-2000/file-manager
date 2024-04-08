<!DOCTYPE html>
<html lang="{{ getLang() }}">

<head>
    @include('frontend.global.includes.head')
    @if (currentLanguage()->direction == 1)
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap/bootstrap.min.css') }}">
    @elseif(currentLanguage()->direction == 2)
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap/bootstrap.rtl.min.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/fontawesome/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.min.css') }}">
    @stack('styles_libs')
    <link rel="stylesheet" href="{{ asset('assets/css/extra/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/extra/extra.css') }}">
    <link rel="stylesheet" href="{{ asset(mix('assets/css/authentication.css')) }}">
    @if (currentLanguage()->direction == 2)
        <link rel="stylesheet" href="{{ asset(mix('assets/css/rtl/authentication.rtl.css')) }}">
    @endif
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/extra/custom.css') }}">
    {!! head_code() !!}
</head>

<body>
    <div class="sign">
        <nav class="sign-header">
            <div class="container d-flex align-items-center">
                <a class="logo" href="{{ route('home') }}">
                    <img src="{{ asset($settings['website_dark_logo']) }}" alt="{{ $settings['website_name'] }}" />
                </a>
                <div class="sign-actions ms-auto">
                    @include('frontend.global.includes.language-menu')
                    @auth
                        <form class="d-inline" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-secondary btn-md"><i class="fas fa-sign-out-alt"></i><span
                                    class="ms-2 d-none d-sm-inline-block">{{ lang('Logout', 'user') }}</span></button>
                        </form>
                    @else
                        @if (request()->routeIs('register'))
                            <a class="btn btn-secondary btn-md" href="{{ route('login') }}"><i
                                    class="fas fa-sign-in-alt"></i><span
                                    class="ms-2 d-none d-sm-inline-block">{{ lang('Sign In', 'user') }}</span></a>
                        @elseif(request()->routeIs('login'))
                            @if ($settings['website_registration_status'])
                                <a class="btn btn-secondary btn-md" href="{{ route('register') }}"><i
                                        class="fas fa-user-plus"></i><span
                                        class="ms-2 d-none d-sm-inline-block">{{ lang('Sign Up', 'user') }}</span></a>
                            @endif
                        @else
                            <a class="btn btn-secondary btn-md" href="{{ route('login') }}"><i
                                    class="fas fa-sign-in-alt"></i><span
                                    class="ms-2 d-none d-sm-inline-block">{{ lang('Sign In', 'user') }}</span></a>
                        @endif
                    @endauth
                </div>
            </div>
        </nav>
        <div class="sign-body">
            <div class="container">
                @yield('content')
            </div>
        </div>
        <footer class="footer mt-auto">
            <div class="container">
                <div class="d-flex align-items-center flex-column flex-md-row">
                    <p class="text-muted mb-3 mb-md-0">&copy; <span data-year></span>
                        {{ $settings['website_name'] }} - {{ lang('All rights reserved') }}.</p>
                    <div class="footer-links ms-md-auto">
                        @foreach ($footerMenuLinks as $footerMenuLink)
                            <div class="footer-link">
                                <a href="{{ $footerMenuLink->link }}">{{ $footerMenuLink->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @include('frontend.configurations.config')
    @include('frontend.configurations.widgets')
    @include('frontend.global.includes.scripts')
    {!! google_captcha() !!}
    @include('frontend.user.includes.toastr')
</body>

</html>
