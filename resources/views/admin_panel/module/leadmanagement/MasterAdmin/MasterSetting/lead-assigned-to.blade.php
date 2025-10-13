<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->

<!-- model section start here -->
@section('ModelTitle', 'Add New Lead Assignee')
@section('ModelTitleInfo', 'Manage Lead Assignee')
@section('EditModelTitle', 'Edit Lead Assignee')
@section('EditModelTitleInfo', 'Manage Lead Assignee')
@section('ModelSize', 'modal-lg')
@section('AddModelPage')
    @include('admin_panel.module.leadmanagement.MasterAdmin.MasterSetting.Add.add-new-leadassignee')
@endsection

@section('main-content')
    @include('admin_panel.module.customerinvoice.sub-navbar.leadmanagement-navbar')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item "><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lead Management</li>
            <li class="breadcrumb-item active" aria-current="page">Mastersetting</li>
            <li class="breadcrumb-item active" aria-current="page">Lead Assignee</li>
        </ol>
    </nav>

    <div class="custom-card col-lg-12 mx-auto">
        <div class="panel panel-default">
            <div class="panel-heading"><b><i class="fa fa-list"></i> Lead Assignee</b></div>
            <div class="panel-body pd-b-0 row">
                <div class="col-lg-2">
                    @include('admin_panel.layouts.actionbutton.ActionButton')
                </div>
                <div class="col-lg-10 vhr">
                    <table id="example2" class="table datatable table-bordered dataTable example2">
                        <thead class="bg-light fw-bold">
                            <tr class="py-3">
                                <th class="fw-bold">Sr. No.</th>
                                <th class="fw-bold">Lead Assignee Name</th>
                                <th class="fw-bold">Contact No
                                <th class="fw-bold">Is-Active</th>
                                <th class="fw-bold">Modifyed At</th>
                            </tr>
                        </thead>
                      <tbody>
                        @foreach ($leadassignees as $leadassignee)
                            <tr editUrl="{{ route('edit-leadAssignee', $leadassignee->id) }}"
                                deleteurl="{{ route('RecordDelete', ['id' => $leadassignee->id, 'table_name' => 'lead_assignee']) }}"
                                >
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $leadassignee->lead_assignee_name ?? "" }}</td>
                                <td>{{ $leadassignee->contact_no ?? "" }}</td>
                                 <td class="">
                                        @if ($leadassignee->status == 'yes')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ nowdate($leadassignee->updated_at ?? '', 'd-m-Y') }}</td>
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
