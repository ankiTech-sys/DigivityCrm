<?php

namespace App\Http\Controllers\MasterAdmin\LeadManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LeadManagement\LeadSourceRequest;
use App\Models\LeadManagenmentModels\MasterSetting\LeadSourceModel;
use App\Repositories\MasterAdmin\LeadManagementRepository;
use App\Models\Record;
class LeadSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leadsources = (new LeadManagementRepository())->leadSources();
        return view("admin_panel.module.leadmanagement.MasterAdmin.MasterSetting.lead-source",compact("leadsources"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeadSourceRequest $request)
    {
        if(LeadSourceModel::create($request->all())){
            return back()->with(["success"=>"Record Saved Successfully Done"]);
        }else{
            return back()->with(["error"=>"Record Not Saved Successfully Done"]);
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
        $leadsource = LeadSourceModel::where("id",$id)->record()->first();
         return view("admin_panel.module.leadmanagement.MasterAdmin.MasterSetting.Edit.edit-lead-source",compact("leadsource"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeadSourceRequest $request, string $id)
    {
        $leadsource = LeadSourceModel::findOrFail($id);

        $company1 = $leadsource->update($request->all());

        if($company1){
        return back()->with(["success"=>"Record Updated Successfully"]);
        }else{
            return back()->with(["error"=>"Record Not Updated Successfully"]);
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
