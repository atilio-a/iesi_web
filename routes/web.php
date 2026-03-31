<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GraduatesController as AdminGraduatesController;
use App\Http\Controllers\Admin\LibraryController as AdminLibraryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ProductsController as AdminProductsController;
use App\Http\Controllers\Admin\StoriesController as AdminStoriesController;
use App\Http\Controllers\Admin\TourismServicesController as AdminTourismServicesController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GraduatesController;
use App\Http\Controllers\GraduatePanelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\StoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/institucion', InstitutionController::class)->name('institution');

Route::get('/carreras', [CareersController::class, 'index'])->name('careers');
Route::get('/carreras/{slug}', [CareersController::class, 'show'])->name('careers.show');

Route::get('/historias', [StoriesController::class, 'index'])->name('stories.index');
Route::get('/historias/{slug}', [StoriesController::class, 'show'])->name('stories.show');

Route::get('/noticias', [NewsController::class, 'index'])->name('news.index');
Route::get('/noticias/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/biblioteca', [LibraryController::class, 'index'])->name('library.index');

Route::get('/egresados', [GraduatesController::class, 'index'])->name('graduates.index');
Route::get('/egresados/{graduate}', [GraduatesController::class, 'show'])->name('graduates.show');
Route::get('/egresados/{graduate}/productos/{product}', [GraduatesController::class, 'product'])->name('graduates.products.show');
Route::get('/egresados/{graduate}/servicios/{service}', [GraduatesController::class, 'service'])->name('graduates.services.show');

Route::get('/contacto', [ContactController::class, 'index'])->name('contact');
Route::post('/contacto', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/campus-virtual', function () {
    return redirect()->away(config('services.iesi.virtual_campus_url'));
})->name('campus');

Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

Route::middleware(['auth', 'role:administrator,editor'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/noticias', [AdminNewsController::class, 'index'])->name('news.index');
    Route::get('/noticias/crear', [AdminNewsController::class, 'create'])->name('news.create');
    Route::post('/noticias', [AdminNewsController::class, 'store'])->name('news.store');
    Route::get('/noticias/{news}/editar', [AdminNewsController::class, 'edit'])->name('news.edit');
    Route::put('/noticias/{news}', [AdminNewsController::class, 'update'])->name('news.update');
    Route::delete('/noticias/{news}', [AdminNewsController::class, 'destroy'])->name('news.destroy');
    Route::get('/historias', [AdminStoriesController::class, 'index'])->name('stories.index');
    Route::get('/historias/crear', [AdminStoriesController::class, 'create'])->name('stories.create');
    Route::post('/historias', [AdminStoriesController::class, 'store'])->name('stories.store');
    Route::get('/historias/{story}/editar', [AdminStoriesController::class, 'edit'])->name('stories.edit');
    Route::put('/historias/{story}', [AdminStoriesController::class, 'update'])->name('stories.update');
    Route::delete('/historias/{story}', [AdminStoriesController::class, 'destroy'])->name('stories.destroy');
    Route::get('/biblioteca', [AdminLibraryController::class, 'index'])->name('library.index');
    Route::get('/egresados', [AdminGraduatesController::class, 'index'])->name('graduates.index');
    Route::get('/productos', [AdminProductsController::class, 'index'])->name('products.index');
    Route::get('/servicios', [AdminTourismServicesController::class, 'index'])->name('tourism-services.index');
    Route::get('/usuarios', [AdminUsersController::class, 'index'])->name('users.index');
});

Route::middleware(['auth', 'role:graduate'])->prefix('panel')->name('graduate.')->group(function () {
    Route::get('/', [GraduatePanelController::class, 'index'])->name('dashboard');
    Route::get('/productos', [GraduatePanelController::class, 'products'])->name('products');
    Route::get('/servicios', [GraduatePanelController::class, 'services'])->name('services');
});

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
