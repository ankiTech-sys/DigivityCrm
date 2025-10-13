<?php
use App\Repositories\MasterAdmin\LeadManagementRepository;


if (!function_exists('leadStatus')) {
    function leadStatus($status = null)
    {
        return (new LeadManagementRepository())->leadstatus(["status"=>"yes"]);
    }
}

if(!function_exists("clientTypes")) {
    function clientTypes($type = null)
    {
     
     return (new LeadManagementRepository())->getclienttypes(["status"=>"yes"]);
    }
}

if(!function_exists("erpCompanies")) {
    function erpCompanies($company = null)
    {
        return (new LeadManagementRepository())->geterpcompanies(["status"=>"yes"]);
    }
}


if(!function_exists("leadSources")) {
    function leadSources($leadsource = null)
    {
        return (new LeadManagementRepository())->leadSources(["status"=>"yes"]);
    }
}