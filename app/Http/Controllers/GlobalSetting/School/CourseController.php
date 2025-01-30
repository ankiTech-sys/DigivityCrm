<?php

namespace App\Http\Controllers\GlobalSetting\School;

use App\Http\Controllers\Controller;
use App\Models\GlobalSetting\CourseModel;
use Illuminate\Http\Request;
use App\Http\Requests\GlobalSetting\MasterSetting\CourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses=CourseModel::get();
        return view('admin_panel.module.globalsetting.MasterAdmin.courses',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $coursedata=$request->validated();
        $coursedata['is_active'] = $request->is_active == 'on' ? 'yes' : 'no';
        if(CourseModel::create($coursedata)){
            return back()->with(['success'=>'Course Record Saved Successfully !']);
        }
        else{
            return back()->with(['error'=>'Course Record Not Saved Successfully !']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course=CourseModel::find($id);
        return view('admin_panel.module.globalsetting.MasterAdmin.Edit.edit_course',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, string $id)
    {
        $coursedata=$request->validated();
        $course=CourseModel::find($id);
        $coursedata['is_active'] = $request->is_active == 'on' ? 'yes' : 'no';
        if($course->update($coursedata)){
            return back()->with(['success'=>'Course Record Updated Successfully !']);
        }
        else{
            return back()->with(['error'=>'Course Record Not Updated Successfully !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
