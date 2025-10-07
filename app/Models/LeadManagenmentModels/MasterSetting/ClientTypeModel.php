<?php

namespace App\Models\LeadManagenmentModels\MasterSetting;
use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientTypeModel extends Record
{
    use HasFactory, SoftDeletes;

    protected $table ='lead_management_client_types';

    protected $fillable = [
        'client_type',
        'status',
        'user_id',
    ];
}
