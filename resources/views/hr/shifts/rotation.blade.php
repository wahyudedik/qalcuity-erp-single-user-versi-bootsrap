@extends('layouts.app')

@section('title', 'Shift Rotation')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Shift Rotation Management
                </h2>
                <div class="text-muted mt-1">Configure shift rotation patterns</div>
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
                        <h3 class="card-title">Rotation Patterns</h3>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRotationModal">
                                <i class="ti ti-plus"></i>
                                Add New Pattern
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Pattern Name</th>
                                        <th>Description</th>
                                        <th>Cycle Length</th>
                                        <th>Sequence</th>
                                        <th>Departments</th>
                                        <th>Status</th>
                                        <th class="w-1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Standard Weekly Rotation</td>
                                        <td>Standard 3-shift weekly rotation pattern</td>
                                        <td>3 weeks</td>
                                        <td>
                                            <span class="badge bg-green">Morning</span> →
                                            <span class="badge bg-blue">Afternoon</span> →
                                            <span class="badge bg-dark">Night</span>
                                        </td>
                                        <td>Production, Maintenance</td>
                                        <td><span class="badge bg-success">Active</span></td>
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
                                                        <i class="ti ti-users me-1"></i>
                                                        Assign Employees
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#">
                                                        <i class="ti ti-trash me-1"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2-2-3 Rotation</td>
                                        <td>2 days on, 2 days off, 3 days on pattern</td>
                                        <td>7 days</td>
                                        <td>
                                            <span class="badge bg-green">2 days on</span> →
                                            <span class="badge bg-secondary">2 days off</span> →
                                            <span class="badge bg-green">3 days on</span>
                                        </td>
                                        <td>Quality Assurance</td>
                                        <td><span class="badge bg-success">Active</span></td>
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
                                                        <i class="ti ti-users me-1"></i>
                                                        Assign Employees
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#">
                                                        <i class="ti ti-trash me-1"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Continental Rotation</td>
                                        <td>5 days morning, 2 off, 5 days afternoon, 2 off, 5 days night, 3 off</td>
                                        <td>22 days</td>
                                        <td>
                                            <span class="badge bg-green">5M</span> →
                                            <span class="badge bg-secondary">2O</span> →
                                            <span class="badge bg-blue">5A</span> →
                                            <span class="badge bg-secondary">2O</span> →
                                            <span class="badge bg-dark">5N</span> →
                                            <span class="badge bg-secondary">3O</span>
                                        </td>
                                        <td>Production</td>
                                        <td><span class="badge bg-success">Active</span></td>
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
                                                        <i class="ti ti-users me-1"></i>
                                                        Assign Employees
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#">
                                                        <i class="ti ti-trash me-1"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fixed Day Shift</td>
                                        <td>Standard 5 days on, 2 days off pattern</td>
                                        <td>7 days</td>
                                        <td>
                                            <span class="badge bg-green">5 days on</span> →
                                            <span class="badge bg-secondary">2 days off</span>
                                        </td>
                                        <td>Administration, Laboratory</td>
                                        <td><span class="badge bg-success">Active</span></td>
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
                                                        <i class="ti ti-users me-1"></i>
                                                        Assign Employees
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#">
                                                        <i class="ti ti-trash me-1"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4-on 4-off</td>
                                        <td>4 days on, 4 days off pattern with 12-hour shifts</td>
                                        <td>8 days</td>
                                        <td>
                                            <span class="badge bg-green">4 days on</span> →
                                            <span class="badge bg-secondary">4 days off</span>
                                        </td>
                                        <td>Batch Plant Operations</td>
                                        <td><span class="badge bg-secondary">Inactive</span></td>
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
                                                        <i class="ti ti-users me-1"></i>
                                                        Assign Employees
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#">
                                                        <i class="ti ti-trash me-1"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Rotation Schedule Preview</h3>
                        <div class="card-actions">
                            <select class="form-select">
                                <option value="standard">Standard Weekly Rotation</option>
                                <option value="2-2-3">2-2-3 Rotation</option>
                                <option value="continental">Continental Rotation</option>
                                <option value="fixed">Fixed Day Shift</option>
                                <option value="4-4">4-on 4-off</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Week</th>
                                        <th>Mon</th>
                                        <th>Tue</th>
                                        <th>Wed</th>
                                        <th>Thu</th>
                                        <th>Fri</th>
                                        <th>Sat</th>
                                        <th>Sun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Week 1</td>
                                        <td class="bg-green-lt">M</td>
                                        <td class="bg-green-lt">M</td>
                                        <td class="bg-green-lt">M</td>
                                        <td class="bg-green-lt">M</td>
                                        <td class="bg-green-lt">M</td>
                                        <td class="bg-muted-lt">O</td>
                                        <td class="bg-muted-lt">O</td>
                                    </tr>
                                    <tr>
                                        <td>Week 2</td>
                                        <td class="bg-blue-lt">A</td>
                                        <td class="bg-blue-lt">A</td>
                                        <td class="bg-blue-lt">A</td>
                                        <td class="bg-blue-lt">A</td>
                                        <td class="bg-blue-lt">A</td>
                                        <td class="bg-muted-lt">O</td>
                                        <td class="bg-muted-lt">O</td>
                                    </tr>
                                    <tr>
                                        <td>Week 3</td>
                                        <td class="bg-dark-lt">N</td>
                                        <td class="bg-dark-lt">N</td>
                                        <td class="bg-dark-lt">N</td>
                                        <td class="bg-dark-lt">N</td>
                                        <td class="bg-dark-lt">N</td>
                                        <td class="bg-muted-lt">O</td>
                                        <td class="bg-muted-lt">O</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Pattern Statistics</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <div class="text-muted">Total Cycle Length</div>
                                                        <div class="h3">21 days</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <div class="text-muted">Working Days</div>
                                                        <div class="h3">15 days (71%)</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <div class="text-muted">Rest Days</div>
                                                        <div class="h3">6 days (29%)</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <div class="text-muted">Weekend Coverage</div>
                                                        <div class="h3">0%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Health Impact Assessment</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="text-muted flex-grow-1">Circadian Disruption</div>
                                                    <div>Medium</div>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-yellow" style="width: 60%"></div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="text-muted flex-grow-1">Recovery Time</div>
                                                    <div>Good</div>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-green" style="width: 75%"></div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="text-muted flex-grow-1">Work-Life Balance</div>
                                                    <div>Fair</div>
                                                </div>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-yellow" style="width: 50%"></div>
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
        </div>
    </div>
</div>

<!-- Add Rotation Pattern Modal -->
<div class="modal modal-blur fade" id="addRotationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Rotation Pattern</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label required">Pattern Name</label>
                    <input type="text" class="form-control" placeholder="Enter pattern name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" rows="2" placeholder="Enter pattern description"></textarea>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label required">Applicable Departments</label>
                        <select class="form-select" multiple>
                            <option value="production">Production</option>
                            <option value="quality">Quality Assurance</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="logistics">Logistics</option>
                            <option value="admin">Administration</option>
                            <option value="lab">Laboratory</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="status" value="active" class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label">Active</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="status" value="inactive" class="form-selectgroup-input">
                                                                <span class="form-selectgroup-label">Inactive</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="hr-text">Rotation Sequence</div>

                <div class="mb-3">
                    <label class="form-label">Sequence Builder</label>
                    <div class="table-responsive mb-2">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Shift Type</th>
                                    <th>Duration (Days)</th>
                                    <th class="w-1">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <select class="form-select">
                                            <option value="morning">Morning Shift</option>
                                            <option value="afternoon">Afternoon Shift</option>
                                            <option value="night">Night Shift</option>
                                            <option value="off">Day Off</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" value="5" min="1" max="14">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-danger">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <select class="form-select">
                                            <option value="morning">Morning Shift</option>
                                            <option value="afternoon">Afternoon Shift</option>
                                            <option value="night">Night Shift</option>
                                            <option value="off" selected>Day Off</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" value="2" min="1" max="14">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-danger">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-outline-primary">
                        <i class="ti ti-plus"></i>
                        Add Sequence Step
                    </button>
                </div>

                <div class="mb-3">
                    <label class="form-label">Preview</label>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thu</th>
                                    <th>Fri</th>
                                    <th>Sat</th>
                                    <th>Sun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="bg-green-lt">M</td>
                                    <td class="bg-green-lt">M</td>
                                    <td class="bg-green-lt">M</td>
                                    <td class="bg-green-lt">M</td>
                                    <td class="bg-green-lt">M</td>
                                    <td class="bg-muted-lt">O</td>
                                    <td class="bg-muted-lt">O</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Additional Settings</label>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="autoRotate">
                        <label class="form-check-label" for="autoRotate">
                            Automatically rotate employees through this pattern
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="allowSwap">
                        <label class="form-check-label" for="allowSwap">
                            Allow shift swapping between employees
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="holidayAdjust">
                        <label class="form-check-label" for="holidayAdjust">
                            Automatically adjust for holidays
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary ms-auto">
                    <i class="ti ti-plus"></i>
                    Create Pattern
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
