<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->

@section('main-content')
    {{-- main section start here --}}

    @include('admin_panel.module.customerinvoice.sub-navbar.billing-navbar');


    {{-- table section satrt here --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Digivity Invoice</li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    </nav>

    <div class="custom-card col-lg-12 mx-auto">
        <div class="panel panel-default">
            <div class="panel-heading"><b><i class="fa fa-list"></i> All Invoices</b></div>
            <div class="panel-body pd-b-0 row">
                <div class="col-lg-2">
                    @include('admin_panel.layouts.actionbutton.CustomActionButtons')
                </div>
                <div class="col-lg-10 vhr">
                    <table id="example2" class="table datatable table-bordered dataTable example2">
                        <thead>
                            <tr class="py-3">
                                <th class="fw-bold">Sr. No.</th>
                                <th class="fw-bold">Date</th>
                                <th class="fw-bold">Invoice#</th>
                                <th class="fw-bold">Customer Name</th>
                                <th class="fw-bold">Status</th>
                                <th class="fw-bold">Due Date</th>
                                <th class="fw-bold">Amount</th>
                                <th class="fw-bold">Balance Due</th>
                                <th class="fw-bold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td> {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M Y') }}</td>
                                    <td>{{ $invoice->invoice_number }}</td>
                                    <td>{{ $invoice->customer->primary_contact_name ?? 'Unknown' }}</td>
                                    <td>{{ ucfirst($invoice->status) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($invoice->due_date)->format('d-m-Y') }}</td>
                                    <td>₹{{ number_format($invoice->subtotal_payable_amount, 2) }}</td>
                                    <td>₹{{ number_format($invoice->subtotal_payable_amount, 2) }}</td>
                                    <td>
                                        <a href="{{ route('invoices.show', $invoice->id) }}" class="badge  text-light mb-1"
                                            style="background-color: rebeccapurple;">
                                            <i class="fa fa-eye"></i> Open Invoice
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    </div>


    </div>
    {{-- table section satrt here --}}




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