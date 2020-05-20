<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  JWTAuth;

class ProductController extends Controller
{
    public function home(){
        return response()->json([
            'status' => 'ok',
            'data' => 'Seccion de productos'
        ], 200);
    }

    public function getProducts(Request $request){
        $this->validate($request, [
            'token' => 'required'
        ]);
        $user = JWTAuth::authenticate($request->token);
        return response()->json([
            'status' => 'ok',
            'user' => $user,
            'data' => 'Lista todos los productos'
        ], 200);
    }

    public function getProduct(Request $request){
        $this->validate($request, [
            'token' => 'required'
        ]);
        return response()->json([
            'status' => 'ok',
            'data' => 'Lista un producto'
        ], 200);
    }
}
