<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Reuniao;
use App\Models\Evento;
use App\Models\Noticia;
use App\Models\Subscribers;
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

    public function __construct(private PrincipalRepository $repository) {}

    public function index()
    {

        Carbon::setLocale('pt_BR');

        $reunioes = Reuniao::all();

        $eventos = Evento::all();

        $noticias = Noticia::all();

        $usuarios = User::all();


        foreach ($noticias as $noticia) {

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

    public function perfilEditarPost(Request $request)
    {
        dd($request);
    }

    public function perfilEditar(Request $request)
    {
        return view('principal.editar-perfil', ['usuario' => User::find($request->id), 'departamentos' => Departamento::all()]);
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

        if ($request->new_password != $request->confirm_new_password) {
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
            'Desenho',
            'gestao empresarial',
            'Desenho Kids',
            'recepcionista',
            'CFTV',
            'Telemarketing',
            'Recursos Humanos',
            'Aux. Administrativo',
            'Recepção e Atendimento',
            'Logistica',
            'Jovem Aprendiz',
            'eletrica',
            'empreendedorismo',
            'espanhol',
            'informatica kids',
            'informatica melhor idade',
            'ingles',
            'ingles kids',
            'jovem aprendiz',
            'libras',
            'libras kids',
            'administracao pequenas empresas',
            'pequenas empresas'
        ])
            ->where(function ($query) {
                $query->where('city', 'itaquaquecetuba')
                    ->orWhere('unit_id', 1);
            })
            ->count();

        return view('unidades.liceuBrasil')->with('mensagemSucesso', $mensagemSucesso)
            ->with('totalLiceuBrasil', $totalLiceuBrasil);
    }

    public function matriculas()
    {
        // Faz a requisição
        $ch = curl_init('https://liceubrasil.eadplataforma.app/api/1/enrollment');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('x-auth-token: bbc66aebbab400563920959cf7c1e678'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $return = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        // Verifica se há erro na requisição
        if ($error) {
            dd(['error' => $error]);
        }

        // Decodifica JSON para array associativo
        $data = json_decode($return, true);

        // Exibe os dados para debug
        dd($data);
    }

    public function vendas()
    {

        //https://endereco-do-ead.com/api/1/sales
        //https://liceubrasil.eadplataforma.app/api/1/enrollment
        //73385

        // Faz a requisição
        $ch = curl_init('https://liceubrasil.eadplataforma.app/api/1/sales');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('x-auth-token: bbc66aebbab400563920959cf7c1e678'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $return = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        // Verifica se há erro na requisição
        if ($error) {
            dd(['error' => $error]);
        }

        // Decodifica JSON para array associativo
        $data = json_decode($return, true);

        // Exibe os dados para debug
        dd($data);
    }


    public function getAlunos()
    {
        $url = "https://api.sponteeducacional.net.br/WSAPIEdu.asmx/GetAlunos3";

        $response = Http::get($url, [
            'nCodigoCliente' => '73396',
            'sToken' => 'qJCjflVzZo62',
            'sParametrosBusca' => 'Nome=', // Buscar todos os alunos
   
        ]);

        if ($response->failed()) {
            return response()->json([
                'error' => 'Erro ao buscar alunos',
                'status' => $response->status(), // Código HTTP
                'body' => $response->body() // Resposta completa
            ], 500);
        }

        // Converter XML para JSON
        $xml = simplexml_load_string($response->body());
        $json = json_encode($xml);
        $data = json_decode($json, true);


        dd($data['wsAluno'][0]);
        //return response()->json($data);
    }
}
