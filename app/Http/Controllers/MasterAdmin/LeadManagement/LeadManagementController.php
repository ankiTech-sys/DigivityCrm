<?php
namespace App\Http\Controllers\MasterAdmin\LeadManagement;
use App\Http\Controllers\Controller;

class LeadManagementController extends Controller{

    public function index(){
        return view("admin_panel.module.leadmanagement.index");
    }
}
?>