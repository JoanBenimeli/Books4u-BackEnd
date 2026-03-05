<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Lista;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::get();
        return response()->json($usuarios, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $usuario = new Usuario();

        $usuario->nombre = $request->nombre;
        $usuario->nick = $request->nick;
        $usuario->poblacion = $request->poblacion;
        $usuario->provincia = $request->provincia;
        $usuario->comunidad = $request->comunidad;
        $usuario->email = $request->email;
        $usuario->rol = $request->rol;
        $usuario->password = bcrypt($request->password);

        if ($request->imagen != '') {
            $imagenBase64 = $request->imagen;
    
            list($tipo, $datosBase64) = explode(';', $imagenBase64);
            list(, $datosBase64) = explode(',', $datosBase64);
    
            $extension = explode('/', $tipo)[1];
            $imagenDecodificada = base64_decode($datosBase64);
            $nombreImagen = 'usuario_'. uniqid().'.' . $extension; 
            $rutaImagen = public_path('img/usuario/' . $nombreImagen);
            
            $rutaImagenBD = '/img/usuario/' . $nombreImagen;
            file_put_contents($rutaImagen, $imagenDecodificada);

            $usuario->imagen = $rutaImagenBD;
        }else{
            $usuario->imagen = 'img/default/userDefault.jpg';
        }
        
        $usuario->save();

        $lista = new Lista();
        $lista->id_usuario = $usuario->id; 
        
        $lista->save();
        return response()->json($usuario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        $usuario->load(['comentariosRecibidos.usuarioEmisor', 'libros']);
        return response()->json($usuario, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, Usuario $usuario)
    {
        $usuario->nombre = $request->nombre;
        $usuario->nick = $request->nick;
        $usuario->poblacion = $request->poblacion;
        $usuario->provincia = $request->provincia;
        $usuario->comunidad = $request->comunidad;
        $usuario->email = $request->email;
        $usuario->rol = $request->rol;

        if($usuario->imagen != $request->imagen){
            if ($usuario->imagen && strpos($usuario->imagen, '/img/usuario/') !== false && file_exists(public_path($usuario->imagen))) {
                unlink(public_path($usuario->imagen));
            }

            $imagenBase64 = $request->imagen;
    
            list($tipo, $datosBase64) = explode(';', $imagenBase64);
            list(, $datosBase64) = explode(',', $datosBase64);
    
            $extension = explode('/', $tipo)[1];
            $imagenDecodificada = base64_decode($datosBase64);
            $nombreImagen = 'usuario_'. uniqid().'.'.$extension; 
            $rutaImagen = public_path('img/usuario/' . $nombreImagen);
            
            $rutaImagenBD = '/img/usuario/' . $nombreImagen;
            file_put_contents($rutaImagen, $imagenDecodificada);

            $usuario->imagen = $rutaImagenBD;
        }

        if($request->password != null){
            $usuario->password = bcrypt($request->password);
        }
       
        $usuario->save();
        return response()->json($usuario, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json($usuario, 200);
    }
}
