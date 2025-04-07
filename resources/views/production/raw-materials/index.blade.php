@extends('layouts.app')

@section('title', 'Raw Material Management')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Raw Material Management
                    </h2>
                    <div class="text-muted mt-1">Manage all raw materials for concrete production</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('production.raw-materials.create') }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus"></i>
                            Add New Material
                        </a>
                        <a href="{{ route('production.raw-materials.create') }}" class="btn btn-primary d-sm-none btn-icon">
                            <i class="ti ti-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Raw Materials Inventory</h3>
                            <div class="ms-auto">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search materials...">
                                    <button class="btn btn-icon" type="button">
                                        <i class="ti ti-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-muted">
                                    Show
                                    <div class="mx-2 d-inline-block">
                                        <select class="form-select form-select-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                    entries
                                </div>
                                <div class="ms-auto">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-outline-secondary">
                                            <i class="ti ti-filter"></i>
                                            Filter
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary">
                                            <i class="ti ti-file-export"></i>
                                            Export
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Material Code</th>
                                        <th>Material Name</th>
                                        <th>Category</th>
                                        <th>Current Stock</th>
                                        <th>Unit</th>
                                        <th>Reorder Level</th>
                                        <th>Last Updated</th>
                                        <th>Status</th>
                                        <th class="w-1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $materials = [
                                            [
                                                'id' => 1,
                                                'code' => 'CEM-PCC-01',
                                                'name' => 'Portland Composite Cement',
                                                'category' => 'Cement',
                                                'stock' => 15800,
                                                'unit' => 'kg',
                                                'reorder_level' => 5000,
                                                'last_updated' => '2023-10-15',
                                                'status' => 'Available',
                                            ],
                                            [
                                                'id' => 2,
                                                'code' => 'AGG-CA-01',
                                                'name' => 'Coarse Aggregate (20mm)',
                                                'category' => 'Aggregate',
                                                'stock' => 45600,
                                                'unit' => 'kg',
                                                'reorder_level' => 10000,
                                                'last_updated' => '2023-10-14',
                                                'status' => 'Available',
                                            ],
                                            [
                                                'id' => 3,
                                                'code' => 'AGG-FA-01',
                                                'name' => 'Fine Aggregate (Sand)',
                                                'category' => 'Aggregate',
                                                'stock' => 32500,
                                                'unit' => 'kg',
                                                'reorder_level' => 8000,
                                                'last_updated' => '2023-10-15',
                                                'status' => 'Available',
                                            ],
                                            [
                                                'id' => 4,
                                                'code' => 'ADM-SP-01',
                                                'name' => 'Superplasticizer',
                                                'category' => 'Admixture',
                                                'stock' => 450,
                                                'unit' => 'liter',
                                                'reorder_level' => 200,
                                                'last_updated' => '2023-10-13',
                                                'status' => 'Available',
                                            ],
                                            [
                                                'id' => 5,
                                                'code' => 'ADM-RE-01',
                                                'name' => 'Retarder',
                                                'category' => 'Admixture',
                                                'stock' => 180,
                                                'unit' => 'liter',
                                                'reorder_level' => 100,
                                                'last_updated' => '2023-10-12',
                                                'status' => 'Low Stock',
                                            ],
                                            [
                                                'id' => 6,
                                                'code' => 'SCM-FA-01',
                                                'name' => 'Fly Ash',
                                                'category' => 'SCM',
                                                'stock' => 4200,
                                                'unit' => 'kg',
                                                'reorder_level' => 2000,
                                                'last_updated' => '2023-10-10',
                                                'status' => 'Available',
                                            ],
                                            [
                                                'id' => 7,
                                                'code' => 'SCM-SF-01',
                                                'name' => 'Silica Fume',
                                                'category' => 'SCM',
                                                'stock' => 850,
                                                'unit' => 'kg',
                                                'reorder_level' => 500,
                                                'last_updated' => '2023-10-09',
                                                'status' => 'Available',
                                            ],
                                            [
                                                'id' => 8,
                                                'code' => 'ADM-AE-01',
                                                'name' => 'Air Entrainer',
                                                'category' => 'Admixture',
                                                'stock' => 75,
                                                'unit' => 'liter',
                                                'reorder_level' => 100,
                                                'last_updated' => '2023-10-08',
                                                'status' => 'Low Stock',
                                            ],
                                            [
                                                'id' => 9,
                                                'code' => 'AGG-CA-02',
                                                'name' => 'Coarse Aggregate (10mm)',
                                                'category' => 'Aggregate',
                                                'stock' => 28700,
                                                'unit' => 'kg',
                                                'reorder_level' => 10000,
                                                'last_updated' => '2023-10-14',
                                                'status' => 'Available',
                                            ],
                                            [
                                                'id' => 10,
                                                'code' => 'CEM-OPC-01',
                                                'name' => 'Ordinary Portland Cement',
                                                'category' => 'Cement',
                                                'stock' => 0,
                                                'unit' => 'kg',
                                                'reorder_level' => 5000,
                                                'last_updated' => '2023-10-05',
                                                'status' => 'Out of Stock',
                                            ],
                                        ];
                                    @endphp

                                    @foreach ($materials as $material)
                                        <tr>
                                            <td>{{ $material['code'] }}</td>
                                            <td>
                                                <a href="{{ route('production.raw-materials.detail', $material['id']) }}">
                                                    {{ $material['name'] }}
                                                </a>
                                            </td>
                                            <td>{{ $material['category'] }}</td>
                                            <td>{{ number_format($material['stock']) }}</td>
                                            <td>{{ $material['unit'] }}</td>
                                            <td>{{ number_format($material['reorder_level']) }}</td>
                                            <td>{{ $material['last_updated'] }}</td>
                                            <td>
                                                @if ($material['status'] == 'Available')
                                                    <span class="badge bg-success">Available</span>
                                                @elseif($material['status'] == 'Low Stock')
                                                    <span class="badge bg-warning">Low Stock</span>
                                                @else
                                                    <span class="badge bg-danger">Out of Stock</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('production.raw-materials.detail', $material['id']) }}"
                                                        class="btn btn-sm btn-icon" title="View">
                                                        <i class="ti ti-eye"></i>
                                                    </a>
                                                    <a href="{{ route('production.raw-materials.edit', $material['id']) }}"
                                                        class="btn btn-sm btn-icon" title="Edit">
                                                        <i class="ti ti-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-icon" title="Delete">
                                                        <i class="ti ti-trash text-danger"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Showing <span>1</span> to <span>10</span> of <span>10</span> entries
                            </p>
                            <ul class="pagination m-0 ms-auto">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="ti ti-chevron-left"></i>
                                        prev
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
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

                <!-- Material Statistics Cards -->
                <div class="col-12 mt-3">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-primary text-white avatar">
                                                <i class="ti ti-building-warehouse"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                10 Materials
                                            </div>
                                            <div class="text-muted">
                                                Total Inventory Items
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
                                            <span class="bg-green text-white avatar">
                                                <i class="ti ti-check"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                7 Materials
                                            </div>
                                            <div class="text-muted">
                                                Available
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
                                            <span class="bg-warning text-white avatar">
                                                <i class="ti ti-alert-triangle"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                2 Materials
                                            </div>
                                            <div class="text-muted">
                                                Low Stock
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
                                                <i class="ti ti-x"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                1 Material
                                            </div>
                                            <div class="text-muted">
                                                Out of Stock
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Material Categories Chart -->
                <div class="col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Material Categories</h3>
                        </div>
                        <div class="card-body">
                            <div id="material-categories-chart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <!-- Stock Level Chart -->
                <div class="col-lg-6 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Stock Levels</h3>
                        </div>
                        <div class="card-body">
                            <div id="stock-levels-chart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <!-- Recent Material Movements -->
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent Material Movements</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Material</th>
                                        <th>Type</th>
                                        <th>Quantity</th>
                                        <th>Source/Destination</th>
                                        <th>Reference</th>
                                        <th>Performed By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $movements = [
                                            [
                                                'date' => '2023-10-15 09:30',
                                                'material' => 'Portland Composite Cement',
                                                'type' => 'Received',
                                                'quantity' => '5000 kg',
                                                'source' => 'Supplier: Cement Industries Ltd',
                                                'reference' => 'PO-2023-156',
                                                'user' => 'John Doe',
                                            ],
                                            [
                                                'date' => '2023-10-15 10:45',
                                                'material' => 'Fine Aggregate (Sand)',
                                                'type' => 'Consumed',
                                                'quantity' => '1200 kg',
                                                'source' => 'Production: Batch #B-2023-1015-01',
                                                'reference' => 'PRD-2023-105',
                                                'user' => 'Robert Smith',
                                            ],
                                            [
                                                'date' => '2023-10-14 14:20',
                                                'material' => 'Coarse Aggregate (20mm)',
                                                'type' => 'Consumed',
                                                'quantity' => '1800 kg',
                                                'source' => 'Production: Batch #B-2023-1014-05',
                                                'reference' => 'PRD-2023-104',
                                                'user' => 'Robert Smith',
                                            ],
                                            [
                                                'date' => '2023-10-14 11:15',
                                                'material' => 'Superplasticizer',
                                                'type' => 'Consumed',
                                                'quantity' => '15 liter',
                                                'source' => 'Production: Batch #B-2023-1014-03',
                                                'reference' => 'PRD-2023-103',
                                                'user' => 'Robert Smith',
                                            ],
                                            [
                                                'date' => '2023-10-13 16:40',
                                                'material' => 'Retarder',
                                                'type' => 'Consumed',
                                                'quantity' => '8 liter',
                                                'source' => 'Production: Batch #B-2023-1013-08',
                                                'reference' => 'PRD-2023-102',
                                                'user' => 'Jane Wilson',
                                            ],
                                        ];
                                    @endphp

                                    @foreach ($movements as $movement)
                                        <tr>
                                            <td>{{ $movement['date'] }}</td>
                                            <td>{{ $movement['material'] }}</td>
                                            <td>
                                                @if ($movement['type'] == 'Received')
                                                    <span class="badge bg-green">{{ $movement['type'] }}</span>
                                                @else
                                                    <span class="badge bg-azure">{{ $movement['type'] }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $movement['quantity'] }}</td>
                                            <td>{{ $movement['source'] }}</td>
                                            <td>{{ $movement['reference'] }}</td>
                                            <td>{{ $movement['user'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-link">View All Movements</a>
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
            // Material Categories Chart
            var categoriesOptions = {
                series: [4, 3, 2, 1],
                chart: {
                    type: 'pie',
                    height: 300,
                },
                labels: ['Aggregate', 'Admixture', 'Cement', 'SCM'],
                colors: ['#206bc4', '#4299e1', '#ae3ec9', '#f76707'],
                legend: {
                    position: 'bottom'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 300
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var categoriesChart = new ApexCharts(document.querySelector("#material-categories-chart"),
                categoriesOptions);
            categoriesChart.render();

            // Stock Levels Chart
            var stockOptions = {
                series: [{
                    name: 'Current Stock',
                    data: [15800, 45600, 32500, 450, 180, 4200, 850, 75, 28700, 0]
                }, {
                    name: 'Reorder Level',
                    data: [5000, 10000, 8000, 200, 100, 2000, 500, 100, 10000, 5000]
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    stacked: false,
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                    }
                },
                xaxis: {
                    categories: ['CEM-PCC-01', 'AGG-CA-01', 'AGG-FA-01', 'ADM-SP-01', 'ADM-RE-01',
                        'SCM-FA-01', 'SCM-SF-01', 'ADM-AE-01', 'AGG-CA-02', 'CEM-OPC-01'
                    ],
                    labels: {
                        rotate: -45,
                        style: {
                            fontSize: '10px'
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Quantity'
                    },
                    labels: {
                        formatter: function(val) {
                            return val.toFixed(0);
                        }
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val.toFixed(0);
                        }
                    }
                },
                legend: {
                    position: 'top'
                },
                colors: ['#206bc4', '#f59f00']
            };

            var stockChart = new ApexCharts(document.querySelector("#stock-levels-chart"), stockOptions);
            stockChart.render();
        });
    </script>
@endsection
