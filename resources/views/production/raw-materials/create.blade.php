@extends('layouts.app')

@section('title', 'Add New Raw Material')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Add New Raw Material
                </h2>
                <div class="text-muted mt-1">Create a new raw material in the inventory</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.raw-materials') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to Materials
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
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
                            <input type="text" class="form-control" name="code" placeholder="e.g., CEM-PCC-01" required>
                            <small class="form-hint">Unique identifier for the material</small>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="mb-3">
                            <label class="form-label required">Material Name</label>
                            <input type="text" class="form-control" name="name" placeholder="e.g., Portland Composite Cement" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="mb-3">
                            <label class="form-label required">Category</label>
                            <select class="form-select" name="category" required>
                                <option value="">Select a category</option>
                                <option value="Cement">Cement</option>
                                <option value="Aggregate">Aggregate</option>
                                <option value="Admixture">Admixture</option>
                                <option value="SCM">SCM (Supplementary Cementitious Material)</option>
                                <option value="Water">Water</option>
                                <option value="Fiber">Fiber</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Detailed description of the material"></textarea>
                        </div>
                    </div>

                    <!-- Stock Information -->
                    <div class="col-md-6 col-xl-3">
                        <div class="mb-3">
                            <label class="form-label required">Initial Stock</label>
                            <input type="number" class="form-control" name="stock" placeholder="0" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="mb-3">
                            <label class="form-label required">Unit of Measurement</label>
                            <select class="form-select" name="unit" required>
                                <option value="">Select a unit</option>
                                <option value="kg">Kilogram (kg)</option>
                                <option value="ton">Ton</option>
                                <option value="liter">Liter</option>
                                <option value="m3">Cubic Meter (m³)</option>
                                <option value="piece">Piece</option>
                                <option value="bag">Bag</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="mb-3">
                            <label class="form-label required">Reorder Level</label>
                            <input type="number" class="form-control" name="reorder_level" placeholder="Minimum stock level" required>
                            <small class="form-hint">Minimum stock level before reordering</small>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="mb-3">
                            <label class="form-label">Storage Location</label>
                            <input type="text" class="form-control" name="location" placeholder="e.g., Silo A, Warehouse B">
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
                                <input type="number" step="0.01" class="form-control" name="unit_cost" placeholder="0.00" required>
                                <span class="input-group-text">USD</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="mb-3">
                            <label class="form-label">Last Purchase Date</label>
                            <input type="date" class="form-control" name="last_purchase_date">
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="mb-3">
                            <label class="form-label">Last Purchase Price</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control" name="last_purchase_price" placeholder="0.00">
                                <span class="input-group-text">USD</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="mb-3">
                            <label class="form-label">Primary Supplier</label>
                            <input type="text" class="form-control" name="supplier" placeholder="Supplier name">
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
                                    <div class="row mb-2 property-row">
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
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-primary mt-2" id="add-physical-property">
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
                                    <div class="row mb-2 property-row">
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
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-primary mt-2" id="add-chemical-property">
                                    <i class="ti ti-plus"></i> Add Property
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="col-12 mt-3">
                        <div class="mb-3">
                            <label class="form-label">Additional Notes</label>
                            <textarea class="form-control" name="notes" rows="3" placeholder="Any additional information about this material"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <div class="d-flex">
                    <a href="{{ route('production.raw-materials') }}" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary ms-auto">Save Material</button>
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
