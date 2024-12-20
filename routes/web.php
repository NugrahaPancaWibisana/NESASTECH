<?php

use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::get('/', [KeuanganController::class, 'index'])->name('keuangan.index');
Route::get('laporan-keuangan', [KeuanganController::class, 'laporanKeuangan'])->name('keuangan.create');
Route::post('laporan-keuangan', [KeuanganController::class, 'store'])->name('keuangan.store');

// Edit and Update routes
Route::get('keuangan/edit/{keuangan}', [KeuanganController::class, 'edit'])->name('keuangan.edit');
Route::put('/keuangan/update/{keuangan}', [KeuanganController::class, 'update'])->name('keuangan.update');

// Delete route
Route::delete('keuangan/delete/{keuangan}', [KeuanganController::class, 'destroy'])->name('keuangan.delete');

// Print route
Route::get('keuangan/download/pdf', [PDFController::class, 'generatePDF'])->name('keuangan.download');
