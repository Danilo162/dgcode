
@extends('layouts.app')

@section('title', 'Actualités - GDD | Dernières nouvelles du développement durable')
@section('description', 'Suivez les dernières actualités du GDD : projets, formations, partenariats et initiatives de développement durable en Afrique.')
@section('content')
    <!-- Page profil ONG - STAY IN AFRICA (exemple) -->
    <div class="ong-profile-page">
        <!-- Header de profil -->
        <div class="ong-profile-header">
            <img src="https://via.placeholder.com/1200x400/009edb/ffffff?text=STAY+IN+AFRICA+Cover"
                 alt="Cover STAY IN AFRICA" class="ong-cover-image">
            <div class="container">
                <div class="ong-profile-content">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <img src="https://via.placeholder.com/120x120/ffffff/009edb?text=Logo"
                                 alt="Logo STAY IN AFRICA" class="ong-logo">
                            <h1 class="display-4 fw-bold mb-3">STAY IN AFRICA</h1>
                            <p class="lead mb-4">
                                Organisation dédiée au développement durable et à l'autonomisation des communautés africaines
                                à travers des projets innovants et des partenariats stratégiques.
                            </p>
                            <div class="d-flex gap-3">
                                <button class="btn btn-light btn-lg">
                                    <i class="fas fa-envelope me-2"></i>Nous contacter
                                </button>
                                <button class="btn btn-outline-light btn-lg">
                                    <i class="fas fa-share-alt me-2"></i>Partager
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ong-stats">
                                <div class="row text-center">
                                    <div class="col-6">
                                        <div class="stat-item">
                                            <span class="stat-number">25</span>
                                            <span class="stat-label">Projets actifs</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="stat-item">
                                            <span class="stat-number">12</span>
                                            <span class="stat-label">Pays d'intervention</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="stat-item">
                                            <span class="stat-number">5K+</span>
                                            <span class="stat-label">Bénéficiaires</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="stat-item">
                                            <span class="stat-number">2018</span>
                                            <span class="stat-label">Année de création</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenu avec onglets -->
        <div class="container">
            <div class="content-tabs">
                <ul class="nav nav-tabs" id="ongTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button">
                            <i class="fas fa-info-circle me-2"></i>Présentation
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="news-tab" data-bs-toggle="tab" data-bs-target="#news" type="button">
                            <i class="fas fa-newspaper me-2"></i>Actualités
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="projects-tab" data-bs-toggle="tab" data-bs-target="#projects" type="button">
                            <i class="fas fa-project-diagram me-2"></i>Projets
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="activities-tab" data-bs-toggle="tab" data-bs-target="#activities" type="button">
                            <i class="fas fa-tasks me-2"></i>Activités
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="events-tab" data-bs-toggle="tab" data-bs-target="#events" type="button">
                            <i class="fas fa-calendar-alt me-2"></i>Événements
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="trainings-tab" data-bs-toggle="tab" data-bs-target="#trainings" type="button">
                            <i class="fas fa-graduation-cap me-2"></i>Formations
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button">
                            <i class="fas fa-envelope me-2"></i>Contact
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="ongTabsContent">
                    <!-- Onglet Présentation -->
                    <div class="tab-pane fade show active" id="about" role="tabpanel">
                        <h3 class="mb-4">Notre Mission</h3>
                        <p class="lead">
                            STAY IN AFRICA est une organisation panafricaine qui œuvre pour le développement durable
                            du continent en encourageant les jeunes africains à rester sur le continent et à contribuer
                            à son développement.
                        </p>

                        <div class="row mt-5">
                            <div class="col-md-6">
                                <h4><i class="fas fa-eye text-primary me-2"></i>Notre Vision</h4>
                                <p>
                                    Une Afrique prospère où chaque jeune trouve les opportunités nécessaires pour
                                    s'épanouir et contribuer au développement de son continent.
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h4><i class="fas fa-heart text-danger me-2"></i>Nos Valeurs</h4>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>Excellence</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Innovation</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Intégrité</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Durabilité</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Onglet Actualités -->
                    <div class="tab-pane fade" id="news" role="tabpanel">
                        <div class="news-card">
                            <div class="card-meta">
                            <span class="meta-item">
                                <i class="fas fa-calendar"></i>15 Juin 2025
                            </span>
                                <span class="meta-item">
                                <i class="fas fa-user"></i>STAY IN AFRICA
                            </span>
                                <span class="meta-item">
                                <i class="fas fa-tag"></i>Développement
                            </span>
                            </div>
                            <h4>Lancement du programme "Jeunes Entrepreneurs Africains 2025"</h4>
                            <p>
                                Nous sommes fiers d'annoncer le lancement de notre nouveau programme destiné à
                                accompagner 500 jeunes entrepreneurs africains dans la réalisation de leurs projets.
                            </p>
                            <button class="btn btn-custom">Lire la suite</button>
                        </div>

                        <div class="news-card">
                            <div class="card-meta">
                            <span class="meta-item">
                                <i class="fas fa-calendar"></i>10 Juin 2025
                            </span>
                                <span class="meta-item">
                                <i class="fas fa-user"></i>STAY IN AFRICA
                            </span>
                                <span class="meta-item">
                                <i class="fas fa-tag"></i>Partenariat
                            </span>
                            </div>
                            <h4>Nouveau partenariat avec l'Union Africaine</h4>
                            <p>
                                Signature d'un accord de partenariat stratégique avec l'Union Africaine pour
                                le développement de projets d'infrastructure durable.
                            </p>
                            <button class="btn btn-custom">Lire la suite</button>
                        </div>
                    </div>

                    <!-- Onglet Projets -->
                    <div class="tab-pane fade" id="projects" role="tabpanel">
                        <div class="project-card">
                            <div class="card-meta">
                            <span class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>Kenya, Ghana, Nigeria
                            </span>
                                <span class="meta-item">
                                <i class="fas fa-calendar"></i>2024-2026
                            </span>
                                <span class="meta-item">
                                <i class="fas fa-dollar-sign"></i>2.5M €
                            </span>
                            </div>
                            <h4>Projet AgriTech for Africa</h4>
                            <p>
                                Digitalisation de l'agriculture africaine à travers l'introduction de technologies
                                innovantes pour améliorer les rendements et les revenus des agriculteurs.
                            </p>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-success" style="width: 65%">65%</div>
                            </div>
                            <button class="btn btn-custom">Voir détails</button>
                        </div>

                        <div class="project-card">
                            <div class="card-meta">
                            <span class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>Sénégal, Mali, Burkina Faso
                            </span>
                                <span class="meta-item">
                                <i class="fas fa-calendar"></i>2025-2027
                            </span>
                                <span class="meta-item">
                                <i class="fas fa-dollar-sign"></i>1.8M €
                            </span>
                            </div>
                            <h4>Énergie Solaire Communautaire</h4>
                            <p>
                                Installation de systèmes solaires dans 50 villages pour fournir un accès
                                durable à l'électricité et promouvoir le développement économique local.
                            </p>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-warning" style="width: 30%">30%</div>
                            </div>
                            <button class="btn btn-custom">Voir détails</button>
                        </div>
                    </div>

                    <!-- Onglet Activités -->
                    <div class="tab-pane fade" id="activities" role="tabpanel">
                        <div class="activity-card">
                            <div class="card-meta">
                            <span class="meta-item">
                                <i class="fas fa-calendar"></i>Chaque mois
                            </span>
                                <span class="meta-item">
                                <i class="fas fa-users"></i>200+ participants
                            </span>
                            </div>
                            <h4>Ateliers de Mentorat Jeunes</h4>
                            <p>
                                Sessions mensuelles de mentorat pour accompagner les jeunes dans leurs
                                projets entrepreneuriaux et leur développement personnel.
                            </p>
                        </div>

                        <div class="activity-card">
                            <div class="card-meta">
                            <span class="meta-item">
                                <i class="fas fa-calendar"></i>Trimestriel
                            </span>
                                <span class="meta-item">
                                <i class="fas fa-globe-africa"></i>Multi-pays
                            </span>
                            </div>
                            <h4>Forum des Innovations Africaines</h4>
                            <p>
                                Événements trimestriels rassemblant innovateurs, investisseurs et décideurs
                                pour promouvoir l'écosystème entrepreneurial africain.
                            </p>
                        </div>
                    </div>

                    <!-- Onglet Événements -->
                    <div class="tab-pane fade" id="events" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="activity-card">
                                    <div class="card-meta">
                                    <span class="meta-item">
                                        <i class="fas fa-calendar"></i>25 Juillet 2025
                                    </span>
                                        <span class="meta-item">
                                        <i class="fas fa-map-marker-alt"></i>Accra, Ghana
                                    </span>
                                    </div>
                                    <h5>Sommet de l'Innovation Africaine</h5>
                                    <p>Rassemblement des leaders de l'innovation du continent.</p>
                                    <button class="btn btn-custom btn-sm">S'inscrire</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="activity-card">
                                    <div class="card-meta">
                                    <span class="meta-item">
                                        <i class="fas fa-calendar"></i>10 Août 2025
                                    </span>
                                        <span class="meta-item">
                                        <i class="fas fa-map-marker-alt"></i>Kigali, Rwanda
                                    </span>
                                    </div>
                                    <h5>Workshop AgriTech</h5>
                                    <p>Formation intensive sur les technologies agricoles.</p>
                                    <button class="btn btn-custom btn-sm">S'inscrire</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Onglet Formations -->
                    <div class="tab-pane fade" id="trainings" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="activity-card">
                                    <h5>Formation Entrepreneuriat Digital</h5>
                                    <p><strong>Durée :</strong> 3 mois</p>
                                    <p><strong>Format :</strong> Hybride (présentiel + en ligne)</p>
                                    <p><strong>Prochaine session :</strong> Septembre 2025</p>
                                    <button class="btn btn-custom">Candidater</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="activity-card">
                                    <h5>Certification Gestion de Projet</h5>
                                    <p><strong>Durée :</strong> 6 semaines</p>
                                    <p><strong>Format :</strong> En ligne</p>
                                    <p><strong>Prochaine session :</strong> Août 2025</p>
                                    <button class="btn btn-custom">Candidater</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Onglet Contact -->
                    <div class="tab-pane fade" id="contact" role="tabpanel">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="contact-form">
                                    <h4 class="mb-4">Contactez STAY IN AFRICA</h4>
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Nom complet</label>
                                                <input type="text" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Téléphone</label>
                                                <input type="tel" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Pays</label>
                                                <select class="form-control">
                                                    <option value="">Sélectionnez votre pays</option>
                                                    <option value="CI">Côte d'Ivoire</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="SN">Sénégal</option>
                                                    <option value="other">Autre</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Sujet</label>
                                            <select class="form-control" required>
                                                <option value="">Choisir un sujet</option>
                                                <option value="partnership">Partenariat</option>
                                                <option value="project">Collaboration sur projet</option>
                                                <option value="training">Formation</option>
                                                <option value="volunteer">Bénévolat</option>
                                                <option value="media">Demande média</option>
                                                <option value="other">Autre</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Message</label>
                                            <textarea class="form-control" rows="5" required
                                                      placeholder="Décrivez votre demande ou projet..."></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-custom btn-lg">
                                            <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="contact-info">
                                    <h5 class="mb-4">Informations de contact</h5>

                                    <div class="contact-item mb-4">
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-map-marker-alt text-primary me-3 mt-1"></i>
                                            <div>
                                                <h6>Siège principal</h6>
                                                <p class="text-muted mb-0">
                                                    123 Avenue de l'Innovation<br>
                                                    Plateau, Abidjan<br>
                                                    Côte d'Ivoire
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="contact-item mb-4">
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-phone text-primary me-3 mt-1"></i>
                                            <div>
                                                <h6>Téléphone</h6>
                                                <p class="text-muted mb-0">+225 27 20 XX XX XX</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="contact-item mb-4">
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-envelope text-primary me-3 mt-1"></i>
                                            <div>
                                                <h6>Email</h6>
                                                <p class="text-muted mb-0">contact@stayinafrica.org</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="contact-item mb-4">
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-globe text-primary me-3 mt-1"></i>
                                            <div>
                                                <h6>Site web</h6>
                                                <a href="https://stayinafrica.org" class="text-decoration-none">
                                                    www.stayinafrica.org
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="social-links mt-4">
                                        <h6>Suivez-nous</h6>
                                        <div class="d-flex gap-3">
                                            <a href="#" class="text-primary fs-4">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a href="#" class="text-primary fs-4">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <a href="#" class="text-primary fs-4">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                            <a href="#" class="text-primary fs-4">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                            <a href="#" class="text-primary fs-4">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection

@push('scripts')
<script>
        // Navigation active state
        document.addEventListener('DOMContentLoaded', function() {
            const currentLocation = location.pathname;
            const menuItems = document.querySelectorAll('.nav-link');

            menuItems.forEach(item => {
                if(item.getAttribute('href') === currentLocation) {
                    item.classList.add('active');
                }
            });
        });

        // Smooth scrolling for anchor links
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

        // Form validation and submission
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Simple validation
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            if (isValid) {
                // Here you would normally send the form data to your server
                alert('Message envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.');
                this.reset();
            } else {
                alert('Veuillez remplir tous les champs obligatoires.');
            }
        });

        // Tab switching with URL hash
        const triggerTabList = document.querySelectorAll('#ongTabs button')
        triggerTabList.forEach(triggerEl => {
            const tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', event => {
                event.preventDefault()
                tabTrigger.show()

                // Update URL hash
                const tabId = triggerEl.getAttribute('data-bs-target').substring(1);
                history.replaceState(null, null, '#' + tabId);
            })
        })

        // Show tab based on URL hash on page load
        window.addEventListener('load', function() {
            const hash = window.location.hash;
            if (hash) {
                const tabButton = document.querySelector(`button[data-bs-target="${hash}"]`);
                if (tabButton) {
                    const tab = new bootstrap.Tab(tabButton);
                    tab.show();
                }
            }
        });
    </script>
@endpush
