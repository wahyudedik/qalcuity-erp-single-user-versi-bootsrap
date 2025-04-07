@extends('layouts.app')

@section('title', 'Leave Balance')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Leave Balance
                </h2>
                <div class="text-muted mt-1">View and manage employee leave balances</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.leave.index') }}" class="btn btn-outline-secondary">
                        <i class="ti ti-arrow-left"></i>
                        Back to Leave List
                    </a>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adjustBalanceModal">
                        <i class="ti ti-plus"></i>
                        Adjust Balance
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Employee Leave Balance</h3>
            <div class="card-actions">
                <form action="" method="GET">
                    <div class="row g-2">
                        <div class="col">
                            <select name="employee_id" class="form-select">
                                <option value="">All Employees</option>
                                <option value="101">John Doe (ID: 101)</option>
                                <option value="102">Jane Smith (ID: 102)</option>
                                <option value="103">Robert Johnson (ID: 103)</option>
                                <option value="104">Emily Davis (ID: 104)</option>
                                <option value="105">Michael Wilson (ID: 105)</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="department" class="form-select">
                                <option value="">All Departments</option>
                                <option value="production">Production</option>
                                <option value="finance">Finance</option>
                                <option value="hr">Human Resources</option>
                                <option value="sales">Sales</option>
                                <option value="warehouse">Warehouse</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-filter"></i>
                                Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Department</th>
                        <th>Annual Leave</th>
                        <th>Sick Leave</th>
                        <th>Maternity/Paternity</th>
                        <th>Unpaid Leave</th>
                        <th>Other Leave</th>
                        <th class="w-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $employees = [
                        [
                            'id' => 101,
                            'name' => 'John Doe',
                            'department' => 'Production',
                            'annual' => ['used' => 15, 'total' => 20],
                            'sick' => ['used' => 3, 'total' => 10],
                            'maternity' => ['used' => 0, 'total' => 90],
                            'unpaid' => ['used' => 0, 'total' => 30],
                            'other' => ['used' => 1, 'total' => 5]
                        ],
                        [
                            'id' => 102,
                            'name' => 'Jane Smith',
                            'department' => 'Finance',
                            'annual' => ['used' => 10, 'total' => 20],
                            'sick' => ['used' => 5, 'total' => 10],
                            'maternity' => ['used' => 0, 'total' => 90],
                            'unpaid' => ['used' => 5, 'total' => 30],
                            'other' => ['used' => 0, 'total' => 5]
                        ],
                        [
                            'id' => 103,
                            'name' => 'Robert Johnson',
                            'department' => 'Sales',
                            'annual' => ['used' => 18, 'total' => 20],
                            'sick' => ['used' => 2, 'total' => 10],
                            'maternity' => ['used' => 0, 'total' => 90],
                            'unpaid' => ['used' => 0, 'total' => 30],
                            'other' => ['used' => 2, 'total' => 5]
                        ],
                        [
                            'id' => 104,
                            'name' => 'Emily Davis',
                            'department' => 'Human Resources',
                            'annual' => ['used' => 5, 'total' => 20],
                            'sick' => ['used' => 0, 'total' => 10],
                            'maternity' => ['used' => 60, 'total' => 90],
                            'unpaid' => ['used' => 0, 'total' => 30],
                            'other' => ['used' => 0, 'total' => 5]
                        ],
                        [
                            'id' => 105,
                            'name' => 'Michael Wilson',
                            'department' => 'Warehouse',
                            'annual' => ['used' => 12, 'total' => 20],
                            'sick' => ['used' => 8, 'total' => 10],
                            'maternity' => ['used' => 0, 'total' => 90],
                            'unpaid' => ['used' => 10, 'total' => 30],
                            'other' => ['used' => 3, 'total' => 5]
                        ]
                    ];
                    
                    // Generate more dummy data
                    $departments = ['Production', 'Finance', 'Human Resources', 'Sales', 'Warehouse', 'Quality Control', 'Maintenance', 'IT', 'Logistics'];
                    $names = [
                        'Alex Brown', 'Sarah Miller', 'David Clark', 'Lisa White', 'Kevin Moore',
                        'Jennifer Lee', 'Thomas Wright', 'Patricia Adams', 'Richard Hall', 'Susan Allen'
                    ];
                    
                    for ($i = 0; $i < 10; $i++) {
                        $annual_total = 20;
                        $annual_used = rand(0, $annual_total);
                        
                        $sick_total = 10;
                        $sick_used = rand(0, $sick_total);
                        
                        $maternity_total = 90;
                        $maternity_used = (rand(0, 100) < 10) ? rand(30, $maternity_total) : 0; // 10% chance of using maternity leave
                        
                        $unpaid_total = 30;
                        $unpaid_used = (rand(0, 100) < 20) ? rand(1, $unpaid_total) : 0; // 20% chance of using unpaid leave
                        
                        $other_total = 5;
                        $other_used = rand(0, $other_total);
                        
                        $employees[] = [
                            'id' => 106 + $i,
                            'name' => $names[$i],
                            'department' => $departments[array_rand($departments)],
                            'annual' => ['used' => $annual_used, 'total' => $annual_total],
                            'sick' => ['used' => $sick_used, 'total' => $sick_total],
                            'maternity' => ['used' => $maternity_used, 'total' => $maternity_total],
                            'unpaid' => ['used' => $unpaid_used, 'total' => $unpaid_total],
                            'other' => ['used' => $other_used, 'total' => $other_total]
                        ];
                    }
                    @endphp

                    @foreach($employees as $employee)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="avatar me-2" style="background-image: url(https://placehold.co/128x128)"></span>
                                <div>
                                    <div>{{ $employee['name'] }}</div>
                                    <div class="text-muted">ID: {{ $employee['id'] }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $employee['department'] }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="me-2">{{ $employee['annual']['used'] }}/{{ $employee['annual']['total'] }}</span>
                                <div class="flex-grow-1">
                                    <div class="progress" style="width: 100px">
                                        <div class="progress-bar bg-primary" style="width: {{ ($employee['annual']['used'] / $employee['annual']['total']) * 100 }}%" role="progressbar"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="me-2">{{ $employee['sick']['used'] }}/{{ $employee['sick']['total'] }}</span>
                                <div class="flex-grow-1">
                                    <div class="progress" style="width: 100px">
                                        <div class="progress-bar bg-green" style="width: {{ ($employee['sick']['used'] / $employee['sick']['total']) * 100 }}%" role="progressbar"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="me-2">{{ $employee['maternity']['used'] }}/{{ $employee['maternity']['total'] }}</span>
                                <div class="flex-grow-1">
                                    <div class="progress" style="width: 100px">
                                        <div class="progress-bar bg-pink" style="width: {{ ($employee['maternity']['used'] / $employee['maternity']['total']) * 100 }}%" role="progressbar"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="me-2">{{ $employee['unpaid']['used'] }}/{{ $employee['unpaid']['total'] }}</span>
                                <div class="flex-grow-1">
                                    <div class="progress" style="width: 100px">
                                        <div class="progress-bar bg-azure" style="width: {{ ($employee['unpaid']['used'] / $employee['unpaid']['total']) * 100 }}%" role="progressbar"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="me-2">{{ $employee['other']['used'] }}/{{ $employee['other']['total'] }}</span>
                                <div class="flex-grow-1">
                                    <div class="progress" style="width: 100px">
                                        <div class="progress-bar bg-orange" style="width: {{ ($employee['other']['used'] / $employee['other']['total']) * 100 }}%" role="progressbar"></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="btn-list flex-nowrap">
                                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#adjustBalanceModal" data-employee-id="{{ $employee['id'] }}" data-employee-name="{{ $employee['name'] }}">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewHistoryModal" data-employee-id="{{ $employee['id'] }}" data-employee-name="{{ $employee['name'] }}">
                                    <i class="ti ti-history"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex align-items-center">
            <p class="m-0 text-muted">Showing <span>1</span> to <span>15</span> of <span>15</span> entries</p>
            <ul class="pagination m-0 ms-auto">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <i class="ti ti-chevron-left"></i>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="ti ti-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Adjust Balance Modal -->
<div class="modal modal-blur fade" id="adjustBalanceModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adjust Leave Balance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="adjustBalanceForm">
                    <input type="hidden" name="employee_id" id="employee_id" value="">
                    
                    <div class="mb-3">
                        <label class="form-label">Employee</label>
                        <input type="text" class="form-control" id="employee_name" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Leave Type</label>
                        <select class="form-select" name="leave_type" required>
                            <option value="">Select Leave Type</option>
                            <option value="annual">Annual Leave</option>
                                                        <option value="sick">Sick Leave</option>
                            <option value="maternity">Maternity/Paternity Leave</option>
                            <option value="unpaid">Unpaid Leave</option>
                            <option value="other">Other Leave</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Adjustment Type</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="adjustment_type" value="add" class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label">Add</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="adjustment_type" value="subtract" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">Subtract</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="adjustment_type" value="set" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">Set to Value</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Days</label>
                        <input type="number" class="form-control" name="days" min="0.5" step="0.5" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Reason</label>
                        <textarea class="form-control" name="reason" rows="3" placeholder="Enter reason for adjustment" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveAdjustment">Save Adjustment</button>
            </div>
        </div>
    </div>
</div>

<!-- View History Modal -->
<div class="modal modal-blur fade" id="viewHistoryModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Leave Balance History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 id="historyEmployeeName">John Doe</h3>
                <div class="table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Leave Type</th>
                                <th>Adjustment</th>
                                <th>Reason</th>
                                <th>Adjusted By</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2023-01-01</td>
                                <td>Annual Leave</td>
                                <td>+20 days</td>
                                <td>Annual allocation</td>
                                <td>System</td>
                            </tr>
                            <tr>
                                <td>2023-03-15</td>
                                <td>Annual Leave</td>
                                <td>-5 days</td>
                                <td>Leave taken</td>
                                <td>System</td>
                            </tr>
                            <tr>
                                <td>2023-05-10</td>
                                <td>Sick Leave</td>
                                <td>-2 days</td>
                                <td>Sick leave taken</td>
                                <td>System</td>
                            </tr>
                            <tr>
                                <td>2023-06-20</td>
                                <td>Annual Leave</td>
                                <td>+2 days</td>
                                <td>Compensation for weekend work</td>
                                <td>Admin User</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle employee selection in adjust balance modal
        const adjustBalanceModal = document.getElementById('adjustBalanceModal');
        if (adjustBalanceModal) {
            adjustBalanceModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const employeeId = button.getAttribute('data-employee-id');
                const employeeName = button.getAttribute('data-employee-name');
                
                if (employeeId && employeeName) {
                    document.getElementById('employee_id').value = employeeId;
                    document.getElementById('employee_name').value = employeeName;
                } else {
                    document.getElementById('employee_id').value = '';
                    document.getElementById('employee_name').value = '';
                }
            });
        }
        
        // Handle employee selection in view history modal
        const viewHistoryModal = document.getElementById('viewHistoryModal');
        if (viewHistoryModal) {
            viewHistoryModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const employeeName = button.getAttribute('data-employee-name');
                
                if (employeeName) {
                    document.getElementById('historyEmployeeName').textContent = employeeName + ' - Leave Balance History';
                }
            });
        }
        
        // Handle save adjustment button
        const saveAdjustmentBtn = document.getElementById('saveAdjustment');
        if (saveAdjustmentBtn) {
            saveAdjustmentBtn.addEventListener('click', function() {
                const form = document.getElementById('adjustBalanceForm');
                if (form.checkValidity()) {
                    // In a real application, you would submit the form via AJAX here
                    // For demo purposes, we'll just close the modal and show a success message
                    const modal = bootstrap.Modal.getInstance(adjustBalanceModal);
                    modal.hide();
                    
                    // Show success message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });
                    
                    Toast.fire({
                        icon: 'success',
                        title: 'Leave balance has been adjusted successfully'
                    });
                } else {
                    form.reportValidity();
                }
            });
        }
    });
</script>
@endsection

