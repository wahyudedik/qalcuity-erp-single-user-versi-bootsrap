@extends('layouts.app')

@section('title', 'Daftar Kontrak')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none mt-1 mb-2">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Daftar Kontrak
                    </h2>
                    <div class="text-muted mt-1">Menampilkan {{ isset($contracts) ? count($contracts) : 0 }} kontrak</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <div class="me-3">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Cari kontrak...">
                            </div>
                        </div>
                        <a href="{{ route('sales.contract.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus me-2"></i>
                            Buat Kontrak Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="#tabs-all" class="nav-link active" data-bs-toggle="tab">
                            <i class="ti ti-list me-2"></i>
                            Semua
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-active" class="nav-link" data-bs-toggle="tab">
                            <i class="ti ti-check me-2"></i>
                            Aktif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-pending" class="nav-link" data-bs-toggle="tab">
                            <i class="ti ti-clock me-2"></i>
                            Menunggu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-completed" class="nav-link" data-bs-toggle="tab">
                            <i class="ti ti-circle-check me-2"></i>
                            Selesai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-cancelled" class="nav-link" data-bs-toggle="tab">
                            <i class="ti ti-x me-2"></i>
                            Dibatalkan
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="tabs-all">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>No. Kontrak</th>
                                        <th>Pelanggan</th>
                                        <th>Proyek</th>
                                        <th>Tanggal</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="{{ route('sales.contract.detail', ['id' => 1]) }}">C-2023-0001</a>
                                        </td>
                                        <td>PT Pembangunan Jaya</td>
                                        <td>Pembangunan Gedung Perkantoran Jaya Tower</td>
                                        <td>01/11/2023 - 30/04/2024</td>
                                        <td>Rp 589.410.000</td>
                                        <td>
                                            <span class="badge bg-success">Aktif</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('sales.contract.detail', ['id' => 1]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('sales.contract.edit', ['id' => 1]) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ route('sales.contract.detail', ['id' => 2]) }}">C-2023-0002</a>
                                        </td>
                                        <td>PT Wijaya Karya</td>
                                        <td>Pembangunan Jalan Tol Cikampek-Purwakarta</td>
                                        <td>15/10/2023 - 15/04/2024</td>
                                        <td>Rp 1.250.000.000</td>
                                        <td>
                                            <span class="badge bg-success">Aktif</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('sales.contract.detail', ['id' => 2]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('sales.contract.edit', ['id' => 2]) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ route('sales.contract.detail', ['id' => 3]) }}">C-2023-0003</a>
                                        </td>
                                        <td>PT Adhi Karya</td>
                                        <td>Pembangunan Apartemen Grand Residence</td>
                                        <td>01/09/2023 - 28/02/2024</td>
                                        <td>Rp 875.500.000</td>
                                        <td>
                                            <span class="badge bg-success">Aktif</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('sales.contract.detail', ['id' => 3]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('sales.contract.edit', ['id' => 3]) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ route('sales.contract.detail', ['id' => 4]) }}">C-2023-0004</a>
                                        </td>
                                        <td>PT Total Bangun Persada</td>
                                        <td>Renovasi Mall Central Park</td>
                                        <td>15/11/2023 - 15/02/2024</td>
                                        <td>Rp 450.000.000</td>
                                        <td>
                                            <span class="badge bg-yellow">Menunggu</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('sales.contract.detail', ['id' => 4]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('sales.contract.edit', ['id' => 4]) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ route('sales.contract.detail', ['id' => 5]) }}">C-2023-0005</a>
                                        </td>
                                        <td>PT Hutama Karya</td>
                                        <td>Pembangunan Jembatan Suramadu Extension</td>
                                        <td>01/08/2023 - 31/10/2023</td>
                                        <td>Rp 2.150.000.000</td>
                                        <td>
                                            <span class="badge bg-green">Selesai</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('sales.contract.detail', ['id' => 5]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('sales.contract.edit', ['id' => 5]) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ route('sales.contract.detail', ['id' => 6]) }}">C-2023-0006</a>
                                        </td>
                                        <td>PT Nusa Konstruksi Enjiniring</td>
                                        <td>Pembangunan Perumahan Green Valley</td>
                                        <td>01/07/2023 - 30/09/2023</td>
                                        <td>Rp 750.000.000</td>
                                        <td>
                                            <span class="badge bg-red">Dibatalkan</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('sales.contract.detail', ['id' => 6]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('sales.contract.edit', ['id' => 6]) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-active">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>No. Kontrak</th>
                                        <th>Pelanggan</th>
                                        <th>Proyek</th>
                                        <th>Tanggal</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="{{ route('sales.contract.detail', ['id' => 1]) }}">C-2023-0001</a>
                                        </td>
                                        <td>PT Pembangunan Jaya</td>
                                        <td>Pembangunan Gedung Perkantoran Jaya Tower</td>
                                        <td>01/11/2023 - 30/04/2024</td>
                                        <td>Rp 589.410.000</td>
                                        <td>
                                            <span class="badge bg-success">Aktif</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('sales.contract.detail', ['id' => 1]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('sales.contract.edit', ['id' => 1]) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ route('sales.contract.detail', ['id' => 2]) }}">C-2023-0002</a>
                                        </td>
                                        <td>PT Wijaya Karya</td>
                                        <td>Pembangunan Jalan Tol Cikampek-Purwakarta</td>
                                        <td>15/10/2023 - 15/04/2024</td>
                                        <td>Rp 1.250.000.000</td>
                                        <td>
                                            <span class="badge bg-success">Aktif</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('sales.contract.detail', ['id' => 2]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('sales.contract.edit', ['id' => 2]) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ route('sales.contract.detail', ['id' => 3]) }}">C-2023-0003</a>
                                        </td>
                                        <td>PT Adhi Karya</td>
                                        <td>Pembangunan Apartemen Grand Residence</td>
                                        <td>01/09/2023 - 28/02/2024</td>
                                        <td>Rp 875.500.000</td>
                                        <td>
                                            <span class="badge bg-success">Aktif</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('sales.contract.detail', ['id' => 3]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('sales.contract.edit', ['id' => 3]) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-pending">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>No. Kontrak</th>
                                        <th>Pelanggan</th>
                                        <th>Proyek</th>
                                        <th>Tanggal</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="{{ route('sales.contract.detail', ['id' => 4]) }}">C-2023-0004</a>
                                        </td>
                                        <td>PT Total Bangun Persada</td>
                                        <td>Renovasi Mall Central Park</td>
                                        <td>15/11/2023 - 15/02/2024</td>
                                        <td>Rp 450.000.000</td>
                                        <td>
                                            <span class="badge bg-yellow">Menunggu</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('sales.contract.detail', ['id' => 4]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('sales.contract.edit', ['id' => 4]) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-completed">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>No. Kontrak</th>
                                        <th>Pelanggan</th>
                                        <th>Proyek</th>
                                        <th>Tanggal</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="{{ route('sales.contract.detail', ['id' => 5]) }}">C-2023-0005</a>
                                        </td>
                                        <td>PT Hutama Karya</td>
                                        <td>Pembangunan Jembatan Suramadu Extension</td>
                                        <td>01/08/2023 - 31/10/2023</td>
                                        <td>Rp 2.150.000.000</td>
                                        <td>
                                            <span class="badge bg-green">Selesai</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('sales.contract.detail', ['id' => 5]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('sales.contract.edit', ['id' => 5]) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-cancelled">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>No. Kontrak</th>
                                        <th>Pelanggan</th>
                                        <th>Proyek</th>
                                        <th>Tanggal</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="{{ route('sales.contract.detail', ['id' => 6]) }}">C-2023-0006</a>
                                        </td>
                                        <td>PT Nusa Konstruksi Enjiniring</td>
                                        <td>Pembangunan Perumahan Green Valley</td>
                                        <td>01/07/2023 - 30/09/2023</td>
                                        <td>Rp 750.000.000</td>
                                        <td>
                                            <span class="badge bg-red">Dibatalkan</span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="{{ route('sales.contract.detail', ['id' => 6]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="{{ route('sales.contract.edit', ['id' => 6]) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                            </div>
                                        </td>
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
                <h3 class="card-title">Statistik Kontrak</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-primary text-white avatar">
                                            <i class="ti ti-file-invoice"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            6 Kontrak
                                        </div>
                                        <div class="text-muted">
                                            Total Kontrak
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-green text-white avatar">
                                            <i class="ti ti-check"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            3 Kontrak
                                        </div>
                                        <div class="text-muted">
                                            Kontrak Aktif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-yellow text-white avatar">
                                            <i class="ti ti-clock"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            1 Kontrak
                                        </div>
                                        <div class="text-muted">
                                            Menunggu Persetujuan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="bg-azure text-white avatar">
                                            <i class="ti ti-cash"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">
                                            Rp 6.064.910.000
                                        </div>
                                        <div class="text-muted">
                                            Total Nilai Kontrak
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Kontrak Berdasarkan Status</h3>
                            </div>
                            <div class="card-body">
                                <div id="chart-status" style="height: 250px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Nilai Kontrak per Bulan</h3>
                            </div>
                            <div class="card-body">
                                <div id="chart-monthly" style="height: 250px;"></div>
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
            // Chart for contract status
            var statusOptions = {
                series: [3, 1, 1, 1],
                chart: {
                    type: 'donut',
                    height: 250,
                },
                labels: ['Aktif', 'Menunggu', 'Selesai', 'Dibatalkan'],
                colors: ['#2fb344', '#f59f00', '#206bc4', '#d63939'],
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
                }]
            };

            var statusChart = new ApexCharts(document.querySelector("#chart-status"), statusOptions);
            statusChart.render();

            // Chart for monthly contract value
            var monthlyOptions = {
                series: [{
                    name: 'Nilai Kontrak',
                    data: [750000000, 2150000000, 875500000, 1250000000, 1039410000, 0]
                }],
                chart: {
                    type: 'bar',
                    height: 250,
                    toolbar: {
                        show: false,
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
                    categories: ['Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return 'Rp ' + (value / 1000000000).toFixed(1) + ' M';
                        }
                    }
                },
                fill: {
                    opacity: 1,
                    colors: ['#206bc4']
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return 'Rp ' + new Intl.NumberFormat('id-ID').format(val);
                        }
                    }
                }
            };

            var monthlyChart = new ApexCharts(document.querySelector("#chart-monthly"), monthlyOptions);
            monthlyChart.render();
        });
    </script>
@endsection
