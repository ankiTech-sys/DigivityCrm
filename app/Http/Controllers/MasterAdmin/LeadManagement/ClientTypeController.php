<?php

namespace App\Http\Controllers\MasterAdmin\LeadManagement;
use App\Http\Controllers\Controller;
use App\Models\LeadManagenmentModels\MasterSetting\ClientTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Http\Requests\LeadManagement\ClientTypeRequest;
use  App\Repositories\MasterAdmin\LeadManagementRepository;

class ClientTypeController extends Controller
{

    public function index()
    {
        $clientTypes = (new LeadManagementRepository())->clienttype();

        return view("admin_panel.module.leadmanagement.MasterAdmin.MasterSetting.define-client-type",compact("clientTypes"));

    }

    /**
     * Store a newly created lead status.
     */
    public function store(ClientTypeRequest $request)
    {
        $data = $request->validated();
       
        $clientType = ClientTypeModel::create($data);
        if($clientType){
        return back()->with(["success"=>"Client Type Created Successfully"]);
        }else{
            return back()->with(["error"=>"Client Type Not Created Successfully"]);
        }
    }

    /**
     * Show a single lead status.
     */     
     
    public function edit($id)
    {
        $clientType = ClientTypeModel::findOrFail($id);
    
        return view("admin_panel.module.leadmanagement.MasterAdmin.MasterSetting.Edit.edit-client-type", compact("clientType"));
    }

    /**
     * Update a lead status.
     */
    public function update(ClientTypeRequest $request, $id)
    {

        $clientType = ClientTypeModel::findOrFail($id);
        $data = $request->validated();
        $clientType1 = $clientType->update($data);

        if($clientType1){
        return back()->with(["success"=>"Client Type Updated Successfully"]);
        }else{
            return back()->with(["error"=>"Client Type Not Updated Successfully"]);
        }
    }


}
