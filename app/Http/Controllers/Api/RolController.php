<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Rol::get();
        return response()->json($roles, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol = new Rol();
        $rol->nombre = $request->nombre;
        $rol->save();

        return response()->json($rol, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        return response()->json($rol, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $rol)
    {
        $rol->nombre = $request->nombre;
        $rol->save();

        return response()->json($rol, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol)
    {
        $rol->delete();
        return response()->json($rol, 200);
    }
}
