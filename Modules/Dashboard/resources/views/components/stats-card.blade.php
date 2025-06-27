<?php
// =====================================
// 5. COMPOSANT CARTE DE STATISTIQUES
// =====================================

// Modules/Dashboard/Resources/views/components/stats-card.blade.php
?>
<div class="stats-card card-{{ $color ?? 'primary' }}" data-aos="fade-up">
    <div class="stats-content">
        <div class="stats-info">
            <div class="stats-value">{{ $value }}</div>
            <div class="stats-label">{{ $title }}</div>
            @if(isset($trend))
                <div class="stats-trend">
                    <i class="fas fa-arrow-{{ $trendDirection === 'up' ? 'up' : 'down' }} me-1"></i>
                    <span class="trend-value {{ $trendDirection === 'up' ? 'text-success' : 'text-danger' }}">
                    {{ $trend }}
                </span>
                    <span class="text-muted small">vs mois dernier</span>
                </div>
            @endif
        </div>
        <div class="stats-icon">
            <i class="{{ $icon }}"></i>
        </div>
    </div>
    @if(isset($link))
        <div class="stats-footer">
            <a href="{{ $link }}" class="text-decoration-none">
                {{ __('dashboard::actions.view_details') }}
                <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    @endif
</div>
