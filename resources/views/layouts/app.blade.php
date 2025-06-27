{{-- resources/views/layouts/app.blade.php - VERSION MISE À JOUR --}}
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GDD - Groupement pour le Développement Durable')</title>
    <meta name="description" content="@yield('description', 'GDD œuvre pour un développement durable en Afrique à travers des actions concrètes et des partenariats stratégiques.')">
    <meta name="keywords" content="développement durable, Afrique, ONG, projets, formation, environnement">
    <meta name="author" content="GDD - Groupement pour le Développement Durable">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'GDD - Groupement pour le Développement Durable')">
    <meta property="og:description" content="@yield('description', 'GDD œuvre pour un développement durable en Afrique')">
    <meta property="og:image" content="{{ asset('images/gdd-og-image.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'GDD - Développement Durable')">
    <meta property="twitter:description" content="@yield('description', 'GDD œuvre pour un développement durable en Afrique')">
    <meta property="twitter:image" content="{{ asset('images/gdd-twitter-image.jpg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/gdd-styles.css') }}" rel="stylesheet">
    @stack('styles')

    <!-- Google Analytics -->
    @if(config('app.env') === 'production')
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'GA_MEASUREMENT_ID');
        </script>
    @endif
</head>
<body>
<!-- Contact Bar -->
<div class="contact-bar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="d-flex flex-wrap gap-4">
                    <a href="tel:+22500000000" class="text-decoration-none">
                        <i class="fas fa-phone me-2"></i>+225 XX XX XX XX
                    </a>
                    <a href="mailto:contact@gdd-ci.org" class="text-decoration-none">
                        <i class="fas fa-envelope me-2"></i>contact@gdd-ci.org
                    </a>
                    <span>
                        <i class="fas fa-map-marker-alt me-2"></i>Abidjan, Côte d'Ivoire
                    </span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex align-items-center justify-content-lg-end justify-content-start gap-4 mt-2 mt-lg-0">
                    <!-- Sélecteur de langue -->
                    <div class="language-selector">
                        <div class="dropdown">
                            <button class="btn btn-sm language-btn dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-globe me-2"></i>
                                <span class="current-lang">FR</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end language-menu" aria-labelledby="languageDropdown">
                                <li>
                                    <a class="dropdown-item language-option active" href="#" data-lang="fr">
                                        <img src="https://flagcdn.com/w20/fr.png" alt="Français" class="flag-icon me-2" width="20">
                                        Français
                                        <i class="fas fa-check ms-auto text-primary"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item language-option" href="#" data-lang="en">
                                        <img src="https://flagcdn.com/w20/gb.png" alt="English" class="flag-icon me-2" width="20">
                                        English
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item language-option" href="#" data-lang="ar">
                                        <img src="https://flagcdn.com/w20/sa.png" alt="العربية" class="flag-icon me-2" width="20">
                                        العربية
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Séparateur vertical -->
                    <div class="separator"></div>

                    <!-- Réseaux sociaux -->
                    <div class="social-links">
                        <a href="#" aria-label="Facebook" title="Suivez-nous sur Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" aria-label="Twitter" title="Suivez-nous sur Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" aria-label="LinkedIn" title="Suivez-nous sur LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" aria-label="Instagram" title="Suivez-nous sur Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" aria-label="YouTube" title="Notre chaîne YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<!-- Header avec partenaires -->
<header class="main-header">
    <div class="container">
        <div class="row align-items-center py-3">
            <div class="col-lg-3 col-md-4">
                <a href="/" class="main-logo text-decoration-none">
                    GDD
                </a>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="d-flex flex-wrap justify-content-end align-items-center gap-2">
                    <span class="text-muted me-3 d-none d-md-inline">Nos partenaires :</span>
                    <a href="/ong/stay-in-africa" class="partner-badge">STAY IN AFRICA</a>
                    <a href="/ong/ecosoc" class="partner-badge">ECOSOC</a>
                    <a href="/ong/believe-in-the-world" class="partner-badge">BELIEVE IN THE WORLD</a>
                    <a href="/ong/arabian-face" class="partner-badge d-none d-lg-inline-block">ARABIAN FACE</a>
                    <a href="/ong/acda" class="partner-badge d-none d-lg-inline-block">ACDA</a>
                    <a href="/ong/prelude" class="partner-badge d-none d-xl-inline-block">PRELUDE</a>
                    <a href="/ong/fecopa" class="partner-badge d-none d-xl-inline-block">FECOPA</a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Navigation réorganisée - À remplacer dans votre app.blade.php -->
<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container">
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white fs-4"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <!-- Accueil -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        Accueil
                    </a>
                </li>

                <!-- Actualité -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('actualites.*') ? 'active' : '' }}" href="{{ route('actualites.index') }}">
                        Actualité
                    </a>
                </li>

                <!-- Projets (avec sous-menu) -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('projets.*') ? 'active' : '' }}"
                       href="{{ route('projets.index') }}"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Projets
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('projets.index') }}">
                                Tous les projets
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('projets.category', 'agriculture-durable') }}">
                                Agriculture Durable
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('projets.category', 'energie-renouvelable') }}">
                                Énergie Renouvelable
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('projets.category', 'eau-assainissement') }}">
                                Eau et Assainissement
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('projets.category', 'education') }}">
                                Éducation
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Événements (avec sous-menu) -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('evenements.*') ? 'active' : '' }}"
                       href="{{ route('evenements.index') }}"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Événements
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('evenements.index') }}">
                                Tous les événements
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('evenements.calendar') }}">
                                Calendrier
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('evenements.index', ['type' => 'conference']) }}">
                                Conférences
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('evenements.index', ['type' => 'formation']) }}">
                                Formations
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('evenements.index', ['type' => 'atelier']) }}">
                                Ateliers
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Activités (avec sous-menu) -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('activites.*') ? 'active' : '' }}"
                       href="{{ route('activites.index') }}"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Activités
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('activites.index') }}">
                                Toutes les activités
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('activites.type', 'renforcement-capacites') }}">
                                Renforcement de Capacités
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('activites.type', 'networking') }}">
                                Networking
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('activites.type', 'sensibilisation') }}">
                                Sensibilisation
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Formations (avec sous-menu) -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('formations.*') ? 'active' : '' }}"
                       href="{{ route('formations.index') }}"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Formations
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('formations.index') }}">
                                Toutes les formations
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('formations.domain', 'entrepreneuriat-social') }}">
                                Entrepreneuriat Social
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('formations.domain', 'gestion-projet') }}">
                                Gestion de Projet
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('formations.domain', 'agriculture-agroecologie') }}">
                                Agriculture & Agroécologie
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('formations.domain', 'technologies-digitales') }}">
                                Technologies Digitales
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Galerie (avec sous-menu - SANS icônes comme demandé) -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('galerie.*') ? 'active' : '' }}"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Galerie
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('galerie.photos') ? 'active' : '' }}"
                               href="{{ route('galerie.photos') }}">
                                Photos
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('galerie.videos') ? 'active' : '' }}"
                               href="{{ route('galerie.videos') }}">
                                Vidéos
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- À Propos (avec sous-menu - SANS icônes comme demandé) -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('qui-sommes-nous') || request()->routeIs('organigramme') || request()->routeIs('nos-missions') ? 'active' : '' }}"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        À Propos
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('qui-sommes-nous') ? 'active' : '' }}"
                               href="{{ route('qui-sommes-nous') }}">
                                Qui sommes-nous
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('organigramme') ? 'active' : '' }}"
                               href="{{ route('organigramme') }}">
                                Organigramme
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('nos-missions') ? 'active' : '' }}"
                               href="{{ route('nos-missions') }}">
                                Nos missions
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Contact -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                        Contact
                    </a>
                </li>

                <!-- Nous rejoindre (avec design spécial) -->
                <li class="nav-item">
                    <a class="nav-link nav-link-special {{ request()->routeIs('nous-rejoindre') ? 'active' : '' }}"
                       href="{{ route('nous-rejoindre') }}">
                        <span class="join-us-text">Nous rejoindre</span>
                        <span class="join-us-badge">Recrutement</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main>
    @yield('content')
</main>

<!-- Footer -->
<footer class="main-footer">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5><i class="fas fa-globe-africa me-2"></i>GDD</h5>
                <p class="mb-4">
                    Le Groupement pour le Développement Durable (GDD) œuvre pour un avenir meilleur à travers des actions concrètes en faveur du développement durable en Afrique et dans le monde.
                </p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5><i class="fas fa-link me-2"></i>Liens Rapides</h5>
                <div class="footer-section">
                    <a href="{{ route('home') }}">Accueil</a>
                    <a href="{{ route('qui-sommes-nous') }}">À Propos</a>
                    <a href="{{ route('projets.index') }}">Projets</a>
                    <a href="{{ route('activites.index') }}">Activités</a>
                    <a href="{{ route('actualites.index') }}">Actualités</a>
                {{--    <a href="{{ route('trainings.index') }}">Formations</a>--}}
                    <a href="{{ route('evenements.index') }}">Événements</a>
                    <a href="{{ route('galerie.photos') }}">Galerie Photo</a>
                    <a href="{{ route('galerie.videos') }}">Galerie videos</a>
                </div>
            </div>

            <!-- ONG Partners -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5><i class="fas fa-handshake me-2"></i>ONG Partenaires</h5>
                <div class="footer-section">
                    <a href="#">STAY IN AFRICA</a>
                    <a href="#">ECOSOC</a>
                    <a href="#">BELIEVE IN THE WORLD</a>
                    <a href="#">ARABIAN FACE</a>
                    <a href="#">ACDA</a>
                    <a href="#">PRELUDE</a>
                    <a href="#">FECOPA</a>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5><i class="fas fa-envelope me-2"></i>Contact</h5>
                <div class="footer-section">
                    <div class="mb-3">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Abidjan, Côte d'Ivoire
                    </div>
                    <div class="mb-3">
                        <i class="fas fa-phone me-2"></i>
                        <a href="tel:+22500000000">+225 XX XX XX XX</a>
                    </div>
                    <div class="mb-3">
                        <i class="fas fa-envelope me-2"></i>
                        <a href="mailto:contact@gdd-ci.org">contact@gdd-ci.org</a>
                    </div>
                    <div class="mb-3">
                        <i class="fas fa-globe me-2"></i>
                        <a href="https://www.gdd-ci.org">www.gdd-ci.org</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">
                        &copy; {{ date('Y') }} GDD - Groupement pour le Développement Durable.
                        Tous droits réservés.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <a href="#" class="text-decoration-none me-3">Mentions légales</a>
                    <a href="#" class="text-decoration-none me-3">Politique de confidentialité</a>
                    <a href="#" class="text-decoration-none">Plan du site</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button amélioré -->
<button class="btn btn-ocean position-fixed bottom-0 end-0 m-4 d-none border-radius-pill pulse-ocean" id="backToTop" style="z-index: 1050; width: 60px; height: 60px; font-size: 1.25rem;">
    <i class="fas fa-chevron-up"></i>
</button>

<!-- Scripts -->
<!-- jQuery (optional, only if needed) -->
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS (Animate On Scroll) -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Custom JavaScript Enhanced -->
<script>
    // Initialize AOS with enhanced settings
    AOS.init({
        duration: 800,
        easing: 'ease-in-out-cubic',
        once: true,
        offset: 100,
        delay: 50
    });

    // Enhanced Back to Top Button
    window.addEventListener('scroll', function() {
        const backToTop = document.getElementById('backToTop');
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > 300) {
            backToTop.classList.remove('d-none');
            backToTop.style.transform = 'scale(1)';
        } else {
            backToTop.classList.add('d-none');
            backToTop.style.transform = 'scale(0)';
        }

        // Progress indicator
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;

        // Update button with scroll progress
        backToTop.style.background = `conic-gradient(var(--secondary-turquoise) ${scrolled}%, var(--secondary-teal) ${scrolled}%)`;
    });

    document.getElementById('backToTop').addEventListener('click', function() {
        // Smooth scroll to top with easing
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        // Add click animation
        this.style.transform = 'scale(0.9)';
        setTimeout(() => {
            this.style.transform = 'scale(1)';
        }, 150);
    });

    // Enhanced navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar-custom');
        const scrollTop = window.pageYOffset;

        if (scrollTop > 100) {
            navbar.style.boxShadow = '0 4px 20px rgba(0,0,0,0.15)';
            navbar.style.backdropFilter = 'blur(10px)';
            navbar.style.background = 'linear-gradient(135deg, rgba(0, 158, 219, 0.95), rgba(135, 206, 235, 0.95))';
        } else {
            navbar.style.boxShadow = 'none';
            navbar.style.backdropFilter = 'none';
            navbar.style.background = 'var(--gradient-primary)';
        }
    });

    // Active navigation link highlighting with animation
    const currentLocation = location.pathname;
    const menuItems = document.querySelectorAll('.nav-link');
    menuItems.forEach(item => {
        if(item.getAttribute('href') === currentLocation) {
            item.classList.add('active');
            // Add pulse animation to active item
            item.style.animation = 'pulse 2s infinite';
        }
    });

    // Enhanced loading animation for page transitions
    document.addEventListener('DOMContentLoaded', function() {
        document.body.style.opacity = '0';
        document.body.style.transform = 'translateY(20px)';

        setTimeout(() => {
            document.body.style.transition = 'all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            document.body.style.opacity = '1';
            document.body.style.transform = 'translateY(0)';
        }, 100);
    });

    // Enhanced Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');

                // Add stagger effect for multiple elements
                const siblings = Array.from(entry.target.parentNode.children);
                const index = siblings.indexOf(entry.target);
                entry.target.style.animationDelay = `${index * 0.1}s`;
            }
        });
    }, observerOptions);
    // Observe fade-in elements
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.fade-in, .slide-in-left, .slide-in-right, .scale-in').forEach(el => {
            observer.observe(el);
        });
    });

    // Enhanced mobile menu with animations
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', (e) => {
            // Add click animation
            link.style.transform = 'scale(0.95)';
            setTimeout(() => {
                link.style.transform = 'scale(1)';
            }, 150);

            const navbarCollapse = document.querySelector('.navbar-collapse');
            if (navbarCollapse.classList.contains('show')) {
                const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                bsCollapse.hide();
            }
        });
    });

    // Enhanced preloader with progress
    window.addEventListener('load', function() {
        const preloader = document.querySelector('.preloader');
        if (preloader) {
            preloader.style.opacity = '0';
            preloader.style.transform = 'scale(0.8)';
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 500);
        }
    });
    // Script pour gérer les dropdowns
    document.addEventListener('DOMContentLoaded', function() {
        const dropdowns = document.querySelectorAll('.navbar-custom .dropdown');

        dropdowns.forEach(dropdown => {
            const toggle = dropdown.querySelector('.dropdown-toggle');
            const menu = dropdown.querySelector('.dropdown-menu');

            // Support hover sur desktop
            if (window.innerWidth >= 992) {
                dropdown.addEventListener('mouseenter', function() {
                    menu.classList.add('show');
                    toggle.setAttribute('aria-expanded', 'true');
                });

                dropdown.addEventListener('mouseleave', function() {
                    menu.classList.remove('show');
                    toggle.setAttribute('aria-expanded', 'false');
                });
            }

            // Support click sur mobile
            toggle.addEventListener('click', function(e) {
                if (window.innerWidth < 992) {
                    e.preventDefault();
                    menu.classList.toggle('show');
                    const isExpanded = menu.classList.contains('show');
                    toggle.setAttribute('aria-expanded', isExpanded);
                }
            });
        });

        // Fermer les menus quand on clique ailleurs
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                    menu.classList.remove('show');
                    const toggle = menu.previousElementSibling;
                    if (toggle) toggle.setAttribute('aria-expanded', 'false');
                });
            }
        });

        // Gérer le redimensionnement de la fenêtre
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992) {
                // Sur desktop, s'assurer que les menus sont fermés
                document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                    menu.classList.remove('show');
                });
            }
        });
    });
    // Enhanced cookie consent with animations
    function initCookieConsent() {
        if (!localStorage.getItem('cookiesAccepted')) {
            // Create animated cookie banner
            const cookieBanner = document.createElement('div');
            cookieBanner.className = 'cookie-banner';
            cookieBanner.innerHTML = `
                <div class="cookie-content">
                    <div class="cookie-icon">
                        <i class="fas fa-cookie-bite"></i>
                    </div>
                    <div class="cookie-text">
                        <h6>Cookies</h6>
                        <p>Nous utilisons des cookies pour améliorer votre expérience.</p>
                    </div>
                    <div class="cookie-actions">
                        <button class="btn btn-turquoise btn-sm" onclick="acceptCookies()">Accepter</button>
                        <button class="btn btn-outline-primary-custom btn-sm" onclick="declineCookies()">Refuser</button>
                    </div>
                </div>
            `;

            // Add CSS for cookie banner
            const style = document.createElement('style');
            style.textContent = `
                .cookie-banner {
                    position: fixed;
                    bottom: 20px;
                    right: 20px;
                    background: white;
                    border-radius: 15px;
                    box-shadow: var(--shadow-xl);
                    padding: 1.5rem;
                    max-width: 350px;
                    z-index: 9999;
                    transform: translateY(100px);
                    opacity: 0;
                    transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                    border-left: 4px solid var(--secondary-turquoise);
                }

                .cookie-banner.show {
                    transform: translateY(0);
                    opacity: 1;
                }

                .cookie-content {
                    display: flex;
                    align-items: center;
                    gap: 1rem;
                }

                .cookie-icon {
                    font-size: 2rem;
                    color: var(--secondary-turquoise);
                }

                .cookie-text h6 {
                    margin: 0 0 0.5rem 0;
                    color: var(--primary-dark);
                    font-weight: 600;
                }

                .cookie-text p {
                    margin: 0 0 1rem 0;
                    font-size: 0.875rem;
                    color: var(--dark-gray);
                }

                .cookie-actions {
                    display: flex;
                    gap: 0.5rem;
                    flex-wrap: wrap;
                }
            `;
            document.head.appendChild(style);
            document.body.appendChild(cookieBanner);

            // Show banner with animation
            setTimeout(() => {
                cookieBanner.classList.add('show');
            }, 1000);
        }
    }

    // Cookie functions
    window.acceptCookies = function() {
        localStorage.setItem('cookiesAccepted', 'true');
        const banner = document.querySelector('.cookie-banner');
        banner.style.transform = 'translateY(100px)';
        banner.style.opacity = '0';
        setTimeout(() => banner.remove(), 500);
    };

    window.declineCookies = function() {
        localStorage.setItem('cookiesAccepted', 'false');
        const banner = document.querySelector('.cookie-banner');
        banner.style.transform = 'translateX(400px)';
        banner.style.opacity = '0';
        setTimeout(() => banner.remove(), 500);
    };

    // Call cookie consent on page load
    document.addEventListener('DOMContentLoaded', initCookieConsent);

    // Enhanced performance monitoring
    if ('performance' in window) {
        window.addEventListener('load', function() {
            setTimeout(function() {
                const perfData = performance.timing;
                const loadTime = perfData.loadEventEnd - perfData.navigationStart;

                // Show performance indicator for development
                if (loadTime > 3000) {
                    console.warn('Page load time is slow:', loadTime + 'ms');
                } else {
                    console.log('Page load time:', loadTime + 'ms');
                }

                // Send to analytics if needed
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'page_load_time', {
                        value: loadTime,
                        custom_parameter: 'performance'
                    });
                }
            }, 0);
        });
    }

    // Enhanced error handling for images with retry mechanism
    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('img');
        images.forEach(img => {
            let retryCount = 0;
            const maxRetries = 2;

            function handleImageError() {
                if (retryCount < maxRetries) {
                    retryCount++;
                    setTimeout(() => {
                        img.src = img.src + '?retry=' + retryCount;
                    }, 1000 * retryCount);
                } else {
                    // Final fallback
                    img.src = '/images/placeholder.jpg';
                    img.alt = 'Image non disponible';
                    img.classList.add('error-image');
                }
            }

            img.addEventListener('error', handleImageError);

            // Add loading animation
            img.addEventListener('load', function() {
                this.style.opacity = '1';
                this.style.transform = 'scale(1)';
            });

            // Set initial state
            img.style.opacity = '0.8';
            img.style.transform = 'scale(0.95)';
            img.style.transition = 'all 0.3s ease';
        });
    });

    // Enhanced scroll animations for elements
    function initScrollAnimations() {
        const elements = document.querySelectorAll('[data-scroll-animation]');

        const scrollObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const animation = entry.target.getAttribute('data-scroll-animation');
                    entry.target.classList.add(animation);
                    scrollObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        elements.forEach(el => scrollObserver.observe(el));
    }

    document.addEventListener('DOMContentLoaded', initScrollAnimations);

    // Enhanced button click effects
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.btn');

        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                // Create ripple effect
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');

                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    });

    // Add CSS for ripple effect
    const rippleStyle = document.createElement('style');
    rippleStyle.textContent = `
        .btn {
            position: relative;
            overflow: hidden;
        }

        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            animation: ripple-animation 0.6s ease-out;
            pointer-events: none;
        }

        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        .error-image {
            filter: grayscale(100%);
            opacity: 0.5;
        }

        /* Enhanced pulse animation */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(64, 224, 208, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(64, 224, 208, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(64, 224, 208, 0);
            }
        }

        /* Loading states */
        .loading {
            position: relative;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid var(--secondary-turquoise);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    `;
    document.head.appendChild(rippleStyle);

    // Notification system
    window.showNotification = function(message, type = 'info', duration = 3000) {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <i class="fas fa-${type === 'success' ? 'check' : type === 'error' ? 'times' : 'info'}-circle"></i>
                <span>${message}</span>
            </div>
            <button class="notification-close">&times;</button>
        `;

        // Add notification styles
        if (!document.querySelector('#notification-styles')) {
            const notificationStyles = document.createElement('style');
            notificationStyles.id = 'notification-styles';
            notificationStyles.textContent = `
                .notification {
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: white;
                    border-radius: 10px;
                    box-shadow: var(--shadow-lg);
                    padding: 1rem;
                    min-width: 300px;
                    z-index: 9999;
                    transform: translateX(400px);
                    transition: all 0.3s ease;
                    border-left: 4px solid var(--info);
                }

                .notification-success {
                    border-left-color: var(--success);
                }

                .notification-error {
                    border-left-color: var(--danger);
                }

                .notification-warning {
                    border-left-color: var(--warning);
                }

                .notification.show {
                    transform: translateX(0);
                }

                .notification-content {
                    display: flex;
                    align-items: center;
                    gap: 0.75rem;
                }

                .notification-close {
                    position: absolute;
                    top: 5px;
                    right: 10px;
                    background: none;
                    border: none;
                    font-size: 1.2rem;
                    cursor: pointer;
                    color: var(--dark-gray);
                }
            `;
            document.head.appendChild(notificationStyles);
        }

        document.body.appendChild(notification);

        // Show notification
        setTimeout(() => notification.classList.add('show'), 100);

        // Auto hide
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 300);
        }, duration);

        // Manual close
        notification.querySelector('.notification-close').addEventListener('click', () => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 300);
        });
    };


    document.addEventListener('DOMContentLoaded', function() {
        const languageOptions = document.querySelectorAll('.language-option');
        const currentLangSpan = document.querySelector('.current-lang');
        const languageBtn = document.querySelector('.language-btn');

        // Fonction pour détecter la langue actuelle basée sur l'URL
        function getCurrentLanguageFromUrl() {
            const path = window.location.pathname;
            const segments = path.split('/').filter(segment => segment !== '');

            // Si pas de préfixe de langue (URL racine), retourner 'fr' par défaut
            if (segments.length === 0 || !['fr', 'en', 'ar'].includes(segments[0])) {
                return 'fr';
            }

            return segments[0];
        }

        // Fonction pour changer la langue
        function changeLanguage(langCode, langName, flagSrc, redirect = true) {
            // Mettre à jour le bouton actuel
            currentLangSpan.textContent = langCode.toUpperCase();

            // Mettre à jour les classes actives
            languageOptions.forEach(option => {
                option.classList.remove('active');
                const checkIcon = option.querySelector('.fa-check');
                if (checkIcon) {
                    checkIcon.remove();
                }
            });

            // Ajouter la classe active à l'option sélectionnée
            const selectedOption = document.querySelector(`[data-lang="${langCode}"]`);
            if (selectedOption) {
                selectedOption.classList.add('active');
                selectedOption.insertAdjacentHTML('beforeend', '<i class="fas fa-check ms-auto text-primary"></i>');
            }

            // Fermer le dropdown
            const dropdown = bootstrap.Dropdown.getInstance(languageBtn);
            if (dropdown) {
                dropdown.hide();
            }

            // Sauvegarder la préférence dans localStorage
            localStorage.setItem('selectedLanguage', langCode);

            // Redirection avec gestion de l'URL
            if (redirect) {
                const currentPath = window.location.pathname;
                const segments = currentPath.split('/').filter(segment => segment !== '');

                // Supprimer le préfixe de langue existant s'il y en a un
                if (['fr', 'en', 'ar'].includes(segments[0])) {
                    segments.shift();
                }

                let newPath;
                if (langCode === 'fr') {
                    // Pour le français, pas de préfixe (URL racine)
                    newPath = segments.length > 0 ? '/' + segments.join('/') : '/';
                } else {
                    // Pour les autres langues, ajouter le préfixe
                    newPath = '/' + langCode + (segments.length > 0 ? '/' + segments.join('/') : '');
                }

                // Conserver les paramètres de requête et le hash
                const search = window.location.search;
                const hash = window.location.hash;

                window.location.href = newPath + search + hash;
            }

            console.log(`Langue changée vers: ${langName} (${langCode})`);
        }

        // Gestionnaire d'événements pour les options de langue
        languageOptions.forEach(option => {
            option.addEventListener('click', function(e) {
                e.preventDefault();

                const langCode = this.dataset.lang;
                const langName = this.textContent.trim();
                const flagImg = this.querySelector('.flag-icon');
                const flagSrc = flagImg ? flagImg.src : '';

                changeLanguage(langCode, langName, flagSrc, true);
            });
        });

        // Initialiser la langue au chargement de la page
        function initializeLanguage() {
            const currentLang = getCurrentLanguageFromUrl();
            const savedLanguage = localStorage.getItem('selectedLanguage');

            // Utiliser la langue de l'URL ou celle sauvegardée, avec 'fr' comme défaut
            const langToUse = currentLang || savedLanguage || 'fr';

            const selectedOption = document.querySelector(`[data-lang="${langToUse}"]`);
            if (selectedOption) {
                const langName = selectedOption.textContent.trim();
                const flagImg = selectedOption.querySelector('.flag-icon');
                const flagSrc = flagImg ? flagImg.src : '';

                // Ne pas rediriger lors de l'initialisation
                changeLanguage(langToUse, langName, flagSrc, false);
            }
        }

        // Initialiser au chargement
        initializeLanguage();
    });
</script>

@stack('scripts')

<!-- Custom page scripts -->
@hasSection('page-scripts')
    @yield('page-scripts')
@endif
</body>
</html>
