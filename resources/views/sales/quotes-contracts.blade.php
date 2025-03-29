@extends('layouts.app')

@section('title', 'Penawaran & Kontrak')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Penawaran & Kontrak
                    </h2>
                    <div class="text-muted mt-1 mb-2">Kelola penawaran dan kontrak penjualan</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('sales.quote.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus"></i>
                            Buat Penawaran Baru
                        </a>
                        <a href="{{ route('sales.quote.create') }}" class="btn btn-primary d-sm-none">
                            <i class="ti ti-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="#quotes" class="nav-link active" data-bs-toggle="tab">
                            <i class="ti ti-file-invoice me-2"></i>
                            Penawaran
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#contracts" class="nav-link" data-bs-toggle="tab">
                            <i class="ti ti-file-contract me-2"></i>
                            Kontrak
                        </a>
                    </li>
                </ul>
                <div class="ms-auto">
                    <a href="{{ route('sales.contracts') }}" class="btn btn-link">
                        <i class="ti ti-external-link me-1"></i>
                        Lihat Semua Kontrak
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <!-- Quotes Tab -->
                    <div class="tab-pane active show" id="quotes">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="d-flex gap-2">
                                <select class="form-select" aria-label="Filter status">
                                    <option selected value="">Semua Status</option>
                                    <option value="draft">Draft</option>
                                    <option value="sent">Terkirim</option>
                                    <option value="approved">Disetujui</option>
                                    <option value="rejected">Ditolak</option>
                                    <option value="expired">Kedaluwarsa</option>
                                </select>
                                <select class="form-select" aria-label="Filter date">
                                    <option selected value="">Semua Tanggal</option>
                                    <option value="today">Hari Ini</option>
                                    <option value="week">Minggu Ini</option>
                                    <option value="month">Bulan Ini</option>
                                    <option value="quarter">Kuartal Ini</option>
                                    <option value="year">Tahun Ini</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="ti ti-search"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Cari penawaran...">
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>No. Penawaran</th>
                                        <th>Pelanggan</th>
                                        <th>Tanggal</th>
                                        <th>Berlaku Hingga</th>
                                        <th>Nilai</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $quotes = [
                                            [
                                                'id' => 'Q-2023-0001',
                                                'customer' => 'PT Pembangunan Jaya',
                                                'date' => '2023-10-15',
                                                'valid_until' => '2023-11-15',
                                                'value' => 125000000,
                                                'status' => 'approved',
                                            ],
                                            [
                                                'id' => 'Q-2023-0002',
                                                'customer' => 'PT Wijaya Karya',
                                                'date' => '2023-10-18',
                                                'valid_until' => '2023-11-18',
                                                'value' => 87500000,
                                                'status' => 'sent',
                                            ],
                                            [
                                                'id' => 'Q-2023-0003',
                                                'customer' => 'PT Adhi Karya',
                                                'date' => '2023-10-20',
                                                'valid_until' => '2023-11-20',
                                                'value' => 210000000,
                                                'status' => 'draft',
                                            ],
                                            [
                                                'id' => 'Q-2023-0004',
                                                'customer' => 'PT Hutama Karya',
                                                'date' => '2023-10-22',
                                                'valid_until' => '2023-11-22',
                                                'value' => 156000000,
                                                'status' => 'rejected',
                                            ],
                                            [
                                                'id' => 'Q-2023-0005',
                                                'customer' => 'PT Nindya Karya',
                                                'date' => '2023-09-15',
                                                'valid_until' => '2023-10-15',
                                                'value' => 98000000,
                                                'status' => 'expired',
                                            ],
                                        ];

                                        // Generate more dummy data
                                        for ($i = 6; $i <= 15; $i++) {
                                            $statuses = ['draft', 'sent', 'approved', 'rejected', 'expired'];
                                            $companies = [
                                                'PT Semen Indonesia',
                                                'PT Holcim Indonesia',
                                                'PT Indocement',
                                                'PT Conch Cement',
                                                'PT Semen Baturaja',
                                            ];

                                            $quotes[] = [
                                                'id' => 'Q-2023-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                                                'customer' => $companies[array_rand($companies)],
                                                'date' => date('Y-m-d', strtotime('-' . rand(1, 60) . ' days')),
                                                'valid_until' => date('Y-m-d', strtotime('+' . rand(1, 30) . ' days')),
                                                'value' => rand(50, 300) * 1000000,
                                                'status' => $statuses[array_rand($statuses)],
                                            ];
                                        }
                                    @endphp

                                    @foreach ($quotes as $quote)
                                        <tr>
                                            <td>
                                                <a href="{{ route('sales.quote.detail', ['id' => $quote['id']]) }}"
                                                    class="text-reset">
                                                    {{ $quote['id'] }}
                                                </a>
                                            </td>
                                            <td>{{ $quote['customer'] }}</td>
                                            <td>{{ \Carbon\Carbon::parse($quote['date'])->format('d M Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($quote['valid_until'])->format('d M Y') }}</td>
                                            <td>Rp {{ number_format($quote['value'], 0, ',', '.') }}</td>
                                            <td>
                                                @if ($quote['status'] == 'draft')
                                                    <span class="badge bg-secondary">Draft</span>
                                                @elseif($quote['status'] == 'sent')
                                                    <span class="badge bg-info">Terkirim</span>
                                                @elseif($quote['status'] == 'approved')
                                                    <span class="badge bg-success">Disetujui</span>
                                                @elseif($quote['status'] == 'rejected')
                                                    <span class="badge bg-danger">Ditolak</span>
                                                @elseif($quote['status'] == 'expired')
                                                    <span class="badge bg-warning">Kedaluwarsa</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm dropdown-toggle align-text-top"
                                                        data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="{{ route('sales.quote.detail', ['id' => $quote['id']]) }}"
                                                            class="dropdown-item">
                                                            <i class="ti ti-eye me-2"></i>
                                                            Lihat Detail
                                                        </a>
                                                        <a href="{{ route('sales.quote.edit', ['id' => $quote['id']]) }}"
                                                            class="dropdown-item">
                                                            <i class="ti ti-edit me-2"></i>
                                                            Edit
                                                        </a>
                                                        @if ($quote['status'] == 'draft' || $quote['status'] == 'sent')
                                                            <a href="#" class="dropdown-item">
                                                                <i class="ti ti-send me-2"></i>
                                                                Kirim ke Pelanggan
                                                            </a>
                                                        @endif
                                                        @if ($quote['status'] == 'approved')
                                                            <a href="{{ route('sales.contract.create') }}"
                                                                class="dropdown-item">
                                                                <i class="ti ti-plus me-2"></i>
                                                                Buat Kontrak
                                                            </a>
                                                        @endif
                                                        <a href="#" class="dropdown-item">
                                                            <i class="ti ti-printer me-2"></i>
                                                            Cetak
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item text-danger">
                                                            <i class="ti ti-trash me-2"></i>
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div>
                                <p class="m-0 text-muted">Menampilkan 1-15 dari 45 penawaran</p>
                            </div>
                            <ul class="pagination m-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="ti ti-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="ti ti-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contracts Tab -->
                    <div class="tab-pane" id="contracts">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="d-flex gap-2">
                                <select class="form-select" aria-label="Filter status">
                                    <option selected value="">Semua Status</option>
                                    <option value="active">Aktif</option>
                                    <option value="pending">Menunggu Tanda Tangan</option>
                                    <option value="completed">Selesai</option>
                                    <option value="terminated">Dihentikan</option>
                                </select>
                                <select class="form-select" aria-label="Filter date">
                                    <option selected value="">Semua Tanggal</option>
                                    <option value="month">Bulan Ini</option>
                                    <option value="quarter">Kuartal Ini</option>
                                    <option value="year">Tahun Ini</option>
                                </select>
                            </div>
                            <div class="d-flex">
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <i class="ti ti-search"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Cari kontrak...">
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>No. Kontrak</th>
                                        <th>Pelanggan</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Berakhir</th>
                                        <th>Nilai Kontrak</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $contracts = [
                                            [
                                                'id' => 'C-2023-0001',
                                                'customer' => 'PT Pembangunan Jaya',
                                                'start_date' => '2023-10-20',
                                                'end_date' => '2024-04-20',
                                                'value' => 125000000,
                                                'status' => 'active',
                                            ],
                                            [
                                                'id' => 'C-2023-0002',
                                                'customer' => 'PT Wijaya Karya',
                                                'start_date' => '2023-10-25',
                                                'end_date' => '2024-01-25',
                                                'value' => 87500000,
                                                'status' => 'pending',
                                            ],
                                            [
                                                'id' => 'C-2023-0003',
                                                'customer' => 'PT Semen Indonesia',
                                                'start_date' => '2023-09-15',
                                                'end_date' => '2023-12-15',
                                                'value' => 210000000,
                                                'status' => 'active',
                                            ],
                                            [
                                                'id' => 'C-2023-0004',
                                                'customer' => 'PT Holcim Indonesia',
                                                'start_date' => '2023-08-10',
                                                'end_date' => '2023-10-10',
                                                'value' => 156000000,
                                                'status' => 'completed',
                                            ],
                                            [
                                                'id' => 'C-2023-0005',
                                                'customer' => 'PT Indocement',
                                                'start_date' => '2023-07-05',
                                                'end_date' => '2023-09-05',
                                                'value' => 98000000,
                                                'status' => 'terminated',
                                            ],
                                        ];

                                        // Generate more dummy data
                                        for ($i = 6; $i <= 12; $i++) {
                                            $statuses = ['active', 'pending', 'completed', 'terminated'];
                                            $companies = [
                                                'PT Adhi Karya',
                                                'PT Hutama Karya',
                                                'PT Nindya Karya',
                                                'PT Conch Cement',
                                                'PT Semen Baturaja',
                                            ];

                                            $start_date = date('Y-m-d', strtotime('-' . rand(30, 180) . ' days'));
                                            $end_date = date(
                                                'Y-m-d',
                                                strtotime($start_date . ' +' . rand(3, 12) . ' months'),
                                            );

                                            $contracts[] = [
                                                'id' => 'C-2023-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                                                'customer' => $companies[array_rand($companies)],
                                                'start_date' => $start_date,
                                                'end_date' => $end_date,
                                                'value' => rand(50, 300) * 1000000,
                                                'status' => $statuses[array_rand($statuses)],
                                            ];
                                        }
                                    @endphp

                                    @foreach ($contracts as $contract)
                                        <tr>
                                            <td>
                                                <a href="{{ route('sales.contract.detail', ['id' => $contract['id']]) }}"
                                                    class="text-reset">
                                                    {{ $contract['id'] }}
                                                </a>
                                            </td>
                                            <td>{{ $contract['customer'] }}</td>
                                            <td>{{ \Carbon\Carbon::parse($contract['start_date'])->format('d M Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($contract['end_date'])->format('d M Y') }}</td>
                                            <td>Rp {{ number_format($contract['value'], 0, ',', '.') }}</td>
                                            <td>
                                                @if ($contract['status'] == 'active')
                                                    <span class="badge bg-success">Aktif</span>
                                                @elseif($contract['status'] == 'pending')
                                                    <span class="badge bg-warning">Menunggu Tanda Tangan</span>
                                                @elseif($contract['status'] == 'completed')
                                                    <span class="badge bg-info">Selesai</span>
                                                @elseif($contract['status'] == 'terminated')
                                                    <span class="badge bg-danger">Dihentikan</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm dropdown-toggle align-text-top"
                                                        data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="{{ route('sales.contract.detail', ['id' => $contract['id']]) }}"
                                                            class="dropdown-item">
                                                            <i class="ti ti-eye me-2"></i>
                                                            Lihat Detail
                                                        </a>
                                                        @if ($contract['status'] == 'pending')
                                                            <a href="#" class="dropdown-item">
                                                                <i class="ti ti-signature me-2"></i>
                                                                Proses Tanda Tangan
                                                            </a>
                                                        @endif
                                                        @if ($contract['status'] == 'active')
                                                            <a href="#" class="dropdown-item">
                                                                <i class="ti ti-file-invoice me-2"></i>
                                                                Buat Invoice
                                                            </a>
                                                            <a href="#" class="dropdown-item">
                                                                <i class="ti ti-calendar-event me-2"></i>
                                                                Jadwalkan Pengiriman
                                                            </a>
                                                        @endif
                                                        <a href="#" class="dropdown-item">
                                                            <i class="ti ti-printer me-2"></i>
                                                            Cetak
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        @if ($contract['status'] == 'active')
                                                            <a href="#" class="dropdown-item text-warning">
                                                                <i class="ti ti-alert-triangle me-2"></i>
                                                                Hentikan Kontrak
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div>
                                <p class="m-0 text-muted">Menampilkan 1-12 dari 32 kontrak</p>
                            </div>
                            <ul class="pagination m-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="ti ti-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="ti ti-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // You can add any JavaScript functionality here
        });
    </script>
@endsection
