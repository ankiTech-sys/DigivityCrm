<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->

<!-- model section start here -->
@section('ModelTitle','Add New Financial Year')
@section('ModelTitleInfo','Manage Financial Year')
@section('EditModelTitle','Edit Financial Year')
@section('EditModelTitleInfo','Manage Financial Year')
@section('ModelSize', 'modal-lg')
@section('AddModelPage')
    @include('admin_panel.module.globalsetting.MasterAdmin.Add.add_financial')
@endsection

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
                            <th class="fw-bold">Sr. No.</th>
                            <th class="fw-bold">Financial Year</th>
                            <th class="fw-bold">Start Date</th>
                            <th class="fw-bold">End Date</th>
                            <th class="fw-bold">Is-Active</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($financialyear as $fyear)
                        <tr editurl="{{route('admin.global-setting.edit.financialYear',$fyear->id)}}" deleteurl="{{ route('RecordDelete', ['id' => $fyear->id, 'table_name' => 'financial_year']) }}">
                            <td>{{$loop->iteration ?? ''}}</td>
                            <td>{{$fyear->financial_session ?? ''}}</td>
                            <td>{{$fyear->start_date ?? ''}}</td>
                            <td>{{$fyear->end_date ?? ''}}</td>
                            <td class="text-center">{!! $fyear->is_active == 'yes' ? '<span class="badge text-bg-success">Active</span>
                                ' : '<span class="badge text-bg-danger">In-Active</span>'
                                !!}</td>
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
@endsection