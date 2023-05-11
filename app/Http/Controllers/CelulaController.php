<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Celula;
use Illuminate\Support\Facades\Validator;

class CelulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Celula::all(), 200);
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
        $rules = [
            'nome' => 'required|string|max:255',
            'predio_id' => 'required|exists:predios,id',
            'data_nascimento' => 'required|date:Y-m-d H:i:s',
            'lider_id' => 'required|exists:user,id',
            'discipulador_id' => 'required|exists:user,id',
            'pastor_id' => 'required|exists:user,id',
            'parent_id' => 'nullable|exists:celulas,id'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $user = Celula::create($request->all());

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
        $set = Celula::findOrFail($id);

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
        $set = Celula::findOrFail($id);

        $deleted = $set->delete() ? true : false;

        if($deleted){
            return response()->json("Sucesso ao remover a celula $id", 200);
        }

        return response()->json('Ocorreu um erro', 500);
    }
}
