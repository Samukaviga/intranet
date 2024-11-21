<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEscola extends Model
{
    use HasFactory;

    protected $table = 'tb_tipo_escola';
    protected $connection = 'mysql_third';
    protected $fillable = [
        'nome',
        'unidade',
        'endereco',
        'horario',
        'horario_sabado',
        'url_site',
    ];

    public function prospeccao()
{
    return $this->hasMany(Prospeccao::class, 'tipo_escola');
}
}
