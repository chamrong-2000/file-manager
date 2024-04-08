@extends('frontend.user.layouts.dash')
@section('section', lang('My Videos', 'videos'))
@section('title', $fileEntry->name)
@section('back', route('user.videos.index'))
@section('content')
    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card-v shadow-sm border-0">
                <div class="card-v-body p-0">
                    <div class="mb-4">
                        <div class="mb-3">
                            <iframe width="100%" height="400" src="{{ route('file.embed', $fileEntry->shared_id) }}"
                                title="{{ $fileEntry->name }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5>{{ $fileEntry->name }}</h5>
                            <p class="text-muted">
                                <span class="me-2"><i
                                        class="fa fa-eye me-2"></i>{{ formatNumber($fileEntry->views) }}</span>
                                <span><i class="fa fa-download me-2"></i>{{ formatNumber($fileEntry->downloads) }}</span>
                            </p>
                        </div>
                    </div>
                    <form action="{{ route('user.videos.update', $fileEntry->shared_id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label">{{ lang('Video Name', 'videos') }} : <span
                                    class="red">*</span></label>
                            <input type="text" name="filename" class="form-control form-control-md"
                                value="{{ $fileEntry->name }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">{{ lang('Access status', 'videos') }} : <span
                                    class="red">*</span></label>
                            <select name="access_status" class="form-select form-select-md">
                                <option value="1" {{ $fileEntry->access_status == 1 ? 'selected' : '' }}>
                                    {{ lang('Public', 'videos') }}</option>
                                <option value="0" {{ $fileEntry->access_status == 0 ? 'selected' : '' }}>
                                    {{ lang('Private', 'videos') }}</option>
                            </select>
                        </div>
                        @if (uploadSettings()->upload->password_protection)
                            <div class="mb-3">
                                <label class="form-label">{{ lang('Video Password (Optional)', 'videos') }}</label>
                                <div class="input-group input-icon input-password">
                                    <input type="password" name="password" class="form-control form-control-md"
                                        placeholder="{{ lang('Enter Password', 'videos') }}">
                                    <button type="button" id="input-group-button-right">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted">{{ lang('Leave password empty to remove it', 'videos') }}</small>
                            </div>
                        @endif
                        @if ($fileEntry->password)
                            <div class="alert alert-success">
                                <i class="fa fa-lock me-2"></i>{{ lang('Video protected by password', 'videos') }}
                            </div>
                        @endif
                        <button class="btn btn-primary btn-md">{{ lang('Save changes', 'videos') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-v shadow-sm border-0 h-100">
                <div class="card-v-body p-0">
                    @if ($fileEntry->access_status)
                        <button class="btn btn-success btn-lg w-100 mb-3 fileManager-share-file"
                            data-share='{"filename":"{{ $fileEntry->name }}","share_link":"{{ route('file.view', $fileEntry->shared_id) }}"}'>
                            <i class="fas fa-share-alt me-2"></i>{{ lang('Share', 'videos') }}</button>
                    @endif
                    <a href="{{ route('file.view', $fileEntry->shared_id) }}" target="_blank"
                        class="btn btn-dark btn-lg w-100 mb-3"><i
                            class="fa fa-eye me-2"></i>{{ lang('Preview', 'videos') }}</a>
                    <a href="{{ route('user.videos.download', $fileEntry->shared_id) }}"
                        class="btn btn-primary btn-lg w-100 mb-3"><i
                            class="fa fa-download me-2"></i>{{ lang('Download', 'videos') }}</a>
                    <form action="{{ route('user.videos.destroy', $fileEntry->shared_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-100  btn-lg confirm-action-form"><i
                                class="fa-regular fa-trash-can me-2"></i>{{ lang('Delete', 'videos') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="shareModal" class="modal fade share-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 pt-1 mb-1">
                    <h5 class="mb-4"><i class="fas fa-share-alt me-2"></i>{{ lang('Share this video', 'videos') }}</h5>
                    <p class="mb-3 text-ellipsis filename"></p>
                    <div class="mb-3">
                        <div class="share v2"></div>
                    </div>
                    <div class="preview-link mb-3">
                        <label class="form-label"><strong>{{ lang('Share link', 'videos') }}</strong></label>
                        <div class="input-group">
                            <input id="copy-share-link" type="text" class="form-control" value="" readonly>
                            <button type="button" class="btn btn-primary btn-md btn-copy"
                                data-clipboard-target="#copy-share-link"><i class="far fa-clone"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/clipboard/clipboard.min.js') }}"></script>
    @endpush
@endsection
