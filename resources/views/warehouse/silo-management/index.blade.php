@extends('layouts.app')

@section('title', 'Silo Management')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Silo Management
                </h2>
                <div class="text-muted mt-1">Monitor and manage material storage silos</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-outline-secondary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                        <i class="ti ti-file-export"></i>
                        Export Report
                    </a>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-add-silo">
                        <i class="ti ti-plus"></i>
                        Add New Silo
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-primary text-white avatar">
                                    <i class="ti ti-building-silo"></i>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    12 Silos
                                </div>
                                <div class="text-muted">
                                    Total Storage Units
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-green text-white avatar">
                                    <i class="ti ti-arrow-up"></i>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    68%
                                </div>
                                <div class="text-muted">
                                    Average Fill Level
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
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
                                    2 Silos
                                </div>
                                <div class="text-muted">
                                    Critical Level
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-azure text-white avatar">
                                    <i class="ti ti-truck-loading"></i>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    3 Deliveries
                                </div>
                                <div class="text-muted">
                                    Scheduled Today
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Silo Status Overview</h3>
                        <div class="card-actions">
                            <div class="row g-2">
                                <div class="col-auto">
                                    <select class="form-select" id="filter-plant">
                                        <option value="">All Plants</option>
                                        <option value="Plant A">Plant A</option>
                                        <option value="Plant B">Plant B</option>
                                        <option value="Plant C">Plant C</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select class="form-select" id="filter-material">
                                        <option value="">All Materials</option>
                                        <option value="Cement">Cement</option>
                                        <option value="Fly Ash">Fly Ash</option>
                                        <option value="Silica Fume">Silica Fume</option>
                                        <option value="GGBS">GGBS</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select class="form-select" id="filter-status">
                                        <option value="">All Status</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Low">Low</option>
                                        <option value="Critical">Critical</option>
                                        <option value="Maintenance">Maintenance</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Silo ID</th>
                                    <th>Plant</th>
                                    <th>Material</th>
                                    <th>Capacity</th>
                                    <th>Current Level</th>
                                    <th>Fill %</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                    <th class="w-1">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $silos = [
                                    [
                                        'id' => 'SIL-A-01',
                                        'plant' => 'Plant A',
                                        'material' => 'Cement',
                                        'capacity' => '100 tons',
                                        'current_level' => '78 tons',
                                        'fill_percentage' => 78,
                                        'status' => 'Normal',
                                        'last_updated' => '2023-10-19 08:30:00'
                                    ],
                                    [
                                        'id' => 'SIL-A-02',
                                        'plant' => 'Plant A',
                                        'material' => 'Fly Ash',
                                        'capacity' => '50 tons',
                                        'current_level' => '12 tons',
                                        'fill_percentage' => 24,
                                        'status' => 'Low',
                                        'last_updated' => '2023-10-19 08:30:00'
                                    ],
                                    [
                                        'id' => 'SIL-A-03',
                                        'plant' => 'Plant A',
                                        'material' => 'Silica Fume',
                                        'capacity' => '30 tons',
                                        'current_level' => '18 tons',
                                        'fill_percentage' => 60,
                                        'status' => 'Normal',
                                        'last_updated' => '2023-10-19 08:30:00'
                                    ],
                                    [
                                        'id' => 'SIL-B-01',
                                        'plant' => 'Plant B',
                                        'material' => 'Cement',
                                        'capacity' => '120 tons',
                                        'current_level' => '95 tons',
                                        'fill_percentage' => 79,
                                        'status' => 'Normal',
                                        'last_updated' => '2023-10-19 09:15:00'
                                    ],
                                    [
                                        'id' => 'SIL-B-02',
                                        'plant' => 'Plant B',
                                        'material' => 'GGBS',
                                        'capacity' => '60 tons',
                                        'current_level' => '42 tons',
                                        'fill_percentage' => 70,
                                        'status' => 'Normal',
                                        'last_updated' => '2023-10-19 09:15:00'
                                    ],
                                    [
                                        'id' => 'SIL-B-03',
                                        'plant' => 'Plant B',
                                        'material' => 'Fly Ash',
                                        'capacity' => '50 tons',
                                        'current_level' => '5 tons',
                                        'fill_percentage' => 10,
                                        'status' => 'Critical',
                                        'last_updated' => '2023-10-19 09:15:00'
                                    ],
                                    [
                                        'id' => 'SIL-C-01',
                                        'plant' => 'Plant C',
                                        'material' => 'Cement',
                                        'capacity' => '80 tons',
                                        'current_level' => '56 tons',
                                        'fill_percentage' => 70,
                                        'status' => 'Normal',
                                        'last_updated' => '2023-10-19 10:00:00'
                                    ],
                                    [
                                        'id' => 'SIL-C-02',
                                        'plant' => 'Plant C',
                                        'material' => 'Fly Ash',
                                        'capacity' => '40 tons',
                                        'current_level' => '28 tons',
                                        'fill_percentage' => 70,
                                        'status' => 'Normal',
                                        'last_updated' => '2023-10-19 10:00:00'
                                    ],
                                    [
                                        'id' => 'SIL-C-03',
                                        'plant' => 'Plant C',
                                        'material' => 'Silica Fume',
                                        'capacity' => '25 tons',
                                        'current_level' => '2 tons',
                                        'fill_percentage' => 8,
                                        'status' => 'Critical',
                                        'last_updated' => '2023-10-19 10:00:00'
                                    ],
                                    [
                                        'id' => 'SIL-A-04',
                                        'plant' => 'Plant A',
                                        'material' => 'GGBS',
                                        'capacity' => '45 tons',
                                        'current_level' => '0 tons',
                                        'fill_percentage' => 0,
                                        'status' => 'Maintenance',
                                        'last_updated' => '2023-10-18 14:30:00'
                                    ]
                                ];
                                @endphp

                                @foreach($silos as $silo)
                                <tr>
                                    <td>{{ $silo['id'] }}</td>
                                    <td>{{ $silo['plant'] }}</td>
                                    <td>{{ $silo['material'] }}</td>
                                    <td>{{ $silo['capacity'] }}</td>
                                    <td>{{ $silo['current_level'] }}</td>
                                    <td>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                {{ $silo['fill_percentage'] }}%
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm">
                                                    @if($silo['fill_percentage'] > 60)
                                                    <div class="progress-bar bg-success" style="width: {{ $silo['fill_percentage'] }}%" role="progressbar" aria-valuenow="{{ $silo['fill_percentage'] }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $silo['fill_percentage'] }}% Complete">
                                                        <span class="visually-hidden">{{ $silo['fill_percentage'] }}% Complete</span>
                                                    </div>
                                                    @elseif($silo['fill_percentage'] > 20)
                                                    <div class="progress-bar bg-warning" style="width: {{ $silo['fill_percentage'] }}%" role="progressbar" aria-valuenow="{{ $silo['fill_percentage'] }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $silo['fill_percentage'] }}% Complete">
                                                        <span class="visually-hidden">{{ $silo['fill_percentage'] }}% Complete</span>
                                                    </div>
                                                    @else
                                                    <div class="progress-bar bg-danger" style="width: {{ $silo['fill_percentage'] }}%" role="progressbar" aria-valuenow="{{ $silo['fill_percentage'] }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $silo['fill_percentage'] }}% Complete">
                                                        <span class="visually-hidden">{{ $silo['fill_percentage'] }}% Complete</span>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($silo['status'] == 'Normal')
                                        <span class="badge bg-success">Normal</span>
                                        @elseif($silo['status'] == 'Low')
                                        <span class="badge bg-warning">Low</span>
                                        @elseif($silo['status'] == 'Critical')
                                        <span class="badge bg-danger">Critical</span>
                                        @elseif($silo['status'] == 'Maintenance')
                                        <span class="badge bg-secondary">Maintenance</span>
                                        @endif
                                    </td>
                                    <td>{{ $silo['last_updated'] }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-silo-details" data-id="{{ $silo['id'] }}">
                                                    View Details
                                                </a>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-update-level" data-id="{{ $silo['id'] }}">
                                                    Update Level
                                                </a>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-schedule-delivery" data-id="{{ $silo['id'] }}">
                                                    Schedule Delivery
                                                </a>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-maintenance" data-id="{{ $silo['id'] }}">
                                                    Maintenance
                                                </a>
                                            </div>
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

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Upcoming Material Deliveries</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Delivery ID</th>
                                    <th>Material</th>
                                    <th>Quantity</th>
                                    <th>Supplier</th>
                                    <th>Expected Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $deliveries = [
                                    [
                                        'id' => 'DEL-2023-1025',
                                        'material' => 'Cement',
                                        'quantity' => '40 tons',
                                        'supplier' => 'Cement Industries Ltd',
                                        'expected_date' => '2023-10-20',
                                        'status' => 'In Transit'
                                    ],
                                    [
                                        'id' => 'DEL-2023-1026',
                                        'material' => 'Fly Ash',
                                        'quantity' => '25 tons',
                                        'supplier' => 'Power Plant Supplies',
                                        'expected_date' => '2023-10-20',
                                        'status' => 'Scheduled'
                                    ],
                                    [
                                        'id' => 'DEL-2023-1027',
                                        'material' => 'Silica Fume',
                                        'quantity' => '15 tons',
                                        'supplier' => 'Silicon Materials Co',
                                        'expected_date' => '2023-10-21',
                                        'status' => 'Scheduled'
                                    ],
                                    [
                                        'id' => 'DEL-2023-1028',
                                        'material' => 'GGBS',
                                        'quantity' => '30 tons',
                                        'supplier' => 'Steel Byproducts Inc',
                                        'expected_date' => '2023-10-22',
                                        'status' => 'Confirmed'
                                    ]
                                ];
                                @endphp

                                @foreach($deliveries as $delivery)
                                <tr>
                                    <td>{{ $delivery['id'] }}</td>
                                    <td>{{ $delivery['material'] }}</td>
                                    <td>{{ $delivery['quantity'] }}</td>
                                    <td>{{ $delivery['supplier'] }}</td>
                                    <td>{{ $delivery['expected_date'] }}</td>
                                    <td>
                                        @if($delivery['status'] == 'In Transit')
                                        <span class="badge bg-blue">In Transit</span>
                                        @elseif($delivery['status'] == 'Scheduled')
                                        <span class="badge bg-azure">Scheduled</span>
                                        @elseif($delivery['status'] == 'Confirmed')
                                        <span class="badge bg-teal">Confirmed</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex">
                            <a href="#" class="btn btn-link">View All Deliveries</a>
                            <a href="#" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modal-schedule-delivery">Schedule New Delivery</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Material Consumption Trends</h3>
                    </div>
                    <div class="card-body">
                        <div id="chart-consumption"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Silo Activities</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Timestamp</th>
                                    <th>Silo ID</th>
                                    <th>Activity</th>
                                    <th>User</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $activities = [
                                    [
                                        'timestamp' => '2023-10-19 10:15:00',
                                        'silo_id' => 'SIL-A-01',
                                        'activity' => 'Level Update',
                                        'user' => 'John Operator',
                                        'details' => 'Level updated from 75 tons to 78 tons'
                                    ],
                                    [
                                        'timestamp' => '2023-10-19 09:30:00',
                                        'silo_id' => 'SIL-B-03',
                                        'activity' => 'Alert Generated',
                                        'user' => 'System',
                                        'details' => 'Critical level alert: Fly Ash below 10%'
                                    ],
                                    [
                                        'timestamp' => '2023-10-19 08:45:00',
                                        'silo_id' => 'SIL-C-01',
                                        'activity' => 'Material Withdrawal',
                                        'user' => 'Production System',
                                        'details' => 'Withdrawn 2.5 tons for batch #B-2023-1052'
                                    ],
                                    [
                                        'timestamp' => '2023-10-19 08:00:00',
                                        'silo_id' => 'SIL-A-04',
                                        'activity' => 'Maintenance',
                                        'user' => 'Maintenance Team',
                                        'details' => 'Started scheduled maintenance'
                                    ],
                                    [
                                        'timestamp' => '2023-10-18 16:30:00',
                                        'silo_id' => 'SIL-B-01',
                                        'activity' => 'Delivery Received',
                                        'user' => 'Sarah Warehouse',
                                        'details' => 'Received 35 tons of cement from DEL-2023-1020'
                                    ]
                                ];
                                @endphp

                                @foreach($activities as $activity)
                                <tr>
                                    <td>{{ $activity['timestamp'] }}</td>
                                    <td>{{ $activity['silo_id'] }}</td>
                                    <td>{{ $activity['activity'] }}</td>
                                    <td>{{ $activity['user'] }}</td>
                                    <td>{{ $activity['details'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex">
                            <a href="#" class="btn btn-link">View All Activities</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Silo Maintenance Schedule</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Silo ID</th>
                                    <th>Maintenance Type</th>
                                    <th>Scheduled Date</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $maintenances = [
                                    [
                                        'silo_id' => 'SIL-A-04',
                                        'type' => 'Cleaning',
                                        'scheduled_date' => '2023-10-18',
                                        'duration' => '2 days',
                                        'status' => 'In Progress'
                                    ],
                                    [
                                        'silo_id' => 'SIL-B-02',
                                        'type' => 'Sensor Calibration',
                                        'scheduled_date' => '2023-10-25',
                                        'duration' => '1 day',
                                        'status' => 'Scheduled'
                                    ],
                                    [
                                        'silo_id' => 'SIL-C-03',
                                        'type' => 'Valve Replacement',
                                        'scheduled_date' => '2023-10-30',
                                        'duration' => '1 day',
                                        'status' => 'Scheduled'
                                    ],
                                    [
                                        'silo_id' => 'SIL-A-01',
                                        'type' => 'Inspection',
                                        'scheduled_date' => '2023-11-05',
                                        'duration' => '0.5 days',
                                        'status' => 'Scheduled'
                                    ]
                                ];
                                @endphp

                                @foreach($maintenances as $maintenance)
                                <tr>
                                    <td>{{ $maintenance['silo_id'] }}</td>
                                    <td>{{ $maintenance['type'] }}</td>
                                    <td>{{ $maintenance['scheduled_date'] }}</td>
                                    <td>{{ $maintenance['duration'] }}</td>
                                    <td>
                                        @if($maintenance['status'] == 'In Progress')
                                        <span class="badge bg-blue">In Progress</span>
                                        @elseif($maintenance['status'] == 'Scheduled')
                                        <span class="badge bg-azure">Scheduled</span>
                                        @elseif($maintenance['status'] == 'Completed')
                                        <span class="badge bg-green">Completed</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex">
                                                        <a href="#" class="btn btn-link">View All Maintenance</a>
                            <a href="#" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modal-maintenance">Schedule Maintenance</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Silo Details Modal -->
<div class="modal modal-blur fade" id="modal-silo-details" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Silo Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Silo ID</label>
                            <div class="form-control-plaintext" id="detail-silo-id">SIL-A-01</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Plant</label>
                            <div class="form-control-plaintext" id="detail-plant">Plant A</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Material</label>
                            <div class="form-control-plaintext" id="detail-material">Cement</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Material Grade/Type</label>
                            <div class="form-control-plaintext" id="detail-material-grade">OPC 53 Grade</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Capacity</label>
                            <div class="form-control-plaintext" id="detail-capacity">100 tons</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Current Level</label>
                            <div class="form-control-plaintext" id="detail-current-level">78 tons</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Fill Percentage</label>
                            <div class="form-control-plaintext" id="detail-fill-percentage">78%</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Min Level Threshold</label>
                            <div class="form-control-plaintext" id="detail-min-level">20 tons (20%)</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Reorder Level</label>
                            <div class="form-control-plaintext" id="detail-reorder-level">30 tons (30%)</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Max Level Threshold</label>
                            <div class="form-control-plaintext" id="detail-max-level">95 tons (95%)</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Installation Date</label>
                            <div class="form-control-plaintext" id="detail-installation-date">2020-05-15</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Last Maintenance</label>
                            <div class="form-control-plaintext" id="detail-last-maintenance">2023-08-10</div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sensor Information</label>
                    <div class="form-control-plaintext" id="detail-sensor-info">Level Sensor: Ultrasonic<br>Temperature Sensor: PT100<br>Pressure Sensor: Digital</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <div class="form-control-plaintext" id="detail-notes">Regular maintenance performed as scheduled. No issues detected.</div>
                </div>
                <div class="hr-text">Level History (Last 7 Days)</div>
                <div id="chart-level-history" style="height: 200px;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Update Level Modal -->
<div class="modal modal-blur fade" id="modal-update-level" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Silo Level</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-level-form">
                    <input type="hidden" name="silo_id" id="update-silo-id">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Silo ID</label>
                                <input type="text" class="form-control" id="update-silo-id-display" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Material</label>
                                <input type="text" class="form-control" id="update-material" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Current Level</label>
                                <input type="text" class="form-control" id="update-current-level" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Capacity</label>
                                <input type="text" class="form-control" id="update-capacity" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Current Fill %</label>
                                <input type="text" class="form-control" id="update-fill-percentage" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="hr-text">Update Information</div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Update Type</label>
                                <select class="form-select" name="update_type" id="update-type" required>
                                    <option value="manual_reading">Manual Reading</option>
                                    <option value="delivery_received">Delivery Received</option>
                                    <option value="adjustment">Adjustment</option>
                                    <option value="calibration">Sensor Calibration</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">New Level</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="new_level" id="update-new-level" required>
                                    <span class="input-group-text">tons</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reference (if applicable)</label>
                        <input type="text" class="form-control" name="reference" placeholder="e.g., Delivery ID, Batch Number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Notes</label>
                        <textarea class="form-control" name="notes" rows="3" placeholder="Enter reason for update or additional information" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary ms-auto" id="save-level-update">
                    <i class="ti ti-device-floppy"></i>
                    Save Update
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Schedule Delivery Modal -->
<div class="modal modal-blur fade" id="modal-schedule-delivery" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schedule Material Delivery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="schedule-delivery-form">
                    <input type="hidden" name="silo_id" id="delivery-silo-id">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Silo ID (Optional)</label>
                                <input type="text" class="form-control" id="delivery-silo-id-display" readonly>
                                <small class="form-hint">Leave empty if not specific to a silo</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Plant</label>
                                <select class="form-select" name="plant" required>
                                    <option value="">Select plant</option>
                                    <option value="Plant A">Plant A</option>
                                    <option value="Plant B">Plant B</option>
                                    <option value="Plant C">Plant C</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Material</label>
                                <select class="form-select" name="material" id="delivery-material" required>
                                    <option value="">Select material</option>
                                    <option value="Cement">Cement</option>
                                    <option value="Fly Ash">Fly Ash</option>
                                    <option value="Silica Fume">Silica Fume</option>
                                    <option value="GGBS">GGBS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Material Grade/Type</label>
                                <select class="form-select" name="material_grade">
                                    <option value="">Select grade/type</option>
                                    <option value="OPC 43">OPC 43</option>
                                    <option value="OPC 53">OPC 53</option>
                                    <option value="PPC">PPC</option>
                                    <option value="Class F">Class F Fly Ash</option>
                                    <option value="Class C">Class C Fly Ash</option>
                                    <option value="Densified">Densified Silica Fume</option>
                                    <option value="Undensified">Undensified Silica Fume</option>
                                    <option value="Grade 80">GGBS Grade 80</option>
                                    <option value="Grade 100">GGBS Grade 100</option>
                                    <option value="Grade 120">GGBS Grade 120</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Quantity</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="quantity" required>
                                    <span class="input-group-text">tons</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Supplier</label>
                                <select class="form-select" name="supplier" required>
                                    <option value="">Select supplier</option>
                                    <option value="Cement Industries Ltd">Cement Industries Ltd</option>
                                    <option value="Power Plant Supplies">Power Plant Supplies</option>
                                    <option value="Silicon Materials Co">Silicon Materials Co</option>
                                    <option value="Steel Byproducts Inc">Steel Byproducts Inc</option>
                                    <option value="Global Cement Corp">Global Cement Corp</option>
                                                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Expected Delivery Date</label>
                                <input type="date" class="form-control" name="expected_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Expected Time</label>
                                <input type="time" class="form-control" name="expected_time">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Purchase Order #</label>
                                <input type="text" class="form-control" name="po_number" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Contact Person</label>
                                <input type="text" class="form-control" name="contact_person">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Special Instructions</label>
                        <textarea class="form-control" name="instructions" rows="3" placeholder="Enter any special instructions for this delivery"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary ms-auto" id="save-delivery">
                    <i class="ti ti-calendar-plus"></i>
                    Schedule Delivery
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Maintenance Modal -->
<div class="modal modal-blur fade" id="modal-maintenance" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schedule Silo Maintenance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="maintenance-form">
                    <input type="hidden" name="silo_id" id="maintenance-silo-id">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Silo ID</label>
                                <input type="text" class="form-control" id="maintenance-silo-id-display" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Maintenance Type</label>
                                <select class="form-select" name="maintenance_type" required>
                                    <option value="">Select type</option>
                                    <option value="Cleaning">Cleaning</option>
                                    <option value="Inspection">Inspection</option>
                                    <option value="Sensor Calibration">Sensor Calibration</option>
                                    <option value="Valve Replacement">Valve Replacement</option>
                                    <option value="Structural Repair">Structural Repair</option>
                                    <option value="Preventive Maintenance">Preventive Maintenance</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Scheduled Date</label>
                                <input type="date" class="form-control" name="scheduled_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Duration</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="duration" required>
                                    <select class="form-select" name="duration_unit">
                                        <option value="hours">Hours</option>
                                        <option value="days" selected>Days</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Assigned Team/Contractor</label>
                                <select class="form-select" name="assigned_team" required>
                                    <option value="">Select team</option>
                                    <option value="Internal Maintenance">Internal Maintenance Team</option>
                                    <option value="Silo Tech Services">Silo Tech Services</option>
                                    <option value="Precision Calibration Inc">Precision Calibration Inc</option>
                                    <option value="Industrial Cleaning Co">Industrial Cleaning Co</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Priority</label>
                                <select class="form-select" name="priority">
                                    <option value="Low">Low</option>
                                    <option value="Medium" selected>Medium</option>
                                    <option value="High">High</option>
                                    <option value="Critical">Critical</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Required Parts/Materials</label>
                        <textarea class="form-control" name="required_parts" rows="2" placeholder="List any parts or materials needed for this maintenance"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Scope of Work</label>
                        <textarea class="form-control" name="scope" rows="3" placeholder="Describe the maintenance work to be performed" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="requires_emptying">
                            <span class="form-check-label">Requires emptying silo</span>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="notify_production">
                            <span class="form-check-label">Notify production department</span>
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary ms-auto" id="save-maintenance">
                    <i class="ti ti-calendar-plus"></i>
                    Schedule Maintenance
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add New Silo Modal -->
<div class="modal modal-blur fade" id="modal-add-silo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Silo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-silo-form">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Silo ID</label>
                                <input type="text" class="form-control" name="silo_id" placeholder="e.g., SIL-A-05" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Plant</label>
                                <select class="form-select" name="plant" required>
                                    <option value="">Select plant</option>
                                    <option value="Plant A">Plant A</option>
                                    <option value="Plant B">Plant B</option>
                                    <option value="Plant C">Plant C</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Material</label>
                                <select class="form-select" name="material" required>
                                    <option value="">Select material</option>
                                    <option value="Cement">Cement</option>
                                    <option value="Fly Ash">Fly Ash</option>
                                    <option value="Silica Fume">Silica Fume</option>
                                    <option value="GGBS">GGBS</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Material Grade/Type</label>
                                <select class="form-select" name="material_grade">
                                    <option value="">Select grade/type</option>
                                    <option value="OPC 43">OPC 43</option>
                                    <option value="OPC 53">OPC 53</option>
                                    <option value="PPC">PPC</option>
                                    <option value="Class F">Class F Fly Ash</option>
                                    <option value="Class C">Class C Fly Ash</option>
                                    <option value="Densified">Densified Silica Fume</option>
                                    <option value="Undensified">Undensified Silica Fume</option>
                                    <option value="Grade 80">GGBS Grade 80</option>
                                    <option value="Grade 100">GGBS Grade 100</option>
                                    <option value="Grade 120">GGBS Grade 120</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Capacity</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="capacity" required>
                                    <span class="input-group-text">tons</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Initial Level</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="initial_level" value="0">
                                    <span class="input-group-text">tons</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Min Level Threshold</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="min_level" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Reorder Level</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="reorder_level" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Max Level Threshold</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="max_level" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Installation Date</label>
                                <input type="date" class="form-control" name="installation_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Sensor Type</label>
                                <select class="form-select" name="sensor_type" required>
                                    <option value="">Select sensor type</option>
                                    <option value="Ultrasonic">Ultrasonic</option>
                                    <option value="Radar">Radar</option>
                                    <option value="Load Cell">Load Cell</option>
                                    <option value="Capacitance">Capacitance</option>
                                    <option value="Manual">Manual</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" name="notes" rows="3" placeholder="Enter any additional information about this silo"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary ms-auto" id="save-new-silo">
                    <i class="ti ti-plus"></i>
                    Add Silo
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Export Report Modal -->
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Silo Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="export-report-form">
                    <div class="mb-3">
                        <label class="form-label">Report Type</label>
                        <select class="form-select" name="report_type">
                            <option value="current_status">Current Silo Status</option>
                            <option value="level_history">Level History</option>
                            <option value="material_consumption">Material Consumption</option>
                            <option value="maintenance_history">Maintenance History</option>
                            <option value="delivery_history">Delivery History</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Plant</label>
                                <select class="form-select" name="plant">
                                    <option value="">All Plants</option>
                                    <option value="Plant A">Plant A</option>
                                    <option value="Plant B">Plant B</option>
                                    <option value="Plant C">Plant C</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Material</label>
                                <select class="form-select" name="material">
                                    <option value="">All Materials</option>
                                    <option value="Cement">Cement</option>
                                    <option value="Fly Ash">Fly Ash</option>
                                    <option value="Silica Fume">Silica Fume</option>
                                    <option value="GGBS">GGBS</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">From Date</label>
                                <input type="date" class="form-control" name="from_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">To Date</label>
                                <input type="date" class="form-control" name="to_date">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File Format</label>
                        <select class="form-select" name="file_format">
                            <option value="excel">Excel (.xlsx)</option>
                            <option value="csv">CSV</option>
                            <option value="pdf">PDF</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary ms-auto" id="generate-report">
                    <i class="ti ti-file-export"></i>
                    Generate Report
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
        // Material Consumption Chart
        var consumptionOptions = {
            series: [{
                name: 'Cement',
                data: [42, 38, 45, 40, 36, 44, 38]
            }, {
                name: 'Fly Ash',
                data: [18, 22, 20, 15, 18, 22, 20]
            }, {
                name: 'GGBS',
                data: [12, 10, 14, 15, 12, 10, 8]
            }, {
                name: 'Silica Fume',
                data: [5, 4, 6, 5, 4, 6, 5]
            }],
            chart: {
                type: 'bar',
                height: 300,
                stacked: true,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '70%',
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 1,
                colors: ['#fff']
            },
            xaxis: {
                categories: ['Oct 13', 'Oct 14', 'Oct 15', 'Oct 16', 'Oct 17', 'Oct 18', 'Oct 19'],
            },
            yaxis: {
                title: {
                    text: 'Tons'
                },
            },
            fill: {
                opacity: 1
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left',
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " tons"
                    }
                }
            }
        };

        var consumptionChart = new ApexCharts(document.querySelector("#chart-consumption"), consumptionOptions);
        consumptionChart.render();

        // Level History Chart for Modal
        var levelHistoryOptions = {
            series: [{
                name: 'Level',
                data: [78, 75, 72, 68, 65, 60, 78]
            }],
            chart: {
                type: 'line',
                height: 200,
                toolbar: {
                    show: false
                }
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            xaxis: {
                categories: ['Oct 13', 'Oct 14', 'Oct 15', 'Oct 16', 'Oct 17', 'Oct 18', 'Oct 19'],
            },
            yaxis: {
                title: {
                    text: 'Tons'
                },
                min: 0,
                max: 100
            },
            markers: {
                size: 4
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " tons"
                    }
                }
            }
        };

        // Initialize charts when modals are opened
        document.querySelector('#modal-silo-details').addEventListener('shown.bs.modal', function (event) {
            var button = event.relatedTarget;
            var siloId = button.getAttribute('data-id');
            
            // Set silo details in modal
            document.getElementById('detail-silo-id').textContent = siloId;
            
            // In a real application, you would fetch the silo details from the server
            // For this example, we'll just use the first silo's data
            
            // Render the level history chart
            var levelHistoryChart = new ApexCharts(document.querySelector("#chart-level-history"), levelHistoryOptions);
            levelHistoryChart.render();
        });

        // Handle Update Level Modal
        document.querySelector('#modal-update-level').addEventListener('shown.bs.modal', function (event) {
            var button = event.relatedTarget;
            var siloId = button.getAttribute('data-id');
            
            // Set silo ID in form
            document.getElementById('update-silo-id').value = siloId;
            document.getElementById('update-silo-id-display').value = siloId;
            
            // In a real application, you would fetch the silo details from the server
            // For this example, we'll just use sample data
            document.getElementById('update-material').value = 'Cement';
            document.getElementById('update-current-level').value = '78 tons';
            document.getElementById('update-capacity').value = '100 tons';
            document.getElementById('update-fill-percentage').value = '78%';
        });

        // Handle Schedule Delivery Modal
        document.querySelector('#modal-schedule-delivery').addEventListener('shown.bs.modal', function (event) {
            var button = event.relatedTarget;
            if (button.hasAttribute('data-id')) {
                var siloId = button.getAttribute('data-id');
                
                // Set silo ID in form
                document.getElementById('delivery-silo-id').value = siloId;
                document.getElementById('delivery-silo-id-display').value = siloId;
                
                // In a real application, you would fetch the silo details from the server
                // For this example, we'll just use sample data
                document.getElementById('delivery-material').value = 'Cement';
            } else {
                // Clear silo ID if opened from "Schedule New Delivery" button
                document.getElementById('delivery-silo-id').value = '';
                document.getElementById('delivery-silo-id-display').value = '';
            }
        });

        // Handle Maintenance Modal
        document.querySelector('#modal-maintenance').addEventListener('shown.bs.modal', function (event) {
            var button = event.relatedTarget;
            if (button.hasAttribute('data-id')) {
                var siloId = button.getAttribute('data-id');
                
                // Set silo ID in form
                document.getElementById('maintenance-silo-id').value = siloId;
                document.getElementById('maintenance-silo-id-display').value = siloId;
            } else {
                // Clear silo ID if opened from "Schedule Maintenance" button
                document.getElementById('maintenance-silo-id').value = '';
                document.getElementById('maintenance-silo-id-display').value = '';
            }
        });

        // Save Level Update
        document.getElementById('save-level-update').addEventListener('click', function() {
            var form = document.getElementById('update-level-form');
            
            // Simple validation
            var requiredFields = form.querySelectorAll('[required]');
            var valid = true;
            
            requiredFields.forEach(field => {
                if (!field.value) {
                    field.classList.add('is-invalid');
                    valid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (valid) {
                // In a real application, you would submit the form to the server
                // For this example, we'll just show a success message and close the modal
                
                // Get form values
                var siloId = document.getElementById('update-silo-id-display').value;
                var newLevel = document.getElementById('update-new-level').value;
                
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Level Updated',
                    text: `Successfully updated level for ${siloId} to ${newLevel} tons`,
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Close modal and reset form
                    var modal = bootstrap.Modal.getInstance(document.getElementById('modal-update-level'));
                    modal.hide();
                    form.reset();
                    
                    // In a real application, you would refresh the data
                });
            }
        });

        // Save Delivery Schedule
        document.getElementById('save-delivery').addEventListener('click', function() {
            var form = document.getElementById('schedule-delivery-form');
            
            // Simple validation
            var requiredFields = form.querySelectorAll('[required]');
            var valid = true;
            
            requiredFields.forEach(field => {
                if (!field.value) {
                    field.classList.add('is-invalid');
                    valid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (valid) {
                // In a real application, you would submit the form to the server
                // For this example, we'll just show a success message and close the modal
                
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Delivery Scheduled',
                    text: 'Material delivery has been scheduled successfully',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Close modal and reset form
                    var modal = bootstrap.Modal.getInstance(document.getElementById('modal-schedule-delivery'));
                    modal.hide();
                    form.reset();
                    
                    // In a real application, you would refresh the data
                });
            }
        });

        // Save Maintenance Schedule
        document.getElementById('save-maintenance').addEventListener('click', function() {
            var form = document.getElementById('maintenance-form');
            
            // Simple validation
            var requiredFields = form.querySelectorAll('[required]');
            var valid = true;
            
            requiredFields.forEach(field => {
                if (!field.value) {
                    field.classList.add('is-invalid');
                    valid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (valid) {
                // In a real application, you would submit the form to the server
                // For this example, we'll just show a success message and close the modal
                
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Maintenance Scheduled',
                    text: 'Silo maintenance has been scheduled successfully',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Close modal and reset form
                    var modal = bootstrap.Modal.getInstance(document.getElementById('modal-maintenance'));
                    modal.hide();
                    form.reset();
                    
                    // In a real application, you would refresh the data
                });
            }
        });

        // Save New Silo
        document.getElementById('save-new-silo').addEventListener('click', function() {
            var form = document.getElementById('add-silo-form');
            
            // Simple validation
            var requiredFields = form.querySelectorAll('[required]');
            var valid = true;
            
            requiredFields.forEach(field => {
                if (!field.value) {
                    field.classList.add('is-invalid');
                    valid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (valid) {
                // In a real application, you would submit the form to the server
                // For this example, we'll just show a success message and close the modal
                
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Silo Added',
                    text: 'New silo has been added successfully',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Close modal and reset form
                                        var modal = bootstrap.Modal.getInstance(document.getElementById('modal-add-silo'));
                    modal.hide();
                    form.reset();
                    
                    // In a real application, you would refresh the data
                });
            }
        });

        // Generate Report
        document.getElementById('generate-report').addEventListener('click', function() {
            var form = document.getElementById('export-report-form');
            
            // In a real application, you would submit the form to the server
            // For this example, we'll just show a success message and close the modal
            
            // Show success message
            Swal.fire({
                icon: 'success',
                title: 'Report Generated',
                text: 'Your report has been generated and is ready for download',
                confirmButtonText: 'Download',
                showCancelButton: true,
                cancelButtonText: 'Close'
            }).then((result) => {
                if (result.isConfirmed) {
                    // In a real application, you would trigger the download
                    // For this example, we'll just close the modal
                }
                
                // Close modal and reset form
                var modal = bootstrap.Modal.getInstance(document.getElementById('modal-report'));
                modal.hide();
                form.reset();
            });
        });

        // Filter silos
        document.getElementById('filter-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // In a real application, you would filter the data based on the form values
            // For this example, we'll just show a message
            
            Swal.fire({
                icon: 'info',
                title: 'Filters Applied',
                text: 'The silo list has been filtered according to your criteria',
                confirmButtonText: 'OK'
            });
        });

        // Reset filters
        document.getElementById('reset-filters').addEventListener('click', function() {
            document.getElementById('filter-form').reset();
            
            // In a real application, you would reset the filters and refresh the data
            // For this example, we'll just show a message
            
            Swal.fire({
                icon: 'info',
                title: 'Filters Reset',
                text: 'All filters have been cleared',
                confirmButtonText: 'OK'
            });
        });
    });
</script>
@endsection



