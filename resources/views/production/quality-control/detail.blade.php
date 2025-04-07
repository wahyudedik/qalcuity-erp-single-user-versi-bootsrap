@extends('layouts.app')

@section('title', 'Quality Control Test Details')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Quality Control Test Details
                </h2>
                <div class="text-muted mt-1">Test ID: QC{{ sprintf('%05d', $id) }}</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.quality-control') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left me-2"></i>
                        Back to Quality Control
                    </a>
                    <a href="{{ route('production.quality-control.edit', $id) }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-edit me-2"></i>
                        Edit Test
                    </a>
                    <button type="button" class="btn btn-primary d-none d-sm-inline-block" onclick="window.print();">
                        <i class="ti ti-printer me-2"></i>
                        Print Report
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Test Information</h3>
                <div class="card-actions">
                    @php
                    $statuses = ['passed', 'failed', 'pending'];
                    $status = $statuses[array_rand($statuses)];
                    $statusBadges = [
                        'passed' => 'bg-success',
                        'failed' => 'bg-danger',
                        'pending' => 'bg-warning'
                    ];
                    @endphp
                    <span class="badge {{ $statusBadges[$status] }} me-2">{{ ucfirst($status) }}</span>
                </div>
            </div>
            <div class="card-body">
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Test ID</div>
                        <div class="datagrid-content">QC{{ sprintf('%05d', $id) }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Test Type</div>
                        <div class="datagrid-content">
                            @php
                            $testTypes = ['Slump Test', 'Compression Test', 'Air Content', 'Temperature', 'Unit Weight'];
                            $testType = $testTypes[array_rand($testTypes)];
                            @endphp
                            {{ $testType }}
                        </div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Test Date</div>
                        <div class="datagrid-content">{{ date('Y-m-d', strtotime("-" . rand(0, 30) . " days")) }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Batch Number</div>
                        <div class="datagrid-content">B{{ date('ymd', strtotime("-" . rand(0, 30) . " days")) }}{{ sprintf('%03d', rand(1, 100)) }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Mix Design</div>
                        <div class="datagrid-content">
                            @php
                                                        $mixDesigns = ['K-225', 'K-250', 'K-300', 'K-350', 'K-400', 'K-450', 'K-500'];
                            $mixDesign = $mixDesigns[array_rand($mixDesigns)];
                            @endphp
                            {{ $mixDesign }}
                        </div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Branch/Plant</div>
                        <div class="datagrid-content">
                            @php
                            $branches = ['Jakarta Plant', 'Surabaya Plant', 'Bandung Plant'];
                            $branch = $branches[array_rand($branches)];
                            @endphp
                            {{ $branch }}
                        </div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Technician</div>
                        <div class="datagrid-content">
                            @php
                            $technicians = ['Ahmad Fauzi', 'Budi Santoso', 'Dewi Putri', 'Eko Prasetyo', 'Fitri Handayani'];
                            $technician = $technicians[array_rand($technicians)];
                            @endphp
                            {{ $technician }}
                        </div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Production Order</div>
                        <div class="datagrid-content">PO{{ date('ymd', strtotime("-" . rand(0, 30) . " days")) }}{{ sprintf('%03d', rand(1, 100)) }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Customer</div>
                        <div class="datagrid-content">
                            @php
                            $customers = ['PT Konstruksi Jaya', 'CV Bangun Persada', 'PT Maju Bersama', 'PT Karya Utama', 'PT Sinar Abadi'];
                            $customer = $customers[array_rand($customers)];
                            @endphp
                            {{ $customer }}
                        </div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Project</div>
                        <div class="datagrid-content">
                            @php
                            $projects = ['Pembangunan Gedung XYZ', 'Jalan Tol Dalam Kota', 'Apartemen Grand City', 'Perumahan Griya Indah', 'Jembatan Sungai Ciliwung'];
                            $project = $projects[array_rand($projects)];
                            @endphp
                            {{ $project }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Test Results</h3>
            </div>
            <div class="card-body">
                @if($testType == 'Slump Test')
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Slump Value (cm)</div>
                        <div class="datagrid-content">{{ rand(80, 150) / 10 }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Target Slump (cm)</div>
                        <div class="datagrid-content">12.0</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Tolerance Range (cm)</div>
                        <div class="datagrid-content">± 2.5</div>
                    </div>
                </div>
                @elseif($testType == 'Compression Test')
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Specimen Age (days)</div>
                        <div class="datagrid-content">28</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Compressive Strength (MPa)</div>
                        <div class="datagrid-content">{{ rand(200, 500) / 10 }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Target Strength (MPa)</div>
                        <div class="datagrid-content">
                            @php
                                $targetStrength = substr($mixDesign, 2);
                            @endphp
                            {{ $targetStrength * 0.1 }}
                        </div>
                    </div>
                </div>
                <div class="datagrid mt-3">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Specimen 1 (MPa)</div>
                        <div class="datagrid-content">{{ rand(200, 500) / 10 }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Specimen 2 (MPa)</div>
                        <div class="datagrid-content">{{ rand(200, 500) / 10 }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Specimen 3 (MPa)</div>
                        <div class="datagrid-content">{{ rand(200, 500) / 10 }}</div>
                    </div>
                </div>
                @elseif($testType == 'Air Content')
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Air Content (%)</div>
                        <div class="datagrid-content">{{ rand(15, 60) / 10 }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Target Air Content (%)</div>
                        <div class="datagrid-content">4.5</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Tolerance Range (%)</div>
                        <div class="datagrid-content">± 1.5</div>
                    </div>
                </div>
                @elseif($testType == 'Temperature')
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Concrete Temperature (°C)</div>
                        <div class="datagrid-content">{{ rand(280, 350) / 10 }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Ambient Temperature (°C)</div>
                        <div class="datagrid-content">{{ rand(250, 330) / 10 }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Maximum Allowed (°C)</div>
                        <div class="datagrid-content">35.0</div>
                    </div>
                </div>
                @elseif($testType == 'Unit Weight')
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Unit Weight (kg/m³)</div>
                        <div class="datagrid-content">{{ rand(2300, 2500) }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Target Unit Weight (kg/m³)</div>
                        <div class="datagrid-content">2400</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Tolerance Range (kg/m³)</div>
                        <div class="datagrid-content">± 50</div>
                    </div>
                </div>
                @endif

                <div class="mt-4">
                    <h4>Notes</h4>
                    <p>
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
                    </p>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Attachments & Documentation</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <a href="#" class="d-block">
                            <img src="https://placehold.co/800x600/e9ecef/adb5bd?text=Test+Photo+1" class="img-fluid rounded" alt="Test Photo">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="#" class="d-block">
                            <img src="https://placehold.co/800x600/e9ecef/adb5bd?text=Test+Photo+2" class="img-fluid rounded" alt="Test Photo">
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="#" class="d-block">
                            <img src="https://placehold.co/800x600/e9ecef/adb5bd?text=Test+Photo+3" class="img-fluid rounded" alt="Test Photo">
                        </a>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="ti ti-file-text text-primary me-2"></i>
                                <div>
                                    <a href="#" class="text-reset">Test_Report_QC{{ sprintf('%05d', $id) }}.pdf</a>
                                    <div class="text-muted">PDF Document, 1.2 MB</div>
                                </div>
                                <a href="#" class="btn btn-icon ms-auto">
                                    <i class="ti ti-download"></i>
                                </a>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="ti ti-file-spreadsheet text-success me-2"></i>
                                <div>
                                    <a href="#" class="text-reset">Test_Data_QC{{ sprintf('%05d', $id) }}.xlsx</a>
                                    <div class="text-muted">Excel Spreadsheet, 845 KB</div>
                                </div>
                                <a href="#" class="btn btn-icon ms-auto">
                                    <i class="ti ti-download"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Approval & Verification</h3>
            </div>
            <div class="card-body">
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Tested By</div>
                        <div class="datagrid-content">{{ $technician }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Verified By</div>
                        <div class="datagrid-content">
                            @php
                            $verifiers = ['Hendra Wijaya', 'Siti Aminah', 'Rudi Hartono'];
                            $verifier = $verifiers[array_rand($verifiers)];
                            @endphp
                            {{ $verifier }}
                        </div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Approved By</div>
                        <div class="datagrid-content">
                            @php
                            $approvers = ['Ir. Bambang Supriyadi', 'Dr. Anita Kusuma', 'Ir. Darmawan'];
                            $approver = $approvers[array_rand($approvers)];
                            @endphp
                            {{ $approver }}
                        </div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Verification Date</div>
                        <div class="datagrid-content">{{ date('Y-m-d', strtotime("-" . rand(0, 28) . " days")) }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Approval Date</div>
                        <div class="datagrid-content">{{ date('Y-m-d', strtotime("-" . rand(0, 25) . " days")) }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Certificate Number</div>
                        <div class="datagrid-content">QCC-{{ date('Y') }}-{{ sprintf('%04d', $id) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

