@extends('layouts.app')

@section('title', 'Edit Leave Type')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Leave Type
                </h2>
                <div class="text-muted mt-1">Modify leave type settings</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.leave.types') }}" class="btn btn-outline-secondary">
                        <i class="ti ti-arrow-left"></i>
                        Back to Leave Types
                    </a>
                </div>
            </div>
        </div>
    </div>

    @php
    // Dummy data for the leave type
    $leaveType = [
        'id' => $id,
        'name' => 'Annual Leave',
        'default_days' => 20,
        'requires_approval' => true,
        'paid' => true,
        'accrual' => 'Monthly',
        'carry_forward' => true,
        'carry_forward_days' => 5,
        'status' => 'Active',
        'description' => 'Annual leave entitlement for all employees. Accrues monthly and can carry forward up to 5 days to the next year.',
        'documentation_required' => false,
        'applicable_to' => 'all',
        'departments' => []
    ];
    @endphp

    <div class="card mt-3">
        <div class="card-body">
                        <form action="#" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label required">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $leaveType['name'] }}" placeholder="Enter leave type name" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label required">Default Days</label>
                        <input type="number" class="form-control" name="default_days" min="0" step="0.5" value="{{ $leaveType['default_days'] }}" placeholder="Enter default days allocation" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Requires Approval</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="requires_approval" value="1" class="form-selectgroup-input" {{ $leaveType['requires_approval'] ? 'checked' : '' }}>
                                <span class="form-selectgroup-label">Yes</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="requires_approval" value="0" class="form-selectgroup-input" {{ !$leaveType['requires_approval'] ? 'checked' : '' }}>
                                <span class="form-selectgroup-label">No</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Paid Leave</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="paid" value="1" class="form-selectgroup-input" {{ $leaveType['paid'] ? 'checked' : '' }}>
                                <span class="form-selectgroup-label">Yes</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="paid" value="0" class="form-selectgroup-input" {{ !$leaveType['paid'] ? 'checked' : '' }}>
                                <span class="form-selectgroup-label">No</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Accrual Method</label>
                        <select class="form-select" name="accrual">
                            <option value="None" {{ $leaveType['accrual'] == 'None' ? 'selected' : '' }}>None</option>
                            <option value="Monthly" {{ $leaveType['accrual'] == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                            <option value="Quarterly" {{ $leaveType['accrual'] == 'Quarterly' ? 'selected' : '' }}>Quarterly</option>
                            <option value="Yearly" {{ $leaveType['accrual'] == 'Yearly' ? 'selected' : '' }}>Yearly</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="status" value="Active" class="form-selectgroup-input" {{ $leaveType['status'] == 'Active' ? 'checked' : '' }}>
                                <span class="form-selectgroup-label">Active</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="status" value="Inactive" class="form-selectgroup-input" {{ $leaveType['status'] == 'Inactive' ? 'checked' : '' }}>
                                <span class="form-selectgroup-label">Inactive</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Allow Carry Forward</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="carry_forward" value="1" class="form-selectgroup-input" {{ $leaveType['carry_forward'] ? 'checked' : '' }}>
                                <span class="form-selectgroup-label">Yes</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="carry_forward" value="0" class="form-selectgroup-input" {{ !$leaveType['carry_forward'] ? 'checked' : '' }}>
                                <span class="form-selectgroup-label">No</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Max Carry Forward Days</label>
                        <input type="number" class="form-control" name="carry_forward_days" min="0" value="{{ $leaveType['carry_forward_days'] }}" {{ !$leaveType['carry_forward'] ? 'disabled' : '' }}>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Enter description of this leave type">{{ $leaveType['description'] }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Documentation Required</label>
                    <div class="form-selectgroup">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="documentation_required" value="1" class="form-selectgroup-input" {{ $leaveType['documentation_required'] ? 'checked' : '' }}>
                            <span class="form-selectgroup-label">Yes</span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="documentation_required" value="0" class="form-selectgroup-input" {{ !$leaveType['documentation_required'] ? 'checked' : '' }}>
                            <span class="form-selectgroup-label">No</span>
                        </label>
                    </div>
                    <small class="form-hint">If yes, employees will be required to upload supporting documents when applying for this leave type.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Applicable To</label>
                    <div class="form-selectgroup">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="applicable_to" value="all" class="form-selectgroup-input" {{ $leaveType['applicable_to'] == 'all' ? 'checked' : '' }}>
                            <span class="form-selectgroup-label">All Employees</span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="applicable_to" value="specific" class="form-selectgroup-input" {{ $leaveType['applicable_to'] == 'specific' ? 'checked' : '' }}>
                            <span class="form-selectgroup-label">Specific Departments</span>
                        </label>
                    </div>
                </div>

                <div class="mb-3" id="departmentsSection" style="{{ $leaveType['applicable_to'] == 'specific' ? 'display: block;' : 'display: none;' }}">
                    <label class="form-label">Select Departments</label>
                    <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                        <label class="form-selectgroup-item flex-fill">
                            <input type="checkbox" name="departments[]" value="production" class="form-selectgroup-input" {{ in_array('production', $leaveType['departments']) ? 'checked' : '' }}>
                            <div class="form-selectgroup-label d-flex align-items-center p-3">
                                <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </div>
                                <div>
                                    Production
                                </div>
                            </div>
                        </label>
                        <label class="form-selectgroup-item flex-fill">
                            <input type="checkbox" name="departments[]" value="finance" class="form-selectgroup-input" {{ in_array('finance', $leaveType['departments']) ? 'checked' : '' }}>
                            <div class="form-selectgroup-label d-flex align-items-center p-3">
                                <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </div>
                                <div>
                                    Finance
                                </div>
                            </div>
                        </label>
                        <label class="form-selectgroup-item flex-fill">
                            <input type="checkbox" name="departments[]" value="hr" class="form-selectgroup-input" {{ in_array('hr', $leaveType['departments']) ? 'checked' : '' }}>
                            <div class="form-selectgroup-label d-flex align-items-center p-3">
                                <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </div>
                                <div>
                                    Human Resources
                                </div>
                            </div>
                        </label>
                        <label class="form-selectgroup-item flex-fill">
                            <input type="checkbox" name="departments[]" value="sales" class="form-selectgroup-input" {{ in_array('sales', $leaveType['departments']) ? 'checked' : '' }}>
                            <div class="form-selectgroup-label d-flex align-items-center p-3">
                                <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </div>
                                <div>
                                    Sales
                                </div>
                            </div>
                        </label>
                        <label class="form-selectgroup-item flex-fill">
                            <input type="checkbox" name="departments[]" value="warehouse" class="form-selectgroup-input" {{ in_array('warehouse', $leaveType['departments']) ? 'checked' : '' }}>
                            <div class="form-selectgroup-label d-flex align-items-center p-3">
                                <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </div>
                                <div>
                                    Warehouse
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary">Update Leave Type</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle carry forward toggle
        const carryForwardRadios = document.querySelectorAll('input[name="carry_forward"]');
        const carryForwardDaysInput = document.querySelector('input[name="carry_forward_days"]');
        
        carryForwardRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === '1') {
                    carryForwardDaysInput.disabled = false;
                    carryForwardDaysInput.required = true;
                } else {
                    carryForwardDaysInput.disabled = true;
                    carryForwardDaysInput.required = false;
                    carryForwardDaysInput.value = 0;
                }
            });
        });
        
        // Handle applicable to toggle
        const applicableToRadios = document.querySelectorAll('input[name="applicable_to"]');
        const departmentsSection = document.getElementById('departmentsSection');
        
        applicableToRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'specific') {
                    departmentsSection.style.display = 'block';
                } else {
                    departmentsSection.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection

