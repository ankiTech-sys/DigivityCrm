<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_create_prefixes_table.php
public function up() {
    Schema::create('prefixes', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('prefix_code');
        $table->enum('type', ['invoice','payment','custom']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prefixes');
    }
};
