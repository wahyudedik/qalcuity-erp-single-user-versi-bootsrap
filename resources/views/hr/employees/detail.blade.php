@extends('layouts.app')

@section('title', 'Employee Details')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Employee Details
                    </h2>
                    <div class="text-muted mt-1">Employee ID: {{ $id }}</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.employees.edit', ['id' => $id]) }}" class="btn btn-primary">
                            <i class="ti ti-edit me-1"></i>
                            Edit Employee
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical me-1"></i>
                                Actions
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-printer me-1"></i>
                                    Print Details
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-file-export me-1"></i>
                                    Export Data
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#">
                                    <i class="ti ti-user-off me-1"></i>
                                    Deactivate Employee
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Employee Profile Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <span class="avatar avatar-xl avatar-rounded"
                                style="background-image: url(https://placehold.co/128x128)"></span>
                        </div>
                        <h3>Employee {{ substr($id, 3) }}</h3>
                        <div class="text-muted">{{ $id }}</div>

                        <div class="mt-3">
                            <span class="badge bg-green">Active</span>
                        </div>

                        <div class="mt-4">
                            <div class="row g-2">
                                <div class="col-6">
                                    <a href="#" class="btn btn-outline-primary w-100">
                                        <i class="ti ti-message me-1"></i>
                                        Message
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="btn btn-outline-secondary w-100">
                                        <i class="ti ti-file-text me-1"></i>
                                        Documents
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row g-2">
                            <div class="col-6 text-center">
                                <div class="text-muted">Department</div>
                                <strong>Production</strong>
                            </div>
                            <div class="col-6 text-center">
                                <div class="text-muted">Position</div>
                                <strong>Supervisor</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Contact Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="text-muted">Email</div>
                            <div class="d-flex align-items-center">
                                <i class="ti ti-mail me-2 text-muted"></i>
                                <div>employee{{ substr($id, 3) }}@qalcuity.com</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="text-muted">Phone</div>
                            <div class="d-flex align-items-center">
                                <i class="ti ti-phone me-2 text-muted"></i>
                                <div>+62 812-{{ rand(1000, 9999) }}-{{ rand(1000, 9999) }}</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="text-muted">Emergency Contact</div>
                            <div class="d-flex align-items-center">
                                <i class="ti ti-phone-plus me-2 text-muted"></i>
                                <div>+62 857-{{ rand(1000, 9999) }}-{{ rand(1000, 9999) }}</div>
                            </div>
                        </div>
                        <div>
                            <div class="text-muted">Address</div>
                            <div class="d-flex align-items-center">
                                <i class="ti ti-map-pin me-2 text-muted"></i>
                                <div>Jl. Raya Bekasi No. {{ rand(10, 999) }}, Jakarta Timur</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Skills & Certifications -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Skills & Certifications</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="text-muted mb-2">Skills</div>
                            <div>
                                <span class="badge bg-blue-lt me-1 mb-1">Batch Plant Operation</span>
                                <span class="badge bg-blue-lt me-1 mb-1">Quality Control</span>
                                <span class="badge bg-blue-lt me-1 mb-1">Mix Design</span>
                                <span class="badge bg-blue-lt me-1 mb-1">Material Testing</span>
                                <span class="badge bg-blue-lt me-1 mb-1">Team Leadership</span>
                            </div>
                        </div>
                        <div>
                            <div class="text-muted mb-2">Certifications</div>
                            <div class="mb-2">
                                <div class="d-flex align-items-center">
                                    <i class="ti ti-certificate me-2 text-muted"></i>
                                    <div>
                                        <div>Concrete Technology Specialist</div>
                                        <div class="text-muted small">Issued: Jan 2021 • Expires: Jan 2024</div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    <i class="ti ti-certificate me-2 text-muted"></i>
                                    <div>
                                        <div>K3 Safety Certification</div>
                                        <div class="text-muted small">Issued: Mar 2022 • Expires: Mar 2025</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Employee Details Tabs -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                            <li class="nav-item">
                                <a href="#personal" class="nav-link active" data-bs-toggle="tab">
                                    <i class="ti ti-user me-2"></i>
                                    Personal Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#employment" class="nav-link" data-bs-toggle="tab">
                                    <i class="ti ti-briefcase me-2"></i>
                                    Employment
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#attendance" class="nav-link" data-bs-toggle="tab">
                                    <i class="ti ti-calendar me-2"></i>
                                    Attendance
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#payroll" class="nav-link" data-bs-toggle="tab">
                                    <i class="ti ti-cash me-2"></i>
                                    Payroll
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#documents" class="nav-link" data-bs-toggle="tab">
                                    <i class="ti ti-file me-2"></i>
                                    Documents
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Personal Info Tab -->
                            <div class="tab-pane active show" id="personal">
                                <h4 class="mb-3">Personal Information</h4>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Full Name</label>
                                            <div class="form-control-plaintext">Employee {{ substr($id, 3) }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Employee ID</label>
                                            <div class="form-control-plaintext">{{ $id }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Date of Birth</label>
                                            <div class="form-control-plaintext">
                                                {{ rand(1, 28) }}-{{ rand(1, 12) }}-{{ rand(1975, 1995) }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Gender</label>
                                            <div class="form-control-plaintext">{{ rand(0, 1) ? 'Male' : 'Female' }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Marital Status</label>
                                            <div class="form-control-plaintext">
                                                {{ ['Single', 'Married', 'Divorced'][rand(0, 2)] }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Blood Type</label>
                                            <div class="form-control-plaintext">
                                                {{ ['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-'][rand(0, 7)] }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Religion</label>
                                            <div class="form-control-plaintext">
                                                {{ ['Islam', 'Christianity', 'Catholicism', 'Hinduism', 'Buddhism', 'Confucianism'][rand(0, 5)] }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Nationality</label>
                                            <div class="form-control-plaintext">Indonesian</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">National ID (KTP)</label>
                                            <div class="form-control-plaintext">
                                                {{ rand(1000, 9999) }}{{ rand(1000, 9999) }}{{ rand(1000, 9999) }}{{ rand(1000, 9999) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">NPWP</label>
                                            <div class="form-control-plaintext">
                                                {{ rand(10, 99) }}.{{ rand(100, 999) }}.{{ rand(100, 999) }}.{{ rand(1, 9) }}-{{ rand(100, 999) }}.{{ rand(100, 999) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">BPJS Kesehatan</label>
                                            <div class="form-control-plaintext">
                                                {{ rand(1000, 9999) }}{{ rand(1000, 9999) }}{{ rand(1000, 9999) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Employment Tab -->
                            <div class="tab-pane" id="employment">
                                <h4 class="mb-3">Employment Information</h4>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Department</label>
                                            <div class="form-control-plaintext">Production</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Position</label>
                                            <div class="form-control-plaintext">Supervisor</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Branch</label>
                                            <div class="form-control-plaintext">Jakarta</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Employment Status</label>
                                            <div class="form-control-plaintext">
                                                <span class="badge bg-green">Permanent</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Join Date</label>
                                            <div class="form-control-plaintext">
                                                {{ rand(1, 28) }}-{{ rand(1, 12) }}-{{ rand(2015, 2023) }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Contract End Date</label>
                                            <div class="form-control-plaintext">N/A (Permanent Employee)</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Reporting To</label>
                                            <div class="form-control-plaintext">
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-xs me-2"
                                                        style="background-image: url(https://placehold.co/32x32)"></span>
                                                    <div>Production Manager</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Work Schedule</label>
                                            <div class="form-control-plaintext">Monday - Friday, 08:00 - 17:00</div>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="mt-4 mb-3">Employment History</h4>

                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th>Effective Date</th>
                                                    <th>Position</th>
                                                    <th>Department</th>
                                                    <th>Status</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>01-06-2022</td>
                                                    <td>Supervisor</td>
                                                    <td>Production</td>
                                                    <td><span class="badge bg-green">Permanent</span></td>
                                                    <td>Promotion</td>
                                                </tr>
                                                <tr>
                                                    <td>01-06-2020</td>
                                                    <td>Senior Operator</td>
                                                    <td>Production</td>
                                                    <td><span class="badge bg-green">Permanent</span></td>
                                                    <td>Promotion</td>
                                                </tr>
                                                <tr>
                                                    <td>01-06-2018</td>
                                                    <td>Operator</td>
                                                    <td>Production</td>
                                                    <td><span class="badge bg-blue">Contract</span></td>
                                                    <td>Initial hiring</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Attendance Tab -->
                            <div class="tab-pane" id="attendance">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="mb-0">Attendance Summary</h4>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-secondary">
                                            <i class="ti ti-calendar me-1"></i>
                                            This Month
                                        </button>
                                        <button type="button"
                                            class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Last Month</a></li>
                                            <li><a class="dropdown-item" href="#">Last 3 Months</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Custom Range</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Attendance Stats -->
                                <div class="row mb-3">
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="subheader">Present Days</div>
                                                </div>
                                                <div class="h1 mb-0">{{ rand(18, 22) }}</div>
                                                <div class="d-flex mb-2">
                                                    <div>{{ rand(85, 95) }}% Attendance Rate</div>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-primary"
                                                        style="width: {{ rand(85, 95) }}%" role="progressbar"
                                                        aria-valuenow="{{ rand(85, 95) }}" aria-valuemin="0"
                                                        aria-valuemax="100" aria-label="{{ rand(85, 95) }}% Complete">
                                                        <span class="visually-hidden">{{ rand(85, 95) }}% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="subheader">Absent Days</div>
                                                </div>
                                                <div class="h1 mb-0">{{ rand(0, 2) }}</div>
                                                <div class="d-flex mb-2">
                                                    <div>{{ rand(0, 10) }}% Absence Rate</div>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-danger"
                                                        style="width: {{ rand(0, 10) }}%" role="progressbar"
                                                        aria-valuenow="{{ rand(0, 10) }}" aria-valuemin="0"
                                                        aria-valuemax="100" aria-label="{{ rand(0, 10) }}% Complete">
                                                        <span class="visually-hidden">{{ rand(0, 10) }}% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="subheader">Late Arrivals</div>
                                                </div>
                                                <div class="h1 mb-0">{{ rand(1, 5) }}</div>
                                                <div class="d-flex mb-2">
                                                    <div>{{ rand(5, 20) }}% Late Rate</div>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-warning"
                                                        style="width: {{ rand(5, 20) }}%" role="progressbar"
                                                        aria-valuenow="{{ rand(5, 20) }}" aria-valuemin="0"
                                                        aria-valuemax="100" aria-label="{{ rand(5, 20) }}% Complete">
                                                        <span class="visually-hidden">{{ rand(5, 20) }}% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="subheader">Overtime Hours</div>
                                                </div>
                                                <div class="h1 mb-0">{{ rand(8, 24) }}</div>
                                                <div class="d-flex mb-2">
                                                    <div>{{ rand(5, 15) }} days with overtime</div>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-info" style="width: {{ rand(20, 60) }}%"
                                                        role="progressbar" aria-valuenow="{{ rand(20, 60) }}"
                                                        aria-valuemin="0" aria-valuemax="100"
                                                        aria-label="{{ rand(20, 60) }}% Complete">
                                                        <span class="visually-hidden">{{ rand(20, 60) }}% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Attendance Log -->
                                <h4 class="mb-3">Attendance Log</h4>
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Clock In</th>
                                                    <th>Clock Out</th>
                                                    <th>Status</th>
                                                    <th>Work Hours</th>
                                                    <th>Overtime</th>
                                                    <th>Notes</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $currentDay = date('d');
                                                    $currentMonth = date('m');
                                                    $currentYear = date('Y');

                                                    $days = min((int) $currentDay, 10); // Show up to 10 days or current day of month

                                                    $statuses = [
                                                        'Present',
                                                        'Late',
                                                        'Present',
                                                        'Present',
                                                        'Present',
                                                        'Absent',
                                                        'Present',
                                                    ];
                                                    $notes = [
                                                        '',
                                                        'Traffic jam',
                                                        '',
                                                        'Left early - sick',
                                                        '',
                                                        'Sick leave',
                                                        '',
                                                    ];
                                                @endphp

                                                @for ($i = 0; $i < $days; $i++)
                                                    @php
                                                        $day = $currentDay - $i;
                                                        $date = sprintf(
                                                            '%02d-%02d-%04d',
                                                            $day,
                                                            $currentMonth,
                                                            $currentYear,
                                                        );

                                                        $statusIndex = array_rand($statuses);
                                                        $status = $statuses[$statusIndex];
                                                        $note = $notes[$statusIndex];

                                                        // Generate random clock in/out times
                                                        $clockInHour = $status === 'Late' ? rand(8, 9) : 8;
                                                        $clockInMin = $status === 'Late' ? rand(15, 45) : rand(0, 15);
                                                        $clockIn = sprintf('%02d:%02d', $clockInHour, $clockInMin);

                                                        $clockOutHour = rand(17, 19);
                                                        $clockOutMin = rand(0, 59);
                                                        $clockOut =
                                                            $status === 'Absent'
                                                                ? '-'
                                                                : sprintf('%02d:%02d', $clockOutHour, $clockOutMin);

                                                        // Calculate work hours
                                                        $workHours =
                                                            $status === 'Absent'
                                                                ? 0
                                                                : $clockOutHour -
                                                                    $clockInHour +
                                                                    ($clockOutMin - $clockInMin) / 60;
                                                        $overtime = max(0, $workHours - 9);
                                                        $workHours = number_format($workHours, 1);
                                                        $overtime = number_format($overtime, 1);
                                                    @endphp

                                                    <tr>
                                                        <td>{{ $date }}</td>
                                                        <td>{{ $status === 'Absent' ? '-' : $clockIn }}</td>
                                                        <td>{{ $clockOut }}</td>
                                                        <td>
                                                            @if ($status === 'Present')
                                                                <span class="badge bg-success">Present</span>
                                                            @elseif ($status === 'Late')
                                                                <span class="badge bg-warning">Late</span>
                                                            @elseif ($status === 'Absent')
                                                                <span class="badge bg-danger">Absent</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $status === 'Absent' ? '-' : $workHours }}</td>
                                                        <td>{{ $status === 'Absent' ? '-' : $overtime }}</td>
                                                        <td>{{ $note }}</td>
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <p class="m-0 text-muted">Showing <span>{{ $days }}</span> of
                                            <span>{{ date('t') }}</span> entries</p>
                                        <ul class="pagination m-0 ms-auto">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                                    <i class="ti ti-chevron-left"></i>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                    <i class="ti ti-chevron-right"></i>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Payroll Tab -->
                            <div class="tab-pane" id="payroll">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="mb-0">Payroll Information</h4>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-secondary">
                                            <i class="ti ti-calendar me-1"></i>
                                            This Year
                                        </button>
                                        <button type="button"
                                            class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Last Year</a></li>
                                            <li><a class="dropdown-item" href="#">Last 2 Years</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Custom Range</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Salary Information -->
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3 class="card-title">Salary Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label text-muted">Basic Salary</label>
                                                    <div class="form-control-plaintext">Rp
                                                        {{ number_format(rand(5000000, 8000000), 0, ',', '.') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label text-muted">Allowances</label>
                                                    <div class="form-control-plaintext">Rp
                                                        {{ number_format(rand(1000000, 2000000), 0, ',', '.') }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label text-muted">Payment Method</label>
                                                    <div class="form-control-plaintext">Bank Transfer</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label text-muted">Bank Account</label>
                                                    <div class="form-control-plaintext">BCA -
                                                        {{ rand(100000000, 999999999) }}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label text-muted">Tax Status</label>
                                                    <div class="form-control-plaintext">TK/0 (Single, No Dependents)</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label text-muted">Last Salary Review</label>
                                                    <div class="form-control-plaintext">
                                                        {{ rand(1, 12) }}/{{ rand(2021, 2023) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payroll History -->
                                <h4 class="mb-3">Payroll History</h4>
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th>Period</th>
                                                    <th>Basic Salary</th>
                                                    <th>Allowances</th>
                                                    <th>Overtime</th>
                                                    <th>Deductions</th>
                                                    <th>Net Salary</th>
                                                    <th>Status</th>
                                                    <th class="w-1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $months = [
                                                        'January',
                                                        'February',
                                                        'March',
                                                        'April',
                                                        'May',
                                                        'June',
                                                        'July',
                                                        'August',
                                                        'September',
                                                        'October',
                                                        'November',
                                                        'December',
                                                    ];
                                                    $currentMonth = date('n') - 1; // 0-based index

                                                    // Show last 6 months or up to current month
                                                    $showMonths = min(6, $currentMonth + 1);
                                                    $year = date('Y');
                                                @endphp

                                                @for ($i = 0; $i < $showMonths; $i++)
                                                    @php
                                                        $monthIndex = $currentMonth - $i;
                                                        if ($monthIndex < 0) {
                                                            $monthIndex += 12;
                                                            $displayYear = $year - 1;
                                                        } else {
                                                            $displayYear = $year;
                                                        }

                                                        $period = $months[$monthIndex] . ' ' . $displayYear;

                                                        // Generate random salary components
                                                        $basicSalary = rand(5000000, 8000000);
                                                        $allowances = rand(1000000, 2000000);
                                                        $overtime = rand(0, 1500000);
                                                        $deductions = rand(500000, 1000000);
                                                        $netSalary =
                                                            $basicSalary + $allowances + $overtime - $deductions;

                                                        $status = $i === 0 ? 'Processing' : 'Paid';
                                                    @endphp

                                                    <tr>
                                                        <td>{{ $period }}</td>
                                                        <td>Rp {{ number_format($basicSalary, 0, ',', '.') }}</td>
                                                        <td>Rp {{ number_format($allowances, 0, ',', '.') }}</td>
                                                        <td>Rp {{ number_format($overtime, 0, ',', '.') }}</td>
                                                        <td>Rp {{ number_format($deductions, 0, ',', '.') }}</td>
                                                        <td><strong>Rp
                                                                {{ number_format($netSalary, 0, ',', '.') }}</strong></td>
                                                        <td>
                                                            @if ($status === 'Paid')
                                                                <span class="badge bg-success">Paid</span>
                                                            @else
                                                                <span class="badge bg-warning">Processing</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="btn-list flex-nowrap">
                                                                <a href="#" class="btn btn-sm btn-outline-primary">
                                                                    <i class="ti ti-eye"></i>
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-sm btn-outline-secondary">
                                                                    <i class="ti ti-printer"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <p class="m-0 text-muted">Showing <span>{{ $showMonths }}</span> of
                                            <span>12</span> periods</p>
                                        <ul class="pagination m-0 ms-auto">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                                    <i class="ti ti-chevron-left"></i>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                    <i class="ti ti-chevron-right"></i>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Documents Tab -->
                            <div class="tab-pane" id="documents">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="mb-0">Employee Documents</h4>
                                    <button class="btn btn-primary">
                                        <i class="ti ti-upload me-1"></i>
                                        Upload Document
                                    </button>
                                </div>

                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th>Document Name</th>
                                                    <th>Category</th>
                                                    <th>Upload Date</th>
                                                    <th>Expiry Date</th>
                                                    <th>Size</th>
                                                    <th class="w-1">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <i class="ti ti-file-text text-primary me-2"></i>
                                                            <div>CV_{{ $id }}.pdf</div>
                                                        </div>
                                                    </td>
                                                    <td>Personal</td>
                                                    <td>{{ rand(1, 28) }}-{{ rand(1, 12) }}-{{ rand(2018, 2020) }}
                                                    </td>
                                                    <td>-</td>
                                                    <td>{{ rand(1, 3) }}.{{ rand(1, 9) }} MB</td>
                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a href="#" class="btn btn-sm btn-outline-primary">
                                                                <i class="ti ti-download"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                                                <i class="ti ti-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <i class="ti ti-file-text text-primary me-2"></i>
                                                            <div>KTP_{{ $id }}.jpg</div>
                                                        </div>
                                                    </td>
                                                    <td>Identification</td>
                                                    <td>{{ rand(1, 28) }}-{{ rand(1, 12) }}-{{ rand(2018, 2020) }}
                                                    </td>
                                                    <td>-</td>
                                                    <td>{{ rand(100, 999) }} KB</td>
                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a href="#" class="btn btn-sm btn-outline-primary">
                                                                <i class="ti ti-download"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                                                <i class="ti ti-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <i class="ti ti-file-text text-primary me-2"></i>
                                                            <div>Contract_{{ $id }}.pdf</div>
                                                        </div>
                                                    </td>
                                                    <td>Employment</td>
                                                    <td>{{ rand(1, 28) }}-{{ rand(1, 12) }}-{{ rand(2018, 2020) }}
                                                    </td>
                                                    <td>-</td>
                                                    <td>{{ rand(100, 999) }} KB</td>
                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a href="#" class="btn btn-sm btn-outline-primary">
                                                                <i class="ti ti-download"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                                                <i class="ti ti-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <i class="ti ti-file-text text-primary me-2"></i>
                                                            <div>Certificate_K3_{{ $id }}.pdf</div>
                                                        </div>
                                                    </td>
                                                    <td>Certification</td>
                                                    <td>{{ rand(1, 28) }}-{{ rand(1, 12) }}-{{ rand(2020, 2022) }}
                                                    </td>
                                                    <td>{{ rand(1, 28) }}-{{ rand(1, 12) }}-{{ rand(2023, 2025) }}
                                                    </td>
                                                    <td>{{ rand(100, 999) }} KB</td>
                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a href="#" class="btn btn-sm btn-outline-primary">
                                                                <i class="ti ti-download"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                                                <i class="ti ti-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <i class="ti ti-file-text text-primary me-2"></i>
                                                            <div>Training_Record_{{ $id }}.xlsx</div>
                                                        </div>
                                                    </td>
                                                    <td>Training</td>
                                                    <td>{{ rand(1, 28) }}-{{ rand(1, 12) }}-{{ rand(2021, 2023) }}
                                                    </td>
                                                    <td>-</td>
                                                    <td>{{ rand(100, 999) }} KB</td>
                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a href="#" class="btn btn-sm btn-outline-primary">
                                                                <i class="ti ti-download"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-outline-secondary">
                                                                <i class="ti ti-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
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
