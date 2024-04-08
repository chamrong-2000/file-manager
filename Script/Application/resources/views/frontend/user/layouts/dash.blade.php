<!DOCTYPE html>
<html lang="{{ getLang() }}">

<head>
    @include('frontend.global.includes.head')
    @push('styles_libs')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert/sweetalert2.min.css') }}">
    @endpush
    @include('frontend.global.includes.styles')
    {!! head_code() !!}
</head>

<body {!! $__env->yieldContent('upload') ? 'id="dropzone-wrapper"' : '' !!}>
    <header class="header">
        <div class="nav-bar v2">
            <div class="container-lg">
                <div class="nav-bar-container">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset($settings['website_light_logo']) }}" alt="{{ $settings['website_name'] }}" />
                    </a>
                    <div class="nav-bar-menu">
                        <div class="overlay"></div>
                        <div class="nav-bar-links">
                            <div class="nav-bar-menu-header">
                                <a class="nav-bar-menu-close ms-auto">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                            <a href="{{ route('user.dashboard') }}" class="link">
                                <i class="fa-solid fa-table-columns me-1"></i>
                                <span>{{ lang('Dashboard', 'user') }}</span>
                            </a>
                            <a href="{{ route('user.videos.index') }}" class="link">
                                <i class="fa-solid fa-circle-play me-1"></i>
                                <span>{{ lang('My Videos', 'user') }}</span>
                            </a>
                            @include('frontend.global.includes.language-menu')
                        </div>
                    </div>
                    <div class="nav-bar-actions">
                        <div class="drop-down notifications ms-3" data-dropdown>
                            <div class="drop-down-btn">
                                <i class="{{ $unreadUserNotificationsAll ? 'fa' : 'far' }} fa-bell fa-lg"></i>
                                @if ($unreadUserNotificationsAll)
                                    <div class="notifications-count">{{ $unreadUserNotifications }}</div>
                                @endif
                            </div>
                            <div class="drop-down-menu">
                                <div class="notifications-header">
                                    <p class="notifications-title">{{ lang('Notifications', 'user') }}
                                        ({{ $unreadUserNotificationsAll }})</p>
                                    @if ($unreadUserNotificationsAll)
                                        <a href="{{ route('user.notifications.readall') }}"
                                            class="confirm-action notifications-action link">{{ lang('Make All as Read', 'user') }}</a>
                                    @else
                                        <span
                                            class="text-muted notifications-action">{{ lang('Make All as Read', 'user') }}</span>
                                    @endif
                                </div>
                                <div class="notifications-body" data-simplebar>
                                    <div class="notifications-items">
                                        @forelse ($userNotifications as $userNotification)
                                            @if ($userNotification->link)
                                                <a href="{{ route('user.notifications.view', hashid($userNotification->id)) }}"
                                                    class="notifications-item {{ !$userNotification->status ? 'unread' : '' }}">
                                                    <div class="notifications-item-img">
                                                        <img src="{{ $userNotification->image }}"
                                                            alt="{{ $userNotification->title }}"
                                                            title="{{ $userNotification->title }}" />
                                                    </div>
                                                    <div class="notifications-item-info">
                                                        <p class="notifications-item-title">
                                                            {{ $userNotification->title }}</p>
                                                        <p class="notifications-item-text">
                                                            {{ $userNotification->created_at->diffforhumans() }}</p>
                                                    </div>
                                                </a>
                                            @else
                                                <div
                                                    class="notifications-item {{ !$userNotification->status ? 'unread' : '' }}">
                                                    <div class="notifications-item-img">
                                                        <img src="{{ $userNotification->image }}"
                                                            alt="{{ $userNotification->title }}"
                                                            title="{{ $userNotification->title }}" />
                                                    </div>
                                                    <div class="notifications-item-info">
                                                        <p class="notifications-item-title">
                                                            {{ $userNotification->title }}</p>
                                                        <p class="notifications-item-text">
                                                            {{ $userNotification->created_at->diffforhumans() }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                        @empty
                                            <div class="py-5 text-center">
                                                <small
                                                    class="text-muted mb-0">{{ lang('No notifications found', 'user') }}</small>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                                <a href="{{ route('user.notifications') }}" class="notifications-footer">
                                    {{ lang('View All', 'user') }}
                                </a>
                            </div>
                        </div>
                        @include('frontend.global.includes.user-menu')
                        <div class="nav-bar-menu-btn">
                            <i class="fa-solid fa-bars-staggered fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="section {{ $__env->yieldContent('empty') ? 'v3' : 'v2' }}">
        <div class="container-lg">
            <div class="section-inner">
                <div class="section-header mb-4">
                    <div class="row row-cols-1 row-cols-md-auto justify-content-between align-items-center g-3">
                        <div class="col">
                            <h2 class="page-title mb-2">@yield('title')</h2>
                            @include('frontend.user.includes.breadcrumb')
                        </div>
                        <div class="col">
                            <div class="row row-cols-1 row-cols-md-auto align-items-center gx-2 gy-3">
                                @if (request()->routeIs('user.videos.index'))
                                    <div class="col">
                                        <form action="{{ route('user.videos.index') }}" method="GET">
                                            <div class="form-search w-100">
                                                <input type="text" name="search"
                                                    class="form-control form-control-md"
                                                    placeholder="{{ lang('Search...', 'videos') }}"
                                                    value="{{ request()->input('search') ?? '' }}">
                                                <button class="icon">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                                <div class="col">
                                    @hasSection('back')
                                        <a href="@yield('back')" class="btn btn-gradient btn-md"><i
                                                class="fas fa-arrow-left me-2"></i>{{ lang('Back', 'user') }}</a>
                                    @endif
                                    @hasSection('upload')
                                        <button class="btn btn-primary btn-md" data-upload-btn><i
                                                class="fa fa-upload me-2"></i>{{ lang('Upload', 'dashboard') }}</button>
                                    @endif
                                    @if (request()->routeIs('user.notifications'))
                                        @if ($unreadUserNotificationsAll)
                                            <a class="confirm-action btn btn-gradient btn-md"
                                                href="{{ route('user.notifications.readall') }}">{{ lang('Make All as Read', 'user') }}</a>
                                        @else
                                            <button class="btn btn-gradient btn-md"
                                                disabled>{{ lang('Make All as Read', 'user') }}</button>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/sweetalert/sweetalert2.min.js') }}"></script>
    @endpush
    @hasSection('upload')
        @include('frontend.global.includes.uploadbox')
    @endif
    @include('frontend.global.includes.footer')
    @include('frontend.configurations.config')
    @include('frontend.configurations.widgets')
    @include('frontend.global.includes.scripts')
</body>

</html>
