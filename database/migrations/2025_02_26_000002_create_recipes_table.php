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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->longText('description');
            $table->timestamps();
            $table->string('difficulty');
              
            // Si un usuario se elimina, todos sus posts se eliminan automáticamente.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Si una categoría se elimina, todos los posts dentro de esa categoría también se eliminan.
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
