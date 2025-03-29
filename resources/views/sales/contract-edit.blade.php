@extends('layouts.app')

@section('title', 'Edit Kontrak')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none mt-1 mb-2">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Edit Kontrak #C-2023-0001
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('sales.contract.detail', ['id' => 1]) }}"
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
                                    <div class="mb-3">
                                        <label class="form-label required">Nomor Kontrak</label>
                                        <input type="text" class="form-control" value="C-2023-0001" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Tanggal Mulai</label>
                                        <input type="date" class="form-control" value="2023-11-01" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Tanggal Berakhir</label>
                                        <input type="date" class="form-control" value="2024-04-30" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Penawaran</label>
                                        <input type="text" class="form-control" value="Q-2023-0001" readonly>
                                    </div>
                                    <div class="mb-3">
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
                                    <div class="mb-3">
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
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Pelanggan</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Pelanggan</label>
                                <select class="form-select" required>
                                    <option value="1" selected>PT Pembangunan Jaya</option>
                                    <option value="2">PT Wijaya Karya</option>
                                    <option value="3">PT Adhi Karya</option>
                                    <option value="4">PT Total Bangun Persada</option>
                                    <option value="5">PT Hutama Karya</option>
                                    <option value="6">PT Nusa Konstruksi Enjiniring</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kontak</label>
                                        <select class="form-select">
                                            <option value="1" selected>Budi Santoso (Procurement Manager)</option>
                                            <option value="2">Andi Wijaya (Project Manager)</option>
                                            <option value="3">Siti Rahayu (Finance)</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control"
                                            value="budi.santoso@pembangunanjaya.co.id">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Telepon</label>
                                        <input type="text" class="form-control" value="+62 812-3456-7890">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat Pengiriman</label>
                                        <textarea class="form-control" rows="3">Jl. Gatot Subroto Kav. 35-36, Jakarta Selatan</textarea>
                                    </div>
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
                                <input type="text" class="form-control"
                                    value="Pembangunan Gedung Perkantoran Jaya Tower" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Lokasi</label>
                                        <input type="text" class="form-control"
                                            value="Jl. Gatot Subroto Kav. 35-36, Jakarta Selatan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
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
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Item Kontrak</h3>
                                <button type="button" class="btn btn-sm btn-primary" id="add-item">
                                    <i class="ti ti-plus me-2"></i>Tambah Item
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-vcenter" id="items-table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Deskripsi</th>
                                            <th>Spesifikasi</th>
                                            <th>Kuantitas</th>
                                            <th>Satuan</th>
                                            <th>Harga Satuan</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="item-row">
                                            <td>1</td>
                                            <td>
                                                <select class="form-select product-select">
                                                    <option value="">Pilih Produk</option>
                                                    <option value="beton-k350" selected>Beton Ready Mix K-350</option>
                                                    <option value="beton-k300">Beton Ready Mix K-300</option>
                                                    <option value="beton-k250">Beton Ready Mix K-250</option>
                                                    <option value="beton-k225">Beton Ready Mix K-225</option>
                                                    <option value="pompa">Jasa Pompa Beton</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    value="Slump 12±2, Ukuran Agregat Max 20mm">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control quantity" value="350"
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
                                                    <input type="text" class="form-control price" value="1.100.000">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" class="form-control subtotal"
                                                        value="385.000.000" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-sm btn-icon btn-outline-danger remove-item">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="item-row">
                                            <td>2</td>
                                            <td>
                                                <select class="form-select product-select">
                                                    <option value="">Pilih Produk</option>
                                                    <option value="beton-k350">Beton Ready Mix K-350</option>
                                                    <option value="beton-k300" selected>Beton Ready Mix K-300</option>
                                                    <option value="beton-k250">Beton Ready Mix K-250</option>
                                                    <option value="beton-k225">Beton Ready Mix K-225</option>
                                                    <option value="pompa">Jasa Pompa Beton</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    value="Slump 12±2, Ukuran Agregat Max 20mm">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control quantity" value="150"
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
                                                    <input type="text" class="form-control price" value="950.000">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" class="form-control subtotal"
                                                        value="142.500.000" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-sm btn-icon btn-outline-danger remove-item">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="item-row">
                                            <td>3</td>
                                            <td>
                                                <select class="form-select product-select">
                                                    <option value="">Pilih Produk</option>
                                                    <option value="beton-k350">Beton Ready Mix K-350</option>
                                                    <option value="beton-k300">Beton Ready Mix K-300</option>
                                                    <option value="beton-k250">Beton Ready Mix K-250</option>
                                                    <option value="beton-k225">Beton Ready Mix K-225</option>
                                                    <option value="pompa" selected>Jasa Pompa Beton</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    value="Termasuk Operator dan Bahan Bakar">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control quantity" value="12"
                                                    min="0">
                                            </td>
                                            <td>
                                                <select class="form-select unit">
                                                    <option value="m3">m³</option>
                                                    <option value="unit">Unit</option>
                                                    <option value="hari" selected>Hari</option>
                                                    <option value="jam">Jam</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" class="form-control price" value="3.500.000">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" class="form-control subtotal"
                                                        value="42.000.000" readonly>
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
                                                        value="569.500.000" readonly>
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
                                                        value="5" min="0" max="100">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="text" class="form-control" id="discount-amount"
                                                        value="28.475.000" readonly>
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
                                                        value="59.512.750" readonly>
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
                                                        value="600.537.750" readonly>
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
                                <textarea class="form-control" rows="8">1. Harga berlaku untuk pengiriman dalam radius 25 km dari batching plant.
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
                                <div class="d-flex align-items-center mb-2">
                                    <div class="flex-grow-1">
                                        <span>Kontrak_C-2023-0001_PT_Pembangunan_Jaya.pdf</span>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-outline-primary me-2">
                                            <i class="ti ti-download"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <input type="file" class="form-control">
                                <small class="form-hint">Format file: PDF, DOC, DOCX. Ukuran maksimal: 5MB</small>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Spesifikasi Teknis</div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="flex-grow-1">
                                        <span>Spesifikasi_Teknis_Beton_K350_K300.pdf</span>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-outline-primary me-2">
                                            <i class="ti ti-download"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <input type="file" class="form-control">
                                <small class="form-hint">Format file: PDF, DOC, DOCX. Ukuran maksimal: 5MB</small>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Jadwal Pengiriman</div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="flex-grow-1">
                                        <span>Jadwal_Pengiriman_Jaya_Tower_Nov2023.xlsx</span>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-sm btn-outline-primary me-2">
                                            <i class="ti ti-download"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </div>
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
                                    <option value="draft">Draft</option>
                                    <option value="pending">Menunggu Persetujuan</option>
                                    <option value="active" selected>Aktif</option>
                                    <option value="completed">Selesai</option>
                                    <option value="cancelled">Dibatalkan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Penandatanganan</label>
                                <input type="date" class="form-control" value="2023-10-28">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ditandatangani Oleh (Pelanggan)</label>
                                <input type="text" class="form-control" value="Budi Santoso">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jabatan</label>
                                <input type="text" class="form-control" value="Procurement Manager">
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
                                    <input type="text" class="form-control" value="180.161.325" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Uang Muka</label>
                                <select class="form-select">
                                    <option value="pending">Belum Dibayar</option>
                                    <option value="paid" selected>Dibayar</option>
                                    <option value="partial">Dibayar Sebagian</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Pembayaran Uang Muka</label>
                                <input type="date" class="form-control" value="2023-10-30">
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
                                <input type="date" class="form-control" value="2023-11-05">
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
                                <input class="form-check-input" type="checkbox" id="schedule-confirmation" checked>
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
                                <textarea class="form-control" rows="4">Pelanggan meminta pengiriman dilakukan pada pagi hari sebelum jam 10 untuk menghindari kemacetan. Kontak site manager: Agus (0812-9876-5432).</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('sales.contract.detail', ['id' => 1]) }}" class="btn btn-outline-secondary">
                            <i class="ti ti-x me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-device-floppy me-2"></i>Simpan Perubahan
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

            // Format currency
            function formatCurrency(number) {
                return new Intl.NumberFormat('id-ID').format(number);
            }

            // Parse currency string to number
            function parseCurrency(currencyString) {
                return parseFloat(currencyString.replace(/\./g, '').replace(',', '.'));
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
                const advancePercent = parseFloat(document.querySelector('input[type="number"][value="30"]')
                    .value) || 0;
                const advanceAmount = grandTotal * (advancePercent / 100);
                document.querySelector('input[value="180.161.325"]').value = formatCurrency(advanceAmount);
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
                    <input type="text" class="form-control" value="">
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

                // Add event listeners to the new row
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

                        calculateRowTotal(row);
                    }
                });

                // Quantity change
                row.querySelector('.quantity').addEventListener('input', function() {
                    calculateRowTotal(row);
                });

                // Price change
                row.querySelector('.price').addEventListener('input', function() {
                    calculateRowTotal(row);
                });

                // Remove item button
                row.querySelector('.remove-item').addEventListener('click', function() {
                    row.remove();
                    renumberRows();
                    calculateTotals();
                });
            }

            // Calculate row total
            function calculateRowTotal(row) {
                const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
                const priceStr = row.querySelector('.price').value;
                const price = parseCurrency(priceStr);
                const rowSubtotal = quantity * price;

                row.querySelector('.subtotal').value = formatCurrency(rowSubtotal);
                calculateTotals();
            }

            // Renumber rows after deletion
            function renumberRows() {
                document.querySelectorAll('#items-table tbody tr').forEach((row, index) => {
                    row.querySelector('td:first-child').textContent = index + 1;
                });
            }

            // Add event listeners to existing rows
            document.querySelectorAll('.item-row').forEach(row => {
                setupRowEventListeners(row);
            });

            // Add item button
            document.getElementById('add-item').addEventListener('click', addItemRow);

            // Discount percent change
            document.getElementById('discount-percent').addEventListener('input', calculateTotals);

            // Tax percent change
            document.getElementById('tax-percent').addEventListener('input', calculateTotals);

            // Initial calculation
            calculateTotals();
        });
    </script>
@endsection
