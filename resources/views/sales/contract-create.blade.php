@extends('layouts.app')

@section('title', 'Buat Kontrak Baru')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none mt-1 mb-2">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Buat Kontrak Baru
                    </h2>
                    <div class="text-muted mt-1 mb-2">Formulir pembuatan kontrak baru</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('sales.quotes-contracts') }}"
                            class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left me-2"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <form action="#" method="post">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Kontrak</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Nomor Kontrak</label>
                                    <input type="text" class="form-control"
                                        value="C-2023-{{ str_pad(rand(1, 999), 4, '0', STR_PAD_LEFT) }}" readonly>
                                    <small class="form-hint">Nomor kontrak dibuat otomatis oleh sistem</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nomor Penawaran</label>
                                    <select class="form-select">
                                        <option value="">Pilih Penawaran (Opsional)</option>
                                        <option value="Q-2023-0012">Q-2023-0012 - PT Wijaya Karya</option>
                                        <option value="Q-2023-0011">Q-2023-0011 - PT Adhi Karya</option>
                                        <option value="Q-2023-0010">Q-2023-0010 - PT Total Bangun Persada</option>
                                    </select>
                                    <small class="form-hint">Jika dipilih, data dari penawaran akan diisi otomatis</small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Tanggal Mulai</label>
                                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Tanggal Berakhir</label>
                                    <input type="date" class="form-control"
                                        value="{{ date('Y-m-d', strtotime('+6 months')) }}" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Durasi</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" value="6" min="1">
                                        <select class="form-select">
                                            <option value="hari">Hari</option>
                                            <option value="minggu">Minggu</option>
                                            <option value="bulan" selected>Bulan</option>
                                            <option value="tahun">Tahun</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Sales</label>
                                    <select class="form-select">
                                        <option value="1">Ahmad Fauzi</option>
                                        <option value="2" selected>Dewi Susanti</option>
                                        <option value="3">Rudi Hermawan</option>
                                    </select>
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
                                    <option value="4">PT Total Bangun Persada</option>
                                    <option value="5">PT Hutama Karya</option>
                                    <option value="6">PT Nusa Konstruksi Enjiniring</option>
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
                                    </select>
                                    <small class="form-hint">Kontak akan tersedia setelah memilih pelanggan</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Telepon</label>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Alamat Pengiriman</label>
                                    <select class="form-select">
                                        <option value="">Pilih Alamat</option>
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
                                    <label class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" placeholder="Lokasi proyek">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Jenis Konstruksi</label>
                                    <select class="form-select">
                                        <option value="gedung" selected>Gedung</option>
                                        <option value="jalan">Jalan</option>
                                        <option value="jembatan">Jembatan</option>
                                        <option value="bendungan">Bendungan</option>
                                        <option value="perumahan">Perumahan</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Item Kontrak</h3>
                            <button type="button" class="btn btn-sm btn-primary" id="add-item">
                                <i class="ti ti-plus me-2"></i>Tambah Item
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
                                                <input type="text" class="form-control" placeholder="Spesifikasi">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control quantity" value="0"
                                                    min="0">
                                            </td>
                                            <td>
                                                <select class="form-select unit">
                                                    <option value="m3" selected>m³</option>
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
6. Jadwal pengiriman harus dikonfirmasi minimal 2 hari sebelumnya.
7. Pembatalan pesanan harus dilakukan minimal 24 jam sebelum jadwal pengiriman.
8. Kontrak ini berlaku selama 6 bulan sejak tanggal penandatanganan.</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Dokumen Terkait</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="form-label">Dokumen Kontrak</div>
                                <input type="file" class="form-control">
                                <small class="form-hint">Format file: PDF, DOC, DOCX. Ukuran maksimal: 5MB</small>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Spesifikasi Teknis</div>
                                <input type="file" class="form-control">
                                <small class="form-hint">Format file: PDF, DOC, DOCX. Ukuran maksimal: 5MB</small>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Jadwal Pengiriman</div>
                                <input type="file" class="form-control">
                                <small class="form-hint">Format file: PDF, XLS, XLSX. Ukuran maksimal: 5MB</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Status Kontrak</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    <option value="draft" selected>Draft</option>
                                    <option value="pending">Menunggu Persetujuan</option>
                                    <option value="active">Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Penandatanganan</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ditandatangani Oleh (Pelanggan)</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jabatan</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Pembayaran</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Metode Pembayaran</label>
                                <select class="form-select">
                                    <option value="transfer" selected>Transfer Bank</option>
                                    <option value="cash">Tunai</option>
                                    <option value="check">Cek/Giro</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Syarat Pembayaran</label>
                                <select class="form-select">
                                    <option value="advance">Uang Muka</option>
                                    <option value="net15">Net 15 Hari</option>
                                    <option value="net30" selected>Net 30 Hari</option>
                                    <option value="net45">Net 45 Hari</option>
                                    <option value="net60">Net 60 Hari</option>
                                    <option value="cod">Cash on Delivery</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Uang Muka (%)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" value="30" min="0"
                                        max="100">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah Uang Muka</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" value="0" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Jadwal Pengiriman</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Mulai Pengiriman</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Frekuensi Pengiriman</label>
                                <select class="form-select">
                                    <option value="daily">Harian</option>
                                    <option value="weekly" selected>Mingguan</option>
                                    <option value="biweekly">Dua Mingguan</option>
                                    <option value="monthly">Bulanan</option>
                                    <option value="custom">Kustom</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Estimasi Durasi Pengiriman</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" value="24" min="1">
                                    <select class="form-select">
                                        <option value="days">Hari</option>
                                        <option value="weeks" selected>Minggu</option>
                                        <option value="months">Bulan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="schedule-confirmation">
                                <label class="form-check-label" for="schedule-confirmation">
                                    Jadwal pengiriman telah dikonfirmasi dengan pelanggan
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Catatan Internal</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <textarea class="form-control" rows="4"
                                    placeholder="Tambahkan catatan internal yang tidak akan terlihat oleh pelanggan..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('sales.quotes-contracts') }}" class="btn btn-outline-secondary">
                            <i class="ti ti-x me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-device-floppy me-2"></i>Simpan Kontrak
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Product data (simulated database)
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

            // Customer data (simulated database)
            const customers = {
                '1': {
                    name: 'PT Pembangunan Jaya',
                    contacts: [{
                            id: '1',
                            name: 'Budi Santoso',
                            position: 'Procurement Manager',
                            email: 'budi.santoso@pembangunanjaya.co.id',
                            phone: '+62 812-3456-7890'
                        },
                        {
                            id: '2',
                            name: 'Andi Wijaya',
                            position: 'Project Manager',
                            email: 'andi.wijaya@pembangunanjaya.co.id',
                            phone: '+62 813-9876-5432'
                        },
                        {
                            id: '3',
                            name: 'Siti Rahayu',
                            position: 'Finance',
                            email: 'siti.rahayu@pembangunanjaya.co.id',
                            phone: '+62 857-1234-5678'
                        }
                    ],
                    addresses: [{
                            id: '1',
                            name: 'Kantor Pusat',
                            address: 'Jl. Gatot Subroto Kav. 35-36, Jakarta Selatan'
                        },
                        {
                            id: '2',
                            name: 'Proyek Jaya Tower',
                            address: 'Jl. Thamrin No. 10, Jakarta Pusat'
                        }
                    ]
                },
                '2': {
                    name: 'PT Wijaya Karya',
                    contacts: [{
                            id: '1',
                            name: 'Hendra Gunawan',
                            position: 'Procurement Manager',
                            email: 'hendra.gunawan@wika.co.id',
                            phone: '+62 812-8765-4321'
                        },
                        {
                            id: '2',
                            name: 'Dewi Lestari',
                            position: 'Project Manager',
                            email: 'dewi.lestari@wika.co.id',
                            phone: '+62 813-2345-6789'
                        }
                    ],
                    addresses: [{
                            id: '1',
                            name: 'Kantor Pusat',
                            address: 'Jl. DI Panjaitan Kav. 9-10, Jakarta Timur'
                        },
                        {
                            id: '2',
                            name: 'Proyek Wika Tower',
                            address: 'Jl. Sudirman Kav. 32, Jakarta Selatan'
                        }
                    ]
                },
                '3': {
                    name: 'PT Adhi Karya',
                    contacts: [{
                            id: '1',
                            name: 'Bambang Sutrisno',
                            position: 'Procurement Manager',
                            email: 'bambang.sutrisno@adhikarya.co.id',
                            phone: '+62 812-1122-3344'
                        },
                        {
                            id: '2',
                            name: 'Ratna Sari',
                            position: 'Project Manager',
                            email: 'ratna.sari@adhikarya.co.id',
                            phone: '+62 813-5566-7788'
                        }
                    ],
                    addresses: [{
                            id: '1',
                            name: 'Kantor Pusat',
                            address: 'Jl. Raya Pasar Minggu KM.18, Jakarta Selatan'
                        },
                        {
                            id: '2',
                            name: 'Proyek Adhi Tower',
                            address: 'Jl. Rasuna Said Kav. 5, Jakarta Selatan'
                        }
                    ]
                }
            };

            // Format currency
            function formatCurrency(number) {
                return new Intl.NumberFormat('id-ID').format(number);
            }

            // Parse currency string to number
            function parseCurrency(currencyString) {
                return parseFloat(currencyString.replace(/\./g, '').replace(',', '.')) || 0;
            }

            // Calculate totals
            function calculateTotals() {
                let subtotal = 0;

                // Calculate each row subtotal
                document.querySelectorAll('.item-row').forEach(row => {
                    const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
                    const priceStr = row.querySelector('.price').value;
                    const price = parseCurrency(priceStr);
                    const rowSubtotal = quantity * price;

                    row.querySelector('.subtotal').value = formatCurrency(rowSubtotal);
                    subtotal += rowSubtotal;
                });

                // Update subtotal
                document.getElementById('subtotal').value = formatCurrency(subtotal);

                // Calculate discount
                const discountPercent = parseFloat(document.getElementById('discount-percent').value) || 0;
                const discountAmount = subtotal * (discountPercent / 100);
                document.getElementById('discount-amount').value = formatCurrency(discountAmount);

                // Calculate tax
                const taxPercent = parseFloat(document.getElementById('tax-percent').value) || 0;
                const taxableAmount = subtotal - discountAmount;
                const taxAmount = taxableAmount * (taxPercent / 100);
                document.getElementById('tax-amount').value = formatCurrency(taxAmount);

                // Calculate grand total
                const grandTotal = taxableAmount + taxAmount;
                document.getElementById('grand-total').value = formatCurrency(grandTotal);

                // Update advance payment amount
                const advancePercent = parseFloat(document.querySelector('input[type="number"][min="0"][max="100"]')
                    .value) || 0;
                const advanceAmount = grandTotal * (advancePercent / 100);
                document.querySelector('input[readonly][value="0"]').value = formatCurrency(advanceAmount);
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
                        <option value="m3" selected>m³</option>
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
                setupRowEventListeners(newRow);
                calculateTotals();
            }

            // Setup event listeners for a row
            function setupRowEventListeners(row) {
                // Product select change
                const productSelect = row.querySelector('.product-select');
                productSelect.addEventListener('change', function() {
                    const selectedProduct = products[this.value];
                    if (selectedProduct) {
                        row.querySelector('td:nth-child(3) input').value = selectedProduct.spec;
                        row.querySelector('.price').value = formatCurrency(selectedProduct.price);

                        const unitSelect = row.querySelector('.unit');
                        for (let i = 0; i < unitSelect.options.length; i++) {
                            if (unitSelect.options[i].value === selectedProduct.unit) {
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

                // Remove item button
                row.querySelector('.remove-item').addEventListener('click', function() {
                    row.remove();
                    renumberRows();
                    calculateTotals();
                });
            }

            // Renumber rows
            function renumberRows() {
                document.querySelectorAll('#items-table tbody tr').forEach((row, index) => {
                    row.querySelector('td:first-child').textContent = index + 1;
                });
            }

            // Customer select change
            const customerSelect = document.querySelector('select[required]');
            customerSelect.addEventListener('change', function() {
                const customerId = this.value;
                const customer = customers[customerId];

                // Get contact and address selects
                const contactSelect = document.querySelector('select[required]:not(:first-child)');
                const addressSelect = document.querySelector('select[placeholder="Pilih Alamat"]');

                // Clear previous options
                contactSelect.innerHTML = '<option value="">Pilih Kontak</option>';
                addressSelect.innerHTML = '<option value="">Pilih Alamat</option>';

                if (customer) {
                    // Populate contacts
                    customer.contacts.forEach(contact => {
                        const option = document.createElement('option');
                        option.value = contact.id;
                        option.textContent = `${contact.name} (${contact.position})`;
                        contactSelect.appendChild(option);
                    });

                    // Populate addresses
                    customer.addresses.forEach(address => {
                        const option = document.createElement('option');
                        option.value = address.id;
                        option.textContent = `${address.name} - ${address.address}`;
                        addressSelect.appendChild(option);
                    });
                }

                // Clear email and phone
                document.querySelector('input[type="email"]').value = '';
                document.querySelector('label.form-label:contains("Telepon") + input').value = '';
            });

            // Contact select change
            const contactSelect = document.querySelector('select[required]:not(:first-child)');
            contactSelect.addEventListener('change', function() {
                const customerId = customerSelect.value;
                const contactId = this.value;

                if (customerId && contactId) {
                    const customer = customers[customerId];
                    const contact = customer.contacts.find(c => c.id === contactId);

                    if (contact) {
                        document.querySelector('input[type="email"]').value = contact.email;
                        document.querySelector('label.form-label:contains("Telepon") + input').value =
                            contact.phone;
                    }
                }
            });

            // Quote select change
            const quoteSelect = document.querySelector('select.form-select:first-child');
            quoteSelect.addEventListener('change', function() {
                const quoteId = this.value;

                if (quoteId) {
                    // In a real application, you would fetch quote data from the server
                    // For this example, we'll just show an alert
                    alert(
                        `Quote ${quoteId} selected. In a real application, this would populate the form with quote data.`);
                }
            });

            // Duration calculation
            const startDateInput = document.querySelector('input[type="date"][required]:first-of-type');
            const endDateInput = document.querySelector('input[type="date"][required]:last-of-type');
            const durationInput = document.querySelector('input[type="number"][value="6"]');
            const durationUnitSelect = durationInput.nextElementSibling;

            // Update end date when start date or duration changes
            function updateEndDate() {
                const startDate = new Date(startDateInput.value);
                const duration = parseInt(durationInput.value) || 0;
                const unit = durationUnitSelect.value;

                if (startDate && !isNaN(startDate) && duration > 0) {
                    let endDate = new Date(startDate);

                    switch (unit) {
                        case 'hari':
                            endDate.setDate(startDate.getDate() + duration);
                            break;
                        case 'minggu':
                            endDate.setDate(startDate.getDate() + (duration * 7));
                            break;
                        case 'bulan':
                            endDate.setMonth(startDate.getMonth() + duration);
                            break;
                        case 'tahun':
                            endDate.setFullYear(startDate.getFullYear() + duration);
                            break;
                    }

                    // Format date as YYYY-MM-DD for input
                    const year = endDate.getFullYear();
                    const month = String(endDate.getMonth() + 1).padStart(2, '0');
                    const day = String(endDate.getDate()).padStart(2, '0');
                    endDateInput.value = `${year}-${month}-${day}`;
                }
            }

            startDateInput.addEventListener('change', updateEndDate);
            durationInput.addEventListener('input', updateEndDate);
            durationUnitSelect.addEventListener('change', updateEndDate);

            // Update duration when end date changes
            endDateInput.addEventListener('change', function() {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);

                if (startDate && !isNaN(startDate) && endDate && !isNaN(endDate)) {
                    const unit = durationUnitSelect.value;
                    let duration = 0;

                    switch (unit) {
                        case 'hari':
                            duration = Math.round((endDate - startDate) / (1000 * 60 * 60 * 24));
                            break;
                        case 'minggu':
                            duration = Math.round((endDate - startDate) / (1000 * 60 * 60 * 24 * 7));
                            break;
                        case 'bulan':
                            duration = (endDate.getFullYear() - startDate.getFullYear()) * 12 +
                                endDate.getMonth() - startDate.getMonth();
                            break;
                        case 'tahun':
                            duration = endDate.getFullYear() - startDate.getFullYear();
                            break;
                    }

                    durationInput.value = Math.max(1, duration);
                }
            });

            // Advance payment calculation
            const advancePercentInput = document.querySelector('input[type="number"][min="0"][max="100"]');
            advancePercentInput.addEventListener('input', calculateTotals);

            // Add item button
            document.getElementById('add-item').addEventListener('click', addItemRow);

            // Discount and tax changes
            document.getElementById('discount-percent').addEventListener('input', calculateTotals);
            document.getElementById('tax-percent').addEventListener('input', calculateTotals);

            // Setup event listeners for initial row
            setupRowEventListeners(document.querySelector('.item-row'));

            // Initial calculations
            calculateTotals();
        });
    </script>
@endsection
