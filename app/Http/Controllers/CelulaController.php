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
        $sets = Celula::where(function ($query) use($request){
            if ($request->name){
                $query->whereRaw('UPPER(nome) LIKE ?', formataWhereLike($request->nome));
            }
            if ($request->lider_id){
                $query->where('lider_id', $request->lider_id);
            }
            if ($request->predio_id){
                $query->where('predio_id', $request->predio_id);
            }
            if ($request->pastor_id){
                $query->where('pastor_id', $request->pastor_id);
            }
            if ($request->discipulador_id){
                $query->where('discipulador_id', $request->discipulador_id);
            }
            if ($request->parent_id){
                $query->where('parent_id', $request->parent_id);
            }
            if ($request->inicio){
                $query->where('data_nascimento', '>=', $request->inicio);
            }
            if ($request->fim){
                $query->where('data_nascimento', '<=', $request->fim);
            }
            return $query;
        })->get();

        return response()->json($sets, 200);
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
            'lider_id' => 'required|exists:users,id',
            'discipulador_id' => 'required|exists:users,id',
            'pastor_id' => 'required|exists:users,id',
            'parent_id' => 'nullable|exists:celulas,id'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $set = Celula::create($request->all());

        if ($set){
            // event(new Registered($set));
            return response()->json("Sucesso ao criar a celula ID: $set->id", 200);
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
