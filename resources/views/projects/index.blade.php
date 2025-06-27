{{-- resources/views/projects/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Nos Projets - GDD | Développement Durable en Afrique')
@section('description', 'Découvrez les projets de développement durable du GDD à travers l\'Afrique : agriculture, énergie, éducation, eau et autonomisation des communautés.')

@push('styles')
    <style>
        .project-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .project-image {
            height: 250px;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            position: relative;
            overflow: hidden;
        }

        .project-status {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-ongoing {
            background: #28a745;
            color: white;
        }

        .status-completed {
            background: var(--primary-blue);
            color: white;
        }

        .status-planning {
            background: #ffc107;
            color: #000;
        }

        .project-progress {
            margin-bottom: 1rem;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            color: var(--dark-gray);
        }

        .progress-custom {
            height: 8px;
            border-radius: 10px;
            background: #e9ecef;
            overflow: hidden;
        }

        .progress-bar-custom {
            background: var(--gradient-primary);
            transition: width 1.5s ease;
            border-radius: 10px;
        }

        .project-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            font-size: 0.875rem;
            color: var(--dark-gray);
        }

        .meta-item i {
            color: var(--primary-blue);
            margin-right: 0.5rem;
            width: 16px;
        }

        .project-budget {
            background: var(--light-gray);
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .budget-amount {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 0.25rem;
        }

        .budget-source {
            font-size: 0.75rem;
            color: var(--dark-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .category-filter {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .filter-btn {
            padding: 0.5rem 1.25rem;
            border: 2px solid var(--primary-blue);
            background: transparent;
            color: var(--primary-blue);
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            margin: 0.25rem;
        }

        .filter-btn.active,
        .filter-btn:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
        }

        .stats-overview {
            background: var(--gradient-primary);
            color: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .overview-stat {
            text-align: center;
        }

        .overview-number {
            font-size: 2.5rem;
            font-weight: 800;
            display: block;
            margin-bottom: 0.5rem;
        }

        .overview-label {
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            opacity: 0.9;
        }

        .project-icon {
            position: absolute;
            top: 15px;
            left: 15px;
            width: 50px;
            height: 50px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .project-card .card-body {
            padding: 2rem;
        }

        .project-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .project-description {
            color: var(--dark-gray);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .project-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }

        .category-badge {
            background: var(--secondary-teal);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .location-badge {
            background: rgba(0, 158, 219, 0.1);
            color: var(--primary-blue);
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        @media (max-width: 767.98px) {
            .project-meta {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }

            .category-filter {
                padding: 1.5rem;
            }

            .filter-btn {
                display: block;
                width: 100%;
                margin: 0.25rem 0;
            }

            .stats-overview {
                padding: 1.5rem;
            }

            .overview-number {
                font-size: 2rem;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="page-header">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="mb-4" data-aos="fade-up">Nos Projets</h1>
                    <p class="fs-5 mb-0" data-aos="fade-up" data-aos-delay="100">
                        Découvrez nos initiatives qui transforment les communautés à travers l'Afrique
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Overview -->
    <section class="section-padding">
        <div class="container">
            <div class="stats-overview" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-3 col-6 mb-3 mb-md-0">
                        <div class="overview-stat">
                            <span class="overview-number">{{ count($projects) }}</span>
                            <span class="overview-label">Projets Total</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-3 mb-md-0">
                        <div class="overview-stat">
                            <span class="overview-number">{{ number_format($total_beneficiaries) }}</span>
                            <span class="overview-label">Bénéficiaires</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="overview-stat">
                            <span class="overview-number">{{ number_format($total_budget / 1000000, 1) }}M€</span>
                            <span class="overview-label">Budget Total</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="overview-stat">
                            <span class="overview-number">{{ count($categories) }}</span>
                            <span class="overview-label">Domaines</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters -->
            <div class="category-filter" data-aos="fade-up" data-aos-delay="200">
                <div class="row align-items-center">
                    <div class="col-lg-3 mb-3 mb-lg-0">
                        <h5 class="mb-0 text-primary-custom fw-bold">
                            <i class="fas fa-filter me-2"></i>Filtrer par :
                        </h5>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex flex-wrap justify-content-lg-end justify-content-center">
                            <button class="filter-btn active" data-filter="all">
                                Tous les projets
                            </button>
                            @foreach($categories as $category)
                                <button class="filter-btn" data-filter="{{ $category }}">
                                    {{ $category }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projects Grid -->
            <div class="row g-4" id="projectsGrid">
                @foreach($projects as $index => $project)
                    <div class="col-lg-4 col-md-6 project-item" data-category="{{ $project['category'] }}" data-aos="fade-up" data-aos-delay="{{ ($index % 3 + 1) * 100 }}">
                        <div class="project-card">
                            <div class="project-image">
                                <div class="project-icon">
                                    <i class="fas fa-{{ $project['category'] === 'Agriculture' ? 'seedling' : ($project['category'] === 'Énergie' ? 'solar-panel' : ($project['category'] === 'Éducation' ? 'graduation-cap' : ($project['category'] === 'Eau et Assainissement' ? 'tint' : 'female'))) }}"></i>
                                </div>
                                <div class="project-status status-{{ $project['status'] === 'En cours' ? 'ongoing' : 'completed' }}">
                                    {{ $project['status'] }}
                                </div>
                                <i class="fas fa-{{ $project['category'] === 'Agriculture' ? 'seedling' : ($project['category'] === 'Énergie' ? 'solar-panel' : ($project['category'] === 'Éducation' ? 'graduation-cap' : ($project['category'] === 'Eau et Assainissement' ? 'tint' : 'female'))) }}"></i>
                            </div>

                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <span class="category-badge">{{ $project['category'] }}</span>
                                    <span class="location-badge">{{ $project['location'] }}</span>
                                </div>

                                <h3 class="project-title">{{ $project['title'] }}</h3>
                                <p class="project-description">{{ $project['description'] }}</p>

                                <div class="project-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>{{ \Carbon\Carbon::parse($project['start_date'])->format('M Y') }} - {{ \Carbon\Carbon::parse($project['end_date'])->format('M Y') }}</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-users"></i>
                                        <span>{{ number_format($project['beneficiaries']) }} bénéficiaires</span>
                                    </div>
                                </div>

                                @if($project['status'] === 'En cours')
                                    <div class="project-progress">
                                        <div class="progress-label">
                                            <span>Progression</span>
                                            <span class="fw-bold">{{ $project['progress'] }}%</span>
                                        </div>
                                        <div class="progress-custom">
                                            <div class="progress-bar-custom" style="width: {{ $project['progress'] }}%"></div>
                                        </div>
                                    </div>
                                @endif

                                <div class="project-budget">
                                    <div class="budget-amount">{{ number_format($project['budget']) }}€</div>
                                    <div class="budget-source">Financement : {{ $project['funding_source'] }}</div>
                                </div>

                                <div class="project-actions">
                                    <small class="text-muted">
                                        <i class="fas fa-map-marker-alt me-1"></i>{{ $project['location'] }}
                                    </small>
                                    <a href="{{ route('projects.show', $project['slug']) }}" class="btn btn-outline-primary-custom btn-sm">
                                        Détails <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- No results message -->
            <div id="noResults" class="text-center py-5 d-none">
                <div class="mb-4">
                    <i class="fas fa-search fs-1 text-muted"></i>
                </div>
                <h4 class="text-muted mb-3">Aucun projet trouvé</h4>
                <p class="text-muted">Essayez de modifier vos critères de filtrage.</p>
                <button class="btn btn-outline-primary-custom" onclick="resetFilters()">
                    <i class="fas fa-refresh me-2"></i>Réinitialiser les filtres
                </button>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section-padding bg-primary-gradient text-white text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="zoom-in">
                    <h2 class="mb-4">Soutenez Nos Projets</h2>
                    <p class="fs-5 mb-5 opacity-90">
                        Votre soutien nous permet de développer davantage de projets et d'atteindre plus de communautés en Afrique.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg px-5 border-radius-pill">
                            <i class="fas fa-handshake me-2"></i>Devenir Partenaire
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg px-5 border-radius-pill">
                            <i class="fas fa-heart me-2"></i>Faire un Don
                        </a>
                        <a href="{{ route('trainings.index') }}" class="btn btn-outline-light btn-lg px-5 border-radius-pill">
                            <i class="fas fa-graduation-cap me-2"></i>Se Former
                        </a>
                    </div>
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
                                <i class="fas fa-tasks text-primary-custom" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="text-primary-custom mb-3">Nos Activités</h4>
                            <p class="text-muted mb-4">Découvrez nos activités permanentes et initiatives en cours.</p>
                            <a href="{{ route('activities.index') }}" class="btn btn-outline-primary-custom">
                                Voir les activités <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-custom text-center h-100">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fas fa-graduation-cap text-primary-custom" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="text-primary-custom mb-3">Nos Formations</h4>
                            <p class="text-muted mb-4">Développez vos compétences avec nos programmes de formation.</p>
                            <a href="{{ route('trainings.index') }}" class="btn btn-outline-primary-custom">
                                Voir les formations <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-custom text-center h-100">
                        <div class="card-body">
                            <div class="mb-4">
                                <i class="fas fa-calendar-alt text-primary-custom" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="text-primary-custom mb-3">Nos Événements</h4>
                            <p class="text-muted mb-4">Participez à nos conférences, forums et rencontres.</p>
                            <a href="{{ route('events.index') }}" class="btn btn-outline-primary-custom">
                                Voir les événements <i class="fas fa-arrow-right ms-1"></i>
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
            const filterButtons = document.querySelectorAll('.filter-btn');
            const projectItems = document.querySelectorAll('.project-item');
            const noResults = document.getElementById('noResults');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');

                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filter projects
                    let visibleCount = 0;
                    projectItems.forEach(item => {
                        const category = item.getAttribute('data-category');

                        if (filter === 'all' || category === filter) {
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
            const allButton = document.querySelector('.filter-btn[data-filter="all"]');
            if (allButton) {
                allButton.click();
            }
        }

        // Animate progress bars when they come into view
        const progressObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const progressBar = entry.target.querySelector('.progress-bar-custom');
                    if (progressBar) {
                        const width = progressBar.style.width;
                        progressBar.style.width = '0%';
                        setTimeout(() => {
                            progressBar.style.width = width;
                        }, 200);
                    }
                    progressObserver.unobserve(entry.target);
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.project-progress').forEach(progress => {
                progressObserver.observe(progress);
            });
        });

        // Animate counter numbers
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toLocaleString();
                }
            }, 20);
        }

        // Trigger counter animation
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.overview-number');
                    counters.forEach(counter => {
                        const text = counter.textContent;
                        const numbers = text.match(/[\d,]+/);
                        if (numbers) {
                            const target = parseInt(numbers[0].replace(/,/g, ''));
                            animateCounter(counter, target);
                        }
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const statsOverview = document.querySelector('.stats-overview');
            if (statsOverview) {
                statsObserver.observe(statsOverview);
            }
        });

        // Enhanced hover effects for project cards
        document.addEventListener('DOMContentLoaded', function() {
            const projectCards = document.querySelectorAll('.project-card');

            projectCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    const image = this.querySelector('.project-image');
                    image.style.transform = 'scale(1.05)';
                    image.style.transition = 'transform 0.3s ease';
                });

                card.addEventListener('mouseleave', function() {
                    const image = this.querySelector('.project-image');
                    image.style.transform = 'scale(1)';
                });
            });
        });
    </script>

    <!-- Add CSS animations -->
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

        .project-item {
            transition: all 0.3s ease;
        }

        .project-image {
            transition: transform 0.3s ease;
        }

        /* Improved responsive design */
        @media (max-width: 575.98px) {
            .stats-overview .row > div {
                margin-bottom: 1rem;
            }

            .stats-overview .row > div:last-child {
                margin-bottom: 0;
            }

            .overview-number {
                font-size: 2rem !important;
            }
        }

        /* Loading state for project cards */
        .project-card.loading {
            opacity: 0.6;
            pointer-events: none;
        }

        .project-card.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid var(--primary-blue);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
@endpush
