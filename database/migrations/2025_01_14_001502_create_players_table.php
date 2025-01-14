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
        Schema::create('player', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->primary();
            $table->integer('club_id')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('position')->nullable(false);
            $table->integer('number')->unique()->nullable(false);
            $table->date('birthday')->nullable(false);
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player');
    }
};
