<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->

<!-- model section start here -->
@section('ModelTitle', 'Add New Lead Source')
@section('ModelTitleInfo', 'Manage Lead Source')
@section('EditModelTitle', 'Edit Lead Source ')
@section('EditModelTitleInfo', 'Manage Lead Source')
@section('ModelSize', 'modal-lg')
@section('AddModelPage')
    @include('admin_panel.module.leadmanagement.MasterAdmin.MasterSetting.Add.add-new-lead-source')
@endsection

@section('main-content')
    {{-- main section start here --}}
    {{-- main section start here --}}
    @include('admin_panel.module.customerinvoice.sub-navbar.leadmanagement-navbar')
    {{-- main section end here --}}
    {{-- table section satrt here --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item "><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lead Management</li>
            <li class="breadcrumb-item active" aria-current="page">Mastersetting</li>
            <li class="breadcrumb-item active" aria-current="page">Lead Source</li>
        </ol>
    </nav>

    <div class="custom-card col-lg-12 mx-auto">
        <div class="panel panel-default">
            <div class="panel-heading"><b><i class="fa fa-list"></i> Lead Source</b></div>
            <div class="panel-body pd-b-0 row">
                <div class="col-lg-2">
                    @include('admin_panel.layouts.actionbutton.ActionButton')
                </div>
                <div class="col-lg-10 vhr">
                    <table id="example2" class="table datatable table-bordered dataTable example2">
                        <thead class="bg-light fw-bold">
                            <tr class="py-3">
                                <th class="fw-bold">Sr. No.</th>
                                <th class="fw-bold">Lead Source Name</th>
                                <th class="fw-bold">Is-Active</th>
                                <th class="fw-bold">Modifyed At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leadsources as $leadsource)
                                <tr editUrl="{{ route('edit-leadSource-type', $leadsource->id) }}"
                                    deleteurl="{{ route('RecordDelete', ['id' => $leadsource->id, 'table_name' => 'lead_source']) }}">
                                    <td>{{ $loop->iteration ?? '' }}</td>
                                    <td>{{ $leadsource->lead_source_name ?? '' }}</td>
                                    <td class="">
                                        @if ($leadsource->status == 'yes')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ nowdate($leadsource->updated_at ?? '', 'd-m-Y') }}</td>
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
