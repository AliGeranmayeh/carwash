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
        Schema::create('time_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('time');
            $table->string('section');
            $table->unsignedBigInteger('washing_id')->unique();
            $table->foreign('washing_id')->references('id')->on('washing_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_reservations');
    }
};
