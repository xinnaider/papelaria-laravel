<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateClienteFormRequest;
use App\Models\cliente;
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
        $clientes = cliente::all();

        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function show($id)
    {
        $cliente = $this->validarCliente($id);
        return view('cliente.show', compact('cliente'));
    }

     public function store(StoreUpdateClienteFormRequest $request)
    {
        cliente::create($request->all());

        return redirect()->route('cliente.index');
    }

    public function edit($id){
        $cliente = $this->validarCliente($id);
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id){
        $cliente = $this->validarCliente($id);
        $cliente->update($request->all());

        return redirect()->route('cliente.index');
    }

    public function delete($id)
    {
        $cliente = $this->validarCliente($id);

        $cliente->delete();

        return redirect()->route('cliente.index');
    }

    public function validarCliente($id){
        if (!$cliente = cliente::find($id)){
            return redirect()->route('cliente.index');
        }

        return $cliente;
    }
}
