<?php

namespace App\Models\CustomerInvoice;

use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaveInvoiceModel extends Record
{
    use HasFactory, SoftDeletes;
    protected $table = 'billing_invoices_reocrds';

    protected $fillable = [
        'user_id',
        'financial_year',
        'customer_id',
        'invoice_number',
        'invoice_date',
        'payment_terms',
        'due_date',
        'invoice_remark',
        'status',
        'total_amount',
        'global_discount',
        'global_discount_type',
        'subtotal_payable_amount',
        'paid_amount',
        'balance_amount',
    ];

    protected $casts = [
        'invoice_date' => 'date',
        'due_date' => 'date',
        'status' => 'string', 
    ];


public function customer()
{
    return $this->belongsTo(CustomerRecordsModel::class, 'customer_id');
}
 // Relationship with Invoice Items
 public function invoiceItems()
 {
     return $this->hasMany(SaveInvoiceItemsModel::class, 'invoice_number', 'invoice_number');
 }
}
