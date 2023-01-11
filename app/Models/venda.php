<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VendaProduto;
use App\Models\Vendedor;
use App\Models\cliente;

class venda extends Model
{
    use HasFactory;

    protected $table = "vendas"; 
    
    protected $fillable = [
        'metodoPagamento',
        'valorTotal',
        'dataHora',
        'Vendedor_id',
        'cliente_id'
    ];

    protected $casts = [
        'dataHora' => 'datetime'
    ];

    public function produtosVenda()
    {
        return $this->hasMany(VendaProduto::class, 'venda_id', 'id');
    }

    public function Vendedor()
    {
        return $this->hasOne(Vendedor::class, 'id', 'Vendedor_id');
    }

    public function cliente()
    {
        return $this->hasOne(cliente::class, 'id', 'cliente_id');
    }
}
