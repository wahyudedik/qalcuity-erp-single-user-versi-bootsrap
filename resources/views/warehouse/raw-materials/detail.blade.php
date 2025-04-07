@extends('layouts.app')

@section('title', 'Raw Material Details')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Raw Material Details
                </h2>
                <div class="text-muted mt-1">Detailed information about raw material</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('warehouse.raw-materials') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left me-1"></i>
                        Back to List
                    </a>
                    <a href="{{ route('warehouse.raw-materials.edit', $id) }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-edit me-1"></i>
                        Edit Material
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        @php
        $materials = [
            1 => [
                'id' => 1,
                'code' => 'CEM-PCC-001',
                'name' => 'Portland Composite Cement',
                'category' => 'Cement',
                'stock' => 12500,
                'unit' => 'kg',
                'min_stock' => 5000,
                'location' => 'Silo A',
                'status' => 'Normal',
                'description' => 'Portland Composite Cement (PCC) is a hydraulic cement consisting of portland cement and fine supplementary cementitious materials.',
                'supplier' => 'PT Semen Indonesia',
                'price' => 1200,
                'last_restock' => '2023-10-15',
                'expiry_date' => '2024-10-15',
                'quality_standard' => 'SNI 7064:2014',
                'notes' => 'Store in a dry place. Keep away from moisture.'
            ],
            2 => [
                'id' => 2,
                'code' => 'AGG-10-001',
                'name' => 'Coarse Aggregate 10mm',
                'category' => 'Aggregate',
                'stock' => 45000,
                'unit' => 'kg',
                'min_stock' => 10000,
                'location' => 'Yard B',
                'status' => 'Normal',
                'description' => '10mm coarse aggregate for concrete production. Clean and properly graded.',
                'supplier' => 'PT Quarry Utama',
                'price' => 250,
                'last_restock' => '2023-10-10',
                'expiry_date' => null,
                'quality_standard' => 'ASTM C33',
                'notes' => 'Keep covered to prevent contamination.'
            ],
            3 => [
                'id' => 3,
                'code' => 'AGG-20-001',
                'name' => 'Coarse Aggregate 20mm',
                'category' => 'Aggregate',
                'stock' => 38000,
                'unit' => 'kg',
                'min_stock' => 10000,
                'location' => 'Yard C',
                'status' => 'Normal',
                'description' => '20mm coarse aggregate for concrete production. Clean and properly graded.',
                'supplier' => 'PT Quarry Utama',
                'price' => 230,
                'last_restock' => '2023-10-08',
                'expiry_date' => null,
                'quality_standard' => 'ASTM C33',
                'notes' => 'Keep covered to prevent contamination.'
            ],
            10 => [
                'id' => 10,
                'code' => 'CEM-OPC-001',
                'name' => 'Ordinary Portland Cement',
                'category' => 'Cement',
                'stock' => 2800,
                'unit' => 'kg',
                'min_stock' => 3000,
                'location' => 'Silo C',
                'status' => 'Low Stock',
                'description' => 'Ordinary Portland Cement (OPC) is the most common type of cement used in general concrete construction.',
                'supplier' => 'PT Indocement',
                'price' => 1300,
                'last_restock' => '2023-09-25',
                'expiry_date' => '2024-09-25',
                'quality_standard' => 'SNI 2049:2015',
                'notes' => 'Store in a dry place. Keep away from moisture.'
            ]
        ];
        
        $material = $materials[$id] ?? $materials[1];
        @endphp

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Material Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Material Code:</div>
                            <div class="col-md-8">{{ $material['code'] }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Name:</div>
                            <div class="col-md-8">{{ $material['name'] }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Category:</div>
                            <div class="col-md-8">{{ $material['category'] }}</div>
                        </div>
                                                <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Description:</div>
                            <div class="col-md-8">{{ $material['description'] }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Current Stock:</div>
                            <div class="col-md-8">{{ number_format($material['stock']) }} {{ $material['unit'] }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Minimum Stock:</div>
                            <div class="col-md-8">{{ number_format($material['min_stock']) }} {{ $material['unit'] }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Unit:</div>
                            <div class="col-md-8">{{ $material['unit'] }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Storage Location:</div>
                            <div class="col-md-8">{{ $material['location'] }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Status:</div>
                            <div class="col-md-8">
                                @if($material['status'] == 'Normal')
                                <span class="badge bg-success">Normal</span>
                                @else
                                <span class="badge bg-warning">Low Stock</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Supplier:</div>
                            <div class="col-md-8">{{ $material['supplier'] }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Price per {{ $material['unit'] }}:</div>
                            <div class="col-md-8">Rp {{ number_format($material['price']) }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Last Restock Date:</div>
                            <div class="col-md-8">{{ $material['last_restock'] }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Expiry Date:</div>
                            <div class="col-md-8">{{ $material['expiry_date'] ?? 'N/A' }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Quality Standard:</div>
                            <div class="col-md-8">{{ $material['quality_standard'] }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Notes:</div>
                            <div class="col-md-8">{{ $material['notes'] }}</div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Recent Stock Movements</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Quantity</th>
                                        <th>Reference</th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $movements = [
                                        [
                                            'date' => '2023-10-15 08:30:00',
                                            'type' => 'In',
                                            'quantity' => 5000,
                                            'reference' => 'PO-2023-10-001',
                                            'user' => 'John Doe'
                                        ],
                                        [
                                            'date' => '2023-10-12 14:15:00',
                                            'type' => 'Out',
                                            'quantity' => 1200,
                                            'reference' => 'PROD-2023-10-045',
                                            'user' => 'Jane Smith'
                                        ],
                                        [
                                            'date' => '2023-10-10 09:45:00',
                                            'type' => 'Out',
                                            'quantity' => 800,
                                            'reference' => 'PROD-2023-10-042',
                                            'user' => 'Jane Smith'
                                        ],
                                        [
                                            'date' => '2023-10-05 11:20:00',
                                            'type' => 'In',
                                            'quantity' => 10000,
                                            'reference' => 'PO-2023-09-015',
                                            'user' => 'John Doe'
                                        ],
                                        [
                                            'date' => '2023-10-02 13:10:00',
                                            'type' => 'Out',
                                            'quantity' => 1500,
                                            'reference' => 'PROD-2023-10-038',
                                            'user' => 'Jane Smith'
                                        ]
                                    ];
                                    @endphp

                                    @foreach($movements as $movement)
                                    <tr>
                                        <td>{{ $movement['date'] }}</td>
                                        <td>
                                            @if($movement['type'] == 'In')
                                            <span class="badge bg-green">In</span>
                                            @else
                                            <span class="badge bg-azure">Out</span>
                                            @endif
                                        </td>
                                        <td>{{ number_format($movement['quantity']) }} {{ $material['unit'] }}</td>
                                        <td>{{ $movement['reference'] }}</td>
                                        <td>{{ $movement['user'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('warehouse.raw-materials.stock-movement') }}" class="btn btn-link">View all movements</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Stock Status</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex mb-2">
                                <div>Current Stock Level</div>
                                <div class="ms-auto">
                                    <span class="text-{{ $material['status'] == 'Normal' ? 'green' : 'warning' }} d-inline-flex align-items-center lh-1">
                                        {{ number_format(($material['stock'] / $material['min_stock']) * 100, 1) }}%
                                    </span>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-{{ $material['status'] == 'Normal' ? 'green' : 'warning' }}" 
                                     style="width: {{ min(($material['stock'] / $material['min_stock']) * 100, 100) }}%" 
                                     role="progressbar" 
                                     aria-valuenow="{{ ($material['stock'] / $material['min_stock']) * 100 }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                </div>
                            </div>
                        </div>

                        <div class="card-title mt-4">Quick Actions</div>
                        <div class="mb-3">
                            <a href="#" class="btn btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#addStockModal">
                                <i class="ti ti-plus me-2"></i> Add Stock
                            </a>
                            <a href="#" class="btn btn-info w-100 mb-2" data-bs-toggle="modal" data-bs-target="#removeStockModal">
                                <i class="ti ti-minus me-2"></i> Remove Stock
                            </a>
                            <a href="#" class="btn btn-warning w-100 mb-2" data-bs-toggle="modal" data-bs-target="#adjustStockModal">
                                <i class="ti ti-adjustments me-2"></i> Adjust Stock
                            </a>
                            <a href="#" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#transferStockModal">
                                <i class="ti ti-transfer me-2"></i> Transfer Stock
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Usage Statistics</h3>
                    </div>
                    <div class="card-body">
                        <div id="usage-chart" style="height: 200px;"></div>
                        <div class="mt-3">
                            <div class="d-flex align-items-center mb-2">
                                <div>Average Daily Usage:</div>
                                <div class="ms-auto">
                                    <strong>{{ number_format(rand(100, 500)) }} {{ $material['unit'] }}</strong>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div>Monthly Consumption:</div>
                                <div class="ms-auto">
                                    <strong>{{ number_format(rand(3000, 15000)) }} {{ $material['unit'] }}</strong>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <div>Estimated Days Left:</div>
                                <div class="ms-auto">
                                    <strong>{{ floor($material['stock'] / rand(100, 500)) }} days</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Stock Modal -->
<div class="modal modal-blur fade" id="addStockModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Quantity ({{ $material['unit'] }})</label>
                    <input type="number" class="form-control" name="quantity" min="1">
                </div>
                <div class="mb-3">
                    <label class="form-label">Reference (PO/Delivery Note)</label>
                    <input type="text" class="form-control" name="reference">
                </div>
                <div class="mb-3">
                    <label class="form-label">Supplier</label>
                    <select class="form-select" name="supplier">
                        <option value="{{ $material['supplier'] }}">{{ $material['supplier'] }}</option>
                        <option value="PT Semen Gresik">PT Semen Gresik</option>
                        <option value="PT Holcim Indonesia">PT Holcim Indonesia</option>
                        <option value="PT Quarry Jaya">PT Quarry Jaya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary ms-auto" data-bs-dismiss="modal">Add Stock</button>
            </div>
        </div>
    </div>
</div>

<!-- Remove Stock Modal -->
<div class="modal modal-blur fade" id="removeStockModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remove Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Quantity ({{ $material['unit'] }})</label>
                    <input type="number" class="form-control" name="quantity" min="1" max="{{ $material['stock'] }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Reference (Production Order/Request)</label>
                    <input type="text" class="form-control" name="reference">
                </div>
                <div class="mb-3">
                    <label class="form-label">Department</label>
                    <select class="form-select" name="department">
                        <option value="Production">Production</option>
                        <option value="Quality Control">Quality Control</option>
                        <option value="R&D">R&D</option>
                        <option value="Maintenance">Maintenance</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" rows="3"></textarea>
                </div>
            </div>
                        <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary ms-auto" data-bs-dismiss="modal">Remove Stock</button>
            </div>
        </div>
    </div>
</div>

<!-- Adjust Stock Modal -->
<div class="modal modal-blur fade" id="adjustStockModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adjust Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Current Stock</label>
                    <input type="text" class="form-control" value="{{ number_format($material['stock']) }} {{ $material['unit'] }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">New Stock Value ({{ $material['unit'] }})</label>
                    <input type="number" class="form-control" name="new_stock" value="{{ $material['stock'] }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Reason for Adjustment</label>
                    <select class="form-select" name="reason">
                        <option value="Stock Count">Stock Count</option>
                        <option value="Damage">Damage</option>
                        <option value="Loss">Loss</option>
                        <option value="System Error">System Error</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary ms-auto" data-bs-dismiss="modal">Adjust Stock</button>
            </div>
        </div>
    </div>
</div>

<!-- Transfer Stock Modal -->
<div class="modal modal-blur fade" id="transferStockModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transfer Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">From Location</label>
                    <input type="text" class="form-control" value="{{ $material['location'] }}" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">To Location</label>
                    <select class="form-select" name="to_location">
                        <option value="">Select Location</option>
                        <option value="Silo A">Silo A</option>
                        <option value="Silo B">Silo B</option>
                        <option value="Silo C">Silo C</option>
                        <option value="Yard A">Yard A</option>
                        <option value="Yard B">Yard B</option>
                        <option value="Yard C">Yard C</option>
                        <option value="Yard D">Yard D</option>
                        <option value="Chemical Store">Chemical Store</option>
                        <option value="Special Store">Special Store</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity ({{ $material['unit'] }})</label>
                    <input type="number" class="form-control" name="quantity" min="1" max="{{ $material['stock'] }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary ms-auto" data-bs-dismiss="modal">Transfer Stock</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Usage chart
        var options = {
            series: [{
                name: 'Usage',
                data: [{{ rand(100, 500) }}, {{ rand(100, 500) }}, {{ rand(100, 500) }}, {{ rand(100, 500) }}, {{ rand(100, 500) }}, {{ rand(100, 500) }}, {{ rand(100, 500) }}]
            }],
            chart: {
                type: 'area',
                height: 200,
                toolbar: {
                    show: false
                },
                sparkline: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
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
                    opacityTo: 0.3
                }
            },
            xaxis: {
                categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                labels: {
                    show: true
                }
            },
            yaxis: {
                labels: {
                    show: true
                }
            },
            colors: ['#206bc4']
        };

        var chart = new ApexCharts(document.querySelector("#usage-chart"), options);
        chart.render();
    });
</script>
@endsection


