{{-- resources/views/events/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Nos Événements - GDD | Conférences et Forums sur le Développement Durable')
@section('description', 'Participez aux événements du GDD : conférences, forums, ateliers et rencontres sur le développement durable en Afrique.')

@push('styles')
    <style>
        .event-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
        }

        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .event-header {
            background: var(--gradient-primary);
            color: white;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .event-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            transform: translate(30px, -30px);
        }

        .event-date-large {
            background: rgba(255,255,255,0.2);
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            margin-bottom: 1rem;
            backdrop-filter: blur(10px);
        }

        .event-day {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1;
            display: block;
        }

        .event-month {
            font-size: 1rem;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .event-time {
            background: var(--secondary-orange);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.875rem;
            font-weight: 600;
            display: inline-block;
            margin-top: 1rem;
        }

        .event-body {
            padding: 2rem;
        }

        .event-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .event-description {
            color: var(--dark-gray);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .event-meta {
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

        .event-status {
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

        .status-upcoming {
            background: #28a745;
            color: white;
        }

        .status-ongoing {
            background: #ffc107;
            color: #000;
        }

        .status-past {
            background: #6c757d;
            color: white;
        }

        .event-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }

        .price-tag {
            background: var(--secondary-green);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .price-free {
            background: var(--secondary-teal);
        }

        .category-badge {
            background: rgba(0, 158, 219, 0.1);
            color: var(--primary-blue);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .event-organizers {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .organizer-badge {
            background: var(--light-gray);
            color: var(--dark-gray);
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .events-hero {
            background: var(--gradient-primary);
            color: white;
            padding: 4rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .events-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
        }

        .stats-cards {
            margin-top: -3rem;
            position: relative;
            z-index: 2;
        }

        .stat-card-event {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            height: 100%;
        }

        .stat-number-event {
            font-size: 3rem;
            font-weight: 800;
            color: var(--primary-blue);
            display: block;
            margin-bottom: 0.5rem;
        }

        .stat-label-event {
            color: var(--dark-gray);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.875rem;
        }

        .filters-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .filter-btn-event {
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

        .filter-btn-event.active,
        .filter-btn-event:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
            text-decoration: none;
        }

        .upcoming-banner {
            background: linear-gradient(135deg, var(--secondary-green), var(--secondary-teal));
            color: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .countdown-timer {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        .countdown-item {
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            min-width: 80px;
        }

        .countdown-number {
            font-size: 2rem;
            font-weight: 800;
            display: block;
        }

        .countdown-label {
            font-size: 0.75rem;
            opacity: 0.9;
            text-transform: uppercase;
        }

        @media (max-width: 767.98px) {
            .event-header {
                padding: 1.5rem;
            }

            .event-body {
                padding: 1.5rem;
            }

            .event-day {
                font-size: 2rem;
            }

            .stats-cards {
                margin-top: -2rem;
            }

            .countdown-timer {
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .countdown-item {
                min-width: 60px;
                padding: 0.75rem;
            }

            .countdown-number {
                font-size: 1.5rem;
            }

            .filters-section {
                padding: 1.5rem;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Events Hero -->
    <section class="events-hero">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <h1 class="display-4 fw-bold mb-4">Nos Événements</h1>
                    <p class="fs-5 mb-0 opacity-90">
                        Participez à nos conférences, forums et ateliers pour façonner l'avenir du développement durable en Afrique
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Cards -->
    <section class="container">
        <div class="stats-cards">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-card-event">
                        <span class="stat-number-event">{{ count($events) }}</span>
                        <span class="stat-label-event">Événements</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-card-event">
                        <span class="stat-number-event">{{ collect($events)->sum('participants_expected') }}</span>
                        <span class="stat-label-event">Participants</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-card-event">
                        <span class="stat-number-event">{{ count($categories) }}</span>
                        <span class="stat-label-event">Catégories</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-card-event">
                        <span class="stat-number-event">8</span>
                        <span class="stat-label-event">Pays</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="section-padding">
        <div class="container">
            <!-- Next Event Banner -->
            @if(count($upcoming_events) > 0)
                @php $nextEvent = collect($upcoming_events)->first(); @endphp
                <div class="upcoming-banner" data-aos="fade-up">
                    <h3 class="mb-3">
                        <i class="fas fa-star me-2"></i>Prochain Événement
                    </h3>
                    <h4 class="fw-bold mb-2">{{ $nextEvent['title'] }}</h4>
                    <p class="mb-3 opacity-90">{{ $nextEvent['location'] }} • {{ \Carbon\Carbon::parse($nextEvent['date'])->format('d M Y') }}</p>

                    <div class="countdown-timer" id="countdown">
                        <div class="countdown-item">
                            <span class="countdown-number" id="days">00</span>
                            <span class="countdown-label">Jours</span>
                        </div>
                        <div class="countdown-item">
                            <span class="countdown-number" id="hours">00</span>
                            <span class="countdown-label">Heures</span>
                        </div>
                        <div class="countdown-item">
                            <span class="countdown-number" id="minutes">00</span>
                            <span class="countdown-label">Minutes</span>
                        </div>
                        <div class="countdown-item">
                            <span class="countdown-number" id="seconds">00</span>
                            <span class="countdown-label">Secondes</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('events.show', $nextEvent['slug']) }}" class="btn btn-light btn-lg px-4">
                            <i class="fas fa-calendar-plus me-2"></i>S'inscrire maintenant
                        </a>
                    </div>
                </div>
            @endif

            <!-- Filters -->
            <div class="filters-section" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-3 mb-3 mb-lg-0">
                        <h5 class="mb-0 text-primary-custom fw-bold">
                            <i class="fas fa-filter me-2"></i>Filtrer par :
                        </h5>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex flex-wrap justify-content-lg-end justify-content-center">
                            <button class="filter-btn-event active" data-filter="all">
                                Tous les événements
                            </button>
                            @foreach($categories as $category)
                                <button class="filter-btn-event" data-filter="{{ $category }}">
                                    {{ $category }}
                                </button>
                            @endforeach
                            <button class="filter-btn-event" data-filter="upcoming">
                                À venir
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Events Grid -->
            <div class="row g-4" id="eventsGrid">
                @foreach($events as $index => $event)
                    <div class="col-lg-6 col-xl-4 event-item" data-category="{{ $event['category'] }}" data-status="{{ $event['status'] }}" data-aos="fade-up" data-aos-delay="{{ ($index % 3 + 1) * 100 }}">
                        <div class="event-card">
                            <div class="event-status status-{{ $event['status'] }}">
                                {{ $event['status'] === 'upcoming' ? 'À venir' : 'Terminé' }}
                            </div>

                            <div class="event-header">
                                <div class="event-date-large">
                                    <span class="event-day">{{ \Carbon\Carbon::parse($event['date'])->format('d') }}</span>
                                    <span class="event-month">{{ \Carbon\Carbon::parse($event['date'])->format('M Y') }}</span>
                                </div>
                                <div class="event-time">
                                    <i class="fas fa-clock me-1"></i>{{ $event['time'] }}
                                </div>
                            </div>

                            <div class="event-body d-flex flex-column">
                                <div class="category-badge">{{ $event['category'] }}</div>

                                <h3 class="event-title">{{ $event['title'] }}</h3>
                                <p class="event-description">{{ $event['description'] }}</p>

                                <div class="event-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ $event['location'] }}</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-building"></i>
                                        <span>{{ $event['venue'] }}</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-users"></i>
                                        <span>{{ $event['participants_expected'] }} participants attendus</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-calendar-times"></i>
                                        <span>Inscription avant le {{ \Carbon\Carbon::parse($event['registration_deadline'])->format('d/m/Y') }}</span>
                                    </div>
                                </div>

                                <div class="event-organizers">
                                    @foreach($event['organizers'] as $organizer)
                                        <span class="organizer-badge">{{ $organizer }}</span>
                                    @endforeach
                                </div>

                                <div class="event-actions">
                                    <div class="price-tag {{ $event['price'] === 'Gratuit' ? 'price-free' : '' }}">
                                        {{ $event['price'] }}
                                    </div>
                                    <a href="{{ route('events.show', $event['slug']) }}" class="btn btn-outline-primary-custom btn-sm">
                                        Détails <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- No results -->
            <div id="noResults" class="text-center py-5 d-none">
                <i class="fas fa-calendar-times text-muted mb-3" style="font-size: 4rem;"></i>
                <h4 class="text-muted mb-3">Aucun événement trouvé</h4>
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
                    <h2 class="mb-4">Organisez un Événement avec Nous</h2>
                    <p class="fs-5 mb-5 opacity-90">
                        Vous souhaitez organiser un événement en partenariat avec GDD ? Contactez-nous pour discuter de votre projet.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg px-5 border-radius-pill">
                            <i class="fas fa-handshake me-2"></i>Partenariat Événement
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg px-5 border-radius-pill">
                            <i class="fas fa-calendar-plus me-2"></i>Proposer un Événement
                        </a>
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
            const filterButtons = document.querySelectorAll('.filter-btn-event');
            const eventItems = document.querySelectorAll('.event-item');
            const noResults = document.getElementById('noResults');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');

                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filter events
                    let visibleCount = 0;
                    eventItems.forEach(item => {
                        const category = item.getAttribute('data-category');
                        const status = item.getAttribute('data-status');

                        let show = false;
                        if (filter === 'all') {
                            show = true;
                        } else if (filter === 'upcoming') {
                            show = status === 'upcoming';
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

        // Countdown timer for next event
        @if(count($upcoming_events) > 0)
        const nextEventDate = new Date('{{ $nextEvent['date'] }}T{{ $nextEvent['time'] }}').getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = nextEventDate - now;

            if (distance > 0) {
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById('days').textContent = days.toString().padStart(2, '0');
                document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
            }
        }

        // Update countdown every second
        setInterval(updateCountdown, 1000);
        updateCountdown(); // Initial call
        @endif

        // Reset filters function
        function resetFilters() {
            const allButton = document.querySelector('.filter-btn-event[data-filter="all"]');
            if (allButton) {
                allButton.click();
            }
        }

        // Enhanced hover effects
        document.addEventListener('DOMContentLoaded', function() {
            const eventCards = document.querySelectorAll('.event-card');

            eventCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    const header = this.querySelector('.event-header');
                    header.style.transform = 'scale(1.02)';
                    header.style.transition = 'transform 0.3s ease';
                });

                card.addEventListener('mouseleave', function() {
                    const header = this.querySelector('.event-header');
                    header.style.transform = 'scale(1)';
                });
            });
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
    </style>
@endpush
