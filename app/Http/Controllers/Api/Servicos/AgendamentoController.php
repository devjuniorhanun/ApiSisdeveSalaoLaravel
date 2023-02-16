<?php

namespace App\Http\Controllers\Api\Servicos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Servicos\AgendamentoStoreRequest;
use App\Http\Requests\Api\Servicos\AgendamentoUpdateRequest;
use App\Http\Resources\Api\Servicos\AgendamentoCollection;
use App\Http\Resources\Api\Servicos\AgendamentoResource;
use App\Models\Api\Servicos\Agendamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\Api\Servicos\AgendamentoCollection
     */
    public function index(Request $request)
    {
        $agendamentos = Agendamento::all();

        return new AgendamentoCollection($agendamentos);
    }

    /**
     * @param \App\Http\Requests\Api\Servicos\AgendamentoStoreRequest $request
     * @return \App\Http\Resources\Api\Servicos\AgendamentoResource
     */
    public function store(AgendamentoStoreRequest $request)
    {
        $agendamento = Agendamento::create($request->validated());

        return new AgendamentoResource($agendamento);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Servicos\Agendamento $agendamento
     * @return \App\Http\Resources\Api\Servicos\AgendamentoResource
     */
    public function show(Request $request, Agendamento $agendamento)
    {
        return new AgendamentoResource($agendamento);
    }

    /**
     * @param \App\Http\Requests\Api\Servicos\AgendamentoUpdateRequest $request
     * @param \App\Models\Api\Servicos\Agendamento $agendamento
     * @return \App\Http\Resources\Api\Servicos\AgendamentoResource
     */
    public function update(AgendamentoUpdateRequest $request, Agendamento $agendamento)
    {
        $agendamento->update($request->validated());

        return new AgendamentoResource($agendamento);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Servicos\Agendamento $agendamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Agendamento $agendamento)
    {
        $agendamento->delete();

        return response()->noContent();
    }
}
