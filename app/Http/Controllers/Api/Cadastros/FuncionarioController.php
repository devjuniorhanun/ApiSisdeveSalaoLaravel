<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\FuncionarioRequest;
use App\Http\Resources\Api\Cadastros\FuncionarioResource;
use App\Models\Api\Cadastros\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\Api\Cadastros\FuncionarioCollection
     */
    public function index(Request $request)
    {
        $funcionarios = Funcionario::all();
        if ($funcionarios)
        return FuncionarioResource::collection($funcionarios);

    return response()->json(['error' => 'Funcionarios não Encontrados'], 401);

    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\FuncionarioStoreRequest $request
     * @return \App\Http\Resources\Api\Cadastros\FuncionarioResource
     */
    public function store(FuncionarioRequest $request)
    {
        $funcionario = Funcionario::create($request->validated());

        if ($funcionario)
            return new FuncionarioResource($funcionario);

        return response()->json(['error' => 'Funcionario não Cadastrado'], 401);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Funcionario $funcionario
     * @return \App\Http\Resources\Api\Cadastros\FuncionarioResource
     */
    //public function show($id)
    public function show(Funcionario $funcionario)
    {
        if ($funcionario)
            return new FuncionarioResource($funcionario);

        return response()->json(['error' => 'Funcionario não Encontrado'], 401);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\FuncionarioRequest $request
     * @param \App\Models\Api\Cadastros\Funcionario $funcionario
     * @return \App\Http\Resources\Api\Cadastros\FuncionarioResource
     */
    public function update(FuncionarioRequest $request, Funcionario $funcionario)
    {
        
        $funcionario->update($request->validated());

        if ($funcionario)
        return new FuncionarioResource($funcionario);

    return response()->json(['error' => 'Funcionario não Alterado'], 401);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Funcionario $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Funcionario $funcionario)
    {
        $funcionario->delete();

        if ($funcionario)
            return response()->json(['sucesso' => 'Funcionario excluido com Sucesso'], 200);

        return response()->json(['error' => 'Funcionario não Alterado'], 401);
    }
}
