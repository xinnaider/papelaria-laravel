<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Venda;
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
        $vendas = Venda::all();

        return view('venda.index', compact('vendas'));
    }

    public function create()
    {
        $produtos = Produto::where('verificacao','=','true')->get();
        $clientes = Cliente::where('verificacao','=','true')->get();
        $funcionarios = Funcionario::where('verificacao','=','true')->get();
        return view('venda.create', compact('produtos','clientes','funcionarios'));
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
                'venda_id' =>   $this->venda->id,
                'produto_id' => $produtoSelecionado[0]->id,
                'updated_at' => new \DateTime(),
                'created_at' => new \DateTime()
            ]);
            DB::table('produtos')->where('id', $produtoSelecionado[0]->id)->decrement('estoque',$request->quantidade[$i]);
        };

        $request->session()->flash('msgInsert', 'Venda inserida com sucesso');

        return redirect()->route('venda.index');
    }
}
