@extends('layouts.app')

@section('title', 'KPI Dashboard')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        KPI Dashboard
                    </h2>
                    <div class="text-muted mt-1">Company-wide performance metrics and KPIs</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-outline-primary d-none d-sm-inline-block" onclick="window.print()">
                            <i class="ti ti-printer me-2"></i>
                            Print Dashboard
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="ti ti-calendar me-2"></i>
                                Q4 2023
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Q1 2023</a>
                                <a class="dropdown-item" href="#">Q2 2023</a>
                                <a class="dropdown-item" href="#">Q3 2023</a>
                                <a class="dropdown-item active" href="#">Q4 2023</a>
                                <a class="dropdown-item" href="#">Annual 2023</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <!-- KPI Summary Cards -->
            <div class="row row-deck row-cards">
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Average Performance Score</div>
                            </div>
                            <div class="h1 mb-3">83.5</div>
                            <div class="d-flex mb-2">
                                <div>Compared to previous quarter</div>
                                <div class="ms-auto">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        2.5% <i class="ti ti-trending-up ms-1"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary" style="width: 83.5%" role="progressbar"
                                    aria-valuenow="83.5" aria-valuemin="0" aria-valuemax="100" aria-label="83.5% Complete">
                                    <span class="visually-hidden">83.5% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Completed Reviews</div>
                            </div>
                            <div class="h1 mb-3">92%</div>
                            <div class="d-flex mb-2">
                                <div>Target completion rate</div>
                                <div class="ms-auto">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        7% <i class="ti ti-trending-up ms-1"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success" style="width: 92%" role="progressbar"
                                    aria-valuenow="92" aria-valuemin="0" aria-valuemax="100" aria-label="92% Complete">
                                    <span class="visually-hidden">92% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Top Performers</div>
                            </div>
                            <div class="h1 mb-3">15%</div>
                            <div class="d-flex mb-2">
                                <div>Employees with score > 90</div>
                                <div class="ms-auto">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        3% <i class="ti ti-trending-up ms-1"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-info" style="width: 15%" role="progressbar" aria-valuenow="15"
                                    aria-valuemin="0" aria-valuemax="100" aria-label="15% Complete">
                                    <span class="visually-hidden">15% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Improvement Needed</div>
                            </div>
                            <div class="h1 mb-3">8%</div>
                            <div class="d-flex mb-2">
                                <div>Employees with score < 65</div>
                                        <div class="ms-auto">
                                            <span class="text-red d-inline-flex align-items-center lh-1">
                                                2% <i class="ti ti-trending-down ms-1"></i>
                                            </span>
                                        </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger" style="width: 8%" role="progressbar"
                                        aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="8% Complete">
                                        <span class="visually-hidden">8% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Department Performance Comparison</h3>
                            </div>
                            <div class="card-body">
                                <div id="chart-department-comparison" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">KPI Achievement Distribution</h3>
                            </div>
                            <div class="card-body">
                                <div id="chart-kpi-distribution" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Top Performers</h3>
                            </div>
                            <div class="card-table table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Employee</th>
                                            <th>Department</th>
                                            <th>Score</th>
                                            <th>Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $topPerformers = [
                                                [
                                                    'name' => 'Ahmad Fauzi',
                                                    'department' => 'Production',
                                                    'score' => 95,
                                                    'change' => 3,
                                                ],
                                                [
                                                    'name' => 'Dewi Lestari',
                                                    'department' => 'HR',
                                                    'score' => 94,
                                                    'change' => 5,
                                                ],
                                                [
                                                    'name' => 'Budi Santoso',
                                                    'department' => 'Sales',
                                                    'score' => 93,
                                                    'change' => 2,
                                                ],
                                                [
                                                    'name' => 'Fitri Handayani',
                                                    'department' => 'Production',
                                                    'score' => 92,
                                                    'change' => 4,
                                                ],
                                                [
                                                    'name' => 'Hadi Nugroho',
                                                    'department' => 'Sales',
                                                    'score' => 91,
                                                    'change' => 1,
                                                ],
                                            ];
                                        @endphp

                                        @foreach ($topPerformers as $performer)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar me-2"
                                                            style="background-image: url(https://placehold.co/128x128)"></span>
                                                        <div>{{ $performer['name'] }}</div>
                                                    </div>
                                                </td>
                                                <td>{{ $performer['department'] }}</td>
                                                <td>
                                                    <div class="text-success">{{ $performer['score'] }}</div>
                                                </td>
                                                <td>
                                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                                        +{{ $performer['change'] }}% <i class="ti ti-trending-up ms-1"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Needs Improvement</h3>
                            </div>
                            <div class="card-table table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Employee</th>
                                            <th>Department</th>
                                            <th>Score</th>
                                            <th>Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $needsImprovement = [
                                                [
                                                    'name' => 'Joko Susilo',
                                                    'department' => 'Warehouse',
                                                    'score' => 62,
                                                    'change' => -3,
                                                ],
                                                [
                                                    'name' => 'Maya Wijaya',
                                                    'department' => 'Production',
                                                    'score' => 63,
                                                    'change' => -2,
                                                ],
                                                [
                                                    'name' => 'Rudi Hartono',
                                                    'department' => 'Sales',
                                                    'score' => 64,
                                                    'change' => -1,
                                                ],
                                                [
                                                    'name' => 'Nina Sari',
                                                    'department' => 'Finance',
                                                    'score' => 64,
                                                    'change' => -4,
                                                ],
                                                [
                                                    'name' => 'Tono Prasetyo',
                                                    'department' => 'Warehouse',
                                                    'score' => 65,
                                                    'change' => -2,
                                                ],
                                            ];
                                        @endphp

                                        @foreach ($needsImprovement as $performer)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar me-2"
                                                            style="background-image: url(https://placehold.co/128x128)"></span>
                                                        <div>{{ $performer['name'] }}</div>
                                                    </div>
                                                </td>
                                                <td>{{ $performer['department'] }}</td>
                                                <td>
                                                    <div class="text-danger">{{ $performer['score'] }}</div>
                                                </td>
                                                <td>
                                                    <span class="text-red d-inline-flex align-items-center lh-1">
                                                        {{ $performer['change'] }}% <i
                                                            class="ti ti-trending-down ms-1"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Key Performance Indicators</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">Production KPIs</h3>
                                                <div class="mt-3">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div>Output Efficiency</div>
                                                        <div class="ms-auto">
                                                            <span class="text-green">92%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm mb-3">
                                                        <div class="progress-bar bg-success" style="width: 92%"
                                                            role="progressbar"></div>
                                                    </div>

                                                    <div class="d-flex align-items-center mb-2">
                                                        <div>Quality Compliance</div>
                                                        <div class="ms-auto">
                                                            <span class="text-green">95%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm mb-3">
                                                        <div class="progress-bar bg-success" style="width: 95%"
                                                            role="progressbar"></div>
                                                    </div>

                                                    <div class="d-flex align-items-center mb-2">
                                                        <div>Equipment Uptime</div>
                                                        <div class="ms-auto">
                                                            <span class="text-primary">87%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm mb-3">
                                                        <div class="progress-bar bg-primary" style="width: 87%"
                                                            role="progressbar"></div>
                                                    </div>

                                                    <div class="d-flex align-items-center mb-2">
                                                        <div>Waste Reduction</div>
                                                        <div class="ms-auto">
                                                            <span class="text-warning">78%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-warning" style="width: 78%"
                                                            role="progressbar"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">Sales KPIs</h3>
                                                <div class="mt-3">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div>Sales Target Achievement</div>
                                                        <div class="ms-auto">
                                                            <span class="text-primary">85%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm mb-3">
                                                        <div class="progress-bar bg-primary" style="width: 85%"
                                                            role="progressbar"></div>
                                                    </div>

                                                    <div class="d-flex align-items-center mb-2">
                                                        <div>Customer Retention</div>
                                                        <div class="ms-auto">
                                                            <span class="text-green">93%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm mb-3">
                                                        <div class="progress-bar bg-success" style="width: 93%"
                                                            role="progressbar"></div>
                                                    </div>

                                                    <div class="d-flex align-items-center mb-2">
                                                        <div>New Customer Acquisition</div>
                                                        <div class="ms-auto">
                                                            <span class="text-warning">76%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm mb-3">
                                                        <div class="progress-bar bg-warning" style="width: 76%"
                                                            role="progressbar"></div>
                                                    </div>

                                                    <div class="d-flex align-items-center mb-2">
                                                        <div>Quote-to-Contract Ratio</div>
                                                        <div class="ms-auto">
                                                            <span class="text-primary">82%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-primary" style="width: 82%"
                                                            role="progressbar"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">Finance KPIs</h3>
                                                <div class="mt-3">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div>Cost Reduction</div>
                                                        <div class="ms-auto">
                                                            <span class="text-primary">84%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm mb-3">
                                                        <div class="progress-bar bg-primary" style="width: 84%"
                                                            role="progressbar"></div>
                                                    </div>

                                                    <div class="d-flex align-items-center mb-2">
                                                        <div>Budget Compliance</div>
                                                        <div class="ms-auto">
                                                            <span class="text-green">91%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm mb-3">
                                                        <div class="progress-bar bg-success" style="width: 91%"
                                                            role="progressbar"></div>
                                                    </div>

                                                    <div class="d-flex align-items-center mb-2">
                                                        <div>Invoice Processing Time</div>
                                                        <div class="ms-auto">
                                                            <span class="text-primary">88%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm mb-3">
                                                        <div class="progress-bar bg-primary" style="width: 88%"
                                                            role="progressbar"></div>
                                                    </div>

                                                    <div class="d-flex align-items-center mb-2">
                                                        <div>Accounts Receivable</div>
                                                        <div class="ms-auto">
                                                            <span class="text-warning">79%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-warning" style="width: 79%"
                                                            role="progressbar"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                // Department comparison chart
                var departmentOptions = {
                    series: [{
                        name: 'Current Quarter',
                        data: [85, 78, 82, 91, 76]
                    }, {
                        name: 'Previous Quarter',
                        data: [82, 76, 79, 88, 75]
                    }],
                    chart: {
                        type: 'bar',
                        height: 300,
                        toolbar: {
                            show: false,
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: ['Production', 'Finance', 'Sales', 'HR', 'Warehouse'],
                    },
                    yaxis: {
                        title: {
                            text: 'Performance Score'
                        },
                        min: 50,
                        max: 100
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " points"
                            }
                        }
                    },
                    colors: ['#206bc4', '#adbdcc']
                };

                var departmentChart = new ApexCharts(document.querySelector("#chart-department-comparison"),
                    departmentOptions);
                departmentChart.render();

                // KPI distribution chart
                var distributionOptions = {
                    series: [15, 55, 22, 8],
                    chart: {
                        width: '100%',
                        type: 'pie',
                        height: 300
                    },
                    labels: ['Excellent (90+)', 'Good (75-89)', 'Average (65-74)', 'Needs Improvement (<65)'],
                    colors: ['#2fb344', '#206bc4', '#f59f00', '#d63939'],
                    legend: {
                        position: 'bottom'
                    }
                };

                var distributionChart = new ApexCharts(document.querySelector("#chart-kpi-distribution"),
                    distributionOptions);
                distributionChart.render();
            });
        </script>
    @endsection
