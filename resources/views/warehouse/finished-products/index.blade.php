@extends('layouts.app')

@section('title', 'Finished Product Inventory')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Finished Product Inventory
                </h2>
                <div class="text-muted mt-1">Manage your concrete product inventory</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('warehouse.finished-products.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-plus"></i>
                        Add New Product
                    </a>
                    <a href="{{ route('warehouse.finished-products.create') }}" class="btn btn-primary d-sm-none btn-icon">
                        <i class="ti ti-plus"></i>
                    </a>
                    <a href="{{ route('warehouse.finished-products.stock-movement') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                        <i class="ti ti-history"></i>
                        Stock Movement
                    </a>
                    <a href="{{ route('warehouse.finished-products.low-stock') }}" class="btn btn-outline-warning d-none d-sm-inline-block">
                        <i class="ti ti-alert-triangle"></i>
                        Low Stock
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
                <h3 class="card-title">Finished Products</h3>
                <div class="card-actions">
                    <div class="row g-2">
                        <div class="col">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" id="search-product" class="form-control" placeholder="Search products...">
                            </div>
                        </div>
                        <div class="col-auto">
                            <select class="form-select" id="filter-product-type">
                                <option value="">All Product Types</option>
                                <option value="Ready Mix">Ready Mix</option>
                                <option value="Precast">Precast</option>
                                <option value="Concrete Block">Concrete Block</option>
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
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Type</th>
                                <th>Strength</th>
                                <th>Current Stock</th>
                                <th>Unit</th>
                                <th>Production Date</th>
                                <th>Status</th>
                                <th class="w-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $products = [
                                [
                                    'id' => 1,
                                    'code' => 'RM-K225-001',
                                    'name' => 'Ready Mix K225',
                                    'type' => 'Ready Mix',
                                    'strength' => 'K225',
                                    'stock' => 150,
                                    'unit' => 'm³',
                                    'production_date' => '2023-10-15',
                                    'status' => 'Available'
                                ],
                                [
                                    'id' => 2,
                                    'code' => 'RM-K300-002',
                                    'name' => 'Ready Mix K300',
                                    'type' => 'Ready Mix',
                                    'strength' => 'K300',
                                    'stock' => 120,
                                    'unit' => 'm³',
                                    'production_date' => '2023-10-16',
                                    'status' => 'Available'
                                ],
                                [
                                    'id' => 3,
                                    'code' => 'RM-K350-003',
                                    'name' => 'Ready Mix K350',
                                    'type' => 'Ready Mix',
                                    'strength' => 'K350',
                                    'stock' => 85,
                                    'unit' => 'm³',
                                    'production_date' => '2023-10-17',
                                    'status' => 'Available'
                                ],
                                [
                                    'id' => 4,
                                    'code' => 'RM-K400-004',
                                    'name' => 'Ready Mix K400',
                                    'type' => 'Ready Mix',
                                    'strength' => 'K400',
                                    'stock' => 65,
                                    'unit' => 'm³',
                                    'production_date' => '2023-10-18',
                                    'status' => 'Available'
                                ],
                                [
                                    'id' => 5,
                                    'code' => 'RM-K450-005',
                                    'name' => 'Ready Mix K450',
                                    'type' => 'Ready Mix',
                                    'strength' => 'K450',
                                    'stock' => 40,
                                    'unit' => 'm³',
                                    'production_date' => '2023-10-19',
                                    'status' => 'Low Stock'
                                ],
                                [
                                    'id' => 6,
                                    'code' => 'PC-K300-001',
                                    'name' => 'Precast Panel K300',
                                    'type' => 'Precast',
                                    'strength' => 'K300',
                                    'stock' => 25,
                                    'unit' => 'pcs',
                                    'production_date' => '2023-10-15',
                                    'status' => 'Available'
                                ],
                                [
                                    'id' => 7,
                                    'code' => 'PC-K350-002',
                                    'name' => 'Precast Beam K350',
                                    'type' => 'Precast',
                                    'strength' => 'K350',
                                    'stock' => 15,
                                    'unit' => 'pcs',
                                    'production_date' => '2023-10-16',
                                    'status' => 'Low Stock'
                                ],
                                [
                                    'id' => 8,
                                    'code' => 'CB-K175-001',
                                    'name' => 'Concrete Block K175',
                                    'type' => 'Concrete Block',
                                    'strength' => 'K175',
                                    'stock' => 500,
                                    'unit' => 'pcs',
                                    'production_date' => '2023-10-17',
                                    'status' => 'Available'
                                ],
                                [
                                    'id' => 9,
                                    'code' => 'CB-K200-002',
                                    'name' => 'Concrete Paving Block K200',
                                    'type' => 'Concrete Block',
                                    'strength' => 'K200',
                                    'stock' => 750,
                                    'unit' => 'pcs',
                                    'production_date' => '2023-10-18',
                                    'status' => 'Available'
                                ],
                                [
                                    'id' => 10,
                                    'code' => 'RM-K500-006',
                                    'name' => 'Ready Mix K500',
                                    'type' => 'Ready Mix',
                                    'strength' => 'K500',
                                    'stock' => 30,
                                    'unit' => 'm³',
                                    'production_date' => '2023-10-20',
                                    'status' => 'Low Stock'
                                ]
                            ];
                            @endphp

                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product['code'] }}</td>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['type'] }}</td>
                                <td>{{ $product['strength'] }}</td>
                                <td>
                                    <span class="@if($product['status'] == 'Low Stock') text-warning @endif">
                                        {{ $product['stock'] }}
                                    </span>
                                </td>
                                <td>{{ $product['unit'] }}</td>
                                <td>{{ $product['production_date'] }}</td>
                                <td>
                                    @if($product['status'] == 'Available')
                                    <span class="badge bg-success">Available</span>
                                    @elseif($product['status'] == 'Low Stock')
                                    <span class="badge bg-warning">Low Stock</span>
                                    @else
                                    <span class="badge bg-danger">Out of Stock</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('warehouse.finished-products.detail', $product['id']) }}" class="btn btn-sm btn-info">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <a href="{{ route('warehouse.finished-products.edit', $product['id']) }}" class="btn btn-sm btn-primary">
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
    </div>
</div>

<div class="container-xl mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Inventory by Product Type</h3>
                </div>
                <div class="card-body">
                    <div id="chart-inventory-by-type" style="height: 250px"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Inventory Status</h3>
                </div>
                <div class="card-body">
                    <div id="chart-inventory-status" style="height: 250px"></div>
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
        // Chart for inventory by product type
        var optionsType = {
            series: [{
                data: [460, 40, 1250]
            }],
            chart: {
                type: 'bar',
                height: 250
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            colors: ['#0061f2'],
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return val + " units";
                },
            },
            xaxis: {
                categories: ['Ready Mix', 'Precast', 'Concrete Block'],
            }
        };

        var chartType = new ApexCharts(document.querySelector("#chart-inventory-by-type"), optionsType);
        chartType.render();

        // Chart for inventory status
        var optionsStatus = {
            series: [7, 3],
            chart: {
                type: 'donut',
                height: 250
            },
            labels: ['Available', 'Low Stock'],
            colors: ['#2fb344', '#f59f00'],
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

        var chartStatus = new ApexCharts(document.querySelector("#chart-inventory-status"), optionsStatus);
        chartStatus.render();

        // Search functionality
        document.getElementById('search-product').addEventListener('keyup', function() {
            var value = this.value.toLowerCase();
            var rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(function(row) {
                var text = row.textContent.toLowerCase();
                row.style.display = text.indexOf(value) > -1 ? '' : 'none';
            });
        });

        // Filter by product type
        document.getElementById('filter-product-type').addEventListener('change', function() {
            var value = this.value.toLowerCase();
            var rows = document.querySelectorAll('tbody tr');
            
            if (value === '') {
                rows.forEach(function(row) {
                    row.style.display = '';
                });
                return;
            }
            
            rows.forEach(function(row) {
                var type = row.children[2].textContent.toLowerCase();
                row.style.display = type === value ? '' : 'none';
            });
        });
    });
</script>
@endsection

