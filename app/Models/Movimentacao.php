<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movimentacao;
use App\Models\Venda;

class Movimentacao extends Model
{
    use HasFactory;

    protected $table = "movimentacoes"; 
    
    protected $fillable = [
        'quantidade',
        'tipo',
        'produto_id',
        'venda_id'
    ];

    public function Produto()
    {
        return $this->hasOne(Produto::class, 'id', 'produto_id');
    }

    public function Venda()
    {
        return $this->hasOne(Venda::class, 'id', 'venda_id');
    }
}
