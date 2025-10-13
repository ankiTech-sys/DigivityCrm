<?php

namespace App\Http\Controllers\MasterAdmin\LeadManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LeadManagement\LeadAssigneeRequest;
use App\Models\LeadManagenmentModels\MasterSetting\LeadAssigneeModel;
use App\Repositories\MasterAdmin\LeadManagementRepository;
use App\Models\Record;
class LeadAssignedToController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leadassignees = (new LeadManagementRepository())->leadAssignees();
        return view("admin_panel.module.leadmanagement.MasterAdmin.MasterSetting.lead-assigned-to",compact("leadassignees"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeadAssigneeRequest $request)
    {
        if(LeadAssigneeModel::create($request->all())){
            return back()->with(["success"=>"Record Saved Successfully Done"]);
        }else{
            return back()->with(["error"=>"Record Not Saved Successfully Done"]);
        } 
    }

 
    public function edit(string $id)
    {
        $leadassignee = LeadAssigneeModel::where("id",$id)->record()->first();
         return view("admin_panel.module.leadmanagement.MasterAdmin.MasterSetting.Edit.edit-lead-assigned-to",compact("leadassignee"));
    }

    public function update(LeadAssigneeRequest $request, string $id)
    {
        $leadassignee = LeadAssigneeModel::findOrFail($id);
        $company1 = $leadassignee->update($request->all());
        if($company1){
        return back()->with(["success"=>"Record Updated Successfully"]);
        }else{
            return back()->with(["error"=>"Record Not Updated Successfully"]);
        }
    }
}
