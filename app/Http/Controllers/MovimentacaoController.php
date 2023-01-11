<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Movimentacao;
use App\Models\Venda;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    public function index()
    {
        $movimentacoes = Movimentacao::all();
        return view('movimentacao.index', compact('movimentacoes'));
    }

    public function create()
    {
        $produtos = Produto::where('verificacao','=','true')->get();
        return view('movimentacao.create', compact('produtos'));
    }

    public function store(Request $request)
    {
        if($request->tipo === "1"){

            Produto::where('id', $request->produto)->increment('estoque',$request->qtd);
  
            Movimentacao::create([
                'quantidade' => $request->qtd,
                'tipo' => 'Entrada',
                'produto_id' => $request->produto
            ]);
        } else {
            Produto::where('id', $request->produto)->decrement('estoque',$request->qtd);
  
            Movimentacao::create([
                'quantidade' => $request->qtd,
                'tipo' => 'Retirada',
                'produto_id' => $request->produto
            ]);
        }

        $request->session()->flash('msgInsert', 'Movimentação gerada com sucesso');

        return redirect()->route('movimentacao.index');
    }


}
