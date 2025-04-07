@extends('layouts.app')

@section('title', 'Branch Performance Dashboard')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Branch Performance Dashboard</h2>
                    <div class="text-muted mt-1">Monitoring and analyzing branch performance metrics</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="ti ti-calendar"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Select date range"
                                    value="Jun 1, 2023 - Jun 30, 2023">
                            </div>
                        </span>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-report">
                            <i class="ti ti-file-download"></i>
                            Download Report
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Total Production</div>
                                <div class="ms-auto lh-1">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">June</a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item active" href="#">June</a>
                                            <a class="dropdown-item" href="#">May</a>
                                            <a class="dropdown-item" href="#">April</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">87,450 m³</div>
                            <div class="d-flex mb-2">
                                <div>Monthly Target</div>
                                <div class="ms-auto">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        8.3% <i class="ti ti-trending-up"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary" style="width: 83%" role="progressbar"
                                    aria-valuenow="83" aria-valuemin="0" aria-valuemax="100" aria-label="83% Complete">
                                    <span class="visually-hidden">83% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Average Quality Rating</div>
                                <div class="ms-auto lh-1">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">June</a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item active" href="#">June</a>
                                            <a class="dropdown-item" href="#">May</a>
                                            <a class="dropdown-item" href="#">April</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">4.7/5.0</div>
                            <div class="d-flex mb-2">
                                <div>vs Previous Month</div>
                                <div class="ms-auto">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        0.2 <i class="ti ti-trending-up"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success" style="width: 94%" role="progressbar"
                                    aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" aria-label="94% Complete">
                                    <span class="visually-hidden">94% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Average Profit Margin</div>
                                <div class="ms-auto lh-1">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">June</a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item active" href="#">June</a>
                                            <a class="dropdown-item" href="#">May</a>
                                            <a class="dropdown-item" href="#">April</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">24.8%</div>
                            <div class="d-flex mb-2">
                                <div>vs Target (25%)</div>
                                <div class="ms-auto">
                                    <span class="text-yellow d-inline-flex align-items-center lh-1">
                                        -0.2% <i class="ti ti-minus"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning" style="width: 99%" role="progressbar"
                                    aria-valuenow="99" aria-valuemin="0" aria-valuemax="100" aria-label="99% Complete">
                                    <span class="visually-hidden">99% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Equipment Utilization</div>
                                <div class="ms-auto lh-1">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">June</a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item active" href="#">June</a>
                                            <a class="dropdown-item" href="#">May</a>
                                            <a class="dropdown-item" href="#">April</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">82.7%</div>
                            <div class="d-flex mb-2">
                                <div>vs Target (85%)</div>
                                <div class="ms-auto">
                                    <span class="text-yellow d-inline-flex align-items-center lh-1">
                                        -2.3% <i class="ti ti-trending-down"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-blue" style="width: 97%" role="progressbar"
                                    aria-valuenow="97" aria-valuemin="0" aria-valuemax="100" aria-label="97% Complete">
                                    <span class="visually-hidden">97% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Monthly Production by Branch</h3>
                            <div class="ms-auto">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">Last 6 Months</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item active" href="#">Last 6 Months</a>
                                        <a class="dropdown-item" href="#">Last 3 Months</a>
                                        <a class="dropdown-item" href="#">Last 12 Months</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart-production-by-branch" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Branch Efficiency Ranking</h3>
                        </div>
                        <div class="card-body">
                            <div class="divide-y">
                                <div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="avatar">JU</span>
                                        </div>
                                        <div class="col">
                                            <div class="text-truncate">
                                                <strong>Jakarta Utara Plant</strong>
                                            </div>
                                            <div class="text-muted">Efficiency Score: 94.2%</div>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="badge bg-success">1</div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="avatar">SB</span>
                                        </div>
                                        <div class="col">
                                            <div class="text-truncate">
                                                <strong>Surabaya Plant</strong>
                                            </div>
                                            <div class="text-muted">Efficiency Score: 92.8%</div>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="badge bg-success">2</div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="avatar">BD</span>
                                        </div>
                                        <div class="col">
                                            <div class="text-truncate">
                                                <strong>Bandung Central</strong>
                                            </div>
                                            <div class="text-muted">Efficiency Score: 91.5%</div>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="badge bg-success">3</div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="avatar">MK</span>
                                        </div>
                                        <div class="col">
                                            <div class="text-truncate">
                                                <strong>Makassar Operations</strong>
                                            </div>
                                            <div class="text-muted">Efficiency Score: 89.7%</div>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="badge bg-primary">4</div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="avatar">MD</span>
                                        </div>
                                        <div class="col">
                                            <div class="text-truncate">
                                                <strong>Medan Operations</strong>
                                            </div>
                                            <div class="text-muted">Efficiency Score: 87.3%</div>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="badge bg-primary">5</div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="avatar">PL</span>
                                        </div>
                                        <div class="col">
                                            <div class="text-truncate">
                                                <strong>Palembang Plant</strong>
                                            </div>
                                            <div class="text-muted">Efficiency Score: 85.9%</div>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="badge bg-primary">6</div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="avatar">DP</span>
                                        </div>
                                        <div class="col">
                                            <div class="text-truncate">
                                                <strong>Denpasar Plant</strong>
                                            </div>
                                            <div class="text-muted">Efficiency Score: 82.4%</div>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="badge bg-warning">7</div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-auto">
                                            <span class="avatar">SM</span>
                                        </div>
                                        <div class="col">
                                            <div class="text-truncate">
                                                <strong>Semarang Central</strong>
                                            </div>
                                            <div class="text-muted">Efficiency Score: 78.1%</div>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <div class="badge bg-danger">8</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Quality Metrics by Branch</h3>
                        </div>
                        <div class="card-body">
                            <div id="chart-quality-metrics" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Profit Margin by Branch</h3>
                        </div>
                        <div class="card-body">
                            <div id="chart-profit-margin" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Branch Performance Metrics</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Branch</th>
                                            <th>Production (m³)</th>
                                            <th>Target Achievement</th>
                                            <th>Quality Rating</th>
                                            <th>Profit Margin</th>
                                            <th>Equipment Utilization</th>
                                            <th>Employee Productivity</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Jakarta Utara Plant</td>
                                            <td>18,500</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">103%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-success" style="width: 103%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>4.8/5.0</td>
                                            <td>26.5%</td>
                                            <td>85%</td>
                                            <td>411 m³/employee</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                        </tr>
                                        <tr>
                                            <td>Bandung Central</td>
                                            <td>14,200</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">98%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 98%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>4.7/5.0</td>
                                            <td>25.2%</td>
                                            <td>82%</td>
                                            <td>395 m³/employee</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                        </tr>
                                        <tr>
                                            <td>Surabaya Plant</td>
                                            <td>15,800</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">101%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-success" style="width: 101%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>4.6/5.0</td>
                                            <td>24.8%</td>
                                            <td>84%</td>
                                            <td>402 m³/employee</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                        </tr>
                                        <tr>
                                            <td>Medan Operations</td>
                                            <td>12,500</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">96%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 96%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>4.5/5.0</td>
                                            <td>23.7%</td>
                                            <td>80%</td>
                                            <td>378 m³/employee</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                        </tr>
                                        <tr>
                                            <td>Denpasar Plant</td>
                                            <td>9,800</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">85%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-warning" style="width: 85%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>4.4/5.0</td>
                                            <td>22.9%</td>
                                            <td>75%</td>
                                            <td>350 m³/employee</td>
                                            <td><span class="badge bg-warning">Maintenance</span></td>
                                        </tr>
                                        <tr>
                                            <td>Makassar Operations</td>
                                            <td>13,200</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">97%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 97%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>4.6/5.0</td>
                                            <td>24.1%</td>
                                            <td>82%</td>
                                            <td>388 m³/employee</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                        </tr>
                                        <tr>
                                            <td>Palembang Plant</td>
                                            <td>10,900</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">92%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 92%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>4.5/5.0</td>
                                            <td>23.5%</td>
                                            <td>78%</td>
                                            <td>372 m³/employee</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                        </tr>
                                        <tr>
                                            <td>Semarang Central</td>
                                            <td>8,500</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">78%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-danger" style="width: 78%"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>4.2/5.0</td>
                                            <td>21.8%</td>
                                            <td>72%</td>
                                            <td>340 m³/employee</td>
                                            <td><span class="badge bg-danger">Underperforming</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Download Report Modal -->
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Download Branch Performance Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Report Type</label>
                        <select class="form-select">
                            <option value="summary">Summary Report</option>
                            <option value="detailed">Detailed Report</option>
                            <option value="comparative">Comparative Analysis</option>
                            <option value="trend">Trend Analysis</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date Range</label>
                        <input type="text" class="form-control" value="Jun 1, 2023 - Jun 30, 2023">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Branches to Include</label>
                        <select class="form-select" multiple>
                            <option value="all" selected>All Branches</option>
                            <option value="jakarta">Jakarta Utara Plant</option>
                            <option value="bandung">Bandung Central</option>
                            <option value="surabaya">Surabaya Plant</option>
                            <option value="medan">Medan Operations</option>
                            <option value="denpasar">Denpasar Plant</option>
                            <option value="makassar">Makassar Operations</option>
                            <option value="palembang">Palembang Plant</option>
                            <option value="semarang">Semarang Central</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File Format</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="format" value="pdf" class="form-selectgroup-input"
                                    checked>
                                <span class="form-selectgroup-label">PDF</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="format" value="excel" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">Excel</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="format" value="csv" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">CSV</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary ms-auto">
                        <i class="ti ti-file-download me-1"></i>
                        Download Report
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Production by Branch Chart
            var productionOptions = {
                series: [{
                    name: 'Production Volume (m³)',
                    data: [18500, 14200, 15800, 12500, 9800, 13200, 10900, 8500]
                }, {
                    name: 'Target Volume (m³)',
                    data: [18000, 14500, 15600, 13000, 11500, 13600, 11800, 11000]
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
                    categories: ['Jakarta Utara', 'Bandung', 'Surabaya', 'Medan', 'Denpasar', 'Makassar',
                        'Palembang', 'Semarang'
                    ],
                },
                yaxis: {
                    title: {
                        text: 'Volume (m³)'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " m³"
                        }
                    }
                },
                colors: ['#206bc4', '#f59f00']
            };

            var productionChart = new ApexCharts(document.querySelector("#chart-production-by-branch"),
                productionOptions);
            productionChart.render();

            // Quality Metrics Chart
            var qualityOptions = {
                series: [{
                    name: 'Quality Rating',
                    data: [4.8, 4.7, 4.6, 4.5, 4.4, 4.6, 4.5, 4.2]
                }],
                chart: {
                    height: 300,
                    type: 'radar',
                    toolbar: {
                        show: false
                    }
                },
                xaxis: {
                    categories: ['Jakarta Utara', 'Bandung', 'Surabaya', 'Medan', 'Denpasar', 'Makassar',
                        'Palembang', 'Semarang'
                    ]
                },
                yaxis: {
                    min: 3.5,
                    max: 5
                },
                fill: {
                    opacity: 0.4,
                    colors: ['#4299e1']
                },
                stroke: {
                    width: 2,
                    colors: ['#4299e1']
                },
                markers: {
                    size: 5,
                    colors: ['#4299e1'],
                    hover: {
                        size: 8
                    }
                }
            };

            var qualityChart = new ApexCharts(document.querySelector("#chart-quality-metrics"), qualityOptions);
            qualityChart.render();

            // Profit Margin Chart
            var profitOptions = {
                series: [{
                    name: 'Profit Margin (%)',
                    data: [26.5, 25.2, 24.8, 23.7, 22.9, 24.1, 23.5, 21.8]
                }],
                chart: {
                    height: 300,
                    type: 'bar',
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal: true,
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val + "%";
                    },
                    offsetX: 20
                },
                xaxis: {
                    categories: ['Jakarta Utara', 'Bandung', 'Surabaya', 'Medan', 'Denpasar', 'Makassar',
                        'Palembang', 'Semarang'
                    ],
                },
                colors: ['#0ca678'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: "horizontal",
                        shadeIntensity: 0.25,
                        gradientToColors: undefined,
                        inverseColors: true,
                        opacityFrom: 0.85,
                        opacityTo: 0.85,
                        stops: [50, 0, 100]
                    },
                }
            };

            var profitChart = new ApexCharts(document.querySelector("#chart-profit-margin"), profitOptions);
            profitChart.render();
        });
    </script>
@endsection
