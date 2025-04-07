@extends('layouts.app')

@section('title', 'Attendance Management')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Attendance Management
                </h2>
                <div class="text-muted mt-1">Manage employee attendance records</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.attendance.reports') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                        <i class="ti ti-report"></i>
                        Reports
                    </a>
                    <a href="{{ route('hr.attendance.bulk-entry') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                        <i class="ti ti-list-check"></i>
                        Bulk Entry
                    </a>
                    <a href="{{ route('hr.attendance.import') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-upload"></i>
                        Import
                    </a>
                    <a href="{{ route('hr.attendance.export') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-download"></i>
                        Export
                    </a>
                    <a href="{{ route('hr.attendance.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-plus"></i>
                        Add New Record
                    </a>
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
                        <h3 class="card-title">Attendance Overview</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
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
                                                    Present Today
                                                </div>
                                                <div class="text-muted">
                                                    42 employees
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
                                                    Late Today
                                                </div>
                                                <div class="text-muted">
                                                    8 employees
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
                                                    <i class="ti ti-user-off"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Absent Today
                                                </div>
                                                <div class="text-muted">
                                                    3 employees
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
                                                    <i class="ti ti-calendar-off"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    On Leave
                                                </div>
                                                <div class="text-muted">
                                                    5 employees
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
            
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Attendance Filter</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Date Range</label>
                                        <select class="form-select" name="date_range" id="date_range">
                                            <option value="today" selected>Today</option>
                                            <option value="yesterday">Yesterday</option>
                                            <option value="this_week">This Week</option>
                                            <option value="last_week">Last Week</option>
                                            <option value="this_month">This Month</option>
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
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="">All Statuses</option>
                                            <option value="present">Present</option>
                                            <option value="late">Late</option>
                                            <option value="absent">Absent</option>
                                            <option value="on_leave">On Leave</option>
                                            <option value="half_day">Half Day</option>
                                            <option value="field_duty">Field Duty</option>
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
                                        <input type="date" class="form-control" name="from_date" value="{{ date('Y-m-01') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">To Date</label>
                                        <input type="date" class="form-control" name="to_date" value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Search</label>
                                        <input type="text" class="form-control" name="search" placeholder="Search by employee name or ID">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Location Radius</label>
                                        <select class="form-select" name="radius_filter">
                                            <option value="">All</option>
                                            <option value="within">Within Allowed Radius</option>
                                            <option value="outside">Outside Allowed Radius</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <div class="mb-3 w-100">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="ti ti-filter me-1"></i>
                                            Apply Filters
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Attendance Records</h3>
                    </div>
                    <div class="card-body border-bottom py-3">
                        <div class="d-flex">
                            <div class="text-muted">
                                Show
                                <div class="mx-2 d-inline-block">
                                    <select class="form-select form-select-sm" name="page_size">
                                        <option value="10">10</option>
                                        <option value="25" selected>25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                entries
                            </div>
                            <div class="ms-auto text-muted">
                                <div class="ms-2 d-inline-block">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-outline-secondary active">Today</button>
                                        <button type="button" class="btn btn-outline-secondary">This Week</button>
                                        <button type="button" class="btn btn-outline-secondary">This Month</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $statuses = ['Present', 'Late', 'Present', 'Absent', 'On Leave', 'Present', 'Field Duty', 'Present', 'Late', 'Present'];
                                    $departments = ['Production', 'Finance', 'HR', 'Sales', 'Warehouse', 'Production', 'Sales', 'Finance', 'HR', 'Production'];
                                    $locations = ['Main Office', 'Main Office', 'Branch 1', 'N/A', 'N/A', 'Main Office', 'Field Work', 'Remote', 'Main Office', 'Branch 2'];
                                    $radiusStatuses = ['Within', 'Within', 'Within', 'N/A', 'N/A', 'Within', 'Outside', 'N/A', 'Within', 'Within'];
                                @endphp
                                
                                @for ($i = 1; $i <= 10; $i++)
                                    @php
                                        $status = $statuses[$i-1];
                                        $department = $departments[$i-1];
                                        $location = $locations[$i-1];
                                        $radiusStatus = $radiusStatuses[$i-1];
                                        
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
                                        <td>{{ date('Y-m-d') }}</td>
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
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('hr.attendance.detail', $i) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                    {{-- View --}}
                                                </a>
                                                <a href="{{ route('hr.attendance.edit', $i) }}" class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                    {{-- Edit --}}
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Showing <span>1</span> to <span>10</span> of <span>58</span> entries</p>
                        <ul class="pagination m-0 ms-auto">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="ti ti-chevron-left"></i>
                                    prev
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    next
                                    <i class="ti ti-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
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
    });
</script>
@endsection

