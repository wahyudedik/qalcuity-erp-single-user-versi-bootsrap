@extends('layouts.app')

@section('title', 'Edit Leave Request')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Leave Request
                </h2>
                <div class="text-muted mt-1">Modify leave request information</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.leave.detail', $id) }}" class="btn btn-outline-secondary">
                        <i class="ti ti-arrow-left"></i>
                        Back to Details
                    </a>
                </div>
            </div>
        </div>
    </div>

    @php
    // Dummy data for the leave request
    $leaveRequest = [
        'id' => $id,
        'employee_id' => 101,
        'employee' => 'John Doe',
        'leave_type_id' => 1,
        'start_date' => '2023-08-15',
        'end_date' => '2023-08-20',
        'half_day' => false,
        'half_day_type' => null,
        'reason' => 'Family vacation',
        'status' => 'Pending',
        'contact' => '+1234567890',
        'handover_notes' => 'All pending tasks have been completed. Daily reports will be handled by Robert during my absence.',
        'attachment' => null
    ];
    @endphp

    <div class="card mt-3">
        <div class="card-body">
            <form action="#" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label required">Employee</label>
                        <select class="form-select" name="employee_id" required>
                            <option value="">Select Employee</option>
                            <option value="101" {{ $leaveRequest['employee_id'] == 101 ? 'selected' : '' }}>John Doe (ID: 101)</option>
                            <option value="102" {{ $leaveRequest['employee_id'] == 102 ? 'selected' : '' }}>Jane Smith (ID: 102)</option>
                            <option value="103" {{ $leaveRequest['employee_id'] == 103 ? 'selected' : '' }}>Robert Johnson (ID: 103)</option>
                            <option value="104" {{ $leaveRequest['employee_id'] == 104 ? 'selected' : '' }}>Emily Davis (ID: 104)</option>
                            <option value="105" {{ $leaveRequest['employee_id'] == 105 ? 'selected' : '' }}>Michael Wilson (ID: 105)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label required">Leave Type</label>
                        <select class="form-select" name="leave_type_id" required>
                            <option value="">Select Leave Type</option>
                            <option value="1" {{ $leaveRequest['leave_type_id'] == 1 ? 'selected' : '' }}>Annual Leave</option>
                            <option value="2" {{ $leaveRequest['leave_type_id'] == 2 ? 'selected' : '' }}>Sick Leave</option>
                            <option value="3" {{ $leaveRequest['leave_type_id'] == 3 ? 'selected' : '' }}>Maternity Leave</option>
                            <option value="4" {{ $leaveRequest['leave_type_id'] == 4 ? 'selected' : '' }}>Paternity Leave</option>
                            <option value="5" {{ $leaveRequest['leave_type_id'] == 5 ? 'selected' : '' }}>Unpaid Leave</option>
                            <option value="6" {{ $leaveRequest['leave_type_id'] == 6 ? 'selected' : '' }}>Bereavement Leave</option>
                            <option value="7" {{ $leaveRequest['leave_type_id'] == 7 ? 'selected' : '' }}>Study Leave</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label required">Start Date</label>
                        <input type="date" class="form-control" name="start_date" value="{{ $leaveRequest['start_date'] }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label required">End Date</label>
                        <input type="date" class="form-control" name="end_date" value="{{ $leaveRequest['end_date'] }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Half Day</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="half_day" value="0" class="form-selectgroup-input" {{ !$leaveRequest['half_day'] ? 'checked' : '' }}>
                                <span class="form-selectgroup-label">No</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="half_day" value="1" class="form-selectgroup-input" {{ $leaveRequest['half_day'] ? 'checked' : '' }}>
                                <span class="form-selectgroup-label">Yes</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Half Day Type</label>
                        <select class="form-select" name="half_day_type" {{ !$leaveRequest['half_day'] ? 'disabled' : '' }}>
                            <option value="">Select Half Day Type</option>
                            <option value="first_half" {{ $leaveRequest['half_day_type'] == 'first_half' ? 'selected' : '' }}>First Half</option>
                            <option value="second_half" {{ $leaveRequest['half_day_type'] == 'second_half' ? 'selected' : '' }}>Second Half</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label required">Reason</label>
                    <textarea class="form-control" name="reason" rows="3" placeholder="Enter reason for leave" required>{{ $leaveRequest['reason'] }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Attachment</label>
                    @if($leaveRequest['attachment'])
                    <div class="d-flex align-items-center mb-2">
                        <span>Current attachment: {{ $leaveRequest['attachment'] }}</span>
                        <a href="#" class="btn btn-sm btn-outline-danger ms-2">Remove</a>
                    </div>
                    @endif
                    <input type="file" class="form-control" name="attachment">
                    <small class="form-hint">Upload any supporting documents (e.g., medical certificate for sick leave)</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact During Leave</label>
                    <input type="text" class="form-control" name="contact" placeholder="Phone number or email" value="{{ $leaveRequest['contact'] }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Handover Notes</label>
                    <textarea class="form-control" name="handover_notes" rows="3" placeholder="Enter handover instructions or pending tasks">{{ $leaveRequest['handover_notes'] }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status">
                        <option value="Pending" {{ $leaveRequest['status'] == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Approved" {{ $leaveRequest['status'] == 'Approved' ? 'selected' : '' }}>Approved</option>
                        <option value="Rejected" {{ $leaveRequest['status'] == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                        <option value="Cancelled" {{ $leaveRequest['status'] == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">Update Leave Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const halfDayRadios = document.querySelectorAll('input[name="half_day"]');
        const halfDayTypeSelect = document.querySelector('select[name="half_day_type"]');
        
        halfDayRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === '1') {
                    halfDayTypeSelect.disabled = false;
                    halfDayTypeSelect.required = true;
                } else {
                    halfDayTypeSelect.disabled = true;
                    halfDayTypeSelect.required = false;
                }
            });
        });
    });
</script>
@endsection
