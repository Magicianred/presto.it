<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\CategoryController;

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



Auth::routes();



Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/search', [PublicController::class, 'search'])->name('search');


// Route::get('/categorie', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/categorie/{category}', [CategoryController::class, 'show'])->name('categories.show');
// Route::get('/categorie/crea', [CategoryController::class, 'create'])->name('categories.create');
// Route::post('/categorie/modifica', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::post('/categorie/update', [CategoryController::class, 'update'])->name('categories.update');

Route::get('/announcements/create', [HomeController::class, 'create'])->name('announcements.create');
Route::post('/announcements/store', [HomeController::class, 'store'])->name('announcements.store');
Route::get('/announcements/{announcement}/show', [PublicController::class, 'show'])->name('announcements.show');

Route::get('/announcements', [HomeController::class, 'index'])->name('announcements.index');

Route::get('/announcements', [HomeController::class, 'index'])->name('announcements.all');
Route::get('/announcements/modifica/{announcement}', [HomeController::class, 'edit'])->name('announcements.edit');
Route::put('/announcements/update/{announcement}', [HomeController::class, 'update'])->name('announcements.update');

//revisor
Route::get('/revisor', [RevisorController::class, 'index'])->middleware('auth.revisor')->name('revisor.home');
Route::post('/revisor/announcements/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisor/announcements/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');
Route::get('/revisor/trash',[RevisorController::class, 'trash'])->name('revisor.trash');
Route::post('/revisor/{id}/redo',[RevisorController::class, 'redo'])->name('revisor.redo');
Route::delete('/revisor/{id}/destroy',[RevisorController::class, 'destroy'])->name('revisor.destroy');

Route::post('/announcements/images/upload', [HomeController::class, 'uploadImage'])->name('announcements.images.upload');
Route::delete('/announcements/images/remove', [HomeController::class, 'removeImage'])->name('announcements.images.remove');
Route::get('/announcements/images', [HomeController::class, 'getImages'])->name('announcements.images');


//trad
Route::post('/locale/{locale}', [PublicController::class, 'locale'])->name('locale');
//categorie
Route::get('/category/{name_it}/{id}/announcement', [PublicController::class, 'announcementsByCategory'])->name('public.announcements.category');
Route::get('/category/{name_en}/{id}/announcement', [PublicController::class, 'announcementsByCategory'])->name('public.announcements.category');


//admin
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth.admin')->name('admin.index');







