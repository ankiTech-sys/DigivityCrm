<?php

namespace App\Repositories\MasterAdmin;

use App\Models\GlobalSetting\CourseModel;
use App\Models\GlobalSetting\SchoolInformation;
use App\Repositories\RepositoryContract;

class CommanRepository extends RepositoryContract
{
    public function getAllSchool(){
        return SchoolInformation::where('is_active','yes')->get();
    }
    public function getAllSchools(){
        return SchoolInformation::all();
    }
    public function getAllCourse(){
        return CourseModel::where('is_active','yes')->get();
    }
    public function getAllCourses(){
        return CourseModel::all();
    }
}

