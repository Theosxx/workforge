<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipsController;
use App\Http\Controllers\LowonganController;

Route::get('/lowongan/print', [LowonganController::class, 'print'])->name('lowongan.print');
Route::get('/lowongan', [LowonganController::class, 'index'])->name('lowongan.index');
Route::get('/lowongan/create', [LowonganController::class, 'create'])->name('lowongan.create');
Route::post('/lowongan', [LowonganController::class, 'store'])->name('lowongan.store');
Route::get('/lowongan/{lowongan}/edit', [LowonganController::class, 'edit'])->name('lowongan.edit');
Route::put('/lowongan/{lowongan}', [LowonganController::class, 'update'])->name('lowongan.update');
Route::delete('/lowongan/{lowongan}', [LowonganController::class, 'destroy'])->name('lowongan.destroy');

Route::get('/tips/print', [TipsController::class, 'print'])->name('tips.print');
Route::get('/tips', [TipsController::class, 'index'])->name('tips.index');
Route::get('/tips/create', [TipsController::class, 'create'])->name('tips.create');
Route::post('/tips', [TipsController::class, 'store'])->name('tips.store');
Route::get('/tips/{tip}/edit', [TipsController::class, 'edit'])->name('tips.edit');
Route::put('/tips/{tip}', [TipsController::class, 'update'])->name('tips.update');
Route::delete('/tips/{tip}', [TipsController::class, 'destroy'])->name('tips.destroy');
