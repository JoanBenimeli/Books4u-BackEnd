<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Local;
use Illuminate\Http\Request;
use App\Http\Requests\LocalRequest;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locales = Local::get();
        return response()->json($locales, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocalRequest $request)
    {
        $local = new Local();
        $local->nombre = $request->nombre;
        $local->descripcion = $request->descripcion;
        $local->direccion = $request->direccion;
        $local->comunidad = $request->comunidad;
        $local->provincia = $request->provincia;
        $local->latitud = $request->latitud;
        $local->longitud = $request->longitud;
        $local->poblacion = $request->poblacion;
        $local->email_usuario = $request->email_usuario;
        $local->verificado = $request->verificado;
        $local->save();

        return response()->json($local, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Local $local)
    {
        return response()->json($local, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocalRequest $request, Local $local)
    {
        $local->nombre = $request->nombre;
        $local->descripcion = $request->descripcion;
        $local->direccion = $request->direccion;
        $local->comunidad = $request->comunidad;
        $local->provincia = $request->provincia;
        $local->latitud = $request->latitud;
        $local->longitud = $request->longitud;
        $local->poblacion = $request->poblacion;
        $local->email_usuario = $request->email_usuario;
        $local->verificado = $request->verificado;
        $local->save();

        return response()->json($local, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Local $local)
    {
        $local->delete();
        return response()->json($local, 200);
    }

    public function getVerificados(){
        $locales = Local::where('verificado', true)->get();
        return response()->json($locales, 200);
    }
}
