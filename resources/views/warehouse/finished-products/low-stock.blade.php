@extends('layouts.app')

@section('title', 'Low Stock Alert')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Low Stock Alert
                </h2>
                <div class="text-muted mt-1">Monitor finished products with low stock levels</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('warehouse.finished-products') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to Inventory
                    </a>
                    <a href="#" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-file-export"></i>
                        Export
                    </a>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-send-notification">
                        <i class="ti ti-mail"></i>
                        Send Notification
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-red text-white avatar">
                                    <i class="ti ti-alert-triangle"></i>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    5 Products
                                </div>
                                <div class="text-muted">
                                    Critical Stock Level
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-yellow text-white avatar">
                                    <i class="ti ti-alert-circle"></i>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    8 Products
                                </div>
                                <div class="text-muted">
                                    Low Stock Level
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-green text-white avatar">
                                    <i class="ti ti-check"></i>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    12 Products
                                </div>
                                <div class="text-muted">
                                    Adequate Stock Level
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-blue text-white avatar">
                                    <i class="ti ti-truck-delivery"></i>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    3 Products
                                </div>
                                <div class="text-muted">
                                    Pending Restock
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Low Stock Products</h3>
                <div class="card-actions">
                    <div class="row g-2">
                        <div class="col-auto">
                            <select class="form-select" id="filter-status">
                                <option value="">All Status</option>
                                <option value="Critical">Critical</option>
                                <option value="Low">Low</option>
                                <option value="Pending">Pending Restock</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select class="form-select" id="filter-product-type">
                                <option value="">All Product Types</option>
                                <option value="Ready Mix">Ready Mix</option>
                                <option value="Precast">Precast</option>
                                <option value="Concrete Block">Concrete Block</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Search..." id="search-input">
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
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Type</th>
                                <th>Current Stock</th>
                                <th>Minimum Level</th>
                                <th>Reorder Point</th>
                                <th>Status</th>
                                <th>Last Restocked</th>
                                <th class="w-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $lowStockProducts = [
                                [
                                    'id' => 1,
                                    'code' => 'RM-K225-001',
                                    'name' => 'Ready Mix K225',
                                    'type' => 'Ready Mix',
                                    'current_stock' => 45,
                                    'min_stock' => 50,
                                    'reorder_point' => 75,
                                    'unit' => 'm³',
                                    'status' => 'Critical',
                                    'last_restocked' => '2023-10-10',
                                    'pending_restock' => false
                                ],
                                [
                                    'id' => 2,
                                    'code' => 'RM-K300-002',
                                    'name' => 'Ready Mix K300',
                                    'type' => 'Ready Mix',
                                    'current_stock' => 65,
                                    'min_stock' => 40,
                                    'reorder_point' => 60,
                                    'unit' => 'm³',
                                    'status' => 'Low',
                                    'last_restocked' => '2023-10-12',
                                    'pending_restock' => true
                                ],
                                [
                                    'id' => 3,
                                    'code' => 'RM-K350-003',
                                    'name' => 'Ready Mix K350',
                                    'type' => 'Ready Mix',
                                    'current_stock' => 30,
                                    'min_stock' => 35,
                                    'reorder_point' => 50,
                                    'unit' => 'm³',
                                    'status' => 'Critical',
                                    'last_restocked' => '2023-10-08',
                                    'pending_restock' => true
                                ],
                                [
                                    'id' => 4,
                                    'code' => 'PC-K300-001',
                                    'name' => 'Precast Panel K300',
                                    'type' => 'Precast',
                                    'current_stock' => 15,
                                    'min_stock' => 20,
                                    'reorder_point' => 30,
                                    'unit' => 'pcs',
                                    'status' => 'Critical',
                                    'last_restocked' => '2023-10-05',
                                    'pending_restock' => false
                                ],
                                [
                                    'id' => 5,
                                    'code' => 'CB-K175-001',
                                    'name' => 'Concrete Block K175',
                                    'type' => 'Concrete Block',
                                    'current_stock' => 850,
                                    'min_stock' => 800,
                                    'reorder_point' => 1000,
                                    'unit' => 'pcs',
                                    'status' => 'Low',
                                    'last_restocked' => '2023-10-15',
                                    'pending_restock' => false
                                ]
                            ];
                            @endphp

                            @foreach($lowStockProducts as $product)
                            <tr>
                                <td>{{ $product['code'] }}</td>
                                <td>
                                    <a href="{{ route('warehouse.finished-products.detail', $product['id']) }}">
                                        {{ $product['name'] }}
                                    </a>
                                </td>
                                <td>{{ $product['type'] }}</td>
                                <td>
                                    <span class="{{ $product['status'] == 'Critical' ? 'text-danger' : 'text-warning' }}">
                                        {{ $product['current_stock'] }} {{ $product['unit'] }}
                                    </span>
                                </td>
                                <td>{{ $product['min_stock'] }} {{ $product['unit'] }}</td>
                                <td>{{ $product['reorder_point'] }} {{ $product['unit'] }}</td>
                                <td>
                                    @if($product['status'] == 'Critical')
                                    <span class="badge bg-red">Critical</span>
                                    @elseif($product['status'] == 'Low')
                                    <span class="badge bg-yellow">Low</span>
                                    @endif
                                    
                                    @if($product['pending_restock'])
                                    <span class="badge bg-azure">Pending Restock</span>
                                    @endif
                                </td>
                                <td>{{ $product['last_restocked'] }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="{{ route('warehouse.finished-products.detail', $product['id']) }}" class="dropdown-item">
                                                View Details
                                            </a>
                                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-restock" data-id="{{ $product['id'] }}">
                                                Schedule Restock
                                            </a>
                                            <a href="#" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#modal-adjust-threshold" data-id="{{ $product['id'] }}">
                                                Adjust Thresholds
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Restock Schedule</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Scheduled Date</th>
                                <th>Quantity</th>
                                <th>Production Plant</th>
                                <th>Status</th>
                                <th>Notes</th>
                                <th class="w-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $restockSchedules = [
                                [
                                    'id' => 1,
                                    'product' => 'Ready Mix K300',
                                    'scheduled_date' => '2023-10-22',
                                    'quantity' => '100 m³',
                                    'plant' => 'Plant B',
                                    'status' => 'Scheduled',
                                    'notes' => 'Regular production batch'
                                ],
                                [
                                    'id' => 2,
                                    'product' => 'Ready Mix K350',
                                    'scheduled_date' => '2023-10-21',
                                    'quantity' => '80 m³',
                                    'plant' => 'Plant A',
                                    'status' => 'In Progress',
                                    'notes' => 'Priority production'
                                ],
                                [
                                    'id' => 3,
                                    'product' => 'Precast Panel K300',
                                    'scheduled_date' => '2023-10-25',
                                    'quantity' => '30 pcs',
                                    'plant' => 'Plant C',
                                    'status' => 'Scheduled',
                                    'notes' => 'Waiting for raw materials'
                                ]
                            ];
                            @endphp

                            @foreach($restockSchedules as $schedule)
                            <tr>
                                <td>{{ $schedule['product'] }}</td>
                                <td>{{ $schedule['scheduled_date'] }}</td>
                                <td>{{ $schedule['quantity'] }}</td>
                                <td>{{ $schedule['plant'] }}</td>
                                <td>
                                    @if($schedule['status'] == 'Scheduled')
                                    <span class="badge bg-blue">Scheduled</span>
                                    @elseif($schedule['status'] == 'In Progress')
                                    <span class="badge bg-green">In Progress</span>
                                    @endif
                                </td>
                                <td>{{ $schedule['notes'] }}</td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-edit-schedule" data-id="{{ $schedule['id'] }}">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-cancel-schedule" data-id="{{ $schedule['id'] }}">
                                            <i class="ti ti-x"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Schedule Restock Modal -->
<div class="modal modal-blur fade" id="modal-restock" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schedule Restock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="restock-form">
                    <input type="hidden" name="product_id" id="restock-product-id">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Product</label>
                                <input type="text" class="form-control" id="restock-product-name" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Current Stock</label>
                                <input type="text" class="form-control" id="restock-current-stock" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Scheduled Date</label>
                                <input type="date" class="form-control" name="scheduled_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Quantity to Produce</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="quantity" required>
                                    <span class="input-group-text" id="restock-unit">m³</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Production Plant</label>
                                <select class="form-select" name="plant" required>
                                    <option value="">Select plant</option>
                                    <option value="Plant A">Plant A</option>
                                    <option value="Plant B">Plant B</option>
                                    <option value="Plant C">Plant C</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Priority</label>
                                <select class="form-select" name="priority" required>
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                    <option value="Urgent">Urgent</option>
                                </select>
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
                <button type="button" class="btn btn-primary ms-auto" id="save-restock">
                    <i class="ti ti-calendar-plus"></i>
                    Schedule Restock
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Adjust Threshold Modal -->
<div class="modal modal-blur fade" id="modal-adjust-threshold" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adjust Stock Thresholds</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="threshold-form">
                    <input type="hidden" name="product_id" id="threshold-product-id">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Product</label>
                                <input type="text" class="form-control" id="threshold-product-name" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Current Stock</label>
                                <input type="text" class="form-control" id="threshold-current-stock" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Minimum Stock Level</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="min_stock" id="threshold-min-stock" required>
                                    <span class="input-group-text" id="threshold-unit-1">m³</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Maximum Stock Level</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="max_stock" id="threshold-max-stock" required>
                                    <span class="input-group-text" id="threshold-unit-2">m³</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Reorder Point</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="reorder_point" id="threshold-reorder-point" required>
                                    <span class="input-group-text" id="threshold-unit-3">m³</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reason for Adjustment</label>
                        <textarea class="form-control" name="reason" rows="3" placeholder="Enter reason for adjustment"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary ms-auto" id="save-threshold">
                    <i class="ti ti-device-floppy"></i>
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Send Notification Modal -->
<div class="modal modal-blur fade" id="modal-send-notification" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Low Stock Notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="notification-form">
                    <div class="mb-3">
                        <label class="form-label required">Recipients</label>
                        <select class="form-select" name="recipients[]" multiple required>
                            <option value="production_manager">Production Manager</option>
                            <option value="warehouse_manager">Warehouse Manager</option>
                            <option value="plant_operators">Plant Operators</option>
                            <option value="purchasing_department">Purchasing Department</option>
                        </select>
                        <small class="form-hint">Hold Ctrl/Cmd to select multiple recipients</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Subject</label>
                        <input type="text" class="form-control" name="subject" value="Low Stock Alert - Action Required" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Message</label>
                        <textarea class="form-control" name="message" rows="5" required>This is to notify you that the following products have reached critical or low stock levels and require immediate attention:

- Ready Mix K225: 45 m³ (Critical)
- Ready Mix K350: 30 m³ (Critical)
- Precast Panel K300: 15 pcs (Critical)

Please take necessary actions to restock these items as soon as possible to avoid production delays.

Thank you,
Warehouse Management Team</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="include_report" checked>
                            <span class="form-check-label">Include detailed stock report</span>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="urgent">
                            <span class="form-check-label">Mark as urgent</span>
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary ms-auto" id="send-notification">
                    <i class="ti ti-send"></i>
                    Send Notification
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Schedule Modal -->
<div class="modal modal-blur fade" id="modal-edit-schedule" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Restock Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-schedule-form">
                    <input type="hidden" name="schedule_id" id="edit-schedule-id">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Product</label>
                                <input type="text" class="form-control" id="edit-schedule-product" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Scheduled Date</label>
                                <input type="date" class="form-control" name="scheduled_date" id="edit-schedule-date" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Quantity</label>
                                <input type="text" class="form-control" name="quantity" id="edit-schedule-quantity" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Production Plant</label>
                                <select class="form-select" name="plant" id="edit-schedule-plant" required>
                                    <option value="Plant A">Plant A</option>
                                    <option value="Plant B">Plant B</option>
                                    <option value="Plant C">Plant C</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Status</label>
                                <select class="form-select" name="status" id="edit-schedule-status" required>
                                    <option value="Scheduled">Scheduled</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label required">Priority</label>
                                <select class="form-select" name="priority" id="edit-schedule-priority" required>
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                    <option value="Urgent">Urgent</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" name="notes" id="edit-schedule-notes" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary ms-auto" id="update-schedule">
                    <i class="ti ti-device-floppy"></i>
                    Update Schedule
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Cancel Schedule Modal -->
<div class="modal modal-blur fade" id="modal-cancel-schedule" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Are you sure?</div>
                <div>You are about to cancel this restock schedule. This action cannot be undone.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-danger ms-auto" id="confirm-cancel-schedule">
                    <i class="ti ti-trash"></i>
                    Yes, cancel schedule
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Filter by status
        document.getElementById('filter-status').addEventListener('change', function() {
            var value = this.value.toLowerCase();
            var rows = document.querySelectorAll('tbody tr');
            
            if (value === '') {
                rows.forEach(row => {
                    row.style.display = '';
                });
            } else {
                rows.forEach(row => {
                    var status = row.querySelector('td:nth-child(7)').textContent.toLowerCase();
                    if (status.includes(value)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
        });

        // Filter by product type
        document.getElementById('filter-product-type').addEventListener('change', function() {
            var value = this.value.toLowerCase();
            var rows = document.querySelectorAll('tbody tr');
            
            if (value === '') {
                rows.forEach(row => {
                    row.style.display = '';
                });
            } else {
                rows.forEach(row => {
                    var type = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                    if (type.includes(value)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
        });

        // Search functionality
        document.getElementById('search-input').addEventListener('keyup', function() {
            var value = this.value.toLowerCase();
            var rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                var text = row.textContent.toLowerCase();
                if (text.includes(value)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Schedule Restock Modal
        document.querySelectorAll('[data-bs-target="#modal-restock"]').forEach(button => {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                // In a real application, you would fetch the details from the server
                // For this example, we'll use the sample data
                var products = @json($lowStockProducts);
                var product = products.find(p => p.id == id);
                
                if (product) {
                    document.getElementById('restock-product-id').value = product.id;
                    document.getElementById('restock-product-name').value = product.name;
                    document.getElementById('restock-current-stock').value = product.current_stock + ' ' + product.unit;
                    document.getElementById('restock-unit').textContent = product.unit;
                }
            });
        });

        // Adjust Threshold Modal
        document.querySelectorAll('[data-bs-target="#modal-adjust-threshold"]').forEach(button => {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                // In a real application, you would fetch the details from the server
                // For this example, we'll use the sample data
                var products = @json($lowStockProducts);
                var product = products.find(p => p.id == id);
                
                if (product) {
                    document.getElementById('threshold-product-id').value = product.id;
                    document.getElementById('threshold-product-name').value = product.name;
                    document.getElementById('threshold-current-stock').value = product.current_stock + ' ' + product.unit;
                    document.getElementById('threshold-min-stock').value = product.min_stock;
                    document.getElementById('threshold-max-stock').value = product.min_stock * 3; // Example value
                    document.getElementById('threshold-reorder-point').value = product.reorder_point;
                    document.getElementById('threshold-unit-1').textContent = product.unit;
                    document.getElementById('threshold-unit-2').textContent = product.unit;
                    document.getElementById('threshold-unit-3').textContent = product.unit;
                }
            });
        });

        // Edit Schedule Modal
        document.querySelectorAll('[data-bs-target="#modal-edit-schedule"]').forEach(button => {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                // In a real application, you would fetch the details from the server
                // For this example, we'll use the sample data
                var schedules = @json($restockSchedules);
                var schedule = schedules.find(s => s.id == id);
                
                if (schedule) {
                    document.getElementById('edit-schedule-id').value = schedule.id;
                    document.getElementById('edit-schedule-product').value = schedule.product;
                    document.getElementById('edit-schedule-date').value = schedule.scheduled_date;
                    document.getElementById('edit-schedule-quantity').value = schedule.quantity;
                    document.getElementById('edit-schedule-plant').value = schedule.plant;
                    document.getElementById('edit-schedule-status').value = schedule.status;
                    document.getElementById('edit-schedule-notes').value = schedule.notes;
                    // Set a default priority
                    document.getElementById('edit-schedule-priority').value = 'Medium';
                }
            });
        });

        // Save restock button
        document.getElementById('save-restock').addEventListener('click', function() {
            var form = document.getElementById('restock-form');
            
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
                var productName = document.getElementById('restock-product-name').value;
                var scheduledDate = form.querySelector('[name="scheduled_date"]').value;
                var quantity = form.querySelector('[name="quantity"]').value;
                var unit = document.getElementById('restock-unit').textContent;
                
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Restock Scheduled',
                    text: `Successfully scheduled restock of ${quantity} ${unit} of ${productName} for ${scheduledDate}`,
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Close modal and reset form
                    var modal = bootstrap.Modal.getInstance(document.getElementById('modal-restock'));
                    modal.hide();
                    form.reset();
                    
                    // In a real application, you would refresh the data or add the new row to the table
                });
            }
        });

        // Save threshold button
        document.getElementById('save-threshold').addEventListener('click', function() {
            var form = document.getElementById('threshold-form');
            
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
                var productName = document.getElementById('threshold-product-name').value;
                
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Thresholds Updated',
                    text: `Successfully updated stock thresholds for ${productName}`,
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Close modal and reset form
                    var modal = bootstrap.Modal.getInstance(document.getElementById('modal-adjust-threshold'));
                    modal.hide();
                    
                    // In a real application, you would refresh the data
                });
            }
        });

        // Send notification button
        document.getElementById('send-notification').addEventListener('click', function() {
            var form = document.getElementById('notification-form');
            
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
                
                // Show success message
                Swal.fire({
                    icon: 'success',
                                       title: 'Notification Sent',
                    text: 'Low stock notification has been sent successfully to the selected recipients',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Close modal and reset form
                    var modal = bootstrap.Modal.getInstance(document.getElementById('modal-send-notification'));
                    modal.hide();
                    
                    // In a real application, you would refresh the data
                });
            }
        });

        // Update schedule button
        document.getElementById('update-schedule').addEventListener('click', function() {
            var form = document.getElementById('edit-schedule-form');
            
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
                var productName = document.getElementById('edit-schedule-product').value;
                var scheduledDate = document.getElementById('edit-schedule-date').value;
                
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Schedule Updated',
                    text: `Successfully updated restock schedule for ${productName} on ${scheduledDate}`,
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Close modal and reset form
                    var modal = bootstrap.Modal.getInstance(document.getElementById('modal-edit-schedule'));
                    modal.hide();
                    
                    // In a real application, you would refresh the data
                });
            }
        });

        // Cancel schedule button
        document.getElementById('confirm-cancel-schedule').addEventListener('click', function() {
            // In a real application, you would submit the request to the server
            // For this example, we'll just show a success message and close the modal
            
            // Show success message
            Swal.fire({
                icon: 'success',
                title: 'Schedule Cancelled',
                text: 'The restock schedule has been cancelled successfully',
                confirmButtonText: 'OK'
            }).then(() => {
                // Close modal
                var modal = bootstrap.Modal.getInstance(document.getElementById('modal-cancel-schedule'));
                modal.hide();
                
                // In a real application, you would refresh the data or remove the row from the table
            });
        });
    });
</script>
@endsection


