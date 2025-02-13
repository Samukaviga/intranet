<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    use HasFactory;

    protected $table = 'reuniao';

    protected $fillable = [
        'nome',
        'data',
        'horario',
    ];
}
