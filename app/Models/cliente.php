<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'cpf',
        'sexo',
        'dataNascimento'
    ];
}
