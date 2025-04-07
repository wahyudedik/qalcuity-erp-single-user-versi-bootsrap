@extends('layouts.app')

@section('title', 'Performance Management')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Performance Management
                    </h2>
                    <div class="text-muted mt-1">Manage employee performance reviews and KPIs</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.performance.dashboard') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-chart-bar me-2"></i>
                            KPI Dashboard
                        </a>
                        <a href="{{ route('hr.performance.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus me-2"></i>
                            New Performance Review
                        </a>
                        <a href="{{ route('hr.performance.create') }}" class="btn btn-primary d-sm-none btn-icon">
                            <i class="ti ti-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Performance Reviews</h3>
                    <div class="card-actions">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <select class="form-select" id="filterDepartment">
                                    <option value="">All Departments</option>
                                    <option value="Production">Production</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Sales">Sales</option>
                                    <option value="HR">HR</option>
                                    <option value="Warehouse">Warehouse</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <select class="form-select" id="filterPeriod">
                                    <option value="">All Periods</option>
                                    <option value="Q1 2023">Q1 2023</option>
                                    <option value="Q2 2023">Q2 2023</option>
                                    <option value="Q3 2023">Q3 2023</option>
                                    <option value="Q4 2023">Q4 2023</option>
                                    <option value="Annual 2023">Annual 2023</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <select class="form-select" id="filterStatus">
                                    <option value="">All Statuses</option>
                                    <option value="Draft">Draft</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Approved">Approved</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Review Period</th>
                                    <th>Review Type</th>
                                    <th>Status</th>
                                    <th>Score</th>
                                    <th>Last Updated</th>
                                    <th class="w-1">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $employees = [
                                        [
                                            'id' => 1,
                                            'name' => 'Ahmad Fauzi',
                                            'department' => 'Production',
                                            'position' => 'Plant Manager',
                                        ],
                                        [
                                            'id' => 2,
                                            'name' => 'Siti Rahayu',
                                            'department' => 'Finance',
                                            'position' => 'Finance Manager',
                                        ],
                                        [
                                            'id' => 3,
                                            'name' => 'Budi Santoso',
                                            'department' => 'Sales',
                                            'position' => 'Sales Executive',
                                        ],
                                        [
                                            'id' => 4,
                                            'name' => 'Dewi Lestari',
                                            'department' => 'HR',
                                            'position' => 'HR Specialist',
                                        ],
                                        [
                                            'id' => 5,
                                            'name' => 'Eko Prasetyo',
                                            'department' => 'Warehouse',
                                            'position' => 'Warehouse Supervisor',
                                        ],
                                        [
                                            'id' => 6,
                                            'name' => 'Fitri Handayani',
                                            'department' => 'Production',
                                            'position' => 'Quality Control Officer',
                                        ],
                                        [
                                            'id' => 7,
                                            'name' => 'Gunawan Wibowo',
                                            'department' => 'Finance',
                                            'position' => 'Accountant',
                                        ],
                                        [
                                            'id' => 8,
                                            'name' => 'Hadi Nugroho',
                                            'department' => 'Sales',
                                            'position' => 'Marketing Specialist',
                                        ],
                                        [
                                            'id' => 9,
                                            'name' => 'Indah Permata',
                                            'department' => 'HR',
                                            'position' => 'Recruitment Officer',
                                        ],
                                        [
                                            'id' => 10,
                                            'name' => 'Joko Susilo',
                                            'department' => 'Warehouse',
                                            'position' => 'Inventory Clerk',
                                        ],
                                    ];

                                    $reviewTypes = ['Quarterly', 'Annual', 'Probation', 'Project-based'];
                                    $statuses = ['Draft', 'In Progress', 'Completed', 'Approved'];
                                    $periods = ['Q1 2023', 'Q2 2023', 'Q3 2023', 'Q4 2023', 'Annual 2023'];

                                    $reviews = [];
                                    for ($i = 0; $i < 20; $i++) {
                                        $employee = $employees[array_rand($employees)];
                                        $status = $statuses[array_rand($statuses)];
                                        $score = $status == 'Draft' || $status == 'In Progress' ? '-' : rand(60, 95);

                                        $reviews[] = [
                                            'id' => $i + 1,
                                            'employee_id' => $employee['id'],
                                            'employee_name' => $employee['name'],
                                            'department' => $employee['department'],
                                            'position' => $employee['position'],
                                            'period' => $periods[array_rand($periods)],
                                            'type' => $reviewTypes[array_rand($reviewTypes)],
                                            'status' => $status,
                                            'score' => $score,
                                            'updated_at' => date('Y-m-d H:i:s', strtotime('-' . rand(1, 30) . ' days')),
                                        ];
                                    }
                                @endphp

                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="avatar me-2"
                                                    style="background-image: url(https://placehold.co/128x128)"></span>
                                                <div>
                                                    <div>{{ $review['employee_name'] }}</div>
                                                    <div class="text-muted">{{ $review['position'] }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $review['department'] }}</td>
                                        <td>{{ $review['period'] }}</td>
                                        <td>{{ $review['type'] }}</td>
                                        <td>
                                            @if ($review['status'] == 'Draft')
                                                <span class="badge bg-secondary">Draft</span>
                                            @elseif($review['status'] == 'In Progress')
                                                <span class="badge bg-primary">In Progress</span>
                                            @elseif($review['status'] == 'Completed')
                                                <span class="badge bg-info">Completed</span>
                                            @elseif($review['status'] == 'Approved')
                                                <span class="badge bg-success">Approved</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($review['score'] != '-')
                                                @if ($review['score'] >= 90)
                                                    <span class="text-success">{{ $review['score'] }}</span>
                                                @elseif($review['score'] >= 75)
                                                    <span class="text-primary">{{ $review['score'] }}</span>
                                                @elseif($review['score'] >= 60)
                                                    <span class="text-warning">{{ $review['score'] }}</span>
                                                @else
                                                    <span class="text-danger">{{ $review['score'] }}</span>
                                                @endif
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ date('d M Y', strtotime($review['updated_at'])) }}</td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('hr.performance.detail', $review['id']) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('hr.performance.edit', $review['id']) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <p class="m-0 text-muted">Showing <span>1</span> to <span>20</span> of <span>50</span> entries</p>
                    <ul class="pagination m-0 ms-auto">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="ti ti-chevron-left"></i>
                                prev
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                next
                                <i class="ti ti-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Performance by Department</h3>
                        </div>
                        <div class="card-body">
                            <div id="chart-performance-department" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Performance Trend</h3>
                        </div>
                        <div class="card-body">
                            <div id="chart-performance-trend" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Quick Links</h3>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <a href="{{ route('hr.performance.templates') }}"
                                        class="card card-link card-link-pop">
                                        <div class="card-body text-center">
                                            <i class="ti ti-template icon mb-2 text-primary" style="font-size: 2rem;"></i>
                                            <h3 class="card-title">KPI Templates</h3>
                                            <p class="text-muted">Manage performance review templates</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('hr.performance.department') }}"
                                        class="card card-link card-link-pop">
                                        <div class="card-body text-center">
                                            <i class="ti ti-building icon mb-2 text-primary" style="font-size: 2rem;"></i>
                                            <h3 class="card-title">Department KPIs</h3>
                                            <p class="text-muted">Manage department-level KPIs</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('hr.performance.reports') }}" class="card card-link card-link-pop">
                                        <div class="card-body text-center">
                                            <i class="ti ti-report icon mb-2 text-primary" style="font-size: 2rem;"></i>
                                            <h3 class="card-title">Reports</h3>
                                            <p class="text-muted">Generate performance reports</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('hr.performance.dashboard') }}"
                                        class="card card-link card-link-pop">
                                        <div class="card-body text-center">
                                            <i class="ti ti-dashboard icon mb-2 text-primary"
                                                style="font-size: 2rem;"></i>
                                            <h3 class="card-title">KPI Dashboard</h3>
                                            <p class="text-muted">View performance metrics</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
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
            // Department performance chart
            var departmentOptions = {
                series: [{
                    data: [85, 78, 82, 91, 76]
                }],
                chart: {
                    type: 'bar',
                    height: 250,
                    toolbar: {
                        show: false,
                    }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal: true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                colors: ['#206bc4'],
                xaxis: {
                    categories: ['Production', 'Finance', 'Sales', 'HR', 'Warehouse'],
                }
            };

            var departmentChart = new ApexCharts(document.querySelector("#chart-performance-department"),
                departmentOptions);
            departmentChart.render();

            // Performance trend chart
            var trendOptions = {
                series: [{
                    name: 'Average Score',
                    data: [78, 81, 80, 83, 85]
                }],
                chart: {
                    height: 250,
                    type: 'line',
                    toolbar: {
                        show: false,
                    }
                },
                colors: ['#206bc4'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                xaxis: {
                    categories: ['Q4 2022', 'Q1 2023', 'Q2 2023', 'Q3 2023', 'Q4 2023'],
                },
                markers: {
                    size: 4
                }
            };

            var trendChart = new ApexCharts(document.querySelector("#chart-performance-trend"), trendOptions);
            trendChart.render();
        });
    </script>
@endsection
