@extends('layouts.auth')

@section('title', 'Nouveau mot de passe')

@section('page-title', 'Nouveau mot de passe')

@section('visual-title', 'Presque fini')

@section('visual-subtitle', 'Créez un mot de passe sécurisé pour retrouver l\'accès à votre compte')

@section('visual-icon', 'fas fa-key')

@section('visual-features')
    <li>
        <i class="fas fa-shield-alt"></i>
        <span>Sécurité renforcée</span>
    </li>
    <li>
        <i class="fas fa-lock"></i>
        <span>Chiffrement avancé</span>
    </li>
    <li>
        <i class="fas fa-check-circle"></i>
        <span>Validation stricte</span>
    </li>
    <li>
        <i class="fas fa-history"></i>
        <span>Historique sécurisé</span>
    </li>
    <li>
        <i class="fas fa-user-shield"></i>
        <span>Compte protégé</span>
    </li>
@endsection

@section('content')
    <div style="margin-bottom: 30px;">
        <div style="background: rgba(0, 158, 219, 0.05); padding: 20px; border-radius: 12px; border-left: 4px solid var(--primary-blue);">
            <h4 style="color: var(--primary-blue); font-size: 1.1rem; font-weight: 600; margin-bottom: 10px;">
                <i class="fas fa-info-circle" style="margin-right: 8px;"></i>
                Conseils pour un mot de passe sécurisé
            </h4>
            <ul style="color: var(--text-primary); font-size: 0.9rem; line-height: 1.6; margin: 0; padding-left: 20px;">
                <li>Au moins 8 caractères (12 recommandés)</li>
                <li>Mélangez majuscules et minuscules</li>
                <li>Incluez des chiffres et caractères spéciaux</li>
                <li>Évitez les informations personnelles</li>
            </ul>
        </div>
    </div>

    <form class="auth-form" method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Token caché -->
        <input type="hidden" name="token" value="{{ $token }}">

        <!-- Email -->
        <div class="form-group">
            <label for="email">Adresse email</label>
            <div class="input-wrapper">
                <input type="email"
                       id="email"
                       name="email"
                       value="{{ $email ?? old('email') }}"
                       placeholder="votre@email.com"
                       required
                       readonly
                       style="background-color: #f8f9fa; cursor: not-allowed;"
                       class="@error('email') is-invalid @enderror">
                <i class="fas fa-envelope input-icon"></i>
            </div>
            @error('email')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <!-- New Password -->
        <div class="form-group">
            <label for="password">Nouveau mot de passe</label>
            <div class="input-wrapper">
                <input type="password"
                       id="password"
                       name="password"
                       placeholder="Votre nouveau mot de passe"
                       required
                       autofocus
                       class="@error('password') is-invalid @enderror">
                <i class="fas fa-lock input-icon"></i>
            </div>
            @error('password')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <!-- Indicateur de force du mot de passe -->
            <div id="password-strength" style="margin-top: 8px; display: none;">
                <div style="display: flex; gap: 2px; margin-bottom: 5px;">
                    <div class="strength-bar" style="height: 4px; background: #e9ecef; border-radius: 2px; flex: 1;"></div>
                    <div class="strength-bar" style="height: 4px; background: #e9ecef; border-radius: 2px; flex: 1;"></div>
                    <div class="strength-bar" style="height: 4px; background: #e9ecef; border-radius: 2px; flex: 1;"></div>
                    <div class="strength-bar" style="height: 4px; background: #e9ecef; border-radius: 2px; flex: 1;"></div>
                </div>
                <span id="strength-text" style="font-size: 0.875rem; color: var(--text-secondary);"></span>
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <div class="input-wrapper">
                <input type="password"
                       id="password_confirmation"
                       name="password_confirmation"
                       placeholder="Répétez votre nouveau mot de passe"
                       required
                       class="@error('password_confirmation') is-invalid @enderror">
                <i class="fas fa-check input-icon" id="confirm-icon"></i>
            </div>
            @error('password_confirmation')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <!-- Indicateur de correspondance -->
            <div id="password-match" style="margin-top: 5px; font-size: 0.875rem; display: none;">
                <span id="match-text"></span>
            </div>
        </div>

        <!-- Actions -->
        <div class="auth-actions">
            <!-- Submit Button -->
            <button type="submit" class="btn-primary-auth" id="submit-btn" disabled>
                <i class="fas fa-save" style="margin-right: 8px;"></i>
                Réinitialiser mon mot de passe
            </button>

            <!-- Security note -->
            <div style="background: rgba(40, 167, 69, 0.05); padding: 15px; border-radius: 8px; margin: 20px 0; border-left: 4px solid var(--secondary-green);">
                <p style="color: var(--text-secondary); font-size: 0.9rem; line-height: 1.5; margin: 0; text-align: center;">
                    <i class="fas fa-shield-alt" style="color: var(--secondary-green); margin-right: 8px;"></i>
                    Une fois votre mot de passe mis à jour, vous serez automatiquement connecté à votre compte.
                </p>
            </div>

            <!-- Back to Login -->
            <div class="text-center" style="color: var(--text-secondary); font-size: 0.95rem;">
                <a href="{{ route('login') }}" class="auth-link">
                    <i class="fas fa-arrow-left" style="margin-right: 5px;"></i>
                    Retour à la connexion
                </a>
            </div>
        </div>
    </form>
@endsection

@push('styles')
    <style>
        /* Styles spécifiques à la page de reset */
        .auth-form .form-group:nth-child(1) { animation-delay: 0.1s; }
        .auth-form .form-group:nth-child(2) { animation-delay: 0.2s; }
        .auth-form .form-group:nth-child(3) { animation-delay: 0.3s; }
        .auth-actions { animation-delay: 0.4s; }

        /* Style pour le bouton de réinitialisation */
        .btn-primary-auth i {
            transition: transform 0.3s ease;
        }

        .btn-primary-auth:hover:not(:disabled) i {
            transform: scale(1.1);
        }

        /* Bouton désactivé */
        .btn-primary-auth:disabled {
            background: #6c757d;
            cursor: not-allowed;
            transform: none !important;
        }

        /* Barres de force du mot de passe */
        .strength-weak { background: #dc3545 !important; }
        .strength-fair { background: #ffc107 !important; }
        .strength-good { background: #28a745 !important; }
        .strength-strong { background: #20c997 !important; }

        /* Indicateurs de correspondance */
        .password-match {
            color: var(--secondary-green) !important;
            border-color: var(--secondary-green) !important;
        }

        .password-mismatch {
            color: #dc3545 !important;
            border-color: #dc3545 !important;
        }

        /* Animation pour l'icône de confirmation */
        #confirm-icon {
            transition: all 0.3s ease;
        }

        .icon-success {
            color: var(--secondary-green) !important;
            transform: scale(1.2);
        }

        .icon-error {
            color: #dc3545 !important;
            transform: scale(1.2);
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const submitBtn = document.getElementById('submit-btn');
            const strengthIndicator = document.getElementById('password-strength');
            const strengthBars = document.querySelectorAll('.strength-bar');
            const strengthText = document.getElementById('strength-text');
            const matchIndicator = document.getElementById('password-match');
            const matchText = document.getElementById('match-text');
            const confirmIcon = document.getElementById('confirm-icon');

            // Focus automatique
            setTimeout(() => {
                passwordInput.focus();
            }, 500);

            // Fonction pour calculer la force du mot de passe
            function calculatePasswordStrength(password) {
                let score = 0;
                let feedback = [];

                // Longueur
                if (password.length >= 8) score++;
                else feedback.push('Au moins 8 caractères');

                if (password.length >= 12) score++;

                // Caractères
                if (/[a-z]/.test(password)) score++;
                else feedback.push('Minuscules');

                if (/[A-Z]/.test(password)) score++;
                else feedback.push('Majuscules');

                if (/[0-9]/.test(password)) score++;
                else feedback.push('Chiffres');

                if (/[^A-Za-z0-9]/.test(password)) score++;
                else feedback.push('Caractères spéciaux');

                return { score: Math.min(score, 4), feedback };
            }

            // Validation du mot de passe
            passwordInput.addEventListener('input', function() {
                const password = this.value;

                if (password.length > 0) {
                    strengthIndicator.style.display = 'block';
                    const { score, feedback } = calculatePasswordStrength(password);

                    // Reset barres
                    strengthBars.forEach(bar => {
                        bar.style.background = '#e9ecef';
                    });

                    // Mise à jour des barres
                    const strengthClasses = ['strength-weak', 'strength-fair', 'strength-good', 'strength-strong'];
                    for (let i = 0; i < score; i++) {
                        strengthBars[i].classList.add(strengthClasses[Math.min(score - 1, 3)]);
                    }

                    // Texte de force
                    const strengthTexts = [
                        'Très faible',
                        'Faible',
                        'Moyen',
                        'Fort',
                        'Très fort'
                    ];

                    strengthText.textContent = `Force: ${strengthTexts[score]}`;
                    if (feedback.length > 0 && score < 3) {
                        strengthText.textContent += ` - Manque: ${feedback.join(', ')}`;
                    }

                    // Couleur du texte
                    const textColors = ['#dc3545', '#ffc107', '#28a745', '#20c997'];
                    strengthText.style.color = textColors[Math.min(score - 1, 3)] || '#dc3545';

                } else {
                    strengthIndicator.style.display = 'none';
                }

                validateForm();
            });

            // Validation de la confirmation
            confirmPasswordInput.addEventListener('input', function() {
                validatePasswordMatch();
                validateForm();
            });

            function validatePasswordMatch() {
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;

                if (confirmPassword.length > 0) {
                    matchIndicator.style.display = 'block';

                    if (password === confirmPassword) {
                        confirmPasswordInput.classList.remove('password-mismatch');
                        confirmPasswordInput.classList.add('password-match');
                        matchText.textContent = '✓ Les mots de passe correspondent';
                        matchText.style.color = 'var(--secondary-green)';
                        confirmIcon.classList.remove('icon-error');
                        confirmIcon.classList.add('icon-success');
                    } else {
                        confirmPasswordInput.classList.remove('password-match');
                        confirmPasswordInput.classList.add('password-mismatch');
                        matchText.textContent = '✗ Les mots de passe ne correspondent pas';
                        matchText.style.color = '#dc3545';
                        confirmIcon.classList.remove('icon-success');
                        confirmIcon.classList.add('icon-error');
                    }
                } else {
                    matchIndicator.style.display = 'none';
                    confirmPasswordInput.classList.remove('password-match', 'password-mismatch');
                    confirmIcon.classList.remove('icon-success', 'icon-error');
                }
            }

            // Validation globale du formulaire
            function validateForm() {
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;
                const { score } = calculatePasswordStrength(password);

                const isValid = password.length >= 8 &&
                    confirmPassword.length > 0 &&
                    password === confirmPassword &&
                    score >= 2;

                submitBtn.disabled = !isValid;

                if (isValid) {
                    submitBtn.style.background = 'var(--gradient-primary)';
                    submitBtn.style.cursor = 'pointer';
                } else {
                    submitBtn.style.background = '#6c757d';
                    submitBtn.style.cursor = 'not-allowed';
                }
            }

            // Animation du bouton au submit
            const form = document.querySelector('.auth-form');
            form.addEventListener('submit', function(e) {
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;

                // Double vérification avant soumission
                if (password !== confirmPassword) {
                    e.preventDefault();
                    confirmPasswordInput.focus();
                    return false;
                }

                if (password.length < 8) {
                    e.preventDefault();
                    passwordInput.focus();
                    return false;
                }

                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right: 8px;"></i>Mise à jour...';
                submitBtn.disabled = true;
            });

            // Validation en temps réel des bordures
            passwordInput.addEventListener('blur', function() {
                const { score } = calculatePasswordStrength(this.value);
                if (this.value.length > 0) {
                    if (score >= 3) {
                        this.style.borderColor = 'var(--secondary-green)';
                    } else if (score >= 2) {
                        this.style.borderColor = '#ffc107';
                    } else {
                        this.style.borderColor = '#dc3545';
                    }
                }
            });

            confirmPasswordInput.addEventListener('blur', function() {
                validatePasswordMatch();
            });

            // Validation initiale
            validateForm();

            // Effets visuels supplémentaires
            passwordInput.addEventListener('focus', function() {
                strengthIndicator.style.display = 'block';
            });

            // Animation des barres de force
            function animateStrengthBars() {
                strengthBars.forEach((bar, index) => {
                    setTimeout(() => {
                        bar.style.transform = 'scaleX(1)';
                    }, index * 100);
                });
            }

            // Style pour les barres
            strengthBars.forEach(bar => {
                bar.style.transform = 'scaleX(0)';
                bar.style.transformOrigin = 'left';
                bar.style.transition = 'all 0.3s ease';
            });

            // Gestion des erreurs serveur
            @if($errors->any())
            // Mettre le focus sur le premier champ avec erreur
            const firstErrorField = document.querySelector('.is-invalid');
            if (firstErrorField) {
                setTimeout(() => {
                    firstErrorField.focus();
                }, 500);
            }
            @endif

            // Tooltip pour les conseils de sécurité
            const infoIcon = document.querySelector('.fa-info-circle');
            if (infoIcon) {
                infoIcon.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.2)';
                    this.style.color = 'var(--primary-light)';
                });

                infoIcon.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                    this.style.color = 'var(--primary-blue)';
                });
            }

            // Vérification de la complexité du mot de passe avec feedback en temps réel
            passwordInput.addEventListener('input', function() {
                const password = this.value;

                // Vérifications spécifiques
                const checks = {
                    length: password.length >= 8,
                    lowercase: /[a-z]/.test(password),
                    uppercase: /[A-Z]/.test(password),
                    numbers: /[0-9]/.test(password),
                    special: /[^A-Za-z0-9]/.test(password)
                };

                // Mise à jour visuelle du champ
                if (password.length > 0) {
                    const validChecks = Object.values(checks).filter(Boolean).length;

                    if (validChecks >= 4) {
                        this.style.borderColor = 'var(--secondary-green)';
                        this.style.boxShadow = '0 0 0 4px rgba(40, 167, 69, 0.1)';
                    } else if (validChecks >= 2) {
                        this.style.borderColor = '#ffc107';
                        this.style.boxShadow = '0 0 0 4px rgba(255, 193, 7, 0.1)';
                    } else {
                        this.style.borderColor = '#dc3545';
                        this.style.boxShadow = '0 0 0 4px rgba(220, 53, 69, 0.1)';
                    }
                } else {
                    this.style.borderColor = '#e9ecef';
                    this.style.boxShadow = 'none';
                }
            });

            // Masquer/Afficher le mot de passe (optionnel)
            function addPasswordToggle() {
                [passwordInput, confirmPasswordInput].forEach(input => {
                    const wrapper = input.parentElement;
                    const icon = wrapper.querySelector('.input-icon');

                    // Ajouter un bouton pour afficher/masquer
                    const toggleBtn = document.createElement('button');
                    toggleBtn.type = 'button';
                    toggleBtn.innerHTML = '<i class="fas fa-eye"></i>';
                    toggleBtn.style.cssText = `
                    position: absolute;
                    right: 45px;
                    background: none;
                    border: none;
                    color: var(--text-secondary);
                    cursor: pointer;
                    padding: 5px;
                    border-radius: 3px;
                    transition: color 0.3s ease;
                `;

                    toggleBtn.addEventListener('click', function() {
                        const type = input.type === 'password' ? 'text' : 'password';
                        input.type = type;

                        const eyeIcon = this.querySelector('i');
                        if (type === 'text') {
                            eyeIcon.classList.remove('fa-eye');
                            eyeIcon.classList.add('fa-eye-slash');
                            this.style.color = 'var(--primary-blue)';
                        } else {
                            eyeIcon.classList.remove('fa-eye-slash');
                            eyeIcon.classList.add('fa-eye');
                            this.style.color = 'var(--text-secondary)';
                        }
                    });

                    wrapper.appendChild(toggleBtn);
                });
            }

            // Activer les boutons de toggle (optionnel)
            // addPasswordToggle();
        });
    </script>
@endpush
