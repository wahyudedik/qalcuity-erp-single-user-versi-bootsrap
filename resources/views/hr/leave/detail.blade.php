@extends('layouts.app')

@section('title', 'Leave Request Details')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Leave Request Details
                    </h2>
                    <div class="text-muted mt-1">View leave request information</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.leave.index') }}" class="btn btn-outline-secondary">
                            <i class="ti ti-arrow-left"></i>
                            Back to Leave List
                        </a>
                        <a href="{{ route('hr.leave.edit', $id) }}" class="btn btn-primary">
                            <i class="ti ti-edit"></i>
                            Edit Request
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @php
            // Dummy data for the leave request
            $leaveRequest = [
                'id' => $id,
                'employee' => 'John Doe',
                'employee_id' => 101,
                'department' => 'Production',
                'position' => 'Plant Operator',
                'type' => 'Annual Leave',
                'start_date' => '2023-08-15',
                'end_date' => '2023-08-20',
                'duration' => '6 days',
                'half_day' => false,
                'reason' => 'Family vacation',
                'status' => 'Approved',
                'status_class' => 'bg-success',
                'applied_on' => '2023-07-20',
                'approved_by' => 'Michael Manager',
                'approved_on' => '2023-07-22',
                'comments' => 'Approved as requested. Enjoy your vacation!',
                'contact' => '+1234567890',
                'handover_notes' =>
                    'All pending tasks have been completed. Daily reports will be handled by Robert during my absence.',
                'attachment' => null,
            ];
        @endphp

        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Leave Request #{{ $leaveRequest['id'] }}</h3>
                        <div class="card-actions">
                            <span class="badge {{ $leaveRequest['status_class'] }}">{{ $leaveRequest['status'] }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Employee</div>
                                <div class="datagrid-content">{{ $leaveRequest['employee'] }} (ID:
                                    {{ $leaveRequest['employee_id'] }})</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Department</div>
                                <div class="datagrid-content">{{ $leaveRequest['department'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Position</div>
                                <div class="datagrid-content">{{ $leaveRequest['position'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Leave Type</div>
                                <div class="datagrid-content">{{ $leaveRequest['type'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Start Date</div>
                                <div class="datagrid-content">{{ date('d M Y', strtotime($leaveRequest['start_date'])) }}
                                </div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">End Date</div>
                                <div class="datagrid-content">{{ date('d M Y', strtotime($leaveRequest['end_date'])) }}
                                </div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Duration</div>
                                <div class="datagrid-content">{{ $leaveRequest['duration'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Half Day</div>
                                <div class="datagrid-content">{{ $leaveRequest['half_day'] ? 'Yes' : 'No' }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Applied On</div>
                                <div class="datagrid-content">{{ date('d M Y', strtotime($leaveRequest['applied_on'])) }}
                                </div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Approved By</div>
                                <div class="datagrid-content">{{ $leaveRequest['approved_by'] }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Approved On</div>
                                <div class="datagrid-content">{{ date('d M Y', strtotime($leaveRequest['approved_on'])) }}
                                </div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Contact During Leave</div>
                                <div class="datagrid-content">{{ $leaveRequest['contact'] }}</div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h4>Reason</h4>
                            <p>{{ $leaveRequest['reason'] }}</p>
                        </div>

                        <div class="mt-4">
                            <h4>Handover Notes</h4>
                            <p>{{ $leaveRequest['handover_notes'] }}</p>
                        </div>

                        <div class="mt-4">
                            <h4>Comments</h4>
                            <p>{{ $leaveRequest['comments'] }}</p>
                        </div>

                        @if ($leaveRequest['attachment'])
                            <div class="mt-4">
                                <h4>Attachment</h4>
                                <a href="#" class="btn btn-outline-primary">
                                    <i class="ti ti-file-download me-1"></i>
                                    Download Attachment
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="d-flex">
                            @if ($leaveRequest['status'] === 'Pending')
                                <form action="#" method="POST" class="me-2">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="ti ti-check me-1"></i>
                                        Approve
                                    </button>
                                </form>
                                <form action="#" method="POST" class="me-2">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="ti ti-x me-1"></i>
                                        Reject
                                    </button>
                                </form>
                            @endif
                            <form action="#" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="ti ti-trash me-1"></i>
                                    Cancel Request
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Leave Balance</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Annual Leave</span>
                                <span>15 / 20 days</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <span class="visually-hidden">75% Used</span>
                                </div>
                            </div>
                            <div class="text-muted mt-1 small">5 days remaining</div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Sick Leave</span>
                                <span>3 / 10 days</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-green" style="width: 30%" role="progressbar"
                                    aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                    <span class="visually-hidden">30% Used</span>
                                </div>
                            </div>
                            <div class="text-muted mt-1 small">7 days remaining</div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Unpaid Leave</span>
                                <span>0 / 30 days</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-azure" style="width: 0%" role="progressbar"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <span class="visually-hidden">0% Used</span>
                                </div>
                            </div>
                            <div class="text-muted mt-1 small">30 days remaining</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('hr.leave.balance') }}" class="btn btn-outline-primary w-100">
                            View Full Leave Balance
                        </a>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Leave History</h3>
                    </div>
                    <div class="card-body">
                        <div class="divide-y">
                            <div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-truncate">
                                            <strong>Annual Leave</strong>
                                        </div>
                                        <div class="text-muted">5 days (Jun 10-15, 2023)</div>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <span class="badge bg-success">Approved</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-truncate">
                                            <strong>Sick Leave</strong>
                                        </div>
                                        <div class="text-muted">2 days (May 5-6, 2023)</div>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <span class="badge bg-success">Approved</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-truncate">
                                            <strong>Annual Leave</strong>
                                        </div>
                                        <div class="text-muted">3 days (Mar 20-22, 2023)</div>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <span class="badge bg-success">Approved</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-outline-primary w-100">
                            View Complete History
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
