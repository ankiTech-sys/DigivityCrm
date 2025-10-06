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
        Schema::create('generated_invoices_table', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('financial_year');
            $table->foreignId('customer_id');
            $table->string('invoice_number')->unique();
            $table->date('invoice_date');
            $table->string('payment_terms');
            $table->date('due_date');
            $table->text('invoice_remark')->nullable();
            $table->enum('status', [
                'draft', 
                'sent', 
                'paid', 
                'partially_paid', 
                'cancelled', 
                'pending', 
                'open', 
                'overdue', 
                'approved'
            ])->default('draft');
            $table->string('global_discount')->default('0');
            $table->string('global_discount_type'); // 'percentage' or 'fixed'
            $table->string('subtotal_payable_amount');
            $table->integer('paid_amount')->nullable();
            $table->integer('balance_amount')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generated_invoices_table');
    }
};
