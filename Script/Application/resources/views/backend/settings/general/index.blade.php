@extends('backend.layouts.form')
@section('title', __('General'))
@section('section', __('Settings'))
@section('back', route('admin.settings.index'))
@section('content')
    <form id="vironeer-submited-form" action="{{ route('admin.settings.general.update') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="card mb-3">
            <div class="card-header">
                {{ __('General') }}
            </div>
            <div class="card-body">
                <div class="row g-3 mb-2">
                    <div class="col-lg-6">
                        <label class="form-label">{{ __('Site Name') }} : <span class="red">*</span></label>
                        <input type="text" name="website_name" class="form-control"
                            value="{{ $settings['website_name'] }}" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ __('Site URL') }} : <span class="red">*</span></label>
                        <input type="text" name="website_url" class="form-control" value="{{ $settings['website_url'] }}"
                            required>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ __('Contact email') }} : <span class="red">*</span></label>
                        <input type="text" name="contact_email" class="form-control"
                            value="{{ $settings['contact_email'] }}" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ __('Terms of service') }} : <small
                                class="text-muted">({{ __('Used on registration & cookies') }})</small></label>
                        <input type="text" name="terms_of_service_link" class="form-control"
                            value="{{ $settings['terms_of_service_link'] }}">
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ __('Date format') }} : <span class="red">*</span></label>
                        <select name="date_format" class="form-select">
                            @foreach (dateFormatsArray() as $formatKey => $formatValue)
                                <option value="{{ $formatKey }}" @if ($formatKey == $settings['date_format']) selected @endif>
                                    {{ $formatValue }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">{{ __('Timezone') }} : <span class="red">*</span></label>
                        <select name="timezone" class="form-select">
                            @foreach (timezonesArray() as $timezoneKey => $timezoneValue)
                                <option value="{{ $timezoneKey }}" @if ($timezoneKey == $settings['timezone']) selected @endif>
                                    {{ $timezoneValue }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                {{ __('Colors') }}
            </div>
            <div class="card-body">
                <div class="row g-3 mb-2">
                    <div class="col-lg-12 col-xl-3">
                        <label class="form-label">{{ __('Primary color') }} : <span class="red">*</span></label>
                        <div class="vironeer-color-picker input-group">
                            <span class="input-group-text colorpicker-input-addon">
                                <i></i>
                            </span>
                            <input type="text" name="website_primary_color" class="form-control"
                                value="{{ $settings['website_primary_color'] }}" required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-3">
                        <label class="form-label">{{ __('Secondary color') }} : <span class="red">*</span></label>
                        <div class="vironeer-color-picker input-group">
                            <span class="input-group-text colorpicker-input-addon">
                                <i></i>
                            </span>
                            <input type="text" name="website_secondary_color" class="form-control"
                                value="{{ $settings['website_secondary_color'] }}" required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-3">
                        <label class="form-label">{{ __('Third color') }} : <span class="red">*</span></label>
                        <div class="vironeer-color-picker input-group">
                            <span class="input-group-text colorpicker-input-addon">
                                <i></i>
                            </span>
                            <input type="text" name="website_third_color" class="form-control"
                                value="{{ $settings['website_third_color'] }}" required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-3">
                        <label class="form-label">{{ __('Background Color') }} : <span class="red">*</span></label>
                        <div class="vironeer-color-picker input-group">
                            <span class="input-group-text colorpicker-input-addon">
                                <i></i>
                            </span>
                            <input type="text" name="website_background_color" class="form-control"
                                value="{{ $settings['website_background_color'] }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                {{ __('Actions') }}
            </div>
            <div class="card-body">
                <div class="row g-3 mb-2">
                    <div class="col-lg-3 col-xl-3">
                        <label class="form-label">{{ __('Email Verification') }} : <span class="red">*</span></label>
                        <input type="checkbox" name="website_email_verify_status" data-toggle="toggle"
                            @if ($settings['website_email_verify_status']) checked @endif>
                    </div>
                    <div class="col-lg-3 col-xl-3">
                        <label class="form-label">{{ __('Website Registration') }} : <span class="red">*</span></label>
                        <input type="checkbox" name="website_registration_status" data-toggle="toggle"
                            @if ($settings['website_registration_status']) checked @endif>
                    </div>
                    <div class="col-lg-3 col-xl-3">
                        <label class="form-label">{{ __('Force SSL') }} : <span class="red">*</span></label>
                        <input type="checkbox" name="website_force_ssl_status" data-toggle="toggle"
                            @if ($settings['website_force_ssl_status']) checked @endif>
                    </div>
                    <div class="col-lg-3 col-xl-3">
                        <label class="form-label">{{ __('GDPR Cookie') }} : <span class="red">*</span></label>
                        <input type="checkbox" name="website_cookie" data-toggle="toggle"
                            @if ($settings['website_cookie']) checked @endif>
                    </div>
                    <div class="col-lg-3 col-xl-3">
                        <label class="form-label">{{ __('Website blog') }} : <span class="red">*</span></label>
                        <input type="checkbox" name="website_blog_status" data-toggle="toggle"
                            @if ($settings['website_blog_status']) checked @endif>
                    </div>
                    <div class="col-lg-3 col-xl-3">
                        <label class="form-label">{{ __('Website FAQ') }} : <span class="red">*</span></label>
                        <input type="checkbox" name="website_faq_status" data-toggle="toggle"
                            @if ($settings['website_faq_status']) checked @endif>
                    </div>
                    <div class="col-lg-3 col-xl-3">
                        <label class="form-label">{{ __('Contact Form') }} : <span class="red">*</span></label>
                        <input type="checkbox" name="website_contact_form_status" data-toggle="toggle"
                            @if ($settings['website_contact_form_status']) checked @endif>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                {{ __('Logo & Favicon') }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="my-3">
                            <div class="vironeer-image-preview bg-light">
                                <img id="vironeer-preview-img-1" src="{{ asset($settings['website_dark_logo']) }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input id="vironeer-image-targeted-input-1" type="file" name="website_dark_logo"
                                accept=".jpg, .jpeg, .png, .svg" class="form-control" hidden>
                            <button data-id="1" type="button"
                                class="vironeer-select-image-button btn btn-secondary btn-lg w-100 mb-2">{{ __('Choose Dark Logo') }}</button>
                            <small class="text-muted">{{ __('Supported (PNG, JPG, JPEG, SVG)') }}</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="my-3">
                            <div class="vironeer-image-preview bg-dark">
                                <img id="vironeer-preview-img-2" src="{{ asset($settings['website_light_logo']) }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input id="vironeer-image-targeted-input-2" type="file" name="website_light_logo"
                                accept=".jpg, .jpeg, .png, .svg" class="form-control" hidden>
                            <button data-id="2" type="button"
                                class="vironeer-select-image-button btn btn-secondary btn-lg w-100 mb-2">{{ __('Choose Light Logo') }}</button>
                            <small class="text-muted">{{ __('Supported (PNG, JPG, JPEG, SVG)') }}</small>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="my-3">
                            <div class="vironeer-image-preview bg-light">
                                <img id="vironeer-preview-img-3" src="{{ asset($settings['website_favicon']) }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input id="vironeer-image-targeted-input-3" type="file" name="website_favicon"
                                accept=".jpg, .jpeg, .png, .ico" class="form-control" hidden>
                            <button data-id="3" type="button"
                                class="vironeer-select-image-button btn btn-secondary btn-lg w-100 mb-2">{{ __('Choose Favicon') }}</button>
                            <small class="text-muted">{{ __('Supported (PNG, JPG, JPEG, ICO)') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        {{ __('Social Image') }} <small class="text-muted">{{ __('(og:image)') }}</small>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="vironeer-image-preview-box bg-light">
                                <img id="vironeer-preview-img-4" src="{{ asset($settings['website_social_image']) }}"
                                    width="100%" height="315px">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input id="vironeer-image-targeted-input-4" type="file" name="website_social_image"
                                accept="image/jpg, image/jpeg" class="form-control" hidden>
                            <button data-id="4" type="button"
                                class="vironeer-select-image-button btn btn-secondary btn-lg w-100 mb-2">{{ __('Choose Social Image') }}</button>
                            <small class="text-muted">
                                {{ __('Supported (JPEG, JPG) / Size') }} <strong>600x315px.</strong>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        {{ __('Background Pattern') }}
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <div class="vironeer-image-preview-box bg-primary">
                                <img id="vironeer-preview-img-5"
                                    src="{{ asset($settings['website_home_background_pattern']) }}" width="100%"
                                    height="315px">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input id="vironeer-image-targeted-input-5" type="file"
                                name="website_home_background_pattern" accept="image/png" class="form-control" hidden>
                            <button data-id="5" type="button"
                                class="vironeer-select-image-button btn btn-secondary btn-lg w-100 mb-2">{{ __('Choose Background Pattern') }}</button>
                            <small class="text-muted">
                                {{ __('Supported (PNG) / Recommend Size') }} <strong>300x300px.</strong>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @push('styles_libs')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}">
    @endpush
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    @endpush
    @push('scripts')
        <script>
            $(function() {
                $('.vironeer-color-picker').colorpicker();
            });
        </script>
    @endpush
@endsection
