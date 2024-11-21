<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    use HasFactory;

    protected $table = 'subscribers';

    protected $connection = 'mysql_second';

    protected $fillable = [
        'importado',
        'id_prospeccao',
        'duplicado',
        'uuid',
        'type',
        'name',
        'cpf',
        'birth',
        'responsible',
        'mobile',
        'phone',
        'zipcode',
        'address',
        'address2',
        'address_number',
        'district',
        'city',
        'state',
        'unit_id',
        'email',
        'email_verified_at',
        'password',
        'is_lat',
        'is_student',
        'is_check',
        'is_mobile',
        'is_phone',
        'is_cpfCnpj',
        'is_address',
        'is_birth',
        'is_email',
        'is_zipcode',
        'is_whatsapp',
        'age',
        'lat',
        'lng',
        'first_name',
        'course_1',
        'course_2',
        'course_3',
        'gender',
        'source',
    ];

    protected $dates = [
        'birth',
        'email_verified_at',
        'created_at',
        'updated_at',
        'data',
        'criado',
        'atualizado',
    ];

    protected $casts = [
        'is_lat' => 'boolean',
        'is_student' => 'boolean',
        'is_check' => 'boolean',
        'is_mobile' => 'boolean',
        'is_phone' => 'boolean',
        'is_cpfCnpj' => 'boolean',
        'is_address' => 'boolean',
        'is_birth' => 'boolean',
        'is_email' => 'boolean',
        'is_zipcode' => 'boolean',
        'is_whatsapp' => 'boolean',
        'is_call' => 'boolean',
        'is_duplicate' => 'boolean',
        'us_duplicate' => 'boolean',
    ];
}
