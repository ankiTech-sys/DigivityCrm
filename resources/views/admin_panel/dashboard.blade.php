{{-- extending master layout here --}}
@extends('admin_panel.comman.masterLayout')
{{-- extending master layout here --}}

{{-- main content section start here --}}
@section('main-content')

    <div class="container-fluid pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Digivity CRM Dashboard</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
            </div>
        </div>

        {{-- Graph Row --}}
        <div class="row">
            {{-- Billing Chart --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm rounded-2">
                    <div class="card-body">
                        <h6 class="card-title">Billing Overview</h6>
                        <canvas id="billingChart" height="200"></canvas>
                    </div>
                </div>
            </div>

            {{-- Quotation Chart --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm rounded-2">
                    <div class="card-body">
                        <h6 class="card-title">Quotation Stats</h6>
                        <canvas id="quotationChart" height="200"></canvas>
                    </div>
                </div>
            </div>

            {{-- Task Chart --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm rounded-2">
                    <div class="card-body">
                        <h6 class="card-title">Task Progress</h6>
                        <canvas id="taskChart" height="200"></canvas>
                    </div>
                </div>
            </div>

            {{-- MyMeetings Chart --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm rounded-2">
                    <div class="card-body">
                        <h6 class="card-title">Meetings Overview</h6>
                        <canvas id="meetingsChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const billingChart = new Chart(document.getElementById('billingChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr'],
                datasets: [{
                    label: 'Invoiced (₹)',
                    data: [15000, 22000, 18000, 25000],
                    backgroundColor: '#1C028F'
                }]
            }
        });

        const quotationChart = new Chart(document.getElementById('quotationChart'), {
            type: 'pie',
            data: {
                labels: ['Accepted', 'Pending', 'Rejected'],
                datasets: [{
                    label: 'Quotation Status',
                    data: [45, 30, 25],
                    backgroundColor: ['#ED4E0A', '#FFCE56', '#E74C3C']
                }]
            }
        });

        const taskChart = new Chart(document.getElementById('taskChart'), {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'In Progress', 'Pending'],
                datasets: [{
                    label: 'Tasks',
                    data: [20, 15, 10],
                    backgroundColor: ['#28A745', '#FFC107', '#DC3545']
                }]
            }
        });

        const meetingsChart = new Chart(document.getElementById('meetingsChart'), {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                datasets: [{
                    label: 'Meetings Scheduled',
                    data: [3, 4, 2, 5, 1],
                    borderColor: '#007BFF',
                    fill: false,
                    tension: 0.3
                }]
            }
        });
    </script>
    
@endsection
