<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->

<!-- model section start here -->
@section('ModelTitle','Add New Service Category')
@section('ModelTitleInfo','Manage Service Category')
@section('EditModelTitle','Edit Service Category')
@section('EditModelTitleInfo','Manage Service Category')
@section('ModelSize', 'modal-lg')
@section('AddModelPage')
    @include('admin_panel.module.globalsetting.MasterAdmin.Add.add_service_category')
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
                            <th class="fw-bold">Sequence</th>
                            <th class="fw-bold">Service Category Name</th>
                            <th class="fw-bold">Service Category Code</th>
                            <th class="fw-bold">Description</th>
                            <th class="fw-bold">Is-Active</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorys as $cate)
                        <tr editurl="{{route('admin.global-setting.edit.service_category',$cate->id)}}" deleteurl="{{ route('RecordDelete', ['id' => $cate->id, 'table_name' => 'service_category']) }}">
                            <td>{{$loop->iteration ?? ''}}</td>
                            <td>{{$cate->sequence ?? ''}}</td>
                            <td>{{$cate->category_name ?? ''}}</td>
                            <td>{{$cate->category_code ?? ''}}</td>
                            <td>{{$cate->description ?? ''}}</td>
                            <td class="text-center">{!! $cate->is_active == 'yes' ? '<span class="badge text-bg-success">Active</span>
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