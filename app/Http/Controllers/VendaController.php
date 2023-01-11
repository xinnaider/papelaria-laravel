<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\Vendedor;
use App\Models\VendaProduto;
use App\Models\Venda;
use App\Models\Movimentacao;
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
        $Vendedores = Vendedor::where('verificacao','=','true')->get();
        return view('venda.create', compact('produtos','clientes','Vendedores'));
    }

    public function store(Request $request)
    {
        for ($i=0; $i < count($request->produto); $i++){
            $produtoSelecionado = DB::table('produtos')->where('nome', '=', $request->produto[$i])->get();
            if($produtoSelecionado[0]->estoque < $request->quantidade[$i]){
                abort(404);
            }
        }
        
        $this->venda = new venda();
        $this->venda->metodoPagamento = $request->metodoPagamento;
        $this->venda->valorTotal = $request->valorTotal;
        $this->venda->dataHora = new \DateTime();
        $this->venda->Vendedor_id = $request->Vendedor;
        $this->venda->cliente_id = $request->cliente;
        $this->venda->save();

        for ($i=0; $i < count($request->produto); $i++) { 
            $produtoSelecionado = Produto::where('nome', '=', $request->produto[$i])->get();
            VendaProduto::insert([
                'quantidade' => $request->quantidade[$i],
                'venda_id' =>   $this->venda->id,
                'produto_id' => $produtoSelecionado[0]->id,
                'updated_at' => new \DateTime(),
                'created_at' => new \DateTime()
            ]);

            Movimentacao::create([
                'quantidade' => $request->quantidade[$i],
                'tipo' =>       'Venda',
                'produto_id' => $produtoSelecionado[0]->id,
                'venda_id' =>   $this->venda->id
            ]);
    

            DB::table('produtos')->where('id', $produtoSelecionado[0]->id)->decrement('estoque',$request->quantidade[$i]);
        };

        $request->session()->flash('msgInsert', 'Venda inserida com sucesso');

        return redirect()->route('venda.index');
    }
}
