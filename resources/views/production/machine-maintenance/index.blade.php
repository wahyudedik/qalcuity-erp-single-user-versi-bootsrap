@extends('layouts.app')

@section('title', 'Machine Maintenance')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Machine Maintenance
                    </h2>
                    <div class="text-muted mt-1">Manage all maintenance activities for production equipment</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('production.machine-maintenance.schedule') }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-calendar me-2"></i>
                            Maintenance Schedule
                        </a>
                        <a href="{{ route('production.machine-maintenance.create') }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus me-2"></i>
                            Add New Maintenance Record
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Maintenance Records</h3>
                            <div class="ms-auto">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search records...">
                                    <button class="btn btn-icon" type="button">
                                        <i class="ti ti-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Show
                                    <div class="mx-2 d-inline-block">
                                        <select class="form-select form-select-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                    entries
                                </div>
                                <div class="ms-auto">
                                    <div class="btn-group">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-filter me-1"></i>
                                            Filter
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">All Machines</a>
                                            <a class="dropdown-item" href="#">Batch Plant</a>
                                            <a class="dropdown-item" href="#">Mixer</a>
                                            <a class="dropdown-item" href="#">Pump</a>
                                            <a class="dropdown-item" href="#">Conveyor</a>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-secondary ms-2">
                                        <i class="ti ti-file-export me-1"></i>
                                        Export
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Machine</th>
                                        <th>Type</th>
                                        <th>Maintenance Date</th>
                                        <th>Status</th>
                                        <th>Technician</th>
                                        <th>Cost</th>
                                        <th class="w-1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $machines = [
                                            'Batch Plant A',
                                            'Batch Plant B',
                                            'Mixer 1',
                                            'Mixer 2',
                                            'Concrete Pump 1',
                                            'Concrete Pump 2',
                                            'Conveyor Belt A',
                                            'Silo 1 Feeder',
                                            'Silo 2 Feeder',
                                            'Water Pump System',
                                        ];

                                        $types = [
                                            'Preventive',
                                            'Corrective',
                                            'Predictive',
                                            'Routine',
                                            'Emergency',
                                            'Scheduled',
                                            'Condition-based',
                                        ];

                                        $statuses = [
                                            'Completed' => 'success',
                                            'Scheduled' => 'info',
                                            'In Progress' => 'warning',
                                            'Delayed' => 'danger',
                                            'Cancelled' => 'secondary',
                                        ];

                                        $technicians = [
                                            'John Smith',
                                            'Maria Rodriguez',
                                            'Ahmed Hassan',
                                            'Li Wei',
                                            'External Vendor',
                                            'Maintenance Team',
                                        ];
                                    @endphp

                                    @for ($i = 1; $i <= 15; $i++)
                                        @php
                                            $machine = $machines[array_rand($machines)];
                                            $type = $types[array_rand($types)];
                                            $status = array_rand($statuses);
                                            $technician = $technicians[array_rand($technicians)];
                                            $date = date('Y-m-d', strtotime('-' . rand(0, 30) . ' days'));
                                            $cost = rand(500, 5000) * 1000;
                                        @endphp
                                        <tr>
                                            <td>MNT-{{ 2023 }}-{{ str_pad($i, 4, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{ $machine }}</td>
                                            <td>{{ $type }}</td>
                                            <td>{{ $date }}</td>
                                            <td>
                                                <span class="badge bg-{{ $statuses[$status] }}">{{ $status }}</span>
                                            </td>
                                            <td>{{ $technician }}</td>
                                            <td>Rp {{ number_format($cost, 0, ',', '.') }}</td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="{{ route('production.machine-maintenance.detail', $i) }}"
                                                        class="btn btn-sm btn-icon btn-outline-primary">
                                                        <i class="ti ti-eye"></i>
                                                    </a>
                                                    <a href="{{ route('production.machine-maintenance.edit', $i) }}"
                                                        class="btn btn-sm btn-icon btn-outline-primary">
                                                        <i class="ti ti-edit"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Showing <span>1</span> to <span>15</span> of <span>50</span> entries
                            </p>
                            <ul class="pagination m-0 ms-auto">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="ti ti-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="ti ti-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Maintenance Summary Cards -->
            <div class="row mt-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Total Maintenance Records</div>
                            </div>
                            <div class="h1 mb-3">245</div>
                            <div class="d-flex mb-2">
                                <div>This year</div>
                                <div class="ms-auto">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        12% <i class="ti ti-trending-up"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Scheduled Maintenance</div>
                            </div>
                            <div class="h1 mb-3">18</div>
                            <div class="d-flex mb-2">
                                <div>Next 30 days</div>
                                <div class="ms-auto">
                                    <span class="text-info d-inline-flex align-items-center lh-1">
                                        <i class="ti ti-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Maintenance Cost</div>
                            </div>
                            <div class="h1 mb-3">Rp 125.4 M</div>
                            <div class="d-flex mb-2">
                                <div>This year</div>
                                <div class="ms-auto">
                                    <span class="text-danger d-inline-flex align-items-center lh-1">
                                        8% <i class="ti ti-trending-up"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Downtime Hours</div>
                            </div>
                            <div class="h1 mb-3">342 hrs</div>
                            <div class="d-flex mb-2">
                                <div>This year</div>
                                <div class="ms-auto">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        -15% <i class="ti ti-trending-down"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Maintenance Analytics -->
            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Maintenance by Type</h3>
                        </div>
                        <div class="card-body">
                            <div id="maintenance-by-type" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Maintenance Cost Trend</h3>
                        </div>
                        <div class="card-body">
                            <div id="maintenance-cost-trend" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Maintenance -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Upcoming Scheduled Maintenance</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Machine</th>
                                        <th>Type</th>
                                        <th>Scheduled Date</th>
                                        <th>Technician</th>
                                        <th>Estimated Duration</th>
                                        <th>Status</th>
                                        <th class="w-1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $futureDates = [];
                                        for ($i = 1; $i <= 5; $i++) {
                                            $futureDates[] = date('Y-m-d', strtotime('+' . rand(1, 30) . ' days'));
                                        }
                                        sort($futureDates);
                                    @endphp

                                    @foreach ($futureDates as $index => $date)
                                        @php
                                            $machine = $machines[array_rand($machines)];
                                            $type = $types[array_rand($types)];
                                            $technician = $technicians[array_rand($technicians)];
                                            $duration = rand(2, 8) . ' hours';
                                        @endphp
                                        <tr>
                                            <td>{{ $machine }}</td>
                                            <td>{{ $type }}</td>
                                            <td>{{ $date }}</td>
                                            <td>{{ $technician }}</td>
                                            <td>{{ $duration }}</td>
                                            <td>
                                                <span class="badge bg-info">Scheduled</span>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="#" class="btn btn-sm btn-icon btn-outline-primary">
                                                        <i class="ti ti-calendar-event"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-icon btn-outline-danger">
                                                        <i class="ti ti-x"></i>
                                                    </a>
                                                </div>
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
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Maintenance by Type Chart
            var typeOptions = {
                series: [38, 25, 16, 12, 9],
                chart: {
                    type: 'pie',
                    height: 300,
                },
                labels: ['Preventive', 'Corrective', 'Predictive', 'Routine', 'Emergency'],
                colors: ['#206bc4', '#4299e1', '#6574cd', '#9f7aea', '#ed64a6'],
                legend: {
                    position: 'bottom'
                }
            };

            var typeChart = new ApexCharts(document.querySelector("#maintenance-by-type"), typeOptions);
            typeChart.render();

            // Maintenance Cost Trend Chart
            var costOptions = {
                series: [{
                    name: 'Maintenance Cost',
                    data: [12.5, 18.3, 14.2, 16.8, 21.7, 16.2, 10.5, 14.8, 18.2, 22.1, 19.5, 15.4]
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 3,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                    position: 'bottom'
                },
                yaxis: {
                    title: {
                        text: 'Million Rupiah'
                    }
                },
                colors: ['#206bc4']
            };

            var costChart = new ApexCharts(document.querySelector("#maintenance-cost-trend"), costOptions);
            costChart.render();
        });
    </script>
@endsection
