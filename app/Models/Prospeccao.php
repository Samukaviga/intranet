<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospeccao extends Model
{
    use HasFactory;

    protected $table = 'tb_prospeccao';
    protected $connection = 'mysql_third';
    protected $fillable = [
        'id_feedback',
        'agendado',
        'presenca',
        'data_presenca',
        'matricula',
        'convite',
        'agendou_direto',
        'data_envio',
        'hora_envio',
        'enviado',
        'curso_enviado',
        'timestamp',
        'enviado_api',
        'entregue',
        'lido',
        'respondido',
        'erro_envio',
        'exportado',
        'status',
        'id_aluno',
        'nome',
        'celular',
        'telefone',
        'email',
        'data_nascimento',
        'cpf',
        'rg',
        'idade',
        'ex_aluno',
        'ex_bolsista',
        'proximidade',
        'tipo_escola',
        'id_curso_1',
        'course_1',
        'course_2',
        'course_3',
        'curso_alternativo',
        'cep',
        'cidade',
        'uf',
        'bairro',
        'responsavel',
        'unidade',
        'rua',
        'numero',
        'compl',
        'cpf_responsavel',
        'rg_responsavel',
        'email_responsavel',
        'telefone_responsavel',
        'data_nascimento_responsavel',
        'parentesco',
        'data_origem',
        'importacao',
        'nome_aluno_antigo',
    ];

    protected $dates = [
        'data_presenca',
        'data_envio',
        'data_nascimento',
        'data_nascimento_responsavel',
        'data_origem',
    ];

    protected $casts = [
        'agendado' => 'boolean',
        'presenca' => 'boolean',
        'enviado' => 'boolean',
        'entregue' => 'boolean',
        'lido' => 'boolean',
        'respondido' => 'boolean',
        'erro_envio' => 'boolean',
        'exportado' => 'boolean',
    ];

    public function tipoEscola()
    {
        return $this->belongsTo(TipoEscola::class, 'tipo_escola');
    }

    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'id_aluno', 'idAluno');
    }
}
