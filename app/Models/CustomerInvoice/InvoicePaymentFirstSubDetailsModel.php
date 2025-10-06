<?php

namespace App\Models\CustomerInvoice;

use App\Models\Record;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoicePaymentFirstSubDetailsModel extends Record
{
    use SoftDeletes;
    protected $table = 'billing_payment_invoice_details';
    protected $fillable = [
        'financial_year', // Added financial_year for session-based assignment
        'user_id',  // Added user_id to ensure it's automatically set
        'customer_id', 
        'payment_id',
        'invoice_number',
        'invoice_date', 
        'received_amount', 
    ];


}
