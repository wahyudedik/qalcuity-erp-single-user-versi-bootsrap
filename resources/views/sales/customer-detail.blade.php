@extends('layouts.app')

@section('title', 'Detail Pelanggan')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Detail Pelanggan
                    </h2>
                    <ol class="breadcrumb breadcrumb-arrows mt-2 mb-2" aria-label="breadcrumbs">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sales.customer-management') }}">Manajemen
                                Pelanggan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pelanggan</li>
                    </ol>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('sales.customer.edit', $id) }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-edit"></i>
                            Edit Pelanggan
                        </a>
                        <a href="{{ route('sales.customer.edit', $id) }}" class="btn btn-primary d-sm-none btn-icon">
                            <i class="ti ti-edit"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @php
            // Generate dummy data for the customer detail
            $customerTypes = ['Korporasi', 'Individu', 'Pemerintah'];
            $statuses = ['Aktif', 'Tidak Aktif'];
            $cities = ['Jakarta', 'Bandung', 'Surabaya', 'Semarang', 'Yogyakarta'];

            $type = $customerTypes[array_rand($customerTypes)];
            $status = $statuses[array_rand($statuses)];
            $city = $cities[array_rand($cities)];

            if ($type == 'Korporasi') {
                $name = 'PT. Maju Bersama Sejahtera';
                $contact = 'sales@majubersama.co.id';
                $phone = '021-5551234';
                $contactPerson = 'Budi Santoso';
                $contactPersonPosition = 'Purchasing Manager';
                $contactPersonPhone = '081234567890';
            } elseif ($type == 'Pemerintah') {
                $name = 'Dinas Pekerjaan Umum ' . $city;
                $contact = 'dpu.' . strtolower(str_replace(' ', '', $city)) . '@gov.id';
                $phone = '021-5559876';
                $contactPerson = 'Ir. Ahmad Suparman';
                $contactPersonPosition = 'Kepala Dinas';
                $contactPersonPhone = '081298765432';
            } else {
                $name = 'Budi Santoso';
                $contact = 'budi.santoso@gmail.com';
                $phone = '081234567890';
                $contactPerson = null;
                $contactPersonPosition = null;
                $contactPersonPhone = null;
            }

            $customer = [
                'id' => $id,
                'name' => $name,
                'type' => $type,
                'email' => $contact,
                'phone' => $phone,
                'address' => 'Jl. Raya ' . $city . ' No. ' . rand(1, 100),
                'city' => $city,
                'province' => 'Jawa Barat',
                'postal_code' => rand(10000, 99999),
                'status' => $status,
                'registration_date' => date('d M Y', strtotime('-' . rand(1, 365) . ' days')),
                'credit_limit' => 'Rp ' . number_format(rand(10000000, 100000000), 0, ',', '.'),
                'payment_terms' => rand(7, 30) . ' hari',
                'tax_id' =>
                    '01.' .
                    rand(100, 999) .
                    '.' .
                    rand(100, 999) .
                    '.' .
                    rand(1, 9) .
                    '-' .
                    rand(100, 999) .
                    '.' .
                    rand(100, 999),
                'contact_person' => $contactPerson,
                'contact_person_position' => $contactPersonPosition,
                'contact_person_phone' => $contactPersonPhone,
                'notes' => 'Pelanggan ini memiliki histori pembayaran yang baik dan selalu tepat waktu.',
            ];

            // Generate transaction history
            $transactions = [];
            for ($i = 1; $i <= 5; $i++) {
                $date = date('d M Y', strtotime('-' . $i * 15 . ' days'));
                $status = rand(0, 10) > 2 ? 'Lunas' : 'Belum Lunas';
                $amount = rand(5000000, 50000000);

                $transactions[] = [
                    'invoice' =>
                        'INV/' .
                        date('Ymd', strtotime('-' . $i * 15 . ' days')) .
                        '/' .
                        str_pad($i, 4, '0', STR_PAD_LEFT),
                    'date' => $date,
                    'amount' => 'Rp ' . number_format($amount, 0, ',', '.'),
                    'status' => $status,
                    'due_date' => date('d M Y', strtotime($date . ' + ' . rand(7, 30) . ' days')),
                ];
            }
        @endphp

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Informasi Pelanggan</h3>
                        <div class="mb-2">
                            @if ($customer['type'] == 'Korporasi')
                                <span class="avatar avatar-xl mb-3 bg-blue-lt">
                                    <i class="ti ti-building"></i>
                                </span>
                            @elseif($customer['type'] == 'Pemerintah')
                                <span class="avatar avatar-xl mb-3 bg-red-lt">
                                    <i class="ti ti-building-bank"></i>
                                </span>
                            @else
                                <span class="avatar avatar-xl mb-3 bg-green-lt">
                                    <i class="ti ti-user"></i>
                                </span>
                            @endif
                        </div>
                        <div class="mb-2">
                            <h3>{{ $customer['name'] }}</h3>
                            <div class="text-muted">
                                {{ $customer['id'] }}
                                @if ($customer['status'] == 'Aktif')
                                    <span class="badge bg-success ms-2">Aktif</span>
                                @else
                                    <span class="badge bg-secondary ms-2">Tidak Aktif</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Tipe</div>
                                    <div class="datagrid-content">{{ $customer['type'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Terdaftar Sejak</div>
                                    <div class="datagrid-content">{{ $customer['registration_date'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Email</div>
                                    <div class="datagrid-content">{{ $customer['email'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Telepon</div>
                                    <div class="datagrid-content">{{ $customer['phone'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">NPWP</div>
                                    <div class="datagrid-content">{{ $customer['tax_id'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Batas Kredit</div>
                                    <div class="datagrid-content">{{ $customer['credit_limit'] }}</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Termin Pembayaran</div>
                                    <div class="datagrid-content">{{ $customer['payment_terms'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="btn-list">
                                    <a href="#" class="btn btn-outline-primary">
                                        <i class="ti ti-mail me-1"></i> Email
                                    </a>
                                    <a href="#" class="btn btn-outline-primary">
                                        <i class="ti ti-phone me-1"></i> Telepon
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($customer['contact_person'])
                    <div class="card mt-3">
                        <div class="card-body">
                            <h3 class="card-title">Kontak Person</h3>
                            <div class="mb-2">
                                <span class="avatar avatar-md mb-2 bg-cyan-lt">
                                    <i class="ti ti-user"></i>
                                </span>
                                <div class="ms-2 d-inline-block">
                                    <h4 class="mb-1">{{ $customer['contact_person'] }}</h4>
                                    <div class="text-muted">{{ $customer['contact_person_position'] }}</div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="datagrid">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Telepon</div>
                                        <div class="datagrid-content">{{ $customer['contact_person_phone'] }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="card mt-3">
                    <div class="card-body">
                        <h3 class="card-title">Alamat</h3>
                        <address>
                            {{ $customer['address'] }}<br>
                            {{ $customer['city'] }}, {{ $customer['province'] }}<br>
                            {{ $customer['postal_code'] }}
                        </address>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h3 class="card-title">Catatan</h3>
                        <p>{{ $customer['notes'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Riwayat Transaksi</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>No. Invoice</th>
                                        <th>Tanggal</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th class="w-1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction['invoice'] }}</td>
                                            <td>{{ $transaction['date'] }}</td>
                                            <td>{{ $transaction['due_date'] }}</td>
                                            <td>{{ $transaction['amount'] }}</td>
                                            <td>
                                                @if ($transaction['status'] == 'Lunas')
                                                    <span class="badge bg-success">Lunas</span>
                                                @else
                                                    <span class="badge bg-warning">Belum Lunas</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Statistik Pelanggan</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body p-2">
                                        <div class="d-flex align-items-center">
                                            <div class="subheader">Total Pembelian</div>
                                        </div>
                                        <div class="h1 mb-0">Rp
                                            {{ number_format(rand(50000000, 500000000), 0, ',', '.') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body p-2">
                                        <div class="d-flex align-items-center">
                                            <div class="subheader">Rata-rata Pembelian</div>
                                        </div>
                                        <div class="h1 mb-0">Rp {{ number_format(rand(5000000, 50000000), 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="card">
                                    <div class="card-body p-2">
                                        <div class="d-flex align-items-center">
                                            <div class="subheader">Frekuensi Pembelian</div>
                                        </div>
                                        <div class="h1 mb-0">{{ rand(5, 30) }} kali</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="card">
                                    <div class="card-body p-2">
                                        <div class="d-flex align-items-center">
                                            <div class="subheader">Ketepatan Pembayaran</div>
                                        </div>
                                        <div class="h1 mb-0">{{ rand(70, 100) }}%</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h4>Tren Pembelian (6 Bulan Terakhir)</h4>
                            <div class="chart-lg">
                                <div class="chart">
                                    <div class="text-center text-muted mt-5 pt-5">
                                        <i class="ti ti-chart-line mb-2" style="font-size: 2rem;"></i>
                                        <p>Grafik tren pembelian akan ditampilkan di sini</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Aktivitas Terbaru</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list list-timeline">
                            @php
                                $activities = [
                                    [
                                        'type' => 'transaction',
                                        'date' => date('d M Y', strtotime('-3 days')),
                                        'desc' => 'Melakukan pembelian produk Ready Mix K-350 sebanyak 50 m³',
                                    ],
                                    [
                                        'type' => 'payment',
                                        'date' => date('d M Y', strtotime('-10 days')),
                                        'desc' =>
                                            'Melakukan pembayaran invoice INV/20230510/0002 sebesar Rp 25.000.000',
                                    ],
                                    [
                                        'type' => 'contact',
                                        'date' => date('d M Y', strtotime('-15 days')),
                                        'desc' => 'Menghubungi sales untuk penawaran proyek baru di Bekasi',
                                    ],
                                    [
                                        'type' => 'update',
                                        'date' => date('d M Y', strtotime('-30 days')),
                                        'desc' => 'Memperbarui informasi kontak perusahaan',
                                    ],
                                    [
                                        'type' => 'complaint',
                                        'date' => date('d M Y', strtotime('-45 days')),
                                        'desc' => 'Melaporkan keterlambatan pengiriman untuk order #ORD-2023-0125',
                                    ],
                                ];
                            @endphp

                            @foreach ($activities as $activity)
                                <li>
                                    <div class="list-timeline-icon">
                                        @if ($activity['type'] == 'transaction')
                                            <i class="ti ti-shopping-cart bg-primary text-white"></i>
                                        @elseif($activity['type'] == 'payment')
                                            <i class="ti ti-cash bg-green text-white"></i>
                                        @elseif($activity['type'] == 'contact')
                                            <i class="ti ti-phone bg-azure text-white"></i>
                                        @elseif($activity['type'] == 'update')
                                            <i class="ti ti-pencil bg-yellow text-white"></i>
                                        @elseif($activity['type'] == 'complaint')
                                            <i class="ti ti-alert-triangle bg-red text-white"></i>
                                        @endif
                                    </div>
                                    <div class="list-timeline-content">
                                        <div class="list-timeline-time">{{ $activity['date'] }}</div>
                                        <p class="list-timeline-title">{{ $activity['desc'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
