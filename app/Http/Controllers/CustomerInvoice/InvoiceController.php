<?php

namespace App\Http\Controllers\CustomerInvoice;

use App\Http\Controllers\Controller;
use App\Models\CustomerInvoice\CustomerRecordsModel;
use App\Models\CustomerInvoice\SaveInvoiceItemsModel;
use App\Models\CustomerInvoice\SaveInvoiceModel;
use App\Models\GlobalSetting\CourseModel;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;
use Barryvdh\DomPDF\Facade\Pdf;
class InvoiceController extends Controller
{
    function index()
    {
        $category = CourseModel::all();
        return view('admin_panel.module.customerinvoice.submodule.generate-invoice', compact('category'));
    }


    public function getCustomers()
    {

        $customers = CustomerRecordsModel::all([
            'id',
            'primary_contact_name',
            'org_name',
            'email_address',
            'org_email_address',
            'org_country',
            'org_city',
            'pin_code',
            'w_p_contact',
            'm_contact',
            'is_active'
        ]);

        return response()->json($customers->map(function ($customer) {
            return [
                'id' => $customer->id,
                'name' => $customer->org_name,
                'short_name' => strtoupper(substr($customer->org_name, 0, 1)), // First letter
                'primary_contact_name' => $customer->primary_contact_name,
                'org_name' => $customer->org_name,
                'email_address' => $customer->email_address,
                'org_email_address' => $customer->org_email_address,
                'org_country' => $customer->org_country,
                'org_city' => $customer->org_city,
                'pin_code' => $customer->pin_code,
                'w_p_contact' => $customer->w_p_contact,
                'm_contact' => $customer->m_contact,
                'is_active' => $customer->is_active
            ];
        }));
    }


    public function saveInvoice(Request $request)
    {
       
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'invoice_number' => 'nullable',
            'invoice_date' => 'required|date',
            'payment_terms' => 'required',
            'due_date' => 'required|date',
            'invoice_items' => 'required|json', // Validate JSON format
            'status' => 'required|in:draft,sent',
            'global_discount' => 'nullable',
            'global_discount_type' => 'nullable',
            'subtotal_payable_amount' => 'required',
            'invoice_remark' => 'nullable'
        ]);
     
        if ($request->invoice_items) {
            $total_amounts = 0;
            $items = json_decode($request->invoice_items, true);
            if ((float)$items[0]['amount'] == 0.00 || (float)$items[0]['amount'] == 0 || $items[0]['amount']=="") {
                return redirect()->back()
                    ->with('error', 'Please add at least one item to invoice')
                    ->withInput();
            }
            
            foreach ($items as $item) {
                $qty = (float) $item['quantity'];
                $rate = (float) $item['rate'];
                $total_amounts += $qty * $rate;
            }
        } else {
            dd("Something went wrong, please refresh the page..!");
        }
        $invoice_num= generateFormNumber('invoice');
    //    dd($total_amounts);
        $invoice = SaveInvoiceModel::updateOrCreate(
            ['invoice_number' => $invoice_num], // Prevent duplicate invoices
            [
                'customer_id' => $request->customer_id,
                'invoice_date' => $request->invoice_date,
                'payment_terms' => $request->payment_terms,
                'due_date' => $request->due_date,
                'invoice_remark' => $request->invoice_remark,
                'status' => 'draft',
                'total_amount' => $total_amounts, 
                'global_discount' => $request->global_discount,
                'global_discount_type' => $request->global_discount_type,
                'subtotal_payable_amount' => $request->subtotal_payable_amount,
                'paid_amount' => 0,
                'balance_amount' => $request->subtotal_payable_amount,
                'user_id' => auth()->user()->id,
                'financial_year' => session('financial_year'),
            ]
        );
        

        // Save items dynamically in CustomerInvoiceItemsModel
        SaveInvoiceItemsModel::updateOrCreate(
            ['invoice_number' => $invoice_num],
            [
                'invoice_items' => json_encode($request->invoice_items), // Ensure JSON format
                'customer_id' => $request->customer_id
            ]
        );

        if ($request->status === 'sent') {
            $invoice = SaveInvoiceModel::with(['customer', 'invoiceItems'])
                ->where('invoice_number', $invoice_num)
                ->first();
            // dd($invoice);
            return redirect()->route('invoices.show', $invoice->id)->with('success', 'Invoice Created ,Now Preview and send..!');
        } else {
            return redirect()->back()->with('success', 'Invoice saved as draft!');
        }




    }
    public function showInvoice($id)
    {

        $category = CourseModel::all();
        $invoice = SaveInvoiceModel::with(['customer', 'invoiceItems'])->find($id);
        $invoices = SaveInvoiceModel::with(['customer', 'invoiceItems'])->get();

        if (!$invoice) {
            return redirect()->back()->with('error', 'Invoice not found.');
        }
        $upiId = "digivity4.09@cmsidfc";
        $payeeName = "DIGIVITY TECHNOLOGY PRIVATE LIMITED";
        $amount = $invoice->subtotal_payable_amount;
        //    dd($amount);
        $paymentUrl = "upi://pay?pa=$upiId&pn=$payeeName&mc=&tid=&tr=$invoice->invoice_number&tn=Invoice Payment&am=$amount&cu=INR";

        $qrCode = QrCode::size(120)->generate($paymentUrl);
        return view('admin_panel.module.customerinvoice.submodule.preview-invoice', compact('invoice', 'invoices', 'category', 'qrCode', 'paymentUrl'));
    }
    // Here List All Invoices 
    public function listInvoices()
    {
        $category = CourseModel::all();
        $invoices = SaveInvoiceModel::with(['customer', 'invoiceItems'])->get();
        // // Decode JSON invoice items and calculate total amount
// foreach ($invoices as $invoice) {
//     $invoice->decoded_items = $invoice->invoiceItems->map(function ($item) {
//         // Double decode because the JSON is stored as a string inside an array
//         return json_decode($item->invoice_items, true);
//     })->flatten(1); // Flatten multiple JSON arrays into a single collection

        //     // Calculate total invoice amount
//     $invoice->total_amount = $invoice->decoded_items->sum(function ($items) {
//         // Ensure that each item is decoded properly
//         $decoded_items = is_string($items) ? json_decode($items, true) : $items;

        //         return collect($decoded_items)->sum(function ($item) {
//             return isset($item['amount']) ? (float) $item['amount'] : 0;
//         });
//     });

        // Assuming balance due = total amount (modify based on payment logic)
        // $invoice->balance_due = $invoice->total_amount;
// }

        return view('admin_panel.module.customerinvoice.submodule.list-invoice-all', compact('invoices', 'category'));
    }
    public function editInvoice($id)
    {
        $category = CourseModel::all();
        $invoice = SaveInvoiceModel::with(['customer', 'invoiceItems'])->find($id);
        // dd($invoice);
        return view('admin_panel.module.customerinvoice.submodule.edit-invoice', compact('invoice', 'category'));
    }
    public function updateInvoice(Request $request, $invoice_number)
    {

        $validatedData = $request->validate([
            'customer_id' => 'required',
            'invoice_number' => 'required',
            'invoice_date' => 'required|date',
            'payment_terms' => 'required',
            'due_date' => 'required|date',
            'invoice_items' => 'required|json',
            'status' => 'required|in:draft,sent',
            'global_discount' => 'nullable',
            'global_discount_type' => 'nullable',
            'subtotal_payable_amount' => 'required',
            'invoice_remark' => 'nullable'
        ]);

        $invoice = SaveInvoiceModel::where('invoice_number', $invoice_number)->first();

        if (!$invoice) {
            return redirect()->back()->with('error', 'Invoice not found.');
        }


        $invoice->update([
            'customer_id' => $request->customer_id,
            'invoice_date' => $request->invoice_date,
            'payment_terms' => $request->payment_terms,
            'due_date' => $request->due_date,
            'invoice_remark' => $request->invoice_remark,
            'status' => $request->status,
            'global_discount' => $request->global_discount,
            'global_discount_type' => $request->global_discount_type,
            'subtotal_payable_amount' => $request->subtotal_payable_amount
        ]);


        SaveInvoiceItemsModel::updateOrCreate(
            ['invoice_number' => $invoice->invoice_number], // Find item by invoice number
            [
                'invoice_items' => json_encode($request->invoice_items), // Ensure JSON format
                'customer_id' => $request->customer_id
            ]
        );

        $message = $request->status === 'draft' ? 'Invoice updated as draft!' : 'Invoice updated and sent!';
        return redirect()->back()->with('success', $message);
    }



    public function emailPreview($invoice_number)
    {
        $category = CourseModel::all();
        $invoice = SaveInvoiceModel::where('invoice_number', $invoice_number)->firstOrFail();
        // dd($invoice->id);
        $id = $invoice->id;
        return view('admin_panel.module.customerinvoice.submodule.invoice-email-preview', compact('invoice', 'id', 'category'));
    }

    public function sendEmail(Request $request, $id)
    {
        $invoice = SaveInvoiceModel::with(['customer', 'invoiceItems'])->find($id);

        $emailData = [
            'to' => $request->to_email,
            'subject' => $request->subject,
            'message' => $request->message
        ];
        $invoiceDirectory = public_path('assets/invoices');
        $pdfFileName = 'invoice_' . $invoice->invoice_number . '.pdf';
        $pdfPath = $invoiceDirectory . '/' . $pdfFileName;
        $upiId = "8299898209@idfcfirst";
        $payeeName = "DIGIVITY TECHNOLOGY PRIVATE LIMITED";
        $amount = $invoice->subtotal_payable_amount;
        //dd($amount);
        $paymentUrl = "upi://pay?pa=$upiId&pn=$payeeName&mc=&tid=&tr=$invoice->invoice_number&tn=Invoice Payment&am=$amount&cu=INR";

        $qrCodeSvg = QrCode::format('svg')->size(120)->generate($paymentUrl);
        $qrCode = 'data:image/svg+xml;base64,' . base64_encode($qrCodeSvg);
        $invoice->qr_code = $qrCode;
        if (!file_exists($invoiceDirectory)) {
            mkdir($invoiceDirectory, 0777, true);
        }
        // dd($qrCode);
        $pdf = Pdf::loadView('admin_panel.module.customerinvoice.submodule.invoice-email-template-pdf', compact('qrCode', 'invoice'));
        $pdf->save($pdfPath);

        Mail::to($emailData['to'])->send(new InvoiceMail($emailData, $invoice, $pdfPath));
        unset($invoice->qr_code);
        $invoice->update(['status' => 'sent']);

        return back()->with('success', 'Invoice email sent successfully!');
    }

}
