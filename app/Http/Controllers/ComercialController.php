<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComercialController extends Controller
{

     public function comercial()
     {
         return view('comercial.index');
     }
 
     public function comercialDetalhes()
     {
         return view('comercial.detalhes');
     }
 
     public function comercialEditar()
     {
         return view('comercial.editar');
     }
 
     public function comercialNovo()
     {
         return view('comercial.novo');
     }
}
