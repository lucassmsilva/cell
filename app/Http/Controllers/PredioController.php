<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predio;
use Illuminate\Support\Facades\Validator;

class PredioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Predio::all(), 200);
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
            'endereco' => 'required',
        ]
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        };

        $user = Predio::create($request->all());

        if ($user){
            // event(new Registered($user));
            return response()->json("Sucesso ao criar o predio ID: $user->id", 200);
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
        $set = Predio::findOrFail($id);

        if ($set){
            $set->update($request->all());
            return response()->json("Sucesso ao atualizar o predio $id", 200);
        }

        return response()->json('Ocorreu um erro', 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $set = Predio::findOrFail($id);

        $deleted = $set->delete() ? true : false;

        if($deleted){
            return response()->json("Sucesso ao remover o predio $id", 200);
        }

        return response()->json('Ocorreu um erro', 500);
    }
}
