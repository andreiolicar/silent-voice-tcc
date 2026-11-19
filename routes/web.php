<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectRecordController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectRecordController::class, 'home'])->name('home');
Route::get('/acervo/{record}', [ProjectRecordController::class, 'show'])->whereNumber('record')->name('records.show');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProjectRecordController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('can:manage-records')->controller(ProjectRecordController::class)
        ->prefix('painel/registros')->name('records.')->group(function () {
            Route::get('/novo', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{record}/editar', 'edit')->whereNumber('record')->name('edit');
            Route::patch('/{record}', 'update')->whereNumber('record')->name('update');
            Route::delete('/{record}', 'destroy')->whereNumber('record')->name('destroy');
        });
});

require __DIR__.'/auth.php';

Route::fallback(fn () => response()->view('errors.404', [], 404));
