<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\CompanhiaStoreRequest;
use App\Http\Requests\Api\Cadastros\CompanhiaUpdateRequest;
use App\Http\Resources\Api\Cadastros\CompanhiaResource;
use App\Models\Api\Cadastros\Companhia;
use Illuminate\Http\Request;

class CompanhiaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\Api\Cadastros\CompanhiaCollection
     */
    public function index(Request $request)
    {
        $companhia = Companhia::all();

        if ($companhia)
            return CompanhiaResource::collection($companhia);

        return response()->json(['error' => 'Empresas não Encontradas'], 401);

        //return new CompanhiaResource($companhia);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\CompanhiaStoreRequest $request
     * @return \App\Http\Resources\Api\Cadastros\CompanhiaResource
     */
    public function store(CompanhiaStoreRequest $request)
    {
        $companhia = Companhia::create($request->validated());

        if ($companhia)
            return new CompanhiaResource($companhia);

        return response()->json(['error' => 'Empresa não Cadastrada'], 401);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Companhia $companhia
     * @return \App\Http\Resources\Api\Cadastros\CompanhiaResource
     */
    public function show($id)
    {
        if ($companhia = Companhia::find($id))
            return new CompanhiaResource($companhia);

        return response()->json(['error' => 'Empresa não Encontrada'], 401);
    }

    /**
     * @param \App\Http\Requests\Api\Cadastros\CompanhiaUpdateRequest $request
     * @param \App\Models\Api\Cadastros\Companhia $companhia
     * @return \App\Http\Resources\Api\Cadastros\CompanhiaResource
     */
    public function update(CompanhiaUpdateRequest $request, Companhia $companhia)
    {
        $companhia->update($request->validated());

        if ($companhia)
            return new CompanhiaResource($companhia);

        return response()->json(['error' => 'Empresa não Alterada'], 401);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Cadastros\Companhia $companhia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Companhia $companhia)
    {
        $companhia->delete();

        if ($companhia)
            return response()->json(['sucesso' => 'Empresa excluida com Sucesso'], 200);

        return response()->json(['error' => 'Empresa não Alterada'], 401);
    }
}
