@extends('backend.layouts.form')
@section('title', __('Edit Language | ') . $language->name)
@section('section', __('Settings'))
@section('container', 'container-max-lg')
@section('back', route('languages.index'))
@section('content')
    <form id="vironeer-submited-form" action="{{ route('languages.update', $language->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="vironeer-file-preview-box mb-3 bg-light p-4 text-center">
                    <div class="file-preview-box mb-3">
                        <img id="filePreview" src="{{ asset($language->flag) }}" class="rounded-3"
                            alt="{{ $language->name }}" width="25" height="25">
                    </div>
                    <button id="selectFileBtn" type="button"
                        class="btn btn-secondary mb-2">{{ __('Choose Flag') }}</button>
                    <input id="selectedFileInput" type="file" name="flag" accept="image/png, image/jpg, image/jpeg"
                        hidden>
                    <small class="text-muted d-block">{{ __('Allowed (PNG, JPG, JPEG)') }}</small>
                    <small class="text-muted d-block">{{ __('Image will be resized into (25x25)') }}</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Name') }} : <span class="red">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ $language->name }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('Direction') }} : <span class="red">*</span></label>
                    <select name="direction" class="form-select">
                        <option value="1" {{ $language->direction == 1 ? 'selected' : '' }}>{{ __('LTR') }}
                        </option>
                        <option value="2" {{ $language->direction == 2 ? 'selected' : '' }}>{{ __('RTL') }}
                        </option>
                    </select>
                </div>
                <div class="mb-0 form-check">
                    <input class="form-check-input" type="checkbox" name="is_default" id="is_default"
                        {{ env('DEFAULT_LANGUAGE') == $language->code ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_default">{{ __('Default language') }}</label>
                </div>
            </div>
        </div>
    </form>
@endsection
