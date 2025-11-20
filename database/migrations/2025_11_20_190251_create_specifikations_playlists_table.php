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
        Schema::create('specifikations_playlists', function (Blueprint $table) {
            $table->id();
            $table->integer('id_spec')->foreign()->references('id')->on('specifikations')->onDelete('cascade')->default(0);
            $table->integer('id_play')->foreign()->references('id')->on('playlists')->onDelete('cascade')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specifikations_playlists');
    }
};
