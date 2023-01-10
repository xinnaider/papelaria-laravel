<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProdutoFormRequest;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::where('verificacao','=','true')->get();

        return view('produto.index', compact('produtos'));
    }

    public function create()
    {
        return view('produto.create');
    }

    public function show(Produto $produto)
    {
        return view('produto.show', compact('produto'));
    }

     public function store(StoreUpdateProdutoFormRequest $request)
    {
        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->marca = $request->marca;
        $produto->estoque = $request->estoque;
        $produto->preco = str_replace(',', '.', str_replace('.', '', $request->preco));
        $produto->verificacao = $request->verificacao;
        $produto->save();
        
        $request->session()->flash('msgInsert', 'Produto registrado com sucesso.');

        return redirect()->route('produto.index');
    }

    public function edit(Produto $produto){
        return view('produto.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto){
        $produto->update($request->all());
        $request->session()->flash('msgEdit', 'Produto editado com sucesso.');

        return redirect()->route('produto.index');
    }

    public function delete(Request $request, Produto $produto)
    {
        $produto->update(['verificacao' => 'false']);
        $request->session()->flash('msgDelete', 'Produto excluido com sucesso');

        return redirect()->route('produto.index');
    }

}
