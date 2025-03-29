@extends('layouts.app')

@section('title', 'Detail Kontrak')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none mt-1 mb-2">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Detail Kontrak
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-outline-secondary d-none d-sm-inline-block" onclick="window.print();">
                            <i class="ti ti-printer me-2"></i>
                            Cetak
                        </a>
                        <a href="{{ route('sales.customer-management') }}"
                            class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left me-2"></i>
                            Kembali
                        </a>
                        <a href="{{ route('sales.contract.edit', ['id' => 1]) }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-edit me-2"></i>
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Kontrak</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Nomor Kontrak</label>
                                    <div class="form-control-plaintext">C-2023-0001</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted">Tanggal Mulai</label>
                                    <div class="form-control-plaintext">01 November 2023</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted">Tanggal Berakhir</label>
                                    <div class="form-control-plaintext">30 April 2024</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Nomor Penawaran</label>
                                    <div class="form-control-plaintext">Q-2023-0005</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted">Durasi</label>
                                    <div class="form-control-plaintext">6 Bulan</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted">Sales</label>
                                    <div class="form-control-plaintext">Dewi Susanti</div>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Pelanggan</label>
                                    <div class="form-control-plaintext">
                                        <a href="{{ route('sales.customer.detail', ['id' => 1]) }}">PT Pembangunan Jaya</a>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted">Kontak</label>
                                    <div class="form-control-plaintext">Budi Santoso (Procurement Manager)</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted">Email</label>
                                    <div class="form-control-plaintext">budi.santoso@pembangunanjaya.co.id</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Telepon</label>
                                    <div class="form-control-plaintext">+62 812-3456-7890</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted">Alamat Pengiriman</label>
                                    <div class="form-control-plaintext">
                                        Proyek Jaya Tower, Jl. Thamrin No. 10, Jakarta Pusat
                                    </div>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Nama Proyek</label>
                                    <div class="form-control-plaintext">Pembangunan Jaya Tower</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-muted">Lokasi</label>
                                    <div class="form-control-plaintext">Jl. Thamrin No. 10, Jakarta Pusat</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Jenis Konstruksi</label>
                                    <div class="form-control-plaintext">Gedung</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Item Kontrak</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Deskripsi</th>
                                        <th>Spesifikasi</th>
                                        <th>Kuantitas</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Beton Ready Mix K-350</td>
                                        <td>Slump 12±2, Ukuran Agregat Max 20mm</td>
                                        <td>350</td>
                                        <td>m³</td>
                                        <td>Rp 1.100.000</td>
                                        <td>Rp 385.000.000</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Beton Ready Mix K-300</td>
                                        <td>Slump 12±2, Ukuran Agregat Max 20mm</td>
                                        <td>150</td>
                                        <td>m³</td>
                                        <td>Rp 950.000</td>
                                        <td>Rp 142.500.000</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Jasa Pompa Beton</td>
                                        <td>Termasuk Operator dan Bahan Bakar</td>
                                        <td>12</td>
                                        <td>Hari</td>
                                        <td>Rp 3.500.000</td>
                                        <td>Rp 42.000.000</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td class="text-end"><strong>Subtotal:</strong></td>
                                        <td><strong>Rp 569.500.000</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td class="text-end">Diskon (5%):</td>
                                        <td>Rp 28.475.000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td class="text-end">PPN (11%):</td>
                                        <td>Rp 59.512.750</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td class="text-end"><strong>Total:</strong></td>
                                        <td><strong>Rp 600.537.750</strong></td>
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
                        <ol class="ps-3">
                            <li>Harga berlaku untuk pengiriman dalam radius 25 km dari batching plant.</li>
                            <li>Biaya tambahan akan dikenakan untuk pengiriman di luar radius tersebut.</li>
                            <li>Minimal pemesanan 5 m³ per pengiriman.</li>
                            <li>Waktu tunggu maksimal di lokasi proyek adalah 2 jam, setelahnya akan dikenakan biaya
                                tambahan.</li>
                            <li>Pembayaran dilakukan dengan uang muka 30% dan pelunasan sesuai progress pengiriman.</li>
                            <li>Jadwal pengiriman harus dikonfirmasi minimal 2 hari sebelumnya.</li>
                            <li>Pembatalan pesanan harus dilakukan minimal 24 jam sebelum jadwal pengiriman.</li>
                            <li>Kontrak ini berlaku selama 6 bulan sejak tanggal penandatanganan.</li>
                        </ol>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Terkait</h3>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <i class="ti ti-file-text text-primary fs-2"></i>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="text-truncate">Dokumen Kontrak.pdf</div>
                                                <div class="text-muted">Ditambahkan pada 28 Oktober 2023</div>
                                            </div>
                                            <div>
                                                <a href="#" class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-download me-1"></i>
                                                    Unduh
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <i class="ti ti-file-text text-primary fs-2"></i>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="text-truncate">Spesifikasi Teknis.pdf</div>
                                                <div class="text-muted">Ditambahkan pada 28 Oktober 2023</div>
                                            </div>
                                            <div>
                                                <a href="#" class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-download me-1"></i>
                                                    Unduh
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <i class="ti ti-file-spreadsheet text-success fs-2"></i>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="text-truncate">Jadwal Pengiriman.xlsx</div>
                                                <div class="text-muted">Ditambahkan pada 30 Oktober 2023</div>
                                            </div>
                                            <div>
                                                <a href="#" class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-download me-1"></i>
                                                    Unduh
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <label class="form-label text-muted">Status</label>
                            <div>
                                <span class="badge bg-green">Aktif</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Tanggal Penandatanganan</label>
                            <div class="form-control-plaintext">28 Oktober 2023</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Ditandatangani Oleh (Pelanggan)</label>
                            <div class="form-control-plaintext">Budi Santoso</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Jabatan</label>
                            <div class="form-control-plaintext">Procurement Manager</div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label text-muted">Metode Pembayaran</label>
                            <div class="form-control-plaintext">Transfer Bank</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Syarat Pembayaran</label>
                            <div class="form-control-plaintext">Net 30 Hari</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Uang Muka</label>
                            <div class="form-control-plaintext">30% (Rp 180.161.325)</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Status Uang Muka</label>
                            <div class="form-control-plaintext">
                                <span class="badge bg-green">Dibayar</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Tanggal Pembayaran Uang Muka</label>
                            <div class="form-control-plaintext">30 Oktober 2023</div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Jadwal Pengiriman</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label text-muted">Tanggal Mulai Pengiriman</label>
                            <div class="form-control-plaintext">5 November 2023</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Frekuensi Pengiriman</label>
                            <div class="form-control-plaintext">Mingguan</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Estimasi Durasi Pengiriman</label>
                            <div class="form-control-plaintext">24 Minggu</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Status Konfirmasi</label>
                            <div class="form-control-plaintext">
                                <span class="badge bg-green">Terkonfirmasi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Catatan Internal</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-control-plaintext">
                            Pelanggan meminta pengiriman dilakukan pada pagi hari sebelum jam 10 untuk menghindari
                            kemacetan. Kontak site manager: Agus (0812-9876-5432).
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Riwayat Pengiriman</h3>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar bg-green-lt">
                                            <i class="ti ti-truck-delivery"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div>Pengiriman #DO-2023-0015</div>
                                                <div class="text-muted">5 November 2023</div>
                                            </div>
                                            <div>
                                                <span class="badge bg-green">Selesai</span>
                                            </div>
                                        </div>
                                        <div class="text-muted mt-1">Beton K-350 (25 m³)</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar bg-green-lt">
                                            <i class="ti ti-truck-delivery"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div>Pengiriman #DO-2023-0022</div>
                                                <div class="text-muted">12 November 2023</div>
                                            </div>
                                            <div>
                                                <span class="badge bg-green">Selesai</span>
                                            </div>
                                        </div>
                                        <div class="text-muted mt-1">Beton K-350 (30 m³)</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar bg-blue-lt">
                                            <i class="ti ti-truck-delivery"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div>Pengiriman #DO-2023-0030</div>
                                                <div class="text-muted">19 November 2023</div>
                                            </div>
                                            <div>
                                                <span class="badge bg-blue">Dijadwalkan</span>
                                            </div>
                                        </div>
                                        <div class="text-muted mt-1">Beton K-350 (35 m³)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="#" class="btn btn-outline-primary btn-sm w-100">
                                Lihat Semua Pengiriman
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
