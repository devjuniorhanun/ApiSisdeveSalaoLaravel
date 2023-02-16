<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\ServicoStoreRequest;
use App\Http\Requests\Api\Cadastros\ServicoUpdateRequest;
use App\Http\Resources\Api\Cadastros\ServicoCollection;
use App\Http\Resources\Api\Cadastros\ServicoResource;
use App\Models\Api\Cadastros\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\Api\Cadastros\ServicoCollection
     */
    public function index(Request $request)
    {
        $servicos = Servico::all();

        return new ServicoCollection($servicos);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\ServicoStoreRequest $request
     * @return \App\Http\Resources\Api\Cadastros\ServicoResource
     */
    public function store(ServicoStoreRequest $request)
    {
        $servico = Servico::create($request->validated());

        return new ServicoResource($servico);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Servico $servico
     * @return \App\Http\Resources\Api\Cadastros\ServicoResource
     */
    public function show(Request $request, Servico $servico)
    {
        return new ServicoResource($servico);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\ServicoUpdateRequest $request
     * @param \App\Models\Api\Cadastros\Servico $servico
     * @return \App\Http\Resources\Api\Cadastros\ServicoResource
     */
    public function update(ServicoUpdateRequest $request, Servico $servico)
    {
        $servico->update($request->validated());

        return new ServicoResource($servico);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Servico $servico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Servico $servico)
    {
        $servico->delete();

        return response()->noContent();
    }
}
