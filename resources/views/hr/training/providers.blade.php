@extends('layouts.app')

@section('title', 'Training Providers')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Training Providers
                    </h2>
                    <div class="text-muted mt-1">Manage external and internal training providers</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.training.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Training List
                        </a>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#addProviderModal">
                            <i class="ti ti-plus"></i>
                            Add Provider
                        </a>
                        <a href="#" class="btn d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#addProviderModal">
                            <i class="ti ti-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card mb-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                        <li class="nav-item">
                            <a href="#external" class="nav-link active" data-bs-toggle="tab">
                                <i class="ti ti-building me-2"></i>
                                External Providers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#internal" class="nav-link" data-bs-toggle="tab">
                                <i class="ti ti-users me-2"></i>
                                Internal Trainers
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="external">
                            <div class="d-flex mb-3">
                                <div class="text-muted">
                                    Show
                                    <div class="mx-2 d-inline-block">
                                        <select class="form-select form-select-sm">
                                            <option value="10">10</option>
                                            <option value="25" selected>25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                    entries
                                </div>
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm"
                                            aria-label="Search providers">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Provider Name</th>
                                            <th>Contact Person</th>
                                            <th>Specialization</th>
                                            <th>Rating</th>
                                            <th>Status</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url(https://placehold.co/40x40)"></span>
                                                    <div>
                                                        <div class="font-weight-medium">ConcreteSkills Training</div>
                                                        <div class="text-muted">Industry Specialist</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>Emily Davis</div>
                                                <div class="text-muted">emily.davis@concreteskills.com</div>
                                            </td>
                                            <td>
                                                <span class="badge bg-blue-lt me-1">Technical</span>
                                                <span class="badge bg-green-lt">Quality</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">4.8</span>
                                                    <div>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary" style="width: 96%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Active</span>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
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
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-calendar me-2"></i>
                                                            View Trainings
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="ti ti-trash me-2"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url(https://placehold.co/40x40)"></span>
                                                    <div>
                                                        <div class="font-weight-medium">SafetyFirst Institute</div>
                                                        <div class="text-muted">Safety Specialist</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>David Thompson</div>
                                                <div class="text-muted">david@safetyfirst.org</div>
                                            </td>
                                            <td>
                                                <span class="badge bg-red-lt me-1">Safety</span>
                                                <span class="badge bg-azure-lt">Compliance</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">4.7</span>
                                                    <div>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary" style="width: 94%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Active</span>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
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
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-calendar me-2"></i>
                                                            View Trainings
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="ti ti-trash me-2"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url(https://placehold.co/40x40)"></span>
                                                    <div>
                                                        <div class="font-weight-medium">Leadership Academy</div>
                                                        <div class="text-muted">Management Training</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>Jennifer Lee</div>
                                                <div class="text-muted">jennifer@leadershipacademy.com</div>
                                            </td>
                                            <td>
                                                <span class="badge bg-purple-lt me-1">Leadership</span>
                                                <span class="badge bg-yellow-lt">Soft Skills</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">4.5</span>
                                                    <div>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary" style="width: 90%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Active</span>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
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
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-calendar me-2"></i>
                                                            View Trainings
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="ti ti-trash me-2"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url(https://placehold.co/40x40)"></span>
                                                    <div>
                                                        <div class="font-weight-medium">Quality Management Institute</div>
                                                        <div class="text-muted">Quality Certification</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>Michael Brown</div>
                                                <div class="text-muted">michael@qmi.org</div>
                                            </td>
                                            <td>
                                                <span class="badge bg-green-lt me-1">Quality</span>
                                                <span class="badge bg-azure-lt">Compliance</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">4.3</span>
                                                    <div>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary" style="width: 86%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Active</span>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
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
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-calendar me-2"></i>
                                                            View Trainings
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="ti ti-trash me-2"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url(https://placehold.co/40x40)"></span>
                                                    <div>
                                                        <div class="font-weight-medium">TechTraining Solutions</div>
                                                        <div class="text-muted">Technical Training</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>Robert Wilson</div>
                                                <div class="text-muted">robert@techtraining.com</div>
                                            </td>
                                            <td>
                                                <span class="badge bg-blue-lt me-1">Technical</span>
                                                <span class="badge bg-indigo-lt">Innovation</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">4.0</span>
                                                    <div>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning">On Hold</span>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
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
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-calendar me-2"></i>
                                                            View Trainings
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="ti ti-trash me-2"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="text-muted">
                                    Showing <span>1</span> to <span>5</span> of <span>12</span> entries
                                </div>
                                <ul class="pagination ms-auto">
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
                        <div class="tab-pane" id="internal">
                            <div class="d-flex mb-3">
                                <div class="text-muted">
                                    Show
                                    <div class="mx-2 d-inline-block">
                                        <select class="form-select form-select-sm">
                                            <option value="10">10</option>
                                            <option value="25" selected>25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                    entries
                                </div>
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm"
                                            aria-label="Search trainers">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Trainer Name</th>
                                            <th>Department</th>
                                            <th>Expertise</th>
                                            <th>Trainings Conducted</th>
                                            <th>Rating</th>
                                            <th>Status</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url(https://placehold.co/40x40)"></span>
                                                    <div>
                                                        <div class="font-weight-medium">John Smith</div>
                                                        <div class="text-muted">Production Manager</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Production</td>
                                            <td>
                                                <span class="badge bg-blue-lt me-1">Batch Plant</span>
                                                <span class="badge bg-green-lt">Quality</span>
                                            </td>
                                            <td>15</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">4.6</span>
                                                    <div>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary" style="width: 92%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Active</span>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
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
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-calendar me-2"></i>
                                                            View Trainings
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="ti ti-trash me-2"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url(https://placehold.co/40x40)"></span>
                                                    <div>
                                                        <div class="font-weight-medium">Sarah Johnson</div>
                                                        <div class="text-muted">Safety Officer</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>QHSE</td>
                                            <td>
                                                <span class="badge bg-red-lt me-1">Safety</span>
                                                <span class="badge bg-azure-lt">Compliance</span>
                                            </td>
                                            <td>12</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">4.8</span>
                                                    <div>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary" style="width: 96%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Active</span>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
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
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-calendar me-2"></i>
                                                            View Trainings
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="ti ti-trash me-2"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url(https://placehold.co/40x40)"></span>
                                                    <div>
                                                        <div class="font-weight-medium">Michael Brown</div>
                                                        <div class="text-muted">Quality Control Manager</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Quality Control</td>
                                            <td>
                                                <span class="badge bg-green-lt me-1">Quality</span>
                                                <span class="badge bg-blue-lt">Testing</span>
                                            </td>
                                            <td>8</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">4.5</span>
                                                    <div>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary" style="width: 90%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Active</span>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
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
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-calendar me-2"></i>
                                                            View Trainings
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="ti ti-trash me-2"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url(https://placehold.co/40x40)"></span>
                                                    <div>
                                                        <div class="font-weight-medium">Robert Wilson</div>
                                                        <div class="text-muted">Maintenance Supervisor</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Maintenance</td>
                                            <td>
                                                <span class="badge bg-yellow-lt me-1">Equipment</span>
                                                <span class="badge bg-blue-lt">Technical</span>
                                            </td>
                                            <td>6</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">4.2</span>
                                                    <div>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary" style="width: 84%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Active</span>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
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
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-calendar me-2"></i>
                                                            View Trainings
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="ti ti-trash me-2"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url(https://placehold.co/40x40)"></span>
                                                    <div>
                                                        <div class="font-weight-medium">Richard Martinez</div>
                                                        <div class="text-muted">Laboratory Manager</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Laboratory</td>
                                            <td>
                                                <span class="badge bg-blue-lt me-1">Mix Design</span>
                                                <span class="badge bg-green-lt">Testing</span>
                                            </td>
                                            <td>5</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">4.4</span>
                                                    <div>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary" style="width: 88%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning">On Leave</span>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
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
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-calendar me-2"></i>
                                                            View Trainings
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="ti ti-trash me-2"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="text-muted">
                                    Showing <span>1</span> to <span>5</span> of <span>8</span> entries
                                </div>
                                <ul class="pagination ms-auto">
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
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Provider Performance</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Select Provider Type</label>
                                <select class="form-select">
                                    <option value="all" selected>All Providers</option>
                                    <option value="external">External Providers</option>
                                    <option value="internal">Internal Trainers</option>
                                </select>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Provider</th>
                                            <th>Trainings</th>
                                            <th>Participants</th>
                                            <th>Avg. Rating</th>
                                            <th>Effectiveness</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ConcreteSkills Training</td>
                                            <td>8</td>
                                            <td>96</td>
                                            <td>4.8</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">92%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 92%"
                                                            role="progressbar" aria-valuenow="92" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>SafetyFirst Institute</td>
                                            <td>6</td>
                                            <td>120</td>
                                            <td>4.7</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">90%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 90%"
                                                            role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>John Smith (Internal)</td>
                                            <td>15</td>
                                            <td>180</td>
                                            <td>4.6</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">88%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 88%"
                                                            role="progressbar" aria-valuenow="88" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sarah Johnson (Internal)</td>
                                            <td>12</td>
                                            <td>240</td>
                                            <td>4.8</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">94%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 94%"
                                                            role="progressbar" aria-valuenow="94" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Leadership Academy</td>
                                            <td>4</td>
                                            <td>32</td>
                                            <td>4.5</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">86%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 86%"
                                                            role="progressbar" aria-valuenow="86" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Training Categories by Provider</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Time Period</label>
                                <select class="form-select">
                                    <option value="this-year" selected>This Year</option>
                                    <option value="last-year">Last Year</option>
                                    <option value="last-6-months">Last 6 Months</option>
                                    <option value="last-3-months">Last 3 Months</option>
                                </select>
                            </div>
                            <div class="chart-lg">
                                <div id="provider-categories-chart" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Provider Modal -->
    <div class="modal modal-blur fade" id="addProviderModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Training Provider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-label">Provider Type</div>
                        <div>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="provider-type" value="external"
                                    checked>
                                <span class="form-check-label">External Provider</span>
                            </label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="provider-type" value="internal">
                                <span class="form-check-label">Internal Trainer</span>
                            </label>
                        </div>
                    </div>

                    <!-- External Provider Fields -->
                    <div id="external-provider-fields">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Provider Name</label>
                                <input type="text" class="form-control" placeholder="Enter provider name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Provider Type</label>
                                <select class="form-select">
                                    <option value="company">Training Company</option>
                                    <option value="institution">Educational Institution</option>
                                    <option value="consultant">Independent Consultant</option>
                                    <option value="certification">Certification Body</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Person</label>
                                <input type="text" class="form-control" placeholder="Enter contact person name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Enter email address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" placeholder="Enter phone number">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Website</label>
                                <input type="text" class="form-control" placeholder="Enter website URL">
                            </div>
                        </div>
                    </div>

                    <!-- Internal Trainer Fields -->
                    <div id="internal-trainer-fields" class="d-none">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Employee</label>
                                <select class="form-select">
                                    <option value="">Select Employee</option>
                                    <option value="1">John Smith - Production Manager</option>
                                    <option value="2">Sarah Johnson - Safety Officer</option>
                                    <option value="3">Michael Brown - Quality Control Manager</option>
                                    <option value="4">Robert Wilson - Maintenance Supervisor</option>
                                    <option value="5">Richard Martinez - Laboratory Manager</option>
                                    <option value="6">Emily Davis - HR Manager</option>
                                    <option value="7">David Thompson - Sales Manager</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Department</label>
                                <select class="form-select">
                                    <option value="production">Production</option>
                                    <option value="quality">Quality Control</option>
                                    <option value="maintenance">Maintenance</option>
                                    <option value="safety">QHSE</option>
                                    <option value="laboratory">Laboratory</option>
                                    <option value="hr">Human Resources</option>
                                    <option value="sales">Sales</option>
                                    <option value="admin">Administration</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Specialization/Expertise</label>
                        <select class="form-select" multiple>
                            <option value="technical">Technical</option>
                            <option value="safety">Safety</option>
                            <option value="quality">Quality</option>
                            <option value="leadership">Leadership</option>
                            <option value="soft-skills">Soft Skills</option>
                            <option value="compliance">Compliance</option>
                            <option value="equipment">Equipment</option>
                            <option value="mix-design">Mix Design</option>
                            <option value="testing">Testing</option>
                        </select>
                        <div class="form-hint">Hold Ctrl (or Cmd) to select multiple options</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter provider description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" rows="2" placeholder="Enter address"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-label">Provider is currently active</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <i class="ti ti-plus"></i>
                        Add Provider
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
            // Toggle between external provider and internal trainer fields
            const providerTypeRadios = document.querySelectorAll('input[name="provider-type"]');
            const externalProviderFields = document.getElementById('external-provider-fields');
            const internalTrainerFields = document.getElementById('internal-trainer-fields');

            providerTypeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'external') {
                        externalProviderFields.classList.remove('d-none');
                        internalTrainerFields.classList.add('d-none');
                    } else {
                        externalProviderFields.classList.add('d-none');
                        internalTrainerFields.classList.remove('d-none');
                    }
                });
            });

            // Initialize chart
            var options = {
                series: [{
                    name: 'Technical',
                    data: [8, 3, 5, 2, 1]
                }, {
                    name: 'Safety',
                    data: [2, 6, 0, 4, 0]
                }, {
                    name: 'Quality',
                    data: [3, 0, 2, 0, 2]
                }, {
                    name: 'Leadership',
                    data: [0, 0, 0, 0, 4]
                }, {
                    name: 'Soft Skills',
                    data: [0, 0, 1, 0, 2]
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    stacked: true,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['ConcreteSkills', 'SafetyFirst', 'John Smith', 'Sarah Johnson',
                        'Leadership Academy'
                    ],
                },
                yaxis: {
                    title: {
                        text: 'Number of Trainings'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " trainings"
                        }
                    }
                },
                colors: ['#206bc4', '#d63939', '#2fb344', '#ae3ec9', '#f59f00']
            };

            var chart = new ApexCharts(document.querySelector("#provider-categories-chart"), options);
            chart.render();
        });
    </script>
@endsection
