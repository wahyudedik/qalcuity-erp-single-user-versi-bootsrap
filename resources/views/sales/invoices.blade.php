@extends('layouts.app')

@section('title', 'Invoices & Payments')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Invoices Management
                </h2>
                <div class="text-muted mt-1">Manage all customer invoices</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('sales.payments') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-cash me-2"></i>
                        View Payments
                    </a>
                    <a href="{{ route('sales.invoice.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-plus me-2"></i>
                        Create New Invoice
                    </a>
                    <a href="{{ route('sales.invoice.create') }}" class="btn btn-primary d-sm-none">
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
                <div class="col-md-4">
                    <label class="form-label">Search</label>
                    <input type="text" class="form-control" placeholder="Invoice number, customer...">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Status</label>
                    <select class="form-select">
                        <option value="">All</option>
                        <option value="paid">Paid</option>
                        <option value="unpaid">Unpaid</option>
                        <option value="partial">Partially Paid</option>
                        <option value="overdue">Overdue</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Date From</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Date To</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-2">
                    <label class="form-label"> </label>
                    <button class="btn btn-outline-primary w-100">
                        <i class="ti ti-filter me-1"></i>
                        Apply Filters
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Invoices list -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Invoices</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>Invoice #</th>
                            <th>Customer</th>
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $statuses = ['paid', 'unpaid', 'partial', 'overdue', 'cancelled'];
                            $statusClasses = [
                                'paid' => 'bg-success',
                                'unpaid' => 'bg-warning',
                                'partial' => 'bg-info',
                                'overdue' => 'bg-danger',
                                'cancelled' => 'bg-secondary'
                            ];
                            $customers = [
                                'PT Pembangunan Jaya',
                                'CV Karya Mandiri',
                                'PT Wijaya Konstruksi',
                                'PT Adhi Karya',
                                'PT Waskita Karya',
                                'PT Hutama Karya',
                                'PT Pembangunan Perumahan',
                                'PT Total Bangun Persada'
                            ];
                        @endphp

                        @for ($i = 1; $i <= 15; $i++)
                            @php
                                $invoiceNum = 'INV-' . date('Y') . '-' . str_pad($i, 5, '0', STR_PAD_LEFT);
                                $customer = $customers[array_rand($customers)];
                                $issueDate = date('Y-m-d', strtotime('-' . rand(1, 60) . ' days'));
                                $dueDate = date('Y-m-d', strtotime($issueDate . ' +30 days'));
                                $amount = rand(5000000, 100000000);
                                $status = $statuses[array_rand($statuses)];
                                $statusClass = $statusClasses[$status];
                            @endphp
                            <tr>
                                <td>{{ $invoiceNum }}</td>
                                <td>{{ $customer }}</td>
                                <td>{{ date('d M Y', strtotime($issueDate)) }}</td>
                                <td>{{ date('d M Y', strtotime($dueDate)) }}</td>
                                <td>Rp {{ number_format($amount, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge {{ $statusClass }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('sales.invoice.detail', $i) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <a href="{{ route('sales.invoice.edit', $i) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-success">
                                            <i class="ti ti-printer"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer d-flex align-items-center">
            <p class="m-0 text-muted">Showing <span>1</span> to <span>15</span> of <span>50</span> entries</p>
            <ul class="pagination m-0 ms-auto">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                        <i class="ti ti-chevron-left"></i>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="ti ti-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Summary cards -->
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Total Invoices</div>
                    </div>
                    <div class="h1 mb-3">50</div>
                    <div class="d-flex mb-2">
                        <div>Current Month</div>
                        <div class="ms-auto">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                8% <i class="ti ti-trending-up"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Total Outstanding</div>
                    </div>
                    <div class="h1 mb-3">Rp 450.000.000</div>
                    <div class="d-flex mb-2">
                        <div>Current Month</div>
                        <div class="ms-auto">
                            <span class="text-danger d-inline-flex align-items-center lh-1">
                                12% <i class="ti ti-trending-up"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Overdue Invoices</div>
                    </div>
                    <div class="h1 mb-3">8</div>
                    <div class="d-flex mb-2">
                        <div>Current Month</div>
                        <div class="ms-auto">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                -5% <i class="ti ti-trending-down"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Paid This Month</div>
                    </div>
                    <div class="h1 mb-3">Rp 320.000.000</div>
                    <div class="d-flex mb-2">
                        <div>vs Last Month</div>
                        <div class="ms-auto">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                18% <i class="ti ti-trending-up"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
