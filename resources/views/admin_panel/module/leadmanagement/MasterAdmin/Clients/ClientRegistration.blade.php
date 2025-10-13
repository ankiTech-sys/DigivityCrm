<!-- Module: Customer Invoice  -->
<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->


@section('main-content')
    {{-- main section start here --}}
    @include('admin_panel.module.customerinvoice.sub-navbar.leadmanagement-navbar')
    {{-- main section end here --}}



    <!--Table Section Start Here-->
    <div class="row justify-content-around">
        <div class="custom-card col-lg-8 mt-4">
            <div class="panel panel-default">
                <div class="panel-heading"><b><i class="fa fa-list"></i> Clients Registration</b></div>
                <div class="panel-body pd-b-0 row p-3">
                    <form action="{{ route('leadmanagement-create-client-registration') }}" method="POST">
                        @csrf
                        <div class="col-lg-12  vhr">
                            <fieldset class="form-fieldset">
                                <legend>Client Information</legend>

                                <div class="row">

                                    <div class="form-group col-lg-4 col-md-6">
                                        <label for="">Client Type <span class="text-danger">*</span></label>
                                        @include('admin_panel.components.import-service-type', [
                                            'name' => 'client_type_id',
                                            'id' => 'services',
                                            'required' => 'required',
                                        ])
                                    </div>



                                    <div class="form-group col-lg-4 col-md-6">
                                        <label for="client_name">Client Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Client Name"
                                            name="client_name" required>
                                    </div>

                                    <div class="form-group col-lg-4 col-md-6">
                                        <label for="client_phone">Client Contact No <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="client_phone" name="contact_no"
                                            placeholder="Enter Client Contact No" required>
                                    </div>

                                    <div class="form-group col-lg-4 col-md-6">
                                        <label for="client_name">Reg. Date <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control datepicker bg-light" name="reg_date"
                                            placeholder="Enter Reg. Date">
                                    </div>



                                    <div class="form-group col-lg-4 col-md-6">
                                        <label for="client_name">Client Email <span
                                                class="text-secondary">(optional)</span></label>
                                        <input type="email" class="form-control" place id="school_email"
                                            name="school_email" placeholder="Enter School Email">
                                    </div>


                                    <div class="form-group col-lg-4 col-md-6">
                                        <label for="">Client Status <span class="text-danger">*</span></label>
                                        @include('admin_panel.components.import-lead-status', [
                                            'name' => 'client_status',
                                            'id' => 'clientLeadStatus',
                                        ])
                                    </div>


                                     <div class="form-group col-lg-4 col-md-6">
                                        <label for="">Lead Resource <span class="text-danger">*</span></label>
                                        @include('admin_panel.components.import-leadsource', [
                                            'name' => 'lead_source_id',
                                            'id' => 'clientLeadSource',
                                        ])
                                    </div>

                                    <div class="form-group col-lg-4 col-md-6">
                                        <label for="client_name">Address <span
                                                class="text-secondary">(optional)</span></label>
                                        <textarea class="form-control" name="address" rows="1" placeholder="Enter Address"></textarea>
                                    </div>



                                </div>


                            </fieldset>


                            <div class="col-lg-12  mt-3  vhr" id="schoolInfomation" style="display:none;">

                                <fieldset class="form-fieldset">
                                     <legend>School Information</legend>
                                    <div class="row">
                                       
                                        <div class="form-group col-lg-4 col-md-6" id="schoolNameDiv">
                                            <label for="client_name">School Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="schoolName"
                                                placeholder="Enter School Name" name="company_name">
                                        </div>

                                        <div class="form-group col-lg-4 col-md-6" id="schoolNameDiv">
                                            <label for="client_name">No Of Students</label>
                                            <input type="text" class="form-control" id="schoolName"
                                                placeholder="Enter School Name" name="company_name">
                                        </div>
                                </fieldset>
                            </div>
                            <div class="modal-footer  mt-3">
                                <button type="reset" class="btn btn-danger me-2" data-bs-dismiss="modal">
                                    <i class="fa fa-times"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary btn-icon px-2">
                                    <i class="fa fa-plus"></i> Create
                                </button>


                            </div>
                        </div>


                    </form>
                </div>
            </div>

        </div>
        <div class="col-lg-3 custom-card  mt-4">
            <div class="panel panel-default">
                <div class="panel-heading"><b><i class="fa fa-list"></i> Service Wise Client Summary</b></div>
                <div class="panel-body pd-b-0 row p-3">
                    <fieldset class="form-fieldset">
                        <legend>Client Summary</legend>
                        <canvas  id="chartBar1"></canvas >
                    </fieldset>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            let labels = ["Erp","Website","CRM",]
            let count = [12, 19, 3];
            let colors = ['#36a2eb', '#1ce1ac', '#ff6384'];
            verticalBarChart(labels, count, colors);
        })

    </script>
@endsection
