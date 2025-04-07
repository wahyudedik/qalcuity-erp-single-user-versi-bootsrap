@extends('layouts.app')

@section('title', 'Delivery Calendar')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
<style>
    .fc-event {
        cursor: pointer;
    }
    .fc-day-today {
        background-color: rgba(0, 97, 242, 0.05) !important;
    }
    .fc-event-scheduled {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    .fc-event-in-progress {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #000;
    }
    .fc-event-completed {
        background-color: #198754;
        border-color: #198754;
    }
    .fc-event-cancelled {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .legend-item {
        display: inline-flex;
        align-items: center;
        margin-right: 15px;
    }
    .legend-color {
        width: 15px;
        height: 15px;
        margin-right: 5px;
        border-radius: 3px;
    }
</style>
@endsection

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Delivery Calendar
                </h2>
                <div class="text-muted mt-1">View and manage delivery schedules in calendar format</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('delivery.scheduling') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                        <i class="ti ti-list me-2"></i>
                        List View
                    </a>
                    <a href="{{ route('delivery.scheduling.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-plus me-2"></i>
                        New Schedule
                    </a>
                    <a href="{{ route('delivery.scheduling.create') }}" class="btn btn-primary d-sm-none">
                        <i class="ti ti-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex mb-3">
                <div>
                    <div class="legend-item">
                        <div class="legend-color" style="background-color: #0d6efd;"></div>
                        <span>Scheduled</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background-color: #ffc107;"></div>
                        <span>In Progress</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background-color: #198754;"></div>
                        <span>Completed</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background-color: #dc3545;"></div>
                        <span>Cancelled</span>
                    </div>
                </div>
                <div class="ms-auto">
                    <div class="btn-group" id="calendar-view-toggle">
                        <button type="button" class="btn btn-outline-primary active" data-view="dayGridMonth">Month</button>
                        <button type="button" class="btn btn-outline-primary" data-view="timeGridWeek">Week</button>
                        <button type="button" class="btn btn-outline-primary" data-view="timeGridDay">Day</button>
                    </div>
                </div>
            </div>
            
            <div id="calendar"></div>
        </div>
    </div>
</div>

<!-- Event Detail Modal -->
<div class="modal modal-blur fade" id="eventModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="event-title">Delivery Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="datagrid">
                        <div class="datagrid-item">
                            <div class="datagrid-title">Schedule ID</div>
                            <div class="datagrid-content" id="event-id"></div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Customer</div>
                            <div class="datagrid-content" id="event-customer"></div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Project</div>
                            <div class="datagrid-content" id="event-project"></div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Date & Time</div>
                            <div class="datagrid-content" id="event-datetime"></div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Volume</div>
                            <div class="datagrid-content" id="event-volume"></div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Mix Design</div>
                            <div class="datagrid-content" id="event-mixdesign"></div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Status</div>
                            <div class="datagrid-content" id="event-status"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-outline-primary me-auto" id="event-view-btn">
                    <i class="ti ti-eye me-2"></i>
                    View Details
                </a>
                <a href="#" class="btn btn-outline-primary" id="event-edit-btn">
                    <i class="ti ti-edit me-2"></i>
                    Edit
                </a>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sample events data
        const events = [
            @php
                $statuses = ['scheduled', 'in-progress', 'completed', 'cancelled'];
                $customers = [
                    'PT Pembangunan Jaya',
                    'CV Karya Mandiri',
                    'PT Konstruksi Utama',
                    'PT Bangun Persada',
                    'CV Maju Jaya'
                ];
                $projects = [
                    'Apartment Tower A',
                    'Office Building B',
                    'Highway Section C',
                    'Shopping Mall D',
                    'Residential Complex E'
                ];
                $mixDesigns = ['K-250', 'K-300', 'K-350', 'K-400', 'K-450'];
                
                for($i = 1; $i <= 30; $i++) {
                    $status = $statuses[array_rand($statuses)];
                    $date = date('Y-m-d', strtotime('+' . rand(-14, 30) . ' days'));
                    $hour = rand(7, 16);
                    $minute = rand(0, 3) * 15;
                    $time = sprintf('%02d:%02d:00', $hour, $minute);
                    $volume = rand(5, 50);
                    $customer = $customers[array_rand($customers)];
                    $project = $projects[array_rand($projects)];
                    $mixDesign = $mixDesigns[array_rand($mixDesigns)];
                    
                    echo "{
                        id: $i,
                        title: '$customer - $volume m³',
                        start: '$date"."T$time',
                        end: '$date"."T".sprintf('%02d:%02d:00', $hour + 2, $minute)."',
                        extendedProps: {
                            scheduleId: 'SCH-" . (1000 + $i) . "',
                            customer: '$customer',
                            project: '$project',
                            volume: '$volume m³',
                            mixDesign: '$mixDesign',
                            status: '$status'
                        },
                        className: 'fc-event-$status'
                    },";
                }
            @endphp
        ];

        // Initialize FullCalendar
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: ''
            },
            events: events,
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            },
            eventClick: function(info) {
                const event = info.event;
                const props = event.extendedProps;
                
                // Populate modal with event data
                document.getElementById('event-title').textContent = `Delivery Schedule: ${props.scheduleId}`;
                document.getElementById('event-id').textContent = props.scheduleId;
                                document.getElementById('event-customer').textContent = props.customer;
                document.getElementById('event-project').textContent = props.project;
                document.getElementById('event-datetime').textContent = new Date(event.start).toLocaleString('en-US', {
                    weekday: 'short',
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false
                });
                document.getElementById('event-volume').textContent = props.volume;
                document.getElementById('event-mixdesign').textContent = props.mixDesign;
                
                const statusElement = document.getElementById('event-status');
                statusElement.textContent = props.status.charAt(0).toUpperCase() + props.status.slice(1);
                statusElement.className = '';
                
                const statusClasses = {
                    'scheduled': 'badge bg-blue',
                    'in-progress': 'badge bg-yellow',
                    'completed': 'badge bg-green',
                    'cancelled': 'badge bg-red'
                };
                
                statusElement.className = statusClasses[props.status];
                
                // Set up action buttons
                document.getElementById('event-view-btn').href = `{{ url('delivery/scheduling') }}/${event.id}`;
                document.getElementById('event-edit-btn').href = `{{ url('delivery/scheduling') }}/${event.id}/edit`;
                
                // Show the modal
                const eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                eventModal.show();
            }
        });
        
        calendar.render();
        
        // Handle calendar view toggle
        document.querySelectorAll('#calendar-view-toggle button').forEach(button => {
            button.addEventListener('click', function() {
                const view = this.getAttribute('data-view');
                calendar.changeView(view);
                
                // Update active state
                document.querySelectorAll('#calendar-view-toggle button').forEach(btn => {
                    btn.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    });
</script>
@endsection

