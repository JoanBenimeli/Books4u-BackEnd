<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use Illuminate\Http\Request;
use App\Http\Requests\AutorRequest;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = Autor::get();
        return response()->json($autores, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AutorRequest $request)
    {
        $autor = new Autor();
        $autor->nombre = $request->nombre;
        $autor->isVerificado = $request->isVerificado;
        $autor->save();

        return response()->json($autor, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Autor $autor)
    {
        return response()->json($autor, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AutorRequest $request, Autor $autor)
    {
        $autor->nombre = $request->nombre;
        $autor->isVerificado = $request->isVerificado;
        $autor->save();

        return response()->json($autor, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();
        return response()->json($autor, 200);
    }

    public function getVerificados(){
        $autores = Autor::where('isVerificado', true)->get();
        return response()->json($autores, 200);
    }
}
