@stack('top_scripts')
<script src="{{ asset('assets/vendor/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/simplebar/simplebar.min.js') }}"></script>
@stack('scripts_libs')
<script src="{{ asset(mix('assets/js/application.js')) }}"></script>
<script src="{{ asset('assets/js/extra/extra.js') }}"></script>
@toastr_render
@stack('scripts')
