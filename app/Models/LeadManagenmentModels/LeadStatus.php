<?php

namespace App\Models\LeadManagenmentModels;
use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadStatus extends Record
{
    use HasFactory, SoftDeletes;

    protected $table ='lead_statuses';

    protected $fillable = [
        'name',
        'description',
        'status',
        "default_at",
        'user_id',
    ];
}
