@extends('layouts.app')

@section('title', 'Edit Strength Test')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Strength Test
                </h2>
                <div class="text-muted mt-1">Test ID: ST-{{ sprintf('%04d', $id) }}</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.strength-testing.detail', $id) }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-2"></i>
                        Back to Details
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <form action="#" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Sample ID</label>
                            <input type="text" class="form-control" name="sample_id" value="ST-{{ sprintf('%04d', $id) }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Sample Date</label>
                            <input type="date" class="form-control" name="sample_date" value="{{ now()->subDays(rand(30, 60))->format('Y-m-d') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Batch Number</label>
                            <input type="text" class="form-control" name="batch_number" value="B{{ now()->subDays(rand(30, 60))->format('ymd') }}{{ sprintf('%03d', rand(1, 100)) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Mix Design</label>
                            <select class="form-select" name="mix_design" required>
                                <option value="">Select Mix Design</option>
                                <option value="K-225" {{ rand(0, 1) ? 'selected' : '' }}>K-225</option>
                                <option value="K-250" {{ rand(0, 1) ? 'selected' : '' }}>K-250</option>
                                <option value="K-300" {{ rand(0, 1) ? 'selected' : '' }}>K-300</option>
                                <option value="K-350" {{ rand(0, 1) ? 'selected' : '' }}>K-350</option>
                                <option value="K-400" {{ rand(0, 1) ? 'selected' : '' }}>K-400</option>
                                <option value="K-450">K-450</option>
                                <option value="K-500">K-500</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Project</label>
                            <select class="form-select" name="project_id" required>
                                <option value="">Select Project</option>
                                @php
                                    $projects = ['Highway Bridge Project', 'Commercial Building A', 'Residential Complex B', 'Government Office C', 'Industrial Facility D'];
                                    $selectedProject = array_rand($projects);
                                @endphp
                                @foreach($projects as $key => $project)
                                    <option value="{{ $key + 1 }}" {{ $key == $selectedProject ? 'selected' : '' }}>{{ $project }}</option>
                                @endforeach
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
                                <option value="cylinder" selected>Cylinder (15x30 cm)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Curing Method</label>
                            <select class="form-select" name="curing_method" required>
                                <option value="water" selected>Water Curing</option>
                                <option value="membrane">Membrane Curing</option>
                                <option value="steam">Steam Curing</option>
                                <option value="air">Air Curing</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Test Ages (days)</label>
                            <div class="form-selectgroup">
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="test_ages[]" value="3" class="form-selectgroup-input" checked>
                                    <span class="form-selectgroup-label">3</span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="test_ages[]" value="7" class="form-selectgroup-input" checked>
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
                            <textarea class="form-control" name="notes" rows="3">Sample taken from truck discharge at site entrance. Weather conditions: Sunny, 32°C.</textarea>
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
                                    <input type="number" class="form-control" name="slump" value="{{ rand(80, 120) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Temperature (°C)</label>
                                    <input type="number" class="form-control" name="temperature" step="0.1" value="{{ rand(28, 35) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Air Content (%)</label>
                                    <input type="number" class="form-control" name="air_content" step="0.1" value="{{ number_format(rand(15, 35) / 10, 1) }}">
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
                                        <option value="truck" selected>Truck Discharge</option>
                                        <option value="pump">Pump Discharge</option>
                                        <option value="placement">Placement Point</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Location Details</label>
                                    <input type="text" class="form-control" name="location_details" value="Site entrance, Building A foundation">
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
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Age (days)</th>
                                        <th>Test Date</th>
                                        <th>Specimen ID</th>
                                        <th>Weight (kg)</th>
                                        <th>Failure Load (kN)</th>
                                        <th>Strength (MPa)</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sampleDate = now()->subDays(rand(30, 60));
                                        $ages = [3, 7, 28];
                                        $statuses = ['Passed', 'Passed', 'Passed'];
                                    @endphp

                                    @foreach($ages as $index => $age)
                                        @php
                                            $testDate = (clone $sampleDate)->addDays($age);
                                            $weight = number_format(rand(78, 82) / 10, 1);
                                            $strength = $age == 3 ? rand(120, 180) / 10 : ($age == 7 ? rand(200, 260) / 10 : rand(300, 380) / 10);
                                            $failureLoad = round($strength * 17.67, 1); // Approximate conversion for 15cm cylinder
                                            $status = $statuses[$index];
                                        @endphp
                                        <tr>
                                            <td>{{ $age }}</td>
                                            <td>
                                                <input type="date" class="form-control" name="test_date_{{ $age }}" value="{{ $testDate->format('Y-m-d') }}">
                                            </td>
                                            <td>ST-{{ sprintf('%04d', $id) }}-{{ $index + 1 }}</td>
                                            <td>
                                                <input type="number" class="form-control" name="weight_{{ $age }}" value="{{ $weight }}" step="0.1">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="load_{{ $age }}" value="{{ $failureLoad }}" step="0.1">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="strength_{{ $age }}" value="{{ $strength }}" step="0.1">
                                            </td>
                                            <td>
                                                <select class="form-select" name="status_{{ $age }}">
                                                    <option value="Passed" {{ $status == 'Passed' ? 'selected' : '' }}>Passed</option>
                                                    <option value="Failed" {{ $status == 'Failed' ? 'selected' : '' }}>Failed</option>
                                                    <option value="Pending" {{ $status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="form-footer mt-3">
                    <button type="submit" class="btn btn-primary">Update Strength Test</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
