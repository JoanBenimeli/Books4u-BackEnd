<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comentarios = Comentario::get();
        return response()->json($comentarios, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comentario = new Comentario();
        $comentario->contenido = $request->contenido;
        $comentario->valoracion = $request->valoracion;
        $comentario->id_usuario_receptor = $request->id_usuario_receptor;
        $comentario->id_usuario_emisor = $request->id_usuario_emisor;
        $comentario->save();

        return response()->json($comentario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        return response()->json($comentario, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        $comentario->contenido = $request->contenido;
        $comentario->save();

        return response()->json($comentario, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        $comentario->delete();
        return response()->json($comentario, 200);
    }
}
