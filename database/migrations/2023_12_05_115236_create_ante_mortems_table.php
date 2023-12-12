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
        Schema::create('ante_mortems', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('inspected_at')->nullable();
            $table->timestamp('arrived_at')->nullable();
            $table->string('inspection_status')->nullable();
            $table->string('causes')->nullable();
            $table->string('ante_remarks')->nullable();

            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ante_mortems');
    }
};
