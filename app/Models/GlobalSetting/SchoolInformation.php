<?php

namespace App\Models\GlobalSetting;

use App\Models\Record;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolInformation extends Record
{
    use SoftDeletes;
    protected $table="school_information";
    protected $primaryKey="id";
    protected $fillable=[
        'school_name',
        'school_address',
        'about_school',
        'contact_no',
        'email',
        'logo',
        'financial_year',
        'deleted_at',
        'is_active',
        'user_id'
    ]; 
}
