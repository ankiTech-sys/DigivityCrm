<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->

@section('main-content')
{{-- main section start here --}}

@if ($errors->any())

@foreach ($errors->all() as $error)
alert('{{ $error }}');
@endforeach
@endif



{{-- table section satrt here --}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Global Setting</li>
        <li class="breadcrumb-item active" aria-current="page">School</li>
    </ol>
</nav>

<div class="custom-card col-lg-10 mx-auto">
    <div class="panel panel-default">
        <div class="panel-heading"><b><i class="fa fa-list"></i> School</b></div>
        <div class="panel-body pd-b-0 row">
            <div class="col-lg-6 mx-auto">
                <label for="" class="form-label">Select School <span class="text-danger">*</span></label>
                <select name="" class="select2 form-select" id="">
                    @foreach($schools as $school)
                    <option value="{{$school->id ?? ''}}">
                        <span class="fw-bold">{{$school->school_name ?? ''}}</span> {{$school->contact_no ?? ''}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6 mx-auto">
                <div class="row">
                    <label for="" class="form-label">Please Select Courses <span class="text-danger">*</span></label>
                    @foreach($courses as $course)
                    <div class="col-lg-6">
                        <div class="input-group mb-3">
                            <div class="input-group-text" style="background-color: #caeadb;">
                                <input class="form-check-input mt-0" name="courses[]" {{$loop->iteration == 1 ? 'required' : ''}} type="checkbox" value="{{$course->id ?? ''}}" aria-label="Checkbox for following text input">
                            </div>
                            <input   type="text" value="{{$course->course_name ?? ''}}" class="form-control bg-light" aria-label="Text input with checkbox">
                            <div class="input-group-text" >
                            <input type="text" style="border:0px !important;" class="form-control1 bd-0 bg-success-light rounded wd-30 text-center" value="{{$loop->iteration}}">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
{{-- table section satrt here --}}
@endsection