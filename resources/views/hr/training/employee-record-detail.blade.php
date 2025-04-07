@extends('layouts.app')

@section('title', 'Employee Training Record')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Employee Training Record
                    </h2>
                    <div class="text-muted mt-1">Detailed training history for employee</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.training.employee-records') }}"
                            class="btn btn-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Records
                        </a>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" onclick="window.print();">
                            <i class="ti ti-printer"></i>
                            Print Record
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $employeeId = $id ?? 101;

        // Generate employee data based on ID
        $employees = [
            101 => [
                'name' => 'John Smith',
                'department' => 'Production',
                'position' => 'Supervisor',
                'email' => 'john.smith@qalcuity.com',
                'phone' => '(555) 123-4567',
                'hire_date' => '2018-05-12',
            ],
            102 => [
                'name' => 'Maria Garcia',
                'department' => 'Quality Control',
                'position' => 'Specialist',
                'email' => 'maria.garcia@qalcuity.com',
                'phone' => '(555) 234-5678',
                'hire_date' => '2019-03-22',
            ],
            103 => [
                'name' => 'Robert Johnson',
                'department' => 'Maintenance',
                'position' => 'Technician',
                'email' => 'robert.johnson@qalcuity.com',
                'phone' => '(555) 345-6789',
                'hire_date' => '2017-11-05',
            ],
            104 => [
                'name' => 'Sarah Lee',
                'department' => 'Administration',
                'position' => 'Manager',
                'email' => 'sarah.lee@qalcuity.com',
                'phone' => '(555) 456-7890',
                'hire_date' => '2016-08-15',
            ],
            105 => [
                'name' => 'David Chen',
                'department' => 'Production',
                'position' => 'Operator',
                'email' => 'david.chen@qalcuity.com',
                'phone' => '(555) 567-8901',
                'hire_date' => '2020-01-10',
            ],
        ];

        $employee = $employees[$employeeId] ?? $employees[101];

        // Training categories and titles
        $trainingCategories = ['technical', 'safety', 'leadership', 'quality', 'soft-skills', 'certification'];
        $trainingTitles = [
            'technical' => ['Batch Plant Operation', 'Equipment Maintenance', 'Production Process'],
            'safety' => ['Workplace Safety', 'Emergency Response', 'First Aid Training'],
            'leadership' => ['Team Management', 'Leadership Skills', 'Conflict Resolution'],
            'quality' => ['Quality Control', 'ISO Standards', 'Testing Procedures'],
            'soft-skills' => ['Communication', 'Time Management', 'Customer Service'],
            'certification' => ['Mix Design Certification', 'Quality Assurance', 'Technical Certification'],
        ];

        $statuses = ['registered', 'confirmed', 'attended', 'completed', 'absent'];
        $statusBadges = [
            'registered' => 'bg-blue-lt',
            'confirmed' => 'bg-purple-lt',
            'attended' => 'bg-yellow-lt',
            'completed' => 'bg-green-lt',
            'absent' => 'bg-red-lt',
        ];

        // Generate training records
        $records = [];
        $completedCount = 0;
        $certificationCount = 0;

        for ($i = 0; $i < 15; $i++) {
            $category = $trainingCategories[array_rand($trainingCategories)];
            $title = $trainingTitles[$category][array_rand($trainingTitles[$category])];
            $status = $statuses[array_rand($statuses)];
            $date = \Carbon\Carbon::now()->subDays(rand(0, 730))->format('Y-m-d');

            $score = null;
            if ($status == 'completed') {
                $score = rand(60, 100);
                $completedCount++;

                if ($category == 'certification' || rand(0, 1)) {
                    $certificationCount++;
                }
            }

            $hasCertificate = $status == 'completed' && ($category == 'certification' || rand(0, 1));

            $records[] = [
                'title' => $title,
                'category' => $category,
                'date' => $date,
                'status' => $status,
                'score' => $score,
                'has_certificate' => $hasCertificate,
                'training_id' => rand(1, 50),
                'comments' =>
                    $status == 'completed'
                        ? ($score >= 80
                            ? 'Excellent performance. Demonstrated strong understanding of the material.'
                            : ($score >= 70
                                ? 'Good performance. Some areas for improvement identified.'
                                : 'Needs additional training to meet standards.'))
                        : null,
            ];
        }

        // Sort by date (newest first)
        usort($records, function ($a, $b) {
            return strcmp($b['date'], $a['date']);
        });

        // Calculate statistics
        $totalTrainings = count($records);
        $completionRate = $totalTrainings > 0 ? round(($completedCount / $totalTrainings) * 100) : 0;
        $averageScore = 0;
        $scoreCount = 0;

        foreach ($records as $record) {
            if ($record['score']) {
                $averageScore += $record['score'];
                $scoreCount++;
            }
        }

        $averageScore = $scoreCount > 0 ? round($averageScore / $scoreCount) : 0;

        // Group by category for chart
        $categoryStats = [];
        foreach ($trainingCategories as $cat) {
            $categoryStats[$cat] = 0;
        }

        foreach ($records as $record) {
            $categoryStats[$record['category']]++;
        }
    @endphp

    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <span class="avatar avatar-lg me-3"
                                    style="background-image: url(https://placehold.co/128x128)"></span>
                                <div>
                                    <h3 class="m-0">{{ $employee['name'] }}</h3>
                                    <div class="text-muted">{{ $employee['department'] }} - {{ $employee['position'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="card card-sm">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar bg-blue-lt me-3">
                                                        <i class="ti ti-certificate"></i>
                                                    </span>
                                                    <div>
                                                        <div class="font-weight-medium">{{ $completedCount }}</div>
                                                        <div class="text-muted">Completed</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card card-sm">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar bg-green-lt me-3">
                                                        <i class="ti ti-award"></i>
                                                    </span>
                                                    <div>
                                                        <div class="font-weight-medium">{{ $certificationCount }}</div>
                                                        <div class="text-muted">Certifications</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="mb-2">
                                    <div class="d-flex align-items-center mb-1">
                                        <div class="text-truncate">Completion Rate</div>
                                        <div class="ms-auto">{{ $completionRate }}%</div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: {{ $completionRate }}%"
                                            role="progressbar" aria-valuenow="{{ $completionRate }}" aria-valuemin="0"
                                            aria-valuemax="100" aria-label="{{ $completionRate }}% Complete">
                                            <span class="visually-hidden">{{ $completionRate }}% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center mb-1">
                                        <div class="text-truncate">Average Score</div>
                                        <div class="ms-auto">{{ $averageScore }}%</div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar {{ $averageScore >= 80 ? 'bg-green' : ($averageScore >= 70 ? 'bg-yellow' : 'bg-red') }}"
                                            style="width: {{ $averageScore }}%" role="progressbar"
                                            aria-valuenow="{{ $averageScore }}" aria-valuemin="0" aria-valuemax="100"
                                            aria-label="{{ $averageScore }}% Score">
                                            <span class="visually-hidden">{{ $averageScore }}% Score</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h4 class="mb-3">Contact Information</h4>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2"><i class="ti ti-mail text-muted"></i></div>
                                        <div>{{ $employee['email'] }}</div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2"><i class="ti ti-phone text-muted"></i></div>
                                        <div>{{ $employee['phone'] }}</div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="me-2"><i class="ti ti-calendar text-muted"></i></div>
                                        <div>Hired: {{ \Carbon\Carbon::parse($employee['hire_date'])->format('M d, Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Training by Category</h3>
                        </div>
                        <div class="card-body">
                            @foreach ($categoryStats as $category => $count)
                                @if ($count > 0)
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center mb-1">
                                            <div class="text-truncate">{{ ucfirst(str_replace('-', ' ', $category)) }}
                                            </div>
                                            <div class="ms-auto">{{ $count }}</div>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar {{ $category == 'technical'
                                                ? 'bg-blue'
                                                : ($category == 'safety'
                                                    ? 'bg-red'
                                                    : ($category == 'leadership'
                                                        ? 'bg-purple'
                                                        : ($category == 'quality'
                                                            ? 'bg-cyan'
                                                            : ($category == 'soft-skills'
                                                                ? 'bg-green'
                                                                : 'bg-yellow')))) }}"
                                                style="width: {{ ($count / $totalTrainings) * 100 }}%" role="progressbar"
                                                aria-valuenow="{{ ($count / $totalTrainings) * 100 }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Training History</h3>
                            <div class="card-actions">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary active">All</button>
                                    <button class="btn btn-outline-primary">Completed</button>
                                    <button class="btn btn-outline-primary">Pending</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Training</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Score</th>
                                            <th class="w-1">Certificate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($records as $record)
                                            <tr>
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
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Training Evaluations & Comments</h3>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                @foreach ($records as $index => $record)
                                    @if ($record['status'] == 'completed' && $record['comments'])
                                        <div class="timeline-item">
                                            <div class="timeline-item-marker">
                                                <div class="timeline-item-marker-text">
                                                    {{ \Carbon\Carbon::parse($record['date'])->format('M d') }}</div>
                                                <div
                                                    class="timeline-item-marker-indicator bg-{{ $record['score'] >= 80 ? 'green' : ($record['score'] >= 70 ? 'yellow' : 'red') }}">
                                                </div>
                                            </div>
                                            <div class="timeline-item-content">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <span class="fw-bold">{{ $record['title'] }}</span>
                                                        <span class="text-muted ms-2">{{ $record['score'] }}%</span>
                                                    </div>
                                                    <div class="ms-auto text-muted">
                                                        {{ \Carbon\Carbon::parse($record['date'])->format('Y') }}
                                                    </div>
                                                </div>
                                                <div class="mt-1">
                                                    {{ $record['comments'] }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Required Trainings</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @php
                                    $requiredTrainings = [
                                        [
                                            'title' => 'Annual Safety Training',
                                            'category' => 'safety',
                                            'due_date' => \Carbon\Carbon::now()
                                                ->addDays(rand(-30, 60))
                                                ->format('Y-m-d'),
                                        ],
                                        [
                                            'title' => 'Quality Management System',
                                            'category' => 'quality',
                                            'due_date' => \Carbon\Carbon::now()
                                                ->addDays(rand(-30, 60))
                                                ->format('Y-m-d'),
                                        ],
                                        [
                                            'title' => 'Equipment Operation Certification',
                                            'category' => 'certification',
                                            'due_date' => \Carbon\Carbon::now()
                                                ->addDays(rand(-30, 60))
                                                ->format('Y-m-d'),
                                        ],
                                    ];

                                    foreach ($requiredTrainings as &$training) {
                                        $dueDate = \Carbon\Carbon::parse($training['due_date']);
                                        $today = \Carbon\Carbon::now();
                                        $training['status'] = $dueDate->isPast() ? 'overdue' : 'upcoming';
                                        $training['days'] = $today->diffInDays($dueDate, false);
                                    }
                                @endphp

                                @foreach ($requiredTrainings as $training)
                                    <div class="col-md-4">
                                        <div class="card card-sm">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span
                                                        class="badge {{ $training['category'] == 'technical'
                                                            ? 'bg-blue'
                                                            : ($training['category'] == 'safety'
                                                                ? 'bg-red'
                                                                : ($training['category'] == 'leadership'
                                                                    ? 'bg-purple'
                                                                    : ($training['category'] == 'quality'
                                                                        ? 'bg-cyan'
                                                                        : ($training['category'] == 'soft-skills'
                                                                            ? 'bg-green'
                                                                            : 'bg-yellow')))) }} me-2">
                                                        {{ ucfirst($training['category']) }}
                                                    </span>
                                                    <div class="ms-auto">
                                                        <span
                                                            class="badge {{ $training['status'] == 'overdue' ? 'bg-red' : 'bg-green' }}">
                                                            {{ ucfirst($training['status']) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <h4 class="m-0">{{ $training['title'] }}</h4>
                                                <div class="mt-2 text-muted">
                                                    @if ($training['status'] == 'overdue')
                                                        <span class="text-danger">{{ abs($training['days']) }} days
                                                            overdue</span>
                                                    @else
                                                        <span class="text-success">Due in {{ $training['days'] }}
                                                            days</span>
                                                    @endif
                                                </div>
                                                <div class="mt-3">
                                                    <a href="{{ route('hr.training.index') }}"
                                                        class="btn btn-sm btn-primary w-100">
                                                        Schedule
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
