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
        Schema::create('villages', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->char('district_id', 6);
            $table->string('name');
            $table->char('zip_code',5)->nullable();
            $table->foreign('district_id')->references('id')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('villages', function (Blueprint $table) {
            $table->dropForeign(['district_id']);
        });

        Schema::dropIfExists('villages');
    }
};
