<?php
namespace App\Http\Controllers\MasterAdmin\LeadManagement;
use App\Http\Controllers\Controller;
use App\Repositories\MasterAdmin\LeadManagementRepository;
use Illuminate\Http\Request;
class ClientRegistrationController extends Controller{


    public function index(){

        $erpcompanies = (new LeadManagementRepository())->geterpcompanies();
        $clienttypes = (new LeadManagementRepository())->getclienttypes();
        $clientstatuses = (new LeadManagementRepository())->leadstatus();
        return view("admin_panel.module.leadmanagement.MasterAdmin.Clients.ClientRegistration", compact('erpcompanies','clienttypes','clientstatuses'));
    }

    public function store(Request $request){
        dd($request->all());
    }
}
?>