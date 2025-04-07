@extends('layouts.app')

@section('title', 'Create Invoice')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Create New Invoice
                    </h2>
                    <div class="text-muted mt-1">Generate a new invoice for a customer</div>
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
                                    <select class="form-select" required>
                                        <option value="">Select Customer</option>
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
                                        @endphp
                                        @foreach ($customers as $customer)
                                            <option value="{{ $loop->index + 1 }}">{{ $customer }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Invoice Date</label>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Due Date</label>
                                    <input type="date" class="form-control"
                                        value="{{ date('Y-m-d', strtotime('+30 days')) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Invoice Number</label>
                                    <input type="text" class="form-control"
                                        value="INV-{{ date('Y') }}-{{ str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT) }}"
                                        readonly>
                                    <small class="form-hint">Auto-generated</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Reference</label>
                                    <input type="text" class="form-control"
                                        placeholder="PO number, contract number, etc.">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Project</label>
                                    <select class="form-select">
                                        <option value="">Select Project (Optional)</option>
                                        <option value="1">Pembangunan Gedung A</option>
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
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="items[0][description]"
                                                    placeholder="Item description">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control quantity"
                                                    name="items[0][quantity]" min="1" value="1"
                                                    onchange="calculateAmount(this)">
                                            </td>
                                            <td>
                                                <select class="form-select" name="items[0][unit]">
                                                    <option value="m³">m³</option>
                                                    <option value="hours">hours</option>
                                                    <option value="unit">unit</option>
                                                    <option value="set">set</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control unit-price"
                                                    name="items[0][unit_price]" min="0" value="0"
                                                    onchange="calculateAmount(this)">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control amount" name="items[0][amount]"
                                                    readonly value="0">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-icon btn-outline-danger"
                                                    onclick="removeItem(this)">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
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
                                                    value="0">
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-end fw-bold">Tax (11%)</td>
                                            <td>
                                                <input type="number" class="form-control" id="tax" readonly
                                                    value="0">
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-end fw-bold">Total</td>
                                            <td>
                                                <input type="number" class="form-control" id="total" readonly
                                                    value="0">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3" placeholder="Additional notes or payment instructions"></textarea>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <a href="{{ route('sales.invoices') }}" class="btn btn-link">Cancel</a>
                            <button type="submit" class="btn btn-primary ms-auto">Create Invoice</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let itemCount = 1;

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

