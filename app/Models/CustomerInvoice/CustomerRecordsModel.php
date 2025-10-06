<?php

namespace App\Models\CustomerInvoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Record;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerRecordsModel extends Record
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'billing_customer_table';

    protected $fillable = [
        'financial_year', 
        'user_id',  
        'service_category_id',
        'customer_type',
        'primary_contact_name',
        'org_name',
        'email_address',
        'org_email_address',
        'org_country',
        'org_state',
        'org_city',
        'pin_code',
        'w_p_contact',
        'm_contact',
        'is_active',
        'is_commision_based_client',
        'referred_by_name',
        'persentage_commission',
        'ref_by_email',
    ];

  
}
