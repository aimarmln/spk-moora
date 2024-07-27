<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAccController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\MooraController;
use App\Http\Controllers\UserAccController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

// LOGIN ADMIN
Route::get('', [AdminLoginController::class, 'showLoginForm'])->name('login-admin');
Route::post('login-admin', [AdminLoginController::class, 'login'])->name('login-admin.submit');
Route::post('logout-admin', [AdminLoginController::class, 'logout'])->name('logout-admin');

// LOGIN USER (GURU)
Route::get('login-user', [UserLoginController::class, 'showLoginForm'])->name('login-user');
Route::post('login-user', [UserLoginController::class, 'login'])->name('login-user.submit');
Route::post('logout-user', [UserLoginController::class, 'logout'])->name('logout-user');

// HALAMAN ADMIN
Route::middleware([AdminMiddleware::class])->group(function () {
  // admin dashboard
  Route::get('admin/dashboard', [UserController::class, 'admin'])->name('admin.dashboard');
  
  // menampilkan seluruh akun guru
  Route::get('admin/registrasi-guru', [UserAccController::class, 'admin'])->name('admin.registrasi-guru');
  
  // menambahkan akun guru
  Route::get('admin/registrasi-guru-tambah', [UserAccController::class, 'create'])->name('registrasi-guru.create');
  Route::post('admin/registrasi-guru', [UserAccController::class, 'store'])->name('registrasi-guru.store');
  
  // mengedit akun guru
  Route::get('admin/registrasi-guru/{id}/edit', [UserAccController::class, 'edit'])->name('registrasi-guru.edit');
  Route::put('admin/registrasi-guru/{id}', [UserAccController::class, 'update'])->name('registrasi-guru.update');
  
  // menghapus akun guru
  Route::delete('admin/registrasi-guru/{id}', [UserAccController::class, 'destroy'])->name('registrasi-guru.destroy');
  
  // menampilkan seluruh akun admin
  Route::get('admin/registrasi-admin', [AdminAccController::class, 'admin'])->name('admin.registrasi-admin');
  
  // menambahkan akun admin
  Route::get('admin/registrasi-admin-tambah', [AdminAccController::class, 'create'])->name('registrasi-admin.create');
  Route::post('admin/registrasi-admin', [AdminAccController::class, 'store'])->name('registrasi-admin.store');
  
  // mengedit akun admin
  Route::get('admin/registrasi-admin/{id}/edit', [AdminAccController::class, 'edit'])->name('registrasi-admin.edit');
  Route::put('admin/registrasi-admin/{id}', [AdminAccController::class, 'update'])->name('registrasi-admin.update');
  
  // menghapus akun admin
  Route::delete('admin/registrasi-admin/{id}', [AdminAccController::class, 'destroy'])->name('registrasi-admin.destroy');
  
  // menampilkan seluruh data siswa
  Route::get('admin/data-siswa', [DataSiswaController::class, 'admin'])->name('admin.data-siswa');
  
  // menampilkan detail siswa
  Route::get('admin/data-siswa/{id}', [DataSiswaController::class, 'adminShow'])->name('data-siswa.adminShow');
  
  // menambahkan data siswa
  Route::get('admin/data-siswa-tambah', [DataSiswaController::class, 'create'])->name('data-siswa.create');
  Route::post('admin/data-siswa', [DataSiswaController::class, 'store'])->name('data-siswa.store');
  
  // mengedit data siswa
  Route::get('admin/data-siswa/{id}/edit', [DataSiswaController::class, 'edit'])->name('data-siswa.edit');
  Route::put('admin/data-siswa/{id}', [DataSiswaController::class, 'update'])->name('data-siswa.update');
  
  // menghapus data siswa
  Route::delete('admin/data-siswa/{id}', [DataSiswaController::class, 'destroy'])->name('data-siswa.destroy');
  
  // data kriteria
  Route::get('admin/data-kriteria', [KriteriaController::class, 'admin'])->name('admin.data-kriteria');
});


// HALAMAN USER (GURU)
Route::middleware([UserMiddleware::class])->group(function () {
  // user dashboard
  Route::get('user/dashboard', [UserController::class, 'user'])->name('user.dashboard');
  
  // proses moora
  Route::get('user/proses-moora', [MooraController::class, 'mooraProses'])->name('moora-proses');
  Route::post('user/metode-proses', [MooraController::class, 'process'])->name('metode.proses');
  
  // normalisasi
  Route::get('user/normalisasi-moora', [MooraController::class, 'mooraNormalisasi'])->name('moora-normalisasi');
  
  // hasil optimasi
  Route::get('user/hasil-optimasi-moora', [MooraController::class, 'mooraHasilOptimasi'])->name('moora-hasil-optimasi');
  
  // perangkingan
  Route::get('user/perangkingan', [MooraController::class, 'mooraPerangkingan'])->name('moora-perangkingan');
  
  // cetak perangkingan
  Route::get('user/cetak-siswa', [MooraController::class, 'cetak'])->name('cetak-siswa');
  
  // menampilkan seluruh data siswa
  Route::get('user/data-siswa', [DataSiswaController::class, 'user'])->name('user.data-siswa');
  
  // menampilkan detail data siswa
  Route::get('user/data-siswa/{id}', [DataSiswaController::class, 'userShow'])->name('data-siswa.userShow');
  
  // menampilkan seluruh data kriteria
  Route::get('user/data-kriteria', [KriteriaController::class, 'user'])->name('user.data-kriteria');
});
