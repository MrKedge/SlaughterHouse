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
        Schema::create('completeds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('animal_id');

            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');

            $table->string('complete_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('completeds');
    }
};
