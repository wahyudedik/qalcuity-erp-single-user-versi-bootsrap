@extends('layouts.app')

@section('title', 'Production Plan Detail')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Production Plan Detail
                </h2>
                <div class="text-muted mt-1">Plan ID: PP-{{ str_pad($id, 5, '0', STR_PAD_LEFT) }}</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.planning') }}" class="btn btn-outline-secondary">
                        <i class="ti ti-arrow-left"></i>
                        Back to List
                    </a>
                    <a href="{{ route('production.planning.edit', $id) }}" class="btn btn-primary">
                        <i class="ti ti-edit"></i>
                        Edit Plan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Plan Overview -->
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">Plan Overview</h3>
                </div>
                <div class="card-body">
                    @php
                    $statuses = ['Scheduled', 'In Progress', 'Completed', 'Cancelled'];
                    $status = $statuses[array_rand($statuses)];
                    $statusClass = match($status) {
                        'Scheduled' => 'bg-blue',
                        'In Progress' => 'bg-yellow',
                        'Completed' => 'bg-green',
                        'Cancelled' => 'bg-red',
                        default => 'bg-secondary'
                    };
                    $progress = $status == 'Completed' ? 100 : ($status == 'Cancelled' ? 0 : rand(0, 95));
                    $branch = ['Jakarta Plant', 'Surabaya Plant', 'Bandung Plant', 'Medan Plant'][array_rand(['Jakarta Plant', 'Surabaya Plant', 'Bandung Plant', 'Medan Plant'])];
                    $batchPlant = ['Plant A', 'Plant B', 'Plant C', 'Mobile Plant'][array_rand(['Plant A', 'Plant B', 'Plant C', 'Mobile Plant'])];
                    $date = date('Y-m-d', strtotime("+".rand(1,10)." days"));
                    $volume = rand(50, 500);
                    @endphp
                    
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div>
                            <span class="badge {{ $statusClass }} fs-6">{{ $status }}</span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Branch</label>
                        <div>{{ $branch }}</div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Batch Plant</label>
                        <div>{{ $batchPlant }}</div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Production Date</label>
                        <div>{{ $date }}</div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Total Volume</label>
                        <div>{{ $volume }} m³</div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Progress</label>
                        <div class="progress mb-2">
                            <div class="progress-bar" style="width: {{ $progress }}%" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $progress }}% Complete">
                                <span class="visually-hidden">{{ $progress }}% Complete</span>
                            </div>
                        </div>
                        <div class="text-center">{{ $progress }}% Complete</div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">Resource Allocation</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Operators</label>
                        <div>{{ rand(2, 5) }} operators assigned</div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Mixer Trucks</label>
                        <div>{{ rand(3, 10) }} trucks assigned</div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Pumps</label>
                        <div>{{ rand(1, 3) }} pumps assigned</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Production Schedule -->
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">Production Schedule</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Time Slot</th>
                                    <th>Mix Design</th>
                                    <th>Volume (m³)</th>
                                    <th>Customer</th>
                                    <th>Project</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $mixDesigns = ['K-225', 'K-250', 'K-300', 'K-350', 'K-400', 'K-450', 'K-500'];
                                $customers = ['PT Pembangunan Jaya', 'PT Wijaya Karya', 'PT Adhi Karya', 'PT Total Bangun Persada', 'PT Hutama Karya'];
                                $projects = ['Apartment Tower', 'Office Building', 'Highway Project', 'Bridge Construction', 'Shopping Mall', 'Industrial Complex'];
                                $statuses = ['Scheduled', 'In Progress', 'Completed'];
                                
                                $startTime = strtotime('07:00');
                                for ($i = 0; $i < 8; $i++) {
                                    $timeSlot = date('H:i', $startTime) . ' - ' . date('H:i', $startTime + 3600);
                                    $startTime += 3600;
                                    $mixDesign = $mixDesigns[array_rand($mixDesigns)];
                                    $volume = rand(10, 50);
                                    $customer = $customers[array_rand($customers)];
                                    $project = $projects[array_rand($projects)];
                                    $status = $statuses[array_rand($statuses)];
                                    
                                    $statusClass = match($status) {
                                        'Scheduled' => 'bg-blue',
                                        'In Progress' => 'bg-yellow',
                                        'Completed' => 'bg-green',
                                        default => 'bg-secondary'
                                    };
                                @endphp
                                <tr>
                                    <td>{{ $timeSlot }}</td>
                                    <td>{{ $mixDesign }}</td>
                                    <td>{{ $volume }}</td>
                                    <td>{{ $customer }}</td>
                                    <td>{{ $project }}</td>
                                    <td>
                                        <span class="badge {{ $statusClass }}">{{ $status }}</span>
                                    </td>
                                </tr>
                                @php
                                }
                                @endphp
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Raw Materials Required</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th>Material</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $materials = [
                                            'Cement' => 'tons',
                                            'Sand' => 'tons',
                                            'Aggregate' => 'tons',
                                            'Fly Ash' => 'tons',
                                            'Admixture' => 'liters'
                                        ];
                                        
                                        foreach ($materials as $material => $unit) {
                                            $quantity = rand(10, 100);
                                            $available = rand(0, 1) ? true : false;
                                        @endphp
                                        <tr>
                                            <td>{{ $material }}</td>
                                            <td>{{ $quantity }} {{ $unit }}</td>
                                            <td>
                                                @if($available)
                                                <span class="badge bg-green">Available</span>
                                                @else
                                                <span class="badge bg-red">Shortage</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                        }
                                        @endphp
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Quality Control Checks</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th>Check</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $checks = [
                                            'Slump Test',
                                            'Temperature Check',
                                            'Compression Test Sample',
                                            'Aggregate Moisture',
                                            'Mix Consistency'
                                        ];
                                        
                                        $startTime = strtotime('08:00');
                                        foreach ($checks as $check) {
                                            $time = date('H:i', $startTime);
                                            $startTime += 1800; // 30 minutes
                                            $passed = rand(0, 10) > 2; // 80% chance of passing
                                        @endphp
                                        <tr>
                                            <td>{{ $check }}</td>
                                            <td>{{ $time }}</td>
                                            <td>
                                                @if($passed)
                                                <span class="badge bg-green">Passed</span>
                                                @else
                                                <span class="badge bg-red">Failed</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                        }
                                        @endphp
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Notes & Issues</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Production Notes</label>
                        <textarea class="form-control" rows="3" readonly>Production plan for {{ date('Y-m-d', strtotime("+".rand(1,10)." days")) }}. Special attention to high-strength concrete batches scheduled for the morning. Ensure adequate supply of admixtures for hot weather conditions.</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Reported Issues</label>
                        <ul class="list-group">
                            @php
                            $issues = [
                                'Mixer #3 requires maintenance check before operation',
                                'Potential rain forecast - prepare contingency plan',
                                'Delivery route to Project Site B has traffic restrictions',
                                'Quality check required for new aggregate batch',
                                'Admixture supply running low - order placed'
                            ];
                            
                            $issueCount = rand(0, count($issues));
                            for ($i = 0; $i < $issueCount; $i++) {
                                echo '<li class="list-group-item">' . $issues[$i] . '</li>';
                            }
                            
                            if ($issueCount == 0) {
                                echo '<li class="list-group-item">No issues reported</li>';
                            }
                            @endphp
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

