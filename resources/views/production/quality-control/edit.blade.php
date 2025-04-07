@extends('layouts.app')

@section('title', 'Edit Quality Control Test')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Quality Control Test
                </h2>
                <div class="text-muted mt-1">Test ID: QC{{ sprintf('%05d', $id) }}</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                                        <a href="{{ route('production.quality-control.detail', $id) }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left me-2"></i>
                        Back to Test Details
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <form action="#" method="post" class="card">
            <div class="card-header">
                <h3 class="card-title">Test Information</h3>
            </div>
            <div class="card-body">
                @php
                $testTypes = ['Slump Test', 'Compression Test', 'Air Content', 'Temperature', 'Unit Weight'];
                $testType = $testTypes[array_rand($testTypes)];
                $mixDesigns = ['K-225', 'K-250', 'K-300', 'K-350', 'K-400', 'K-450', 'K-500'];
                $mixDesign = $mixDesigns[array_rand($mixDesigns)];
                $technicians = ['Ahmad Fauzi', 'Budi Santoso', 'Dewi Putri', 'Eko Prasetyo', 'Fitri Handayani'];
                $technician = $technicians[array_rand($technicians)];
                $branches = ['Jakarta Plant', 'Surabaya Plant', 'Bandung Plant'];
                $branch = $branches[array_rand($branches)];
                $customers = ['PT Konstruksi Jaya', 'CV Bangun Persada', 'PT Maju Bersama', 'PT Karya Utama', 'PT Sinar Abadi'];
                $customer = $customers[array_rand($customers)];
                $projects = ['Pembangunan Gedung XYZ', 'Jalan Tol Dalam Kota', 'Apartemen Grand City', 'Perumahan Griya Indah', 'Jembatan Sungai Ciliwung'];
                $project = $projects[array_rand($projects)];
                $date = date('Y-m-d', strtotime("-" . rand(0, 30) . " days"));
                $batchNo = 'B' . date('ymd', strtotime($date)) . sprintf('%03d', rand(1, 100));
                $poNumber = 'PO' . date('ymd', strtotime($date)) . sprintf('%03d', rand(1, 100));
                @endphp
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Test Type</label>
                        <select class="form-select" required>
                            @foreach($testTypes as $type)
                                <option value="{{ strtolower(str_replace(' ', '-', $type)) }}" {{ $type == $testType ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Test Date</label>
                        <input type="date" class="form-control" value="{{ $date }}" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Batch Number</label>
                        <input type="text" class="form-control" value="{{ $batchNo }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Mix Design</label>
                        <select class="form-select" required>
                            @foreach($mixDesigns as $design)
                                <option value="{{ $design }}" {{ $design == $mixDesign ? 'selected' : '' }}>{{ $design }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Branch/Plant</label>
                        <select class="form-select" required>
                            <option value="">Select Branch</option>
                            @foreach($branches as $index => $branchName)
                                <option value="{{ $index + 1 }}" {{ $branchName == $branch ? 'selected' : '' }}>{{ $branchName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Technician</label>
                        <select class="form-select" required>
                            <option value="">Select Technician</option>
                            @foreach($technicians as $index => $techName)
                                <option value="{{ $index + 1 }}" {{ $techName == $technician ? 'selected' : '' }}>{{ $techName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Production Order</label>
                        <input type="text" class="form-control" value="{{ $poNumber }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Customer</label>
                        <input type="text" class="form-control" value="{{ $customer }}">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Project</label>
                    <input type="text" class="form-control" value="{{ $project }}">
                </div>
                
                <div class="hr-text">Test Results</div>
                
                @if($testType == 'Slump Test')
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Slump Value (cm)</label>
                        <input type="number" step="0.1" class="form-control" value="{{ rand(80, 150) / 10 }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Target Slump (cm)</label>
                        <input type="number" step="0.1" class="form-control" value="12.0">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Status</label>
                        <select class="form-select">
                            <option value="passed" selected>Passed</option>
                            <option value="failed">Failed</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </div>
                @elseif($testType == 'Compression Test')
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Specimen Age (days)</label>
                        <input type="number" class="form-control" value="28">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Compressive Strength (MPa)</label>
                        <input type="number" step="0.1" class="form-control" value="{{ rand(200, 500) / 10 }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Status</label>
                        <select class="form-select">
                            <option value="passed" selected>Passed</option>
                            <option value="failed">Failed</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Specimen 1 (MPa)</label>
                        <input type="number" step="0.1" class="form-control" value="{{ rand(200, 500) / 10 }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Specimen 2 (MPa)</label>
                        <input type="number" step="0.1" class="form-control" value="{{ rand(200, 500) / 10 }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Specimen 3 (MPa)</label>
                        <input type="number" step="0.1" class="form-control" value="{{ rand(200, 500) / 10 }}">
                    </div>
                </div>
                @elseif($testType == 'Air Content')
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Air Content (%)</label>
                        <input type="number" step="0.1" class="form-control" value="{{ rand(15, 60) / 10 }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Target Air Content (%)</label>
                        <input type="number" step="0.1" class="form-control" value="4.5">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Status</label>
                        <select class="form-select">
                            <option value="passed" selected>Passed</option>
                            <option value="failed">Failed</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </div>
                @elseif($testType == 'Temperature')
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Concrete Temperature (°C)</label>
                        <input type="number" step="0.1" class="form-control" value="{{ rand(280, 350) / 10 }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Ambient Temperature (°C)</label>
                        <input type="number" step="0.1" class="form-control" value="{{ rand(250, 330) / 10 }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Status</label>
                        <select class="form-select">
                            <option value="passed" selected>Passed</option>
                            <option value="failed">Failed</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </div>
                @elseif($testType == 'Unit Weight')
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Unit Weight (kg/m³)</label>
                        <input type="number" class="form-control" value="{{ rand(2300, 2500) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Target Unit Weight (kg/m³)</label>
                        <input type="number" class="form-control" value="2400">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Status</label>
                        <select class="form-select">
                            <option value="passed" selected>Passed</option>
                            <option value="failed">Failed</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </div>
                @endif
                
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea class="form-control" rows="3">
                        @php
                        $notes = [
                            'Test conducted according to standard procedures. No anomalies detected.',
                            'Slight variation in results but within acceptable range.',
                            'Sample taken from truck mixer after 50% discharge.',
                            'Weather conditions: Sunny, 30°C, humidity 75%.',
                            'Test performed on site at customer request.'
                        ];
                        echo $notes[array_rand($notes)];
                        @endphp
                    </textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Attachments</label>
                    <input type="file" class="form-control">
                    <div class="mt-2">
                        <div class="d-flex align-items-center mb-2">
                            <i class="ti ti-file-text text-primary me-2"></i>
                            <span>Test_Report_QC{{ sprintf('%05d', $id) }}.pdf</span>
                            <button type="button" class="btn btn-sm btn-outline-danger ms-auto">
                                <i class="ti ti-trash"></i>
                            </button>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="ti ti-file-spreadsheet text-success me-2"></i>
                            <span>Test_Data_QC{{ sprintf('%05d', $id) }}.xlsx</span>
                            <button type="button" class="btn btn-sm btn-outline-danger ms-auto">
                                <i class="ti ti-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('production.quality-control.detail', $id) }}" class="btn btn-outline-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection

