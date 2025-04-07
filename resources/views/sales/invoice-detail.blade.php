@extends('layouts.app')

@section('title', 'Invoice Detail')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Invoice #INV-{{ date('Y') }}-{{ str_pad($id, 5, '0', STR_PAD_LEFT) }}
                    </h2>
                    <div class="text-muted mt-1">Issued on {{ date('d M Y', strtotime('-' . rand(1, 30) . ' days')) }}</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-outline-primary" onclick="window.print()">
                            <i class="ti ti-printer me-1"></i>
                            Print Invoice
                        </a>
                        <a href="{{ route('sales.invoice.edit', $id) }}" class="btn btn-primary">
                            <i class="ti ti-edit me-1"></i>
                            Edit
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical me-1"></i>
                                Actions
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('sales.payment.create') }}">
                                    <i class="ti ti-cash me-1"></i>
                                    Record Payment
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-mail me-1"></i>
                                    Send by Email
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-download me-1"></i>
                                    Download PDF
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#">
                                    <i class="ti ti-trash me-1"></i>
                                    Delete Invoice
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice card -->
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
                        <p class="h3">
                            @php
                                $customers = [
                                    'PT Pembangunan Jaya',
                                    'CV Karya Mandiri',
                                    'PT Wijaya Konstruksi',
                                    'PT Adhi Karya',
                                    'PT Waskita Karya',
                                ];
                                $customer = $customers[array_rand($customers)];
                            @endphp
                            {{ $customer }}
                        </p>
                        <address>
                            Jl. Konstruksi Bangunan No. 456<br>
                            Jakarta Selatan, DKI Jakarta<br>
                            Indonesia, 12870<br>
                            Tax ID: 02.345.678.9-012.000
                        </address>
                    </div>
                    <div class="col-12 my-4">
                        <h1>INVOICE #INV-{{ date('Y') }}-{{ str_pad($id, 5, '0', STR_PAD_LEFT) }}</h1>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-transparent table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 5%">#</th>
                                <th>Description</th>
                                <th class="text-center" style="width: 10%">Qty</th>
                                <th class="text-end" style="width: 15%">Unit Price</th>
                                <th class="text-end" style="width: 15%">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $items = [
                                    ['desc' => 'Ready Mix Concrete K-225', 'unit' => 'm³'],
                                    ['desc' => 'Ready Mix Concrete K-300', 'unit' => 'm³'],
                                    ['desc' => 'Ready Mix Concrete K-350', 'unit' => 'm³'],
                                    ['desc' => 'Ready Mix Concrete K-400', 'unit' => 'm³'],
                                    ['desc' => 'Concrete Pump Service', 'unit' => 'hours'],
                                ];

                                $totalAmount = 0;
                            @endphp

                            @for ($i = 1; $i <= rand(2, 5); $i++)
                                @php
                                    $item = $items[array_rand($items)];
                                    $qty = rand(10, 100);
                                    $unitPrice = rand(800000, 1200000);
                                    $amount = $qty * $unitPrice;
                                    $totalAmount += $amount;
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td>
                                        <p class="strong mb-1">{{ $item['desc'] }}</p>
                                        <div class="text-muted">Project: Pembangunan Gedung {{ chr(64 + $i) }}</div>
                                    </td>
                                    <td class="text-center">
                                        {{ $qty }} {{ $item['unit'] }}
                                    </td>
                                    <td class="text-end">Rp {{ number_format($unitPrice, 0, ',', '.') }}</td>
                                    <td class="text-end">Rp {{ number_format($amount, 0, ',', '.') }}</td>
                                </tr>
                            @endfor

                            <tr>
                                <td colspan="4" class="strong text-end">Subtotal</td>
                                <td class="text-end">Rp {{ number_format($totalAmount, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="strong text-end">PPN 11%</td>
                                <td class="text-end">Rp {{ number_format($totalAmount * 0.11, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="strong text-end">Total</td>
                                <td class="text-end">Rp {{ number_format($totalAmount * 1.11, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row mt-4">
                    <div class="col-6">
                        <p class="h4">Payment Details</p>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tr>
                                    <td class="fw-bold">Bank Account</td>
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
                                    <td class="fw-bold">Payment Terms</td>
                                    <td>Net 30 days</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Due Date</td>
                                    <td>{{ date('d M Y', strtotime('+30 days')) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-6 text-end">
                        <p class="h4">Payment Status</p>
                        @php
                            $statuses = ['paid', 'unpaid', 'partial', 'overdue'];
                            $status = $statuses[array_rand($statuses)];
                            $statusClasses = [
                                'paid' => 'bg-success',
                                'unpaid' => 'bg-warning',
                                'partial' => 'bg-info',
                                'overdue' => 'bg-danger',
                            ];
                            $statusClass = $statusClasses[$status];

                            $paidAmount = 0;
                            if ($status === 'paid') {
                                $paidAmount = $totalAmount * 1.11;
                            } elseif ($status === 'partial') {
                                $paidAmount = $totalAmount * 1.11 * 0.5;
                            }
                        @endphp

                        <span class="badge {{ $statusClass }} fs-5 mb-3">{{ ucfirst($status) }}</span>

                        <div class="table-responsive">
                            <table class="table table-sm text-end">
                                <tr>
                                    <td class="fw-bold">Total Amount</td>
                                    <td>Rp {{ number_format($totalAmount * 1.11, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Paid Amount</td>
                                    <td>Rp {{ number_format($paidAmount, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Remaining</td>
                                    <td>Rp {{ number_format($totalAmount * 1.11 - $paidAmount, 0, ',', '.') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <p class="text-muted">
                        <strong>Note:</strong> Payment is due within 30 days. Please include the invoice number on your
                        check or bank transfer.
                        Thank you for your business.
                    </p>
                </div>
            </div>
        </div>

        <!-- Payment History -->
        @if ($status === 'paid' || $status === 'partial')
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Payment History</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Payment #</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th>Reference</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $methods = ['Bank Transfer', 'Check', 'Cash', 'Credit Card'];
                                    $paymentCount = $status === 'paid' ? rand(1, 2) : 1;
                                @endphp

                                @for ($i = 1; $i <= $paymentCount; $i++)
                                    @php
                                        $paymentNum =
                                            'PAY-' . date('Y') . '-' . str_pad($id * 10 + $i, 5, '0', STR_PAD_LEFT);
                                        $paymentDate = date('Y-m-d', strtotime('-' . rand(1, 15) . ' days'));
                                        $method = $methods[array_rand($methods)];

                                        if ($status === 'paid' && $paymentCount === 1) {
                                            $paymentAmount = $totalAmount * 1.11;
                                        } elseif ($status === 'paid' && $paymentCount === 2) {
                                            $paymentAmount =
                                                $i === 1 ? $totalAmount * 1.11 * 0.7 : $totalAmount * 1.11 * 0.3;
                                        } else {
                                            $paymentAmount = $totalAmount * 1.11 * 0.5;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $paymentNum }}</td>
                                        <td>{{ date('d M Y', strtotime($paymentDate)) }}</td>
                                        <td>Rp {{ number_format($paymentAmount, 0, ',', '.') }}</td>
                                        <td>{{ $method }}</td>
                                        <td>{{ strtoupper(substr(md5($paymentNum), 0, 8)) }}</td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('sales.payment.detail', $id * 10 + $i) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-outline-secondary">
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
            </div>
        @endif

        <!-- Related Documents -->
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Related Documents</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>Document Type</th>
                                <th>Number</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $quoteNum = 'QT-' . date('Y') . '-' . str_pad($id, 5, '0', STR_PAD_LEFT);
                                $contractNum = 'CT-' . date('Y') . '-' . str_pad($id, 5, '0', STR_PAD_LEFT);
                                $doNum = 'DO-' . date('Y') . '-' . str_pad($id, 5, '0', STR_PAD_LEFT);

                                $quoteNum = 'QT-' . date('Y') . '-' . str_pad($id, 5, '0', STR_PAD_LEFT);
                                $contractNum = 'CT-' . date('Y') . '-' . str_pad($id, 5, '0', STR_PAD_LEFT);
                                $doNum = 'DO-' . date('Y') . '-' . str_pad($id, 5, '0', STR_PAD_LEFT);

                                $quoteDate = date('Y-m-d', strtotime('-' . rand(40, 60) . ' days'));
                                $contractDate = date('Y-m-d', strtotime('-' . rand(30, 39) . ' days'));
                                $doDate = date('Y-m-d', strtotime('-' . rand(10, 20) . ' days'));
                            @endphp
                            <tr>
                                <td>Quotation</td>
                                <td>{{ $quoteNum }}</td>
                                <td>{{ date('d M Y', strtotime($quoteDate)) }}</td>
                                <td><span class="badge bg-success">Approved</span></td>
                                <td>
                                    <a href="{{ route('sales.quote.detail', $id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="ti ti-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Contract</td>
                                <td>{{ $contractNum }}</td>
                                <td>{{ date('d M Y', strtotime($contractDate)) }}</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <a href="{{ route('sales.contract.detail', $id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="ti ti-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Delivery Order</td>
                                <td>{{ $doNum }}</td>
                                <td>{{ date('d M Y', strtotime($doDate)) }}</td>
                                <td><span class="badge bg-success">Delivered</span></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        <i class="ti ti-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
