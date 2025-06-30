@extends('layouts.auth')

@section('title', 'Inscription')

@section('page-title', 'Rejoignez-nous !')

@section('visual-title', 'Ensemble')

@section('visual-subtitle', 'Rejoignez notre communauté et participez activement aux projets de développement durable en Afrique')

@section('visual-icon', 'fas fa-users')

@section('visual-features')
    <li>
        <i class="fas fa-user-plus"></i>
        <span>Inscription gratuite</span>
    </li>
    <li>
        <i class="fas fa-project-diagram"></i>
        <span>Accès aux projets</span>
    </li>
    <li>
        <i class="fas fa-certificate"></i>
        <span>Formations certifiantes</span>
    </li>
    <li>
        <i class="fas fa-network-wired"></i>
        <span>Réseau professionnel</span>
    </li>
    <li>
        <i class="fas fa-medal"></i>
        <span>Reconnaissance ONU</span>
    </li>
@endsection

@section('content')
    <form class="auth-form" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nom -->
        <div class="form-group">
            <label for="name">Nom complet</label>
            <div class="input-wrapper">
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="Votre nom complet"
                       required
                       autofocus
                       class="@error('name') is-invalid @enderror">
                <i class="fas fa-user input-icon"></i>
            </div>
            @error('name')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

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
                       placeholder="Au moins 8 caractères"
                       required
                       class="@error('password') is-invalid @enderror">
                <i class="fas fa-lock input-icon"></i>
            </div>
            @error('password')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <div class="input-wrapper">
                <input type="password"
                       id="password_confirmation"
                       name="password_confirmation"
                       placeholder="Répétez votre mot de passe"
                       required
                       class="@error('password_confirmation') is-invalid @enderror">
                <i class="fas fa-check input-icon"></i>
            </div>
            @error('password_confirmation')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- Actions -->
        <div class="auth-actions">
            <!-- Terms and conditions -->
            <div style="margin-bottom: 25px;">
                <label style="display: flex; align-items: flex-start; gap: 10px; color: var(--text-secondary); cursor: pointer; margin-bottom: 0; font-size: 0.9rem; line-height: 1.5;">
                    <input type="checkbox" name="terms" required style="width: auto; margin: 0; margin-top: 2px; accent-color: var(--primary-blue);">
                    <span>
                    J'accepte les
                    <a href="#" class="auth-link">conditions d'utilisation</a>
                    et la
                    <a href="#" class="auth-link">politique de confidentialité</a>
                </span>
                </label>
                @error('terms')
                <span class="error-message" style="margin-left: 30px;">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-primary-auth">
                <i class="fas fa-user-plus" style="margin-right: 8px;"></i>
                Créer mon compte
            </button>

            <!-- Login Link -->
            <div class="text-center mt-4" style="color: var(--text-secondary); font-size: 0.95rem;">
                Déjà un compte ?
                <a href="{{ route('login') }}" class="auth-link" style="margin-left: 5px;">
                    Se connecter
                </a>
            </div>
        </div>
    </form>
@endsection

@push('styles')
    <style>
        /* Styles spécifiques à la page d'inscription */
        .auth-form .form-group:nth-child(1) { animation-delay: 0.1s; }
        .auth-form .form-group:nth-child(2) { animation-delay: 0.2s; }
        .auth-form .form-group:nth-child(3) { animation-delay: 0.3s; }
        .auth-form .form-group:nth-child(4) { animation-delay: 0.4s; }
        .auth-actions { animation-delay: 0.5s; }

        /* Style pour les conditions d'utilisation */
        .auth-actions label span {
            transition: color 0.3s ease;
        }

        /* Validation en temps réel pour la confirmation de mot de passe */
        .password-match {
            border-color: var(--secondary-green) !important;
        }

        .password-mismatch {
            border-color: #dc3545 !important;
        }

        /* Style pour le bouton d'inscription avec icône */
        .btn-primary-auth i {
            transition: transform 0.3s ease;
        }

        .btn-primary-auth:hover i {
            transform: scale(1.1);
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Focus automatique sur le champ nom si vide
            const nameInput = document.getElementById('name');
            if (nameInput && !nameInput.value) {
                setTimeout(() => {
                    nameInput.focus();
                }, 500);
            }

            // Validation de la confirmation de mot de passe
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');

            function validatePasswordMatch() {
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;

                if (confirmPassword && password) {
                    if (password === confirmPassword) {
                        confirmPasswordInput.classList.remove('password-mismatch');
                        confirmPasswordInput.classList.add('password-match');
                    } else {
                        confirmPasswordInput.classList.remove('password-match');
                        confirmPasswordInput.classList.add('password-mismatch');
                    }
                } else {
                    confirmPasswordInput.classList.remove('password-match', 'password-mismatch');
                }
            }

            passwordInput.addEventListener('input', validatePasswordMatch);
            confirmPasswordInput.addEventListener('input', validatePasswordMatch);

            // Effet sur le checkbox des conditions
            const termsCheckbox = document.querySelector('input[name="terms"]');
            if (termsCheckbox) {
                termsCheckbox.addEventListener('change', function() {
                    const label = this.parentElement;
                    if (this.checked) {
                        label.style.color = 'var(--primary-blue)';
                    } else {
                        label.style.color = 'var(--text-secondary)';
                    }
                });
            }

            // Validation de la force du mot de passe
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                const strength = getPasswordStrength(password);

                // Changer la couleur de la bordure selon la force
                if (password.length === 0) {
                    this.style.borderColor = '#e9ecef';
                } else if (strength < 2) {
                    this.style.borderColor = '#dc3545'; // Rouge - faible
                } else if (strength < 3) {
                    this.style.borderColor = '#ffc107'; // Jaune - moyen
                } else {
                    this.style.borderColor = '#28a745'; // Vert - fort
                }
            });

            function getPasswordStrength(password) {
                let strength = 0;

                // Longueur
                if (password.length >= 8) strength++;
                if (password.length >= 12) strength++;

                // Caractères
                if (/[a-z]/.test(password)) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/[0-9]/.test(password)) strength++;
                if (/[^A-Za-z0-9]/.test(password)) strength++;

                return Math.min(strength, 4);
            }

            // Animation du bouton au submit
            const form = document.querySelector('.auth-form');
            const submitBtn = document.querySelector('.btn-primary-auth');

            form.addEventListener('submit', function(e) {
                // Vérifier que les mots de passe correspondent
                if (passwordInput.value !== confirmPasswordInput.value) {
                    e.preventDefault();
                    confirmPasswordInput.focus();
                    return false;
                }

                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right: 8px;"></i>Création du compte...';
                submitBtn.disabled = true;
            });
        });
    </script>
@endpush
