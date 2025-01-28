<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->


@section('main-content')
{{-- main section start here --}}

{{-- table section satrt here --}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Global Setting</li>
        <li class="breadcrumb-item active" aria-current="page">Financial Year</li>
    </ol>
</nav>

<div class="custom-card col-lg-12 mx-auto">
    <div class="panel panel-default">
        <div class="panel-heading"><b><i class="fa fa-list"></i> Financial Year List</b></div>
        <div class="panel-body pd-b-0 row">
            <div class="col-lg-2">
            @include('admin_panel.layouts.actionbutton.ActionButton')
            </div>
            <div class="col-lg-10 vhr">
            <table id="example2" class="table datatable table-bordered dataTable example2" >
                    <thead class="bg-light fw-bold">
                        <tr class="py-3">
                            <th class="fw-bold">Financial Year</th>
                            <th class="fw-bold">Start Date</th>
                            <th class="fw-bold">End Date</th>
                            <th class="fw-bold">Is-Active</th>
                            <th class="fw-bold">Action</th>
                            <th class="fw-bold">Action</th>
                            <th class="fw-bold">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                      </table>
            </div>
        </div>
        </div>

</div>
</div>


</div>

{{-- table section satrt here --}}

@endsection