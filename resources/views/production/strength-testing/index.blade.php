@extends('layouts.app')

@section('title', 'Strength Testing')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Concrete Strength Testing
                </h2>
                <div class="text-muted mt-1">Manage and track concrete strength tests</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.strength-testing.reports') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-file-report me-2"></i>
                        Test Reports
                    </a>
                    <a href="{{ route('production.strength-testing.standards') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-clipboard-check me-2"></i>
                        Standards
                    </a>
                    <a href="{{ route('production.strength-testing.create') }}" class="btn btn-success d-none d-sm-inline-block">
                        <i class="ti ti-plus me-2"></i>
                        New Test
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Strength Test Records</h3>
            <div class="card-actions">
                <form action="" method="GET" class="d-flex">
                    <input type="text" class="form-control me-2" placeholder="Search by ID, batch, or project...">
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-search"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>Test ID</th>
                            <th>Sample Date</th>
                            <th>Test Date</th>
                            <th>Mix Design</th>
                            <th>Batch No.</th>
                            <th>Project</th>
                            <th>Age (days)</th>
                            <th>Strength (MPa)</th>
                            <th>Status</th>
                            <th class="w-1">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $statuses = ['Passed', 'Failed', 'Pending', 'In Progress', 'Passed'];
                        $statusClasses = [
                            'Passed' => 'bg-success',
                            'Failed' => 'bg-danger',
                            'Pending' => 'bg-warning',
                            'In Progress' => 'bg-info'
                        ];
                        $projects = ['Highway Bridge Project', 'Commercial Building A', 'Residential Complex B', 'Government Office C', 'Industrial Facility D'];
                        $mixDesigns = ['K-225', 'K-250', 'K-300', 'K-350', 'K-400'];
                        @endphp

                        @for ($i = 1; $i <= 15; $i++)
                            @php
                                $sampleDate = now()->subDays(rand(30, 60))->format('Y-m-d');
                                $age = rand(3, 28);
                                $testDate = date('Y-m-d', strtotime($sampleDate . ' + ' . $age . ' days'));
                                $strength = rand(200, 450) / 10;
                                $status = $statuses[array_rand($statuses)];
                                $project = $projects[array_rand($projects)];
                                $mixDesign = $mixDesigns[array_rand($mixDesigns)];
                                $batchNo = 'B' . date('ymd', strtotime($sampleDate)) . sprintf('%03d', rand(1, 100));
                            @endphp
                            <tr>
                                <td>ST-{{ sprintf('%04d', $i) }}</td>
                                <td>{{ $sampleDate }}</td>
                                <td>{{ $testDate }}</td>
                                <td>{{ $mixDesign }}</td>
                                <td>{{ $batchNo }}</td>
                                <td>{{ $project }}</td>
                                <td>{{ $age }}</td>
                                <td>{{ $strength }}</td>
                                <td>
                                    <span class="badge {{ $statusClasses[$status] }}">{{ $status }}</span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('production.strength-testing.detail', $i) }}" class="btn btn-sm btn-primary">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <a href="{{ route('production.strength-testing.edit', $i) }}" class="btn btn-sm btn-warning">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer d-flex align-items-center">
            <p class="m-0 text-muted">Showing <span>1</span> to <span>15</span> of <span>50</span> entries</p>
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

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Strength Development Trend</h3>
                </div>
                <div class="card-body">
                    <div id="strength-chart" style="height: 250px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Test Results Distribution</h3>
                </div>
                <div class="card-body">
                    <div id="results-distribution" style="height: 250px;"></div>
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
        // Strength Development Trend Chart
        var strengthOptions = {
            series: [{
                name: "K-300",
                data: [12.5, 19.8, 25.6, 30.2, 32.8]
            }, {
                name: "K-350",
                data: [14.2, 22.5, 28.3, 33.7, 36.5]
            }, {
                name: "K-400",
                data: [16.8, 25.3, 31.7, 37.2, 40.3]
            }],
            chart: {
                height: 250,
                type: 'line',
                toolbar: {
                    show: false
                }
            },
            colors: ['#206bc4', '#4299e1', '#ae3ec9'],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['3 days', '7 days', '14 days', '21 days', '28 days'],
                title: {
                    text: 'Age (days)'
                }
            },
            yaxis: {
                title: {
                    text: 'Strength (MPa)'
                }
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + " MPa"
                    }
                }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            }
        };

        var strengthChart = new ApexCharts(document.querySelector("#strength-chart"), strengthOptions);
        strengthChart.render();

        // Results Distribution Chart
        var distributionOptions = {
            series: [68, 24, 8],
            chart: {
                type: 'donut',
                height: 250
            },
            labels: ['Passed', 'Pending', 'Failed'],
            colors: ['#2fb344', '#f59f00', '#d63939'],
            legend: {
                position: 'bottom'
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '50%'
                    }
                }
            }
        };

        var distributionChart = new ApexCharts(document.querySelector("#results-distribution"), distributionOptions);
        distributionChart.render();
    });
</script>
@endsection
