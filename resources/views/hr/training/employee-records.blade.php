@extends('layouts.app')

@section('title', 'Employee Training Records')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Employee Training Records
                    </h2>
                    <div class="text-muted mt-1">View and manage employee training history</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.training.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Training List
                        </a>
                        <a href="{{ route('hr.training.employee-records.export') }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-file-export"></i>
                            Export Records
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">Search Employee Records</h3>
                </div>
                <div class="card-body">
                    <form action="#" method="get">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Employee Name/ID</label>
                                <input type="text" class="form-control" name="employee"
                                    placeholder="Search by name or ID">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Department</label>
                                <select class="form-select" name="department">
                                    <option value="">All Departments</option>
                                    <option value="production">Production</option>
                                    <option value="quality">Quality Control</option>
                                    <option value="maintenance">Maintenance</option>
                                    <option value="administration">Administration</option>
                                    <option value="sales">Sales</option>
                                    <option value="logistics">Logistics</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Training Category</label>
                                <select class="form-select" name="category">
                                    <option value="">All Categories</option>
                                    <option value="technical">Technical Skills</option>
                                    <option value="safety">Safety</option>
                                    <option value="leadership">Leadership</option>
                                    <option value="quality">Quality Management</option>
                                    <option value="soft-skills">Soft Skills</option>
                                    <option value="certification">Certification</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Date Range</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="date_from">
                                    <span class="input-group-text">to</span>
                                    <input type="date" class="form-control" name="date_to">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option value="">All Statuses</option>
                                    <option value="registered">Registered</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="attended">Attended</option>
                                    <option value="completed">Completed</option>
                                    <option value="absent">Absent</option>
                                </select>
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="ti ti-search me-2"></i>
                                    Search Records
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Employee Training Records</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Training</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Score</th>
                                    <th>Certificate</th>
                                    <th class="w-1">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $employees = [
                                        [
                                            'id' => 101,
                                            'name' => 'John Smith',
                                            'department' => 'Production',
                                            'position' => 'Supervisor',
                                        ],
                                        [
                                            'id' => 102,
                                            'name' => 'Maria Garcia',
                                            'department' => 'Quality Control',
                                            'position' => 'Specialist',
                                        ],
                                        [
                                            'id' => 103,
                                            'name' => 'Robert Johnson',
                                            'department' => 'Maintenance',
                                            'position' => 'Technician',
                                        ],
                                        [
                                            'id' => 104,
                                            'name' => 'Sarah Lee',
                                            'department' => 'Administration',
                                            'position' => 'Manager',
                                        ],
                                        [
                                            'id' => 105,
                                            'name' => 'David Chen',
                                            'department' => 'Production',
                                            'position' => 'Operator',
                                        ],
                                        [
                                            'id' => 106,
                                            'name' => 'Lisa Wong',
                                            'department' => 'Sales',
                                            'position' => 'Representative',
                                        ],
                                        [
                                            'id' => 107,
                                            'name' => 'Michael Brown',
                                            'department' => 'Logistics',
                                            'position' => 'Coordinator',
                                        ],
                                        [
                                            'id' => 108,
                                            'name' => 'Jennifer Davis',
                                            'department' => 'Quality Control',
                                            'position' => 'Technician',
                                        ],
                                        [
                                            'id' => 109,
                                            'name' => 'James Wilson',
                                            'department' => 'Maintenance',
                                            'position' => 'Supervisor',
                                        ],
                                        [
                                            'id' => 110,
                                            'name' => 'Patricia Moore',
                                            'department' => 'Production',
                                            'position' => 'Manager',
                                        ],
                                    ];

                                    $trainingCategories = [
                                        'technical',
                                        'safety',
                                        'leadership',
                                        'quality',
                                        'soft-skills',
                                        'certification',
                                    ];
                                    $trainingTitles = [
                                        'technical' => [
                                            'Batch Plant Operation',
                                            'Equipment Maintenance',
                                            'Production Process',
                                        ],
                                        'safety' => ['Workplace Safety', 'Emergency Response', 'First Aid Training'],
                                        'leadership' => ['Team Management', 'Leadership Skills', 'Conflict Resolution'],
                                        'quality' => ['Quality Control', 'ISO Standards', 'Testing Procedures'],
                                        'soft-skills' => ['Communication', 'Time Management', 'Customer Service'],
                                        'certification' => [
                                            'Mix Design Certification',
                                            'Quality Assurance',
                                            'Technical Certification',
                                        ],
                                    ];

                                    $statuses = ['registered', 'confirmed', 'attended', 'completed', 'absent'];
                                    $statusBadges = [
                                        'registered' => 'bg-blue-lt',
                                        'confirmed' => 'bg-purple-lt',
                                        'attended' => 'bg-yellow-lt',
                                        'completed' => 'bg-green-lt',
                                        'absent' => 'bg-red-lt',
                                    ];

                                    // Generate records
                                    $records = [];
                                    for ($i = 0; $i < 20; $i++) {
                                        $employee = $employees[array_rand($employees)];
                                        $category = $trainingCategories[array_rand($trainingCategories)];
                                        $title = $trainingTitles[$category][array_rand($trainingTitles[$category])];
                                        $status = $statuses[array_rand($statuses)];
                                        $date = \Carbon\Carbon::now()->subDays(rand(0, 180))->format('Y-m-d');

                                        $score = null;
                                        if ($status == 'completed') {
                                            $score = rand(60, 100);
                                        }

                                        $hasCertificate =
                                            $status == 'completed' && ($category == 'certification' || rand(0, 1));
                                        $records[] = [
                                            'employee' => $employee,
                                            'title' => $title,
                                            'category' => $category,
                                            'date' => $date,
                                            'status' => $status,
                                            'score' => $score,
                                            'has_certificate' => $hasCertificate,
                                            'training_id' => rand(1, 50),
                                        ];
                                    }

                                    // Sort by date (newest first)
                                    usort($records, function ($a, $b) {
                                        return strcmp($b['date'], $a['date']);
                                    });
                                @endphp

                                @foreach ($records as $record)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="avatar me-2"
                                                    style="background-image: url(https://placehold.co/128x128)"></span>
                                                <div>
                                                    <div>{{ $record['employee']['name'] }}</div>
                                                    <div class="text-muted">{{ $record['employee']['department'] }} -
                                                        {{ $record['employee']['position'] }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('hr.training.detail', $record['training_id']) }}">{{ $record['title'] }}</a>
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $record['category'] == 'technical'
                                                    ? 'bg-blue'
                                                    : ($record['category'] == 'safety'
                                                        ? 'bg-red'
                                                        : ($record['category'] == 'leadership'
                                                            ? 'bg-purple'
                                                            : ($record['category'] == 'quality'
                                                                ? 'bg-cyan'
                                                                : ($record['category'] == 'soft-skills'
                                                                    ? 'bg-green'
                                                                    : 'bg-yellow')))) }}">
                                                {{ ucfirst(str_replace('-', ' ', $record['category'])) }}
                                            </span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($record['date'])->format('M d, Y') }}</td>
                                        <td>
                                            <span class="badge {{ $statusBadges[$record['status']] }}">
                                                {{ ucfirst($record['status']) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($record['score'])
                                                <span
                                                    class="{{ $record['score'] >= 80 ? 'text-success' : ($record['score'] >= 70 ? 'text-warning' : 'text-danger') }}">
                                                    {{ $record['score'] }}%
                                                </span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($record['has_certificate'])
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-success"
                                                    title="Download Certificate">
                                                    <i class="ti ti-certificate"></i>
                                                </a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('hr.training.employee-records.detail', $record['employee']['id']) }}"
                                                    class="btn btn-sm btn-icon btn-ghost-secondary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-icon btn-ghost-secondary" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="{{ route('hr.training.employee-records.detail', $record['employee']['id']) }}"
                                                            class="dropdown-item">
                                                            View Details
                                                        </a>
                                                        <a href="#" class="dropdown-item">
                                                            Update Status
                                                        </a>
                                                        <a href="#" class="dropdown-item">
                                                            Add Score
                                                        </a>
                                                        @if (!$record['has_certificate'] && $record['status'] == 'completed')
                                                            <a href="#" class="dropdown-item">
                                                                Generate Certificate
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <p class="m-0 text-muted">Showing <span>1</span> to <span>20</span> of <span>125</span> entries</p>
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
    </div>
@endsection
