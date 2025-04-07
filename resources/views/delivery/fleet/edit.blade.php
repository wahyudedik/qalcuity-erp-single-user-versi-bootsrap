@extends('layouts.app')

@section('title', 'Edit Vehicle')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Edit Vehicle
                    </h2>
                    <div class="text-muted mt-1">Update information for vehicle {{ $id }}</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('delivery.fleet') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Fleet
                        </a>
                        <a href="{{ route('delivery.fleet.detail', ['id' => $id]) }}"
                            class="btn btn-outline-primary d-none d-sm-inline-block">
                            <i class="ti ti-eye"></i>
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @php
            // Dummy data for the vehicle edit form
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
                'purchase_price' => rand(500, 2500) * 1000000,
                'depreciation_rate' => rand(5, 20),
                'engine_number' => strtoupper(substr(md5(rand()), 0, 10)),
                'chassis_number' => strtoupper(substr(md5(rand()), 0, 15)),
                'color' => ['White', 'Yellow', 'Orange', 'Blue', 'Red'][rand(0, 4)],
                'fuel_type' => ['Diesel', 'Gasoline'][rand(0, 1)],
                'fuel_capacity' => rand(60, 200),
                'odometer' => rand(10000, 150000),
                'insurance_number' => 'INS-' . rand(10000, 99999),
                'insurance_expiry' => date('Y-m-d', strtotime('+' . rand(1, 12) . ' months')),
                'tax_expiry' => date('Y-m-d', strtotime('+' . rand(1, 12) . ' months')),
                'last_maintenance' => date('Y-m-d', strtotime('-' . rand(1, 60) . ' days')),
                'next_maintenance' => date('Y-m-d', strtotime('+' . rand(1, 60) . ' days')),
                'maintenance_interval_km' => rand(3, 10) * 1000,
                'maintenance_interval_days' => rand(30, 120),
                'driver' => [
                    'Budi Santoso',
                    'Ahmad Rizki',
                    'Dedi Kurniawan',
                    'Eko Prasetyo',
                    'Faisal Rahman',
                    'Gunawan',
                    'Unassigned',
                ][rand(0, 6)],
                'branch' => ['Jakarta', 'Bekasi', 'Tangerang', 'Depok', 'Bogor'][rand(0, 4)],
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
        @endphp

        <div class="card mt-3">
            <div class="card-body">
                <form action="#" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Vehicle ID</label>
                                <input type="text" class="form-control" name="vehicle_id" value="{{ $vehicle['id'] }}"
                                    readonly>
                                <small class="form-hint">Vehicle ID cannot be changed</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Vehicle Type</label>
                                <select class="form-select" name="vehicle_type" required>
                                    <option value="Mixer Truck" {{ $vehicle['type'] == 'Mixer Truck' ? 'selected' : '' }}>
                                        Mixer Truck</option>
                                    <option value="Concrete Pump"
                                        {{ $vehicle['type'] == 'Concrete Pump' ? 'selected' : '' }}>Concrete Pump</option>
                                    <option value="Dump Truck" {{ $vehicle['type'] == 'Dump Truck' ? 'selected' : '' }}>Dump
                                        Truck</option>
                                    <option value="Pickup" {{ $vehicle['type'] == 'Pickup' ? 'selected' : '' }}>Pickup
                                    </option>
                                    <option value="SUV" {{ $vehicle['type'] == 'SUV' ? 'selected' : '' }}>SUV</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">License Plate</label>
                                <input type="text" class="form-control" name="license_plate"
                                    value="{{ $vehicle['license'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Brand</label>
                                <input type="text" class="form-control" name="brand" value="{{ $vehicle['brand'] }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Model</label>
                                <input type="text" class="form-control" name="model" value="{{ $vehicle['model'] }}"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label required">Year</label>
                                <input type="number" class="form-control" name="year" min="1990" max="2030"
                                    value="{{ $vehicle['year'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label required">Capacity</label>
                                <input type="text" class="form-control" name="capacity"
                                    value="{{ $vehicle['capacity'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label required">Color</label>
                                <input type="text" class="form-control" name="color" value="{{ $vehicle['color'] }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label required">Status</label>
                                <select class="form-select" name="status" required>
                                    <option value="Operational"
                                        {{ $vehicle['status'] == 'Operational' ? 'selected' : '' }}>Operational</option>
                                    <option value="In Maintenance"
                                        {{ $vehicle['status'] == 'In Maintenance' ? 'selected' : '' }}>In Maintenance
                                    </option>
                                    <option value="Out of Service"
                                        {{ $vehicle['status'] == 'Out of Service' ? 'selected' : '' }}>Out of Service
                                    </option>
                                    <option value="On Delivery"
                                        {{ $vehicle['status'] == 'On Delivery' ? 'selected' : '' }}>On Delivery</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="hr-text">Technical Information</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Engine Number</label>
                                <input type="text" class="form-control" name="engine_number"
                                    value="{{ $vehicle['engine_number'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Chassis Number</label>
                                <input type="text" class="form-control" name="chassis_number"
                                    value="{{ $vehicle['chassis_number'] }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Fuel Type</label>
                                <select class="form-select" name="fuel_type" required>
                                    <option value="Diesel" {{ $vehicle['fuel_type'] == 'Diesel' ? 'selected' : '' }}>
                                        Diesel</option>
                                    <option value="Gasoline" {{ $vehicle['fuel_type'] == 'Gasoline' ? 'selected' : '' }}>
                                        Gasoline</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Fuel Tank Capacity (L)</label>
                                <input type="number" class="form-control" name="fuel_capacity" min="1"
                                    value="{{ $vehicle['fuel_capacity'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Current Odometer (km)</label>
                                <input type="number" class="form-control" name="odometer" min="0"
                                    value="{{ $vehicle['odometer'] }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="hr-text">Financial Information</div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Purchase Date</label>
                                <input type="date" class="form-control" name="purchase_date"
                                    value="{{ $vehicle['purchase_date'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Purchase Price (Rp)</label>
                                <input type="number" class="form-control" name="purchase_price" min="0"
                                    value="{{ $vehicle['purchase_price'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Depreciation Rate (%/year)</label>
                                <input type="number" class="form-control" name="depreciation_rate" min="0"
                                    max="100" value="{{ $vehicle['depreciation_rate'] }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Insurance Number</label>
                                <input type="text" class="form-control" name="insurance_number"
                                    value="{{ $vehicle['insurance_number'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Insurance Expiry Date</label>
                                <input type="date" class="form-control" name="insurance_expiry"
                                    value="{{ $vehicle['insurance_expiry'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Tax Expiry Date</label>
                                <input type="date" class="form-control" name="tax_expiry"
                                    value="{{ $vehicle['tax_expiry'] }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="hr-text">Maintenance Information</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Last Maintenance Date</label>
                                <input type="date" class="form-control" name="last_maintenance"
                                    value="{{ $vehicle['last_maintenance'] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Next Maintenance Date</label>
                                <input type="date" class="form-control" name="next_maintenance"
                                    value="{{ $vehicle['next_maintenance'] }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Maintenance Interval (km)</label>
                                <input type="number" class="form-control" name="maintenance_interval_km" min="0"
                                    value="{{ $vehicle['maintenance_interval_km'] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Maintenance Interval (days)</label>
                                <input type="number" class="form-control" name="maintenance_interval_days"
                                    min="0" value="{{ $vehicle['maintenance_interval_days'] }}">
                            </div>
                        </div>
                    </div>

                    <div class="hr-text">Assignment Information</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Assigned Driver</label>
                                <select class="form-select" name="driver">
                                    <option value="">Unassigned</option>
                                    <option value="Budi Santoso"
                                        {{ $vehicle['driver'] == 'Budi Santoso' ? 'selected' : '' }}>Budi Santoso</option>
                                    <option value="Ahmad Rizki"
                                        {{ $vehicle['driver'] == 'Ahmad Rizki' ? 'selected' : '' }}>Ahmad Rizki</option>
                                    <option value="Dedi Kurniawan"
                                        {{ $vehicle['driver'] == 'Dedi Kurniawan' ? 'selected' : '' }}>Dedi Kurniawan
                                    </option>
                                    <option value="Eko Prasetyo"
                                        {{ $vehicle['driver'] == 'Eko Prasetyo' ? 'selected' : '' }}>Eko Prasetyo</option>
                                    <option value="Faisal Rahman"
                                        {{ $vehicle['driver'] == 'Faisal Rahman' ? 'selected' : '' }}>Faisal Rahman
                                    </option>
                                    <option value="Gunawan" {{ $vehicle['driver'] == 'Gunawan' ? 'selected' : '' }}>
                                        Gunawan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Branch Assignment</label>
                                <select class="form-select" name="branch">
                                    <option value="Jakarta" {{ $vehicle['branch'] == 'Jakarta' ? 'selected' : '' }}>
                                        Jakarta</option>
                                    <option value="Bekasi" {{ $vehicle['branch'] == 'Bekasi' ? 'selected' : '' }}>Bekasi
                                    </option>
                                    <option value="Tangerang" {{ $vehicle['branch'] == 'Tangerang' ? 'selected' : '' }}>
                                        Tangerang</option>
                                    <option value="Depok" {{ $vehicle['branch'] == 'Depok' ? 'selected' : '' }}>Depok
                                    </option>
                                    <option value="Bogor" {{ $vehicle['branch'] == 'Bogor' ? 'selected' : '' }}>Bogor
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" name="notes" rows="3">{{ $vehicle['notes'] }}</textarea>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">Update Vehicle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
