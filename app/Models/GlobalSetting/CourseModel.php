<?php

namespace App\Models\GlobalSetting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Record;
class CourseModel extends Record
{
    use SoftDeletes;
    protected $table = "service_category";
    protected $fillable=[
        'sequence',
        'category_name',
        'category_code',
        'description',
        'user_id',
        'is_active'
    ];
}
