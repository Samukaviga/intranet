<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rh_Conteudo extends Model
{
    use HasFactory;

    protected $table = "rh_conteudo";
    protected $fillable = ['titulo', 'descricao', 'imagem', 'arquivo'];


}
