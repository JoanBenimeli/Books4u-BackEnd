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
        Schema::create('locales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->float("latitud");
            $table->float("longitud");
            $table->string('descripcion')->nullable();
            $table->string('direccion');
            $table->string('poblacion');
            $table->string('provincia');
            $table->string('comunidad');
            $table->boolean('verificado');
            $table->timestamps();
            $table->string('email_usuario');

            $table->foreign("email_usuario")->references("email")->on("usuarios")->onDelete("cascade");
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locales');
    }
};
