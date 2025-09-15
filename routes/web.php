<?php

use Illuminate\Support\Facades\Route;

Route::get('/solicitar-documento', function () {
    return view('solicitar-documento');
});

Route::get('/docs/{any?}', function () {
    return redirect('/docs/html/index.html');
})->where('any', '.*');
