<?php

namespace App\Models\GlobalSetting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Record;
class CourseModel extends Record
{
    use SoftDeletes;
    protected $table = "courses";
    protected $fillable=[
        'sequence',
        'course_name',
        'course_code',
        'course_full_name',
        'user_id',
        'is_active'
    ];
}
