@extends('layouts.app')

@section('title', 'Training Reports')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Training Reports
                    </h2>
                    <div class="text-muted mt-1">Generate and analyze training performance reports</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.training.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Training List
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="ti ti-file-export"></i>
                                Export Report
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-file-spreadsheet me-2"></i>
                                    Excel
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-file-text me-2"></i>
                                    PDF
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-file-csv me-2"></i>
                                    CSV
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">Report Filters</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Report Type</label>
                                <select class="form-select" id="reportType">
                                    <option value="summary">Training Summary</option>
                                    <option value="completion">Completion Rates</option>
                                    <option value="effectiveness">Training Effectiveness</option>
                                    <option value="compliance">Compliance Status</option>
                                    <option value="budget">Budget Analysis</option>
                                    <option value="department">Department Analysis</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Date Range</label>
                                <select class="form-select" id="dateRange">
                                    <option value="this-month">This Month</option>
                                    <option value="last-month">Last Month</option>
                                    <option value="this-quarter">This Quarter</option>
                                    <option value="last-quarter">Last Quarter</option>
                                    <option value="this-year" selected>This Year (2023)</option>
                                    <option value="last-year">Last Year (2022)</option>
                                    <option value="custom">Custom Range</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Department</label>
                                <select class="form-select" id="department">
                                    <option value="all">All Departments</option>
                                    <option value="production">Production</option>
                                    <option value="quality">Quality Control</option>
                                    <option value="maintenance">Maintenance</option>
                                    <option value="administration">Administration</option>
                                    <option value="sales">Sales</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Training Category</label>
                                <select class="form-select" id="category">
                                    <option value="all">All Categories</option>
                                    <option value="technical">Technical Skills</option>
                                    <option value="safety">Safety</option>
                                    <option value="leadership">Leadership</option>
                                    <option value="quality">Quality Management</option>
                                    <option value="soft-skills">Soft Skills</option>
                                </select>
                            </div>
                        </div>
                        <div class="row custom-date-range d-none">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="startDate">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">End Date</label>
                                <input type="date" class="form-control" id="endDate">
                            </div>
                        </div>
                        <div class="d-flex">
                            <button type="button" class="btn btn-primary" id="generateReport">
                                <i class="ti ti-report"></i>
                                Generate Report
                            </button>
                            <button type="button" class="btn btn-link" id="resetFilters">
                                Reset Filters
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">Training Summary Report - 2023</h3>
                    <div class="card-actions">
                        <button class="btn btn-icon btn-outline-secondary" title="Print Report">
                            <i class="ti ti-printer"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar bg-blue-lt me-3">
                                            <i class="ti ti-calendar-event"></i>
                                        </span>
                                        <div>
                                            <div class="font-weight-medium">42</div>
                                            <div class="text-muted">Training Sessions</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar bg-green-lt me-3">
                                            <i class="ti ti-users"></i>
                                        </span>
                                        <div>
                                            <div class="font-weight-medium">285</div>
                                            <div class="text-muted">Participants</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar bg-purple-lt me-3">
                                            <i class="ti ti-clock"></i>
                                        </span>
                                        <div>
                                            <div class="font-weight-medium">512</div>
                                            <div class="text-muted">Training Hours</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar bg-red-lt me-3">
                                            <i class="ti ti-certificate"></i>
                                        </span>
                                        <div>
                                            <div class="font-weight-medium">87%</div>
                                            <div class="text-muted">Completion Rate</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h4>Training by Category</h4>
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Sessions</th>
                                            <th>Participants</th>
                                            <th>Hours</th>
                                            <th>Completion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Technical Skills</td>
                                            <td>18</td>
                                            <td>120</td>
                                            <td>216</td>
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
                                            <td>Safety</td>
                                            <td>12</td>
                                            <td>85</td>
                                            <td>96</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">95%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 95%"
                                                            role="progressbar" aria-valuenow="95" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Leadership</td>
                                            <td>5</td>
                                            <td>28</td>
                                            <td>80</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">85%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 85%"
                                                            role="progressbar" aria-valuenow="85" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Quality Management</td>
                                            <td>4</td>
                                            <td>32</td>
                                            <td>64</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">78%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 78%"
                                                            role="progressbar" aria-valuenow="78" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Soft Skills</td>
                                            <td>3</td>
                                            <td>20</td>
                                            <td>56</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">70%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 70%"
                                                            role="progressbar" aria-valuenow="70" aria-valuemin="0"
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
                        <div class="col-md-6">
                            <h4>Training by Department</h4>
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Department</th>
                                            <th>Employees</th>
                                            <th>Trained</th>
                                            <th>Hours/Emp</th>
                                            <th>Coverage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Production</td>
                                            <td>32</td>
                                            <td>28</td>
                                            <td>8.5</td>
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
                                            <td>Quality Control</td>
                                            <td>12</td>
                                            <td>12</td>
                                            <td>10.2</td>
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
                                        </tr>
                                        <tr>
                                            <td>Maintenance</td>
                                            <td>15</td>
                                            <td>13</td>
                                            <td>7.8</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">87%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 87%"
                                                            role="progressbar" aria-valuenow="87" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Administration</td>
                                            <td>8</td>
                                            <td>6</td>
                                            <td>5.5</td>
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
                                        </tr>
                                        <tr>
                                            <td>Sales</td>
                                            <td>5</td>
                                            <td>3</td>
                                            <td>4.0</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">60%</span>
                                                    <div class="progress progress-sm flex-grow-1">
                                                        <div class="progress-bar bg-primary" style="width: 60%"
                                                            role="progressbar" aria-valuenow="60" aria-valuemin="0"
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

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Training Effectiveness</h4>
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Training Type</th>
                                            <th>Pre-Test</th>
                                            <th>Post-Test</th>
                                            <th>Improvement</th>
                                            <th>Satisfaction</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Batch Plant Operation</td>
                                            <td>65%</td>
                                            <td>92%</td>
                                            <td>
                                                <span class="text-success">+27%</span>
                                            </td>
                                            <td>4.5/5</td>
                                        </tr>
                                        <tr>
                                            <td>Safety Procedures</td>
                                            <td>72%</td>
                                            <td>96%</td>
                                            <td>
                                                <span class="text-success">+24%</span>
                                            </td>
                                            <td>4.7/5</td>
                                        </tr>
                                        <tr>
                                            <td>Quality Control</td>
                                            <td>68%</td>
                                            <td>88%</td>
                                            <td>
                                                <span class="text-success">+20%</span>
                                            </td>
                                            <td>4.2/5</td>
                                        </tr>
                                        <tr>
                                            <td>Leadership Skills</td>
                                            <td>70%</td>
                                            <td>85%</td>
                                            <td>
                                                <span class="text-success">+15%</span>
                                            </td>
                                            <td>4.0/5</td>
                                        </tr>
                                        <tr>
                                            <td>Communication</td>
                                            <td>75%</td>
                                            <td>85%</td>
                                            <td>
                                                <span class="text-success">+10%</span>
                                            </td>
                                            <td>3.8/5</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Compliance Status</h4>
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Training Requirement</th>
                                            <th>Required</th>
                                            <th>Completed</th>
                                            <th>Expiring</th>
                                            <th>Compliance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Safety Induction</td>
                                            <td>72</td>
                                            <td>72</td>
                                            <td>5</td>
                                            <td>
                                                <span class="badge bg-success">100%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>First Aid</td>
                                            <td>15</td>
                                            <td>14</td>
                                            <td>3</td>
                                            <td>
                                                <span class="badge bg-success">93%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Equipment Operation</td>
                                            <td>28</td>
                                            <td>25</td>
                                            <td>4</td>
                                            <td>
                                                <span class="badge bg-warning">89%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Quality Standards</td>
                                            <td>12</td>
                                            <td>10</td>
                                            <td>0</td>
                                            <td>
                                                <span class="badge bg-warning">83%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Environmental Compliance</td>
                                            <td>8</td>
                                            <td>6</td>
                                            <td>1</td>
                                            <td>
                                                <span class="badge bg-danger">75%</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Training Sessions</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Training Title</th>
                                    <th>Category</th>
                                    <th>Department</th>
                                    <th>Date</th>
                                    <th>Participants</th>
                                    <th>Completion</th>
                                    <th>Effectiveness</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Batch Plant Operation</td>
                                    <td>Technical</td>
                                    <td>Production</td>
                                    <td>Jun 15, 2023</td>
                                    <td>18</td>
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
                                    <td>
                                        <span class="text-success">High</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Workplace Safety</td>
                                    <td>Safety</td>
                                    <td>All</td>
                                    <td>May 28, 2023</td>
                                    <td>45</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="me-2">95%</span>
                                            <div class="progress progress-sm flex-grow-1">
                                                <div class="progress-bar bg-primary" style="width: 95%"
                                                    role="progressbar" aria-valuenow="95" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-success">High</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Quality Control Procedures</td>
                                    <td>Quality</td>
                                    <td>Quality Control</td>
                                    <td>May 12, 2023</td>
                                    <td>12</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="me-2">83%</span>
                                            <div class="progress progress-sm flex-grow-1">
                                                <div class="progress-bar bg-primary" style="width: 83%"
                                                    role="progressbar" aria-valuenow="83" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-success">High</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Team Leadership</td>
                                    <td>Leadership</td>
                                    <td>Administration</td>
                                    <td>Apr 20, 2023</td>
                                    <td>8</td>
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
                                        <span class="text-warning">Medium</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Equipment Maintenance</td>
                                    <td>Technical</td>
                                    <td>Maintenance</td>
                                    <td>Apr 05, 2023</td>
                                    <td>15</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="me-2">87%</span>
                                            <div class="progress progress-sm flex-grow-1">
                                                <div class="progress-bar bg-primary" style="width: 87%"
                                                    role="progressbar" aria-valuenow="87" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-success">High</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex align-items-center">
                        <p class="m-0 text-muted">Showing <span>5</span> of <span>42</span> entries</p>
                        <ul class="pagination m-0 ms-auto">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="ti ti-chevron-left"></i>
                                    prev
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
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
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle date range selection
            const dateRangeSelect = document.getElementById('dateRange');
            const customDateRange = document.querySelector('.custom-date-range');

            dateRangeSelect.addEventListener('change', function() {
                if (this.value === 'custom') {
                    customDateRange.classList.remove('d-none');
                } else {
                    customDateRange.classList.add('d-none');
                }
            });

            // Handle reset filters button
            const resetFiltersBtn = document.getElementById('resetFilters');
            resetFiltersBtn.addEventListener('click', function() {
                document.getElementById('reportType').value = 'summary';
                document.getElementById('dateRange').value = 'this-year';
                document.getElementById('department').value = 'all';
                document.getElementById('category').value = 'all';
                customDateRange.classList.add('d-none');
                document.getElementById('startDate').value = '';
                document.getElementById('endDate').value = '';
            });

            // Handle generate report button
            const generateReportBtn = document.getElementById('generateReport');
            generateReportBtn.addEventListener('click', function() {
                // In a real application, this would make an AJAX request to fetch the report data
                // For now, we'll just show a loading indicator and then refresh the page

                const reportType = document.getElementById('reportType').value;
                const dateRange = document.getElementById('dateRange').value;
                const department = document.getElementById('department').value;
                const category = document.getElementById('category').value;

                // Show loading indicator
                Swal.fire({
                    title: 'Generating Report',
                    text: 'Please wait while we generate your report...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Simulate API call delay
                setTimeout(() => {
                    Swal.close();
                    // In a real app, we would update the report content based on the API response
                    // For now, just show a success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Report Generated',
                        text: `Report Type: ${reportType}, Date Range: ${dateRange}, Department: ${department}, Category: ${category}`,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }, 1500);
            });
        });
    </script>
@endsection
