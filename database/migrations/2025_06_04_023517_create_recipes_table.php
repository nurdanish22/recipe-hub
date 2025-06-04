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
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->string('title'); 
            $table->text('description'); 
            $table->string('category'); 
            $table->integer('cooking_time'); 
            $table->integer('preparation_time'); 
            $table->string('difficulty_level'); 
            $table->integer('servings'); 
            $table->string('image_url'); 
            $table->timestamps(); 
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
