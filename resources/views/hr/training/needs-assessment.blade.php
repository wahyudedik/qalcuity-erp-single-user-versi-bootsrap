@extends('layouts.app')

@section('title', 'Training Needs Assessment')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Training Needs Assessment
                    </h2>
                    <div class="text-muted mt-1">Identify and analyze training requirements</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.training.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Training List
                        </a>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#newAssessmentModal">
                            <i class="ti ti-plus"></i>
                            New Assessment
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
                            <h3 class="card-title">Recent Assessments</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Assessment Name</th>
                                            <th>Department</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Completion</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Annual Skills Assessment</td>
                                            <td>All Departments</td>
                                            <td>Jun 15, 2023</td>
                                            <td>
                                                <span class="badge bg-success">Completed</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">100%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 100%"
                                                            role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
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
                                                        View Report
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
                                            <td>Production Team Skills Gap</td>
                                            <td>Production</td>
                                            <td>Jul 10, 2023</td>
                                            <td>
                                                <span class="badge bg-success">Completed</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">100%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 100%"
                                                            role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
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
                                                        View Report
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
                                            <td>Quality Control Competency</td>
                                            <td>Quality Control</td>
                                            <td>Jul 22, 2023</td>
                                            <td>
                                                <span class="badge bg-warning">In Progress</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">75%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 75%"
                                                            role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
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
                                                        View Report
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
                                            <td>Safety Procedures Knowledge</td>
                                            <td>All Departments</td>
                                            <td>Aug 05, 2023</td>
                                            <td>
                                                <span class="badge bg-warning">In Progress</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">45%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 45%"
                                                            role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
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
                                                        View Report
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
                                            <td>New Equipment Training Needs</td>
                                            <td>Production, Maintenance</td>
                                            <td>Aug 15, 2023</td>
                                            <td>
                                                <span class="badge bg-secondary">Planned</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">0%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 0%"
                                                            role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
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
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Identified Training Needs</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="form-label">Filter by Department</div>
                                <select class="form-select">
                                    <option value="all" selected>All Departments</option>
                                    <option value="production">Production</option>
                                    <option value="quality">Quality Control</option>
                                    <option value="maintenance">Maintenance</option>
                                    <option value="safety">QHSE</option>
                                    <option value="laboratory">Laboratory</option>
                                    <option value="admin">Administration</option>
                                </select>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Training Need</th>
                                            <th>Priority</th>
                                            <th>Department</th>
                                            <th>Employees</th>
                                            <th>Status</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="font-weight-medium">Batch Plant Operation</div>
                                                <div class="text-muted">Advanced operation techniques</div>
                                            </td>
                                            <td>
                                                <span class="badge bg-red">High</span>
                                            </td>
                                            <td>Production</td>
                                            <td>12</td>
                                            <td>
                                                <span class="badge bg-green">Scheduled</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-calendar me-2"></i>
                                                        View Schedule
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-edit me-2"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-users me-2"></i>
                                                        View Employees
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="font-weight-medium">Safety Procedures</div>
                                                <div class="text-muted">Updated safety protocols</div>
                                            </td>
                                            <td>
                                                <span class="badge bg-red">High</span>
                                            </td>
                                            <td>All Departments</td>
                                            <td>45</td>
                                            <td>
                                                <span class="badge bg-green">Scheduled</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-calendar me-2"></i>
                                                        View Schedule
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-edit me-2"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-users me-2"></i>
                                                        View Employees
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="font-weight-medium">Quality Control Testing</div>
                                                <div class="text-muted">Advanced testing methods</div>
                                            </td>
                                            <td>
                                                <span class="badge bg-orange">Medium</span>
                                            </td>
                                            <td>Quality Control</td>
                                            <td>8</td>
                                            <td>
                                                <span class="badge bg-yellow">Planning</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-calendar me-2"></i>
                                                        Schedule Training
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-edit me-2"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-users me-2"></i>
                                                        View Employees
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="font-weight-medium">Equipment Maintenance</div>
                                                <div class="text-muted">Preventive maintenance procedures</div>
                                            </td>
                                            <td>
                                                <span class="badge bg-orange">Medium</span>
                                            </td>
                                            <td>Maintenance</td>
                                            <td>6</td>
                                            <td>
                                                <span class="badge bg-yellow">Planning</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-calendar me-2"></i>
                                                        Schedule Training
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-edit me-2"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-users me-2"></i>
                                                        View Employees
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="font-weight-medium">Leadership Skills</div>
                                                <div class="text-muted">Team management and leadership</div>
                                            </td>
                                            <td>
                                                <span class="badge bg-blue">Low</span>
                                            </td>
                                            <td>Administration</td>
                                            <td>4</td>
                                            <td>
                                                <span class="badge bg-secondary">Identified</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-calendar me-2"></i>
                                                        Schedule Training
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-edit me-2"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-users me-2"></i>
                                                        View Employees
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="font-weight-medium">Mix Design Principles</div>
                                                <div class="text-muted">Advanced concrete mix design</div>
                                            </td>
                                            <td>
                                                <span class="badge bg-orange">Medium</span>
                                            </td>
                                            <td>Laboratory</td>
                                            <td>5</td>
                                            <td>
                                                <span class="badge bg-secondary">Identified</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-calendar me-2"></i>
                                                        Schedule Training
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-edit me-2"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-users me-2"></i>
                                                        View Employees
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

                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Assessment Methods</h3>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-blue">
                                                <i class="ti ti-clipboard-check"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">Skills Assessment Questionnaire</div>
                                            <div class="text-muted">Self-assessment of skills and competencies</div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="btn btn-sm btn-primary">
                                                Use
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-green">
                                                <i class="ti ti-users"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">Manager Assessment</div>
                                            <div class="text-muted">Evaluation by department managers</div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="btn btn-sm btn-primary">
                                                Use
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-red">
                                                <i class="ti ti-certificate"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">Certification Gap Analysis</div>
                                            <div class="text-muted">Identify missing required certifications</div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="btn btn-sm btn-primary">
                                                Use
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-yellow">
                                                <i class="ti ti-chart-bar"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">Performance Analysis</div>
                                            <div class="text-muted">Based on performance metrics and KPIs</div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="btn btn-sm btn-primary">
                                                Use
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-purple">
                                                <i class="ti ti-device-desktop"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">Technical Skills Test</div>
                                            <div class="text-muted">Practical assessment of technical abilities</div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="btn btn-sm btn-primary">
                                                Use
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Training Needs by Department</h3>
                        </div>
                        <div class="card-body">
                            <div id="training-needs-chart" style="height: 250px;"></div>

                            <div class="mt-3">
                                <div class="d-flex mb-2">
                                    <div>Production</div>
                                    <div class="ms-auto">
                                        <span class="text-muted">8 needs identified</span>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 32%" role="progressbar"
                                        aria-valuenow="32" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="d-flex mb-2">
                                    <div>Quality Control</div>
                                    <div class="ms-auto">
                                        <span class="text-muted">5 needs identified</span>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 20%" role="progressbar"
                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="d-flex mb-2">
                                    <div>Maintenance</div>
                                    <div class="ms-auto">
                                        <span class="text-muted">4 needs identified</span>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 16%" role="progressbar"
                                        aria-valuenow="16" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="d-flex mb-2">
                                    <div>QHSE</div>
                                    <div class="ms-auto">
                                        <span class="text-muted">3 needs identified</span>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 12%" role="progressbar"
                                        aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="d-flex mb-2">
                                    <div>Laboratory</div>
                                    <div class="ms-auto">
                                        <span class="text-muted">3 needs identified</span>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 12%" role="progressbar"
                                        aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="d-flex mb-2">
                                    <div>Administration</div>
                                    <div class="ms-auto">
                                        <span class="text-muted">2 needs identified</span>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 8%" role="progressbar"
                                        aria-valuenow="8" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Assessment Modal -->
    <div class="modal modal-blur fade" id="newAssessmentModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Training Needs Assessment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Assessment Name</label>
                        <input type="text" class="form-control" placeholder="Enter assessment name">
                    </div>
                    <div class="row">
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
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Assessment Method</label>
                            <select class="form-select">
                                <option value="questionnaire">Skills Assessment Questionnaire</option>
                                <option value="manager">Manager Assessment</option>
                                <option value="certification">Certification Gap Analysis</option>
                                <option value="performance">Performance Analysis</option>
                                <option value="technical">Technical Skills Test</option>
                                <option value="custom">Custom Assessment</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter assessment description"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Assessment Focus Areas</label>
                        <select class="form-select" multiple>
                            <option value="technical">Technical Skills</option>
                            <option value="safety">Safety Knowledge</option>
                            <option value="quality">Quality Control</option>
                            <option value="technical">Technical Skills</option>
                            <option value="safety">Safety Knowledge</option>
                            <option value="quality">Quality Control</option>
                            <option value="equipment">Equipment Operation</option>
                            <option value="maintenance">Maintenance Procedures</option>
                            <option value="leadership">Leadership Skills</option>
                            <option value="communication">Communication</option>
                            <option value="compliance">Regulatory Compliance</option>
                            <option value="software">Software Proficiency</option>
                        </select>
                        <div class="form-hint">Hold Ctrl (or Cmd) to select multiple options</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-label">Send notification to department managers</span>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-label">Send notification to employees</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <i class="ti ti-plus"></i>
                        Create Assessment
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
            // Initialize chart
            var options = {
                series: [{
                    name: 'Training Needs',
                    data: [8, 5, 4, 3, 3, 2]
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
                        borderRadius: 4,
                        horizontal: true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: ['Production', 'Quality Control', 'Maintenance', 'QHSE', 'Laboratory',
                        'Administration'
                    ],
                },
                colors: ['#206bc4']
            };

            var chart = new ApexCharts(document.querySelector("#training-needs-chart"), options);
            chart.render();
        });
    </script>
@endsection
