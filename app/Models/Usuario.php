<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Model
{
    use HasFactory,HasApiTokens,Notifiable;
    

    public function lista()
    {
        return $this->hasOne(Lista::class,'id_usuario');
    }

    public function comentariosEnviados()
    {
        return $this->hasMany(Comentario::class, 'id_usuario_emisor');
    }

    public function comentariosRecibidos()
    {
        return $this->hasMany(Comentario::class, 'id_usuario_receptor');
    }

    public function libros()
    {
        return $this->hasMany(Libro::class,'id_usuario');
    }

    public function locales()
    {
        return $this->hasMany(Local::class);
    }

    public function roles()
    {
        return $this->belongsTo(Rol::class);
    }
}
