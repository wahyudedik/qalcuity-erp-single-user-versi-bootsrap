@extends('layouts.app')

@section('title', 'Mobile Attendance')

@section('styles')
<style>
    .mobile-preview {
        max-width: 375px;
        margin: 0 auto;
        border: 10px solid #333;
        border-radius: 36px;
        overflow: hidden;
        position: relative;
        height: 700px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    
    .mobile-header {
        background: #0061f2;
        color: white;
        padding: 15px;
        text-align: center;
        position: relative;
    }
    
    .mobile-content {
        height: calc(100% - 56px);
        overflow-y: auto;
        background: #f5f7fb;
    }
    
    .attendance-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        margin: 15px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    
    .clock-btn {
        display: block;
        width: 100%;
        padding: 12px;
        text-align: center;
        border-radius: 8px;
        margin-top: 15px;
        font-weight: 600;
    }
    
    .clock-in-btn {
        background: #0061f2;
        color: white;
    }
    
    .clock-out-btn {
        background: #6c757d;
        color: white;
    }
    
    .location-info {
        background: #f8f9fa;
        padding: 12px;
        border-radius: 8px;
        margin-top: 15px;
        font-size: 14px;
    }
    
    .status-indicator {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-right: 5px;
    }
    
    .status-success {
        background-color: #5eba00;
    }
    
    .status-warning {
        background-color: #f59f00;
    }
    
    .status-danger {
        background-color: #d63939;
    }
    
    .tab-bar {
        display: flex;
        background: white;
        position: absolute;
        bottom: 0;
        width: 100%;
        border-top: 1px solid #e9ecef;
    }
    
    .tab-item {
        flex: 1;
        text-align: center;
        padding: 10px;
        font-size: 12px;
        color: #6c757d;
    }
    
        .tab-item.active {
        color: #0061f2;
    }
    
    .tab-icon {
        display: block;
        font-size: 20px;
        margin-bottom: 4px;
    }
    
    .mobile-map {
        height: 200px;
        border-radius: 8px;
        margin-top: 15px;
        background-color: #e9ecef;
        position: relative;
        overflow: hidden;
    }
    
    .map-placeholder {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #6c757d;
    }
    
    .attendance-history {
        margin-top: 20px;
    }
    
    .history-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 15px;
        border-bottom: 1px solid #e9ecef;
    }
    
    .history-date {
        font-weight: 600;
        font-size: 14px;
    }
    
    .history-details {
        font-size: 12px;
        color: #6c757d;
    }
    
    .notch {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 150px;
        height: 20px;
        background: #333;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        z-index: 10;
    }
</style>
@endsection

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Mobile Attendance App
                </h2>
                <div class="text-muted mt-1">Mobile application preview for employee attendance</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.attendance.index') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to Attendance
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Mobile App Preview</h3>
                    </div>
                    <div class="card-body">
                        <div class="mobile-preview">
                            <div class="notch"></div>
                            <div class="mobile-header">
                                <h3 class="m-0">Qalcuity Attendance</h3>
                            </div>
                            <div class="mobile-content">
                                <!-- Today's Attendance Card -->
                                <div class="attendance-card">
                                    <h4>Today's Attendance</h4>
                                    <p class="text-muted">{{ date('l, d F Y') }}</p>
                                    
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div>
                                            <div class="text-muted">Clock In</div>
                                            <div class="fs-3">08:15</div>
                                        </div>
                                        <div>
                                            <div class="text-muted">Clock Out</div>
                                            <div class="fs-3">--:--</div>
                                        </div>
                                        <div>
                                            <div class="text-muted">Status</div>
                                            <div><span class="badge bg-success">Present</span></div>
                                        </div>
                                    </div>
                                    
                                    <button class="clock-btn clock-out-btn">
                                        <i class="ti ti-clock-off me-1"></i>
                                        Clock Out
                                    </button>
                                    
                                    <div class="location-info">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>
                                                <i class="ti ti-map-pin me-1"></i>
                                                Location Status
                                            </span>
                                            <span>
                                                <span class="status-indicator status-success"></span>
                                                Within Allowed Radius
                                            </span>
                                        </div>
                                        <div class="mobile-map">
                                            <div class="map-placeholder">
                                                <i class="ti ti-map-pin mb-2 d-block" style="font-size: 24px;"></i>
                                                <span>Your current location</span>
                                            </div>
                                        </div>
                                        <div class="mt-2 text-muted small">
                                            <div><strong>Address:</strong> Main Office, 123 Business Street</div>
                                            <div><strong>Coordinates:</strong> -6.2088, 106.8456</div>
                                            <div><strong>Distance from office:</strong> 15 meters</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Attendance History -->
                                <div class="attendance-card attendance-history">
                                    <h4>Recent Attendance</h4>
                                    
                                    @php
                                        $statuses = ['Present', 'Late', 'Present', 'Present', 'On Leave'];
                                        $clockIns = ['08:05', '09:15', '08:00', '08:10', '-'];
                                        $clockOuts = ['17:30', '18:00', '17:15', '17:45', '-'];
                                        $locations = ['Main Office', 'Main Office', 'Branch 1', 'Main Office', '-'];
                                        $radiusStatuses = ['Within', 'Within', 'Within', 'Within', 'N/A'];
                                    @endphp
                                    
                                    @for ($i = 1; $i <= 5; $i++)
                                        @php
                                            $date = date('Y-m-d', strtotime("-$i days"));
                                            $dayName = date('l', strtotime("-$i days"));
                                            $status = $statuses[$i-1];
                                            $clockIn = $clockIns[$i-1];
                                            $clockOut = $clockOuts[$i-1];
                                            $location = $locations[$i-1];
                                            $radiusStatus = $radiusStatuses[$i-1];
                                        @endphp
                                        <div class="history-item">
                                            <div>
                                                <div class="history-date">{{ $dayName }}, {{ date('d M', strtotime($date)) }}</div>
                                                <div class="history-details">{{ $clockIn }} - {{ $clockOut }} • {{ $location }}</div>
                                            </div>
                                            <div>
                                                @if ($status == 'Present')
                                                    <span class="badge bg-success">Present</span>
                                                @elseif ($status == 'Late')
                                                    <span class="badge bg-warning">Late</span>
                                                @elseif ($status == 'Absent')
                                                    <span class="badge bg-danger">Absent</span>
                                                @elseif ($status == 'On Leave')
                                                    <span class="badge bg-info">On Leave</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endfor
                                    
                                    <div class="text-center mt-3">
                                        <a href="#" class="btn btn-sm btn-outline-primary">View All History</a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Tab Bar -->
                            <div class="tab-bar">
                                <div class="tab-item active">
                                    <i class="ti ti-home tab-icon"></i>
                                    Home
                                </div>
                                <div class="tab-item">
                                    <i class="ti ti-clock tab-icon"></i>
                                    Attendance
                                </div>
                                <div class="tab-item">
                                    <i class="ti ti-calendar tab-icon"></i>
                                    Schedule
                                </div>
                                <div class="tab-item">
                                    <i class="ti ti-user tab-icon"></i>
                                    Profile
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Mobile App Features</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h4>Location-Based Attendance</h4>
                            <p>The mobile app uses GPS to verify employee location during clock in and clock out:</p>
                            <ul class="list-group mb-3">
                                <li class="list-group-item">
                                    <i class="ti ti-map-pin text-primary me-2"></i>
                                    Automatic location detection
                                </li>
                                <li class="list-group-item">
                                    <i class="ti ti-radar text-primary me-2"></i>
                                    Configurable radius for each location
                                </li>
                                <li class="list-group-item">
                                    <i class="ti ti-map text-primary me-2"></i>
                                    Visual map display of current position
                                </li>
                                <li class="list-group-item">
                                    <i class="ti ti-route text-primary me-2"></i>
                                    Distance calculation from designated office location
                                </li>
                            </ul>
                        </div>
                        
                        <div class="mb-4">
                            <h4>Outside Radius Handling</h4>
                            <p>When an employee attempts to clock in/out outside the allowed radius:</p>
                            <ul class="list-group mb-3">
                                <li class="list-group-item">
                                    <i class="ti ti-alert-circle text-warning me-2"></i>
                                    Warning notification is displayed
                                </li>
                                <li class="list-group-item">
                                    <i class="ti ti-clipboard-text text-warning me-2"></i>
                                    Reason input form appears
                                </li>
                                <li class="list-group-item">
                                    <i class="ti ti-camera text-warning me-2"></i>
                                    Option to take photo as proof of location
                                </li>
                                <li class="list-group-item">
                                    <i class="ti ti-user-check text-warning me-2"></i>
                                    Supervisor approval workflow triggered
                                </li>
                            </ul>
                        </div>
                        
                        <div class="mb-4">
                            <h4>Additional Features</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group mb-3">
                                        <li class="list-group-item">
                                            <i class="ti ti-face-id text-success me-2"></i>
                                            Facial recognition verification
                                        </li>
                                        <li class="list-group-item">
                                            <i class="ti ti-fingerprint text-success me-2"></i>
                                            Biometric authentication
                                        </li>
                                        <li class="list-group-item">
                                            <i class="ti ti-wifi-off text-success me-2"></i>
                                            Offline mode capability
                                        </li>
                                        <li class="list-group-item">
                                            <i class="ti ti-device-mobile text-success me-2"></i>
                                            Device verification
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group mb-3">
                                        <li class="list-group-item">
                                            <i class="ti ti-calendar-stats text-success me-2"></i>
                                            Leave request integration
                                        </li>
                                        <li class="list-group-item">
                                            <i class="ti ti-bell text-success me-2"></i>
                                            Shift reminders & notifications
                                        </li>
                                        <li class="list-group-item">
                                            <i class="ti ti-chart-bar text-success me-2"></i>
                                            Personal attendance analytics
                                        </li>
                                        <li class="list-group-item">
                                            <i class="ti ti-message-circle-2 text-success me-2"></i>
                                            Team communication tools
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <h4>Implementation Requirements</h4>
                            <div class="alert alert-info">
                                <div class="d-flex">
                                    <div>
                                        <i class="ti ti-info-circle me-2"></i>
                                    </div>
                                    <div>
                                        <h4 class="alert-title">Mobile App Development</h4>
                                        <div>This feature requires development of native mobile applications for iOS and Android platforms, or a responsive web application with location capabilities.</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-3">
                                <a href="#" class="btn btn-primary">
                                    <i class="ti ti-device-mobile me-2"></i>
                                    Request Mobile App Development
                                </a>
                                <a href="#" class="btn btn-outline-primary ms-2">
                                    <i class="ti ti-file-description me-2"></i>
                                    View Technical Documentation
                                </a>
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
        // This would be where you'd add any interactive functionality for the preview
    });
</script>
@endsection

