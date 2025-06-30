@extends('layouts.auth')

@section('title', 'Réinitialisation mot de passe')

@section('page-title', 'Mot de passe oublié ?')

@section('visual-title', 'Récupération')

@section('visual-subtitle', 'Pas de souci ! Nous allons vous envoyer un lien sécurisé pour réinitialiser votre mot de passe')

@section('visual-icon', 'fas fa-envelope-open-text')

    @section('visual-features')
        <li>
            <i class="fas fa-envelope"></i>
            <span>Email sécurisé</span>
        </li>
        <li>
            <i class="fas fa-clock"></i>
            <span>Lien valide 60 min</span>
        </li>
        <li class="d-flex align-items-center gap-2">
            <i class="fas fa-shield-alt"></i>
            <span>Chiffrement SSL</span>
        </li>
        <li>
            <i class="fas fa-user-check"></i>
            <span>Vérification identité</span>
        </li>
        <li>
            <i class="fas fa-history"></i>
            <span>Historique sécurisé</span>
        </li>
    @endsection

    @section('content')
        <div style="margin-bottom: 30px;">
            <div style="background: rgba(0, 158, 219, 0.05); padding: 20px; border-radius: 12px; border-left: 4px solid var(--primary-blue);">
                <h4 style="color: var(--primary-blue); font-size: 1.1rem; font-weight: 600; margin-bottom: 10px;">
                    <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                    Comment ça fonctionne ?
                </h4>
                <ol style="color: var(--text-primary); font-size: 0.95rem; line-height: 1.6; margin: 0; padding-left: 20px;">
                    <li>Saisissez votre adresse email ci-dessous</li>
                    <li>Vérifiez votre boîte de réception (et vos spams)</li>
                    <li>Cliquez sur le lien dans l'email reçu</li>
                    <li>Créez votre nouveau mot de passe</li>
                </ol>
            </div>
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
                <small style="color: var(--text-secondary); font-size: 0.875rem; margin-top: 5px; display: block;">
                    L'adresse email associée à votre compte GDD
                </small>
            </div>

            <!-- Actions -->
            <div class="auth-actions">
                <!-- Submit Button -->
                <button type="submit" class="btn-primary-auth">
                    <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>
                    Envoyer le lien de récupération
                </button>

                <!-- Additional info -->
                <div style="background: rgba(40, 167, 69, 0.05); padding: 15px; border-radius: 8px; margin: 20px 0; border-left: 4px solid var(--secondary-green);">
                    <p style="color: var(--text-secondary); font-size: 0.9rem; line-height: 1.5; margin: 0;">
                        <i class="fas fa-lightbulb" style="color: var(--secondary-green); margin-right: 8px;"></i>
                        <strong>Conseil :</strong> Si vous ne recevez pas l'email dans les 5 minutes, vérifiez vos dossiers spam et courrier indésirable.
                    </p>
                </div>

                <!-- Back to Login -->
                <div class="text-center" style="color: var(--text-secondary); font-size: 0.95rem;">
                    Vous vous souvenez de votre mot de passe ?
                    <a href="{{ route('login') }}" class="auth-link" style="margin-left: 5px;">
                        <i class="fas fa-arrow-left" style="margin-right: 5px;"></i>
                        Retour à la connexion
                    </a>
                </div>
            </div>
        </form>

        <!-- Aide supplémentaire -->
        <div style="margin-top: 30px; text-align: center; padding-top: 20px; border-top: 1px solid var(--border-light);">
            <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 15px;">
                Toujours des difficultés ?
            </p>
            <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                <a href="#" class="auth-link" style="font-size: 0.9rem;">
                    <i class="fas fa-question-circle" style="margin-right: 5px;"></i>
                    Centre d'aide
                </a>
                <a href="#" class="auth-link" style="font-size: 0.9rem;">
                    <i class="fas fa-envelope" style="margin-right: 5px;"></i>
                    Contacter le support
                </a>
            </div>
        </div>
    @endsection

    @push('styles')
        <style>
            /* Styles spécifiques à la page d'email */
            .auth-form .form-group:nth-child(1) { animation-delay: 0.1s; }
            .auth-actions { animation-delay: 0.2s; }

            /* Style pour le bouton d'envoi avec icône */
            .btn-primary-auth i {
                transition: transform 0.3s ease;
            }

            .btn-primary-auth:hover i {
                transform: translateX(3px);
            }

            /* Animation pour les messages d'info */
            .info-box {
                animation: slideInUp 0.6s ease-out;
            }

            /* Style pour les liens d'aide */
            .help-links {
                animation: fadeIn 1s ease-out;
                animation-delay: 0.5s;
                opacity: 0;
                animation-fill-mode: forwards;
            }

            @keyframes fadeIn {
                to { opacity: 1; }
            }

            /* Responsive pour les liens d'aide */
            @media (max-width: 480px) {
                .help-links {
                    flex-direction: column;
                    gap: 10px;
                }
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

                    // Simuler un délai minimum pour l'UX
                    setTimeout(() => {
                        if (submitBtn.disabled) {
                            submitBtn.innerHTML = '<i class="fas fa-check" style="margin-right: 8px;"></i>Email envoyé !';
                        }
                    }, 2000);
                });

                // Validation email en temps réel avec feedback visuel
                emailInput.addEventListener('input', function() {
                    const email = this.value;
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (email && emailRegex.test(email)) {
                        this.style.borderColor = 'var(--secondary-green)';
                        this.style.boxShadow = '0 0 0 4px rgba(40, 167, 69, 0.1)';
                    } else if (email) {
                        this.style.borderColor = '#ffc107';
                        this.style.boxShadow = '0 0 0 4px rgba(255, 193, 7, 0.1)';
                    } else {
                        this.style.borderColor = '#e9ecef';
                        this.style.boxShadow = 'none';
                    }
                });

                // Animation pour les boîtes d'information
                const infoBoxes = document.querySelectorAll('[style*="background: rgba"]');
                infoBoxes.forEach((box, index) => {
                    box.classList.add('info-box');
                    box.style.animationDelay = `${0.3 + index * 0.1}s`;
                });

                // Animation pour les liens d'aide
                const helpSection = document.querySelector('[style*="border-top"]');
                if (helpSection) {
                    helpSection.classList.add('help-links');
                }
            });
        </script>
    @endpush
