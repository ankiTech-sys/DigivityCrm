<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('billing_customer_table', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('financial_year');
            $table->foreignId('service_category_id');
            $table->string('customer_type');
            $table->string('primary_contact_name');
            $table->string('org_name');
            $table->string('email_address')->unique();
            $table->string('org_email_address')->nullable();
            $table->string('org_country');
            $table->string('org_city');
            $table->string('pin_code');
            $table->string('w_p_contact');
            $table->string('m_contact');
            $table->enum('is_active', ['yes', 'no'])->default('yes');
            $table->softDeletes(); // Enable soft deletes
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('billing_customer_table');
    }
};
