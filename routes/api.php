<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\GalleryController;

Route::get('/projects', [ProjectController::class, 'api'])->name('api.projects');
Route::get('/events', [EventController::class, 'api'])->name('api.events');
Route::get('/activities', [ActivityController::class, 'api'])->name('api.activities');
Route::get('/trainings', [TrainingController::class, 'api'])->name('api.trainings');
Route::get('/gallery', [GalleryController::class, 'api'])->name('api.gallery');
