@extends('layouts.app')

@section('title', 'Manajemen Pelanggan')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Manajemen Pelanggan
                    </h2>
                    <div class="text-muted mt-1">Mengelola data pelanggan perusahaan</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Cari pelanggan...">
                        <a href="{{ route('sales.customer.create') }}" class="btn btn-primary">
                            <i class="ti ti-plus"></i>
                            Tambah Pelanggan
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and stats cards -->
        <div class="row mt-3">
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-primary text-white avatar">
                                    <i class="ti ti-users"></i>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Total Pelanggan
                                </div>
                                <div class="text-muted">
                                    125 Pelanggan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-green text-white avatar">
                                    <i class="ti ti-building-skyscraper"></i>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Pelanggan Korporasi
                                </div>
                                <div class="text-muted">
                                    78 Perusahaan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-yellow text-white avatar">
                                    <i class="ti ti-user"></i>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Pelanggan Individu
                                </div>
                                <div class="text-muted">
                                    47 Orang
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-azure text-white avatar">
                                    <i class="ti ti-map-pin"></i>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Wilayah Terlayani
                                </div>
                                <div class="text-muted">
                                    12 Provinsi
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="card mt-3">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Tipe Pelanggan</label>
                        <select class="form-select">
                            <option value="">Semua Tipe</option>
                            <option value="corporate">Korporasi</option>
                            <option value="individual">Individu</option>
                            <option value="government">Pemerintah</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option value="">Semua Status</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Wilayah</label>
                        <select class="form-select">
                            <option value="">Semua Wilayah</option>
                            <option value="jakarta">Jakarta</option>
                            <option value="west_java">Jawa Barat</option>
                            <option value="central_java">Jawa Tengah</option>
                            <option value="east_java">Jawa Timur</option>
                            <option value="banten">Banten</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button class="btn btn-outline-primary w-100">
                            <i class="ti ti-filter me-1"></i> Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customer table -->
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Daftar Pelanggan</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pelanggan</th>
                                <th>Tipe</th>
                                <th>Kontak</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Transaksi Terakhir</th>
                                <th class="w-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $customerTypes = ['Korporasi', 'Individu', 'Pemerintah'];
                                $statuses = ['Aktif', 'Tidak Aktif'];
                                $cities = [
                                    'Jakarta',
                                    'Bandung',
                                    'Surabaya',
                                    'Semarang',
                                    'Yogyakarta',
                                    'Medan',
                                    'Makassar',
                                ];

                                $customers = [];
                                for ($i = 1; $i <= 15; $i++) {
                                    $type = $customerTypes[array_rand($customerTypes)];
                                    $status = $statuses[array_rand($statuses)];
                                    $city = $cities[array_rand($cities)];

                                    if ($type == 'Korporasi') {
                                        $name = 'PT. Maju Bersama ' . $i;
                                        $contact = 'sales@majubersama' . $i . '.co.id';
                                    } elseif ($type == 'Pemerintah') {
                                        $name = 'Dinas Pekerjaan Umum ' . $city;
                                        $contact = 'dpu.' . strtolower(str_replace(' ', '', $city)) . '@gov.id';
                                    } else {
                                        $name = 'Budi Santoso ' . $i;
                                        $contact = '08123456' . str_pad($i, 4, '0', STR_PAD_LEFT);
                                    }

                                    $lastTransaction = date('d M Y', strtotime('-' . rand(1, 60) . ' days'));

                                    $customers[] = [
                                        'id' => 'CUST' . str_pad($i, 5, '0', STR_PAD_LEFT),
                                        'name' => $name,
                                        'type' => $type,
                                        'contact' => $contact,
                                        'address' => 'Jl. Raya ' . $city . ' No. ' . rand(1, 100),
                                        'status' => $status,
                                        'lastTransaction' => $lastTransaction,
                                    ];
                                }
                            @endphp

                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer['id'] }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if ($customer['type'] == 'Korporasi')
                                                <span class="avatar me-2 bg-blue-lt">
                                                    <i class="ti ti-building"></i>
                                                </span>
                                            @elseif($customer['type'] == 'Pemerintah')
                                                <span class="avatar me-2 bg-red-lt">
                                                    <i class="ti ti-building-bank"></i>
                                                </span>
                                            @else
                                                <span class="avatar me-2 bg-green-lt">
                                                    <i class="ti ti-user"></i>
                                                </span>
                                            @endif
                                            <div>
                                                <a href="{{ route('sales.customer.detail', $customer['id']) }}"
                                                    class="text-reset">{{ $customer['name'] }}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $customer['type'] }}</td>
                                    <td>{{ $customer['contact'] }}</td>
                                    <td>{{ $customer['address'] }}</td>
                                    <td>
                                        @if ($customer['status'] == 'Aktif')
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>{{ $customer['lastTransaction'] }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('sales.customer.detail', $customer['id']) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('sales.customer.edit', $customer['id']) }}"
                                                class="btn btn-sm btn-outline-secondary">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                onclick="confirmDelete('{{ $customer['id'] }}')">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Menampilkan <span>1</span> sampai <span>15</span> dari <span>125</span> data</p>
                <ul class="pagination m-0 ms-auto">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class="ti ti-chevron-left"></i>
                            prev
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            next
                            <i class="ti ti-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function confirmDelete(customerId) {
            Swal.fire({
                title: 'Hapus Pelanggan?',
                text: "Data pelanggan " + customerId + " akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Here you would normally submit a form or make an AJAX request
                    Swal.fire(
                        'Terhapus!',
                        'Data pelanggan ' + customerId + ' telah dihapus.',
                        'success'
                    )
                }
            })
        }
    </script>
@endsection
