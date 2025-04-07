@extends('layouts.app')

@section('title', 'Stock Opname')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Stock Opname
                    </h2>
                    <div class="text-muted mt-1">Manage and track inventory verification</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('warehouse.stock-opname.create') }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus"></i> New Stock Opname
                        </a>
                        <a href="{{ route('warehouse.stock-opname.create') }}" class="btn btn-primary d-sm-none">
                            <i class="ti ti-plus"></i>
                        </a>
                        <a href="{{ route('warehouse.stock-opname.history') }}"
                            class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-history"></i> History
                        </a>
                        <a href="{{ route('warehouse.stock-opname.reports') }}"
                            class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-report"></i> Reports
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option value="">All Status</option>
                            <option value="scheduled">Scheduled</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                            <option value="verified">Verified</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Warehouse</label>
                        <select class="form-select">
                            <option value="">All Warehouses</option>
                            <option value="1">Main Warehouse</option>
                            <option value="2">Production Warehouse</option>
                            <option value="3">Finished Goods Warehouse</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Date Range</label>
                        <input type="text" class="form-control" placeholder="Select date range">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Search</label>
                        <div class="input-icon">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-icon-addon">
                                <i class="ti ti-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stock Opname List -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Warehouse</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Conducted By</th>
                                <th>Verified By</th>
                                <th>Discrepancy</th>
                                <th class="w-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stockOpnameData = [
                                    [
                                        'id' => 'SO-2023-001',
                                        'date' => '2023-11-15',
                                        'warehouse' => 'Main Warehouse',
                                        'type' => 'Full Inventory',
                                        'status' => 'Completed',
                                        'conducted_by' => 'John Doe',
                                        'verified_by' => 'Jane Smith',
                                        'discrepancy' => '2.3%',
                                    ],
                                    [
                                        'id' => 'SO-2023-002',
                                        'date' => '2023-11-20',
                                        'warehouse' => 'Production Warehouse',
                                        'type' => 'Raw Materials',
                                        'status' => 'Verified',
                                        'conducted_by' => 'Mike Johnson',
                                        'verified_by' => 'Sarah Williams',
                                        'discrepancy' => '1.5%',
                                    ],
                                    [
                                        'id' => 'SO-2023-003',
                                        'date' => '2023-11-25',
                                        'warehouse' => 'Finished Goods Warehouse',
                                        'type' => 'Finished Products',
                                        'status' => 'In Progress',
                                        'conducted_by' => 'Robert Brown',
                                        'verified_by' => '-',
                                        'discrepancy' => '-',
                                    ],
                                    [
                                        'id' => 'SO-2023-004',
                                        'date' => '2023-12-01',
                                        'warehouse' => 'Main Warehouse',
                                        'type' => 'Partial (Cement)',
                                        'status' => 'Scheduled',
                                        'conducted_by' => 'Assigned to: David Wilson',
                                        'verified_by' => '-',
                                        'discrepancy' => '-',
                                    ],
                                ];

                                // Generate more dummy data
                                for ($i = 5; $i <= 10; $i++) {
                                    $statuses = ['Scheduled', 'In Progress', 'Completed', 'Verified'];
                                    $types = [
                                        'Full Inventory',
                                        'Raw Materials',
                                        'Finished Products',
                                        'Partial (Cement)',
                                        'Partial (Aggregates)',
                                    ];
                                    $warehouses = [
                                        'Main Warehouse',
                                        'Production Warehouse',
                                        'Finished Goods Warehouse',
                                    ];

                                    $status = $statuses[array_rand($statuses)];
                                    $discrepancy =
                                        $status == 'Completed' || $status == 'Verified'
                                            ? rand(0, 5) . '.' . rand(1, 9) . '%'
                                            : '-';
                                    $verified_by =
                                        $status == 'Verified'
                                            ? ['Jane Smith', 'Sarah Williams', 'Emily Davis', 'Michael Brown'][
                                                array_rand([
                                                    'Jane Smith',
                                                    'Sarah Williams',
                                                    'Emily Davis',
                                                    'Michael Brown',
                                                ])
                                            ]
                                            : '-';

                                    $stockOpnameData[] = [
                                        'id' => 'SO-2023-00' . $i,
                                        'date' => '2023-12-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                                        'warehouse' => $warehouses[array_rand($warehouses)],
                                        'type' => $types[array_rand($types)],
                                        'status' => $status,
                                        'conducted_by' =>
                                            $status == 'Scheduled'
                                                ? 'Assigned to: ' .
                                                    ['John Doe', 'Mike Johnson', 'Robert Brown', 'David Wilson'][
                                                        array_rand([
                                                            'John Doe',
                                                            'Mike Johnson',
                                                            'Robert Brown',
                                                            'David Wilson',
                                                        ])
                                                    ]
                                                : ['John Doe', 'Mike Johnson', 'Robert Brown', 'David Wilson'][
                                                    array_rand([
                                                        'John Doe',
                                                        'Mike Johnson',
                                                        'Robert Brown',
                                                        'David Wilson',
                                                    ])
                                                ],
                                        'verified_by' => $verified_by,
                                        'discrepancy' => $discrepancy,
                                    ];
                                }
                            @endphp

                            @foreach ($stockOpnameData as $item)
                                <tr>
                                    <td>
                                        <a
                                            href="{{ route('warehouse.stock-opname.detail', ['id' => str_replace('SO-2023-00', '', $item['id'])]) }}">
                                            {{ $item['id'] }}
                                        </a>
                                    </td>
                                    <td>{{ $item['date'] }}</td>
                                    <td>{{ $item['warehouse'] }}</td>
                                    <td>{{ $item['type'] }}</td>
                                    <td>
                                        @php
                                            $statusClass = [
                                                'Scheduled' => 'bg-blue',
                                                'In Progress' => 'bg-yellow',
                                                'Completed' => 'bg-green',
                                                'Verified' => 'bg-purple',
                                            ][$item['status']];
                                        @endphp
                                        <span class="badge {{ $statusClass }}">{{ $item['status'] }}</span>
                                    </td>
                                    <td>{{ $item['conducted_by'] }}</td>
                                    <td>{{ $item['verified_by'] }}</td>
                                    <td>
                                        @if ($item['discrepancy'] != '-')
                                            <span
                                                class="{{ str_replace('%', '', $item['discrepancy']) > 2 ? 'text-danger' : 'text-success' }}">
                                                {{ $item['discrepancy'] }}
                                            </span>
                                        @else
                                            {{ $item['discrepancy'] }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <a href="{{ route('warehouse.stock-opname.detail', ['id' => str_replace('SO-2023-00', '', $item['id'])]) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                View
                                            </a>
                                            @if ($item['status'] != 'Verified')
                                                <a href="{{ route('warehouse.stock-opname.edit', ['id' => str_replace('SO-2023-00', '', $item['id'])]) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    Edit
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex mt-4">
                    <ul class="pagination ms-auto">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="ti ti-chevron-left"></i>
                                prev
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
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
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add any JavaScript functionality needed for this page
        });
    </script>
@endsection
