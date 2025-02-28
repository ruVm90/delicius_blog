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
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('id_category')->constrained('categories')->onDelete('cascade');
                              

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
