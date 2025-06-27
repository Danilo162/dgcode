{{-- resources/views/news/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Actualités - GDD | Dernières nouvelles du développement durable')
@section('description', 'Suivez les dernières actualités du GDD : projets, formations, partenariats et initiatives de développement durable en Afrique.')

@push('styles')
    <style>
        .news-hero {
            background: var(--gradient-rainbow);
            color: white;
            padding: 5rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .news-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
        }

        .featured-news {
            margin-top: -4rem;
            position: relative;
            z-index: 2;
        }

        .featured-article {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
            transition: all 0.3s ease;
            height: 100%;
        }

        .featured-article:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }

        .featured-image {
            height: 300px;
            background: var(--gradient-ocean);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            position: relative;
            overflow: hidden;
        }

        .featured-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            background: var(--gradient-rainbow);
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: var(--shadow-md);
        }

        .news-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            height: 100%;
            border-left: 5px solid var(--secondary-turquoise);
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
            border-left-color: var(--primary-blue);
        }

        .news-image {
            height: 200px;
            background: var(--gradient-secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            position: relative;
        }

        .news-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
            color: var(--dark-gray);
        }

        .news-author {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .news-date {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .news-views {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-left: auto;
        }

        .category-badge-news {
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

        .news-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .news-excerpt {
            color: var(--dark-gray);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .news-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .news-tag {
            background: rgba(64, 224, 208, 0.1);
            color: var(--secondary-turquoise);
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .filters-section-news {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: var(--shadow-md);
            margin-bottom: 3rem;
            border-top: 4px solid var(--gradient-rainbow);
        }

        .filter-btn-news {
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--secondary-turquoise);
            background: transparent;
            color: var(--secondary-turquoise);
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            margin: 0.25rem;
            text-decoration: none;
        }

        .filter-btn-news.active,
        .filter-btn-news:hover {
            background: var(--secondary-turquoise);
            color: white;
            transform: translateY(-2px);
            text-decoration: none;
            box-shadow: var(--shadow-turquoise);
        }

        .sidebar-news {
            position: sticky;
            top: 100px;
        }

        .widget-news {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: var(--shadow-md);
            margin-bottom: 2rem;
            border-left: 4px solid var(--secondary-cyan);
        }

        .widget-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .recent-news-item {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid var(--light-gray);
            transition: all 0.3s ease;
        }

        .recent-news-item:hover {
            background: var(--bg-light-turquoise);
            margin: 0 -1rem;
            padding: 1rem;
            border-radius: 10px;
        }

        .recent-news-item:last-child {
            border-bottom: none;
        }

        .recent-news-image {
            width: 60px;
            height: 60px;
            background: var(--gradient-secondary);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .recent-news-content h6 {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .recent-news-date {
            font-size: 0.75rem;
            color: var(--dark-gray);
        }

        .pagination-news {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }

        .pagination-news .page-link {
            padding: 10px 15px;
            border: 2px solid var(--secondary-turquoise);
            color: var(--secondary-turquoise);
            background: white;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .pagination-news .page-link:hover,
        .pagination-news .page-link.active {
            background: var(--secondary-turquoise);
            color: white;
            transform: translateY(-2px);
        }

        .search-widget {
            margin-bottom: 2rem;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px;
            border: 2px solid var(--light-gray);
            border-radius: 25px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--secondary-turquoise);
            box-shadow: 0 0 0 3px rgba(64, 224, 208, 0.1);
            outline: none;
        }

        @media (max-width: 991.98px) {
            .sidebar-news {
                position: static;
                top: auto;
                margin-top: 3rem;
            }

            .featured-image {
                height: 250px;
            }

            .news-image {
                height: 180px;
            }
        }

        @media (max-width: 767.98px) {
            .filters-section-news {
                padding: 1.5rem;
            }

            .filter-btn-news {
                display: block;
                width: 100%;
                margin: 0.25rem 0;
            }

            .widget-news {
                padding: 1.5rem;
            }

            .recent-news-item {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
        }
    </style>
@endpush

@section('content')
    <!-- News Hero -->
    <section class="news-hero">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <h1 class="display-4 fw-bold mb-4">Actualités GDD</h1>
                    <p class="fs-5 mb-0 opacity-90">
                        Suivez nos dernières réalisations, projets innovants et initiatives pour le développement durable en Afrique
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured News -->
    <section class="container">
        <div class="featured-news">
            <div class="row g-4">
                @foreach($featured_news as $index => $article)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 150 }}">
                        <div class="featured-article">
                            <div class="featured-image">
                                <div class="featured-badge">{{ $index === 0 ? 'À la Une' : 'Tendance' }}</div>
                                <i class="fas fa-{{ $article['category'] === 'Projets' ? 'project-diagram' : ($article['category'] === 'Formation' ? 'graduation-cap' : ($article['category'] === 'Partenariats' ? 'handshake' : 'leaf')) }}"></i>
                            </div>
                            <div class="card-body p-4">
                                <div class="category-badge-news">{{ $article['category'] }}</div>
                                <h3 class="news-title">{{ $article['title'] }}</h3>
                                <p class="news-excerpt">{{ $article['excerpt'] }}</p>

                                <div class="news-meta">
                                    <div class="news-author">
                                        <i class="fas fa-user text-primary-custom"></i>
                                        <span>{{ $article['author'] }}</span>
                                    </div>
                                    <div class="news-date">
                                        <i class="fas fa-calendar-alt text-primary-custom"></i>
                                        <span>{{ \Carbon\Carbon::parse($article['published_at'])->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="news-views">
                                        <i class="fas fa-eye text-primary-custom"></i>
                                        <span>{{ $article['views'] }}</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="news-tags">
                                        @foreach(array_slice($article['tags'], 0, 2) as $tag)
                                            <span class="news-tag">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                    <a href="{{ route('news.show', $article['slug']) }}" class="btn btn-turquoise btn-sm">
                                        Lire <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="section-padding">
        <div class="container">
            <!-- Filters -->
            <div class="filters-section-news" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-3 mb-3 mb-lg-0">
                        <h5 class="mb-0 text-gradient-ocean fw-bold">
                            <i class="fas fa-filter me-2"></i>Filtrer par catégorie :
                        </h5>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex flex-wrap justify-content-lg-end justify-content-center">
                            <button class="filter-btn-news active" data-filter="all">
                                Toutes les actualités
                            </button>
                            @foreach($categories as $category)
                                <button class="filter-btn-news" data-filter="{{ $category }}">
                                    {{ $category }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- News Grid -->
                <div class="col-lg-8">
                    <div class="row g-4" id="newsGrid">
                        @foreach($news->skip(3) as $index => $article)
                            <div class="col-md-6 news-item" data-category="{{ $article['category'] }}" data-aos="fade-up" data-aos-delay="{{ ($index % 2 + 1) * 100 }}">
                                <div class="news-card">
                                    <div class="news-image">
                                        <i class="fas fa-{{ $article['category'] === 'Projets' ? 'project-diagram' : ($article['category'] === 'Formation' ? 'graduation-cap' : ($article['category'] === 'Partenariats' ? 'handshake' : ($article['category'] === 'Environnement' ? 'leaf' : 'newspaper'))) }}"></i>
                                    </div>
                                    <div class="card-body p-3 d-flex flex-column">
                                        <div class="category-badge-news">{{ $article['category'] }}</div>
                                        <h4 class="news-title">{{ $article['title'] }}</h4>
                                        <p class="news-excerpt">{{ $article['excerpt'] }}</p>

                                        <div class="news-meta mt-auto">
                                            <div class="news-author">
                                                <i class="fas fa-user text-turquoise"></i>
                                                <span>{{ $article['author'] }}</span>
                                            </div>
                                            <div class="news-date">
                                                <i class="fas fa-calendar-alt text-turquoise"></i>
                                                <span>{{ \Carbon\Carbon::parse($article['published_at'])->format('d/m/Y') }}</span>
                                            </div>
                                            <div class="news-views">
                                                <i class="fas fa-eye text-turquoise"></i>
                                                <span>{{ $article['views'] }}</span>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div class="news-tags">
                                                @foreach(array_slice($article['tags'], 0, 2) as $tag)
                                                    <span class="news-tag">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                            <a href="{{ route('news.show', $article['slug']) }}" class="btn btn-outline-primary-custom btn-sm">
                                                Lire <i class="fas fa-arrow-right ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-news">
                        <a href="#" class="page-link"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="page-link active">1</a>
                        <a href="#" class="page-link">2</a>
                        <a href="#" class="page-link">3</a>
                        <a href="#" class="page-link"><i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar-news">
                        <!-- Search Widget -->
                        <div class="widget-news search-widget">
                            <h5 class="widget-title">
                                <i class="fas fa-search text-turquoise"></i>Rechercher
                            </h5>
                            <input type="text" class="search-input" placeholder="Rechercher dans les actualités..." id="newsSearch">
                        </div>

                        <!-- Recent News Widget -->
                        <div class="widget-news">
                            <h5 class="widget-title">
                                <i class="fas fa-clock text-turquoise"></i>Articles récents
                            </h5>
                            @foreach($latest_news as $recent)
                                <div class="recent-news-item">
                                    <div class="recent-news-image">
                                        <i class="fas fa-{{ $recent['category'] === 'Projets' ? 'project-diagram' : ($recent['category'] === 'Formation' ? 'graduation-cap' : 'handshake') }}"></i>
                                    </div>
                                    <div class="recent-news-content">
                                        <h6>
                                            <a href="{{ route('news.show', $recent['slug']) }}" class="text-decoration-none">
                                                {{ Str::limit($recent['title'], 60) }}
                                            </a>
                                        </h6>
                                        <div class="recent-news-date">
                                            {{ \Carbon\Carbon::parse($recent['published_at'])->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Categories Widget -->
                        <div class="widget-news">
                            <h5 class="widget-title">
                                <i class="fas fa-tags text-turquoise"></i>Catégories
                            </h5>
                            @foreach($categories as $category)
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <a href="{{ route('news.category', strtolower($category)) }}" class="text-decoration-none text-dark fw-medium">
                                        {{ $category }}
                                    </a>
                                    <span class="badge badge-turquoise">
                                        {{ $news->where('category', $category)->count() }}
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        <!-- Newsletter Widget -->
                        <div class="widget-news bg-ocean-gradient text-white">
                            <h5 class="widget-title text-white">
                                <i class="fas fa-envelope text-white"></i>Newsletter
                            </h5>
                            <p class="mb-3 opacity-90">Recevez nos dernières actualités directement dans votre boîte mail.</p>
                            <form id="newsletterForm">
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Votre email" required>
                                </div>
                                <button type="submit" class="btn btn-light w-100 fw-bold">
                                    S'abonner <i class="fas fa-paper-plane ms-1"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Social Media Widget -->
                        <div class="widget-news">
                            <h5 class="widget-title">
                                <i class="fas fa-share-alt text-turquoise"></i>Suivez-nous
                            </h5>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-outline-primary-custom btn-sm flex-fill">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary-custom btn-sm flex-fill">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary-custom btn-sm flex-fill">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary-custom btn-sm flex-fill">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- No results -->
            <div id="noResults" class="text-center py-5 d-none">
                <i class="fas fa-newspaper text-muted mb-3" style="font-size: 4rem;"></i>
                <h4 class="text-muted mb-3">Aucun article trouvé</h4>
                <p class="text-muted">Essayez de modifier vos critères de recherche.</p>
                <button class="btn btn-outline-primary-custom" onclick="resetFilters()">
                    <i class="fas fa-refresh me-2"></i>Réinitialiser les filtres
                </button>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section-padding bg-rainbow-gradient text-white text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="zoom-in">
                    <h2 class="mb-4">Restez Informé de Nos Actions</h2>
                    <p class="fs-5 mb-5 opacity-90">
                        Ne manquez aucune de nos actualités et découvrez en temps réel l'impact de nos projets sur le terrain.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg px-5 border-radius-pill btn-shine">
                            <i class="fas fa-envelope me-2"></i>Nous Contacter
                        </a>
                        <a href="{{ route('projects.index') }}" class="btn btn-outline-light btn-lg px-5 border-radius-pill">
                            <i class="fas fa-project-diagram me-2"></i>Nos Projets
                        </a>
                        <a href="{{ route('events.index') }}" class="btn btn-outline-light btn-lg px-5 border-radius-pill">
                            <i class="fas fa-calendar-alt me-2"></i>Nos Événements
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
            const filterButtons = document.querySelectorAll('.filter-btn-news');
            const newsItems = document.querySelectorAll('.news-item');
            const noResults = document.getElementById('noResults');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');

                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filter news
                    let visibleCount = 0;
                    newsItems.forEach(item => {
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

        // Search functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('newsSearch');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const newsItems = document.querySelectorAll('.news-item');
                let visibleCount = 0;

                newsItems.forEach(item => {
                    const title = item.querySelector('.news-title').textContent.toLowerCase();
                    const excerpt = item.querySelector('.news-excerpt').textContent.toLowerCase();

                    if (title.includes(searchTerm) || excerpt.includes(searchTerm)) {
                        item.style.display = 'block';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Show/hide no results
                const noResults = document.getElementById('noResults');
                if (visibleCount === 0 && searchTerm.length > 0) {
                    noResults.classList.remove('d-none');
                } else {
                    noResults.classList.add('d-none');
                }
            });
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

        // Reset filters function
        function resetFilters() {
            const allButton = document.querySelector('.filter-btn-news[data-filter="all"]');
            const searchInput = document.getElementById('newsSearch');

            if (allButton) {
                allButton.click();
            }

            if (searchInput) {
                searchInput.value = '';
                searchInput.dispatchEvent(new Event('input'));
            }
        }

        // Enhanced hover effects for news cards
        document.addEventListener('DOMContentLoaded', function() {
            const newsCards = document.querySelectorAll('.news-card, .featured-article');

            newsCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    const image = this.querySelector('.news-image, .featured-image');
                    if (image) {
                        image.style.transform = 'scale(1.05)';
                        image.style.transition = 'transform 0.3s ease';
                    }
                });

                card.addEventListener('mouseleave', function() {
                    const image = this.querySelector('.news-image, .featured-image');
                    if (image) {
                        image.style.transform = 'scale(1)';
                    }
                });
            });
        });

        // Smooth scroll for pagination
        document.querySelectorAll('.pagination-news .page-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('#newsGrid').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });
        });

        // Reading time calculation
        document.addEventListener('DOMContentLoaded', function() {
            const articles = document.querySelectorAll('.news-excerpt');

            articles.forEach(article => {
                const text = article.textContent;
                const wordsPerMinute = 200;
                const words = text.split(' ').length;
                const readingTime = Math.ceil(words / wordsPerMinute);

                // Add reading time indicator
                const readingTimeElement = document.createElement('small');
                readingTimeElement.className = 'text-muted';
                readingTimeElement.innerHTML = `<i class="fas fa-clock me-1"></i>${readingTime} min de lecture`;

                const metaDiv = article.parentNode.querySelector('.news-meta');
                if (metaDiv) {
                    metaDiv.appendChild(readingTimeElement);
                }
            });
        });

        // Lazy loading simulation for images
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const image = entry.target;
                    // Simulate image loading
                    setTimeout(() => {
                        image.style.opacity = '1';
                        image.style.transform = 'scale(1)';
                    }, Math.random() * 500);
                    observer.unobserve(image);
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.news-image, .featured-image').forEach(img => {
                img.style.opacity = '0.8';
                img.style.transform = 'scale(0.95)';
                img.style.transition = 'all 0.5s ease';
                imageObserver.observe(img);
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

        /* Enhanced animations */
        .news-item {
            transition: all 0.3s ease;
        }

        .btn-shine {
            position: relative;
            overflow: hidden;
        }

        .btn-shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s;
        }

        .btn-shine:hover::before {
            left: 100%;
        }

        /* Improved responsive design */
        @media (max-width: 575.98px) {
            .featured-article .card-body {
                padding: 1.5rem !important;
            }

            .news-card .card-body {
                padding: 1.5rem !important;
            }

            .news-meta {
                flex-direction: column;
                gap: 0.5rem !important;
            }

            .news-meta .news-views {
                margin-left: 0 !important;
            }
        }

        /* Custom scrollbar for sidebar */
        .sidebar-news::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-news::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .sidebar-news::-webkit-scrollbar-thumb {
            background: var(--secondary-turquoise);
            border-radius: 10px;
        }

        .sidebar-news::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-teal);
        }
    </style>
@endpush
