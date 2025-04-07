@extends('layouts.app')

@section('title', 'Create New Strength Test')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Create New Strength Test
                </h2>
                <div class="text-muted mt-1">Record a new concrete strength test</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.strength-testing') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-2"></i>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <form action="#" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Sample ID</label>
                            <input type="text" class="form-control" name="sample_id" value="ST-{{ sprintf('%04d', rand(1000, 9999)) }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Sample Date</label>
                            <input type="date" class="form-control" name="sample_date" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Batch Number</label>
                            <input type="text" class="form-control" name="batch_number" placeholder="Enter batch number" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Mix Design</label>
                            <select class="form-select" name="mix_design" required>
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
                        <div class="mb-3">
                            <label class="form-label required">Project</label>
                            <select class="form-select" name="project_id" required>
                                <option value="">Select Project</option>
                                <option value="1">Highway Bridge Project</option>
                                <option value="2">Commercial Building A</option>
                                <option value="3">Residential Complex B</option>
                                <option value="4">Government Office C</option>
                                <option value="5">Industrial Facility D</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Number of Specimens</label>
                            <input type="number" class="form-control" name="specimen_count" value="3" min="1" max="10" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Specimen Type</label>
                            <select class="form-select" name="specimen_type" required>
                                <option value="cube">Cube (15x15x15 cm)</option>
                                <option value="cylinder">Cylinder (15x30 cm)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Curing Method</label>
                            <select class="form-select" name="curing_method" required>
                                <option value="water">Water Curing</option>
                                <option value="membrane">Membrane Curing</option>
                                <option value="steam">Steam Curing</option>
                                <option value="air">Air Curing</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Test Ages (days)</label>
                            <div class="form-selectgroup">
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="test_ages[]" value="3" class="form-selectgroup-input">
                                    <span class="form-selectgroup-label">3</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="test_ages[]" value="7" class="form-selectgroup-input">
                                    <span class="form-selectgroup-label">7</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="test_ages[]" value="14" class="form-selectgroup-input">
                                    <span class="form-selectgroup-label">14</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="test_ages[]" value="21" class="form-selectgroup-input">
                                    <span class="form-selectgroup-label">21</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="test_ages[]" value="28" class="form-selectgroup-input" checked>
                                    <span class="form-selectgroup-label">28</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="test_ages[]" value="56" class="form-selectgroup-input">
                                    <span class="form-selectgroup-label">56</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="test_ages[]" value="90" class="form-selectgroup-input">
                                    <span class="form-selectgroup-label">90</span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Additional Notes</label>
                            <textarea class="form-control" name="notes" rows="3" placeholder="Enter any additional information about the sample"></textarea>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Fresh Concrete Properties</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Slump (mm)</label>
                                    <input type="number" class="form-control" name="slump" placeholder="Enter slump value">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Temperature (°C)</label>
                                    <input type="number" class="form-control" name="temperature" step="0.1" placeholder="Enter concrete temperature">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Air Content (%)</label>
                                    <input type="number" class="form-control" name="air_content" step="0.1" placeholder="Enter air content">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Sampling Location</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Location Type</label>
                                    <select class="form-select" name="location_type">
                                        <option value="plant">Batch Plant</option>
                                        <option value="truck">Truck Discharge</option>
                                        <option value="pump">Pump Discharge</option>
                                        <option value="placement">Placement Point</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Location Details</label>
                                    <input type="text" class="form-control" name="location_details" placeholder="Enter specific location details">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-footer mt-3">
                    <button type="submit" class="btn btn-primary">Create Strength Test</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
