{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('title', 'À Propos - GDD | Notre Mission et Vision')
@section('description', 'Découvrez l\'histoire, la mission et l\'équipe du Groupement pour le Développement Durable (GDD) en Afrique.')

@push('styles')
    <style>
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .timeline::before {
            content: '';
            position: absolute;
            width: 4px;
            background: var(--un-blue);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -2px;
        }

        .timeline-item {
            padding: 10px 40px;
            position: relative;
            background: inherit;
            width: 50%;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            right: -10px;
            background: var(--un-blue);
            border-radius: 50%;
            top: 15px;
        }

        .timeline-item:nth-child(even) {
            left: 50%;
        }

        .timeline-item:nth-child(even)::after {
            left: -10px;
        }

        .timeline-content {
            padding: 20px 30px;
            background: white;
            position: relative;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .timeline-year {
            font-size: 24px;
            font-weight: bold;
            color: var(--un-blue);
            margin-bottom: 10px;
        }

        .timeline-title {
            font-size: 18px;
            color: var(--un-dark-blue);
            margin-bottom: 10px;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .team-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s;
            text-align: center;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .team-photo {
            height: 200px;
            background: linear-gradient(135deg, var(--un-blue), var(--un-light-blue));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
        }

        .team-info {
            padding: 30px 20px;
        }

        .team-name {
            font-size: 20px;
            color: var(--un-dark-blue);
            margin-bottom: 5px;
        }

        .team-position {
            color: var(--un-blue);
            font-weight: bold;
            margin-bottom: 15px;
        }

        .team-bio {
            color: var(--dark-gray);
            font-size: 14px;
            line-height: 1.6;
        }

        .impact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .impact-card {
            background: white;
            padding: 40px 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s;
            border-top: 5px solid var(--un-blue);
        }

        .impact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .impact-icon {
            font-size: 48px;
            color: var(--un-blue);
            margin-bottom: 20px;
        }

        .impact-title {
            font-size: 20px;
            color: var(--un-dark-blue);
            margin-bottom: 15px;
        }

        .impact-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .impact-stat {
            text-align: center;
        }

        .impact-stat-number {
            font-size: 24px;
            font-weight: bold;
            color: var(--un-blue);
        }

        .impact-stat-label {
            font-size: 12px;
            color: var(--dark-gray);
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .value-item {
            background: var(--un-blue);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-weight: bold;
            transition: all 0.3s;
        }

        .value-item:hover {
            background: var(--un-dark-blue);
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .timeline::before {
                left: 31px;
            }

            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            .timeline-item::after {
                left: 21px;
            }

            .timeline-item:nth-child(even) {
                left: 0;
            }

            .team-grid {
                grid-template-columns: 1fr;
            }

            .impact-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
@endpush

@section('content')
    <!-- En-tête de page -->
    <section class="page-header">
        <div class="container">
            <h1>À Propos de GDD</h1>
            <p>Découvrez notre histoire, notre mission et notre engagement pour le développement durable en Afrique</p>
        </div>
    </section>

    <!-- Section mission et vision -->
    <section class="section">
        <div class="container">
            <div class="grid grid-2">
                <div class="fade-in">
                    <h2 style="color: var(--un-blue); margin-bottom: 20px;">Notre Mission</h2>
                    <p style="font-size: 18px; line-height: 1.8; margin-bottom: 30px;">{{ $organization['mission'] }}</p>

                    <h3 style="color: var(--un-dark-blue); margin-bottom: 15px;">Informations Générales</h3>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 10px;"><strong>Fondé en :</strong> {{ $organization['founded'] }}</li>
                        <li style="margin-bottom: 10px;"><strong>Siège social :</strong> {{ $organization['headquarters'] }}</li>
                        <li style="margin-bottom: 10px;"><strong>Acronyme :</strong> {{ $organization['abbreviation'] }}</li>
                    </ul>
                </div>

                <div class="fade-in">
                    <h2 style="color: var(--un-blue); margin-bottom: 20px;">Notre Vision</h2>
                    <p style="font-size: 18px; line-height: 1.8; margin-bottom: 30px;">{{ $organization['vision'] }}</p>

                    <h3 style="color: var(--un-dark-blue); margin-bottom: 15px;">Nos Valeurs</h3>
                    <div class="values-grid">
                        @foreach($organization['values'] as $value)
                            <div class="value-item">{{ $value }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section chronologie -->
    <section class="section" style="background: var(--light-gray);">
        <div class="container">
            <h2 class="section-title">Notre Histoire</h2>
            <div class="timeline">
                @foreach($milestones as $index => $milestone)
                    <div class="timeline-item fade-in">
                        <div class="timeline-content">
                            <div class="timeline-year">{{ $milestone['year'] }}</div>
                            <div class="timeline-title">{{ $milestone['title'] }}</div>
                            <p>{{ $milestone['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section domaines d'impact -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Nos Domaines d'Impact</h2>
            <div class="impact-grid">
                @foreach($impact_areas as $area)
                    <div class="impact-card fade-in">
                        <div class="impact-icon">
                            <i class="{{ $area['icon'] }}"></i>
                        </div>
                        <div class="impact-title">{{ $area['title'] }}</div>
                        <p>{{ $area['description'] }}</p>
                        <div class="impact-stats">
                            <div class="impact-stat">
                                <div class="impact-stat-number">{{ $area['projects'] }}</div>
                                <div class="impact-stat-label">Projets</div>
                            </div>
                            <div class="impact-stat">
                                <div class="impact-stat-number">{{ number_format($area['beneficiaries']) }}</div>
                                <div class="impact-stat-label">Bénéficiaires</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section équipe -->
    <section class="section" style="background: var(--light-gray);">
        <div class="container">
            <h2 class="section-title">Notre Équipe</h2>
            <p style="text-align: center; max-width: 600px; margin: 0 auto 50px; color: var(--dark-gray);">
                Une équipe d'experts passionnés et dévoués au service du développement durable en Afrique.
            </p>
            <div class="team-grid">
                @foreach($team as $member)
                    <div class="team-card fade-in">
                        <div class="team-photo">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="team-info">
                            <div class="team-name">{{ $member['name'] }}</div>
                            <div class="team-position">{{ $member['position'] }}</div>
                            <div class="team-bio">{{ $member['bio'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section engagement -->
    <section class="section" style="background: linear-gradient(135deg, var(--un-blue), var(--un-light-blue)); color: white; text-align: center;">
        <div class="container">
            <h2 style="color: white; margin-bottom: 20px;">Notre Engagement</h2>
            <p style="font-size: 20px; margin-bottom: 40px; max-width: 800px; margin-left: auto; margin-right: auto;">
                Nous nous engageons à promouvoir un développement durable, inclusif et équitable qui respecte l'environnement
                et améliore les conditions de vie des populations africaines.
            </p>

            <div class="grid grid-3" style="margin-top: 50px;">
                <div style="background: rgba(255,255,255,0.1); padding: 30px; border-radius: 15px;">
                    <i class="fas fa-heart" style="font-size: 48px; margin-bottom: 20px;"></i>
                    <h3 style="margin-bottom: 15px;">Transparence</h3>
                    <p>Nous opérons avec une transparence totale dans tous nos projets et activités.</p>
                </div>
                <div style="background: rgba(255,255,255,0.1); padding: 30px; border-radius: 15px;">
                    <i class="fas fa-lightbulb" style="font-size: 48px; margin-bottom: 20px;"></i>
                    <h3 style="margin-bottom: 15px;">Innovation</h3>
                    <p>Nous développons des solutions innovantes adaptées aux défis locaux.</p>
                </div>
                <div style="background: rgba(255,255,255,0.1); padding: 30px; border-radius: 15px;">
                    <i class="fas fa-hands-helping" style="font-size: 48px; margin-bottom: 20px;"></i>
                    <h3 style="margin-bottom: 15px;">Collaboration</h3>
                    <p>Nous croyons en la force des partenariats pour maximiser notre impact.</p>
                </div>
            </div>

            <div style="margin-top: 50px;">
                <a href="{{ route('contact.index') }}" class="btn" style="background: white; color: var(--un-blue); margin-right: 20px;">Nous rejoindre</a>
                <a href="{{ route('projects.index') }}" class="btn" style="background: transparent; color: white; border: 2px solid white;">Voir nos projets</a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Animation spéciale pour la timeline
        const timelineObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateX(0)';
                }
            });
        }, { threshold: 0.3 });

        document.addEventListener('DOMContentLoaded', function() {
            const timelineItems = document.querySelectorAll('.timeline-item');
            timelineItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transition = 'all 0.6s ease';

                if (index % 2 === 0) {
                    item.style.transform = 'translateX(-50px)';
                } else {
                    item.style.transform = 'translateX(50px)';
                }

                timelineObserver.observe(item);
            });
        });
    </script>
@endpush
