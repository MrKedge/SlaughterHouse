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
        Schema::create('condemn_carcasses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->decimal('carcass_weight', 8, 3)->nullable();
            $table->string('part')->nullable();
            $table->string('cause')->nullable();

            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('condemn_carcasses');
    }
};
