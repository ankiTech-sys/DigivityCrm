<?php

namespace App\Http\Controllers\CustomerInvoice;

use App\Http\Controllers\Controller;

use App\Models\CustomerInvoice\CustomerRecordsModel;
use App\Models\GlobalSetting\CourseModel;
use Illuminate\Http\Request;

class CustomerControler extends Controller
{
    public function index()
    {
        $category=CourseModel::all();
        $customers=CustomerRecordsModel::all();
        return view('admin_panel.module.customerinvoice.submodule.customers' ,compact('category','customers'));

    }
    public function addCustomer(Request $request)
{
    $validatedData = $request->validate([
        'service_category_id' => 'required|integer',
        'customer_type' => 'required|',
        'salutation_pr' => 'required|string|max:10',
        'fname' => 'required|string|max:50',
        'lname' => 'nullable|string|max:50',
        'org_name' => 'required|string|max:255',
        'email_address' => 'required|email|unique:billing_customer_table,email_address',
        'org_email_address' => 'nullable|email',
        'org_country' => 'required|string|max:100',
        'org_city' => 'required|string|max:100',
        'pin_code' => 'required|digits:6',
        'w_p_contact' => 'required|digits_between:10,15',
        'm_contact' => 'nullable|digits_between:10,15',
        'referred_by_name'=> 'nullable|string|max:100',
        'persentage_commission'=> 'nullable|numeric',
        'ref_by_email'=> 'nullable|email',
    ]);

    // Combine salutation, fname, and lname
    $primary_contact_name = $request->salutation_pr . ' ' . $request->fname;
    if (!empty($request->lname)) {
        $primary_contact_name .= ' ' . $request->lname;
    }
    

    // Prepare data for insertion
    $data = $request->except(['salutation_pr', 'fname', 'lname']);
    $data['primary_contact_name'] = $primary_contact_name;
    $data['is_active'] = $request->is_active === 'on' ? 'yes' : 'no';
    $data['is_commision_based_client'] = $request->is_commision_based_client === 'on' ? 'yes' : 'no';
    // Ensure m_contact is not null (set default empty string if null)
    $data['m_contact'] = $request->m_contact ?? '';
  
    // Save the data and handle response
    if (CustomerRecordsModel::create($data)) {
        return redirect()->route('admin.module.index')->with('success', 'Customer added successfully');
    } else {
        return back()->withErrors(['error' => 'Failed to add customer'])->withInput();
    }
}
    public function edit(string $id){

        $customer=CustomerRecordsModel::find($id);
        return view('admin_panel.module.globalsetting.Masteradmin.Edit.edit_customer',compact('customer'));
    

    }



}    