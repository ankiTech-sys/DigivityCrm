<?php

namespace App\Http\Controllers\GlobalSetting\School;

use App\Http\Controllers\Controller;
use App\Http\Requests\GlobalSetting\MasterSetting\CreateSchool;
use App\Models\GlobalSetting\SchoolInformation;
use Illuminate\Http\Request;
use Session\Session;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schoolinformation=SchoolInformation::get();
        return view('admin_panel.module.globalsetting.MasterAdmin.school',compact('schoolinformation'));
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
    public function store(CreateSchool $request)
    {
        $data=$request->validated();
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $path = 'uploads/school_logos/';
            $fileName = compressImageToSize($file, $path, 250);
            $data['logo'] = $fileName;
        }
        $data['is_active'] = $request->is_active == 'on' ? 'yes' : 'no';
        if(SchoolInformation::create($data)){
            return back()->with(['success'=>'School Record Saved Successfully !']);
        }
        else{
            return back()->with(['error'=>'School Record Not Saved Successfully !']);
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
        $schoolinformation=SchoolInformation::find($id);
        return view('admin_panel.module.globalsetting.MasterAdmin.Edit.edit_school',compact('schoolinformation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateSchool $request, string $id)
    {
        $schoolinformation = SchoolInformation::find($id);
        if (!$schoolinformation) {
            return back()->with(['error' => 'School Record Not Found']);
        }
    
        $updatedata = $request->validated();
    
        // Handle Logo Upload
        if ($request->hasFile('logo')) {
            if ($schoolinformation->logo) {
                deleteImage('uploads/school_logos/' . $schoolinformation->logo);
            }
    
            $file = $request->file('logo');
            $path = 'uploads/school_logos/';
            $fileName = compressImageToSize($file, $path, 250);
            $updatedata['logo'] = $fileName;
        }

        $updatedata['is_active'] = $request->is_active == 'on' ? 'yes' : 'no';
        // Update Record
        if ($schoolinformation->update($updatedata)) {
            return back()->with(['success' => 'School Record Successfully Updated']);
        } else {
            return back()->with(['error' => 'School Record Not Successfully Updated']);
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
