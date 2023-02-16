<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\ClienteStoreRequest;
use App\Http\Requests\Api\Cadastros\ClienteUpdateRequest;
use App\Http\Resources\Api\Cadastros\ClienteResource;
use App\Models\Api\Cadastros\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\Api\Cadastros\ClienteCollection
     */
    public function index(Request $request)
    {
        $clientes = Cliente::all();

        return new ClienteResource($clientes);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\ClienteStoreRequest $request
     * @return \App\Http\Resources\Api\Cadastros\ClienteResource
     */
    public function store(ClienteStoreRequest $request)
    {
        $cliente = Cliente::create($request->validated());

        return new ClienteResource($cliente);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Cliente $cliente
     * @return \App\Http\Resources\Api\Cadastros\ClienteResource
     */
    public function show(Request $request, Cliente $cliente)
    {
        return new ClienteResource($cliente);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\ClienteUpdateRequest $request
     * @param \App\Models\Api\Cadastros\Cliente $cliente
     * @return \App\Http\Resources\Api\Cadastros\ClienteResource
     */
    public function update(ClienteUpdateRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());

        return new ClienteResource($cliente);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cliente $cliente)
    {
        $cliente->delete();

        return response()->noContent();
    }
}
