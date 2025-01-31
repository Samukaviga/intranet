<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalhe extends Model
{
    use HasFactory;

    protected $table = 'detalhes';
    protected $fillable = ['id_user', 'id_habilidade', 'descricao'];


    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function habilidades()
    {
        return $this->hasMany(Habilidade::class, 'id_habilidade');
    }

}
