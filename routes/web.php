<?php

use App\Http\Controllers\SolicitarDocumentoController;
use Illuminate\Support\Facades\Route;

Route::get('/solicitar-documento', [SolicitarDocumentoController::class, 'index']);

Route::get('/docs/{any?}', function () {
    return redirect('/docs/html/index.html');
})->where('any', '.*');

Route::redirect('/', '/solicitar-documento');