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

    <style>
        .sidebar {
            width: 300px;
            background: #f8f9fa;
            height: 130vh;       
            z-index: 0;
            border-radius: 10px;
        }

        .invoice-content {
            flex-grow: 1;
            padding: 20px;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: #fff;
            border-bottom: 1px solid #ddd;
        }

        .invoice-list {
            list-style: none;
            padding: 0;
        }

        .invoice-list li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .text-muteddt {
            color: #6c757d;
        }

        .hvr {
            transition: all ease-in-out 0.1s;
        }

        .hvr:hover {
            background-color: rebeccapurple;
            color: #ffffff !important;
        }

        .actives {
            background-color: rebeccapurple;
            color: #ffffff !important;
        }

        .active-text-muteddt {
            color: #ffffff !important;
        }

        .hvr:hover .text-muteddt {

            color: #ffffff !important;
        }
    </style>

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
    <div class="container-fluid ">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex">
                    <!-- Sidebar -->
                    <div class="sidebar p-3 bg-light border-end shadow-sm" style="width: 280px;">
                        <div class="d-flex justify-content-between align-items-center mb-3 p-3 rounded"
                            style="background-color: #f8f9fa; border: 1px solid #dee2e6;">
                            <h5 class="mb-0 text-primary fw-bold">All</h5>

                            <div class="d-flex align-items-center">
                                <small> <button class="btn btn-success btn-sm me-2">
                                        <i class="fas fa-paper-plane"></i> Mark As Sent
                                    </button></small>

                                <div class="dropdown">
                                    <button class="btn btn-outline-dark btn-sm" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item text-primary" href="#"><i class="fas fa-print me-2"></i>
                                                Print</a></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                    class="fas fa-file-pdf me-2"></i> Export as PDF</a></li>
                                        <li><a class="dropdown-item text-warning" href="#"><i class="fas fa-truck me-2"></i>
                                                Export as E-Way Bill</a></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                    class="fas fa-trash-alt me-2"></i> Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <ul class="list-group" style=" overflow-y: auto; height: 110vh;">
                            @foreach ($invoices as $allinvoice)

                                <a href="{{ route('invoices.show', $allinvoice->id) }}">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center hvr rounded-2 {{ $allinvoice->id == $invoice->id ? 'actives' : '' }}">
                                        <div>
                                            <strong
                                                class="text-darkdt ">{{ $allinvoice->customer->primary_contact_name }}</strong>
                                            <span
                                                class="text-danger fw-bold">₹{{ $allinvoice->subtotal_payable_amount }}</span><br>
                                            <small
                                                class="text-muteddt {{ $allinvoice->id == $invoice->id ? 'active-text-muteddt' : '' }}">{{ $allinvoice->invoice_number }}
                                                •
                                                {{ \Carbon\Carbon::parse($allinvoice->invoice_date)->format('d M Y') }}</small>
                                        </div>

                                        @if($allinvoice->status == 'draft')
                                            <span class="badge bg-secondary text-light px-2 py-1 rounded-pill small">Draft</span>
                                        @elseif($allinvoice->status == 'sent')
                                            <span class="badge bg-primary text-light px-2 py-1 rounded-pill small">Sent</span>
                                        @endif
                                    </li>
                                </a>

                            @endforeach

                        </ul>

                    </div>

                    <!-- Main Content -->
                    <div class="invoice-content">
                        <div class="invoice-header rounded-2 "
                            style="background-color: #f8f9fa; border: 1px solid #dee2e6;">
                            <h4 class="mt-2">{{ $invoice->invoice_number }}</h4>
                            <input type="text" class="form-control w-25" placeholder="Search...">
                        </div>

                        <div class="d-flex justify-content-between align-items-center my-3">
                            <div class="d-flex gap-2">

                                <a href="{{ route('admin_panel.module.customerinvoice.edit', $invoice->id) }}"><button
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </button>
                                </a>
                                <a href="{{ route('invoice.emailPreview', $invoice->invoice_number) }}"><button
                                        class="btn btn-outline-success btn-sm">
                                        <i class="fas fa-paper-plane me-1"></i> Send
                                    </button>
                                </a>
                                <button class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-share-alt me-1"></i> Share
                                </button>

                                <button onclick="prinInvoice()" class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-file-pdf me-1"></i> PDF/Print
                                </button>

                                <button class="btn btn-outline-dark btn-sm">
                                    <i class="fas fa-credit-card me-1"></i> Record Payment
                                </button>
                            </div>

                            <div>
                                <!-- <button class="btn btn-success"><i class="fas fa-paper-plane me-1"></i> Send
                                        Invoice</button> -->
                                <button class="btn btn-secondary"><i class="fas fa-list me-1"></i> Mark As Approved</button>
                            </div>
                        </div>



                        <div class="container my-4">
                            <div class="invoice-box border p-4" id="invoice-content">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <img src="https://digivity.in/assets/img/digivity-logo.png" height="70" />
                                    <div class="text-end" style="font-size: medium;">
                                        <strong>Invoice Number:</strong> {{ $invoice->invoice_number }}<br>
                                        <strong>Created:</strong>
                                        {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M Y') }}<br>
                                        <strong>Due Date:</strong>
                                        {{ \Carbon\Carbon::parse($invoice->due_date)->format('d M Y') }}
                                    </div>
                                </div>

                                <div class="row mb-4" style="font-size: medium;">
                                    <div class="col-md-6">
                                        <strong>To:</strong><br>
                                        {{ $invoice->customer->org_name }}<br>
                                        {{ $invoice->customer->primary_contact_name }}<br>
                                        {{ $invoice->customer->email_address }}
                                    </div>
                                    <div class="col-md-6 text-end"> 
                                    <strong>From:</strong><br>
                                        {{ $invoice->customer->org_city ?? 'City' }},
                                        {{ $invoice->org_state ?? 'State' }}<br>
                                        {{ $invoice->org_country ?? 'Country' }}, {{ $invoice->pin_code ?? 'Pin Code' }}
                                    </div>
                                </div>

                                <table class="table table-bordered" style="font-size: medium;">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Details</th>
                                            <th>Quantity</th>
                                            <th>Rate</th>
                                            <th>Discount</th>
                                            <th>Tax</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item['details'] ?? '-' }}</td>
                                                <td>{{ $item['quantity'] ?? '-' }}</td>
                                                <td>₹{{ number_format($item['rate'], 2) }}</td>
                                                <td>{{ $item['discount'] ?? '-' }} {{ $item['discountType'] ?? '-' }}</td>
                                                <td>{{ $item['tax'] ?? '-' }}%</td>
                                                <td><strong>₹{{ number_format($item['amount'], 2) }}</strong></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted">No invoice items found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                    <div style="border: 1px solid #6c757d; padding: 5px; display: inline-block; border-radius: 5px;">
    {!! $qrCode !!}
</div>
                                    </div>
                                    <div class="col-md-6 text-end pt-3" style="font-size: medium;">
                                        <strong>Total:</strong>
                                        ₹{{ number_format($invoice->subtotal_payable_amount, 2) }}<br>
                                        <strong>Discount:</strong>
                                        ₹{{ number_format(($invoice->global_discount / 100) * $invoice->subtotal_payable_amount, 2) }}
                                        ({{ $invoice->global_discount }}%)<br>
                                        <strong>Tax:</strong> ₹{{ number_format($invoice->tax_amount, 2) ?? 'No tax' }}<br>
                                        <strong>Balance Due:</strong>
                                        ₹{{ number_format($invoice->subtotal_payable_amount, 2) }}
                                    </div>
                                </div>

                                <hr>
                                <div class="d-flex justify-content-between mt-4">
                                    <div style="font-size: medium;">
                                        <h5 class="ms-3">Authorized Signature</h5>
                                        <p>________________________</p>
                                    </div>
                                    <div style="font-size: medium;">
                                    <strong>Remarks:</strong><br>
                                    <p>{{ $invoice->remarks ?? 'No remarks available' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Hide everything except the invoice when printing */
        @media print {
            body * {
                visibility: hidden;
            }

            #invoice-content,
            #invoice-content * {
                visibility: visible;
            }

            #invoice-content {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }
    </style>

    <script>
        function prinInvoice() {
            window.print(); // No need to modify document body
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