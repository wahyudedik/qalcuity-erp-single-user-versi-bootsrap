@extends('layouts.app')

@section('title', 'Batch Plant Dashboard')

@section('styles')
<style>
    .gauge-container {
        width: 200px;
        height: 200px;
        margin: 0 auto;
        position: relative;
    }
    .gauge-value {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 24px;
        font-weight: bold;
    }
    .parameter-card {
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    .parameter-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .status-indicator {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
    }
    .status-on {
        background-color: #2fb344;
    }
    .status-off {
        background-color: #d63939;
    }
    .status-standby {
        background-color: #f59f00;
    }
</style>
@endsection

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Batch Plant Live Dashboard
                </h2>
                <div class="text-muted mt-1">Real-time monitoring of batch plant operations</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <span class="d-none d-sm-inline">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-primary active">Live View</button>
                            <a href="{{ route('production.batch-plant.history') }}" class="btn btn-outline-primary">History</a>
                        </div>
                    </span>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                        <i class="ti ti-file-export icon"></i>
                        Export Data
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
                            <span class="ms-2">Last update: <span id="last-update">Just now</span></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-blue text-white avatar">
                                                    <i class="ti ti-building-factory"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Main Plant
                                                </div>
                                                <div class="text-muted">
                                                    <span class="status-indicator status-on"></span> Running
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
                                                    <i class="ti ti-mixer"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Mixer
                                                </div>
                                                <div class="text-muted">
                                                    <span class="status-indicator status-on"></span> Active
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
                                                    <i class="ti ti-conveyor-belt"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Conveyor
                                                </div>
                                                <div class="text-muted">
                                                    <span class="status-indicator status-standby"></span> Standby
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
                                                <span class="bg-purple text-white avatar">
                                                    <i class="ti ti-droplet"></i>
                                                </span>
                                            </div>
                                                                                        <div class="col">
                                                <div class="font-weight-medium">
                                                    Water System
                                                </div>
                                                <div class="text-muted">
                                                    <span class="status-indicator status-on"></span> Active
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
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Current Batch</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col-6">
                                    <label class="form-label text-muted">Batch ID</label>
                                    <div class="form-control-plaintext">BP-2023-10-25-042</div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label text-muted">Mix Design</label>
                                    <div class="form-control-plaintext">K-350 (35 MPa)</div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label text-muted">Volume</label>
                                    <div class="form-control-plaintext">8 m³</div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label text-muted">Slump Target</label>
                                    <div class="form-control-plaintext">12 ± 2 cm</div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label text-muted">Customer</label>
                                    <div class="form-control-plaintext">PT Konstruksi Prima</div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label text-muted">Project</label>
                                    <div class="form-control-plaintext">Apartment Tower B</div>
                                </div>
                            </div>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" style="width: 65%" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" aria-label="65% Complete">
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

            <!-- Real-time Parameters -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Real-time Parameters</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-lg-4 mb-3">
                                <div class="card parameter-card">
                                    <div class="card-body text-center">
                                        <div class="h1 m-0">78°C</div>
                                        <div class="text-muted mb-3">Mixer Temperature</div>
                                        <div class="d-flex justify-content-center">
                                            <div class="progress" style="width: 80%">
                                                <div class="progress-bar bg-yellow" style="width: 78%" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mb-3">
                                <div class="card parameter-card">
                                    <div class="card-body text-center">
                                        <div class="h1 m-0">32°C</div>
                                        <div class="text-muted mb-3">Concrete Temperature</div>
                                        <div class="d-flex justify-content-center">
                                            <div class="progress" style="width: 80%">
                                                <div class="progress-bar bg-green" style="width: 64%" role="progressbar" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mb-3">
                                <div class="card parameter-card">
                                    <div class="card-body text-center">
                                        <div class="h1 m-0">7.2%</div>
                                        <div class="text-muted mb-3">Sand Moisture</div>
                                        <div class="d-flex justify-content-center">
                                            <div class="progress" style="width: 80%">
                                                <div class="progress-bar bg-yellow" style="width: 72%" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mb-3">
                                <div class="card parameter-card">
                                    <div class="card-body text-center">
                                        <div class="h1 m-0">3.8%</div>
                                        <div class="text-muted mb-3">Aggregate Moisture</div>
                                        <div class="d-flex justify-content-center">
                                            <div class="progress" style="width: 80%">
                                                <div class="progress-bar bg-green" style="width: 38%" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mb-3">
                                <div class="card parameter-card">
                                    <div class="card-body text-center">
                                        <div class="h1 m-0">85%</div>
                                        <div class="text-muted mb-3">Mixer Load</div>
                                        <div class="d-flex justify-content-center">
                                            <div class="progress" style="width: 80%">
                                                <div class="progress-bar bg-green" style="width: 85%" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 mb-3">
                                <div class="card parameter-card">
                                    <div class="card-body text-center">
                                        <div class="h1 m-0">0.52</div>
                                        <div class="text-muted mb-3">Water/Cement Ratio</div>
                                        <div class="d-flex justify-content-center">
                                            <div class="progress" style="width: 80%">
                                                <div class="progress-bar bg-green" style="width: 52%" role="progressbar" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100">
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

            <!-- Material Dosing -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Material Dosing</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Material</th>
                                        <th>Target (kg)</th>
                                        <th>Actual (kg)</th>
                                        <th>Variance</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cement (OPC)</td>
                                        <td>350</td>
                                        <td>352</td>
                                        <td>+0.57%</td>
                                        <td><span class="badge bg-green">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>Fly Ash</td>
                                        <td>80</td>
                                        <td>79</td>
                                        <td>-1.25%</td>
                                        <td><span class="badge bg-green">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>Sand</td>
                                        <td>780</td>
                                        <td>785</td>
                                        <td>+0.64%</td>
                                        <td><span class="badge bg-green">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>Aggregate (10-20mm)</td>
                                        <td>650</td>
                                        <td>648</td>
                                        <td>-0.31%</td>
                                        <td><span class="badge bg-green">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <td>Aggregate (20-30mm)</td>
                                        <td>450</td>
                                        <td>452</td>
                                        <td>+0.44%</td>
                                        <td><span class="badge bg-azure">In Progress</span></td>
                                    </tr>
                                    <tr>
                                        <td>Water</td>
                                        <td>185</td>
                                        <td>0</td>
                                        <td>-</td>
                                        <td><span class="badge bg-secondary">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>Admixture (Superplasticizer)</td>
                                        <td>3.5</td>
                                        <td>0</td>
                                        <td>-</td>
                                        <td><span class="badge bg-secondary">Pending</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Equipment Status -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Equipment Status</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Equipment</th>
                                        <th>Status</th>
                                        <th>Runtime</th>
                                        <th>Load</th>
                                        <th>Condition</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Main Mixer</td>
                                        <td><span class="status-indicator status-on"></span> Running</td>
                                        <td>4.2 hrs today</td>
                                        <td>85%</td>
                                        <td><span class="badge bg-green">Normal</span></td>
                                    </tr>
                                    <tr>
                                        <td>Cement Screw Conveyor</td>
                                        <td><span class="status-indicator status-off"></span> Idle</td>
                                        <td>2.8 hrs today</td>
                                        <td>0%</td>
                                        <td><span class="badge bg-green">Normal</span></td>
                                    </tr>
                                    <tr>
                                        <td>Aggregate Belt Conveyor</td>
                                        <td><span class="status-indicator status-on"></span> Running</td>
                                        <td>3.5 hrs today</td>
                                        <td>65%</td>
                                        <td><span class="badge bg-green">Normal</span></td>
                                    </tr>
                                    <tr>
                                        <td>Water Pump</td>
                                        <td><span class="status-indicator status-standby"></span> Standby</td>
                                        <td>2.1 hrs today</td>
                                        <td>0%</td>
                                        <td><span class="badge bg-green">Normal</span></td>
                                    </tr>
                                    <tr>
                                        <td>Admixture Pump</td>
                                        <td><span class="status-indicator status-standby"></span> Standby</td>
                                        <td>1.8 hrs today</td>
                                        <td>0%</td>
                                        <td><span class="badge bg-green">Normal</span></td>
                                    </tr>
                                    <tr>
                                        <td>Dust Collector</td>
                                        <td><span class="status-indicator status-on"></span> Running</td>
                                        <td>8.0 hrs today</td>
                                        <td>40%</td>
                                        <td><span class="badge bg-yellow">Maintenance Due</span></td>
                                    </tr>
                                    <tr>
                                        <td>Compressor</td>
                                        <td><span class="status-indicator status-on"></span> Running</td>
                                        <td>8.0 hrs today</td>
                                        <td>55%</td>
                                        <td><span class="badge bg-green">Normal</span></td>
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

<!-- Export Data Modal -->
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Batch Plant Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Report Type</label>
                    <select class="form-select">
                        <option value="1">Batch Production Report</option>
                        <option value="2">Material Consumption Report</option>
                        <option value="3">Equipment Performance Report</option>
                        <option value="4">Quality Parameters Report</option>
                        <option value="5">Alerts and Events Report</option>
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

@section('scripts')
<script>
    // Simulate real-time updates
    function updateLastUpdate() {
        const now = new Date();
        document.getElementById('last-update').textContent = now.toLocaleTimeString();
    }

    // Update every 5 seconds
    setInterval(updateLastUpdate, 5000);
</script>
@endsection

