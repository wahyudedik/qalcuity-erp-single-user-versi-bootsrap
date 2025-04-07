@extends('layouts.app')

@section('title', 'Delivery Schedule Detail')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Delivery Schedule Detail
                    </h2>
                    <div class="text-muted mt-1">Schedule #SCH-{{ 1000 + $id }}</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('delivery.scheduling') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left me-2"></i>
                            Back to List
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="ti ti-menu me-2"></i>
                                Actions
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('delivery.scheduling.edit', $id) }}">
                                    <i class="ti ti-edit me-2"></i>
                                    Edit Schedule
                                </a>
                                <a class="dropdown-item" href="#" onclick="window.print()">
                                    <i class="ti ti-printer me-2"></i>
                                    Print Schedule
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-message-circle me-2"></i>
                                    Send Notification
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal"
                                    data-bs-target="#cancelModal">
                                    <i class="ti ti-x me-2"></i>
                                    Cancel Delivery
                                </a>
                            </div>
                        </div>
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
            $customer = [
                'PT Pembangunan Jaya',
                'CV Karya Mandiri',
                'PT Konstruksi Utama',
                'PT Bangun Persada',
                'CV Maju Jaya',
            ][$customerId - 1];
            $projectId = rand(1, 5);
            $project = [
                'Apartment Tower A',
                'Office Building B',
                'Highway Section C',
                'Shopping Mall D',
                'Residential Complex E',
            ][$projectId - 1];
            $mixDesignId = rand(1, 5);
            $mixDesign = 'K-' . (250 + ($mixDesignId - 1) * 50);
            $pumpId = rand(0, 5);
            $pump = $pumpId > 0 ? 'Pump ' . sprintf('%02d', $pumpId) : 'None';
            $pumpOperatorId = $pumpId > 0 ? rand(1, 5) : 0;
            $pumpOperator =
                $pumpOperatorId > 0
                    ? ['Alex Johnson', 'Brian Smith', 'Carlos Rodriguez', 'David Lee', 'Eric Williams'][
                        $pumpOperatorId - 1
                    ]
                    : 'None';
            $address = [
                'Jl. Gatot Subroto No. 123, Jakarta Selatan',
                'Jl. Sudirman Kav. 45, Jakarta Pusat',
                'Jl. TB Simatupang No. 89, Jakarta Selatan',
                'Jl. Rasuna Said Blok X-5, Jakarta Selatan',
                'Jl. MT Haryono No. 22, Jakarta Timur',
            ][rand(0, 4)];
            $distance = rand(5, 30);
            $travelTime = $distance * 2 + rand(10, 30);
            $contactPerson = ['Ahmad Yani', 'Budi Santoso', 'Citra Dewi', 'Dian Pratama', 'Eko Nugroho'][rand(0, 4)];
            $contactPhone = '08' . rand(1, 9) . rand(10000000, 99999999);
            $specialRequirements = rand(0, 1)
                ? 'Need extra slump for pumping. Access road is narrow, use smaller truck if possible.'
                : '';
            $createdBy = ['Admin User', 'Sales Manager', 'Dispatch Officer', 'Plant Manager', 'Operations Manager'][
                rand(0, 4)
            ];
            $createdAt = date('Y-m-d H:i:s', strtotime('-' . rand(1, 10) . ' days'));
            $updatedAt = rand(0, 1) ? date('Y-m-d H:i:s', strtotime('-' . rand(0, 3) . ' days')) : $createdAt;

            $statusBadgeClasses = [
                'scheduled' => 'bg-blue',
                'in-progress' => 'bg-yellow',
                'completed' => 'bg-green',
                'cancelled' => 'bg-red',
            ];
        @endphp

        <div class="card mt-3">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="card-title">Schedule Information</h3>
                    </div>
                    <div class="col-auto">
                        <span class="badge {{ $statusBadgeClasses[$status] }} me-2">{{ ucfirst($status) }}</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Schedule ID</div>
                        <div class="datagrid-content">SCH-{{ 1000 + $id }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Created By</div>
                        <div class="datagrid-content">{{ $createdBy }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Created At</div>
                        <div class="datagrid-content">{{ $createdAt }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Last Updated</div>
                        <div class="datagrid-content">{{ $updatedAt }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Customer Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Customer</div>
                                <div class="datagrid-content">{{ $customer }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Project</div>
                                <div class="datagrid-content">{{ $project }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Contact Person</div>
                                <div class="datagrid-content">{{ $contactPerson }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Contact Phone</div>
                                <div class="datagrid-content">{{ $contactPhone }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Delivery Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Delivery Date</div>
                                <div class="datagrid-content">{{ $date }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Delivery Time</div>
                                <div class="datagrid-content">{{ $time }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Volume</div>
                                <div class="datagrid-content">{{ $volume }} m³</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Mix Design</div>
                                <div class="datagrid-content">{{ $mixDesign }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Delivery Location</h3>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Address</div>
                                <div class="datagrid-content">{{ $address }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Distance</div>
                                <div class="datagrid-content">{{ $distance }} km</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Estimated Travel Time</div>
                                <div class="datagrid-content">{{ $travelTime }} minutes</div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <div id="map-placeholder"
                                style="height: 200px; background-color: #e9ecef; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                                <span class="text-muted">Map would be displayed here</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Resource Assignment</h3>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Truck</div>
                                <div class="datagrid-content">{{ $truck }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Driver</div>
                                <div class="datagrid-content">{{ $driver }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Pump</div>
                                <div class="datagrid-content">{{ $pump }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Pump Operator</div>
                                <div class="datagrid-content">{{ $pumpOperator }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($specialRequirements)
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Additional Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Special Requirements</div>
                                    <div class="datagrid-content">{{ $specialRequirements }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Delivery Timeline</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="timeline">
                            @php
                                $scheduledTime = strtotime("$date $time");
                                $departureTime = $scheduledTime - rand(15, 30) * 60;
                                $arrivalTime = $scheduledTime - rand(5, 15) * 60;
                                $pourStartTime = $scheduledTime + rand(5, 15) * 60;
                                $pourEndTime = $pourStartTime + ($volume / 10) * 3600;
                                $returnTime = $pourEndTime + $travelTime * 60;
                            @endphp

                            <li>
                                <div class="timeline-badge bg-success"></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h6 class="timeline-title">Schedule Created</h6>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Delivery scheduled for {{ $date }} at {{ $time }}</p>
                                    </div>
                                    <div class="timeline-footer">
                                        <p class="text-muted">{{ $createdAt }}</p>
                                    </div>
                                </div>
                            </li>

                            @if ($status != 'cancelled')
                                <li>
                                    <div
                                        class="timeline-badge {{ $status == 'scheduled' ? 'bg-secondary' : 'bg-success' }}">
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h6 class="timeline-title">Truck Departure</h6>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{{ $truck }} with driver {{ $driver }} departed from plant</p>
                                        </div>
                                        <div class="timeline-footer">
                                            <p class="text-muted">
                                                {{ $status == 'scheduled' ? 'Estimated: ' : '' }}{{ date('Y-m-d H:i', $departureTime) }}
                                            </p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="timeline-badge {{ $status == 'scheduled' ? 'bg-secondary' : 'bg-success' }}">
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h6 class="timeline-title">Arrival at Site</h6>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Truck arrived at delivery location</p>
                                        </div>
                                        <div class="timeline-footer">
                                            <p class="text-muted">
                                                {{ $status == 'scheduled' ? 'Estimated: ' : '' }}{{ date('Y-m-d H:i', $arrivalTime) }}
                                            </p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="timeline-badge {{ in_array($status, ['scheduled', 'in-progress']) ? 'bg-secondary' : 'bg-success' }}">
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h6 class="timeline-title">Pour Started</h6>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Concrete pouring started</p>
                                        </div>
                                        <div class="timeline-footer">
                                            <p class="text-muted">
                                                {{ in_array($status, ['scheduled', 'in-progress']) ? 'Estimated: ' : '' }}{{ date('Y-m-d H:i', $pourStartTime) }}
                                            </p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="timeline-badge {{ in_array($status, ['scheduled', 'in-progress']) ? 'bg-secondary' : 'bg-success' }}">
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h6 class="timeline-title">Pour Completed</h6>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Concrete pouring completed</p>
                                        </div>
                                        <div class="timeline-footer">
                                            <p class="text-muted">
                                                {{ in_array($status, ['scheduled', 'in-progress']) ? 'Estimated: ' : '' }}{{ date('Y-m-d H:i', $pourEndTime) }}
                                            </p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="timeline-badge {{ in_array($status, ['scheduled', 'in-progress']) ? 'bg-secondary' : 'bg-success' }}">
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h6 class="timeline-title">Return to Plant</h6>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Truck returned to plant</p>
                                        </div>
                                        <div class="timeline-footer">
                                            <p class="text-muted">
                                                {{ in_array($status, ['scheduled', 'in-progress']) ? 'Estimated: ' : '' }}{{ date('Y-m-d H:i', $returnTime) }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li>
                                    <div class="timeline-badge bg-danger"></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h6 class="timeline-title">Delivery Cancelled</h6>
                                        </div>
                                        <div class="timeline-body">
                                            <p>This delivery was cancelled</p>
                                        </div>
                                        <div class="timeline-footer">
                                            <p class="text-muted">
                                                {{ date('Y-m-d H:i', strtotime('-' . rand(1, 3) . ' days')) }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cancel Modal -->
        <div class="modal modal-blur fade" id="cancelModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cancel Delivery</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Cancellation Reason</label>
                            <select class="form-select">
                                <option value="">Select reason</option>
                                <option value="customer_request">Customer Request</option>
                                <option value="weather_conditions">Weather Conditions</option>
                                <option value="equipment_failure">Equipment Failure</option>
                                <option value="resource_unavailable">Resource Unavailable</option>
                                <option value="site_not_ready">Site Not Ready</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Additional Notes</label>
                            <textarea class="form-control" rows="3" placeholder="Enter additional notes"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary me-auto"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Confirm
                            Cancellation</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
