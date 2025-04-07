@extends('layouts.app')

@section('title', 'Vehicle Details')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Vehicle Details
                    </h2>
                    <div class="text-muted mt-1">Detailed information about vehicle {{ $id }}</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('delivery.fleet') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Fleet
                        </a>
                        <a href="{{ route('delivery.fleet.edit', ['id' => $id]) }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-edit"></i>
                            Edit Vehicle
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @php
            // Dummy data for the vehicle detail
            $vehicleTypes = [
                'MX' => 'Mixer Truck',
                'CP' => 'Concrete Pump',
                'DT' => 'Dump Truck',
                'PU' => 'Pickup',
                'SUV' => 'SUV',
            ];

            $vehiclePrefix = substr($id, 0, 2);
            $vehicleType = $vehicleTypes[$vehiclePrefix] ?? 'Unknown';

            $vehicle = [
                'id' => $id,
                'type' => $vehicleType,
                'license' => 'B ' . rand(1000, 9999) . ' ' . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)),
                'brand' => ['Hino', 'Mercedes-Benz', 'Isuzu', 'Mitsubishi', 'Toyota'][rand(0, 4)],
                'model' => 'Model ' . chr(rand(65, 90)) . '-' . rand(100, 999),
                'year' => rand(2015, 2023),
                'capacity' =>
                    $vehiclePrefix == 'MX'
                        ? rand(6, 9) . ' m³'
                        : ($vehiclePrefix == 'CP'
                            ? rand(60, 120) . ' m³/h'
                            : ($vehiclePrefix == 'DT'
                                ? rand(10, 30) . ' ton'
                                : ($vehiclePrefix == 'PU'
                                    ? '1 ton'
                                    : 'N/A'))),
                'status' => ['Operational', 'In Maintenance', 'Out of Service', 'On Delivery'][rand(0, 3)],
                'purchase_date' => date('Y-m-d', strtotime('-' . rand(1, 8) . ' years')),
                'purchase_price' => 'Rp ' . number_format(rand(500, 2500) * 1000000, 0, ',', '.'),
                'current_value' => 'Rp ' . number_format(rand(300, 2000) * 1000000, 0, ',', '.'),
                'engine_number' => strtoupper(substr(md5(rand()), 0, 10)),
                'chassis_number' => strtoupper(substr(md5(rand()), 0, 15)),
                'color' => ['White', 'Yellow', 'Orange', 'Blue', 'Red'][rand(0, 4)],
                'fuel_type' => ['Diesel', 'Gasoline'][rand(0, 1)],
                'fuel_capacity' => rand(60, 200) . ' L',
                'avg_fuel_consumption' => rand(5, 15) . ' km/L',
                'insurance_number' => 'INS-' . rand(10000, 99999),
                'insurance_expiry' => date('Y-m-d', strtotime('+' . rand(1, 12) . ' months')),
                'tax_expiry' => date('Y-m-d', strtotime('+' . rand(1, 12) . ' months')),
                'last_maintenance' => date('Y-m-d', strtotime('-' . rand(1, 60) . ' days')),
                'next_maintenance' => date('Y-m-d', strtotime('+' . rand(1, 60) . ' days')),
                'odometer' => number_format(rand(10000, 150000), 0, ',', '.') . ' km',
                'driver' => [
                    'Budi Santoso',
                    'Ahmad Rizki',
                    'Dedi Kurniawan',
                    'Eko Prasetyo',
                    'Faisal Rahman',
                    'Gunawan',
                    'Unassigned',
                ][rand(0, 6)],
                'notes' =>
                    'This vehicle is in ' .
                    ['excellent', 'good', 'fair', 'poor'][rand(0, 3)] .
                    ' condition. ' .
                    [
                        'Regular maintenance is performed on schedule.',
                        'Some minor issues need attention.',
                        'Recently serviced.',
                        'Scheduled for major overhaul.',
                    ][rand(0, 3)],
            ];

            // Generate maintenance history
            $maintenanceHistory = [];
            for ($i = 1; $i <= 5; $i++) {
                $date = date('Y-m-d', strtotime('-' . $i * rand(30, 90) . ' days'));
                $maintenanceHistory[] = [
                    'date' => $date,
                    'type' => [
                        'Regular Service',
                        'Oil Change',
                        'Brake Inspection',
                        'Tire Replacement',
                        'Major Overhaul',
                        'Engine Repair',
                        'Electrical System Check',
                    ][rand(0, 6)],
                    'cost' => 'Rp ' . number_format(rand(500, 10000) * 1000, 0, ',', '.'),
                    'odometer' => number_format(rand(10000, 150000), 0, ',', '.') . ' km',
                    'workshop' => ['Central Workshop', 'Authorized Dealer', 'External Service', 'Mobile Service'][
                        rand(0, 3)
                    ],
                    'technician' => ['Joko', 'Hendra', 'Rudi', 'Agus', 'Bambang'][rand(0, 4)],
                    'notes' => [
                        'Routine maintenance completed.',
                        'Parts replaced: filters, oil.',
                        'Found and fixed electrical issue.',
                        'Replaced worn components.',
                        'No major issues found.',
                    ][rand(0, 4)],
                ];
            }

            // Generate fuel records
            $fuelRecords = [];
            for ($i = 1; $i <= 5; $i++) {
                $date = date('Y-m-d', strtotime('-' . $i * rand(5, 15) . ' days'));
                $fuelRecords[] = [
                    'date' => $date,
                    'amount' => rand(30, 200) . ' L',
                    'cost' => 'Rp ' . number_format(rand(300, 2000) * 1000, 0, ',', '.'),
                    'odometer' => number_format(rand(10000, 150000), 0, ',', '.') . ' km',
                    'station' => ['Pertamina', 'Shell', 'BP', 'Total', 'Company Depot'][rand(0, 4)],
                    'driver' =>
                        $vehicle['driver'] != 'Unassigned'
                            ? $vehicle['driver']
                            : ['Budi Santoso', 'Ahmad Rizki', 'Dedi Kurniawan', 'Eko Prasetyo'][rand(0, 3)],
                ];
            }

            // Generate delivery assignments
            $deliveryAssignments = [];
            if ($vehicle['status'] != 'Out of Service' && $vehiclePrefix != 'SUV') {
                for ($i = 1; $i <= 3; $i++) {
                    $date = date('Y-m-d', strtotime('+' . $i * rand(1, 7) . ' days'));
                    $deliveryAssignments[] = [
                        'date' => $date,
                        'customer' => [
                            'PT Pembangunan Jaya',
                            'CV Karya Mandiri',
                            'PT Konstruksi Utama',
                            'PT Bangun Persada',
                            'PT Maju Bersama',
                        ][rand(0, 4)],
                        'project' => [
                            'Apartment Tower B',
                            'Office Building Phase 2',
                            'Highway Section 3',
                            'Shopping Mall',
                            'Residential Complex',
                        ][rand(0, 4)],
                        'location' => ['Jakarta Selatan', 'Jakarta Timur', 'Bekasi', 'Tangerang', 'Depok'][rand(0, 4)],
                        'volume' => $vehiclePrefix == 'MX' ? rand(5, 9) . ' m³' : 'N/A',
                        'status' => ['Scheduled', 'Confirmed', 'Pending'][rand(0, 2)],
                    ];
                }
            }
        @endphp

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Vehicle Information</h3>
                        <div class="card-actions">
                            <span
                                class="badge {{ $vehicle['status'] == 'Operational'
                                    ? 'bg-green'
                                    : ($vehicle['status'] == 'In Maintenance'
                                        ? 'bg-yellow'
                                        : ($vehicle['status'] == 'On Delivery'
                                            ? 'bg-blue'
                                            : 'bg-red')) }}">
                                {{ $vehicle['status'] }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Vehicle ID</div>
                                <div class="datagrid-content">{{ $vehicle['id'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Type</div>
                                <div class="datagrid-content">{{ $vehicle['type'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">License Plate</div>
                                <div class="datagrid-content">{{ $vehicle['license'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Brand</div>
                                <div class="datagrid-content">{{ $vehicle['brand'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Model</div>
                                <div class="datagrid-content">{{ $vehicle['model'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Year</div>
                                <div class="datagrid-content">{{ $vehicle['year'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Capacity</div>
                                <div class="datagrid-content">{{ $vehicle['capacity'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Color</div>
                                <div class="datagrid-content">{{ $vehicle['color'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Assigned Driver</div>
                                <div class="datagrid-content">{{ $vehicle['driver'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Current Odometer</div>
                                <div class="datagrid-content">{{ $vehicle['odometer'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Technical Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Engine Number</div>
                                <div class="datagrid-content">{{ $vehicle['engine_number'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Chassis Number</div>
                                <div class="datagrid-content">{{ $vehicle['chassis_number'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Fuel Type</div>
                                <div class="datagrid-content">{{ $vehicle['fuel_type'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Fuel Tank Capacity</div>
                                <div class="datagrid-content">{{ $vehicle['fuel_capacity'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Avg. Fuel Consumption</div>
                                <div class="datagrid-content">{{ $vehicle['avg_fuel_consumption'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Financial Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Purchase Date</div>
                                <div class="datagrid-content">{{ $vehicle['purchase_date'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Purchase Price</div>
                                <div class="datagrid-content">{{ $vehicle['purchase_price'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Current Book Value</div>
                                <div class="datagrid-content">{{ $vehicle['current_value'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Insurance Number</div>
                                <div class="datagrid-content">{{ $vehicle['insurance_number'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Insurance Expiry</div>
                                <div class="datagrid-content">{{ $vehicle['insurance_expiry'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Tax Expiry</div>
                                <div class="datagrid-content">{{ $vehicle['tax_expiry'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Maintenance Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Last Maintenance</div>
                                <div class="datagrid-content">{{ $vehicle['last_maintenance'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Next Scheduled Maintenance</div>
                                <div class="datagrid-content">{{ $vehicle['next_maintenance'] }}</div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <h4 class="mb-3">Maintenance History</h4>
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Odometer</th>
                                            <th>Workshop</th>
                                            <th>Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($maintenanceHistory as $maintenance)
                                            <tr>
                                                <td>{{ $maintenance['date'] }}</td>
                                                <td>{{ $maintenance['type'] }}</td>
                                                <td>{{ $maintenance['odometer'] }}</td>
                                                <td>{{ $maintenance['workshop'] }}</td>
                                                <td>{{ $maintenance['cost'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Fuel Records</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Cost</th>
                                        <th>Odometer</th>
                                        <th>Station</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fuelRecords as $fuel)
                                        <tr>
                                            <td>{{ $fuel['date'] }}</td>
                                            <td>{{ $fuel['amount'] }}</td>
                                            <td>{{ $fuel['cost'] }}</td>
                                            <td>{{ $fuel['odometer'] }}</td>
                                            <td>{{ $fuel['station'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('delivery.fleet.fuel-tracking') }}" class="btn btn-outline-primary">
                            View All Fuel Records
                        </a>
                    </div>
                </div>

                @if (count($deliveryAssignments) > 0)
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Upcoming Assignments</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Customer</th>
                                            <th>Project</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($deliveryAssignments as $assignment)
                                            <tr>
                                                <td>{{ $assignment['date'] }}</td>
                                                <td>{{ $assignment['customer'] }}</td>
                                                <td>{{ $assignment['project'] }}</td>
                                                <td>{{ $assignment['location'] }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $assignment['status'] == 'Scheduled'
                                                            ? 'bg-blue'
                                                            : ($assignment['status'] == 'Confirmed'
                                                                ? 'bg-green'
                                                                : 'bg-yellow') }}">
                                                        {{ $assignment['status'] }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Notes</h3>
                    </div>
                    <div class="card-body">
                        <p>{{ $vehicle['notes'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
