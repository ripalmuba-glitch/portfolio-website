<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\MessageController; // <-- 1. IMPORT MESSAGE CONTROLLER

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PublicController::class, 'home'])->name('home');

// Rute Publik untuk Kirim Form Kontak (BARU)
Route::post('/contact', [PublicController::class, 'storeContact'])->name('contact.store');


/*
|--------------------------------------------------------------------------
| Rute Admin Panel
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Services
    Route::resource('services', ServiceController::class);

    // Projects
    Route::resource('projects', ProjectController::class);

    // Site Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');

    // Messages (BARU)
    // Kita hanya butuh 'index', 'show', 'destroy'
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
});

require __DIR__.'/auth.php';
