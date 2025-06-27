{{-- resources/views/gallery/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Galerie - GDD | Photos et Vidéos de nos Actions sur le Terrain')
@section('description', 'Découvrez en images et vidéos l\'impact des projets du GDD : missions, formations, événements et réalisations en Afrique.')

@push('styles')
    <style>
        .gallery-hero {
            background: var(--gradient-primary);
            color: white;
            padding: 5rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .gallery-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M20 20c0 11.046-8.954 20-20 20v-40c11.046 0 20 8.954 20 20z'/%3E%3C/g%3E%3C/svg%3E") repeat;
        }

        .gallery-stats {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-top: -3rem;
            position: relative;
            z-index: 2;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 2rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: var(--primary-blue);
            display: block;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--dark-gray);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.875rem;
        }

        .gallery-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            cursor: pointer;
        }

        .gallery-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .gallery-image {
            height: 250px;
            background: var(--gradient-secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            position: relative;
            overflow: hidden;
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.7));
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: end;
            padding: 1.5rem;
        }

        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        .overlay-content {
            color: white;
            width: 100%;
        }

        .media-count {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.75rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
        }

        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.9);
            color: var(--primary-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            opacity: 0;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .gallery-card:hover .play-button {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1.1);
        }

        .gallery-body {
            padding: 2rem;
        }

        .gallery-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .gallery-description {
            color: var(--dark-gray);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .gallery-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
            font-size: 0.875rem;
            color: var(--dark-gray);
        }

        .gallery-date {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .gallery-location {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .category-badge-gallery {
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

        .gallery-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .gallery-tag {
            background: rgba(0, 158, 219, 0.1);
            color: var(--primary-blue);
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .filters-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
        }

        .filter-btn-gallery {
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

        .filter-btn-gallery.active,
        .filter-btn-gallery:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
            text-decoration: none;
        }

        .view-toggle {
            display: flex;
            gap: 0.5rem;
            margin-left: auto;
        }

        .view-btn {
            width: 40px;
            height: 40px;
            border: 2px solid var(--primary-blue);
            background: transparent;
            color: var(--primary-blue);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .view-btn.active,
        .view-btn:hover {
            background: var(--primary-blue);
            color: white;
        }

        /* Masonry Layout */
        .gallery-masonry {
            column-count: 3;
            column-gap: 2rem;
        }

        .gallery-masonry .gallery-card {
            break-inside: avoid;
            margin-bottom: 2rem;
        }

        /* List View */
        .gallery-list .gallery-card {
            display: flex;
            flex-direction: row;
            height: auto;
        }

        .gallery-list .gallery-image {
            width: 300px;
            flex-shrink: 0;
        }

        .gallery-list .gallery-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        /* Lightbox Modal */
        .lightbox-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
            background: white;
            border-radius: 20px;
            overflow: hidden;
        }

        .lightbox-image {
            width: 100%;
            height: auto;
            display: block;
        }

        .lightbox-info {
            padding: 2rem;
            background: white;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            background: rgba(0,0,0,0.5);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: background 0.3s ease;
        }

        .lightbox-close:hover {
            background: rgba(0,0,0,0.8);
        }

        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: rgba(0,0,0,0.5);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: background 0.3s ease;
        }

        .lightbox-nav:hover {
            background: rgba(0,0,0,0.8);
        }

        .lightbox-prev {
            left: 20px;
        }

        .lightbox-next {
            right: 20px;
        }

        @media (max-width: 991.98px) {
            .gallery-masonry {
                column-count: 2;
            }

            .gallery-list .gallery-card {
                flex-direction: column;
            }

            .gallery-list .gallery-image {
                width: 100%;
                height: 200px;
            }

            .view-toggle {
                margin: 1rem 0 0 0;
            }
        }

        @media (max-width: 767.98px) {
            .gallery-masonry {
                column-count: 1;
                column-gap: 0;
            }

            .gallery-stats {
                margin-top: -2rem;
                padding: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .stat-number {
                font-size: 2rem;
            }

            .filters-section {
                padding: 1.5rem;
            }

            .filter-btn-gallery {
                display: block;
                width: 100%;
                margin: 0.25rem 0;
            }

            .gallery-body {
                padding: 1.5rem;
            }

            .lightbox-content {
                max-width: 95%;
                max-height: 95%;
            }

            .lightbox-info {
                padding: 1.5rem;
            }
        }

        /* Loading animation */
        .gallery-loading {
            text-align: center;
            padding: 4rem 0;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary-blue);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Fade in animation */
        .gallery-item {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .gallery-item.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
@endpush

@section('content')
    <!-- Gallery Hero -->
    <section class="gallery-hero">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <h1 class="display-4 fw-bold mb-4">Notre Galerie</h1>
                    <p class="fs-5 mb-0 opacity-90">
                        Découvrez en images et vidéos l'impact de nos actions sur le terrain à travers l'Afrique
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <!-- Gallery Stats -->
            <div class="gallery-stats" data-aos="fade-up">
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number" data-count="{{ $total_photos }}">0</span>
                        <span class="stat-label">Photos</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-count="{{ $total_videos }}">0</span>
                        <span class="stat-label">Vidéos</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-count="{{ count($galleries) }}">0</span>
                        <span class="stat-label">Collections</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" data-count="{{ count($categories) }}">0</span>
                        <span class="stat-label">Catégories</span>
                    </div>
                </div>
            </div>

            <!-- Filters and View Options -->
            <div class="filters-section" data-aos="fade-up" data-aos-delay="200">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-3 mb-lg-0">
                            <h5 class="mb-0 text-primary-custom fw-bold me-4">
                                <i class="fas fa-filter me-2"></i>Filtrer par :
                            </h5>
                            <div class="d-flex flex-wrap">
                                <button class="filter-btn-gallery active" data-filter="all">
                                    Toutes les collections
                                </button>
                                @foreach($categories as $category)
                                    <button class="filter-btn-gallery" data-filter="{{ $category }}">
                                        {{ $category }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center justify-content-lg-end">
                            <span class="text-muted me-3">Vue :</span>
                            <div class="view-toggle">
                                <button class="view-btn active" data-view="grid" title="Vue grille">
                                    <i class="fas fa-th"></i>
                                </button>
                                <button class="view-btn" data-view="masonry" title="Vue mosaïque">
                                    <i class="fas fa-th-large"></i>
                                </button>
                                <button class="view-btn" data-view="list" title="Vue liste">
                                    <i class="fas fa-list"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div id="galleryContainer" class="row g-4">
                @foreach($galleries as $index => $gallery)
                    <div class="col-lg-4 col-md-6 gallery-item" data-category="{{ $gallery['category'] }}" data-aos="fade-up" data-aos-delay="{{ ($index % 3 + 1) * 100 }}">
                        <div class="gallery-card" data-gallery="{{ json_encode($gallery) }}">
                            <div class="gallery-image">
                                <div class="media-count">
                                    <i class="fas fa-camera me-1"></i>{{ $gallery['photos_count'] }}
                                    @if($gallery['videos_count'] > 0)
                                        <i class="fas fa-video ms-2 me-1"></i>{{ $gallery['videos_count'] }}
                                    @endif
                                </div>

                                @if($gallery['videos_count'] > 0)
                                    <div class="play-button">
                                        <i class="fas fa-play"></i>
                                    </div>
                                @endif

                                <i class="fas fa-{{ $gallery['category'] === 'Missions' ? 'globe-africa' : ($gallery['category'] === 'Formations' ? 'graduation-cap' : ($gallery['category'] === 'Événements' ? 'calendar-alt' : ($gallery['category'] === 'Projets' ? 'project-diagram' : ($gallery['category'] === 'Environnement' ? 'tree' : 'camera')))) }}"></i>

                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <p class="mb-0 fw-bold">Cliquez pour voir plus</p>
                                    </div>
                                </div>
                            </div>

                            <div class="gallery-body">
                                <div class="category-badge-gallery">{{ $gallery['category'] }}</div>

                                <h3 class="gallery-title">{{ $gallery['title'] }}</h3>
                                <p class="gallery-description">{{ $gallery['description'] }}</p>

                                <div class="gallery-meta">
                                    <div class="gallery-date">
                                        <i class="fas fa-calendar-alt text-primary-custom"></i>
                                        <span>{{ \Carbon\Carbon::parse($gallery['date'])->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="gallery-location">
                                        <i class="fas fa-map-marker-alt text-primary-custom"></i>
                                        <span>{{ $gallery['location'] }}</span>
                                    </div>
                                </div>

                                <div class="gallery-tags">
                                    @foreach($gallery['tags'] as $tag)
                                        <span class="gallery-tag">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- No results -->
            <div id="noResults" class="text-center py-5 d-none">
                <i class="fas fa-images text-muted mb-3" style="font-size: 4rem;"></i>
                <h4 class="text-muted mb-3">Aucune collection trouvée</h4>
                <p class="text-muted">Essayez de modifier vos critères de filtrage.</p>
                <button class="btn btn-outline-primary-custom" onclick="resetFilters()">
                    <i class="fas fa-refresh me-2"></i>Réinitialiser les filtres
                </button>
            </div>

            <!-- Loading -->
            <div id="galleryLoading" class="gallery-loading d-none">
                <div class="loading-spinner"></div>
                <p class="text-muted">Chargement des images...</p>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section-padding bg-primary-gradient text-white text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="zoom-in">
                    <h2 class="mb-4">Partagez Vos Photos</h2>
                    <p class="fs-5 mb-5 opacity-90">
                        Vous avez participé à nos événements ou projets ? Partagez vos photos avec nous !
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg px-5 border-radius-pill">
                            <i class="fas fa-camera me-2"></i>Envoyer des Photos
                        </a>
                        <a href="{{ route('events.index') }}" class="btn btn-outline-light btn-lg px-5 border-radius-pill">
                            <i class="fas fa-calendar-alt me-2"></i>Nos Événements
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div class="lightbox-modal" id="lightboxModal">
        <div class="lightbox-content">
            <button class="lightbox-close" onclick="closeLightbox()">
                <i class="fas fa-times"></i>
            </button>
            <button class="lightbox-nav lightbox-prev" onclick="previousImage()">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="lightbox-nav lightbox-next" onclick="nextImage()">
                <i class="fas fa-chevron-right"></i>
            </button>

            <img class="lightbox-image" id="lightboxImage" src="" alt="">

            <div class="lightbox-info">
                <h4 id="lightboxTitle"></h4>
                <p id="lightboxDescription"></p>
                <div class="d-flex justify-content-between align-items-center">
                    <span id="lightboxMeta"></span>
                    <span id="lightboxCounter"></span>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let currentGallery = [];
        let currentImageIndex = 0;
        let currentView = 'grid';

        // Initialize gallery
        document.addEventListener('DOMContentLoaded', function() {
            initializeGallery();
            animateCounters();
        });

        // Filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn-gallery');
            const galleryItems = document.querySelectorAll('.gallery-item');
            const noResults = document.getElementById('noResults');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');

                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filter galleries
                    let visibleCount = 0;
                    galleryItems.forEach(item => {
                        const category = item.getAttribute('data-category');

                        if (filter === 'all' || category === filter) {
                            item.style.display = 'block';
                            item.classList.add('visible');
                            visibleCount++;
                        } else {
                            item.style.display = 'none';
                            item.classList.remove('visible');
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

        // View toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const viewButtons = document.querySelectorAll('.view-btn');
            const galleryContainer = document.getElementById('galleryContainer');

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const view = this.getAttribute('data-view');

                    // Update active button
                    viewButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Update view
                    updateView(view);
                });
            });
        });

        function updateView(view) {
            const galleryContainer = document.getElementById('galleryContainer');

            // Remove all view classes
            galleryContainer.classList.remove('row', 'gallery-masonry', 'gallery-list');

            switch(view) {
                case 'grid':
                    galleryContainer.className = 'row g-4';
                    break;
                case 'masonry':
                    galleryContainer.className = 'gallery-masonry';
                    break;
                case 'list':
                    galleryContainer.className = 'gallery-list';
                    break;
            }

            currentView = view;
        }

        // Gallery card click handler
        function initializeGallery() {
            const galleryCards = document.querySelectorAll('.gallery-card');

            galleryCards.forEach((card, index) => {
                card.addEventListener('click', function() {
                    const galleryData = JSON.parse(this.getAttribute('data-gallery'));
                    openLightbox(galleryData, index);
                });
            });
        }

        // Lightbox functions
        function openLightbox(galleryData, index) {
            currentImageIndex = index;
            currentGallery = document.querySelectorAll('.gallery-card:not([style*="display: none"])');

            const modal = document.getElementById('lightboxModal');
            const image = document.getElementById('lightboxImage');
            const title = document.getElementById('lightboxTitle');
            const description = document.getElementById('lightboxDescription');
            const meta = document.getElementById('lightboxMeta');
            const counter = document.getElementById('lightboxCounter');

            // Set content
            image.src = '/images/gallery/placeholder.jpg'; // Placeholder image
            image.alt = galleryData.title;
            title.textContent = galleryData.title;
            description.textContent = galleryData.description;
            meta.textContent = `${galleryData.location} • ${new Date(galleryData.date).toLocaleDateString()}`;
            counter.textContent = `${index + 1} / ${currentGallery.length}`;

            // Show modal
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const modal = document.getElementById('lightboxModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function previousImage() {
            if (currentImageIndex > 0) {
                currentImageIndex--;
                const prevCard = currentGallery[currentImageIndex];
                const galleryData = JSON.parse(prevCard.getAttribute('data-gallery'));
                updateLightboxContent(galleryData);
            }
        }

        function nextImage() {
            if (currentImageIndex < currentGallery.length - 1) {
                currentImageIndex++;
                const nextCard = currentGallery[currentImageIndex];
                const galleryData = JSON.parse(nextCard.getAttribute('data-gallery'));
                updateLightboxContent(galleryData);
            }
        }

        function updateLightboxContent(galleryData) {
            const image = document.getElementById('lightboxImage');
            const title = document.getElementById('lightboxTitle');
            const description = document.getElementById('lightboxDescription');
            const meta = document.getElementById('lightboxMeta');
            const counter = document.getElementById('lightboxCounter');

            image.src = '/images/gallery/placeholder.jpg'; // Placeholder image
            image.alt = galleryData.title;
            title.textContent = galleryData.title;
            description.textContent = galleryData.description;
            meta.textContent = `${galleryData.location} • ${new Date(galleryData.date).toLocaleDateString()}`;
            counter.textContent = `${currentImageIndex + 1} / ${currentGallery.length}`;
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('lightboxModal');
            if (modal.style.display === 'flex') {
                switch(e.key) {
                    case 'Escape':
                        closeLightbox();
                        break;
                    case 'ArrowLeft':
                        previousImage();
                        break;
                    case 'ArrowRight':
                        nextImage();
                        break;
                }
            }
        });

        // Close lightbox on background click
        document.getElementById('lightboxModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLightbox();
            }
        });

        // Reset filters function
        function resetFilters() {
            const allButton = document.querySelector('.filter-btn-gallery[data-filter="all"]');
            if (allButton) {
                allButton.click();
            }
        }

        // Animate counters
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number');

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 16);
            });
        }

        // Lazy loading simulation
        function simulateImageLoading() {
            const galleryImages = document.querySelectorAll('.gallery-image');

            galleryImages.forEach((image, index) => {
                setTimeout(() => {
                    image.style.opacity = '1';
                    image.style.transform = 'scale(1)';
                }, index * 100);
            });
        }

        // Initialize image loading
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(simulateImageLoading, 500);
        });

        // Scroll to top of gallery when filtering
        function scrollToGallery() {
            const galleryContainer = document.getElementById('galleryContainer');
            galleryContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        // Enhanced hover effects
        document.addEventListener('DOMContentLoaded', function() {
            const galleryCards = document.querySelectorAll('.gallery-card');

            galleryCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    const image = this.querySelector('.gallery-image');
                    image.style.transform = 'scale(1.05)';
                    image.style.transition = 'transform 0.3s ease';
                });

                card.addEventListener('mouseleave', function() {
                    const image = this.querySelector('.gallery-image');
                    image.style.transform = 'scale(1)';
                });
            });
        });
    </script>
@endpush
