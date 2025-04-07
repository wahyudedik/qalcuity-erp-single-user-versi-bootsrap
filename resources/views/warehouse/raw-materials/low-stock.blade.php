@extends('layouts.app')

@section('title', 'Low Stock Raw Materials')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Low Stock Raw Materials
                </h2>
                <div class="text-muted mt-1">Materials that need to be restocked soon</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('warehouse.raw-materials') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left me-1"></i>
                        Back to All Materials
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
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Low Stock Materials</div>
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
                        <div class="d-flex align-items-baseline">
                            <div class="h1 mb-0 me-2">8</div>
                            <div class="me-auto">
                                <span class="text-red d-inline-flex align-items-center lh-1">
                                    +2 <i class="ti ti-arrow-up-right"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div id="low-stock-chart" class="chart-sm"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Estimated Restock Cost</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Materials</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item active" href="#">All Materials</a>
                                        <a class="dropdown-item" href="#">Cement Only</a>
                                        <a class="dropdown-item" href="#">Aggregates Only</a>
                                        <a class="dropdown-item" href="#">Admixtures Only</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline">
                            <div class="h1 mb-0 me-2">Rp 87,500,000</div>
                            <div class="me-auto">
                                <span class="text-yellow d-inline-flex align-items-center lh-1">
                                    +5.2% <i class="ti ti-arrow-up-right"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div id="restock-cost-chart" class="chart-sm"></div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Low Stock Materials</h3>
                <div class="card-actions">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-filter me-1"></i>
                            Filter
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">
                                <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                Cement
                            </a>
                            <a class="dropdown-item" href="#">
                                <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                Aggregate
                            </a>
                            <a class="dropdown-item" href="#">
                                <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                Sand
                            </a>
                            <a class="dropdown-item" href="#">
                                <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                Admixture
                            </a>
                            <a class="dropdown-item" href="#">
                                <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                Other
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                Critical (< 50%)
                            </a>
                            <a class="dropdown-item" href="#">
                                <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                Warning (50-80%)
                            </a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-primary">
                        <i class="ti ti-file-export me-1"></i>
                        Export
                    </button>
                    <button type="button" class="btn btn-primary">
                        <i class="ti ti-shopping-cart me-1"></i>
                        Create Purchase Orders
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Material</th>
                            <th>Category</th>
                            <th>Current Stock</th>
                            <th>Min. Stock</th>
                            <th>Stock Level</th>
                            <th>Restock Amount</th>
                            <th>Est. Cost</th>
                            <th>Supplier</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $lowStockMaterials = [
                            [
                                'id' => 10,
                                'code' => 'CEM-OPC-001',
                                'name' => 'Ordinary Portland Cement',
                                'category' => 'Cement',
                                'stock' => 2800,
                                'min_stock' => 3000,
                                'unit' => 'kg',
                                'level_percent' => 93,
                                'level_status' => 'warning',
                                'restock_amount' => 5000,
                                'price' => 1300,
                                'supplier' => 'PT Indocement'
                            ],
                            [
                                'id' => 15,
                                'code' => 'ADM-SP-002',
                                'name' => 'Superplasticizer Type F',
                                'category' => 'Admixture',
                                'stock' => 120,
                                'min_stock' => 250,
                                'unit' => 'liter',
                                'level_percent' => 48,
                                'level_status' => 'danger',
                                'restock_amount' => 500,
                                'price' => 25000,
                                'supplier' => 'PT Sika Indonesia'
                            ],
                            [
                                'id' => 8,
                                'code' => 'AGG-20-002',
                                'name' => 'Coarse Aggregate 20mm',
                                'category' => 'Aggregate',
                                'stock' => 15000,
                                'min_stock' => 20000,
                                'unit' => 'kg',
                                'level_percent' => 75,
                                'level_status' => 'warning',
                                'restock_amount' => 20000,
                                'price' => 200,
                                'supplier' => 'PT Quarry Utama'
                            ],
                            [
                                'id' => 22,
                                'code' => 'SND-FNE-001',
                                'name' => 'Fine Sand',
                                'category' => 'Sand',
                                'stock' => 8500,
                                'min_stock' => 12000,
                                'unit' => 'kg',
                                'level_percent' => 71,
                                'level_status' => 'warning',
                                'restock_amount' => 15000,
                                'price' => 180,
                                'supplier' => 'PT Pasir Sejahtera'
                            ],
                            [
                                'id' => 17,
                                'code' => 'ADM-RE-001',
                                'name' => 'Retarder',
                                'category' => 'Admixture',
                                'stock' => 50,
                                'min_stock' => 150,
                                'unit' => 'liter',
                                'level_percent' => 33,
                                'level_status' => 'danger',
                                'restock_amount' => 200,
                                'price' => 22000,
                                'supplier' => 'PT Fosroc Indonesia'
                            ],
                            [
                                'id' => 5,
                                'code' => 'CEM-SRC-001',
                                'name' => 'Sulfate Resistant Cement',
                                'category' => 'Cement',
                                'stock' => 1200,
                                'min_stock' => 2000,
                                'unit' => 'kg',
                                'level_percent' => 60,
                                'level_status' => 'warning',
                                'restock_amount' => 3000,
                                'price' => 1500,
                                'supplier' => 'PT Holcim Indonesia'
                            ],
                            [
                                'id' => 30,
                                'code' => 'FLY-ASH-001',
                                'name' => 'Fly Ash Type F',
                                'category' => 'Other',
                                'stock' => 800,
                                'min_stock' => 2500,
                                'unit' => 'kg',
                                'level_percent' => 32,
                                'level_status' => 'danger',
                                'restock_amount' => 5000,
                                'price' => 900,
                                'supplier' => 'PT PLTU Suralaya'
                            ],
                            [
                                'id' => 12,
                                'code' => 'SIL-FUM-001',
                                'name' => 'Silica Fume',
                                'category' => 'Other',
                                'stock' => 300,
                                'min_stock' => 500,
                                'unit' => 'kg',
                                'level_percent' => 60,
                                'level_status' => 'warning',
                                'restock_amount' => 1000,
                                'price' => 15000,
                                'supplier' => 'PT Sika Indonesia'
                            ]
                        ];
                        @endphp

                        @foreach($lowStockMaterials as $material)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="avatar me-2 bg-{{ $material['level_status'] }}-lt">
                                        {{ substr($material['category'], 0, 1) }}
                                    </span>
                                    <div>
                                        <a href="{{ route('warehouse.raw-materials.detail', $material['id']) }}" class="text-reset">{{ $material['name'] }}</a>
                                        <div class="text-muted">{{ $material['code'] }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $material['category'] }}</td>
                            <td>{{ number_format($material['stock']) }} {{ $material['unit'] }}</td>
                            <td>{{ number_format($material['min_stock']) }} {{ $material['unit'] }}</td>
                            <td>
                                <div class="clearfix">
                                    <div class="float-start mt-1">
                                        {{ $material['level_percent'] }}%
                                    </div>
                                    <div class="float-end">
                                        <small class="text-{{ $material['level_status'] }}">
                                            {{ $material['level_status'] == 'danger' ? 'Critical' : 'Warning' }}
                                        </small>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-{{ $material['level_status'] }}" style="width: {{ $material['level_percent'] }}%" role="progressbar" aria-valuenow="{{ $material['level_percent'] }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $material['level_percent'] }}% Complete">
                                    </div>
                                </div>
                            </td>
                            <td>{{ number_format($material['restock_amount']) }} {{ $material['unit'] }}</td>
                            <td>Rp {{ number_format($material['restock_amount'] * $material['price']) }}</td>
                            <td>{{ $material['supplier'] }}</td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                                                        <a href="{{ route('warehouse.raw-materials.detail', $material['id']) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="ti ti-eye"></i>
                                        View
                                    </a>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createPOModal{{ $material['id'] }}">
                                        <i class="ti ti-shopping-cart"></i>
                                        Order
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Showing <span>8</span> of <span>8</span> low stock materials</p>
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

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Pending Purchase Orders</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>PO Number</th>
                            <th>Material</th>
                            <th>Supplier</th>
                            <th>Quantity</th>
                            <th>Total Value</th>
                            <th>Order Date</th>
                            <th>Expected Delivery</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $pendingPOs = [
                            [
                                'id' => 1,
                                'po_number' => 'PO-2023-10-001',
                                'material_id' => 5,
                                'material_name' => 'Sulfate Resistant Cement',
                                'material_code' => 'CEM-SRC-001',
                                'supplier' => 'PT Holcim Indonesia',
                                'quantity' => 3000,
                                'unit' => 'kg',
                                'price' => 1500,
                                'order_date' => '2023-10-18',
                                'expected_delivery' => '2023-10-25',
                                'status' => 'Pending'
                            ],
                            [
                                'id' => 2,
                                'po_number' => 'PO-2023-10-002',
                                'material_id' => 17,
                                'material_name' => 'Retarder',
                                'material_code' => 'ADM-RE-001',
                                'supplier' => 'PT Fosroc Indonesia',
                                'quantity' => 200,
                                'unit' => 'liter',
                                'price' => 22000,
                                'order_date' => '2023-10-19',
                                'expected_delivery' => '2023-10-26',
                                'status' => 'Processing'
                            ],
                            [
                                'id' => 3,
                                'po_number' => 'PO-2023-10-003',
                                'material_id' => 30,
                                'material_name' => 'Fly Ash Type F',
                                'material_code' => 'FLY-ASH-001',
                                'supplier' => 'PT PLTU Suralaya',
                                'quantity' => 5000,
                                'unit' => 'kg',
                                'price' => 900,
                                'order_date' => '2023-10-20',
                                'expected_delivery' => '2023-10-27',
                                'status' => 'Confirmed'
                            ]
                        ];
                        @endphp

                        @foreach($pendingPOs as $po)
                        <tr>
                            <td>
                                <a href="#" class="text-reset">{{ $po['po_number'] }}</a>
                            </td>
                            <td>
                                <div>
                                    <a href="{{ route('warehouse.raw-materials.detail', $po['material_id']) }}" class="text-reset">{{ $po['material_name'] }}</a>
                                    <div class="text-muted">{{ $po['material_code'] }}</div>
                                </div>
                            </td>
                            <td>{{ $po['supplier'] }}</td>
                            <td>{{ number_format($po['quantity']) }} {{ $po['unit'] }}</td>
                            <td>Rp {{ number_format($po['quantity'] * $po['price']) }}</td>
                            <td>{{ $po['order_date'] }}</td>
                            <td>{{ $po['expected_delivery'] }}</td>
                            <td>
                                @if($po['status'] == 'Pending')
                                <span class="badge bg-yellow">Pending</span>
                                @elseif($po['status'] == 'Processing')
                                <span class="badge bg-blue">Processing</span>
                                @elseif($po['status'] == 'Confirmed')
                                <span class="badge bg-green">Confirmed</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        <i class="ti ti-eye"></i>
                                        View
                                    </a>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">
                                                <i class="ti ti-edit me-2"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="ti ti-truck-delivery me-2"></i>
                                                Mark as Received
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="ti ti-printer me-2"></i>
                                                Print
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#">
                                                <i class="ti ti-trash me-2"></i>
                                                Cancel
                                            </a>
                                        </div>
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

<!-- Create PO Modals -->
@foreach($lowStockMaterials as $material)
<div class="modal modal-blur fade" id="createPOModal{{ $material['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Purchase Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Material</label>
                    <input type="text" class="form-control" value="{{ $material['name'] }} ({{ $material['code'] }})" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Current Stock</label>
                    <input type="text" class="form-control" value="{{ number_format($material['stock']) }} {{ $material['unit'] }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Minimum Stock</label>
                    <input type="text" class="form-control" value="{{ number_format($material['min_stock']) }} {{ $material['unit'] }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Supplier</label>
                    <select class="form-select" name="supplier">
                        <option value="{{ $material['supplier'] }}">{{ $material['supplier'] }}</option>
                        <option value="PT Supplier Alternatif">PT Supplier Alternatif</option>
                        <option value="PT Material Utama">PT Material Utama</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Order Quantity ({{ $material['unit'] }})</label>
                    <input type="number" class="form-control" name="order_quantity" value="{{ $material['restock_amount'] }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Unit Price</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="unit_price" value="{{ $material['price'] }}">
                        <span class="input-group-text">/ {{ $material['unit'] }}</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Total Value</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" class="form-control" value="{{ number_format($material['restock_amount'] * $material['price']) }}" disabled>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Expected Delivery Date</label>
                    <input type="date" class="form-control" name="delivery_date" value="{{ date('Y-m-d', strtotime('+7 days')) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary ms-auto" data-bs-dismiss="modal">Create PO</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Low stock trend chart
        var lowStockOptions = {
            series: [{
                name: 'Low Stock Items',
                data: [3, 4, 5, 4, 6, 7, 8]
            }],
            chart: {
                type: 'area',
                height: 100,
                sparkline: {
                    enabled: true
                }
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.2,
                    stops: [0, 100]
                }
            },
            colors: ['#f59f00']
        };

        var lowStockChart = new ApexCharts(document.querySelector("#low-stock-chart"), lowStockOptions);
        lowStockChart.render();

        // Restock cost chart
        var restockCostOptions = {
            series: [{
                name: 'Restock Cost',
                data: [45000000, 52000000, 60000000, 55000000, 70000000, 80000000, 87500000]
            }],
            chart: {
                type: 'area',
                height: 100,
                sparkline: {
                    enabled: true
                }
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.2,
                    stops: [0, 100]
                }
            },
            colors: ['#206bc4']
        };

        var restockCostChart = new ApexCharts(document.querySelector("#restock-cost-chart"), restockCostOptions);
        restockCostChart.render();

        // Update total value when quantity or price changes
        document.querySelectorAll('[name="order_quantity"], [name="unit_price"]').forEach(function(input) {
            input.addEventListener('input', function() {
                const modal = this.closest('.modal');
                const quantity = parseFloat(modal.querySelector('[name="order_quantity"]').value) || 0;
                const price = parseFloat(modal.querySelector('[name="unit_price"]').value) || 0;
                const totalValue = quantity * price;
                
                // Format the total value with commas
                const formattedTotal = totalValue.toLocaleString('en-US');
                
                // Update the total value input
                modal.querySelector('.modal-body .input-group input[disabled]').value = formattedTotal;
            });
        });
    });
</script>
@endsection

