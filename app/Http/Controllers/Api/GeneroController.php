<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genero;
use Illuminate\Http\Request;
use App\Http\Requests\GeneroRequest;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generos = Genero::get();
        return response()->json($generos, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GeneroRequest $request)
    {

        //dd($request);
        $genero = new Genero();
        $genero->nombre = $request->nombre;
        $genero->isVerificado = $request->isVerificado;
        $genero->save();

        return response()->json($genero, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Genero $genero)
    {
        return response()->json($genero, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GeneroRequest $request, Genero $genero)
    {
        $genero->nombre = $request->nombre;
        $genero->isVerificado = $request->isVerificado;
        $genero->save();

        return response()->json($genero, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genero $genero)
    {
        $genero->delete();
        return response()->json($genero, 200);
    }

    public function getVerificados(){
        $generos = Genero::where('isVerificado', true)->get();
        return response()->json($generos, 200);
    }
}
