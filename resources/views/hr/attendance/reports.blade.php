@extends('layouts.app')

@section('title', 'Attendance Reports')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Attendance Reports
                    </h2>
                    <div class="text-muted mt-1">Generate and analyze attendance reports</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.attendance.index') }}"
                            class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Attendance
                        </a>
                        <button type="button" class="btn btn-primary" onclick="window.print()">
                            <i class="ti ti-printer"></i>
                            Print Report
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Report Parameters</h3>
                        </div>
                        <div class="card-body">
                            <form id="report-form">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Report Type</label>
                                            <select class="form-select" name="report_type" id="report_type">
                                                <option value="daily">Daily Attendance</option>
                                                <option value="summary">Attendance Summary</option>
                                                <option value="employee">Employee Attendance</option>
                                                <option value="department">Department Attendance</option>
                                                <option value="late">Late Arrivals</option>
                                                <option value="overtime">Overtime Report</option>
                                                <option value="location">Location Based Report</option>
                                                <option value="outside_radius">Outside Radius Report</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Date Range</label>
                                            <select class="form-select" name="date_range" id="date_range">
                                                <option value="today">Today</option>
                                                <option value="yesterday">Yesterday</option>
                                                <option value="this_week" selected>This Week</option>
                                                <option value="last_week">Last Week</option>
                                                <option value="this_month">This Month</option>
                                                <option value="last_month">Last Month</option>
                                                <option value="custom">Custom Range</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Department</label>
                                            <select class="form-select" name="department">
                                                <option value="">All Departments</option>
                                                <option value="production">Production</option>
                                                <option value="finance">Finance</option>
                                                <option value="hr">HR</option>
                                                <option value="sales">Sales</option>
                                                <option value="warehouse">Warehouse</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Location</label>
                                            <select class="form-select" name="location">
                                                <option value="">All Locations</option>
                                                <option value="main_office">Main Office</option>
                                                <option value="branch_1">Branch 1</option>
                                                <option value="branch_2">Branch 2</option>
                                                <option value="remote">Remote/Work from Home</option>
                                                <option value="field">Field Work</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row custom-date-range" style="display: none;">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">From Date</label>
                                            <input type="date" class="form-control" name="from_date"
                                                value="{{ date('Y-m-01') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">To Date</label>
                                            <input type="date" class="form-control" name="to_date"
                                                value="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row employee-specific" style="display: none;">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Select Employee</label>
                                            <select class="form-select" name="employee_id">
                                                <option value="">All Employees</option>
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}">
                                                        EMP{{ str_pad($i, 4, '0', STR_PAD_LEFT) }} - Employee
                                                        {{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row location-specific" style="display: none;">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Radius Status</label>
                                            <select class="form-select" name="radius_status">
                                                <option value="">All</option>
                                                <option value="within">Within Allowed Radius</option>
                                                <option value="outside">Outside Allowed Radius</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Radius Distance (meters)</label>
                                            <select class="form-select" name="radius_distance">
                                                <option value="">All</option>
                                                <option value="100">Within 100m</option>
                                                <option value="200">Within 200m</option>
                                                <option value="500">Within 500m</option>
                                                <option value="1000">Within 1km</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ti ti-report me-1"></i>
                                            Generate Report
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Attendance Report: This Week</h3>
                            <div class="btn-group">
                                <button class="btn btn-outline-secondary btn-sm">
                                    <i class="ti ti-download me-1"></i>
                                    Excel
                                </button>
                                <button class="btn btn-outline-secondary btn-sm">
                                    <i class="ti ti-download me-1"></i>
                                    PDF
                                </button>
                                <button class="btn btn-outline-secondary btn-sm">
                                    <i class="ti ti-download me-1"></i>
                                    CSV
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-success text-white avatar">
                                                        <i class="ti ti-user-check"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        Present Rate
                                                    </div>
                                                    <div class="text-muted">
                                                        85%
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
                                                    <span class="bg-warning text-white avatar">
                                                        <i class="ti ti-clock"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        Late Rate
                                                    </div>
                                                    <div class="text-muted">
                                                        12%
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
                                                    <span class="bg-info text-white avatar">
                                                        <i class="ti ti-map-pin"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        Within Radius
                                                    </div>
                                                    <div class="text-muted">
                                                        92%
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
                                                    <span class="bg-danger text-white avatar">
                                                        <i class="ti ti-map-pin-off"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        Outside Radius
                                                    </div>
                                                    <div class="text-muted">
                                                        8%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Attendance Summary Chart -->
                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <h4>Weekly Attendance Trend</h4>
                                    <div id="attendance-chart" style="height: 250px;">
                                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                            <div>
                                                <i class="ti ti-chart-bar mb-2 d-block text-center"
                                                    style="font-size: 2rem;"></i>
                                                <span>Chart would be displayed here</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4>Attendance by Location</h4>
                                    <div id="location-chart" style="height: 250px;">
                                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                            <div>
                                                <i class="ti ti-chart-pie mb-2 d-block text-center"
                                                    style="font-size: 2rem;"></i>
                                                <span>Chart would be displayed here</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Location Map -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h4>Attendance Location Map</h4>
                                    <div id="attendance-map" style="height: 300px; border-radius: 4px;">
                                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                            <div>
                                                <i class="ti ti-map mb-2 d-block text-center"
                                                    style="font-size: 2rem;"></i>
                                                <span>Map showing attendance locations would be displayed here</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Detailed Report Table -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>Detailed Attendance Report</h4>
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th>Employee ID</th>
                                                    <th>Name</th>
                                                    <th>Department</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Clock In</th>
                                                    <th>Clock Out</th>
                                                    <th>Location</th>
                                                    <th>Radius Status</th>
                                                    <th>Working Hours</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $statuses = [
                                                        'Present',
                                                        'Late',
                                                        'Present',
                                                        'Absent',
                                                        'On Leave',
                                                        'Present',
                                                        'Field Duty',
                                                        'Present',
                                                        'Late',
                                                        'Present',
                                                    ];
                                                    $departments = [
                                                        'Production',
                                                        'Finance',
                                                        'HR',
                                                        'Sales',
                                                        'Warehouse',
                                                        'Production',
                                                        'Sales',
                                                        'Finance',
                                                        'HR',
                                                        'Production',
                                                    ];
                                                    $locations = [
                                                        'Main Office',
                                                        'Main Office',
                                                        'Branch 1',
                                                        'N/A',
                                                        'N/A',
                                                        'Main Office',
                                                        'Field Work',
                                                        'Remote',
                                                        'Main Office',
                                                        'Branch 2',
                                                    ];
                                                    $radiusStatuses = [
                                                        'Within',
                                                        'Within',
                                                        'Within',
                                                        'N/A',
                                                        'N/A',
                                                        'Within',
                                                        'Outside',
                                                        'N/A',
                                                        'Within',
                                                        'Within',
                                                    ];
                                                    $dates = [
                                                        date('Y-m-d', strtotime('-6 days')),
                                                        date('Y-m-d', strtotime('-5 days')),
                                                        date('Y-m-d', strtotime('-4 days')),
                                                        date('Y-m-d', strtotime('-3 days')),
                                                        date('Y-m-d', strtotime('-2 days')),
                                                        date('Y-m-d', strtotime('-1 days')),
                                                        date('Y-m-d'),
                                                        date('Y-m-d'),
                                                        date('Y-m-d'),
                                                        date('Y-m-d'),
                                                    ];
                                                @endphp

                                                @for ($i = 1; $i <= 10; $i++)
                                                    @php
                                                        $status = $statuses[$i - 1];
                                                        $department = $departments[$i - 1];
                                                        $location = $locations[$i - 1];
                                                        $radiusStatus = $radiusStatuses[$i - 1];
                                                        $date = $dates[$i - 1];

                                                        // Generate random clock in time between 7:00 and 9:00
                                                        $hour = rand(7, 9);
                                                        $minute = rand(0, 59);
                                                        $clockIn = sprintf('%02d:%02d', $hour, $minute);

                                                        // Generate random clock out time between 16:00 and 18:00
                                                        $hour = rand(16, 18);
                                                        $minute = rand(0, 59);
                                                        $clockOut = sprintf('%02d:%02d', $hour, $minute);

                                                        // Calculate working hours
                                                        $workingHours = rand(7, 9);

                                                        // If status is Absent or On Leave, no clock times
                                                        if ($status == 'Absent' || $status == 'On Leave') {
                                                            $clockIn = '-';
                                                            $clockOut = '-';
                                                            $workingHours = 0;
                                                        }
                                                    @endphp
                                                    <tr>
                                                        <td>EMP{{ str_pad($i, 4, '0', STR_PAD_LEFT) }}</td>
                                                        <td>Employee {{ $i }}</td>
                                                        <td>{{ $department }}</td>
                                                        <td>{{ $date }}</td>
                                                        <td>
                                                            @if ($status == 'Present')
                                                                <span class="badge bg-success">Present</span>
                                                            @elseif ($status == 'Late')
                                                                <span class="badge bg-warning">Late</span>
                                                            @elseif ($status == 'Absent')
                                                                <span class="badge bg-danger">Absent</span>
                                                            @elseif ($status == 'On Leave')
                                                                <span class="badge bg-info">On Leave</span>
                                                            @elseif ($status == 'Field Duty')
                                                                <span class="badge bg-primary">Field Duty</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $clockIn }}</td>
                                                        <td>{{ $clockOut }}</td>
                                                        <td>{{ $location }}</td>
                                                        <td>
                                                            @if ($radiusStatus == 'Within')
                                                                <span class="badge bg-success">Within Radius</span>
                                                            @elseif ($radiusStatus == 'Outside')
                                                                <span class="badge bg-warning">Outside Radius</span>
                                                            @else
                                                                <span class="badge bg-secondary">N/A</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $workingHours }} hours</td>
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Outside Radius Report Section -->
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Outside Radius Attendance Report</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h4>Outside Radius by Department</h4>
                                    <div id="outside-radius-dept-chart" style="height: 250px;">
                                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                            <div>
                                                <i class="ti ti-chart-bar mb-2 d-block text-center"
                                                    style="font-size: 2rem;"></i>
                                                <span>Chart would be displayed here</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Outside Radius Reasons</h4>
                                    <div id="outside-radius-reasons-chart" style="height: 250px;">
                                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                            <div>
                                                <i class="ti ti-chart-pie mb-2 d-block text-center"
                                                    style="font-size: 2rem;"></i>
                                                <span>Chart would be displayed here</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h4>Outside Radius Details</h4>
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th>Employee ID</th>
                                                    <th>Name</th>
                                                    <th>Department</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Location</th>
                                                    <th>Distance from Office</th>
                                                    <th>Reason Type</th>
                                                    <th>Detailed Reason</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $reasonTypes = [
                                                        'Field Duty',
                                                        'Client Visit',
                                                        'Business Trip',
                                                        'Driver Duty',
                                                        'Other',
                                                    ];
                                                    $detailedReasons = [
                                                        'Visiting client site for project inspection',
                                                        'Meeting with potential client for sales presentation',
                                                        'Attending industry conference',
                                                        'Delivering materials to construction site',
                                                        'Emergency response to equipment failure at client site',
                                                    ];
                                                    $distances = ['1.2 km', '3.5 km', '8.7 km', '2.1 km', '5.3 km'];
                                                    $statuses = [
                                                        'Approved',
                                                        'Approved',
                                                        'Pending',
                                                        'Approved',
                                                        'Rejected',
                                                    ];
                                                @endphp

                                                @for ($i = 1; $i <= 5; $i++)
                                                    @php
                                                        $empId = rand(1, 10);
                                                        $department = $departments[$empId - 1];
                                                        $date = date('Y-m-d', strtotime('-' . rand(0, 6) . ' days'));

                                                        // Generate random time
                                                        $hour = rand(8, 17);
                                                        $minute = rand(0, 59);
                                                        $time = sprintf('%02d:%02d', $hour, $minute);

                                                        $reasonType = $reasonTypes[$i - 1];
                                                        $detailedReason = $detailedReasons[$i - 1];
                                                        $distance = $distances[$i - 1];
                                                        $status = $statuses[$i - 1];
                                                    @endphp
                                                    <tr>
                                                        <td>EMP{{ str_pad($empId, 4, '0', STR_PAD_LEFT) }}</td>
                                                        <td>Employee {{ $empId }}</td>
                                                        <td>{{ $department }}</td>
                                                        <td>{{ $date }}</td>
                                                        <td>{{ $time }}</td>
                                                        <td>{{ $i % 2 == 0 ? 'Clock In' : 'Clock Out' }}</td>
                                                        <td>{{ $distance }}</td>
                                                        <td>{{ $reasonType }}</td>
                                                        <td>{{ $detailedReason }}</td>
                                                        <td>
                                                            @if ($status == 'Approved')
                                                                <span class="badge bg-success">Approved</span>
                                                            @elseif ($status == 'Pending')
                                                                <span class="badge bg-warning">Pending</span>
                                                            @elseif ($status == 'Rejected')
                                                                <span class="badge bg-danger">Rejected</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>
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
            // Show/hide custom date range based on selection
            const dateRangeSelect = document.getElementById('date_range');
            const customDateRange = document.querySelector('.custom-date-range');

            dateRangeSelect.addEventListener('change', function() {
                if (this.value === 'custom') {
                    customDateRange.style.display = 'flex';
                } else {
                    customDateRange.style.display = 'none';
                }
            });

            // Show/hide employee specific options
            const reportTypeSelect = document.getElementById('report_type');
            const employeeSpecific = document.querySelector('.employee-specific');
            const locationSpecific = document.querySelector('.location-specific');

            reportTypeSelect.addEventListener('change', function() {
                if (this.value === 'employee') {
                    employeeSpecific.style.display = 'flex';
                } else {
                    employeeSpecific.style.display = 'none';
                }

                if (this.value === 'location' || this.value === 'outside_radius') {
                    locationSpecific.style.display = 'flex';
                } else {
                    locationSpecific.style.display = 'none';
                }
            });

            // Initialize charts if needed
            // This would be where you'd add code for charts using libraries like Chart.js or ApexCharts
        });
    </script>
@endsection
