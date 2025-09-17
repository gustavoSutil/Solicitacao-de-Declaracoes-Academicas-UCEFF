<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitarDocumentoController extends Controller
{
    public function index()
    {
        return view('documentos');
    }
}
