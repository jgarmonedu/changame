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
            $table->unsignedTinyInteger('player_count_from');
            $table->unsignedTinyInteger('player_count_to');
            $table->unsignedTinyInteger('from_age');
            $table->unsignedTinyInteger('play_time')->nullable();
            $table->enum('difficulty', ['1','2','3','4']);
            $table->year('release_year')->nullable();
            $table->enum('condition',['acceptable','good','very good','like new']);
            $table->enum('language',['ES','EN','FR','DE','PT','IT','OT']);
            $table->foreignId('change_with')->nullable();
            $table->enum('state',['1','2','3'])->nullable();
            $table->foreignId('campaign')->nullable();
            $table->timestamps();
        });

        Schema::table('products',function (Blueprint $table){
            $table->foreign('change_with')->references('id')->on('products');
            $table->foreign('campaign')->references('id')->on('campaigns')->nullOnDelete();
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
