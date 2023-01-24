<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;
    protected $table = "clientes"; 
    
    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'cpf',
        'sexo',
        'dataNascimento',
        'verificacao'
    ];

    protected $casts = [
        'dataNascimento' => 'datetime'
    ];
}
