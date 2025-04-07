@extends('layouts.app')

@section('title', 'Shift Management')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Shift Management
                </h2>
                <div class="text-muted mt-1">Manage employee work shifts</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.shifts.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-plus"></i>
                        Add New Shift
                    </a>
                    <a href="{{ route('hr.shifts.assignment') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-users"></i>
                        Shift Assignment
                    </a>
                    <a href="{{ route('hr.shifts.schedule') }}" class="btn btn-info d-none d-sm-inline-block">
                        <i class="ti ti-calendar"></i>
                        Shift Schedule
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Shift List</h3>
                <div class="card-actions">
                    <a href="{{ route('hr.shifts.reports') }}" class="btn btn-outline-primary btn-sm">
                        <i class="ti ti-report"></i>
                        Generate Reports
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <div class="input-icon w-50">
                        <span class="input-icon-addon">
                            <i class="ti ti-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Search shifts...">
                    </div>
                    <div>
                        <select class="form-select">
                            <option value="all">All Branches</option>
                            <option value="1">Jakarta Plant</option>
                            <option value="2">Surabaya Plant</option>
                            <option value="3">Bandung Plant</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Shift Code</th>
                                <th>Shift Name</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Duration</th>
                                <th>Branch</th>
                                <th>Status</th>
                                <th class="w-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $shifts = [
                                [
                                    'id' => 1,
                                    'code' => 'MS-01',
                                    'name' => 'Morning Shift',
                                    'start_time' => '07:00',
                                    'end_time' => '15:00',
                                    'duration' => '8 hours',
                                    'branch' => 'Jakarta Plant',
                                    'status' => 'Active'
                                ],
                                [
                                    'id' => 2,
                                    'code' => 'AS-02',
                                    'name' => 'Afternoon Shift',
                                    'start_time' => '15:00',
                                    'end_time' => '23:00',
                                    'duration' => '8 hours',
                                    'branch' => 'Jakarta Plant',
                                    'status' => 'Active'
                                ],
                                [
                                    'id' => 3,
                                    'code' => 'NS-03',
                                    'name' => 'Night Shift',
                                    'start_time' => '23:00',
                                    'end_time' => '07:00',
                                    'duration' => '8 hours',
                                    'branch' => 'Jakarta Plant',
                                    'status' => 'Active'
                                ],
                                [
                                    'id' => 4,
                                    'code' => 'MS-04',
                                    'name' => 'Morning Shift',
                                    'start_time' => '08:00',
                                    'end_time' => '16:00',
                                    'duration' => '8 hours',
                                    'branch' => 'Surabaya Plant',
                                    'status' => 'Active'
                                ],
                                [
                                    'id' => 5,
                                    'code' => 'AS-05',
                                    'name' => 'Afternoon Shift',
                                    'start_time' => '16:00',
                                    'end_time' => '00:00',
                                    'duration' => '8 hours',
                                    'branch' => 'Surabaya Plant',
                                    'status' => 'Active'
                                ],
                                [
                                    'id' => 6,
                                    'code' => 'NS-06',
                                    'name' => 'Night Shift',
                                    'start_time' => '00:00',
                                    'end_time' => '08:00',
                                    'duration' => '8 hours',
                                    'branch' => 'Surabaya Plant',
                                    'status' => 'Active'
                                ],
                                [
                                    'id' => 7,
                                    'code' => 'HS-07',
                                    'name' => 'Holiday Shift',
                                    'start_time' => '08:00',
                                    'end_time' => '16:00',
                                    'duration' => '8 hours',
                                    'branch' => 'All Plants',
                                    'status' => 'Inactive'
                                ],
                                [
                                    'id' => 8,
                                    'code' => 'ES-08',
                                    'name' => 'Emergency Shift',
                                    'start_time' => 'Flexible',
                                    'end_time' => 'Flexible',
                                    'duration' => 'Variable',
                                    'branch' => 'All Plants',
                                    'status' => 'Inactive'
                                ],
                            ];
                            @endphp

                            @foreach($shifts as $shift)
                            <tr>
                                <td>{{ $shift['code'] }}</td>
                                <td>{{ $shift['name'] }}</td>
                                <td>{{ $shift['start_time'] }}</td>
                                <td>{{ $shift['end_time'] }}</td>
                                <td>{{ $shift['duration'] }}</td>
                                <td>{{ $shift['branch'] }}</td>
                                <td>
                                    @if($shift['status'] == 'Active')
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('hr.shifts.detail', $shift['id']) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <a href="{{ route('hr.shifts.edit', $shift['id']) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex mt-4 justify-content-center">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="ti ti-chevron-left"></i>
                                prev
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                next
                                <i class="ti ti-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
