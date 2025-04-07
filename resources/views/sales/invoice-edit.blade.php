@extends('layouts.app')

@section('title', 'Edit Invoice')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Edit Invoice #INV-{{ date('Y') }}-{{ str_pad($id, 5, '0', STR_PAD_LEFT) }}
                    </h2>
                    <div class="text-muted mt-1">Update invoice details</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="#" method="post" class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label required">Customer</label>
                                    @php
                                        $customers = [
                                            'PT Pembangunan Jaya',
                                            'CV Karya Mandiri',
                                            'PT Wijaya Konstruksi',
                                            'PT Adhi Karya',
                                            'PT Waskita Karya',
                                            'PT Hutama Karya',
                                            'PT Pembangunan Perumahan',
                                            'PT Total Bangun Persada',
                                        ];
                                        $selectedCustomer = $customers[array_rand($customers)];
                                    @endphp
                                    <select class="form-select" required>
                                        <option value="">Select Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $loop->index + 1 }}"
                                                {{ $customer === $selectedCustomer ? 'selected' : '' }}>
                                                {{ $customer }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Invoice Date</label>
                                    <input type="date" class="form-control"
                                        value="{{ date('Y-m-d', strtotime('-' . rand(1, 30) . ' days')) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Due Date</label>
                                    <input type="date" class="form-control"
                                        value="{{ date('Y-m-d', strtotime('+' . rand(1, 30) . ' days')) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Invoice Number</label>
                                    <input type="text" class="form-control"
                                        value="INV-{{ date('Y') }}-{{ str_pad($id, 5, '0', STR_PAD_LEFT) }}" readonly>
                                    <small class="form-hint">Auto-generated</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Reference</label>
                                    <input type="text" class="form-control"
                                        value="PO-{{ date('Y') }}-{{ str_pad(rand(1000, 9999), 4, '0', STR_PAD_LEFT) }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Project</label>
                                    <select class="form-select">
                                        <option value="">Select Project (Optional)</option>
                                        <option value="1" selected>Pembangunan Gedung A</option>
                                        <option value="2">Pembangunan Gedung B</option>
                                        <option value="3">Pembangunan Jalan Tol</option>
                                        <option value="4">Pembangunan Jembatan</option>
                                        <option value="5">Pembangunan Perumahan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Items</label>
                            <div class="table-responsive">
                                <table class="table table-vcenter" id="items-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 40%">Description</th>
                                            <th style="width: 15%">Quantity</th>
                                            <th style="width: 15%">Unit</th>
                                            <th style="width: 15%">Unit Price (Rp)</th>
                                            <th style="width: 15%">Amount (Rp)</th>
                                            <th style="width: 5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $items = [
                                                [
                                                    'desc' => 'Ready Mix Concrete K-225',
                                                    'unit' => 'm³',
                                                    'qty' => rand(10, 50),
                                                    'price' => 850000,
                                                ],
                                                [
                                                    'desc' => 'Ready Mix Concrete K-300',
                                                    'unit' => 'm³',
                                                    'qty' => rand(10, 50),
                                                    'price' => 950000,
                                                ],
                                                [
                                                    'desc' => 'Concrete Pump Service',
                                                    'unit' => 'hours',
                                                    'qty' => rand(5, 15),
                                                    'price' => 1200000,
                                                ],
                                            ];
                                            $subtotal = 0;
                                        @endphp

                                        @foreach ($items as $index => $item)
                                            @php
                                                $amount = $item['qty'] * $item['price'];
                                                $subtotal += $amount;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="items[{{ $index }}][description]"
                                                        value="{{ $item['desc'] }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control quantity"
                                                        name="items[{{ $index }}][quantity]" min="1"
                                                        value="{{ $item['qty'] }}" onchange="calculateAmount(this)">
                                                </td>
                                                <td>
                                                    <select class="form-select" name="items[{{ $index }}][unit]">
                                                        <option value="m³"
                                                            {{ $item['unit'] === 'm³' ? 'selected' : '' }}>m³</option>
                                                        <option value="hours"
                                                            {{ $item['unit'] === 'hours' ? 'selected' : '' }}>hours
                                                        </option>
                                                        <option value="unit"
                                                            {{ $item['unit'] === 'unit' ? 'selected' : '' }}>unit</option>
                                                        <option value="set"
                                                            {{ $item['unit'] === 'set' ? 'selected' : '' }}>set</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control unit-price"
                                                        name="items[{{ $index }}][unit_price]" min="0"
                                                        value="{{ $item['price'] }}" onchange="calculateAmount(this)">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control amount"
                                                        name="items[{{ $index }}][amount]" readonly
                                                        value="{{ $amount }}">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-icon btn-outline-danger"
                                                        onclick="removeItem(this)">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">
                                                <button type="button" class="btn btn-outline-success w-100"
                                                    onclick="addItem()">
                                                    <i class="ti ti-plus me-1"></i> Add Item
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-end fw-bold">Subtotal</td>
                                            <td>
                                                <input type="number" class="form-control" id="subtotal" readonly
                                                    value="{{ $subtotal }}">
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-end fw-bold">Tax (11%)</td>
                                            <td>
                                                <input type="number" class="form-control" id="tax" readonly
                                                    value="{{ $subtotal * 0.11 }}">
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-end fw-bold">Total</td>
                                            <td>
                                                <input type="number" class="form-control" id="total" readonly
                                                    value="{{ $subtotal * 1.11 }}">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3" placeholder="Additional notes or payment instructions">Payment is due within 30 days. Please include the invoice number on your check or bank transfer. Thank you for your business.</textarea>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <a href="{{ route('sales.invoice.detail', $id) }}" class="btn btn-link">Cancel</a>
                            <button type="submit" class="btn btn-primary ms-auto">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let itemCount = {{ count($items) }};

        function addItem() {
            const tbody = document.querySelector('#items-table tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
            <td>
                <input type="text" class="form-control" name="items[${itemCount}][description]" placeholder="Item description">
            </td>
            <td>
                <input type="number" class="form-control quantity" name="items[${itemCount}][quantity]" min="1" value="1" onchange="calculateAmount(this)">
            </td>
            <td>
                <select class="form-select" name="items[${itemCount}][unit]">
                    <option value="m³">m³</option>
                    <option value="hours">hours</option>
                    <option value="unit">unit</option>
                    <option value="set">set</option>
                </select>
            </td>
            <td>
                <input type="number" class="form-control unit-price" name="items[${itemCount}][unit_price]" min="0" value="0" onchange="calculateAmount(this)">
            </td>
            <td>
                <input type="number" class="form-control amount" name="items[${itemCount}][amount]" readonly value="0">
            </td>
            <td>
                <button type="button" class="btn btn-icon btn-outline-danger" onclick="removeItem(this)">
                    <i class="ti ti-trash"></i>
                </button>
            </td>
        `;
            tbody.appendChild(newRow);
            itemCount++;
        }

        function removeItem(button) {
            const row = button.closest('tr');
            if (document.querySelectorAll('#items-table tbody tr').length > 1) {
                row.remove();
                calculateTotals();
            }
        }

        function calculateAmount(input) {
            const row = input.closest('tr');
            const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
            const unitPrice = parseFloat(row.querySelector('.unit-price').value) || 0;
            const amount = quantity * unitPrice;
            row.querySelector('.amount').value = amount;

            calculateTotals();
        }

        function calculateTotals() {
            const amounts = Array.from(document.querySelectorAll('.amount')).map(el => parseFloat(el.value) || 0);
            const subtotal = amounts.reduce((sum, amount) => sum + amount, 0);
            const tax = subtotal * 0.11;
            const total = subtotal + tax;

            document.getElementById('subtotal').value = subtotal;
            document.getElementById('tax').value = tax;
            document.getElementById('total').value = total;
        }
    </script>
@endsection
