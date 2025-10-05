<?php

use App\Http\Controllers\CsvParseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::middleware('throttle:10,1')->group(function() {
    Route::get('/data', [DataController::class, 'index']);
});

Route::get('/', function () {
    return view('index');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/calculator', function () {
    return view('calculator');
});

Route::get('/weather', function () {
    return view('weather');
});

Route::get('/csv_read', function () {
    return view('csv_read');
});
Route::post('/csv_read', function () {
    dd(request()->all());
});

Route::get('/parse-csv', [CsvParseController::class, 'parseCsv'])->name('parse.csv');
Route::get('/csv_read', [CsvParseController::class, 'showTableView'])->name('csv.view');