@extends('layouts.app')

@section('title', 'Process Payroll')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Process Payroll
                </h2>
                <div class="text-muted mt-1">Generate payroll for a specific period</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.payroll.index') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to Payroll
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8">
                <form class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payroll Processing Parameters</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">Payroll Period</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <select class="form-select">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8" selected>August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select class="form-select">
                                        <option value="2022">2022</option>
                                        <option value="2023" selected>2023</option>
                                        <option value="2024">2024</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Date Range</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control" value="01-08-2023" placeholder="Start date">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control" value="31-08-2023" placeholder="End date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Branches</label>
                            <select class="form-select">
                                <option value="all" selected>All Branches</option>
                                <option value="1">Jakarta Branch</option>
                                <option value="2">Bandung Branch</option>
                                <option value="3">Surabaya Branch</option>
                                <option value="4">Medan Branch</option>
                                <option value="5">Makassar Branch</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Departments</label>
                            <select class="form-select">
                                <option value="all" selected>All Departments</option>
                                <option value="1">Production</option>
                                <option value="2">Quality Control</option>
                                <option value="3">Logistics</option>
                                <option value="4">Finance</option>
                                <option value="5">HR</option>
                                <option value="6">Sales</option>
                                <option value="7">Maintenance</option>
                                <option value="8">Laboratory</option>
                                <option value="9">Warehouse</option>
                                <option value="10">Administration</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Include Components</label>
                            <div class="form-selectgroup">
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="component[]" value="basic" class="form-selectgroup-input" checked>
                                    <span class="form-selectgroup-label">Basic Salary</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="component[]" value="allowances" class="form-selectgroup-input" checked>
                                    <span class="form-selectgroup-label">Allowances</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="component[]" value                                ="overtime" class="form-selectgroup-input" checked>
                                    <span class="form-selectgroup-label">Overtime</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="component[]" value="bonus" class="form-selectgroup-input" checked>
                                    <span class="form-selectgroup-label">Bonuses</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="component[]" value="deductions" class="form-selectgroup-input" checked>
                                    <span class="form-selectgroup-label">Deductions</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="component[]" value="tax" class="form-selectgroup-input" checked>
                                    <span class="form-selectgroup-label">Tax</span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Processing Options</label>
                            <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                                <label class="form-selectgroup-item flex-fill">
                                    <input type="checkbox" name="options[]" value="attendance" class="form-selectgroup-input" checked>
                                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                                        <div class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </div>
                                        <div>
                                            <span class="avatar me-2 bg-blue-lt">
                                                <i class="ti ti-calendar-time"></i>
                                            </span>
                                        </div>
                                        <div class="form-selectgroup-label-content d-flex flex-fill align-items-center">
                                            <div>
                                                <div class="font-weight-medium">Include Attendance Data</div>
                                                <div class="text-muted">Calculate salary based on attendance records</div>
                                            </div>
                                            <div class="ms-auto text-muted">
                                                Recommended
                                            </div>
                                        </div>
                                    </div>
                                </label>
                                <label class="form-selectgroup-item flex-fill">
                                    <input type="checkbox" name="options[]" value="leave" class="form-selectgroup-input" checked>
                                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                                        <div class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </div>
                                        <div>
                                            <span class="avatar me-2 bg-green-lt">
                                                <i class="ti ti-calendar-off"></i>
                                            </span>
                                        </div>
                                        <div class="form-selectgroup-label-content d-flex flex-fill align-items-center">
                                            <div>
                                                <div class="font-weight-medium">Include Leave Data</div>
                                                <div class="text-muted">Apply leave deductions and paid leave</div>
                                            </div>
                                            <div class="ms-auto text-muted">
                                                Recommended
                                            </div>
                                        </div>
                                    </div>
                                </label>
                                <label class="form-selectgroup-item flex-fill">
                                    <input type="checkbox" name="options[]" value="overtime" class="form-selectgroup-input" checked>
                                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                                        <div class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </div>
                                        <div>
                                            <span class="avatar me-2 bg-yellow-lt">
                                                <i class="ti ti-clock"></i>
                                            </span>
                                        </div>
                                        <div class="form-selectgroup-label-content d-flex flex-fill align-items-center">
                                            <div>
                                                <div class="font-weight-medium">Include Overtime</div>
                                                <div class="text-muted">Calculate overtime based on approved records</div>
                                            </div>
                                            <div class="ms-auto text-muted">
                                                Recommended
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Additional Notes</div>
                            <textarea class="form-control" rows="3" placeholder="Any special instructions for this payroll run"></textarea>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <a href="{{ route('hr.payroll.index') }}" class="btn btn-link">Cancel</a>
                            <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modal-confirm-process">
                                <i class="ti ti-calculator me-2"></i>
                                Process Payroll
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Processing Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-title">Important Information</h4>
                            <div class="text-muted">Processing payroll will calculate salaries for all eligible employees based on the parameters you set.</div>
                        </div>
                        
                        <div class="mt-3">
                            <h4>What will happen:</h4>
                            <ul class="list-unstyled space-y-2">
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-blue">1</span>
                                    </span>
                                    <span class="col">
                                        System will gather attendance data for the selected period
                                    </span>
                                </li>
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-blue">2</span>
                                    </span>
                                    <span class="col">
                                        Calculate basic salary based on working days
                                    </span>
                                </li>
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-blue">3</span>
                                    </span>
                                    <span class="col">
                                        Apply allowances and deductions as per employee structure
                                    </span>
                                </li>
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-blue">4</span>
                                    </span>
                                    <span class="col">
                                        Calculate overtime based on approved overtime records
                                    </span>
                                </li>
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-blue">5</span>
                                    </span>
                                    <span class="col">
                                        Apply tax calculations as per tax settings
                                    </span>
                                </li>
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-blue">6</span>
                                    </span>
                                    <span class="col">
                                        Generate payroll summary and individual payslips
                                    </span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="mt-4">
                            <h4>Pre-processing Checklist:</h4>
                            <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                                <label class="form-selectgroup-item flex-fill">
                                    <input type="checkbox" name="checklist[]" value="attendance" class="form-selectgroup-input" checked>
                                    <div class="form-selectgroup-label d-flex align-items-center p-2">
                                        <div class="me-2">
                                            <span class="form-selectgroup-check"></span>
                                        </div>
                                        <div>
                                            <div class="font-weight-medium">Attendance data is up to date</div>
                                        </div>
                                    </div>
                                </label>
                                <label class="form-selectgroup-item flex-fill">
                                    <input type="checkbox" name="checklist[]" value="leave" class="form-selectgroup-input" checked>
                                    <div class="form-selectgroup-label d-flex align-items-center p-2">
                                        <div class="me-2">
                                            <span class="form-selectgroup-check"></span>
                                        </div>
                                        <div>
                                            <div class="font-weight-medium">Leave applications are approved</div>
                                        </div>
                                    </div>
                                </label>
                                <label class="form-selectgroup-item flex-fill">
                                    <input type="checkbox" name="checklist[]" value="overtime" class="form-selectgroup-input" checked>
                                    <div class="form-selectgroup-label d-flex align-items-center p-2">
                                        <div class="me-2">
                                            <span class="form-selectgroup-check"></span>
                                        </div>
                                        <div>
                                            <div class="font-weight-medium">Overtime records are approved</div>
                                        </div>
                                    </div>
                                </label>
                                <label class="form-selectgroup-item flex-fill">
                                    <input type="checkbox" name="checklist[]" value="components" class="form-selectgroup-input" checked>
                                    <div class="form-selectgroup-label d-flex align-items-center p-2">
                                        <div class="me-2">
                                            <span class="form-selectgroup-check"></span>
                                        </div>
                                        <div>
                                            <div class="font-weight-medium">Salary components are configured</div>
                                        </div>
                                    </div>
                                </label>
                                <label class="form-selectgroup-item flex-fill">
                                    <input type="checkbox" name="checklist[]" value="tax" class="form-selectgroup-input" checked>
                                    <div class="form-selectgroup-label d-flex align-items-center p-2">
                                        <div class="me-2">
                                            <span class="form-selectgroup-check"></span>
                                        </div>
                                        <div>
                                            <div class="font-weight-medium">Tax settings are up to date</div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal modal-blur fade" id="modal-confirm-process" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Payroll Processing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <i class="ti ti-alert-triangle icon-lg text-warning"></i>
                    <h3 class="mt-3">Are you sure?</h3>
                    <div class="text-muted">You are about to process payroll for August 2023. This action will calculate salaries for all eligible employees.</div>
                </div>
                <div class="alert alert-warning" role="alert">
                    <div class="d-flex">
                        <div>
                            <i class="ti ti-alert-circle"></i>
                        </div>
                        <div class="ms-2">
                            <div class="text-muted">This process may take several minutes to complete. Please do not close your browser during processing.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <a href="{{ route('hr.payroll.detail', 1) }}" class="btn btn-primary ms-auto">
                    <i class="ti ti-check me-2"></i>
                    Yes, Process Payroll
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

