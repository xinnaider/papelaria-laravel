<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venda extends Model
{
    use HasFactory;

    protected $table = "vendas"; 
    
    protected $fillable = [
        'dataHora',
        'funcionario_id',
        'cliente_id'
    ];
}
