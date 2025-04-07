@extends('layouts.app')

@section('title', 'Maintenance Schedule')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
    <style>
        .fc-event {
            cursor: pointer;
        }

        .calendar-container {
            height: 700px;
        }

        .fc-event-title {
            font-weight: 500;
        }

        .fc-daygrid-event {
            white-space: normal;
        }
    </style>
@endsection

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Maintenance Schedule
                    </h2>
                    <div class="text-muted mt-1">Plan and view all scheduled maintenance activities</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('production.machine-maintenance.create') }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus me-2"></i>
                            Schedule New Maintenance
                        </a>
                        <a href="{{ route('production.machine-maintenance') }}" class="btn">
                            <i class="ti ti-arrow-left me-2"></i>
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Filter</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Machine Type</label>
                                <div class="form-selectgroup">
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="machine_type[]" value="batch_plant"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Batch Plant</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="machine_type[]" value="mixer"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Mixer</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="machine_type[]" value="pump"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Pump</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="machine_type[]" value="conveyor"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Conveyor</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="machine_type[]" value="silo"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Silo</span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Maintenance Type</label>
                                <div class="form-selectgroup">
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="maintenance_type[]" value="preventive"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Preventive</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="maintenance_type[]" value="corrective"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Corrective</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="maintenance_type[]" value="predictive"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Predictive</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="maintenance_type[]" value="routine"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Routine</span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Technician</label>
                                <select class="form-select">
                                    <option value="all" selected>All Technicians</option>
                                    <option value="john_smith">John Smith</option>
                                    <option value="maria_rodriguez">Maria Rodriguez</option>
                                    <option value="ahmed_hassan">Ahmed Hassan</option>
                                    <option value="li_wei">Li Wei</option>
                                    <option value="external_vendor">External Vendor</option>
                                    <option value="maintenance_team">Maintenance Team</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Location</label>
                                <select class="form-select">
                                    <option value="all" selected>All Locations</option>
                                    <option value="main_plant">Main Plant, Jakarta</option>
                                    <option value="plant_b">Plant B, Bekasi</option>
                                    <option value="plant_c">Plant C, Tangerang</option>
                                    <option value="plant_d">Plant D, Bogor</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-selectgroup">
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="status[]" value="scheduled"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Scheduled</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="status[]" value="in_progress"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">In Progress</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="status[]" value="completed"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">Completed</span>
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex">
                                <button type="button" class="btn btn-primary w-100">
                                    Apply Filters
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Upcoming Maintenance</h3>
                        </div>
                        <div class="list-group list-group-flush">
                            @php
                                $machines = [
                                    'Batch Plant A',
                                    'Mixer 1',
                                    'Concrete Pump 2',
                                    'Conveyor Belt A',
                                    'Silo 1 Feeder',
                                ];
                                $types = ['Preventive', 'Routine', 'Predictive'];
                            @endphp

                            @for ($i = 1; $i <= 5; $i++)
                                @php
                                    $machine = $machines[array_rand($machines)];
                                    $type = $types[array_rand($types)];
                                    $days = $i * 3 + rand(0, 2);
                                    $date = date('Y-m-d', strtotime("+{$days} days"));
                                @endphp
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-info"></span>
                                        </div>
                                        <div class="col">
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                {{ $date }}
                                            </div>
                                            <div class="d-block">
                                                <strong>{{ $machine }}</strong> - {{ $type }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Maintenance Calendar</h3>
                            <div class="card-actions">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary" id="prev-btn">
                                        <i class="ti ti-chevron-left"></i>
                                    </button>
                                    <button class="btn btn-outline-primary" id="today-btn">Today</button>
                                    <button class="btn btn-outline-primary" id="next-btn">
                                        <i class="ti ti-chevron-right"></i>
                                    </button>
                                </div>
                                <div class="dropdown ms-2">
                                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="ti ti-calendar me-2"></i>
                                        <span id="current-view">Month</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item view-option" data-view="dayGridMonth"
                                            href="#">Month</a>
                                        <a class="dropdown-item view-option" data-view="timeGridWeek"
                                            href="#">Week</a>
                                        <a class="dropdown-item view-option" data-view="timeGridDay"
                                            href="#">Day</a>
                                        <a class="dropdown-item view-option" data-view="listMonth"
                                            href="#">List</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="calendar" class="calendar-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Maintenance Event Modal -->
    <div class="modal modal-blur fade" id="event-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Maintenance Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Machine</label>
                        <input type="text" class="form-control" id="event-machine" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Maintenance Type</label>
                            <input type="text" class="form-control" id="event-type" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" id="event-status" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="text" class="form-control" id="event-start" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">End Date</label>
                            <input type="text" class="form-control" id="event-end" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Technician</label>
                        <input type="text" class="form-control" id="event-technician" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="event-description" rows="3" readonly></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Close
                    </a>
                    <a href="#" class="btn btn-primary ms-auto" id="event-view-link">
                        View Full Details
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sample maintenance events
            const maintenanceEvents = [
                @php
                    $machines = ['Batch Plant A', 'Batch Plant B', 'Mixer 1', 'Mixer 2', 'Concrete Pump 1', 'Concrete Pump 2', 'Conveyor Belt A', 'Silo 1 Feeder', 'Silo 2 Feeder', 'Water Pump System'];

                    $types = ['Preventive', 'Corrective', 'Predictive', 'Routine'];

                    $statuses = ['Scheduled', 'In Progress', 'Completed'];

                    $colors = [
                        'Preventive' => '#206bc4',
                        'Corrective' => '#d63939',
                        'Predictive' => '#4299e1',
                        'Routine' => '#6574cd',
                    ];

                    $technicians = ['John Smith', 'Maria Rodriguez', 'Ahmed Hassan', 'Li Wei', 'External Vendor', 'Maintenance Team'];
                @endphp

                @for ($i = 1; $i <= 20; $i++)
                    @php
                        $machine = $machines[array_rand($machines)];
                        $type = $types[array_rand($types)];
                        $status = $statuses[array_rand($statuses)];
                        $technician = $technicians[array_rand($technicians)];

                        $startDay = rand(-30, 60);
                        $startDate = date('Y-m-d', strtotime("{$startDay} days"));
                        $duration = rand(1, 3);
                        $endDate = date('Y-m-d', strtotime("{$startDate} +{$duration} days"));

                        $id = $i;
                    @endphp {
                        id: '{{ $id }}',
                        title: '{{ $machine }} - {{ $type }}',
                        start: '{{ $startDate }}',
                        end: '{{ $endDate }}',
                        color: '{{ $colors[$type] }}',
                        extendedProps: {
                            machine: '{{ $machine }}',
                            type: '{{ $type }}',
                            status: '{{ $status }}',
                            technician: '{{ $technician }}',
                            description: 'Scheduled {{ strtolower($type) }} maintenance for {{ $machine }}. Tasks include inspection, cleaning, lubrication, and necessary repairs.'
                        }
                    },
                @endfor
            ];

            // Initialize FullCalendar
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: false,
                events: maintenanceEvents,
                editable: true,
                selectable: true,
                dayMaxEvents: true,
                eventClick: function(info) {
                    const event = info.event;
                    const props = event.extendedProps;

                    // Populate modal with event data
                    document.getElementById('event-machine').value = props.machine;
                    document.getElementById('event-type').value = props.type;
                    document.getElementById('event-status').value = props.status;
                    document.getElementById('event-start').value = event.startStr;
                    document.getElementById('event-end').value = event.endStr || event.startStr;
                    document.getElementById('event-technician').value = props.technician;
                    document.getElementById('event-description').value = props.description;

                    // Set the view link
                    document.getElementById('event-view-link').href =
                        "{{ route('production.machine-maintenance.detail', '') }}/" + event.id;

                    // Show the modal
                    const modal = new bootstrap.Modal(document.getElementById('event-modal'));
                    modal.show();
                },
                select: function(info) {
                    // Could implement "add new maintenance" functionality here
                    console.log('Selected ' + info.startStr + ' to ' + info.endStr);
                }
            });

            calendar.render();

            // Button handlers
            document.getElementById('prev-btn').addEventListener('click', function() {
                calendar.prev();
            });

            document.getElementById('next-btn').addEventListener('click', function() {
                calendar.next();
            });

            document.getElementById('today-btn').addEventListener('click', function() {
                calendar.today();
            });

            // View change handlers
            document.querySelectorAll('.view-option').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    e.preventDefault();
                    const viewName = this.getAttribute('data-view');
                    calendar.changeView(viewName);
                    document.getElementById('current-view').textContent = this.textContent;
                });
            });
        });
    </script>
@endsection
