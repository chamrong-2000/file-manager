@extends('backend.layouts.application')
@section('title', __('Dashboard'))
@section('access', 'Quick Access')
@section('content')
    @if (!$settings['mail_status'])
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle me-2"></i>
            {{ __('SMTP is not enabled, set it now to be able to recover the password and use all the features that needs to send an email.') }}
            <a href="{{ route('admin.settings.smtp') }}">{{ __('Take Action') }}</a>
        </div>
    @endif
    <div class="row g-3 mb-4">
        <div class="col-12 col-lg-6 col-xxl">
            <div class="vironeer-counter-box bg-c-10">
                <h3 class="vironeer-counter-box-title">{{ __('Uploads') }}</h3>
                <p class="vironeer-counter-box-number">{{ $totalUploads }}</p>
                <span class="vironeer-counter-box-icon">
                    <i class="fas fa-upload"></i>
                </span>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xxl">
            <div class="vironeer-counter-box bg-c-8">
                <h3 class="vironeer-counter-box-title">{{ __('Users') }}</h3>
                <p class="vironeer-counter-box-number">{{ $totalUsers }}</p>
                <span class="vironeer-counter-box-icon">
                    <i class="fa fa-users"></i>
                </span>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xxl">
            <div class="vironeer-counter-box bg-c-7">
                <h3 class="vironeer-counter-box-title">{{ __('Pages') }}</h3>
                <p class="vironeer-counter-box-number">{{ $totalPages }}</p>
                <span class="vironeer-counter-box-icon">
                    <i class="far fa-file-alt"></i>
                </span>
            </div>
        </div>
        @if ($settings['website_blog_status'])
            <div class="col-12 col-lg-6 col-xxl">
                <div class="vironeer-counter-box bg-c-5">
                    <h3 class="vironeer-counter-box-title">{{ __('Blog Articles') }}</h3>
                    <p class="vironeer-counter-box-number">{{ $totalArticles }}</p>
                    <span class="vironeer-counter-box-icon">
                        <i class="fas fa-rss"></i>
                    </span>
                </div>
            </div>
        @endif
    </div>
    <div class="row g-3 mb-4">
        <div class="col-12 col-lg col-xxl">
            <div class="vironeer-counter-box bg-lg-8">
                <h3 class="vironeer-counter-box-title">{{ __('Users Uploads') }}</h3>
                <p class="vironeer-counter-box-number">{{ $totalUsersUploads }}</p>
                <span class="vironeer-counter-box-icon">
                    <i class="fas fa-file-upload"></i>
                </span>
            </div>
        </div>
        <div class="col-12 col-lg col-xxl">
            <div class="vironeer-counter-box bg-lg-5">
                <h3 class="vironeer-counter-box-title">{{ __('Guests Uploads') }}</h3>
                <p class="vironeer-counter-box-number">{{ $totalGuestsUploads }}</p>
                <span class="vironeer-counter-box-icon">
                    <i class="fas fa-cloud-upload-alt"></i>
                </span>
            </div>
        </div>
        <div class="col-12 col-lg col-xxl">
            <div class="vironeer-counter-box bg-lg-10">
                <h3 class="vironeer-counter-box-title">{{ __('Total Used Space') }}</h3>
                <p class="vironeer-counter-box-number">{{ $totalUsedSpace }}</p>
                <span class="vironeer-counter-box-icon">
                    <i class="fas fa-database"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-12 col-lg-8 col-xxl-8">
            <div class="card">
                <div class="vironeer-box chart-bar">
                    <div class="vironeer-box-header">
                        <p class="vironeer-box-header-title large mb-0">{{ __('Users Statistics For This Week') }}</p>
                        <div class="vironeer-box-header-action ms-auto">
                            <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-sm-end">
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.users.index') }}">{{ __('View All') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="vironeer-box-body">
                        <div class="chart-bar">
                            <canvas height="380" id="vironeer-users-charts"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xxl-4">
            <div class="card vhp-460">
                <div class="vironeer-box v2">
                    <div class="vironeer-box-header mb-3">
                        <p class="vironeer-box-header-title large mb-0">{{ __('Recently registered') }}</p>
                        <div class="vironeer-box-header-action ms-auto">
                            <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-sm-end">
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.users.index') }}">{{ __('View All') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="vironeer-box-body">
                        <div class="vironeer-random-lists">
                            @forelse ($users as $user)
                                <div class="vironeer-random-list">
                                    <div class="vironeer-random-list-cont">
                                        <a class="vironeer-random-list-img" href="#">
                                            <img src="{{ asset($user->avatar) }}" />
                                        </a>
                                        <div class="vironeer-random-list-info">
                                            <div>
                                                <a class="vironeer-random-list-title fs-exact-14"
                                                    href="{{ route('admin.users.edit', $user->id) }}">
                                                    {{ $user->firstname . ' ' . $user->lastname }}
                                                </a>
                                                <p class="vironeer-random-list-text mb-0">
                                                    {{ $user->created_at->diffforhumans() }}
                                                </p>
                                            </div>
                                            <div class="vironeer-random-list-action d-none d-lg-block">
                                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                @include('backend.includes.emptysmall')
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card pb-3">
                <div class="vironeer-box chart-bar">
                    <div class="vironeer-box-header">
                        <p class="vironeer-box-header-title large mb-0">
                            {{ __('Uploads Statistics For Current Month') }}
                        </p>
                        <div class="vironeer-box-header-action ms-auto">
                            <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-sm-end">
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.uploads.users.index') }}">{{ __('Users Uploads') }}</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.uploads.guests.index') }}">{{ __('Guests Uploads') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="vironeer-box-body">
                        <div class="chart-bar">
                            <canvas height="400" id="vironeer-uploads-charts"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/chartjs/chart.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/admin/js/charts.js') }}"></script>
    @endpush
@endsection
