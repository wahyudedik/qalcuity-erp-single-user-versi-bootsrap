@extends('layouts.app')

@section('title', 'Payment Detail')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    @php
                        $paymentNum = 'PAY-' . date('Y') . '-' . str_pad($id, 5, '0', STR_PAD_LEFT);
                        $paymentDate = date('d M Y', strtotime('-' . rand(1, 30) . ' days'));
                        $methods = ['Bank Transfer', 'Check', 'Cash', 'Credit Card'];
                        $method = $methods[array_rand($methods)];
                        $statuses = ['completed', 'pending', 'failed'];
                        $status = $statuses[array_rand($statuses)];
                        $statusClasses = [
                            'completed' => 'bg-success',
                            'pending' => 'bg-warning',
                            'failed' => 'bg-danger',
                        ];
                        $statusClass = $statusClasses[$status];
                        $amount = rand(5000000, 50000000);
                        $invoiceNum = 'INV-' . date('Y') . '-' . str_pad(rand(1, 100), 5, '0', STR_PAD_LEFT);
                        $customers = [
                            'PT Pembangunan Jaya',
                            'CV Karya Mandiri',
                            'PT Wijaya Konstruksi',
                            'PT Adhi Karya',
                            'PT Waskita Karya',
                        ];
                        $customer = $customers[array_rand($customers)];
                    @endphp
                    <h2 class="page-title">
                        Payment #{{ $paymentNum }}
                    </h2>
                    <div class="text-muted mt-1">Received on {{ $paymentDate }}</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-outline-primary" onclick="window.print()">
                            <i class="ti ti-printer me-1"></i>
                            Print Receipt
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical me-1"></i>
                                Actions
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-mail me-1"></i>
                                    Send Receipt by Email
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-download me-1"></i>
                                    Download PDF
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#">
                                    <i class="ti ti-trash me-1"></i>
                                    Delete Payment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment card -->
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <p class="h3">Qalcuity Concrete</p>
                        <address>
                            Jl. Industri Beton No. 123<br>
                            Jakarta Timur, DKI Jakarta<br>
                            Indonesia, 13910<br>
                            Tax ID: 01.234.567.8-901.000
                        </address>
                    </div>
                    <div class="col-6 text-end">
                        <p class="h3">{{ $customer }}</p>
                        <address>
                            Jl. Konstruksi Bangunan No. 456<br>
                            Jakarta Selatan, DKI Jakarta<br>
                            Indonesia, 12870<br>
                            Tax ID: 02.345.678.9-012.000
                        </address>
                    </div>
                    <div class="col-12 my-4">
                        <h1>PAYMENT RECEIPT #{{ $paymentNum }}</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Payment Information</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <tr>
                                            <td class="fw-bold">Payment Date</td>
                                            <td>{{ $paymentDate }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Payment Method</td>
                                            <td>{{ $method }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Reference Number</td>
                                            <td>{{ strtoupper(substr(md5($paymentNum), 0, 8)) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Amount</td>
                                            <td>Rp {{ number_format($amount, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Status</td>
                                            <td>
                                                <span class="badge {{ $statusClass }}">
                                                    {{ ucfirst($status) }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Received By</td>
                                            <td>John Doe (Finance Officer)</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Invoice Information</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <tr>
                                            <td class="fw-bold">Invoice Number</td>
                                            <td>
                                                <a
                                                    href="{{ route('sales.invoice.detail', rand(1, 100)) }}">{{ $invoiceNum }}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Invoice Date</td>
                                            <td>{{ date('d M Y', strtotime('-' . rand(30, 60) . ' days')) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Invoice Amount</td>
                                            <td>Rp {{ number_format($amount + rand(0, 5000000), 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Due Date</td>
                                            <td>{{ date('d M Y', strtotime('-' . rand(1, 15) . ' days')) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Project</td>
                                            <td>Pembangunan Gedung A</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Payment Details</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th class="text-end">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Payment for Invoice #{{ $invoiceNum }}</td>
                                                <td class="text-end">Rp {{ number_format($amount, 0, ',', '.') }}</td>
                                            </tr>
                                            @if ($method === 'Bank Transfer')
                                                <tr>
                                                    <td>Bank Transfer Fee</td>
                                                    <td class="text-end">Rp 0</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td class="fw-bold">Total</td>
                                                <td class="text-end fw-bold">Rp {{ number_format($amount, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($method === 'Bank Transfer')
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Bank Transfer Details</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <tr>
                                                <td class="fw-bold">Bank Name</td>
                                                <td>Bank Mandiri</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Account Number</td>
                                                <td>123-456-7890</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Account Name</td>
                                                <td>PT Qalcuity Concrete Indonesia</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Transfer Date</td>
                                                <td>{{ $paymentDate }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Transfer Reference</td>
                                                <td>{{ strtoupper(substr(md5($paymentNum), 0, 12)) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($method === 'Check')
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Check Details</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <tr>
                                                <td class="fw-bold">Check Number</td>
                                                <td>{{ rand(100000, 999999) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Bank Name</td>
                                                <td>Bank BCA</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Check Date</td>
                                                <td>{{ $paymentDate }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Clearing Date</td>
                                                <td>{{ date('d M Y', strtotime($paymentDate . ' +3 days')) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="mt-4">
                    <p class="text-muted">
                        <strong>Note:</strong> This receipt confirms that payment has been received for the specified
                        invoice.
                        Thank you for your business.
                    </p>
                </div>
            </div>
        </div>

        <!-- Notes and attachments -->
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Notes</h3>
                    </div>
                    <div class="card-body">
                        @if ($status === 'completed')
                            <p>Payment received and processed successfully. Funds have been credited to our account.</p>
                        @elseif($status === 'pending')
                            <p>Payment is being processed by the bank. It may take 1-3 business days to complete.</p>
                        @else
                            <p>Payment failed due to insufficient funds. Please contact the customer to arrange an
                                alternative payment method.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Attachments</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="ti ti-file-invoice me-2 text-muted"></i>
                                <div>
                                    <div>Payment Receipt</div>
                                    <div class="text-muted">PDF, 245 KB</div>
                                </div>
                                <div class="ms-auto">
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        <i class="ti ti-download"></i>
                                    </a>
                                </div>
                            </li>
                            @if ($method === 'Bank Transfer')
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="ti ti-file-description me-2 text-muted"></i>
                                    <div>
                                        <div>Bank Transfer Confirmation</div>
                                        <div class="text-muted">PDF, 180 KB</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    </div>
                                </li>
                            @elseif($method === 'Check')
                                <li class="list-group-item d-flex align-items-center">
                                    <i class="ti ti-file-description me-2 text-muted"></i>
                                    <div>
                                        <div>Check Scan</div>
                                        <div class="text-muted">JPG, 320 KB</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
