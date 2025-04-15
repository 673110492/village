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

    // Routes Projects
    Route::resource('projects', ProjectController::class);

    // Routes Posts
    Route::resource('posts', PostController::class);

    // Routes About Sections
    Route::resource('about-sections', AboutSectionController::class);

    // Routes Testimonials
    Route::resource('testimonials', TestimonialController::class);

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
