<?php
namespace App\Http\Controllers\MasterAdmin\LeadManagement;
use App\Http\Controllers\Controller;
use App\Repositories\MasterAdmin\LeadManagementRepository;
use Illuminate\Http\Request;
class ClientRegistrationController extends Controller{


    public function index(){

        $erpcompanies = (new LeadManagementRepository())->geterpcompanies();
        return view("admin_panel.module.leadmanagement.MasterAdmin.Clients.ClientRegistration", compact('erpcompanies'));
    }

    public function store(Request $request){
        dd($request->all());
    }
}
?>