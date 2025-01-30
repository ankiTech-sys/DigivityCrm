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
        Schema::create('school_information', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->text('school_address');
            $table->text('about_school')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->unsignedInteger('financial_year');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('school_information');
    }
};
