@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Product
                </h2>
                <div class="text-muted mt-1">Update finished product information</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('warehouse.finished-products') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to List
                    </a>
                    <a href="{{ route('warehouse.finished-products.detail', $id) }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-eye"></i>
                        View Details
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
                'min_stock' => 50,
                'max_stock' => 200,
                'reorder_point' => 75,
                'batch_number' => 'BATCH-001',
                'operator' => 'John Doe',
                'notes' => 'Regular production batch'
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
                'min_stock' => 40,
                'max_stock' => 180,
                'reorder_point' => 60,
                'batch_number' => 'BATCH-002',
                'operator' => 'Jane Smith',
                'notes' => 'Special order for Project XYZ'
            ]
        ];
        
        // Get the product based on the ID
        $product = $products[$id] ?? $products[1];
        @endphp

        <form action="#" method="post">
            @csrf
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
                                        <label class="form-label required">Product Code</label>
                                        <input type="text" class="form-control" name="code" value="{{ $product['code'] }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Product Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $product['name'] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Product Type</label>
                                        <select class="form-select" name="type" required>
                                            <option value="Ready Mix" {{ $product['type'] == 'Ready Mix' ? 'selected' : '' }}>Ready Mix</option>
                                            <option value="Precast" {{ $product['type'] == 'Precast' ? 'selected' : '' }}>Precast</option>
                                            <option value="Concrete Block" {{ $product['type'] == 'Concrete Block' ? 'selected' : '' }}>Concrete Block</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Strength</label>
                                        <select class="form-select" name="strength" required>
                                            <option value="K175" {{ $product['strength'] == 'K175' ? 'selected' : '' }}>K175</option>
                                            <option value="K200" {{ $product['strength'] == 'K200' ? 'selected' : '' }}>K200</option>
                                            <option value="K225" {{ $product['strength'] == 'K225' ? 'selected' : '' }}>K225</option>
                                            <option value="K250" {{ $product['strength'] == 'K250' ? 'selected' : '' }}>K250</option>
                                            <option value="K300" {{ $product['strength'] == 'K300' ? 'selected' : '' }}>K300</option>
                                            <option value="K350" {{ $product['strength'] == 'K350' ? 'selected' : '' }}>K350</option>
                                            <option value="K400" {{ $product['strength'] == 'K400' ? 'selected' : '' }}>K400</option>
                                            <option value="K450" {{ $product['strength'] == 'K450' ? 'selected' : '' }}>K450</option>
                                            <option value="K500" {{ $product['strength'] == 'K500' ? 'selected' : '' }}>K500</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Current Stock</label>
                                        <input type="number" class="form-control" name="stock" value="{{ $product['stock'] }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Unit</label>
                                        <select class="form-select" name="unit" required>
                                            <option value="m³" {{ $product['unit'] == 'm³' ? 'selected' : '' }}>m³ (Cubic Meter)</option>
                                            <option value="pcs" {{ $product['unit'] == 'pcs' ? 'selected' : '' }}>pcs (Pieces)</option>
                                            <option value="ton" {{ $product['unit'] == 'ton' ? 'selected' : '' }}>ton (Metric Ton)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Production Date</label>
                                        <input type="date" class="form-control" name="production_date" value="{{ $product['production_date'] }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Mix Design</label>
                                        <select class="form-select" name="mix_design" required>
                                            <option value="MD-K175-STD" {{ $product['mix_design'] == 'MD-K175-STD' ? 'selected' : '' }}>MD-K175-STD</option>
                                            <option value="MD-K200-STD" {{ $product['mix_design'] == 'MD-K200-STD' ? 'selected' : '' }}>MD-K200-STD</option>
                                            <option value="MD-K225-STD" {{ $product['mix_design'] == 'MD-K225-STD' ? 'selected' : '' }}>MD-K225-STD</option>
                                            <option value="MD-K250-STD" {{ $product['mix_design'] == 'MD-K250-STD' ? 'selected' : '' }}>MD-K250-STD</option>
                                                                                        <option value="MD-K300-STD" {{ $product['mix_design'] == 'MD-K300-STD' ? 'selected' : '' }}>MD-K300-STD</option>
                                            <option value="MD-K350-STD" {{ $product['mix_design'] == 'MD-K350-STD' ? 'selected' : '' }}>MD-K350-STD</option>
                                            <option value="MD-K400-STD" {{ $product['mix_design'] == 'MD-K400-STD' ? 'selected' : '' }}>MD-K400-STD</option>
                                            <option value="MD-K450-STD" {{ $product['mix_design'] == 'MD-K450-STD' ? 'selected' : '' }}>MD-K450-STD</option>
                                            <option value="MD-K500-STD" {{ $product['mix_design'] == 'MD-K500-STD' ? 'selected' : '' }}>MD-K500-STD</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Batch Plant</label>
                                        <select class="form-select" name="batch_plant" required>
                                            <option value="Plant A" {{ $product['batch_plant'] == 'Plant A' ? 'selected' : '' }}>Plant A</option>
                                            <option value="Plant B" {{ $product['batch_plant'] == 'Plant B' ? 'selected' : '' }}>Plant B</option>
                                            <option value="Plant C" {{ $product['batch_plant'] == 'Plant C' ? 'selected' : '' }}>Plant C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Storage Location</label>
                                        <select class="form-select" name="storage_location" required>
                                            <option value="Yard A" {{ $product['storage_location'] == 'Yard A' ? 'selected' : '' }}>Yard A</option>
                                            <option value="Yard B" {{ $product['storage_location'] == 'Yard B' ? 'selected' : '' }}>Yard B</option>
                                            <option value="Warehouse 1" {{ $product['storage_location'] == 'Warehouse 1' ? 'selected' : '' }}>Warehouse 1</option>
                                            <option value="Warehouse 2" {{ $product['storage_location'] == 'Warehouse 2' ? 'selected' : '' }}>Warehouse 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="4">{{ $product['description'] }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Stock Settings</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Minimum Stock Level</label>
                                <input type="number" class="form-control" name="min_stock" value="{{ $product['min_stock'] }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Maximum Stock Level</label>
                                <input type="number" class="form-control" name="max_stock" value="{{ $product['max_stock'] }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Reorder Point</label>
                                <input type="number" class="form-control" name="reorder_point" value="{{ $product['reorder_point'] }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Shelf Life</label>
                                <div class="input-group">
                                    @php
                                        $shelfLifeParts = explode(' ', $product['shelf_life']);
                                        $shelfLifeValue = $shelfLifeParts[0] ?? 4;
                                        $shelfLifeUnit = isset($shelfLifeParts[1]) ? $shelfLifeParts[1] : 'hours';
                                    @endphp
                                    <input type="number" class="form-control" name="shelf_life_value" value="{{ $shelfLifeValue }}">
                                    <select class="form-select" name="shelf_life_unit">
                                        <option value="hours" {{ $shelfLifeUnit == 'hours' ? 'selected' : '' }}>Hours</option>
                                        <option value="days" {{ $shelfLifeUnit == 'days' ? 'selected' : '' }}>Days</option>
                                        <option value="months" {{ $shelfLifeUnit == 'months' ? 'selected' : '' }}>Months</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Additional Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Production Batch Number</label>
                                <input type="text" class="form-control" name="batch_number" value="{{ $product['batch_number'] }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Production Operator</label>
                                <select class="form-select" name="operator">
                                    <option value="John Doe" {{ $product['operator'] == 'John Doe' ? 'selected' : '' }}>John Doe</option>
                                    <option value="Jane Smith" {{ $product['operator'] == 'Jane Smith' ? 'selected' : '' }}>Jane Smith</option>
                                    <option value="Robert Johnson" {{ $product['operator'] == 'Robert Johnson' ? 'selected' : '' }}>Robert Johnson</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="3">{{ $product['notes'] }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('warehouse.finished-products') }}" class="btn btn-outline-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Update Product
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

