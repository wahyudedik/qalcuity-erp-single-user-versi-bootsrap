@extends('layouts.app')

@section('title', 'Stock Movement')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Finished Product Stock Movement
                </h2>
                <div class="text-muted mt-1">Track all stock movements of finished products</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('warehouse.finished-products') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to Inventory
                    </a>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-add-movement">
                        <i class="ti ti-plus"></i>
                        Add Movement
                    </a>
                    <a href="#" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-file-export"></i>
                        Export
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Stock Movement History</h3>
                <div class="card-actions">
                    <div class="row g-2">
                        <div class="col-auto">
                            <select class="form-select" id="filter-movement-type">
                                <option value="">All Movement Types</option>
                                <option value="Production">Production</option>
                                <option value="Delivery">Delivery</option>
                                <option value="Return">Return</option>
                                <option value="Adjustment">Adjustment</option>
                                <option value="Transfer">Transfer</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select class="form-select" id="filter-product">
                                <option value="">All Products</option>
                                <option value="Ready Mix K225">Ready Mix K225</option>
                                <option value="Ready Mix K300">Ready Mix K300</option>
                                <option value="Ready Mix K350">Ready Mix K350</option>
                                <option value="Precast Panel K300">Precast Panel K300</option>
                                <option value="Concrete Block K175">Concrete Block K175</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="ti ti-calendar"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Date range" id="date-range">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Date & Time</th>
                                <th>Movement Type</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Reference</th>
                                <th>Location</th>
                                <th>Performed By</th>
                                <th>Notes</th>
                                <th class="w-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $movements = [
                                [
                                    'id' => 1,
                                    'date' => '2023-10-15 08:30:00',
                                    'type' => 'Production',
                                    'product' => 'Ready Mix K225',
                                    'quantity' => '+200 m³',
                                    'reference' => 'PROD-001',
                                    'location' => 'Plant A',
                                    'user' => 'John Doe',
                                    'notes' => 'Initial production batch'
                                ],
                                [
                                    'id' => 2,
                                    'date' => '2023-10-16 09:15:00',
                                    'type' => 'Delivery',
                                    'product' => 'Ready Mix K225',
                                    'quantity' => '-30 m³',
                                    'reference' => 'DO-1001',
                                    'location' => 'Project Site A',
                                    'user' => 'Robert Johnson',
                                    'notes' => 'Delivery to Project Site A'
                                ],
                                [
                                    'id' => 3,
                                    'date' => '2023-10-16 10:30:00',
                                    'type' => 'Production',
                                    'product' => 'Ready Mix K300',
                                    'quantity' => '+150 m³',
                                    'reference' => 'PROD-002',
                                    'location' => 'Plant B',
                                    'user' => 'Jane Smith',
                                    'notes' => 'Regular production'
                                ],
                                [
                                    'id' => 4,
                                    'date' => '2023-10-17 08:45:00',
                                    'type' => 'Delivery',
                                    'product' => 'Ready Mix K225',
                                    'quantity' => '-20 m³',
                                    'reference' => 'DO-1002',
                                    'location' => 'Project Site B',
                                    'user' => 'Robert Johnson',
                                    'notes' => 'Delivery to Project Site B'
                                ],
                                [
                                    'id' => 5,
                                    'date' => '2023-10-17 11:20:00',
                                    'type' => 'Delivery',
                                    'product' => 'Ready Mix K300',
                                    'quantity' => '-30 m³',
                                    'reference' => 'DO-1003',
                                    'location' => 'Project Site C',
                                    'user' => 'Robert Johnson',
                                    'notes' => 'Delivery to Project Site C'
                                ],
                                [
                                    'id' => 6,
                                    'date' => '2023-10-17 14:15:00',
                                    'type' => 'Return',
                                    'product' => 'Ready Mix K300',
                                    'quantity' => '+5 m³',
                                    'reference' => 'RET-001',
                                    'location' => 'Plant B',
                                    'user' => 'Jane Smith',
                                    'notes' => 'Returned from Project Site C - excess material'
                                ],
                                [
                                    'id' => 7,
                                    'date' => '2023-10-18 09:30:00',
                                    'type' => 'Production',
                                    'product' => 'Precast Panel K300',
                                    'quantity' => '+30 pcs',
                                    'reference' => 'PROD-003',
                                    'location' => 'Plant C',
                                    'user' => 'Michael Brown',
                                    'notes' => 'Production of precast panels'
                                ],
                                [
                                    'id' => 8,
                                    'date' => '2023-10-18 13:45:00',
                                    'type' => 'Adjustment',
                                    'product' => 'Ready Mix K225',
                                    'quantity' => '-5 m³',
                                    'reference' => 'ADJ-001',
                                    'location' => 'Plant A',
                                    'user' => 'John Doe',
                                    'notes' => 'Inventory adjustment after stock count'
                                ],
                                [
                                    'id' => 9,
                                    'date' => '2023-10-19 08:15:00',
                                    'type' => 'Production',
                                    'product' => 'Concrete Block K175',
                                    'quantity' => '+1000 pcs',
                                    'reference' => 'PROD-004',
                                    'location' => 'Plant C',
                                    'user' => 'Michael Brown',
                                    'notes' => 'Production of concrete blocks'
                                ],
                                [
                                    'id' => 10,
                                    'date' => '2023-10-19 14:30:00',
                                    'type' => 'Transfer',
                                    'product' => 'Precast Panel K300',
                                    'quantity' => '-10 pcs',
                                    'reference' => 'TRF-001',
                                    'location' => 'Warehouse 1',
                                    'user' => 'Jane Smith',
                                    'notes' => 'Transfer to Warehouse 1 for storage'
                                ]
                            ];
                            @endphp

                            @foreach($movements as $movement)
                            <tr>
                                <td>{{ $movement['date'] }}</td>
                                <td>
                                    @if($movement['type'] == 'Production')
                                    <span class="badge bg-green">Production</span>
                                    @elseif($movement['type'] == 'Delivery')
                                    <span class="badge bg-blue">Delivery</span>
                                    @elseif($movement['type'] == 'Return')
                                    <span class="badge bg-purple">Return</span>
                                    @elseif($movement['type'] == 'Adjustment')
                                    <span class="badge bg-orange">Adjustment</span>
                                    @elseif($movement['type'] == 'Transfer')
                                    <span class="badge bg-cyan">Transfer</span>
                                    @endif
                                </td>
                                <td>{{ $movement['product'] }}</td>
                                <td>
                                    @if(strpos($movement['quantity'], '+') === 0)
                                    <span class="text-success">{{ $movement['quantity'] }}</span>
                                    @else
                                    <span class="text-danger">{{ $movement['quantity'] }}</span>
                                    @endif
                                </td>
                                <td>{{ $movement['reference'] }}</td>
                                <td>{{ $movement['location'] }}</td>
                                <td>{{ $movement['user'] }}</td>
                                <td>{{ $movement['notes'] }}</td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-movement-details" data-id="{{ $movement['id'] }}">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <p class="m-0 text-muted">Showing <span>1</span> to <span>10</span> of <span>25</span> entries</p>
                    <ul class="pagination m-0 ms-auto">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="ti ti-chevron-left"></i>
                                prev
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
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
    </div>
</div>

<!-- Add Movement Modal -->
<div class="modal modal-blur fade" id="modal-add-movement" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Stock Movement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-movement-form">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Movement Type</label>
                                <select class="form-select" name="movement_type" required>
                                    <option value="">Select movement type</option>
                                    <option value="Production">Production</option>
                                    <option value="Delivery">Delivery</option>
                                    <option value="Return">Return</option>
                                    <option value="Adjustment">Adjustment</option>
                                    <option value="Transfer">Transfer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Product</label>
                                <select class="form-select" name="product" required>
                                    <option value="">Select product</option>
                                    <option value="Ready Mix K225">Ready Mix K225</option>
                                    <option value="Ready Mix K300">Ready Mix K300</option>
                                    <option value="Ready Mix K350">Ready Mix K350</option>
                                    <option value="Precast Panel K300">Precast Panel K300</option>
                                    <option value="Concrete Block K175">Concrete Block K175</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Quantity</label>
                                <div class="input-group">
                                    <select class="form-select w-25" name="quantity_type">
                                        <option value="add">+</option>
                                        <option value="subtract">-</option>
                                    </select>
                                    <input type="number" class="form-control" name="quantity" placeholder="Enter quantity" required>
                                    <select class="form-select w-25" name="unit">
                                        <option value="m³">m³</option>
                                        <option value="pcs">pcs</option>
                                        <option value="ton">ton</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Reference</label>
                                <input type="text" class="form-control" name="reference" placeholder="Enter reference number" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Location</label>
                                <select class="form-select" name="location" required>
                                    <option value="">Select location</option>
                                    <option value="Plant A">Plant A</option>
                                    <option value="Plant B">Plant B</option>
                                    <option value="Plant C">Plant C</option>
                                    <option value="Warehouse 1">Warehouse 1</option>
                                    <option value="Warehouse 2">Warehouse 2</option>
                                    <option value="Project Site A">Project Site A</option>
                                    <option value="Project Site B">Project Site B</option>
                                    <option value="Project Site C">Project Site C</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Date & Time</label>
                                <input type="datetime-local" class="form-control" name="datetime" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" name="notes" rows="3" placeholder="Enter additional notes"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary ms-auto" id="save-movement">
                    <i class="ti ti-plus"></i>
                    Add Movement
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Movement Details Modal -->
<div class="modal modal-blur fade" id="modal-movement-details" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Movement Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Movement Type</label>
                            <div class="form-control-plaintext" id="detail-type">Production</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Date & Time</label>
                            <div class="form-control-plaintext" id="detail-date">2023-10-15 08:30:00</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Product</label>
                            <div class="form-control-plaintext" id="detail-product">Ready Mix K225</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Quantity</label>
                            <div class="form-control-plaintext" id="detail-quantity">+200 m³</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Reference</label>
                            <div class="form-control-plaintext" id="detail-reference">PROD-001</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Location</label>
                            <div class="form-control-plaintext" id="detail-location">Plant A</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Performed By</label>
                            <div class="form-control-plaintext" id="detail-user">John Doe</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Status</label>
                            <div class="form-control-plaintext" id="detail-status">
                                <span class="badge bg-success">Completed</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Notes</label>
                    <div class="form-control-plaintext" id="detail-notes">Initial production batch</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <a href="#" class="btn btn-primary" id="detail-print">
                    <i class="ti ti-printer"></i>
                    Print
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Date range picker
        new Litepicker({
            element: document.getElementById('date-range'),
            singleMode: false,
            format: 'YYYY-MM-DD',
            numberOfColumns: 2,
            numberOfMonths: 2,
            showTooltip: true,
            tooltipText: {
                one: 'day',
                other: 'days'
            }
        });

        // Filter by movement type
        document.getElementById('filter-movement-type').addEventListener('change', function() {
            var value = this.value.toLowerCase();
            var rows = document.querySelectorAll('tbody tr');
            
                        if (value === '') {
                rows.forEach(row => {
                    row.style.display = '';
                });
            } else {
                rows.forEach(row => {
                    var type = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    if (type.includes(value)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
        });

        // Filter by product
        document.getElementById('filter-product').addEventListener('change', function() {
            var value = this.value.toLowerCase();
            var rows = document.querySelectorAll('tbody tr');
            
            if (value === '') {
                rows.forEach(row => {
                    row.style.display = '';
                });
            } else {
                rows.forEach(row => {
                    var product = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    if (product.includes(value)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
        });

        // Movement details modal
        document.querySelectorAll('[data-bs-target="#modal-movement-details"]').forEach(button => {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                // In a real application, you would fetch the details from the server
                // For this example, we'll use the sample data
                var movements = @json($movements);
                var movement = movements.find(m => m.id == id);
                
                if (movement) {
                    document.getElementById('detail-type').textContent = movement.type;
                    document.getElementById('detail-date').textContent = movement.date;
                    document.getElementById('detail-product').textContent = movement.product;
                    document.getElementById('detail-quantity').textContent = movement.quantity;
                    document.getElementById('detail-reference').textContent = movement.reference;
                    document.getElementById('detail-location').textContent = movement.location;
                    document.getElementById('detail-user').textContent = movement.user;
                    document.getElementById('detail-notes').textContent = movement.notes;
                    
                    // Update quantity color
                    if (movement.quantity.startsWith('+')) {
                        document.getElementById('detail-quantity').className = 'form-control-plaintext text-success';
                    } else {
                        document.getElementById('detail-quantity').className = 'form-control-plaintext text-danger';
                    }
                }
            });
        });

        // Save movement button
        document.getElementById('save-movement').addEventListener('click', function() {
            var form = document.getElementById('add-movement-form');
            
            // Simple validation
            var requiredFields = form.querySelectorAll('[required]');
            var valid = true;
            
            requiredFields.forEach(field => {
                if (!field.value) {
                    field.classList.add('is-invalid');
                    valid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (valid) {
                // In a real application, you would submit the form to the server
                // For this example, we'll just show a success message and close the modal
                
                // Get form values
                var movementType = form.querySelector('[name="movement_type"]').value;
                var product = form.querySelector('[name="product"]').value;
                var quantityType = form.querySelector('[name="quantity_type"]').value;
                var quantity = form.querySelector('[name="quantity"]').value;
                var unit = form.querySelector('[name="unit"]').value;
                
                // Format quantity with sign
                var formattedQuantity = (quantityType === 'add' ? '+' : '-') + quantity + ' ' + unit;
                
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Stock Movement Added',
                    text: `Successfully added ${movementType} movement of ${formattedQuantity} for ${product}`,
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Close modal and reset form
                    var modal = bootstrap.Modal.getInstance(document.getElementById('modal-add-movement'));
                    modal.hide();
                    form.reset();
                    
                    // In a real application, you would refresh the data or add the new row to the table
                });
            }
        });
    });
</script>
@endsection

