<!-- exteinding master layout here -->
@extends('admin_panel.comman.masterLayout')
<!-- exteinding master layout here -->

<!-- model section start here -->
@section('ModelTitle', 'Add New Company')
@section('ModelTitleInfo', 'Manage Company')
@section('EditModelTitle', 'Edit Company')
@section('EditModelTitleInfo', 'Manage Company')
@section('ModelSize', 'modal-lg')
@section('AddModelPage')
    @include('admin_panel.module.leadmanagement.MasterAdmin.MasterSetting.Add.add-new-company')
@endsection

@section('main-content')
    {{-- main section start here --}}

    {{-- main section start here --}}
    @include('admin_panel.module.customerinvoice.sub-navbar.leadmanagement-navbar')
    {{-- main section end here --}}

    {{-- table section satrt here --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lead Management</li>
            <li class="breadcrumb-item active" aria-current="page">Mastersetting</li>
            <li class="breadcrumb-item active" aria-current="page">Define Company</li>
        </ol>
    </nav>

    <div class="custom-card col-lg-12 mx-auto">
        <div class="panel panel-default">
            <div class="panel-heading"><b><i class="fa fa-list"></i> Define Company</b></div>
            <div class="panel-body pd-b-0 row">
                <div class="col-lg-2">
                    @include('admin_panel.layouts.actionbutton.ActionButton')
                </div>
                <div class="col-lg-10 vhr">
                    <table id="example2" class="table datatable table-bordered dataTable example2">
                        <thead class="bg-light fw-bold">
                            <tr class="py-3">
                                <th class="fw-bold">Sr. No.</th>
                                <th class="fw-bold">Company Name</th>
                                <th class="fw-bold text-center">Is-Active</th>
                                <th class="fw-bold">Modifyed At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr editUrl="{{ route('edit-company', $company->id) }}"
                                    deleteurl="{{ route('RecordDelete', ['id' => $company->id, 'table_name' => 'erp_companies']) }}">
                                    <td class="">{{ $loop->iteration }}</td>
                                    <td>{{ $company->company_name ?? '' }}</td>
                                    <td class="text-center">
                                        @if ($company->status == 'yes')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="">{{ nowdate($company->updated_at ?? '', 'd-m-Y') }}</td>
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
