<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('gaming_rigs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gamer_id')  //column referrence sa gamer 
                ->unique()
                ->constrained(); //means i link ang gamer_id to gamers table 

            $table->string('pc_name');  //name sa gaming set up 
            $table->text('specs')->nullable();  //optional pc specs kintahay
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gaming_rigs');
    }
};
