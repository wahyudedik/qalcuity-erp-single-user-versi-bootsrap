@extends('layouts.app')

@section('title', 'Detail Penawaran')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Detail Penawaran #{{ $id }}
                    </h2>
                    <div class="text-muted mt-1 mb-2">Informasi lengkap penawaran</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-outline-primary" onclick="window.print();">
                            <i class="ti ti-printer"></i>
                            Cetak
                        </a>
                        <a href="{{ route('sales.quote.edit', ['id' => $id]) }}" class="btn btn-primary">
                            <i class="ti ti-edit"></i>
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                {{-- <div class="card-status-start bg-success"></div> --}}
                <h3 class="card-title">Informasi Penawaran</h3>
            </div>
            <div class="card-body">
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Nomor Penawaran</div>
                        <div class="datagrid-content">{{ $id }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Status</div>
                        <div class="datagrid-content">
                            <span class="badge bg-success">Disetujui</span>
                        </div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Tanggal Penawaran</div>
                        <div class="datagrid-content">15 Oktober 2023</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Berlaku Hingga</div>
                        <div class="datagrid-content">15 November 2023</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Nilai Penawaran</div>
                        <div class="datagrid-content">Rp 125.000.000</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Disetujui Pada</div>
                        <div class="datagrid-content">22 Oktober 2023</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Dibuat Oleh</div>
                        <div class="datagrid-content">Ahmad Fauzi</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Terakhir Diperbarui</div>
                        <div class="datagrid-content">22 Oktober 2023, 14:30</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Pelanggan</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Nama Perusahaan</div>
                                    <div class="datagrid-content">PT Pembangunan Jaya</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Nama Perusahaan</div>
                                    <div class="datagrid-content">PT Pembangunan Jaya</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Alamat</div>
                                    <div class="datagrid-content">Jl. Gatot Subroto No. 123, Jakarta Selatan</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Kontak</div>
                                    <div class="datagrid-content">Budi Santoso</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Jabatan</div>
                                    <div class="datagrid-content">Procurement Manager</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Email</div>
                                    <div class="datagrid-content">budi.santoso@pembangunanjaya.co.id</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Telepon</div>
                                    <div class="datagrid-content">+62 812-3456-7890</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Proyek</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Nama Proyek</div>
                                    <div class="datagrid-content">Pembangunan Gedung Perkantoran Jaya Tower</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Lokasi</div>
                                    <div class="datagrid-content">Jakarta Selatan</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tanggal Mulai</div>
                                    <div class="datagrid-content">1 November 2023</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Estimasi Durasi</div>
                                    <div class="datagrid-content">6 bulan</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Jenis Konstruksi</div>
                                    <div class="datagrid-content">Gedung Perkantoran</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Referensi</div>
                                    <div class="datagrid-content">RFQ-2023-0045</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Detail Item Penawaran</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
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
                                <td>250</td>
                                <td>m³</td>
                                <td>Rp 1.100.000</td>
                                <td>Rp 275.000.000</td>
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
                                <td>Beton Ready Mix K-250</td>
                                <td>Slump 12±2, Ukuran Agregat Max 20mm</td>
                                <td>100</td>
                                <td>m³</td>
                                <td>Rp 850.000</td>
                                <td>Rp 85.000.000</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Jasa Pompa Beton</td>
                                <td>Termasuk Operator dan Bahan Bakar</td>
                                <td>25</td>
                                <td>hari</td>
                                <td>Rp 3.500.000</td>
                                <td>Rp 87.500.000</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5"></td>
                                <td><strong>Subtotal</strong></td>
                                <td>Rp 590.000.000</td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td><strong>Diskon (10%)</strong></td>
                                <td>Rp 59.000.000</td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td><strong>PPN (11%)</strong></td>
                                <td>Rp 58.410.000</td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td><strong>Total</strong></td>
                                <td><strong>Rp 589.410.000</strong></td>
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
                <ol>
                    <li>Harga berlaku untuk pengiriman dalam radius 25 km dari batching plant.</li>
                    <li>Biaya tambahan akan dikenakan untuk pengiriman di luar radius tersebut.</li>
                    <li>Minimal pemesanan 5 m³ per pengiriman.</li>
                    <li>Waktu tunggu maksimal di lokasi proyek adalah 2 jam, setelahnya akan dikenakan biaya tambahan.</li>
                    <li>Pembayaran dilakukan dengan uang muka 30% dan pelunasan sesuai progress pengiriman.</li>
                    <li>Penawaran ini berlaku selama 30 hari sejak tanggal penerbitan.</li>
                    <li>Jadwal pengiriman harus dikonfirmasi minimal 2 hari sebelumnya.</li>
                    <li>Pembatalan pesanan harus dilakukan minimal 24 jam sebelum jadwal pengiriman.</li>
                </ol>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Riwayat Aktivitas</h3>
            </div>
            <div class="card-body">
                <div class="divide-y">
                    <div class="d-flex py-2">
                        <div class="avatar avatar-sm bg-primary-lt me-3">
                            <span class="avatar-letters">AF</span>
                        </div>
                        <div>
                            <div class="text-truncate">
                                <strong>Ahmad Fauzi</strong> membuat penawaran ini
                            </div>
                            <div class="text-muted">15 Oktober 2023, 09:45</div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <div class="avatar avatar-sm bg-primary-lt me-3">
                            <span class="avatar-letters">AF</span>
                        </div>
                        <div>
                            <div class="text-truncate">
                                <strong>Ahmad Fauzi</strong> mengirim penawaran ke pelanggan
                            </div>
                            <div class="text-muted">15 Oktober 2023, 10:30</div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <div class="avatar avatar-sm bg-green-lt me-3">
                            <span class="avatar-letters">BS</span>
                        </div>
                        <div>
                            <div class="text-truncate">
                                <strong>Budi Santoso</strong> melihat penawaran
                            </div>
                            <div class="text-muted">18 Oktober 2023, 14:15</div>
                        </div>
                    </div>
                    <div class="d-flex py-2">
                        <div class="avatar avatar-sm bg-green-lt me-3">
                            <span class="avatar-letters">BS</span>
                        </div>
                        <div>
                            <div class="text-truncate">
                                <strong>Budi Santoso</strong> menyetujui penawaran
                            </div>
                            <div class="text-muted">22 Oktober 2023, 11:20</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
