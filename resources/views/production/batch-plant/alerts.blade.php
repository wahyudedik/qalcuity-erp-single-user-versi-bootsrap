@extends('layouts.app')

@section('title', 'Batch Plant Alerts')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Batch Plant Alerts
                </h2>
                <div class="text-muted mt-1">Monitor and manage system alerts and notifications</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.batch-plant.dashboard') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                        <i class="ti ti-dashboard icon"></i>
                        Back to Dashboard
                    </a>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                        <i class="ti ti-file-export icon"></i>
                        Export Alerts
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <!-- Alert Summary -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Alert Summary</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-red text-white avatar">
                                                    <i class="ti ti-alert-triangle"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Critical Alerts
                                                </div>
                                                <div class="h3 mb-0">
                                                    2
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-yellow text-white avatar">
                                                    <i class="ti ti-alert-circle"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Warning Alerts
                                                </div>
                                                <div class="h3 mb-0">
                                                    5
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-blue text-white avatar">
                                                    <i class="ti ti-info-circle"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Information
                                                </div>
                                                <div class="h3 mb-0">
                                                    12
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-green text-white avatar">
                                                    <i class="ti ti-check"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Resolved Today
                                                </div>
                                                <div class="h3 mb-0">
                                                    8
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

            <!-- Filters -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label">Date Range</label>
                                <select class="form-select">
                                    <option value="today" selected>Today</option>
                                    <option value="yesterday">Yesterday</option>
                                    <option value="last7">Last 7 Days</option>
                                    <option value="last30">Last 30 Days</option>
                                    <option value="custom">Custom Range</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Alert Type</label>
                                <select class="form-select">
                                    <option value="all" selected>All Types</option>
                                    <option value="equipment">Equipment</option>
                                    <option value="material">Material</option>
                                    <option value="quality">Quality</option>
                                    <option value="system">System</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Severity</label>
                                <select class="form-select">
                                    <option value="all" selected>All Severities</option>
                                    <option value="critical">Critical</option>
                                    <option value="warning">Warning</option>
                                    <option value="info">Information</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option value="all" selected>All Statuses</option>
                                    <option value="active">Active</option>
                                    <option value="acknowledged">Acknowledged</option>
                                    <option value="resolved">Resolved</option>
                                </select>
                            </div>
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-primary">
                                    <i class="ti ti-filter me-1"></i>
                                    Apply Filters
                                </button>
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="ti ti-refresh me-1"></i>
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Alerts -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Active Alerts</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Alert ID</th>
                                        <th>Timestamp</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Severity</th>
                                        <th>Status</th>
                                        <th class="w-1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $alerts = [
                                            [
                                                'id' => 'ALT-2023-10-25-001',
                                                'time' => '10:23 AM',
                                                'type' => 'Material',
                                                'description' => 'Aggregate Bin 2 Low Level - Level below 20% threshold',
                                                'severity' => 'Critical',
                                                'status' => 'Active'
                                            ],
                                            [
                                                'id' => 'ALT-2023-10-25-002',
                                                'time' => '09:45 AM',
                                                'type' => 'Quality',
                                                'description' => 'Sand Moisture Content High - Moisture content at 7.2% (threshold: 6%)',
                                                'severity' => 'Warning',
                                                'status' => 'Active'
                                            ],
                                            [
                                                'id' => 'ALT-2023-10-25-003',
                                                'time' => '08:57 AM',
                                                'type' => 'Equipment',
                                                'description' => 'Mixer Motor Temperature High - Temperature at 78°C (threshold: 75°C)',
                                                'severity' => 'Warning',
                                                'status' => 'Acknowledged'
                                            ],
                                            [
                                                'id' => 'ALT-2023-10-25-004',
                                                                                                'time' => '08:32 AM',
                                                'type' => 'System',
                                                'description' => 'Database Backup Warning - Last backup was 36 hours ago',
                                                'severity' => 'Warning',
                                                'status' => 'Active'
                                            ],
                                            [
                                                'id' => 'ALT-2023-10-25-005',
                                                'time' => '08:15 AM',
                                                'type' => 'Equipment',
                                                'description' => 'Dust Collector Filter Efficiency Low - Efficiency at 82% (threshold: 85%)',
                                                'severity' => 'Warning',
                                                'status' => 'Active'
                                            ],
                                            [
                                                'id' => 'ALT-2023-10-25-006',
                                                'time' => '07:48 AM',
                                                'type' => 'Material',
                                                'description' => 'Cement Silo 2 Level Low - Level at 45% (reorder point: 50%)',
                                                'severity' => 'Information',
                                                'status' => 'Acknowledged'
                                            ],
                                            [
                                                'id' => 'ALT-2023-10-25-007',
                                                'time' => '07:30 AM',
                                                'type' => 'Quality',
                                                'description' => 'Aggregate Moisture Sensor Calibration Due - Last calibration was 29 days ago',
                                                'severity' => 'Information',
                                                'status' => 'Active'
                                            ]
                                        ];
                                        
                                        foreach($alerts as $alert) {
                                            $severityClass = $alert['severity'] == 'Critical' ? 'bg-red' : ($alert['severity'] == 'Warning' ? 'bg-yellow' : 'bg-blue');
                                            $statusClass = $alert['status'] == 'Active' ? 'bg-red' : ($alert['status'] == 'Acknowledged' ? 'bg-azure' : 'bg-green');
                                    @endphp
                                    <tr>
                                        <td>{{ $alert['id'] }}</td>
                                        <td>{{ date('Y-m-d') }} {{ $alert['time'] }}</td>
                                        <td>{{ $alert['type'] }}</td>
                                        <td>{{ $alert['description'] }}</td>
                                        <td><span class="badge {{ $severityClass }}">{{ $alert['severity'] }}</span></td>
                                        <td><span class="badge {{ $statusClass }}">{{ $alert['status'] }}</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-check me-2"></i>
                                                        Acknowledge
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-circle-check me-2"></i>
                                                        Mark as Resolved
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-alert-triangle me-2"></i>
                                                        Escalate
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-eye me-2"></i>
                                                        View Details
                                                    </a>
                                                </div>
                                            </div>
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

            <!-- Recent Resolved Alerts -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recently Resolved Alerts</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Alert ID</th>
                                        <th>Timestamp</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Severity</th>
                                        <th>Resolved By</th>
                                        <th>Resolution Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $resolvedAlerts = [
                                            [
                                                'id' => 'ALT-2023-10-25-008',
                                                'time' => '09:12 AM',
                                                'type' => 'Equipment',
                                                'description' => 'Mixer Motor Temperature Normal - Temperature returned to normal range',
                                                'severity' => 'Information',
                                                'resolvedBy' => 'System',
                                                'resolutionTime' => '15 min'
                                            ],
                                            [
                                                'id' => 'ALT-2023-10-24-015',
                                                'time' => '04:45 PM',
                                                'type' => 'Material',
                                                'description' => 'Sand Bin Level Low - Level below 30% threshold',
                                                'severity' => 'Warning',
                                                'resolvedBy' => 'John Operator',
                                                'resolutionTime' => '1 hr 20 min'
                                            ],
                                            [
                                                'id' => 'ALT-2023-10-24-012',
                                                'time' => '02:18 PM',
                                                'type' => 'Quality',
                                                'description' => 'Water Flow Rate Low - Flow rate at 85% of expected value',
                                                'severity' => 'Warning',
                                                'resolvedBy' => 'Sarah Technician',
                                                'resolutionTime' => '45 min'
                                            ],
                                            [
                                                'id' => 'ALT-2023-10-24-010',
                                                'time' => '11:30 AM',
                                                'type' => 'System',
                                                'description' => 'Network Connectivity Issue - Connection to scale system intermittent',
                                                'severity' => 'Critical',
                                                'resolvedBy' => 'IT Support',
                                                'resolutionTime' => '1 hr 5 min'
                                            ],
                                            [
                                                'id' => 'ALT-2023-10-24-007',
                                                'time' => '09:22 AM',
                                                'type' => 'Equipment',
                                                'description' => 'Compressor Pressure Low - Pressure at 5.8 bar (minimum: 6.0 bar)',
                                                'severity' => 'Warning',
                                                'resolvedBy' => 'Maintenance Team',
                                                'resolutionTime' => '2 hr 15 min'
                                            ]
                                        ];
                                        
                                        foreach($resolvedAlerts as $alert) {
                                            $severityClass = $alert['severity'] == 'Critical' ? 'bg-red' : ($alert['severity'] == 'Warning' ? 'bg-yellow' : 'bg-blue');
                                    @endphp
                                    <tr>
                                        <td>{{ $alert['id'] }}</td>
                                        <td>{{ $alert['time'] }}</td>
                                        <td>{{ $alert['type'] }}</td>
                                        <td>{{ $alert['description'] }}</td>
                                        <td><span class="badge {{ $severityClass }}">{{ $alert['severity'] }}</span></td>
                                        <td>{{ $alert['resolvedBy'] }}</td>
                                        <td>{{ $alert['resolutionTime'] }}</td>
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
    </div>
</div>

<!-- Export Data Modal -->
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Alerts Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Report Type</label>
                    <select class="form-select">
                        <option value="1">All Alerts</option>
                        <option value="2">Active Alerts Only</option>
                        <option value="3">Resolved Alerts Only</option>
                        <option value="4">Critical Alerts Only</option>
                        <option value="5">Alert Summary</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" value="{{ date('Y-m-d', strtotime('-7 days')) }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Format</label>
                    <div class="form-selectgroup">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="format" value="csv" class="form-selectgroup-input" checked>
                            <span class="form-selectgroup-label">CSV</span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="format" value="excel" class="form-selectgroup-input">
                            <span class="form-selectgroup-label">Excel</span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="format" value="pdf" class="form-selectgroup-input">
                            <span class="form-selectgroup-label">PDF</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </a>
                <a href="#" class="btn btn-primary ms-auto">
                    <i class="ti ti-file-export icon"></i>
                    Export Report
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

