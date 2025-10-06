<!DOCTYPE html>
<html>
<head>
    <title>DIGIVITY TECHNOLOGY :: CRM SYSTEM</title>
    @php
        $invoiceItems = $invoice->invoiceItems->first()->invoice_items ?? '[]';
        $decodedOnce = json_decode($invoiceItems, true);
        $items = is_string($decodedOnce) ? json_decode($decodedOnce, true) : $decodedOnce;
        if (!is_array($items)) {
            $items = [];
        }
    @endphp
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #ffffff;">

    <div style="max-width: 95%; margin: auto; background: #ffffff; padding: 20px; border: 1px solid #ddd;">
        
        <!-- Header with Logo and Invoice Details -->
        <table width="100%" style="margin-bottom: 20px;">
            <tr>
                <td>
                    <img src="{{ public_path('assets/newimage/digivitylogo.png') }}"
                         style="max-width: 220px; height: auto; display: block;" alt="Company Logo" />
                </td>
                <td align="right">
                    <strong>Invoice Number:</strong> {{ $invoice->invoice_number }}<br>
                    <strong>Created:</strong> {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M Y') }}<br>
                    <strong>Due Date:</strong> {{ \Carbon\Carbon::parse($invoice->due_date)->format('d M Y') }}
                </td>
            </tr>
        </table>

        <!-- Sender & Receiver Details -->
        <table width="100%" style="margin-bottom: 20px;">
            <tr>
                <td>
                    <strong>From:</strong><br>
                    {{ $invoice->customer->org_city ?? 'City' }}, {{ $invoice->org_state ?? 'State' }}<br>
                    {{ $invoice->org_country ?? 'Country' }}, {{ $invoice->pin_code ?? 'Pin Code' }}
                </td>
                <td align="right">
                    <strong>To:</strong><br>
                    {{ $invoice->customer->org_name }}<br>
                    {{ $invoice->customer->primary_contact_name }}<br>
                    {{ $invoice->customer->email_address }}
                </td>
            </tr>
        </table>

        <!-- Invoice Items Table -->
        <table width="100%" style="border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr style="background: #343a40; color: white;">
                    <th style="border: 1px solid #ddd; padding: 8px;">#</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Details</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Quantity</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Rate</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Discount</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Tax</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Amount</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $key => $item)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $key + 1 }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item['details'] ?? '-' }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item['quantity'] ?? '-' }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">Rs. {{ number_format($item['rate'], 2) }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item['discount'] ?? '-' }} {{ $item['discountType'] ?? '-' }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item['tax'] ?? '-' }}%</td>
                    <td style="border: 1px solid #ddd; padding: 8px;"><strong>Rs. {{ number_format($item['amount'], 2) }}</strong></td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="border: 1px solid #ddd; padding: 8px; text-align: center; color: #999;">No invoice items found</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Payment & QR Code -->
        <table width="100%" style="margin-bottom: 20px;">
            <tr>
            <td width="50%" valign="top">
    <div style="border: 1px solid #6c757d; padding: 5px; display: inline-block; border-radius: 5px;">
    @if(!empty($invoice->qr_code))
    
        <img src="{{ $invoice->qr_code }}" alt="QR Code">
@endif
      
    </div>
</td>

<td width="10%" align="left" style="padding-top:5px " valign="top">
<strong>Total:</strong><br><hr>
<strong>Discount:</strong><br><hr>
<strong>Tax:</strong><br><hr>
<strong>Balance Due:</strong> 
</td>
                <td width="15%" align="right" style="padding-top:5px " valign="top">
                     Rs. {{ number_format($invoice->subtotal_payable_amount, 2) }}<br><hr>
                     Rs. {{ number_format(($invoice->global_discount / 100) * $invoice->subtotal_payable_amount, 2) }} ({{ $invoice->global_discount }}%)<br><hr>
                     Rs. {{ number_format($invoice->tax_amount, 2) ?? 'No tax' }}<br><hr>
                     Rs. {{ number_format($invoice->subtotal_payable_amount, 2) }}
                </td>
            </tr>
        </table>
<hr>
        <!-- Signature & Remarks -->
        <table width="100%">
            <tr>
                <td width="50%" valign="top" style="text-align: center;">
                    <strong>Authorized Signature<strong/>
                    <p>__________________________</p>
                </td>
                <td width="50%"  align="right" style="text-align:center ;" valign="top">
                    <strong>Remarks:</strong><br>
                    <p>{{ $invoice->remarks ?? 'No remarks available' }}</p>
                </td>
            </tr>
        </table>

    </div>
</body>
</html>
