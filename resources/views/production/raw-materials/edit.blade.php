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
                        <a href="{{ route('production.raw-materials.detail', $id) }}"
                            class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Material Details
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
                        'code' => 'CEM-PCC-01',
                        'name' => 'Portland Composite Cement',
                        'category' => 'Cement',
                        'description' =>
                            'Portland Composite Cement (PCC) is a blended cement containing OPC clinker, gypsum and cementitious supplementary materials.',
                        'stock' => 15800,
                        'unit' => 'kg',
                        'reorder_level' => 5000,
                        'last_updated' => '2023-10-15',
                        'status' => 'Available',
                        'supplier' => 'Cement Industries Ltd',
                        'location' => 'Silo A',
                        'specifications' => [
                            'Strength Class' => '42.5 N',
                            'Setting Time' => '45-60 minutes',
                            'Fineness' => '370-420 m²/kg',
                            'Soundness' => '< 10 mm',
                            'Compressive Strength (28 days)' => '42.5-62.5 MPa',
                        ],
                        'quality_parameters' => [
                            'Chemical Composition' => 'Meets ASTM C150',
                            'Clinker Content' => '65-79%',
                            'Limestone Content' => '6-20%',
                            'Gypsum Content' => '3-5%',
                            'Fly Ash Content' => '0-15%',
                        ],
                        'cost' => [
                            'unit_cost' => 1.25,
                            'currency' => 'USD',
                            'last_purchase_date' => '2023-10-15',
                            'last_purchase_price' => 1.25,
                            'average_cost' => 1.22,
                        ],
                        'notes' =>
                            'This cement is suitable for general construction purposes and provides good workability and strength development.',
                    ],
                ];

                // Get the material based on the ID
                $material = $materials[$id] ?? null;

                if (!$material) {
                    // Fallback if material not found
                    $material = $materials[1];
                }
            @endphp

            <form action="#" method="post" class="card">
                <div class="card-header">
                    <h3 class="card-title">Material Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Basic Information -->
                        <div class="col-md-6 col-xl-4">
                            <div class="mb-3">
                                <label class="form-label required">Material Code</label>
                                <input type="text" class="form-control" name="code" value="{{ $material['code'] }}"
                                    required>
                                <small class="form-hint">Unique identifier for the material</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="mb-3">
                                <label class="form-label required">Material Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $material['name'] }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="mb-3">
                                <label class="form-label required">Category</label>
                                <select class="form-select" name="category" required>
                                    <option value="">Select a category</option>
                                    <option value="Cement" {{ $material['category'] == 'Cement' ? 'selected' : '' }}>Cement
                                    </option>
                                    <option value="Aggregate" {{ $material['category'] == 'Aggregate' ? 'selected' : '' }}>
                                        Aggregate</option>
                                    <option value="Admixture" {{ $material['category'] == 'Admixture' ? 'selected' : '' }}>
                                        Admixture</option>
                                    <option value="SCM" {{ $material['category'] == 'SCM' ? 'selected' : '' }}>SCM
                                        (Supplementary Cementitious Material)</option>
                                    <option value="Water" {{ $material['category'] == 'Water' ? 'selected' : '' }}>Water
                                    </option>
                                    <option value="Fiber" {{ $material['category'] == 'Fiber' ? 'selected' : '' }}>Fiber
                                    </option>
                                    <option value="Other" {{ $material['category'] == 'Other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3">{{ $material['description'] }}</textarea>
                            </div>
                        </div>

                        <!-- Stock Information -->
                        <div class="col-md-6 col-xl-3">
                            <div class="mb-3">
                                <label class="form-label required">Current Stock</label>
                                <input type="number" class="form-control" name="stock" value="{{ $material['stock'] }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="mb-3">
                                <label class="form-label required">Unit of Measurement</label>
                                <select class="form-select" name="unit" required>
                                    <option value="">Select a unit</option>
                                    <option value="kg" {{ $material['unit'] == 'kg' ? 'selected' : '' }}>Kilogram (kg)
                                    </option>
                                    <option value="ton" {{ $material['unit'] == 'ton' ? 'selected' : '' }}>Ton</option>
                                    <option value="liter" {{ $material['unit'] == 'liter' ? 'selected' : '' }}>Liter
                                    </option>
                                    <option value="m3" {{ $material['unit'] == 'm3' ? 'selected' : '' }}>Cubic Meter
                                        (m³)</option>
                                    <option value="piece" {{ $material['unit'] == 'piece' ? 'selected' : '' }}>Piece
                                    </option>
                                    <option value="bag" {{ $material['unit'] == 'bag' ? 'selected' : '' }}>Bag</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="mb-3">
                                <label class="form-label required">Reorder Level</label>
                                <input type="number" class="form-control" name="reorder_level"
                                    value="{{ $material['reorder_level'] }}" required>
                                <small class="form-hint">Minimum stock level before reordering</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="mb-3">
                                <label class="form-label">Storage Location</label>
                                <input type="text" class="form-control" name="location"
                                    value="{{ $material['location'] }}">
                            </div>
                        </div>

                        <!-- Cost Information -->
                        <div class="col-12 mt-3">
                            <h3 class="mb-3">Cost Information</h3>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="mb-3">
                                <label class="form-label required">Unit Cost</label>
                                <div class="input-group">
                                    <input type="number" step="0.01" class="form-control" name="unit_cost"
                                        value="{{ $material['cost']['unit_cost'] }}" required>
                                    <span class="input-group-text">USD</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="mb-3">
                                <label class="form-label">Last Purchase Date</label>
                                <input type="date" class="form-control" name="last_purchase_date"
                                    value="{{ $material['cost']['last_purchase_date'] }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="mb-3">
                                <label class="form-label">Last Purchase Price</label>
                                <div class="input-group">
                                    <input type="number" step="0.01" class="form-control" name="last_purchase_price"
                                        value="{{ $material['cost']['last_purchase_price'] }}">
                                    <span class="input-group-text">USD</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="mb-3">
                                <label class="form-label">Primary Supplier</label>
                                <input type="text" class="form-control" name="supplier"
                                    value="{{ $material['supplier'] }}">
                            </div>
                        </div>

                        <!-- Technical Specifications -->
                        <div class="col-12 mt-3">
                            <h3 class="mb-3">Technical Specifications</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Physical Properties</h4>
                                </div>
                                <div class="card-body">
                                    <div id="physical-properties">
                                        @foreach ($material['specifications'] as $key => $value)
                                            <div class="row mb-2 property-row">
                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        name="physical_property_key[]" value="{{ $key }}">
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        name="physical_property_value[]" value="{{ $value }}">
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button"
                                                        class="btn btn-icon btn-outline-danger remove-property">
                                                        <i class="ti ti-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-outline-primary mt-2"
                                        id="add-physical-property">
                                        <i class="ti ti-plus"></i> Add Property
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Chemical Properties</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chemical-properties">
                                        @foreach ($material['quality_parameters'] as $key => $value)
                                            <div class="row mb-2 property-row">
                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        name="chemical_property_key[]" value="{{ $key }}">
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control"
                                                        name="chemical_property_value[]" value="{{ $value }}">
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button"
                                                        class="btn btn-icon btn-outline-danger remove-property">
                                                        <i class="ti ti-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-outline-primary mt-2"
                                        id="add-chemical-property">
                                        <i class="ti ti-plus"></i> Add Property
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="col-12 mt-3">
                            <div class="mb-3">
                                <label class="form-label">Additional Notes</label>
                                <textarea class="form-control" name="notes" rows="3">{{ $material['notes'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <div class="d-flex">
                        <a href="{{ route('production.raw-materials.detail', $id) }}" class="btn btn-link">Cancel</a>
                        <button type="submit" class="btn btn-primary ms-auto">Update Material</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add Physical Property
            document.getElementById('add-physical-property').addEventListener('click', function() {
                const container = document.getElementById('physical-properties');
                const newRow = document.createElement('div');
                newRow.className = 'row mb-2 property-row';
                newRow.innerHTML = `
                <div class="col">
                    <input type="text" class="form-control" name="physical_property_key[]" placeholder="Property Name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="physical_property_value[]" placeholder="Value">
                </div>
                <div class="col-auto">
                                        <button type="button" class="btn btn-icon btn-outline-danger remove-property">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
            `;
                container.appendChild(newRow);

                // Add event listener to the new remove button
                newRow.querySelector('.remove-property').addEventListener('click', function() {
                    container.removeChild(newRow);
                });
            });

            // Add Chemical Property
            document.getElementById('add-chemical-property').addEventListener('click', function() {
                const container = document.getElementById('chemical-properties');
                const newRow = document.createElement('div');
                newRow.className = 'row mb-2 property-row';
                newRow.innerHTML = `
                <div class="col">
                    <input type="text" class="form-control" name="chemical_property_key[]" placeholder="Property Name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="chemical_property_value[]" placeholder="Value">
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-icon btn-outline-danger remove-property">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
            `;
                container.appendChild(newRow);

                // Add event listener to the new remove button
                newRow.querySelector('.remove-property').addEventListener('click', function() {
                    container.removeChild(newRow);
                });
            });

            // Add event listeners to initial remove buttons
            document.querySelectorAll('.remove-property').forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('.property-row');
                    row.parentNode.removeChild(row);
                });
            });
        });
    </script>
@endsection
