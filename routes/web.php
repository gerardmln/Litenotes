<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrashedNoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/notes', NoteController::class)->middleware(['auth']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/trash', [TrashedNoteController::class, 'index'])->middleware(['auth'])->name('trashed.index');

Route::get('/trash/{note:uuid}', [TrashedNoteController::class, 'show'])->withTrashed()
->middleware(['auth'])->name('trashed.show');

Route::patch('/trash/{note:uuid}/restore', [TrashedNoteController::class, 'restore'])->withTrashed()
->middleware(['auth'])->name('trashed.restore');

Route::delete('/trash/{note:uuid}', [TrashedNoteController::class, 'destroy'])->withTrashed()
->middleware(['auth'])->name('trashed.destroy');

require __DIR__.'/auth.php';
