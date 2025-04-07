@extends('layouts.app')

@section('title', 'Create Stock Opname')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Create New Stock Opname
                </h2>
                <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('warehouse.stock-opname') }}">Stock Opname</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create New</li>
                </ol>
            </div>
        </div>
    </div>

    <form action="#" method="post">
        @csrf
        <!-- Basic Information -->
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Basic Information</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Stock Opname ID</label>
                            <input type="text" class="form-control" name="id" value="SO-2023-{{ str_pad(rand(11, 99), 3, '0', STR_PAD_LEFT) }}" readonly>
                            <small class="form-hint">ID is automatically generated</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Date</label>
                            <input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Warehouse</label>
                            <select class="form-select" name="warehouse" required>
                                <option value="">Select Warehouse</option>
                                <option value="1" selected>Main Warehouse</option>
                                <option value="2">Production Warehouse</option>
                                <option value="3">Finished Goods Warehouse</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Type</label>
                            <select class="form-select" name="type" required>
                                <option value="">Select Type</option>
                                <option value="full">Full Inventory</option>
                                <option value="raw_materials">Raw Materials</option>
                                <option value="finished_products">Finished Products</option>
                                <option value="partial_cement">Partial (Cement)</option>
                                <option value="partial_aggregates">Partial (Aggregates)</option>
                                <option value="partial_admixture">Partial (Admixture)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Conducted By</label>
                            <select class="form-select" name="conducted_by" required>
                                <option value="">Select Staff</option>
                                <option value="1">John Doe</option>
                                <option value="2">Mike Johnson</option>
                                <option value="3">Robert Brown</option>
                                <option value="4">David Wilson</option>
                                <option value="5">Emily Davis</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter description or purpose of this stock opname"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Schedule Information -->
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Schedule Information</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Scheduled Date</label>
                            <input type="date" class="form-control" name="scheduled_date" value="{{ date('Y-m-d', strtotime('+1 day')) }}">
                            <small class="form-hint">Leave blank if starting immediately</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Expected Completion Date</label>
                            <input type="date" class="form-control" name="expected_completion_date" value="{{ date('Y-m-d', strtotime('+1 day')) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Team Members</label>
                            <select class="form-select" name="team_members[]" multiple>
                                <option value="1">John Doe</option>
                                <option value="2">Mike Johnson</option>
                                <option value="3">Robert Brown</option>
                                <option value="4">David Wilson</option>
                                <option value="5">Emily Davis</option>
                                <option value="6">Sarah Williams</option>
                                <option value="7">Michael Brown</option>
                                <option value="8">Jessica Taylor</option>
                            </select>
                            <small class="form-hint">Hold Ctrl to select multiple members</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Priority</label>
                            <select class="form-select" name="priority">
                                <option value="low">Low</option>
                                <option value="medium" selected>Medium</option>
                                <option value="high">High</option>
                                <option value="urgent">Urgent</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Options -->
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Additional Options</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="freeze_transactions" checked>
                                <span class="form-check-label">Freeze Inventory Transactions During Count</span>
                            </label>
                            <small class="form-hint">Prevents inventory movements during the stock opname process</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="auto_adjust">
                                <span class="form-check-label">Auto-adjust Inventory After Verification</span>
                            </label>
                            <small class="form-hint">Automatically updates system quantities after verification</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="notify_discrepancies" checked>
                                <span class="form-check-label">Notify on Significant Discrepancies</span>
                            </label>
                            <small class="form-hint">Sends alerts for items with significant variances</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Discrepancy Threshold (%)</label>
                            <input type="number" class="form-control" name="discrepancy_threshold" value="5" min="0" max="100" step="0.1">
                            <small class="form-hint">Variance percentage that triggers notifications</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex mt-4">
            <a href="{{ route('warehouse.stock-opname') }}" class="btn btn-outline-secondary me-2">
                <i class="ti ti-x"></i> Cancel
            </a>
            <button type="submit" class="btn btn-primary me-2">
                <i class="ti ti-device-floppy"></i> Save
            </button>
            <button type="submit" name="start_now" value="1" class="btn btn-success">
                <i class="ti ti-player-play"></i> Save & Start Now
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add any JavaScript functionality needed for this page
    });
</script>
@endsection
