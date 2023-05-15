<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request){

        $users = User::where(function ($query) use($request){
            if ($request->name){
                $query->whereRaw('UPPER(name) LIKE ?', formataWhereLike($request->name));
            }
            if ($request->email){
                $query->whereRaw('email LIKE ?', formataWhereLike($request->email));
            }
            if ($request->sexo){
                $query->where('sexo', $request->sexo);
            }
            return $query;
        })->get();

        return response()->json(User::all(), 200);
    }
    public function store(Request $request){
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required'],
            'sexo' => 'required|min:1|max:1'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'sexo' => $request->sexo,
        ]);

        if ($user){
            // event(new Registered($user));
            return response()->json("Sucesso ao criar o usuário ID: $user->id", 200);
        }

        return response()->json('Ocorreu um erro', 500);
    }
    public function update(Request $request, $id){
        $user = User::findOrFail($id);

        if ($user){
            $user->update($request->all());
            return response()->json("Sucesso ao atualizar o usuário $id", 200);
        }

        return response()->json('Ocorreu um erro', 500);
    }
    public function destroy($id){
        $user = User::findOrFail($id);

        $deleted = $user->delete() ? true : false;

        if($deleted){
            return response()->json("Sucesso ao remover o usuário $id", 200);
        }

        return response()->json('Ocorreu um erro', 500);
    }
}
