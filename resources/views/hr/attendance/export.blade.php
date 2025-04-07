@extends('layouts.app')

@section('title', 'Export Attendance')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Export Attendance Data
                    </h2>
                    <div class="text-muted mt-1">Download attendance records in various formats</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.attendance.index') }}"
                            class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Attendance
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
                            <h3 class="card-title">Export Options</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Export Format</label>
                                            <select class="form-select" name="export_format">
                                                <option value="excel">Excel (.xlsx)</option>
                                                <option value="csv">CSV (.csv)</option>
                                                <option value="pdf">PDF (.pdf)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Date Range</label>
                                            <select class="form-select" name="date_range" id="date_range">
                                                <option value="current_month">Current Month</option>
                                                <option value="last_month">Last Month</option>
                                                <option value="current_quarter">Current Quarter</option>
                                                <option value="custom">Custom Range</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Report Type</label>
                                            <select class="form-select" name="report_type">
                                                <option value="detailed">Detailed Records</option>
                                                <option value="summary">Summary Report</option>
                                                <option value="employee">Employee-wise Summary</option>
                                                <option value="department">Department-wise Summary</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row custom-date-range" style="display: none;">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">From Date</label>
                                            <input type="date" class="form-control" name="from_date"
                                                value="{{ date('Y-m-01') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">To Date</label>
                                            <input type="date" class="form-control" name="to_date"
                                                value="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Employee</label>
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
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-select" name="status">
                                                <option value="">All Statuses</option>
                                                <option value="present">Present</option>
                                                <option value="late">Late</option>
                                                <option value="absent">Absent</option>
                                                <option value="on_leave">On Leave</option>
                                                <option value="half_day">Half Day</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Include Fields</label>
                                            <div class="form-selectgroup">
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="fields[]" value="employee_id"
                                                        class="form-selectgroup-input" checked>
                                                    <span class="form-selectgroup-label">Employee ID</span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="fields[]" value="name"
                                                        class="form-selectgroup-input" checked>
                                                    <span class="form-selectgroup-label">Name</span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="fields[]" value="department"
                                                        class="form-selectgroup-input" checked>
                                                    <span class="form-selectgroup-label">Department</span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="fields[]" value="date"
                                                        class="form-selectgroup-input" checked>
                                                    <span class="form-selectgroup-label">Date</span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="fields[]" value="status"
                                                        class="form-selectgroup-input" checked>
                                                    <span class="form-selectgroup-label">Status</span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="fields[]" value="clock_in"
                                                        class="form-selectgroup-input" checked>
                                                    <span class="form-selectgroup-label">Clock In</span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="fields[]" value="clock_out"
                                                        class="form-selectgroup-input" checked>
                                                    <span class="form-selectgroup-label">Clock Out</span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="fields[]" value="working_hours"
                                                        class="form-selectgroup-input" checked>
                                                    <span class="form-selectgroup-label">Working Hours</span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="fields[]" value="overtime"
                                                        class="form-selectgroup-input">
                                                    <span class="form-selectgroup-label">Overtime</span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="fields[]" value="location"
                                                        class="form-selectgroup-input">
                                                    <span class="form-selectgroup-label">Location</span>
                                                </label>
                                                <label class="form-selectgroup-item">
                                                    <input type="checkbox" name="fields[]" value="notes"
                                                        class="form-selectgroup-input">
                                                    <span class="form-selectgroup-label">Notes</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ti ti-download me-1"></i>
                                            Export Data
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Export History</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>File Name</th>
                                            <th>Exported By</th>
                                            <th>Format</th>
                                            <th>Records</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @php
                                                $date = date('Y-m-d H:i:s', strtotime("-$i days"));
                                                $records = rand(20, 100);
                                                $formats = ['Excel', 'CSV', 'PDF'];
                                                $format = $formats[array_rand($formats)];
                                                $extension = strtolower($format);
                                                if ($extension == 'excel') {
                                                    $extension = 'xlsx';
                                                }
                                            @endphp
                                            <tr>
                                                <td>{{ $date }}</td>
                                                <td>attendance_export_{{ date('Ymd', strtotime("-$i days")) }}.{{ $extension }}
                                                </td>
                                                <td>Administrator</td>
                                                <td>{{ $format }}</td>
                                                <td>{{ $records }}</td>
                                                <td>
                                                    <div class="btn-list flex-nowrap">
                                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                                            <i class="ti ti-download"></i>
                                                            Download
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-outline-secondary">
                                                            <i class="ti ti-refresh"></i>
                                                            Regenerate
                                                        </a>
                                                    </div>
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
