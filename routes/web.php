<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\StudentExportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/kas-laporan', [KasController::class, 'laporan'])->name('kas.laporan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('students/export', [StudentExportController::class, 'export'])->name('students.export');

    Route::resource('rombel', RombelController::class);
    Route::resource('student', studentController::class);
    Route::resource('kas', KasController::class);
});

require __DIR__.'/auth.php';
