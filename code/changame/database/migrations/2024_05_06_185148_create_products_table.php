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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('description');
            $table->foreignId('category_id');
            $table->string('thumbnail')->nullable();
            $table->unsignedTinyInteger('player_count_from');
            $table->unsignedTinyInteger('player_count_to');
            $table->unsignedTinyInteger('from_age');
            $table->unsignedTinyInteger('play_time');
            $table->enum('difficulty', ['1','2','3','4']);
            $table->year('release_year');
            $table->enum('condition',['acceptable','good','very good','like new']);
            $table->string('language',['ES','EN','FR','DE','PT','IT','OT']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
