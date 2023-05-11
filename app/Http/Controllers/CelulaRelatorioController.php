<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Celula;
use App\Models\CelulaRelatorio;
use Illuminate\Validation\Validator;

class CelulaRelatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(CelulaRelatorio::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'celula_id' => 'required|exists:celulas,id',
            'equipe' => 'required|numeric',
            'membros' => 'required|numeric',
            'visitantes' => 'required|numeric',
            'frequentadores' => 'required|numeric',
            'data' => 'required|date:Y-m-d H:i:s',
            'valor_oferta' => 'required|numeric',
            'tipo' => 'required|string',
            'observacoes' => 'nullable|string'
        ])->validate();

        $user = CelulaRelatorio::create($request->all());

        if ($user){
            // event(new Registered($user));
            return response()->json("Sucesso ao criar a celula ID: $user->id", 200);
        }

        return response()->json('Ocorreu um erro', 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $set = CelulaRelatorio::findOrFail($id);

        if ($set){
            $set->update($request->all());
            return response()->json("Sucesso ao atualizar a celula $id", 200);
        }

        return response()->json('Ocorreu um erro', 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $set = CelulaRelatorio::findOrFail($id);

        $deleted = $set->delete() ? true : false;

        if($deleted){
            return response()->json("Sucesso ao remover a celula $id", 200);
        }

        return response()->json('Ocorreu um erro', 500);
    }
}
