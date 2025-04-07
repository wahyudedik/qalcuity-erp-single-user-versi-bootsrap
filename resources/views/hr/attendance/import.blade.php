@extends('layouts.app')

@section('title', 'Import Attendance')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Import Attendance Data
                </h2>
                <div class="text-muted mt-1">Upload attendance records from Excel or CSV file</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.attendance.index') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to Attendance
                    </a>
                    <a href="#" class="btn btn-outline-primary d-none d-sm-inline-block">
                        <i class="ti ti-download"></i>
                        Download Template
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
                        <h3 class="card-title">Upload File</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label required">Select File</label>
                                        <input type="file" class="form-control" name="attendance_file" accept=".xlsx,.xls,.csv" required>
                                        <small class="form-hint">Accepted formats: Excel (.xlsx, .xls) or CSV (.csv)</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Date Format</label>
                                        <select class="form-select" name="date_format">
                                            <option value="Y-m-d">YYYY-MM-DD (e.g., 2023-05-15)</option>
                                            <option value="d/m/Y">DD/MM/YYYY (e.g., 15/05/2023)</option>
                                            <option value="m/d/Y">MM/DD/YYYY (e.g., 05/15/2023)</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Time Format</label>
                                        <select class="form-select" name="time_format">
                                            <option value="H:i">24-hour (e.g., 14:30)</option>
                                            <option value="h:i A">12-hour (e.g., 02:30 PM)</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="skip_header" name="skip_header" checked>
                                            <label class="form-check-label" for="skip_header">
                                                Skip header row
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ti ti-upload me-1"></i>
                                            Upload and Process
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Instructions</h4>
                                    </div>
                                    <div class="card-body">
                                        <p>Please follow these steps to import attendance data:</p>
                                        <ol>
                                            <li>Download the template file if you don't have one.</li>
                                            <li>Fill in the attendance data according to the template format.</li>
                                            <li>Save the file as Excel (.xlsx, .xls) or CSV (.csv).</li>
                                            <li>Upload the file using the form on the left.</li>
                                            <li>Select the appropriate date and time formats used in your file.</li>
                                            <li>Click "Upload and Process" to import the data.</li>
                                        </ol>
                                        <p class="mt-3"><strong>Required columns in the file:</strong></p>
                                        <ul>
                                            <li>Employee ID</li>
                                            <li>Date</li>
                                            <li>Status (Present, Late, Absent, On Leave, Half Day)</li>
                                            <li>Clock In Time (optional for Absent/On Leave)</li>
                                            <li>Clock Out Time (optional for Absent/On Leave)</li>
                                        </ul>
                                        <p class="mt-3"><strong>Optional columns:</strong></p>
                                        <ul>
                                            <li>Location</li>
                                            <li>Notes</li>
                                            <li>Overtime Hours</li>
                                        </ul>
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
                        <h3 class="card-title">Import History</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>File Name</th>
                                        <th>Uploaded By</th>
                                        <th>Records</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @php
                                            $date = date('Y-m-d H:i:s', strtotime("-$i days"));
                                            $records = rand(20, 100);
                                            $status = rand(0, 10) > 2 ? 'Completed' : 'Failed';
                                        @endphp
                                        <tr>
                                            <td>{{ $date }}</td>
                                            <td>attendance_import_{{ date('Ymd', strtotime("-$i days")) }}.xlsx</td>
                                            <td>Administrator</td>
                                            <td>{{ $records }}</td>
                                            <td>
                                                @if ($status == 'Completed')
                                                    <span class="badge bg-success">Completed</span>
                                                @else
                                                    <span class="badge bg-danger">Failed</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                                        <i class="ti ti-eye"></i>
                                                        View Log
                                                    </a>
                                                    @if ($status == 'Failed')
                                                        <a href="#" class="btn btn-sm btn-outline-warning">
                                                            <i class="ti ti-refresh"></i>
                                                            Retry
                                                        </a>
                                                    @endif
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
