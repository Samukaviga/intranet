<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $table = 'matricula';

    protected $connection = 'mysql_third';

    protected $fillable = [
        'status',
        'tipo_escola',
        'idAluno',
        'nome_responsavel',
        'parentesco',
        'cpf_responsavel',
        'rg_responsavel',
        'data_nascimento_responsavel',
        'endereco_responsavel',
        'bairro_responsavel',
        'cep_responsavel',
        'cidade_responsavel',
        'complemento_responsavel',
        'telefone_responsavel',
        'email_responsavel',
        'nome_aluno',
        'cpf_aluno',
        'rg_aluno',
        'data_nascimento_aluno',
        'email_aluno',
        'telefone_aluno',
        'id_turma',
        'turma_aluno',
        'data_envio',
        'inicio_aluno',
        'professor_aluno',
        'horario_aluno',
        'is_pago',
        'is_bolsa',
        'motivo_cancelamento',
    ];

    public function prospeccao()
    {
        return $this->hasOne(Prospeccao::class, 'id_aluno', 'idAluno');
    }
}
