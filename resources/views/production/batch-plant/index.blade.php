@extends('layouts.app')

@section('title', 'Batch Plant Monitoring')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Batch Plant Monitoring
                </h2>
                <div class="text-muted mt-1">Monitor and manage batch plant operations in real-time</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.batch-plant.dashboard') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-dashboard icon"></i>
                        Live Dashboard
                    </a>
                    <a href="{{ route('production.batch-plant.history') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-history icon"></i>
                        Production History
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <!-- Plant Status Overview -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Plant Status Overview</h3>
                        <div class="card-actions">
                            <span class="badge bg-green">Online</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-blue text-white avatar">
                                                    <i class="ti ti-activity"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Plant Status
                                                </div>
                                                <div class="text-muted">
                                                    Operational
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-green text-white avatar">
                                                    <i class="ti ti-truck-delivery"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Today's Production
                                                </div>
                                                <div class="text-muted">
                                                    187 m³
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-yellow text-white avatar">
                                                    <i class="ti ti-hourglass"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Uptime
                                                </div>
                                                <div class="text-muted">
                                                    98.7%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
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
                                                    Active Alerts
                                                </div>
                                                <div class="text-muted">
                                                    <a href="{{ route('production.batch-plant.alerts') }}">2 Alerts</a>
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

            <!-- Current Batch Information -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Current Batch Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="subheader">Batch ID</div>
                                                <div class="ms-auto">BP-2023-10-25-042</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="subheader">Mix Design</div>
                                                <div class="ms-auto">K-350 (35 MPa)</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="subheader">Volume</div>
                                                <div class="ms-auto">8 m³</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="subheader">Customer</div>
                                                <div class="ms-auto">PT Konstruksi Prima</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="subheader">Project</div>
                                                <div class="ms-auto">Apartment Tower B</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="subheader">Status</div>
                                                <div class="ms-auto"><span class="badge bg-green">In Progress</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar bg-primary" style="width: 65%" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" aria-label="65% Complete">
                                <span class="visually-hidden">65% Complete</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Batch Progress: 65%</span>
                            <span class="text-muted">Est. completion: 5 min</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Material Levels -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Material Levels</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Cement Silo 1 (OPC)</label>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-primary" style="width: 78%" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100">
                                    78%
                                </div>
                            </div>
                            <div class="d-flex justify-content-between text-muted small">
                                <div>23.4 tons remaining</div>
                                <div>30 tons capacity</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cement Silo 2 (PCC)</label>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-primary" style="width: 45%" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                    45%
                                </div>
                            </div>
                            <div class="d-flex justify-content-between text-muted small">
                                <div>13.5 tons remaining</div>
                                <div>30 tons capacity</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fly Ash Silo</label>
                            <div class="progress mb-2">
                                                                <div class="progress-bar bg-primary" style="width: 62%" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100">
                                    62%
                                </div>
                            </div>
                            <div class="d-flex justify-content-between text-muted small">
                                <div>12.4 tons remaining</div>
                                <div>20 tons capacity</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sand Bin</label>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-yellow" style="width: 32%" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100">
                                    32%
                                </div>
                            </div>
                            <div class="d-flex justify-content-between text-muted small">
                                <div>16 tons remaining</div>
                                <div>50 tons capacity</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Aggregate Bin 1 (10-20mm)</label>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-green" style="width: 85%" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                    85%
                                </div>
                            </div>
                            <div class="d-flex justify-content-between text-muted small">
                                <div>42.5 tons remaining</div>
                                <div>50 tons capacity</div>
                            </div>
                        </div>
                        <div>
                            <label class="form-label">Aggregate Bin 2 (20-30mm)</label>
                            <div class="progress mb-2">
                                <div class="progress-bar bg-red" style="width: 15%" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                    15%
                                </div>
                            </div>
                            <div class="d-flex justify-content-between text-muted small">
                                <div>7.5 tons remaining</div>
                                <div>50 tons capacity</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Production Queue -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Production Queue</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Batch ID</th>
                                        <th>Mix Design</th>
                                        <th>Volume</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>BP-2023-10-25-042</td>
                                        <td>K-350</td>
                                        <td>8 m³</td>
                                        <td>PT Konstruksi Prima</td>
                                        <td><span class="badge bg-green">In Progress</span></td>
                                    </tr>
                                    <tr>
                                        <td>BP-2023-10-25-043</td>
                                        <td>K-250</td>
                                        <td>6 m³</td>
                                        <td>CV Bangun Jaya</td>
                                        <td><span class="badge bg-azure">Queued</span></td>
                                    </tr>
                                    <tr>
                                        <td>BP-2023-10-25-044</td>
                                        <td>K-400</td>
                                        <td>12 m³</td>
                                        <td>PT Wijaya Karya</td>
                                        <td><span class="badge bg-azure">Queued</span></td>
                                    </tr>
                                    <tr>
                                        <td>BP-2023-10-25-045</td>
                                        <td>K-300</td>
                                        <td>8 m³</td>
                                        <td>PT Adhi Karya</td>
                                        <td><span class="badge bg-azure">Queued</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Alerts -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Alerts</h3>
                        <div class="card-actions">
                            <a href="{{ route('production.batch-plant.alerts') }}" class="btn btn-outline-primary btn-sm">
                                View All
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="status-dot status-dot-animated bg-red d-block"></span>
                                    </div>
                                    <div class="col text-truncate">
                                        <span class="text-reset d-block">Aggregate Bin 2 Low Level</span>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-muted text-truncate">Level below 20% threshold</span>
                                            <span class="text-muted">10:23 AM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="status-dot status-dot-animated bg-yellow d-block"></span>
                                    </div>
                                    <div class="col text-truncate">
                                        <span class="text-reset d-block">Sand Moisture Content High</span>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-muted text-truncate">Moisture content at 7.2% (threshold: 6%)</span>
                                            <span class="text-muted">09:45 AM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="status-dot bg-green d-block"></span>
                                    </div>
                                    <div class="col text-truncate">
                                        <span class="text-reset d-block">Mixer Motor Temperature Normal</span>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-muted text-truncate">Temperature returned to normal range</span>
                                            <span class="text-muted">09:12 AM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="status-dot bg-yellow d-block"></span>
                                    </div>
                                    <div class="col text-truncate">
                                        <span class="text-reset d-block">Mixer Motor Temperature High</span>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-muted text-truncate">Temperature at 78°C (threshold: 75°C)</span>
                                            <span class="text-muted">08:57 AM</span>
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

