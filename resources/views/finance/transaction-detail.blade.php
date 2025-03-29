@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Akuntansi & Pembukuan
                </div>
                <h2 class="page-title">
                    Detail Transaksi
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('finance.accounting') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Kembali
                    </a>
                    <a href="#" class="btn btn-outline-primary d-none d-sm-inline-block" onclick="window.print();">
                        <i class="ti ti-printer"></i>
                        Cetak
                    </a>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="ti ti-settings"></i>
                            Tindakan
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                                <i class="ti ti-edit me-2"></i>
                                Edit Transaksi
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="ti ti-copy me-2"></i>
                                Duplikat
                            </a>
                            <a class="dropdown-item text-danger" href="#">
                                <i class="ti ti-trash me-2"></i>
                                Hapus Transaksi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Transaksi</h3>
                        <div class="card-actions">
                            <span class="badge bg-green">Selesai</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No. Transaksi</label>
                                    <div class="form-control-plaintext">TRX-2023-0001</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Transaksi</label>
                                    <div class="form-control-plaintext">15 Agustus 2023</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kategori</label>
                                    <div class="form-control-plaintext">
                                        <span class="badge bg-green">Pendapatan</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <div class="form-control-plaintext">Pembayaran Invoice #INV-2023-0042</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Dibuat Oleh</label>
                                    <div class="form-control-plaintext">Admin Keuangan</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Terakhir Diubah</label>
                                    <div class="form-control-plaintext">15 Agustus 2023, 14:30</div>
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
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Akun</th>
                                    <th>Nama Akun</th>
                                    <th>Deskripsi</th>
                                    <th class="text-end">Debit</th>
                                    <th class="text-end">Kredit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1-1000</td>
                                    <td>Kas</td>
                                    <td>Pembayaran Invoice #INV-2023-0042</td>
                                    <td class="text-end">Rp 125.000.000</td>
                                    <td class="text-end">-</td>
                                </tr>
                                <tr>
                                    <td>4-1000</td>
                                    <td>Pendapatan Penjualan</td>
                                    <td>Pembayaran Invoice #INV-2023-0042</td>
                                    <td class="text-end">-</td>
                                    <td class="text-end">Rp 125.000.000</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total</strong></td>
                                    <td class="text-end"><strong>Rp 125.000.000</strong></td>
                                    <td class="text-end"><strong>Rp 125.000.000</strong></td>
                                </tr>
                            </tfoot>
                        </table>
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
                            <div class="form-control-plaintext">
                                Pembayaran diterima melalui transfer bank pada tanggal 15 Agustus 2023. Pembayaran ini merupakan pelunasan untuk invoice #INV-2023-0042 untuk pesanan produk beton siap pakai.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lampiran</label>
                            <div class="row g-2">
                                <div class="col-auto">
                                    <a href="#" class="btn btn-outline-primary">
                                        <i class="ti ti-file-invoice me-1"></i>
                                        Bukti Transfer.pdf
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn btn-outline-primary">
                                        <i class="ti ti-file me-1"></i>
                                        Invoice-2023-0042.pdf
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Riwayat Aktivitas</h3>
                    </div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="avatar avatar-sm">AS</span>
                                </div>
                                <div class="col">
                                    <div class="text-body">Admin Sistem membuat transaksi ini</div>
                                    <div class="text-muted">15 Agustus 2023, 14:30</div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="avatar avatar-sm">KF</span>
                                </div>
                                <div class="col">
                                    <div class="text-body">Kepala Finance menyetujui transaksi</div>
                                    <div class="text-muted">15 Agustus 2023, 15:45</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
