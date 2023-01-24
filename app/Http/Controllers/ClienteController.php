<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateVendedorClienteFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $clientes = Cliente::where('verificacao','=','true')->get();

        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.create');
    }

     public function store(StoreUpdateVendedorClienteFormRequest $request)
    {
        Cliente::create($request->all());
        $request->session()->flash('msgAlerta', 'Cliente registrado com sucesso.');

        return redirect()->route('cliente.index');
    }

    public function edit(Cliente $cliente){
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente){
        $cliente->update($request->all());
        $request->session()->flash('msgAlerta', 'Cliente editado com sucesso.');

        return redirect()->route('cliente.index');
    }

    public function delete(Request $request, Cliente $cliente)
    {
        $cliente->update(['verificacao' => 'false']);
        $request->session()->flash('msgAlerta', 'Cliente excluido com sucesso.');
        
        return redirect()->route('cliente.index');
    }
}
