@extends('layouts.app')

@section('title', 'Batch Plant Production History')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Batch Plant Production History
                </h2>
                <div class="text-muted mt-1">View and analyze historical batch plant production data</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <span class="d-none d-sm-inline">
                        <div class="btn-group" role="group">
                            <a href="{{ route('production.batch-plant.dashboard') }}" class="btn btn-outline-primary">Live View</a>
                            <button type="button" class="btn btn-outline-primary active">History</button>
                        </div>
                    </span>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                        <i class="ti ti-file-export icon"></i>
                        Export Data
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <!-- Filters -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label">Date Range</label>
                                <select class="form-select">
                                    <option value="today">Today</option>
                                    <option value="yesterday">Yesterday</option>
                                    <option value="last7" selected>Last 7 Days</option>
                                    <option value="last30">Last 30 Days</option>
                                    <option value="custom">Custom Range</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Mix Design</label>
                                <select class="form-select">
                                    <option value="all" selected>All Mix Designs</option>
                                    <option value="k250">K-250</option>
                                    <option value="k300">K-300</option>
                                    <option value="k350">K-350</option>
                                    <option value="k400">K-400</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Customer</label>
                                <select class="form-select">
                                    <option value="all" selected>All Customers</option>
                                    <option value="1">PT Konstruksi Prima</option>
                                    <option value="2">CV Bangun Jaya</option>
                                    <option value="3">PT Wijaya Karya</option>
                                    <option value="4">PT Adhi Karya</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option value="all" selected>All Statuses</option>
                                    <option value="completed">Completed</option>
                                    <option value="rejected">Rejected</option>
                                    <option value="adjusted">Adjusted</option>
                                </select>
                            </div>
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-primary">
                                    <i class="ti ti-filter me-1"></i>
                                    Apply Filters
                                </button>
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="ti ti-refresh me-1"></i>
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Production Summary -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Production Summary (Last 7 Days)</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-blue text-white avatar">
                                                    <i class="ti ti-truck-delivery"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Total Production
                                                </div>
                                                <div class="h3 mb-0">
                                                    1,248 m³
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
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
                                                    Completed Batches
                                                </div>
                                                <div class="h3 mb-0">
                                                    156
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-red text-white avatar">
                                                    <i class="ti ti-x"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Rejected Batches
                                                </div>
                                                <div class="h3 mb-0">
                                                    3
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-yellow text-white avatar">
                                                    <i class="ti ti-adjustments"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Adjusted Batches
                                                </div>
                                                <div class="h3 mb-0">
                                                    12
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

            <!-- Production History Table -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Production History</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Batch ID</th>
                                        <th>Date & Time</th>
                                        <th>Mix Design</th>
                                        <th>Volume</th>
                                        <th>Customer</th>
                                        <th>Project</th>
                                        <th>Status</th>
                                        <th class="w-1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $statuses = ['Completed', 'Completed', 'Completed', 'Adjusted', 'Completed', 'Rejected', 'Completed', 'Completed', 'Adjusted', 'Completed'];
                                        $mixDesigns = ['K-350', 'K-250', 'K-400', 'K-300', 'K-350', 'K-250', 'K-400', 'K-300', 'K-350', 'K-400'];
                                        $volumes = [8, 6, 12, 8, 10, 6, 8, 12, 8, 10];
                                        $customers = ['PT Konstruksi Prima', 'CV Bangun Jaya', 'PT Wijaya Karya', 'PT Adhi Karya', 'PT Konstruksi Prima', 'CV Bangun Jaya', 'PT Wijaya Karya', 'PT Adhi Karya', 'PT Konstruksi Prima', 'PT Wijaya Karya'];
                                        $projects = ['Apartment Tower B', 'Ruko Jaya', 'Highway Project', 'Office Building', 'Apartment Tower A', 'Housing Complex', 'Bridge Construction', 'Mall Development', 'Apartment Tower C', 'Dam Project'];
                                        
                                        for($i = 0; $i < 10; $i++) {
                                            $date = date('Y-m-d', strtotime('-' . $i . ' days'));
                                            $time = rand(7, 16) . ':' . str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);
                                            $batchId = 'BP-' . str_replace('-', '', $date) . '-' . str_pad(rand(1, 99), 3, '0', STR_PAD_LEFT);
                                            $status = $statuses[$i];
                                            $statusClass = $status == 'Completed' ? 'bg-green' : ($status == 'Rejected' ? 'bg-red' : 'bg-yellow');
                                    @endphp
                                    <tr>
                                        <td>{{ $batchId }}</td>
                                        <td>{{ $date }} {{ $time }}</td>
                                        <td>{{ $mixDesigns[$i] }}</td>
                                        <td>{{ $volumes[$i] }} m³</td>
                                        <td>{{ $customers[$i] }}</td>
                                        <td>{{ $projects[$i] }}</td>
                                        <td><span class="badge {{ $statusClass }}">{{ $status }}</span></td>
                                                                                <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Details">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Download Report">
                                                    <i class="ti ti-download"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        }
                                    @endphp
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex mt-4">
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
    </div>
</div>

<!-- Export Data Modal -->
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Production History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Report Type</label>
                    <select class="form-select">
                        <option value="1">Batch Production Report</option>
                        <option value="2">Material Consumption Report</option>
                        <option value="3">Equipment Performance Report</option>
                        <option value="4">Quality Parameters Report</option>
                        <option value="5">Alerts and Events Report</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" value="{{ date('Y-m-d', strtotime('-7 days')) }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Format</label>
                    <div class="form-selectgroup">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="format" value="csv" class="form-selectgroup-input" checked>
                            <span class="form-selectgroup-label">CSV</span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="format" value="excel" class="form-selectgroup-input">
                            <span class="form-selectgroup-label">Excel</span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="format" value="pdf" class="form-selectgroup-input">
                            <span class="form-selectgroup-label">PDF</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </a>
                <a href="#" class="btn btn-primary ms-auto">
                    <i class="ti ti-file-export icon"></i>
                    Export Report
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

