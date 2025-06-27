@extends('dashboard::layouts.master')

@section('title', __('dashboard::general.dashboard'))

@push('styles')
    <style>
        .dashboard-grid {
            display: grid;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        @media (min-width: 768px) {
            .dashboard-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }
        }
    </style>
@endpush

@section('content')
    <div class="dashboard-container">
        <!-- Page Header -->
        <div class="dashboard-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="dashboard-title">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        {{ __('dashboard::general.welcome') }},
                      {{--  {{ auth()->user()->name }}--}}
                    </h1>
                    <p class="dashboard-subtitle text-muted">
                        {{ __('dashboard::general.overview_description') }}
                    </p>
                </div>
                <div class="col-auto">
                    <div class="dashboard-actions">
                        <button class="btn btn-outline-primary me-2" onclick="Dashboard.refresh()">
                            <i class="fas fa-sync-alt me-1"></i>
                            {{ __('dashboard::actions.refresh') }}
                        </button>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-download me-1"></i>
                                {{ __('dashboard::actions.export') }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" onclick="Dashboard.export('pdf')">
                                        <i class="fas fa-file-pdf me-2"></i>PDF
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="Dashboard.export('excel')">
                                        <i class="fas fa-file-excel me-2"></i>Excel
                                    </a></li>
                                <li><a class="dropdown-item" href="#" onclick="Dashboard.export('json')">
                                        <i class="fas fa-file-code me-2"></i>JSON
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid dashboard-grid">
            @include('dashboard::components.stats-card', [
                'title' => __('dashboard::stats.projects'),
                'value' => $stats['projects'] ?? 0,
                'icon' => 'fas fa-project-diagram',
                'color' => 'primary',
                'trend' => '+12%',
                'trendDirection' => 'up'
            ])

            @include('dashboard::components.stats-card', [
                'title' => __('dashboard::stats.trainings'),
                'value' => $stats['trainings'] ?? 0,
                'icon' => 'fas fa-graduation-cap',
                'color' => 'success',
                'trend' => '+8%',
                'trendDirection' => 'up'
            ])

            @include('dashboard::components.stats-card', [
                'title' => __('dashboard::stats.beneficiaries'),
                'value' => number_format($stats['beneficiaries'] ?? 0),
                'icon' => 'fas fa-users',
                'color' => 'info',
                'trend' => '+25%',
                'trendDirection' => 'up'
            ])
        </div>

        <!-- Charts Section -->
        <div class="row mb-4">
            <div class="col-lg-8">
                @include('dashboard::components.chart-container', [
                    'id' => 'projectsChart',
                    'title' => __('dashboard::charts.projects_evolution'),
                    'subtitle' => __('dashboard::charts.monthly_growth'),
                    'type' => 'line',
                    'height' => 350
                ])
            </div>
            <div class="col-lg-4">
                @include('dashboard::components.chart-container', [
                    'id' => 'oddChart',
                    'title' => __('dashboard::charts.odd_distribution'),
                    'subtitle' => __('dashboard::charts.by_objectives'),
                    'type' => 'doughnut',
                    'height' => 350
                ])
            </div>
        </div>

        <!-- Quick Actions & Recent Activity -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-bolt me-2"></i>
                            {{ __('dashboard::general.quick_actions') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="quick-actions-grid">
                            <a
                           {{--     href="{{ route('projects.create') }}"--}}
                               class="quick-action-item">
                                <div class="action-icon bg-primary">
                                    <i class="fas fa-plus-circle"></i>
                                </div>
                                <div class="action-content">
                                    <h6>{{ __('dashboard::actions.new_project') }}</h6>
                                    <p class="text-muted small">{{ __('dashboard::actions.create_project') }}</p>
                                </div>
                            </a>

                            <a
                            {{--    href="{{ route('trainings.create') }}" --}}
                               class="quick-action-item">
                                <div class="action-icon bg-success">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <div class="action-content">
                                    <h6>{{ __('dashboard::actions.new_training') }}</h6>
                                    <p class="text-muted small">{{ __('dashboard::actions.create_training') }}</p>
                                </div>
                            </a>

                            <a
                             {{--   href="{{ route('events.create') }}"--}}

                               class="quick-action-item">
                                <div class="action-icon bg-warning">
                                    <i class="fas fa-calendar-plus"></i>
                                </div>
                                <div class="action-content">
                                    <h6>{{ __('dashboard::actions.new_event') }}</h6>
                                    <p class="text-muted small">{{ __('dashboard::actions.plan_event') }}</p>
                                </div>
                            </a>

                            <a
                             {{--   href="{{ route('reports.generate') }}" --}}

                               class="quick-action-item">
                                <div class="action-icon bg-info">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="action-content">
                                    <h6>{{ __('dashboard::actions.generate_report') }}</h6>
                                    <p class="text-muted small">{{ __('dashboard::actions.new_report') }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-clock me-2"></i>
                            {{ __('dashboard::general.recent_activity') }}
                        </h5>
                        <a
                          {{--  href="{{ route('activity.index') }}" --}}

                           class="btn btn-sm btn-outline-primary">
                            {{ __('dashboard::actions.view_all') }}
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="activity-list">
                        {{--    @forelse($recentActivity as $activity)
                                <div class="activity-item">
                                    <div class="activity-icon bg-{{ $activity['color'] ?? 'primary' }}">
                                        <i class="fas fa-{{ $activity['icon'] }}"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">{{ $activity['title'] }}</div>
                                        <div class="activity-description">{{ $activity['description'] }}</div>
                                        <div class="activity-time">{{ $activity['time'] }}</div>
                                    </div>
                                </div>
                            @empty
                                <div class="empty-state text-center py-4">
                                    <i class="fas fa-info-circle text-muted mb-2"></i>
                                    <p class="text-muted mb-0">{{ __('dashboard::messages.no_recent_activity') }}</p>
                                </div>
                            @endforelse--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Initialize dashboard with data from controller

    </script>
@endpush
