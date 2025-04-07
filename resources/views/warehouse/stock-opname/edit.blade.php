@extends('layouts.app')

@section('title', 'Edit Stock Opname')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Stock Opname
                </h2>
                <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('warehouse.stock-opname') }}">Stock Opname</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('warehouse.stock-opname.detail', ['id' => $id]) }}">SO-2023-00{{ $id }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </div>
        </div>
    </div>

    <form action="#" method="post">
        @csrf
        @method('PUT')
        
        <!-- Basic Information -->
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Basic Information</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Stock Opname ID</label>
                            <input type="text" class="form-control" value="SO-2023-00{{ $id }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Date</label>
                            <input type="date" class="form-control" name="date" value="
                            @php
                                $dates = [
                                    '1' => '2023-11-15',
                                    '2' => '2023-11-20',
                                    '3' => '2023-11-25',
                                    '4' => '2023-12-01',
                                    '5' => '2023-12-05',
                                    '6' => '2023-12-06',
                                    '7' => '2023-12-07',
                                    '8' => '2023-12-08',
                                    '9' => '2023-12-09',
                                    '10' => '2023-12-10',
                                ];
                                echo $dates[$id] ?? date('Y-m-d');
                            @endphp
                            " required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Warehouse</label>
                            <select class="form-select" name="warehouse" required>
                                <option value="">Select Warehouse</option>
                                @php
                                    $warehouses = [
                                        '1' => 'Main Warehouse',
                                        '2' => 'Production Warehouse',
                                        '3' => 'Finished Goods Warehouse',
                                        '4' => 'Main Warehouse',
                                        '5' => 'Production Warehouse',
                                        '6' => 'Finished Goods Warehouse',
                                        '7' => 'Main Warehouse',
                                        '8' => 'Production Warehouse',
                                        '9' => 'Finished Goods Warehouse',
                                        '10' => 'Main Warehouse',
                                    ];
                                    $selectedWarehouse = $warehouses[$id] ?? 'Main Warehouse';
                                            @endphp
                                <option value="1" {{ $selectedWarehouse == 'Main Warehouse' ? 'selected' : '' }}>Main Warehouse</option>
                                <option value="2" {{ $selectedWarehouse == 'Production Warehouse' ? 'selected' : '' }}>Production Warehouse</option>
                                <option value="3" {{ $selectedWarehouse == 'Finished Goods Warehouse' ? 'selected' : '' }}>Finished Goods Warehouse</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Type</label>
                            <select class="form-select" name="type" required>
                                <option value="">Select Type</option>
                                @php
                                    $types = [
                                        '1' => 'Full Inventory',
                                        '2' => 'Raw Materials',
                                        '3' => 'Finished Products',
                                        '4' => 'Partial (Cement)',
                                        '5' => 'Partial (Aggregates)',
                                        '6' => 'Full Inventory',
                                        '7' => 'Raw Materials',
                                        '8' => 'Finished Products',
                                        '9' => 'Partial (Cement)',
                                        '10' => 'Partial (Aggregates)',
                                    ];
                                    $selectedType = $types[$id] ?? 'Full Inventory';
                                    
                                    $typeValues = [
                                        'Full Inventory' => 'full',
                                        'Raw Materials' => 'raw_materials',
                                        'Finished Products' => 'finished_products',
                                        'Partial (Cement)' => 'partial_cement',
                                        'Partial (Aggregates)' => 'partial_aggregates',
                                    ];
                                    $selectedTypeValue = $typeValues[$selectedType] ?? 'full';
                                @endphp
                                <option value="full" {{ $selectedTypeValue == 'full' ? 'selected' : '' }}>Full Inventory</option>
                                <option value="raw_materials" {{ $selectedTypeValue == 'raw_materials' ? 'selected' : '' }}>Raw Materials</option>
                                <option value="finished_products" {{ $selectedTypeValue == 'finished_products' ? 'selected' : '' }}>Finished Products</option>
                                <option value="partial_cement" {{ $selectedTypeValue == 'partial_cement' ? 'selected' : '' }}>Partial (Cement)</option>
                                <option value="partial_aggregates" {{ $selectedTypeValue == 'partial_aggregates' ? 'selected' : '' }}>Partial (Aggregates)</option>
                                <option value="partial_admixture" {{ $selectedTypeValue == 'partial_admixture' ? 'selected' : '' }}>Partial (Admixture)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Conducted By</label>
                            <select class="form-select" name="conducted_by" required>
                                <option value="">Select Staff</option>
                                @php
                                    $conductedBy = [
                                        '1' => 'John Doe',
                                        '2' => 'Mike Johnson',
                                        '3' => 'Robert Brown',
                                        '4' => 'David Wilson',
                                        '5' => 'John Doe',
                                        '6' => 'Mike Johnson',
                                        '7' => 'Robert Brown',
                                        '8' => 'David Wilson',
                                        '9' => 'John Doe',
                                        '10' => 'Mike Johnson',
                                    ];
                                    $selectedConductor = $conductedBy[$id] ?? 'John Doe';
                                    
                                    // Remove "Assigned to: " prefix if present
                                    $selectedConductor = str_replace('Assigned to: ', '', $selectedConductor);
                                    
                                    $staffIds = [
                                        'John Doe' => 1,
                                        'Mike Johnson' => 2,
                                        'Robert Brown' => 3,
                                        'David Wilson' => 4,
                                        'Emily Davis' => 5,
                                    ];
                                    $selectedConductorId = $staffIds[$selectedConductor] ?? 1;
                                @endphp
                                <option value="1" {{ $selectedConductorId == 1 ? 'selected' : '' }}>John Doe</option>
                                <option value="2" {{ $selectedConductorId == 2 ? 'selected' : '' }}>Mike Johnson</option>
                                <option value="3" {{ $selectedConductorId == 3 ? 'selected' : '' }}>Robert Brown</option>
                                <option value="4" {{ $selectedConductorId == 4 ? 'selected' : '' }}>David Wilson</option>
                                <option value="5" {{ $selectedConductorId == 5 ? 'selected' : '' }}>Emily Davis</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter description or purpose of this stock opname">Regular monthly inventory verification for {{ $selectedType }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Information -->
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Status Information</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Status</label>
                            <select class="form-select" name="status" required>
                                @php
                                    $statuses = [
                                        '1' => 'Completed',
                                        '2' => 'Verified',
                                        '3' => 'In Progress',
                                        '4' => 'Scheduled',
                                        '5' => 'Completed',
                                        '6' => 'Verified',
                                        '7' => 'In Progress',
                                        '8' => 'Scheduled',
                                        '9' => 'Completed',
                                        '10' => 'Verified',
                                    ];
                                    $selectedStatus = $statuses[$id] ?? 'Scheduled';
                                @endphp
                                <option value="scheduled" {{ $selectedStatus == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                                <option value="in_progress" {{ $selectedStatus == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ $selectedStatus == 'Completed' ? 'selected' : '' }}>Completed</option>
                                <option value="verified" {{ $selectedStatus == 'Verified' ? 'selected' : '' }}>Verified</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Completion Date</label>
                            <input type="date" class="form-control" name="completion_date" value="{{ $selectedStatus == 'Completed' || $selectedStatus == 'Verified' ? $dates[$id] ?? date('Y-m-d') : '' }}" {{ $selectedStatus == 'Scheduled' || $selectedStatus == 'In Progress' ? 'disabled' : '' }}>
                            <small class="form-hint">Only applicable for Completed or Verified status</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Verified By</label>
                            <select class="form-select" name="verified_by" {{ $selectedStatus != 'Verified' ? 'disabled' : '' }}>
                                <option value="">Select Verifier</option>
                                @php
                                    $verifiedBy = [
                                        '1' => 'Jane Smith',
                                        '2' => 'Sarah Williams',
                                        '5' => 'Emily Davis',
                                        '6' => 'Michael Brown',
                                        '9' => 'Jane Smith',
                                        '10' => 'Sarah Williams',
                                    ];
                                    $selectedVerifier = $verifiedBy[$id] ?? '';
                                    
                                    $verifierIds = [
                                        'Jane Smith' => 1,
                                        'Sarah Williams' => 2,
                                        'Emily Davis' => 3,
                                        'Michael Brown' => 4,
                                    ];
                                    $selectedVerifierId = $verifierIds[$selectedVerifier] ?? '';
                                @endphp
                                <option value="1" {{ $selectedVerifierId == 1 ? 'selected' : '' }}>Jane Smith</option>
                                <option value="2" {{ $selectedVerifierId == 2 ? 'selected' : '' }}>Sarah Williams</option>
                                <option value="3" {{ $selectedVerifierId == 3 ? 'selected' : '' }}>Emily Davis</option>
                                <option value="4" {{ $selectedVerifierId == 4 ? 'selected' : '' }}>Michael Brown</option>
                            </select>
                            <small class="form-hint">Only applicable for Verified status</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Verification Comments</label>
                            <textarea class="form-control" name="verification_comments" rows="3" placeholder="Enter verification comments" {{ $selectedStatus != 'Verified' ? 'disabled' : '' }}>
                                @php
                                    $comments = [
                                        '2' => 'Inventory adjustments have been made in the system to reflect actual quantities. Discrepancies are within acceptable range.',
                                        '6' => 'All items verified and system updated. No significant issues found.',
                                        '10' => 'Inventory counts verified and system updated. All variances documented and approved.',
                                    ];
                                    echo isset($comments[$id]) ? $comments[$id] : '';
                                @endphp
                            </textarea>
                            <small class="form-hint">Only applicable for Verified status</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inventory Items -->
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Inventory Items</h3>
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <i class="ti ti-plus"></i> Add Item
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Item Code</th>
                                <th>Item Name</th>
                                <th>Unit</th>
                                <th>System Qty</th>
                                <th>Actual Qty</th>
                                <th>Notes</th>
                                <th class="w-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            // Generate dummy items based on the type of stock opname
                            $items = [];
                            $type = $types[$id] ?? 'Full Inventory';
                            
                            if (strpos($type, 'Cement') !== false) {
                                // Cement items
                                $items = [
                                    [
                                        'code' => 'CEM-001',
                                        'name' => 'Portland Cement Type I',
                                        'unit' => 'Ton',
                                        'system_qty' => 125.5,
                                        'actual_qty' => 123.2,
                                        'notes' => 'Possible measurement error'
                                    ],
                                    [
                                        'code' => 'CEM-002',
                                        'name' => 'Portland Cement Type II',
                                        'unit' => 'Ton',
                                        'system_qty' => 85.0,
                                        'actual_qty' => 85.0,
                                        'notes' => ''
                                    ],
                                    [
                                        'code' => 'CEM-003',
                                        'name' => 'Sulphate Resistant Cement',
                                        'unit' => 'Ton',
                                        'system_qty' => 45.5,
                                        'actual_qty' => 44.8,
                                        'notes' => 'Within acceptable range'
                                    ],
                                ];
                            } elseif (strpos($type, 'Aggregates') !== false) {
                                // Aggregate items
                                $items = [
                                    [
                                        'code' => 'AGG-001',
                                        'name' => 'Fine Sand',
                                        'unit' => 'Ton',
                                        'system_qty' => 350.0,
                                        'actual_qty' => 342.5,
                                        'notes' => 'Moisture content may affect weight'
                                    ],
                                    [
                                        'code' => 'AGG-002',
                                        'name' => 'Coarse Aggregate 10mm',
                                        'unit' => 'Ton',
                                        'system_qty' => 420.0,
                                        'actual_qty' => 418.5,
                                        'notes' => 'Within acceptable range'
                                    ],
                                    [
                                        'code' => 'AGG-003',
                                        'name' => 'Coarse Aggregate 20mm',
                                        'unit' => 'Ton',
                                        'system_qty' => 380.0,
                                        'actual_qty' => 375.2,
                                        'notes' => 'Within acceptable range'
                                    ],
                                ];
                            } elseif ($type == 'Raw Materials') {
                                // Raw materials items (limited selection for edit form)
                                $items = [
                                    [
                                        'code' => 'CEM-001',
                                        'name' => 'Portland Cement Type I',
                                        'unit' => 'Ton',
                                        'system_qty' => 125.5,
                                        'actual_qty' => 123.2,
                                        'notes' => 'Possible measurement error'
                                    ],
                                    [
                                        'code' => 'AGG-001',
                                        'name' => 'Fine Sand',
                                        'unit' => 'Ton',
                                        'system_qty' => 350.0,
                                        'actual_qty' => 342.5,
                                                                                'notes' => 'Moisture content may affect weight'
                                    ],
                                    [
                                        'code' => 'ADM-001',
                                        'name' => 'Superplasticizer',
                                        'unit' => 'Liter',
                                        'system_qty' => 1200.0,
                                        'actual_qty' => 1195.0,
                                        'notes' => 'Within acceptable range'
                                    ],
                                ];
                            } elseif ($type == 'Finished Products') {
                                // Finished products items (limited selection for edit form)
                                $items = [
                                    [
                                        'code' => 'BLK-001',
                                        'name' => 'Concrete Block 10x20x40',
                                        'unit' => 'Pcs',
                                        'system_qty' => 1250,
                                        'actual_qty' => 1248,
                                        'notes' => 'Within acceptable range'
                                    ],
                                    [
                                        'code' => 'BLK-002',
                                        'name' => 'Concrete Block 15x20x40',
                                        'unit' => 'Pcs',
                                        'system_qty' => 850,
                                        'actual_qty' => 842,
                                        'notes' => 'Within acceptable range'
                                    ],
                                ];
                            } else {
                                // Full inventory - mix of categories (limited selection for edit form)
                                $items = [
                                    [
                                        'code' => 'CEM-001',
                                        'name' => 'Portland Cement Type I',
                                        'unit' => 'Ton',
                                        'system_qty' => 125.5,
                                        'actual_qty' => 123.2,
                                        'notes' => 'Possible measurement error'
                                    ],
                                    [
                                        'code' => 'AGG-001',
                                        'name' => 'Fine Sand',
                                        'unit' => 'Ton',
                                        'system_qty' => 350.0,
                                        'actual_qty' => 342.5,
                                        'notes' => 'Moisture content may affect weight'
                                    ],
                                    [
                                        'code' => 'ADM-001',
                                        'name' => 'Superplasticizer',
                                        'unit' => 'Liter',
                                        'system_qty' => 1200.0,
                                        'actual_qty' => 1195.0,
                                        'notes' => 'Within acceptable range'
                                    ],
                                ];
                            }
                            
                            // Modify items based on stock opname status
                            $status = $statuses[$id] ?? 'Completed';
                            if ($status == 'Scheduled') {
                                foreach ($items as &$item) {
                                    $item['actual_qty'] = '';
                                    $item['notes'] = '';
                                }
                            } elseif ($status == 'In Progress') {
                                // Randomly mark some items as counted and some as pending
                                foreach ($items as &$item) {
                                    if (rand(0, 1)) {
                                        $item['actual_qty'] = '';
                                        $item['notes'] = '';
                                    }
                                }
                            }
                            @endphp

                            @foreach($items as $index => $item)
                            <tr>
                                <td>
                                    <input type="hidden" name="items[{{ $index }}][code]" value="{{ $item['code'] }}">
                                    {{ $item['code'] }}
                                </td>
                                <td>
                                    <input type="hidden" name="items[{{ $index }}][name]" value="{{ $item['name'] }}">
                                    {{ $item['name'] }}
                                </td>
                                <td>
                                    <input type="hidden" name="items[{{ $index }}][unit]" value="{{ $item['unit'] }}">
                                    {{ $item['unit'] }}
                                </td>
                                <td>
                                    <input type="hidden" name="items[{{ $index }}][system_qty]" value="{{ $item['system_qty'] }}">
                                    {{ number_format($item['system_qty'], 2) }}
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" name="items[{{ $index }}][actual_qty]" value="{{ $item['actual_qty'] }}" step="0.01" {{ $status == 'Verified' ? 'readonly' : '' }}>
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm" name="items[{{ $index }}][notes]" value="{{ $item['notes'] }}" {{ $status == 'Verified' ? 'readonly' : '' }}>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-danger" {{ $status == 'Verified' ? 'disabled' : '' }}>
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex mt-4">
            <a href="{{ route('warehouse.stock-opname.detail', ['id' => $id]) }}" class="btn btn-outline-secondary me-2">
                <i class="ti ti-x"></i> Cancel
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-device-floppy"></i> Save Changes
            </button>
            
            @if($selectedStatus == 'Completed')
            <button type="submit" name="verify" value="1" class="btn btn-success ms-2">
                <i class="ti ti-clipboard-check"></i> Save & Verify
            </button>
            @endif
            
            @if($selectedStatus == 'In Progress')
            <button type="submit" name="complete" value="1" class="btn btn-info ms-2">
                <i class="ti ti-check"></i> Save & Complete
            </button>
            @endif
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle verification fields based on status
        const statusSelect = document.querySelector('select[name="status"]');
        const verifiedBySelect = document.querySelector('select[name="verified_by"]');
        const verificationComments = document.querySelector('textarea[name="verification_comments"]');
        const completionDateInput = document.querySelector('input[name="completion_date"]');
        
        statusSelect.addEventListener('change', function() {
            const isVerified = this.value === 'verified';
            const isCompleted = this.value === 'completed' || isVerified;
            
            verifiedBySelect.disabled = !isVerified;
            verificationComments.disabled = !isVerified;
            completionDateInput.disabled = !isCompleted;
            
            if (isVerified && !verifiedBySelect.value) {
                verifiedBySelect.classList.add('is-invalid');
            } else {
                verifiedBySelect.classList.remove('is-invalid');
            }
        });
    });
</script>
@endsection


