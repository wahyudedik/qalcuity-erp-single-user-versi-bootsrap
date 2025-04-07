@extends('layouts.app')

@section('title', 'Leave Reports')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Leave Reports
                    </h2>
                    <div class="text-muted mt-1">Generate and view leave reports</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.leave.index') }}" class="btn btn-outline-secondary">
                            <i class="ti ti-arrow-left"></i>
                            Back to Leave List
                        </a>
                        <button type="button" class="btn btn-primary" onclick="window.print()">
                            <i class="ti ti-printer"></i>
                            Print Report
                        </button>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="ti ti-download"></i>
                                Export
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-file-spreadsheet me-2"></i>
                                    Excel
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-file-text me-2"></i>
                                    CSV
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-file-pdf me-2"></i>
                                    PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Report Filters</h3>
            </div>
            <div class="card-body">
                <form action="#" method="GET" id="reportFilterForm">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Report Type</label>
                            <select class="form-select" name="report_type" id="reportType">
                                <option value="summary">Leave Summary</option>
                                <option value="detailed">Detailed Leave Report</option>
                                <option value="department">Department Leave Analysis</option>
                                <option value="balance">Leave Balance Report</option>
                                <option value="pending">Pending Approvals Report</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Department</label>
                            <select class="form-select" name="department">
                                <option value="">All Departments</option>
                                <option value="production">Production</option>
                                <option value="finance">Finance</option>
                                <option value="hr">Human Resources</option>
                                <option value="sales">Sales</option>
                                <option value="warehouse">Warehouse</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Leave Type</label>
                            <select class="form-select" name="leave_type">
                                <option value="">All Leave Types</option>
                                <option value="annual">Annual Leave</option>
                                <option value="sick">Sick Leave</option>
                                <option value="maternity">Maternity/Paternity Leave</option>
                                <option value="unpaid">Unpaid Leave</option>
                                <option value="other">Other Leave</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="">All Statuses</option>
                                <option value="approved">Approved</option>
                                <option value="pending">Pending</option>
                                <option value="rejected">Rejected</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Date Range</label>
                            <select class="form-select" name="date_range" id="dateRange">
                                <option value="this_month">This Month</option>
                                <option value="last_month">Last Month</option>
                                <option value="this_quarter">This Quarter</option>
                                <option value="last_quarter">Last Quarter</option>
                                <option value="this_year">This Year</option>
                                <option value="last_year">Last Year</option>
                                <option value="custom">Custom Range</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3" id="startDateContainer" style="display: none;">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <div class="col-md-3 mb-3" id="endDateContainer" style="display: none;">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date">
                        </div>
                        <div class="col-md-3 mb-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="ti ti-filter me-1"></i>
                                Generate Report
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Summary Report -->
        <div class="card mt-3" id="summaryReport">
            <div class="card-header">
                <h3 class="card-title">Leave Summary Report</h3>
                <div class="card-subtitle">
                    Period: July 2023
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body p-3 text-center">
                                <div class="text-end text-green">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        8% <i class="ti ti-trending-up ms-1"></i>
                                    </span>
                                </div>
                                <div class="h1 m-0">42</div>
                                <div class="text-muted mb-3">Total Leave Requests</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body p-3 text-center">
                                <div class="text-end text-green">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        5% <i class="ti ti-trending-up ms-1"></i>
                                    </span>
                                </div>
                                <div class="h1 m-0">35</div>
                                <div class="text-muted mb-3">Approved Leaves</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body p-3 text-center">
                                <div class="text-end text-yellow">
                                    <span class="text-yellow d-inline-flex align-items-center lh-1">
                                        0% <i class="ti ti-minus ms-1"></i>
                                    </span>
                                </div>
                                <div class="h1 m-0">5</div>
                                <div class="text-muted mb-3">Pending Approvals</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body p-3 text-center">
                                <div class="text-end text-red">
                                    <span class="text-red d-inline-flex align-items-center lh-1">
                                        2% <i class="ti ti-trending-down ms-1"></i>
                                    </span>
                                </div>
                                <div class="h1 m-0">2</div>
                                <div class="text-muted mb-3">Rejected Leaves</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h4>Leave Distribution by Type</h4>
                        <div class="chart-lg" id="leaveTypeChart"></div>
                    </div>
                    <div class="col-md-6">
                        <h4>Leave Distribution by Department</h4>
                        <div class="chart-lg" id="departmentChart"></div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <h4>Monthly Leave Trend</h4>
                        <div class="chart-lg" id="monthlyTrendChart"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Report -->
        <div class="card mt-3" id="detailedReport" style="display: none;">
            <div class="card-header">
                <h3 class="card-title">Detailed Leave Report</h3>
                <div class="card-subtitle">
                    Period: July 2023
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Department</th>
                                <th>Leave Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Duration</th>
                                <th>Status</th>
                                <th>Approved By</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $leaveData = [
                                    [
                                        'employee' => 'John Doe',
                                        'department' => 'Production',
                                        'leave_type' => 'Annual Leave',
                                        'start_date' => '2023-07-10',
                                        'end_date' => '2023-07-15',
                                        'duration' => '5 days',
                                        'status' => 'Approved',
                                        'approved_by' => 'Jane Smith',
                                    ],
                                    [
                                        'employee' => 'Jane Smith',
                                        'department' => 'Finance',
                                        'leave_type' => 'Sick Leave',
                                        'start_date' => '2023-07-05',
                                        'end_date' => '2023-07-06',
                                        'duration' => '2 days',
                                        'status' => 'Approved',
                                        'approved_by' => 'Robert Johnson',
                                    ],
                                    [
                                        'employee' => 'Emily Davis',
                                        'department' => 'Human Resources',
                                        'leave_type' => 'Maternity Leave',
                                        'start_date' => '2023-06-15',
                                        'end_date' => '2023-09-13',
                                        'duration' => '90 days',
                                        'status' => 'Approved',
                                        'approved_by' => 'Michael Wilson',
                                    ],
                                    [
                                        'employee' => 'Michael Wilson',
                                        'department' => 'Warehouse',
                                        'leave_type' => 'Unpaid Leave',
                                        'start_date' => '2023-07-20',
                                        'end_date' => '2023-07-30',
                                        'duration' => '10 days',
                                        'status' => 'Pending',
                                        'approved_by' => '-',
                                    ],
                                    [
                                        'employee' => 'Robert Johnson',
                                        'department' => 'Sales',
                                        'leave_type' => 'Bereavement Leave',
                                        'start_date' => '2023-07-25',
                                        'end_date' => '2023-07-27',
                                        'duration' => '3 days',
                                        'status' => 'Approved',
                                        'approved_by' => 'Michael Wilson',
                                    ],
                                    [
                                        'employee' => 'Alex Brown',
                                        'department' => 'Production',
                                        'leave_type' => 'Annual Leave',
                                        'start_date' => '2023-07-17',
                                        'end_date' => '2023-07-21',
                                        'duration' => '5 days',
                                        'status' => 'Approved',
                                        'approved_by' => 'Jane Smith',
                                    ],
                                    [
                                        'employee' => 'Sarah Miller',
                                        'department' => 'Finance',
                                        'leave_type' => 'Sick Leave',
                                        'start_date' => '2023-07-03',
                                        'end_date' => '2023-07-03',
                                        'duration' => '1 day',
                                        'status' => 'Approved',
                                        'approved_by' => 'Robert Johnson',
                                    ],
                                    [
                                        'employee' => 'David Clark',
                                        'department' => 'Sales',
                                        'leave_type' => 'Annual Leave',
                                        'start_date' => '2023-07-24',
                                        'end_date' => '2023-07-28',
                                        'duration' => '5 days',
                                        'status' => 'Rejected',
                                        'approved_by' => 'Robert Johnson',
                                    ],
                                    [
                                        'employee' => 'Lisa White',
                                        'department' => 'Human Resources',
                                        'leave_type' => 'Annual Leave',
                                        'start_date' => '2023-07-31',
                                        'end_date' => '2023-08-04',
                                        'duration' => '5 days',
                                        'status' => 'Pending',
                                        'approved_by' => '-',
                                    ],
                                    [
                                        'employee' => 'Kevin Moore',
                                        'department' => 'Warehouse',
                                        'leave_type' => 'Sick Leave',
                                        'start_date' => '2023-07-13',
                                        'end_date' => '2023-07-14',
                                        'duration' => '2 days',
                                        'status' => 'Approved',
                                        'approved_by' => 'Michael Wilson',
                                    ],
                                ];
                            @endphp

                            @foreach ($leaveData as $leave)
                                <tr>
                                    <td>{{ $leave['employee'] }}</td>
                                    <td>{{ $leave['department'] }}</td>
                                    <td>{{ $leave['leave_type'] }}</td>
                                    <td>{{ $leave['start_date'] }}</td>
                                    <td>{{ $leave['end_date'] }}</td>
                                    <td>{{ $leave['duration'] }}</td>
                                    <td>
                                        @if ($leave['status'] == 'Approved')
                                            <span class="badge bg-success">Approved</span>
                                        @elseif($leave['status'] == 'Pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($leave['status'] == 'Rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $leave['status'] }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $leave['approved_by'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Department Report -->
        <div class="card mt-3" id="departmentReport" style="display: none;">
            <div class="card-header">
                <h3 class="card-title">Department Leave Analysis</h3>
                <div class="card-subtitle">
                    Period: July 2023
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h4>Leave Distribution by Department</h4>
                        <div class="chart-lg" id="departmentDistributionChart"></div>
                    </div>
                    <div class="col-md-6">
                        <h4>Department Absence Rate</h4>
                        <div class="chart-lg" id="departmentAbsenceChart"></div>
                    </div>
                </div>

                <div class="table-responsive mt-4">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>Department</th>
                                <th>Total Employees</th>
                                <th>Leave Requests</th>
                                <th>Days Taken</th>
                                <th>Absence Rate</th>
                                <th>Most Common Leave</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Production</td>
                                <td>25</td>
                                <td>12</td>
                                <td>45</td>
                                <td>6.2%</td>
                                <td>Annual Leave</td>
                            </tr>
                            <tr>
                                <td>Finance</td>
                                <td>15</td>
                                <td>8</td>
                                <td>22</td>
                                <td>5.1%</td>
                                <td>Sick Leave</td>
                            </tr>
                            <tr>
                                <td>Human Resources</td>
                                <td>10</td>
                                <td>7</td>
                                <td>98</td>
                                <td>33.8%</td>
                                <td>Maternity Leave</td>
                            </tr>
                            <tr>
                                <td>Sales</td>
                                <td>18</td>
                                <td>9</td>
                                <td>32</td>
                                <td>6.1%</td>
                                <td>Annual Leave</td>
                            </tr>
                            <tr>
                                <td>Warehouse</td>
                                <td>22</td>
                                <td>6</td>
                                <td>18</td>
                                <td>2.8%</td>
                                <td>Sick Leave</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Leave Balance Report -->
        <div class="card mt-3" id="balanceReport" style="display: none;">
            <div class="card-header">
                <h3 class="card-title">Leave Balance Report</h3>
                <div class="card-subtitle">
                    As of July 31, 2023
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Department</th>
                                <th>Annual Leave</th>
                                <th>Sick Leave</th>
                                <th>Other Leave</th>
                                <th>Total Taken</th>
                                <th>Remaining Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>Production</td>
                                <td>5/20 days</td>
                                <td>2/14 days</td>
                                <td>0/5 days</td>
                                <td>7 days</td>
                                <td>32 days</td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>Finance</td>
                                <td>0/20 days</td>
                                <td>2/14 days</td>
                                <td>0/5 days</td>
                                <td>2 days</td>
                                <td>37 days</td>
                            </tr>
                            <tr>
                                <td>Emily Davis</td>
                                <td>Human Resources</td>
                                <td>0/20 days</td>
                                <td>0/14 days</td>
                                <td>90/90 days</td>
                                <td>90 days</td>
                                <td>34 days</td>
                            </tr>
                            <tr>
                                <td>Michael Wilson</td>
                                <td>Warehouse</td>
                                <td>0/20 days</td>
                                <td>0/14 days</td>
                                <td>10/10 days</td>
                                <td>10 days</td>
                                <td>34 days</td>
                            </tr>
                            <tr>
                                <td>Robert Johnson</td>
                                <td>Sales</td>
                                <td>0/20 days</td>
                                <td>0/14 days</td>
                                <td>3/5 days</td>
                                <td>3 days</td>
                                <td>36 days</td>
                            </tr>
                            <tr>
                                <td>Alex Brown</td>
                                <td>Production</td>
                                <td>5/20 days</td>
                                <td>0/14 days</td>
                                <td>0/5 days</td>
                                <td>5 days</td>
                                <td>34 days</td>
                            </tr>
                            <tr>
                                <td>Sarah Miller</td>
                                <td>Finance</td>
                                <td>0/20 days</td>
                                <td>1/14 days</td>
                                <td>0/5 days</td>
                                <td>1 day</td>
                                <td>38 days</td>
                            </tr>
                            <tr>
                                <td>David Clark</td>
                                <td>Sales</td>
                                <td>0/20 days</td>
                                <td>0/14 days</td>
                                <td>0/5 days</td>
                                <td>0 days</td>
                                <td>39 days</td>
                            </tr>
                            <tr>
                                <td>Lisa White</td>
                                <td>Human Resources</td>
                                <td>0/20 days</td>
                                <td>0/14 days</td>
                                <td>0/5 days</td>
                                <td>0 days</td>
                                <td>39 days</td>
                            </tr>
                            <tr>
                                <td>Kevin Moore</td>
                                <td>Warehouse</td>
                                <td>0/20 days</td>
                                <td>2/14 days</td>
                                <td>0/5 days</td>
                                <td>2 days</td>
                                <td>37 days</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pending Approvals Report -->
        <div class="card mt-3" id="pendingReport" style="display: none;">
            <div class="card-header">
                <h3 class="card-title">Pending Approvals Report</h3>
                <div class="card-subtitle">
                    As of July 31, 2023
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>Employee</th>
                                <th>Department</th>
                                <th>Leave Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Duration</th>
                                <th>Requested On</th>
                                <th>Pending With</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Michael Wilson</td>
                                <td>Warehouse</td>
                                <td>Unpaid Leave</td>
                                <td>2023-07-20</td>
                                <td>2023-07-30</td>
                                <td>10 days</td>
                                <td>2023-07-05</td>
                                <td>Robert Johnson</td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="#" class="btn btn-sm btn-success">Approve</a>
                                        <a href="#" class="btn btn-sm btn-danger">Reject</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Lisa White</td>
                                <td>Human Resources</td>
                                <td>Annual Leave</td>
                                <td>2023-07-31</td>
                                <td>2023-08-04</td>
                                <td>5 days</td>
                                <td>2023-07-10</td>
                                <td>Emily Davis</td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="#" class="btn btn-sm btn-success">Approve</a>
                                        <a href="#" class="btn btn-sm btn-danger">Reject</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>John Smith</td>
                                <td>Production</td>
                                <td>Sick Leave</td>
                                <td>2023-08-01</td>
                                <td>2023-08-02</td>
                                <td>2 days</td>
                                <td>2023-07-28</td>
                                <td>Jane Smith</td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="#" class="btn btn-sm btn-success">Approve</a>
                                        <a href="#" class="btn btn-sm btn-danger">Reject</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Sarah Miller</td>
                                <td>Finance</td>
                                <td>Annual Leave</td>
                                <td>2023-08-07</td>
                                <td>2023-08-11</td>
                                <td>5 days</td>
                                <td>2023-07-20</td>
                                <td>Robert Johnson</td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="#" class="btn btn-sm btn-success">Approve</a>
                                        <a href="#" class="btn btn-sm btn-danger">Reject</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kevin Moore</td>
                                <td>Warehouse</td>
                                <td>Annual Leave</td>
                                <td>2023-08-14</td>
                                <td>2023-08-18</td>
                                <td>5 days</td>
                                <td>2023-07-25</td>
                                <td>Michael Wilson</td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="#" class="btn btn-sm btn-success">Approve</a>
                                        <a href="#" class="btn btn-sm btn-danger">Reject</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle report type change
            const reportType = document.getElementById('reportType');
            reportType.addEventListener('change', function() {
                // Hide all reports
                document.getElementById('summaryReport').style.display = 'none';
                document.getElementById('detailedReport').style.display = 'none';
                document.getElementById('departmentReport').style.display = 'none';
                document.getElementById('balanceReport').style.display = 'none';
                document.getElementById('pendingReport').style.display = 'none';

                // Show selected report
                switch (this.value) {
                    case 'summary':
                        document.getElementById('summaryReport').style.display = 'block';
                        break;
                    case 'detailed':
                        document.getElementById('detailedReport').style.display = 'block';
                        break;
                    case 'department':
                        document.getElementById('departmentReport').style.display = 'block';
                        break;
                    case 'balance':
                        document.getElementById('balanceReport').style.display = 'block';
                        break;
                    case 'pending':
                        document.getElementById('pendingReport').style.display = 'block';
                        break;
                }
            });

            // Handle date range change
            const dateRange = document.getElementById('dateRange');
            const startDateContainer = document.getElementById('startDateContainer');
            const endDateContainer = document.getElementById('endDateContainer');

            dateRange.addEventListener('change', function() {
                if (this.value === 'custom') {
                    startDateContainer.style.display = 'block';
                    endDateContainer.style.display = 'block';
                } else {
                    startDateContainer.style.display = 'none';
                    endDateContainer.style.display = 'none';
                }
            });

            // Initialize charts
            // Leave Type Chart
            const leaveTypeOptions = {
                series: [25, 15, 5, 10, 5],
                chart: {
                    type: 'pie',
                    height: 300
                },
                labels: ['Annual Leave', 'Sick Leave', 'Maternity/Paternity', 'Unpaid Leave', 'Other'],
                colors: ['#0061f2', '#39b54a', '#e83e8c', '#17a2b8', '#fd7e14'],
                legend: {
                    position: 'bottom'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            const leaveTypeChart = new ApexCharts(document.querySelector("#leaveTypeChart"), leaveTypeOptions);
            leaveTypeChart.render();

            // Department Chart
            const departmentOptions = {
                series: [12, 8, 7, 9, 6],
                chart: {
                    type: 'pie',
                    height: 300
                },
                labels: ['Production', 'Finance', 'Human Resources', 'Sales', 'Warehouse'],
                colors: ['#0061f2', '#39b54a', '#e83e8c', '#17a2b8', '#fd7e14'],
                legend: {
                    position: 'bottom'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            const departmentChart = new ApexCharts(document.querySelector("#departmentChart"), departmentOptions);
            departmentChart.render();

            // Monthly Trend Chart
            const monthlyTrendOptions = {
                series: [{
                    name: 'Annual Leave',
                    data: [3, 4, 6, 8, 10, 12, 15]
                }, {
                    name: 'Sick Leave',
                    data: [5, 6, 4, 3, 5, 7, 8]
                }, {
                    name: 'Other Leave',
                    data: [1, 2, 3, 2, 3, 4, 5]
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: true,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                },
                yaxis: {
                    title: {
                        text: 'Number of Leave Requests'
                    }
                },
                fill: {
                    opacity: 1,
                    colors: ['#0061f2', '#39b54a', '#fd7e14']
                },
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " requests"
                        }
                    }
                }
            };

            const monthlyTrendChart = new ApexCharts(document.querySelector("#monthlyTrendChart"),
                monthlyTrendOptions);
            monthlyTrendChart.render();

            // Department Distribution Chart
            const departmentDistributionOptions = {
                series: [{
                    name: 'Leave Requests',
                    data: [12, 8, 7, 9, 6]
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Production', 'Finance', 'Human Resources', 'Sales', 'Warehouse'],
                },
                yaxis: {
                    title: {
                        text: 'Number of Leave Requests'
                    }
                },
                fill: {
                    opacity: 1,
                    colors: ['#0061f2']
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " requests"
                        }
                    }
                }
            };

            const departmentDistributionChart = new ApexCharts(document.querySelector(
                "#departmentDistributionChart"), departmentDistributionOptions);
            departmentDistributionChart.render();

            // Department Absence Chart
            const departmentAbsenceOptions = {
                series: [{
                    name: 'Absence Rate',
                    data: [6.2, 5.1, 33.8, 6.1, 2.8]
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Production', 'Finance', 'Human Resources', 'Sales', 'Warehouse'],
                },
                yaxis: {
                    title: {
                        text: 'Absence Rate (%)'
                    }
                },
                fill: {
                    opacity: 1,
                    colors: ['#e83e8c']
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + "%"
                        }
                    }
                }
            };

            const departmentAbsenceChart = new ApexCharts(document.querySelector("#departmentAbsenceChart"),
                departmentAbsenceOptions);
            departmentAbsenceChart.render();
        });
    </script>
@endsection
