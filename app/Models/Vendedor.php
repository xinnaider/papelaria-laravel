<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = "Vendedores"; 
    
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
