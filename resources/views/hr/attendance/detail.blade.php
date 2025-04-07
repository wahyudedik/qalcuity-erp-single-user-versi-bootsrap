@extends('layouts.app')

@section('title', 'Attendance Detail')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Attendance Detail
                    </h2>
                    <div class="text-muted mt-1">View detailed attendance information</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.attendance.index') }}"
                            class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to List
                        </a>
                        <a href="{{ route('hr.attendance.edit', $id) }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-edit"></i>
                            Edit Record
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Attendance Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Employee ID</label>
                                        <div class="form-control-plaintext">EMP{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Employee Name</label>
                                        <div class="form-control-plaintext">Employee {{ $id }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Department</label>
                                        <div class="form-control-plaintext">Production</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <div class="form-control-plaintext">{{ date('d M Y') }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <div>
                                            <span class="badge bg-success">Present</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Clock In Time</label>
                                        <div class="form-control-plaintext">08:15</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Clock Out Time</label>
                                        <div class="form-control-plaintext">17:30</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Working Hours</label>
                                        <div class="form-control-plaintext">9 hours 15 minutes</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Overtime</label>
                                        <div class="form-control-plaintext">1 hour 15 minutes</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Location</label>
                                        <div class="form-control-plaintext">Main Office</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Location Information Section -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h4 class="mb-3">Location Information</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Clock In Location</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Location Name</label>
                                                <div class="form-control-plaintext">Main Office - Front Entrance</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Coordinates</label>
                                                <div class="form-control-plaintext">-6.2088, 106.8456</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <div>
                                                    <span class="badge bg-success">Within Allowed Radius</span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div id="map-clock-in" style="height: 200px; border-radius: 4px;">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center h-100 text-muted">
                                                        <div>
                                                            <i class="ti ti-map-pin mb-2 d-block text-center"
                                                                style="font-size: 2rem;"></i>
                                                            <span>Map would be displayed here</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Clock Out Location</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Location Name</label>
                                                <div class="form-control-plaintext">Main Office - Side Exit</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Coordinates</label>
                                                <div class="form-control-plaintext">-6.2090, 106.8458</div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <div>
                                                    <span class="badge bg-success">Within Allowed Radius</span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div id="map-clock-out" style="height: 200px; border-radius: 4px;">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center h-100 text-muted">
                                                        <div>
                                                            <i class="ti ti-map-pin mb-2 d-block text-center"
                                                                style="font-size: 2rem;"></i>
                                                            <span>Map would be displayed here</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Device Information Section -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h4 class="mb-3">Device Information</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Device Info</label>
                                        <div class="form-control-plaintext">iPhone 13 (iOS 16.5)</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">IP Address</label>
                                        <div class="form-control-plaintext">192.168.1.105</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Notes</label>
                                        <div class="form-control-plaintext">Employee arrived on time and completed all
                                            assigned tasks for the day.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Attendance History</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Clock In</th>
                                            <th>Clock Out</th>
                                            <th>Status</th>
                                            <th>Location</th>
                                            <th>Working Hours</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $statuses = [
                                                'Present',
                                                'Late',
                                                'Present',
                                                'Present',
                                                'On Leave',
                                                'Present',
                                                'Present',
                                            ];
                                            $locations = [
                                                'Main Office',
                                                'Main Office',
                                                'Branch 1',
                                                'Main Office',
                                                '-',
                                                'Field Work',
                                                'Main Office',
                                            ];
                                        @endphp

                                        @for ($i = 0; $i < 7; $i++)
                                            @php
                                                $date = date('Y-m-d', strtotime("-$i days"));
                                                $status = $statuses[$i];
                                                $location = $locations[$i];

                                                // Generate random clock in time between 7:00 and 9:00
                                                $hour = rand(7, 9);
                                                $minute = rand(0, 59);
                                                $clockIn = sprintf('%02d:%02d', $hour, $minute);

                                                // Generate random clock out time between 16:00 and 18:00
                                                $hour = rand(16, 18);
                                                $minute = rand(0, 59);
                                                $clockOut = sprintf('%02d:%02d', $hour, $minute);

                                                // Calculate working hours
                                                $workingHours = rand(7, 9);

                                                // If status is On Leave, no clock times
                                                if ($status == 'On Leave') {
                                                    $clockIn = '-';
                                                    $clockOut = '-';
                                                    $workingHours = 0;
                                                }
                                            @endphp
                                            <tr>
                                                <td>{{ $date }}</td>
                                                <td>{{ $clockIn }}</td>
                                                <td>{{ $clockOut }}</td>
                                                <td>
                                                    @if ($status == 'Present')
                                                        <span class="badge bg-success">Present</span>
                                                    @elseif ($status == 'Late')
                                                        <span class="badge bg-warning">Late</span>
                                                    @elseif ($status == 'Absent')
                                                        <span class="badge bg-danger">Absent</span>
                                                    @elseif ($status == 'On Leave')
                                                        <span class="badge bg-info">On Leave</span>
                                                    @endif
                                                </td>
                                                <td>{{ $location }}</td>
                                                <td>{{ $workingHours }} hours</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
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
            // Here you would initialize maps with the actual coordinates
            // For example using Leaflet.js or Google Maps API

            // Example with Leaflet (would need to include Leaflet CSS and JS in your layout)
            /*
            const clockInMap = L.map('map-clock-in').setView([-6.2088, 106.8456], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(clockInMap);
            L.marker([-6.2088, 106.8456]).addTo(clockInMap);
            
            const clockOutMap = L.map('map-clock-out').setView([-6.2090, 106.8458], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(clockOutMap);
            L.marker([-6.2090, 106.8458]).addTo(clockOutMap);
            
            // You could also add a circle to show the allowed radius
            L.circle([-6.2088, 106.8456], {
                radius: 100, // 100 meters radius
                color: 'green',
                fillColor: '#3388ff',
                fillOpacity: 0.2
            }).addTo(clockInMap);
            */
        });
    </script>
@endsection
