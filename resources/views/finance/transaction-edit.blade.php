@extends('layouts.app')

@section('title', 'Edit Transaksi')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Akuntansi & Pembukuan
                    </div>
                    <h2 class="page-title">
                        Edit Transaksi
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
            <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Transaksi</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">No. Transaksi</label>
                                            <input type="text" class="form-control" name="transaction_number"
                                                value="TRX-2023-0001" readonly>
                                            <small class="form-hint">Nomor transaksi tidak dapat diubah</small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Tanggal Transaksi</label>
                                            <input type="date" class="form-control" name="transaction_date"
                                                value="2023-08-15">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Kategori</label>
                                            <select class="form-select" name="category">
                                                <option value="income" selected>Pendapatan</option>
                                                <option value="expense">Pengeluaran</option>
                                                <option value="transfer">Transfer</option>
                                                <option value="other">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Deskripsi</label>
                                            <input type="text" class="form-control" name="description"
                                                value="Pembayaran Invoice #INV-2023-0042">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-select" name="status">
                                                <option value="completed" selected>Selesai</option>
                                                <option value="pending">Tertunda</option>
                                                <option value="cancelled">Dibatalkan</option>
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
                                <h3 class="card-title">Detail Jurnal</h3>
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
                                                        value="125000000">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="credit[]"
                                                        value="0">
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
                                                        value="0">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="credit[]"
                                                        value="125000000">
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
                                <h3 class="card-title">Catatan & Lampiran</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Catatan</label>
                                    <textarea class="form-control" name="notes" rows="3">Pembayaran diterima melalui transfer bank pada tanggal 15 Agustus 2023. Pembayaran ini merupakan pelunasan untuk invoice #INV-2023-0042 untuk pesanan produk beton siap pakai.</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Lampiran Saat Ini</label>
                                    <div class="row g-2 mb-3">
                                        <div class="col-auto">
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="btn btn-outline-primary">
                                                    <i class="ti ti-file-invoice me-1"></i>
                                                    Bukti Transfer.pdf
                                                </a>
                                                <button type="button" class="btn btn-icon ms-2" title="Hapus lampiran">
                                                    <i class="ti ti-x text-danger"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="btn btn-outline-primary">
                                                    <i class="ti ti-file me-1"></i>
                                                    Invoice-2023-0042.pdf
                                                </a>
                                                <button type="button" class="btn btn-icon ms-2" title="Hapus lampiran">
                                                    <i class="ti ti-x text-danger"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="form-label">Tambah Lampiran Baru</label>
                                    <input type="file" class="form-control" name="attachments[]" multiple>
                                    <small class="form-hint">Anda dapat mengunggah beberapa file sekaligus. Ukuran maksimum
                                        per file: 10MB</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-footer text-end">
                                <div class="d-flex">
                                    <a href="{{ route('finance.accounting') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">Batal</a>
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
