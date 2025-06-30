<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Authentification') - {{ config('app.name', 'GDD') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
  {{--  @vite(['resources/css/app.css'])--}}

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            /* Couleurs principales - Bleu ONU */
            --primary-blue: #009edb;
            --primary-dark: #1976d2;
            --primary-light: #4fc3f7;

            /* Couleurs secondaires */
            --secondary-green: #28a745;
            --secondary-orange: #fd7e14;
            --secondary-teal: #20c997;

            /* Gradients */
            --gradient-primary: linear-gradient(135deg, var(--primary-blue), var(--primary-light));
            --gradient-secondary: linear-gradient(135deg, var(--secondary-green), var(--secondary-teal));

            /* Couleurs neutres */
            --text-primary: #212529;
            --text-secondary: #6c757d;
            --bg-light: #f8f9fa;
            --bg-white: #ffffff;
            --border-light: rgba(33, 37, 41, 0.125);

            /* Ombres */
            --shadow-light: 0 4px 6px rgba(0, 0, 0, 0.05);
            --shadow-medium: 0 10px 25px rgba(0, 158, 219, 0.15);
            --shadow-strong: 0 20px 40px rgba(0, 158, 219, 0.2);

            /* Transitions */
            --transition-fast: 0.15s ease;
            --transition-normal: 0.3s ease;
            --transition-slow: 0.5s ease;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            line-height: 1.6;
            color: var(--text-primary);
        }

        /* Arrière-plan animé */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg,
            rgba(0, 158, 219, 0.02) 0%,
            rgba(25, 118, 210, 0.03) 50%,
            rgba(79, 195, 247, 0.02) 100%);
            z-index: 0;
            animation: backgroundShift 20s ease-in-out infinite;
        }

        @keyframes backgroundShift {
            0%, 100% { transform: translateX(0) translateY(0); }
            25% { transform: translateX(-20px) translateY(-10px); }
            50% { transform: translateX(20px) translateY(10px); }
            75% { transform: translateX(-10px) translateY(20px); }
        }

        /* Particules flottantes */
        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .floating-particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background: var(--primary-blue);
            border-radius: 50%;
            opacity: 0.1;
            animation: float 15s infinite ease-in-out;
        }

        .floating-particle:nth-child(1) { left: 10%; animation-delay: 0s; }
        .floating-particle:nth-child(2) { left: 20%; animation-delay: 2s; }
        .floating-particle:nth-child(3) { left: 35%; animation-delay: 4s; }
        .floating-particle:nth-child(4) { left: 50%; animation-delay: 1s; }
        .floating-particle:nth-child(5) { left: 65%; animation-delay: 3s; }
        .floating-particle:nth-child(6) { left: 80%; animation-delay: 5s; }

        @keyframes float {
            0%, 100% { transform: translateY(100vh) scale(0); opacity: 0; }
            10% { opacity: 0.1; transform: scale(1); }
            90% { opacity: 0.1; transform: scale(1); }
            100% { transform: translateY(-10vh) scale(0); opacity: 0; }
        }

        /* Container principal */
        .auth-container {
            position: relative;
            z-index: 10;
            background: var(--bg-white);
            border-radius: 24px;
            box-shadow: var(--shadow-strong);
            overflow: hidden;
            max-width: 1000px;
            width: 90%;
            min-height: 600px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            animation: containerSlideIn 0.8s ease-out;
        }

        @keyframes containerSlideIn {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Section formulaire */
        .auth-form-section {
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--bg-white);
            position: relative;
        }

        .auth-form-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 1px;
            height: 100%;
            background: linear-gradient(180deg,
            transparent 0%,
            var(--border-light) 20%,
            var(--border-light) 80%,
            transparent 100%);
        }

        /* Logo et titre */
        .logo-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo {
            font-size: 2.5rem;
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
            display: block;
            text-decoration: none;
        }

        .logo:hover {
            opacity: 0.8;
        }

        .subtitle {
            color: var(--text-secondary);
            font-size: 0.95rem;
            margin-bottom: 5px;
        }

        .page-title {
            color: var(--text-primary);
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 30px;
        }

        /* Section visuelle */
        .auth-visual-section {
            background: var(--gradient-primary);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .auth-visual-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle,
            rgba(255, 255, 255, 0.1) 0%,
            transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .visual-content {
            position: relative;
            z-index: 2;
            padding: 40px;
        }

        .visual-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .visual-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .features-list {
            list-style: none;
            text-align: left;
            max-width: 300px;
        }

        .features-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            opacity: 0.9;
        }

        .features-list li i {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px;
            border-radius: 50%;
            font-size: 0.9rem;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Logo ONU */
        .onu-logo {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .onu-logo i {
            font-size: 1.8rem;
        }

        /* Formulaires */
        .auth-form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-primary);
            font-weight: 500;
            font-size: 0.95rem;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .form-group input {
            width: 100%;
            padding: 15px 45px 15px 15px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--bg-white);
            color: var(--text-primary);
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 4px rgba(0, 158, 219, 0.1);
            transform: translateY(-1px);
        }

        .input-icon {
            position: absolute;
            right: 15px;
            color: var(--text-secondary);
            transition: color 0.3s ease;
        }

        .form-group:focus-within .input-icon {
            color: var(--primary-blue);
        }

        /* Messages d'erreur */
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
            display: block;
        }

        /* Alerts */
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid transparent;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
        }

        /* Boutons */
        .btn-primary-auth {
            width: 100%;
            padding: 16px;
            background: var(--gradient-primary);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary-auth::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
            transparent,
            rgba(255, 255, 255, 0.2),
            transparent);
            transition: left 0.5s ease;
        }

        .btn-primary-auth:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
        }

        .btn-primary-auth:hover::before {
            left: 100%;
        }

        .btn-primary-auth:active {
            transform: translateY(0);
        }

        /* Liens */
        .auth-link {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .auth-link:hover {
            color: var(--primary-dark);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .auth-container {
                grid-template-columns: 1fr;
                max-width: 400px;
                margin: 20px;
            }

            .auth-visual-section {
                display: none;
            }

            .auth-form-section {
                padding: 40px 30px;
            }

            .auth-form-section::before {
                display: none;
            }

            .page-title {
                font-size: 1.5rem;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .auth-form-section {
                padding: 30px 20px;
            }

            .logo {
                font-size: 2rem;
            }

            .page-title {
                font-size: 1.3rem;
            }
        }

        /* Animations d'entrée */
        .form-group {
            animation: slideInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }

        @keyframes slideInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .auth-actions {
            animation: slideInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
            animation-delay: 0.5s;
        }

        /* Classes utilitaires */
        .text-center { text-align: center; }
        .mb-3 { margin-bottom: 1rem; }
        .mb-4 { margin-bottom: 1.5rem; }
        .mt-3 { margin-top: 1rem; }
        .mt-4 { margin-top: 1.5rem; }
    </style>

    @stack('styles')
</head>
<body>
<!-- Éléments flottants -->
<div class="floating-elements">
    <div class="floating-particle"></div>
    <div class="floating-particle"></div>
    <div class="floating-particle"></div>
    <div class="floating-particle"></div>
    <div class="floating-particle"></div>
    <div class="floating-particle"></div>
</div>

<!-- Container principal -->
<div class="auth-container">
    <!-- Section formulaire -->
    <div class="auth-form-section">
        <!-- Logo et branding -->
        <div class="logo-section">
            <a href="{{ route('home') }}" class="logo">GDD</a>
            <div class="subtitle">Groupe pour le Développement Durable</div>
        </div>

        <!-- Titre de la page -->
        <h1 class="page-title">@yield('page-title', 'Authentification')</h1>

        <!-- Messages d'erreur globaux -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Messages de session -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        <!-- Contenu principal -->
        @yield('content')
    </div>

    <!-- Section visuelle -->
    <div class="auth-visual-section">
        <div class="visual-content">
            <div class="onu-logo">
                <i class="@yield('visual-icon', 'fas fa-globe-africa')"></i>
            </div>

            <h2 class="visual-title">@yield('visual-title', 'Bienvenue')</h2>
            <p class="visual-subtitle">
                @yield('visual-subtitle', 'Accédez à votre espace personnel et contribuez au développement durable de l\'Afrique')
            </p>

            <ul class="features-list">
                @yield('visual-features')
            </ul>
        </div>
    </div>
</div>

<!-- Scripts -->
@vite(['resources/js/app.js'])

<script>
    // Animation au focus des inputs
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('input[type="email"], input[type="password"], input[type="text"]');

        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Animation des boutons
        const buttons = document.querySelectorAll('.btn-primary-auth');
        buttons.forEach(btn => {
            btn.addEventListener('click', function() {
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });

        // Validation en temps réel des emails
        const emailInputs = document.querySelectorAll('input[type="email"]');
        emailInputs.forEach(input => {
            input.addEventListener('input', function() {
                const email = this.value;
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (email && !emailRegex.test(email)) {
                    this.style.borderColor = '#dc3545';
                } else if (email) {
                    this.style.borderColor = '#009edb';
                } else {
                    this.style.borderColor = '#e9ecef';
                }
            });
        });

        // Validation des mots de passe
        const passwordInputs = document.querySelectorAll('input[type="password"]');
        passwordInputs.forEach(input => {
            input.addEventListener('input', function() {
                const password = this.value;

                if (password && password.length < 6) {
                    this.style.borderColor = '#ffc107';
                } else if (password) {
                    this.style.borderColor = '#28a745';
                } else {
                    this.style.borderColor = '#e9ecef';
                }
            });
        });
    });
</script>

@stack('scripts')
</body>
</html>
