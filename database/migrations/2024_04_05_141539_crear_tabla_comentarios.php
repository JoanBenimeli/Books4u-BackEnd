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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario_emisor');
            $table->unsignedBigInteger('id_usuario_receptor');
            $table->text('contenido');
            $table->integer('valoracion')->nullable();
            $table->timestamps();

            $table->foreign("id_usuario_emisor")->references("id")->on("usuarios")->onDelete("cascade");
            $table->foreign("id_usuario_receptor")->references("id")->on("usuarios")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
