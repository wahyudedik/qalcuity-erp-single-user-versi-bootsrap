@extends('layouts.app')

@section('title', 'Employee Management')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Employee Management
                </h2>
                <div class="text-muted mt-1">{{ rand(50, 150) }} employees found</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                    <div class="me-3">
                        <div class="input-icon">
                            <input type="text" class="form-control" placeholder="Search employees...">
                            <span class="input-icon-addon">
                                <i class="ti ti-search"></i>
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('hr.employees.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i>
                        Add New Employee
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Filters -->
    <div class="card mb-3">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Department</label>
                    <select class="form-select">
                        <option value="">All Departments</option>
                        <option value="production">Production</option>
                        <option value="finance">Finance</option>
                        <option value="hr">Human Resources</option>
                        <option value="sales">Sales</option>
                        <option value="warehouse">Warehouse</option>
                        <option value="delivery">Delivery</option>
                        <option value="quality">Quality Control</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Branch</label>
                    <select class="form-select">
                        <option value="">All Branches</option>
                        <option value="jakarta">Jakarta</option>
                        <option value="bandung">Bandung</option>
                        <option value="surabaya">Surabaya</option>
                        <option value="semarang">Semarang</option>
                        <option value="medan">Medan</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select class="form-select">
                        <option value="">All Statuses</option>
                        <option value="active">Active</option>
                        <option value="on_leave">On Leave</option>
                        <option value="terminated">Terminated</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Employment Type</label>
                    <select class="form-select">
                        <option value="">All Types</option>
                        <option value="permanent">Permanent</option>
                        <option value="contract">Contract</option>
                        <option value="probation">Probation</option>
                        <option value="internship">Internship</option>
                    </select>
                </div>
                <div class="col-12 text-end">
                    <button class="btn btn-outline-primary">
                        <i class="ti ti-filter me-1"></i>
                        Apply Filters
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="ti ti-refresh me-1"></i>
                        Reset
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Employee List -->
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                <li class="nav-item">
                    <a href="#all" class="nav-link active" data-bs-toggle="tab">
                        <i class="ti ti-users me-2"></i>
                        All Employees
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#active" class="nav-link" data-bs-toggle="tab">
                        <i class="ti ti-user-check me-2"></i>
                        Active
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#onleave" class="nav-link" data-bs-toggle="tab">
                        <i class="ti ti-calendar-off me-2"></i>
                        On Leave
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#terminated" class="nav-link" data-bs-toggle="tab">
                        <i class="ti ti-user-off me-2"></i>
                        Terminated
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active show" id="all">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>ID</th>
                                    <th>Department</th>
                                    <th>Position</th>
                                    <th>Branch</th>
                                    <th>Join Date</th>
                                    <th>Status</th>
                                    <th class="w-1">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $departments = ['Production', 'Finance', 'HR', 'Sales', 'Warehouse', 'Delivery', 'Quality Control', 'Maintenance'];
                                    $positions = ['Manager', 'Supervisor', 'Staff', 'Operator', 'Driver', 'Technician', 'Admin'];
                                    $branches = ['Jakarta', 'Bandung', 'Surabaya', 'Semarang', 'Medan'];
                                    $statuses = ['Active', 'On Leave', 'Active', 'Active', 'Active', 'Terminated'];
                                @endphp
                                
                                @for ($i = 1; $i <= 10; $i++)
                                    @php
                                        $id = 'EMP' . str_pad($i, 4, '0', STR_PAD_LEFT);
                                        $department = $departments[array_rand($departments)];
                                        $position = $positions[array_rand($positions)];
                                        $branch = $branches[array_rand($branches)];
                                        $joinYear = rand(2015, 2023);
                                        $joinMonth = rand(1, 12);
                                        $joinDay = rand(1, 28);
                                        $joinDate = sprintf('%04d-%02d-%02d', $joinYear, $joinMonth, $joinDay);
                                        $status = $statuses[array_rand($statuses)];
                                        
                                        $statusClass = 'bg-success';
                                        if ($status === 'On Leave') {
                                            $statusClass = 'bg-warning';
                                        } elseif ($status === 'Terminated') {
                                            $statusClass = 'bg-danger';
                                        }
                                    @endphp
                                    
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="avatar me-2" style="background-image: url(https://placehold.co/128x128)"></span>
                                                <div>
                                                    <div>Employee {{ $i }}</div>
                                                    <div class="text-muted">employee{{ $i }}@qalcuity.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $id }}</td>
                                        <td>{{ $department }}</td>
                                        <td>{{ $position }}</td>
                                        <td>{{ $branch }}</td>
                                        <td>{{ date('d M Y', strtotime($joinDate)) }}</td>
                                        <td>
                                            <span class="badge {{ $statusClass }}">{{ $status }}</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('hr.employees.detail', $i) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('hr.employees.edit', $i) }}" class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-file-text me-2"></i>
                                                            View Documents
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-calendar me-2"></i>
                                                            Attendance History
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-cash me-2"></i>
                                                            Payroll History
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="ti ti-user-off me-2"></i>
                                                            Terminate
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Showing <span>1</span> to <span>10</span> of <span>{{ rand(50, 150) }}</span> entries</p>
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
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="ti ti-chevron-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Other tabs have similar content but with filtered data -->
                <div class="tab-pane" id="active">
                    <div class="table-responsive">
                        <!-- Similar table structure with only active employees -->
                        <p class="text-muted">Showing only active employees</p>
                    </div>
                </div>
                
                <div class="tab-pane" id="onleave">
                    <div class="table-responsive">
                        <!-- Similar table structure with only on-leave employees -->
                        <p class="text-muted">Showing only employees on leave</p>
                    </div>
                </div>
                
                <div class="tab-pane" id="terminated">
                    <div class="table-responsive">
                        <!-- Similar table structure with only terminated employees -->
                        <p class="text-muted">Showing only terminated employees</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Export Options -->
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Export Options</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Export Format</label>
                        <select class="form-select">
                            <option value="excel">Excel (.xlsx)</option>
                            <option value="csv">CSV</option>
                            <option value="pdf">PDF</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Data to Export</label>
                        <select class="form-select">
                            <option value="all">All Employee Data</option>
                            <option value="basic">Basic Information Only</option>
                            <option value="contact">Contact Information Only</option>
                            <option value="employment">Employment Information Only</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 text-end">
                    <button class="btn btn-primary">
                        <i class="ti ti-download me-1"></i>
                        Export Data
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
