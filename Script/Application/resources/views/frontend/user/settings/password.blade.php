@extends('frontend.user.layouts.dash')
@section('section', lang('Settings', 'user'))
@section('title', lang('Change Password', 'user'))
@section('content')
    <div class="settingsbox">
        <div class="row g-3">
            <div class="col-xl-3">
                @include('frontend.user.includes.list')
            </div>
            <div class="col-xl-9">
                <div class="card-v v3 p-0">
                    <div class="settings-form">
                        <div class="settings-form-header">
                            <h5 class="mb-0">{{ lang('Change Password', 'user') }}</h5>
                        </div>
                        <div class="settings-form-body">
                            <form id="deatilsForm" action="{{ route('user.settings.password.update') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">{{ lang('Password', 'forms') }} : <span
                                            class="red">*</span></label>
                                    <input type="password" class="form-control form-control-md" name="current-password"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ lang('New Password', 'forms') }} : <span
                                            class="red">*</span></label>
                                    <input type="password" class="form-control form-control-md" name="new-password"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">{{ lang('Confirm New Password', 'forms') }} : <span
                                            class="red">*</span></label>
                                    <input type="password" class="form-control form-control-md"
                                        name="new-password_confirmation" required>
                                </div>
                                <button class="btn btn-primary btn-md">
                                    {{ lang('Save Changes', 'user') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
