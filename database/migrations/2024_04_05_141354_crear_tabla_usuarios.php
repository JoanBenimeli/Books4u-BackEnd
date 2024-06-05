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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('nick');
            $table->string('poblacion');
            $table->string('provincia');
            $table->string('comunidad');
            $table->unsignedBigInteger('rol');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('imagen');
            $table->timestamps();

            $table->foreign("rol")->references("id")->on("roles")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
