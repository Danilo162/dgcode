<?php

use App\Http\Controllers\UtilsController;
use Illuminate\Support\Facades\Route;
use Modules\Consoles\App\Http\Controllers\CategorieMentorsController;
use Modules\Consoles\App\Http\Controllers\CompetencesController;
use Modules\Consoles\App\Http\Controllers\ConsolesController;
use Modules\Consoles\App\Http\Controllers\OffresController;
use Modules\Consoles\App\Http\Controllers\PermissionController;
use Modules\Consoles\App\Http\Controllers\RolesController;
use Modules\Consoles\App\Http\Controllers\TimesController;


Route::middleware('auth')
    ->prefix('consoles')
  //  ->middleware('can:CONSOLES')
    ->group(function () {
        Route::post('/customs/theme', [UtilsController::class, 'saveCustomTheme'])->name('consoles.customs.theme');
        Route::get('/', [ConsolesController::class, 'index'])->name('consoles');
        Route::group(['prefix' => 'settings'], function () {
        Route::group(['prefix' => 'roles'], function () {
            Route::get('/', function () {
                return view('consoles::settings.roles.index');
            })->name('consoles.roles');

            Route::get('/lists', function () {
                return view('consoles::settings.roles.index');
            })->name('consoles.settings.roles.index.lists');

            Route::post('/index', [RolesController::class, 'index'])->name('consoles.settings.roles.index');
            Route::post('/form', [RolesController::class, 'form'])->name('consoles.settings.roles.form');
            Route::get('/assignations', [RolesController::class, 'assignations'])->name('consoles.settings.roles.assignations');
            Route::get('/assignations/detail', [RolesController::class, 'assignationDetail'])->name('consoles.settings.roles.assignations.detail');
            Route::post('/assignations/store', [RolesController::class, 'assign_permission_all'])->name('consoles.settings.roles.assignations.store');
            Route::post('/form/permission', [RolesController::class, 'formPermission'])->name('consoles.settings.roles.form.permission');
            Route::post('store', [RolesController::class, 'store'])->name('consoles.settings.roles.store');
            Route::post('destroy', [RolesController::class, 'destroy'])->name('consoles.settings.roles.destroy');


            Route::get('/getall', [RolesController::class, 'getAllComponent'])->name('consoles.settings.roles.getall');
            //  Route::post('/assign-permission', 'RoleController@assign_permission')->name('role.assign-permission');
        });
        Route::group(['prefix' => 'permissions'], function () {
            Route::get('/', function () {
                return view('consoles::settings.permissions.index');
            })->name('consoles.settings.permissions.index');
            Route::post('store', [PermissionController::class, 'store'])->name('consoles.settings.permissions.store');
            Route::get('getall', [PermissionController::class, 'getAllComponent'])->name('consoles.settings.permissions.getall');
            Route::post('destroy', [PermissionController::class, 'destroy'])->name('consoles.settings.permissions.destroy');
            Route::post('/form', [PermissionController::class, 'form'])->name('consoles.settings.permissions.form');
        });
        Route::group(['prefix' => 'categoriementors'], function () {
            Route::get('/', function () {
                return view('consoles::settings.categoriementors.index');
            })->name('consoles.settings.categoriementors.index');
            Route::post('store', [CategorieMentorsController::class, 'store'])->name('consoles.settings.categoriementors.store');
            Route::get('getall', [CategorieMentorsController::class, 'getAllComponent'])->name('consoles.settings.categoriementors.getall');
            Route::post('destroy', [CategorieMentorsController::class, 'destroy'])->name('consoles.settings.categoriementors.destroy');
            Route::post('/form', [CategorieMentorsController::class, 'form'])->name('consoles.settings.categoriementors.form');
            Route::post('/detail', [CategorieMentorsController::class, 'detail'])->name('consoles.settings.categoriementors.detail');
        });
        Route::group(['prefix' => 'competences'], function () {
            Route::get('/', function () {
                return view('consoles::settings.competences.index');
            })->name('consoles.settings.competences.index');
            Route::post('store', [CompetencesController::class, 'store'])->name('consoles.settings.competences.store');
            Route::get('getall', [CompetencesController::class, 'getAllComponent'])->name('consoles.settings.competences.getall');
            Route::post('destroy', [CompetencesController::class, 'destroy'])->name('consoles.settings.competences.destroy');
            Route::post('/form', [CompetencesController::class, 'form'])->name('consoles.settings.competences.form');
            Route::post('/detail', [CompetencesController::class, 'detail'])->name('consoles.settings.competences.detail');
        });
        Route::group(['prefix' => 'offres'], function () {
            Route::get('/', function () {
                return view('consoles::settings.offres.index');
            })->name('consoles.settings.offres.index');
            Route::post('store', [OffresController::class, 'store'])->name('consoles.settings.offres.store');
            Route::get('getall', [OffresController::class, 'getAllComponent'])->name('consoles.settings.offres.getall');
            Route::post('destroy', [OffresController::class, 'destroy'])->name('consoles.settings.offres.destroy');
            Route::post('/form', [OffresController::class, 'form'])->name('consoles.settings.offres.form');
            Route::post('/detail', [OffresController::class, 'detail'])->name('consoles.settings.offres.detail');
        });
        Route::group(['prefix' => 'times'], function () {
            Route::get('/', function () {
                return view('consoles::settings.times.index');
            })->name('consoles.settings.times.index');
            Route::post('store', [TimesController::class, 'store'])->name('consoles.settings.times.store');
            Route::get('getall', [TimesController::class, 'getAllComponent'])->name('consoles.settings.times.getall');
            Route::post('destroy', [TimesController::class, 'destroy'])->name('consoles.settings.times.destroy');
            Route::post('/form', [TimesController::class, 'form'])->name('consoles.settings.times.form');
            Route::post('/detail', [TimesController::class, 'detail'])->name('consoles.settings.times.detail');
        });
    });

    });
Route::get('competences/search', [CompetencesController::class, 'search'])->name('competences.search');
/*Route::get('competences/saved', [CompetencesController::class, 'search'])->name('competences.saved');*/
