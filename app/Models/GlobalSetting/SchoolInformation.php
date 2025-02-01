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
        'print_certificate_school_name',
        'no_of_student',
        'about_school',
        'phone_no',
        'principle_name',
        'principle_mobile_no',
        'principle_email',
        'email',
        'logo',
        'financial_year',
        'deleted_at',
        'is_active',
        'user_id'
    ]; 
}
