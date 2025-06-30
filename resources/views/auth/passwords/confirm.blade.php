@extends('layouts.auth')

@section('title', 'Confirmation mot de passe')

@section('page-title', 'Confirmation requise')

@section('visual-title', 'Sécurité')

@section('visual-subtitle', 'Pour votre sécurité, veuillez confirmer votre mot de passe avant de continuer')

@section('visual-icon', 'fas fa-user-shield')

@section('visual-features')
    <li>
        <i class="fas fa-shield-alt"></i>
        <span>Zone sécurisée</span>
    </li>
    <li>
        <i class="fas fa-lock"></i>
        <span>Données protégées</span>
    </li>
    <li>
        <i class="fas fa-clock"></i>
        <span>Session limitée</span>
    </li>
    <li>
        <i class="fas fa-user-check"></i>
        <span>Identité vérifiée</span>
    </li>
    <li>
        <i class="fas fa-certificate"></i>
        <span>Accès autorisé</span>
    </li>
@endsection

@section('content')
    <div style="margin-bottom: 25px;">
        <div style="background: rgba(255, 193, 7, 0.1); padding: 15px; border-radius: 8px; border-left: 4px solid #ffc107; margin-bottom: 20px;">
            <p style="color: var(--text-primary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 0;">
                <i class="fas fa-exclamation-triangle" style="color: #ffc107; margin-right: 8px;"></i>
                Cette action nécessite une confirmation de votre mot de passe pour des raisons de sécurité.
            </p>
        </div>
    </div>

    <form class="auth-form" method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="form-group">
            <label for="password">Mot de passe actuel</label>
            <div class="input-wrapper">
                <input type="password"
                       id="password"
                       name="password"
                       placeholder="Confirmez votre mot de passe"
                       required
                       autofocus
                       class="@error('password') is-invalid @enderror">
                <i class="fas fa-lock input-icon"></i>
            </div>
            @error('password')
            <span class="error-message">{{ $message }}</span>
            @enderror
            <small style="color: var(--text-secondary); font-size: 0.875rem; margin-top: 5px; display: block;">
                Saisissez le mot de passe de votre compte pour continuer
            </small>
        </div>

        <!-- Actions -->
        <div class="auth-actions">
            <!-- Submit Button -->
            <button type="submit" class="btn-primary-auth">
                <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                Confirmer mon mot de passe
            </button>

            <!-- Cancel Link -->
            <div class="text-center mt-4" style="color: var(--text-secondary); font-size: 0.95rem;">
                <a href="{{ url()->previous() }}" class="auth-link">
                    <i class="fas fa-arrow-left" style="margin-right: 5px;"></i>
                    Annuler et retourner
                </a>
            </div>
        </div>
    </form>
@endsection

@push('styles')
    <style>
        /* Styles spécifiques à la page de confirmation */
        .auth-form .form-group:nth-child(1) { animation-delay: 0.1s; }
        .auth-actions { animation-delay: 0.2s; }

        /* Style pour le bouton de confirmation avec icône */
        .btn-primary-auth i {
            transition: transform 0.3s ease;
        }

        .btn-primary-auth:hover i {
            transform: scale(1.1);
        }

        /* Style pour le message d'avertissement */
        .warning-message {
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Focus automatique sur le champ mot de passe
            const passwordInput = document.getElementById('password');
            if (passwordInput) {
                setTimeout(() => {
                    passwordInput.focus();
                }, 500);
            }

            // Animation du bouton au submit
            const form = document.querySelector('.auth-form');
            const submitBtn = document.querySelector('.btn-primary-auth');

            form.addEventListener('submit', function() {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right: 8px;"></i>Vérification...';
                submitBtn.disabled = true;
            });

            // Validation en temps réel
            passwordInput.addEventListener('input', function() {
                const password = this.value;

                if (password.length > 0) {
                    this.style.borderColor = 'var(--primary-blue)';
                } else {
                    this.style.borderColor = '#e9ecef';
                }
            });

            // Effet visuel sur le message d'avertissement
            const warningMessage = document.querySelector('[style*="background: rgba(255, 193, 7, 0.1)"]');
            if (warningMessage) {
                warningMessage.classList.add('warning-message');
            }
        });
    </script>
@endpush
