<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lista;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ListaController extends Controller
{

    public function guardarLibro(Request $request){
        $lista = Lista::where('id_usuario',$request->id_usuario)->firstOrFail();
        $lista->libros()->attach($request->id_libro);

        $listaConLibros = Lista::with('libros')->find($lista->id);
        return response()->json($listaConLibros, 200);
    }

    public function mostrarLista($id_usuario){
        $lista = Lista::where('id_usuario',$id_usuario)->with('libros')->firstOrFail();
        return response()->json($lista, 200);
    }

    public function deleteOfLista(Request $request){
        $lista = Lista::where('id_usuario',$request->id_usuario)->firstOrFail();
        $lista->libros()->detach($request->id_libro);

        $listaConLibros = Lista::with('libros')->find($lista->id);
        return response()->json($lista, 200);
    }
}
