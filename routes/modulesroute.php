<?php
use App\Http\Controllers\CustomerInvoice\CustomerControler;
use App\Http\Controllers\CustomerInvoice\InvoiceController;
use App\Http\Controllers\CustomerInvoice\PaymentsController;
use App\Models\CustomerInvoice\CustomerRecordsModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerInvoice\IndexController;
use App\Http\Controllers\MasterAdmin\LeadManagement\LeadManagementController;
use App\Http\Controllers\MasterAdmin\LeadManagement\ImportClientsController;
use App\Http\Controllers\MasterAdmin\LeadManagement\LeadStatusController;


Route::prefix('Admin/customer-billing')->group(function () {
    Route::get('/index', [IndexController::class, 'index'])->name('admin.module.index');
    // Route::post('create', [FinancialController::class, 'store'])->name('admin.global-setting.create-financialYear');
    //Route::get('admin/global-setting/edit/financialYear/{id}',[FinancialController::class,'edit'])->name('admin.global-setting.edit.financialYear')->middleware(['auth','verified']);
    //Route::put('admin/global-setting/edit/financialY ear/{id}',[FinancialController::class,'update'])->name('admin.global-setting.edit.financialYear')->middleware(['auth','verified']);
})->middleware(['auth', 'verified']);

Route::prefix('Admin/customer-billing')->group(function () {
    Route::get('/indexs',[CustomerControler::class,'index'])->name('admin_panel.module.customerinvoice.submodule.customer_list');
    Route::post('add-customer', [CustomerControler::class, 'addCustomer'])->name('admin.module.cutomerinvoice.add_customer');
    Route::get('/edit-customer/{id}',[CustomerControler::class,'edit'])->name(' admin.global-setting.edit.edit_customer')->middleware(['auth','verified']);
    Route::put('/update-customer/{id}',[CustomerControler::class,'update'])->name(' admin.global-setting.edit.edit_customer')->middleware(['auth','verified']);   
})->middleware(['auth', 'verified']);





Route::prefix('Admin/customer-billing')->group(function () {
    Route::get('/genrate-invoice', [InvoiceController::class, 'index'])->name('admin_panel.module.load-generate-invoice');
    Route::get('/customers/get', [InvoiceController::class, 'getCustomers'])->name('customers.get');
    Route::get('/customers/{id}', [InvoiceController::class, 'getCustomerDetails'])->name('customer.details');
    Route::post('/invoice/generate', [InvoiceController::class, 'saveInvoice'])->name('admin_panel.module.customerinvoice.saveInvoice');
    Route::post('/invoice/preview', [InvoiceController::class, 'previewInvoice'])->name('admin_panel.module.customerinvoice.previewInvoice');
    Route::get('/invoice/list', [InvoiceController::class, 'listInvoices'])->name('admin_panel.module.customerinvoice.list');
    Route::get('/invoices/{id}', [InvoiceController::class, 'showInvoice'])->name('invoices.show');
    Route::get('/invoice/edit/{id}', [InvoiceController::class, 'editInvoice'])->name('admin_panel.module.customerinvoice.edit');
    Route::put('/invoice/update/{invoice_number}', [InvoiceController::class, 'updateInvoice'])->name('admin_panel.module.customerinvoice.updateInvoice');
    Route::post('/invoice/send/{invoice_number}', [InvoiceController::class, 'sendInvoice'])->name('invoice.send');
    Route::get('/invoice/email-preview/{invoice_number}', [InvoiceController::class, 'emailPreview'])->name('invoice.emailPreview');
    Route::post('/invoice/send-email/{id}', [InvoiceController::class, 'sendEmail'])->name('invoice.sendEmail');
    
    // Route::get('/invoice/send/{invoice_number}', [InvoiceController::class, 'generateAndSend'])->name('invoice.generateAndSend');
    // Route::post('/invoice/mail', [InvoiceController::class, 'sendMail'])->name('invoice.sendMail');

})->middleware(['auth', 'verified']);
Route::prefix('Admin/customer-billing/payments')->group(function () {
    Route::get('/reocrd-new-payments', [PaymentsController::class, 'index'])->name('admin.module.cutomerinvoice.payments.add-new-payment');
    // Route::get('/customers/get', [InvoiceController::class, 'getCustomers'])->name('customers.get');
    Route::get('/get-invoices/{customer_id}', [PaymentsController::class, 'getInvoices']);
    
    Route::post('/record-payment', [PaymentsController::class, 'store'])->name('admin_panel.module.customerinvoice.payment.save');

})->middleware(['auth', 'verified']);



// Routes Starts For The Lead Management
Route::prefix('Admin/LeadManagement/')->group(function () {
    Route::get("index",[LeadManagementController::class,'index'])->name("leadmanagement");

    Route::get('ImportClients',[ImportClientsController::class,'index'])->name("leadmanagement-client-imports");
    Route::post('ImportClientsPreview',[ImportClientsController::class,'clientspreview'])->name("leadmanagement-client-imports-data-preview");



    // Lead Status Controller Section Start Here
    Route::get("LeadStatus",[LeadStatusController::class,'index'])->name("lead-statuss");
    Route::post("CreateLeadStatus",[LeadStatusController::class,'store'])->name("create-lead-status");
    Route::get("EditViewLeadStatus/{id}",[LeadStatusController::class,'edit'])->name("edit-lead-status");
    Route::put("UpdateLeadStatus/{id}",[LeadStatusController::class,'update'])->name("update-lead-status");
})->middleware(['auth', 'verified']);;
?>