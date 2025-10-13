<?php

namespace App\Repositories\MasterAdmin;

use App\Models\LeadManagenmentModels\LeadStatus;
use App\Models\LeadManagenmentModels\ErpCompanyModel;
use App\Models\LeadManagenmentModels\MasterSetting\ClientTypeModel;
use App\Models\LeadManagenmentModels\MasterSetting\LeadSourceModel;
use App\Models\LeadManagenmentModels\MasterSetting\LeadAssigneeModel;
use App\Repositories\RepositoryContract;

class LeadManagementRepository extends RepositoryContract
{
    public function leadstatus($search = null)
    {
        if ($search != null) {
            return LeadStatus::record()->where($search)->get();
        } else {
            return LeadStatus::record()->get();
        }
    }

    public function geterpcompanies($search = null)
    {
        if ($search != null) {
            return ErpCompanyModel::record()->where($search)->get();
        } else {
            return ErpCompanyModel::record()->get();
        }
    }
    public function getclienttypes($search = null)
    {
        if ($search != null) {
            return ClientTypeModel::record()->where($search)->get();
        } else {
            return ClientTypeModel::record()->get();
        }
    }

    public function leadSources($search = null){
           if ($search != null) {
            return LeadSourceModel::record()->where($search)->get();
        } else {
            return LeadSourceModel::record()->get();
        }
    }

    public function leadAssignees($search = null){
        if ($search != null) {
            return LeadAssigneeModel::record()->where($search)->get();
        } else {
            return LeadAssigneeModel::record()->get();
        }
    }
}
