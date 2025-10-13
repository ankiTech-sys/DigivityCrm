<?php

namespace App\Models\LeadManagenmentModels\MasterSetting;

use Illuminate\Database\Eloquent\Model;
use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class LeadSourceModel extends Record
{
use HasFactory, SoftDeletes;

    protected $table ='lead_source';

    protected $fillable = [
        'lead_source_name',
        'status',
        'user_id',
    ];
}
