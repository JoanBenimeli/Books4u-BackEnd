<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_usuario');
    }

    public function lista(){
        return $this->belongsToMany(Lista::class,'libros_listas');
    }

    public function autor(){
        return $this->belongsTo(Autor::class, 'id_autor');
    }

    public function generos()
    {
        return $this->belongsToMany(Genero::class,'genero_libro', 'id_libro', 'id_genero');
    }
}
