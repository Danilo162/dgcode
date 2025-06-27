<?php
// =====================================
// 7. COMPOSANT SIDEBAR
// =====================================

// Modules/Dashboard/Resources/views/components/sidebar.blade.php
?>
<nav class="dashboard-sidebar" id="dashboardSidebar">
    <div class="sidebar-header">
        <div class="sidebar-brand">
            <i class="fas fa-leaf"></i>
            <span class="brand-text">{{ config('app.name', 'GDD') }}</span>
        </div>
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-chevron-left"></i>
        </button>
    </div>

    <div class="sidebar-nav">
        <!-- Dashboard -->
        <div class="nav-section">
            <div class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                   href="">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="nav-text">{{ __('dashboard::menu.dashboard') }}</span>
                </a>
            </div>
        </div>

        <!-- Projects Section -->
        <div class="nav-section">
            <div class="nav-section-title">{{ __('dashboard::menu.management') }}</div>

            <div class="nav-item">
                <a class="nav-link has-dropdown {{ request()->is('projects*') ? 'active' : '' }}"
                   href="#" data-bs-toggle="collapse" data-bs-target="#projectsMenu">
                    <i class="fas fa-project-diagram"></i>
                    <span class="nav-text">{{ __('dashboard::menu.projects') }}</span>
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <div class="collapse {{ request()->is('projects*') ? 'show' : '' }}" id="projectsMenu">
                    <div class="submenu">
                        <a
                          {{--  href="{{ route('projects.index') }}" --}}

                           class="submenu-item">
                            {{ __('dashboard::menu.all_projects') }}
                        </a>
                        <a
                          {{--  href="{{ route('projects.create') }}" --}}

                           class="submenu-item">
                            {{ __('dashboard::menu.new_project') }}
                        </a>
                        <a
                           {{-- href="{{ route('projects.ongoing') }}" --}}
                           class="submenu-item">
                            {{ __('dashboard::menu.ongoing_projects') }}
                        </a>
                        <a
                        {{--    href="{{ route('projects.completed') }}" --}}

                           class="submenu-item">
                            {{ __('dashboard::menu.completed_projects') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="nav-item">
                <a class="nav-link has-dropdown {{ request()->is('trainings*') ? 'active' : '' }}"
                   href="#" data-bs-toggle="collapse" data-bs-target="#trainingsMenu">
                    <i class="fas fa-graduation-cap"></i>
                    <span class="nav-text">{{ __('dashboard::menu.trainings') }}</span>
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <div class="collapse {{ request()->is('trainings*') ? 'show' : '' }}" id="trainingsMenu">
                    <div class="submenu">
                        <a
                           {{-- href="{{ route('trainings.index') }}" --}}

                           class="submenu-item">
                            {{ __('dashboard::menu.all_trainings') }}
                        </a>
                        <a
                           {{-- href="{{ route('trainings.create') }}" --}}

                           class="submenu-item">
                            {{ __('dashboard::menu.new_training') }}
                        </a>
                        <a
                          {{--  href="{{ route('trainings.participants') }}"--}}

                           class="submenu-item">
                            {{ __('dashboard::menu.participants') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="nav-item">
                <a class="nav-link has-dropdown {{ request()->is('events*') ? 'active' : '' }}"
                   href="#" data-bs-toggle="collapse" data-bs-target="#eventsMenu">
                    <i class="fas fa-calendar-star"></i>
                    <span class="nav-text">{{ __('dashboard::menu.events') }}</span>
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <div class="collapse {{ request()->is('events*') ? 'show' : '' }}" id="eventsMenu">
                    <div class="submenu">
                        <a class="submenu-item">
                            {{ __('dashboard::menu.all_events') }}
                        </a>
                        <a  class="submenu-item">
                            {{ __('dashboard::menu.new_event') }}
                        </a>
                        <a  class="submenu-item">
                            {{ __('dashboard::menu.calendar') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users & Organizations -->
        <div class="nav-section">
            <div class="nav-section-title">{{ __('dashboard::menu.administration') }}</div>

            <div class="nav-item">
                <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}"
                   href="">
                    <i class="fas fa-users"></i>
                    <span class="nav-text">{{ __('dashboard::menu.users') }}</span>
                </a>
            </div>

            <div class="nav-item">
                <a class="nav-link {{ request()->is('organizations*') ? 'active' : '' }}"
                   href="">
                    <i class="fas fa-building"></i>
                    <span class="nav-text">{{ __('dashboard::menu.organizations') }}</span>
                </a>
            </div>

            <div class="nav-item">
                <a class="nav-link {{ request()->is('odd*') ? 'active' : '' }}"
                   href="">
                    <i class="fas fa-globe-africa"></i>
                    <span class="nav-text">{{ __('dashboard::menu.odd') }}</span>
                </a>
            </div>
        </div>

        <!-- Reports & Analytics -->
        <div class="nav-section">
            <div class="nav-section-title">{{ __('dashboard::menu.analytics') }}</div>

            <div class="nav-item">
                <a class="nav-link {{ request()->is('reports*') ? 'active' : '' }}"
                   href="">
                    <i class="fas fa-chart-bar"></i>
                    <span class="nav-text">{{ __('dashboard::menu.reports') }}</span>
                </a>
            </div>

            <div class="nav-item">
                <a class="nav-link {{ request()->is('analytics*') ? 'active' : '' }}"
                   href="">
                    <i class="fas fa-chart-line"></i>
                    <span class="nav-text">{{ __('dashboard::menu.analytics') }}</span>
                </a>
            </div>
        </div>

        <!-- Settings -->
        <div class="nav-section">
            <div class="nav-section-title">{{ __('dashboard::menu.system') }}</div>

            <div class="nav-item">
                <a class="nav-link {{ request()->is('settings*') ? 'active' : '' }}"
                   href="">
                    <i class="fas fa-cog"></i>
                    <span class="nav-text">{{ __('dashboard::menu.settings') }}</span>
                </a>
            </div>
        </div>
    </div>
</nav>

