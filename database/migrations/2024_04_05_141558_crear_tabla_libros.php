<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->decimal('precio');
            $table->integer('paginas');
            $table->string('imagen');
            $table->unsignedBigInteger('id_autor');
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();

            $table->foreign("id_usuario")->references("id")->on("usuarios")->onDelete("cascade");
            $table->foreign("id_autor")->references("id")->on("autores")->onDelete("cascade");
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
