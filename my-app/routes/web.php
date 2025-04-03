<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//CSVエクスポートの設定
Route::get('/export-expenses', [ExportController::class, 'exportExpenses'])->name('export.expenses');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//ファイルアップロードの追加設定
Route::post('/upload-receipt', [ReceiptController::class, 'upload'])->name('upload.receipt');

require __DIR__.'/auth.php';
