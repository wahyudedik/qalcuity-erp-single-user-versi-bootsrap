@extends('layouts.app')

@section('title', 'Shift Details')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Shift Details
                    </h2>
                    <div class="text-muted mt-1">View shift information</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.shifts.edit', $id) }}" class="btn btn-primary">
                            <i class="ti ti-edit"></i>
                            Edit Shift
                        </a>
                        <a href="{{ route('hr.shifts.index') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left"></i>
                            Back to Shifts
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
                            <h3 class="card-title">Shift Information</h3>
                            <div class="card-actions">
                                <span class="badge bg-success">Active</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-label">Shift Code</div>
                                    <div class="form-control-plaintext">MS-01</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-label">Shift Name</div>
                                    <div class="form-control-plaintext">Morning Shift</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-label">Start Time</div>
                                    <div class="form-control-plaintext">07:00</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-label">End Time</div>
                                    <div class="form-control-plaintext">15:00</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-label">Duration</div>
                                    <div class="form-control-plaintext">8 hours</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-label">Branch</div>
                                    <div class="form-control-plaintext">Jakarta Plant</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-label">Break Times</div>
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Duration</th>
                                                <th>Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>09:00</td>
                                                <td>09:15</td>
                                                <td>15 minutes</td>
                                                <td>Short Break</td>
                                            </tr>
                                            <tr>
                                                <td>12:00</td>
                                                <td>13:00</td>
                                                <td>1 hour</td>
                                                <td>Lunch Break</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-label">Applicable Days</div>
                                <div class="row g-2">
                                    <div class="col-auto">
                                        <span class="badge bg-primary">Monday</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge bg-primary">Tuesday</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge bg-primary">Wednesday</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge bg-primary">Thursday</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge bg-primary">Friday</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-label">Overtime Rules</div>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <div class="form-label">Regular Rate</div>
                                        <div class="form-control-plaintext">1.5x</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-label">Holiday Rate</div>
                                        <div class="form-control-plaintext">2.0x</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-label">Description</div>
                                <div class="form-control-plaintext">
                                    Standard morning shift for production staff. Includes regular breaks and lunch period.
                                    This shift is responsible for the main production activities during daytime hours.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Assigned Employees</h3>
                            <div class="card-actions">
                                <a href="{{ route('hr.shifts.assignment') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="ti ti-users"></i>
                                    Manage Assignments
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Department</th>
                                            <th>Assignment Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $employees = [
                                                [
                                                    'id' => 'EMP-001',
                                                    'name' => 'Budi Santoso',
                                                    'position' => 'Production Operator',
                                                    'department' => 'Production',
                                                    'assignment_date' => '2023-01-15',
                                                ],
                                                [
                                                    'id' => 'EMP-005',
                                                    'name' => 'Dewi Lestari',
                                                    'position' => 'Quality Control',
                                                    'department' => 'Quality Assurance',
                                                    'assignment_date' => '2023-01-15',
                                                ],
                                                [
                                                    'id' => 'EMP-012',
                                                    'name' => 'Agus Purnomo',
                                                    'position' => 'Batch Plant Operator',
                                                    'department' => 'Production',
                                                    'assignment_date' => '2023-02-01',
                                                ],
                                                [
                                                    'id' => 'EMP-018',
                                                    'name' => 'Siti Rahayu',
                                                    'position' => 'Production Supervisor',
                                                    'department' => 'Production',
                                                    'assignment_date' => '2023-01-15',
                                                ],
                                                [
                                                    'id' => 'EMP-023',
                                                    'name' => 'Hendra Wijaya',
                                                    'position' => 'Maintenance Technician',
                                                    'department' => 'Maintenance',
                                                    'assignment_date' => '2023-03-10',
                                                ],
                                            ];
                                        @endphp

                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee['id'] }}</td>
                                                <td>{{ $employee['name'] }}</td>
                                                <td>{{ $employee['position'] }}</td>
                                                <td>{{ $employee['department'] }}</td>
                                                <td>{{ $employee['assignment_date'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Shift Statistics</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body p-3 text-center">
                                            <div class="text-end text-green">
                                                <span class="text-green d-inline-flex align-items-center lh-1">
                                                    12% <i class="ti ti-trending-up"></i>
                                                </span>
                                            </div>
                                            <div class="h1 m-0">98.2%</div>
                                            <div class="text-muted mb-3">Attendance Rate</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body p-3 text-center">
                                            <div class="text-end text-red">
                                                <span class="text-red d-inline-flex align-items-center lh-1">
                                                    3% <i class="ti ti-trending-down"></i>
                                                </span>
                                            </div>
                                            <div class="h1 m-0">105%</div>
                                            <div class="text-muted mb-3">Productivity Rate</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body p-3 text-center">
                                            <div class="text-end text-green">
                                                <span class="text-green d-inline-flex align-items-center lh-1">
                                                    8% <i class="ti ti-trending-up"></i>
                                                </span>
                                            </div>
                                            <div class="h1 m-0">12.5 hrs</div>
                                            <div class="text-muted mb-3">Avg. Overtime/Week</div>
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
@endsection
