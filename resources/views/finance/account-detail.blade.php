@extends('layouts.app')

@section('title', 'Detail Akun')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Akuntansi & Pembukuan
                    </div>
                    <h2 class="page-title">
                        Detail Akun
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
                                <a class="dropdown-item" href="{{ route('finance.account.edit', ['id' => '1-1000']) }}">
                                    <i class="ti ti-edit me-2"></i>
                                    Edit Akun
                                </a>
                                <a class="dropdown-item text-danger" href="#">
                                    <i class="ti ti-trash me-2"></i>
                                    Hapus Akun
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
            <div class="row row-cards">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Akun</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Kode Akun</label>
                                <div class="form-control-plaintext">1-1000</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Akun</label>
                                <div class="form-control-plaintext">Kas</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <div class="form-control-plaintext">Aset</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tipe</label>
                                <div class="form-control-plaintext">Debit</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Saldo Saat Ini</label>
                                <div class="form-control-plaintext"><strong>Rp 590.000.000</strong></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-control-plaintext">
                                    <span class="badge bg-success">Aktif</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Akun</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <div>Total Transaksi</div>
                                    <div class="ms-auto"><strong>42</strong></div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 75%"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <div>Total Debit</div>
                                    <div class="ms-auto"><strong>Rp 1.250.000.000</strong></div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" style="width: 65%"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <div>Total Kredit</div>
                                    <div class="ms-auto"><strong>Rp 660.000.000</strong></div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-red" style="width: 35%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Buku Besar</h3>
                            <div class="card-actions">
                                <div class="row g-2">
                                    <div class="col">
                                        <select class="form-select">
                                            <option value="08-2023" selected>Agustus 2023</option>
                                            <option value="07-2023">Juli 2023</option>
                                            <option value="06-2023">Juni 2023</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Ref</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01 Agu 2023</td>
                                        <td>Saldo Awal</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td><strong>Rp 500.000.000</strong></td>
                                    </tr>
                                    <tr>
                                        <td>10 Agu 2023</td>
                                        <td>Pembayaran Invoice #INV-2023-0041</td>
                                        <td>JRN-2023-0004</td>
                                        <td>Rp 85.000.000</td>
                                        <td>-</td>
                                        <td><strong>Rp 585.000.000</strong></td>
                                    </tr>
                                    <tr>
                                        <td>12 Agu 2023</td>
                                        <td>Pembayaran Gaji Karyawan</td>
                                        <td>JRN-2023-0003</td>
                                        <td>-</td>
                                        <td>Rp 45.000.000</td>
                                        <td><strong>Rp 540.000.000</strong></td>
                                    </tr>
                                    <tr>
                                        <td>14 Agu 2023</td>
                                        <td>Pembelian Bahan Baku</td>
                                        <td>JRN-2023-0002</td>
                                        <td>-</td>
                                        <td>Rp 75.000.000</td>
                                        <td><strong>Rp 465.000.000</strong></td>
                                    </tr>
                                    <tr>
                                        <td>15 Agu 2023</td>
                                        <td>Pembayaran Invoice #INV-2023-0042</td>
                                        <td>JRN-2023-0001</td>
                                        <td>Rp 125.000.000</td>
                                        <td>-</td>
                                        <td><strong>Rp 590.000.000</strong></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>Total</strong></td>
                                        <td><strong>Rp 210.000.000</strong></td>
                                        <td><strong>Rp 120.000.000</strong></td>
                                        <td><strong>Rp 590.000.000</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Grafik Pergerakan Saldo</h3>
                        </div>
                        <div class="card-body">
                            <div id="chart-account-balance" style="height: 250px;"></div>
                        </div>
                    </div>
                    
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Transaksi Terbaru</h3>
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar bg-green-lt">
                                            <i class="ti ti-arrow-down-right"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="text-body">Pembayaran Invoice #INV-2023-0042</div>
                                                <div class="text-muted">15 Agustus 2023</div>
                                            </div>
                                            <div class="text-success">
                                                <strong>+Rp 125.000.000</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar bg-red-lt">
                                            <i class="ti ti-arrow-up-right"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div class="text-body">Pembelian Bahan Baku</div>
                                                <div class="text-muted">14 Agustus 2023</div>
                                            </div>
                                            <div class="text-danger">
                                                <strong>-Rp 75.000.000</strong>
                                            </div>
                                        </div>
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

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                series: [{
                    name: "Saldo",
                    data: [500000000, 585000000, 540000000, 465000000, 590000000]
                }],
                chart: {
                    height: 250,
                    type: 'line',
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                colors: ['#206bc4'],
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: ['01 Agu', '10 Agu', '12 Agu', '14 Agu', '15 Agu'],
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return "Rp " + (value / 1000000).toFixed(0) + " Jt";
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return "Rp " + value.toLocaleString('id-ID');
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-account-balance"), options);
            chart.render();
        });
    </script>
@endsection
