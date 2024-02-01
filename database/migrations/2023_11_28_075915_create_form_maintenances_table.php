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
        Schema::create('form_maintenances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('animal_type')->nullable();
            $table->string('meat_type')->nullable();
            $table->string('animal_destination')->nullable();
            $table->string('animal_butcher')->nullable();
            $table->string('animal_ageclassify')->nullable();
            $table->string('animal_source')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_maintenances');
    }
};
