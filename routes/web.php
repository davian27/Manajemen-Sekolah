<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');

    // siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // Kelas
    Route::get('kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('kelas/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');

    Route::get('jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
    Route::get('jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
    Route::post('jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
    Route::get('jurusan/{id}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
    Route::put('jurusan/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
    Route::delete('jurusan/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');

    Route::get('organisasi', [OrganisasiController::class, 'index'])->name('organisasi.index');
    Route::get('organisasi/create', [organisasiController::class, 'create'])->name('organisasi.create');
    Route::post('organisasi', [organisasiController::class, 'store'])->name('organisasi.store');
    Route::get('organisasi/{id}/edit', [organisasiController::class, 'edit'])->name('organisasi.edit');
    Route::put('organisasi/{id}', [organisasiController::class, 'update'])->name('organisasi.update');
    Route::delete('organisasi/{id}', [organisasiController::class, 'destroy'])->name('organisasi.destroy');

    Route::get('ekskul', [EkskulController::class, 'index'])->name('ekskul.index');
    Route::get('ekskul/create', [EkskulController::class, 'create'])->name('ekskul.create');
    Route::post('ekskul', [EkskulController::class, 'store'])->name('ekskul.store');
    Route::get('ekskul/{id}/edit', [EkskulController::class, 'edit'])->name('ekskul.edit');
    Route::put('ekskul/{id}', [EkskulController::class, 'update'])->name('ekskul.update');
    Route::delete('ekskul/{id}', [EkskulController::class, 'destroy'])->name('ekskul.destroy');

    Route::get('mapel', [MapelController::class, 'index'])->name('mapel.index');
    Route::get('mapel/create', [MapelController::class, 'create'])->name('mapel.create');
    Route::post('mapel', [MapelController::class, 'store'])->name('mapel.store');
    Route::get('mapel/{id}/edit', [MapelController::class, 'edit'])->name('mapel.edit');
    Route::put('mapel/{id}', [MapelController::class, 'update'])->name('mapel.update');
    Route::delete('mapel/{id}', [MapelController::class, 'destroy'])->name('mapel.destroy');
});
