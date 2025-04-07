@extends('layouts.app')

@section('title', 'Batch Plant Settings')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Batch Plant Settings
                </h2>
                <div class="text-muted mt-1">Configure batch plant parameters and system settings</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.batch-plant') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left icon"></i>
                        Back to Monitoring
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <!-- Settings Navigation -->
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="list-group list-group-transparent">
                            <a href="#general" class="list-group-item list-group-item-action d-flex align-items-center active" data-bs-toggle="tab">
                                <i class="ti ti-settings me-2"></i>
                                General Settings
                            </a>
                            <a href="#material" class="list-group-item list-group-item-action d-flex align-items-center" data-bs-toggle="tab">
                                <i class="ti ti-building-warehouse me-2"></i>
                                Material Parameters
                            </a>
                            <a href="#equipment" class="list-group-item list-group-item-action d-flex align-items-center" data-bs-toggle="tab">
                                <i class="ti ti-building-factory me-2"></i>
                                Equipment Settings
                            </a>
                            <a href="#quality" class="list-group-item list-group-item-action d-flex align-items-center" data-bs-toggle="tab">
                                <i class="ti ti-chart-bar me-2"></i>
                                Quality Parameters
                            </a>
                            <a href="#alerts" class="list-group-item list-group-item-action d-flex align-items-center" data-bs-toggle="tab">
                                <i class="ti ti-bell me-2"></i>
                                Alert Configuration
                            </a>
                            <a href="#users" class="list-group-item list-group-item-action d-flex align-items-center" data-bs-toggle="tab">
                                <i class="ti ti-users me-2"></i>
                                User Access
                            </a>
                                                        <a href="#backup" class="list-group-item list-group-item-action d-flex align-items-center" data-bs-toggle="tab">
                                <i class="ti ti-cloud-upload me-2"></i>
                                Backup & Restore
                            </a>
                            <a href="#integration" class="list-group-item list-group-item-action d-flex align-items-center" data-bs-toggle="tab">
                                <i class="ti ti-plug me-2"></i>
                                System Integration
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings Content -->
            <div class="col-12 col-md-9">
                <div class="tab-content">
                    <!-- General Settings -->
                    <div class="tab-pane active show" id="general">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">General Settings</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Plant Name</label>
                                            <input type="text" class="form-control" value="Main Batch Plant">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Plant ID</label>
                                            <input type="text" class="form-control" value="BP-001" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Location</label>
                                            <input type="text" class="form-control" value="Cikarang Plant">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Plant Capacity</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="120">
                                                <span class="input-group-text">m³/hour</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Date Format</label>
                                            <select class="form-select">
                                                <option value="dd/mm/yyyy">DD/MM/YYYY</option>
                                                <option value="mm/dd/yyyy">MM/DD/YYYY</option>
                                                <option value="yyyy-mm-dd" selected>YYYY-MM-DD</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Time Format</label>
                                            <select class="form-select">
                                                <option value="12" selected>12-hour (AM/PM)</option>
                                                <option value="24">24-hour</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Weight Unit</label>
                                            <select class="form-select">
                                                <option value="kg" selected>Kilograms (kg)</option>
                                                <option value="lb">Pounds (lb)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Volume Unit</label>
                                            <select class="form-select">
                                                <option value="m3" selected>Cubic Meters (m³)</option>
                                                <option value="yd3">Cubic Yards (yd³)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Temperature Unit</label>
                                            <select class="form-select">
                                                <option value="c" selected>Celsius (°C)</option>
                                                <option value="f">Fahrenheit (°F)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Pressure Unit</label>
                                            <select class="form-select">
                                                <option value="bar" selected>Bar</option>
                                                <option value="psi">PSI</option>
                                                <option value="kpa">kPa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Data Refresh Rate</label>
                                            <select class="form-select">
                                                <option value="1">1 second</option>
                                                <option value="5" selected>5 seconds</option>
                                                <option value="10">10 seconds</option>
                                                <option value="30">30 seconds</option>
                                                <option value="60">1 minute</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Data Retention Period</label>
                                            <select class="form-select">
                                                <option value="30">30 days</option>
                                                <option value="60">60 days</option>
                                                <option value="90" selected>90 days</option>
                                                <option value="180">180 days</option>
                                                <option value="365">1 year</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" checked>
                                            <span class="form-check-label">Enable automatic data backup</span>
                                        </label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" checked>
                                            <span class="form-check-label">Enable email notifications</span>
                                        </label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" checked>
                                            <span class="form-check-label">Enable SMS alerts for critical issues</span>
                                        </label>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Material Parameters -->
                    <div class="tab-pane" id="material">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Material Parameters</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <h4 class="mb-3">Storage Capacity</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Cement Silo 1 Capacity</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="100">
                                                <span class="input-group-text">tons</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Cement Silo 2 Capacity</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="100">
                                                <span class="input-group-text">tons</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Fly Ash Silo Capacity</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="50">
                                                <span class="input-group-text">tons</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Sand Bin Capacity</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="80">
                                                <span class="input-group-text">tons</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Aggregate Bin 1 Capacity</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="80">
                                                <span class="input-group-text">tons</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Aggregate Bin 2 Capacity</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="80">
                                                <span class="input-group-text">tons</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Water Tank Capacity</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="20000">
                                                <span class="input-group-text">liters</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Admixture Tank Capacity</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="1000">
                                                <span class="input-group-text">liters</span>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="mb-3 mt-4">Reorder Thresholds</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Cement Reorder Level</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="20">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Fly Ash Reorder Level</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="25">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Sand Reorder Level</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="30">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Aggregate Reorder Level</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="30">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Admixture Reorder Level</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="20">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="mb-3 mt-4">Moisture Compensation</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Enable Automatic Moisture Compensation</label>
                                            <select class="form-select">
                                                <option value="1" selected>Enabled</option>
                                                <option value="0">Disabled</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Default Sand Moisture</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="4.5">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Default Aggregate 1 Moisture</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="2.0">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Default Aggregate 2 Moisture</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="1.5">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>

                                                                        <div class="form-footer">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Equipment Settings -->
                    <div class="tab-pane" id="equipment">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Equipment Settings</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <h4 class="mb-3">Mixer Configuration</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Mixer Type</label>
                                            <select class="form-select">
                                                <option value="twin-shaft" selected>Twin Shaft</option>
                                                <option value="pan">Pan Mixer</option>
                                                <option value="planetary">Planetary Mixer</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Mixer Capacity</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="3">
                                                <span class="input-group-text">m³</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Mixing Time</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="90">
                                                <span class="input-group-text">seconds</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Discharge Time</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="30">
                                                <span class="input-group-text">seconds</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Maximum Mixer Temperature</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="85">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Maximum Mixer Load</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="95">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="mb-3 mt-4">Conveyor Settings</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Aggregate Belt Speed</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="1.2">
                                                <span class="input-group-text">m/s</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Sand Belt Speed</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="1.0">
                                                <span class="input-group-text">m/s</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Cement Screw Speed</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="20">
                                                <span class="input-group-text">rpm</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Fly Ash Screw Speed</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="18">
                                                <span class="input-group-text">rpm</span>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="mb-3 mt-4">Scale Calibration</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Cement Scale Tolerance</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="1.0">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Aggregate Scale Tolerance</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="2.0">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Water Scale Tolerance</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="1.5">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Admixture Scale Tolerance</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="1.0">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Last Calibration Date</label>
                                            <input type="date" class="form-control" value="2023-09-15">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Next Calibration Due</label>
                                            <input type="date" class="form-control" value="2023-12-15" readonly>
                                        </div>
                                    </div>

                                    <h4 class="mb-3 mt-4">Maintenance Schedule</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Mixer Maintenance Interval</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="500">
                                                <span class="input-group-text">hours</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Conveyor Maintenance Interval</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="750">
                                                <span class="input-group-text">hours</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Compressor Maintenance Interval</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="1000">
                                                <span class="input-group-text">hours</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Dust Collector Filter Change</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="90">
                                                <span class="input-group-text">days</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Quality Parameters -->
                    <div class="tab-pane" id="quality">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Quality Parameters</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <h4 class="mb-3">Concrete Temperature</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Minimum Concrete Temperature</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="15">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Maximum Concrete Temperature</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="32">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="mb-3 mt-4">Slump Control</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Default Slump Target</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="12">
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Slump Tolerance</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="2">
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Enable Automatic Slump Adjustment</label>
                                            <select class="form-select">
                                                <option value="1" selected>Enabled</option>
                                                <option value="0">Disabled</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Maximum Water Adjustment</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="5">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="mb-3 mt-4">Material Quality</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Maximum Sand Moisture</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="8">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Maximum Aggregate Moisture</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="5">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Cement Temperature Warning Threshold</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="70">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Water Temperature Warning Threshold</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="35">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="mb-3 mt-4">Batch Tolerances</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Cement Batch Tolerance</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="1">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Aggregate Batch Tolerance</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="2">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                                                                <div class="col-md-6">
                                            <label class="form-label">Water Batch Tolerance</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="1.5">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Admixture Batch Tolerance</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="1">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Alert Configuration -->
                    <div class="tab-pane" id="alerts">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Alert Configuration</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <h4 class="mb-3">Material Level Alerts</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Cement Low Level Alert</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="15">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Cement Critical Level Alert</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="5">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Aggregate Low Level Alert</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="20">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Aggregate Critical Level Alert</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="10">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Admixture Low Level Alert</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="15">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Admixture Critical Level Alert</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="5">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="mb-3 mt-4">Equipment Alerts</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Mixer Temperature Warning</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="75">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Mixer Temperature Critical</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="85">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Compressor Pressure Warning</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="6.2">
                                                <span class="input-group-text">bar</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Compressor Pressure Critical</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="5.8">
                                                <span class="input-group-text">bar</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Mixer Motor Load Warning</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="90">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Mixer Motor Load Critical</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="95">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="mb-3 mt-4">Quality Alerts</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Concrete Temperature Low Warning</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="18">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Concrete Temperature High Warning</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="30">
                                                <span class="input-group-text">°C</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Slump Deviation Warning</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="15">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Batch Weight Deviation Warning</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" value="3">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="mb-3 mt-4">Notification Settings</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Email Recipients (Critical Alerts)</label>
                                            <input type="text" class="form-control" value="plant.manager@example.com, maintenance@example.com">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">SMS Recipients (Critical Alerts)</label>
                                            <input type="text" class="form-control" value="+628123456789, +628987654321">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Email Recipients (Warning Alerts)</label>
                                            <input type="text" class="form-control" value="operators@example.com, supervisor@example.com">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Alert Notification Frequency</label>
                                            <select class="form-select">
                                                <option value="immediate" selected>Immediate</option>
                                                <option value="5min">Every 5 minutes</option>
                                                <option value="15min">Every 15 minutes</option>
                                                <option value="hourly">Hourly digest</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- User Access -->
                    <div class="tab-pane" id="users">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User Access Management</h3>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <h4>User Roles</h4>
                                    <button type="button" class="btn btn-primary">
                                        <i class="ti ti-plus me-1"></i>
                                        Add New Role
                                    </button>
                                </div>
                                <div class="table-responsive mb-4">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>Role Name</th>
                                                <th>Description</th>
                                                <th>Users</th>
                                                <th class="w-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Administrator</td>
                                                <td>Full system access with all privileges</td>
                                                <td>2</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                                        <a href="#" class="btn btn-sm btn-outline-secondary">Permissions</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Plant Manager</td>
                                                <td>Access to all operational features with limited settings</td>
                                                <td>3</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                                        <a href="#" class="btn btn-sm btn-outline-secondary">Permissions</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Operator</td>
                                                <td>Access to production monitoring and basic controls</td>
                                                <td>8</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                                        <a href="#" class="btn btn-sm btn-outline-secondary">Permissions</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Quality Control</td>
                                                <td>Access to quality parameters and testing data</td>
                                                <td>4</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                                        <a href="#" class="btn btn-sm btn-outline-secondary">Permissions</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Maintenance</td>
                                                <td>Access to equipment settings and maintenance records</td>
                                                <td>5</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                                        <a href="#" class="btn btn-sm btn-outline-secondary">Permissions</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Viewer</td>
                                                <td>Read-only access to monitoring and reports</td>
                                                <td>12</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                                        <a href="#" class="btn btn-sm btn-outline-secondary">Permissions</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    <h4>User Accounts</h4>
                                    <button type="button" class="btn btn-primary">
                                        <i class="ti ti-plus me-1"></i>
                                        Add New User
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                                                                <th>Username</th>
                                                <th>Role</th>
                                                <th>Last Login</th>
                                                <th>Status</th>
                                                <th class="w-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>John Smith</td>
                                                <td>john.smith</td>
                                                <td>Administrator</td>
                                                <td>Today, 09:45 AM</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Edit User</a>
                                                            <a class="dropdown-item" href="#">Change Role</a>
                                                            <a class="dropdown-item" href="#">Reset Password</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="#">Deactivate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sarah Johnson</td>
                                                <td>sarah.johnson</td>
                                                <td>Plant Manager</td>
                                                <td>Today, 08:30 AM</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Edit User</a>
                                                            <a class="dropdown-item" href="#">Change Role</a>
                                                            <a class="dropdown-item" href="#">Reset Password</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="#">Deactivate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Michael Lee</td>
                                                <td>michael.lee</td>
                                                <td>Operator</td>
                                                <td>Yesterday, 04:12 PM</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Edit User</a>
                                                            <a class="dropdown-item" href="#">Change Role</a>
                                                            <a class="dropdown-item" href="#">Reset Password</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="#">Deactivate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Emily Chen</td>
                                                <td>emily.chen</td>
                                                <td>Quality Control</td>
                                                <td>Today, 10:22 AM</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Edit User</a>
                                                            <a class="dropdown-item" href="#">Change Role</a>
                                                            <a class="dropdown-item" href="#">Reset Password</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="#">Deactivate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Robert Wilson</td>
                                                <td>robert.wilson</td>
                                                <td>Maintenance</td>
                                                <td>2 days ago</td>
                                                <td><span class="badge bg-secondary">Inactive</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                            Actions
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Edit User</a>
                                                            <a class="dropdown-item" href="#">Change Role</a>
                                                            <a class="dropdown-item" href="#">Reset Password</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-success" href="#">Activate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Backup & Restore -->
                    <div class="tab-pane" id="backup">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Backup & Restore</h3>
                            </div>
                            <div class="card-body">
                                <h4 class="mb-3">Automatic Backups</h4>
                                <div class="mb-3">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">Enable automatic backups</span>
                                    </label>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Backup Frequency</label>
                                        <select class="form-select">
                                            <option value="daily" selected>Daily</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Backup Time</label>
                                        <input type="time" class="form-control" value="02:00">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Backup Retention</label>
                                        <select class="form-select">
                                            <option value="7">7 days</option>
                                            <option value="14">14 days</option>
                                            <option value="30" selected>30 days</option>
                                            <option value="90">90 days</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Backup Storage</label>
                                        <select class="form-select">
                                            <option value="local" selected>Local Storage</option>
                                            <option value="cloud">Cloud Storage</option>
                                            <option value="both">Both Local and Cloud</option>
                                        </select>
                                    </div>
                                </div>

                                <h4 class="mb-3 mt-4">Manual Backup</h4>
                                <p class="text-muted">Create an immediate backup of the system data.</p>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Backup Type</label>
                                        <select class="form-select">
                                            <option value="full" selected>Full Backup</option>
                                            <option value="config">Configuration Only</option>
                                            <option value="data">Production Data Only</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Backup Format</label>
                                        <select class="form-select">
                                            <option value="compressed" selected>Compressed Archive</option>
                                            <option value="uncompressed">Uncompressed Files</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary">
                                        <i class="ti ti-download me-1"></i>
                                        Create Backup Now
                                    </button>
                                </div>

                                <h4 class="mb-3 mt-4">Restore System</h4>
                                <p class="text-muted">Restore the system from a previous backup.</p>
                                <div class="alert alert-warning">
                                    <i class="ti ti-alert-triangle me-2"></i>
                                    Warning: Restoring from a backup will overwrite current data. This action cannot be undone.
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Select Backup File</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="button" class="btn btn-danger">
                                        <i class="ti ti-upload me-1"></i>
                                        Restore System
                                    </button>
                                </div>

                                <h4 class="mb-3 mt-4">Backup History</h4>
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>Backup ID</th>
                                                <th>Date & Time</th>
                                                <th>Type</th>
                                                <th>Size</th>
                                                <th>Status</th>
                                                <th class="w-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>BKP-20231025-0200</td>
                                                <td>2023-10-25 02:00:15</td>
                                                <td>Automatic (Full)</td>
                                                <td>245 MB</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-sm btn-outline-primary">Download</a>
                                                        <a href="#" class="btn btn-sm btn-outline-secondary">Restore</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>BKP-20231024-0200</td>
                                                <td>2023-10-24 02:00:12</td>
                                                <td>Automatic (Full)</td>
                                                <td>242 MB</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-sm btn-outline-primary">Download</a>
                                                        <a href="#" class="btn btn-sm btn-outline-secondary">Restore</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>BKP-20231023-1545</td>
                                                <td>2023-10-23 15:45:33</td>
                                                <td>Manual (Config)</td>
                                                <td>18 MB</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-sm btn-outline-primary">Download</a>
                                                        <a href="#" class="btn btn-sm btn-outline-secondary">Restore</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>BKP-20231023-0200</td>
                                                <td>2023-10-23 02:00:09</td>
                                                <td>Automatic (Full)</td>
                                                <td>240 MB</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#" class="btn btn-sm btn-outline-primary">Download</a>
                                                        <a href="#" class="btn btn-sm btn-outline-secondary">Restore</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Integration -->
                    <div class="tab-pane" id="integration">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">System Integration</h3>
                            </div>
                            <div class="card-body">
                                <h4 class="mb-3">ERP Integration</h4>
                                <div class="mb-3">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">Enable ERP Integration</span>
                                    </label>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">ERP System</label>
                                                                                <select class="form-select">
                                            <option value="qalcuity" selected>Qalcuity ERP</option>
                                            <option value="sap">SAP</option>
                                            <option value="oracle">Oracle ERP</option>
                                            <option value="custom">Custom ERP</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Sync Frequency</label>
                                        <select class="form-select">
                                            <option value="realtime" selected>Real-time</option>
                                            <option value="hourly">Hourly</option>
                                            <option value="daily">Daily</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">API Endpoint</label>
                                        <input type="text" class="form-control" value="https://erp.example.com/api/v1">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">API Key</label>
                                        <input type="password" class="form-control" value="••••••••••••••••">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label class="form-label">Data to Sync</label>
                                        <div class="form-selectgroup">
                                            <label class="form-selectgroup-item">
                                                <input type="checkbox" name="sync_production" value="1" class="form-selectgroup-input" checked>
                                                <span class="form-selectgroup-label">Production Data</span>
                                            </label>
                                            <label class="form-selectgroup-item">
                                                <input type="checkbox" name="sync_inventory" value="1" class="form-selectgroup-input" checked>
                                                <span class="form-selectgroup-label">Inventory</span>
                                            </label>
                                            <label class="form-selectgroup-item">
                                                <input type="checkbox" name="sync_quality" value="1" class="form-selectgroup-input" checked>
                                                <span class="form-selectgroup-label">Quality Data</span>
                                            </label>
                                            <label class="form-selectgroup-item">
                                                <input type="checkbox" name="sync_maintenance" value="1" class="form-selectgroup-input" checked>
                                                <span class="form-selectgroup-label">Maintenance</span>
                                            </label>
                                            <label class="form-selectgroup-item">
                                                <input type="checkbox" name="sync_orders" value="1" class="form-selectgroup-input" checked>
                                                <span class="form-selectgroup-label">Orders</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="button" class="btn btn-outline-primary">
                                        <i class="ti ti-refresh me-1"></i>
                                        Test Connection
                                    </button>
                                </div>

                                <h4 class="mb-3 mt-4">Laboratory System Integration</h4>
                                <div class="mb-3">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">Enable Lab System Integration</span>
                                    </label>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Lab System</label>
                                        <select class="form-select">
                                            <option value="internal" selected>Internal Lab Module</option>
                                            <option value="lims">LIMS</option>
                                            <option value="custom">Custom Lab System</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Connection Type</label>
                                        <select class="form-select">
                                            <option value="api" selected>API</option>
                                            <option value="database">Direct Database</option>
                                            <option value="file">File Exchange</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Connection URL</label>
                                        <input type="text" class="form-control" value="https://lab.example.com/api">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Authentication</label>
                                        <select class="form-select">
                                            <option value="token" selected>API Token</option>
                                            <option value="basic">Basic Auth</option>
                                            <option value="oauth">OAuth 2.0</option>
                                        </select>
                                    </div>
                                </div>

                                <h4 class="mb-3 mt-4">IoT & Sensor Integration</h4>
                                <div class="mb-3">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">Enable IoT Integration</span>
                                    </label>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">IoT Platform</label>
                                        <select class="form-select">
                                            <option value="internal" selected>Internal IoT Gateway</option>
                                            <option value="azure">Azure IoT Hub</option>
                                            <option value="aws">AWS IoT Core</option>
                                            <option value="gcp">Google Cloud IoT</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Protocol</label>
                                        <select class="form-select">
                                            <option value="mqtt" selected>MQTT</option>
                                            <option value="http">HTTP/REST</option>
                                            <option value="modbus">Modbus</option>
                                            <option value="opc">OPC UA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Gateway IP/Hostname</label>
                                        <input type="text" class="form-control" value="192.168.1.100">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Port</label>
                                        <input type="number" class="form-control" value="1883">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Data Collection Interval</label>
                                        <select class="form-select">
                                            <option value="1">1 second</option>
                                            <option value="5" selected>5 seconds</option>
                                            <option value="10">10 seconds</option>
                                            <option value="30">30 seconds</option>
                                            <option value="60">1 minute</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Sensor Timeout</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" value="30">
                                            <span class="input-group-text">seconds</span>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="mb-3 mt-4">Mobile App Integration</h4>
                                <div class="mb-3">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked>
                                        <span class="form-check-label">Enable Mobile App Integration</span>
                                    </label>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Push Notifications</label>
                                        <select class="form-select">
                                            <option value="all" selected>All Alerts</option>
                                            <option value="critical">Critical Alerts Only</option>
                                            <option value="none">Disabled</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Mobile Data Refresh</label>
                                        <select class="form-select">
                                            <option value="realtime" selected>Real-time</option>
                                            <option value="15">Every 15 seconds</option>
                                            <option value="30">Every 30 seconds</option>
                                            <option value="60">Every minute</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">API Authentication</label>
                                        <select class="form-select">
                                            <option value="jwt" selected>JWT</option>
                                            <option value="oauth">OAuth 2.0</option>
                                            <option value="apikey">API Key</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Session Timeout</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" value="30">
                                            <span class="input-group-text">minutes</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary">Save Integration Settings</button>
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle tab navigation via URL hash
        let hash = window.location.hash;
        if (hash) {
            $('.list-group-item[href="' + hash + '"]').tab('show');
        }

        // Update URL hash when tab changes
        $('.list-group-item').on('shown.bs.tab', function (e) {
            window.location.hash = e.target.getAttribute('href');
        });
    });
</script>
@endsection




