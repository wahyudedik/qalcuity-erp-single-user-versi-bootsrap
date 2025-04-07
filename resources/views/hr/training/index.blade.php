@extends('layouts.app')

@section('title', 'Training Management')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Training Management
                    </h2>
                    <div class="text-muted mt-1">Manage employee training programs and sessions</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.training.calendar') }}" class="btn btn-secondary d-none d-sm-inline-block">
                            <i class="ti ti-calendar"></i>
                            Training Calendar
                        </a>
                        <a href="{{ route('hr.training.needs-assessment') }}"
                            class="btn btn-secondary d-none d-sm-inline-block">
                            <i class="ti ti-clipboard-check"></i>
                            Needs Assessment
                        </a>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#addTrainingModal">
                            <i class="ti ti-plus"></i>
                            Add Training
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Training Programs</h3>
                            <div class="card-actions">
                                <div class="row g-2">
                                    <div class="col">
                                        <div class="input-icon">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-search"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Search training...">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select">
                                            <option value="all" selected>All Types</option>
                                            <option value="technical">Technical</option>
                                            <option value="safety">Safety</option>
                                            <option value="quality">Quality</option>
                                            <option value="soft-skills">Soft Skills</option>
                                            <option value="certification">Certification</option>
                                            <option value="compliance">Compliance</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Training Program</th>
                                            <th>Type</th>
                                            <th>Department</th>
                                            <th>Status</th>
                                            <th>Participants</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2 bg-red-lt">
                                                        <i class="ti ti-shield"></i>
                                                    </span>
                                                    <div>
                                                        <div class="font-weight-medium">Safety Procedures Training</div>
                                                        <div class="text-muted">Aug 25, 2023</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Safety</td>
                                            <td>All Departments</td>
                                            <td>
                                                <span class="badge bg-green">Scheduled</span>
                                            </td>
                                            <td>45</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-eye me-2"></i>
                                                        View Details
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-users me-2"></i>
                                                        Manage Participants
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-edit me-2"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#">
                                                        <i class="ti ti-trash me-2"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2 bg-blue-lt">
                                                        <i class="ti ti-building-factory"></i>
                                                    </span>
                                                    <div>
                                                        <div class="font-weight-medium">Batch Plant Operation</div>
                                                        <div class="text-muted">Aug 28-29, 2023</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Technical</td>
                                            <td>Production</td>
                                            <td>
                                                <span class="badge bg-green">Scheduled</span>
                                            </td>
                                            <td>12</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-eye me-2"></i>
                                                        View Details
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-users me-2"></i>
                                                        Manage Participants
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-edit me-2"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#">
                                                        <i class="ti ti-trash me-2"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2 bg-green-lt">
                                                        <i class="ti ti-certificate"></i>
                                                    </span>
                                                    <div>
                                                        <div class="font-weight-medium">Quality Control Testing</div>
                                                        <div class="text-muted">Sep 02, 2023</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Quality</td>
                                            <td>Quality Control</td>
                                            <td>
                                                <span class="badge bg-green">Scheduled</span>
                                            </td>
                                            <td>8</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-eye me-2"></i>
                                                        View Details
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-users me-2"></i>
                                                        Manage Participants
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-edit me-2"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#">
                                                        <i class="ti ti-trash me-2"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2 bg-purple-lt">
                                                        <i class="ti ti-users"></i>
                                                    </span>
                                                    <div>
                                                        <div class="font-weight-medium">Leadership Workshop</div>
                                                        <div class="text-muted">Sep 05, 2023</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Soft Skills</td>
                                            <td>Administration</td>
                                            <td>
                                                <span class="badge bg-green">Scheduled</span>
                                            </td>
                                            <td>15</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-eye me-2"></i>
                                                        View Details
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-users me-2"></i>
                                                        Manage Participants
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-edit me-2"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#">
                                                        <i class="ti ti-trash me-2"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2 bg-yellow-lt">
                                                        <i class="ti ti-tool"></i>
                                                    </span>
                                                    <div>
                                                        <div class="font-weight-medium">Equipment Maintenance</div>
                                                        <div class="text-muted">Sep 10, 2023</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Technical</td>
                                            <td>Maintenance</td>
                                            <td>
                                                <span class="badge bg-green">Scheduled</span>
                                            </td>
                                            <td>6</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-eye me-2"></i>
                                                        View Details
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-users me-2"></i>
                                                        Manage Participants
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-edit me-2"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#">
                                                        <i class="ti ti-trash me-2"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2 bg-cyan-lt">
                                                        <i class="ti ti-file-check"></i>
                                                    </span>
                                                    <div>
                                                        <div class="font-weight-medium">ISO Compliance Training</div>
                                                        <div class="text-muted">Sep 15, 2023</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Compliance</td>
                                            <td>All Departments</td>
                                            <td>
                                                <span class="badge bg-green">Scheduled</span>
                                            </td>
                                            <td>30</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-eye me-2"></i>
                                                        View Details
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-users me-2"></i>
                                                        Manage Participants
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-edit me-2"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#">
                                                        <i class="ti ti-trash me-2"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2 bg-orange-lt">
                                                        <i class="ti ti-truck"></i>
                                                    </span>
                                                    <div>
                                                        <div class="font-weight-medium">Mixer Truck Operation</div>
                                                        <div class="text-muted">Aug 15, 2023</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Technical</td>
                                            <td>Delivery</td>
                                            <td>
                                                <span class="badge bg-purple">Completed</span>
                                            </td>
                                            <td>10</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-eye me-2"></i>
                                                        View Details
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-file-report me-2"></i>
                                                        Training Report
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-edit me-2"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#">
                                                        <i class="ti ti-trash me-2"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Showing <span>1</span> to <span>7</span> of <span>12</span> entries
                            </p>
                            <ul class="pagination m-0 ms-auto">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="ti ti-chevron-left"></i>
                                        prev
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        next
                                        <i class="ti ti-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Completed Trainings</h3>
                        </div>
                        <div class="card-body">
                            <div id="training-completion-chart" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Training Overview</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-primary text-white avatar">
                                                        <i class="ti ti-calendar-event"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        12
                                                    </div>
                                                    <div class="text-muted">
                                                        Total Trainings
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-green text-white avatar">
                                                        <i class="ti ti-check"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        3
                                                    </div>
                                                    <div class="text-muted">
                                                        Completed
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-yellow text-white avatar">
                                                        <i class="ti ti-clock"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        7
                                                    </div>
                                                    <div class="text-muted">
                                                        Scheduled
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-blue text-white avatar">
                                                        <i class="ti ti-users"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        126
                                                    </div>
                                                    <div class="text-muted">
                                                        Participants
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Training by Type</h3>
                        </div>
                        <div class="card-body">
                            <div id="training-type-chart" style="height: 200px;"></div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Upcoming Trainings</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-red-lt">
                                                <i class="ti ti-calendar-event"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="d-block text-truncate">Safety Procedures Training</div>
                                            <div class="text-muted">Aug 25, 2023 • 09:00 AM</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-blue-lt">
                                                <i class="ti ti-calendar-event"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="d-block text-truncate">Batch Plant Operation</div>
                                            <div class="text-muted">Aug 28, 2023 • 10:30 AM</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-green-lt">
                                                <i class="ti ti-calendar-event"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="d-block text-truncate">Quality Control Testing</div>
                                            <div class="text-muted">Sep 02, 2023 • 01:00 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('hr.training.calendar') }}" class="btn btn-link link-secondary">
                                View Calendar
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Training Resources</h3>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <i class="ti ti-file-text text-muted"></i>
                                        </div>
                                        <div class="col">
                                            <div class="d-block text-truncate">Training Policy Document</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <i class="ti ti-file-text text-muted"></i>
                                        </div>
                                        <div class="col">
                                            <div class="d-block text-truncate">Training Request Form</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <i class="ti ti-file-text text-muted"></i>
                                        </div>
                                        <div class="col">
                                            <div class="d-block text-truncate">Training Evaluation Template</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <i class="ti ti-file-text text-muted"></i>
                                        </div>
                                        <div class="col">
                                            <div class="d-block text-truncate">Training Budget Guidelines</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Training Modal -->
    <div class="modal modal-blur fade" id="addTrainingModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Training Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Training Title</label>
                        <input type="text" class="form-control" placeholder="Enter training title">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Training Type</label>
                            <select class="form-select">
                                <option value="technical">Technical</option>
                                <option value="safety">Safety</option>
                                <option value="quality">Quality</option>
                                <option value="soft-skills">Soft Skills</option>
                                <option value="certification">Certification</option>
                                <option value="compliance">Compliance</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Department</label>
                            <select class="form-select">
                                <option value="all">All Departments</option>
                                <option value="production">Production</option>
                                <option value="quality">Quality Control</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="safety">QHSE</option>
                                <option value="laboratory">Laboratory</option>
                                <option value="admin">Administration</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Start Time</label>
                            <input type="time" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">End Time</label>
                            <input type="time" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control" placeholder="Enter training location">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Trainer/Provider</label>
                        <select class="form-select">
                            <option value="">Select Trainer or Provider</option>
                            <option value="1">John Smith - Production Manager</option>
                            <option value="2">Sarah Johnson - Safety Officer</option>
                            <option value="3">ConcreteSkills Training</option>
                            <option value="4">SafetyFirst Institute</option>
                            <option value="5">Leadership Academy</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter training description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Participants</label>
                        <select class="form-select" multiple>
                            <option value="all">All Employees</option>
                            <option value="production">All Production Staff</option>
                            <option value="quality">All Quality Control Staff</option>
                            <option value="maintenance">All Maintenance Staff</option>
                            <option value="safety">All QHSE Staff</option>
                            <option value="laboratory">All Laboratory Staff</option>
                            <option value="admin">All Administration Staff</option>
                            <option value="custom">Select Individual Employees</option>
                        </select>
                        <div class="form-hint">Hold Ctrl (or Cmd) to select multiple options</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-label">Send notification to participants</span>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-label">Add to training records upon completion</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <i class="ti ti-plus"></i>
                        Add Training
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Training by Type Chart
            var typeOptions = {
                series: [4, 3, 2, 1, 1, 1],
                chart: {
                    type: 'donut',
                    height: 200,
                },
                labels: ['Technical', 'Safety', 'Quality', 'Soft Skills', 'Certification', 'Compliance'],
                colors: ['#206bc4', '#d63939', '#2fb344', '#ae3ec9', '#f59f00', '#4299e1'],
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%'
                        }
                    }
                }
            };
            var typeChart = new ApexCharts(document.querySelector("#training-type-chart"), typeOptions);
            typeChart.render();

            // Training Completion Chart
            var completionOptions = {
                series: [{
                    name: 'Completed',
                    data: [3, 5, 4, 6, 5, 3, 4, 3]
                }],
                chart: {
                    type: 'bar',
                    height: 250,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 3,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                },
                colors: ['#2fb344']
            };
            var completionChart = new ApexCharts(document.querySelector("#training-completion-chart"),
                completionOptions);
            completionChart.render();
        });
    </script>
@endsection
