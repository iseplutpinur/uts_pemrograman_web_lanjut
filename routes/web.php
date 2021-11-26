<?php

use App\Http\Controllers\JurusanController;
use App\Http\Livewire\MahasiswaForm;
use App\Http\Livewire\PostForm;
use Illuminate\Support\Facades\Route;

Route::get('posts', [PostForm::class, 'index'])->middleware(['auth'])->name('posts');
Route::get('posts/exportPDF', [PostForm::class, 'exportPDF'])->middleware(['auth']);

Route::get('mahasiswa', [MahasiswaForm::class, 'index'])->middleware(['auth'])->name('mahasiswa');
Route::get('mahasiswa/exportPDF', [MahasiswaForm::class, 'exportPDF'])->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('jurusans', JurusanController::class);
require __DIR__ . '/auth.php';
