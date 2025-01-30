<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->

<!-- model section start here -->
@section('ModelTitle','Add New Course')
@section('ModelTitleInfo','Manage School Course')
@section('EditModelTitle','Edit  School Course')
@section('EditModelTitleInfo','Manage School Course')
@section('ModelSize', 'modal-lg')
@section('AddModelPage')
    @include('admin_panel.module.globalsetting.MasterAdmin.Add.add_course')
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
                            <th class="fw-bold">Course Name</th>
                            <th class="fw-bold">Course Code</th>
                            <th class="fw-bold">Course Full Name</th>
                            <th class="fw-bold">Is-Active</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr editurl="{{route('admin.global-setting.edit.course',$course->id)}}" deleteurl="{{ route('RecordDelete', ['id' => $course->id, 'table_name' => 'courses']) }}">
                            <td>{{$loop->iteration ?? ''}}</td>
                            <td>{{$course->sequence ?? ''}}</td>
                            <td>{{$course->course_name ?? ''}}</td>
                            <td>{{$course->course_code ?? ''}}</td>
                            <td>{{$course->course_full_name ?? ''}}</td>
                            <td class="text-center">{!! $course->is_active == 'yes' ? '<span class="badge text-bg-success">Active</span>
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