<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\ClienteRequest;
use App\Http\Resources\Api\Cadastros\ClienteResource;
use App\Models\Api\Cadastros\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\Api\Cadastros\ClienteResource
     */
    public function index()
    {
        $clientes = Cliente::all();

        if ($clientes)
            return ClienteResource::collection($clientes);

        return response()->json(['error' => 'Clientes não Encontrados'], 401);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\ClienteRequest $request
     * @return \App\Http\Resources\Api\Cadastros\ClienteResource
     */
    public function store(ClienteRequest $request)
    {
        $cliente = Cliente::create($request->validated());

        if ($cliente)
            return ClienteResource::collection($cliente);

        return response()->json(['error' => 'Clientes não Encontrados'], 401);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Cliente $cliente
     * @return \App\Http\Resources\Api\Cadastros\ClienteResource
     */
    public function show(Cliente $cliente)
    {
        if ($cliente)
            return new ClienteResource($cliente);

        return response()->json(['error' => 'Clientes não Encontrados'], 401);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\ClienteUpdateRequest $request
     * @param \App\Models\Api\Cadastros\Cliente $cliente
     * @return \App\Http\Resources\Api\Cadastros\ClienteResource
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());
        if ($cliente)
            return ClienteResource::collection($cliente);

        return response()->json(['error' => 'Clientes não Encontrados'], 401);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cliente $cliente)
    {
        $cliente->delete();

        if ($cliente)
            return response()->json(['sucesso' => 'Cliente excluido com Sucesso'], 200);

        return response()->json(['error' => 'cliente não Alterado'], 401);
    }
}
