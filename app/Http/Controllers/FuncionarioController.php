<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateFuncionarioClienteFormRequest;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        $funcionarios = Funcionario::where('verificacao','=','true')->get();

        return view('funcionario.index', compact('funcionarios'));
    }

    public function create()
    {
        return view('funcionario.create');
    }

    public function show(Funcionario $funcionario)
    {
        return view('funcionario.show', compact('funcionario'));
    }

     public function store(StoreUpdateFuncionarioClienteFormRequest $request)
    {
        Funcionario::create($request->all());
        $request->session()->flash('msgInsert', 'Funcionario registrado com sucesso.');
        return redirect()->route('funcionario.index');
    }

    public function edit(Funcionario $funcionario){
        return view('funcionario.edit', compact('funcionario'));
    }

    public function update(Request $request, Funcionario $funcionario){
        $funcionario->update($request->all());
        $request->session()->flash('msgEdit', 'Funcionario editado com sucesso.');

        return redirect()->route('funcionario.index');
    }

    public function delete(Request $request, Funcionario $funcionario)
    {
        $funcionario->update(['verificacao' => 'false']);
        $request->session()->flash('msgDelete', 'Funcionario excluido com sucesso.');

        return redirect()->route('funcionario.index');
    }
}
