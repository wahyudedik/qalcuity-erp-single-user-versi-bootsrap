@extends('layouts.app')

@section('title', 'Training Budget')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Training Budget Management
                    </h2>
                    <div class="text-muted mt-1">Track and manage training budget allocation and expenses</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.training.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Training List
                        </a>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#addBudgetModal">
                            <i class="ti ti-plus"></i>
                            Add Budget Allocation
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Budget Overview</h3>
                            <div class="card-actions">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary active">2023</button>
                                    <button class="btn btn-outline-primary">2022</button>
                                    <button class="btn btn-outline-primary">2021</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @php
                                $totalBudget = 120000;
                                $allocatedBudget = 95000;
                                $spentBudget = 68500;
                                $remainingBudget = $totalBudget - $spentBudget;
                                $allocatedPercentage = ($allocatedBudget / $totalBudget) * 100;
                                $spentPercentage = ($spentBudget / $totalBudget) * 100;
                                $remainingPercentage = 100 - $spentPercentage;

                                $departmentBudgets = [
                                    ['name' => 'Production', 'allocated' => 45000, 'spent' => 32000],
                                    ['name' => 'Quality Control', 'allocated' => 20000, 'spent' => 15500],
                                    ['name' => 'Maintenance', 'allocated' => 15000, 'spent' => 12000],
                                    ['name' => 'Administration', 'allocated' => 10000, 'spent' => 6000],
                                    ['name' => 'Sales', 'allocated' => 5000, 'spent' => 3000],
                                ];

                                $categoryBudgets = [
                                    ['name' => 'Technical', 'allocated' => 50000, 'spent' => 38000],
                                    ['name' => 'Safety', 'allocated' => 20000, 'spent' => 15000],
                                    ['name' => 'Leadership', 'allocated' => 15000, 'spent' => 10000],
                                    ['name' => 'Quality', 'allocated' => 5000, 'spent' => 3500],
                                    ['name' => 'Soft Skills', 'allocated' => 5000, 'spent' => 2000],
                                ];
                            @endphp

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <span class="avatar bg-blue-lt me-3">
                                                    <i class="ti ti-cash"></i>
                                                </span>
                                                <div>
                                                    <div class="font-weight-medium">{{ number_format($totalBudget) }}</div>
                                                    <div class="text-muted">Total Budget</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <span class="avatar bg-red-lt me-3">
                                                    <i class="ti ti-receipt"></i>
                                                </span>
                                                <div>
                                                    <div class="font-weight-medium">{{ number_format($spentBudget) }}</div>
                                                    <div class="text-muted">Spent
                                                        ({{ number_format($spentPercentage, 1) }}%)</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <span class="avatar bg-green-lt me-3">
                                                    <i class="ti ti-wallet"></i>
                                                </span>
                                                <div>
                                                    <div class="font-weight-medium">{{ number_format($remainingBudget) }}
                                                    </div>
                                                    <div class="text-muted">Remaining
                                                        ({{ number_format($remainingPercentage, 1) }}%)</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div>Budget Utilization</div>
                                    <div class="ms-auto">{{ number_format($spentPercentage, 1) }}%</div>
                                </div>
                                <div class="progress mb-3">
                                    <div class="progress-bar bg-primary" style="width: {{ $spentPercentage }}%"
                                        role="progressbar" aria-valuenow="{{ $spentPercentage }}" aria-valuemin="0"
                                        aria-valuemax="100" aria-label="{{ $spentPercentage }}% Complete">
                                        <span class="visually-hidden">{{ $spentPercentage }}% Complete</span>
                                    </div>
                                    <div class="progress-bar bg-success" style="width: {{ $remainingPercentage }}%"
                                        role="progressbar" aria-valuenow="{{ $remainingPercentage }}" aria-valuemin="0"
                                        aria-valuemax="100" aria-label="{{ $remainingPercentage }}% Remaining">
                                        <span class="visually-hidden">{{ $remainingPercentage }}% Remaining</span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-2">
                                    <div>Budget Allocation</div>
                                    <div class="ms-auto">{{ number_format($allocatedPercentage, 1) }}%</div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-blue" style="width: {{ $allocatedPercentage }}%"
                                        role="progressbar" aria-valuenow="{{ $allocatedPercentage }}" aria-valuemin="0"
                                        aria-valuemax="100" aria-label="{{ $allocatedPercentage }}% Allocated">
                                        <span class="visually-hidden">{{ $allocatedPercentage }}% Allocated</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Budget by Department</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter">
                                            <thead>
                                                <tr>
                                                    <th>Department</th>
                                                    <th>Allocated</th>
                                                    <th>Spent</th>
                                                    <th>%</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($departmentBudgets as $dept)
                                                    @php
                                                        $percentage = ($dept['spent'] / $dept['allocated']) * 100;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $dept['name'] }}</td>
                                                        <td>{{ number_format($dept['allocated']) }}</td>
                                                        <td>{{ number_format($dept['spent']) }}</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span
                                                                    class="{{ $percentage > 90 ? 'text-danger' : ($percentage > 75 ? 'text-warning' : 'text-success') }} me-2">
                                                                    {{ number_format($percentage, 1) }}%
                                                                </span>
                                                                <div class="progress progress-sm flex-grow-1">
                                                                    <div class="progress-bar {{ $percentage > 90 ? 'bg-danger' : ($percentage > 75 ? 'bg-warning' : 'bg-success') }}"
                                                                        style="width: {{ $percentage }}%"
                                                                        role="progressbar"
                                                                        aria-valuenow="{{ $percentage }}"
                                                                        aria-valuemin="0" aria-valuemax="100">
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
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">Budget by Category</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter">
                                            <thead>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>Allocated</th>
                                                    <th>Spent</th>
                                                    <th>%</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categoryBudgets as $cat)
                                                    @php
                                                        $percentage = ($cat['spent'] / $cat['allocated']) * 100;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $cat['name'] }}</td>
                                                        <td>{{ number_format($cat['allocated']) }}</td>
                                                        <td>{{ number_format($cat['spent']) }}</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span
                                                                    class="{{ $percentage > 90 ? 'text-danger' : ($percentage > 75 ? 'text-warning' : 'text-success') }} me-2">
                                                                    {{ number_format($percentage, 1) }}%
                                                                </span>
                                                                <div class="progress progress-sm flex-grow-1">
                                                                    <div class="progress-bar {{ $percentage > 90 ? 'bg-danger' : ($percentage > 75 ? 'bg-warning' : 'bg-success') }}"
                                                                        style="width: {{ $percentage }}%"
                                                                        role="progressbar"
                                                                        aria-valuenow="{{ $percentage }}"
                                                                        aria-valuemin="0" aria-valuemax="100">
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
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent Expenses</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th>Training</th>
                                            <th>Department</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th class="w-1">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $trainingTitles = [
                                                'technical' => [
                                                    'Batch Plant Operation',
                                                    'Equipment Maintenance',
                                                    'Production Process',
                                                ],
                                                'safety' => [
                                                    'Workplace Safety',
                                                    'Emergency Response',
                                                    'First Aid Training',
                                                ],
                                                'leadership' => [
                                                    'Team Management',
                                                    'Leadership Skills',
                                                    'Conflict Resolution',
                                                ],
                                                'quality' => ['Quality Control', 'ISO Standards', 'Testing Procedures'],
                                                'soft-skills' => [
                                                    'Communication',
                                                    'Time Management',
                                                    'Customer Service',
                                                ],
                                            ];

                                            $departments = [
                                                'Production',
                                                'Quality Control',
                                                'Maintenance',
                                                'Administration',
                                                'Sales',
                                            ];
                                            $categories = [
                                                'Technical',
                                                'Safety',
                                                'Leadership',
                                                'Quality',
                                                'Soft Skills',
                                            ];
                                            $statuses = ['completed', 'pending', 'approved'];

                                            $expenses = [];
                                            for ($i = 0; $i < 10; $i++) {
                                                $category = strtolower($categories[array_rand($categories)]);
                                                $category = str_replace(' ', '-', $category);
                                                $title =
                                                    $trainingTitles[$category][array_rand($trainingTitles[$category])];
                                                $department = $departments[array_rand($departments)];
                                                $status = $statuses[array_rand($statuses)];
                                                $amount = rand(500, 5000) * 10;
                                                $date = \Carbon\Carbon::now()->subDays(rand(1, 90))->format('Y-m-d');

                                                $expenses[] = [
                                                    'title' => $title,
                                                    'department' => $department,
                                                    'category' => ucfirst(str_replace('-', ' ', $category)),
                                                    'status' => $status,
                                                    'amount' => $amount,
                                                    'date' => $date,
                                                ];
                                            }

                                            // Sort by date (newest first)
                                            usort($expenses, function ($a, $b) {
                                                return strcmp($b['date'], $a['date']);
                                            });
                                        @endphp

                                        @foreach ($expenses as $expense)
                                            <tr>
                                                <td>{{ $expense['title'] }}</td>
                                                <td>{{ $expense['department'] }}</td>
                                                <td>{{ $expense['category'] }}</td>
                                                <td>{{ \Carbon\Carbon::parse($expense['date'])->format('M d, Y') }}</td>
                                                <td>{{ number_format($expense['amount']) }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $expense['status'] == 'completed'
                                                            ? 'bg-success'
                                                            : ($expense['status'] == 'pending'
                                                                ? 'bg-warning'
                                                                : 'bg-info') }}">
                                                        {{ ucfirst($expense['status']) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex">
                                <a href="#" class="btn btn-link">View All Expenses</a>
                                <a href="#" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addExpenseModal">
                                    <i class="ti ti-plus"></i>
                                    Add Expense
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Budget Forecast</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <div>Q1 (Jan-Mar)</div>
                                    <div class="ms-auto">{{ number_format(25000) }}</div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" style="width: 100%" role="progressbar"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <div>Q2 (Apr-Jun)</div>
                                    <div class="ms-auto">{{ number_format(28000) }}</div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" style="width: 100%" role="progressbar"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <div>Q3 (Jul-Sep)</div>
                                    <div class="ms-auto">{{ number_format(15500) }} / {{ number_format(30000) }}</div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 52%" role="progressbar"
                                        aria-valuenow="52" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <div>Q4 (Oct-Dec)</div>
                                    <div class="ms-auto">{{ number_format(0) }} / {{ number_format(37000) }}</div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-secondary" style="width: 0%" role="progressbar"
                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Budget Requests</h3>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-red"></span>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex justify-content-between">
                                                <div class="text-truncate">
                                                    <strong>Advanced Batch Plant Operation</strong>
                                                </div>
                                                <div class="text-muted">{{ number_format(8500) }}</div>
                                            </div>
                                            <div class="text-muted text-truncate small">Production Department • Technical
                                            </div>
                                            <div class="mt-1">
                                                <span class="badge bg-warning">Pending Approval</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-blue"></span>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex justify-content-between">
                                                <div class="text-truncate">
                                                    <strong>ISO 9001 Certification Training</strong>
                                                </div>
                                                <div class="text-muted">{{ number_format(12000) }}</div>
                                            </div>
                                            <div class="text-muted text-truncate small">Quality Control Department •
                                                Quality</div>
                                            <div class="mt-1">
                                                <span class="badge bg-warning">Pending Approval</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-green"></span>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex justify-content-between">
                                                <div class="text-truncate">
                                                    <strong>Leadership Development Program</strong>
                                                </div>
                                                <div class="text-muted">{{ number_format(15000) }}</div>
                                            </div>
                                            <div class="text-muted text-truncate small">Administration Department •
                                                Leadership</div>
                                            <div class="mt-1">
                                                <span class="badge bg-success">Approved</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex">
                                <a href="#" class="btn btn-link">View All Requests</a>
                                <a href="#" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addRequestModal">
                                    <i class="ti ti-plus"></i>
                                    New Request
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cost per Employee</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <div>Average Cost per Employee</div>
                                    <div class="ms-auto">{{ number_format(1250) }}</div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th>Department</th>
                                            <th>Employees</th>
                                            <th>Avg. Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Production</td>
                                            <td>32</td>
                                            <td>{{ number_format(1000) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Quality Control</td>
                                            <td>12</td>
                                            <td>{{ number_format(1290) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Maintenance</td>
                                            <td>15</td>
                                            <td>{{ number_format(800) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Administration</td>
                                            <td>8</td>
                                            <td>{{ number_format(750) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sales</td>
                                            <td>5</td>
                                            <td>{{ number_format(600) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Budget Allocation Modal -->
    <div class="modal modal-blur fade" id="addBudgetModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Budget Allocation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Fiscal Year</label>
                        <select class="form-select">
                            <option value="2023" selected>2023</option>
                            <option value="2024">2024</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Department</label>
                        <select class="form-select">
                            <option value="">All Departments</option>
                            <option value="production">Production</option>
                            <option value="quality">Quality Control</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="administration">Administration</option>
                            <option value="sales">Sales</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select">
                            <option value="">All Categories</option>
                            <option value="technical">Technical Skills</option>
                            <option value="safety">Safety</option>
                            <option value="leadership">Leadership</option>
                            <option value="quality">Quality Management</option>
                            <option value="soft-skills">Soft Skills</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Budget Amount</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" placeholder="Enter amount">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Budget allocation description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary ms-auto">
                        <i class="ti ti-plus"></i>
                        Add Allocation
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Expense Modal -->
    <div class="modal modal-blur fade" id="addExpenseModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Training Expense</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Training Title</label>
                        <input type="text" class="form-control" placeholder="Enter training title">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Department</label>
                            <select class="form-select">
                                <option value="production">Production</option>
                                <option value="quality">Quality Control</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="administration">Administration</option>
                                <option value="sales">Sales</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select">
                                <option value="technical">Technical Skills</option>
                                <option value="safety">Safety</option>
                                <option value="leadership">Leadership</option>
                                <option value="quality">Quality Management</option>
                                <option value="soft-skills">Soft Skills</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" placeholder="Enter amount">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Expense Type</label>
                        <select class="form-select">
                            <option value="training-fee">Training Fee</option>
                            <option value="materials">Training Materials</option>
                            <option value="travel">Travel & Accommodation</option>
                            <option value="certification">Certification Fee</option>
                            <option value="venue">Venue Rental</option>
                            <option value="catering">Catering</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Expense description"></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Attach Receipt</div>
                        <input type="file" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary ms-auto">
                        <i class="ti ti-plus"></i>
                        Add Expense
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Budget Request Modal -->
    <div class="modal modal-blur fade" id="addRequestModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Budget Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Training Title</label>
                        <input type="text" class="form-control" placeholder="Enter training title">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Department</label>
                            <select class="form-select">
                                <option value="production">Production</option>
                                <option value="quality">Quality Control</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="administration">Administration</option>
                                <option value="sales">Sales</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select">
                                <option value="technical">Technical Skills</option>
                                <option value="safety">Safety</option>
                                <option value="leadership">Leadership</option>
                                <option value="quality">Quality Management</option>
                                <option value="soft-skills">Soft Skills</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Planned Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Requested Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" placeholder="Enter amount">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Number of Participants</label>
                        <input type="number" class="form-control" placeholder="Enter number of participants">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Justification</label>
                        <textarea class="form-control" rows="3" placeholder="Explain why this training is necessary"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Expected Outcomes</label>
                        <textarea class="form-control" rows="3" placeholder="Describe the expected benefits and outcomes"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Supporting Documents</label>
                        <input type="file" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary ms-auto">
                        <i class="ti ti-send"></i>
                        Submit Request
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize any charts or interactive elements here
        });
    </script>
@endsection
@endsection
