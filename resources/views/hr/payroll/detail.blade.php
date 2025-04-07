@extends('layouts.app')

@section('title', 'Payroll Period Detail')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Payroll Period Detail
                    </h2>
                    <div class="text-muted mt-1">July 2023 Payroll Period</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.payroll.index') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to List
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="ti ti-file"></i>
                                Actions
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-file-export me-2"></i>
                                    Export to Excel
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-printer me-2"></i>
                                    Print Summary
                                </a>
                                <a class="dropdown-item" href="{{ route('hr.payroll.payslips.generate') }}">
                                    <i class="ti ti-file-invoice me-2"></i>
                                    Generate Payslips
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-success" href="#">
                                    <i class="ti ti-check me-2"></i>
                                    Approve Payroll
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Payroll Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar rounded bg-primary text-white">
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <strong>Period:</strong> July 2023
                                        </div>
                                        <div class="text-muted">01-07-2023 to 31-07-2023</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar rounded bg-green text-white">
                                            <i class="ti ti-users"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <strong>Employees:</strong> 112
                                        </div>
                                        <div class="text-muted">Active employees in this period</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar rounded bg-blue text-white">
                                            <i class="ti ti-cash"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <strong>Total Amount:</strong> Rp 320.450.000
                                        </div>
                                        <div class="text-muted">Gross salary for this period</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar rounded bg-yellow text-white">
                                            <i class="ti ti-receipt-tax"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <strong>Tax Withheld:</strong> Rp 42.350.000
                                        </div>
                                        <div class="text-muted">Total tax for this period</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar rounded bg-purple text-white">
                                            <i class="ti ti-building-bank"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <strong>Net Payable:</strong> Rp 278.100.000
                                        </div>
                                        <div class="text-muted">After deductions and taxes</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar rounded bg-red text-white">
                                            <i class="ti ti-clock"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <strong>Overtime Hours:</strong> 2,450
                                        </div>
                                        <div class="text-muted">Total overtime for this period</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar rounded bg-teal text-white">
                                            <i class="ti ti-user-check"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <strong>Status:</strong> <span class="badge bg-blue">Processed</span>
                                        </div>
                                        <div class="text-muted">Processed on 01-08-2023</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Payroll Breakdown</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart-sm">
                                <div class="chart">
                                    <canvas id="payroll-breakdown-chart" height="200"></canvas>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="row g-1 align-items-center">
                                            <div class="col-auto">
                                                <span class="badge bg-primary"></span>
                                            </div>
                                            <div class="col">
                                                Basic Salary
                                            </div>
                                            <div class="col-auto text-muted">
                                                65%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row g-1 align-items-center">
                                            <div class="col-auto">
                                                <span class="badge bg-green"></span>
                                            </div>
                                            <div class="col">
                                                Allowances
                                            </div>
                                            <div class="col-auto text-muted">
                                                15%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row g-1 align-items-center">
                                            <div class="col-auto">
                                                <span class="badge bg-yellow"></span>
                                            </div>
                                            <div class="col">
                                                Overtime
                                            </div>
                                            <div class="col-auto text-muted">
                                                10%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row g-1 align-items-center">
                                            <div class="col-auto">
                                                <span class="badge bg-azure"></span>
                                            </div>
                                            <div class="col">
                                                Bonuses
                                            </div>
                                            <div class="col-auto text-muted">
                                                10%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Employee Payroll Details</h3>
                            <div class="card-actions">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search employee...">
                                    <button type="button" class="btn btn-primary">
                                        <i class="ti ti-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Employee</th>
                                            <th>Position</th>
                                            <th>Basic Salary</th>
                                            <th>Allowances</th>
                                            <th>Overtime</th>
                                            <th>Deductions</th>
                                            <th>Net Salary</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $positions = [
                                                'Production Manager',
                                                'Batch Plant Operator',
                                                'Quality Control',
                                                'Driver',
                                                'Accountant',
                                                'HR Staff',
                                                'Sales Executive',
                                                'Maintenance Engineer',
                                                'Lab Technician',
                                                'Warehouse Supervisor',
                                            ];
                                            $names = [
                                                'Budi Santoso',
                                                'Dewi Lestari',
                                                'Ahmad Hidayat',
                                                'Siti Rahayu',
                                                'Rudi Hermawan',
                                                'Rina Wati',
                                                'Joko Susilo',
                                                'Ani Puspita',
                                                'Dian Pratama',
                                                'Eko Nugroho',
                                                'Maya Sari',
                                                'Agus Setiawan',
                                                'Lina Wijaya',
                                                'Hadi Supriyanto',
                                                'Nina Indah',
                                            ];
                                        @endphp

                                        @for ($i = 0; $i < 10; $i++)
                                            @php
                                                $name = $names[array_rand($names)];
                                                $position = $positions[array_rand($positions)];
                                                $basicSalary = rand(3000000, 15000000);
                                                $allowances = rand(500000, 3000000);
                                                $overtime = rand(200000, 2000000);
                                                $deductions = rand(200000, 1000000);
                                                $netSalary = $basicSalary + $allowances + $overtime - $deductions;

                                                // Format numbers
                                                $basicSalaryFormatted = number_format($basicSalary, 0, ',', '.');
                                                $allowancesFormatted = number_format($allowances, 0, ',', '.');
                                                $overtimeFormatted = number_format($overtime, 0, ',', '.');
                                                $deductionsFormatted = number_format($deductions, 0, ',', '.');
                                                $netSalaryFormatted = number_format($netSalary, 0, ',', '.');
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar me-2"
                                                            style="background-image: url(https://placehold.co/40x40)"></span>
                                                        <div>
                                                            <div>{{ $name }}</div>
                                                            <div class="text-muted">ID: EMP-{{ 1000 + $i }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $position }}</td>
                                                <td>Rp {{ $basicSalaryFormatted }}</td>
                                                <td>Rp {{ $allowancesFormatted }}</td>
                                                <td>Rp {{ $overtimeFormatted }}</td>
                                                <td>Rp {{ $deductionsFormatted }}</td>
                                                <td><strong>Rp {{ $netSalaryFormatted }}</strong></td>
                                                <td>
                                                    <div class="btn-list flex-nowrap">
                                                        <a href="{{ route('hr.payroll.payslips.detail', $i + 1) }}"
                                                            class="btn btn-sm btn-outline-primary">
                                                            <i class="ti ti-file-invoice"></i>
                                                            Payslip
                                                        </a>
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

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Payroll Summary by Department</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Department</th>
                                            <th>Employees</th>
                                            <th>Basic Salary</th>
                                            <th>Allowances</th>
                                            <th>Overtime</th>
                                            <th>Deductions</th>
                                            <th>Net Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $departments = [
                                                'Production',
                                                'Quality Control',
                                                'Logistics',
                                                'Finance',
                                                'HR',
                                                'Sales',
                                                'Maintenance',
                                                'Laboratory',
                                                'Warehouse',
                                                'Administration',
                                            ];
                                        @endphp

                                        @foreach ($departments as $index => $department)
                                            @php
                                                $employees = rand(5, 20);
                                                $basicSalary = rand(20000000, 80000000);
                                                $allowances = rand(5000000, 15000000);
                                                $overtime = rand(2000000, 10000000);
                                                $deductions = rand(2000000, 8000000);
                                                $netSalary = $basicSalary + $allowances + $overtime - $deductions;

                                                // Format numbers
                                                $basicSalaryFormatted = number_format($basicSalary, 0, ',', '.');
                                                $allowancesFormatted = number_format($allowances, 0, ',', '.');
                                                $overtimeFormatted = number_format($overtime, 0, ',', '.');
                                                $deductionsFormatted = number_format($deductions, 0, ',', '.');
                                                $netSalaryFormatted = number_format($netSalary, 0, ',', '.');
                                            @endphp
                                            <tr>
                                                <td>{{ $department }}</td>
                                                <td>{{ $employees }}</td>
                                                <td>Rp {{ $basicSalaryFormatted }}</td>
                                                <td>Rp {{ $allowancesFormatted }}</td>
                                                <td>Rp {{ $overtimeFormatted }}</td>
                                                <td>Rp {{ $deductionsFormatted }}</td>
                                                <td><strong>Rp {{ $netSalaryFormatted }}</strong></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
            // Payroll breakdown chart
            const ctx = document.getElementById('payroll-breakdown-chart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Basic Salary', 'Allowances', 'Overtime', 'Bonuses'],
                    datasets: [{
                        data: [65, 15, 10, 10],
                        backgroundColor: [
                            '#206bc4',
                            '#4ecc48',
                            '#fab005',
                            '#45aaf2'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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
