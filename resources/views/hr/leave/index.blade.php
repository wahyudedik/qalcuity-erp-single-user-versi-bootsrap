@extends('layouts.app')

@section('title', 'Leave Management')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Leave Management
                    </h2>
                    <div class="text-muted mt-1">Manage employee leave requests</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.leave.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus"></i>
                            New Leave Request
                        </a>
                        <a href="{{ route('hr.leave.create') }}" class="btn btn-primary d-sm-none">
                            <i class="ti ti-plus"></i>
                        </a>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="ti ti-settings"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('hr.leave.reports') }}">
                                    <i class="ti ti-report me-2"></i>
                                    Leave Reports
                                </a>
                                <a class="dropdown-item" href="{{ route('hr.leave.balance') }}">
                                    <i class="ti ti-calendar-stats me-2"></i>
                                    Leave Balance
                                </a>
                                <a class="dropdown-item" href="{{ route('hr.leave.types') }}">
                                    <i class="ti ti-list me-2"></i>
                                    Leave Types
                                </a>
                                <a class="dropdown-item" href="{{ route('hr.leave.approval') }}">
                                    <i class="ti ti-checklist me-2"></i>
                                    Approval Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Leave Requests</h3>
                <div class="card-actions">
                    <form action="" method="GET">
                        <div class="row g-2">
                            <div class="col">
                                <select name="status" class="form-select">
                                    <option value="">All Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col">
                                <select name="type" class="form-select">
                                    <option value="">All Types</option>
                                    <option value="annual">Annual Leave</option>
                                    <option value="sick">Sick Leave</option>
                                    <option value="maternity">Maternity Leave</option>
                                    <option value="paternity">Paternity Leave</option>
                                    <option value="unpaid">Unpaid Leave</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti ti-filter"></i>
                                    Filter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Leave Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th class="w-1">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $leaveRequests = [
                                [
                                    'id' => 1,
                                    'employee' => 'John Doe',
                                    'employee_id' => 101,
                                    'type' => 'Annual Leave',
                                    'start_date' => '2023-07-15',
                                    'end_date' => '2023-07-20',
                                    'duration' => '6 days',
                                    'status' => 'Approved',
                                    'status_class' => 'bg-success',
                                ],
                                [
                                    'id' => 2,
                                    'employee' => 'Jane Smith',
                                    'employee_id' => 102,
                                    'type' => 'Sick Leave',
                                    'start_date' => '2023-07-10',
                                    'end_date' => '2023-07-11',
                                    'duration' => '2 days',
                                    'status' => 'Approved',
                                    'status_class' => 'bg-success',
                                ],
                                [
                                    'id' => 3,
                                    'employee' => 'Robert Johnson',
                                    'employee_id' => 103,
                                    'type' => 'Unpaid Leave',
                                    'start_date' => '2023-08-01',
                                    'end_date' => '2023-08-15',
                                    'duration' => '15 days',
                                    'status' => 'Pending',
                                    'status_class' => 'bg-warning',
                                ],
                                [
                                    'id' => 4,
                                    'employee' => 'Emily Davis',
                                    'employee_id' => 104,
                                    'type' => 'Maternity Leave',
                                    'start_date' => '2023-09-01',
                                    'end_date' => '2023-12-01',
                                    'duration' => '3 months',
                                    'status' => 'Approved',
                                    'status_class' => 'bg-success',
                                ],
                                [
                                    'id' => 5,
                                    'employee' => 'Michael Wilson',
                                    'employee_id' => 105,
                                    'type' => 'Annual Leave',
                                    'start_date' => '2023-08-05',
                                    'end_date' => '2023-08-10',
                                    'duration' => '6 days',
                                    'status' => 'Rejected',
                                    'status_class' => 'bg-danger',
                                ],
                            ];

                            // Generate more dummy data
                            $employees = ['Alex Brown', 'Sarah Miller', 'David Clark', 'Lisa White', 'Kevin Moore'];
                            $types = ['Annual Leave', 'Sick Leave', 'Unpaid Leave', 'Bereavement Leave', 'Study Leave'];
                            $statuses = [
                                ['name' => 'Pending', 'class' => 'bg-warning'],
                                ['name' => 'Approved', 'class' => 'bg-success'],
                                ['name' => 'Rejected', 'class' => 'bg-danger'],
                                ['name' => 'Cancelled', 'class' => 'bg-secondary'],
                            ];

                            for ($i = 6; $i <= 15; $i++) {
                                $startDate = date('Y-m-d', strtotime('+' . rand(1, 60) . ' days'));
                                $duration = rand(1, 15);
                                $endDate = date('Y-m-d', strtotime($startDate . ' + ' . ($duration - 1) . ' days'));

                                $status = $statuses[array_rand($statuses)];

                                $leaveRequests[] = [
                                    'id' => $i,
                                    'employee' => $employees[array_rand($employees)],
                                    'employee_id' => 105 + $i,
                                    'type' => $types[array_rand($types)],
                                    'start_date' => $startDate,
                                    'end_date' => $endDate,
                                    'duration' => $duration . ' days',
                                    'status' => $status['name'],
                                    'status_class' => $status['class'],
                                ];
                            }
                        @endphp

                        @foreach ($leaveRequests as $leave)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="avatar me-2"
                                            style="background-image: url(https://placehold.co/128x128)"></span>
                                        <div>
                                            <div>{{ $leave['employee'] }}</div>
                                            <div class="text-muted">ID: {{ $leave['employee_id'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $leave['type'] }}</td>
                                <td>{{ date('d M Y', strtotime($leave['start_date'])) }}</td>
                                <td>{{ date('d M Y', strtotime($leave['end_date'])) }}</td>
                                <td>{{ $leave['duration'] }}</td>
                                <td>
                                    <span class="badge {{ $leave['status_class'] }}">{{ $leave['status'] }}</span>
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('hr.leave.detail', $leave['id']) }}" class="btn btn-sm btn-info">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <a href="{{ route('hr.leave.edit', $leave['id']) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Showing <span>1</span> to <span>15</span> of <span>50</span> entries</p>
                <ul class="pagination m-0 ms-auto">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class="ti ti-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="ti ti-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
