<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_usuario');
    }

    public function libros()
    {
        return $this->belongsToMany(Libro::class,'libros_listas');
    }
}
