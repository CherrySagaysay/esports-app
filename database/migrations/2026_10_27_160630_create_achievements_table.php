<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gamer_id')->constrained();
            $table->string('title');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
