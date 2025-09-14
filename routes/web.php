<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::middleware(['auth'])->group(function () {
Route::resource('members', MemberController::class);

// Print page
Route::get('/members/{member}/print', [MemberController::class, 'print'])->name('members.print');
});


require __DIR__.'/auth.php';
