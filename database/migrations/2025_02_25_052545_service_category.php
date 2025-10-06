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
        Schema::create('service_category', function (Blueprint $table) {
            $table->id();
            $table->string('sequence')->nullable();
            $table->string('category_name');
            $table->string('category_code')->nullable();
            $table->string('description')->nullable();
            $table->string('user_id');
            $table->enum('is_active',['yes','no'])->default('yes');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_category');
    }
};
