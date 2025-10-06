<?php

namespace App\Models\CustomerInvoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Record;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoicePaymentsModel extends Record
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'billing_payment_records';

    protected $fillable = [
        'financial_year', 
        'user_id', 
        'customer_id',
        'payment_number',
        'received_amount',
        'bank_charges',
        'payment_date',
        'pay_mode',
        'reference_number',
       
    ];

  
}
