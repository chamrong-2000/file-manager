@if (currentLanguage()->direction == 1)
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap/bootstrap.min.css') }}">
@elseif(currentLanguage()->direction == 2)
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap/bootstrap.rtl.min.css') }}">
@endif
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/fontawesome/v6.1.1/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/simplebar/simplebar.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/extra/colors.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/extra/extra.css') }}">
@stack('styles_libs')
<link rel="stylesheet" href="{{ asset(mix('assets/css/application.css')) }}">
@if (currentLanguage()->direction == 2)
    <link rel="stylesheet" href="{{ asset(mix('assets/css/rtl/application.rtl.css')) }}">
@endif
@stack('styles')
<link rel="stylesheet" href="{{ asset('assets/css/extra/custom.css') }}">
