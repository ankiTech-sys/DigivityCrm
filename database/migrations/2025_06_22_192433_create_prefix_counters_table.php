<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_create_prefix_counters_table.php
public function up() {
    Schema::create('prefix_counters', function (Blueprint $table) {
        $table->id();
        $table->foreignId('prefix_id')->constrained('prefixes')->cascadeOnDelete();
        $table->unsignedBigInteger('current_no')->default(0);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prefix_counters');
    }
};
