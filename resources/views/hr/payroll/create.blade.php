@extends('layouts.app')

@section('title', 'Create New Payroll Period')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Create New Payroll Period
                </h2>
                <div class="text-muted mt-1">Set up a new payroll period for processing</div>
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
                        <h3 class="card-title">Payroll Period Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">Payroll Period Name</label>
                            <input type="text" class="form-control" name="period_name" placeholder="e.g. August 2023 Payroll">
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
                                        <option value="7">July</option>
                                        <option value="8" selected>August</option>
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
                                        <input type="text" class="form-control" name="start_date" value="01-08-2023" placeholder="Start date">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control" name="end_date" value="31-08-2023" placeholder="End date">
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
                                <input type="text" class="form-control" name="payment_date" value="01-09-2023" placeholder="Payment date">
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
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Additional information about this payroll period"></textarea>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <a href="{{ route('hr.payroll.index') }}" class="btn btn-link">Cancel</a>
                            <a href="{{ route('hr.payroll.index') }}" class="btn btn-primary ms-auto">
                                <i class="ti ti-plus me-2"></i>
                                Create Payroll Period
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payroll Period Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-title">Information</h4>
                            <div class="text-muted">Creating a new payroll period is the first step in the payroll process. This will set up the framework for processing employee salaries.</div>
                        </div>
                        
                        <div class="mt-3">
                            <h4>Next Steps:</h4>
                            <ul class="list-unstyled space-y-2">
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-blue">1</span>
                                    </span>
                                    <span class="col">
                                        Create the payroll period with date range
                                    </span>
                                </li>
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-blue">2</span>
                                    </span>
                                    <span class="col">
                                        Verify attendance and leave data for the period
                                    </span>
                                </li>
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-blue">3</span>
                                    </span>
                                    <span class="col">
                                        Process payroll calculations
                                    </span>
                                </li>
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-blue">4</span>
                                    </span>
                                    <span class="col">
                                        Review and approve payroll
                                    </span>
                                </li>
                                <li class="row">
                                    <span class="col-auto">
                                        <span class="badge bg-blue">5</span>
                                    </span>
                                    <span class="col">
                                        Generate and distribute payslips
                                    </span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="mt-4">
                            <h4>Tips:</h4>
                            <ul>
                                <li>Ensure all employee data is up to date before creating a payroll period</li>
                                <li>Set the date range to match your company's pay cycle (monthly, bi-weekly, etc.)</li>
                                <li>The payment date should allow enough time for processing and approvals</li>
                                <li>You can create separate payroll periods for different branches or departments if needed</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
