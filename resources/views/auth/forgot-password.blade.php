@extends('layouts.auth')

@section('title', 'Mot de passe oublié')

@section('page-title', 'Récupération')

@section('visual-title', 'Pas de panique')

@section('visual-subtitle', 'Nous allons vous aider à récupérer l\'accès à votre compte en quelques étapes simples')

@section('visual-icon', 'fas fa-key')

    @section('visual-features')
        <li>
            <i class="fas fa-envelope"></i>
            <span>Email sécurisé</span>
        </li>
        <li>
            <i class="fas fa-clock"></i>
            <span>Lien valide 1h</span>
        </li>
        <li>
            <i class="fas fa-shield-alt"></i>
            <span>Processus sécurisé</span>
        </li>
        <li>
            <i class="fas fa-user-check"></i>
            <span>Vérification d'identité</span>
        </li>
        <li>
            <i class="fas fa-undo"></i>
            <span>Retour rapide</span>
        </li>
    @endsection

    @section('content')
        <div style="margin-bottom: 25px;">
            <p style="color: var(--text-secondary); font-size: 1rem; line-height: 1.6; margin-bottom: 0;">
                Saisissez votre adresse email et nous vous enverrons un lien pour réinitialiser votre mot de passe.
            </p>
        </div>

        <form class="auth-form" method="POST" action="{{ route('password.email') }}">
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

            <!-- Actions -->
            <div class="auth-actions">
                <!-- Submit Button -->
                <button type="submit" class="btn-primary-auth">
                    <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>
                    Envoyer le lien de récupération
                </button>

                <!-- Back to Login -->
                <div class="text-center mt-4" style="color: var(--text-secondary); font-size: 0.95rem;">
                    Vous vous souvenez de votre mot de passe ?
                    <a href="{{ route('login') }}" class="auth-link" style="margin-left: 5px;">
                        Retour à la connexion
                    </a>
                </div>
            </div>
        </form>
    @endsection

    @push('styles')
        <style>
            /* Styles spécifiques à la page de récupération */
            .auth-form .form-group:nth-child(1) { animation-delay: 0.1s; }
            .auth-actions { animation-delay: 0.2s; }

            /* Style pour le bouton d'envoi avec icône */
            .btn-primary-auth i {
                transition: transform 0.3s ease;
            }

            .btn-primary-auth:hover i {
                transform: translateX(3px);
            }

            /* Message d'information */
            .auth-form-section p {
                background: rgba(0, 158, 219, 0.05);
                padding: 15px;
                border-radius: 8px;
                border-left: 4px solid var(--primary-blue);
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Focus automatique sur le champ email
                const emailInput = document.getElementById('email');
                if (emailInput) {
                    setTimeout(() => {
                        emailInput.focus();
                    }, 500);
                }

                // Animation du bouton au submit
                const form = document.querySelector('.auth-form');
                const submitBtn = document.querySelector('.btn-primary-auth');

                form.addEventListener('submit', function() {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right: 8px;"></i>Envoi en cours...';
                    submitBtn.disabled = true;
                });

                // Validation email en temps réel
                emailInput.addEventListener('input', function() {
                    const email = this.value;
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (email && emailRegex.test(email)) {
                        this.style.borderColor = 'var(--secondary-green)';
                    } else if (email) {
                        this.style.borderColor = '#ffc107';
                    } else {
                        this.style.borderColor = '#e9ecef';
                    }
                });
            });
        </script>
    @endpush
