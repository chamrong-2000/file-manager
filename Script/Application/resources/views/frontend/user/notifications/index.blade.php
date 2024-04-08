@extends('frontend.user.layouts.dash')
@section('title', lang('Notifications', 'user') . ' (' . $unreadNotificationsCount . ')')
@section('content')
    @if ($notifications->count() > 0)
        <div class="notifications-page mb-4">
            @foreach ($notifications as $notification)
                @if ($notification->link)
                    <a href="{{ route('user.notifications.view', hashid($notification->id)) }}"
                        class="vr__notification__item d-flex justify-content-between align-items-center">
                        <div class="flex-shrink-0">
                            <img class="rounded-2" src="{{ $notification->image }}" width="60" height="60">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1">{{ $notification->title }}</h5>
                            <p class="mb-0 text-muted">{{ $notification->created_at->diffforhumans() }}</p>
                        </div>
                        @if (!$notification->status)
                            <div class="flex-grow-2 ms-3">
                                <span class="icon text-danger"><i class="fas fa-circle"></i></span>
                            </div>
                        @endif
                    </a>
                @else
                    <div class="notification-item d-flex justify-content-between align-items-center">
                        <div class="flex-shrink-0">
                            <img class="rounded-2" src="{{ $notification->image }}" width="60" height="60">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1">{{ $notification->title }}</h5>
                            <p class="mb-0 text-muted">{{ $notification->created_at->diffforhumans() }}</p>
                        </div>
                        @if (!$notification->status)
                            <div class="flex-grow-2 ms-3">
                                <span class="icon text-danger"><i class="fas fa-circle"></i></span>
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
        {{ $notifications->links() }}
    @else
        @section('empty', true)
        @include('frontend.user.includes.empty')
    @endif
@endsection
