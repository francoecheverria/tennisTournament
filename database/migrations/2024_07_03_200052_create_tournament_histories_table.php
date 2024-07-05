<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tournament_histories', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date')->default(now());
            $table->string('gender');
            $table->json('rounds')->nullable();
            $table->json('winner')->nullable();
            $table->json('players')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournament_histories');
    }
};
