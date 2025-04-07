@extends('layouts.app')

@section('title', 'Leave Types')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Leave Types
                </h2>
                <div class="text-muted mt-1">Manage leave types and policies</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.leave.index') }}" class="btn btn-outline-secondary">
                        <i class="ti ti-arrow-left"></i>
                        Back to Leave List
                    </a>
                    <a href="{{ route('hr.leave.types.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus"></i>
                        Add Leave Type
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Leave Types</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Default Days</th>
                        <th>Requires Approval</th>
                        <th>Paid</th>
                        <th>Accrual</th>
                        <th>Carry Forward</th>
                        <th>Status</th>
                        <th class="w-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $leaveTypes = [
                        [
                            'id' => 1,
                            'name' => 'Annual Leave',
                            'default_days' => 20,
                            'requires_approval' => true,
                            'paid' => true,
                            'accrual' => 'Monthly',
                            'carry_forward' => true,
                            'carry_forward_days' => 5,
                            'status' => 'Active'
                        ],
                        [
                            'id' => 2,
                            'name' => 'Sick Leave',
                            'default_days' => 10,
                            'requires_approval' => true,
                            'paid' => true,
                            'accrual' => 'Yearly',
                            'carry_forward' => false,
                            'carry_forward_days' => 0,
                            'status' => 'Active'
                        ],
                        [
                            'id' => 3,
                            'name' => 'Maternity Leave',
                            'default_days' => 90,
                            'requires_approval' => true,
                            'paid' => true,
                            'accrual' => 'None',
                            'carry_forward' => false,
                            'carry_forward_days' => 0,
                            'status' => 'Active'
                        ],
                        [
                            'id' => 4,
                            'name' => 'Paternity Leave',
                            'default_days' => 14,
                            'requires_approval' => true,
                            'paid' => true,
                            'accrual' => 'None',
                            'carry_forward' => false,
                            'carry_forward_days' => 0,
                            'status' => 'Active'
                        ],
                        [
                            'id' => 5,
                            'name' => 'Unpaid Leave',
                            'default_days' => 30,
                            'requires_approval' => true,
                            'paid' => false,
                            'accrual' => 'None',
                            'carry_forward' => false,
                            'carry_forward_days' => 0,
                            'status' => 'Active'
                        ],
                        [
                            'id' => 6,
                            'name' => 'Bereavement Leave',
                            'default_days' => 5,
                            'requires_approval' => true,
                            'paid' => true,
                            'accrual' => 'None',
                            'carry_forward' => false,
                            'carry_forward_days' => 0,
                            'status' => 'Active'
                        ],
                        [
                            'id' => 7,
                            'name' => 'Study Leave',
                            'default_days' => 10,
                            'requires_approval' => true,
                            'paid' => false,
                            'accrual' => 'Yearly',
                            'carry_forward' => false,
                            'carry_forward_days' => 0,
                            'status' => 'Active'
                        ],
                        [
                            'id' => 8,
                            'name' => 'Compensatory Off',
                            'default_days' => 0,
                            'requires_approval' => true,
                            'paid' => true,
                            'accrual' => 'None',
                            'carry_forward' => true,
                            'carry_forward_days' => 5,
                            'status' => 'Active'
                        ],
                        [
                            'id' => 9,
                            'name' => 'Marriage Leave',
                            'default_days' => 3,
                            'requires_approval' => true,
                            'paid' => true,
                            'accrual' => 'None',
                            'carry_forward' => false,
                            'carry_forward_days' => 0,
                            'status' => 'Inactive'
                        ]
                    ];
                    @endphp

                    @foreach($leaveTypes as $type)
                    <tr>
                        <td>{{ $type['name'] }}</td>
                        <td>{{ $type['default_days'] }} days</td>
                        <td>{{ $type['requires_approval'] ? 'Yes' : 'No' }}</td>
                        <td>{{ $type['paid'] ? 'Yes' : 'No' }}</td>
                        <td>{{ $type['accrual'] }}</td>
                        <td>
                            @if($type['carry_forward'])
                                Yes ({{ $type['carry_forward_days'] }} days max)
                            @else
                                No
                            @endif
                        </td>
                        <td>
                            <span class="badge {{ $type['status'] == 'Active' ? 'bg-success' : 'bg-secondary' }}">
                                {{ $type['status'] }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-list flex-nowrap">
                                <a href="{{ route('hr.leave.types.edit', $type['id']) }}" class="btn btn-sm btn-primary">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTypeModal" data-type-id="{{ $type['id'] }}" data-type-name="{{ $type['name'] }}">
                                    <i class="ti ti-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete Type Modal -->
<div class="modal modal-blur fade" id="deleteTypeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Leave Type</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the leave type <strong id="deleteTypeName"></strong>?</p>
                <p class="text-danger">This action cannot be undone. All leave requests associated with this type will be affected.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="#" method="POST" id="deleteTypeForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Yes, delete leave type</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle delete type modal
        const deleteTypeModal = document.getElementById('deleteTypeModal');
        if (deleteTypeModal) {
            deleteTypeModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const typeId = button.getAttribute('data-type-id');
                const typeName = button.getAttribute('data-type-name');
                
                document.getElementById('deleteTypeName').textContent = typeName;
                document.getElementById('deleteTypeForm').action = `/hr/leave/types/${typeId}`;
            });
        }
    });
</script>
@endsection

