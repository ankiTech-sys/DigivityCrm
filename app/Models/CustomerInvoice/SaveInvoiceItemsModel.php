<?php

namespace App\Models\CustomerInvoice;

use App\Models\Record;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaveInvoiceItemsModel extends Record
{
    use SoftDeletes;
    protected $table = 'billing_invoice_items_reocrds';
    protected $fillable = [
        'user_id', 
        'financial_year', 
        'customer_id',
        'invoice_number',
        'invoice_items', 
    ];

    protected $casts = [
        'invoice_items' => 'json', 
    ];
}
