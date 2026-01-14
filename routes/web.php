<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\GenerateShortUrlController;

Route::get('/', [UserAuthController::class, 'login'])->name('login');
Route::post('/logged-in', [UserAuthController::class, 'loggedIn'])->name('logged-in');

Route::get('/s/{short_code}', [GenerateShortUrlController::class, 'shortUrl'])->name('short-url');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [UserDashboardController::class, 'logout'])->name('logout');

    // Client Routes

    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');

    // Member Routes
    Route::get('/members', [MemberController::class, 'index'])->name('members.index');
    Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('/members/store', [MemberController::class, 'store'])->name('members.store');

    // Generate Short URL Route
    Route::get('/shorturls', [GenerateShortUrlController::class, 'index'])->name('shorturls.index');
    Route::get('/shorturl/create', [GenerateShortUrlController::class, 'create'])->name('shorturls.create');
    Route::post('/shorturl/store', [GenerateShortUrlController::class, 'store'])->name('shorturls.store');
});
