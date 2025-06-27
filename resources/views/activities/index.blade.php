{{-- resources/views/activities/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Nos Activités - GDD | Actions Permanentes pour le Développement Durable')
@section('description', 'Découvrez les activités permanentes du GDD : assistance humanitaire, reboisement, santé communautaire, alphabétisation et construction d\'infrastructures en Afrique.')

@push('styles')
    <style>
        .activity-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            border-left: 5px solid var(--primary-blue);
        }

        .activity-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            border-left-color: var(--secondary-green);
        }

        .activity-header {
            padding: 2rem;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            position: relative;
        }

        .activity-icon {
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
            transition: all 0.3s ease;
        }

        .activity-card:hover .activity-icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 15px 35px rgba(0, 158, 219, 0.4);
        }

        .activity-status {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-permanent {
            background: #28a745;
            color: white;
        }

        .status-ongoing {
            background: #ffc107;
            color: #000;
        }

        .activity-body {
            padding: 2rem;
        }

        .activity-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .activity-description {
            color: var(--dark-gray);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .activity-meta {
            margin-bottom: 1.5rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
            font-size: 0.875rem;
            color: var(--dark-gray);
        }

        .meta-item i {
            color: var(--primary-blue);
            margin-right: 0.75rem;
            width: 16px;
            flex-shrink: 0;
        }

        .activity-metrics {
            background: var(--light-gray);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 1rem;
        }

        .metric-item {
            text-align: center;
        }

        .metric-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-blue);
            display: block;
            margin-bottom: 0.25rem;
        }

        .metric-label {
            font-size: 0.75rem;
            color: var(--dark-gray);
            line-height: 1.2;
        }

        .activity-locations {
            margin-bottom: 1.5rem;
        }

        .location-tag {
            background: rgba(0, 158, 219, 0.1);
            color: var(--primary-blue);
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            margin: 0.25rem 0.25rem 0.25rem 0;
            display: inline-block;
        }

        .category-badge {
            background: var(--secondary-teal);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .activity-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }

        .impact-summary {
            background: var(--gradient-primary);
            color: white;
            border-radius: 20px;
            padding: 3rem 2rem;
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }

        .impact-summary::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M20 20c0 11.046-8.954 20-20 20v-40c11.046 0 20 8.954 20 20z'/%3E%3C/g%3E%3C/svg%3E") repeat;
        }

        .impact-summary h2 {
            position: relative;
            z-index: 1;
            margin-bottom: 1rem;
        }

        .impact-summary p {
            position: relative;
            z-index: 1;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .impact-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 2rem;
            position: relative;
            z-index: 1;
        }

        .impact-stat {
            text-align: center;
        }

        .impact-number {
            font-size: 3rem;
            font-weight: 800;
            display: block;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .impact-label {
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            opacity: 0.9;
        }

        .activities-hero {
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-light));
            color: white;
            padding: 5rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .activities-hero::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='rgba(255,255,255,0.1)' d='M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E") bottom center/cover no-repeat;
        }

        .filters-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
        }

        .filter-btn-activity {
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--primary-blue);
            background: transparent;
            color: var(--primary-blue);
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            margin: 0.25rem;
            text-decoration: none;
        }

        .filter-btn-activity.active,
        .filter-btn-activity:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
            text-decoration: none;
        }

        .volunteer-section {
            background: var(--light-gray);
            border-radius: 20px;
            padding: 3rem;
            text-align: center;
            margin-top: 3rem;
        }

        .volunteer-icon {
            width: 100px;
            height: 100px;
            background: var(--gradient-secondary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin: 0 auto 2rem;
            box-shadow: 0 15px 35px rgba(40, 167, 69, 0.3);
        }

        @media (max-width: 767.98px) {
            .activity-header {
                padding: 1.5rem;
            }

            .activity-body {
                padding: 1.5rem;
            }

            .impact-summary {
                padding: 2rem 1.5rem;
            }

            .impact-number {
                font-size: 2.5rem;
            }

            .activities-hero {
                padding: 3rem 0;
            }

            .filters-section {
                padding: 1.5rem;
            }

            .volunteer-section {
                padding: 2rem;
            }

            .volunteer-icon {
                width: 80px;
                height: 80px;
                font-size: 2.5rem;
            }

            .metrics-grid {
                grid-template-columns: 1fr 1fr;
                gap: 0.75rem;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Activities Hero -->
    <section class="activities-hero">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <h1 class="display-4 fw-bold mb-4">Nos Activités</h1>
                    <p class="fs-5 mb-5 opacity-90">
                        Des actions permanentes et initiatives continues pour un impact durable sur les communautés africaines
                    </p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="#activities" class="btn btn-light btn-lg px-4 border-radius-pill">
                            <i class="fas fa-arrow-down me-2"></i>Découvrir
                        </a>
                        <a href="{{ route('contact.index') }}" class="btn btn-outline-light btn-lg px-4 border-radius-pill">
                            <i class="fas fa-handshake me-2"></i>Rejoindre
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Summary -->
    <section class="section-padding">
        <div class="container">
            <div class="impact-summary" data-aos="fade-up">
                <h2 class="display-5 fw-bold">Notre Impact Global</h2>
                <p class="fs-5">
                    Grâce à nos activités permanentes, nous touchons des milliers de vies chaque année
                </p>
                <div class="impact-stats">
                    <div class="impact-stat">
                        <span class="impact-number" data-count="{{ $total_beneficiaries }}">0</span>
                        <span class="impact-label">Bénéficiaires/An</span>
                    </div>
                    <div class="impact-stat">
                        <span class="impact-number" data-count="{{ count($activities) }}">0</span>
                        <span class="impact-label">Activités</span>
                    </div>
                    <div class="impact-stat">
                        <span class="impact-number" data-count="8">0</span>
                        <span class="impact-label">Pays</span>
                    </div>
                    <div class="impact-stat">
                        <span class="impact-number" data-count="365">0</span>
                        <span class="impact-label">Jours/An</span>
                    </div>
                </div>
            </div>

            <!-- Filters -->
            <div class="filters-section" data-aos="fade-up" data-aos-delay="200">
                <div class="row align-items-center">
                    <div class="col-lg-3 mb-3 mb-lg-0">
                        <h5 class="mb-0 text-primary-custom fw-bold">
                            <i class="fas fa-filter me-2"></i>Filtrer par :
                        </h5>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex flex-wrap justify-content-lg-end justify-content-center">
                            <button class="filter-btn-activity active" data-filter="all">
                                Toutes les activités
                            </button>
                            @foreach($categories as $category)
                                <button class="filter-btn-activity" data-filter="{{ $category }}">
                                    {{ $category }}
                                </button>
                            @endforeach
                            <button class="filter-btn-activity" data-filter="permanent">
                                Permanentes
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activities Grid -->
            <div class="row g-4" id="activitiesGrid">
                @foreach($activities as $index => $activity)
                    <div class="col-lg-6 col-xl-4 activity-item" data-category="{{ $activity['category'] }}" data-status="{{ $activity['status'] }}" data-aos="fade-up" data-aos-delay="{{ ($index % 3 + 1) * 100 }}">
                        <div class="activity-card">
                            <div class="activity-status status-{{ $activity['status'] === 'Permanent' ? 'permanent' : 'ongoing' }}">
                                {{ $activity['status'] }}
                            </div>

                            <div class="activity-header">
                                <div class="activity-icon">
                                    <i class="{{ $activity['icon'] }}"></i>
                                </div>
                                <div class="category-badge">{{ $activity['category'] }}</div>
                            </div>

                            <div class="activity-body d-flex flex-column">
                                <h3 class="activity-title">{{ $activity['title'] }}</h3>
                                <p class="activity-description">{{ $activity['description'] }}</p>

                                <div class="activity-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-users"></i>
                                        <span>{{ number_format($activity['beneficiaries_annual']) }} bénéficiaires/an</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ count($activity['locations']) }} pays d'intervention</span>
                                    </div>
                                </div>

                                <div class="activity-locations">
                                    <div class="mb-2">
                                        <small class="text-muted fw-bold">Zones d'intervention :</small>
                                    </div>
                                    @foreach($activity['locations'] as $location)
                                        <span class="location-tag">{{ $location }}</span>
                                    @endforeach
                                </div>

                                <div class="activity-metrics">
                                    <div class="metrics-grid">
                                        @foreach($activity['metrics'] as $key => $value)
                                            <div class="metric-item">
                                                <span class="metric-number">{{ is_numeric($value) ? number_format($value) : $value }}</span>
                                                <span class="metric-label">{{ $key }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="activity-actions">
                                    <small class="text-muted">
                                        <i class="fas fa-clock me-1"></i>Action {{ strtolower($activity['status']) }}
                                    </small>
                                    <a href="{{ route('activities.show', $activity['slug']) }}" class="btn btn-outline-primary-custom btn-sm">
                                        En savoir plus <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- No results -->
            <div id="noResults" class="text-center py-5 d-none">
                <i class="fas fa-search text-muted mb-3" style="font-size: 4rem;"></i>
                <h4 class="text-muted mb-3">Aucune activité trouvée</h4>
                <p class="text-muted">Essayez de modifier vos critères de filtrage.</p>
                <button class="btn btn-outline-primary-custom" onclick="resetFilters()">
                    <i class="fas fa-refresh me-2"></i>Réinitialiser les filtres
                </button>
            </div>

            <!-- Volunteer Section -->
            <div class="volunteer-section" data-aos="fade-up">
                <div class="volunteer-icon">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <h3 class="text-primary-custom fw-bold mb-3">Rejoignez Nos Activités</h3>
                <p class="fs-5 text-muted mb-4">
                    Devenez bénévole et participez activement à nos initiatives de développement durable
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ route('contact.index') }}" class="btn btn-primary-custom btn-lg px-4">
                        <i class="fas fa-user-plus me-2"></i>Devenir Bénévole
                    </a>
                    <a href="{{ route('trainings.index') }}" class="btn btn-outline-primary-custom btn-lg px-4">
                        <i class="fas fa-graduation-cap me-2"></i>Se Former
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Sections -->
    <section class="section-padding bg-light-custom">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title" data-aos="fade-up">Explorez Aussi</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Découvrez nos autres domaines d'intervention
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-custom text-center h-100">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fas fa-project-diagram text-primary-custom" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="text-primary-custom mb-3">Nos Projets</h4>
                            <p class="text-muted mb-4">Découvrez nos projets à durée déterminée avec des objectifs spécifiques.</p>
                            <a href="{{ route('projects.index') }}" class="btn btn-outline-primary-custom">
                                Voir les projets <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-custom text-center h-100">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fas fa-calendar-alt text-primary-custom" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="text-primary-custom mb-3">Nos Événements</h4>
                            <p class="text-muted mb-4">Participez à nos conférences, forums et ateliers de sensibilisation.</p>
                            <a href="{{ route('events.index') }}" class="btn btn-outline-primary-custom">
                                Voir les événements <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-custom text-center h-100">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fas fa-images text-primary-custom" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="text-primary-custom mb-3">Notre Galerie</h4>
                            <p class="text-muted mb-4">Découvrez en images l'impact de nos activités sur le terrain.</p>
                            <a href="{{ route('gallery.index') }}" class="btn btn-outline-primary-custom">
                                Voir la galerie <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Filtering functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn-activity');
            const activityItems = document.querySelectorAll('.activity-item');
            const noResults = document.getElementById('noResults');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');

                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filter activities
                    let visibleCount = 0;
                    activityItems.forEach(item => {
                        const category = item.getAttribute('data-category');
                        const status = item.getAttribute('data-status');

                        let show = false;
                        if (filter === 'all') {
                            show = true;
                        } else if (filter === 'permanent') {
                            show = status === 'Permanent';
                        } else {
                            show = category === filter;
                        }

                        if (show) {
                            item.style.display = 'block';
                            item.style.animation = 'fadeInUp 0.5s ease forwards';
                            visibleCount++;
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    // Show/hide no results message
                    if (visibleCount === 0) {
                        noResults.classList.remove('d-none');
                    } else {
                        noResults.classList.add('d-none');
                    }
                });
            });
        });

        // Reset filters function
        function resetFilters() {
            const allButton = document.querySelector('.filter-btn-activity[data-filter="all"]');
            if (allButton) {
                allButton.click();
            }
        }

        // Animate impact counters
        function animateCounters() {
            const counters = document.querySelectorAll('.impact-number');

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        counter.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current).toLocaleString();
                    }
                }, 16);
            });
        }

        // Trigger counter animation when section comes into view
        const impactObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    impactObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        document.addEventListener('DOMContentLoaded', function() {
            const impactSection = document.querySelector('.impact-summary');
            if (impactSection) {
                impactObserver.observe(impactSection);
            }
        });

        // Enhanced hover effects
        document.addEventListener('DOMContentLoaded', function() {
            const activityCards = document.querySelectorAll('.activity-card');

            activityCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    const icon = this.querySelector('.activity-icon');
                    icon.style.transform = 'scale(1.1) rotate(5deg)';
                    icon.style.transition = 'transform 0.3s ease';
                });

                card.addEventListener('mouseleave', function() {
                    const icon = this.querySelector('.activity-icon');
                    icon.style.transform = 'scale(1) rotate(0deg)';
                });
            });
        });

        // Smooth scroll to activities section
        document.addEventListener('DOMContentLoaded', function() {
            const discoverBtn = document.querySelector('a[href="#activities"]');
            if (discoverBtn) {
                discoverBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const activitiesSection = document.querySelector('#activitiesGrid');
                    if (activitiesSection) {
                        activitiesSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            }
        });
    </script>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Additional animations */
        .activity-card {
            animation: slideInFromBottom 0.6s ease forwards;
        }

        @keyframes slideInFromBottom {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Pulsing effect for permanent activities */
        .status-permanent {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(40, 167, 69, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(40, 167, 69, 0);
            }
        }
    </style>
@endpush
