<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\venda_produto;
use App\Models\funcionario;
use App\Models\cliente;

class venda extends Model
{
    use HasFactory;

    protected $table = "vendas"; 
    
    protected $fillable = [
        'dataHora',
        'funcionario_id',
        'cliente_id'
    ];

    public function produtosVenda()
    {
        return $this->hasMany(venda_produto::class, 'venda_id', 'id');
    }

    public function funcionario()
    {
        return $this->hasOne(funcionario::class, 'id', 'funcionario_id');
    }

    public function cliente()
    {
        return $this->hasOne(cliente::class, 'id', 'cliente_id');
    }
}
