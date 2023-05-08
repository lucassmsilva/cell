<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request){
        return response()->json(User::all(), 200);
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'sexo' => 'required|min:1|max:1'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'sexo' => $request->sexo,
        ]);

        if ($user){
            event(new Registered($user));
            return response()->json('Sucesso', 200);
        }

        return response()->json('Ocorreu um erro', 500);
    }
    public function update(Request $request, $id){
        $user = User::findOrFail($id);

        if ($user){
            $user->update($request->all());
            return response()->json('Sucesso', 200);
        }

        return response()->json('Ocorreu um erro', 500);;
    }
    public function destroy($id){
        return response()->json('Em construção', 400);
    }
}
