@extends('backend.layouts.grid')
@section('title', $user->firstname . ' ' . $user->lastname . ' | Login logs')
@section('back', route('admin.users.index'))
@section('container', 'container-max-lg')
@section('content')
    @include('backend.includes.userlist')
    <div class="card custom-card">
        <div class="card-body">
            @forelse ($logs as $log)
                <div class="logs-box justify-items-center">
                    <div class="content ms-1 d-flex justify-content-between">
                        <span>
                            <h5><a href="{{ route('admin.users.logsbyip', $log->ip) }}">{{ $log->ip }}</a>
                            </h5>
                            <p class="text-muted"><i class="fas fa-map-marker-alt me-2"></i>{{ $log->location }}
                            </p>
                        </span>
                        <span>
                            <a href="#" data-user="{{ $user->id }}" data-log="{{ $log->id }}"
                                class="vironeer-getlog-btn btn btn-blue btn-sm"><i class="fas fa-desktop"></i></a>
                        </span>
                    </div>
                </div>
            @empty
                @include('backend.includes.empty')
            @endforelse
        </div>
    </div>
    {{ $logs->links() }}
    @include('backend.includes.logsmodal')
@endsection
