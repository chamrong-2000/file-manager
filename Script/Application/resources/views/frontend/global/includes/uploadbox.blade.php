<div class="uploadbox">
    <div class="overlay"></div>
    <div class="uploadbox-content">
        <div class="uploadbox-header">
            <p class="h5 mb-0">{{ lang('Upload Your Videos', 'upload zone') }}</p>
            <div class="ms-auto d-flex align-item-center">
                <a href="#" class="upload-more-btn small me-3" data-dz-click>
                    <i class="fas fa-upload"></i>
                    <span class="ms-2 d-none d-sm-inline">{{ lang('Upload more', 'upload zone') }}</span>
                </a>
                <button type="button" class="btn-close ms-auto d-inline-block"></button>
            </div>
        </div>
        <div class="uploadbox-body">
            <div class="uploadbox-body-header">
                <div class="d-flex text-muted small">
                    <span>{!! str_replace(
                        '{max_file_size}',
                        '<strong>' . uploadSettings()->formates->file_size . '</strong>',
                        lang('Max Video Size {max_file_size}', 'upload zone'),
                    ) !!}
                        <span>/</span>
                        {!! str_replace(
                            '{files_duration}',
                            '<strong>' . uploadSettings()->formates->files_duration . '</strong>',
                            lang('Videos available for {files_duration}', 'upload zone'),
                        ) !!}
                    </span>
                </div>
                <div class="ms-auto small">
                    <a class="link reset-upload-box d-none"><i
                            class="fas fa-redo me-1"></i>{{ lang('Reset', 'upload zone') }}</a>
                </div>
            </div>
            <div class="uploadbox-body-content">
                <div class="uploadbox-drag" data-dz-click>
                    <div class="uploadbox-drag-inner">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <h3>{{ lang('Drag and drop your videos here to upload', 'upload zone') }}</h3>
                        <p class="mb-0">
                            {{ lang('You can also', 'upload zone') }} <a class="link"
                                data-dz-click>{{ lang('browse from your computer', 'upload zone') }}</a>.
                        </p>
                    </div>
                </div>
                <div class="uploadbox-wrapper">
                    <div id="dropzone"
                        class="dropzone row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 justify-content-center g-3">
                    </div>
                    <div id="upload-previews">
                        <div class="dz-preview dz-file-preview col">
                            <div class="dz-preview-container">
                                <div class="dz-details">
                                    <div class="dz-actions">
                                        <div class="row justify-content-between flex-nowrap">
                                            <div class="col-auto">
                                                <div class="d-flex align-item-center">
                                                    <a class="dz-edit me-2" data-dz-edit>
                                                        <i class="fas fa-lock-open"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <a class="dz-remove" data-dz-remove>
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mb-3">
                                        <img src="#" data-dz-icon />
                                    </div>
                                    <div class="dz-name mb-1">
                                        <span data-dz-name></span>
                                    </div>
                                    <div class="dz-size"></div>
                                    <div class="dz-details-info">
                                        <div class="dz-success-mark">
                                            <span><i class="fas fa-check"></i></span>
                                        </div>
                                        <div class="dz-error-mark">
                                            <span><i class="fas fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dz-progress">
                                    <span class="dz-upload" data-dz-uploadprogress></span>
                                    <span class="dz-upload-precent"></span>
                                </div>
                                <div class="dz-file-edit">
                                    <div class="overlay"></div>
                                    <div class="dz-file-edit-box">
                                        <div class="dz-file-edit-box-header">
                                            <div class="dz-file-edit-close ms-auto">
                                                <i class="fa fa-times"></i>
                                            </div>
                                        </div>
                                        <div class="dz-file-edit-box-body text-center" data-simplebar>
                                            <div class="d-flex justify-content-center mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    width="64px" height="64px">
                                                    <path class="icon-color"
                                                        d="M7.9,256C7.9,119,119,7.9,256,7.9C393,7.9,504.1,119,504.1,256c0,137-111.1,248.1-248.1,248.1C119,504.1,7.9,393,7.9,256z">
                                                    </path>
                                                    <path fill="#FFF" d="M133.7 240.2H378.29999999999995V400H133.7z">
                                                    </path>
                                                    <path fill="#FFF"
                                                        d="M349.7,340.1c-7.7,0-14-6.3-14-14v-136c0-44-35.8-79.8-79.8-79.8s-79.8,35.8-79.8,79.8v136c0,7.7-6.3,14-14,14s-14-6.3-14-14v-136c0-59.4,48.3-107.7,107.7-107.7s107.7,48.3,107.7,107.7v136C363.7,333.9,357.4,340.1,349.7,340.1z">
                                                    </path>
                                                    <path class="icon-color"
                                                        d="M282.6,309.3c0-14.7-11.9-26.6-26.6-26.6c-14.7,0-26.6,11.9-26.6,26.6c0,9.4,4.8,17.6,12.1,22.3c0,4.2,0,9.4,0,11.5c0,8,6.5,14.5,14.5,14.5s14.5-6.5,14.5-14.5c0-2,0-7.2,0-11.5C277.8,326.9,282.6,318.6,282.6,309.3z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="mb-3">
                                                <h5>{{ lang('Password protection', 'upload zone') }}</h5>
                                                <p class="mb-0 text-muted small">
                                                    {{ lang('The password helps protect your videos from public accessing', 'upload zone') }}
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <input type="password" fill-status="false"
                                                    class="file-password form-control form-control-md"
                                                    placeholder="{{ lang('Enter password', 'upload zone') }}"
                                                    disabled />
                                            </div>
                                            <div>
                                                <button
                                                    class="btn btn-primary btn-md dz-file-edit-submit">{{ lang('Submit', 'upload zone') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uploadbox-wrapper-form mt-4">
                        <div class="mb-3">
                            <label class="form-label fw-500">{{ lang('Auto delete file', 'upload zone') }}</label>
                            <select name="upload_auto_delete" class="upload-auto-delete form-select form-select-md">
                                @foreach (autoDeletePeriods() as $autoDeletePeriodKey => $autoDeletePeriodValue)
                                    <option value="{{ $autoDeletePeriodKey }}"
                                        data-action="{{ $autoDeletePeriodValue['days'] }}">
                                        {{ $autoDeletePeriodValue['title'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button
                                class="btn btn-primary btn-lg upload-files-btn">{{ lang('Upload', 'upload zone') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dz-dragbox">
    <div class="dz-dragbox-inner">
        <i class="fas fa-file-export fa-4x"></i>
        <h2 class="my-4">{{ lang('Drop Your Video Here', 'upload zone') }}</h2>
        <h3>{{ lang('Add your videos by drag-and-dropping them on this window 😉', 'upload zone') }}</h3>
    </div>
</div>
@push('scripts_libs')
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.min.js') }}"></script>
@endpush
@push('config')
    @php
    $exceedTheAllowedSizeError = str_replace('{maxFileSize}', uploadSettings()->formates->file_size, lang('File is too big, Max file size {maxFileSize}', 'upload zone'));
    @endphp
    <script>
        "use strict";
        const uploadConfig = {
            types: {
                accepted: "{{ allowedTypes() }}",
                icons: {
                    mp4: "{{ asset('images/types/mp4.png') }}",
                    webm: "{{ asset('images/types/webm.png') }}",
                },
            },
            translation: {
                formatSizes: ["{{ lang('B') }}", "{{ lang('KB') }}", "{{ lang('MB') }}","{{ lang('GB') }}", "{{ lang('TB') }}"],
                shareLink:"{{ lang('Share Link', 'upload zone') }}",
                openLink:"{{ lang('Open Link', 'upload zone') }}",
            },
            chunkSize: "{{ $settings['website_chunk_size'] * 1048576 }}",
            maxUploadFiles: "{{ uploadSettings()->upload->upload_at_once }}",
            maxFileSize: "{{ uploadSettings()->upload->file_size }}",
            exceedTheAllowedSizeError: "{{ $exceedTheAllowedSizeError }}",
            filesDuration: "{{ uploadSettings()->upload->files_duration }}",
            filesDurationError: "{{ lang('Invalid file auto delete time', 'upload zone') }}",
            clientReminingSpace: "{{ uploadSettings()->storage->remining->number }}",
            clientReminingSpaceError: "{{ lang('insufficient storage space please ensure sufficient space', 'upload zone') }}",
            closeUploadBoxAlert: "{{ lang('Are you sure you want to close this window?', 'upload zone') }}",
            nofilesAttachedError: "{{ lang('No files attached', 'upload zone') }}",
            unacceptableFileTypesError: "{{ lang('You cannot upload files of this type.', 'upload zone') }}",
            fileDuplicateError: "{{ lang('File with the same name already attached', 'upload zone') }}",
            emptyFilesError: "{{ lang('Empty files cannot be uploaded', 'upload zone') }}",
        };
    </script>
    @include('frontend.global.includes.dropzone-options')
@endpush
