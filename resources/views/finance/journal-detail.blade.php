@extends('layouts.app')

@section('title', 'Detail Jurnal')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Akuntansi & Pembukuan
                </div>
                <h2 class="page-title">
                    Detail Jurnal
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
                            <a class="dropdown-item" href="{{ route('finance.journal.edit', ['id' => 'JRN-2023-0001']) }}">
                                <i class="ti ti-edit me-2"></i>
                                Edit Jurnal
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="ti ti-copy me-2"></i>
                                Duplikat
                            </a>
                            <a class="dropdown-item text-danger" href="#">
                                <i class="ti ti-trash me-2"></i>
                                Hapus Jurnal
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
                        <h3 class="card-title">Informasi Jurnal</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No. Jurnal</label>
                                    <div class="form-control-plaintext">JRN-2023-0001</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal</label>
                                    <div class="form-control-plaintext">15 Agustus 2023</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Referensi</label>
                                    <div class="form-control-plaintext">TRX-2023-0001</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Keterangan</label>
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
                        <h3 class="card-title">Entri Jurnal</h3>
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
                        <h3 class="card-title">Dampak pada Buku Besar</h3>
                    </div>
                    <div class="card-body">
                        <div class="row row-cards">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Kas (1-1000)</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Debit</th>
                                                    <th>Kredit</th>
                                                    <th>Saldo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Saldo Sebelumnya</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>Rp 465.000.000</td>
                                                </tr>
                                                <tr class="table-primary">
                                                    <td>15 Agu 2023</td>
                                                    <td>Rp 125.000.000</td>
                                                    <td>-</td>
                                                    <td>Rp 590.000.000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Pendapatan Penjualan (4-1000)</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Debit</th>
                                                    <th>Kredit</th>
                                                    <th>Saldo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Saldo Sebelumnya</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>Rp 1.125.000.000</td>
                                                </tr>
                                                <tr class="table-primary">
                                                    <td>15 Agu 2023</td>
                                                    <td>-</td>
                                                    <td>Rp 125.000.000</td>
                                                    <td>Rp 1.250.000.000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Terkait</h3>
                    </div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="ti ti-file-invoice text-primary" style="font-size: 24px;"></i>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="text-body">Invoice #INV-2023-0042</div>
                                            <div class="text-muted">Faktur penjualan</div>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="ti ti-eye me-1"></i>
                                            Lihat
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="ti ti-receipt text-primary" style="font-size: 24px;"></i>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="text-body">Transaksi #TRX-2023-0001</div>
                                            <div class="text-muted">Transaksi terkait</div>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-outline-primary">
                                            <i class="ti ti-eye me-1"></i>
                                            Lihat
                                        </a>
                                    </div>
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
                                    <div class="text-body">Admin Sistem membuat jurnal ini</div>
                                    <div class="text-muted">15 Agustus 2023, 14:30</div>
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
