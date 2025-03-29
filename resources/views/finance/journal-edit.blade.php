@extends('layouts.app')

@section('title', 'Edit Jurnal')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Akuntansi & Pembukuan
                    </div>
                    <h2 class="page-title">
                        Edit Jurnal
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('finance.accounting') }}"
                            class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <form action="#" method="post">
                @csrf
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Jurnal</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">No. Jurnal</label>
                                            <input type="text" class="form-control" name="journal_number"
                                                value="JRN-2023-0001" readonly>
                                            <small class="form-hint">Nomor jurnal tidak dapat diubah</small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Tanggal</label>
                                            <input type="date" class="form-control" name="journal_date"
                                                value="2023-08-15">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Referensi</label>
                                            <input type="text" class="form-control" name="reference"
                                                value="TRX-2023-0001">
                                            <small class="form-hint">Nomor transaksi atau dokumen terkait</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Keterangan</label>
                                            <input type="text" class="form-control" name="description"
                                                value="Pembayaran Invoice #INV-2023-0042">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tipe Jurnal</label>
                                            <select class="form-select" name="journal_type">
                                                <option value="general" selected>Jurnal Umum</option>
                                                <option value="adjustment">Jurnal Penyesuaian</option>
                                                <option value="closing">Jurnal Penutup</option>
                                                <option value="reversing">Jurnal Pembalik</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Entri Jurnal</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-vcenter" id="journal-entries">
                                        <thead>
                                            <tr>
                                                <th>Akun</th>
                                                <th>Deskripsi</th>
                                                <th>Debit</th>
                                                <th>Kredit</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select class="form-select" name="accounts[]">
                                                        <option value="">Pilih Akun</option>
                                                        <option value="1-1000" selected>1-1000 - Kas</option>
                                                        <option value="1-1100">1-1100 - Bank BCA</option>
                                                        <option value="1-1200">1-1200 - Piutang Usaha</option>
                                                        <option value="1-1300">1-1300 - Persediaan Bahan Baku</option>
                                                        <option value="4-1000">4-1000 - Pendapatan Penjualan</option>
                                                        <option value="5-1000">5-1000 - Beban Pokok Penjualan</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="entry_descriptions[]"
                                                        value="Pembayaran Invoice #INV-2023-0042">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="debit[]"
                                                        value="125000000" onchange="calculateTotals()">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="credit[]"
                                                        value="0" onchange="calculateTotals()">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-icon btn-sm"
                                                        onclick="removeJournalRow(this)">
                                                        <i class="ti ti-x"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select class="form-select" name="accounts[]">
                                                        <option value="">Pilih Akun</option>
                                                        <option value="1-1000">1-1000 - Kas</option>
                                                        <option value="1-1100">1-1100 - Bank BCA</option>
                                                        <option value="1-1200">1-1200 - Piutang Usaha</option>
                                                        <option value="1-1300">1-1300 - Persediaan Bahan Baku</option>
                                                        <option value="4-1000" selected>4-1000 - Pendapatan Penjualan
                                                        </option>
                                                        <option value="5-1000">5-1000 - Beban Pokok Penjualan</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="entry_descriptions[]"
                                                        value="Pembayaran Invoice #INV-2023-0042">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="debit[]"
                                                        value="0" onchange="calculateTotals()">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="credit[]"
                                                        value="125000000" onchange="calculateTotals()">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-icon btn-sm"
                                                        onclick="removeJournalRow(this)">
                                                        <i class="ti ti-x"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5">
                                                    <button type="button" class="btn btn-sm btn-outline-success"
                                                        onclick="addJournalRow()">
                                                        <i class="ti ti-plus"></i> Tambah Baris
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-end"><strong>Total</strong></td>
                                                <td><strong id="total-debit">Rp 125.000.000</strong></td>
                                                <td><strong id="total-credit">Rp 125.000.000</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr id="balance-warning" class="d-none">
                                                <td colspan="5" class="text-danger">
                                                    <i class="ti ti-alert-circle me-1"></i>
                                                    Jurnal tidak seimbang! Total debit dan kredit harus sama.
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Dokumen Terkait</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Dokumen Terkait</label>
                                    <select class="form-select" name="related_documents[]" multiple>
                                        <option value="INV-2023-0042" selected>Invoice #INV-2023-0042</option>
                                        <option value="TRX-2023-0001" selected>Transaksi #TRX-2023-0001</option>
                                        <option value="PO-2023-0035">Purchase Order #PO-2023-0035</option>
                                        <option value="DO-2023-0028">Delivery Order #DO-2023-0028</option>
                                    </select>
                                    <small class="form-hint">Pilih dokumen yang terkait dengan jurnal ini</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Catatan</label>
                                    <textarea class="form-control" name="notes" rows="3">Jurnal untuk mencatat pembayaran invoice dari pelanggan.</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-footer text-end">
                                <div class="d-flex">
                                    <a href="{{ route('finance.accounting') }}" class="btn btn-link">Batal</a>
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        <i class="ti ti-device-floppy me-1"></i>
                                        Simpan Perubahan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function addJournalRow() {
            const tbody = document.querySelector('#journal-entries tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
            <td>
                <select class="form-select" name="accounts[]">
                    <option value="">Pilih Akun</option>
                    <option value="1-1000">1-1000 - Kas</option>
                    <option value="1-1100">1-1100 - Bank BCA</option>
                    <option value="1-1200">1-1200 - Piutang Usaha</option>
                    <option value="1-1300">1-1300 - Persediaan Bahan Baku</option>
                    <option value="4-1000">4-1000 - Pendapatan Penjualan</option>
                    <option value="5-1000">5-1000 - Beban Pokok Penjualan</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="entry_descriptions[]" value="">
            </td>
            <td>
                <input type="number" class="form-control" name="debit[]" value="0" onchange="calculateTotals()">
            </td>
            <td>
                <input type="number" class="form-control" name="credit[]" value="0" onchange="calculateTotals()">
            </td>
            <td>
                <button type="button" class="btn btn-icon btn-sm" onclick="removeJournalRow(this)">
                    <i class="ti ti-x"></i>
                </button>
            </td>
        `;
            tbody.appendChild(newRow);
            calculateTotals();
        }

        function removeJournalRow(button) {
            const tbody = document.querySelector('#journal-entries tbody');
            if (tbody.children.length > 1) {
                button.closest('tr').remove();
                calculateTotals();
            } else {
                // Don't remove the last row, just clear it
                const row = button.closest('tr');
                row.querySelector('select').value = '';
                row.querySelectorAll('input').forEach(input => input.value = input.name.includes('debit') || input.name
                    .includes('credit') ? '0' : '');
                calculateTotals();
            }
        }

        function calculateTotals() {
            const rows = document.querySelectorAll('#journal-entries tbody tr');
            let totalDebit = 0;
            let totalCredit = 0;

            rows.forEach(row => {
                const debitInput = row.querySelector('input[name="debit[]"]');
                const creditInput = row.querySelector('input[name="credit[]"]');

                totalDebit += parseFloat(debitInput.value || 0);
                totalCredit += parseFloat(creditInput.value || 0);
            });

            document.getElementById('total-debit').textContent = 'Rp ' + totalDebit.toLocaleString('id-ID');
            document.getElementById('total-credit').textContent = 'Rp ' + totalCredit.toLocaleString('id-ID');

            const balanceWarning = document.getElementById('balance-warning');
            if (totalDebit !== totalCredit) {
                balanceWarning.classList.remove('d-none');
            } else {
                balanceWarning.classList.add('d-none');
            }
        }

        // Initialize calculation on page load
        document.addEventListener('DOMContentLoaded', function() {
            calculateTotals();

            // Add event listeners to all debit and credit inputs
            document.querySelectorAll('input[name="debit[]"], input[name="credit[]"]').forEach(input => {
                input.addEventListener('change', calculateTotals);
                input.addEventListener('keyup', calculateTotals);
            });
        });
    </script>
@endsection
