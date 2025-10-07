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
        Schema::create('lead_clients', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('email')->nullable();
            $table->string('contact_no', 20)->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger("erp_company_id")->nullable();
            $table->string("no_of_students")->nullable();
            $table->unsignedBigInteger("client_type_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_clients');
    }
};
