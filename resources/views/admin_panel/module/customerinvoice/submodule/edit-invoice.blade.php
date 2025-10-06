<!-- Module: Customer Invoice  -->
<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->


@section('main-content')

    {{-- main section start here --}}
    @include('admin_panel.module.customerinvoice.sub-navbar.billing-navbar');
    {{-- main section end here --}}
    <!-- <h1>Customer Invoice</h1> -->
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                });
            });
        </script>
    @endif

    @php

        // Fetch the invoice_items safely
        $invoiceItems = $invoice->invoiceItems->first()->invoice_items ?? '[]';

        // First decode: Convert JSON string into another JSON string (if double-encoded)
        $decodedOnce = json_decode($invoiceItems, true);

        // Second decode: Ensure we get an array from the double-encoded string
        $items = is_string($decodedOnce) ? json_decode($decodedOnce, true) : $decodedOnce;
        // Ensure it's a valid array
        if (!is_array($items)) {
            $items = [];
        }
    @endphp
    <!-- Include FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        #customerDetails {
            background:white;
            padding: 15px;
            border-radius: 8px;
            /* box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.1); */
            /* margin-top: 10px; */
        }

        #customerDetails h4 {
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
            margin-bottom: 15px;
            color: #007bff;
        }

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .details-grid p {
            margin: 5px 0;
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .details-grid strong {
            color: #333;
            margin-left: 8px;
        }

        .details-grid i {
            color:crimson;
            font-size: 16px;
        }

        #customerSelect {
            border-radius: 5px;
            padding: 8px;
            font-size: 16px;
        }
        .fc{
            border-radius: 5px;
            padding: 8px;
            font-size: 16px; 
        }
        .invoice-heading {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            display: flex;
            align-items: center;
        }

        .invoice-heading i {
            margin-right: 10px;
            font-size: 28px;
            color: #28a745;
        }

        .sub-heading {
            font-size: 16px;
            color: #555;
            margin-top: 5px;
        }
    </style>


    <!-- Customer Details  -->
    <div class="container-fluid">
    <h2 class="invoice-heading">
        <i class="fas fa-file-invoice-dollar"></i> Smart Invoice Creation
    </h2>
    <hr>
    </div>
    <form id="invoiceForm" action="{{ route('admin_panel.module.customerinvoice.updateInvoice', $invoice->invoice_number) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="invoice_items" id="invoiceItemsJson"> <!-- Stores all dynamic items -->
        <input type="hidden" name="status" id="invoiceStatus"> <!-- Stores draft or sent status -->


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
           <div class="row">
            <div class="col-sm-12">
            <fieldset class="form-fieldset mx-3 mb-3">
            <legend class="bg-info text-light rounded-2" >Customer Information</legend>
                <div class="col-sm-12 form-group">

            <label class="form-label">Select Customer <span class="text-danger">*</span></label>
            <select name="customer_id" class="form-control" readonly>
        <option value="">Select Customer</option>
        <option value="{{ $invoice->customer->id ?? '' }}" selected>
            {{ $invoice->customer->primary_contact_name ?? '' }}
        </option>
    </select>

                </div>
                <div class="col-sm-12 form-group">
        <label class="form-label">Invoice# <span class="text-danger">*</span></label>
        <input type="text" class="form-control input-sm" value="{{ $invoice->invoice_number }}" name="invoice_number" id="invoiceNumber" readonly>
    </div>


            </fieldset>
            </div>
           </div>
            </div>
            <div class="col-sm-7 ms-auto me-3">
        <div id="customerDetails"  class=" border rounded-3 p-3">
            <!-- Header with Background Color -->
            <div class="bg-info text-white p-2 rounded-2">
                <h4 class="mb-0 text-light"><i class="fas fa-user"></i> Customer Details</h4>
            </div>

            <!-- Customer Details Content -->
            <div class="details-grid p-3">
                <p><i class="fas fa-user"></i> <strong>Contact Name:</strong> <span >{{ $invoice->customer->primary_contact_name }}</span></p>
                <p><i class="fas fa-building"></i> <strong>Organization:</strong> <span >{{ $invoice->customer->org_name }}</span></p>
                <p><i class="fas fa-envelope"></i> <strong>Email:</strong> <span id="email">{{ $invoice->customer->email_address }}</span></p>
                <p><i class="fas fa-envelope-open-text"></i> <strong>Org Email:</strong> <span id="orgEmail">{{ $invoice->customer->org_email_address }}</span></p>
                <p><i class="fas fa-globe"></i> <strong>Country:</strong> <span id="country">{{ $invoice->customer->org_country }}</span></p>
                <p><i class="fas fa-city"></i> <strong>City:</strong> <span id="city">{{ $invoice->customer->org_city }}</span></p>
                <p><i class="fas fa-map-pin"></i> <strong>PIN Code:</strong> <span id="pinCode">{{ $invoice->customer->pin_code }}</span></p>
                <p><i class="fab fa-whatsapp"></i> <strong>WhatsApp Contact:</strong> <span id="wpContact">{{ $invoice->customer->w_p_contact }}</span></p>
            </div>
        </div>
    </div>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="row mt-2">
                    <div class="col-sm-12">
                        <fieldset class="form-fieldset mx-3 mb-3">
                        <legend class="bg-info text-light rounded-2" style="">Date & Term</legend>
                        <div class="row">
                        <div class="col-sm-4 form-group">
        <label class="form-label">Invoice Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control input-sm" value="{{ \Illuminate\Support\Carbon::parse($invoice->invoice_date)->format('Y-m-d') }}" name="invoice_date" id="invoiceDate">
    </div>
    <div class="col-sm-4 form-group">
        <label class="form-label">Payment Terms <span class="text-danger">*</span></label>
        <select class="form-control input-sm" name="payment_terms" id="paymentTerms">
            <option value="">**Select Payment Term</option>
            <option value="due_end_month" @if($invoice->payment_terms == 'due_end_month') selected @endif>Due End of the Month</option>
            <option value="net_7" @if($invoice->payment_terms == 'net_7') selected @endif>Net 7 Days</option>
            <option value="net_15" @if($invoice->payment_terms == 'net_15') selected @endif>Net 15 Days</option>
            <option value="net_30" @if($invoice->payment_terms == 'net_30') selected @endif>Net 30 Days</option>
            <option value="net_45" @if($invoice->payment_terms == 'net_45') selected @endif>Net 45 Days</option>
            <option value="net_60" @if($invoice->payment_terms == 'net_60') selected @endif>Net 60 Days</option>
            <option value="due_on_receipt" @if($invoice->payment_terms == 'due_on_receipt') selected @endif>Due on Receipt</option>
            <option value="custom" @if($invoice->payment_terms == 'custom') selected @endif>Custom</option>
        </select>
    </div>
    <div class="col-sm-4 form-group">

        <label class="form-label">Due Date <span class="text-danger">*</span></label>
        <input type="date" class="form-control input-sm" value="{{ \Illuminate\Support\Carbon::parse($invoice->due_date)->format('Y-m-d') }}" name="due_date" id="dueDate">
    </div>
    </div>
    </fieldset>

                </div>
            </div>
        </div>
    </div>
    </div>
     <!-- Items Table  -->
     <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <fieldset class="form-fieldset mx-3 mb-3">
                <legend class="bg-info text-light rounded-2">Items Table</legend>
                <table class="table table-bordered">
                   <thead class="bg-light">
                      <tr>
                         <th><i class="fas fa-info-circle"></i> Item Details</th>
                         <th><i class="fas fa-sort-numeric-up"></i> Quantity</th>
                         <th>&#8377;Rate</th>
                         <th><i class="fas fa-percent"></i> Discount</th>
                         <th><i class="fas fa-percentage"></i> Tax (%)</th>
                         <th><i class="fas fa-calculator"></i> Amount</th>
                         <th><i class="fas fa-trash-alt"></i> Remove</th>
                      </tr>
                   </thead>
                   <tbody id="invoiceItems">
                   @forelse ($items as $key => $item)
                                   <tr>
                                   <td><input type="text" class="form-control item-details" value="{{ $item['details'] ?? '' }}" placeholder="Item Details"></td>
                                   <td><input type="number" class="form-control quantity" value="{{ $item['quantity'] ?? '' }}" min="1"></td>
                                         <td><input type="number" class="form-control rate" value="{{ number_format($item['rate'], 2) }}" min="0"></td>
                                         <td>
                                            <div class="input-group">
                                               <input type="number" class="form-control discount w-75" value="{{ $item['discount'] ?? '' }}" min="0">
                                               <select class="form-select discount-type w-25">
                                                  <option value="%" @if(($item['discountType'] ?? '') == '%') selected @endif>%</option>
                                                  <option value="₹" @if(($item['discountType'] ?? '') == '₹') selected @endif>₹</option>
                                               </select>
                                            </div>
                                         </td>
                                         <td><input type="number" class="form-control tax" readonly value="0" min="0"></td>
                                         <td><input type="text" class="form-control amount" value="{{ number_format($item['amount'], 2) }}" readonly></td>
                                         <td class="text-center">
                        <button type="button" class="btn btn-danger mb-1 removeRow">X</button>
                    </td>  

                                </tr>
                   @empty
                                      <tr class="itemRow">
                                         <td><input type="text" class="form-control item-details" placeholder="Item Details"></td>
                                         <td><input type="number" class="form-control quantity" value="1" min="1"></td>
                                         <td><input type="number" class="form-control rate" value="0" min="0"></td>
                                         <td>
                                            <div class="input-group">
                                               <input type="number" class="form-control discount w-75" value="0" min="0">
                                               <select class="form-select discount-type w-25">
                                                  <option value="%">%</option>
                                                  <option value="₹">₹</option>
                                               </select>
                                            </div>
                                         </td>
                                         <td><input type="number" class="form-control tax" readonly value="0" min="0"></td>
                                         <td><input type="text" class="form-control amount" readonly></td>
                                         <td class="text-center">
                        <button type="button" class="btn btn-danger mb-1 removeRow">X</button>
                    </td>
                                      </tr>
                  @endforelse
                   </tbody>
                </table>

                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-sm-4 p-0 ">
                            <fieldset class="form-fieldset   mb-2">
                                <legend class="bg-info text-light rounded-2" >Global Discount</legend>
                                <div class="input-group d-inline-flex">
                                    <input type="number" id="globalDiscount" name="global_discount" class="form-control input-sm w-75" value="{{ $invoice->global_discount }}" min="0">
                                    <select id="globalDiscountType" name="global_discount_type" class="form-select input-sm w-25">
                                        <option value="percentage" @if($invoice->global_discount_type == 'percentage') selected @endif>%</option>
                                        <option value="rupee" @if($invoice->global_discount_type == 'rupee') selected @endif>₹</option>
                                    </select>
                                </div>
                            </fieldset> 
                        </div>
                        <div class="col-sm-2">  <button id="addMore" type="button" class="btn btn-primary mt-3">Add More Item</button></div>
                    </div>
                </div>

             </fieldset>
          </div>
       </div>

       <!-- Invoice Summary Section -->
       <div class="row mt-4 mb-4">
       <div class="col-sm-6">
        <div class="accordion " id="invoiceSummaryAccordion">
            <!-- Accordion Header -->
            <div class="accordion-item  ms-3 rounded-3 border border-1 border-info">
                <h2 class="accordion-header" >
                    <button class="accordion-button bg-info text-white" style="height: 40px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSummary" aria-expanded="true" aria-controls="collapseSummary">
                        <strong><i class="fas fa-money-bill-wave"></i> Total Amount: ₹ <span id="totalAmount" class="text-light">0.00</span></strong>
                    </button>
                </h2>

                <!-- Accordion Body -->
                <div id="collapseSummary" class="accordion-collapse collapse show" data-bs-parent="#invoiceSummaryAccordion">
                    <div class="accordion-body bg-light">
                    <p class="d-flex justify-content-between">
        <strong style="color: #007bff;"><i class="fas fa-box"></i> No. of Items:</strong> 
        <span id="totalItems" class="text-primary">1</span>
    </p>
    <p class="d-flex justify-content-between">
        <strong style="color: #28a745;"><i class="fas fa-tags"></i> Total Discount:</strong> 
        <span class="text-success">₹ <span id="totalDiscount">0.00</span></span>
    </p>
    <p class="d-flex justify-content-between">
        <strong style="color: #ff5722;"><i class="fas fa-receipt"></i> Subtotal Payable Amount:</strong> 
        <span class="text-danger">₹ <span id="subtotalPayable">0.00</span></span>
        <input type="hidden"  id="subtotal_payable_amount" name="subtotal_payable_amount">
    </p>
    <p class="d-flex justify-content-between">
                            <strong class="w-50"><i class="fas fa-calendar-alt"></i> Invoice Remark:</strong>
                            <textarea class="form-control input-sm w-50" name="invoice_remark" id="invoiceRemark" rows="3" placeholder="Enter any remarks here..."></textarea>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-sm-4 ms-auto me-3">
        <div class="d-flex justify-content-end mt-2">
        <!-- Save as Draft Button -->
        <button class="btn btn-secondary me-2" id="saveDraft">
            <i class="fas fa-file-alt"></i> Save as Draft
        </button>

        <!-- Save and Send Button -->
        <button class="btn btn-primary me-2" id="saveAndSend">
            <i class="fas fa-paper-plane"></i> Save and Send
        </button>

        <!-- Dropdown Button for More Save Options -->
        <div class="dropdown w-25">
            <button class="btn btn-success dropdown-toggle w-100" type="button" id="saveOptions" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-save"></i> More Options
            </button>
            <ul class="dropdown-menu w-100" style="" aria-labelledby="saveOptions">
                <li><button class="dropdown-item" id="savePrint"><i class="fas fa-print"></i> Save and Print</button></li>
                <li><button class="dropdown-item" id="saveShare"><i class="fas fa-share-alt"></i> Save and Share</button></li>
                <li><button class="dropdown-item" id="saveShareLater"><i class="fas fa-clock"></i> Save & Share Later</button></li>
            </ul>
        </div>
    </div>

        </div>
    </div>

    </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        let today = new Date().toISOString().split('T')[0];
        document.getElementById("invoiceDate").value 

        function calculateSummary() {
        let totalItems = document.querySelectorAll("#invoiceItems tr").length; // Count all rows
        let totalAmount = 0;
        let totalDiscount = 0;

        document.querySelectorAll("#invoiceItems tr").forEach(row => {
            let amountField = row.querySelector(".amount");
            if (!amountField) return; // Skip if no amount field

            let amount = parseFloat(amountField.value) || 0;
            let discount = parseFloat(row.querySelector(".discount").value) || 0;
            let discountType = row.querySelector(".discount-type").value;
            let rate = parseFloat(row.querySelector(".rate").value) || 0;
            let qty = parseFloat(row.querySelector(".quantity").value) || 0;
            let subtotal = qty * rate;

            if (discountType === "%") {
                totalDiscount += (subtotal * discount) / 100;
            } else {
                totalDiscount += discount;
            }

            totalAmount += amount;
        });

        // Global Discount Calculation
        let globalDiscount = parseFloat(document.getElementById("globalDiscount").value) || 0;
        let globalDiscountType = document.getElementById("globalDiscountType").value;
        let totalPayable = totalAmount;
        let appliedGlobalDiscount = 0;

        if (globalDiscountType === "percentage") {
            appliedGlobalDiscount = (totalPayable * globalDiscount) / 100;
        } else {
            appliedGlobalDiscount = globalDiscount;
        }

        totalDiscount += appliedGlobalDiscount;
        totalPayable -= appliedGlobalDiscount;

        // Updating Summary Fields
        document.getElementById("totalItems").textContent = totalItems; // ✅ FIX: Now correctly counting items
        document.getElementById("totalDiscount").textContent = totalDiscount.toFixed(2);
        document.getElementById("totalAmount").textContent = totalAmount.toFixed(2);
        document.getElementById("subtotalPayable").textContent = totalPayable.toFixed(2);
        document.getElementById("subtotal_payable_amount").value = totalPayable.toFixed(2);
    }


        function calculateAmount(row) {
            let qty = parseFloat(row.querySelector(".quantity").value) || 0;
            let rate = parseFloat(row.querySelector(".rate").value) || 0;
            let discount = parseFloat(row.querySelector(".discount").value) || 0;
            let discountType = row.querySelector(".discount-type").value;
            let tax = parseFloat(row.querySelector(".tax").value) || 0;

            let subtotal = qty * rate;
            if (discountType === "%") {
                subtotal -= (subtotal * discount) / 100;
            } else {
                subtotal -= discount;
            }
            let totalAmount = subtotal + (subtotal * tax) / 100;
            row.querySelector(".amount").value = totalAmount.toFixed(2);

            calculateSummary();
        }

        function addRow() {
            let newRow = document.createElement("tr");
            newRow.classList.add("itemRow"); // Ensure it has the class
            newRow.innerHTML = `
                <td><input type="text" class="form-control item-details" placeholder="Item Details"></td>
                <td><input type="number" class="form-control quantity" value="1" min="1"></td>
                <td><input type="number" class="form-control rate" value="0" min="0"></td>
                <td>
                    <div class="input-group">
                        <input type="number" class="form-control discount w-75" value="0" min="0">
                        <select class="form-select discount-type w-25">
                            <option value="%">%</option>
                            <option value="₹">₹</option>
                        </select>
                    </div>
                </td>
                <td><input type="number" class="form-control tax" value="0" min="0"></td>
                <td><input type="text" class="form-control amount" value="0.00" readonly></td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger mb-1 removeRow">X</button>
                </td>  
            `;

            document.getElementById("invoiceItems").appendChild(newRow);
            calculateAmount(newRow); // Calculate for new row
            calculateSummary(); // Update summary
        }

        document.getElementById("addMore").addEventListener("click", function () {
            addRow();
        });

        // Calculate on input change for all rows (new and fetched)
        document.getElementById("invoiceItems").addEventListener("input", function (event) {
            if (event.target.closest("tr")) {
                calculateAmount(event.target.closest("tr"));
            }
        });

        // Remove row handler
        document.getElementById("invoiceItems").addEventListener("click", function (event) {
            if (event.target.classList.contains("removeRow")) {
                let rows = document.querySelectorAll("#invoiceItems tr");
                if (rows.length > 1) {
                    event.target.closest("tr").remove();
                    calculateSummary();
                } else {
                    alert("At least one item is required.");
                }
            }
        });

        document.getElementById("globalDiscount").addEventListener("input", calculateSummary);
        document.getElementById("globalDiscountType").addEventListener("change", calculateSummary);

        // Initialize calculations for fetched rows
        document.querySelectorAll("#invoiceItems tr").forEach(row => calculateAmount(row));

        calculateSummary(); // Initial Calculation
    });

    </script>
    <!-- Load Customers   -->
    <script>
    // $(document).ready(function() {
    //     let customerData = {}; // Store customer details

    //     // Fetch customers
    //     $.ajax({
    //         url: '{{ route("customers.get") }}',
    //         type: 'GET',
    //         dataType: 'json',
    //         success: function(response) {
    //             let options = '<option value="">Select Customer</option>';
    //             $.each(response, function(index, customer) {
    //                 options += `<option value="${customer.id}">${customer.short_name} - ${customer.name}</option>`;

    //                 // Store customer details in an object
    //                 customerData[customer.id] = customer;
    //             });
    //             $('#customerSelect').html(options);
    //         },
    //         error: function(xhr, status, error) {
    //             console.log("Error:", xhr.responseText);
    //         }
    //     });

    //     // Handle customer selection
    //     $('#customerSelect').on('change', function() {
    //         let customerId = $(this).val();

    //         console.log("Selected Customer ID:", customerId); // Debugging log

    //         if (customerId && customerData[customerId]) {
    //             let customer = customerData[customerId];

    //             console.log("Selected Customer Data:", customer); // Debugging log

    //             $('#contactName').text(customer.primary_contact_name);
    //             $('#orgName').text(customer.org_name);
    //             $('#email').text(customer.email_address);
    //             $('#orgEmail').text(customer.org_email_address);
    //             $('#country').text(customer.org_country);
    //             $('#city').text(customer.org_city);
    //             $('#pinCode').text(customer.pin_code);
    //             $('#wpContact').text(customer.w_p_contact);
    //             $('#mContact').text(customer.m_contact);
    //             $('#status').text(customer.is_active);

    //             $('#customerDetails').show();
    //         } else {
    //             $('#customerDetails').hide();
    //         }
    //     });
    // });
    </script>

    <!-- Load Set Invoice Number  -->

    <script>
        // document.addEventListener("DOMContentLoaded", function () {
        //     // Fetch last invoice number from localStorage (or backend if needed)
        //     let lastInvoice = localStorage.getItem("lastInvoice") || 0;

        //     // Convert to integer and increment
        //     let newInvoiceNumber = parseInt(lastInvoice) + 1;

        //     // Format the number with leading zeros
        //     let formattedNumber = String(newInvoiceNumber).padStart(4, '0');

        //     // Set the invoice number in the input field
        //     document.getElementById("invoiceNumber").value = `DIGIVITY-${formattedNumber}`;

        //     // Store the latest invoice number in localStorage
        //     localStorage.setItem("lastInvoice", newInvoiceNumber);
        // });
    </script>
    <!-- Invoice Current Date  -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
            let today = new Date().toISOString().split('T')[0]; 
            document.getElementById("invoiceDate").value 

            document.getElementById("paymentTerms").addEventListener("change", function () {
                let term = this.value;
                let dueDateField = document.getElementById("dueDate");
                let invoiceDate = new Date(document.getElementById("invoiceDate").value);
                let dueDate;

                switch (term) {
                    case "due_end_month":
                        dueDate = new Date(invoiceDate.getFullYear(), invoiceDate.getMonth() + 1, 0); 
                        break;
                    case "net_7":
                        dueDate = new Date(invoiceDate.setDate(invoiceDate.getDate() + 7));
                        break;
                    case "net_15":
                        dueDate = new Date(invoiceDate.setDate(invoiceDate.getDate() + 15));
                        break;
                    case "net_30":
                        dueDate = new Date(invoiceDate.setDate(invoiceDate.getDate() + 30));
                        break;
                    case "net_45":
                        dueDate = new Date(invoiceDate.setDate(invoiceDate.getDate() + 45));
                        break;
                    case "net_60":
                        dueDate = new Date(invoiceDate.setDate(invoiceDate.getDate() + 60));
                        break;
                    case "due_on_receipt":
                        dueDate = invoiceDate; // Same as invoice date
                        break;
                    case "custom":
                        dueDateField.readOnly = false; 
                        return;
                    default:
                        dueDateField.value = "";
                        return;
                }

                dueDateField.readOnly = true; 
                dueDateField.value = dueDate.toISOString().split('T')[0]; 
            });
        });
    </script>

    <!--dle Invocie Data   -->
    <script>
        document.getElementById('saveDraft').addEventListener('click', function(event) {
        event.preventDefault();
        submitInvoiceForm('draft');
    });

    document.getElementById('saveAndSend').addEventListener('click', function(event) {
        event.preventDefault();
        submitInvoiceForm('sent');
    });


    function submitInvoiceForm(status) {
        let items = [];

        // Select all <tr> inside #invoiceItems
        document.querySelectorAll('#invoiceItems tr').forEach(row => { 
            let details = row.querySelector('.item-details')?.value || '';
            let quantity = row.querySelector('.quantity')?.value || '0';
            let rate = row.querySelector('.rate')?.value || '0';
            let discount = row.querySelector('.discount')?.value || '0';
            let discountType = row.querySelector('.discount-type')?.value || '%';
            let tax = row.querySelector('.tax')?.value || '0';
            let amount = row.querySelector('.amount')?.value || '0';

            // Skip empty rows (optional)
            if (details.trim() !== '') {
                items.push({ details, quantity, rate, discount, discountType, tax, amount });
            }
        });

        // Store JSON in hidden input field
        document.getElementById('invoiceItemsJson').value = JSON.stringify(items);
        document.getElementById('invoiceStatus').value = status; // Set status

        // Submit the form
        document.getElementById('invoiceForm').submit();
    }

    </script>



<!-- Add Customer Modal -->
<div class="modal fade modal-xl effect-slide-in-bottom" id="exampleModalCenterCustomer" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-xl wd-90p modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header pd-y-10 pd-x-10 pd-sm-x-20 bg-light mb-3">
                <h3 class="modal-title fs-5"><b><i class="fa fa-plus"></i> Add New Customer</b></h3>


                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div><!-- modal-header -->

            <form action="{{ route('admin.module.cutomerinvoice.add_customer') }}" method="POST">
                @csrf
                <fieldset class="form-fieldset mx-3 mb-3">
                    <legend>Service Category Information</legend>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label class="form-label">Select Service<span class="text-danger">*</span></label>

                            <select name="service_category_id" required class="form-control input-sm" id="">
                                <option value="">**Select Service</option>

                                @foreach($category as $cat)
                                    <option value="{{ $cat->id }}" {{ old('service_category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="form-label">Customer Type <span class="text-danger">*</span></label>
                            <select name="customer_type" required class="form-control input-sm" id="customer_type">
                                <option value="">**Select Type</option>
                                <option value="School" {{ old('customer_type') == 'School' ? 'selected' : '' }}>School
                                </option>
                                <option value="Individual" {{ old('customer_type') == 'Individual' ? 'selected' : '' }}>
                                    Individual</option>
                                <option value="Other" {{ old('customer_type') == 'Other' ? 'selected' : '' }}>Other
                                </option>
                            </select>

                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Primary Contact <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-sm-4">
                                    <select name="salutation_pr" required class="form-control input-sm" id="">
                                        <option value="">**Select Salutation</option>
                                        <option value="Mr." {{ old('salutation_pr') == 'Mr.' ? 'selected' : '' }}>Mr.
                                        </option>
                                        <option value="Mrs." {{ old('salutation_pr') == 'Mrs.' ? 'selected' : '' }}>Mrs.
                                        </option>
                                        <option value="Ms." {{ old('salutation_pr') == 'Ms.' ? 'selected' : '' }}>Ms.
                                        </option>
                                        <option value="Dr." {{ old('salutation_pr') == 'Dr.' ? 'selected' : '' }}>Dr.
                                        </option>
                                        <option value="Miss." {{ old('salutation_pr') == 'Miss.' ? 'selected' : '' }}>
                                            Miss.</option>
                                    </select>

                                </div>
                                <div class="col-sm-4">

                                    <input type="text" class="form-control input-sm" required name="fname"
                                        value="{{ old('fname') }}" placeholder="Enter First Name">
                                </div>
                                <div class="col-sm-4">

                                    <input type="text" class="form-control input-sm" name="lname"
                                        value="{{ old('lname') }}" placeholder="Enter Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Company/School Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control input-sm" required name="org_name"
                                value="{{ old('org_name') }}" placeholder=" Enter Company Name">

                        </div>

                        <div class="col-sm-6 form-group">
                            <label class="form-label"> Email Adress <span class="text-danger">*</span></label>
                            <input type="email" class="form-control  input-sm" required name="email_address"
                                value="{{ old('email_adress') }}" placeholder=" Email Adsress">

                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Company Email <span
                                    class="text-secondary">(optional)</span></label>
                            <input type="email" class="form-control input-sm" name="org_email_address"
                                value="{{ old('org_email_adress') }}" placeholder=" Comapny Email Asdress">
                        </div>
                        <div class="col-sm-12 form-group">
                            <label class="form-label">Address <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <select name="org_country" required class="form-control input-sm" id="">
                                        <option value="">**Select Country</option>
                                        <option value="India" {{ old('org_country') == 'India' ? 'selected' : '' }}>India
                                        </option>
                                        <option value="Other" {{ old('org_country') == 'Other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                </div>

                                <div class="col-sm-4">


                                    @include('admin_panel.comman.all-state');


                                </div>
                                <div class="col-sm-4">
                                    <!-- <label class="form-label">Company Em <span class="text-secondary">(optional)</span></label> -->
                                    <input type="text" name="org_city" required value="{{ old('org_city') }}"
                                        class="form-control input-sm" placeholder="Enter City Name.." id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">Pin Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control input-sm" name="pin_code"
                                value="{{ old('pin_code') }}" placeholder="&#127968; Pin Code">

                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="form-label">Phone <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-sm-6">

                                    <input type="text" class="form-control input-sm" name="w_p_contact"
                                        value="{{ old('w_p_contact') }}" placeholder=" &#128222; Work Phone">
                                </div>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control input-sm" name="m_contact"
                                        value="{{ old('m_contact') }}" placeholder=" &#128241; Mobile">

                                </div>
                            </div>
                        </div>


                        <div class="col-sm-3 pt-4">
                            <div class="row">
                                <div class="col-sm-5">
                                <div class="input-group mb-3">
                            <div class="input-group-text" style="background-color: #caeadb;">
                                <input type="checkbox" class="form-check-input mt-0" name="is_active" {{ old('is_active') ? 'checked' : '' }}>
                            </div>
                            <input type="text" disabled class="bg-light form-control ps-1" value="Active">
                        </div>  
                                </div>
                                <!-- Commission-Based Client Checkbox -->
                                <div class="col-sm-7">

                                <div class="input-group mb-3">
                            <div class="input-group-text" style="background-color: #caeadb;">

<input type="checkbox" class="form-check-input mt-0" id="is_commission_based_client" name="is_commision_based_client" 
    {{ old('is_commision_based_client') ? 'checked' : '' }}>                            </div>
                            <input type="text" disabled class="bg-light form-control" value="Commission(?)">
                        </div>
                                </div>
                            </div>
                       
                    </div>


                    <!-- Commission Details start  -->
                   <!-- Commission Details start -->
<div class="col-sm-4 form-group">
    <label class="form-label"> Referred By (if Commission-Based) <span class="text-danger">*</span></label>
    <input type="text" class="form-control input-sm" required name="referred_by_name" id="referred_by_name"
        value="{{ old('referred_by_name') }}" placeholder="Referred By Name" disabled>
</div>

<div class="col-sm-4 form-group">
    <label class="form-label">Percentage Commission (%) <span class="text-danger">*</span></label>
    <input type="number" class="form-control input-sm" name="persentage_commission" id="persentage_commission"
        value="{{ old('persentage_commission')}}" placeholder="Percentage Commission" disabled>
</div>

<div class="col-sm-4 form-group">
    <label class="form-label">Referred By (Email) <span class="text-danger">*</span></label>
    <input type="email" class="form-control input-sm" name="ref_by_email" id="ref_by_email"
        value="{{ old('ref_by_email') }}" placeholder="Referred By (Email)" disabled>
</div>


                      
                    </div>
                </fieldset>

                <div class="modal-footer bg-light">
                    <button type="submit" class="btn btn-primary btn-icon px-3">
                        <i class="fa fa-plus"></i> Create
                    </button>
                    <button type="button" class="btn btn-secondary px-3" data-bs-dismiss="modal">
                        <i class="fa fa-times"></i> Cancel
                    </button>
                </div>
            </form>

            <!-- JavaScript to Enable/Disable Fields -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let checkbox = document.getElementById("is_commission_based_client");
        let fields = ["referred_by_name", "persentage_commission", "ref_by_email"];

        function toggleFields() {
            let isChecked = checkbox.checked;
            fields.forEach(id => {
                let field = document.getElementById(id);
                field.disabled = !isChecked;
                field.required = isChecked; // Make required only if checkbox is checked
            });
        }

        checkbox.addEventListener("change", toggleFields);
        toggleFields(); // Initialize state on page load
    });
</script>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->


@endsection








