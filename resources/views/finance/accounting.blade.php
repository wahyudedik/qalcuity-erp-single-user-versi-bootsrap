@extends('layouts.app')

@section('title', 'Akuntansi & Pembukuan')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Akuntansi & Pembukuan
                    </h2>
                    <div class="text-muted mt-1">Manajemen transaksi keuangan dan pembukuan</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-add-transaction">
                            <i class="ti ti-plus"></i>
                            Tambah Transaksi
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none" data-bs-toggle="modal"
                            data-bs-target="#modal-add-transaction">
                            <i class="ti ti-plus"></i>
                        </a>
                        <a href="#" class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-file-export"></i>
                            Export
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <!-- Financial Summary Cards -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-primary text-white avatar">
                                        <i class="ti ti-cash"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        Pendapatan Bulan Ini
                                    </div>
                                    <div class="text-muted">
                                        Rp 1.250.000.000
                                    </div>
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
                                        Pengeluaran Bulan Ini
                                    </div>
                                    <div class="text-muted">
                                        Rp 875.000.000
                                    </div>
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
                                    <span class="bg-success text-white avatar">
                                        <i class="ti ti-chart-pie"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        Profit Bulan Ini
                                    </div>
                                    <div class="text-muted">
                                        Rp 375.000.000
                                    </div>
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
                                        <i class="ti ti-report-money"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        Piutang Belum Dibayar
                                    </div>
                                    <div class="text-muted">
                                        Rp 450.000.000
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabs for different accounting sections -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                <li class="nav-item">
                                    <a href="#tabs-transactions" class="nav-link active" data-bs-toggle="tab">
                                        <i class="ti ti-list me-2"></i>
                                        Transaksi
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-journal" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-book me-2"></i>
                                        Jurnal
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-ledger" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-notebook me-2"></i>
                                        Buku Besar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-accounts" class="nav-link" data-bs-toggle="tab">
                                        <i class="ti ti-building-bank me-2"></i>
                                        Akun
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- Transactions Tab -->
                                <div class="tab-pane active show" id="tabs-transactions">
                                    <div class="d-flex mb-3">
                                        <div class="text-muted">Tampilkan</div>
                                        <div class="ms-auto">
                                            <div class="row g-2">
                                                <div class="col">
                                                    <select class="form-select">
                                                        <option value="all">Semua Transaksi</option>
                                                        <option value="income">Pendapatan</option>
                                                        <option value="expense">Pengeluaran</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <div class="input-icon">
                                                        <span class="input-icon-addon">
                                                            <i class="ti ti-search"></i>
                                                        </span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Cari transaksi...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>No. Transaksi</th>
                                                    <th>Deskripsi</th>
                                                    <th>Kategori</th>
                                                    <th>Debit</th>
                                                    <th>Kredit</th>
                                                    <th>Status</th>
                                                    <th class="w-1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $transactions = [
                                                        [
                                                            'date' => '2023-08-15',
                                                            'number' => 'TRX-2023-0001',
                                                            'description' => 'Pembayaran Invoice #INV-2023-0042',
                                                            'category' => 'Pendapatan',
                                                            'debit' => 125000000,
                                                            'credit' => 0,
                                                            'status' => 'Selesai',
                                                        ],
                                                        [
                                                            'date' => '2023-08-14',
                                                            'number' => 'TRX-2023-0002',
                                                            'description' => 'Pembelian Bahan Baku',
                                                            'category' => 'Pengeluaran',
                                                            'debit' => 0,
                                                            'credit' => 75000000,
                                                            'status' => 'Selesai',
                                                        ],
                                                        [
                                                            'date' => '2023-08-12',
                                                            'number' => 'TRX-2023-0003',
                                                            'description' => 'Pembayaran Gaji Karyawan',
                                                            'category' => 'Pengeluaran',
                                                            'debit' => 0,
                                                            'credit' => 45000000,
                                                            'status' => 'Selesai',
                                                        ],
                                                        [
                                                            'date' => '2023-08-10',
                                                            'number' => 'TRX-2023-0004',
                                                            'description' => 'Pembayaran Invoice #INV-2023-0041',
                                                            'category' => 'Pendapatan',
                                                            'debit' => 85000000,
                                                            'credit' => 0,
                                                            'status' => 'Selesai',
                                                        ],
                                                        [
                                                            'date' => '2023-08-08',
                                                            'number' => 'TRX-2023-0005',
                                                            'description' => 'Pembayaran Listrik & Air',
                                                            'category' => 'Pengeluaran',
                                                            'debit' => 0,
                                                            'credit' => 12500000,
                                                            'status' => 'Selesai',
                                                        ],
                                                    ];

                                                    // Generate more dummy data
                                                    for ($i = 6; $i <= 15; $i++) {
                                                        $isIncome = rand(0, 1) == 1;
                                                        $amount = rand(5000000, 100000000);
                                                        $day = 20 - $i;

                                                        $transactions[] = [
                                                            'date' => "2023-08-{$day}",
                                                            'number' => "TRX-2023-000{$i}",
                                                            'description' => $isIncome
                                                                ? 'Pembayaran Invoice #INV-2023-00' . rand(30, 40)
                                                                : 'Pengeluaran Operasional #' . rand(100, 999),
                                                            'category' => $isIncome ? 'Pendapatan' : 'Pengeluaran',
                                                            'debit' => $isIncome ? $amount : 0,
                                                            'credit' => $isIncome ? 0 : $amount,
                                                            'status' => 'Selesai',
                                                        ];
                                                    }
                                                @endphp

                                                @foreach ($transactions as $transaction)
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($transaction['date'])->format('d M Y') }}
                                                        </td>
                                                        <td>{{ $transaction['number'] }}</td>
                                                        <td>{{ $transaction['description'] }}</td>
                                                        <td>
                                                            <span
                                                                class="badge {{ $transaction['category'] == 'Pendapatan' ? 'bg-green' : 'bg-red' }}">
                                                                {{ $transaction['category'] }}
                                                            </span>
                                                        </td>
                                                        <td>{{ $transaction['debit'] > 0 ? 'Rp ' . number_format($transaction['debit'], 0, ',', '.') : '-' }}
                                                        </td>
                                                        <td>{{ $transaction['credit'] > 0 ? 'Rp ' . number_format($transaction['credit'], 0, ',', '.') : '-' }}
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-success">
                                                                {{ $transaction['status'] }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm" type="button"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="ti ti-dots-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('finance.transaction.detail', ['id' => $transaction['number']]) }}">
                                                                        Detail
                                                                    </a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('finance.transaction.edit', ['id' => $transaction['number']]) }}">
                                                                        Edit
                                                                    </a>
                                                                    <a class="dropdown-item text-danger" href="#">
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
                                    <div class="d-flex mt-3">
                                        <ul class="pagination ms-auto">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                                    <i class="ti ti-chevron-left"></i>
                                                    Prev
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                    Next
                                                    <i class="ti ti-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Journal Tab -->
                                <div class="tab-pane" id="tabs-journal">
                                    <div class="d-flex mb-3">
                                        <div class="text-muted">Periode: Agustus 2023</div>
                                        <div class="ms-auto">
                                            <div class="row g-2">
                                                <div class="col">
                                                    <select class="form-select">
                                                        <option value="08-2023">Agustus 2023</option>
                                                        <option value="07-2023">Juli 2023</option>
                                                        <option value="06-2023">Juni 2023</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <div class="input-icon">
                                                        <span class="input-icon-addon">
                                                            <i class="ti ti-search"></i>
                                                        </span>
                                                        <input type="text" class="form-control"
                                                            placeholder="Cari jurnal...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>No. Jurnal</th>
                                                    <th>Keterangan</th>
                                                    <th>Akun</th>
                                                    <th>Debit</th>
                                                    <th>Kredit</th>
                                                    <th class="w-1"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $journals = [
                                                        [
                                                            'date' => '2023-08-15',
                                                            'number' => 'JRN-2023-0001',
                                                            'description' => 'Pembayaran Invoice #INV-2023-0042',
                                                            'entries' => [
                                                                [
                                                                    'account' => 'Kas',
                                                                    'debit' => 125000000,
                                                                    'credit' => 0,
                                                                ],
                                                                [
                                                                    'account' => 'Pendapatan Penjualan',
                                                                    'debit' => 0,
                                                                    'credit' => 125000000,
                                                                ],
                                                            ],
                                                        ],
                                                        [
                                                            'date' => '2023-08-14',
                                                            'number' => 'JRN-2023-0002',
                                                            'description' => 'Pembelian Bahan Baku',
                                                            'entries' => [
                                                                [
                                                                    'account' => 'Persediaan Bahan Baku',
                                                                    'debit' => 75000000,
                                                                    'credit' => 0,
                                                                ],
                                                                [
                                                                    'account' => 'Kas',
                                                                    'debit' => 0,
                                                                    'credit' => 75000000,
                                                                ],
                                                            ],
                                                        ],
                                                        [
                                                            'date' => '2023-08-12',
                                                            'number' => 'JRN-2023-0003',
                                                            'description' => 'Pembayaran Gaji Karyawan',
                                                            'entries' => [
                                                                [
                                                                    'account' => 'Beban Gaji',
                                                                    'debit' => 45000000,
                                                                    'credit' => 0,
                                                                ],
                                                                [
                                                                    'account' => 'Kas',
                                                                    'debit' => 0,
                                                                    'credit' => 45000000,
                                                                ],
                                                            ],
                                                        ],
                                                    ];
                                                @endphp

                                                @foreach ($journals as $journal)
                                                    @foreach ($journal['entries'] as $index => $entry)
                                                        <tr
                                                            @if ($index === 0) class="border-top border-primary" @endif>
                                                            @if ($index === 0)
                                                                <td rowspan="{{ count($journal['entries']) }}">
                                                                    {{ \Carbon\Carbon::parse($journal['date'])->format('d M Y') }}
                                                                </td>
                                                                <td rowspan="{{ count($journal['entries']) }}">
                                                                    {{ $journal['number'] }}</td>
                                                                <td rowspan="{{ count($journal['entries']) }}">
                                                                    {{ $journal['description'] }}</td>
                                                            @endif
                                                            <td>{{ $entry['account'] }}</td>
                                                            <td>{{ $entry['debit'] > 0 ? 'Rp ' . number_format($entry['debit'], 0, ',', '.') : '-' }}
                                                            </td>
                                                            <td>{{ $entry['credit'] > 0 ? 'Rp ' . number_format($entry['credit'], 0, ',', '.') : '-' }}
                                                            </td>
                                                            @if ($index === 0)
                                                                <td rowspan="{{ count($journal['entries']) }}">
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-sm" type="button"
                                                                            data-bs-toggle="dropdown">
                                                                            <i class="ti ti-dots-vertical"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('finance.journal.detail', ['id' => $journal['number']]) }}">
                                                                                Detail
                                                                            </a>
                                                                            <a class="dropdown-item"
                                                                                href="{{ route('finance.journal.edit', ['id' => $journal['number']]) }}">
                                                                                Edit
                                                                            </a>
                                                                            <a class="dropdown-item text-danger"
                                                                                href="#">
                                                                                Hapus
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex mt-3">
                                        <ul class="pagination ms-auto">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                                    <i class="ti ti-chevron-left"></i>
                                                    Prev
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                    Next
                                                    <i class="ti ti-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Ledger Tab -->
                                <div class="tab-pane" id="tabs-ledger">
                                    <div class="d-flex mb-3">
                                        <div class="text-muted">Pilih Akun</div>
                                        <div class="ms-auto">
                                            <div class="row g-2">
                                                <div class="col">
                                                    <select class="form-select">
                                                        <option value="kas">Kas</option>
                                                        <option value="bank">Bank</option>
                                                        <option value="piutang">Piutang Usaha</option>
                                                        <option value="persediaan">Persediaan</option>
                                                        <option value="pendapatan">Pendapatan</option>
                                                        <option value="beban">Beban Operasional</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <select class="form-select">
                                                        <option value="08-2023">Agustus 2023</option>
                                                        <option value="07-2023">Juli 2023</option>
                                                        <option value="06-2023">Juni 2023</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h3 class="card-title">Buku Besar: Kas</h3>
                                            <div class="card-actions">
                                                <a href="#" class="btn btn-outline-secondary btn-sm">
                                                    <i class="ti ti-printer"></i>
                                                    Cetak
                                                </a>
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
                                                    @php
                                                        $ledgerEntries = [
                                                            [
                                                                'date' => '2023-08-01',
                                                                'description' => 'Saldo Awal',
                                                                'ref' => '-',
                                                                'debit' => 0,
                                                                'credit' => 0,
                                                                'balance' => 500000000,
                                                            ],
                                                            [
                                                                'date' => '2023-08-10',
                                                                'description' => 'Pembayaran Invoice #INV-2023-0041',
                                                                'ref' => 'JRN-2023-0004',
                                                                'debit' => 85000000,
                                                                'credit' => 0,
                                                                'balance' => 585000000,
                                                            ],
                                                            [
                                                                'date' => '2023-08-12',
                                                                'description' => 'Pembayaran Gaji Karyawan',
                                                                'ref' => 'JRN-2023-0003',
                                                                'debit' => 0,
                                                                'credit' => 45000000,
                                                                'balance' => 540000000,
                                                            ],
                                                            [
                                                                'date' => '2023-08-14',
                                                                'description' => 'Pembelian Bahan Baku',
                                                                'ref' => 'JRN-2023-0002',
                                                                'debit' => 0,
                                                                'credit' => 75000000,
                                                                'balance' => 465000000,
                                                            ],
                                                            [
                                                                'date' => '2023-08-15',
                                                                'description' => 'Pembayaran Invoice #INV-2023-0042',
                                                                'ref' => 'JRN-2023-0001',
                                                                'debit' => 125000000,
                                                                'credit' => 0,
                                                                'balance' => 590000000,
                                                            ],
                                                        ];
                                                    @endphp

                                                    @foreach ($ledgerEntries as $entry)
                                                        <tr>
                                                            <td>{{ \Carbon\Carbon::parse($entry['date'])->format('d M Y') }}
                                                            </td>
                                                            <td>{{ $entry['description'] }}</td>
                                                            <td>{{ $entry['ref'] }}</td>
                                                            <td>{{ $entry['debit'] > 0 ? 'Rp ' . number_format($entry['debit'], 0, ',', '.') : '-' }}
                                                            </td>
                                                            <td>{{ $entry['credit'] > 0 ? 'Rp ' . number_format($entry['credit'], 0, ',', '.') : '-' }}
                                                            </td>
                                                            <td><strong>Rp
                                                                    {{ number_format($entry['balance'], 0, ',', '.') }}</strong>
                                                            </td>
                                                        </tr>
                                                    @endforeach
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
                                </div>

                                <!-- Accounts Tab -->
                                <div class="tab-pane" id="tabs-accounts">
                                    <div class="d-flex mb-3">
                                        <div class="text-muted">Daftar Akun</div>
                                        <div class="ms-auto">
                                            <button class="btn btn-primary btn-sm">
                                                <i class="ti ti-plus"></i>
                                                Tambah Akun
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table table-vcenter card-table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kode</th>
                                                        <th>Nama Akun</th>
                                                        <th>Kategori</th>
                                                        <th>Tipe</th>
                                                        <th>Saldo</th>
                                                        <th class="w-1"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $accounts = [
                                                            [
                                                                'code' => '1-1000',
                                                                'name' => 'Kas',
                                                                'category' => 'Aset',
                                                                'type' => 'Debit',
                                                                'balance' => 590000000,
                                                            ],
                                                            [
                                                                'code' => '1-1100',
                                                                'name' => 'Bank BCA',
                                                                'category' => 'Aset',
                                                                'type' => 'Debit',
                                                                'balance' => 1250000000,
                                                            ],
                                                            [
                                                                'code' => '1-1200',
                                                                'name' => 'Piutang Usaha',
                                                                'category' => 'Aset',
                                                                'type' => 'Debit',
                                                                'balance' => 450000000,
                                                            ],
                                                            [
                                                                'code' => '1-1300',
                                                                'name' => 'Persediaan Bahan Baku',
                                                                'category' => 'Aset',
                                                                'type' => 'Debit',
                                                                'balance' => 325000000,
                                                            ],
                                                            [
                                                                'code' => '1-1400',
                                                                'name' => 'Persediaan Barang Jadi',
                                                                'category' => 'Aset',
                                                                'type' => 'Debit',
                                                                'balance' => 175000000,
                                                            ],
                                                            [
                                                                'code' => '1-2000',
                                                                'name' => 'Peralatan',
                                                                'category' => 'Aset',
                                                                'type' => 'Debit',
                                                                'balance' => 2500000000,
                                                            ],
                                                            [
                                                                'code' => '1-2100',
                                                                'name' => 'Akumulasi Penyusutan Peralatan',
                                                                'category' => 'Aset',
                                                                'type' => 'Kredit',
                                                                'balance' => -500000000,
                                                            ],
                                                            [
                                                                'code' => '2-1000',
                                                                'name' => 'Hutang Usaha',
                                                                'category' => 'Kewajiban',
                                                                'type' => 'Kredit',
                                                                'balance' => 350000000,
                                                            ],
                                                            [
                                                                'code' => '2-2000',
                                                                'name' => 'Hutang Bank',
                                                                'category' => 'Kewajiban',
                                                                'type' => 'Kredit',
                                                                'balance' => 1500000000,
                                                            ],
                                                            [
                                                                'code' => '3-1000',
                                                                'name' => 'Modal',
                                                                'category' => 'Ekuitas',
                                                                'type' => 'Kredit',
                                                                'balance' => 2500000000,
                                                            ],
                                                            [
                                                                'code' => '3-2000',
                                                                'name' => 'Laba Ditahan',
                                                                'category' => 'Ekuitas',
                                                                'type' => 'Kredit',
                                                                'balance' => 1250000000,
                                                            ],
                                                            [
                                                                'code' => '4-1000',
                                                                'name' => 'Pendapatan Penjualan',
                                                                'category' => 'Pendapatan',
                                                                'type' => 'Kredit',
                                                                'balance' => 1250000000,
                                                            ],
                                                            [
                                                                'code' => '5-1000',
                                                                'name' => 'Beban Pokok Penjualan',
                                                                'category' => 'Beban',
                                                                'type' => 'Debit',
                                                                'balance' => 750000000,
                                                            ],
                                                            [
                                                                'code' => '5-2000',
                                                                'name' => 'Beban Gaji',
                                                                'category' => 'Beban',
                                                                'type' => 'Debit',
                                                                'balance' => 45000000,
                                                            ],
                                                            [
                                                                'code' => '5-3000',
                                                                'name' => 'Beban Utilitas',
                                                                'category' => 'Beban',
                                                                'type' => 'Debit',
                                                                'balance' => 12500000,
                                                            ],
                                                        ];
                                                    @endphp

                                                    @foreach ($accounts as $account)
                                                        <tr>
                                                            <td>{{ $account['code'] }}</td>
                                                            <td>{{ $account['name'] }}</td>
                                                            <td>{{ $account['category'] }}</td>
                                                            <td>{{ $account['type'] }}</td>
                                                            <td
                                                                class="{{ $account['balance'] < 0 ? 'text-danger' : '' }}">
                                                                Rp
                                                                {{ number_format(abs($account['balance']), 0, ',', '.') }}
                                                                {{ $account['balance'] < 0 ? '(Kredit)' : '' }}
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-sm" type="button"
                                                                        data-bs-toggle="dropdown">
                                                                        <i class="ti ti-dots-vertical"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('finance.account.detail', ['id' => $account['code']]) }}">
                                                                            Lihat Buku Besar
                                                                        </a>
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('finance.account.edit', ['id' => $account['code']]) }}">
                                                                            Edit
                                                                        </a>
                                                                        <a class="dropdown-item text-danger"
                                                                            href="#">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Transaction Modal -->
    <div class="modal modal-blur fade" id="modal-add-transaction" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Transaksi Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Transaksi</label>
                        <input type="date" class="form-control" name="transaction_date" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="description" placeholder="Deskripsi transaksi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Transaksi</label>
                        <select class="form-select" name="transaction_type">
                            <option value="income">Pendapatan</option>
                            <option value="expense">Pengeluaran</option>
                            <option value="transfer">Transfer</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Detail Jurnal</label>
                        <div class="table-responsive">
                            <table class="table table-vcenter" id="journal-entries">
                                <thead>
                                    <tr>
                                        <th>Akun</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="accounts[]">
                                                <option value="">Pilih Akun</option>
                                                <option value="1-1000">1-1000 - Kas</option>
                                                <option value="1-1100">1-1100 - Bank BCA</option>
                                                <option value="1-1200">1-1200 - Piutang Usaha</option>
                                                <option value="1-1300">1-1300 - Persediaan Bahan Baku</option>
                                                <option value="4-1000">4-1000 - Pendapatan Penjualan</option>
                                                <option value="5-1000">5-1000 - Beban Pokok Penjualan</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="debit[]" placeholder="0">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="credit[]" placeholder="0">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm"
                                                onclick="removeJournalRow(this)">
                                                <i class="ti ti-x"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="accounts[]">
                                                <option value="">Pilih Akun</option>
                                                <option value="1-1000">1-1000 - Kas</option>
                                                <option value="1-1100">1-1100 - Bank BCA</option>
                                                <option value="1-1200">1-1200 - Piutang Usaha</option>
                                                <option value="1-1300">1-1300 - Persediaan Bahan Baku</option>
                                                <option value="4-1000">4-1000 - Pendapatan Penjualan</option>
                                                <option value="5-1000">5-1000 - Beban Pokok Penjualan</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="debit[]" placeholder="0">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="credit[]" placeholder="0">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm"
                                                onclick="removeJournalRow(this)">
                                                <i class="ti ti-x"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <button type="button" class="btn btn-sm btn-outline-success"
                                                onclick="addJournalRow()">
                                                <i class="ti ti-plus"></i> Tambah Baris
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Catatan</label>
                        <textarea class="form-control" name="notes" rows="3" placeholder="Catatan tambahan (opsional)"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lampiran</label>
                        <input type="file" class="form-control" name="attachment">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="button" class="btn btn-primary ms-auto">
                        <i class="ti ti-plus"></i>
                        Simpan Transaksi
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function addJournalRow() {
            const tbody = document.querySelector('#journal-entries tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
            <td>
                <select class="form-select" name="accounts[]">
                    <option value="">Pilih Akun</option>
                    <option value="1-1000">1-1000 - Kas</option>
                    <option value="1-1100">1-1100 - Bank BCA</option>
                    <option value="1-1200">1-1200 - Piutang Usaha</option>
                    <option value="1-1300">1-1300 - Persediaan Bahan Baku</option>
                    <option value="4-1000">4-1000 - Pendapatan Penjualan</option>
                    <option value="5-1000">5-1000 - Beban Pokok Penjualan</option>
                </select>
            </td>
            <td>
                <input type="number" class="form-control" name="debit[]" placeholder="0">
            </td>
            <td>
                <input type="number" class="form-control" name="credit[]" placeholder="0">
            </td>
            <td>
                <button type="button" class="btn btn-icon btn-sm" onclick="removeJournalRow(this)">
                    <i class="ti ti-x"></i>
                </button>
            </td>
        `;
            tbody.appendChild(newRow);
        }

        function removeJournalRow(button) {
            const tbody = document.querySelector('#journal-entries tbody');
            if (tbody.children.length > 1) {
                button.closest('tr').remove();
            } else {
                // Don't remove the last row, just clear it
                const row = button.closest('tr');
                row.querySelector('select').value = '';
                row.querySelectorAll('input').forEach(input => input.value = '');
            }
        }
    </script>
@endsection
