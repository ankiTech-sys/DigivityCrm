<?php

namespace App\Models\CustomerInvoice;

use App\Models\Record;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoicePaymentSecondSubDetailsModel extends Record
{
    use SoftDeletes;
    protected $table = 'billing_payment_expenses_records';
    protected $fillable = [
        'financial_year',
        'user_id', 
         'customer_id', 
        'payment_id',
        'invoice_number',      
        'quantity',  
        'expence_name', 
        'rate', 
        'amount', 
    ];


}
