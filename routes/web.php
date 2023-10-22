<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/mobile/home', function () {
    return view('mobile');
})->name('mobile.home');

Route::prefix('admin')->group(function () {
    Route::get('/form-calon-pemilih', [App\Http\Controllers\AdminController::class, 'formulir'])
        ->name('admin.form-calon-pemilih');

    Route::get('/rekap-kecamatan/{id}', [App\Http\Controllers\AdminController::class, 'rekap_kecamatan'])
        ->name('admin.rekap-kecamatan');

    Route::get('/daftar-rekrutmen/{relawan_id}', [App\Http\Controllers\AdminController::class, 'daftar_rekrutmen'])
        ->name('admin.daftar-rekrutmen');
});

Route::prefix('caleg')->group(function () {
    Route::get('home', [App\Http\Controllers\CalegController::class, 'home'])->name('caleg.home');
    Route::get('chart', [App\Http\Controllers\CalegController::class, 'chart'])->name('caleg.chart');
    Route::get('relawan', [App\Http\Controllers\CalegController::class, 'relawan'])->name('caleg.relawan');
    Route::get('pemilih', [App\Http\Controllers\CalegController::class, 'pemilih'])->name('caleg.pemilih');
});

Route::prefix('relawan')->group(function () {
    Route::get('home', [App\Http\Controllers\RelawanController::class, 'home'])->name('relawan.home');
    Route::get('create', [App\Http\Controllers\RelawanController::class, 'create'])->name('relawan.create');
    Route::get('success', [App\Http\Controllers\RelawanController::class, 'success'])->name('relawan.success');
});

Route::prefix('saksi')->group(function () {
    Route::get('home', [App\Http\Controllers\SaksiController::class, 'home'])->name('saksi.home');
    Route::get('create', [App\Http\Controllers\SaksiController::class, 'create'])->name('saksi.create');
    Route::get('success', [App\Http\Controllers\SaksiController::class, 'success'])->name('saksi.success');
});
