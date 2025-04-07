@extends('layouts.app')

@section('title', 'Fleet Maintenance Schedule')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Fleet Maintenance Schedule
                    </h2>
                    <div class="text-muted mt-1">Manage and track maintenance for all vehicles</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('delivery.fleet') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Fleet
                        </a>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-schedule-maintenance">
                            <i class="ti ti-plus"></i>
                            Schedule Maintenance
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Maintenance Filters</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Vehicle Type</label>
                                    <select class="form-select" id="filter-type">
                                        <option value="">All Types</option>
                                        <option value="Mixer Truck">Mixer Truck</option>
                                        <option value="Concrete Pump">Concrete Pump</option>
                                        <option value="Dump Truck">Dump Truck</option>
                                        <option value="Pickup">Pickup</option>
                                        <option value="SUV">SUV</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Maintenance Type</label>
                                    <select class="form-select" id="filter-maintenance-type">
                                        <option value="">All Types</option>
                                        <option value="Regular Service">Regular Service</option>
                                        <option value="Oil Change">Oil Change</option>
                                        <option value="Tire Replacement">Tire Replacement</option>
                                        <option value="Brake Inspection">Brake Inspection</option>
                                        <option value="Major Overhaul">Major Overhaul</option>
                                        <option value="Hydraulic System Check">Hydraulic System Check</option>
                                        <option value="Drum Repair">Drum Repair</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" id="filter-status">
                                        <option value="">All Statuses</option>
                                        <option value="Scheduled">Scheduled</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Pending Parts">Pending Parts</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Date Range</label>
                                    <select class="form-select" id="filter-date-range">
                                        <option value="">All Dates</option>
                                        <option value="upcoming">Upcoming</option>
                                        <option value="past">Past</option>
                                        <option value="this-week">This Week</option>
                                        <option value="this-month">This Month</option>
                                        <option value="next-month">Next Month</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-outline-primary" id="reset-filters">
                                    <i class="ti ti-refresh"></i>
                                    Reset Filters
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                            <li class="nav-item">
                                <a href="#tabs-upcoming" class="nav-link active" data-bs-toggle="tab">
                                    <i class="ti ti-calendar-event me-2"></i>
                                    Upcoming Maintenance
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-history" class="nav-link" data-bs-toggle="tab">
                                    <i class="ti ti-history me-2"></i>
                                    Maintenance History
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-schedule" class="nav-link" data-bs-toggle="tab">
                                    <i class="ti ti-calendar me-2"></i>
                                    Maintenance Schedule
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-upcoming">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>Vehicle ID</th>
                                                <th>Type</th>
                                                <th>License Plate</th>
                                                <th>Maintenance Type</th>
                                                <th>Scheduled Date</th>
                                                <th>Estimated Cost</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $maintenances = [
                                                    [
                                                        'id' => 'M001',
                                                        'vehicle_id' => 'MX-002',
                                                        'type' => 'Mixer Truck',
                                                        'license' => 'B 2345 DEF',
                                                        'maintenance_type' => 'Regular Service',
                                                        'scheduled_date' => '2023-11-15',
                                                        'estimated_cost' => 'Rp 2,500,000',
                                                        'status' => 'Scheduled',
                                                    ],
                                                    [
                                                        'id' => 'M002',
                                                        'vehicle_id' => 'CP-001',
                                                        'type' => 'Concrete Pump',
                                                        'license' => 'B 4567 JKL',
                                                        'maintenance_type' => 'Hydraulic System Check',
                                                        'scheduled_date' => '2023-11-20',
                                                        'estimated_cost' => 'Rp 4,800,000',
                                                        'status' => 'Scheduled',
                                                    ],
                                                    [
                                                        'id' => 'M003',
                                                        'vehicle_id' => 'DT-001',
                                                        'type' => 'Dump Truck',
                                                        'license' => 'B 6789 PQR',
                                                        'maintenance_type' => 'Tire Replacement',
                                                        'scheduled_date' => '2023-11-10',
                                                        'estimated_cost' => 'Rp 6,000,000',
                                                        'status' => 'Pending Parts',
                                                    ],
                                                    [
                                                        'id' => 'M004',
                                                        'vehicle_id' => 'MX-003',
                                                        'type' => 'Mixer Truck',
                                                        'license' => 'B 3456 GHI',
                                                        'maintenance_type' => 'Drum Repair',
                                                        'scheduled_date' => '2023-11-05',
                                                        'estimated_cost' => 'Rp 8,500,000',
                                                        'status' => 'In Progress',
                                                    ],
                                                    [
                                                        'id' => 'M005',
                                                        'vehicle_id' => 'MX-001',
                                                        'type' => 'Mixer Truck',
                                                        'license' => 'B 1234 ABC',
                                                        'maintenance_type' => 'Oil Change',
                                                        'scheduled_date' => '2023-11-25',
                                                        'estimated_cost' => 'Rp 1,200,000',
                                                        'status' => 'Scheduled',
                                                    ],
                                                    [
                                                        'id' => 'M006',
                                                        'vehicle_id' => 'PU-001',
                                                        'type' => 'Pickup',
                                                        'license' => 'B 8901 STU',
                                                        'maintenance_type' => 'Brake Inspection',
                                                        'scheduled_date' => '2023-11-18',
                                                        'estimated_cost' => 'Rp 800,000',
                                                        'status' => 'Scheduled',
                                                    ],
                                                ];
                                            @endphp

                                            @foreach ($maintenances as $maintenance)
                                                <tr>
                                                    <td>{{ $maintenance['vehicle_id'] }}</td>
                                                    <td>{{ $maintenance['type'] }}</td>
                                                    <td>{{ $maintenance['license'] }}</td>
                                                    <td>{{ $maintenance['maintenance_type'] }}</td>
                                                    <td>{{ $maintenance['scheduled_date'] }}</td>
                                                    <td>{{ $maintenance['estimated_cost'] }}</td>
                                                    <td>
                                                        @php
                                                            $statusClass = [
                                                                'Scheduled' => 'bg-blue',
                                                                'Pending Parts' => 'bg-yellow',
                                                                'In Progress' => 'bg-green',
                                                                'Completed' => 'bg-teal',
                                                                'Cancelled' => 'bg-red',
                                                            ][$maintenance['status']];
                                                        @endphp
                                                        <span
                                                            class="badge {{ $statusClass }}">{{ $maintenance['status'] }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a href="#" class="btn btn-sm btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-maintenance-detail"
                                                                data-id="{{ $maintenance['id'] }}">
                                                                <i class="ti ti-eye"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-warning"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-edit-maintenance"
                                                                data-id="{{ $maintenance['id'] }}">
                                                                <i class="ti ti-edit"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-cancel-maintenance"
                                                                data-id="{{ $maintenance['id'] }}">
                                                                <i class="ti ti-x"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-history">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>Vehicle ID</th>
                                                <th>Type</th>
                                                <th>Maintenance Type</th>
                                                <th>Completion Date</th>
                                                <th>Actual Cost</th>
                                                <th>Workshop</th>
                                                <th>Technician</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $historyMaintenances = [
                                                    [
                                                        'id' => 'M101',
                                                        'vehicle_id' => 'MX-001',
                                                        'type' => 'Mixer Truck',
                                                        'maintenance_type' => 'Regular Service',
                                                        'completion_date' => '2023-10-15',
                                                        'actual_cost' => 'Rp 2,350,000',
                                                        'workshop' => 'Central Workshop',
                                                        'technician' => 'Joko',
                                                    ],
                                                    [
                                                        'id' => 'M102',
                                                        'vehicle_id' => 'CP-001',
                                                        'type' => 'Concrete Pump',
                                                        'maintenance_type' => 'Hydraulic System Check',
                                                        'completion_date' => '2023-10-05',
                                                        'actual_cost' => 'Rp 5,200,000',
                                                        'workshop' => 'Authorized Dealer',
                                                        'technician' => 'Hendra',
                                                    ],
                                                    [
                                                        'id' => 'M103',
                                                        'vehicle_id' => 'MX-002',
                                                        'type' => 'Mixer Truck',
                                                        'maintenance_type' => 'Oil Change',
                                                        'completion_date' => '2023-09-28',
                                                        'actual_cost' => 'Rp 1,150,000',
                                                        'workshop' => 'Central Workshop',
                                                        'technician' => 'Rudi',
                                                    ],
                                                    [
                                                        'id' => 'M104',
                                                        'vehicle_id' => 'DT-001',
                                                        'type' => 'Dump Truck',
                                                        'maintenance_type' => 'Brake Inspection',
                                                        'completion_date' => '2023-09-20',
                                                        'actual_cost' => 'Rp 1,800,000',
                                                        'workshop' => 'External Service',
                                                        'technician' => 'Agus',
                                                    ],
                                                    [
                                                        'id' => 'M105',
                                                        'vehicle_id' => 'MX-003',
                                                        'type' => 'Mixer Truck',
                                                        'maintenance_type' => 'Major Overhaul',
                                                        'completion_date' => '2023-09-10',
                                                        'actual_cost' => 'Rp 12,500,000',
                                                        'workshop' => 'Authorized Dealer',
                                                        'technician' => 'Bambang',
                                                    ],
                                                ];
                                            @endphp

                                            @foreach ($historyMaintenances as $maintenance)
                                                <tr>
                                                    <td>{{ $maintenance['vehicle_id'] }}</td>
                                                    <td>{{ $maintenance['type'] }}</td>
                                                    <td>{{ $maintenance['maintenance_type'] }}</td>
                                                    <td>{{ $maintenance['completion_date'] }}</td>
                                                    <td>{{ $maintenance['actual_cost'] }}</td>
                                                    <td>{{ $maintenance['workshop'] }}</td>
                                                    <td>{{ $maintenance['technician'] }}</td>
                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a href="#" class="btn btn-sm btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-maintenance-history-detail"
                                                                data-id="{{ $maintenance['id'] }}">
                                                                <i class="ti ti-eye"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-info"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modal-print-report"
                                                                data-id="{{ $maintenance['id'] }}">
                                                                <i class="ti ti-printer"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-schedule">
                                <div id="calendar-container" class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12 text-center mb-3">
                                            <div class="btn-group">
                                                <button class="btn btn-outline-primary" id="prev-month">
                                                    <i class="ti ti-chevron-left"></i>
                                                </button>
                                                <button class="btn btn-outline-primary" id="current-month">
                                                    November 2023
                                                </button>
                                                <button class="btn btn-outline-primary" id="next-month">
                                                    <i class="ti ti-chevron-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th>Sunday</th>
                                                    <th>Monday</th>
                                                    <th>Tuesday</th>
                                                    <th>Wednesday</th>
                                                    <th>Thursday</th>
                                                    <th>Friday</th>
                                                    <th>Saturday</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-muted">29</td>
                                                    <td class="text-muted">30</td>
                                                    <td class="text-muted">31</td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                </tr>
                                                <tr>
                                                    <td>5
                                                        <div class="mt-1">
                                                            <span class="badge bg-green">MX-003</span>
                                                        </div>
                                                    </td>
                                                    <td>6</td>
                                                    <td>7</td>
                                                    <td>8</td>
                                                    <td>9</td>
                                                    <td>10
                                                        <div class="mt-1">
                                                            <span class="badge bg-yellow">DT-001</span>
                                                        </div>
                                                    </td>
                                                    <td>11</td>
                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td>13</td>
                                                    <td>14</td>
                                                    <td>15
                                                        <div class="mt-1">
                                                            <span class="badge bg-blue">MX-002</span>
                                                        </div>
                                                    </td>
                                                    <td>16</td>
                                                    <td>17</td>
                                                    <td>18
                                                        <div class="mt-1">
                                                            <span class="badge bg-blue">PU-001</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>19</td>
                                                    <td>20
                                                        <div class="mt-1">
                                                            <span class="badge bg-blue">CP-001</span>
                                                        </div>
                                                    </td>
                                                    <td>21</td>
                                                    <td>22</td>
                                                    <td>23</td>
                                                    <td>24</td>
                                                    <td>25
                                                        <div class="mt-1">
                                                            <span class="badge bg-blue">MX-001</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>26</td>
                                                    <td>27</td>
                                                    <td>28</td>
                                                    <td>29</td>
                                                    <td>30</td>
                                                    <td class="text-muted">1</td>
                                                    <td class="text-muted">2</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-3">
                                        <span class="badge bg-blue me-2">Scheduled</span>
                                        <span class="badge bg-green me-2">In Progress</span>
                                        <span class="badge bg-yellow me-2">Pending Parts</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Maintenance Statistics</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body p-2 text-center">
                                        <div class="h1 m-0">11</div>
                                        <div class="text-muted mb-3">Scheduled Maintenance</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body p-2 text-center">
                                        <div class="h1 m-0">3</div>
                                        <div class="text-muted mb-3">In Progress</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body p-2 text-center">
                                        <div class="h1 m-0">2</div>
                                        <div class="text-muted mb-3">Pending Parts</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body p-2 text-center">
                                        <div class="h1 m-0">28</div>
                                        <div class="text-muted mb-3">Completed This Month</div>
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
                        <h3 class="card-title">Maintenance Cost by Vehicle Type</h3>
                    </div>
                    <div class="card-body">
                        <div id="chart-maintenance-cost" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Schedule Maintenance Modal -->
        <div class="modal modal-blur fade" id="modal-schedule-maintenance" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Schedule New Maintenance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Vehicle</label>
                                    <select class="form-select" required>
                                        <option value="">Select Vehicle</option>
                                        <option value="MX-001">MX-001 (Mixer Truck)</option>
                                        <option value="MX-002">MX-002 (Mixer Truck)</option>
                                        <option value="MX-003">MX-003 (Mixer Truck)</option>
                                        <option value="CP-001">CP-001 (Concrete Pump)</option>
                                        <option value="DT-001">DT-001 (Dump Truck)</option>
                                        <option value="PU-001">PU-001 (Pickup)</option>
                                        <option value="SUV-001">SUV-001 (SUV)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Maintenance Type</label>
                                    <select class="form-select" required>
                                        <option value="">Select Type</option>
                                        <option value="Regular Service">Regular Service</option>
                                        <option value="Oil Change">Oil Change</option>
                                        <option value="Tire Replacement">Tire Replacement</option>
                                        <option value="Brake Inspection">Brake Inspection</option>
                                        <option value="Major Overhaul">Major Overhaul</option>
                                        <option value="Hydraulic System Check">Hydraulic System Check</option>
                                        <option value="Drum Repair">Drum Repair</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Scheduled Date</label>
                                    <input type="date" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Estimated Duration (hours)</label>
                                    <input type="number" class="form-control" min="1" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Workshop</label>
                                    <select class="form-select" required>
                                        <option value="">Select Workshop</option>
                                        <option value="Central Workshop">Central Workshop</option>
                                        <option value="Authorized Dealer">Authorized Dealer</option>
                                        <option value="External Service">External Service</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Estimated Cost (Rp)</label>
                                    <input type="number" class="form-control" min="0" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Parts Required</label>
                                <textarea class="form-control" rows="2" placeholder="List any parts that need to be ordered"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-primary ms-auto">
                            <i class="ti ti-plus"></i>
                            Schedule Maintenance
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Maintenance Detail Modal -->
        <div class="modal modal-blur fade" id="modal-maintenance-detail" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Maintenance Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Vehicle Information</h3>
                                <div class="datagrid">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Vehicle ID</div>
                                        <div class="datagrid-content">MX-002</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Type</div>
                                        <div class="datagrid-content">Mixer Truck</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">License Plate</div>
                                        <div class="datagrid-content">B 2345 DEF</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Current Odometer</div>
                                        <div class="datagrid-content">45,678 km</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3>Maintenance Information</h3>
                                <div class="datagrid">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Maintenance ID</div>
                                        <div class="datagrid-content">M001</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Type</div>
                                        <div class="datagrid-content">Regular Service</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Scheduled Date</div>
                                        <div class="datagrid-content">2023-11-15</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Status</div>
                                        <div class="datagrid-content"><span class="badge bg-blue">Scheduled</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-text">Details</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="datagrid">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Workshop</div>
                                        <div class="datagrid-content">Central Workshop</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Estimated Duration</div>
                                        <div class="datagrid-content">4 hours</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Estimated Cost</div>
                                        <div class="datagrid-content">Rp 2,500,000</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="datagrid">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Created By</div>
                                        <div class="datagrid-content">Ahmad Rizki</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Created Date</div>
                                        <div class="datagrid-content">2023-11-01</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Last Updated</div>
                                        <div class="datagrid-content">2023-11-01</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mt-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" readonly>Regular maintenance service including oil change, filter replacement, brake check, and general inspection.</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Parts Required</label>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Engine Oil Filter
                                    <span class="badge bg-primary">2 units</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Air Filter
                                    <span class="badge bg-primary">1 unit</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Engine Oil (15W-40)
                                    <span class="badge bg-primary">20 liters</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary ms-auto" data-bs-dismiss="modal"
                            data-bs-toggle="modal" data-bs-target="#modal-edit-maintenance">
                            <i class="ti ti-edit"></i>
                            Edit
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Maintenance Modal -->
        <div class="modal modal-blur fade" id="modal-edit-maintenance" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Maintenance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Maintenance ID</label>
                                    <input type="text" class="form-control" value="M001" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Vehicle</label>
                                    <input type="text" class="form-control" value="MX-002 (Mixer Truck)" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Maintenance Type</label>
                                    <select class="form-select" required>
                                        <option value="Regular Service" selected>Regular Service</option>
                                        <option value="Oil Change">Oil Change</option>
                                        <option value="Tire Replacement">Tire Replacement</option>
                                        <option value="Brake Inspection">Brake Inspection</option>
                                        <option value="Major Overhaul">Major Overhaul</option>
                                        <option value="Hydraulic System Check">Hydraulic System Check</option>
                                        <option value="Drum Repair">Drum Repair</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Status</label>
                                    <select class="form-select" required>
                                        <option value="Scheduled" selected>Scheduled</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Pending Parts">Pending Parts</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Scheduled Date</label>
                                    <input type="date" class="form-control" value="2023-11-15" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Estimated Duration (hours)</label>
                                    <input type="number" class="form-control" min="1" value="4" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Workshop</label>
                                    <select class="form-select" required>
                                        <option value="Central Workshop" selected>Central Workshop</option>
                                        <option value="Authorized Dealer">Authorized Dealer</option>
                                        <option value="External Service">External Service</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Estimated Cost (Rp)</label>
                                    <input type="number" class="form-control" min="0" value="2500000" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3">Regular maintenance service including oil change, filter replacement, brake check, and general inspection.</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Parts Required</label>
                                <div class="table-responsive">
                                    <table class="table table-vcenter table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Part Name</th>
                                                <th>Quantity</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" value="Engine Oil Filter">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" value="2"
                                                        min="1">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-danger">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" value="Air Filter">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" value="1"
                                                        min="1">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-danger">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        value="Engine Oil (15W-40)">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" value="20"
                                                        min="1">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-danger">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-sm btn-success mt-2">
                                    <i class="ti ti-plus"></i> Add Part
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-primary ms-auto">
                            <i class="ti ti-device-floppy"></i>
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cancel Maintenance Modal -->
        <div class="modal modal-blur fade" id="modal-cancel-maintenance" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-title">Are you sure?</div>
                        <div>You are about to cancel this maintenance schedule. This action cannot be undone.</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary me-auto"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, cancel
                            maintenance</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Maintenance History Detail Modal -->
        <div class="modal modal-blur fade" id="modal-maintenance-history-detail" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Maintenance History Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Vehicle Information</h3>
                                <div class="datagrid">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Vehicle ID</div>
                                        <div class="datagrid-content">MX-001</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Type</div>
                                        <div class="datagrid-content">Mixer Truck</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">License Plate</div>
                                        <div class="datagrid-content">B 1234 ABC</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Odometer at Service</div>
                                        <div class="datagrid-content">32,456 km</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3>Maintenance Information</h3>
                                <div class="datagrid">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Maintenance ID</div>
                                        <div class="datagrid-content">M101</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Type</div>
                                        <div class="datagrid-content">Regular Service</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Completion Date</div>
                                        <div class="datagrid-content">2023-10-15</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Status</div>
                                        <div class="datagrid-content"><span class="badge bg-teal">Completed</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-text">Service Details</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="datagrid">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Workshop</div>
                                        <div class="datagrid-content">Central Workshop</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Technician</div>
                                        <div class="datagrid-content">Joko</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Duration</div>
                                        <div class="datagrid-content">3.5 hours</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Actual Cost</div>
                                        <div class="datagrid-content">Rp 2,350,000</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="datagrid">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Scheduled Date</div>
                                        <div class="datagrid-content">2023-10-14</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Estimated Cost</div>
                                        <div class="datagrid-content">Rp 2,500,000</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Cost Variance</div>
                                        <div class="datagrid-content text-green">-Rp 150,000</div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Next Service Due</div>
                                        <div class="datagrid-content">2024-01-15</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mt-3">
                            <label class="form-label">Work Performed</label>
                            <textarea class="form-control" rows="3" readonly>Completed regular maintenance service including oil change, filter replacement, brake check, and general inspection. Replaced worn brake pads on front wheels. Adjusted clutch. All systems functioning normally.</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Parts Used</label>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Engine Oil Filter
                                    <span class="badge bg-primary">2 units</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Air Filter
                                    <span class="badge bg-primary">1 unit</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Engine Oil (15W-40)
                                    <span class="badge bg-primary">20 liters</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Brake Pads (Front)
                                    <span class="badge bg-primary">1 set</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Issues Found</label>
                            <ul class="list-group">
                                <li class="list-group-item">Worn brake pads on front wheels - Replaced</li>
                                <li class="list-group-item">Clutch adjustment needed - Adjusted</li>
                                <li class="list-group-item">Recommendation: Monitor rear suspension, may need replacement
                                    in next 3 months</li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal" data-bs-toggle="modal"
                            data-bs-target="#modal-print-report">
                            <i class="ti ti-printer"></i>
                            Print Report
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Print Report Modal -->
        <div class="modal modal-blur fade" id="modal-print-report" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-title">Print Maintenance Report</div>
                        <div>Select the report format you want to print.</div>
                        <div class="mt-3">
                            <div class="form-selectgroup">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="report-format" value="detailed"
                                        class="form-selectgroup-input" checked>
                                    <span class="form-selectgroup-label">
                                        <i class="ti ti-file-text me-2"></i>
                                        Detailed Report
                                    </span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="report-format" value="summary"
                                        class="form-selectgroup-input">
                                    <span class="form-selectgroup-label">
                                        <i class="ti ti-file me-2"></i>
                                        Summary Report
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary me-auto"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                            <i class="ti ti-printer me-2"></i>
                            Print
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Maintenance Cost Chart
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-maintenance-cost'), {
                chart: {
                    type: "bar",
                    fontFamily: 'inherit',
                    height: 240,
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 1,
                },
                series: [{
                    name: "Maintenance Cost",
                    data: [18500000, 8200000, 4500000, 2800000, 1500000]
                }],
                grid: {
                    padding: {
                        top: -20,
                        right: 0,
                        left: -4,
                        bottom: -4
                    },
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false
                    },
                    categories: ['Mixer Truck', 'Concrete Pump', 'Dump Truck', 'Pickup', 'SUV'],
                },
                yaxis: {
                    labels: {
                        padding: 4,
                        formatter: function(val) {
                            return "Rp " + (val / 1000000).toFixed(1) + "M";
                        }
                    },
                },
                colors: ["#206bc4"],
                legend: {
                    show: false,
                },
            })).render();

            // Filter reset button
            document.getElementById('reset-filters').addEventListener('click', function() {
                document.getElementById('filter-type').value = '';
                document.getElementById('filter-maintenance-type').value = '';
                document.getElementById('filter-status').value = '';
                document.getElementById('filter-date-range').value = '';
            });
        });
    </script>
@endsection
