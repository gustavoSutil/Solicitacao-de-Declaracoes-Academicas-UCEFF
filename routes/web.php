<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/docs/{any?}', function () {
    return redirect('/docs/html/index.html');
})->where('any', '.*');
