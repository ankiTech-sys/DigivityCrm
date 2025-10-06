<?php

namespace App\Http\Controllers\GlobalSetting\School;

use App\Http\Controllers\Controller;
use App\Http\Requests\GlobalSetting\MasterSetting\ServiceCategoryRequest;
use App\Models\GlobalSetting\CourseModel;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys=CourseModel::get();
        return view('admin_panel.module.globalsetting.MasterAdmin.service_category',compact('categorys'));
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
    public function store(ServiceCategoryRequest $request)
    {
        // dd($request->all());
        $categorydata=$request->validated();
        // dd($categorydata);
        $categorydata['is_active'] = $request->is_active == 'on' ? 'yes' : 'no';
        // dd($coursedata);
        if(CourseModel::create($categorydata)){
            return back()->with(['success'=>'Service Category Record Saved Successfully !']);
        }
        else{
            return back()->with(['error'=>'Service Category Record Not Saved Successfully !']);
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
        // dd($id);
        $cate=CourseModel::find($id);
        
        return view('admin_panel.module.globalsetting.MasterAdmin.Edit.edit_service_category',compact('cate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceCategoryRequest $request, string $id)
    {
        // dd($request->all());
        $categorydata=$request->validated();
        // dd($categorydata);
        $category=CourseModel::find($id);
        // dd($category);
        $categorydata['is_active'] = $request->is_active == 'on' ? 'yes' : 'no';
        // dd($categorydata);
        if($category->update($categorydata)){
            return back()->with(['success'=>'Service Category Record Updated Successfully !']);
        }
        else{
            return back()->with(['error'=>'Service Category Record Not Updated Successfully !']);
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
