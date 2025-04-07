@extends('layouts.app')

@section('title', 'Strength Test Reports')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Strength Test Reports
                </h2>
                <div class="text-muted mt-1">Generate and view comprehensive strength test reports</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.strength-testing') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-2"></i>
                        Back to Tests
                    </a>
                    <button type="button" class="btn btn-primary" onclick="window.print();">
                        <i class="ti ti-printer me-2"></i>
                        Print Current Report
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Report Parameters</h3>
        </div>
        <div class="card-body">
            <form action="#" method="GET">
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Report Type</label>
                            <select class="form-select" name="report_type">
                                <option value="summary">Summary Report</option>
                                <option value="detailed">Detailed Report</option>
                                <option value="compliance">Compliance Report</option>
                                <option value="trend">Trend Analysis</option>
                                <option value="project">Project-based Report</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Date Range</label>
                            <select class="form-select" name="date_range">
                                <option value="7">Last 7 days</option>
                                <option value="30" selected>Last 30 days</option>
                                <option value="90">Last 90 days</option>
                                <option value="180">Last 6 months</option>
                                <option value="365">Last year</option>
                                <option value="custom">Custom range</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Project</label>
                            <select class="form-select" name="project_id">
                                <option value="">All Projects</option>
                                <option value="1">Highway Bridge Project</option>
                                <option value="2">Commercial Building A</option>
                                <option value="3">Residential Complex B</option>
                                <option value="4">Government Office C</option>
                                <option value="5">Industrial Facility D</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label">Mix Design</label>
                            <select class="form-select" name="mix_design">
                                <option value="">All Mix Designs</option>
                                <option value="K-225">K-225</option>
                                <option value="K-250">K-250</option>
                                <option value="K-300">K-300</option>
                                <option value="K-350">K-350</option>
                                <option value="K-400">K-400</option>
                                <option value="K-450">K-450</option>
                                <option value="K-500">K-500</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Generate Report</button>
                        <button type="button" class="btn btn-secondary" id="saveReportBtn">Save Report Settings</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Strength Test Summary Report</h3>
            <div class="card-actions">
                <span class="badge bg-blue">Last 30 Days</span>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <div class="text-end text-green">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    8% <i class="ti ti-trending-up ms-1"></i>
                                </span>
                            </div>
                            <div class="h1 m-0">{{ rand(40, 60) }}</div>
                            <div class="text-muted mb-3">Total Tests</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <div class="text-end text-green">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    3% <i class="ti ti-trending-up ms-1"></i>
                                </span>
                            </div>
                            <div class="h1 m-0">{{ rand(85, 95) }}%</div>
                            <div class="text-muted mb-3">Pass Rate</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <div class="text-end text-red">
                                <span class="text-red d-inline-flex align-items-center lh-1">
                                    2% <i class="ti ti-trending-down ms-1"></i>
                                </span>
                            </div>
                            <div class="h1 m-0">{{ number_format(rand(320, 380) / 10, 1) }}</div>
                            <div class="text-muted mb-3">Avg. 28-day Strength (MPa)</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body p-3 text-center">
                            <div class="text-end text-green">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    5% <i class="ti ti-trending-up ms-1"></i>
                                </span>
                            </div>
                            <div class="h1 m-0">{{ rand(5, 15) }}%</div>
                            <div class="text-muted mb-3">Avg. Strength Margin</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Strength Distribution by Mix Design</h3>
                        </div>
                        <div class="card-body">
                            <div id="strength-distribution-chart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Test Results by Project</h3>
                        </div>
                        <div class="card-body">
                            <div id="project-results-chart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Test Results Summary</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Mix Design</th>
                                    <th>Total Tests</th>
                                    <th>Avg. 3-day (MPa)</th>
                                    <th>Avg. 7-day (MPa)</th>
                                    <th>Avg. 28-day (MPa)</th>
                                    <th>Pass Rate</th>
                                    <th>Coefficient of Variation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $mixDesigns = ['K-225', 'K-250', 'K-300', 'K-350', 'K-400'];
                                @endphp

                                @foreach($mixDesigns as $mix)
                                    @php
                                        $baseStrength = intval(substr($mix, 2));
                                        $totalTests = rand(5, 15);
                                        $passRate = rand(80, 100);
                                        $avg3day = number_format($baseStrength * rand(40, 60) / 100, 1);
                                        $avg7day = number_format($baseStrength * rand(65, 80) / 100, 1);
                                        $avg28day = number_format($baseStrength * rand(100, 115) / 100, 1);
                                        $cov = number_format(rand(30, 80) / 10, 1);
                                    @endphp
                                    <tr>
                                        <td>{{ $mix }}</td>
                                        <td>{{ $totalTests }}</td>
                                        <td>{{ $avg3day }}</td>
                                        <td>{{ $avg7day }}</td>
                                        <td>{{ $avg28day }}</td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-start mt-1">
                                                    {{ $passRate }}%
                                                </div>
                                                <div class="float-end">
                                                    <small class="text-muted">{{ $totalTests - ceil($totalTests * (100 - $passRate) / 100) }}/{{ $totalTests }}</small>
                                                </div>
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $passRate }}%" aria-valuenow="{{ $passRate }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>{{ $cov }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Compliance Analysis</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Compliance with SNI 2847:2019</h4>
                            <p>Based on the analysis of test results over the last 30 days:</p>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Average strength requirement
                                    <span class="badge bg-success">Compliant</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Individual test requirement
                                    <span class="badge bg-success">Compliant</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Coefficient of variation
                                    <span class="badge bg-warning">Attention Needed</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Testing frequency
                                    <span class="badge bg-success">Compliant</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4>Recommendations</h4>
                            <div class="alert alert-info" role="alert">
                                <h4 class="alert-title">Improve consistency in K-300 mix</h4>
                                <div class="text-muted">The coefficient of variation for K-300 mix is slightly higher than recommended (8.2%). Consider reviewing batching procedures and material quality control.</div>
                            </div>
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-title">Excellent performance in K-400 mix</h4>
                                <div class="text-muted">K-400 mix shows excellent consistency and strength development. Current procedures should be maintained.</div>
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
        // Strength Distribution Chart
        var strengthOptions = {
            series: [{
                name: "K-225",
                data: [10.5, 16.8, 22.5]
            }, {
                name: "K-250",
                data: [12.2, 18.5, 25.8]
            }, {
                name: "K-300",
                data: [14.8, 22.3, 31.7]
            }, {
                name: "K-350",
                data: [16.5, 25.7, 36.2]
            }, {
                name: "K-400",
                data: [18.8, 28.3, 41.3]
            }],
            chart: {
                type: 'bar',
                height: 300,
                stacked: false,
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
                categories: ['3-day', '7-day', '28-day'],
            },
            yaxis: {
                title: {
                    text: 'Strength (MPa)'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " MPa"
                    }
                }
            },
            legend: {
                position: 'top'
            }
        };

        var strengthChart = new ApexCharts(document.querySelector("#strength-distribution-chart"), strengthOptions);
        strengthChart.render();

        // Project Results Chart
        var projectOptions = {
            series: [{{ rand(80, 95) }}, {{ rand(3, 10) }}, {{ rand(1, 5) }}],
            chart: {
                type: 'donut',
                height: 300,
            },
            labels: ['Passed', 'Failed', 'Pending'],
            colors: ['#2fb344', '#d63939', '#f59f00'],
            legend: {
                position: 'bottom'
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + "%"
                    }
                }
            }
        };

        var projectChart = new ApexCharts(document.querySelector("#project-results-chart"), projectOptions);
        projectChart.render();

        // Save Report Settings Button
        document.getElementById('saveReportBtn').addEventListener('click', function() {
            // Simulate saving report settings
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
            
            Toast.fire({
                icon: 'success',
                title: 'Report settings saved successfully'
            });
        });
    });
</script>
@endsection

