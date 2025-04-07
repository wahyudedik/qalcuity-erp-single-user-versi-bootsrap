@extends('layouts.app')

@section('title', 'Add Attendance Location')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Add Attendance Location
                </h2>
                <div class="text-muted mt-1">Create a new location for attendance tracking</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.attendance.locations') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
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
                        <h3 class="card-title">Location Information</h3>
                    </div>
                                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required">Location Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter location name" required>
                                    <small class="form-hint">This name will be displayed to employees when clocking in/out</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Address</label>
                                    <textarea class="form-control" name="address" rows="2" placeholder="Enter full address" required></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Latitude</label>
                                            <input type="text" class="form-control" name="latitude" placeholder="e.g. -6.2088" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Longitude</label>
                                            <input type="text" class="form-control" name="longitude" placeholder="e.g. 106.8456" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Allowed Radius</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="radius" placeholder="Enter radius" value="100" min="10" max="1000" required>
                                        <span class="input-group-text">meters</span>
                                    </div>
                                    <small class="form-hint">Employees must be within this radius to clock in/out</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Branch</label>
                                    <select class="form-select" name="branch_id">
                                        <option value="">Select Branch (Optional)</option>
                                        <option value="1">Main Branch</option>
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
                                    <small class="form-hint d-block">Only active locations can be used for attendance</small>
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
                                                Click on the map to set the location coordinates or enter them manually.
                                            </div>
                                        </div>
                                    </div>
                                    <div id="location-map" style="height: 300px; border-radius: 4px;">
                                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                            <div>
                                                <i class="ti ti-map mb-2 d-block text-center" style="font-size: 2rem;"></i>
                                                <span>Map would be displayed here</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Search Address</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="address-search" placeholder="Search for an address">
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
                                                <input type="radio" name="radius_visualization" value="100" class="form-selectgroup-input" checked>
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
                                                <input type="radio" name="radius_visualization" value="200" class="form-selectgroup-input">
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
                                                <input type="radio" name="radius_visualization" value="500" class="form-selectgroup-input">
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
                                                <input type="radio" name="radius_visualization" value="custom" class="form-selectgroup-input">
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
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <a href="{{ route('hr.attendance.locations') }}" class="btn btn-link">Cancel</a>
                            <button type="submit" class="btn btn-primary ms-auto">
                                <i class="ti ti-device-floppy me-1"></i>
                                Save Location
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Location Setup Guide</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>How to Set Up a Location</h4>
                                <ol class="list-group list-group-numbered mb-3">
                                    <li class="list-group-item">Enter a descriptive name for the location</li>
                                    <li class="list-group-item">Provide the complete address</li>
                                    <li class="list-group-item">Set the coordinates (latitude and longitude) either by clicking on the map or entering them manually</li>
                                    <li class="list-group-item">Define the allowed radius for attendance check-in/out</li>
                                    <li class="list-group-item">Associate with a branch if applicable</li>
                                    <li class="list-group-item">Ensure the location is set to active status</li>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <h4>Tips for Effective Location Setup</h4>
                                <ul class="list-group mb-3">
                                    <li class="list-group-item">
                                        <i class="ti ti-map-pin text-primary me-2"></i>
                                        Place the pin at the center of the building or facility
                                    </li>
                                    <li class="list-group-item">
                                        <i class="ti ti-ruler text-primary me-2"></i>
                                        Set an appropriate radius based on the size of your facility
                                    </li>
                                    <li class="list-group-item">
                                        <i class="ti ti-building text-primary me-2"></i>
                                        For multi-floor buildings, consider the horizontal distance only
                                    </li>
                                    <li class="list-group-item">
                                        <i class="ti ti-wifi text-primary me-2"></i>
                                        Ensure good GPS signal reception at the location
                                    </li>
                                    <li class="list-group-item">
                                        <i class="ti ti-users text-primary me-2"></i>
                                        Consider creating separate locations for different departments if needed
                                    </li>
                                </ul>
                            </div>
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
            const customRadio = document.querySelector('input[name="radius_visualization"][value="custom"]');
            customRadio.checked = true;
        });
    });
</script>
@endsection

