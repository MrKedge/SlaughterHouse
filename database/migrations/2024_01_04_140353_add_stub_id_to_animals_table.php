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
        Schema::table('animals', function (Blueprint $table) {
            $table->unsignedBigInteger('stub_id')->nullable();
            $table->foreign('stub_id', 'animals_stub_id_foreign')->references('id')->on('stubs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropForeign('animals_stub_id_foreign');
            $table->dropColumn('stub_id');
        });
    }
};
