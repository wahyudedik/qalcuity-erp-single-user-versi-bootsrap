@extends('layouts.app')

@section('title', 'Mix Design Testing')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Mix Design Testing
                </h2>
                <div class="text-muted mt-1">Manage and track concrete mix design testing results</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.mix-design.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left me-2"></i>
                        Back to Mix Designs
                    </a>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-add-test">
                        <i class="ti ti-plus me-2"></i>
                        Add New Test
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
                        <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                            <li class="nav-item">
                                <a href="#tabs-active" class="nav-link active" data-bs-toggle="tab">Active Tests</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-completed" class="nav-link" data-bs-toggle="tab">Completed Tests</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tabs-reports" class="nav-link" data-bs-toggle="tab">Test Reports</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-active">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Test ID</th>
                                                <th>Mix Design</th>
                                                <th>Test Type</th>
                                                <th>Start Date</th>
                                                <th>Status</th>
                                                <th>Progress</th>
                                                <th class="w-1"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $testTypes = ['Compressive Strength', 'Slump Test', 'Air Content', 'Setting Time', 'Workability'];
                                                $statuses = ['In Progress', 'Awaiting 7-day Test', 'Awaiting 28-day Test'];
                                                $mixDesigns = [
                                                    '001' => 'Standard K-225 Mix',
                                                    '002' => 'High Strength K-400',
                                                    '003' => 'Eco-Friendly K-250',
                                                    '004' => 'K-300 Structural Mix',
                                                    '005' => 'K-350 High Performance'
                                                ];
                                            @endphp

                                            @for ($i = 1; $i <= 5; $i++)
                                                @php
                                                    $testId = 'TEST-' . date('Ym') . '-' . str_pad($i, 3, '0', STR_PAD_LEFT);
                                                    $mixId = '00' . $i;
                                                    $mixName = $mixDesigns[$mixId] ?? 'K-' . (200 + ($i * 25)) . ' Mix';
                                                    $testType = $testTypes[($i - 1) % count($testTypes)];
                                                    $startDate = date('Y-m-d', strtotime('-' . rand(1, 15) . ' days'));
                                                    $status = $statuses[($i - 1) % count($statuses)];
                                                    
                                                    // Calculate progress based on status
                                                    if ($status == 'In Progress') {
                                                        $progress = rand(10, 30);
                                                    } elseif ($status == 'Awaiting 7-day Test') {
                                                        $progress = rand(40, 60);
                                                    } else {
                                                        $progress = rand(70, 90);
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>{{ $testId }}</td>
                                                    <td>
                                                        <a href="{{ route('production.mix-design.detail', ['id' => $mixId]) }}">{{ $mixName }}</a>
                                                    </td>
                                                    <td>{{ $testType }}</td>
                                                    <td>{{ $startDate }}</td>
                                                    <td>
                                                        <span class="badge bg-{{ $status == 'In Progress' ? 'blue' : 'orange' }}">{{ $status }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="row align-items-center">
                                                            <div class="col-12 col-lg-auto">{{ $progress }}%</div>
                                                            <div class="col">
                                                                <div class="progress" style="width: 5rem">
                                                                    <div class="progress-bar" style="width: {{ $progress }}%" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $progress }}% Complete">
                                                                        <span class="visually-hidden">{{ $progress }}% Complete</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal-update-test">
                                                                Update
                                                            </a>
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                                                    <i class="ti ti-dots-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a class="dropdown-item" href="#">
                                                                        View Details
                                                                    </a>
                                                                    <a class="dropdown-item" href="#">
                                                                        Print Report
                                                                    </a>
                                                                    <a class="dropdown-item text-danger" href="#">
                                                                        Cancel Test
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
                            </div>
                            <div class="tab-pane" id="tabs-completed">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Test ID</th>
                                                <th>Mix Design</th>
                                                <th>Test Type</th>
                                                <th>Completion Date</th>
                                                <th>Result</th>
                                                <th>Status</th>
                                                <th class="w-1"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 6; $i <= 10; $i++)
                                                @php
                                                    $testId = 'TEST-' . date('Ym', strtotime('-1 month')) . '-' . str_pad($i - 5, 3, '0', STR_PAD_LEFT);
                                                    $mixId = '00' . ($i - 5);
                                                    $mixName = $mixDesigns[$mixId] ?? 'K-' . (200 + (($i - 5) * 25)) . ' Mix';
                                                    $testType = $testTypes[($i - 6) % count($testTypes)];
                                                    $completionDate = date('Y-m-d', strtotime('-' . rand(1, 10) . ' days'));
                                                    
                                                    // Generate test results
                                                    $result = '';
                                                    $resultStatus = '';
                                                    if ($testType == 'Compressive Strength') {
                                                        $strength = rand(20, 35);
                                                        $result = $strength . ' MPa';
                                                        $resultStatus = $strength >= 25 ? 'Passed' : 'Failed';
                                                    } elseif ($testType == 'Slump Test') {
                                                        $slump = rand(8, 15);
                                                        $result = $slump . ' cm';
                                                        $resultStatus = ($slump >= 8 && $slump <= 15) ? 'Passed' : 'Failed';
                                                    } elseif ($testType == 'Air Content') {
                                                        $air = rand(15, 40) / 10;
                                                        $result = $air . '%';
                                                        $resultStatus = ($air >= 1.5 && $air <= 3.5) ? 'Passed' : 'Failed';
                                                    } else {
                                                        $result = 'See Report';
                                                        $resultStatus = rand(0, 5) > 0 ? 'Passed' : 'Failed';
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>{{ $testId }}</td>
                                                    <td>
                                                        <a href="{{ route('production.mix-design.detail', ['id' => $mixId]) }}">{{ $mixName }}</a>
                                                    </td>
                                                    <td>{{ $testType }}</td>
                                                    <td>{{ $completionDate }}</td>
                                                    <td>{{ $result }}</td>
                                                    <td>
                                                        <span class="badge bg-{{ $resultStatus == 'Passed' ? 'success' : 'danger' }}">{{ $resultStatus }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a href="#" class="btn btn-sm btn-primary">
                                                                View Report
                                                            </a>
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                                                    <i class="ti ti-dots-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a class="dropdown-item" href="#">
                                                                        Download PDF
                                                                    </a>
                                                                    <a class="dropdown-item" href="#">
                                                                        Print Report
                                                                    </a>
                                                                    <a class="dropdown-item" href="#">
                                                                        Schedule Retest
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
                            </div>
                            <div class="tab-pane" id="tabs-reports">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Mix Design</label>
                                                    <select class="form-select">
                                                        <option value="">All Mix Designs</option>
                                                        @foreach($mixDesigns as $id => $name)
                                                            <option value="{{ $id }}">{{ $name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Test Type</label>
                                                    <select class="form-select">
                                                        <option value="">All Test Types</option>
                                                        @foreach($testTypes as $type)
                                                            <option value="{{ $type }}">{{ $type }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Date Range</label>
                                                    <input type="text" class="form-control" placeholder="Select date range">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end mb-3">
                                            <button class="btn btn-primary">Generate Report</button>
                                        </div>
                                        
                                        <div class="empty">
                                            <div class="empty-img">
                                                <i class="ti ti-file-report" style="font-size: 3rem;"></i>
                                            </div>
                                            <p class="empty-title">No reports generated yet</p>
                                            <p class="empty-subtitle text-muted">
                                                Select filters and click "Generate Report" to create a test report
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Test Performance Summary</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="me-3">
                                                               <span class="avatar bg-blue-lt">
                                    <i class="ti ti-chart-pie"></i>
                                </span>
                            </div>
                            <div>
                                <h4 class="m-0">Test Pass Rate</h4>
                                <p class="text-muted">Last 30 days</p>
                            </div>
                            <div class="ms-auto">
                                <span class="text-success d-inline-flex align-items-center lh-1">
                                    85% <i class="ti ti-trending-up ms-1"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="row g-2 align-items-center mb-2">
                                <div class="col-auto">
                                    <span class="badge bg-success"></span>
                                </div>
                                <div class="col">
                                    <span>Passed Tests</span>
                                </div>
                                <div class="col-auto">
                                    <span class="text-muted">17</span>
                                </div>
                            </div>
                            <div class="progress mb-3" style="height: 8px;">
                                <div class="progress-bar bg-success" style="width: 85%" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" aria-label="85% Passed">
                                    <span class="visually-hidden">85% Passed</span>
                                </div>
                            </div>
                            <div class="row g-2 align-items-center mb-2">
                                <div class="col-auto">
                                    <span class="badge bg-danger"></span>
                                </div>
                                <div class="col">
                                    <span>Failed Tests</span>
                                </div>
                                <div class="col-auto">
                                    <span class="text-muted">3</span>
                                </div>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-danger" style="width: 15%" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" aria-label="15% Failed">
                                    <span class="visually-hidden">15% Failed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Test Types Distribution</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="d-flex mb-2">
                                        <div class="me-2">
                                            <span class="badge bg-primary"></span>
                                        </div>
                                        <div>Compressive Strength</div>
                                        <div class="ms-auto">45%</div>
                                    </div>
                                    <div class="progress mb-3" style="height: 6px;">
                                        <div class="progress-bar bg-primary" style="width: 45%" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                            <span class="visually-hidden">45%</span>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex mb-2">
                                        <div class="me-2">
                                            <span class="badge bg-info"></span>
                                        </div>
                                        <div>Slump Test</div>
                                        <div class="ms-auto">25%</div>
                                    </div>
                                    <div class="progress mb-3" style="height: 6px;">
                                        <div class="progress-bar bg-info" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <span class="visually-hidden">25%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="d-flex mb-2">
                                        <div class="me-2">
                                            <span class="badge bg-warning"></span>
                                        </div>
                                        <div>Air Content</div>
                                        <div class="ms-auto">15%</div>
                                    </div>
                                    <div class="progress mb-3" style="height: 6px;">
                                        <div class="progress-bar bg-warning" style="width: 15%" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                            <span class="visually-hidden">15%</span>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex mb-2">
                                        <div class="me-2">
                                            <span class="badge bg-success"></span>
                                        </div>
                                        <div>Other Tests</div>
                                        <div class="ms-auto">15%</div>
                                    </div>
                                    <div class="progress mb-3" style="height: 6px;">
                                        <div class="progress-bar bg-success" style="width: 15%" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                            <span class="visually-hidden">15%</span>
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

<!-- Add New Test Modal -->
<div class="modal modal-blur fade" id="modal-add-test" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Test</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label required">Mix Design</label>
                    <select class="form-select" required>
                        <option value="">Select Mix Design</option>
                        @foreach($mixDesigns as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Test Type</label>
                            <select class="form-select" required>
                                <option value="">Select Test Type</option>
                                @foreach($testTypes as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Start Date</label>
                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Batch Number</label>
                            <input type="text" class="form-control" placeholder="e.g. B-20230815-001">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Sample ID</label>
                            <input type="text" class="form-control" placeholder="e.g. S-001">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Test Specifications</label>
                    <textarea class="form-control" rows="3" placeholder="Enter test specifications and requirements"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Responsible Technician</label>
                    <select class="form-select">
                        <option value="">Select Technician</option>
                        <option value="1">Ahmad Fauzi</option>
                        <option value="2">Budi Santoso</option>
                        <option value="3">Citra Dewi</option>
                        <option value="4">Dian Pratama</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox">
                        <span class="form-check-label">Schedule automatic reminders for 7-day and 28-day tests</span>
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                    <i class="ti ti-plus me-2"></i>
                    Create New Test
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Update Test Modal -->
<div class="modal modal-blur fade" id="modal-update-test" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Test Results</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Test ID</label>
                            <input type="text" class="form-control" value="TEST-202308-001" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Mix Design</label>
                            <input type="text" class="form-control" value="Standard K-225 Mix" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Test Type</label>
                            <input type="text" class="form-control" value="Compressive Strength" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Test Date</label>
                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Test Results</label>
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="number" class="form-control" placeholder="Specimen 1 (MPa)" step="0.1">
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" placeholder="Specimen 2 (MPa)" step="0.1">
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" placeholder="Specimen 3 (MPa)" step="0.1">
                        </div>
                    </div>
                    <small class="form-hint">Enter the compressive strength values for each test specimen</small>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Average Result</label>
                            <div class="input-group">
                                <input type="number" class="form-control" placeholder="Average" step="0.1">
                                <span class="input-group-text">MPa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Test Status</label>
                            <select class="form-select">
                                <option value="passed">Passed</option>
                                <option value="failed">Failed</option>
                                <option value="inconclusive">Inconclusive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Notes & Observations</label>
                    <textarea class="form-control" rows="3" placeholder="Enter any notes or observations about the test"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Attachments</label>
                    <input type="file" class="form-control">
                    <small class="form-hint">Upload test photos, charts, or other relevant documents</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                    <i class="ti ti-device-floppy me-2"></i>
                    Save Test Results
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

