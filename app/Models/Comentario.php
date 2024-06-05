<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    public function usuarioEmisor()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_emisor');
    }

    public function usuarioReceptor()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_receptor');
    }
}
