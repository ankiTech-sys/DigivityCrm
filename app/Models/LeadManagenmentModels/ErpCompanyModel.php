<?php

namespace App\Models\LeadManagenmentModels;
use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ErpCompanyModel extends Record
{
    use HasFactory, SoftDeletes;

    protected $table ='erp_companies';

    protected $fillable = [
        'company_name',
        "address",
        'status',
    ];
}
