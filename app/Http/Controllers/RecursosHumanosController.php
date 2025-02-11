<?php

namespace App\Http\Controllers;

use App\Models\Rh_Conteudo;
use Illuminate\Http\Request;
use Storage;

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

    public function recursosHumanosNovoPost(Request $request)
    {

        $validated = $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);



        $coverPathImage = $request->hasFile('imagem') ? $request->file('imagem')->store('assets/recursos-humanos/imagens', 'public') : $coverPathImage = null; //armazena em um lugar permanente. O Laravel cria uma pasta com o nome '/recursos-humanos/imagens' e retorna o caminho salvo e salva em public (config/filesystems) 
        $coverPathArquivo = $request->hasFile('arquivo') ? $request->file('imagem')->store('assets/recursos-humanos/arquivos', 'public') : $coverPathArquivo = null; //armazena em um lugar permanente. O Laravel cria uma pasta com o nome '/recursos-humanos/arquivos' e retorna o caminho salvo e salva em public (config/filesystems) 


        Rh_Conteudo::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'imagem' => $coverPathImage,
            'arquivo' => $coverPathArquivo,
        ]);

        return to_route('recursos-humanos.index')->with('Counteudo do Recursos Humanos adicionado com sucesso!');
    

    }

}
