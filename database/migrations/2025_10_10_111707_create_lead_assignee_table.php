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
        Schema::create('lead_assignee', function (Blueprint $table) {
            $table->id();
            $table->string("lead_assignee_name");
            $table->string("contact_no")->nullable();
            $table->enum("status", ["yes", "no"])->default("yes");
            $table->unsignedBigInteger("user_id");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_assignee');
    }
};
