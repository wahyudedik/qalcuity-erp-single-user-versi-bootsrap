@extends('layouts.app')

@section('title', 'Edit Raw Material')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Raw Material
                </h2>
                <div class="text-muted mt-1">Update raw material information</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('warehouse.raw-materials') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left me-1"></i>
                        Back to List
                    </a>
                    <a href="{{ route('warehouse.raw-materials.detail', $id) }}" class="btn btn-info d-none d-sm-inline-block">
                        <i class="ti ti-eye me-1"></i>
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
                <form action="#" method="post" class="card">
                    <div class="card-header">
                        <h3 class="card-title">Material Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">Material Code</label>
                            <input type="text" class="form-control" name="code" value="{{ $material['code'] }}" required>
                            <small class="form-hint">Unique identifier for the material</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $material['name'] }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Category</label>
                            <select class="form-select" name="category" required>
                                <option value="">Select Category</option>
                                <option value="Cement" {{ $material['category'] == 'Cement' ? 'selected' : '' }}>Cement</option>
                                <option value="Aggregate" {{ $material['category'] == 'Aggregate' ? 'selected' : '' }}>Aggregate</option>
                                <option value="Sand" {{ $material['category'] == 'Sand' ? 'selected' : '' }}>Sand</option>
                                <option value="Admixture" {{ $material['category'] == 'Admixture' ? 'selected' : '' }}>Admixture</option>
                                <option value="Water" {{ $material['category'] == 'Water' ? 'selected' : '' }}>Water</option>
                                <option value="Other" {{ $material['category'] == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3">{{ $material['description'] }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Current Stock</label>
                                    <input type="text" class="form-control" value="{{ number_format($material['stock']) }} {{ $material['unit'] }}" disabled>
                                    <small class="form-hint">To adjust stock, use the stock adjustment feature</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label required">Unit</label>
                                    <select class="form-select" name="unit" required>
                                        <option value="">Select Unit</option>
                                        <option value="kg" {{ $material['unit'] == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                                        <option value="ton" {{ $material['unit'] == 'ton' ? 'selected' : '' }}>Ton</option>
                                        <option value="liter" {{ $material['unit'] == 'liter' ? 'selected' : '' }}>Liter</option>
                                        <option value="m3" {{ $material['unit'] == 'm3' ? 'selected' : '' }}>Cubic Meter (m³)</option>
                                        <option value="bag" {{ $material['unit'] == 'bag' ? 'selected' : '' }}>Bag</option>
                                        <option value="pcs" {{ $material['unit'] == 'pcs' ? 'selected' : '' }}>Piece</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label required">Minimum Stock</label>
                                    <input type="number" class="form-control" name="min_stock" value="{{ $material['min_stock'] }}" min="0" required>
                                    <small class="form-hint">Threshold for low stock warning</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label required">Storage Location</label>
                                    <select class="form-select" name="location" required>
                                        <option value="">Select Location</option>
                                        <option value="Silo A" {{ $material['location'] == 'Silo A' ? 'selected' : '' }}>Silo A</option>
                                        <option value="Silo B" {{ $material['location'] == 'Silo B' ? 'selected' : '' }}>Silo B</option>
                                        <option value="Silo C" {{ $material['location'] == 'Silo C' ? 'selected' : '' }}>Silo C</option>
                                        <option value="Yard A" {{ $material['location'] == 'Yard A' ? 'selected' : '' }}>Yard A</option>
                                        <option value="Yard B" {{ $material['location'] == 'Yard B' ? 'selected' : '' }}>Yard B</option>
                                        <option value="Yard C" {{ $material['location'] == 'Yard C' ? 'selected' : '' }}>Yard C</option>
                                        <option value="Yard D" {{ $material['location'] == 'Yard D' ? 'selected' : '' }}>Yard D</option>
                                        <option value="Chemical Store" {{ $material['location'] == 'Chemical Store' ? 'selected' : '' }}>Chemical Store</option>
                                        <option value="Special Store" {{ $material['location'] == 'Special Store' ? 'selected' : '' }}>Special Store</option>
                                        <option value="Water Tank" {{ $material['location'] == 'Water Tank' ? 'selected' : '' }}>Water Tank</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Supplier</label>
                            <select class="form-select" name="supplier">
                                <option value="">Select Supplier</option>
                                <option value="PT Semen Indonesia" {{ $material['supplier'] == 'PT Semen Indonesia' ? 'selected' : '' }}>PT Semen Indonesia</option>
                                <option value="PT Indocement" {{ $material['supplier'] == 'PT Indocement' ? 'selected' : '' }}>PT Indocement</option>
                                <option value="PT Holcim Indonesia" {{ $material['supplier'] == 'PT Holcim Indonesia' ? 'selected' : '' }}>PT Holcim Indonesia</option>
                                <option value="PT Quarry Utama" {{ $material['supplier'] == 'PT Quarry Utama' ? 'selected' : '' }}>PT Quarry Utama</option>
                                <option value="PT Quarry Jaya" {{ $material['supplier'] == 'PT Quarry Jaya' ? 'selected' : '' }}>PT Quarry Jaya</option>
                                <option value="PT Chemical Solutions" {{ $material['supplier'] == 'PT Chemical Solutions' ? 'selected' : '' }}>PT Chemical Solutions</option>
                                <option value="PT Water Supply" {{ $material['supplier'] == 'PT Water Supply' ? 'selected' : '' }}>PT Water Supply</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Price per Unit (Rp)</label>
                                    <input type="number" class="form-control" name="price" value="{{ $material['price'] }}" min="0">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Expiry Date</label>
                                    <input type="date" class="form-control" name="expiry_date" value="{{ $material['expiry_date'] ?? '' }}">
                                    <small class="form-hint">Leave blank if not applicable</small>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quality Standard</label>
                            <input type="text" class="form-control" name="quality_standard" value="{{ $material['quality_standard'] }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" name="notes" rows="3">{{ $material['notes'] }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Update Material</button>
                    </div>
                </form>
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
                            <a href="#" class="btn btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#adjustStockModal">
                                <i class="ti ti-adjustments me-2"></i> Adjust Stock
                            </a>
                            <a href="{{ route('warehouse.raw-materials.detail', $id) }}" class="btn btn-info w-100">
                                <i class="ti ti-eye me-2"></i> View Details
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Guidelines</h3>
                    </div>
                    <div class="card-body">
                        <h4>Material Code Format</h4>
                        <p>Use the following format for material codes:</p>
                        <ul>
                            <li><strong>Cement:</strong> CEM-[TYPE]-[NUMBER]</li>
                            <li><strong>Aggregate:</strong> AGG-[SIZE]-[NUMBER]</li>
                            <li><strong>Sand:</strong> SND-[NUMBER]</li>
                            <li><strong>Admixture:</strong> ADM-[TYPE]-[NUMBER]</li>
                            <li><strong>Water:</strong> WAT-[NUMBER]</li>
                            <li><strong>Other:</strong> OTH-[TYPE]-[NUMBER]</li>
                        </ul>
                        <p>Example: CEM-PCC-001 for Portland Composite Cement</p>

                        <h4 class="mt-4">Required Fields</h4>
                        <p>The following fields are mandatory:</p>
                        <ul>
                            <li>Material Code</li>
                            <li>Name</li>
                            <li>Category</li>
                            <li>Unit</li>
                            <li>Minimum Stock</li>
                            <li>Storage Location</li>
                        </ul>
                    </div>
                </div>
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
@endsection

