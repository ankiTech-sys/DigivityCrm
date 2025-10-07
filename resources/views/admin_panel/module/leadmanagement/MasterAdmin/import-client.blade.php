<!-- Module: Customer Invoice  -->
<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->


@section('main-content')
    {{-- main section start here --}}
    @include('admin_panel.module.customerinvoice.sub-navbar.leadmanagement-navbar')
    {{-- main section end here --}}


            <div class="col-lg-12 custom-card p-4 m-0">
                <div class="panel panel-default">
                    <div class="panel-heading"><b><i class="fa fa-file-import"></i> Import Student Data</b></div>
                    <div class="panel-body pd-b-0 row">
                        <form class="container-fluid"
                            action="{{ route('leadmanagement-client-imports-data-preview') }}"
                            method="POST" enctype="multipart/form-data" data-parsley-validate="" novalidate="">
                            @csrf
                            <div class="col-lg-7 mx-auto pd-b-20 pd-t-10">
                                <div class="col-lg-9 mx-auto">
                                    <label><b>Choose File <sup>*</sup> :</b></label>
                                    <input type="file" name="import_file" class="form-control input-lg" required="">
                                </div>
                                <div class="col-lg-12 mg-t-20 text-center">
                                    <button class="btn wd-200 rounded-50 btn-primary btn-lg"> Continue <i
                                            class="fa fa-arrow-right"></i></button>
                                </div>
                                <div class="col-lg-12 mg-t-30 d-flex justify-content-between">
                                    <a href=""
                                        download="" loader-disable="true" class="text-danger cursor-pointer tx-14"><u><i
                                                class="fa fa-file-excel"></i> Student Full Record Import Format</u></a>
                                    <a href=""
                                        download="" loader-disable="true"
                                        class="text-danger cursor-pointer float-right tx-14"><u><i
                                                class="fa fa-file-excel"></i> Student Short Record Import Format</u></a>
                                </div>

                            </div>
                        </form>
                        <div class="col-lg-12">
                            <div class="panel panel-default shadow-none bg-light p-3 rounded-3">
                                <div class="panel-heading"><b><i class="fa fa-info"></i> Instructions :</b></div>
                                <div class="panel-body pd-b-10 pd-t-10 row m-0">
                                    <p class="pd-b-0 container-fluid mg-b-2">1. Do care about case-sensitiveness in file
                                        name to write in sheet. IF it does not match, image/file will not be displayed.</p>
                                    <p class="pd-b-0 container-fluid mg-b-2">2. Do not change column titles.</p>
                                    <p class="pd-b-0 container-fluid mg-b-2">3. Use *.csv files only.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
