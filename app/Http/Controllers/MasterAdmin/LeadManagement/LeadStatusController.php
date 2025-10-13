<?php

namespace App\Http\Controllers\MasterAdmin\LeadManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeadManagement\LeadStatusRequest;
use App\Models\LeadManagenmentModels\LeadStatus;
use App\Repositories\MasterAdmin\LeadManagementRepository;

class LeadStatusController extends Controller
{
    public function index()
    {
        $statuss = (new LeadManagementRepository)->leadstatus();

        return view('admin_panel.module.leadmanagement.MasterAdmin.MasterSetting.lead-status', compact('statuss'));

    }

    /**
     * Store a newly created lead status.
     */
    public function store(LeadStatusRequest $request)
    {
        $status = LeadStatus::create($request->all());
        if ($request->has('default_at') && $request->default_at == 'yes') {
            LeadStatus::update(['default_at' => 'no']);
        }

        if ($status) {
            return back()->with(['success' => 'Lead Status Created Successully Done']);
        } else {
            return back()->with(['error' => 'Lead Status Not Creaated Successully Done']);
        }
    }

    /**
     * Show a single lead status.
     */
    public function edit($id)
    {
        $status = LeadStatus::findOrFail($id);

        return view('admin_panel.module.leadmanagement.MasterAdmin.MasterSetting.Edit.edit-lead-status', compact('status'));
    }

    /**
     * Update a lead status.
     */
    public function update(LeadStatusRequest $request, $id)
    {

        $status = LeadStatus::findOrFail($id);

        if ($request->has('default_at') && $request->default_at == 'yes') {
            LeadStatus::where('id', '!=', $id)->update(['default_at' => 'no']);
        }

        $status1 = $status->update($request->all());

        if ($status1) {
            return back()->with(['success' => 'Lead Status Updated Successfully']);
        } else {
            return back()->with(['error' => 'Lead Status Not Updated Successfully']);
        }
    }
}
