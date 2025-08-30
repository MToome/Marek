<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/cv', function () {
    return view('cv');
});

Route::get('/calculator', function () {
    return view('calculator');
});

