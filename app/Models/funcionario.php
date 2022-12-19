<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funcionario extends Model
{
    use HasFactory;

    protected $table = "funcionarios"; 
    
    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'cpf',
        'sexo',
        'dataNascimento'
    ];
}
