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
        Schema::create('animals', function (Blueprint $table) {

            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('type')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->decimal('live_weight', 8, 3)->nullable();
            $table->string('destination')->nullable();
            $table->string('source')->nullable();
            $table->string('butcher')->nullable();
            $table->string('age_classify')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->string('cert_transfer')->nullable();
            $table->string('brgy_clearance')->nullable();
            $table->string('remarks')->nullable();
            $table->string('animal_mark')->nullable();
            $table->string('cert_ownership')->nullable();
            $table->string('qr_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
