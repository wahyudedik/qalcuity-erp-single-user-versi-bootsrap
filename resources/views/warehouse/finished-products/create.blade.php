@extends('layouts.app')

@section('title', 'Add New Product')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Add New Product
                    </h2>
                    <div class="text-muted mt-1">Create a new finished product in inventory</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('warehouse.finished-products') }}"
                            class="btn btn-outline-primary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
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
                                            <input type="text" class="form-control" name="code"
                                                placeholder="Enter product code" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Product Name</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter product name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Product Type</label>
                                            <select class="form-select" name="type" required>
                                                <option value="">Select product type</option>
                                                <option value="Ready Mix">Ready Mix</option>
                                                <option value="Precast">Precast</option>
                                                <option value="Concrete Block">Concrete Block</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Strength</label>
                                            <select class="form-select" name="strength" required>
                                                <option value="">Select strength</option>
                                                <option value="K175">K175</option>
                                                <option value="K200">K200</option>
                                                <option value="K225">K225</option>
                                                <option value="K250">K250</option>
                                                <option value="K300">K300</option>
                                                <option value="K350">K350</option>
                                                <option value="K400">K400</option>
                                                <option value="K450">K450</option>
                                                <option value="K500">K500</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Initial Stock</label>
                                            <input type="number" class="form-control" name="stock"
                                                placeholder="Enter initial stock" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Unit</label>
                                            <select class="form-select" name="unit" required>
                                                <option value="">Select unit</option>
                                                <option value="m³">m³ (Cubic Meter)</option>
                                                <option value="pcs">pcs (Pieces)</option>
                                                <option value="ton">ton (Metric Ton)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Production Date</label>
                                            <input type="date" class="form-control" name="production_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Mix Design</label>
                                            <select class="form-select" name="mix_design" required>
                                                <option value="">Select mix design</option>
                                                <option value="MD-K175-STD">MD-K175-STD</option>
                                                <option value="MD-K200-STD">MD-K200-STD</option>
                                                <option value="MD-K225-STD">MD-K225-STD</option>
                                                <option value="MD-K250-STD">MD-K250-STD</option>
                                                <option value="MD-K300-STD">MD-K300-STD</option>
                                                <option value="MD-K350-STD">MD-K350-STD</option>
                                                <option value="MD-K400-STD">MD-K400-STD</option>
                                                <option value="MD-K450-STD">MD-K450-STD</option>
                                                <option value="MD-K500-STD">MD-K500-STD</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Batch Plant</label>
                                            <select class="form-select" name="batch_plant" required>
                                                <option value="">Select batch plant</option>
                                                <option value="Plant A">Plant A</option>
                                                <option value="Plant B">Plant B</option>
                                                <option value="Plant C">Plant C</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Storage Location</label>
                                            <select class="form-select" name="storage_location" required>
                                                <option value="">Select storage location</option>
                                                <option value="Yard A">Yard A</option>
                                                <option value="Yard B">Yard B</option>
                                                <option value="Warehouse 1">Warehouse 1</option>
                                                <option value="Warehouse 2">Warehouse 2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="4" placeholder="Enter product description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Quality Test Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="quality_test_completed">
                                        <span class="form-check-label">Quality Test Completed</span>
                                    </label>
                                </div>
                                <div id="quality-test-section" class="d-none">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Slump Test Result</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="slump_test"
                                                        placeholder="Enter value">
                                                    <span class="input-group-text">cm</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Temperature</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="temperature"
                                                        placeholder="Enter value">
                                                    <span class="input-group-text">°C</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Compression (3 days)</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="compression"
                                                        placeholder="Enter value">
                                                    <span class="input-group-text">MPa</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Test Notes</label>
                                    <textarea class="form-control" name="test_notes" rows="2" placeholder="Enter test notes"></textarea>
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
                                    <input type="number" class="form-control" name="min_stock"
                                        placeholder="Enter minimum stock level">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Maximum Stock Level</label>
                                    <input type="number" class="form-control" name="max_stock"
                                        placeholder="Enter maximum stock level">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Reorder Point</label>
                                    <input type="number" class="form-control" name="reorder_point"
                                        placeholder="Enter reorder point">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Shelf Life</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="shelf_life_value"
                                            placeholder="Enter value">
                                        <select class="form-select" name="shelf_life_unit">
                                            <option value="hours">Hours</option>
                                            <option value="days">Days</option>
                                            <option value="months">Months</option>
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
                                    <input type="text" class="form-control" name="batch_number"
                                        placeholder="Enter batch number">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Production Operator</label>
                                    <select class="form-select" name="operator">
                                        <option value="">Select operator</option>
                                        <option value="John Doe">John Doe</option>
                                        <option value="Jane Smith">Jane Smith</option>
                                        <option value="Robert Johnson">Robert Johnson</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Notes</label>
                                    <textarea class="form-control" name="notes" rows="3" placeholder="Enter additional notes"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('warehouse.finished-products') }}"
                                        class="btn btn-outline-secondary">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        Save Product
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

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle quality test section
            const qualityTestCheckbox = document.querySelector('input[name="quality_test_completed"]');
            const qualityTestSection = document.getElementById('quality-test-section');

            qualityTestCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    qualityTestSection.classList.remove('d-none');
                } else {
                    qualityTestSection.classList.add('d-none');
                }
            });

            // Auto-generate product code based on type and strength
            const typeSelect = document.querySelector('select[name="type"]');
            const strengthSelect = document.querySelector('select[name="strength"]');
            const codeInput = document.querySelector('input[name="code"]');

            function updateProductCode() {
                const type = typeSelect.value;
                const strength = strengthSelect.value;

                if (type && strength) {
                    let prefix = '';

                    if (type === 'Ready Mix') {
                        prefix = 'RM';
                    } else if (type === 'Precast') {
                        prefix = 'PC';
                    } else if (type === 'Concrete Block') {
                        prefix = 'CB';
                    }

                    // Generate a random 3-digit number
                    const randomNum = Math.floor(Math.random() * 900) + 100;

                    codeInput.value = `${prefix}-${strength}-${randomNum}`;
                }
            }

            typeSelect.addEventListener('change', updateProductCode);
            strengthSelect.addEventListener('change', updateProductCode);
        });
    </script>
@endsection
