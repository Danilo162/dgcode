@extends('layouts.auth')

@section('title', 'Connexion')

@section('page-title', 'Connexion !')

@section('visual-title', 'Bienvenue')

@section('visual-subtitle', 'Accédez à votre espace personnel et contribuez au développement durable de l\'Afrique')

@section('visual-icon', 'fas fa-globe-africa')

@section('visual-features')
    <li>
        <i class="fas fa-shield-alt"></i>
        <span>Sécurité garantie</span>
    </li>
    <li>
        <i class="fas fa-users"></i>
        <span>Communauté engagée</span>
    </li>
    <li>
        <i class="fas fa-chart-line"></i>
        <span>Suivi des projets</span>
    </li>
    <li>
        <i class="fas fa-leaf"></i>
        <span>Impact durable</span>
    </li>
    <li>
        <i class="fas fa-handshake"></i>
        <span>Partenariats ONU</span>
    </li>
@endsection

@section('content')
    <form class="auth-form" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label for="email">Adresse email</label>
            <div class="input-wrapper">
                <input type="email"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="votre@email.com"
                       required
                       autofocus
                       class="@error('email') is-invalid @enderror">
                <i class="fas fa-envelope input-icon"></i>
            </div>
            @error('email')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <div class="input-wrapper">
                <input type="password"
                       id="password"
                       name="password"
                       placeholder="••••••••"
                       required
                       class="@error('password') is-invalid @enderror">
                <i class="fas fa-lock input-icon"></i>
            </div>
            @error('password')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Options -->
        <div class="auth-actions">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; font-size: 0.9rem;">
                <label style="display: flex; align-items: center; gap: 8px; color: var(--text-secondary); cursor: pointer; margin-bottom: 0;">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} style="width: auto; margin: 0; accent-color: var(--primary-blue);">
                    Se souvenir de moi
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="auth-link">
                        Mot de passe oublié ?
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-primary-auth">
                <i class="fas fa-sign-in-alt" style="margin-right: 8px;"></i>
                Se connecter
            </button>

            <!-- Register Link -->
            @if (Route::has('register'))
                <div class="text-center mt-4" style="color: var(--text-secondary); font-size: 0.95rem;">
                    Pas encore de compte ?
                    <a href="{{ route('register') }}" class="auth-link" style="margin-left: 5px;">
                        Créer un compte
                    </a>
                </div>
            @endif
        </div>
    </form>
@endsection

@push('styles')
    <style>
        /* Styles spécifiques à la page de login */
        .auth-form .form-group:nth-child(1) { animation-delay: 0.1s; }
        .auth-form .form-group:nth-child(2) { animation-delay: 0.2s; }
        .auth-actions { animation-delay: 0.3s; }

        /* Amélioration du checkbox */
        input[type="checkbox"]:checked + span {
            color: var(--primary-blue) !important;
        }

        /* Style pour le bouton de connexion avec icône */
        .btn-primary-auth i {
            transition: transform 0.3s ease;
        }

        .btn-primary-auth:hover i {
            transform: translateX(2px);
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Focus automatique sur le champ email si vide
            const emailInput = document.getElementById('email');
            if (emailInput && !emailInput.value) {
                setTimeout(() => {
                    emailInput.focus();
                }, 500);
            }

            // Effet sur le checkbox "Se souvenir de moi"
            const checkbox = document.querySelector('input[type="checkbox"]');
            if (checkbox) {
                checkbox.addEventListener('change', function() {
                    const label = this.parentElement;
                    if (this.checked) {
                        label.style.color = 'var(--primary-blue)';
                    } else {
                        label.style.color = 'var(--text-secondary)';
                    }
                });
            }

            // Animation du bouton au submit
            const form = document.querySelector('.auth-form');
            const submitBtn = document.querySelector('.btn-primary-auth');

            form.addEventListener('submit', function() {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right: 8px;"></i>Connexion...';
                submitBtn.disabled = true;
            });
        });
    </script>
@endpush
