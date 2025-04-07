@extends('layouts.app')

@section('title', 'Create Quality Control Test')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Create New Quality Control Test
                </h2>
                <div class="text-muted mt-1">Record a new quality control test</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.quality-control') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left me-2"></i>
                        Back to Quality Control
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
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Test Type</label>
                        <select class="form-select" required>
                            <option value="">Select Test Type</option>
                            <option value="slump">Slump Test</option>
                            <option value="compression">Compression Test</option>
                            <option value="air-content">Air Content</option>
                            <option value="temperature">Temperature</option>
                            <option value="unit-weight">Unit Weight</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Test Date</label>
                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Batch Number</label>
                        <input type="text" class="form-control" placeholder="e.g. B230501001" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Mix Design</label>
                        <select class="form-select" required>
                            <option value="">Select Mix Design</option>
                            <option value="K-225">K-225</option>
                            <option value="K-250">K-250</option>
                            <option value="K-300">K-300</option>
                            <option value="K-350">K-350</option>
                            <option value="K-400">K-400</option>
                            <option value="K-450">K-450</option>
                            <option value="K-500">K-500</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Branch/Plant</label>
                        <select class="form-select" required>
                            <option value="">Select Branch</option>
                            <option value="1">Jakarta Plant</option>
                            <option value="2">Surabaya Plant</option>
                            <option value="3">Bandung Plant</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Technician</label>
                        <select class="form-select" required>
                            <option value="">Select Technician</option>
                            <option value="1">Ahmad Fauzi</option>
                            <option value="2">Budi Santoso</option>
                            <option value="3">Dewi Putri</option>
                            <option value="4">Eko Prasetyo</option>
                            <option value="5">Fitri Handayani</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Production Order</label>
                        <input type="text" class="form-control" placeholder="e.g. PO230501001">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Customer</label>
                        <input type="text" class="form-control" placeholder="e.g. PT Konstruksi Jaya">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Project</label>
                    <input type="text" class="form-control" placeholder="e.g. Pembangunan Gedung XYZ">
                </div>
                
                <div class="hr-text">Test Results</div>
                
                <!-- Dynamic test fields based on test type selection -->
                <div id="slump-test-fields">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label required">Slump Value (cm)</label>
                            <input type="number" step="0.1" class="form-control" placeholder="e.g. 12.5">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Target Slump (cm)</label>
                            <input type="number" step="0.1" class="form-control" placeholder="e.g. 12.0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label required">Status</label>
                            <select class="form-select">
                                <option value="passed">Passed</option>
                                <option value="failed">Failed</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea class="form-control" rows="3" placeholder="Additional notes or observations"></textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Attachments</label>
                    <input type="file" class="form-control">
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Save Test Record</button>
            </div>
        </form>
    </div>
</div>
@endsection
