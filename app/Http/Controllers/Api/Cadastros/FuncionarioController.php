<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\FuncionarioStoreRequest;
use App\Http\Requests\Api\Cadastros\FuncionarioUpdateRequest;
use App\Http\Resources\Api\Cadastros\FuncionarioCollection;
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

        return new FuncionarioCollection($funcionarios);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\FuncionarioStoreRequest $request
     * @return \App\Http\Resources\Api\Cadastros\FuncionarioResource
     */
    public function store(FuncionarioStoreRequest $request)
    {
        $funcionario = Funcionario::create($request->validated());

        return new FuncionarioResource($funcionario);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Funcionario $funcionario
     * @return \App\Http\Resources\Api\Cadastros\FuncionarioResource
     */
    public function show(Request $request, Funcionario $funcionario)
    {
        return new FuncionarioResource($funcionario);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\FuncionarioUpdateRequest $request
     * @param \App\Models\Api\Cadastros\Funcionario $funcionario
     * @return \App\Http\Resources\Api\Cadastros\FuncionarioResource
     */
    public function update(FuncionarioUpdateRequest $request, Funcionario $funcionario)
    {
        $funcionario->update($request->validated());

        return new FuncionarioResource($funcionario);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Funcionario $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Funcionario $funcionario)
    {
        $funcionario->delete();

        return response()->noContent();
    }
}
