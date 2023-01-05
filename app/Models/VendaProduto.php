<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\produto;

class VendaProduto extends Model
{
    use HasFactory;

    protected $table = "venda_produto"; 
    
    protected $fillable = [
        'quantidade',
        'venda_id',
        'produto_id'
    ];

    public function produto(){
        return $this->hasOne(produto::class, 'id',  'produto_id');
    }
}
