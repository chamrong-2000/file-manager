@extends('frontend.user.layouts.dash')
@section('title', lang('Dashboard', 'dashboard'))
@section('content')
    <div class="row row-cols-1 row-cols-md-2 justify-content-center g-3">
        <div class="col">
            <div class="card-v v3 justify-content-center h-100">
                <div class="card-v-body">
                    <div class="stats">
                        <div class="stats-info">
                            <div class="stats-meta">
                                <h3 class="stats-title">{{ lang('Storage Space', 'dashboard') }}</h3>
                            </div>
                            <div class="stats-icon">
                                <i class="fa-solid fa-hard-drive"></i>
                            </div>
                        </div>
                        @php
                            $progressClass = '';
                            if (uploadSettings()->storage->fullness >= 80) {
                                $progressClass = 'bg-danger';
                            } elseif (uploadSettings()->storage->fullness < 80 && uploadSettings()->storage->fullness >= 60) {
                                $progressClass = 'bg-warning';
                            }
                        @endphp
                        <div class="space">
                            <p class="space-text">{{ uploadSettings()->storage->used->format }} /
                                <span class="text-dark">{{ uploadSettings()->formates->storage_space }}</span>
                            </p>
                            <div class="space-progress">
                                <div class="space-progress-inner {{ $progressClass }}"
                                    style="width: {{ uploadSettings()->storage->fullness }}%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card-v v3 justify-content-center h-100">
                <div class="card-v-body">
                    <div class="stats">
                        <div class="stats-info">
                            <div class="stats-meta">
                                <h3 class="stats-title">{{ lang('Total Videos', 'dashboard') }}</h3>
                                <p class="stats-text">{{ number_format($countFileEntries) }}</p>
                            </div>
                            <div class="stats-icon">
                                <i class="fa-solid fa-file-video"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-v v3 mt-4">
        <div class="card-v-body">
            <h5 class="mb-4">{{ lang('Your upload statistics for current month', 'dashboard') }}</h5>
            <div class="dash-chart">
                <canvas id="uploads-chart"></canvas>
            </div>
        </div>
    </div>
    @push('scripts_libs')
        <script src="{{ asset('assets/vendor/libs/chartjs/chart.min.js') }}"></script>
    @endpush
@endsection
