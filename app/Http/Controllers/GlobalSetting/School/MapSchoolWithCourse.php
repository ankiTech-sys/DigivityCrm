<?php

namespace App\Http\Controllers\GlobalSetting\School;

use App\Http\Controllers\Controller;
use App\Models\GlobalSetting\CourseModel;
use App\Models\GlobalSetting\SchoolInformation;
use Illuminate\Http\Request;
use App\Repositories\MasterAdmin\CommanRepository;

class MapSchoolWithCourse extends Controller
{
    public function index()
    {
        $courses=(new CommanRepository())->getAllCourse();
        $schools=(new CommanRepository())->getAllSchool();
        return view('admin_panel.module.globalsetting.Masteradmin.Add.school_map_with_course',compact(['courses','schools']));
    }
}
