<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        return response()->json(Users::all(), 200);
    }
    public function store(Request $request){
        return response()->json('Em construção', 400);
    }
    public function update(Request $request, $id){
        return response()->json('Em construção', 400);
    }
    public function destroy($id){
        return response()->json('Em construção', 400);
    }
}
