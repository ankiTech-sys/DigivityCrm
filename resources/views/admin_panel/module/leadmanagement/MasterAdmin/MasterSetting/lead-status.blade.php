<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->

<!-- model section start here -->
@section('ModelTitle','Add New Lead Status')
@section('ModelTitleInfo','Manage Lead Status')
@section('EditModelTitle','Edit Lead Status ')
@section('EditModelTitleInfo','Manage Lead Status')
@section('ModelSize', 'modal-lg')
@section('AddModelPage')
    @include('admin_panel.module.leadmanagement.MasterAdmin.MasterSetting.Add.add-new-lead')
@endsection

@section('main-content')
{{-- main section start here --}}

{{-- table section satrt here --}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lead Management</li>
        <li class="breadcrumb-item active" aria-current="page">Mastersetting</li>
        <li class="breadcrumb-item active" aria-current="page">Lead Status</li>
    </ol>
</nav>

<div class="custom-card col-lg-12 mx-auto">
    <div class="panel panel-default">
        <div class="panel-heading"><b><i class="fa fa-list"></i> Lead Status</b></div>
        <div class="panel-body pd-b-0 row">
            <div class="col-lg-2">
            @include('admin_panel.layouts.actionbutton.ActionButton')
            </div>
            <div class="col-lg-10 vhr">
            <table id="example2" class="table datatable table-bordered dataTable example2" >
                    <thead class="bg-light fw-bold">
                        <tr class="py-3">
                            <th class="fw-bold">Sr. No.</th>
                            <th class="fw-bold">Lead Status Name</th>
                            <th class="fw-bold">Description</th>
                            <th class="fw-bold text-center">Is-Active</th>
                        </tr>
                    </thead>
                  <tbody>
                    @foreach($statuss as $status)
                      <tr editurl="{{route('edit-lead-status',$status->id)}}" deleteurl="{{ route('RecordDelete', ['id' => $status->id, 'table_name' => 'lead_statuses']) }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $status->name }}</td>
                        <td>{{ $status->description }}</td>
                        <td class="text-center">
                           @if($status->status == "yes")
                           <span class="badge bg-success">Active</span>
                           @else
                           <span class="badge bg-danger">Inactive</span>
                           @endif
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
@endsection