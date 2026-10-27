<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('game_gamer', function (Blueprint $table) {
            $table->id();

            $table->foreignId('game_id')
                ->constrained();

            $table->foreignId('gamer_id')
                ->constrained();

            $table->timestamps();

            $table->unique(['game_id', 'gamer_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_gamer');
    }
};
