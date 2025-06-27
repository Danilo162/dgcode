<?php
// =====================================
// 1. ROUTES WEB
// =====================================

// Modules/Dashboard/Routes/web.php
use Illuminate\Support\Facades\Route;
use Modules\Dashboard\App\Http\Controllers\Api\ChartsController;
use Modules\Dashboard\App\Http\Controllers\Api\StatsController;
use Modules\Dashboard\App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes du Module Dashboard
|--------------------------------------------------------------------------
*/

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::post('/export', [DashboardController::class, 'export'])->name('export');
    Route::post('/refresh', [DashboardController::class, 'refresh'])->name('refresh');
});

// =====================================
// 2. ROUTES API
// =====================================

// Modules/Dashboard/Routes/api.php
/*use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\Api\StatsController;
use Modules\Dashboard\Http\Controllers\Api\ChartsController;*/

/*
|--------------------------------------------------------------------------
| API Routes du Module Dashboard
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->name('api.v1.')->group(function () {
    // Statistics endpoints
    Route::apiResource('stats', StatsController::class);
    Route::get('stats/realtime', [StatsController::class, 'realtime'])->name('stats.realtime');

    // Charts endpoints
    Route::get('charts', [ChartsController::class, 'index'])->name('charts.index');
    Route::get('charts/{type}', [ChartsController::class, 'show'])->name('charts.show');
    Route::get('charts/{type}/data', [ChartsController::class, 'data'])->name('charts.data');
});
