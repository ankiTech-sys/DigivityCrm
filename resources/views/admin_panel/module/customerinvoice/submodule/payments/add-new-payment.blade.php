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
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                });
            });
        </script>
    @endif
    <!-- Add this in your <head> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        #customerDetails {
            background: white;
            padding: 15px;
            border-radius: 8px;
            /* box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.1); */
            /* margin-top: 10px; */
        }

        #customerDetails h4 {
            /* border-bottom: 2px solid #007bff; */
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
            color: crimson;
            font-size: 16px;
        }

        #customerSelect {
            border-radius: 5px;
            padding: 8px;
            font-size: 16px;
        }

        .fc {
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

        th {
            white-space: nowrap;

        }

        #payModeSelect {
            font-weight: bold;
            font-size: 10px !important;
        }

        #payModeSelect>option {
            white-space: nowrap;
            font-size: 14px !important;
        }

        .custom-option {
            display: flex;
            align-items: center;
        }

        .circle {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
            text-align: center;
            font-size: 12px;
            color: #fff;
            line-height: 18px;
        }

        .circle.c {
            background-color: green;
        }

        .circle.nc {
            background-color: red;
        }
    </style>


    <!-- Customer Details  -->
    <div class="container-fluid">
        <h2 class="invoice-heading">
            <i class="fa fa-history"></i>Record New Payments : -
        </h2>
        <hr>
    </div>

    <form action="{{ route('admin_panel.module.customerinvoice.payment.save') }}" method="POST">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">

                    <!-- Customer Details Start Here  -->
                    <div class="row">
                        <div class="col-sm-12">
                            <fieldset class="form-fieldset mx-3 mb-3">
                                <legend class="bg-info text-light rounded-2">Customer Information</legend>
                                <div class="col-sm-12 form-group">

                                    <label class="form-label">Select Customer <span class="text-danger">*</span></label>
                                    <select id="customerSelect" name="customer_id" class="form-control " required>
                                        <option value="">Select Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}"> {{ $customer->org_name }} {
                                                {{ $customer->primary_contact_name }} }</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label class="form-label">Payment# <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control input-sm" name="payment_number"
                                        id="paymentNumber" placeholder="PAY-000X" readonly>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label class="form-label">Amount Received <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control input-sm" required
                                        placeholder="Total Received Amount" name="received_amount" id="receivedAmount">

                                    <span style="float: right;" class="d-flex align-items-center mt-1">
                                        <input type="checkbox" id="fullAmountCheckbox" class="form-control-checked">
                                        <b class="ms-1">Receive Full Amount <span id="totalAmountDisplay">(0)</span></b>
                                    </span>
                                </div>


                            </fieldset>
                        </div>
                    </div>

                    <!-- Payment Details Start Here   -->
                    <div class="row">
                        <div class="col-sm-12">
                            <fieldset class="form-fieldset mx-3 mb-3">
                                <legend class="bg-info text-light rounded-2">Payment Details</legend>
                                <div class="col-sm-12 form-group">

                                    <label class="form-label">Bank Charges <span
                                            class="text-secondary">(optional)</span></label>
                                    <input type="text" class="form-control input-sm" name="bank_charges"
                                        placeholder="Bank charges">
                                </div>


                                <div class="col-sm-12 form-group">
                                    <label class="form-label">Payment Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control input-sm" id="paymentDate" name="payment_date">
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label class="form-label">Payment Mode<span class="text-danger">*</span></label>
                                    <select id="payModeSelect" name="payMode" class="form-control ">

                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Bank_transfer">Bank Transfer</option>
                                        <option value="Credit_card">Credit Card</option>
                                        <option value="Debit_card">Debit Card</option>
                                        <option value="UPI">UPI</option>
                                        <option value="Net_banking">Net Banking</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label class="form-label">Reference# <span
                                            class="text-secondary">(optional)</span></label>
                                    <input type="text" class="form-control input-sm" name="reference_number"
                                        placeholder="Reference Number">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 ms-auto me-3">
                    <div id="customerDetails" style="min-height: 560px;" class="border rounded-3 p-3">
                        <!-- Header with Background Color -->
                        <div class="bg-info text-white p-2 rounded-2">
                            <h4 class="mb-0 text-light"><i class="fas fa-user"></i> Pending Payment Invoices</h4>
                        </div>
                        <hr>
                        <!-- Customer Details Content -->
                        <div class="details-grid p-3">

                            <table class="table table-bordered" style="width: 700px;">
                                <thead class="bg-light fw-bold">
                                    <tr class="py-3">
                                        <th class="fw-bold">Sr. No.</th>
                                        <th>Date</th>
                                        <th class="fw-bold">Invoice Number </th>
                                        <th class="fw-bold">Invoice Amount</th>
                                        <th class="fw-bold">Payment</th>

                                    </tr>
                                </thead>
                                <tbody id="invoiceTableBody">
                                    <td colspan="4" class="text-center">No invoices found</td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>
            <!--Expensec  -->

            <div class="row" id="expenseSection" style="display: none;">
                <div class="col-sm-12">
                    <fieldset class="form-fieldset mx-3 mb-3">
                        <legend class="bg-info text-light rounded-2">Expense Details</legend>
                        <p><i class="fa fa-edit"></i> The Customer is Based on Commision</p>
                        <table class="table table-bordered">
                            <thead class="bg-light">
                                <tr>
                                    <th><i class="fas fa-info-circle"></i>Expense Name</th>
                                    <th><i class="fas fa-info-circle"></i>Invoice Number</th>
                                    <th><i class="fas fa-sort-numeric-up"></i> Quantity</th>
                                    <th>&#8377;Rate</th>
                                    <!-- <th><i class="fas fa-percent"></i>Discount</th> -->
                                    <!-- <th><i class="fas fa-percentage"></i> Tax (%)</th> -->
                                    <th><i class="fas fa-calculator"></i> Total Expense Amount</th>
                                    <th><i class="fas fa-edit"></i>Action</th>
                                </tr>
                            </thead>
                            <tbody id="invoiceItems">

                            </tbody>
                        </table>

                        <div class="container-fluid">
                            <div class="row ">

                                <div class="col-sm-3"> <button id="addMore" type="button" class="btn btn-primary mt-3"><i
                                            class="fa fa-plus"></i> More Expense</button>
                                    <button id="clearAll" type="button" class="btn btn-danger mt-3"><i
                                            class="fa fa-times"></i> Clear All</button>
                                </div>


                            </div>
                        </div>

                    </fieldset>
                </div>
            </div>
            <div id="summaryBox" style=" 
                    position: fixed;
                     bottom: 0;
                    right: 0;
                    width: 320px;
                    background: rgba(0, 0, 0, 0.01);
                    border-top-left-radius: 12px;
                    border: 1px solid rgba(255, 255, 255, 0.3);
                    padding: 20px 15px 10px 15px;
                    box-shadow: -2px -2px 8px rgba(0, 0, 0, 0.2);   
                     backdrop-filter: blur(12px);
                    -webkit-backdrop-filter: blur(12px);
                    z-index: 999;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    color: #000;
                    transition: all 0.5s ease-in-out;
                    overflow: hidden;
                ">

                <!-- Toggle Button -->
                <button type="button" id="toggleSummary"
                    style="position: absolute; top: 8px; left: 10px;border-radius: 50px; background: #00B8D4; border: none; font-size: 24px; cursor: pointer;">
                    <!-- Dash icon (when expanded) -->
                    <i id="iconCollapse" class="bi bi-dash-circle text-light" style="margin-top: 0px;"></i>

                    <!-- Plus icon (when collapsed) -->
                    <i id="iconExpand" class="bi bi-plus-circle" style="display: none;"></i>
                </button>

                <!-- Summary Header -->
                <h4 class="text-center mb-3" style="font-weight: 800;margin-top: -7px;">Paymnet Summary</h4>
                <hr>
                <!-- Summary Content (can be hidden) -->
                <div id="summaryContent" style="display: block;">
                    <p style="margin: 5px;"><b>Total Payment:</b> ₹<span id="summaryTotalPayment">0.00</span></p>
                    <p style="margin: 5px;"><b>Excess Amount:</b> ₹<span id="summaryExcessAmount">0.00</span></p>
                    <p style="margin: 5px;"><b>Total Expense:</b> ₹<span id="summaryTotalExpense">0.00</span></p>

                    <div style="max-height: 150px; overflow-y: auto;">
                        <table class="table table-sm table-bordered mt-3" style="background: rgba(255, 255, 255, 0.6);">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 40px;">SN</th>
                                    <th>Invoice</th>
                                    <th>Expense</th>
                                </tr>
                            </thead>
                            <tbody id="expenseMiniTable"></tbody>
                        </table>
                    </div>
                </div>
            </div>



            <button type="submit" class="btn btn-info ms-3 px-5  text-light">Save</button> <button type="button" onclick="window.location.back()" class="btn btn-secondary  ms-2">Cancel</button>
    </form>

    <style>
   

        #summaryBox.collapsed {
            height: 60px !important;
            transform: translateY(130px);
            /* hide the content */
        }

        #summaryBox.expanded {
            height: auto;
            transform: translateY(0);
        }

        /* Shake effect */
        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            50% {
                transform: translateX(5px);
            }

            75% {
                transform: translateX(-5px);
            }

            100% {
                transform: translateX(0);
            }
        }

        .shake {
            animation: shake 0.3s;
        }
    </style>
   <!-- Set Current Date    -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const paymentDateInput = document.getElementById("paymentDate");
            if (paymentDateInput) {
                const today = new Date().toISOString().split("T")[0];
                paymentDateInput.value = today;
            }
        });
    </script>

    <!-- Load Invoice Data And Handle Funstionality   -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let fullAmountCheckbox = document.getElementById("fullAmountCheckbox");
            let receivedAmountInput = document.getElementById("receivedAmount");
            let totalAmountDisplay = document.getElementById("totalAmountDisplay");

            fullAmountCheckbox.disabled = true;
            fullAmountCheckbox.checked = false;
            receivedAmountInput.value = "";

            function updateTotalReceivedAmount() {
                let totalReceived = 0;
                document.querySelectorAll(".invoice-checkbox").forEach((checkbox, index) => {
                    if (checkbox.checked) {
                        let amountInput = document.querySelectorAll(".receivedAmountInput")[index];
                        totalReceived += parseFloat(amountInput.value) || 0;
                    }
                });
                // fullAmountCheckbox.disabled = totalReceived === 0;
            }

            fullAmountCheckbox.addEventListener("change", function () {
                if (this.checked) {
                    let totalAmount = parseFloat(totalAmountDisplay.innerText.replace(/[()]/g, "")) || 0;
                    receivedAmountInput.value = totalAmount.toFixed(2);
                    receivedAmountInput.readOnly = true;
                } else {
                    receivedAmountInput.value = "";
                    receivedAmountInput.readOnly = false;
                }
                updateSummaryBox();
            });

            function validateAmountInput(input, index) {
                let invoiceAmount = parseFloat(document.querySelectorAll(".invoiceAmount")[index].value.replace(/,/g, "")) || 0;
                let enteredAmount = parseFloat(input.value) || 0;
                let invoiceCheckbox = document.querySelectorAll(".invoice-checkbox")[index];

                if (invoiceCheckbox.checked) {
                    input.classList.remove("border-danger");
                    input.nextElementSibling.style.display = "none";
                    return;
                }

                if (enteredAmount > invoiceAmount) {
                    input.classList.add("border-danger", "shake");
                    input.nextElementSibling.style.display = "block";
                    setTimeout(() => input.classList.remove("shake"), 300);
                } else {
                    input.classList.remove("border-danger");
                    input.nextElementSibling.style.display = "none";
                }

                updateTotalReceivedAmount();
            }

            document.getElementById("customerSelect").addEventListener("change", function () {
                resetPaymentFields();
                let customerId = this.value;
                let invoiceTableBody = document.getElementById("invoiceTableBody");

                invoiceTableBody.innerHTML = '<tr><td colspan="5" class="text-center">Loading...</td></tr>';

                if (customerId) {
                    fetch(`/Admin/customer-billing/payments/get-invoices/${customerId}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log("All Data Fetched Successfull..!");
                            invoiceTableBody.innerHTML = "";
                            let totalAmount = 0;

                            // Commission-based client setup
                            if (data.length > 0 && data[0].customer.is_commision_based_client === "yes") {
                                document.getElementById("expenseSection").style.display = "block";

                                let expenseTableBody = document.getElementById("invoiceItems");
                                expenseTableBody.innerHTML = "";

                                data.forEach((invoice, index) => {
    expenseTableBody.innerHTML += `
    <tr class="itemRow">
        <td><input type="text" name="expenses[${index}][name]" class="form-control item-details" value="SMS Expense" placeholder="Expense Name"></td>
        <td><input type="text" name="expenses[${index}][invoice_number]" class="form-control invoice-number" value="${invoice.invoice_number}" readonly></td>
        <td><input type="number" name="expenses[${index}][quantity]" class="form-control quantity" value="1" min="1" data-index="${index}"></td>
        <td><input type="number" name="expenses[${index}][rate]" class="form-control rate" value="0" min="0" data-index="${index}"></td>
        <td><input type="text" name="expenses[${index}][amount]" class="form-control amount" readonly></td>
        <td class="text-center"><span class="text-muted">Auto</span></td>
    </tr>`;
});

                                document.getElementById("addMore")?.classList.add("d-none");
                                document.getElementById("clearAll")?.classList.add("d-none");

                                setTimeout(() => {
                                    document.querySelectorAll(".itemRow").forEach((row) => {
                                        let qtyInput = row.querySelector(".quantity");
                                        let rateInput = row.querySelector(".rate");

                                        const calculateAmount = () => {
                                            let qty = parseFloat(qtyInput.value) || 0;
                                            let rate = parseFloat(rateInput.value) || 0;
                                            row.querySelector(".amount").value = (qty * rate).toFixed(2);
                                            updateSummaryBox();
                                        };

                                        qtyInput.addEventListener("input", calculateAmount);
                                        rateInput.addEventListener("input", calculateAmount);
                                    });
                                }, 100);
                            } else {
                                document.getElementById("expenseSection").style.display = "none";
                            }

                            // Invoice Table
                            data.forEach((invoice, index) => {
    let invoiceAmount = parseFloat(invoice.invoice_amount.replace(/,/g, "")) || 0;
    totalAmount += invoiceAmount;

    invoiceTableBody.innerHTML += `
    <tr>
        <td>${index + 1}</td>
        <td><input type="hidden" name="invoices[${index}][date]" value="${invoice.date}">${invoice.date}</td>
        <td><input type="hidden" name="invoices[${index}][invoice_number]" value="${invoice.invoice_number}">${invoice.invoice_number}</td>
        <td>
            <div class="col-sm-12">
                <div class="input-group mb-3">
                    <div class="input-group-text" style="background-color: #caeadb;">
                        <input 
                            type="checkbox" 
                            name="invoices[${index}][checked]" 
                            class="form-check-input mt-0 invoice-checkbox" 
                            data-amount="${invoiceAmount}" 
                            data-index="${index}" 
                            value="1"
                        >
                    </div>
                    <input type="text" class="bg-light form-control invoiceAmount" value="${invoice.invoice_amount}" readonly>
                </div>
            </div>
        </td>
        <td>
            <input 
                type="number" 
                name="invoices[${index}][received_amount]" 
                class="form-control receivedAmountInput" 
                data-index="${index}"
            >
            <small class="text-danger error-message mt-1" style="display: none;">Invalid Amount...!</small>
        </td>
    </tr>`;
});


                            totalAmountDisplay.innerText = `(${totalAmount.toFixed(2)})`;
                            fullAmountCheckbox.disabled = totalAmount === 0;

                            document.querySelectorAll(".invoice-checkbox").forEach((checkbox, index) => {
                                let amountInput = document.querySelectorAll(".receivedAmountInput")[index];
                                checkbox.addEventListener("change", function () {
                                    if (this.checked) {
                                        amountInput.value = this.dataset.amount;
                                        amountInput.readOnly = true;
                                    } else {
                                        amountInput.value = "";
                                        amountInput.readOnly = false;
                                    }
                                    validateAmountInput(amountInput, index);
                                    updateTotalReceivedAmount();
                                    updateSummaryBox();
                                });
                            });

                            document.querySelectorAll(".receivedAmountInput").forEach((input, index) => {
                                input.addEventListener("input", function () {
                                    validateAmountInput(this, index);
                                    updateSummaryBox();
                                });
                            });

                            receivedAmountInput.addEventListener("input", updateSummaryBox);
                        })
                        .catch(error => {
                            invoiceTableBody.innerHTML = '<tr><td colspan="5" class="text-center text-danger">Error loading invoices</td></tr>';
                        });
                }
            });

            function resetPaymentFields() {
                document.getElementById("invoiceTableBody").innerHTML = "";
                document.getElementById("receivedAmount").value = "";
                document.getElementById("fullAmountCheckbox").checked = false;
                document.getElementById("fullAmountCheckbox").disabled = true;
                document.getElementById("fullAmountCheckbox").readOnly = false;
                document.getElementById("totalAmountDisplay").innerText = "(0.00)";
                document.getElementById("expenseSection").style.display = "none";
                document.getElementById("invoiceItems").innerHTML = "";
                document.getElementById("expenseMiniTable").innerHTML = "";
                document.getElementById("summaryTotalPayment").innerText = "0.00";
                document.getElementById("summaryTotalExpense").innerText = "0.00";
                document.getElementById("summaryExcessAmount").innerText = "0.00";
            }
            function updateSummaryBox() {
                let receivedAmount = parseFloat(document.getElementById("receivedAmount").value) || 0;

                let totalPaidInvoices = 0;
                let totalExpense = 0;

                // Calculate total paid invoice amount (all invoice inputs)
                document.querySelectorAll(".receivedAmountInput").forEach((input) => {
                    const amount = parseFloat(input.value) || 0;
                    totalPaidInvoices += amount;
                });

                // Calculate total expenses
                document.querySelectorAll(".itemRow").forEach((row, index) => {
                    let qty = parseFloat(row.querySelector(".quantity").value) || 0;
                    let rate = parseFloat(row.querySelector(".rate").value) || 0;
                    totalExpense += qty * rate;
                });

                // Fill mini expense table
                let miniTableBody = document.getElementById("expenseMiniTable");
                miniTableBody.innerHTML = "";
                document.querySelectorAll(".itemRow").forEach((row, index) => {
                    let qty = parseFloat(row.querySelector(".quantity").value) || 0;
                    let rate = parseFloat(row.querySelector(".rate").value) || 0;
                    let amount = qty * rate;
                    let invoiceNumber = row.querySelector(".invoice-number").value;

                    miniTableBody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${invoiceNumber}</td>
                    <td>₹${amount.toFixed(2)}</td>
                </tr>`;
                });

                // Calculate excess
                let excess = receivedAmount - totalPaidInvoices;

                // Update the summary box
                document.getElementById("summaryTotalPayment").innerText = receivedAmount.toFixed(2);
                document.getElementById("summaryTotalExpense").innerText = totalExpense.toFixed(2);
                document.getElementById("summaryExcessAmount").innerText = excess.toFixed(2);
            }


        });
    </script>


  <!-- Handle Summary Box Collapes and Expend Button    -->
  <script>
        document.getElementById('toggleSummary').addEventListener('click', function () {
            var summaryContent = document.getElementById('summaryContent');
            var summaryBox = document.getElementById('summaryBox');

            // Toggle visibility of summary content
            summaryContent.style.display = (summaryContent.style.display === 'none') ? 'block' : 'none';

            // Change icon based on state
            if (summaryContent.style.display === 'none') {
                this.innerHTML = '<i class="bi bi-plus-circle" style="color: #fff;"></i>'; // Show plus icon
                summaryBox.style.height = '60px'; // Minimized height (only header visible)
            } else {
                this.innerHTML = '<i class="bi bi-dash-circle" style="color: #fff;"></i>'; // Show minus icon
                summaryBox.style.height = 'auto'; // Restore full height
            }
        });

    </script>

<!-- Handle Summry Box   -->
    <script>
        const toggleBtn = document.getElementById('toggleSummary');
        const summaryContent = document.getElementById('summaryContent');
        const iconCollapse = document.getElementById('iconCollapse');
        const iconExpand = document.getElementById('iconExpand');

        let isCollapsed = false;

        toggleBtn.addEventListener('click', () => {
            isCollapsed = !isCollapsed;

            if (isCollapsed) {
                summaryContent.style.display = 'none';
                iconCollapse.style.display = 'none';
                iconExpand.style.display = 'inline';
            } else {
                summaryContent.style.display = 'block';
                iconCollapse.style.display = 'inline';
                iconExpand.style.display = 'none';
            }
        });
    </script>

    <!-- Bootstrap Icons (required) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

@endsection