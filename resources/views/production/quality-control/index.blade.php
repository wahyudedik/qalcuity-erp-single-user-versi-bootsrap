@extends('layouts.app')

@section('title', 'Quality Control')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Quality Control
                </h2>
                <div class="text-muted mt-1">Manage quality control tests and standards</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.quality-control.standards') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-clipboard-check me-2"></i>
                        Quality Standards
                    </a>
                    <a href="{{ route('production.quality-control.reports') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-report me-2"></i>
                        QC Reports
                    </a>
                    <a href="{{ route('production.quality-control.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-plus me-2"></i>
                        New QC Test
                    </a>
                    <a href="{{ route('production.quality-control.create') }}" class="btn btn-primary d-sm-none">
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
                <h3 class="card-title">Quality Control Tests</h3>
                <div class="card-actions">
                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-select" id="filterBranch">
                                <option value="">All Branches</option>
                                <option value="1">Jakarta Plant</option>
                                <option value="2">Surabaya Plant</option>
                                <option value="3">Bandung Plant</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" id="filterStatus">
                                <option value="">All Statuses</option>
                                <option value="passed">Passed</option>
                                <option value="failed">Failed</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Test ID</th>
                                <th>Date</th>
                                <th>Batch No.</th>
                                <th>Test Type</th>
                                <th>Mix Design</th>
                                <th>Technician</th>
                                <th>Status</th>
                                <th class="w-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $testTypes = ['Slump Test', 'Compression Test', 'Air Content', 'Temperature', 'Unit Weight'];
                            $mixDesigns = ['K-225', 'K-250', 'K-300', 'K-350', 'K-400', 'K-450', 'K-500'];
                            $technicians = ['Ahmad Fauzi', 'Budi Santoso', 'Dewi Putri', 'Eko Prasetyo', 'Fitri Handayani'];
                            $statuses = ['passed', 'failed', 'pending'];
                            $statusBadges = [
                                'passed' => 'bg-success',
                                'failed' => 'bg-danger',
                                'pending' => 'bg-warning'
                            ];
                            @endphp

                            @for ($i = 1; $i <= 15; $i++)
                                @php
                                $testType = $testTypes[array_rand($testTypes)];
                                $mixDesign = $mixDesigns[array_rand($mixDesigns)];
                                $technician = $technicians[array_rand($technicians)];
                                $status = $statuses[array_rand($statuses)];
                                $date = date('Y-m-d', strtotime("-" . rand(0, 30) . " days"));
                                $batchNo = 'B' . date('ymd', strtotime($date)) . sprintf('%03d', rand(1, 100));
                                @endphp
                                <tr>
                                    <td>QC{{ sprintf('%05d', $i) }}</td>
                                    <td>{{ $date }}</td>
                                    <td>{{ $batchNo }}</td>
                                    <td>{{ $testType }}</td>
                                    <td>{{ $mixDesign }}</td>
                                    <td>{{ $technician }}</td>
                                    <td>
                                        <span class="badge {{ $statusBadges[$status] }}">
                                            {{ ucfirst($status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('production.quality-control.detail', $i) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('production.quality-control.edit', $i) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="ti ti-chevron-left"></i>
                                prev
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                next
                                <i class="ti ti-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Quality Control Summary Cards -->
        <div class="row mt-4">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Total Tests This Month</div>
                        </div>
                        <div class="h1 mb-3">245</div>
                        <div class="d-flex mb-2">
                            <div>Compared to last month</div>
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
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
                            <div class="subheader">Pass Rate</div>
                        </div>
                        <div class="h1 mb-3">92.4%</div>
                        <div class="d-flex mb-2">
                            <div>Compared to target (90%)</div>
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    2.4% <i class="ti ti-trending-up"></i>
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
                            <div class="subheader">Failed Tests</div>
                        </div>
                        <div class="h1 mb-3">18</div>
                        <div class="d-flex mb-2">
                            <div>Compared to last month</div>
                            <div class="ms-auto">
                                <span class="text-red d-inline-flex align-items-center lh-1">
                                    3% <i class="ti ti-trending-down"></i>
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
                            <div class="subheader">Pending Tests</div>
                        </div>
                        <div class="h1 mb-3">7</div>
                        <div class="d-flex mb-2">
                            <div>Needs attention</div>
                            <div class="ms-auto">
                                <span class="text-yellow d-inline-flex align-items-center lh-1">
                                    <i class="ti ti-alert-triangle"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quality Control Charts -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Test Results by Type</h3>
                    </div>
                    <div class="card-body">
                        <div id="chart-test-types" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Quality Trend (Last 30 Days)</h3>
                    </div>
                    <div class="card-body">
                        <div id="chart-quality-trend" style="height: 250px;"></div>
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
        // Test Results by Type Chart
        var options = {
            series: [{
                name: 'Passed',
                data: [44, 55, 41, 37, 22]
            }, {
                name: 'Failed',
                data: [3, 4, 2, 1, 5]
            }, {
                name: 'Pending',
                data: [2, 3, 1, 2, 1]
            }],
            chart: {
                type: 'bar',
                height: 250,
                stacked: true,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                }
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
                categories: ['Slump Test', 'Compression Test', 'Air Content', 'Temperature', 'Unit Weight'],
            },
            yaxis: {
                title: {
                    text: 'Number of Tests'
                }
            },
            fill: {
                opacity: 1,
                colors: ['#2fb344', '#d63939', '#f59f00']
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + " tests"
                    }
                }
            },
            legend: {
                position: 'top'
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-test-types"), options);
        chart.render();

        // Quality Trend Chart
        var options2 = {
            series: [{
                name: "Pass Rate",
                data: [90, 91, 93, 92, 89, 88, 90, 92, 94, 93, 91, 92, 93, 95, 94, 93, 92, 91, 90, 92, 93, 94, 95, 93, 92, 91, 92, 93, 92, 94]
            }],
            chart: {
                height: 250,
                type: 'line',
                toolbar: {
                    show: false
                }
            },
            stroke: {
                width: 3,
                curve: 'smooth'
            },
            colors: ['#206bc4'],
            xaxis: {
                type: 'datetime',
                categories: Array.from({length: 30}, (_, i) => {
                    const date = new Date();
                    date.setDate(date.getDate() - (29 - i));
                    return date.toISOString().split('T')[0];
                })
            },
            yaxis: {
                min: 80,
                max: 100,
                title: {
                    text: 'Pass Rate (%)'
                }
            },
            markers: {
                size: 4
            },
            annotations: {
                yaxis: [{
                    y: 90,
                    borderColor: '#f59f00',
                    label: {
                        borderColor: '#f59f00',
                        style: {
                            color: '#fff',
                            background: '#f59f00'
                        },
                        text: 'Target (90%)'
                    }
                }]
            }
        };

        var chart2 = new ApexCharts(document.querySelector("#chart-quality-trend"), options2);
        chart2.render();
    });
</script>
@endsection
