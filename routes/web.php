<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\PolygonsController;
use App\Http\Controllers\PolylinesController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
Route::get('/', [PageController::class, 'landingpage'])->name('home');
Route::get('/peta', [PageController::class, 'peta'])->middleware(['auth', 'verified'])->name('peta');
Route::get('/table', [PageController::class, 'tabel'])->name('tabel');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');

//Point
Route::post('/points', [PointsController::class, 'store'])->name('points.store');
Route::delete('/delete-points/{id}', [PointsController::class, 'destroy'])->name('points.delete');
Route::GET('/edit-point/{id}', [PointsController::class, 'edit'])->name('point.edit');
Route::patch('/update-point/{id}', [PointsController::class, 'update'])->name('point.update');

//Polyline
Route::post('/polylines', [PolylinesController::class, 'store'])->name('polylines.store');
Route::delete('/delete-polylines/{id}', [PolylinesController::class, 'destroy'])->name('polylines.delete');
Route::GET('/edit-polyline/{id}', [PolylinesController::class, 'edit'])->name('polyline.edit');
Route::patch('/update-polyline/{id}', [PolylinesController::class, 'update'])->name('polyline.update');

//Polygon
Route::post('/polygons', [PolygonsController::class, 'store'])->name('polygons.store');
Route::delete('/delete-polygons/{id}', [PolygonsController::class, 'destroy'])->name('polygons.delete');
Route::GET('/edit-polygon/{id}', [PolygonsController::class, 'edit'])->name('polygon.edit');
Route::patch('/update-polygon/{id}', [PolygonsController::class, 'update'])->name('polygon.update');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
