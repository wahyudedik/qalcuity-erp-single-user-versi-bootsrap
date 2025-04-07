@extends('layouts.app')

@section('title', 'Manajemen Rute Pengiriman')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Manajemen Rute Pengiriman
                    </h2>
                    <div class="text-muted mt-1">Kelola rute pengiriman untuk armada</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('delivery.routes.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus"></i>
                            Tambah Rute Baru
                        </a>
                        <a href="{{ route('delivery.routes.create') }}" class="btn btn-primary d-sm-none">
                            <i class="ti ti-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="card-title">Daftar Rute Pengiriman</h3>
                    </div>
                    <div class="col-auto">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari rute..." id="search-input">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="ti ti-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex mb-3">
                    <div class="btn-group me-2">
                        <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="ti ti-filter me-1"></i>
                            Filter
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                                Semua Rute
                            </a>
                            <a class="dropdown-item" href="#">
                                Rute Aktif
                            </a>
                            <a class="dropdown-item" href="#">
                                Rute Tidak Aktif
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                Rute Reguler
                            </a>
                            <a class="dropdown-item" href="#">
                                Rute Proyek
                            </a>
                            <a class="dropdown-item" href="#">
                                Rute Khusus
                            </a>
                        </div>
                    </div>
                    <div class="btn-group me-2">
                        <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="ti ti-sort-ascending me-1"></i>
                            Urutkan
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                                Kode Rute (A-Z)
                            </a>
                            <a class="dropdown-item" href="#">
                                Kode Rute (Z-A)
                            </a>
                            <a class="dropdown-item" href="#">
                                Nama Rute (A-Z)
                            </a>
                            <a class="dropdown-item" href="#">
                                Nama Rute (Z-A)
                            </a>
                            <a class="dropdown-item" href="#">
                                Jarak (Terpendek)
                            </a>
                            <a class="dropdown-item" href="#">
                                Jarak (Terjauh)
                            </a>
                            <a class="dropdown-item" href="#">
                                Terbaru
                            </a>
                            <a class="dropdown-item" href="#">
                                Terlama
                            </a>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-outline-secondary" id="btn-refresh">
                            <i class="ti ti-refresh"></i>
                            Refresh
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Rute</th>
                                <th>Asal</th>
                                <th>Tujuan</th>
                                <th>Jarak</th>
                                <th>Estimasi</th>
                                <th>Status</th>
                                <th>Jenis</th>
                                <th class="w-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $dummyRoutes = [
                                    [
                                        'id' => 1,
                                        'code' => 'RT-001',
                                        'name' => 'Jakarta Utara - Sunter',
                                        'origin' => 'Batching Plant Jakarta Utara',
                                        'destination' => 'Proyek Apartemen Sunter',
                                        'distance' => 12.5,
                                        'estimated_time' => '45 menit',
                                        'status' => 'Aktif',
                                        'type' => 'Reguler',
                                    ],
                                    [
                                        'id' => 2,
                                        'code' => 'RT-002',
                                        'name' => 'Jakarta Selatan - Kuningan',
                                        'origin' => 'Batching Plant Jakarta Selatan',
                                        'destination' => 'Proyek Office Tower Kuningan',
                                        'distance' => 8.7,
                                        'estimated_time' => '35 menit',
                                        'status' => 'Aktif',
                                        'type' => 'Proyek',
                                    ],
                                    [
                                        'id' => 3,
                                        'code' => 'RT-003',
                                        'name' => 'Jakarta Barat - Cengkareng',
                                        'origin' => 'Batching Plant Jakarta Barat',
                                        'destination' => 'Perumahan Cengkareng',
                                        'distance' => 15.2,
                                        'estimated_time' => '55 menit',
                                        'status' => 'Tidak Aktif',
                                        'type' => 'Reguler',
                                    ],
                                    [
                                        'id' => 4,
                                        'code' => 'RT-004',
                                        'name' => 'Jakarta Timur - Cakung',
                                        'origin' => 'Batching Plant Jakarta Timur',
                                        'destination' => 'Kawasan Industri Cakung',
                                        'distance' => 10.3,
                                        'estimated_time' => '40 menit',
                                        'status' => 'Aktif',
                                        'type' => 'Khusus',
                                    ],
                                    [
                                        'id' => 5,
                                        'code' => 'RT-005',
                                        'name' => 'Jakarta Pusat - Kemayoran',
                                        'origin' => 'Batching Plant Jakarta Pusat',
                                        'destination' => 'Proyek Stadion Kemayoran',
                                        'distance' => 7.8,
                                        'estimated_time' => '30 menit',
                                        'status' => 'Aktif',
                                        'type' => 'Proyek',
                                    ],
                                ];
                            @endphp

                            @foreach ($dummyRoutes as $route)
                                <tr>
                                    <td>{{ $route['code'] }}</td>
                                    <td>{{ $route['name'] }}</td>
                                    <td>{{ $route['origin'] }}</td>
                                    <td>{{ $route['destination'] }}</td>
                                    <td>{{ $route['distance'] }} km</td>
                                    <td>{{ $route['estimated_time'] }}</td>
                                    <td>
                                        @if ($route['status'] == 'Aktif')
                                            <span class="badge bg-success">{{ $route['status'] }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $route['status'] }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($route['type'] == 'Reguler')
                                            <span class="badge bg-blue">{{ $route['type'] }}</span>
                                        @elseif($route['type'] == 'Proyek')
                                            <span class="badge bg-purple">{{ $route['type'] }}</span>
                                        @else
                                            <span class="badge bg-orange">{{ $route['type'] }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('delivery.routes.detail', $route['id']) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('delivery.routes.edit', $route['id']) }}"
                                                class="btn btn-sm btn-outline-secondary">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal{{ $route['id'] }}">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $route['id'] }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel{{ $route['id'] }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $route['id'] }}">
                                                            Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus rute
                                                            <strong>{{ $route['name'] }}</strong>?</p>
                                                        <p class="text-danger">Tindakan ini tidak dapat dibatalkan.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="#" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="ti ti-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="ti ti-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Statistik Rute</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-blue text-white avatar">
                                                    <i class="ti ti-map"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Total Rute
                                                </div>
                                                <div class="text-muted">
                                                    {{ count($dummyRoutes) }} rute
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
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
                                                    Rute Aktif
                                                </div>
                                                <div class="text-muted">
                                                    {{ count(array_filter($dummyRoutes, function ($route) {return $route['status'] == 'Aktif';})) }}
                                                    rute
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-purple text-white avatar">
                                                    <i class="ti ti-building"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Rute Proyek
                                                </div>
                                                <div class="text-muted">
                                                    {{ count(array_filter($dummyRoutes, function ($route) {return $route['type'] == 'Proyek';})) }}
                                                    rute
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-orange text-white avatar">
                                                    <i class="ti ti-route"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Jarak Rata-rata
                                                </div>
                                                <div class="text-muted">
                                                    {{ number_format(array_sum(array_column($dummyRoutes, 'distance')) / count($dummyRoutes), 1) }}
                                                    km
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Peta Rute</h3>
                    </div>
                    <div class="card-body">
                        <div id="map" style="height: 300px; border-radius: 4px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" defer></script>
    <script>
        function initMap() {
            // Initialize map centered on Jakarta
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 11,
                center: {
                    lat: -6.2088,
                    lng: 106.8456
                }, // Jakarta coordinates
            });

            // Sample route data - in a real application, this would come from your backend
            const routes = [{
                    name: "Jakarta Utara - Sunter",
                    path: [{
                            lat: -6.1234,
                            lng: 106.8765
                        },
                        {
                            lat: -6.1345,
                            lng: 106.8654
                        },
                        {
                            lat: -6.1456,
                            lng: 106.8543
                        }
                    ],
                    color: "#0061f2"
                },
                {
                    name: "Jakarta Selatan - Kuningan",
                    path: [{
                            lat: -6.2345,
                            lng: 106.8234
                        },
                        {
                            lat: -6.2456,
                            lng: 106.8345
                        },
                        {
                            lat: -6.2567,
                            lng: 106.8456
                        },
                        {
                            lat: -6.2678,
                            lng: 106.8567
                        }
                    ],
                    color: "#6610f2"
                },
                {
                    name: "Jakarta Barat - Cengkareng",
                    path: [{
                            lat: -6.1567,
                            lng: 106.7345
                        },
                        {
                            lat: -6.1678,
                            lng: 106.7234
                        },
                        {
                            lat: -6.1789,
                            lng: 106.7123
                        }
                    ],
                    color: "#dc3545"
                },
                {
                    name: "Jakarta Timur - Cakung",
                    path: [{
                            lat: -6.2123,
                            lng: 106.9456
                        },
                        {
                            lat: -6.2234,
                            lng: 106.9567
                        },
                        {
                            lat: -6.2345,
                            lng: 106.9678
                        }
                    ],
                    color: "#fd7e14"
                },
                {
                    name: "Jakarta Pusat - Kemayoran",
                    path: [{
                            lat: -6.1789,
                            lng: 106.8456
                        },
                        {
                            lat: -6.1678,
                            lng: 106.8567
                        },
                        {
                            lat: -6.1567,
                            lng: 106.8678
                        }
                    ],
                    color: "#20c997"
                }
            ];

            // Draw each route on the map
            routes.forEach(route => {
                // Create a path between the waypoints
                const routePath = new google.maps.Polyline({
                    path: route.path,
                    geodesic: true,
                    strokeColor: route.color,
                    strokeOpacity: 1.0,
                    strokeWeight: 3,
                });

                routePath.setMap(map);

                // Add markers for start and end points
                const startMarker = new google.maps.Marker({
                    position: route.path[0],
                    map: map,
                    title: `Start: ${route.name}`,
                    icon: {
                        url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png"
                    }
                });

                const endMarker = new google.maps.Marker({
                    position: route.path[route.path.length - 1],
                    map: map,
                    title: `End: ${route.name}`,
                    icon: {
                        url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                    }
                });
            });
        }

        // Search functionality
        document.getElementById('search-input').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');

            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Refresh button
        document.getElementById('btn-refresh').addEventListener('click', function() {
            location.reload();
        });
    </script>
@endsection
