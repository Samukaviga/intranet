<?php

namespace App\Http\Controllers;

use App\Models\Exercicio;
use App\Models\Reuniao;
use App\Models\Evento;
use App\Models\Noticia;
use App\Models\Subscribers;
use App\Models\Treino;
use App\Models\User;
use App\Repositories\PrincipalRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Storage;
use \Illuminate\Support\Facades\Http;

class PrincipalController extends Controller
{

    public function __construct(private PrincipalRepository $repository)
    {
    }

    public function index()
    {
        
        Carbon::setLocale('pt_BR');

        $reunioes = Reuniao::all();

        $eventos = Evento::all();

        $noticias = Noticia::all();

        $usuarios = User::all();

       
        foreach($noticias as $noticia ){

            $result = $this->repository->criacaoDaNoticia($noticia);

            $noticia->result = $result;
        }
 

        $mensagemSucesso = session('mensagem.sucesso');

        return view('principal.index')->with('mensagemSucesso', $mensagemSucesso)
            ->with('reunioes', $reunioes)
            ->with('noticias', $noticias)
            ->with('eventos', $eventos)
            ->with('usuarios', $usuarios);
    }

    public function perfil()
    {
        $user = Auth::user();

        return view('principal.perfil')->with('user', $user);
    }

    public function perfilFoto(Request $request)
    {

        $validated = $request->validate([
            'imagem' => 'required',
        ]);

        $user = User::find(Auth::user()->id);


        if ($user->imagem) {

            Storage::disk('public')->delete($user->imagem); //excluindo imagem local, asyc

        }

        $coverPath = $request->hasFile('imagem') ? $request->file('imagem')->store('assets/perfil', 'public') : $coverPath = null; //armazena em um lugar permanente. O Laravel cria uma pasta com o nome 'series_cover' e retorna o caminho salvo e salva em public (config/filesystems)

        $request->coverPath = $coverPath;

        $user->imagem = $request->coverPath;
        $user->save();

        return back()->with('mensagemSucesso', "Foto de perfil atualizada com sucesso!");
    }

    public function alterarSenha()
    {
        return view('principal.alterarSenha');
    }

    public function alterarSenhaPost(Request $request)
    {

           // Validação dos campos
           $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:4',
            'confirm_new_password' => 'required|min:4',
        ]);


        $user = Auth::user();

        if($request->new_password != $request->confirm_new_password){
            return back()->withErrors(['senha_atual' => 'Senha nova diferente da confirmação']);
        }

        // Verifica se a senha atual está correta
        if (!Hash::check($request->old_password, $user->password)) {

            return back()->withErrors(['senha_atual' => 'A senha atual está incorreta.']);
        }

        // Atualiza a senha do usuário
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return back()->with('mensagemSucesso', 'Senha alterada com sucesso!');
    }

    //UNIDADES

    public function liceuBrasil()
    {
        $mensagemSucesso = session('mensagem.sucesso');

        $totalLiceuBrasil = Subscribers::whereIn('course_1', [
            'Desenho', 'gestao empresarial', 'Desenho Kids', 'recepcionista', 
            'CFTV', 'Telemarketing', 'Recursos Humanos', 'Aux. Administrativo', 
            'Recepção e Atendimento', 'Logistica', 'Jovem Aprendiz', 'eletrica', 
            'empreendedorismo', 'espanhol', 'informatica kids', 'informatica melhor idade', 
            'ingles', 'ingles kids', 'jovem aprendiz', 'libras', 'libras kids', 
            'administracao pequenas empresas', 'pequenas empresas'
        ])
        ->where(function ($query) {
            $query->where('city', 'itaquaquecetuba')
                ->orWhere('unit_id', 1);
        })
        ->count();

        return view('unidades.liceuBrasil')->with('mensagemSucesso', $mensagemSucesso)
                                                    ->with('totalLiceuBrasil', $totalLiceuBrasil);
    }

   

  
}
