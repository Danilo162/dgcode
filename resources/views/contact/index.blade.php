{{-- resources/views/contact/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Contact - GDD | Nous Contacter pour le Développement Durable')
@section('description', 'Contactez le GDD pour vos projets de développement durable, partenariats, bénévolat ou toute autre collaboration en Afrique.')

@push('styles')
    <style>
        .contact-hero {
            background: var(--gradient-primary);
            color: white;
            padding: 5rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .contact-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
        }

        .contact-form-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            margin-top: -5rem;
            position: relative;
            z-index: 2;
        }

        .contact-info-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            height: 100%;
            text-align: center;
            transition: all 0.3s ease;
        }

        .contact-info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .contact-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1.5rem;
            box-shadow: 0 10px 25px rgba(0, 158, 219, 0.3);
        }

        .contact-info-card h4 {
            color: var(--primary-dark);
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .contact-info-card p {
            color: var(--dark-gray);
            margin-bottom: 0.5rem;
        }

        .contact-info-card a {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .contact-info-card a:hover {
            color: var(--primary-dark);
        }

        .office-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            border-left: 5px solid var(--primary-blue);
        }

        .office-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            border-left-color: var(--secondary-green);
        }

        .office-type {
            background: var(--secondary-teal);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .office-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 1rem;
        }

        .office-contact {
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            color: var(--dark-gray);
            font-size: 0.875rem;
        }

        .office-contact i {
            color: var(--primary-blue);
            margin-right: 0.75rem;
            width: 16px;
            flex-shrink: 0;
        }

        .form-floating-custom {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-floating-custom .form-control {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 1rem;
            background: white;
            transition: all 0.3s ease;
            min-height: 60px;
        }

        .form-floating-custom .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(0, 158, 219, 0.25);
            background: white;
        }

        .form-floating-custom label {
            color: var(--dark-gray);
            font-weight: 500;
            padding: 0 0.75rem;
            transition: all 0.3s ease;
        }

        .form-control-lg-custom {
            min-height: 120px;
            resize: vertical;
        }

        .contact-type-selector {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .type-option {
            position: relative;
        }

        .type-option input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .type-option label {
            display: block;
            padding: 1rem;
            border: 2px solid #e9ecef;
            border-radius: 15px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
            font-weight: 600;
            color: var(--dark-gray);
        }

        .type-option input[type="radio"]:checked + label {
            border-color: var(--primary-blue);
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 158, 219, 0.3);
        }

        .type-option label i {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            display: block;
        }

        .quick-contact {
            background: var(--light-gray);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .quick-contact-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 1.5rem;
        }

        .quick-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quick-btn-primary {
            background: var(--primary-blue);
            color: white;
        }

        .quick-btn-primary:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
        }

        .quick-btn-secondary {
            background: var(--secondary-green);
            color: white;
        }

        .quick-btn-secondary:hover {
            background: #1e7e34;
            color: white;
            transform: translateY(-2px);
        }

        .quick-btn-outline {
            background: transparent;
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
        }

        .quick-btn-outline:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
        }

        .hours-table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .hours-table .table {
            margin-bottom: 0;
        }

        .hours-table .table th {
            background: var(--primary-blue);
            color: white;
            border: none;
            padding: 1rem;
            font-weight: 600;
        }

        .hours-table .table td {
            padding: 1rem;
            border-color: #f1f3f4;
            color: var(--dark-gray);
        }

        .form-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 1rem;
            border-radius: 15px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .form-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 1rem;
            border-radius: 15px;
            margin-bottom: 1.5rem;
        }

        .social-contact {
            background: var(--gradient-secondary);
            color: white;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            margin-top: 2rem;
        }

        .social-links-large {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .social-link-large {
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.2);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 1.5rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .social-link-large:hover {
            background: white;
            color: var(--secondary-green);
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .map-container {
            background: #f8f9fa;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            margin-top: 2rem;
        }

        .map-placeholder {
            background: var(--gradient-primary);
            color: white;
            border-radius: 15px;
            padding: 4rem 2rem;
            margin-bottom: 1rem;
        }

        @media (max-width: 767.98px) {
            .contact-form-card {
                margin-top: -3rem;
                padding: 2rem;
            }

            .contact-info-card {
                padding: 2rem;
                margin-bottom: 2rem;
            }

            .contact-type-selector {
                grid-template-columns: 1fr;
                gap: 0.75rem;
            }

            .quick-contact-buttons {
                flex-direction: column;
                align-items: center;
            }

            .quick-btn {
                width: 100%;
                max-width: 280px;
                justify-content: center;
            }

            .social-links-large {
                gap: 0.75rem;
            }

            .social-link-large {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
            }
        }

        /* Loading animation for form submission */
        .btn-loading {
            position: relative;
            color: transparent !important;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            margin: auto;
            border: 2px solid transparent;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: button-loading-spinner 1s ease infinite;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        @keyframes button-loading-spinner {
            from {
                transform: rotate(0turn);
            }
            to {
                transform: rotate(1turn);
            }
        }
    </style>
@endpush

@section('content')
    <!-- Contact Hero -->
    <section class="contact-hero">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <h1 class="display-4 fw-bold mb-4">Contactez-Nous</h1>
                    <p class="fs-5 mb-0 opacity-90">
                        Nous sommes là pour répondre à vos questions et discuter de vos projets de développement durable
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <!-- Quick Contact -->
            <div class="quick-contact" data-aos="fade-up">
                <h3 class="text-primary-custom fw-bold mb-3">Contact Rapide</h3>
                <p class="text-muted">Besoin d'une réponse immédiate ? Utilisez nos canaux de communication directs</p>
                <div class="quick-contact-buttons">
                    <a href="tel:{{ $contact_info['phone'] }}" class="quick-btn quick-btn-primary">
                        <i class="fas fa-phone"></i>Appeler maintenant
                    </a>
                    <a href="mailto:{{ $contact_info['email'] }}" class="quick-btn quick-btn-secondary">
                        <i class="fas fa-envelope"></i>Envoyer un email
                    </a>
                    <a href="https://wa.me/22500000000" class="quick-btn quick-btn-outline" target="_blank">
                        <i class="fab fa-whatsapp"></i>WhatsApp
                    </a>
                </div>
            </div>

            <div class="row g-5">
                <!-- Contact Form -->
                <div class="col-lg-8">
                    <div class="contact-form-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="text-center mb-4">
                            <h2 class="text-primary-custom fw-bold">Envoyez-nous un Message</h2>
                            <p class="text-muted">Remplissez le formulaire ci-dessous et nous vous répondrons dans les 24h</p>
                        </div>

                        @if(session('success'))
                            <div class="form-success">
                                <i class="fas fa-check-circle"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="form-error">
                                <h6><i class="fas fa-exclamation-triangle me-2"></i>Veuillez corriger les erreurs suivantes :</h6>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" id="contactForm">
                            @csrf

                            <!-- Contact Type -->
                            <div class="mb-4">
                                <label class="form-label fw-bold text-primary-custom mb-3">
                                    <i class="fas fa-tags me-2"></i>Type de demande *
                                </label>
                                <div class="contact-type-selector">
                                    <div class="type-option">
                                        <input type="radio" name="type" value="general" id="type_general" {{ old('type') == 'general' ? 'checked' : '' }} required>
                                        <label for="type_general">
                                            <i class="fas fa-info-circle"></i>
                                            Général
                                        </label>
                                    </div>
                                    <div class="type-option">
                                        <input type="radio" name="type" value="partnership" id="type_partnership" {{ old('type') == 'partnership' ? 'checked' : '' }}>
                                        <label for="type_partnership">
                                            <i class="fas fa-handshake"></i>
                                            Partenariat
                                        </label>
                                    </div>
                                    <div class="type-option">
                                        <input type="radio" name="type" value="volunteer" id="type_volunteer" {{ old('type') == 'volunteer' ? 'checked' : '' }}>
                                        <label for="type_volunteer">
                                            <i class="fas fa-heart"></i>
                                            Bénévolat
                                        </label>
                                    </div>
                                    <div class="type-option">
                                        <input type="radio" name="type" value="donation" id="type_donation" {{ old('type') == 'donation' ? 'checked' : '' }}>
                                        <label for="type_donation">
                                            <i class="fas fa-gift"></i>
                                            Don
                                        </label>
                                    </div>
                                    <div class="type-option">
                                        <input type="radio" name="type" value="project" id="type_project" {{ old('type') == 'project' ? 'checked' : '' }}>
                                        <label for="type_project">
                                            <i class="fas fa-project-diagram"></i>
                                            Projet
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating-custom">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Votre nom complet" value="{{ old('name') }}" required>
                                        <label for="name">Nom complet *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating-custom">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="votre@email.com" value="{{ old('email') }}" required>
                                        <label for="email">Adresse email *</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating-custom">
                                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="+225 XX XX XX XX" value="{{ old('phone') }}">
                                        <label for="phone">Téléphone (optionnel)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating-custom">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet de votre message" value="{{ old('subject') }}" required>
                                        <label for="subject">Sujet *</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating-custom">
                                <textarea class="form-control form-control-lg-custom" name="message" id="message" placeholder="Décrivez votre demande en détail..." required>{{ old('message') }}</textarea>
                                <label for="message">Votre message *</label>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="newsletter">
                                <label class="form-check-label" for="newsletter">
                                    Je souhaite recevoir la newsletter GDD avec les dernières actualités
                                </label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary-custom btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Envoyer le Message
                                </button>
                            </div>

                            <p class="text-muted text-center mt-3 small">
                                <i class="fas fa-lock me-1"></i>Vos données sont protégées et ne seront jamais partagées avec des tiers.
                            </p>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="col-lg-4">
                    <!-- Main Contact -->
                    <div class="contact-info-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="contact-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h4>Siège Social</h4>
                        <p><i class="fas fa-map-marker-alt text-primary-custom me-2"></i>{{ $contact_info['address'] }}</p>
                        <p><i class="fas fa-phone text-primary-custom me-2"></i><a href="tel:{{ $contact_info['phone'] }}">{{ $contact_info['phone'] }}</a></p>
                        <p><i class="fas fa-envelope text-primary-custom me-2"></i><a href="mailto:{{ $contact_info['email'] }}">{{ $contact_info['email'] }}</a></p>
                        <p><i class="fas fa-globe text-primary-custom me-2"></i><a href="https://{{ $contact_info['website'] }}" target="_blank">{{ $contact_info['website'] }}</a></p>
                    </div>

                    <!-- Office Hours -->
                    <div class="mt-4" data-aos="fade-up" data-aos-delay="400">
                        <h5 class="text-primary-custom fw-bold mb-3">
                            <i class="fas fa-clock me-2"></i>Heures d'Ouverture
                        </h5>
                        <div class="hours-table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Jour</th>
                                    <th>Horaires</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contact_info['hours'] as $day => $hours)
                                    <tr>
                                        <td class="fw-bold">{{ $day }}</td>
                                        <td>{{ $hours }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="social-contact" data-aos="fade-up" data-aos-delay="500">
                        <h5 class="fw-bold mb-3">
                            <i class="fas fa-share-alt me-2"></i>Suivez-nous
                        </h5>
                        <p class="opacity-90">Restez connecté avec nous sur les réseaux sociaux</p>
                        <div class="social-links-large">
                            <a href="#" class="social-link-large" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-link-large" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-link-large" title="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-link-large" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-link-large" title="YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Our Offices -->
            <div class="mt-5">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Nos Bureaux</h2>
                    <p class="section-subtitle">Retrouvez-nous dans plusieurs pays d'Afrique de l'Ouest</p>
                </div>

                <div class="row g-4">
                    @foreach($offices as $index => $office)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                            <div class="office-card">
                                <div class="office-type">{{ $office['type'] }}</div>
                                <h4 class="office-name">{{ $office['name'] }}</h4>

                                <div class="office-contact">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $office['address'] }}</span>
                                </div>

                                <div class="office-contact">
                                    <i class="fas fa-phone"></i>
                                    <a href="tel:{{ $office['phone'] }}">{{ $office['phone'] }}</a>
                                </div>

                                <div class="office-contact">
                                    <i class="fas fa-envelope"></i>
                                    <a href="mailto:{{ $office['email'] }}">{{ $office['email'] }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Map Section -->
            <div class="map-container" data-aos="fade-up">
                <h4 class="text-primary-custom fw-bold mb-3">
                    <i class="fas fa-map-marked-alt me-2"></i>Notre Localisation
                </h4>
                <div class="map-placeholder">
                    <i class="fas fa-map-marker-alt mb-3" style="font-size: 3rem;"></i>
                    <h5>Carte Interactive</h5>
                    <p class="opacity-90">Trouvez-nous facilement à Abidjan, Côte d'Ivoire</p>
                    <button class="btn btn-light mt-3" onclick="openMap()">
                        <i class="fas fa-external-link-alt me-2"></i>Ouvrir dans Google Maps
                    </button>
                </div>
                <p class="text-muted mt-3">
                    <i class="fas fa-info-circle me-2"></i>
                    Cliquez sur le bouton pour obtenir l'itinéraire vers notre siège social
                </p>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Form submission with loading state
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            // Add loading state
            submitBtn.classList.add('btn-loading');
            submitBtn.disabled = true;

            // In a real application, you would remove this timeout
            // The form would submit naturally and the page would reload
            setTimeout(() => {
                submitBtn.classList.remove('btn-loading');
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });

        // Form validation enhancements
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const inputs = form.querySelectorAll('input[required], textarea[required]');

            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (!this.value.trim()) {
                        this.style.borderColor = '#dc3545';
                    } else {
                        this.style.borderColor = '#28a745';
                    }
                });

                input.addEventListener('input', function() {
                    if (this.value.trim()) {
                        this.style.borderColor = '#28a745';
                    }
                });
            });

            // Email validation
            const emailInput = document.getElementById('email');
            emailInput.addEventListener('blur', function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(this.value)) {
                    this.style.borderColor = '#dc3545';
                } else {
                    this.style.borderColor = '#28a745';
                }
            });

            // Phone number formatting
            const phoneInput = document.getElementById('phone');
            phoneInput.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, '');
                if (value.startsWith('225')) {
                    value = value.substring(3);
                }
                if (value.length >= 8) {
                    value = value.substring(0, 8);
                    this.value = '+225 ' + value.substring(0, 2) + ' ' + value.substring(2, 4) + ' ' + value.substring(4, 6) + ' ' + value.substring(6, 8);
                } else {
                    this.value = value;
                }
            });
        });

        // Contact type selector animation
        document.addEventListener('DOMContentLoaded', function() {
            const typeInputs = document.querySelectorAll('input[name="type"]');

            typeInputs.forEach(input => {
                input.addEventListener('change', function() {
                    // Remove animation from all labels
                    document.querySelectorAll('.type-option label').forEach(label => {
                        label.style.animation = '';
                    });

                    // Add animation to selected label
                    if (this.checked) {
                        this.nextElementSibling.style.animation = 'pulse 0.5s ease';
                    }
                });
            });
        });

        // Open map function
        function openMap() {
            const address = encodeURIComponent("{{ $contact_info['address'] }}");
            const url = `https://www.google.com/maps/search/?api=1&query=${address}`;
            window.open(url, '_blank');
        }

        // Auto-hide success/error messages
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.form-success, .form-error');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-20px)';
                    setTimeout(() => {
                        alert.remove();
                    }, 300);
                }, 5000);
            });
        });

        // Character counter for message textarea
        document.addEventListener('DOMContentLoaded', function() {
            const messageTextarea = document.getElementById('message');
            const maxLength = 2000;

            // Create counter element
            const counter = document.createElement('div');
            counter.className = 'text-muted small text-end mt-1';
            counter.style.marginTop = '-1rem';
            counter.style.marginBottom = '1rem';
            messageTextarea.parentNode.appendChild(counter);

            function updateCounter() {
                const remaining = maxLength - messageTextarea.value.length;
                counter.textContent = `${messageTextarea.value.length}/${maxLength} caractères`;

                if (remaining < 100) {
                    counter.style.color = '#dc3545';
                } else if (remaining < 300) {
                    counter.style.color = '#ffc107';
                } else {
                    counter.style.color = '#6c757d';
                }
            }

            messageTextarea.addEventListener('input', updateCounter);
            updateCounter(); // Initial call
        });

        // Enhanced hover effects for office cards
        document.addEventListener('DOMContentLoaded', function() {
            const officeCards = document.querySelectorAll('.office-card');

            officeCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    const typeElement = this.querySelector('.office-type');
                    typeElement.style.transform = 'scale(1.1)';
                    typeElement.style.transition = 'transform 0.3s ease';
                });

                card.addEventListener('mouseleave', function() {
                    const typeElement = this.querySelector('.office-type');
                    typeElement.style.transform = 'scale(1)';
                });
            });
        });
    </script>
@endpush
