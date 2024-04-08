<!DOCTYPE html>
<html lang="{{ getLang() }}">

<head>
    @include('frontend.global.includes.head')
    @include('frontend.global.includes.styles')
    {!! head_code() !!}
</head>

<body>
    <header class="header">
        @include('frontend.includes.navbar')
        @if (!$__env->yieldContent('hide_header'))
            <div class="wrapper wrapper-page">
                <div class="container-lg">
                    <div class="wrapper-content">
                        <h1 class="page-title">{{ shortertext($__env->yieldContent('title'), 30) }}</h1>
                    </div>
                </div>
            </div>
        @endif
    </header>
    <section class="section @yield('section_class')">
        @yield('content')
    </section>
    @include('frontend.global.includes.footer')
    @include('frontend.configurations.config')
    @include('frontend.configurations.widgets')
    @include('frontend.global.includes.scripts')
</body>

</html>
