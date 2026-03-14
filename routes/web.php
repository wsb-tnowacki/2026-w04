<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('start');
Route::get('/kontakt', function () {
    return view('kontakt');
})->name('kontakt');
Route::get('/o-nas', function () {
    $zadania = [
        'Zadanie 1',
        'Zadanie 2',
        'Zadanie 3',
    ];
    //return view('onas', [ 'zadania' => $zadania]);
    //return view('onas')->with('zadania',$zadania);
    return view('onas', compact('zadania'));
})->name('onas');