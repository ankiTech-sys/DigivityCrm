<?php

namespace App\Repositories\MasterAdmin;

use App\Models\LeadManagenmentModels\LeadStatus;
use App\Models\LeadManagenmentModels\ErpCompanyModel;
use App\Models\LeadManagenmentModels\MasterSetting\ClientTypeModel;

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
    public function clienttype($search = null)
    {
        if ($search != null) {
            return ClientTypeModel::record()->where($search)->get();
        } else {
            return ClientTypeModel::record()->get();
        }
    }
}
