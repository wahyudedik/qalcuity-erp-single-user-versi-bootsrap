@extends('layouts.app')

@section('title', 'Edit Maintenance Record')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Maintenance Record
                </h2>
                <div class="text-muted mt-1">Editing maintenance record MNT-2023-{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.machine-maintenance.detail', $id) }}" class="btn">
                        <i class="ti ti-eye me-2"></i>
                        View Details
                    </a>
                    <a href="{{ route('production.machine-maintenance') }}" class="btn">
                        <i class="ti ti-arrow-left me-2"></i>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <form action="#" method="post" class="card">
            <div class="card-header">
                <h3 class="card-title">Maintenance Information</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Machine</label>
                        <select class="form-select" required>
                            <option value="">Select Machine</option>
                            <option value="batch_plant_a" selected>Batch Plant A</option>
                            <option value="batch_plant_b">Batch Plant B</option>
                            <option value="mixer_1">Mixer 1</option>
                            <option value="mixer_2">Mixer 2</option>
                            <option value="concrete_pump_1">Concrete Pump 1</option>
                            <option value="concrete_pump_2">Concrete Pump 2</option>
                            <option value="conveyor_belt_a">Conveyor Belt A</option>
                            <option value="silo_1_feeder">Silo 1 Feeder</option>
                            <option value="silo_2_feeder">Silo 2 Feeder</option>
                            <option value="water_pump_system">Water Pump System</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Maintenance Type</label>
                        <select class="form-select" required>
                            <option value="">Select Type</option>
                            <option value="preventive" selected>Preventive</option>
                            <option value="corrective">Corrective</option>
                            <option value="predictive">Predictive</option>
                            <option value="routine">Routine</option>
                            <option value="emergency">Emergency</option>
                            <option value="scheduled">Scheduled</option>
                            <option value="condition_based">Condition-based</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Maintenance Date</label>
                        <input type="date" class="form-control" value="{{ date('Y-m-d', strtotime('-15 days')) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Status</label>
                        <select class="form-select" required>
                            <option value="">Select Status</option>
                            <option value="scheduled">Scheduled</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed" selected>Completed</option>
                            <option value="delayed">Delayed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Technician</label>
                        <select class="form-select" required>
                            <option value="">Select Technician</option>
                            <option value="john_smith" selected>John Smith</option>
                            <option value="maria_rodriguez">Maria Rodriguez</option>
                            <option value="ahmed_hassan">Ahmed Hassan</option>
                            <option value="li_wei">Li Wei</option>
                            <option value="external_vendor">External Vendor</option>
                            <option value="maintenance_team">Maintenance Team</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Duration (hours)</label>
                        <input type="number" class="form-control" min="0.5" step="0.5" value="4" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Cost (Rp)</label>
                        <input type="number" class="form-control" min="0" step="1000" value="2500000" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Parts Replaced</label>
                        <input type="text" class="form-control" value="Mixer Belt, Hydraulic Fluid, Filter" placeholder="Comma separated list of parts">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label required">Description</label>
                    <textarea class="form-control" rows="5" placeholder="Detailed description of maintenance activities" required>Scheduled preventive maintenance for Batch Plant A. The following tasks were performed:
- Replaced worn mixer belt with new one
- Changed hydraulic fluid and filter
- Inspected and cleaned all electrical connections
- Calibrated weighing system
- Lubricated all moving parts
- Checked and adjusted belt tension
- Tested emergency stop system

All systems are functioning properly after maintenance.</textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Recommendations</label>
                    <textarea class="form-control" rows="3" placeholder="Recommendations for future maintenance">Recommended to schedule next preventive maintenance in 3 months. Consider replacing the main drive motor within the next 6 months as it's showing signs of wear.</textarea>
                </div>
                
                <div class="mb-3">
                    <div class="form-label">Current Attachments</div>
                    <div class="row g-2">
                        <div class="col-auto">
                            <div class="card p-2">
                                <div class="d-flex align-items-center">
                                    <span class="avatar me-3 bg-primary-lt">
                                        <i class="ti ti-file-text"></i>
                                    </span>
                                    <div>
                                        <div>Maintenance Report.pdf</div>
                                        <div class="text-muted">2.4 MB</div>
                                    </div>
                                    <a href="#" class="btn btn-icon ms-auto">
                                        <i class="ti ti-x"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="card p-2">
                                <div class="d-flex align-items-center">
                                    <span class="avatar me-3 bg-primary-lt">
                                        <i class="ti ti-photo"></i>
                                    </span>
                                    <div>
                                        <div>Before Maintenance.jpg</div>
                                        <div class="text-muted">1.8 MB</div>
                                    </div>
                                    <a href="#" class="btn btn-icon ms-auto">
                                        <i class="ti ti-x"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="card p-2">
                                <div class="d-flex align-items-center">
                                    <span class="avatar me-3 bg-primary-lt">
                                        <i class="ti ti-photo"></i>
                                    </span>
                                    <div>
                                        <div>After Maintenance.jpg</div>
                                        <div class="text-muted">1.7 MB</div>
                                    </div>
                                    <a href="#" class="btn btn-icon ms-auto">
                                        <i class="ti ti-x"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-label">Add New Attachments</div>
                    <input type="file" class="form-control" multiple>
                </div>
                
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="notify-supervisor" checked>
                    <label class="form-check-label" for="notify-supervisor">
                        Notify supervisor upon completion
                    </label>
                </div>
                
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="update-inventory" checked>
                    <label class="form-check-label" for="update-inventory">
                        Update parts inventory automatically
                    </label>
                </div>
            </div>
            <div class="card-footer text-end">
                <div class="d-flex">
                    <a href="{{ route('production.machine-maintenance') }}" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary ms-auto">Update Maintenance Record</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
