@extends('layouts.app')

@section('title', 'Product Detail')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Product Detail
                </h2>
                <div class="text-muted mt-1">View detailed information about the product</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('warehouse.finished-products') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to List
                    </a>
                    <a href="{{ route('warehouse.finished-products.edit', $id) }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-edit"></i>
                        Edit Product
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        @php
        $products = [
            1 => [
                'id' => 1,
                'code' => 'RM-K225-001',
                'name' => 'Ready Mix K225',
                'type' => 'Ready Mix',
                'strength' => 'K225',
                'stock' => 150,
                'unit' => 'm³',
                'production_date' => '2023-10-15',
                'status' => 'Available',
                'description' => 'Standard ready mix concrete with K225 strength, suitable for general construction purposes.',
                'mix_design' => 'MD-K225-STD',
                'batch_plant' => 'Plant A',
                'storage_location' => 'Yard A',
                'shelf_life' => '4 hours',
                'quality_test_results' => [
                    ['date' => '2023-10-15', 'test_type' => 'Slump Test', 'result' => '12 cm', 'status' => 'Pass'],
                    ['date' => '2023-10-15', 'test_type' => 'Temperature', 'result' => '32°C', 'status' => 'Pass'],
                    ['date' => '2023-10-16', 'test_type' => 'Compression (3 days)', 'result' => '15 MPa', 'status' => 'Pass']
                ],
                'stock_movements' => [
                    ['date' => '2023-10-15', 'type' => 'Production', 'quantity' => '+200 m³', 'reference' => 'PROD-001'],
                    ['date' => '2023-10-16', 'type' => 'Delivery', 'quantity' => '-30 m³', 'reference' => 'DO-1001'],
                    ['date' => '2023-10-17', 'type' => 'Delivery', 'quantity' => '-20 m³', 'reference' => 'DO-1002']
                ]
            ],
            2 => [
                'id' => 2,
                'code' => 'RM-K300-002',
                'name' => 'Ready Mix K300',
                'type' => 'Ready Mix',
                'strength' => 'K300',
                'stock' => 120,
                'unit' => 'm³',
                'production_date' => '2023-10-16',
                'status' => 'Available',
                'description' => 'Medium strength ready mix concrete with K300 strength, suitable for structural elements.',
                'mix_design' => 'MD-K300-STD',
                'batch_plant' => 'Plant B',
                'storage_location' => 'Yard A',
                'shelf_life' => '4 hours',
                'quality_test_results' => [
                    ['date' => '2023-10-16', 'test_type' => 'Slump Test', 'result' => '10 cm', 'status' => 'Pass'],
                    ['date' => '2023-10-16', 'test_type' => 'Temperature', 'result' => '31°C', 'status' => 'Pass'],
                    ['date' => '2023-10-19', 'test_type' => 'Compression (3 days)', 'result' => '20 MPa', 'status' => 'Pass']
                ],
                'stock_movements' => [
                    ['date' => '2023-10-16', 'type' => 'Production', 'quantity' => '+150 m³', 'reference' => 'PROD-002'],
                    ['date' => '2023-10-17', 'type' => 'Delivery', 'quantity' => '-30 m³', 'reference' => 'DO-1003']
                ]
            ]
        ];
        
        // Get the product based on the ID
        $product = $products[$id] ?? $products[1];
        @endphp

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Product Code</label>
                                    <div class="form-control-plaintext">{{ $product['code'] }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Product Name</label>
                                    <div class="form-control-plaintext">{{ $product['name'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Product Type</label>
                                    <div class="form-control-plaintext">{{ $product['type'] }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Strength</label>
                                    <div class="form-control-plaintext">{{ $product['strength'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Current Stock</label>
                                    <div class="form-control-plaintext">{{ $product['stock'] }} {{ $product['unit'] }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Production Date</label>
                                    <div class="form-control-plaintext">{{ $product['production_date'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Mix Design</label>
                                    <div class="form-control-plaintext">{{ $product['mix_design'] }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Batch Plant</label>
                                    <div class="form-control-plaintext">{{ $product['batch_plant'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Storage Location</label>
                                    <div class="form-control-plaintext">{{ $product['storage_location'] }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label text-muted">Shelf Life</label>
                                    <div class="form-control-plaintext">{{ $product['shelf_life'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Description</label>
                            <div class="form-control-plaintext">{{ $product['description'] }}</div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Quality Test Results</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Test Type</th>
                                        <th>Result</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product['quality_test_results'] as $test)
                                    <tr>
                                        <td>{{ $test['date'] }}</td>
                                        <td>{{ $test['test_type'] }}</td>
                                        <td>{{ $test['result'] }}</td>
                                        <td>
                                            @if($test['status'] == 'Pass')
                                            <span class="badge bg-success">Pass</span>
                                            @else
                                            <span class="badge bg-danger">Fail</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Stock Status</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                                                        <div class="me-3">
                                @if($product['status'] == 'Available')
                                <span class="avatar bg-success-lt">
                                    <i class="ti ti-check text-success"></i>
                                </span>
                                @elseif($product['status'] == 'Low Stock')
                                <span class="avatar bg-warning-lt">
                                    <i class="ti ti-alert-triangle text-warning"></i>
                                </span>
                                @else
                                <span class="avatar bg-danger-lt">
                                    <i class="ti ti-x text-danger"></i>
                                </span>
                                @endif
                            </div>
                            <div>
                                <div class="font-weight-medium">{{ $product['status'] }}</div>
                                <div class="text-muted">Current stock: {{ $product['stock'] }} {{ $product['unit'] }}</div>
                            </div>
                        </div>
                        <div class="progress mb-3">
                            @php
                                $percentage = $product['status'] == 'Available' ? 75 : ($product['status'] == 'Low Stock' ? 30 : 0);
                                $progressClass = $product['status'] == 'Available' ? 'bg-success' : ($product['status'] == 'Low Stock' ? 'bg-warning' : 'bg-danger');
                            @endphp
                            <div class="progress-bar {{ $progressClass }}" style="width: {{ $percentage }}%" role="progressbar" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $percentage }}% Complete">
                                <span class="visually-hidden">{{ $percentage }}% Complete</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <div>Minimum Stock Level</div>
                            <div>50 {{ $product['unit'] }}</div>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <div>Maximum Stock Level</div>
                            <div>200 {{ $product['unit'] }}</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>Reorder Point</div>
                            <div>75 {{ $product['unit'] }}</div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Recent Stock Movements</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Quantity</th>
                                        <th>Reference</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product['stock_movements'] as $movement)
                                    <tr>
                                        <td>{{ $movement['date'] }}</td>
                                        <td>{{ $movement['type'] }}</td>
                                        <td>
                                            @if(strpos($movement['quantity'], '+') === 0)
                                            <span class="text-success">{{ $movement['quantity'] }}</span>
                                            @else
                                            <span class="text-danger">{{ $movement['quantity'] }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $movement['reference'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('warehouse.finished-products.stock-movement') }}" class="btn btn-link">View all movements</a>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Actions</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <a href="#" class="btn btn-outline-primary mb-2">
                                <i class="ti ti-plus me-2"></i>Add Stock
                            </a>
                            <a href="#" class="btn btn-outline-danger mb-2">
                                <i class="ti ti-minus me-2"></i>Remove Stock
                            </a>
                            <a href="#" class="btn btn-outline-info mb-2">
                                <i class="ti ti-file-export me-2"></i>Export Data
                            </a>
                            <a href="#" class="btn btn-outline-secondary">
                                <i class="ti ti-qrcode me-2"></i>Generate QR Code
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

