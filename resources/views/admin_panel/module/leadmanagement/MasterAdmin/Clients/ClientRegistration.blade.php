<!-- Module: Customer Invoice  -->
<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->


@section('main-content')
    {{-- main section start here --}}
    @include('admin_panel.module.customerinvoice.sub-navbar.leadmanagement-navbar')
    {{-- main section end here --}}



    <!--Table Section Start Here-->
    <div class="custom-card col-lg-8 mt-4 mx-auto">
        <div class="panel panel-default">
            <div class="panel-heading"><b><i class="fa fa-list"></i> Clients Registration</b></div>
            <div class="panel-body pd-b-0 row p-3">
                <form action="{{ route("leadmanagement-create-client-registration") }}" method="POST">
                    @csrf
                    <div class="col-lg-12  vhr">
                        <fieldset class="form-fieldset">
                            <legend>Client Information</legend>

                            <div class="row">
                                <div class="form-group col-lg-4 col-md-6">
                                    <label for="client_name">School Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Client Name"
                                        name="school_name" required>
                                </div>


                                <div class="form-group col-lg-4 col-md-6">
                                    <label for="client_phone">School Contact No <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="client_phone" name="school_contat_no"
                                        placeholder="Enter School Contact No" required>
                                </div>


                              


                                <div class="form-group col-lg-4 col-md-6">
                                    <label for="client_name">No. of Student In School <span
                                            class="text-secondary">(optional)</span></label>
                                    <input type="text" class="form-control" name="no_of_students"
                                        placeholder="Enter No. of Students">
                                </div>


                                <div class="form-group col-lg-4 col-md-6">
                                    <label for="client_name">Reg. Date <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control datepicker bg-light" name="reg_date"
                                        placeholder="Enter Reg. Date">
                                </div>


                                
                                <div class="form-group col-lg-8 col-md-6">
                                    <label for="client_name">School Email <span
                                            class="text-secondary">(optional)</span></label>
                                    <input type="email" class="form-control" place id="school_email" name="school_email"
                                        placeholder="Enter School Email">
                                </div>
                                <div class="form-group col-lg-12 col-md-6">
                                    <label for="client_name">Erp System In Use <span
                                            class="text-secondary">(optional)</span></label>
                                    <select class="form-select select2" name="erp_system" id="">
                                        <option value="">Select ERP System</option>
                                        @foreach ($erpcompanies as $company)
                                            <option value="{{ $company->id }}">
                                                {{ $company->company_name }}
                                                @if (!empty($company->address))
                                                    [{{ $company->address }}]
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="modal-footer  mt-3">
                                <button type="reset" class="btn btn-danger me-2" data-bs-dismiss="modal">
                                    <i class="fa fa-times"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary btn-icon px-2">
                                    <i class="fa fa-plus"></i> Create
                                </button>


                            </div>


                        </fieldset>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
