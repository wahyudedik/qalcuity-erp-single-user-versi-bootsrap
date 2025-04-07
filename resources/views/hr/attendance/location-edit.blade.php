@extends('layouts.app')

@section('title', 'Edit Attendance Location')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Edit Attendance Location
                    </h2>
                    <div class="text-muted mt-1">Update location settings for attendance tracking</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.attendance.locations') }}"
                            class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Locations
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
                    <form class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Location: Main Office</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Location Name</label>
                                        <input type="text" class="form-control" name="name" value="Main Office"
                                            required>
                                        <small class="form-hint">This name will be displayed to employees when clocking
                                            in/out</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Address</label>
                                        <textarea class="form-control" name="address" rows="2" required>123 Business Street, Jakarta</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label required">Latitude</label>
                                                <input type="text" class="form-control" name="latitude" value="-6.2088"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label required">Longitude</label>
                                                <input type="text" class="form-control" name="longitude" value="106.8456"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Allowed Radius</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="radius" value="100"
                                                min="10" max="1000" required>
                                            <span class="input-group-text">meters</span>
                                        </div>
                                        <small class="form-hint">Employees must be within this radius to clock
                                            in/out</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Branch</label>
                                        <select class="form-select" name="branch_id">
                                            <option value="">Select Branch (Optional)</option>
                                            <option value="1" selected>Main Branch</option>
                                            <option value="2">Branch 1</option>
                                            <option value="3">Branch 2</option>
                                        </select>
                                        <small class="form-hint">Associate this location with a branch</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="status" checked>
                                            <span class="form-check-label">Active</span>
                                        </label>
                                        <small class="form-hint d-block">Only active locations can be used for
                                            attendance</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Location on Map</label>
                                        <div class="alert alert-info mb-2">
                                            <div class="d-flex">
                                                <div>
                                                    <i class="ti ti-info-circle me-2"></i>
                                                </div>
                                                <div>
                                                    Click on the map to update the location coordinates or enter them
                                                    manually.
                                                </div>
                                            </div>
                                        </div>
                                        <div id="location-map" style="height: 300px; border-radius: 4px;">
                                            <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                                <div>
                                                    <i class="ti ti-map mb-2 d-block text-center"
                                                        style="font-size: 2rem;"></i>
                                                    <span>Map would be displayed here</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Search Address</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="address-search"
                                                placeholder="Search for an address">
                                            <button class="btn btn-outline-secondary" type="button">
                                                <i class="ti ti-search"></i>
                                            </button>
                                        </div>
                                        <small class="form-hint">Search for an address to find its coordinates</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Radius Visualization</label>
                                        <div class="form-selectgroup-boxes row mb-3">
                                            <div class="col-lg-6">
                                                <label class="form-selectgroup-item">
                                                    <input type="radio" name="radius_visualization" value="100"
                                                        class="form-selectgroup-input" checked>
                                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                                        <span class="me-3">
                                                            <span class="form-selectgroup-check"></span>
                                                        </span>
                                                        <span class="form-selectgroup-label-content">
                                                            <span class="form-selectgroup-title strong mb-1">Small</span>
                                                            <span class="d-block text-muted">100 meters radius</span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-selectgroup-item">
                                                    <input type="radio" name="radius_visualization" value="200"
                                                        class="form-selectgroup-input">
                                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                                        <span class="me-3">
                                                            <span class="form-selectgroup-check"></span>
                                                        </span>
                                                        <span class="form-selectgroup-label-content">
                                                            <span class="form-selectgroup-title strong mb-1">Medium</span>
                                                            <span class="d-block text-muted">200 meters radius</span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-selectgroup-item">
                                                    <input type="radio" name="radius_visualization" value="500"
                                                        class="form-selectgroup-input">
                                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                                        <span class="me-3">
                                                            <span class="form-selectgroup-check"></span>
                                                        </span>
                                                        <span class="form-selectgroup-label-content">
                                                            <span class="form-selectgroup-title strong mb-1">Large</span>
                                                            <span class="d-block text-muted">500 meters radius</span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-selectgroup-item">
                                                    <input type="radio" name="radius_visualization" value="custom"
                                                        class="form-selectgroup-input">
                                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                                        <span class="me-3">
                                                            <span class="form-selectgroup-check"></span>
                                                        </span>
                                                        <span class="form-selectgroup-label-content">
                                                            <span class="form-selectgroup-title strong mb-1">Custom</span>
                                                            <span class="d-block text-muted">Use value from input</span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="hr-text">Additional Information</div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Created At</label>
                                        <input type="text" class="form-control" value="2023-05-15 09:30:45" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Last Updated</label>
                                        <input type="text" class="form-control" value="2023-10-20 14:22:18" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Created By</label>
                                        <input type="text" class="form-control" value="Admin User" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Last Updated By</label>
                                        <input type="text" class="form-control" value="Admin User" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('hr.attendance.locations') }}" class="btn btn-link">Cancel</a>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    <i class="ti ti-device-floppy me-1"></i>
                                    Update Location
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Location Usage Statistics</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-primary text-white avatar">
                                                        <i class="ti ti-users"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        Assigned Employees
                                                    </div>
                                                    <div class="text-muted">
                                                        35
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
                                                        Successful Check-ins
                                                    </div>
                                                    <div class="text-muted">
                                                        1,245
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
                                                    <span class="bg-warning text-white avatar">
                                                        <i class="ti ti-alert-triangle"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        Outside Radius
                                                    </div>
                                                    <div class="text-muted">
                                                        87
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
                                                    <span class="bg-info text-white avatar">
                                                        <i class="ti ti-calendar"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        Days Active
                                                    </div>
                                                    <div class="text-muted">
                                                        189
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <h4>Attendance Trend</h4>
                                    <div id="attendance-trend-chart" style="height: 250px;">
                                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                            <div>
                                                <i class="ti ti-chart-line mb-2 d-block text-center"
                                                    style="font-size: 2rem;"></i>
                                                <span>Chart would be displayed here</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Outside Radius Incidents</h4>
                                    <div id="outside-radius-chart" style="height: 250px;">
                                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                            <div>
                                                <i class="ti ti-chart-bar mb-2 d-block text-center"
                                                    style="font-size: 2rem;"></i>
                                                <span>Chart would be displayed here</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Assigned Employees</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Employee</th>
                                            <th>Department</th>
                                            <th>Position</th>
                                            <th>Assigned Since</th>
                                            <th>Last Check-in</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar me-2"
                                                            style="background-image: url(https://placehold.co/128x128)"></span>
                                                        <div>
                                                            <div>Employee {{ $i }}</div>
                                                            <div class="text-muted">
                                                                EMP{{ str_pad($i, 4, '0', STR_PAD_LEFT) }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @php
                                                        $departments = ['Finance', 'HR', 'Production', 'Sales', 'IT'];
                                                    @endphp
                                                    {{ $departments[$i - 1] }}
                                                </td>
                                                <td>
                                                    @php
                                                        $positions = [
                                                            'Manager',
                                                            'Supervisor',
                                                            'Staff',
                                                            'Assistant',
                                                            'Director',
                                                        ];
                                                    @endphp
                                                    {{ $positions[$i - 1] }}
                                                </td>
                                                <td>{{ date('Y-m-d', strtotime('-' . $i * 30 . ' days')) }}</td>
                                                <td>{{ date('Y-m-d H:i', strtotime('-' . $i . ' days')) }}</td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                <a href="#" class="btn btn-outline-primary btn-sm">
                                    <i class="ti ti-users me-1"></i>
                                    View All Assigned Employees
                                </a>
                                <a href="#" class="btn btn-outline-secondary btn-sm ms-2">
                                    <i class="ti ti-user-plus me-1"></i>
                                    Assign Employees
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // This would be where you'd initialize maps using libraries like Leaflet or Google Maps
            // and set up the interactive map functionality

            // Example of updating radius input when visualization changes
            const radiusVisualizationInputs = document.querySelectorAll('input[name="radius_visualization"]');
            const radiusInput = document.querySelector('input[name="radius"]');

            radiusVisualizationInputs.forEach(input => {
                input.addEventListener('change', function() {
                    if (this.value !== 'custom') {
                        radiusInput.value = this.value;
                    }
                });
            });

            // Update visualization when radius input changes
            radiusInput.addEventListener('change', function() {
                const customRadio = document.querySelector(
                    'input[name="radius_visualization"][value="custom"]');
                customRadio.checked = true;
            });
        });
    </script>
@endsection
