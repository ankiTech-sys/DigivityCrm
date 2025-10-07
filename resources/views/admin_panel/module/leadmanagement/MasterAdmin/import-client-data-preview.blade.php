<!-- Module: Customer Invoice  -->
<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->


@section('main-content')
    {{-- main section start here --}}
    @include('admin_panel.module.customerinvoice.sub-navbar.leadmanagement-navbar')
    {{-- main section end here --}}



    <!--Table Section Start Here-->
    <div class="custom-card col-lg-12 mx-auto">
        <div class="panel panel-default">
            <div class="panel-heading"><b><i class="fa fa-list"></i> Clients Import Preview</b></div>
            <div class="panel-body pd-b-0 row">

                <div class="col-lg-12 vhr">
                    <table id="" class="table  table-bordered ">
                        <thead class="bg-light fw-bold">
                            <tr class="py-3">
                                <th class="fw-bold">Sr. No.</th>
                                @foreach ($headers as $header)
                                    <th class="text-center">{{ $header ?? '' }}</th>
                                @endforeach
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
