@extends('layouts.app')

@section('title', 'Record Payment')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Record New Payment
                    </h2>
                    <div class="text-muted mt-1">Record a payment received from a customer</div>
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
                                    <label class="form-label required">Invoice</label>
                                    <select class="form-select" required>
                                        <option value="">Select Invoice</option>
                                        @for ($i = 1; $i <= 10; $i++)
                                            @php
                                                $invoiceNum =
                                                    'INV-' . date('Y') . '-' . str_pad($i, 5, '0', STR_PAD_LEFT);
                                                $customers = [
                                                    'PT Pembangunan Jaya',
                                                    'CV Karya Mandiri',
                                                    'PT Wijaya Konstruksi',
                                                    'PT Adhi Karya',
                                                    'PT Waskita Karya',
                                                ];
                                                $customer = $customers[array_rand($customers)];
                                                $amount = number_format(rand(5000000, 50000000), 0, ',', '.');
                                            @endphp
                                            <option value="{{ $i }}">{{ $invoiceNum }} - {{ $customer }} -
                                                Rp {{ $amount }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Payment Date</label>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Payment Method</label>
                                    <select class="form-select" id="payment-method" required>
                                        <option value="">Select Payment Method</option>
                                        <option value="bank_transfer">Bank Transfer</option>
                                        <option value="check">Check</option>
                                        <option value="cash">Cash</option>
                                        <option value="credit_card">Credit Card</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Payment Number</label>
                                    <input type="text" class="form-control"
                                        value="PAY-{{ date('Y') }}-{{ str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT) }}"
                                        readonly>
                                    <small class="form-hint">Auto-generated</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control" min="0" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Reference Number</label>
                                    <input type="text" class="form-control"
                                        placeholder="Bank transfer reference, check number, etc.">
                                </div>
                            </div>
                        </div>

                        <!-- Bank Transfer Details (initially hidden) -->
                        <div class="card mb-3 d-none" id="bank-transfer-details">
                            <div class="card-header">
                                <h3 class="card-title">Bank Transfer Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Bank Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Account Number</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Account Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Transfer Date</label>
                                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Check Details (initially hidden) -->
                        <div class="card mb-3 d-none" id="check-details">
                            <div class="card-header">
                                <h3 class="card-title">Check Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Check Number</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Bank Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Check Date</label>
                                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Expected Clearing Date</label>
                                            <input type="date" class="form-control"
                                                value="{{ date('Y-m-d', strtotime('+3 days')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Credit Card Details (initially hidden) -->
                        <div class="card mb-3 d-none" id="credit-card-details">
                            <div class="card-header">
                                <h3 class="card-title">Credit Card Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Card Type</label>
                                            <select class="form-select">
                                                <option value="">Select Card Type</option>
                                                <option value="visa">Visa</option>
                                                <option value="mastercard">Mastercard</option>
                                                <option value="amex">American Express</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Card Number (Last 4 digits)</label>
                                            <input type="text" class="form-control" maxlength="4"
                                                placeholder="1234">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Authorization Code</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Transaction ID</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3" placeholder="Additional notes about this payment"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Attachments</label>
                            <input type="file" class="form-control">
                            <small class="form-hint">Upload payment proof, bank receipt, check scan, etc.</small>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <a href="{{ route('sales.payments') }}" class="btn btn-link">Cancel</a>
                            <button type="submit" class="btn btn-primary ms-auto">Record Payment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentMethodSelect = document.getElementById('payment-method');
            const bankTransferDetails = document.getElementById('bank-transfer-details');
            const checkDetails = document.getElementById('check-details');
            const creditCardDetails = document.getElementById('credit-card-details');

            paymentMethodSelect.addEventListener('change', function() {
                // Hide all payment method details first
                bankTransferDetails.classList.add('d-none');
                checkDetails.classList.add('d-none');
                creditCardDetails.classList.add('d-none');

                // Show the relevant payment method details
                if (this.value === 'bank_transfer') {
                    bankTransferDetails.classList.remove('d-none');
                } else if (this.value === 'check') {
                    checkDetails.classList.remove('d-none');
                } else if (this.value === 'credit_card') {
                    creditCardDetails.classList.remove('d-none');
                }
            });
        });
    </script>
@endsection

