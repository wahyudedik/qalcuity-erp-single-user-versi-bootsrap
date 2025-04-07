@extends('layouts.app')

@section('title', 'Production Planning')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Production Planning
                </h2>
                <div class="text-muted mt-1">Manage production schedules and resource allocation</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.planning.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-plus"></i>
                        Create New Plan
                    </a>
                    <a href="{{ route('production.planning.create') }}" class="btn btn-primary d-sm-none">
                        <i class="ti ti-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters and search -->
    <div class="card mb-3">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select class="form-select">
                        <option value="">All Status</option>
                        <option value="scheduled">Scheduled</option>
                        <option value="in-progress">In Progress</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Branch</label>
                    <select class="form-select">
                        <option value="">All Branches</option>
                        <option value="1">Jakarta Plant</option>
                        <option value="2">Surabaya Plant</option>
                        <option value="3">Bandung Plant</option>
                        <option value="4">Medan Plant</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Date Range</label>
                    <input type="text" class="form-control" placeholder="Select date range">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Search</label>
                    <div class="input-icon">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-icon-addon">
                            <i class="ti ti-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Production Plans Table -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Production Plans</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>Plan ID</th>
                            <th>Branch</th>
                            <th>Date</th>
                            <th>Total Volume (m³)</th>
                            <th>Status</th>
                            <th>Batch Plant</th>
                            <th>Progress</th>
                            <th class="w-1">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $statuses = ['Scheduled', 'In Progress', 'Completed', 'Cancelled'];
                        $branches = ['Jakarta Plant', 'Surabaya Plant', 'Bandung Plant', 'Medan Plant'];
                        $batchPlants = ['Plant A', 'Plant B', 'Plant C', 'Mobile Plant'];
                        
                        for ($i = 1; $i <= 10; $i++) {
                            $date = date('Y-m-d', strtotime("+$i days"));
                            $volume = rand(50, 500);
                            $status = $statuses[array_rand($statuses)];
                            $branch = $branches[array_rand($branches)];
                            $batchPlant = $batchPlants[array_rand($batchPlants)];
                            $progress = $status == 'Completed' ? 100 : ($status == 'Cancelled' ? 0 : rand(0, 95));
                            
                            $statusClass = match($status) {
                                'Scheduled' => 'bg-blue',
                                'In Progress' => 'bg-yellow',
                                'Completed' => 'bg-green',
                                'Cancelled' => 'bg-red',
                                default => 'bg-secondary'
                            };
                        @endphp
                        <tr>
                            <td>
                                <a href="{{ route('production.planning.detail', $i) }}" class="text-reset">PP-{{ str_pad($i, 5, '0', STR_PAD_LEFT) }}</a>
                            </td>
                            <td>{{ $branch }}</td>
                            <td>{{ $date }}</td>
                            <td>{{ $volume }}</td>
                            <td>
                                <span class="badge {{ $statusClass }}">{{ $status }}</span>
                            </td>
                            <td>{{ $batchPlant }}</td>
                            <td>
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-auto">{{ $progress }}%</div>
                                    <div class="col">
                                        <div class="progress" style="width: 5rem">
                                            <div class="progress-bar" style="width: {{ $progress }}%" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $progress }}% Complete">
                                                <span class="visually-hidden">{{ $progress }}% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('production.planning.detail', $i) }}" class="btn btn-sm btn-info">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    <a href="{{ route('production.planning.edit', $i) }}" class="btn btn-sm btn-primary">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @php
                        }
                        @endphp
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer d-flex align-items-center">
            <p class="m-0 text-muted">Showing <span>1</span> to <span>10</span> of <span>50</span> entries</p>
            <ul class="pagination m-0 ms-auto">
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
                <li class="page-item"><a class="page-link" href="#">5</a></li>
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
@endsection
