@extends('frontend.user.layouts.auth')
@section('title', lang('Complete registration', 'user'))
@section('content')
    <div class="sign-form sign-form-lg">
        <div class="sign-form-header mb-4">
            <h2 class="sign-form-title text-center">{{ lang('Complete registration', 'user') }}</h2>
            <p class="sign-form-text text-center">
                {{ lang('We need a little more information to complete your registration.', 'user') }}</p>
        </div>
        <div class="user-avatar text-center mb-4">
            <img src="{{ $data['avatar'] }}" width="100" height="100" class="rounded-circle">
        </div>
        <form action="{{ route('complete.registration', $token) }}" method="POST">
            @csrf
            <div class="row row-cols-1 row-cols-sm-2 g-3 mb-3">
                <div class="col">
                    <label class="form-label">{{ lang('First Name', 'forms') }} : <span class="red">*</span></label>
                    <input id="firstname" type="firstname" name="firstname" class="form-control form-control-lg"
                        value="{{ $data['firstname'] ?? old('firstname') }}"
                        placeholder="{{ lang('First Name', 'forms') }}" maxlength="50" required>
                </div>
                <div class="col">
                    <label class="form-label">{{ lang('Last Name', 'forms') }} : <span class="red">*</span></label>
                    <input id="lastname" type="lastname" name="lastname" class="form-control form-control-lg"
                        value="{{ $data['lastname'] ?? old('lastname') }}"
                        placeholder="{{ lang('Last Name', 'forms') }}" maxlength="50" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ lang('Username', 'forms') }} : <span class="red">*</span></label>
                <input id="username" type="username" name="username" class="form-control form-control-lg"
                    value="{{ old('username') }}" placeholder="{{ lang('Username', 'forms') }}" minlength="6"
                    maxlength="50" required>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ lang('Email address', 'forms') }} : <span class="red">*</span></label>
                <input id="email" type="email" name="email" class="form-control form-control-lg"
                    value="{{ $data['email'] ?? old('email') }}" placeholder="{{ lang('Email address', 'forms') }}"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ lang('Password', 'forms') }} : <span class="red">*</span>
                </label>
                <div class="form-group input-password">
                    <input id="password" type="password" name="password" class="form-control form-control-lg"
                        placeholder="{{ lang('Password', 'forms') }}" minlength="8" required>
                    <button>
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ lang('Confirm password', 'forms') }} : <span class="red">*</span>
                </label>
                <div class="form-group input-password">
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="form-control form-control-lg" placeholder="{{ lang('Confirm password', 'forms') }}"
                        minlength="8" required>
                    <button type="button">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
            </div>
            @if ($settings['terms_of_service_link'])
                <div class="form-check mb-3">
                    <input id="terms" name="terms" class="form-check-input" type="checkbox"
                        @if (old('terms')) checked @endif required>
                    <label class="form-check-label">
                        {{ lang('I agree to the', 'user') }} <a href="{{ $settings['terms_of_service_link'] }}"
                            class="link">{{ lang('terms of service', 'user') }}</a>
                    </label>
                </div>
            @endif
            {!! display_captcha() !!}
            <button class="btn btn-primary btn-lg w-100">{{ lang('Continue', 'user') }}</button>
        </form>
    </div>
@endsection
