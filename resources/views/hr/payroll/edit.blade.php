@extends('layouts.app')

@section('title', 'Edit Payroll Period')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Payroll Period
                </h2>
                <div class="text-muted mt-1">Modify payroll period details</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.payroll.detail', 1) }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to Details
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
                        <h3 class="card-title">Payroll Period Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">Payroll Period Name</label>
                            <input type="text" class="form-control" name="period_name" value="July 2023 Payroll">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Period Month & Year</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <select class="form-select" name="month">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7" selected>July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select class="form-select" name="year">
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
                                        <input type="text" class="form-control" name="start_date" value="01-07-2023" placeholder="Start date">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control" name="end_date" value="31-07-2023" placeholder="End date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Date</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </span>
                                <input type="text" class="form-control" name="payment_date" value="01-08-2023" placeholder="Payment date">
                            </div>
                            <small class="form-hint">Date when salaries will be paid to employees</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Branches</label>
                            <select class="form-select" name="branches">
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
                            <select class="form-select" name="departments">
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
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="draft">Draft</option>
                                <option value="processing">Processing</option>
                                <option value="processed" selected>Processed</option>
                                <option value="approved">Approved</option>
                                <option value="paid">Paid</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3">Regular monthly payroll for July 2023. Includes performance bonuses for Production team.</textarea>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <a href="{{ route('hr.payroll.detail', 1) }}" class="btn btn-link">Cancel</a>
                            <a href="{{ route('hr.payroll.detail', 1) }}" class="btn btn-primary ms-auto">
                                <i class="ti ti-device-floppy me-2"></i>
                                Save Changes
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payroll Status Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-title">Warning</h4>
                            <div class="text-muted">This payroll period has already been processed. Changing certain fields may require recalculation of payroll data.</div>
                        </div>
                        
                        <div class="mt-3">
                            <h4>Current Status: <span class="badge bg-blue">Processed</span></h4>
                            <p class="text-muted">Processed on: 01-08-2023 09:15 AM</p>
                            <p class="text-muted">Processed by: Admin User</p>
                        </div>
                        
                        <div class="mt-4">
                            <h4>Status Definitions:</h4>
                            <ul class="list-unstyled space-y-2">
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-secondary">Draft</span>
                                    </span>
                                    <span class="col">
                                        Initial setup, not yet processed
                                    </span>
                                </li>
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-info">Processing</span>
                                    </span>
                                    <span class="col">
                                        Calculations in progress
                                    </span>
                                </li>
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-blue">Processed</span>
                                    </span>
                                    <span class="col">
                                        Calculations complete, awaiting approval
                                    </span>
                                </li>
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-green">Approved</span>
                                    </span>
                                    <span class="col">
                                        Approved for payment
                                    </span>
                                </li>
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-purple">Paid</span>
                                    </span>
                                    <span class="col">
                                        Payment has been disbursed
                                    </span>
                                </li>
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-dark">Closed</span>
                                    </span>
                                    <span class="col">
                                        Period closed, no further changes allowed
                                    </span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="mt-4">
                            <h4>Actions Available:</h4>
                            <div class="btn-list">
                                <button type="button" class="btn btn-warning">
                                    <i class="ti ti-refresh me-1"></i>
                                    Recalculate Payroll
                                </button>
                                <button type="button" class="btn btn-success">
                                    <i class="ti ti-check me-1"></i>
                                    Approve Payroll
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
