@extends('layouts.app')

@section('title', 'Buat Penawaran Baru')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Buat Penawaran Baru
                    </h2>
                    <div class="text-muted mt-1 mb-2">Formulir pembuatan penawaran baru</div>
                </div>
            </div>
        </div>

        <form action="#" method="post">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Dasar</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Nomor Penawaran</label>
                                    <input type="text" class="form-control"
                                        value="Q-2023-{{ str_pad(rand(1, 999), 4, '0', STR_PAD_LEFT) }}" readonly>
                                    <small class="form-hint">Nomor penawaran dibuat otomatis oleh sistem</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Tanggal Penawaran</label>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Berlaku Hingga</label>
                                    <input type="date" class="form-control"
                                        value="{{ date('Y-m-d', strtotime('+30 days')) }}" required>
                                    <small class="form-hint">Standar masa berlaku 30 hari</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Referensi</label>
                                    <input type="text" class="form-control" placeholder="Nomor RFQ/Permintaan">
                                    <small class="form-hint">Nomor referensi dari pelanggan (opsional)</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Pelanggan</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Pelanggan</label>
                                <select class="form-select" required>
                                    <option value="">Pilih Pelanggan</option>
                                    <option value="1">PT Pembangunan Jaya</option>
                                    <option value="2">PT Wijaya Karya</option>
                                    <option value="3">PT Adhi Karya</option>
                                    <option value="4">PT Hutama Karya</option>
                                    <option value="5">PT Nindya Karya</option>
                                    <option value="6">PT Semen Indonesia</option>
                                    <option value="7">PT Holcim Indonesia</option>
                                    <option value="8">PT Indocement</option>
                                </select>
                                <small class="form-hint">
                                    <a href="{{ route('sales.customer.create') }}" target="_blank">
                                        <i class="ti ti-plus"></i> Tambah pelanggan baru
                                    </a>
                                </small>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Kontak</label>
                                    <select class="form-select" required>
                                        <option value="">Pilih Kontak</option>
                                        <option value="1">Budi Santoso (Procurement Manager)</option>
                                        <option value="2">Andi Wijaya (Project Manager)</option>
                                        <option value="3">Siti Rahayu (Finance Director)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="budi.santoso@pembangunanjaya.co.id"
                                        readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Telepon</label>
                                    <input type="text" class="form-control" value="+62 812-3456-7890" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Alamat Pengiriman</label>
                                    <select class="form-select">
                                        <option value="1">Alamat Utama - Jl. Gatot Subroto No. 123, Jakarta Selatan
                                        </option>
                                        <option value="2">Lokasi Proyek - Jl. Sudirman No. 45, Jakarta Pusat</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Proyek</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Nama Proyek</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama proyek" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Lokasi</label>
                                    <input type="text" class="form-control" placeholder="Lokasi proyek" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Jenis Konstruksi</label>
                                    <select class="form-select">
                                        <option value="">Pilih Jenis Konstruksi</option>
                                        <option value="gedung">Gedung</option>
                                        <option value="jalan">Jalan</option>
                                        <option value="jembatan">Jembatan</option>
                                        <option value="bendungan">Bendungan</option>
                                        <option value="perumahan">Perumahan</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Estimasi Durasi</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Durasi">
                                        <select class="form-select">
                                            <option value="hari">Hari</option>
                                            <option value="minggu">Minggu</option>
                                            <option value="bulan" selected>Bulan</option>
                                            <option value="tahun">Tahun</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Item Penawaran</h3>
                            <button type="button" class="btn btn-sm btn-primary" id="add-item">
                                <i class="ti ti-plus"></i> Tambah Item
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter" id="items-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No.</th>
                                            <th style="width: 25%">Deskripsi</th>
                                            <th style="width: 20%">Spesifikasi</th>
                                            <th style="width: 10%">Kuantitas</th>
                                            <th style="width: 10%">Satuan</th>
                                            <th style="width: 15%">Harga Satuan</th>
                                            <th style="width: 15%">Total</th>
                                            <th style="width: 5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="item-row">
                                            <td>1</td>
                                            <td>
                                                <select class="form-select product-select">
                                                    <option value="">Pilih Produk</option>
                                                    <option value="beton-k350">Beton Ready Mix K-350</option>
                                                    <option value="beton-k300">Beton Ready Mix K-300</option>
                                                    <option value="beton-k250">Beton Ready Mix K-250</option>
                                                    <option value="beton-k225">Beton Ready Mix K-225</option>
                                                    <option value="pompa">Jasa Pompa Beton</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="Spesifikasi"
                                                    value="Slump 12±2, Ukuran Agregat Max 20mm">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control quantity" value="0"
                                                    min="0">
                                            </td>
                                            <td>
                                                <select class="form-select unit">
                                                    <option value="m3">m³</option>
                                                    <option value="unit">Unit</option>
                                                    <option value="hari">Hari</option>
                                                    <option value="jam">Jam</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" class="form-control price" value="0">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" class="form-control subtotal" value="0"
                                                        readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-sm btn-icon btn-outline-danger remove-item">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td class="text-end"><strong>Subtotal:</strong></td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" class="form-control" id="subtotal"
                                                        value="0" readonly>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td class="text-end">
                                                <div class="input-group">
                                                    <span class="input-group-text">Diskon</span>
                                                    <input type="number" class="form-control" id="discount-percent"
                                                        value="0" min="0" max="100">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" class="form-control" id="discount-amount"
                                                        value="0" readonly>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td class="text-end">
                                                <div class="input-group">
                                                    <span class="input-group-text">PPN</span>
                                                    <input type="number" class="form-control" id="tax-percent"
                                                        value="11" min="0" max="100">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" class="form-control" id="tax-amount"
                                                        value="0" readonly>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td class="text-end"><strong>Total:</strong></td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" class="form-control" id="grand-total"
                                                        value="0" readonly>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Syarat dan Ketentuan</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <textarea class="form-control" rows="6">1. Harga berlaku untuk pengiriman dalam radius 25 km dari batching plant.
2. Biaya tambahan akan dikenakan untuk pengiriman di luar radius tersebut.
3. Minimal pemesanan 5 m³ per pengiriman.
4. Waktu tunggu maksimal di lokasi proyek adalah 2 jam, setelahnya akan dikenakan biaya tambahan.
5. Pembayaran dilakukan dengan uang muka 30% dan pelunasan sesuai progress pengiriman.
6. Penawaran ini berlaku selama 30 hari sejak tanggal penerbitan.
7. Jadwal pengiriman harus dikonfirmasi minimal 2 hari sebelumnya.
8. Pembatalan pesanan harus dilakukan minimal 24 jam sebelum jadwal pengiriman.</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Catatan Internal</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <textarea class="form-control" rows="3"
                                    placeholder="Catatan internal yang tidak akan ditampilkan ke pelanggan"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Tindakan</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-selectgroup">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="status" value="draft"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Draft</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="status" value="sent"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">Kirim</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sales</label>
                                <select class="form-select">
                                    <option value="1" selected>Ahmad Fauzi</option>
                                    <option value="2">Dewi Susanti</option>
                                    <option value="3">Rudi Hermawan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Metode Pengiriman</label>
                                <select class="form-select">
                                    <option value="email" selected>Email</option>
                                    <option value="print">Cetak</option>
                                    <option value="both">Email & Cetak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Lampiran</div>
                                <input type="file" class="form-control" multiple>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('sales.quotes-contracts') }}" class="btn btn-outline-secondary">
                                Batal
                            </a>
                            <div>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    <i class="ti ti-device-floppy me-2"></i>Simpan Penawaran
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Riwayat Pelanggan</h3>
                        </div>
                        <div class="card-body">
                            <div class="divide-y">
                                <div class="d-flex py-2">
                                    <div class="flex-grow-1">
                                        <div class="text-truncate">
                                            <strong>Penawaran Terakhir:</strong> Q-2023-0001
                                        </div>
                                        <div class="text-muted">15 Oktober 2023</div>
                                    </div>
                                    <div>
                                        <span class="badge bg-success">Disetujui</span>
                                    </div>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="flex-grow-1">
                                        <div class="text-truncate">
                                            <strong>Kontrak Aktif:</strong> 2 kontrak
                                        </div>
                                        <div class="text-muted">Total Rp 350.000.000</div>
                                    </div>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="flex-grow-1">
                                        <div class="text-truncate">
                                            <strong>Status Pembayaran:</strong>
                                        </div>
                                        <div class="text-muted">Lancar</div>
                                    </div>
                                    <div>
                                        <span class="badge bg-success">Baik</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Produk Populer</h3>
                        </div>
                        <div class="card-body">
                            <div class="divide-y">
                                <div class="d-flex py-2">
                                    <div class="flex-grow-1">
                                        <div class="text-truncate">
                                            Beton Ready Mix K-350
                                        </div>
                                        <div class="text-muted">Rp 1.100.000/m³</div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-outline-primary add-popular-item"
                                            data-product="beton-k350">
                                            <i class="ti ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="flex-grow-1">
                                        <div class="text-truncate">
                                            Beton Ready Mix K-300
                                        </div>
                                        <div class="text-muted">Rp 950.000/m³</div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-outline-primary add-popular-item"
                                            data-product="beton-k300">
                                            <i class="ti ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="flex-grow-1">
                                        <div class="text-truncate">
                                            Jasa Pompa Beton
                                        </div>
                                        <div class="text-muted">Rp 3.500.000/hari</div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-outline-primary add-popular-item"
                                            data-product="pompa">
                                            <i class="ti ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Product data
            const products = {
                'beton-k350': {
                    name: 'Beton Ready Mix K-350',
                    spec: 'Slump 12±2, Ukuran Agregat Max 20mm',
                    price: 1100000,
                    unit: 'm3'
                },
                'beton-k300': {
                    name: 'Beton Ready Mix K-300',
                    spec: 'Slump 12±2, Ukuran Agregat Max 20mm',
                    price: 950000,
                    unit: 'm3'
                },
                'beton-k250': {
                    name: 'Beton Ready Mix K-250',
                    spec: 'Slump 12±2, Ukuran Agregat Max 20mm',
                    price: 850000,
                    unit: 'm3'
                },
                'beton-k225': {
                    name: 'Beton Ready Mix K-225',
                    spec: 'Slump 12±2, Ukuran Agregat Max 20mm',
                    price: 800000,
                    unit: 'm3'
                },
                'pompa': {
                    name: 'Jasa Pompa Beton',
                    spec: 'Termasuk Operator dan Bahan Bakar',
                    price: 3500000,
                    unit: 'hari'
                }
            };

            // Format number as currency
            function formatCurrency(number) {
                return new Intl.NumberFormat('id-ID').format(number);
            }

            // Calculate row total
            function calculateRowTotal(row) {
                const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
                const price = parseFloat(row.querySelector('.price').value.replace(/\./g, '').replace(',', '.')) ||
                    0;
                const total = quantity * price;
                row.querySelector('.subtotal').value = formatCurrency(total);
                return total;
            }

            // Calculate all totals
            function calculateTotals() {
                let subtotal = 0;
                document.querySelectorAll('.item-row').forEach(row => {
                    subtotal += calculateRowTotal(row);
                });

                document.getElementById('subtotal').value = formatCurrency(subtotal);

                const discountPercent = parseFloat(document.getElementById('discount-percent').value) || 0;
                const discountAmount = subtotal * (discountPercent / 100);
                document.getElementById('discount-amount').value = formatCurrency(discountAmount);

                const taxPercent = parseFloat(document.getElementById('tax-percent').value) || 0;
                const taxableAmount = subtotal - discountAmount;
                const taxAmount = taxableAmount * (taxPercent / 100);
                document.getElementById('tax-amount').value = formatCurrency(taxAmount);

                const grandTotal = taxableAmount + taxAmount;
                document.getElementById('grand-total').value = formatCurrency(grandTotal);
            }

            // Add new item row
            function addItemRow() {
                const tbody = document.querySelector('#items-table tbody');
                const rowCount = tbody.querySelectorAll('tr').length + 1;

                const newRow = document.createElement('tr');
                newRow.className = 'item-row';
                newRow.innerHTML = `
                <td>${rowCount}</td>
                <td>
                    <select class="form-select product-select">
                        <option value="">Pilih Produk</option>
                        <option value="beton-k350">Beton Ready Mix K-350</option>
                        <option value="beton-k300">Beton Ready Mix K-300</option>
                        <option value="beton-k250">Beton Ready Mix K-250</option>
                        <option value="beton-k225">Beton Ready Mix K-225</option>
                        <option value="pompa">Jasa Pompa Beton</option>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" placeholder="Spesifikasi">
                </td>
                <td>
                    <input type="number" class="form-control quantity" value="0" min="0">
                </td>
                <td>
                    <select class="form-select unit">
                        <option value="m3">m³</option>
                        <option value="unit">Unit</option>
                        <option value="hari">Hari</option>
                        <option value="jam">Jam</option>
                    </select>
                </td>
                <td>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" class="form-control price" value="0">
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" class="form-control subtotal" value="0" readonly>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-icon btn-outline-danger remove-item">
                        <i class="ti ti-trash"></i>
                    </button>
                </td>
            `;

                tbody.appendChild(newRow);
                setupEventListeners(newRow);
                renumberRows();
            }

            // Remove item row
            function removeItemRow(button) {
                const row = button.closest('tr');
                row.remove();
                renumberRows();
                calculateTotals();
            }

            // Renumber rows
            function renumberRows() {
                document.querySelectorAll('#items-table tbody tr').forEach((row, index) => {
                    row.cells[0].textContent = index + 1;
                });
            }

            // Setup event listeners for a row
            function setupEventListeners(row) {
                // Product select change
                row.querySelector('.product-select').addEventListener('change', function() {
                    const productId = this.value;
                    if (productId && products[productId]) {
                        const product = products[productId];
                        row.querySelector('input[placeholder="Spesifikasi"]').value = product.spec;
                        row.querySelector('.price').value = formatCurrency(product.price);

                        // Set unit
                        const unitSelect = row.querySelector('.unit');
                        for (let i = 0; i < unitSelect.options.length; i++) {
                            if (unitSelect.options[i].value === product.unit) {
                                unitSelect.selectedIndex = i;
                                break;
                            }
                        }

                        calculateTotals();
                    }
                });

                // Quantity change
                row.querySelector('.quantity').addEventListener('input', calculateTotals);

                // Price change
                row.querySelector('.price').addEventListener('input', calculateTotals);

                // Remove button
                row.querySelector('.remove-item').addEventListener('click', function() {
                    removeItemRow(this);
                });
            }

            // Add item button
            document.getElementById('add-item').addEventListener('click', addItemRow);

            // Add popular item buttons
            document.querySelectorAll('.add-popular-item').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product');
                    const tbody = document.querySelector('#items-table tbody');
                    const lastRow = tbody.querySelector('tr:last-child');

                    // Check if last row is empty
                    const lastRowProduct = lastRow.querySelector('.product-select').value;
                    if (!lastRowProduct) {
                        // Use the last row
                        const productSelect = lastRow.querySelector('.product-select');
                        productSelect.value = productId;
                        productSelect.dispatchEvent(new Event('change'));
                        lastRow.querySelector('.quantity').value = 1;
                        calculateTotals();
                    } else {
                        // Add new row
                        addItemRow();
                        const newRow = tbody.querySelector('tr:last-child');
                        const productSelect = newRow.querySelector('.product-select');
                        productSelect.value = productId;
                        productSelect.dispatchEvent(new Event('change'));
                        newRow.querySelector('.quantity').value = 1;
                        calculateTotals();
                    }
                });
            });

            // Discount and tax changes
            document.getElementById('discount-percent').addEventListener('input', calculateTotals);
            document.getElementById('tax-percent').addEventListener('input', calculateTotals);

            // Setup initial row
            setupEventListeners(document.querySelector('.item-row'));
        });
    </script>
@endsection
