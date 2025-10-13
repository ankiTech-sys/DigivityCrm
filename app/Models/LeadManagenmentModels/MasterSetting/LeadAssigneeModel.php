<?php

namespace App\Models\LeadManagenmentModels\MasterSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Record;
class LeadAssigneeModel extends Record
{
    use HasFactory, SoftDeletes;

    protected $table = 'lead_assignee';

    protected $fillable = [
        'lead_assignee_name',
        'contact_no',
        'status',
        'user_id',
    ];
}
