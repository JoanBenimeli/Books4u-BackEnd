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
        Schema::create('libros_listas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('libro_id');
            $table->unsignedBigInteger('lista_id');

            $table->unique(['lista_id', 'libro_id']);
            $table->foreign("libro_id")->references("id")->on("libros")->onDelete("cascade");
            $table->foreign("lista_id")->references("id")->on("listas")->onDelete("cascade");
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
