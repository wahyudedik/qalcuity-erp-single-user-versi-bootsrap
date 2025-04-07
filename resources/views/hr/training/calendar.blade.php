@extends('layouts.app')

@section('title', 'Training Calendar')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
    <style>
        .fc-event {
            cursor: pointer;
        }

        .fc-event-title {
            font-weight: 500;
        }

        .fc-daygrid-event {
            white-space: normal;
        }

        .event-tooltip {
            position: absolute;
            z-index: 1000;
            background: white;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Training Calendar
                    </h2>
                    <div class="text-muted mt-1">View and manage upcoming training sessions</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.training.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Training List
                        </a>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#addTrainingModal">
                            <i class="ti ti-plus"></i>
                            Add Training
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
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Filters</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Department</label>
                                <select class="form-select" id="department-filter">
                                    <option value="all" selected>All Departments</option>
                                    <option value="production">Production</option>
                                    <option value="quality">Quality Control</option>
                                    <option value="maintenance">Maintenance</option>
                                    <option value="safety">QHSE</option>
                                    <option value="laboratory">Laboratory</option>
                                    <option value="admin">Administration</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Training Type</label>
                                <select class="form-select" id="type-filter">
                                    <option value="all" selected>All Types</option>
                                    <option value="technical">Technical</option>
                                    <option value="safety">Safety</option>
                                    <option value="quality">Quality</option>
                                    <option value="soft-skills">Soft Skills</option>
                                    <option value="certification">Certification</option>
                                    <option value="compliance">Compliance</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="status-filter">
                                    <option value="all" selected>All Status</option>
                                    <option value="scheduled">Scheduled</option>
                                    <option value="in-progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary w-100" id="apply-filters">
                                    Apply Filters
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Upcoming Trainings</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-red-lt">
                                                <i class="ti ti-calendar-event"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="d-block text-truncate">Safety Procedures Training</div>
                                            <div class="text-muted">Aug 25, 2023 • 09:00 AM</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-blue-lt">
                                                <i class="ti ti-calendar-event"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="d-block text-truncate">Batch Plant Operation</div>
                                            <div class="text-muted">Aug 28, 2023 • 10:30 AM</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-green-lt">
                                                <i class="ti ti-calendar-event"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="d-block text-truncate">Quality Control Testing</div>
                                            <div class="text-muted">Sep 02, 2023 • 01:00 PM</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-purple-lt">
                                                <i class="ti ti-calendar-event"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="d-block text-truncate">Leadership Workshop</div>
                                            <div class="text-muted">Sep 05, 2023 • 09:00 AM</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-yellow-lt">
                                                <i class="ti ti-calendar-event"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="d-block text-truncate">Equipment Maintenance</div>
                                            <div class="text-muted">Sep 10, 2023 • 02:00 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Legend</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-red me-2" style="width: 15px; height: 15px;"></span>
                                <span>Safety Training</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-blue me-2" style="width: 15px; height: 15px;"></span>
                                <span>Technical Training</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-green me-2" style="width: 15px; height: 15px;"></span>
                                <span>Quality Training</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-purple me-2" style="width: 15px; height: 15px;"></span>
                                <span>Soft Skills Training</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-yellow me-2" style="width: 15px; height: 15px;"></span>
                                <span>Certification</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-cyan me-2" style="width: 15px; height: 15px;"></span>
                                <span>Compliance Training</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Event tooltip -->
    <div id="event-tooltip" class="event-tooltip"></div>

    <!-- Add Training Modal -->
    <div class="modal modal-blur fade" id="addTrainingModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Training Session</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Training Title</label>
                        <input type="text" class="form-control" placeholder="Enter training title">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Training Type</label>
                            <select class="form-select">
                                <option value="technical">Technical</option>
                                <option value="safety">Safety</option>
                                <option value="quality">Quality</option>
                                <option value="soft-skills">Soft Skills</option>
                                <option value="certification">Certification</option>
                                <option value="compliance">Compliance</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Department</label>
                            <select class="form-select">
                                <option value="all">All Departments</option>
                                <option value="production">Production</option>
                                <option value="quality">Quality Control</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="safety">QHSE</option>
                                <option value="laboratory">Laboratory</option>
                                <option value="admin">Administration</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Start Time</label>
                            <input type="time" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">End Time</label>
                            <input type="time" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control" placeholder="Enter training location">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Trainer/Provider</label>
                        <select class="form-select">
                            <option value="">Select Trainer or Provider</option>
                            <option value="1">John Smith - Production Manager</option>
                            <option value="2">Sarah Johnson - Safety Officer</option>
                            <option value="3">ConcreteSkills Training</option>
                            <option value="4">SafetyFirst Institute</option>
                            <option value="5">Leadership Academy</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter training description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Participants</label>
                        <select class="form-select" multiple>
                            <option value="all">All Employees</option>
                            <option value="production">All Production Staff</option>
                            <option value="quality">All Quality Control Staff</option>
                            <option value="maintenance">All Maintenance Staff</option>
                            <option value="safety">All QHSE Staff</option>
                            <option value="laboratory">All Laboratory Staff</option>
                            <option value="admin">All Administration Staff</option>
                            <option value="custom">Select Individual Employees</option>
                        </select>
                        <div class="form-hint">Hold Ctrl (or Cmd) to select multiple options</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-label">Send notification to participants</span>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-label">Add to training records upon completion</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <i class="ti ti-plus"></i>
                        Add Training
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Training Details Modal -->
    <div class="modal modal-blur fade" id="trainingDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="training-title">Training Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Training Type</label>
                                <div id="training-type" class="form-control-plaintext">Safety</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Department</label>
                                <div id="training-department" class="form-control-plaintext">All Departments</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Start Date & Time</label>
                                <div id="training-start" class="form-control-plaintext">Aug 25, 2023 09:00 AM</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">End Date & Time</label>
                                <div id="training-end" class="form-control-plaintext">Aug 25, 2023 04:00 PM</div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <div id="training-location" class="form-control-plaintext">Training Room A</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Trainer/Provider</label>
                        <div id="training-provider" class="form-control-plaintext">Sarah Johnson - Safety Officer</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <div id="training-description" class="form-control-plaintext">Comprehensive safety procedures
                            training covering all aspects of workplace safety, emergency protocols, and safety equipment
                            usage.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Participants</label>
                        <div id="training-participants" class="form-control-plaintext">45 employees from all departments
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div id="training-status" class="form-control-plaintext"><span
                                class="badge bg-green">Scheduled</span></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        <i class="ti ti-edit"></i>
                        Edit
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize calendar
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                events: [{
                        id: '1',
                        title: 'Safety Procedures Training',
                        start: '2023-08-25T09:00:00',
                        end: '2023-08-25T16:00:00',
                        color: '#d63939',
                        extendedProps: {
                            type: 'Safety',
                            department: 'All Departments',
                            location: 'Training Room A',
                            provider: 'Sarah Johnson - Safety Officer',
                            description: 'Comprehensive safety procedures training covering all aspects of workplace safety, emergency protocols, and safety equipment usage.',
                            participants: '45 employees from all departments',
                            status: 'Scheduled'
                        }
                    },
                    {
                        id: '2',
                        title: 'Batch Plant Operation',
                        start: '2023-08-28T10:30:00',
                        end: '2023-08-29T15:00:00',
                        color: '#206bc4',
                        extendedProps: {
                            type: 'Technical',
                            department: 'Production',
                            location: 'Batch Plant Facility',
                            provider: 'John Smith - Production Manager',
                            description: 'Advanced batch plant operation techniques and troubleshooting procedures.',
                            participants: '12 production staff',
                            status: 'Scheduled'
                        }
                    },
                    {
                        id: '3',
                        title: 'Quality Control Testing',
                        start: '2023-09-02T13:00:00',
                        end: '2023-09-02T17:00:00',
                        color: '#2fb344',
                        extendedProps: {
                            type: 'Quality',
                            department: 'Quality Control',
                            location: 'Laboratory',
                            provider: 'Michael Brown - Quality Control Manager',
                            description: 'Advanced testing methods for concrete quality control.',
                            participants: '8 quality control staff',
                            status: 'Scheduled'
                        }
                    },
                    {
                        id: '4',
                        title: 'Leadership Workshop',
                        start: '2023-09-05T09:00:00',
                        end: '2023-09-05T17:00:00',
                        color: '#ae3ec9',
                        extendedProps: {
                            type: 'Soft Skills',
                            department: 'Administration',
                            location: 'Conference Room',
                            provider: 'Leadership Academy',
                            description: 'Leadership skills development workshop for managers and supervisors.',
                            participants: '15 managers and supervisors',
                            status: 'Scheduled'
                        }
                    },
                    {
                        id: '5',
                        title: 'Equipment Maintenance',
                        start: '2023-09-10T14:00:00',
                        end: '2023-09-10T17:00:00',
                        color: '#f59f00',
                        extendedProps: {
                            type: 'Technical',
                            department: 'Maintenance',
                            location: 'Maintenance Workshop',
                            provider: 'Robert Wilson - Maintenance Supervisor',
                            description: 'Preventive maintenance procedures for concrete equipment.',
                            participants: '6 maintenance staff',
                            status: 'Scheduled'
                        }
                    },
                    {
                        id: '6',
                        title: 'ISO Compliance Training',
                        start: '2023-09-15T10:00:00',
                        end: '2023-09-15T16:00:00',
                        color: '#4299e1',
                        extendedProps: {
                            type: 'Compliance',
                            department: 'All Departments',
                            location: 'Training Room B',
                            provider: 'ConcreteSkills Training',
                            description: 'Training on ISO standards compliance for concrete production.',
                            participants: '30 employees from various departments',
                            status: 'Scheduled'
                        }
                    }
                ],
                eventClick: function(info) {
                    // Show event details in modal
                    document.getElementById('training-title').textContent = info.event.title;
                    document.getElementById('training-type').textContent = info.event.extendedProps
                    .type;
                    document.getElementById('training-department').textContent = info.event
                        .extendedProps.department;
                    document.getElementById('training-start').textContent = new Date(info.event.start)
                        .toLocaleString();
                    document.getElementById('training-end').textContent = new Date(info.event.end)
                        .toLocaleString();
                    document.getElementById('training-location').textContent = info.event.extendedProps
                        .location;
                    document.getElementById('training-provider').textContent = info.event.extendedProps
                        .provider;
                    document.getElementById('training-description').textContent = info.event
                        .extendedProps.description;
                    document.getElementById('training-participants').textContent = info.event
                        .extendedProps.participants;

                    let statusHtml = '';
                    if (info.event.extendedProps.status === 'Scheduled') {
                        statusHtml = '<span class="badge bg-green">Scheduled</span>';
                    } else if (info.event.extendedProps.status === 'In Progress') {
                        statusHtml = '<span class="badge bg-blue">In Progress</span>';
                    } else if (info.event.extendedProps.status === 'Completed') {
                        statusHtml = '<span class="badge bg-purple">Completed</span>';
                    } else if (info.event.extendedProps.status === 'Cancelled') {
                        statusHtml = '<span class="badge bg-red">Cancelled</span>';
                    }
                    document.getElementById('training-status').innerHTML = statusHtml;

                    var trainingDetailsModal = new bootstrap.Modal(document.getElementById(
                        'trainingDetailsModal'));
                    trainingDetailsModal.show();
                },
                eventMouseEnter: function(info) {
                    // Show tooltip on hover
                    var tooltip = document.getElementById('event-tooltip');
                    tooltip.innerHTML = `
                    <div class="font-weight-bold">${info.event.title}</div>
                    <div><strong>Type:</strong> ${info.event.extendedProps.type}</div>
                    <div><strong>Time:</strong> ${info.event.start.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</div>
                    <div><strong>Location:</strong> ${info.event.extendedProps.location}</div>
                `;
                    tooltip.style.display = 'block';
                    tooltip.style.left = info.jsEvent.pageX + 10 + 'px';
                    tooltip.style.top = info.jsEvent.pageY + 10 + 'px';
                },
                eventMouseLeave: function() {
                    // Hide tooltip
                    document.getElementById('event-tooltip').style.display = 'none';
                }
            });
            calendar.render();

            // Handle filter application
            document.getElementById('apply-filters').addEventListener('click', function() {
                var departmentFilter = document.getElementById('department-filter').value;
                var typeFilter = document.getElementById('type-filter').value;
                var statusFilter = document.getElementById('status-filter').value;

                // In a real application, you would reload events based on filters
                // For this demo, we'll just show an alert
                alert('Filters applied: Department=' + departmentFilter + ', Type=' + typeFilter +
                    ', Status=' + statusFilter);
            });
        });
    </script>
@endsection
