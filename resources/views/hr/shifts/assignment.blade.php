@extends('layouts.app')

@section('title', 'Shift Assignment')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Shift Assignment
                </h2>
                <div class="text-muted mt-1">Assign employees to shifts</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
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
                        <h3 class="card-title">Assign Employees to Shifts</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label required">Select Shift</label>
                                    <select class="form-select" required>
                                        <option value="">Select a shift</option>
                                        <option value="1">Morning Shift (07:00-15:00)</option>
                                        <option value="2">Afternoon Shift (15:00-23:00)</option>
                                        <option value="3">Night Shift (23:00-07:00)</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Department</label>
                                    <select class="form-select">
                                        <option value="">All Departments</option>
                                        <option value="production">Production</option>
                                        <option value="quality">Quality Assurance</option>
                                        <option value="maintenance">Maintenance</option>
                                        <option value="logistics">Logistics</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Branch</label>
                                    <select class="form-select">
                                        <option value="">All Branches</option>
                                        <option value="1">Jakarta Plant</option>
                                        <option value="2">Surabaya Plant</option>
                                        <option value="3">Bandung Plant</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label required">Effective Date</label>
                                    <input type="date" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">End Date (Optional)</label>
                                    <input type="date" class="form-control">
                                    <small class="form-hint">Leave empty for permanent assignment</small>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Rotation Pattern</label>
                                    <select class="form-select">
                                        <option value="">No Rotation</option>
                                        <option value="weekly">Weekly Rotation</option>
                                        <option value="biweekly">Bi-weekly Rotation</option>
                                        <option value="monthly">Monthly Rotation</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" rows="2" placeholder="Additional notes about this assignment"></textarea>
                            </div>
                        </form>

                        <div class="hr-text">Select Employees</div>

                        <div class="d-flex justify-content-between mb-3">
                            <div class="input-icon w-50">
                                <span class="input-icon-addon">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Search employees...">
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-primary">
                                    <i class="ti ti-filter"></i>
                                    Filter
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th class="w-1">
                                            <input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all employees">
                                        </th>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Department</th>
                                        <th>Current Shift</th>
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
                                            'current_shift' => 'Morning Shift'
                                        ],
                                        [
                                            'id' => 'EMP-002',
                                            'name' => 'Andi Wijaya',
                                            'position' => 'Production Operator',
                                            'department' => 'Production',
                                            'current_shift' => 'Afternoon Shift'
                                        ],
                                        [
                                            'id' => 'EMP-003',
                                            'name' => 'Citra Dewi',
                                            'position' => 'Quality Inspector',
                                            'department' => 'Quality Assurance',
                                            'current_shift' => 'Morning Shift'
                                        ],
                                        [
                                            'id' => 'EMP-004',
                                            'name' => 'Dodi Pratama',
                                            'position' => 'Maintenance Technician',
                                            'department' => 'Maintenance',
                                            'current_shift' => 'Night Shift'
                                        ],
                                        [
                                            'id' => 'EMP-005',
                                            'name' => 'Dewi Lestari',
                                            'position' => 'Quality Control',
                                            'department' => 'Quality Assurance',
                                            'current_shift' => 'Morning Shift'
                                        ],
                                        [
                                            'id' => 'EMP-006',
                                            'name' => 'Eko Prasetyo',
                                            'position' => 'Batch Plant Operator',
                                            'department' => 'Production',
                                            'current_shift' => 'Afternoon Shift'
                                        ],
                                        [
                                            'id' => 'EMP-007',
                                            'name' => 'Fani Wijaya',
                                            'position' => 'Laboratory Technician',
                                            'department' => 'Quality Assurance',
                                            'current_shift' => 'Morning Shift'
                                        ],
                                        [
                                            'id' => 'EMP-008',
                                            'name' => 'Gunawan Setiadi',
                                            'position' => 'Mixer Truck Driver',
                                            'department' => 'Logistics',
                                            'current_shift' => 'Morning Shift'
                                        ],
                                        [
                                            'id' => 'EMP-009',
                                            'name' => 'Hadi Susanto',
                                            'position' => 'Warehouse Staff',
                                            'department' => 'Logistics',
                                            'current_shift' => 'Morning Shift'
                                        ],
                                        [
                                            'id' => 'EMP-010',
                                            'name' => 'Indah Permata',
                                            'position' => 'Admin Staff',
                                            'department' => 'Administration',
                                            'current_shift' => 'Morning Shift'
                                        ],
                                    ];
                                    @endphp

                                    @foreach($employees as $employee)
                                    <tr>
                                        <td>
                                            <input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select employee">
                                        </td>
                                        <td>{{ $employee['id'] }}</td>
                                        <td>{{ $employee['name'] }}</td>
                                        <td>{{ $employee['position'] }}</td>
                                        <td>{{ $employee['department'] }}</td>
                                        <td>{{ $employee['current_shift'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex mt-4 justify-content-center">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="ti ti-chevron-left"></i>
                                        prev
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        next
                                        <i class="ti ti-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-4 d-flex justify-content-end">
                            <button type="button" class="btn btn-link link-secondary me-3">
                                Cancel
                            </button>
                                                        <button type="button" class="btn btn-primary">
                                Assign Selected Employees
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Current Shift Assignments</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="input-icon w-50">
                                <span class="input-icon-addon">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Search assignments...">
                            </div>
                            <div>
                                <select class="form-select">
                                    <option value="all">All Shifts</option>
                                    <option value="morning">Morning Shift</option>
                                    <option value="afternoon">Afternoon Shift</option>
                                    <option value="night">Night Shift</option>
                                </select>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Shift</th>
                                        <th>Department</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th class="w-1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $assignments = [
                                        [
                                            'employee' => 'Budi Santoso (EMP-001)',
                                            'shift' => 'Morning Shift',
                                            'department' => 'Production',
                                            'start_date' => '2023-01-15',
                                            'end_date' => null,
                                            'status' => 'Active'
                                        ],
                                        [
                                            'employee' => 'Andi Wijaya (EMP-002)',
                                            'shift' => 'Afternoon Shift',
                                            'department' => 'Production',
                                            'start_date' => '2023-01-15',
                                            'end_date' => null,
                                            'status' => 'Active'
                                        ],
                                        [
                                            'employee' => 'Citra Dewi (EMP-003)',
                                            'shift' => 'Morning Shift',
                                            'department' => 'Quality Assurance',
                                            'start_date' => '2023-01-15',
                                            'end_date' => null,
                                            'status' => 'Active'
                                        ],
                                        [
                                            'employee' => 'Dodi Pratama (EMP-004)',
                                            'shift' => 'Night Shift',
                                            'department' => 'Maintenance',
                                            'start_date' => '2023-01-15',
                                            'end_date' => null,
                                            'status' => 'Active'
                                        ],
                                        [
                                            'employee' => 'Dewi Lestari (EMP-005)',
                                            'shift' => 'Morning Shift',
                                            'department' => 'Quality Assurance',
                                            'start_date' => '2023-01-15',
                                            'end_date' => null,
                                            'status' => 'Active'
                                        ],
                                        [
                                            'employee' => 'Eko Prasetyo (EMP-006)',
                                            'shift' => 'Afternoon Shift',
                                            'department' => 'Production',
                                            'start_date' => '2023-02-01',
                                            'end_date' => null,
                                            'status' => 'Active'
                                        ],
                                        [
                                            'employee' => 'Fani Wijaya (EMP-007)',
                                            'shift' => 'Morning Shift',
                                            'department' => 'Quality Assurance',
                                            'start_date' => '2023-02-01',
                                            'end_date' => null,
                                            'status' => 'Active'
                                        ],
                                        [
                                            'employee' => 'Gunawan Setiadi (EMP-008)',
                                            'shift' => 'Morning Shift',
                                            'department' => 'Logistics',
                                            'start_date' => '2023-01-15',
                                            'end_date' => '2023-06-30',
                                            'status' => 'Scheduled End'
                                        ],
                                        [
                                            'employee' => 'Hadi Susanto (EMP-009)',
                                            'shift' => 'Morning Shift',
                                            'department' => 'Logistics',
                                            'start_date' => '2023-01-15',
                                            'end_date' => null,
                                            'status' => 'Active'
                                        ],
                                        [
                                            'employee' => 'Indah Permata (EMP-010)',
                                            'shift' => 'Morning Shift',
                                            'department' => 'Administration',
                                            'start_date' => '2023-01-15',
                                            'end_date' => null,
                                            'status' => 'Active'
                                        ],
                                    ];
                                    @endphp

                                    @foreach($assignments as $assignment)
                                    <tr>
                                        <td>{{ $assignment['employee'] }}</td>
                                        <td>{{ $assignment['shift'] }}</td>
                                        <td>{{ $assignment['department'] }}</td>
                                        <td>{{ $assignment['start_date'] }}</td>
                                        <td>{{ $assignment['end_date'] ?? 'Permanent' }}</td>
                                        <td>
                                            @if($assignment['status'] == 'Active')
                                            <span class="badge bg-success">Active</span>
                                            @elseif($assignment['status'] == 'Scheduled End')
                                            <span class="badge bg-warning">Scheduled End</span>
                                            @else
                                            <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-edit me-1"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-calendar-off me-1"></i>
                                                        End Assignment
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#">
                                                        <i class="ti ti-trash me-1"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex mt-4 justify-content-center">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="ti ti-chevron-left"></i>
                                        prev
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
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
</div>
@endsection

