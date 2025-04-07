@extends('layouts.app')

@section('title', 'Leave Calendar')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
<style>
    .fc-event {
        cursor: pointer;
    }
    .fc-day-today {
        background-color: rgba(0, 97, 242, 0.05) !important;
    }
    .leave-filter-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 15px;
    }
    .leave-filter-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .leave-type-indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        display: inline-block;
    }
</style>
@endsection

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Leave Calendar
                </h2>
                <div class="text-muted mt-1">View and manage employee leave schedules</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.leave.index') }}" class="btn btn-outline-secondary">
                        <i class="ti ti-arrow-left"></i>
                        Back to Leave List
                    </a>
                    <a href="{{ route('hr.leave.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus"></i>
                        New Leave Request
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Leave Calendar</h3>
            <div class="card-actions">
                <form action="" method="GET">
                    <div class="row g-2">
                        <div class="col">
                                                        <select name="department" class="form-select" id="departmentFilter">
                                <option value="">All Departments</option>
                                <option value="production">Production</option>
                                <option value="finance">Finance</option>
                                <option value="hr">Human Resources</option>
                                <option value="sales">Sales</option>
                                <option value="warehouse">Warehouse</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" id="applyFilter">
                                <i class="ti ti-filter"></i>
                                Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="leave-filter-container">
                <div class="leave-filter-item">
                    <input type="checkbox" class="form-check-input leave-type-filter" id="annual-leave" value="annual" checked>
                    <span class="leave-type-indicator" style="background-color: #0061f2;"></span>
                    <label for="annual-leave">Annual Leave</label>
                </div>
                <div class="leave-filter-item">
                    <input type="checkbox" class="form-check-input leave-type-filter" id="sick-leave" value="sick" checked>
                    <span class="leave-type-indicator" style="background-color: #39b54a;"></span>
                    <label for="sick-leave">Sick Leave</label>
                </div>
                <div class="leave-filter-item">
                    <input type="checkbox" class="form-check-input leave-type-filter" id="maternity-leave" value="maternity" checked>
                    <span class="leave-type-indicator" style="background-color: #e83e8c;"></span>
                    <label for="maternity-leave">Maternity/Paternity</label>
                </div>
                <div class="leave-filter-item">
                    <input type="checkbox" class="form-check-input leave-type-filter" id="unpaid-leave" value="unpaid" checked>
                    <span class="leave-type-indicator" style="background-color: #17a2b8;"></span>
                    <label for="unpaid-leave">Unpaid Leave</label>
                </div>
                <div class="leave-filter-item">
                    <input type="checkbox" class="form-check-input leave-type-filter" id="other-leave" value="other" checked>
                    <span class="leave-type-indicator" style="background-color: #fd7e14;"></span>
                    <label for="other-leave">Other Leave</label>
                </div>
            </div>
            <div id="calendar"></div>
        </div>
    </div>
</div>

<!-- Leave Details Modal -->
<div class="modal modal-blur fade" id="leaveDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Leave Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Employee</label>
                    <div class="d-flex align-items-center">
                        <span class="avatar me-2" style="background-image: url(https://placehold.co/128x128)"></span>
                        <div>
                            <div id="leaveEmployeeName">John Doe</div>
                            <div class="text-muted" id="leaveEmployeeId">ID: 101</div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Leave Type</label>
                    <div id="leaveType">Annual Leave</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Start Date</label>
                        <div id="leaveStartDate">2023-07-10</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">End Date</label>
                        <div id="leaveEndDate">2023-07-15</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Duration</label>
                    <div id="leaveDuration">5 days</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <div id="leaveStatus"><span class="badge bg-success">Approved</span></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Reason</label>
                    <div id="leaveReason">Family vacation</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Approved By</label>
                    <div id="leaveApprovedBy">Jane Smith (Manager)</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Close</button>
                <a href="#" class="btn btn-primary" id="viewLeaveDetailsBtn">View Full Details</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sample leave data
        const leaveData = [
            {
                id: 1,
                title: 'John Doe - Annual Leave',
                start: '2023-07-10',
                end: '2023-07-16', // End date is exclusive in FullCalendar
                color: '#0061f2',
                extendedProps: {
                    employee_id: 101,
                    employee_name: 'John Doe',
                    department: 'Production',
                    leave_type: 'annual',
                    leave_type_name: 'Annual Leave',
                    duration: '5 days',
                    status: 'approved',
                    reason: 'Family vacation',
                    approved_by: 'Jane Smith (Manager)'
                }
            },
            {
                id: 2,
                title: 'Jane Smith - Sick Leave',
                start: '2023-07-05',
                end: '2023-07-07',
                color: '#39b54a',
                extendedProps: {
                    employee_id: 102,
                    employee_name: 'Jane Smith',
                    department: 'Finance',
                    leave_type: 'sick',
                    leave_type_name: 'Sick Leave',
                    duration: '2 days',
                    status: 'approved',
                    reason: 'Flu',
                    approved_by: 'Robert Johnson (Director)'
                }
            },
            {
                id: 3,
                title: 'Emily Davis - Maternity Leave',
                start: '2023-06-15',
                end: '2023-09-14',
                color: '#e83e8c',
                extendedProps: {
                    employee_id: 104,
                    employee_name: 'Emily Davis',
                    department: 'Human Resources',
                    leave_type: 'maternity',
                    leave_type_name: 'Maternity Leave',
                    duration: '90 days',
                    status: 'approved',
                    reason: 'Maternity leave',
                    approved_by: 'Michael Wilson (HR Director)'
                }
            },
            {
                id: 4,
                title: 'Michael Wilson - Unpaid Leave',
                start: '2023-07-20',
                end: '2023-07-31',
                color: '#17a2b8',
                extendedProps: {
                    employee_id: 105,
                    employee_name: 'Michael Wilson',
                    department: 'Warehouse',
                    leave_type: 'unpaid',
                    leave_type_name: 'Unpaid Leave',
                    duration: '10 days',
                    status: 'approved',
                    reason: 'Personal matters',
                    approved_by: 'Robert Johnson (Director)'
                }
            },
            {
                id: 5,
                title: 'Robert Johnson - Other Leave',
                start: '2023-07-25',
                end: '2023-07-28',
                color: '#fd7e14',
                extendedProps: {
                    employee_id: 103,
                    employee_name: 'Robert Johnson',
                    department: 'Sales',
                    leave_type: 'other',
                    leave_type_name: 'Bereavement Leave',
                    duration: '3 days',
                    status: 'approved',
                    reason: 'Family emergency',
                    approved_by: 'Michael Wilson (HR Director)'
                }
            }
        ];
        
        // Generate more sample data
        const employees = [
            { id: 101, name: 'John Doe', department: 'Production' },
            { id: 102, name: 'Jane Smith', department: 'Finance' },
            { id: 103, name: 'Robert Johnson', department: 'Sales' },
            { id: 104, name: 'Emily Davis', department: 'Human Resources' },
            { id: 105, name: 'Michael Wilson', department: 'Warehouse' },
            { id: 106, name: 'Alex Brown', department: 'Production' },
            { id: 107, name: 'Sarah Miller', department: 'Finance' },
            { id: 108, name: 'David Clark', department: 'Sales' },
            { id: 109, name: 'Lisa White', department: 'Human Resources' },
            { id: 110, name: 'Kevin Moore', department: 'Warehouse' }
        ];
        
        const leaveTypes = [
            { id: 'annual', name: 'Annual Leave', color: '#0061f2' },
            { id: 'sick', name: 'Sick Leave', color: '#39b54a' },
            { id: 'maternity', name: 'Maternity Leave', color: '#e83e8c' },
            { id: 'paternity', name: 'Paternity Leave', color: '#e83e8c' },
            { id: 'unpaid', name: 'Unpaid Leave', color: '#17a2b8' },
            { id: 'other', name: 'Other Leave', color: '#fd7e14' }
        ];
        
        const approvers = [
            'Jane Smith (Manager)',
            'Robert Johnson (Director)',
            'Michael Wilson (HR Director)',
            'Emily Davis (HR Manager)',
            'David Clark (Department Head)'
        ];
        
        // Generate random dates within the next 6 months
        function getRandomDate(start, end) {
            return new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
        }
        
        // Add more sample leave data
        for (let i = 6; i <= 30; i++) {
            const employee = employees[Math.floor(Math.random() * employees.length)];
            const leaveType = leaveTypes[Math.floor(Math.random() * leaveTypes.length)];
            const approver = approvers[Math.floor(Math.random() * approvers.length)];
            
            const now = new Date();
            const sixMonthsLater = new Date();
            sixMonthsLater.setMonth(sixMonthsLater.getMonth() + 6);
            
            const startDate = getRandomDate(now, sixMonthsLater);
            
            // Duration based on leave type
            let durationDays = 1;
            if (leaveType.id === 'annual') {
                durationDays = Math.floor(Math.random() * 10) + 1; // 1-10 days
            } else if (leaveType.id === 'sick') {
                durationDays = Math.floor(Math.random() * 3) + 1; // 1-3 days
            } else if (leaveType.id === 'maternity' || leaveType.id === 'paternity') {
                durationDays = leaveType.id === 'maternity' ? 90 : 14; // Fixed duration
            } else if (leaveType.id === 'unpaid') {
                durationDays = Math.floor(Math.random() * 20) + 1; // 1-20 days
            } else {
                durationDays = Math.floor(Math.random() * 5) + 1; // 1-5 days
            }
            
            const endDate = new Date(startDate);
            endDate.setDate(endDate.getDate() + durationDays);
            
            // Format dates for FullCalendar
            const formatDate = (date) => {
                return date.toISOString().split('T')[0];
            };
            
            leaveData.push({
                id: i,
                title: `${employee.name} - ${leaveType.name}`,
                start: formatDate(startDate),
                end: formatDate(endDate),
                color: leaveType.color,
                extendedProps: {
                    employee_id: employee.id,
                    employee_name: employee.name,
                    department: employee.department,
                    leave_type: leaveType.id,
                    leave_type_name: leaveType.name,
                    duration: `${durationDays} days`,
                    status: 'approved',
                    reason: 'Leave request',
                    approved_by: approver
                }
            });
        }
        
        // Initialize FullCalendar
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,listMonth'
            },
            events: leaveData,
            eventClick: function(info) {
                const event = info.event;
                const props = event.extendedProps;
                
                // Populate modal with event data
                document.getElementById('leaveEmployeeName').textContent = props.employee_name;
                document.getElementById('leaveEmployeeId').textContent = `ID: ${props.employee_id}`;
                document.getElementById('leaveType').textContent = props.leave_type_name;
                document.getElementById('leaveStartDate').textContent = event.startStr;
                document.getElementById('leaveEndDate').textContent = new Date(event.end - 86400000).toISOString().split('T')[0]; // Subtract 1 day
                document.getElementById('leaveDuration').textContent = props.duration;
                document.getElementById('leaveStatus').innerHTML = `<span class="badge bg-success">${props.status.charAt(0).toUpperCase() + props.status.slice(1)}</span>`;
                document.getElementById('leaveReason').textContent = props.reason;
                document.getElementById('leaveApprovedBy').textContent = props.approved_by;
                
                // Set the view details link
                document.getElementById('viewLeaveDetailsBtn').href = `/hr/leave/${event.id}`;
                
                // Show the modal
                const modal = new bootstrap.Modal(document.getElementById('leaveDetailsModal'));
                modal.show();
            },
            eventDidMount: function(info) {
                // Add tooltip
                new bootstrap.Tooltip(info.el, {
                    title: info.event.title,
                    placement: 'top',
                    trigger: 'hover',
                    container: 'body'
                });
            }
        });
        
        calendar.render();
        
        // Handle leave type filters
        const leaveTypeFilters = document.querySelectorAll('.leave-type-filter');
        leaveTypeFilters.forEach(filter => {
            filter.addEventListener('change', function() {
                filterEvents();
            });
        });
        
        // Handle department filter
        document.getElementById('applyFilter').addEventListener('click', function() {
            filterEvents();
        });
        
        function filterEvents() {
            // Get selected leave types
            const selectedLeaveTypes = Array.from(leaveTypeFilters)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);
            
            // Get selected department
            const selectedDepartment = document.getElementById('departmentFilter').value;
            
            // Filter events
            const filteredEvents = leaveData.filter(event => {
                const matchesLeaveType = selectedLeaveTypes.includes(event.extendedProps.leave_type);
                const matchesDepartment = !selectedDepartment || event.extendedProps.department.toLowerCase() === selectedDepartment.toLowerCase();
                return matchesLeaveType && matchesDepartment;
            });
            
            // Update calendar events
            calendar.removeAllEvents();
            calendar.addEventSource(filteredEvents);
        }
    });
</script>
@endsection

