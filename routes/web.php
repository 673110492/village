<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    ServiceController,
    ProjectController,
    PostController,
    AboutSectionController,
    TestimonialController,
    PartnerController,
    ContactController,
    SettingController,
    UserController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routes Admin avec préfixe 'admin'
Route::prefix('admin')->name('admin.')->group(function() {

    // Dashboard
    Route::get('/', [ServiceController::class, 'index'])->name('dashboard'); // Dashboard

    // Routes Services
    Route::resource('services', ServiceController::class);
    Route::patch('services/{service}/toggle-status', [ServiceController::class, 'toggleStatus'])
     ->name('services.toggleStatus');

    // Routes Projects
    Route::resource('projects', ProjectController::class);
    Route::patch('projects/{project}/toggle-status', [ProjectController::class, 'toggleStatus'])
     ->name('projects.toggleStatus');

    // Routes Posts
    Route::resource('posts', PostController::class);

    // Routes About Sections
    Route::resource('about-sections', AboutSectionController::class);

    // Routes Testimonials
    Route::resource('testimonials', TestimonialController::class);
    Route::patch('testimonials/{testimonial}/toggle-status', [TestimonialController::class, 'toggleStatus'])
     ->name('testimonials.toggleStatus');

    // Routes Partners
    Route::resource('partners', PartnerController::class);

    // Routes Contacts
    Route::resource('contacts', ContactController::class);

    // Routes Settings
    Route::resource('settings', SettingController::class);

    // Routes Utilisateurs (Users)
    Route::resource('users', UserController::class); // CRUD utilisateurs
});

Route::get('/', function () {
    return view('admin.dashboard');
});
