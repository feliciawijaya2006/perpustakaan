<?php

use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\PustakawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsPustakawan;

// Route to display the login form
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// Route to handle login form submission
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Route untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

// Protected route for the index page
Route::get('/index', [PerpustakaanController::class, 'index'])->name('index')->middleware('auth');

// Admin routes with IsAdmin middleware
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin_dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
    Route::post('/admin/addPustakawan', [AdminController::class, 'addPustakawan'])->name('admin.addPustakawan');
    Route::delete('/admin/removePustakawan/{id}', [AdminController::class, 'removePustakawan'])->name('admin.removePustakawan');
});

// Pustakawan routes with IsPustakawan middleware
Route::middleware(['auth', IsPustakawan::class])->prefix('pustakawan')->group(function () {
    Route::get('/dashboard', [PustakawanController::class, 'index'])->name('pustakawan_dashboard');

    // Route untuk memeriksa pembaruan data
    Route::get('/check-update', [PustakawanController::class, 'checkForDataUpdate'])->name('check_for_data_update');

    // Route untuk mengelola permintaan akses
    Route::post('/access-request/approve/{id}', [PustakawanController::class, 'approveAccessRequest'])->name('accept.request');
    Route::post('/access-request/reject/{id}', [PustakawanController::class, 'rejectAccessRequest'])->name('reject.request');

    // Rute untuk menambah data
    Route::post('/add-book', [PustakawanController::class, 'addBook'])->name('pustakawan.addBook');
    Route::post('/add-journal', [PustakawanController::class, 'addJournal'])->name('pustakawan.addJournal');
    Route::post('/add-fyp', [PustakawanController::class, 'addFYP'])->name('pustakawan.addFYP');
    Route::post('/add-newspaper', [PustakawanController::class, 'addNewspaper'])->name('pustakawan.addNewspaper');
    Route::post('/add-cd', [PustakawanController::class, 'addCD'])->name('pustakawan.addCD');
    
    // Rute untuk memperbarui data
    Route::put('/update-book/{id}', [PustakawanController::class, 'updateBook'])->name('pustakawan.updateBook');
    Route::put('/update-journal/{id}', [PustakawanController::class, 'updateJournal'])->name('pustakawan.updateJournal');
    Route::put('/update-fyp/{id}', [PustakawanController::class, 'updateFYP'])->name('pustakawan.updateFYP');
    Route::put('/update-newspaper/{id}', [PustakawanController::class, 'updateNewspaper'])->name('pustakawan.updateNewspaper');
    Route::put('/update-cd/{id}', [PustakawanController::class, 'updateCD'])->name('pustakawan.updateCD');

});

