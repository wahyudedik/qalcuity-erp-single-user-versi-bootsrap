@extends('layouts.app')

@section('title', 'Raw Material Stock Movements')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Raw Material Stock Movements
                </h2>
                <div class="text-muted mt-1">Track all stock movements for raw materials</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('warehouse.raw-materials') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left me-1"></i>
                        Back to Inventory
                    </a>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#addMovementModal">
                        <i class="ti ti-plus me-1"></i>
                        Add Movement
                    </a>
                    <a href="#" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-file-export me-1"></i>
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
            <div class="card-body">
                <div class="d-flex">
                    <div class="ms-auto text-muted">
                        <div class="ms-2 d-inline-block">
                            <div class="row g-2">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Search..." id="search-movement">
                                </div>
                                <div class="col-auto">
                                    <select class="form-select" id="filter-material">
                                        <option value="">All Materials</option>
                                        <option value="Portland Composite Cement">Portland Composite Cement</option>
                                        <option value="Coarse Aggregate 10mm">Coarse Aggregate 10mm</option>
                                        <option value="Coarse Aggregate 20mm">Coarse Aggregate 20mm</option>
                                        <option value="Fine Sand">Fine Sand</option>
                                        <option value="Superplasticizer">Superplasticizer</option>
                                        <option value="Ordinary Portland Cement">Ordinary Portland Cement</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <select class="form-select" id="filter-type">
                                        <option value="">All Types</option>
                                        <option value="In">In</option>
                                        <option value="Out">Out</option>
                                        <option value="Adjustment">Adjustment</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <input type="date" class="form-control" id="filter-date">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>Date & Time</th>
                            <th>Material</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Reference</th>
                            <th>Location</th>
                            <th>User</th>
                            <th>Notes</th>
                            <th class="w-1">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $movements = [
                            [
                                'id' => 1,
                                'date' => '2023-10-20 08:15:22',
                                'material' => 'Portland Composite Cement',
                                'material_code' => 'CEM-PCC-001',
                                'type' => 'In',
                                'quantity' => 5000,
                                'unit' => 'kg',
                                'reference' => 'PO-2023-10-001',
                                'location' => 'Silo A',
                                'user' => 'John Doe',
                                'notes' => 'Regular delivery from PT Semen Indonesia'
                            ],
                            [
                                'id' => 2,
                                'date' => '2023-10-20 09:30:45',
                                'material' => 'Coarse Aggregate 10mm',
                                'material_code' => 'AGG-10-001',
                                'type' => 'In',
                                'quantity' => 15000,
                                'unit' => 'kg',
                                'reference' => 'PO-2023-10-002',
                                'location' => 'Yard B',
                                'user' => 'John Doe',
                                'notes' => 'Delivery from PT Quarry Utama'
                            ],
                            [
                                'id' => 3,
                                'date' => '2023-10-20 10:45:12',
                                'material' => 'Fine Sand',
                                'material_code' => 'SND-001',
                                'type' => 'In',
                                'quantity' => 10000,
                                'unit' => 'kg',
                                'reference' => 'PO-2023-10-003',
                                'location' => 'Yard A',
                                'user' => 'John Doe',
                                'notes' => 'Delivery from PT Quarry Jaya'
                            ],
                            [
                                'id' => 4,
                                'date' => '2023-10-20 13:20:33',
                                'material' => 'Portland Composite Cement',
                                'material_code' => 'CEM-PCC-001',
                                'type' => 'Out',
                                'quantity' => 1200,
                                'unit' => 'kg',
                                'reference' => 'PRD-2023-10-001',
                                'location' => 'Silo A',
                                'user' => 'Jane Smith',
                                'notes' => 'Production batch #1'
                            ],
                            [
                                'id' => 5,
                                'date' => '2023-10-20 13:25:18',
                                'material' => 'Coarse Aggregate 10mm',
                                'material_code' => 'AGG-10-001',
                                'type' => 'Out',
                                'quantity' => 3500,
                                'unit' => 'kg',
                                'reference' => 'PRD-2023-10-001',
                                'location' => 'Yard B',
                                'user' => 'Jane Smith',
                                'notes' => 'Production batch #1'
                            ],
                            [
                                'id' => 6,
                                'date' => '2023-10-20 13:28:42',
                                'material' => 'Fine Sand',
                                'material_code' => 'SND-001',
                                'type' => 'Out',
                                'quantity' => 2800,
                                'unit' => 'kg',
                                'reference' => 'PRD-2023-10-001',
                                'location' => 'Yard A',
                                'user' => 'Jane Smith',
                                'notes' => 'Production batch #1'
                            ],
                            [
                                'id' => 7,
                                'date' => '2023-10-20 15:10:05',
                                'material' => 'Superplasticizer',
                                'material_code' => 'ADM-SP-001',
                                'type' => 'Out',
                                'quantity' => 25,
                                'unit' => 'liter',
                                'reference' => 'PRD-2023-10-001',
                                'location' => 'Chemical Store',
                                'user' => 'Jane Smith',
                                'notes' => 'Production batch #1'
                            ],
                            [
                                'id' => 8,
                                'date' => '2023-10-20 16:45:30',
                                'material' => 'Ordinary Portland Cement',
                                'material_code' => 'CEM-OPC-001',
                                'type' => 'Adjustment',
                                'quantity' => -200,
                                'unit' => 'kg',
                                'reference' => 'ADJ-2023-10-001',
                                'location' => 'Silo C',
                                'user' => 'Robert Johnson',
                                'notes' => 'Stock count adjustment'
                            ],
                            [
                                'id' => 9,
                                'date' => '2023-10-21 08:30:15',
                                'material' => 'Coarse Aggregate 10mm',
                                'material_code' => 'AGG-10-001',
                                'type' => 'Transfer',
                                'quantity' => 5000,
                                'unit' => 'kg',
                                'reference' => 'TRF-2023-10-001',
                                'location' => 'Yard B to Yard C',
                                'user' => 'Robert Johnson',
                                'notes' => 'Reorganizing storage areas'
                            ],
                            [
                                'id' => 10,
                                'date' => '2023-10-21 09:15:22',
                                'material' => 'Portland Composite Cement',
                                'material_code' => 'CEM-PCC-001',
                                'type' => 'Out',
                                'quantity' => 1500,
                                'unit' => 'kg',
                                'reference' => 'PRD-2023-10-002',
                                'location' => 'Silo A',
                                'user' => 'Jane Smith',
                                'notes' => 'Production batch #2'
                            ]
                        ];
                        @endphp

                        @foreach($movements as $movement)
                        <tr>
                            <td>{{ $movement['date'] }}</td>
                            <td>
                                <div>{{ $movement['material'] }}</div>
                                <div class="text-muted">{{ $movement['material_code'] }}</div>
                            </td>
                            <td>
                                @if($movement['type'] == 'In')
                                <span class="badge bg-green">In</span>
                                @elseif($movement['type'] == 'Out')
                                <span class="badge bg-red">Out</span>
                                @elseif($movement['type'] == 'Adjustment')
                                <span class="badge bg-yellow">Adjustment</span>
                                @elseif($movement['type'] == 'Transfer')
                                <span class="badge bg-blue">Transfer</span>
                                @endif
                            </td>
                            <td>
                                @if($movement['type'] == 'Adjustment' && $movement['quantity'] < 0)
                                <span class="text-danger">{{ number_format($movement['quantity']) }} {{ $movement['unit'] }}</span>
                                @elseif($movement['type'] == 'In')
                                <span class="text-success">+{{ number_format($movement['quantity']) }} {{ $movement['unit'] }}</span>
                                @elseif($movement['type'] == 'Out')
                                <span class="text-danger">-{{ number_format($movement['quantity']) }} {{ $movement['unit'] }}</span>
                                @else
                                <span>{{ number_format($movement['quantity']) }} {{ $movement['unit'] }}</span>
                                @endif
                            </td>
                            <td>{{ $movement['reference'] }}</td>
                            <td>{{ $movement['location'] }}</td>
                            <td>{{ $movement['user'] }}</td>
                            <td>{{ $movement['notes'] }}</td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#viewMovementModal{{ $movement['id'] }}">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <!-- View Movement Modal -->
                        <div class="modal modal-blur fade" id="viewMovementModal{{ $movement['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Movement Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Date & Time</label>
                                            <input type="text" class="form-control" value="{{ $movement['date'] }}" disabled>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Material</label>
                                                    <input type="text" class="form-control" value="{{ $movement['material'] }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Material Code</label>
                                                    <input type="text" class="form-control" value="{{ $movement['material_code'] }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Movement Type</label>
                                                    <input type="text" class="form-control" value="{{ $movement['type'] }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Quantity</label>
                                                    <input type="text" class="form-control" value="{{ number_format($movement['quantity']) }} {{ $movement['unit'] }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Reference</label>
                                                    <input type="text" class="form-control" value="{{ $movement['reference'] }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Location</label>
                                                    <input type="text" class="form-control" value="{{ $movement['location'] }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">User</label>
                                            <input type="text" class="form-control" value="{{ $movement['user'] }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Notes</label>
                                            <textarea class="form-control" rows="3" disabled>{{ $movement['notes'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Showing <span>1</span> to <span>10</span> of <span>{{ count($movements) }}</span> entries</p>
                <ul class="pagination m-0 ms-auto">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class="ti ti-chevron-left"></i>
                            prev
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
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

<!-- Add Movement Modal -->
<div class="modal modal-blur fade" id="addMovementModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Stock Movement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label required">Movement Type</label>
                    <select class="form-select" name="type" id="movement-type" required>
                        <option value="">Select Type</option>
                        <option value="In">Stock In</option>
                        <option value="Out">Stock Out</option>
                        <option value="Adjustment">Stock Adjustment</option>
                        <option value="Transfer">Stock Transfer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Material</label>
                    <select class="form-select" name="material" required>
                        <option value="">Select Material</option>
                                                <option value="1">CEM-PCC-001 - Portland Composite Cement</option>
                        <option value="2">AGG-10-001 - Coarse Aggregate 10mm</option>
                        <option value="3">AGG-20-001 - Coarse Aggregate 20mm</option>
                        <option value="4">SND-001 - Fine Sand</option>
                        <option value="5">ADM-SP-001 - Superplasticizer</option>
                        <option value="6">ADM-RE-001 - Retarder</option>
                        <option value="7">WAT-001 - Clean Water</option>
                        <option value="8">ADM-AE-001 - Air Entraining Agent</option>
                        <option value="9">OTH-FA-001 - Fly Ash</option>
                        <option value="10">CEM-OPC-001 - Ordinary Portland Cement</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label required">Quantity</label>
                            <input type="number" class="form-control" name="quantity" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label required">Unit</label>
                            <select class="form-select" name="unit" required>
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
                <div class="mb-3">
                    <label class="form-label required">Reference</label>
                    <input type="text" class="form-control" name="reference" placeholder="PO-2023-10-001, PRD-2023-10-001, etc." required>
                </div>
                <div id="location-single" class="mb-3">
                    <label class="form-label required">Location</label>
                    <select class="form-select" name="location">
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
                <div id="location-transfer" class="mb-3" style="display: none;">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label required">From Location</label>
                            <select class="form-select" name="from_location">
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
                        <div class="col-lg-6">
                            <label class="form-label required">To Location</label>
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
                                <option value="Water Tank">Water Tank</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Date & Time</label>
                    <input type="datetime-local" class="form-control" name="date" value="{{ date('Y-m-d\TH:i') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary ms-auto" data-bs-dismiss="modal">Add Movement</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search and filter functionality
        const searchInput = document.getElementById('search-movement');
        const filterMaterial = document.getElementById('filter-material');
        const filterType = document.getElementById('filter-type');
        const filterDate = document.getElementById('filter-date');
        const tableRows = document.querySelectorAll('tbody tr');

        const filterTable = () => {
            const searchTerm = searchInput.value.toLowerCase();
            const materialFilter = filterMaterial.value;
            const typeFilter = filterType.value;
            const dateFilter = filterDate.value ? new Date(filterDate.value) : null;

            tableRows.forEach(row => {
                const material = row.cells[1].textContent.toLowerCase();
                const type = row.cells[2].textContent.trim();
                const dateStr = row.cells[0].textContent.split(' ')[0]; // Get just the date part
                const rowDate = new Date(dateStr);
                
                const matchesSearch = material.includes(searchTerm) || 
                                     row.cells[4].textContent.toLowerCase().includes(searchTerm) ||
                                     row.cells[7].textContent.toLowerCase().includes(searchTerm);
                const matchesMaterial = materialFilter === '' || material.includes(materialFilter.toLowerCase());
                const matchesType = typeFilter === '' || type.includes(typeFilter);
                const matchesDate = !dateFilter || 
                                   (rowDate.getFullYear() === dateFilter.getFullYear() && 
                                    rowDate.getMonth() === dateFilter.getMonth() && 
                                    rowDate.getDate() === dateFilter.getDate());

                if (matchesSearch && matchesMaterial && matchesType && matchesDate) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        };

        searchInput.addEventListener('input', filterTable);
        filterMaterial.addEventListener('change', filterTable);
        filterType.addEventListener('change', filterTable);
        filterDate.addEventListener('change', filterTable);

        // Movement type change handler
        const movementType = document.getElementById('movement-type');
        const locationSingle = document.getElementById('location-single');
        const locationTransfer = document.getElementById('location-transfer');

        movementType.addEventListener('change', function() {
            if (this.value === 'Transfer') {
                locationSingle.style.display = 'none';
                locationTransfer.style.display = 'block';
            } else {
                locationSingle.style.display = 'block';
                locationTransfer.style.display = 'none';
            }
        });
    });
</script>
@endsection

