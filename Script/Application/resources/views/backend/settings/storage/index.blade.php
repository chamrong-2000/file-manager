@extends('backend.layouts.grid')
@section('title', __('Storage Providers'))
@section('section', __('Settings'))
@section('container', 'container-max-lg')
@section('back', route('admin.settings.index'))
@section('modal', __('Settings'))
@section('content')
    <div class="card">
        <table id="datatable" class="table w-100">
            <thead>
                <tr>
                    <th class="tb-w-1x">{{ __('#') }}</th>
                    <th class="tb-w-3x">{{ __('Logo') }}</th>
                    <th class="tb-w-3x">{{ __('name') }}</th>
                    <th class="tb-w-7x">{{ __('Status') }}</th>
                    <th class="tb-w-7x">{{ __('Last Update') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($storageProviders as $storageProvider)
                    <tr class="item">
                        <td>{{ $storageProvider->id }}</td>
                        <td><img src="{{ asset($storageProvider->logo) }}" height="40" width="40"></td>
                        <td>{{ $storageProvider->name }}
                            {{ env('FILESYSTEM_DRIVER') == $storageProvider->symbol ? __('(Default)') : '' }}
                        </td>
                        <td>
                            @if ($storageProvider->status)
                                <span class="badge bg-success">{{ __('Enabled') }}</span>
                            @else
                                <span class="badge bg-danger">{{ __('Disabled') }}</span>
                            @endif
                        </td>
                        <td>{{ vDate($storageProvider->updated_at) }}</td>
                        <td>
                            <div class="text-end">
                                <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown"
                                    aria-expanded="true">
                                    <i class="fa fa-ellipsis-v fa-sm text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-sm-end" data-popper-placement="bottom-end">
                                    @if ($storageProvider->symbol != 'local')
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('admin.settings.storage.edit', $storageProvider->id) }}"><i
                                                    class="fa fa-edit me-2"></i>{{ __('Edit') }}</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                    @endif
                                    <li>
                                        <form
                                            action="{{ route('admin.settings.storage.default', $storageProvider->id) }}"
                                            method="POST">
                                            @csrf
                                            <button class="vironeer-form-confirm dropdown-item"><i
                                                    class="fas fa-thumbtack me-2"></i>{{ __('Set As Default') }}</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">{{ __('Storage settings') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="storageSettingsForm" action="{{ route('admin.settings.storage.updateSettings') }}"
                        method="POST">
                        @csrf
                        <div class="alert alert-warning">
                            {{ __('The Chunked Upload provides a way to upload large files by chunking them into a sequence of parts that can be uploaded individually.') }}
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Chunk size') }} : <span class="red">*</span>
                            </label>
                            <div class="custom-input-group input-group">
                                <input type="number" name="website_chunk_size" class="form-control"
                                    value="{{ $settings['website_chunk_size'] }}">
                                <span class="input-group-text"><i
                                        class="fas fa-hdd me-2"></i><strong>{{ __('MB') }}</strong></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button form="storageSettingsForm" class="btn btn-primary">{{ __('Save changes') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
