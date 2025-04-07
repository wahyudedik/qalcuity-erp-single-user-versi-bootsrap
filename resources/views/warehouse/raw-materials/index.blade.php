@extends('layouts.app')

@section('title', 'Raw Material Inventory')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Raw Material Inventory
                </h2>
                <div class="text-muted mt-1">Manage your raw material inventory</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('warehouse.raw-materials.stock-movement') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-history me-1"></i>
                        Stock Movement
                    </a>
                    <a href="{{ route('warehouse.raw-materials.low-stock') }}" class="btn btn-warning d-none d-sm-inline-block">
                        <i class="ti ti-alert-triangle me-1"></i>
                        Low Stock
                    </a>
                    <a href="{{ route('warehouse.raw-materials.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-plus me-1"></i>
                        Add New Material
                    </a>
                    <a href="{{ route('warehouse.raw-materials.create') }}" class="btn btn-primary d-sm-none">
                        <i class="ti ti-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Raw Materials</h3>
                <div class="card-actions">
                    <div class="row g-2">
                        <div class="col">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" id="search-material" class="form-control" placeholder="Search materials...">
                            </div>
                        </div>
                        <div class="col-auto">
                            <select class="form-select" id="filter-category">
                                <option value="">All Categories</option>
                                <option value="cement">Cement</option>
                                <option value="aggregate">Aggregate</option>
                                <option value="sand">Sand</option>
                                <option value="admixture">Admixture</option>
                                <option value="water">Water</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Material Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Current Stock</th>
                                <th>Unit</th>
                                <th>Min. Stock</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th class="w-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $materials = [
                                [
                                    'id' => 1,
                                    'code' => 'CEM-PCC-001',
                                    'name' => 'Portland Composite Cement',
                                    'category' => 'Cement',
                                    'stock' => 12500,
                                    'unit' => 'kg',
                                    'min_stock' => 5000,
                                    'location' => 'Silo A',
                                    'status' => 'Normal'
                                ],
                                [
                                    'id' => 2,
                                    'code' => 'AGG-10-001',
                                    'name' => 'Coarse Aggregate 10mm',
                                    'category' => 'Aggregate',
                                    'stock' => 45000,
                                    'unit' => 'kg',
                                    'min_stock' => 10000,
                                    'location' => 'Yard B',
                                    'status' => 'Normal'
                                ],
                                [
                                    'id' => 3,
                                    'code' => 'AGG-20-001',
                                    'name' => 'Coarse Aggregate 20mm',
                                    'category' => 'Aggregate',
                                    'stock' => 38000,
                                    'unit' => 'kg',
                                    'min_stock' => 10000,
                                    'location' => 'Yard C',
                                    'status' => 'Normal'
                                ],
                                [
                                    'id' => 4,
                                    'code' => 'SND-001',
                                    'name' => 'Fine Sand',
                                    'category' => 'Sand',
                                    'stock' => 28000,
                                    'unit' => 'kg',
                                    'min_stock' => 8000,
                                    'location' => 'Yard D',
                                    'status' => 'Normal'
                                ],
                                [
                                    'id' => 5,
                                    'code' => 'ADM-SP-001',
                                    'name' => 'Superplasticizer',
                                    'category' => 'Admixture',
                                    'stock' => 450,
                                    'unit' => 'liter',
                                    'min_stock' => 200,
                                    'location' => 'Chemical Store',
                                    'status' => 'Normal'
                                ],
                                [
                                    'id' => 6,
                                    'code' => 'ADM-RT-001',
                                    'name' => 'Retarder',
                                    'category' => 'Admixture',
                                    'stock' => 180,
                                    'unit' => 'liter',
                                    'min_stock' => 200,
                                    'location' => 'Chemical Store',
                                    'status' => 'Low Stock'
                                ],
                                [
                                    'id' => 7,
                                    'code' => 'FLY-ASH-001',
                                    'name' => 'Fly Ash Type F',
                                    'category' => 'Other',
                                    'stock' => 3500,
                                    'unit' => 'kg',
                                    'min_stock' => 2000,
                                    'location' => 'Silo B',
                                    'status' => 'Normal'
                                ],
                                [
                                    'id' => 8,
                                    'code' => 'SIL-FUM-001',
                                    'name' => 'Silica Fume',
                                    'category' => 'Other',
                                    'stock' => 850,
                                    'unit' => 'kg',
                                    'min_stock' => 500,
                                    'location' => 'Special Store',
                                    'status' => 'Normal'
                                ],
                                [
                                    'id' => 9,
                                    'code' => 'WAT-001',
                                    'name' => 'Clean Water',
                                    'category' => 'Water',
                                    'stock' => 15000,
                                    'unit' => 'liter',
                                    'min_stock' => 5000,
                                    'location' => 'Water Tank',
                                    'status' => 'Normal'
                                ],
                                [
                                    'id' => 10,
                                    'code' => 'CEM-OPC-001',
                                    'name' => 'Ordinary Portland Cement',
                                    'category' => 'Cement',
                                    'stock' => 2800,
                                    'unit' => 'kg',
                                    'min_stock' => 3000,
                                    'location' => 'Silo C',
                                    'status' => 'Low Stock'
                                ]
                            ];
                            @endphp

                            @foreach($materials as $material)
                            <tr>
                                <td>{{ $material['code'] }}</td>
                                <td>{{ $material['name'] }}</td>
                                <td>{{ $material['category'] }}</td>
                                <td>{{ number_format($material['stock']) }} {{ $material['unit'] }}</td>
                                <td>{{ $material['unit'] }}</td>
                                <td>{{ number_format($material['min_stock']) }} {{ $material['unit'] }}</td>
                                <td>{{ $material['location'] }}</td>
                                <td>
                                    @if($material['status'] == 'Normal')
                                    <span class="badge bg-success">Normal</span>
                                    @else
                                    <span class="badge bg-warning">Low Stock</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('warehouse.raw-materials.detail', $material['id']) }}" class="btn btn-sm btn-info">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <a href="{{ route('warehouse.raw-materials.edit', $material['id']) }}" class="btn btn-sm btn-primary">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Showing <span>1</span> to <span>10</span> of <span>25</span> entries</p>
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
                    <li class="page-item">
                        <a class="page-link" href="#">
                            next
                            <i class="ti ti-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

                <div class="row mt-4">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Total Raw Materials</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item active" href="#">Last 7 days</a>
                                        <a class="dropdown-item" href="#">Last 30 days</a>
                                        <a class="dropdown-item" href="#">Last 3 months</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h1 mb-3">10 items</div>
                        <div class="d-flex mb-2">
                            <div>Inventory Value</div>
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    <i class="ti ti-trending-up"></i> 8.3%
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                                <span class="visually-hidden">75% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Low Stock Items</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item active" href="#">Last 7 days</a>
                                        <a class="dropdown-item" href="#">Last 30 days</a>
                                        <a class="dropdown-item" href="#">Last 3 months</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h1 mb-3">2 items</div>
                        <div class="d-flex mb-2">
                            <div>Percentage</div>
                            <div class="ms-auto">
                                <span class="text-danger d-inline-flex align-items-center lh-1">
                                    <i class="ti ti-trending-up"></i> 20%
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" aria-label="20% Complete">
                                <span class="visually-hidden">20% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Stock Movement</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item active" href="#">Last 7 days</a>
                                        <a class="dropdown-item" href="#">Last 30 days</a>
                                        <a class="dropdown-item" href="#">Last 3 months</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h1 mb-3">28 transactions</div>
                        <div class="d-flex mb-2">
                            <div>This week</div>
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    <i class="ti ti-trending-up"></i> 12%
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-blue" style="width: 65%" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" aria-label="65% Complete">
                                <span class="visually-hidden">65% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Inventory Turnover</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item active" href="#">Last 7 days</a>
                                        <a class="dropdown-item" href="#">Last 30 days</a>
                                        <a class="dropdown-item" href="#">Last 3 months</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h1 mb-3">4.5 ratio</div>
                        <div class="d-flex mb-2">
                            <div>This month</div>
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    <i class="ti ti-trending-up"></i> 5.2%
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" style="width: 45%" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" aria-label="45% Complete">
                                <span class="visually-hidden">45% Complete</span>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.getElementById('search-material');
        searchInput.addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');
            
            tableRows.forEach(row => {
                const materialName = row.cells[1].textContent.toLowerCase();
                const materialCode = row.cells[0].textContent.toLowerCase();
                
                if (materialName.includes(searchValue) || materialCode.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
        
        // Category filter
        const categoryFilter = document.getElementById('filter-category');
        categoryFilter.addEventListener('change', function() {
            const filterValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');
            
            if (filterValue === '') {
                tableRows.forEach(row => {
                    row.style.display = '';
                });
                return;
            }
            
            tableRows.forEach(row => {
                const category = row.cells[2].textContent.toLowerCase();
                
                if (category.includes(filterValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection

