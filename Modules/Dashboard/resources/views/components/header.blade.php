<?php
// =====================================
// 8. COMPOSANT HEADER
// =====================================

// Modules/Dashboard/Resources/views/components/header.blade.php
?>
<header class="dashboard-header">
    <div class="header-left">
        <h1 class="page-title">@yield('page-title', __('dashboard::general.dashboard'))</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.index') }}">{{ __('dashboard::menu.dashboard') }}</a>
                </li>
                @yield('breadcrumb')
            </ol>
        </nav>
    </div>

    <div class="header-right">
        <!-- Search -->
        <div class="header-search me-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="{{ __('dashboard::general.search') }}">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        <!-- Notifications -->
        <div class="dropdown me-3">
            <button class="btn btn-link position-relative p-2" type="button" data-bs-toggle="dropdown">
                <i class="fas fa-bell fs-5"></i>

                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                 0
                </span>

            </button>
            <div class="dropdown-menu dropdown-menu-end notification-dropdown">
                <div class="dropdown-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">{{ __('dashboard::general.notifications') }}</h6>

                        <button class="btn btn-sm btn-link p-0" onclick="Dashboard.markAllNotificationsRead()">
                         1
                        </button>

                </div>

                <div class="dropdown-footer text-center">
                    <a  class="btn btn-sm btn-link">
                        {{ __('dashboard::actions.view_all_notifications') }}
                    </a>
                </div>
            </div>
        </div>

        <!-- User Profile -->
        <div class="dropdown">
            <button class="btn btn-link d-flex align-items-center text-decoration-none"
                    type="button" data-bs-toggle="dropdown">
                <div class="user-avatar me-2">
                   {{-- @if(auth()->user()->avatar)--}}
                     {{--   <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}">--}}
                  {{--  @else--}}
                        <i class="fas fa-user"></i>
                   {{-- @endif--}}
                </div>
                <div class="user-info d-none d-md-block text-start">
                    <div class="user-name">danilo</div>
                   {{-- <div class="user-role">{{ auth()->user()->getRoleNames()->first() ?? __('dashboard::general.user') }}</div>--}}
                    <div class="user-role">__('dashboard::general.user') }}</div>
                </div>
                <i class="fas fa-chevron-down ms-2"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-end user-dropdown">
                <div class="dropdown-header text-center">
                    <div class="user-avatar mb-2">
                   {{--     @if(auth()->user()->avatar)
                            <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}">
                        @else--}}
                            <i class="fas fa-user"></i>
                     {{--   @endif--}}
                    </div>
                    <div class="user-name">jhjhj</div>
                   {{-- <div class="user-name">{{ auth()->user()->name }}</div>--}}
                   {{-- <div class="user-email">{{ auth()->user()->email }}</div>--}}
                    <div class="user-email">jbjbj</div>
                </div>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="">
                    <i class="fas fa-user me-2"></i>
                    {{ __('dashboard::menu.my_profile') }}
                </a>

                <a class="dropdown-item" href="">
                    <i class="fas fa-cog me-2"></i>
                    {{ __('dashboard::menu.account_settings') }}
                </a>

                <a class="dropdown-item" href="">
                    <i class="fas fa-bell me-2"></i>
                    {{ __('dashboard::menu.notifications') }}
                </a>

                <a class="dropdown-item" href="">
                    <i class="fas fa-question-circle me-2"></i>
                    {{ __('dashboard::menu.help') }}
                </a>

                <div class="dropdown-divider"></div>

                <form method="POST" action="" class="d-inline">
                    @csrf
                    <button class="dropdown-item text-danger" type="submit">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        {{ __('dashboard::actions.logout') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
