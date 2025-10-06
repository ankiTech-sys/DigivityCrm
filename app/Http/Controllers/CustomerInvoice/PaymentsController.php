<?php

namespace App\Http\Controllers\CustomerInvoice;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceModule\SavePaymentRequest;
use App\Models\CustomerInvoice\CustomerRecordsModel;
use App\Models\CustomerInvoice\SaveInvoiceModel;
use Illuminate\Http\Request;
use App\Models\CustomerInvoice\InvoicePaymentsModel;
use App\Models\CustomerInvoice\InvoicePaymentFirstSubDetailsModel;
use App\Models\CustomerInvoice\InvoicePaymentSecondSubDetailsModel;
use Illuminate\Support\Facades\DB;



class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
        // dd($invoiceNo = generateFormNumber('invoice'));
        $customers=CustomerRecordsModel::where('is_active','yes')->get();
        return view('admin_panel.module.customerinvoice.submodule.payments.add-new-payment',compact('customers'));
    }


    public function getInvoices($customer_id)
{
   
    $invoices = SaveInvoiceModel::where('customer_id', $customer_id)
        ->with('invoiceItems') // Fetch related items if needed
        ->get()
        ->map(function ($invoice) {
            return [
                'date' => $invoice->created_at->format('Y-m-d'),
                'invoice_number' => $invoice->invoice_number,
                'invoice_amount' => number_format($invoice->subtotal_payable_amount, 2),
                'customer'=> $invoice->customer,
            ];
        });

    return response()->json($invoices);
}



    /**
     * Store a newly created resource in storage.
     */
public function store(SavePaymentRequest $request)
{
    
    $data = $request->validated();

    try {
        DB::beginTransaction();

          $pay_num= generateFormNumber('payment');
        $payment = InvoicePaymentsModel::create([
            'customer_id'      => $data['customer_id'],
            'payment_number'   =>$pay_num,
            'received_amount'  => $data['received_amount'],
            'bank_charges'     => $data['bank_charges'],
            'payment_date'     => $data['payment_date'],
            'pay_mode'         => $data['payMode'],
            'reference_number' => $data['reference_number'],
        ]);
        foreach ($data['invoices'] as $invoice) {
            InvoicePaymentFirstSubDetailsModel::create([
                'customer_id'      => $data['customer_id'],
                'payment_id'       => $payment->id,
                'invoice_number'   => $invoice['invoice_number'],
                'invoice_date'     => $invoice['date'],
                'received_amount'  => $invoice['received_amount'],
            ]);
            $invoiceRecord = SaveInvoiceModel::where('invoice_number', $invoice['invoice_number'])->with('customer')->first();
            if ($invoiceRecord) {
                $previousPaid = floatval($invoiceRecord->paid_amount ?? 0);
                $newPaid = $previousPaid + floatval($invoice['received_amount']);
                $total = floatval($invoiceRecord->subtotal_payable_amount ?? 0);
                $balance = $total - $newPaid;

                $invoiceRecord->paid_amount = $newPaid;
                $invoiceRecord->balance_amount = $balance;

                if ($balance <= 0) {
                    $invoiceRecord->status = 'paid';
                } elseif ($newPaid > 0) {
                    $invoiceRecord->status = 'partially_paid';
                }

                $invoiceRecord->save();
            }
        }
        $customer = CustomerRecordsModel::find($data['customer_id']);
        if ($customer && $customer->is_commision_based_client === 'yes' && isset($data['expenses'])) {
            foreach ($data['expenses'] as $expense) {
                InvoicePaymentSecondSubDetailsModel::create([
                    'customer_id'     => $data['customer_id'],
                    'payment_id'      => $payment->id,
                    'invoice_number'  => $expense['invoice_number'],
                    'expence_name'    => $expense['name'],
                    'quantity'    => $expense['quantity'],
                    'rate'            => $expense['rate'],
                    'amount'          => $expense['amount'],
                ]);
            }
        }

        DB::commit();

        return redirect()->route('payments.index')->with('success', 'Payment recorded successfully.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors('Error saving payment: ' . $e->getMessage());
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
