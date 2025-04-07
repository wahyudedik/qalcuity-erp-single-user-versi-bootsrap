@extends('layouts.app')

@section('title', 'Create Leave Request')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Create Leave Request
                </h2>
                <div class="text-muted mt-1">Submit a new leave request</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.leave.index') }}" class="btn btn-outline-secondary">
                        <i class="ti ti-arrow-left"></i>
                        Back to Leave List
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <form action="#" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label required">Employee</label>
                        <select class="form-select" name="employee_id" required>
                            <option value="">Select Employee</option>
                            <option value="101">John Doe (ID: 101)</option>
                            <option value="102">Jane Smith (ID: 102)</option>
                            <option value="103">Robert Johnson (ID: 103)</option>
                            <option value="104">Emily Davis (ID: 104)</option>
                            <option value="105">Michael Wilson (ID: 105)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label required">Leave Type</label>
                        <select class="form-select" name="leave_type_id" required>
                            <option value="">Select Leave Type</option>
                            <option value="1">Annual Leave</option>
                            <option value="2">Sick Leave</option>
                            <option value="3">Maternity Leave</option>
                            <option value="4">Paternity Leave</option>
                            <option value="5">Unpaid Leave</option>
                            <option value="6">Bereavement Leave</option>
                            <option value="7">Study Leave</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label required">Start Date</label>
                        <input type="date" class="form-control" name="start_date" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label required">End Date</label>
                        <input type="date" class="form-control" name="end_date" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Half Day</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="half_day" value="0" class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label">No</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="half_day" value="1" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">Yes</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Half Day Type</label>
                        <select class="form-select" name="half_day_type" disabled>
                            <option value="">Select Half Day Type</option>
                            <option value="first_half">First Half</option>
                            <option value="second_half">Second Half</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label required">Reason</label>
                    <textarea class="form-control" name="reason" rows="3" placeholder="Enter reason for leave" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Attachment</label>
                    <input type="file" class="form-control" name="attachment">
                    <small class="form-hint">Upload any supporting documents (e.g., medical certificate for sick leave)</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact During Leave</label>
                    <input type="text" class="form-control" name="contact" placeholder="Phone number or email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Handover Notes</label>
                    <textarea class="form-control" name="handover_notes" rows="3" placeholder="Enter handover instructions or pending tasks"></textarea>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">Submit Leave Request</button>
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
