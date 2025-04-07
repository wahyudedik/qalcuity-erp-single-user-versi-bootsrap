@extends('layouts.app')

@section('title', 'Payroll Management')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Payroll Management
                    </h2>
                    <div class="text-muted mt-1">Manage employee payroll periods and processing</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.payroll.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus"></i>
                            Create New Payroll Period
                        </a>
                        <a href="{{ route('hr.payroll.create') }}" class="btn btn-primary d-sm-none">
                            <i class="ti ti-plus"></i>
                        </a>
                        <a href="{{ route('hr.payroll.process') }}" class="btn btn-success d-none d-sm-inline-block">
                            <i class="ti ti-calculator"></i>
                            Process Payroll
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
                    <h3 class="card-title">Payroll Periods</h3>
                    <div class="card-actions">
                        <a href="{{ route('hr.payroll.reports') }}" class="btn btn-outline-primary btn-sm">
                            <i class="ti ti-report"></i>
                            Payroll Reports
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="text-muted">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="ti ti-calendar"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Select month" value="July 2023">
                            </div>
                        </div>
                        <div class="ms-auto">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="ti ti-filter"></i>
                                    Filter
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">All Periods</a>
                                    <a class="dropdown-item" href="#">Processed</a>
                                    <a class="dropdown-item" href="#">Pending</a>
                                    <a class="dropdown-item" href="#">Approved</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Period</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Employees</th>
                                    <th>Total Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $statuses = ['Processed', 'Pending', 'Approved', 'Draft'];
                                    $months = [
                                        'January',
                                        'February',
                                        'March',
                                        'April',
                                        'May',
                                        'June',
                                        'July',
                                        'August',
                                        'September',
                                        'October',
                                        'November',
                                        'December',
                                    ];
                                @endphp

                                @for ($i = 0; $i < 12; $i++)
                                    @php
                                        $id = 12 - $i;
                                        $month = $months[$i % 12];
                                        $year = 2023;
                                        $status = $statuses[array_rand($statuses)];
                                        $employees = rand(40, 120);
                                        $amount = number_format(rand(150000000, 350000000), 0, ',', '.');

                                        // Status color
                                        $statusColor = match ($status) {
                                            'Processed' => 'blue',
                                            'Pending' => 'orange',
                                            'Approved' => 'green',
                                            'Draft' => 'gray',
                                            default => 'secondary',
                                        };
                                    @endphp
                                    <tr>
                                        <td>{{ $month }} {{ $year }}</td>
                                        <td>01-{{ $i + 1 }}-{{ $year }}</td>
                                        <td>
                                            @if (in_array($month, ['April', 'June', 'September', 'November']))
                                                30-{{ $i + 1 }}-{{ $year }}
                                            @elseif($month == 'February')
                                                28-{{ $i + 1 }}-{{ $year }}
                                            @else
                                                31-{{ $i + 1 }}-{{ $year }}
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $statusColor }}">{{ $status }}</span>
                                        </td>
                                        <td>{{ $employees }}</td>
                                        <td>Rp {{ $amount }}</td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('hr.payroll.detail', $id) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                    View
                                                </a>
                                                @if ($status != 'Approved')
                                                    <a href="{{ route('hr.payroll.edit', $id) }}"
                                                        class="btn btn-sm btn-outline-secondary">
                                                        <i class="ti ti-edit"></i>
                                                        Edit
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
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

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Payroll Quick Links</h3>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <a href="{{ route('hr.payroll.components') }}"
                                    class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <i class="ti ti-list text-primary"></i>
                                        </div>
                                        <div class="col">
                                            <div class="text-body d-block">Salary Components</div>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                Manage salary components like basic, allowances, deductions
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('hr.payroll.salary-structure') }}"
                                    class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <i class="ti ti-building text-primary"></i>
                                        </div>
                                        <div class="col">
                                            <div class="text-body d-block">Employee Salary Structure</div>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                Configure salary structures for employees
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('hr.payroll.tax-settings') }}"
                                    class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <i class="ti ti-receipt-tax text-primary"></i>
                                        </div>
                                        <div class="col">
                                            <div class="text-body d-block">Tax Settings</div>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                Configure tax rates and tax calculation settings
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('hr.payroll.payslips') }}"
                                    class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <i class="ti ti-file-invoice text-primary"></i>
                                        </div>
                                        <div class="col">
                                            <div class="text-body d-block">Payslips</div>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                Generate and manage employee payslips
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Payroll Statistics</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-primary text-white avatar">
                                                        <i class="ti ti-users"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        112 Employees
                                                    </div>
                                                    <div class="text-muted">
                                                        On current payroll
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-green text-white avatar">
                                                        <i class="ti ti-cash"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        Rp 320.450.000
                                                    </div>
                                                    <div class="text-muted">
                                                        Total this month
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-info text-white avatar">
                                                        <i class="ti ti-clock"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        2,450 Hours
                                                    </div>
                                                    <div class="text-muted">
                                                        Total overtime
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-warning text-white avatar">
                                                        <i class="ti ti-receipt-tax"></i>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        Rp 42.350.000
                                                    </div>
                                                    <div class="text-muted">
                                                        Total tax withheld
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h4 class="mb-3">Monthly Payroll Trend</h4>
                                <div class="chart-sm">
                                    <div class="chart">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div></div>
                                            </div>
                                        </div>
                                        <canvas height="200" id="chart-payroll-trend" width="0"
                                            class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Payroll trend chart
            const ctx = document.getElementById('chart-payroll-trend').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                    datasets: [{
                        label: 'Total Payroll (in millions Rp)',
                        data: [280, 290, 310, 290, 300, 320, 325, 315, 330, 335, 345, 320],
                        borderColor: '#206bc4',
                        backgroundColor: 'rgba(32, 107, 196, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 250
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>
@endsection
