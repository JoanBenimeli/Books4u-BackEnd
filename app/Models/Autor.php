<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autores';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function libros()
    {
        return $this->hasMany(Libro::class, 'id_autor');
    }
}
