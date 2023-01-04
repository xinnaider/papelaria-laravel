<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateProdutoFormRequest;
use App\Models\produto;

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
        $produtos = produto::where('verificacao','=','true')->get();

        return view('produto.index', compact('produtos'));
    }

    public function create()
    {
        return view('produto.create');
    }

    public function show($id)
    {
        $produto = $this->validarProduto($id);
        return view('produto.show', compact('produto'));
    }

     public function store(StoreUpdateProdutoFormRequest $request)
    {
        produto::create($request->all());
        $request->session()->flash('msgInsert', 'Produto registrado com sucesso.');

        return redirect()->route('produto.index');
    }

    public function edit($id){
        $produto = $this->validarProduto($id);
        return view('produto.edit', compact('produto'));
    }

    public function update(Request $request, $id){
        $produto = $this->validarProduto($id);
        $produto->update($request->all());
        $request->session()->flash('msgEdit', 'Produto editado com sucesso.');

        return redirect()->route('produto.index');
    }

    public function delete(Request $request, $id)
    {
        $produto = $this->validarProduto($id);

        $produto->update(['verificacao' => 'false']);
        $request->session()->flash('msgDelete', 'Produto excluido com sucesso');

        return redirect()->route('produto.index');
    }

    public function validarProduto($id){
        if (!$produto = produto::find($id)){
            return redirect()->route('produto.index');
        }

        return $produto;
    }
}
