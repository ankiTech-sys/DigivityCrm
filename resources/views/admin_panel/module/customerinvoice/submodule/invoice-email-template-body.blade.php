<!DOCTYPE html>
<html>
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice from Digivity Technology</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 10px;
        }
        .content {
            margin: 20px 0;
            color: #333;
        }
        .content h2 {
            color:rgb(255, 153, 0);
            margin-bottom: 10px;
        }
        .content p {
            margin: 5px 0;
            color: #555;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .cta {
            display: inline-block;
            background:rgb(255, 153, 0);
            color: white !important;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        .cta:hover {
            background:rgb(179, 110, 0);
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>DIGIVITY TECHNOLOGY</h1>
        </div>

        <div class="content">
            <h2>Dear {{ $invoice->customer->primary_contact_name }},</h2>
            <p>{{ $emailData['message'] }}</p>

            <p><strong>Invoice Number:</strong> {{ $invoice->invoice_number }}</p>
            <p><strong>Invoice Date:</strong> {{ $invoice->invoice_date }}</p>
            <p><strong>Total Amount:</strong> ₹{{ $invoice->subtotal_payable_amount }}</p>

            <p>If you have any questions or require any modifications, feel free to contact us.</p>
        </div>

        <div class="footer">
            <p>Thank you for choosing Digivity Technology.</p>
            <a href="" class="cta">View Invoice</a>
            <p>For any queries, contact us at <a href="mailto:support@digivitytech.com">support@digivitytech.com</a></p>
        </div>
    </div>

</body>
</html>
