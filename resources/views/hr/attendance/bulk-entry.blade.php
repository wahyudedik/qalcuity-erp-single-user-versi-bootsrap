@extends('layouts.app')

@section('title', 'Bulk Attendance Entry')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Bulk Attendance Entry
                    </h2>
                    <div class="text-muted mt-1">Enter attendance data for multiple employees at once</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.attendance.index') }}"
                            class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Attendance
                        </a>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#importModal">
                            <i class="ti ti-file-import"></i>
                            Import from Excel
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
                    <form class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bulk Attendance Form</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label required">Date</label>
                                        <input type="date" class="form-control" name="date"
                                            value="{{ date('Y-m-d') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Department</label>
                                        <select class="form-select" name="department_id">
                                            <option value="">All Departments</option>
                                            <option value="1">Production</option>
                                            <option value="2">Finance</option>
                                            <option value="3">HR</option>
                                            <option value="4">Sales</option>
                                            <option value="5">IT</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Location</label>
                                        <select class="form-select" name="location_id">
                                            <option value="">All Locations</option>
                                            <option value="1">Main Office</option>
                                            <option value="2">Branch 1</option>
                                            <option value="3">Branch 2</option>
                                            <option value="4">Warehouse</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Shift</label>
                                        <select class="form-select" name="shift_id">
                                            <option value="">All Shifts</option>
                                            <option value="1">Morning (07:00 - 16:00)</option>
                                            <option value="2">Evening (15:00 - 00:00)</option>
                                            <option value="3">Night (23:00 - 08:00)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-label">Default Status</div>
                                <div class="form-selectgroup">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="default_status" value="present"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Present</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="default_status" value="absent"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">Absent</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="default_status" value="leave"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">On Leave</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="default_status" value="holiday"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">Holiday</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="default_status" value="none"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">No Default</span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label class="form-label m-0">Employee Attendance</label>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-outline-primary" id="apply-to-all">
                                            <i class="ti ti-checks me-1"></i>
                                            Apply Default to All
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary ms-2"
                                            id="clear-all">
                                            <i class="ti ti-eraser me-1"></i>
                                            Clear All
                                        </button>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="w-1">
                                                    <input class="form-check-input m-0 align-middle" type="checkbox"
                                                        id="select-all">
                                                </th>
                                                <th>Employee</th>
                                                <th>Department</th>
                                                <th>Status</th>
                                                <th>Clock In</th>
                                                <th>Clock Out</th>
                                                <th>Location</th>
                                                <th>Notes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $employees = [
                                                    [
                                                        'id' => 1,
                                                        'name' => 'John Doe',
                                                        'code' => 'EMP0001',
                                                        'department' => 'Production',
                                                        'position' => 'Manager',
                                                    ],
                                                    [
                                                        'id' => 2,
                                                        'name' => 'Jane Smith',
                                                        'code' => 'EMP0002',
                                                        'department' => 'Finance',
                                                        'position' => 'Accountant',
                                                    ],
                                                    [
                                                        'id' => 3,
                                                        'name' => 'Robert Johnson',
                                                        'code' => 'EMP0003',
                                                        'department' => 'HR',
                                                        'position' => 'Specialist',
                                                    ],
                                                    [
                                                        'id' => 4,
                                                        'name' => 'Emily Davis',
                                                        'code' => 'EMP0004',
                                                        'department' => 'Sales',
                                                        'position' => 'Executive',
                                                    ],
                                                    [
                                                        'id' => 5,
                                                        'name' => 'Michael Wilson',
                                                        'code' => 'EMP0005',
                                                        'department' => 'IT',
                                                        'position' => 'Developer',
                                                    ],
                                                    [
                                                        'id' => 6,
                                                        'name' => 'Sarah Brown',
                                                        'code' => 'EMP0006',
                                                        'department' => 'Production',
                                                        'position' => 'Supervisor',
                                                    ],
                                                    [
                                                        'id' => 7,
                                                        'name' => 'David Miller',
                                                        'code' => 'EMP0007',
                                                        'department' => 'Finance',
                                                        'position' => 'Analyst',
                                                    ],
                                                    [
                                                        'id' => 8,
                                                        'name' => 'Jennifer Taylor',
                                                        'code' => 'EMP0008',
                                                        'department' => 'HR',
                                                        'position' => 'Assistant',
                                                    ],
                                                    [
                                                        'id' => 9,
                                                        'name' => 'James Anderson',
                                                        'code' => 'EMP0009',
                                                        'department' => 'Sales',
                                                        'position' => 'Representative',
                                                    ],
                                                    [
                                                        'id' => 10,
                                                        'name' => 'Lisa Thomas',
                                                        'code' => 'EMP0010',
                                                        'department' => 'IT',
                                                        'position' => 'System Admin',
                                                    ],
                                                ];
                                            @endphp

                                            @foreach ($employees as $employee)
                                                <tr>
                                                    <td>
                                                        <input class="form-check-input m-0 align-middle employee-checkbox"
                                                            type="checkbox" name="selected_employees[]"
                                                            value="{{ $employee['id'] }}">
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <span class="avatar me-2"
                                                                style="background-image: url(https://placehold.co/128x128)"></span>
                                                            <div>
                                                                <div>{{ $employee['name'] }}</div>
                                                                <div class="text-muted">{{ $employee['code'] }}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $employee['department'] }}</div>
                                                        <div class="text-muted">{{ $employee['position'] }}</div>
                                                    </td>
                                                    <td>
                                                        <select class="form-select form-select-sm status-select"
                                                            name="status[{{ $employee['id'] }}]">
                                                            <option value="present">Present</option>
                                                            <option value="absent">Absent</option>
                                                            <option value="late">Late</option>
                                                            <option value="early_leave">Early Leave</option>
                                                            <option value="leave">On Leave</option>
                                                            <option value="holiday">Holiday</option>
                                                            <option value="weekend">Weekend</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="time"
                                                            class="form-control form-control-sm clock-in"
                                                            name="clock_in[{{ $employee['id'] }}]" value="08:00">
                                                    </td>
                                                    <td>
                                                        <input type="time"
                                                            class="form-control form-control-sm clock-out"
                                                            name="clock_out[{{ $employee['id'] }}]" value="17:00">
                                                    </td>
                                                    <td>
                                                        <select class="form-select form-select-sm location-select"
                                                            name="location[{{ $employee['id'] }}]">
                                                            <option value="1">Main Office</option>
                                                            <option value="2">Branch 1</option>
                                                            <option value="3">Branch 2</option>
                                                            <option value="4">Warehouse</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control form-control-sm notes"
                                                            name="notes[{{ $employee['id'] }}]" placeholder="Add notes">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('hr.attendance.index') }}" class="btn btn-link">Cancel</a>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    <i class="ti ti-device-floppy me-1"></i>
                                    Save Attendance Data
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Import Modal -->
    <div class="modal modal-blur fade" id="importModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Attendance Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Upload Excel File</label>
                        <input type="file" class="form-control" name="attendance_file" accept=".xlsx, .xls, .csv">
                        <small class="form-hint">Accepted formats: .xlsx, .xls, .csv</small>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Sample Templates</div>
                        <div>
                            <a href="#" class="btn btn-sm btn-outline-primary">
                                <i class="ti ti-download me-1"></i>
                                Download Template
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-info ms-2">
                                <i class="ti ti-help me-1"></i>
                                View Instructions
                            </a>
                        </div>
                    </div>
                    <div class="alert alert-info" role="alert">
                        <div class="d-flex">
                            <div>
                                <i class="ti ti-info-circle me-2"></i>
                            </div>
                            <div>
                                <h4 class="alert-title">Important Notes</h4>
                                <div class="text-muted">
                                    <ul class="mb-0">
                                        <li>Make sure your file follows the template format</li>
                                        <li>Employee codes must match existing records</li>
                                        <li>Date format should be YYYY-MM-DD</li>
                                        <li>Time format should be HH:MM (24-hour)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary ms-auto">
                        <i class="ti ti-upload me-1"></i>
                        Upload and Process
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all checkbox functionality
            const selectAllCheckbox = document.getElementById('select-all');
            const employeeCheckboxes = document.querySelectorAll('.employee-checkbox');

            selectAllCheckbox.addEventListener('change', function() {
                employeeCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });

            // Apply default status to all selected employees
            const applyToAllBtn = document.getElementById('apply-to-all');
            const statusSelects = document.querySelectorAll('.status-select');

            applyToAllBtn.addEventListener('click', function() {
                const defaultStatus = document.querySelector('input[name="default_status"]:checked').value;
                if (defaultStatus === 'none') return;

                employeeCheckboxes.forEach((checkbox, index) => {
                    if (checkbox.checked) {
                        statusSelects[index].value = defaultStatus;

                        // Handle time inputs based on status
                        const row = checkbox.closest('tr');
                        const clockInInput = row.querySelector('.clock-in');
                        const clockOutInput = row.querySelector('.clock-out');

                        if (defaultStatus === 'present') {
                            clockInInput.value = '08:00';
                            clockOutInput.value = '17:00';
                            clockInInput.disabled = false;
                            clockOutInput.disabled = false;
                        } else if (defaultStatus === 'absent' || defaultStatus === 'leave' ||
                            defaultStatus === 'holiday') {
                            clockInInput.value = '';
                            clockOutInput.value = '';
                            clockInInput.disabled = true;
                            clockOutInput.disabled = true;
                        }
                    }
                });
            });

            // Clear all inputs for selected employees
            const clearAllBtn = document.getElementById('clear-all');

            clearAllBtn.addEventListener('click', function() {
                employeeCheckboxes.forEach((checkbox, index) => {
                    if (checkbox.checked) {
                        const row = checkbox.closest('tr');
                        row.querySelector('.status-select').selectedIndex = 0;
                        row.querySelector('.clock-in').value = '';
                        row.querySelector('.clock-out').value = '';
                        row.querySelector('.notes').value = '';
                    }
                });
            });

            // Status change handler
            statusSelects.forEach(select => {
                select.addEventListener('change', function() {
                    const row = this.closest('tr');
                    const clockInInput = row.querySelector('.clock-in');
                    const clockOutInput = row.querySelector('.clock-out');

                    if (this.value === 'present' || this.value === 'late' || this.value ===
                        'early_leave') {
                        clockInInput.disabled = false;
                        clockOutInput.disabled = false;
                    } else {
                        clockInInput.value = '';
                        clockOutInput.value = '';
                        clockInInput.disabled = true;
                        clockOutInput.disabled = true;
                    }
                });
            });

            // Department filter change handler
            const departmentSelect = document.querySelector('select[name="department_id"]');

            departmentSelect.addEventListener('change', function() {
                const selectedDepartment = this.value;
                if (!selectedDepartment) {
                    // Show all employees
                    document.querySelectorAll('tbody tr').forEach(row => {
                        row.style.display = '';
                    });
                    return;
                }

                // Filter employees by department
                document.querySelectorAll('tbody tr').forEach(row => {
                    const departmentCell = row.querySelector('td:nth-child(3)');
                    const departmentName = departmentCell.querySelector('div:first-child')
                        .textContent;

                    if (getDepartmentId(departmentName) == selectedDepartment) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // Helper function to get department ID from name
            function getDepartmentId(name) {
                const departments = {
                    'Production': 1,
                    'Finance': 2,
                    'HR': 3,
                    'Sales': 4,
                    'IT': 5
                };
                return departments[name] || 0;
            }
        });
    </script>
@endsection
