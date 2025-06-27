<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', __('dashboard::general.dashboard')) - {{ config('app.name', 'GDD') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700,800" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Module Dashboard CSS -->
    <link href="{{ Module::asset('dashboard:css/dashboard.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body class="dashboard-body" data-module="dashboard">
<div id="app">
    <!-- Mobile Toggle -->
    <button class="mobile-toggle d-lg-none" id="mobileToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    @include('dashboard::components.sidebar')

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Header -->
        @include('dashboard::components.header')

        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>
    </div>

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay" style="display: none;">
        <div class="loading-spinner">
            <i class="fas fa-spinner fa-spin"></i>
            <p>Chargement...</p>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ Module::asset('dashboard:js/dashboard.js') }}"></script>

<!-- Module Configuration -->
<script>
    window.DashboardConfig = {
        baseUrl: '{{ url("/") }}',
        apiUrl: '{{ url("/api/dashboard/v1") }}',
        csrfToken: '{{ csrf_token() }}',
        locale: '{{ app()->getLocale() }}',
      /*  user: json(auth()->user()->only(['id', 'name', 'email'])),
        permissions: json(auth()->user()->getAllPermissions()->pluck('name')),*/
        routes: {
            dashboard: '{{ route("dashboard.index") }}',
            export: '{{ route("dashboard.export") }}',
            refresh: '{{ route("dashboard.refresh") }}',
        }
    };
</script>

@stack('scripts')
</body>
</html>
