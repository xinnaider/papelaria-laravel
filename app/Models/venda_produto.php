<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venda_produto extends Model
{
    use HasFactory;

    protected $table = "venda_produto"; 
    
    protected $fillable = [
        'quantidade',
        'venda_id',
        'produto_id'
    ];

    public function produto()
    {
        return $this->hasMany(produto::class, 'produto_id');
    }

}
