<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use App\Models\Autor;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LibroRequest;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with('generos')->get();
        
        return response()->json($libros, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LibroRequest $request)
    {
        $libro = new Libro();

        $libro->nombre = $request->nombre;
        $libro->descripcion = $request->descripcion;
        $libro->precio = $request->precio;
        $libro->paginas = $request->paginas;

        if($request->id_autor == 'otros'){
            $autor = new Autor();
            $autor->nombre = $request->newAutor;
            $autor->isVerificado = false;
            $autor->save();
            $libro->id_autor = $autor->id;
        }else{
            $libro->id_autor = $request->id_autor;
        }
        
        $libro->id_usuario = $request->id_usuario;

        if ($request->imagen != '') {
            $imagenBase64 = $request->imagen;
    
            list($tipo, $datosBase64) = explode(';', $imagenBase64);
            list(, $datosBase64) = explode(',', $datosBase64);
    
            $extension = explode('/', $tipo)[1];
            $imagenDecodificada = base64_decode($datosBase64);
            $nombreImagen = 'libro_'. uniqid().'.'.$extension; 
            $rutaImagen = public_path('img/libros/' . $nombreImagen);
            
            $rutaImagenBD = '/img/libros/' . $nombreImagen;
            file_put_contents($rutaImagen, $imagenDecodificada);

            $libro->imagen = $rutaImagenBD;
        }else{
            $libro->imagen = 'img/default/bookDefault.jpg';
        }

        $libro->save();
        
        foreach ($request['generosLibro'] as $genero) {
            if($genero['id'] == "otros"){
                $genero = new Genero();
                $genero->nombre = $request->newGenero;
                $genero->isVerificado = false;
                $genero->save();
                $libro->generos()->attach($genero->id);
            }else{
                $libro->generos()->attach($genero['id']);
            }
        }

        return response()->json($libro, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        $libro->load(['usuario','generos']);
        return response()->json($libro, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LibroRequest $request, Libro $libro)
    {
        $libro->nombre = $request->nombre;
        $libro->descripcion = $request->descripcion;
        $libro->precio = $request->precio;
        $libro->paginas = $request->paginas;
        $libro->id_autor = $request->id_autor;
        $libro->id_usuario = $request->id_usuario;
        $libro->id_lista = $request->id_lista;
        $libro->save();

        return response()->json($libro, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return response()->json($libro, 200);
    }
}
