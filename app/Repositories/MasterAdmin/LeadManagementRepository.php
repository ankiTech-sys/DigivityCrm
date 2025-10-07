<?php
namespace App\Repositories\MasterAdmin;
use App\Models\LeadManagenmentModels\LeadStatus;
use App\Repositories\RepositoryContract;
use App\Model\Record;
class LeadManagementRepository extends RepositoryContract
{
    public function leadstatus($search=null){
        return LeadStatus::record()->get();
    }

}