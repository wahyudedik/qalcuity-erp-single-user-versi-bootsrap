@extends('layouts.app')

@section('title', 'Create Delivery Schedule')

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
                        Create Delivery Schedule
                    </h2>
                    <div class="text-muted mt-1">Schedule a new concrete delivery</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('delivery.scheduling') }}"
                            class="btn btn-outline-primary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left me-2"></i>
                            Back to List
                        </a>
                        <a href="{{ route('delivery.scheduling') }}" class="btn btn-outline-primary d-sm-none">
                            <i class="ti ti-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <form action="#" method="POST" class="mt-3">
            @csrf

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

                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer['id'] }}">{{ $customer['name'] }}</option>
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

                                    @foreach ($projects as $project)
                                        <option value="{{ $project['id'] }}">{{ $project['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Contact Person</label>
                                        <input type="text" class="form-control" name="contact_person"
                                            placeholder="Contact person name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Contact Phone</label>
                                        <input type="text" class="form-control" name="contact_phone"
                                            placeholder="Contact phone number" required>
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
                                <textarea class="form-control" name="address" rows="3" placeholder="Enter delivery address" required></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Latitude</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="ti ti-map-pin"></i>
                                        </span>
                                        <input type="text" class="form-control" name="latitude" placeholder="Latitude">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Longitude</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="ti ti-map-pin"></i>
                                        </span>
                                        <input type="text" class="form-control" name="longitude" placeholder="Longitude">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Distance (km)</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="distance"
                                            placeholder="Estimated distance" step="0.1">
                                        <span class="input-group-text">km</span>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Estimated Travel Time</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="travel_time"
                                            placeholder="Estimated travel time">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Delivery Date</label>
                                        <div class="input-icon">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control" name="delivery_date"
                                                id="delivery-date" placeholder="Select date" required>
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
                                            <input type="text" class="form-control" name="delivery_time"
                                                id="delivery-time" placeholder="Select time" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Volume</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="volume"
                                                placeholder="Enter volume" min="1" step="0.5" required>
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

                                            @foreach ($mixDesigns as $mixDesign)
                                                <option value="{{ $mixDesign['id'] }}">{{ $mixDesign['name'] }}</option>
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

                                            @foreach ($trucks as $truck)
                                                <option value="{{ $truck['id'] }}">{{ $truck['name'] }}
                                                    ({{ $truck['capacity'] }})</option>
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

                                            @foreach ($drivers as $driver)
                                                <option value="{{ $driver['id'] }}">{{ $driver['name'] }}</option>
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

                                            @foreach ($pumps as $pump)
                                                <option value="{{ $pump['id'] }}">{{ $pump['name'] }}
                                                    ({{ $pump['type'] }})</option>
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

                                            @foreach ($operators as $operator)
                                                <option value="{{ $operator['id'] }}">{{ $operator['name'] }}</option>
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
                                <textarea class="form-control" name="special_requirements" rows="3"
                                    placeholder="Enter any special requirements or notes for this delivery"></textarea>
                                <div class="form-hint mt-2">
                                    <i class="ti ti-info-circle me-1"></i>
                                    Include any special instructions for the driver or specific requirements for the
                                    delivery
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-footer mt-3">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('delivery.scheduling') }}" class="btn btn-outline-secondary">
                        <i class="ti ti-x me-2"></i>Cancel
                    </a>
                    <div class="action-buttons">
                        <button type="submit" name="action" value="save" class="btn btn-primary">
                            <i class="ti ti-device-floppy me-2"></i>Save Schedule
                        </button>
                        <button type="submit" name="action" value="save_and_add" class="btn btn-success">
                            <i class="ti ti-plus me-2"></i>Save and Add Another
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
            pumpOperatorSelect.disabled = true;

            // Customer and project relationship
            const customerSelect = document.querySelector('select[name="customer_id"]');
            const projectSelect = document.querySelector('select[name="project_id"]');

            customerSelect.addEventListener('change', function() {
                // In a real application, you would fetch projects for the selected customer
                // For now, we'll just reset the project selection
                projectSelect.value = '';
                $(projectSelect).trigger('change');
            });

            // Volume and truck recommendation
            const volumeInput = document.querySelector('input[name="volume"]');
            const truckSelect = document.querySelector('select[name="truck_id"]');

            volumeInput.addEventListener('change', function() {
                const volume = parseFloat(this.value);
                if (volume > 10) {
                    // Show recommendation for larger trucks
                    Swal.fire({
                        icon: 'info',
                        title: 'Truck Recommendation',
                        text: 'For volumes over 10m³, we recommend using Mixer 04 or Mixer 05 (12m³ capacity).',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    </script>
@endsection
