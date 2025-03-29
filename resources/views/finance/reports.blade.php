@extends('layouts.app')

@section('title', 'Pelaporan Keuangan')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Pelaporan Keuangan
                    </h2>
                    <div class="text-muted mt-1">Laporan keuangan dan analisis finansial perusahaan</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <a href="#" class="btn">
                                <i class="ti ti-calendar me-2"></i>
                                Pilih Periode
                            </a>
                        </span>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-report">
                            <i class="ti ti-file-export me-2"></i>
                            Export Laporan
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-report">
                            <i class="ti ti-file-export"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <!-- Filter Card -->
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Jenis Laporan</label>
                            <select class="form-select">
                                <option value="all" selected>Semua Laporan</option>
                                <option value="income">Laporan Laba Rugi</option>
                                <option value="balance">Neraca Keuangan</option>
                                <option value="cash-flow">Arus Kas</option>
                                <option value="tax">Laporan Pajak</option>
                                <option value="budget">Anggaran & Realisasi</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Periode</label>
                            <select class="form-select">
                                <option value="current-month" selected>Bulan Ini</option>
                                <option value="last-month">Bulan Lalu</option>
                                <option value="current-quarter">Kuartal Ini</option>
                                <option value="current-year">Tahun Ini</option>
                                <option value="custom">Kustom</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Dari Tanggal</label>
                            <input type="date" class="form-control" value="{{ date('Y-m-01') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Sampai Tanggal</label>
                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-12 text-end">
                            <button type="button" class="btn btn-primary">
                                <i class="ti ti-filter me-1"></i>
                                Filter
                            </button>
                            <button type="button" class="btn btn-outline-secondary">
                                <i class="ti ti-refresh me-1"></i>
                                Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Financial Summary Cards -->
            <div class="row mb-3">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-primary text-white avatar">
                                        <i class="ti ti-currency-dollar"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        Pendapatan
                                    </div>
                                    <div class="text-muted">
                                        Rp 1.254.890.000
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="badge bg-success">+8.9%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-green text-white avatar">
                                        <i class="ti ti-chart-pie"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        Laba Bersih
                                    </div>
                                    <div class="text-muted">
                                        Rp 356.780.000
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="badge bg-success">+4.3%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-danger text-white avatar">
                                        <i class="ti ti-receipt"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        Pengeluaran
                                    </div>
                                    <div class="text-muted">
                                        Rp 898.110.000
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="badge bg-danger">+2.7%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-info text-white avatar">
                                        <i class="ti ti-cash"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        Arus Kas
                                    </div>
                                    <div class="text-muted">
                                        Rp 456.780.000
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="badge bg-success">+12.2%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue vs Expenses Chart -->
            <div class="row mb-3">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pendapatan vs Pengeluaran</h3>
                        </div>
                        <div class="card-body">
                            <div id="revenue-expenses-chart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Distribusi Pengeluaran</h3>
                        </div>
                        <div class="card-body">
                            <div id="expense-distribution-chart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Financial Reports Tabs -->
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                        <li class="nav-item">
                            <a href="#tabs-income-statement" class="nav-link active" data-bs-toggle="tab">Laporan Laba
                                Rugi</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-balance-sheet" class="nav-link" data-bs-toggle="tab">Neraca Keuangan</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-cash-flow" class="nav-link" data-bs-toggle="tab">Arus Kas</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-tax-reports" class="nav-link" data-bs-toggle="tab">Laporan Pajak</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-budget" class="nav-link" data-bs-toggle="tab">Anggaran & Realisasi</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <!-- Income Statement Tab -->
                        <div class="tab-pane active show" id="tabs-income-statement">
                            <h4>Laporan Laba Rugi</h4>
                            <p class="text-muted">Periode: 1 Jan 2023 - 31 Des 2023</p>

                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th>Keterangan</th>
                                            <th class="text-end">Jumlah (Rp)</th>
                                            <th class="text-end">Persentase</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-light">
                                            <td colspan="3"><strong>PENDAPATAN</strong></td>
                                        </tr>
                                        @php
                                            $incomeItems = [
                                                ['Penjualan Produk', 1125000000, 89.65],
                                                ['Jasa Konsultasi', 75000000, 5.98],
                                                ['Pendapatan Lain-lain', 54890000, 4.37],
                                            ];
                                            $totalIncome = 1254890000;
                                        @endphp

                                        @foreach ($incomeItems as $item)
                                            <tr>
                                                <td>{{ $item[0] }}</td>
                                                <td class="text-end">{{ number_format($item[1], 0, ',', '.') }}</td>
                                                <td class="text-end">{{ $item[2] }}%</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><strong>Total Pendapatan</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalIncome, 0, ',', '.') }}</strong></td>
                                            <td class="text-end"><strong>100%</strong></td>
                                        </tr>

                                        <tr class="bg-light">
                                            <td colspan="3"><strong>BEBAN POKOK PENJUALAN</strong></td>
                                        </tr>

                                        @php
                                            $cogsItems = [
                                                ['Bahan Baku', 450000000, 35.86],
                                                ['Tenaga Kerja Langsung', 175000000, 13.95],
                                                ['Overhead Pabrik', 125000000, 9.96],
                                            ];
                                            $totalCOGS = 750000000;
                                        @endphp

                                        @foreach ($cogsItems as $item)
                                            <tr>
                                                <td>{{ $item[0] }}</td>
                                                <td class="text-end">{{ number_format($item[1], 0, ',', '.') }}</td>
                                                <td class="text-end">{{ $item[2] }}%</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><strong>Total Beban Pokok Penjualan</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalCOGS, 0, ',', '.') }}</strong></td>
                                            <td class="text-end"><strong>59.77%</strong></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Laba Kotor</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalIncome - $totalCOGS, 0, ',', '.') }}</strong>
                                            </td>
                                            <td class="text-end"><strong>40.23%</strong></td>
                                        </tr>

                                        <tr class="bg-light">
                                            <td colspan="3"><strong>BEBAN OPERASIONAL</strong></td>
                                        </tr>

                                        @php
                                            $opexItems = [
                                                ['Gaji & Tunjangan', 65000000, 5.18],
                                                ['Pemasaran & Iklan', 25000000, 1.99],
                                                ['Sewa Kantor', 18000000, 1.43],
                                                ['Utilitas', 12000000, 0.96],
                                                ['Penyusutan', 15000000, 1.2],
                                                ['Transportasi', 8110000, 0.65],
                                                ['Administrasi', 5000000, 0.4],
                                            ];
                                            $totalOpex = 148110000;
                                        @endphp

                                        @foreach ($opexItems as $item)
                                            <tr>
                                                <td>{{ $item[0] }}</td>
                                                <td class="text-end">{{ number_format($item[1], 0, ',', '.') }}</td>
                                                <td class="text-end">{{ $item[2] }}%</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><strong>Total Beban Operasional</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalOpex, 0, ',', '.') }}</strong></td>
                                            <td class="text-end"><strong>11.80%</strong></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Laba Operasional</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalIncome - $totalCOGS - $totalOpex, 0, ',', '.') }}</strong>
                                            </td>
                                            <td class="text-end"><strong>28.43%</strong></td>
                                        </tr>

                                        <tr class="bg-light">
                                            <td colspan="3"><strong>PENDAPATAN & BEBAN LAIN-LAIN</strong></td>
                                        </tr>

                                        @php
                                            $otherItems = [
                                                ['Pendapatan Bunga', 5000000, 0.4],
                                                ['Beban Bunga', -10000000, -0.8],
                                                ['Lain-lain', -2000000, -0.16],
                                            ];
                                            $totalOther = -7000000;
                                        @endphp

                                        @foreach ($otherItems as $item)
                                            <tr>
                                                <td>{{ $item[0] }}</td>
                                                <td class="text-end">{{ number_format($item[1], 0, ',', '.') }}</td>
                                                <td class="text-end">{{ $item[2] }}%</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><strong>Total Pendapatan & Beban Lain-lain</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalOther, 0, ',', '.') }}</strong></td>
                                            <td class="text-end"><strong>-0.56%</strong></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Laba Sebelum Pajak</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalIncome - $totalCOGS - $totalOpex + $totalOther, 0, ',', '.') }}</strong>
                                            </td>
                                            <td class="text-end"><strong>27.87%</strong></td>
                                        </tr>

                                        @php
                                            $taxAmount = 87000000;
                                            $netIncome =
                                                $totalIncome - $totalCOGS - $totalOpex + $totalOther - $taxAmount;
                                        @endphp

                                        <tr>
                                            <td><strong>Pajak Penghasilan</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($taxAmount, 0, ',', '.') }}</strong></td>
                                            <td class="text-end"><strong>6.93%</strong></td>
                                        </tr>

                                        <tr class="table-success">
                                            <td><strong>LABA BERSIH</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($netIncome, 0, ',', '.') }}</strong></td>
                                            <td class="text-end"><strong>20.94%</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Balance Sheet Tab -->
                        <div class="tab-pane" id="tabs-balance-sheet">
                            <h4>Neraca Keuangan</h4>
                            <p class="text-muted">Per 31 Desember 2023</p>

                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th>Keterangan</th>
                                            <th class="text-end">Jumlah (Rp)</th>
                                            <th class="text-end">Persentase</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-light">
                                            <td colspan="3"><strong>ASET</strong></td>
                                        </tr>
                                        <tr class="bg-light">
                                            <td colspan="3"><strong>Aset Lancar</strong></td>
                                        </tr>

                                        @php
                                            $currentAssets = [
                                                ['Kas & Setara Kas', 456780000, 11.42],
                                                ['Piutang Usaha', 325000000, 8.13],
                                                ['Persediaan', 275000000, 6.88],
                                                ['Biaya Dibayar Dimuka', 45000000, 1.13],
                                            ];
                                            $totalCurrentAssets = 1101780000;
                                        @endphp

                                        @foreach ($currentAssets as $item)
                                            <tr>
                                                <td>{{ $item[0] }}</td>
                                                <td class="text-end">{{ number_format($item[1], 0, ',', '.') }}</td>
                                                <td class="text-end">{{ $item[2] }}%</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><strong>Total Aset Lancar</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalCurrentAssets, 0, ',', '.') }}</strong></td>
                                            <td class="text-end"><strong>27.56%</strong></td>
                                        </tr>

                                        <tr class="bg-light">
                                            <td colspan="3"><strong>Aset Tidak Lancar</strong></td>
                                        </tr>

                                        @php
                                            $nonCurrentAssets = [
                                                ['Tanah', 1250000000, 31.25],
                                                ['Bangunan', 1500000000, 37.5],
                                                ['Mesin & Peralatan', 850000000, 21.25],
                                                ['Kendaraan', 350000000, 8.75],
                                                ['Akumulasi Penyusutan', -550000000, -13.75],
                                            ];
                                            $totalNonCurrentAssets = 3400000000;
                                        @endphp

                                        @foreach ($nonCurrentAssets as $item)
                                            <tr>
                                                <td>{{ $item[0] }}</td>
                                                <td class="text-end">{{ number_format($item[1], 0, ',', '.') }}</td>
                                                <td class="text-end">{{ $item[2] }}%</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><strong>Total Aset Tidak Lancar</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalNonCurrentAssets, 0, ',', '.') }}</strong>
                                            </td>
                                            <td class="text-end"><strong>85.00%</strong></td>
                                        </tr>

                                        <tr class="table-primary">
                                            <td><strong>TOTAL ASET</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalCurrentAssets + $totalNonCurrentAssets, 0, ',', '.') }}</strong>
                                            </td>
                                            <td class="text-end"><strong>100%</strong></td>
                                        </tr>

                                        <tr class="bg-light">
                                            <td colspan="3"><strong>LIABILITAS & EKUITAS</strong></td>
                                        </tr>
                                        <tr class="bg-light">
                                            <td colspan="3"><strong>Liabilitas Jangka Pendek</strong></td>
                                        </tr>

                                        @php
                                            $currentLiabilities = [
                                                ['Utang Usaha', 175000000, 4.38],
                                                ['Utang Pajak', 45000000, 1.13],
                                                ['Beban Akrual', 35000000, 0.88],
                                                ['Utang Jangka Panjang Jatuh Tempo', 120000000, 3.0],
                                            ];
                                            $totalCurrentLiabilities = 375000000;
                                        @endphp

                                        @foreach ($currentLiabilities as $item)
                                            <tr>
                                                <td>{{ $item[0] }}</td>
                                                <td class="text-end">{{ number_format($item[1], 0, ',', '.') }}</td>
                                                <td class="text-end">{{ $item[2] }}%</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><strong>Total Liabilitas Jangka Pendek</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalCurrentLiabilities, 0, ',', '.') }}</strong>
                                            </td>
                                            <td class="text-end"><strong>9.38%</strong></td>
                                        </tr>

                                        <tr class="bg-light">
                                            <td colspan="3"><strong>Liabilitas Jangka Panjang</strong></td>
                                        </tr>

                                        @php
                                            $nonCurrentLiabilities = [
                                                ['Utang Bank', 850000000, 21.25],
                                                ['Utang Obligasi', 250000000, 6.25],
                                                ['Liabilitas Imbalan Kerja', 125000000, 3.13],
                                            ];
                                            $totalNonCurrentLiabilities = 1225000000;
                                        @endphp

                                        @foreach ($nonCurrentLiabilities as $item)
                                            <tr>
                                                <td>{{ $item[0] }}</td>
                                                <td class="text-end">{{ number_format($item[1], 0, ',', '.') }}</td>
                                                <td class="text-end">{{ $item[2] }}%</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><strong>Total Liabilitas Jangka Panjang</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalNonCurrentLiabilities, 0, ',', '.') }}</strong>
                                            </td>
                                            <td class="text-end"><strong>30.63%</strong></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Total Liabilitas</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalCurrentLiabilities + $totalNonCurrentLiabilities, 0, ',', '.') }}</strong>
                                            </td>
                                            <td class="text-end"><strong>40.00%</strong></td>
                                        </tr>

                                        <tr class="bg-light">
                                            <td colspan="3"><strong>Ekuitas</strong></td>
                                        </tr>

                                        @php
                                            $equity = [
                                                ['Modal Disetor', 2000000000, 50.0],
                                                ['Saldo Laba', 901780000, 22.54],
                                            ];
                                            $totalEquity = 2901780000;
                                        @endphp

                                        @foreach ($equity as $item)
                                            <tr>
                                                <td>{{ $item[0] }}</td>
                                                <td class="text-end">{{ number_format($item[1], 0, ',', '.') }}</td>
                                                <td class="text-end">{{ $item[2] }}%</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><strong>Total Ekuitas</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalEquity, 0, ',', '.') }}</strong></td>
                                            <td class="text-end"><strong>72.54%</strong></td>
                                        </tr>

                                        <tr class="table-primary">
                                            <td><strong>TOTAL LIABILITAS & EKUITAS</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalCurrentLiabilities + $totalNonCurrentLiabilities + $totalEquity, 0, ',', '.') }}</strong>
                                            </td>
                                            <td class="text-end"><strong>100%</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Cash Flow Tab -->
                        <div class="tab-pane" id="tabs-cash-flow">
                            <h4>Laporan Arus Kas</h4>
                            <p class="text-muted">Periode: 1 Jan 2023 - 31 Des 2023</p>

                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th>Keterangan</th>
                                            <th class="text-end">Jumlah (Rp)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-light">
                                            <td colspan="2"><strong>ARUS KAS DARI AKTIVITAS OPERASI</strong></td>
                                        </tr>

                                        @php
                                            $operatingCashFlows = [
                                                ['Penerimaan dari Pelanggan', 1175000000],
                                                ['Pembayaran kepada Pemasok', -625000000],
                                                ['Pembayaran kepada Karyawan', -240000000],
                                                ['Pembayaran Bunga', -10000000],
                                                ['Pembayaran Pajak Penghasilan', -87000000],
                                                ['Penerimaan Operasional Lainnya', 25000000],
                                                ['Pembayaran Operasional Lainnya', -35000000],
                                            ];
                                            $totalOperatingCashFlow = 203000000;
                                        @endphp

                                        @foreach ($operatingCashFlows as $item)
                                            <tr>
                                                <td>{{ $item[0] }}</td>
                                                <td class="text-end">{{ number_format($item[1], 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><strong>Kas Bersih dari Aktivitas Operasi</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalOperatingCashFlow, 0, ',', '.') }}</strong>
                                            </td>
                                        </tr>

                                        <tr class="bg-light">
                                            <td colspan="2"><strong>ARUS KAS DARI AKTIVITAS INVESTASI</strong></td>
                                        </tr>

                                        @php
                                            $investingCashFlows = [
                                                ['Pembelian Aset Tetap', -150000000],
                                                ['Penjualan Aset Tetap', 35000000],
                                                ['Penerimaan Bunga', 5000000],
                                            ];
                                            $totalInvestingCashFlow = -110000000;
                                        @endphp

                                        @foreach ($investingCashFlows as $item)
                                            <tr>
                                                <td>{{ $item[0] }}</td>
                                                <td class="text-end">{{ number_format($item[1], 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><strong>Kas Bersih dari Aktivitas Investasi</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalInvestingCashFlow, 0, ',', '.') }}</strong>
                                            </td>
                                        </tr>

                                        <tr class="bg-light">
                                            <td colspan="2"><strong>ARUS KAS DARI AKTIVITAS PENDANAAN</strong></td>
                                        </tr>

                                        @php
                                            $financingCashFlows = [
                                                ['Penerimaan dari Pinjaman Bank', 200000000],
                                                ['Pembayaran Pinjaman Bank', -120000000],
                                                ['Pembayaran Dividen', -75000000],
                                            ];
                                            $totalFinancingCashFlow = 5000000;
                                        @endphp

                                        @foreach ($financingCashFlows as $item)
                                            <tr>
                                                <td>{{ $item[0] }}</td>
                                                <td class="text-end">{{ number_format($item[1], 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td><strong>Kas Bersih dari Aktivitas Pendanaan</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalFinancingCashFlow, 0, ',', '.') }}</strong>
                                            </td>
                                        </tr>

                                        <tr class="table-info">
                                            <td><strong>KENAIKAN (PENURUNAN) BERSIH KAS & SETARA KAS</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format($totalOperatingCashFlow + $totalInvestingCashFlow + $totalFinancingCashFlow, 0, ',', '.') }}</strong>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Kas & Setara Kas Awal Tahun</td>
                                            <td class="text-end">{{ number_format(358780000, 0, ',', '.') }}</td>
                                        </tr>

                                        <tr class="table-primary">
                                            <td><strong>KAS & SETARA KAS AKHIR TAHUN</strong></td>
                                            <td class="text-end">
                                                <strong>{{ number_format(456780000, 0, ',', '.') }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Tax Reports Tab -->
                        <div class="tab-pane" id="tabs-tax-reports">
                            <h4>Laporan Pajak</h4>
                            <p class="text-muted">Periode: 1 Jan 2023 - 31 Des 2023</p>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Ringkasan Pajak</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-vcenter">
                                                    <tbody>
                                                        <tr>
                                                            <td>Pajak Penghasilan Badan (PPh 25)</td>
                                                            <td class="text-end">Rp 87.000.000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pajak Pertambahan Nilai (PPN)</td>
                                                            <td class="text-end">Rp 125.000.000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PPh Pasal 21 (Karyawan)</td>
                                                            <td class="text-end">Rp 45.000.000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PPh Pasal 23</td>
                                                            <td class="text-end">Rp 12.500.000</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PPh Pasal 4(2)</td>
                                                            <td class="text-end">Rp 8.750.000</td>
                                                        </tr>
                                                        <tr class="table-light">
                                                            <td><strong>Total Pajak</strong></td>
                                                            <td class="text-end"><strong>Rp 278.250.000</strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Status Pelaporan Pajak</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-vcenter">
                                                    <thead>
                                                        <tr>
                                                            <th>Jenis Pajak</th>
                                                            <th>Periode</th>
                                                            <th>Status</th>
                                                            <th>Tanggal Lapor</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>PPh Badan</td>
                                                            <td>2023</td>
                                                            <td><span class="badge bg-success">Dilaporkan</span></td>
                                                            <td>25/04/2023</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PPN</td>
                                                            <td>Des 2023</td>
                                                            <td><span class="badge bg-success">Dilaporkan</span></td>
                                                            <td>15/01/2024</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PPh 21</td>
                                                            <td>Des 2023</td>
                                                            <td><span class="badge bg-success">Dilaporkan</span></td>
                                                            <td>10/01/2024</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PPh 23</td>
                                                            <td>Des 2023</td>
                                                            <td><span class="badge bg-success">Dilaporkan</span></td>
                                                            <td>12/01/2024</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Pajak Bulanan</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Bulan</th>
                                                    <th class="text-end">PPh 21</th>
                                                    <th class="text-end">PPh 23</th>
                                                    <th class="text-end">PPh 4(2)</th>
                                                    <th class="text-end">PPN</th>
                                                    <th class="text-end">PPh 25</th>
                                                    <th class="text-end">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $months = [
                                                        'Jan',
                                                        'Feb',
                                                        'Mar',
                                                        'Apr',
                                                        'Mei',
                                                        'Jun',
                                                        'Jul',
                                                        'Ags',
                                                        'Sep',
                                                        'Okt',
                                                        'Nov',
                                                        'Des',
                                                    ];
                                                    $taxData = [];

                                                    // Generate random tax data for each month
                                                    foreach ($months as $index => $month) {
                                                        $pph21 = rand(3000000, 4500000);
                                                        $pph23 = rand(800000, 1200000);
                                                        $pph42 = rand(500000, 900000);
                                                        $ppn = rand(8000000, 12000000);
                                                        $pph25 = 7250000; // Equal monthly installments
                                                        $total = $pph21 + $pph23 + $pph42 + $ppn + $pph25;

                                                        $taxData[] = [
                                                            'month' => $month,
                                                            'pph21' => $pph21,
                                                            'pph23' => $pph23,
                                                            'pph42' => $pph42,
                                                            'ppn' => $ppn,
                                                            'pph25' => $pph25,
                                                            'total' => $total,
                                                        ];
                                                    }
                                                @endphp

                                                @foreach ($taxData as $data)
                                                    <tr>
                                                        <td>{{ $data['month'] }}</td>
                                                        <td class="text-end">
                                                            {{ number_format($data['pph21'], 0, ',', '.') }}</td>
                                                        <td class="text-end">
                                                            {{ number_format($data['pph23'], 0, ',', '.') }}</td>
                                                        <td class="text-end">
                                                            {{ number_format($data['pph42'], 0, ',', '.') }}</td>
                                                        <td class="text-end">
                                                            {{ number_format($data['ppn'], 0, ',', '.') }}</td>
                                                        <td class="text-end">
                                                            {{ number_format($data['pph25'], 0, ',', '.') }}</td>
                                                        <td class="text-end">
                                                            <strong>{{ number_format($data['total'], 0, ',', '.') }}</strong>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Budget Tab -->
                        <div class="tab-pane" id="tabs-budget">
                            <h4>Anggaran & Realisasi</h4>
                            <p class="text-muted">Periode: 1 Jan 2023 - 31 Des 2023</p>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card card-sm">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <span class="bg-blue text-white avatar">
                                                                <i class="ti ti-report-money"></i>
                                                            </span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="font-weight-medium">
                                                                Total Anggaran
                                                            </div>
                                                            <div class="text-muted">
                                                                Rp 1.200.000.000
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card card-sm">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <span class="bg-green text-white avatar">
                                                                <i class="ti ti-cash"></i>
                                                            </span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="font-weight-medium">
                                                                Total Realisasi
                                                            </div>
                                                            <div class="text-muted">
                                                                Rp 1.148.110.000
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card card-sm">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <span class="bg-yellow text-white avatar">
                                                                <i class="ti ti-percentage"></i>
                                                            </span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="font-weight-medium">
                                                                Persentase Realisasi
                                                            </div>
                                                            <div class="text-muted">
                                                                95.68%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Anggaran vs Realisasi per Departemen</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Departemen</th>
                                                    <th class="text-end">Anggaran</th>
                                                    <th class="text-end">Realisasi</th>
                                                    <th class="text-end">Selisih</th>
                                                    <th class="text-end">% Realisasi</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $departments = [
                                                        [
                                                            'name' => 'Produksi',
                                                            'budget' => 450000000,
                                                            'actual' => 437500000,
                                                        ],
                                                        [
                                                            'name' => 'Pemasaran',
                                                            'budget' => 175000000,
                                                            'actual' => 168000000,
                                                        ],
                                                        [
                                                            'name' => 'Administrasi & Umum',
                                                            'budget' => 120000000,
                                                            'actual' => 115000000,
                                                        ],
                                                        [
                                                            'name' => 'Sumber Daya Manusia',
                                                            'budget' => 85000000,
                                                            'actual' => 82500000,
                                                        ],
                                                        [
                                                            'name' => 'Riset & Pengembangan',
                                                            'budget' => 65000000,
                                                            'actual' => 70000000,
                                                        ],
                                                        [
                                                            'name' => 'Pemeliharaan',
                                                            'budget' => 95000000,
                                                            'actual' => 90110000,
                                                        ],
                                                        [
                                                            'name' => 'Logistik & Pengiriman',
                                                            'budget' => 110000000,
                                                            'actual' => 105000000,
                                                        ],
                                                        [
                                                            'name' => 'Teknologi Informasi',
                                                            'budget' => 100000000,
                                                            'actual' => 80000000,
                                                        ],
                                                    ];

                                                    $totalBudget = 0;
                                                    $totalActual = 0;

                                                    foreach ($departments as $dept) {
                                                        $totalBudget += $dept['budget'];
                                                        $totalActual += $dept['actual'];
                                                    }
                                                @endphp

                                                @foreach ($departments as $dept)
                                                    @php
                                                        $diff = $dept['budget'] - $dept['actual'];
                                                        $percentage = round(
                                                            ($dept['actual'] / $dept['budget']) * 100,
                                                            2,
                                                        );

                                                        if ($percentage <= 90) {
                                                            $status =
                                                                '<span class="badge bg-success">Di Bawah Anggaran</span>';
                                                        } elseif ($percentage > 90 && $percentage <= 100) {
                                                            $status =
                                                                '<span class="badge bg-info">Sesuai Anggaran</span>';
                                                        } else {
                                                            $status =
                                                                '<span class="badge bg-danger">Melebihi Anggaran</span>';
                                                        }
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $dept['name'] }}</td>
                                                        <td class="text-end">
                                                            {{ number_format($dept['budget'], 0, ',', '.') }}</td>
                                                        <td class="text-end">
                                                            {{ number_format($dept['actual'], 0, ',', '.') }}</td>
                                                        <td class="text-end">{{ number_format($diff, 0, ',', '.') }}</td>
                                                        <td class="text-end">{{ $percentage }}%</td>
                                                        <td>{!! $status !!}</td>
                                                    </tr>
                                                @endforeach

                                                @php
                                                    $totalDiff = $totalBudget - $totalActual;
                                                    $totalPercentage = round(($totalActual / $totalBudget) * 100, 2);

                                                    if ($totalPercentage <= 90) {
                                                        $totalStatus =
                                                            '<span class="badge bg-success">Di Bawah Anggaran</span>';
                                                    } elseif ($totalPercentage > 90 && $totalPercentage <= 100) {
                                                        $totalStatus =
                                                            '<span class="badge bg-info">Sesuai Anggaran</span>';
                                                    } else {
                                                        $totalStatus =
                                                            '<span class="badge bg-danger">Melebihi Anggaran</span>';
                                                    }
                                                @endphp

                                                <tr class="table-light">
                                                    <td><strong>TOTAL</strong></td>
                                                    <td class="text-end">
                                                        <strong>{{ number_format($totalBudget, 0, ',', '.') }}</strong>
                                                    </td>
                                                    <td class="text-end">
                                                        <strong>{{ number_format($totalActual, 0, ',', '.') }}</strong>
                                                    </td>
                                                    <td class="text-end">
                                                        <strong>{{ number_format($totalDiff, 0, ',', '.') }}</strong></td>
                                                    <td class="text-end"><strong>{{ $totalPercentage }}%</strong></td>
                                                    <td>{!! $totalStatus !!}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">Tren Anggaran & Realisasi Bulanan</h3>
                                </div>
                                <div class="card-body">
                                    <div id="budget-trend-chart" style="height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Financial Ratios Card -->
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Rasio Keuangan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader">Rasio Lancar</div>
                                        <div class="ms-auto lh-1">
                                            <div class="text-muted">Likuiditas</div>
                                        </div>
                                    </div>
                                    <div class="h1 mb-3">2.94</div>
                                    <div class="d-flex mb-2">
                                        <div>Aset Lancar / Kewajiban Lancar</div>
                                        <div class="ms-auto">
                                            <span class="text-green d-inline-flex align-items-center lh-1">
                                                <i class="ti ti-trending-up"></i> Baik
                                            </span>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" style="width: 85%" role="progressbar"
                                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                            aria-label="85% Complete">
                                            <span class="visually-hidden">85% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader">ROA</div>
                                        <div class="ms-auto lh-1">
                                            <div class="text-muted">Profitabilitas</div>
                                        </div>
                                    </div>
                                    <div class="h1 mb-3">8.92%</div>
                                    <div class="d-flex mb-2">
                                        <div>Laba Bersih / Total Aset</div>
                                        <div class="ms-auto">
                                            <span class="text-green d-inline-flex align-items-center lh-1">
                                                <i class="ti ti-trending-up"></i> Baik
                                            </span>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" style="width: 75%" role="progressbar"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                            aria-label="75% Complete">
                                            <span class="visually-hidden">75% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader">Debt to Equity</div>
                                        <div class="ms-auto lh-1">
                                            <div class="text-muted">Solvabilitas</div>
                                        </div>
                                    </div>
                                    <div class="h1 mb-3">0.55</div>
                                    <div class="d-flex mb-2">
                                        <div>Total Hutang / Total Ekuitas</div>
                                        <div class="ms-auto">
                                            <span class="text-green d-inline-flex align-items-center lh-1">
                                                <i class="ti ti-trending-up"></i> Baik
                                            </span>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" style="width: 80%" role="progressbar"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                            aria-label="80% Complete">
                                            <span class="visually-hidden">80% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader">Profit Margin</div>
                                        <div class="ms-auto lh-1">
                                            <div class="text-muted">Profitabilitas</div>
                                        </div>
                                    </div>
                                    <div class="h1 mb-3">20.94%</div>
                                    <div class="d-flex mb-2">
                                        <div>Laba Bersih / Pendapatan</div>
                                        <div class="ms-auto">
                                            <span class="text-green d-inline-flex align-items-center lh-1">
                                                <i class="ti ti-trending-up"></i> Baik
                                            </span>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" style="width: 70%" role="progressbar"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                            aria-label="70% Complete">
                                            <span class="visually-hidden">70% Complete</span>
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

    <!-- Export Report Modal -->
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Export Laporan Keuangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Jenis Laporan</label>
                        <select class="form-select">
                            <option value="all">Semua Laporan</option>
                            <option value="income">Laporan Laba Rugi</option>
                            <option value="balance">Neraca Keuangan</option>
                            <option value="cash-flow">Arus Kas</option>
                            <option value="tax">Laporan Pajak</option>
                            <option value="budget">Anggaran & Realisasi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Format File</label>
                        <select class="form-select">
                            <option value="pdf">PDF</option>
                            <option value="excel">Excel</option>
                            <option value="csv">CSV</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Dari Tanggal</label>
                                <input type="date" class="form-control" value="{{ date('Y-m-01') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Sampai Tanggal</label>
                                <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-label">Sertakan grafik dan visualisasi</span>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-label">Sertakan analisis rasio keuangan</span>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <span class="form-check-label">Sertakan catatan keuangan</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </a>
                    <a href="#" class="btn btn-primary ms-auto">
                        <i class="ti ti-file-export me-2"></i>
                        Export Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Revenue vs Expenses Chart
            var revenueExpensesOptions = {
                series: [{
                    name: 'Pendapatan',
                    data: [105000000, 115000000, 98000000, 107000000, 112000000, 109000000,
                        104000000, 99000000, 95000000, 110000000, 115000000, 125000000
                    ]
                }, {
                    name: 'Pengeluaran',
                    data: [75000000, 78000000, 72000000, 77000000, 82000000, 79000000,
                        74000000, 69000000, 75000000, 80000000, 85000000, 95000000
                    ]
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    stacked: false,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov',
                        'Des'
                    ],
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return (value / 1000000).toFixed(0) + ' Jt';
                        }
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                },
                colors: ['#206bc4', '#cd201f']
            };

            var revenueExpensesChart = new ApexCharts(document.querySelector("#revenue-expenses-chart"),
                revenueExpensesOptions);
            revenueExpensesChart.render();

            // Expense Distribution Chart
            var expenseDistributionOptions = {
                series: [60, 15, 10, 5, 10],
                chart: {
                    type: 'donut',
                    height: 300
                },
                labels: ['Produksi', 'Administrasi', 'Pemasaran', 'R&D', 'Lainnya'],
                colors: ['#206bc4', '#4299e1', '#ae3ec9', '#f76707', '#d63939'],
                legend: {
                    position: 'bottom'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return value + '%';
                        }
                    }
                }
            };

            var expenseDistributionChart = new ApexCharts(document.querySelector("#expense-distribution-chart"),
                expenseDistributionOptions);
            expenseDistributionChart.render();

            // Budget Trend Chart
            var budgetTrendOptions = {
                series: [{
                    name: 'Anggaran',
                    data: [100000000, 100000000, 100000000, 100000000, 100000000, 100000000,
                        100000000, 100000000, 100000000, 100000000, 100000000, 100000000
                    ]
                }, {
                    name: 'Realisasi',
                    data: [95000000, 97000000, 98000000, 94000000, 96000000, 99000000,
                        92000000, 93000000, 95000000, 97000000, 96000000, 96110000
                    ]
                }],
                chart: {
                    height: 300,
                    type: 'line',
                    toolbar: {
                        show: false
                    }
                },
                stroke: {
                    width: [4, 4],
                    curve: 'smooth',
                    dashArray: [0, 0]
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov',
                        'Des'
                    ],
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return (value / 1000000).toFixed(0) + ' Jt';
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                },
                grid: {
                    borderColor: '#e7e7e7',
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        opacity: 0.5
                    },
                },
                markers: {
                    size: 5
                },
                colors: ['#206bc4', '#4ecc48']
            };

            var budgetTrendChart = new ApexCharts(document.querySelector("#budget-trend-chart"),
            budgetTrendOptions);
            budgetTrendChart.render();
        });
    </script>
@endsection
