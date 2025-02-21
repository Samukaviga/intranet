<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';

    protected $fillable = ['nome'];

    function users() {
        
        $this->BelongsTo(User::class, 'id_departamento');

    }
}
