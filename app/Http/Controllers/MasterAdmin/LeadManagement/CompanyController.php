<?php

namespace App\Http\Controllers\MasterAdmin\LeadManagement;
use App\Http\Controllers\Controller;
use App\Models\LeadManagenmentModels\ErpCompanyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Http\Requests\LeadManagement\ErpCompanyRequest;
use  App\Repositories\MasterAdmin\LeadManagementRepository;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = (new LeadManagementRepository())->geterpcompanies();
        return view("admin_panel.module.leadmanagement.MasterAdmin.MasterSetting.define-company",compact("companies"));

    }

    /**
     * Store a newly created lead status.
     */
    public function store(ErpCompanyRequest $request)
    {
        $company = ErpCompanyModel::create($request->all());
        if($company){
        return back()->with(["success"=>"Company Created Successfully"]);
        }else{
            return back()->with(["error"=>"Company Not Created Successfully"]);
        }
    }

    /**
     * Show a single lead status.
     */     
     
    public function edit($id)
    {
        $company = ErpCompanyModel::findOrFail($id);
        return view("admin_panel.module.leadmanagement.MasterAdmin.MasterSetting.Edit.edit-erp-company", compact("company"));
    }

    /**
     * Update a lead status.
     */
    public function update(ErpCompanyRequest $request, $id)
    {

        $company = ErpCompanyModel::findOrFail($id);

        $company1 = $company->update($request->all());

        if($company1){
        return back()->with(["success"=>"Company Updated Successfully"]);
        }else{
            return back()->with(["error"=>"Company Not Updated Successfully"]);
        }
    }


}
