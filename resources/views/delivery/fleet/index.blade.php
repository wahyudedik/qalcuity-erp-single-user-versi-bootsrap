@extends('layouts.app')

@section('title', 'Fleet Management')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Fleet Management
                    </h2>
                    <div class="text-muted mt-1">Manage your concrete delivery vehicles</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('delivery.fleet.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus"></i>
                            Add New Vehicle
                        </a>
                        <a href="{{ route('delivery.fleet.create') }}" class="btn btn-primary d-sm-none">
                            <i class="ti ti-plus"></i>
                        </a>
                        <a href="{{ route('delivery.fleet.maintenance') }}"
                            class="btn btn-outline-primary d-none d-sm-inline-block">
                            <i class="ti ti-tool"></i>
                            Maintenance Schedule
                        </a>
                        <a href="{{ route('delivery.fleet.fuel-tracking') }}"
                            class="btn btn-outline-primary d-none d-sm-inline-block">
                            <i class="ti ti-gas-station"></i>
                            Fuel Tracking
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Vehicle Fleet</h3>
                <div class="card-actions">
                    <div class="row g-2">
                        <div class="col">
                            <select class="form-select" id="filter-type">
                                <option value="">All Vehicle Types</option>
                                <option value="Mixer Truck">Mixer Truck</option>
                                <option value="Concrete Pump">Concrete Pump</option>
                                <option value="Dump Truck">Dump Truck</option>
                                <option value="Pickup">Pickup</option>
                                <option value="SUV">SUV</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select" id="filter-status">
                                <option value="">All Statuses</option>
                                <option value="Operational">Operational</option>
                                <option value="In Maintenance">In Maintenance</option>
                                <option value="Out of Service">Out of Service</option>
                                <option value="On Delivery">On Delivery</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-outline-primary" id="reset-filters">
                                <i class="ti ti-refresh"></i>
                                Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Vehicle ID</th>
                                <th>Type</th>
                                <th>License Plate</th>
                                <th>Capacity</th>
                                <th>Status</th>
                                <th>Last Maintenance</th>
                                <th>Driver</th>
                                <th class="w-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $vehicles = [
                                    [
                                        'id' => 'MX-001',
                                        'type' => 'Mixer Truck',
                                        'license' => 'B 1234 ABC',
                                        'capacity' => '7 m³',
                                        'status' => 'Operational',
                                        'last_maintenance' => '2023-10-15',
                                        'driver' => 'Budi Santoso',
                                    ],
                                    [
                                        'id' => 'MX-002',
                                        'type' => 'Mixer Truck',
                                        'license' => 'B 2345 DEF',
                                        'capacity' => '7 m³',
                                        'status' => 'On Delivery',
                                        'last_maintenance' => '2023-09-28',
                                        'driver' => 'Ahmad Rizki',
                                    ],
                                    [
                                        'id' => 'MX-003',
                                        'type' => 'Mixer Truck',
                                        'license' => 'B 3456 GHI',
                                        'capacity' => '9 m³',
                                        'status' => 'In Maintenance',
                                        'last_maintenance' => '2023-11-02',
                                        'driver' => 'Unassigned',
                                    ],
                                    [
                                        'id' => 'CP-001',
                                        'type' => 'Concrete Pump',
                                        'license' => 'B 4567 JKL',
                                        'capacity' => '60 m³/h',
                                        'status' => 'Operational',
                                        'last_maintenance' => '2023-10-20',
                                        'driver' => 'Dedi Kurniawan',
                                    ],
                                    [
                                        'id' => 'CP-002',
                                        'type' => 'Concrete Pump',
                                        'license' => 'B 5678 MNO',
                                        'capacity' => '90 m³/h',
                                        'status' => 'On Delivery',
                                        'last_maintenance' => '2023-10-05',
                                        'driver' => 'Eko Prasetyo',
                                    ],
                                    [
                                        'id' => 'DT-001',
                                        'type' => 'Dump Truck',
                                        'license' => 'B 6789 PQR',
                                        'capacity' => '20 ton',
                                        'status' => 'Operational',
                                        'last_maintenance' => '2023-09-15',
                                        'driver' => 'Faisal Rahman',
                                    ],
                                    [
                                        'id' => 'PU-001',
                                        'type' => 'Pickup',
                                        'license' => 'B 7890 STU',
                                        'capacity' => '1 ton',
                                        'status' => 'Operational',
                                        'last_maintenance' => '2023-10-10',
                                        'driver' => 'Gunawan',
                                    ],
                                    [
                                        'id' => 'SUV-001',
                                        'type' => 'SUV',
                                        'license' => 'B 8901 VWX',
                                        'capacity' => 'N/A',
                                        'status' => 'Out of Service',
                                        'last_maintenance' => '2023-08-30',
                                        'driver' => 'Unassigned',
                                    ],
                                ];
                            @endphp

                            @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $vehicle['id'] }}</td>
                                    <td>{{ $vehicle['type'] }}</td>
                                    <td>{{ $vehicle['license'] }}</td>
                                    <td>{{ $vehicle['capacity'] }}</td>
                                    <td>
                                        @php
                                            $statusClass = [
                                                'Operational' => 'bg-green',
                                                'In Maintenance' => 'bg-yellow',
                                                'Out of Service' => 'bg-red',
                                                'On Delivery' => 'bg-blue',
                                            ][$vehicle['status']];
                                        @endphp
                                        <span class="badge {{ $statusClass }}">{{ $vehicle['status'] }}</span>
                                    </td>
                                    <td>{{ $vehicle['last_maintenance'] }}</td>
                                    <td>{{ $vehicle['driver'] }}</td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <a href="{{ route('delivery.fleet.detail', ['id' => $vehicle['id']]) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('delivery.fleet.edit', ['id' => $vehicle['id']]) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>8</span> entries</p>
                <ul class="pagination m-0 ms-auto">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class="ti ti-chevron-left"></i>
                            prev
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            next
                            <i class="ti ti-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Fleet Status Overview</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="w-100">
                                <div class="mb-3">
                                    <div class="d-flex mb-1 align-items-center">
                                        <span class="legend me-2 bg-green"></span>
                                        <span>Operational</span>
                                        <span class="ms-auto">4</span>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" style="width: 50%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex mb-1 align-items-center">
                                        <span class="legend me-2 bg-blue"></span>
                                        <span>On Delivery</span>
                                        <span class="ms-auto">2</span>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-blue" style="width: 25%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex mb-1 align-items-center">
                                        <span class="legend me-2 bg-yellow"></span>
                                        <span>In Maintenance</span>
                                        <span class="ms-auto">1</span>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-yellow" style="width: 12.5%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex mb-1 align-items-center">
                                        <span class="legend me-2 bg-red"></span>
                                        <span>Out of Service</span>
                                        <span class="ms-auto">1</span>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-red" style="width: 12.5%"></div>
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
                        <h3 class="card-title">Fleet Composition</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="w-100">
                                <div class="mb-3">
                                    <div class="d-flex mb-1 align-items-center">
                                        <span class="legend me-2 bg-azure"></span>
                                        <span>Mixer Trucks</span>
                                        <span class="ms-auto">3</span>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-azure" style="width: 37.5%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex mb-1 align-items-center">
                                        <span class="legend me-2 bg-indigo"></span>
                                        <span>Concrete Pumps</span>
                                        <span class="ms-auto">2</span>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-indigo" style="width: 25%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex mb-1 align-items-center">
                                        <span class="legend me-2 bg-orange"></span>
                                        <span>Dump Trucks</span>
                                        <span class="ms-auto">1</span>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-orange" style="width: 12.5%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex mb-1 align-items-center">
                                        <span class="legend me-2 bg-lime"></span>
                                        <span>Pickups</span>
                                        <span class="ms-auto">1</span>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-lime" style="width: 12.5%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex mb-1 align-items-center">
                                        <span class="legend me-2 bg-purple"></span>
                                        <span>SUVs</span>
                                        <span class="ms-auto">1</span>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-purple" style="width: 12.5%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Upcoming Maintenance</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Vehicle ID</th>
                                        <th>Type</th>
                                        <th>License Plate</th>
                                        <th>Maintenance Type</th>
                                        <th>Scheduled Date</th>
                                        <th>Estimated Cost</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $maintenances = [
                                            [
                                                'id' => 'MX-002',
                                                'type' => 'Mixer Truck',
                                                'license' => 'B 2345 DEF',
                                                'maintenance_type' => 'Regular Service',
                                                'scheduled_date' => '2023-11-15',
                                                'estimated_cost' => 'Rp 2,500,000',
                                                'status' => 'Scheduled',
                                            ],
                                            [
                                                'id' => 'CP-001',
                                                'type' => 'Concrete Pump',
                                                'license' => 'B 4567 JKL',
                                                'maintenance_type' => 'Hydraulic System Check',
                                                'scheduled_date' => '2023-11-20',
                                                'estimated_cost' => 'Rp 4,800,000',
                                                'status' => 'Scheduled',
                                            ],
                                            [
                                                'id' => 'DT-001',
                                                'type' => 'Dump Truck',
                                                'license' => 'B 6789 PQR',
                                                'maintenance_type' => 'Tire Replacement',
                                                'scheduled_date' => '2023-11-10',
                                                'estimated_cost' => 'Rp 6,000,000',
                                                'status' => 'Pending Parts',
                                            ],
                                            [
                                                'id' => 'MX-003',
                                                'type' => 'Mixer Truck',
                                                'license' => 'B 3456 GHI',
                                                'maintenance_type' => 'Drum Repair',
                                                'scheduled_date' => '2023-11-05',
                                                'estimated_cost' => 'Rp 8,500,000',
                                                'status' => 'In Progress',
                                            ],
                                        ];
                                    @endphp

                                    @foreach ($maintenances as $maintenance)
                                        <tr>
                                            <td>{{ $maintenance['id'] }}</td>
                                            <td>{{ $maintenance['type'] }}</td>
                                            <td>{{ $maintenance['license'] }}</td>
                                            <td>{{ $maintenance['maintenance_type'] }}</td>
                                            <td>{{ $maintenance['scheduled_date'] }}</td>
                                            <td>{{ $maintenance['estimated_cost'] }}</td>
                                            <td>
                                                @php
                                                    $statusClass = [
                                                        'Scheduled' => 'bg-blue',
                                                        'Pending Parts' => 'bg-yellow',
                                                        'In Progress' => 'bg-green',
                                                        'Completed' => 'bg-teal',
                                                        'Cancelled' => 'bg-red',
                                                    ][$maintenance['status']];
                                                @endphp
                                                <span
                                                    class="badge {{ $statusClass }}">{{ $maintenance['status'] }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('delivery.fleet.maintenance') }}" class="btn btn-outline-primary">
                            View Full Maintenance Schedule
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Filter functionality
            const filterType = document.getElementById('filter-type');
            const filterStatus = document.getElementById('filter-status');
            const resetFilters = document.getElementById('reset-filters');
            const tableRows = document.querySelectorAll('tbody tr');

            function applyFilters() {
                const typeValue = filterType.value;
                const statusValue = filterStatus.value;

                tableRows.forEach(row => {
                    const type = row.cells[1].textContent.trim();
                    const status = row.cells[4].textContent.trim();

                    const typeMatch = !typeValue || type === typeValue;
                    const statusMatch = !statusValue || status === statusValue;

                    if (typeMatch && statusMatch) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            filterType.addEventListener('change', applyFilters);
            filterStatus.addEventListener('change', applyFilters);

            resetFilters.addEventListener('click', function() {
                filterType.value = '';
                filterStatus.value = '';
                tableRows.forEach(row => {
                    row.style.display = '';
                });
            });
        });
    </script>
@endsection
