<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Admin\{
    ServiceController,
    ProjectController,
    PostController,
    AboutSectionController,
    TestimonialController,
    PartnerController,
    ContactController,
    SettingController,
    UserController,
    TeamController,
    CompanyValueController,
    CompanyMissionController,
    DashboardController,
    ProfilController
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
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login')->with('status', 'Vous avez été déconnecté avec succès.');
})->name('deconnexion');
// Routes Admin avec préfixe 'admin'
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function() {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //profile
    Route::get('/profil', [ProfilController::class, 'index'])->name('profile.index');
    Route::post('/profil/update-infos', [ProfilController::class, 'updateInfos'])->name('profile.update.infos');
    Route::post('/profil/update-photo', [ProfilController::class, 'updatePhoto'])->name('profile.update.photo');
    Route::post('/profil/update-password', [ProfilController::class, 'updatePassword'])->name('profile.update.password');

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
    Route::patch('posts/{post}/toggle-status', [PostController::class, 'toggleStatus'])
     ->name('posts.toggleStatus');
     Route::patch('comments/{id}/approve', [PostController::class, 'approveComment'])->name('comments.approve');
     Route::delete('comments/{id}', [PostController::class, 'destroyComment'])->name('comments.destroy');
    // Routes About Sections
    Route::resource('about_sections', AboutSectionController::class);
    Route::patch('about_sections/{aboutSection}/toggle-status', [AboutSectionController::class, 'toggleStatus'])
     ->name('about_sections.toggleStatus');

    // Routes Testimonials
    Route::resource('testimonials', TestimonialController::class);
    Route::patch('testimonials/{testimonial}/toggle-status', [TestimonialController::class, 'toggleStatus'])
     ->name('testimonials.toggleStatus');

    // Routes Partners
    Route::resource('partners', PartnerController::class);
    Route::patch('partners/{partner}/toggle-status', [PartnerController::class, 'toggleStatus'])
     ->name('partners.toggleStatus');

    // Routes Contacts
    Route::resource('contacts', ContactController::class);

    // Routes Settings
    Route::resource('settings', SettingController::class);

    // Routes Utilisateurs (Users)
    Route::resource('users', UserController::class); // CRUD utilisateurs

    // Routes Teams
    Route::resource('teams', TeamController::class);
    Route::patch('teams/{team}/toggle-status', [TeamController::class, 'toggleStatus'])
     ->name('teams.toggleStatus');

     // Routes Values
     Route::resource('values', CompanyValueController::class);
     Route::patch('values/{value}/toggle-status', [CompanyValueController::class, 'toggleStatus'])
      ->name('values.toggleStatus');
    // Missions
    Route::resource('missions', CompanyMissionController::class);
     Route::patch('missions/{mission}/toggle-status', [CompanyMissionController::class, 'toggleStatus'])
      ->name('missions.toggleStatus');

   
});