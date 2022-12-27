<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produto;
use App\Models\cliente;
use App\Models\funcionario;
use App\Models\venda;
use DB;

class VendaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function __construct(venda $venda)
    {
        $this->venda = $venda;
    }

    public function index()
    {
        $vendas = venda::all();

        dd($vendas->produto);

        return view('venda.index', compact('vendas'));
    }

    public function create()
    {
        $produto = produto::all();
        $cliente = cliente::all();
        $funcionario = funcionario::all();
        return view('venda.create', compact('produto','cliente','funcionario'));
    }

    public function store(Request $request)
    {
        $this->venda = new venda();
        $this->venda->dataHora = new \DateTime();
        $this->venda->funcionario_id = $request->funcionario;
        $this->venda->cliente_id = $request->cliente;
        $this->venda->save();

        for ($i=0; $i < count($request->produto); $i++) { 
            $produtoSelecionado = DB::table('produtos')->where('nome', '=', $request->produto[$i])->get();
            DB::table('venda_produto')->insert([
                'quantidade' => $request->quantidade[$i],
                'venda_id' => $this->venda->id,
                'produto_id' => $produtoSelecionado[0]->id,
                'updated_at' => new \DateTime(),
                'created_at' => new \DateTime()
            ]);
            DB::table('produtos')->where('id', $produtoSelecionado[0]->id)->decrement('estoque',$request->quantidade[$i]);
        };

        return redirect()->route('inicial.index');
    }
}
