@extends('layouts.app')

@section('title', 'Attendance Locations')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Attendance Locations
                </h2>
                <div class="text-muted mt-1">Manage attendance location settings</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.attendance.index') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to Attendance
                    </a>
                    <a href="{{ route('hr.attendance.locations.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-plus"></i>
                        Add New Location
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
                        <h3 class="card-title">Attendance Locations</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                    <th>Location Name</th>
                                    <th>Address</th>
                                    <th>Coordinates</th>
                                    <th>Allowed Radius</th>
                                    <th>Status</th>
                                    <th>Employees</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $locations = [
                                        [
                                            'id' => 1,
                                            'name' => 'Main Office',
                                            'address' => '123 Business Street, Jakarta',
                                            'latitude' => '-6.2088',
                                            'longitude' => '106.8456',
                                            'radius' => '100',
                                            'status' => 'Active',
                                            'employees' => 35
                                        ],
                                        [
                                            'id' => 2,
                                            'name' => 'Branch 1',
                                            'address' => '456 Industrial Road, Bandung',
                                            'latitude' => '-6.9175',
                                            'longitude' => '107.6191',
                                            'radius' => '150',
                                            'status' => 'Active',
                                            'employees' => 18
                                        ],
                                        [
                                            'id' => 3,
                                            'name' => 'Branch 2',
                                            'address' => '789 Commercial Avenue, Surabaya',
                                            'latitude' => '-7.2575',
                                            'longitude' => '112.7521',
                                            'radius' => '100',
                                            'status' => 'Active',
                                            'employees' => 12
                                        ],
                                        [
                                            'id' => 4,
                                            'name' => 'Warehouse',
                                            'address' => '101 Logistics Lane, Tangerang',
                                            'latitude' => '-6.1781',
                                            'longitude' => '106.6300',
                                            'radius' => '200',
                                            'status' => 'Active',
                                            'employees' => 8
                                        ],
                                        [
                                            'id' => 5,
                                            'name' => 'Old Office',
                                            'address' => '202 Corporate Boulevard, Jakarta',
                                            'latitude' => '-6.2000',
                                            'longitude' => '106.8200',
                                            'radius' => '100',
                                            'status' => 'Inactive',
                                            'employees' => 0
                                        ]
                                    ];
                                @endphp
                                
                                @foreach ($locations as $location)
                                    <tr>
                                        <td>{{ $location['name'] }}</td>
                                        <td>{{ $location['address'] }}</td>
                                        <td>{{ $location['latitude'] }}, {{ $location['longitude'] }}</td>
                                        <td>{{ $location['radius'] }} meters</td>
                                        <td>
                                            @if ($location['status'] == 'Active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $location['employees'] }}</td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewLocationModal{{ $location['id'] }}">
                                                    <i class="ti ti-eye"></i>
                                                    View
                                                </a>
                                                <a href="{{ route('hr.attendance.locations.edit', $location['id']) }}" class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                    Edit
                                                </a>
                                                @if ($location['status'] == 'Active')
                                                    <button type="button" class="btn btn-sm btn-outline-danger">
                                                        <i class="ti ti-trash"></i>
                                                        Deactivate
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-sm btn-outline-success">
                                                        <i class="ti ti-check"></i>
                                                        Activate
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <!-- View Location Modal -->
                                    <div class="modal modal-blur fade" id="viewLocationModal{{ $location['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ $location['name'] }} Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h4>Location Information</h4>
                                                            <div class="mb-3">
                                                                <label class="form-label">Location Name</label>
                                                                <input type="text" class="form-control" value="{{ $location['name'] }}" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Address</label>
                                                                <textarea class="form-control" rows="2" readonly>{{ $location['address'] }}</textarea>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Latitude</label>
                                                                        <input type="text" class="form-control" value="{{ $location['latitude'] }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Longitude</label>
                                                                        <input type="text" class="form-control" value="{{ $location['longitude'] }}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Allowed Radius</label>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" value="{{ $location['radius'] }}" readonly>
                                                                    <span class="input-group-text">meters</span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Status</label>
                                                                <input type="text" class="form-control" value="{{ $location['status'] }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h4>Location Map</h4>
                                                            <div id="location-map-{{ $location['id'] }}" style="height: 300px; border-radius: 4px;">
                                                                <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                                                    <div>
                                                                        <i class="ti ti-map mb-2 d-block text-center" style="font-size: 2rem;"></i>
                                                                        <span>Map would be displayed here</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ route('hr.attendance.locations.edit', $location['id']) }}" class="btn btn-primary">
                                                        <i class="ti ti-edit"></i>
                                                        Edit Location
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Location Map Overview</h3>
                    </div>
                    <div class="card-body">
                        <div id="locations-overview-map" style="height: 400px; border-radius: 4px;">
                            <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                <div>
                                    <i class="ti ti-map mb-2 d-block text-center" style="font-size: 2rem;"></i>
                                    <span>Map showing all locations would be displayed here</span>
                                </div>
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
    });
</script>
@endsection
