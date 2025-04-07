@extends('layouts.app')

@section('title', 'Add New Vehicle')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Add New Vehicle
                    </h2>
                    <div class="text-muted mt-1">Enter details for a new vehicle in the fleet</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('delivery.fleet') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Fleet
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <form action="#" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Vehicle ID</label>
                                <input type="text" class="form-control" name="vehicle_id" placeholder="e.g. MX-001"
                                    required>
                                <small class="form-hint">Use format: XX-000 (MX for Mixer, CP for Concrete Pump,
                                    etc.)</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Vehicle Type</label>
                                <select class="form-select" name="vehicle_type" required>
                                    <option value="">Select vehicle type</option>
                                    <option value="Mixer Truck">Mixer Truck</option>
                                    <option value="Concrete Pump">Concrete Pump</option>
                                    <option value="Dump Truck">Dump Truck</option>
                                    <option value="Pickup">Pickup</option>
                                    <option value="SUV">SUV</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">License Plate</label>
                                <input type="text" class="form-control" name="license_plate"
                                    placeholder="e.g. B 1234 ABC" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Brand</label>
                                <input type="text" class="form-control" name="brand" placeholder="e.g. Hino" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Model</label>
                                <input type="text" class="form-control" name="model" placeholder="e.g. FM 260 JD"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label required">Year</label>
                                <input type="number" class="form-control" name="year" min="1990" max="2030"
                                    placeholder="e.g. 2022" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label required">Capacity</label>
                                <input type="text" class="form-control" name="capacity" placeholder="e.g. 7 m³" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label required">Color</label>
                                <input type="text" class="form-control" name="color" placeholder="e.g. White" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label required">Status</label>
                                <select class="form-select" name="status" required>
                                    <option value="Operational">Operational</option>
                                    <option value="In Maintenance">In Maintenance</option>
                                    <option value="Out of Service">Out of Service</option>
                                    <option value="On Delivery">On Delivery</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="hr-text">Technical Information</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Engine Number</label>
                                <input type="text" class="form-control" name="engine_number" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Chassis Number</label>
                                <input type="text" class="form-control" name="chassis_number" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Fuel Type</label>
                                <select class="form-select" name="fuel_type" required>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Gasoline">Gasoline</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Fuel Tank Capacity (L)</label>
                                <input type="number" class="form-control" name="fuel_capacity" min="1" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Initial Odometer (km)</label>
                                <input type="number" class="form-control" name="odometer" min="0" required>
                            </div>
                        </div>
                    </div>

                    <div class="hr-text">Financial Information</div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Purchase Date</label>
                                <input type="date" class="form-control" name="purchase_date" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Purchase Price (Rp)</label>
                                <input type="number" class="form-control" name="purchase_price" min="0"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Depreciation Rate (%/year)</label>
                                <input type="number" class="form-control" name="depreciation_rate" min="0"
                                    max="100" value="10">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Insurance Number</label>
                                <input type="text" class="form-control" name="insurance_number" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Insurance Expiry Date</label>
                                <input type="date" class="form-control" name="insurance_expiry" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label required">Tax Expiry Date</label>
                                <input type="date" class="form-control" name="tax_expiry" required>
                            </div>
                        </div>
                    </div>

                    <div class="hr-text">Maintenance Information</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Last Maintenance Date</label>
                                <input type="date" class="form-control" name="last_maintenance">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Next Maintenance Date</label>
                                <input type="date" class="form-control" name="next_maintenance">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Maintenance Interval (km)</label>
                                <input type="number" class="form-control" name="maintenance_interval_km" min="0"
                                    value="5000">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Maintenance Interval (days)</label>
                                <input type="number" class="form-control" name="maintenance_interval_days"
                                    min="0" value="90">
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
                                    <option value="Budi Santoso">Budi Santoso</option>
                                    <option value="Ahmad Rizki">Ahmad Rizki</option>
                                    <option value="Dedi Kurniawan">Dedi Kurniawan</option>
                                    <option value="Eko Prasetyo">Eko Prasetyo</option>
                                    <option value="Faisal Rahman">Faisal Rahman</option>
                                    <option value="Gunawan">Gunawan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Branch Assignment</label>
                                <select class="form-select" name="branch">
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Bekasi">Bekasi</option>
                                    <option value="Tangerang">Tangerang</option>
                                    <option value="Depok">Depok</option>
                                    <option value="Bogor">Bogor</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" name="notes" rows="3"
                            placeholder="Additional information about this vehicle"></textarea>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">Add Vehicle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
