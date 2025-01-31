<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Treino;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

  
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo',
        'imagem',
    ];

    protected $attributes = [
        'tipo' => 0, 
    ];

    public function blog()
    {
        return $this->hasMany(Blog::class, 'id_user');
    }

    public function detalhes()
    {
        return $this->hasOne(Detalhe::class, 'id_user');
    }

    public function habilidades()
    {
        return $this->belongsToMany(Habilidade::class, 'detalhes', 'id_user', 'id_habilidade')
            ->withPivot('descricao') 
            ->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'detalhes', 'id_habilidade', 'id_user')
            ->withPivot('descricao') // Inclui a descrição no relacionamento
            ->withTimestamps();
    }

    

    protected $hidden = [
        'password',
        'remember_token',
    ];

 
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'nascimento' => 'date',
        ];
    }
}
