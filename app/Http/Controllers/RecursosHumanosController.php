<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecursosHumanosController extends Controller
{
   
    public function recursosHumanos()
    {
        return view('recursos-humanos.index');
    }

    public function recursosHumanosDetalhes()
    {
        return view('recursos-humanos.detalhes');
    }

    public function recursosHumanosEditar()
    {
        return view('recursos-humanos.editar');
    }

    public function recursosHumanosNovo()
    {
        return view('recursos-humanos.novo');
    }

}
