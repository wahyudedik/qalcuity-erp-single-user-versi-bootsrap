@extends('layouts.app')

@section('title', 'Strength Test Details')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Strength Test Details
                    </h2>
                    <div class="text-muted mt-1">Test ID: ST-{{ sprintf('%04d', $id) }}</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('production.strength-testing') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left me-2"></i>
                            Back to List
                        </a>
                        <a href="{{ route('production.strength-testing.edit', $id) }}" class="btn btn-primary">
                            <i class="ti ti-edit me-2"></i>
                            Edit Test
                        </a>
                        <button type="button" class="btn btn-info" onclick="window.print();">
                            <i class="ti ti-printer me-2"></i>
                            Print Report
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Test Information</h3>
                <div class="card-actions">
                    <span class="badge bg-success">Passed</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Sample ID</label>
                            <div class="form-control-plaintext">ST-{{ sprintf('%04d', $id) }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sample Date</label>
                            <div class="form-control-plaintext">{{ now()->subDays(rand(30, 60))->format('Y-m-d') }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Batch Number</label>
                            <div class="form-control-plaintext">
                                B{{ now()->subDays(rand(30, 60))->format('ymd') }}{{ sprintf('%03d', rand(1, 100)) }}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mix Design</label>
                            <div class="form-control-plaintext">K-{{ rand(2, 5) }}00</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Project</label>
                            <div class="form-control-plaintext">
                                @php
                                    $projects = [
                                        'Highway Bridge Project',
                                        'Commercial Building A',
                                        'Residential Complex B',
                                        'Government Office C',
                                        'Industrial Facility D',
                                    ];
                                    echo $projects[array_rand($projects)];
                                @endphp
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Number of Specimens</label>
                            <div class="form-control-plaintext">3</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Specimen Type</label>
                            <div class="form-control-plaintext">Cylinder (15x30 cm)</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Curing Method</label>
                            <div class="form-control-plaintext">Water Curing</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Test Ages (days)</label>
                            <div class="form-control-plaintext">3, 7, 28</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Additional Notes</label>
                            <div class="form-control-plaintext">Sample taken from truck discharge at site entrance. Weather
                                conditions: Sunny, 32°C.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Fresh Concrete Properties</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Slump (mm)</label>
                                    <div class="form-control-plaintext">{{ rand(80, 120) }}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Temperature (°C)</label>
                                    <div class="form-control-plaintext">{{ rand(28, 35) }}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Air Content (%)</label>
                                    <div class="form-control-plaintext">{{ number_format(rand(15, 35) / 10, 1) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sampling Location</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Location Type</label>
                                    <div class="form-control-plaintext">Truck Discharge</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Location Details</label>
                                    <div class="form-control-plaintext">Site entrance, Building A foundation</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Test Results</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>Age (days)</th>
                                <th>Test Date</th>
                                <th>Specimen ID</th>
                                <th>Weight (kg)</th>
                                <th>Failure Load (kN)</th>
                                <th>Strength (MPa)</th>
                                <th>% of Design</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sampleDate = now()->subDays(rand(30, 60));
                                $designStrength = rand(25, 40);
                                $ages = [3, 7, 28];
                                $statuses = ['Passed', 'Passed', 'Passed'];
                                $statusClasses = [
                                    'Passed' => 'bg-success',
                                    'Failed' => 'bg-danger',
                                    'Pending' => 'bg-warning',
                                ];
                            @endphp

                            @foreach ($ages as $index => $age)
                                @php
                                    $testDate = (clone $sampleDate)->addDays($age);
                                    $percentOfDesign =
                                        $age == 3 ? rand(40, 60) : ($age == 7 ? rand(65, 80) : rand(95, 110));
                                    $strength = ($designStrength * $percentOfDesign) / 100;
                                    $weight = number_format(rand(78, 82) / 10, 1);
                                    $failureLoad = round($strength * 17.67, 1); // Approximate conversion for 15cm cylinder
                                    $status = $statuses[$index];
                                @endphp
                                <tr>
                                    <td>{{ $age }}</td>
                                    <td>{{ $testDate->format('Y-m-d') }}</td>
                                    <td>ST-{{ sprintf('%04d', $id) }}-{{ $index + 1 }}</td>
                                    <td>{{ $weight }}</td>
                                    <td>{{ $failureLoad }}</td>
                                    <td>{{ number_format($strength, 1) }}</td>
                                    <td>{{ $percentOfDesign }}%</td>
                                    <td>
                                        <span class="badge {{ $statusClasses[$status] }}">{{ $status }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Strength Development</h3>
                    </div>
                    <div class="card-body">
                        <div id="strength-development-chart" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Test Photos</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <a href="#" class="d-block">
                                    <img src="https://placehold.co/400x300/e9ecef/495057?text=Specimen+Photo"
                                        class="img-fluid rounded" alt="Specimen Photo">
                                </a>
                                <div class="mt-2 text-center text-muted">Specimen before testing</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="#" class="d-block">
                                    <img src="https://placehold.co/400x300/e9ecef/495057?text=Failure+Pattern"
                                        class="img-fluid rounded" alt="Failure Pattern">
                                </a>
                                <div class="mt-2 text-center text-muted">Failure pattern after testing</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Test History & Comments</h3>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h4 class="mb-3">Activity Log</h4>
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="avatar"
                                        style="background-image: url(https://placehold.co/128x128)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                        <strong>John Doe</strong> created the test record
                                    </div>
                                    <div class="text-muted">{{ now()->subDays(rand(30, 60))->format('Y-m-d H:i') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="avatar"
                                        style="background-image: url(https://placehold.co/128x128)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                        <strong>Jane Smith</strong> added 3-day test results
                                    </div>
                                    <div class="text-muted">{{ now()->subDays(rand(25, 28))->format('Y-m-d H:i') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="avatar"
                                        style="background-image: url(https://placehold.co/128x128)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                        <strong>Robert Johnson</strong> added 7-day test results
                                    </div>
                                    <div class="text-muted">{{ now()->subDays(rand(20, 23))->format('Y-m-d H:i') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="avatar"
                                        style="background-image: url(https://placehold.co/128x128)"></span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                        <strong>Sarah Williams</strong> added 28-day test results and marked test as
                                        complete
                                    </div>
                                    <div class="text-muted">{{ now()->subDays(rand(1, 3))->format('Y-m-d H:i') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="mb-3">Comments</h4>
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <span class="avatar"
                                            style="background-image: url(https://placehold.co/128x128)"></span>
                                    </div>
                                    <div class="col">
                                        <div class="mb-2">
                                            <strong>Robert Johnson</strong>
                                            <span class="text-muted">·
                                                {{ now()->subDays(20)->format('Y-m-d H:i') }}</span>
                                        </div>
                                        <div>
                                            7-day strength is slightly lower than expected. Will monitor 28-day results
                                            closely.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <span class="avatar"
                                            style="background-image: url(https://placehold.co/128x128)"></span>
                                    </div>
                                    <div class="col">
                                        <div class="mb-2">
                                            <strong>Sarah Williams</strong>
                                            <span class="text-muted">· {{ now()->subDays(2)->format('Y-m-d H:i') }}</span>
                                        </div>
                                        <div>
                                            28-day strength results are satisfactory. All specimens passed the required
                                            strength criteria.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Add Comment</label>
                            <textarea class="form-control" rows="3" placeholder="Type your comment here..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Strength Development Chart
            var strengthOptions = {
                series: [{
                    name: "Actual Strength",
                    data: [
                        @php
                            $designStrength = rand(25, 40);
                            $ages = [3, 7, 28];
                            foreach ($ages as $index => $age) {
                                $percentOfDesign = $age == 3 ? rand(40, 60) : ($age == 7 ? rand(65, 80) : rand(95, 110));
                                $strength = ($designStrength * $percentOfDesign) / 100;
                                echo number_format($strength, 1);
                                if ($index < count($ages) - 1) {
                                    echo ', ';
                                }
                            }
                        @endphp
                    ]
                }, {
                    name: "Design Strength",
                    data: [
                        @php
                            foreach ($ages as $index => $age) {
                                $percentOfDesign = $age == 3 ? 50 : ($age == 7 ? 70 : 100);
                                $strength = ($designStrength * $percentOfDesign) / 100;
                                echo number_format($strength, 1);
                                if ($index < count($ages) - 1) {
                                    echo ', ';
                                }
                            }
                        @endphp
                    ]
                }],
                chart: {
                    height: 250,
                    type: 'line',
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#206bc4', '#4299e1'],
                dataLabels: {
                    enabled: true,
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
                markers: {
                    size: 5
                },
                xaxis: {
                    categories: ['3 days', '7 days', '28 days'],
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

            var strengthChart = new ApexCharts(document.querySelector("#strength-development-chart"),
                strengthOptions);
            strengthChart.render();
        });
    </script>
@endsection
