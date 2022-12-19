<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateFuncionarioClienteFormRequest;
use App\Models\funcionario;

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
        $funcionarios = funcionario::all();

        return view('funcionario.index', compact('funcionarios'));
    }

    public function create()
    {
        return view('funcionario.create');
    }

    public function show($id)
    {
        $funcionario = $this->validarFuncionario($id);
        return view('funcionario.show', compact('funcionario'));
    }

     public function store(StoreUpdateFuncionarioClienteFormRequest $request)
    {
        funcionario::create($request->all());

        return redirect()->route('funcionario.index');
    }

    public function edit($id){
        $funcionario = $this->validarFuncionario($id);
        return view('funcionario.edit', compact('funcionario'));
    }

    public function update(Request $request, $id){
        $funcionario = $this->validarFuncionario($id);
        $funcionario->update($request->all());

        return redirect()->route('funcionario.index');
    }

    public function delete($id)
    {
        $funcionario = $this->validarFuncionario($id);

        $funcionario->delete();

        return redirect()->route('funcionario.index');
    }

    public function validarfuncionario($id){
        if (!$funcionario = funcionario::find($id)){
            return redirect()->route('funcionario.index');
        }

        return $funcionario;
    }
}
