@extends('layouts.app')

@section('title', 'Edit Delivery Schedule')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
<style>
    .select2-container--default .select2-selection--single {
        height: 38px;
        border: 1px solid rgba(98, 105, 118, 0.16);
        border-radius: 4px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px;
        padding-left: 12px;
        color: #495057;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px;
    }
    .form-section {
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        margin-bottom: 1.5rem;
        border: 1px solid rgba(98, 105, 118, 0.16);
    }
    .form-section-header {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid rgba(98, 105, 118, 0.16);
        background-color: #fff;
        border-radius: 8px 8px 0 0;
    }
    .form-section-body {
        padding: 1.5rem;
    }
    .form-label.required:after {
        content: " *";
        color: #d63939;
    }
    #map-placeholder {
        height: 200px;
        background-color: #e9ecef;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px dashed #adb5bd;
    }
    .status-badge {
        width: 100px;
        text-align: center;
    }
    .action-buttons {
        display: flex;
        gap: 1rem;
    }
    .action-buttons .btn {
        flex: 1;
    }
</style>
@endsection

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Delivery Management
                </div>
                <h2 class="page-title">
                    Edit Delivery Schedule
                </h2>
                <div class="text-muted mt-1">Schedule #SCH-{{ 1000 + $id }}</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('delivery.scheduling.detail', $id) }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left me-2"></i>
                        Back to Detail
                    </a>
                    <a href="{{ route('delivery.scheduling.detail', $id) }}" class="btn btn-outline-primary d-sm-none">
                        <i class="ti ti-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @php
        $statuses = ['scheduled', 'in-progress', 'completed', 'cancelled'];
        $status = $statuses[array_rand($statuses)];
        $date = date('Y-m-d', strtotime('+' . rand(0, 14) . ' days'));
        $time = sprintf('%02d:%02d', rand(7, 16), rand(0, 59));
        $volume = rand(5, 50);
        $truckId = rand(1, 5);
        $truck = 'Mixer ' . sprintf('%02d', $truckId);
        $driverId = rand(1, 5);
        $driver = ['John Doe', 'Jane Smith', 'Robert Johnson', 'Emily Davis', 'Michael Brown'][$driverId - 1];
        $customerId = rand(1, 5);
        $customer = ['PT Pembangunan Jaya', 'CV Karya Mandiri', 'PT Konstruksi Utama', 'PT Bangun Persada', 'CV Maju Jaya'][$customerId - 1];
        $projectId = rand(1, 5);
        $project = ['Apartment Tower A', 'Office Building B', 'Highway Section C', 'Shopping Mall D', 'Residential Complex E'][$projectId - 1];
        $mixDesignId = rand(1, 5);
        $mixDesign = 'K-' . (250 + (($mixDesignId - 1) * 50));
        $pumpId = rand(0, 5);
        $pump = $pumpId > 0 ? 'Pump ' . sprintf('%02d', $pumpId) : 'None';
        $pumpOperatorId = $pumpId > 0 ? rand(1, 5) : 0;
        $pumpOperator = $pumpOperatorId > 0 ? ['Alex Johnson', 'Brian Smith', 'Carlos Rodriguez', 'David Lee', 'Eric Williams'][$pumpOperatorId - 1] : 'None';
        $address = ['Jl. Gatot Subroto No. 123, Jakarta Selatan', 'Jl. Sudirman Kav. 45, Jakarta Pusat', 'Jl. TB Simatupang No. 89, Jakarta Selatan', 'Jl. Rasuna Said Blok X-5, Jakarta Selatan', 'Jl. MT Haryono No. 22, Jakarta Timur'][rand(0, 4)];
        $distance = rand(5, 30);
        $travelTime = $distance * 2 + rand(10, 30);
        $contactPerson = ['Ahmad Yani', 'Budi Santoso', 'Citra Dewi', 'Dian Pratama', 'Eko Nugroho'][rand(0, 4)];
        $contactPhone = '08' . rand(1, 9) . rand(10000000, 99999999);
        $specialRequirements = rand(0, 1) ? 'Need extra slump for pumping. Access road is narrow, use smaller truck if possible.' : '';
    @endphp

    <form action="#" method="POST" class="mt-3">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-section">
                    <div class="form-section-header">
                        <h3 class="card-title">
                            <i class="ti ti-users me-2 text-primary"></i>
                            Customer Information
                        </h3>
                    </div>
                    <div class="form-section-body">
                        <div class="mb-3">
                            <label class="form-label required">Customer</label>
                            <select name="customer_id" class="form-select select2" required>
                                <option value="">Select Customer</option>
                                @php
                                    $customers = [
                                        ['id' => 1, 'name' => 'PT Pembangunan Jaya'],
                                        ['id' => 2, 'name' => 'CV Karya Mandiri'],
                                        ['id' => 3, 'name' => 'PT Konstruksi Utama'],
                                        ['id' => 4, 'name' => 'PT Bangun Persada'],
                                        ['id' => 5, 'name' => 'CV Maju Jaya'],
                                    ];
                                @endphp
                                
                                @foreach($customers as $c)
                                    <option value="{{ $c['id'] }}" {{ $c['name'] == $customer ? 'selected' : '' }}>{{ $c['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label required">Project</label>
                            <select name="project_id" class="form-select select2" required>
                                <option value="">Select Project</option>
                                @php
                                    $projects = [
                                        ['id' => 1, 'name' => 'Apartment Tower A'],
                                        ['id' => 2, 'name' => 'Office Building B'],
                                        ['id' => 3, 'name' => 'Highway Section C'],
                                        ['id' => 4, 'name' => 'Shopping Mall D'],
                                        ['id' => 5, 'name' => 'Residential Complex E'],
                                    ];
                                @endphp
                                
                                @foreach($projects as $p)
                                    <option value="{{ $p['id'] }}" {{ $p['name'] == $project ? 'selected' : '' }}>{{ $p['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required">Contact Person</label>
                                    <input type="text" class="form-control" name="contact_person" value="{{ $contactPerson }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required">Contact Phone</label>
                                    <input type="text" class="form-control" name="contact_phone" value="{{ $contactPhone }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-section-header">
                        <h3 class="card-title">
                            <i class="ti ti-map-pin me-2 text-primary"></i>
                            Delivery Location
                        </h3>
                    </div>
                    <div class="form-section-body">
                        <div class="mb-3">
                            <label class="form-label required">Address</label>
                            <textarea class="form-control" name="address" rows="3" required>{{ $address }}</textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Latitude</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="ti ti-map-pin"></i>
                                    </span>
                                    <input type="text" class="form-control" name="latitude" value="-6.{{ rand(100000, 999999) }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Longitude</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="ti ti-map-pin"></i>
                                    </span>
                                    <input type="text" class="form-control" name="longitude" value="106.{{ rand(700000, 999999) }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Distance (km)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="distance" value="{{ $distance }}" step="0.1">
                                    <span class="input-group-text">km</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Estimated Travel Time</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="travel_time" value="{{ $travelTime }}">
                                    <span class="input-group-text">minutes</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Location Map</label>
                            <div id="map-placeholder">
                                <span class="text-muted">
                                    <i class="ti ti-map me-2"></i>
                                    Map would be displayed here
                                </span>
                            </div>
                            <div class="form-hint mt-2">
                                <i class="ti ti-info-circle me-1"></i>
                                Click on the map to set precise location or enter coordinates manually
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-section">
                    <div class="form-section-header">
                        <h3 class="card-title">
                            <i class="ti ti-calendar-event me-2 text-primary"></i>
                            Delivery Information
                        </h3>
                    </div>
                    <div class="form-section-body">
                        <div class="mb-3">
                            <label class="form-label required">Status</label>
                            <select name="status" class="form-select" required>
                                @foreach($statuses as $s)
                                    <option value="{{ $s }}" {{ $s == $status ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required">Delivery Date</label>
                                    <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control" name="delivery_date" id="delivery-date" value="{{ $date }}" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required">Delivery Time</label>
                                                                        <div class="input-icon">
                                        <span class="input-icon-addon">
                                            <i class="ti ti-clock"></i>
                                        </span>
                                        <input type="text" class="form-control" name="delivery_time" id="delivery-time" value="{{ $time }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required">Volume</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="volume" value="{{ $volume }}" min="1" step="0.5" required>
                                        <span class="input-group-text">m³</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required">Mix Design</label>
                                    <select name="mix_design_id" class="form-select select2" required>
                                        <option value="">Select Mix Design</option>
                                        @php
                                            $mixDesigns = [
                                                ['id' => 1, 'name' => 'K-250'],
                                                ['id' => 2, 'name' => 'K-300'],
                                                ['id' => 3, 'name' => 'K-350'],
                                                ['id' => 4, 'name' => 'K-400'],
                                                ['id' => 5, 'name' => 'K-450'],
                                            ];
                                        @endphp
                                        
                                        @foreach($mixDesigns as $md)
                                            <option value="{{ $md['id'] }}" {{ $md['name'] == $mixDesign ? 'selected' : '' }}>{{ $md['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-section-header">
                        <h3 class="card-title">
                            <i class="ti ti-truck me-2 text-primary"></i>
                            Resource Assignment
                        </h3>
                    </div>
                    <div class="form-section-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required">Truck</label>
                                    <select name="truck_id" class="form-select select2" required>
                                        <option value="">Select Truck</option>
                                        @php
                                            $trucks = [
                                                ['id' => 1, 'name' => 'Mixer 01', 'capacity' => '8 m³'],
                                                ['id' => 2, 'name' => 'Mixer 02', 'capacity' => '8 m³'],
                                                ['id' => 3, 'name' => 'Mixer 03', 'capacity' => '10 m³'],
                                                ['id' => 4, 'name' => 'Mixer 04', 'capacity' => '12 m³'],
                                                ['id' => 5, 'name' => 'Mixer 05', 'capacity' => '12 m³'],
                                            ];
                                        @endphp
                                        
                                        @foreach($trucks as $t)
                                            <option value="{{ $t['id'] }}" {{ $t['name'] == $truck ? 'selected' : '' }}>{{ $t['name'] }} ({{ $t['capacity'] }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required">Driver</label>
                                    <select name="driver_id" class="form-select select2" required>
                                        <option value="">Select Driver</option>
                                        @php
                                            $drivers = [
                                                ['id' => 1, 'name' => 'John Doe'],
                                                ['id' => 2, 'name' => 'Jane Smith'],
                                                ['id' => 3, 'name' => 'Robert Johnson'],
                                                ['id' => 4, 'name' => 'Emily Davis'],
                                                ['id' => 5, 'name' => 'Michael Brown'],
                                            ];
                                        @endphp
                                        
                                        @foreach($drivers as $d)
                                            <option value="{{ $d['id'] }}" {{ $d['name'] == $driver ? 'selected' : '' }}>{{ $d['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Pump (Optional)</label>
                                    <select name="pump_id" class="form-select select2">
                                        <option value="">Select Pump (if needed)</option>
                                        @php
                                            $pumps = [
                                                ['id' => 1, 'name' => 'Pump 01', 'type' => 'Stationary'],
                                                ['id' => 2, 'name' => 'Pump 02', 'type' => 'Stationary'],
                                                ['id' => 3, 'name' => 'Pump 03', 'type' => 'Mobile'],
                                                ['id' => 4, 'name' => 'Pump 04', 'type' => 'Mobile'],
                                                ['id' => 5, 'name' => 'Pump 05', 'type' => 'Long Reach'],
                                            ];
                                        @endphp
                                        
                                        @foreach($pumps as $p)
                                            <option value="{{ $p['id'] }}" {{ $p['name'] == $pump ? 'selected' : '' }}>{{ $p['name'] }} ({{ $p['type'] }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Pump Operator (Optional)</label>
                                    <select name="pump_operator_id" class="form-select select2">
                                        <option value="">Select Pump Operator (if needed)</option>
                                        @php
                                            $operators = [
                                                ['id' => 1, 'name' => 'Alex Johnson'],
                                                ['id' => 2, 'name' => 'Brian Smith'],
                                                ['id' => 3, 'name' => 'Carlos Rodriguez'],
                                                ['id' => 4, 'name' => 'David Lee'],
                                                ['id' => 5, 'name' => 'Eric Williams'],
                                            ];
                                        @endphp
                                        
                                        @foreach($operators as $o)
                                            <option value="{{ $o['id'] }}" {{ $o['name'] == $pumpOperator ? 'selected' : '' }}>{{ $o['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <div class="form-section-header">
                        <h3 class="card-title">
                            <i class="ti ti-notes me-2 text-primary"></i>
                            Additional Information
                        </h3>
                    </div>
                    <div class="form-section-body">
                        <div class="mb-3">
                            <label class="form-label">Special Requirements</label>
                            <textarea class="form-control" name="special_requirements" rows="3" placeholder="Enter any special requirements or notes for this delivery">{{ $specialRequirements }}</textarea>
                            <div class="form-hint">
                                <i class="ti ti-info-circle me-1"></i>
                                Include any special instructions for the driver or specific requirements for the delivery
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-footer mt-3">
            <div class="d-flex justify-content-between">
                <a href="{{ route('delivery.scheduling.detail', $id) }}" class="btn btn-outline-secondary">
                    <i class="ti ti-x me-2"></i>Cancel
                </a>
                <div class="action-buttons">
                    <button type="submit" name="action" value="save" class="btn btn-primary">
                        <i class="ti ti-device-floppy me-2"></i>Save Changes
                    </button>
                    <button type="submit" name="action" value="save_and_continue" class="btn btn-success">
                        <i class="ti ti-check me-2"></i>Save and Continue Editing
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize date picker
        flatpickr("#delivery-date", {
            dateFormat: "Y-m-d",
            minDate: "today",
            allowInput: true
        });
        
        // Initialize time picker
        flatpickr("#delivery-time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minuteIncrement: 15,
            allowInput: true
        });
        
        // Initialize select2
        $('.select2').select2({
            width: '100%',
            dropdownParent: $('body')
        });
        
        // Form validation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (!isValid) {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please fill in all required fields.',
                    confirmButtonText: 'OK'
                });
            }
        });
        
        // Dynamic field dependencies
        const pumpSelect = document.querySelector('select[name="pump_id"]');
        const pumpOperatorSelect = document.querySelector('select[name="pump_operator_id"]');
        
        pumpSelect.addEventListener('change', function() {
            if (this.value === '') {
                pumpOperatorSelect.value = '';
                pumpOperatorSelect.disabled = true;
            } else {
                pumpOperatorSelect.disabled = false;
            }
            $(pumpOperatorSelect).trigger('change');
        });
        
        // Initialize pump operator state
        if (pumpSelect.value === '') {
            pumpOperatorSelect.value = '';
            pumpOperatorSelect.disabled = true;
            $(pumpOperatorSelect).trigger('change');
        }
    });
</script>
@endsection

