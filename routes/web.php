<?php

use App\Http\Controllers\JurusanController;
use App\Http\Livewire\MahasiswaForm;
use Illuminate\Support\Facades\Route;

Route::get('mahasiswa', [MahasiswaForm::class, 'index'])->middleware(['auth'])->name('mahasiswa');
Route::get('mahasiswa/exportPDF', [MahasiswaForm::class, 'exportPDF'])->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('jurusans', JurusanController::class)->middleware(['auth']);
require __DIR__ . '/auth.php';
