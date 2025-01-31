<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidade extends Model
{
    use HasFactory;

    protected $table = 'habilidades';

    protected $fillable = ['nome', 'nivel'];

    public function detalhes()
    {
        return $this->belongsTo(Detalhe::class, 'id_habilidade');
    }

}
