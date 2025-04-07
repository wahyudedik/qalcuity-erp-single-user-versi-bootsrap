@extends('layouts.app')

@section('title', 'Edit Attendance')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Attendance Record
                </h2>
                <div class="text-muted mt-1">Update attendance information</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.attendance.index') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to List
                    </a>
                    <a href="{{ route('hr.attendance.detail', $id) }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                        <i class="ti ti-eye"></i>
                        View Details
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
                        <h3 class="card-title">Edit Attendance Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" value="EMP{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Employee Name</label>
                                    <input type="text" class="form-control" value="Employee {{ $id }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Date</label>
                                    <input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Status</label>
                                    <select class="form-select" name="status" required>
                                                                                <option value="present" selected>Present</option>
                                        <option value="late">Late</option>
                                        <option value="absent">Absent</option>
                                        <option value="on_leave">On Leave</option>
                                        <option value="half_day">Half Day</option>
                                        <option value="field_duty">Field Duty</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Clock In Time</label>
                                    <input type="time" class="form-control" name="clock_in" value="08:15">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Clock Out Time</label>
                                    <input type="time" class="form-control" name="clock_out" value="17:30">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Location</label>
                                    <select class="form-select" name="location">
                                        <option value="main_office" selected>Main Office</option>
                                        <option value="branch_1">Branch 1</option>
                                        <option value="branch_2">Branch 2</option>
                                        <option value="remote">Remote/Work from Home</option>
                                        <option value="field">Field Work</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Location Information Section -->
                        <div class="row mt-3">
                            <div class="col-12">
                                <h4 class="mb-3">Location Information</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Clock In Location Name</label>
                                    <input type="text" class="form-control" name="clock_in_location_name" value="Main Office - Front Entrance">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Clock In Latitude</label>
                                            <input type="text" class="form-control" name="clock_in_latitude" value="-6.2088">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Clock In Longitude</label>
                                            <input type="text" class="form-control" name="clock_in_longitude" value="106.8456">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_within_radius_in" name="is_within_radius_in" checked>
                                        <label class="form-check-label" for="is_within_radius_in">
                                            Within allowed radius
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div id="map-clock-in-edit" style="height: 200px; border-radius: 4px;">
                                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                            <div>
                                                <i class="ti ti-map-pin mb-2 d-block text-center" style="font-size: 2rem;"></i>
                                                <span>Map would be displayed here</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Clock Out Location Name</label>
                                    <input type="text" class="form-control" name="clock_out_location_name" value="Main Office - Side Exit">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Clock Out Latitude</label>
                                            <input type="text" class="form-control" name="clock_out_latitude" value="-6.2090">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Clock Out Longitude</label>
                                            <input type="text" class="form-control" name="clock_out_longitude" value="106.8458">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_within_radius_out" name="is_within_radius_out" checked>
                                        <label class="form-check-label" for="is_within_radius_out">
                                            Within allowed radius
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div id="map-clock-out-edit" style="height: 200px; border-radius: 4px;">
                                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                            <div>
                                                <i class="ti ti-map-pin mb-2 d-block text-center" style="font-size: 2rem;"></i>
                                                <span>Map would be displayed here</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Outside Radius Reason Section -->
                        <div class="row mt-3" id="outside-radius-section" style="display: none;">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Reason for Outside Radius</label>
                                    <select class="form-select" name="outside_radius_reason_type">
                                        <option value="field_duty">Field Duty</option>
                                        <option value="client_visit">Client Visit</option>
                                        <option value="business_trip">Business Trip</option>
                                        <option value="driver_duty">Driver Duty</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Detailed Reason</label>
                                    <textarea class="form-control" name="outside_radius_reason" rows="2" placeholder="Provide details about why attendance is outside the allowed radius"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Device Information Section -->
                        <div class="row mt-3">
                            <div class="col-12">
                                <h4 class="mb-3">Device Information</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Device Info</label>
                                    <input type="text" class="form-control" name="device_info" value="iPhone 13 (iOS 16.5)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">IP Address</label>
                                    <input type="text" class="form-control" name="ip_address" value="192.168.1.105">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Notes</label>
                                    <textarea class="form-control" name="notes" rows="3">Employee arrived on time and completed all assigned tasks for the day.</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Update Attendance Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Status change handler
        const statusSelect = document.querySelector('select[name="status"]');
        const clockInInput = document.querySelector('input[name="clock_in"]');
        const clockOutInput = document.querySelector('input[name="clock_out"]');
        
        statusSelect.addEventListener('change', function() {
            if (this.value === 'absent' || this.value === 'on_leave') {
                clockInInput.disabled = true;
                clockOutInput.disabled = true;
            } else {
                clockInInput.disabled = false;
                clockOutInput.disabled = false;
            }
        });
        
        // Outside radius checkboxes
        const isWithinRadiusInCheckbox = document.getElementById('is_within_radius_in');
        const isWithinRadiusOutCheckbox = document.getElementById('is_within_radius_out');
        const outsideRadiusSection = document.getElementById('outside-radius-section');
        
        function checkOutsideRadius() {
            if (!isWithinRadiusInCheckbox.checked || !isWithinRadiusOutCheckbox.checked) {
                outsideRadiusSection.style.display = 'block';
            } else {
                outsideRadiusSection.style.display = 'none';
            }
        }
        
        isWithinRadiusInCheckbox.addEventListener('change', checkOutsideRadius);
        isWithinRadiusOutCheckbox.addEventListener('change', checkOutsideRadius);
        
        // Initialize map functionality if needed
        // This would be where you'd add code to get current location or select on map
    });
</script>
@endsection

