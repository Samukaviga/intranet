<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {


    if (Auth::check()) {

        return redirect()->route('principal');
    }

    return view('auth.login');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->group(function () {

    //Principal
    Route::get('/principal', [PrincipalController::class, 'index'])->middleware(['auth', 'verified'])->name('principal');
    Route::get('/alterarSenha', [PrincipalController::class, 'alterarSenha']);
    Route::post('/alterarSenha', [PrincipalController::class, 'alterarSenhaPost']);


    //UNIDADES
    Route::get('/liceuBrasil', [PrincipalController::class, 'liceuBrasil']);

    // EVENTO
    Route::get('/adicionarEvento', [PrincipalController::class, 'adicionarEvento'])->name('evento.adicionar');
    Route::get('/detalhesEvento', [PrincipalController::class, 'detalhesEvento'])->name('evento.detalhes');
    Route::get('/editarEvento/{id}', [PrincipalController::class, 'editarEvento'])->name('evento.editar');
    Route::post('/editarEvento', [PrincipalController::class, 'editarEventoPost'])->name('evento.editar.post');;
    Route::post('/adicionarEvento', [PrincipalController::class, 'adicionarEventoPost'])->name('evento.adicionar.post');;

    //REUNIAO
    Route::get('/adicionarReuniao', [PrincipalController::class, 'adicionarReuniao'])->name('reuniao.adicionar');
    Route::get('/detalhesReuniao', [PrincipalController::class, 'detalhesReuniao'])->name('reuniao.detalhes');
    Route::get('/editarReuniao/{id}', [PrincipalController::class, 'editarReuniao'])->name('reuniao.editar');
    Route::post('/editarReuniao', [PrincipalController::class, 'editarReuniaoPost'])->name('reuniao.editar.post');
    Route::post('/adicionarReuniao', [PrincipalController::class, 'adicionarReuniaoPost'])->name('reuniao.adicionar.post');

    // NOTICIA
    Route::get('/adicionarNoticia', [PrincipalController::class, 'adicionarNoticia'])->name('noticia.adicionar');
    Route::get('/detalhesNoticia', [PrincipalController::class, 'detalhesNoticia'])->name('noticia.detalhes');
    Route::get('/editarNoticia/{id}', [PrincipalController::class, 'editarNoticia'])->name('noticia.editar');
    Route::post('/adicionarNoticia', [PrincipalController::class, 'adicionarNoticiaPost'])->name('noticia.adicionar.post');
    Route::post('/editarNoticia', [PrincipalController::class, 'editarNoticiaPost'])->name('noticia.editar.post');

    Route::get('/perfil', [PrincipalController::class, 'perfil']);
    Route::post('/perfil/foto', [PrincipalController::class, 'perfilFoto']);


    //BLOG
    Route::get('/blog', [PrincipalController::class, 'blog']);
    Route::get('/blog/detalhes/{id}', [PrincipalController::class, 'blogDetalhes']);
    Route::get('/blog/editar/{id}', [PrincipalController::class, 'blogEditar']);
    Route::get('/blog/novo', [PrincipalController::class, 'blogNovo']);
    Route::post('/blog/editar', [PrincipalController::class, 'editarBlogPost']);

    Route::delete('/blog/deletar/{id}', [PrincipalController::class, 'blogDeletar']);

    Route::post('/blog/novo', [PrincipalController::class, 'blogNovoPost']);

    //RECURSOS HUMANOS
    Route::get('/recursos-humanos', [PrincipalController::class, 'recursosHumanos']);
    Route::get('/recursos-humanos/novo', [PrincipalController::class, 'recursosHumanosNovo']);
    Route::get('/recursos-humanos/editar', [PrincipalController::class, 'recursosHumanosEditar']);
    Route::get('/recursos-humanos/detalhes', [PrincipalController::class, 'recursosHumanosDetalhes']);
    Route::get('/recursos-humanos/detalhes', [PrincipalController::class, 'recursosHumanosDetalhes']);

    Route::get('/comercial', [PrincipalController::class, 'comercial']);
    Route::get('/comercial/novo', [PrincipalController::class, 'comercialNovo']);
    Route::get('/comercial/editar', [PrincipalController::class, 'comercialEditar']);
    Route::get('/comercial/detalhes', [PrincipalController::class, 'comercialDetalhes']);
    Route::get('/comercial/detalhes', [PrincipalController::class, 'comercialDetalhes']);
});


require __DIR__ . '/auth.php';
