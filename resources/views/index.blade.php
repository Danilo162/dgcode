{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Accueil - GDD | Groupement pour le Développement Durable')
@section('description', 'GDD œuvre pour un développement durable en Afrique à travers des projets concrets, formations et partenariats stratégiques. Rejoignez notre mission pour un avenir meilleur.')

@push('styles')
    <style>
        .hero-overlay {
            background: linear-gradient(135deg, rgba(0, 158, 219, 0.9), rgba(79, 195, 247, 0.8));
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .hero-bg {
            background: url('/images/hero-bg.jpg') center/cover no-repeat;
            position: relative;
            min-height: 70vh;
        }

        .floating-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .impact-counter {
            font-size: 3.5rem;
            font-weight: 800;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
        }



        .project-featured {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            min-height: 300px;
        }

        .project-featured::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('/images/pattern.png') repeat;
            opacity: 0.1;
        }

        .event-date-badge {
            background: var(--gradient-primary);
            color: white;
            border-radius: 15px;
            padding: 1rem;
            text-align: center;
            min-width: 80px;
            box-shadow: var(--shadow-md);
        }

        .partner-logo-circle {
            width: 100px;
            height: 100px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
            margin: 0 auto 1rem;
            box-shadow: 0 15px 35px rgba(0, 158, 219, 0.3);
            transition: all 0.3s ease;
        }

        .partner-logo-circle:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 158, 219, 0.4);
        }

        .testimonial-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            position: relative;
            margin-top: 2rem;
            height: 100%;
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: -20px;
            left: 30px;
            font-size: 4rem;
            color: var(--primary-blue);
            font-weight: 700;
        }

        .cta-section {
            background: var(--gradient-primary);
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
        }

        .news-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .news-image {
            height: 200px;
            background: var(--gradient-secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .activity-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            border-left: 5px solid var(--primary-blue);
        }

        .activity-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            border-left-color: var(--secondary-green);
        }

        .activity-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient-primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-bg d-flex align-items-center">
        <div class="hero-overlay"></div>
        <div class="container position-relative">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-8 col-xl-7">
                    <div class="text-white" data-aos="fade-right">
                        <h1 class="display-3 fw-bold mb-4 text-shadow">
                            Ensemble pour un
                            <span class="text-gradient bg-white">Développement Durable</span>
                        </h1>
                        <p class="fs-5 mb-4 opacity-90">
                            GDD œuvre pour un avenir meilleur à travers des actions concrètes en faveur du développement durable en Afrique et dans le monde.
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="{{ route('qui-sommes-nous') }}" class="btn btn-light btn-lg border-radius-pill px-4">
                                <i class="fas fa-info-circle me-2"></i>Découvrir nos actions
                            </a>
                            <a href="{{ route('projets.index') }}" class="btn btn-outline-light btn-lg border-radius-pill px-4">
                                <i class="fas fa-project-diagram me-2"></i>Nos projets
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-5">
                    <div class="floating-card border-radius-custom p-4 text-white" data-aos="fade-left" data-aos-delay="200">
                        <h4 class="mb-3">Notre Mission</h4>
                        <p class="mb-4">Promouvoir le développement durable à travers des partenariats stratégiques et des actions concrètes.</p>
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="fw-bold fs-4">{{ $stats['projects'] }}+</div>
                                <small>Projets</small>
                            </div>
                            <div class="col-4">
                                <div class="fw-bold fs-4">{{ $stats['countries'] }}</div>
                                <small>Pays</small>
                            </div>
                            <div class="col-4">
                                <div class="fw-bold fs-4">1O</div>
                                <small>Partenaires</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="section-padding bg-light-custom">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 mb-5">
                    <h2 class="section-title" data-aos="fade-up">Notre Impact en Chiffres</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Des résultats concrets qui transforment les communautés
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="stat-card">
                        <div class="impact-counter" data-count="{{ $stats['projects'] }}">0</div>
                        <div class="stat-label">Projets Réalisés</div>
                        <i class="fas fa-project-diagram text-primary-custom fs-2 mt-3"></i>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="stat-card">
                        <div class="impact-counter" data-count="0">0</div>
                        <div class="stat-label">Bénéficiaires</div>
                        <i class="fas fa-users text-primary-custom fs-2 mt-3"></i>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="stat-card">
                        <div class="impact-counter" data-count="{{ $stats['countries'] }}">0</div>
                        <div class="stat-label">Pays d'Intervention</div>
                        <i class="fas fa-globe-africa text-primary-custom fs-2 mt-3"></i>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="stat-card">
                        <div class="impact-counter" data-count="2">0</div>
                        <div class="stat-label">Partenaires Stratégiques</div>
                        <i class="fas fa-handshake text-primary-custom fs-2 mt-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ODD Section -->
    <section class="section-padding">
        <div class="container">
            <section class="section-padding">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <h2 class="section-title">Les 17 Objectifs de Développement Durable</h2>
                        <p class="section-subtitle">
                            Notre engagement pour l'Agenda 2030 des Nations Unies
                        </p>
                    </div>
                </div>

                <div class="odd-slider-wrapper">
                    <div class="odd-slider-container" id="oddSlider">
                        <!-- ODD 1 -->
                        <div class="odd-card odd-1" data-odd="1">
                            <div class="odd-number">1</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-01.jpg" alt="ODD 1">
                                    <i class="fas fa-hand-holding-heart"></i> <!-- Sera masquée -->
                                </div>
                                <h5 class="odd-title">Pas de pauvreté</h5>
                                <p class="odd-description flex-grow-1">Éliminer la pauvreté sous toutes ses formes</p>
                            </div>
                        </div>

                        <!-- ODD 2 -->
                        <div class="odd-card odd-2" data-odd="2">
                            <div class="odd-number">2</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-02.jpg" alt="ODD 2" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Faim "Zéro"</h5>
                                <p class="odd-description flex-grow-1">Éliminer la faim et assurer la sécurité alimentaire</p>
                            </div>
                        </div>

                        <!-- ODD 3 -->
                        <div class="odd-card odd-3" data-odd="3">
                            <div class="odd-number">3</div>
                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-03.jpg" alt="ODD 3" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Bonne santé</h5>
                                <p class="odd-description flex-grow-1">Permettre à tous de vivre en bonne santé</p>
                            </div>
                        </div>

                        <!-- ODD 4 -->
                        <div class="odd-card odd-4" data-odd="4">
                            <div class="odd-number">4</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-04.jpg" alt="ODD 4" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Éducation de qualité</h5>
                                <p class="odd-description flex-grow-1">Assurer une éducation inclusive et équitable</p>
                            </div>
                        </div>

                        <!-- ODD 5 -->
                        <div class="odd-card odd-5" data-odd="5">
                            <div class="odd-number">5</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-05.jpg" alt="ODD 5" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Égalité des sexes</h5>
                                <p class="odd-description flex-grow-1">Parvenir à l'égalité des sexes</p>
                            </div>
                        </div>

                        <!-- ODD 6 -->
                        <div class="odd-card odd-6" data-odd="6">
                            <div class="odd-number">6</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-06.jpg" alt="ODD 6" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Eau propre</h5>
                                <p class="odd-description flex-grow-1">Garantir l'accès à l'eau salubre</p>
                            </div>
                        </div>

                        <!-- ODD 7 -->
                        <div class="odd-card odd-7" data-odd="7">
                            <div class="odd-number">7</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-07.jpg" alt="ODD 7" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Énergie propre</h5>
                                <p class="odd-description flex-grow-1">Garantir l'accès à une énergie durable</p>
                            </div>
                        </div>

                        <!-- ODD 8 -->
                        <div class="odd-card odd-8" data-odd="8">
                            <div class="odd-number">8</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-08.jpg" alt="ODD 8" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Travail décent</h5>
                                <p class="odd-description flex-grow-1">Promouvoir une croissance économique durable</p>
                            </div>
                        </div>

                        <!-- ODD 9 -->
                        <div class="odd-card odd-9" data-odd="9">
                            <div class="odd-number">9</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-09.jpg" alt="ODD 9" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Innovation</h5>
                                <p class="odd-description flex-grow-1">Bâtir une infrastructure résiliente</p>
                            </div>
                        </div>

                        <!-- ODD 10 -->
                        <div class="odd-card odd-10" data-odd="10">
                            <div class="odd-number">10</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-10.jpg" alt="ODD 10" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Inégalités réduites</h5>
                                <p class="odd-description flex-grow-1">Réduire les inégalités</p>
                            </div>
                        </div>

                        <!-- ODD 11 -->
                        <div class="odd-card odd-11" data-odd="11">
                            <div class="odd-number">11</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-11.jpg" alt="ODD 11" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Villes durables</h5>
                                <p class="odd-description flex-grow-1">Rendre les villes inclusives et durables</p>
                            </div>
                        </div>

                        <!-- ODD 12 -->
                        <div class="odd-card odd-12" data-odd="12">
                            <div class="odd-number">12</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-12.jpg" alt="ODD 12" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Consommation responsable</h5>
                                <p class="odd-description flex-grow-1">Modes de consommation durables</p>
                            </div>
                        </div>

                        <!-- ODD 13 -->
                        <div class="odd-card odd-13" data-odd="13">
                            <div class="odd-number">13</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-13.jpg" alt="ODD 13" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Lutte climatique</h5>
                                <p class="odd-description flex-grow-1">Lutter contre le changement climatique</p>
                            </div>
                        </div>

                        <!-- ODD 14 -->
                        <div class="odd-card odd-14" data-odd="14">
                            <div class="odd-number">14</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-14.jpg" alt="ODD 14" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Vie aquatique</h5>
                                <p class="odd-description flex-grow-1">Préserver les océans et les mers</p>
                            </div>
                        </div>

                        <!-- ODD 15 -->
                        <div class="odd-card odd-15" data-odd="15">
                            <div class="odd-number">15</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-15.jpg" alt="ODD 15" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Vie terrestre</h5>
                                <p class="odd-description flex-grow-1">Préserver les écosystèmes terrestres</p>
                            </div>
                        </div>

                        <!-- ODD 16 -->
                        <div class="odd-card odd-16" data-odd="16">
                            <div class="odd-number">16</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-16.jpg" alt="ODD 16" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Paix et justice</h5>
                                <p class="odd-description flex-grow-1">Promouvoir des sociétés pacifiques</p>
                            </div>
                        </div>

                        <!-- ODD 17 -->
                        <div class="odd-card odd-17" data-odd="17">
                            <div class="odd-number">17</div>

                            <div class="card-body d-flex flex-column">
                                <div class="odd-icon">
                                    <img src="https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-17.jpg" alt="ODD 17" class="odd-logo">
                                </div>
                                <h5 class="odd-title">Partenariats</h5>
                                <p class="odd-description flex-grow-1">Renforcer les partenariats mondiaux</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slider-controls">
                    <button class="slider-btn" id="prevBtn">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <div class="slider-indicators" id="indicators"></div>

                    <button class="slider-btn" id="nextBtn">
                        <i class="fas fa-chevron-right"></i>
                    </button>

                    <button class="auto-play-toggle active" id="autoPlayToggle">
                        <i class="fas fa-pause me-2"></i>Auto
                    </button>
                </div>

                <div class="progress-bar">
                    <div class="progress-fill" id="progressFill"></div>
                </div>

                <div class="text-center mt-5">
                    <a href="https://sdgs.un.org/goals" target="_blank" class="btn btn-outline-primary btn-lg border-radius-pill">
                        <i class="fas fa-external-link-alt me-2"></i>En savoir plus sur les ODD
                    </a>
                </div>
            </section>
        </div>
    </section>

    <!-- Featured Projects Section -->
    <section class="section-padding bg-light-custom">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title" data-aos="fade-up">Nos Projets Phares</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Des initiatives qui transforment les communautés africaines
                    </p>
                </div>
            </div>

            <div class="row g-4">
                @foreach($featured_projects as $index => $project)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 150 }}">
                        <div class="card-custom h-100">
                            <div class="card-header text-center">
                                <div class="card-icon">
                                    <i class="{{ $project['icon'] }}"></i>
                                </div>
                                <h4 class="text-white mb-0">{{ $project['title'] }}</h4>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <p class="flex-grow-1">{{ $project['description'] }}</p>
                                <div class="mt-auto">
                                    <div class="badge badge-primary-custom mb-3">
                                        {{ $project['period'] }} | {{ $project['funding'] }}
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt me-1"></i>Afrique de l'Ouest
                                        </small>
                                        <a href="{{ route('projets.index') }}" class="btn btn-sm btn-outline-primary-custom">
                                            Détails <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ route('projets.index') }}" class="btn btn-primary-custom btn-lg">
                    <i class="fas fa-project-diagram me-2"></i>Voir tous nos projets
                </a>
            </div>
        </div>
    </section>

    <!-- Activities Section -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title" data-aos="fade-up">Nos Activités</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Des actions permanentes pour un impact durable
                    </p>
                </div>
            </div>

            <div class="row g-4">
                @php
                    $activities = [
                        ['icon' => 'fas fa-hands-helping', 'title' => 'Assistance Humanitaire', 'desc' => 'Distribution de vivres et matériel médical dans les zones sinistrées', 'metric' => '5000 familles aidées/an'],
                        ['icon' => 'fas fa-tree', 'title' => 'Reboisement', 'desc' => 'Plantation d\'arbres et sensibilisation environnementale', 'metric' => '50,000 arbres plantés en 2024'],
                        ['icon' => 'fas fa-stethoscope', 'title' => 'Santé Communautaire', 'desc' => 'Campagnes de vaccination et consultations gratuites', 'metric' => '15 centres de santé soutenus'],
                        ['icon' => 'fas fa-book-open', 'title' => 'Alphabétisation', 'desc' => 'Cours d\'alphabétisation pour adultes en zones rurales', 'metric' => '800 adultes formés en 2024'],
                    ];
                @endphp

                @foreach($activities as $index => $activity)
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 150 }}">
                        <div class="activity-card">
                            <div class="activity-icon">
                                <i class="{{ $activity['icon'] }}"></i>
                            </div>
                            <h5 class="text-primary-custom fw-bold mb-3">{{ $activity['title'] }}</h5>
                            <p class="text-muted mb-3">{{ $activity['desc'] }}</p>
                            <div class="badge badge-success-custom">{{ $activity['metric'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ route('activites.index') }}" class="btn btn-outline-primary-custom">
                    <i class="fas fa-tasks me-2"></i>Voir toutes nos activités
                </a>
            </div>
        </div>
    </section>

    <!-- Upcoming Events Section -->
    <section class="section-padding bg-light-custom">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title" data-aos="fade-up">Événements à Venir</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Rejoignez-nous lors de nos prochaines rencontres
                    </p>
                </div>
            </div>

            <div class="row g-4">
                @foreach($upcoming_events as $index => $event)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 200 }}">
                        <div class="card-custom h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="event-date-badge me-4 flex-shrink-0">
                                        <div class="fs-3 fw-bold">{{ \Carbon\Carbon::parse($event['date'])->format('d') }}</div>
                                        <div class="small">{{ \Carbon\Carbon::parse($event['date'])->format('M') }}</div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h4 class="text-primary-custom mb-3">{{ $event['title'] }}</h4>
                                        <div class="mb-2">
                                            <i class="fas fa-map-marker-alt text-primary-custom me-2"></i>
                                            <span class="text-muted">{{ $event['location'] }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <i class="fas fa-users text-primary-custom me-2"></i>
                                            <span class="text-muted">{{ $event['participants'] }} participants attendus</span>
                                        </div>
                                        <a href="{{ route('evenements.index') }}" class="btn btn-outline-primary-custom btn-sm">
                                            <i class="fas fa-calendar-plus me-2"></i>S'inscrire
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ route('evenements.index') }}" class="btn btn-outline-primary-custom">
                    <i class="fas fa-calendar-alt me-2"></i>Voir tous les événements
                </a>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title" data-aos="fade-up">Nos Partenaires Stratégiques</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Unis pour maximiser notre impact en Afrique
                    </p>
                </div>
            </div>

            <div class="row g-4">
                @foreach($partners->take(6) as $index => $partner)
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="card-custom h-100 text-center">
                            <div class="card-body">
                                <div class="partner-logo-circle">
                                    {{ $partner['abbreviation'] }}
                                </div>
                                <h5 class="text-primary-custom fw-bold mb-3">{{ $partner['name'] }}</h5>
                                <p class="text-muted">{{ $partner['description'] }}</p>
                                <div class="badge badge-secondary-custom mt-3">
                                    Partenaire depuis {{ $partner['since'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="section-padding bg-light-custom">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title" data-aos="fade-up">Actualités</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Suivez nos dernières réalisations et actualités
                    </p>
                </div>
            </div>

            <div class="row g-4">
                @php
                    $news = [
                        ['title' => 'Lancement du projet Eau Potable au Burkina Faso', 'date' => '15 juin 2025', 'category' => 'Projets', 'excerpt' => 'Début des travaux de construction de 30 forages dans les zones rurales.'],
                        ['title' => 'Formation de 200 jeunes entrepreneurs au Sénégal', 'date' => '10 juin 2025', 'category' => 'Formation', 'excerpt' => 'Programme intensif d\'entrepreneuriat social pour les jeunes de 18-35 ans.'],
                        ['title' => 'Partenariat avec l\'Union Africaine', 'date' => '5 juin 2025', 'category' => 'Partenariats', 'excerpt' => 'Signature d\'un accord de coopération pour l\'Agenda 2063.'],
                    ];
                @endphp

                @foreach($news as $index => $article)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 150 }}">
                        <div class="news-card">
                            <div class="news-image">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge badge-primary-custom">{{ $article['category'] }}</span>
                                    <small class="text-muted">{{ $article['date'] }}</small>
                                </div>
                                <h5 class="text-primary-custom fw-bold mb-3">{{ $article['title'] }}</h5>
                                <p class="text-muted">{{ $article['excerpt'] }}</p>
                                <a href="#" class="btn btn-sm btn-outline-primary-custom">
                                    Lire la suite <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title" data-aos="fade-up">Témoignages</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Ce que disent nos bénéficiaires et partenaires
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card">
                        <p class="mb-4 fst-italic">
                            "Grâce au projet d'agriculture durable de GDD, nous avons augmenté nos rendements de 40% tout en préservant notre environnement."
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary-gradient rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-primary-custom">Kouame Adjoua</h6>
                                <small class="text-muted">Agricultrice, Côte d'Ivoire</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card">
                        <p class="mb-4 fst-italic">
                            "L'accès à l'énergie solaire a transformé notre village. Les enfants peuvent maintenant étudier le soir."
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="bg-secondary-gradient rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-primary-custom">Mamadou Diarra</h6>
                                <small class="text-muted">Chef de village, Mali</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card">
                        <p class="mb-4 fst-italic">
                            "La formation en entrepreneuriat m'a permis de créer mon entreprise et d'employer 5 autres femmes."
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary-gradient rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-primary-custom">Akosua Mensah</h6>
                                <small class="text-muted">Entrepreneure, Ghana</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="section-padding bg-primary-gradient">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <h3 class="text-white fw-bold mb-3">
                        <i class="fas fa-envelope me-3"></i>Restez Informé
                    </h3>
                    <p class="text-white opacity-90 mb-0">
                        Recevez nos dernières actualités, rapports d'impact et opportunités de participation directement dans votre boîte mail.
                    </p>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <form class="row g-3" id="newsletterForm">
                        <div class="col-md-8">
                            <input type="email" class="form-control form-control-lg border-0" placeholder="Votre adresse email" required>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-light btn-lg w-100 fw-bold">
                                S'abonner
                            </button>
                        </div>
                    </form>
                    <p class="text-white-50 small mt-2 mb-0">
                        <i class="fas fa-lock me-1"></i>Vos données sont protégées et ne seront jamais partagées.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section section-padding text-white text-center">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="zoom-in">
                    <h2 class="display-5 fw-bold mb-4">Rejoignez Notre Mission</h2>
                    <p class="fs-5 mb-5 opacity-90">
                        Ensemble, nous pouvons créer un impact durable et transformer les communautés à travers l'Afrique.
                        Votre engagement peut faire la différence.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-5 border-radius-pill">
                            <i class="fas fa-handshake me-2"></i>Devenir Partenaire
                        </a>
                        <a href="{{ route('formations.index') }}" class="btn btn-outline-light btn-lg px-5 border-radius-pill">
                            <i class="fas fa-graduation-cap me-2"></i>Nos Formations
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg px-5 border-radius-pill" data-bs-toggle="modal" data-bs-target="#donationModal">
                            <i class="fas fa-heart me-2"></i>Faire un Don
                        </a>
                    </div>
                </div>
            </div>

            <!-- Floating elements for visual appeal -->
            <div class="position-absolute top-0 start-0 opacity-25 d-none d-lg-block" style="transform: translate(-50%, -50%);">
                <i class="fas fa-globe-africa" style="font-size: 8rem;"></i>
            </div>
            <div class="position-absolute bottom-0 end-0 opacity-25 d-none d-lg-block" style="transform: translate(50%, 50%);">
                <i class="fas fa-seedling" style="font-size: 6rem;"></i>
            </div>
        </div>
    </section>

    <!-- Donation Modal -->
    <div class="modal fade" id="donationModal" tabindex="-1" aria-labelledby="donationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 border-radius-custom">
                <div class="modal-header bg-primary-gradient text-white border-0">
                    <h5 class="modal-title fw-bold" id="donationModalLabel">
                        <i class="fas fa-heart me-2"></i>Soutenez Notre Mission
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="text-center mb-4">
                        <h4 class="text-primary-custom mb-3">Chaque don compte</h4>
                        <p class="text-muted">Votre contribution nous aide à développer nos projets et à toucher plus de bénéficiaires.</p>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-6 col-md-3">
                            <button class="btn btn-outline-primary-custom w-100 donation-amount" data-amount="25">25€</button>
                        </div>
                        <div class="col-6 col-md-3">
                            <button class="btn btn-outline-primary-custom w-100 donation-amount" data-amount="50">50€</button>
                        </div>
                        <div class="col-6 col-md-3">
                            <button class="btn btn-outline-primary-custom w-100 donation-amount" data-amount="100">100€</button>
                        </div>
                        <div class="col-6 col-md-3">
                            <button class="btn btn-outline-primary-custom w-100 donation-amount" data-amount="custom">Autre</button>
                        </div>
                    </div>

                    <form id="donationForm">
                        <div class="mb-3">
                            <label for="donationAmountInput" class="form-label">Montant (€)</label>
                            <input type="number" class="form-control" id="donationAmountInput" min="1" placeholder="Entrez le montant">
                        </div>
                        <div class="mb-3">
                            <label for="donorName" class="form-label">Nom complet</label>
                            <input type="text" class="form-control" id="donorName" required>
                        </div>
                        <div class="mb-3">
                            <label for="donorEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="donorEmail" required>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="donationRecurring">
                            <label class="form-check-label" for="donationRecurring">
                                Don mensuel récurrent
                            </label>
                        </div>
                    </form>

                    <div class="text-center">
                        <button type="submit" form="donationForm" class="btn btn-primary-custom btn-lg px-5">
                            <i class="fas fa-credit-card me-2"></i>Procéder au paiement
                        </button>
                    </div>

                    <div class="mt-4 p-3 bg-light-custom border-radius-custom">
                        <h6 class="text-primary-custom mb-2">
                            <i class="fas fa-shield-alt me-2"></i>Paiement sécurisé
                        </h6>
                        <small class="text-muted">
                            Vos informations sont protégées par un cryptage SSL. Nous acceptons les cartes de crédit et PayPal.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Counter Animation
        function animateCounters() {
            const counters = document.querySelectorAll('.impact-counter');

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                const duration = 2000; // 2 seconds
                const step = target / (duration / 16); // 60fps
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        counter.textContent = target.toLocaleString() + '+';
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current).toLocaleString();
                    }
                }, 16);
            });
        }

        // Trigger counter animation when section comes into view
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        document.addEventListener('DOMContentLoaded', function() {
            const statsSection = document.querySelector('.section-padding.bg-light-custom');
            if (statsSection) {
                statsObserver.observe(statsSection);
            }
        });

        // Newsletter form submission
        document.getElementById('newsletterForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;

            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Inscription...';
            button.disabled = true;

            // Simulate API call
            setTimeout(() => {
                // Success message
                button.innerHTML = '<i class="fas fa-check me-2"></i>Inscrit !';
                button.classList.remove('btn-light');
                button.classList.add('btn-success');

                // Reset form
                this.reset();

                // Reset button after delay
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.disabled = false;
                    button.classList.remove('btn-success');
                    button.classList.add('btn-light');
                }, 2000);
            }, 1500);
        });

        // Donation modal functionality
        document.addEventListener('DOMContentLoaded', function() {
            const donationButtons = document.querySelectorAll('.donation-amount');
            const donationInput = document.getElementById('donationAmountInput');

            donationButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    donationButtons.forEach(btn => {
                        btn.classList.remove('btn-primary-custom');
                        btn.classList.add('btn-outline-primary-custom');
                    });

                    // Add active class to clicked button
                    this.classList.remove('btn-outline-primary-custom');
                    this.classList.add('btn-primary-custom');

                    // Set amount
                    const amount = this.getAttribute('data-amount');
                    if (amount !== 'custom') {
                        donationInput.value = amount;
                    } else {
                        donationInput.focus();
                    }
                });
            });

            // Donation form submission
            document.getElementById('donationForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const amount = donationInput.value;
                const name = document.getElementById('donorName').value;
                const email = document.getElementById('donorEmail').value;

                if (!amount || amount < 1) {
                    alert('Veuillez entrer un montant valide.');
                    return;
                }

                // Here you would integrate with a payment processor like Stripe
                alert(`Merci ${name} ! Redirection vers le paiement de ${amount}€...`);

                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('donationModal'));
                modal.hide();
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add some interactive hover effects
    /*    document.addEventListener('DOMContentLoaded', function() {
            // ODD cards hover effect
            const oddCards = document.querySelectorAll('.odd-card');
            oddCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.background = 'linear-gradient(135deg, #f8f9fa, #e9ecef)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.background = 'white';
                });
            });

            // Partner cards click effect
            const partnerCards = document.querySelectorAll('.partner-logo-circle');
            partnerCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Add a pulse animation
                    this.style.animation = 'pulse 0.5s ease-in-out';
                    setTimeout(() => {
                        this.style.animation = '';
                    }, 500);
                });
            });

            // Loading states for project/activity buttons
            document.querySelectorAll('.btn[href*="route"]').forEach(btn => {
                btn.addEventListener('click', function() {
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Chargement...';
                    this.disabled = true;

                    // This would normally be removed when the page loads
                    // For demo purposes, we'll reset it after a short delay
                    setTimeout(() => {
                        this.innerHTML = originalText;
                        this.disabled = false;
                    }, 1000);
                });
            });
        });
*/
        // Parallax effect for hero section
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero-bg');
            if (hero && scrolled < window.innerHeight) {
                hero.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });

        // Dynamic greeting based on time
        document.addEventListener('DOMContentLoaded', function() {
            const hour = new Date().getHours();
            let greeting = 'Bienvenue';

            if (hour < 12) {
                greeting = 'Bonjour';
            } else if (hour < 18) {
                greeting = 'Bon après-midi';
            } else {
                greeting = 'Bonsoir';
            }

            // You could use this greeting in a welcome message
            console.log(`${greeting} ! Bienvenue sur le site de GDD.`);
        });

        // Lazy loading for images (when real images are added)
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }


        class ODDSlider {
            constructor() {
                this.slider = document.getElementById('oddSlider');
                this.cards = this.slider.querySelectorAll('.odd-card');
                this.prevBtn = document.getElementById('prevBtn');
                this.nextBtn = document.getElementById('nextBtn');
                this.autoPlayToggle = document.getElementById('autoPlayToggle');
                this.progressFill = document.getElementById('progressFill');
                this.indicatorsContainer = document.getElementById('indicators');

                this.currentIndex = 0;
                this.cardsPerView = this.getCardsPerView();
                this.maxIndex = Math.max(0, this.cards.length - this.cardsPerView);
                this.isAutoPlay = true;
                this.autoPlayInterval = null;
                this.autoPlayDuration = 4000;
                this.progressInterval = null;

                this.init();
            }

            init() {
                this.createIndicators();
                this.updateSlider();
                this.startAutoPlay();
                this.attachEventListeners();
                this.updateControls();

                window.addEventListener('resize', () => {
                    this.cardsPerView = this.getCardsPerView();
                    this.maxIndex = Math.max(0, this.cards.length - this.cardsPerView);
                    this.currentIndex = Math.min(this.currentIndex, this.maxIndex);
                    this.updateSlider();
                    this.updateIndicators();
                });
            }

            getCardsPerView() {
                const containerWidth = this.slider.parentElement.clientWidth;
                if (containerWidth < 768) return 1;
                if (containerWidth < 992) return 2;
                if (containerWidth < 1200) return 3;
                return 4;
            }

            createIndicators() {
                this.indicatorsContainer.innerHTML = '';
                const totalPages = this.maxIndex + 1;

                for (let i = 0; i < totalPages; i++) {
                    const indicator = document.createElement('div');
                    indicator.className = `indicator ${i === 0 ? 'active' : ''}`;
                    indicator.addEventListener('click', () => this.goToSlide(i));
                    this.indicatorsContainer.appendChild(indicator);
                }
            }

            updateIndicators() {
                const indicators = this.indicatorsContainer.querySelectorAll('.indicator');
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === this.currentIndex);
                });
            }

            attachEventListeners() {
                this.prevBtn.addEventListener('click', () => this.previousSlide());
                this.nextBtn.addEventListener('click', () => this.nextSlide());
                this.autoPlayToggle.addEventListener('click', () => this.toggleAutoPlay());

                // Touch support
                let startX = 0;
                let isDragging = false;

                this.slider.addEventListener('touchstart', (e) => {
                    startX = e.touches[0].clientX;
                    isDragging = true;
                    this.pauseAutoPlay();
                });

                this.slider.addEventListener('touchend', (e) => {
                    if (!isDragging) return;

                    const endX = e.changedTouches[0].clientX;
                    const deltaX = startX - endX;

                    if (Math.abs(deltaX) > 50) {
                        if (deltaX > 0) {
                            this.nextSlide();
                        } else {
                            this.previousSlide();
                        }
                    }

                    isDragging = false;
                    if (this.isAutoPlay) {
                        this.startAutoPlay();
                    }
                });

                // Keyboard navigation
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowLeft') {
                        this.previousSlide();
                    } else if (e.key === 'ArrowRight') {
                        this.nextSlide();
                    } else if (e.key === ' ') {
                        e.preventDefault();
                        this.toggleAutoPlay();
                    }
                });

                // Pause on hover
                this.slider.addEventListener('mouseenter', () => this.pauseAutoPlay());
                this.slider.addEventListener('mouseleave', () => {
                    if (this.isAutoPlay) this.startAutoPlay();
                });
            }

            updateSlider() {
                const cardWidth = this.cards[0].offsetWidth;
                const gap = 32; // 2rem gap
                const translateX = -(this.currentIndex * (cardWidth + gap));

                this.slider.style.transform = `translateX(${translateX}px)`;
                this.updateIndicators();
            }

            nextSlide() {
                if (this.currentIndex < this.maxIndex) {
                    this.currentIndex++;
                } else {
                    this.currentIndex = 0;
                }
                this.updateSlider();
                this.updateControls();
            }

            previousSlide() {
                if (this.currentIndex > 0) {
                    this.currentIndex--;
                } else {
                    this.currentIndex = this.maxIndex;
                }
                this.updateSlider();
                this.updateControls();
            }

            goToSlide(index) {
                this.currentIndex = Math.max(0, Math.min(index, this.maxIndex));
                this.updateSlider();
                this.updateControls();
            }

            updateControls() {
                this.prevBtn.disabled = false;
                this.nextBtn.disabled = false;
            }

            startAutoPlay() {
                if (!this.isAutoPlay) return;

                this.pauseAutoPlay();
                this.startProgress();

                this.autoPlayInterval = setInterval(() => {
                    this.nextSlide();
                }, this.autoPlayDuration);
            }

            pauseAutoPlay() {
                if (this.autoPlayInterval) {
                    clearInterval(this.autoPlayInterval);
                    this.autoPlayInterval = null;
                }
                this.stopProgress();
            }

            startProgress() {
                this.stopProgress();
                let progress = 0;
                const increment = 100 / (this.autoPlayDuration / 50);

                this.progressInterval = setInterval(() => {
                    progress += increment;
                    if (progress >= 100) {
                        progress = 100;
                        this.stopProgress();
                    }
                    this.progressFill.style.width = `${progress}%`;
                }, 50);
            }

            stopProgress() {
                if (this.progressInterval) {
                    clearInterval(this.progressInterval);
                    this.progressInterval = null;
                }
                this.progressFill.style.width = '0%';
            }

            toggleAutoPlay() {
                this.isAutoPlay = !this.isAutoPlay;

                if (this.isAutoPlay) {
                    this.autoPlayToggle.classList.add('active');
                    this.autoPlayToggle.innerHTML = '<i class="fas fa-pause me-2"></i>Auto';
                    this.startAutoPlay();
                } else {
                    this.autoPlayToggle.classList.remove('active');
                    this.autoPlayToggle.innerHTML = '<i class="fas fa-play me-2"></i>Auto';
                    this.pauseAutoPlay();
                }
            }
        }

        // Initialize slider
        document.addEventListener('DOMContentLoaded', () => {
            new ODDSlider();
        });

        // Enhanced card interactions
        document.addEventListener('DOMContentLoaded', () => {
            const oddCards = document.querySelectorAll('.odd-card');

            oddCards.forEach(card => {
                // Click effect
                card.addEventListener('click', () => {
                    const oddNumber = card.dataset.odd;

                    // Scale animation
                    card.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        card.style.transform = '';
                    }, 150);

                    // Optional: Open ODD page
                    // window.open(`https://sdgs.un.org/goals/goal${oddNumber}`, '_blank');
                });

                // Enhanced hover effects for icon
        /*        card.addEventListener('mouseenter', () => {
                    const icon = card.querySelector('.odd-icon');
                    const logo = card.querySelector('.odd-logo');

                    if (icon) {
                        icon.style.transform = 'scale(1.1) rotate(5deg)';
                        icon.style.boxShadow = '0 15px 35px rgba(255, 255, 255, 0.4)';
                    }

                    if (logo) {
                        logo.style.opacity = '0.25';
                        logo.style.transform = 'rotate(5deg) scale(1.1)';
                    }
                });*/

              /*  card.addEventListener('mouseleave', () => {
                    const icon = card.querySelector('.odd-icon');
                    const logo = card.querySelector('.odd-logo');

                    if (icon) {
                        icon.style.transform = '';
                        icon.style.boxShadow = '';
                    }

                    if (logo) {
                        logo.style.opacity = '';
                        logo.style.transform = '';
                    }
                });*/
            });
        });

        // Accessibility improvements
        document.addEventListener('DOMContentLoaded', () => {
            const slider = document.getElementById('oddSlider');
            const cards = slider.querySelectorAll('.odd-card');

            slider.setAttribute('role', 'region');
            slider.setAttribute('aria-label', 'Slider des Objectifs de Développement Durable');

            cards.forEach((card, index) => {
                card.setAttribute('role', 'button');
                card.setAttribute('tabindex', '0');
                card.setAttribute('aria-label', `ODD ${index + 1}: ${card.querySelector('.odd-title').textContent}`);

                card.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        card.click();
                    }
                });
            });
        });

        // Performance optimization
        if ('IntersectionObserver' in window) {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '50px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationDelay = '0s';
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            }, observerOptions);

            document.addEventListener('DOMContentLoaded', () => {
                const cards = document.querySelectorAll('.odd-card');
                cards.forEach((card, index) => {
                    card.style.animationDelay = `${index * 0.1}s`;
                    card.style.animationPlayState = 'paused';
                    observer.observe(card);
                });
            });
        }

        // Error handling for images
        document.addEventListener('DOMContentLoaded', () => {
            const logos = document.querySelectorAll('.odd-logo');
            logos.forEach(logo => {
                logo.addEventListener('error', function() {
                    // Fallback if official UN logos fail to load
                    this.style.display = 'none';
                });
            });
        });

    </script>

    <!-- Add CSS for pulse animation -->
    <style>
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .lazy {
            opacity: 0.6;
            transition: opacity 0.3s;
        }

        .btn:disabled {
            opacity: 0.7;
        }

        /* Enhanced hover effects */
        .activity-card:hover .activity-icon {
            transform: scale(1.1);
            transition: transform 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .news-card:hover .news-image {
            background: var(--gradient-primary);
            transition: background 0.3s ease;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-blue);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }
    </style>
@endpush
