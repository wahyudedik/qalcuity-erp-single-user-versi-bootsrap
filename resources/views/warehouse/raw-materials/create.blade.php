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
                    <a href="{{ route('warehouse.raw-materials') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left me-1"></i>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8">
                <form action="#" method="post" class="card">
                    <div class="card-header">
                        <h3 class="card-title">Material Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">Material Code</label>
                            <input type="text" class="form-control" name="code" placeholder="e.g., CEM-PCC-001" required>
                            <small class="form-hint">Unique identifier for the material</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="e.g., Portland Composite Cement" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Category</label>
                            <select class="form-select" name="category" required>
                                <option value="">Select Category</option>
                                <option value="Cement">Cement</option>
                                <option value="Aggregate">Aggregate</option>
                                <option value="Sand">Sand</option>
                                <option value="Admixture">Admixture</option>
                                <option value="Water">Water</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Detailed description of the material"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label required">Initial Stock</label>
                                    <input type="number" class="form-control" name="stock" min="0" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label required">Unit</label>
                                    <select class="form-select" name="unit" required>
                                        <option value="">Select Unit</option>
                                        <option value="kg">Kilogram (kg)</option>
                                        <option value="ton">Ton</option>
                                        <option value="liter">Liter</option>
                                        <option value="m3">Cubic Meter (m³)</option>
                                        <option value="bag">Bag</option>
                                        <option value="pcs">Piece</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label required">Minimum Stock</label>
                                    <input type="number" class="form-control" name="min_stock" min="0" required>
                                    <small class="form-hint">Threshold for low stock warning</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label required">Storage Location</label>
                                    <select class="form-select" name="location" required>
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
                                        <option value="Water Tank">Water Tank</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Supplier</label>
                            <select class="form-select" name="supplier">
                                <option value="">Select Supplier</option>
                                <option value="PT Semen Indonesia">PT Semen Indonesia</option>
                                <option value="PT Indocement">PT Indocement</option>
                                <option value="PT Holcim Indonesia">PT Holcim Indonesia</option>
                                <option value="PT Quarry Utama">PT Quarry Utama</option>
                                <option value="PT Quarry Jaya">PT Quarry Jaya</option>
                                <option value="PT Chemical Solutions">PT Chemical Solutions</option>
                                <option value="PT Water Supply">PT Water Supply</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Price per Unit (Rp)</label>
                                    <input type="number" class="form-control" name="price" min="0">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Expiry Date</label>
                                    <input type="date" class="form-control" name="expiry_date">
                                    <small class="form-hint">Leave blank if not applicable</small>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quality Standard</label>
                            <input type="text" class="form-control" name="quality_standard" placeholder="e.g., SNI 7064:2014">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" name="notes" rows="3" placeholder="Additional information or handling instructions"></textarea>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Save Material</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="card">
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
                            <li>Initial Stock</li>
                            <li>Unit</li>
                            <li>Minimum Stock</li>
                            <li>Storage Location</li>
                        </ul>

                        <h4 class="mt-4">Stock Management</h4>
                        <p>Set appropriate minimum stock levels to ensure timely reordering. The system will flag materials as "Low Stock" when current stock falls below this threshold.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

