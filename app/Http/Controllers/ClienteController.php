<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateFuncionarioClienteFormRequest;
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
        $clientes = Cliente::where('verificacao','=','true')->get();

        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function show($id)
    {
        $clientes = $this->validarCliente($id);

        return view('cliente.show', compact('clientes'));
    }

     public function store(StoreUpdateFuncionarioClienteFormRequest $request)
    {
        Cliente::create($request->all());
        $request->session()->flash('msgInsert', 'Cliente registrado com sucesso.');

        return redirect()->route('cliente.index');
    }

    public function edit($id){
        $clientes = $this->validarCliente($id);

        return view('cliente.edit', compact('clientes'));
    }

    public function update(Request $request, $id){
        $cliente = $this->validarCliente($id);
        $cliente->update($request->all());
        $request->session()->flash('msgEdit', 'Cliente editado com sucesso.');

        return redirect()->route('cliente.index');
    }

    public function delete(Request $request, $id)
    {
        $cliente = $this->validarCliente($id);
        $cliente->update(['verificacao' => 'false']);
        $request->session()->flash('msgDelete', 'Cliente excluido com sucesso.');
        
        return redirect()->route('cliente.index');
    }

    public function validarCliente($id){
        if (!$cliente = Cliente::find($id)){
            return redirect()->route('cliente.index');
        }

        return $cliente;
    }
}
