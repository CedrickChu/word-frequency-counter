<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/process', function () {
    return view('process');
});

Route::post('/process', 'App\Http\Controllers\FormController@processForm');




