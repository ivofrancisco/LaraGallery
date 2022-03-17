<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GalleryPageController;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Gallery's front page
Route::get('/', [GalleryPageController::class, 'index'])->name('site.gallery');
// List of all galleries (admin)
Route::get('/manage/galleries', [GalleryController::class, 'index'])->name('manage.galleries');
// Create gallery
Route::get('/manage/galleries/create', [GalleryController::class, 'create'])->name('manage.create');
// Store new gallery
Route::post('/manage/galleries/create', [GalleryController::class, 'store'])->name('manage.store');
// Edit gallery
Route::get('/manage/galleries/{id}/edit', [GalleryController::class, 'edit'])->name('manage.edit');
// Update gallery
Route::put('/manage/galleries/update', [GalleryController::class, 'update'])->name('manage.update');
// Delete gallery
Route::delete('/manage/galleries/{id}/delete', [GalleryController::class, 'destroy'])->name('manage.delete');