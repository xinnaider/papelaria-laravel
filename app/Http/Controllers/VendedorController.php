<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateVendedorClienteFormRequest;
use App\Models\Vendedor;

class VendedorController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        $Vendedores = Vendedor::where('verificacao','=','true')->get();

        return view('vendedor.index', compact('Vendedores'));
    }

    public function create()
    {
        return view('vendedor.create');
    }

    public function show(Vendedor $Vendedor)
    {
        return view('vendedor.show', compact('Vendedor'));
    }

     public function store(StoreUpdateVendedorClienteFormRequest $request)
    {
        Vendedor::create($request->all());
        $request->session()->flash('msgAlerta', 'Vendedor registrado com sucesso.');
        return redirect()->route('vendedor.index');
    }

    public function edit(Vendedor $Vendedor){
        return view('vendedor.edit', compact('Vendedor'));
    }

    public function update(Request $request, Vendedor $Vendedor){
        $Vendedor->update($request->all());
        $request->session()->flash('msgAlerta', 'Vendedor editado com sucesso.');

        return redirect()->route('vendedor.index');
    }

    public function delete(Request $request, Vendedor $Vendedor)
    {
        $Vendedor->update(['verificacao' => 'false']);
        $request->session()->flash('msgAlerta', 'Vendedor excluido com sucesso.');

        return redirect()->route('vendedor.index');
    }
}
