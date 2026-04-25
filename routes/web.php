<?php

use App\Http\Controllers\OgolneController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::get('/',[OgolneController::class, 'start'])->name('start');


Route::controller(OgolneController::class)->group(function () {
    Route::get('/','start')->name('ogolne.start');
    Route::get('/kontakt','kontakt')->name('ogolne.kontakt');
    Route::get('/o-nas','onas')->name('ogolne.onas');
});

Route::get('/dashboard', function () {
    //return view('dashboard');
    return redirect(route('ogolne.start'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('post',PostController::class);
