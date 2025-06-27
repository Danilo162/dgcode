<?php
// =====================================
// 6. COMPOSANT CONTAINER DE GRAPHIQUE
// =====================================

// Modules/Dashboard/Resources/views/components/chart-container.blade.php
?>
<div class="chart-container card shadow-sm" data-aos="fade-up" data-aos-delay="200">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="card-title mb-0">{{ $title }}</h5>
            @if(isset($subtitle))
                <p class="card-subtitle text-muted small mb-0">{{ $subtitle }}</p>
            @endif
        </div>
        @if(isset($actions))
            <div class="chart-actions">
                {{ $actions }}
            </div>
        @endif
    </div>
    <div class="card-body">
        <div class="chart-wrapper" style="height: {{ $height ?? 300 }}px;">
            <canvas id="{{ $id }}" width="400" height="{{ $height ?? 300 }}"></canvas>
        </div>
    </div>
    @if(isset($footer))
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
