@extends('layouts.app')

@section('title', 'Stock Opname Detail')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Stock Opname Detail
                </h2>
                <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('warehouse.stock-opname') }}">Stock Opname</a></li>
                    <li class="breadcrumb-item active" aria-current="page">SO-2023-00{{ $id }}</li>
                </ol>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-outline-primary" onclick="window.print();">
                        <i class="ti ti-printer"></i> Print
                    </a>
                    <a href="{{ route('warehouse.stock-opname.edit', ['id' => $id]) }}" class="btn btn-primary">
                        <i class="ti ti-pencil"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stock Opname Information -->
    <div class="card mb-3">
        <div class="card-header">
            <h3 class="card-title">Stock Opname Information</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Stock Opname ID</label>
                        <div class="form-control-plaintext">SO-2023-00{{ $id }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <div class="form-control-plaintext">
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
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Warehouse</label>
                        <div class="form-control-plaintext">
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
                                echo $warehouses[$id] ?? 'Main Warehouse';
                            @endphp
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <div class="form-control-plaintext">
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
                                echo $types[$id] ?? 'Full Inventory';
                            @endphp
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div class="form-control-plaintext">
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
                                $status = $statuses[$id] ?? 'Completed';
                                $statusClass = [
                                    'Scheduled' => 'bg-blue',
                                    'In Progress' => 'bg-yellow',
                                    'Completed' => 'bg-green',
                                    'Verified' => 'bg-purple'
                                ][$status];
                                echo "<span class='badge $statusClass'>$status</span>";
                            @endphp
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Conducted By</label>
                        <div class="form-control-plaintext">
                            @php
                                $conductedBy = [
                                    '1' => 'John Doe',
                                    '2' => 'Mike Johnson',
                                    '3' => 'Robert Brown',
                                    '4' => 'Assigned to: David Wilson',
                                    '5' => 'John Doe',
                                    '6' => 'Mike Johnson',
                                    '7' => 'Robert Brown',
                                    '8' => 'Assigned to: David Wilson',
                                    '9' => 'John Doe',
                                    '10' => 'Mike Johnson',
                                ];
                                echo $conductedBy[$id] ?? 'John Doe';
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stock Opname Items -->
    <div class="card mb-3">
        <div class="card-header">
            <h3 class="card-title">Inventory Items</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>Item Code</th>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Unit</th>
                            <th>System Qty</th>
                            <th>Actual Qty</th>
                            <th>Difference</th>
                            <th>Difference (%)</th>
                            <th>Status</th>
                            <th>Notes</th>
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
                                    'category' => 'Cement',
                                    'unit' => 'Ton',
                                    'system_qty' => 125.5,
                                    'actual_qty' => 123.2,
                                    'difference' => -2.3,
                                    'difference_percent' => -1.83,
                                    'status' => 'Variance',
                                    'notes' => 'Possible measurement error'
                                ],
                                [
                                    'code' => 'CEM-002',
                                    'name' => 'Portland Cement Type II',
                                    'category' => 'Cement',
                                    'unit' => 'Ton',
                                    'system_qty' => 85.0,
                                    'actual_qty' => 85.0,
                                    'difference' => 0,
                                    'difference_percent' => 0,
                                    'status' => 'Match',
                                    'notes' => ''
                                ],
                                [
                                    'code' => 'CEM-003',
                                    'name' => 'Sulphate Resistant Cement',
                                    'category' => 'Cement',
                                    'unit' => 'Ton',
                                    'system_qty' => 45.5,
                                    'actual_qty' => 44.8,
                                    'difference' => -0.7,
                                    'difference_percent' => -1.54,
                                    'status' => 'Variance',
                                    'notes' => 'Within acceptable range'
                                ],
                            ];
                        } elseif (strpos($type, 'Aggregates') !== false) {
                            // Aggregate items
                            $items = [
                                [
                                    'code' => 'AGG-001',
                                    'name' => 'Fine Sand',
                                    'category' => 'Aggregates',
                                    'unit' => 'Ton',
                                    'system_qty' => 350.0,
                                    'actual_qty' => 342.5,
                                    'difference' => -7.5,
                                    'difference_percent' => -2.14,
                                    'status' => 'Variance',
                                    'notes' => 'Moisture content may affect weight'
                                ],
                                [
                                    'code' => 'AGG-002',
                                    'name' => 'Coarse Aggregate 10mm',
                                    'category' => 'Aggregates',
                                    'unit' => 'Ton',
                                    'system_qty' => 420.0,
                                    'actual_qty' => 418.5,
                                    'difference' => -1.5,
                                    'difference_percent' => -0.36,
                                    'status' => 'Match',
                                    'notes' => 'Within acceptable range'
                                ],
                                [
                                    'code' => 'AGG-003',
                                    'name' => 'Coarse Aggregate 20mm',
                                    'category' => 'Aggregates',
                                    'unit' => 'Ton',
                                    'system_qty' => 380.0,
                                    'actual_qty' => 375.2,
                                    'difference' => -4.8,
                                    'difference_percent' => -1.26,
                                    'status' => 'Variance',
                                    'notes' => 'Within acceptable range'
                                ],
                            ];
                        } elseif ($type == 'Raw Materials') {
                            // Raw materials items
                            $items = [
                                [
                                    'code' => 'CEM-001',
                                    'name' => 'Portland Cement Type I',
                                    'category' => 'Cement',
                                    'unit' => 'Ton',
                                    'system_qty' => 125.5,
                                    'actual_qty' => 123.2,
                                    'difference' => -2.3,
                                    'difference_percent' => -1.83,
                                    'status' => 'Variance',
                                    'notes' => 'Possible measurement error'
                                ],
                                [
                                    'code' => 'AGG-001',
                                    'name' => 'Fine Sand',
                                    'category' => 'Aggregates',
                                    'unit' => 'Ton',
                                    'system_qty' => 350.0,
                                    'actual_qty' => 342.5,
                                    'difference' => -7.5,
                                    'difference_percent' => -2.14,
                                    'status' => 'Variance',
                                    'notes' => 'Moisture content may affect weight'
                                ],
                                [
                                    'code' => 'ADM-001',
                                    'name' => 'Superplasticizer',
                                    'category' => 'Admixture',
                                    'unit' => 'Liter',
                                    'system_qty' => 1200.0,
                                    'actual_qty' => 1195.0,
                                    'difference' => -5.0,
                                    'difference_percent' => -0.42,
                                    'status' => 'Match',
                                    'notes' => 'Within acceptable range'
                                ],
                                [
                                    'code' => 'ADM-002',
                                    'name' => 'Retarder',
                                    'category' => 'Admixture',
                                    'unit' => 'Liter',
                                    'system_qty' => 850.0,
                                    'actual_qty' => 848.0,
                                    'difference' => -2.0,
                                    'difference_percent' => -0.24,
                                                                        'status' => 'Match',
                                    'notes' => 'Within acceptable range'
                                ],
                                [
                                    'code' => 'FLY-001',
                                    'name' => 'Fly Ash',
                                    'category' => 'Supplementary Materials',
                                    'unit' => 'Ton',
                                    'system_qty' => 45.0,
                                    'actual_qty' => 43.8,
                                    'difference' => -1.2,
                                    'difference_percent' => -2.67,
                                    'status' => 'Variance',
                                    'notes' => 'Investigate discrepancy'
                                ],
                            ];
                        } elseif ($type == 'Finished Products') {
                            // Finished products items
                            $items = [
                                [
                                    'code' => 'CON-K225',
                                    'name' => 'Ready Mix K225',
                                    'category' => 'Ready Mix',
                                    'unit' => 'm³',
                                    'system_qty' => 0,
                                    'actual_qty' => 0,
                                    'difference' => 0,
                                    'difference_percent' => 0,
                                    'status' => 'Match',
                                    'notes' => 'No inventory held'
                                ],
                                [
                                    'code' => 'CON-K250',
                                    'name' => 'Ready Mix K250',
                                    'category' => 'Ready Mix',
                                    'unit' => 'm³',
                                    'system_qty' => 0,
                                    'actual_qty' => 0,
                                    'difference' => 0,
                                    'difference_percent' => 0,
                                    'status' => 'Match',
                                    'notes' => 'No inventory held'
                                ],
                                [
                                    'code' => 'CON-K300',
                                    'name' => 'Ready Mix K300',
                                    'category' => 'Ready Mix',
                                    'unit' => 'm³',
                                    'system_qty' => 0,
                                    'actual_qty' => 0,
                                    'difference' => 0,
                                    'difference_percent' => 0,
                                    'status' => 'Match',
                                    'notes' => 'No inventory held'
                                ],
                                [
                                    'code' => 'BLK-001',
                                    'name' => 'Concrete Block 10x20x40',
                                    'category' => 'Precast',
                                    'unit' => 'Pcs',
                                    'system_qty' => 1250,
                                    'actual_qty' => 1248,
                                    'difference' => -2,
                                    'difference_percent' => -0.16,
                                    'status' => 'Match',
                                    'notes' => 'Within acceptable range'
                                ],
                                [
                                    'code' => 'BLK-002',
                                    'name' => 'Concrete Block 15x20x40',
                                    'category' => 'Precast',
                                    'unit' => 'Pcs',
                                    'system_qty' => 850,
                                    'actual_qty' => 842,
                                    'difference' => -8,
                                    'difference_percent' => -0.94,
                                    'status' => 'Match',
                                    'notes' => 'Within acceptable range'
                                ],
                            ];
                        } else {
                            // Full inventory - mix of all categories
                            $items = [
                                [
                                    'code' => 'CEM-001',
                                    'name' => 'Portland Cement Type I',
                                    'category' => 'Cement',
                                    'unit' => 'Ton',
                                    'system_qty' => 125.5,
                                    'actual_qty' => 123.2,
                                    'difference' => -2.3,
                                    'difference_percent' => -1.83,
                                    'status' => 'Variance',
                                    'notes' => 'Possible measurement error'
                                ],
                                [
                                    'code' => 'CEM-002',
                                    'name' => 'Portland Cement Type II',
                                    'category' => 'Cement',
                                    'unit' => 'Ton',
                                    'system_qty' => 85.0,
                                    'actual_qty' => 85.0,
                                    'difference' => 0,
                                    'difference_percent' => 0,
                                    'status' => 'Match',
                                    'notes' => ''
                                ],
                                [
                                    'code' => 'AGG-001',
                                    'name' => 'Fine Sand',
                                    'category' => 'Aggregates',
                                    'unit' => 'Ton',
                                    'system_qty' => 350.0,
                                    'actual_qty' => 342.5,
                                    'difference' => -7.5,
                                    'difference_percent' => -2.14,
                                    'status' => 'Variance',
                                    'notes' => 'Moisture content may affect weight'
                                ],
                                [
                                    'code' => 'AGG-002',
                                    'name' => 'Coarse Aggregate 10mm',
                                    'category' => 'Aggregates',
                                    'unit' => 'Ton',
                                    'system_qty' => 420.0,
                                    'actual_qty' => 418.5,
                                    'difference' => -1.5,
                                    'difference_percent' => -0.36,
                                    'status' => 'Match',
                                    'notes' => 'Within acceptable range'
                                ],
                                [
                                    'code' => 'ADM-001',
                                    'name' => 'Superplasticizer',
                                    'category' => 'Admixture',
                                    'unit' => 'Liter',
                                    'system_qty' => 1200.0,
                                    'actual_qty' => 1195.0,
                                    'difference' => -5.0,
                                    'difference_percent' => -0.42,
                                    'status' => 'Match',
                                    'notes' => 'Within acceptable range'
                                ],
                                [
                                    'code' => 'FLY-001',
                                    'name' => 'Fly Ash',
                                    'category' => 'Supplementary Materials',
                                    'unit' => 'Ton',
                                    'system_qty' => 45.0,
                                    'actual_qty' => 43.8,
                                    'difference' => -1.2,
                                    'difference_percent' => -2.67,
                                    'status' => 'Variance',
                                    'notes' => 'Investigate discrepancy'
                                ],
                                [
                                    'code' => 'BLK-001',
                                    'name' => 'Concrete Block 10x20x40',
                                    'category' => 'Precast',
                                    'unit' => 'Pcs',
                                    'system_qty' => 1250,
                                    'actual_qty' => 1248,
                                    'difference' => -2,
                                    'difference_percent' => -0.16,
                                    'status' => 'Match',
                                    'notes' => 'Within acceptable range'
                                ],
                            ];
                        }
                        
                        // Add status based on stock opname status
                        $status = $statuses[$id] ?? 'Completed';
                        if ($status == 'Scheduled' || $status == 'In Progress') {
                            foreach ($items as &$item) {
                                if ($status == 'Scheduled') {
                                    $item['actual_qty'] = '-';
                                    $item['difference'] = '-';
                                    $item['difference_percent'] = '-';
                                    $item['status'] = 'Pending';
                                    $item['notes'] = '';
                                } elseif ($status == 'In Progress') {
                                    // Randomly mark some items as counted and some as pending
                                    if (rand(0, 1)) {
                                        $item['status'] = 'Pending';
                                        $item['actual_qty'] = '-';
                                        $item['difference'] = '-';
                                        $item['difference_percent'] = '-';
                                        $item['notes'] = '';
                                    }
                                }
                            }
                        }
                        @endphp

                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item['code'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['category'] }}</td>
                            <td>{{ $item['unit'] }}</td>
                            <td>{{ is_numeric($item['system_qty']) ? number_format($item['system_qty'], 2) : $item['system_qty'] }}</td>
                            <td>{{ is_numeric($item['actual_qty']) ? number_format($item['actual_qty'], 2) : $item['actual_qty'] }}</td>
                            <td>
                                @if(is_numeric($item['difference']))
                                    <span class="{{ $item['difference'] < 0 ? 'text-danger' : ($item['difference'] > 0 ? 'text-success' : '') }}">
                                        {{ number_format($item['difference'], 2) }}
                                    </span>
                                @else
                                    {{ $item['difference'] }}
                                @endif
                            </td>
                            <td>
                                @if(is_numeric($item['difference_percent']))
                                    <span class="{{ $item['difference_percent'] < 0 ? 'text-danger' : ($item['difference_percent'] > 0 ? 'text-success' : '') }}">
                                        {{ number_format($item['difference_percent'], 2) }}%
                                    </span>
                                @else
                                    {{ $item['difference_percent'] }}
                                @endif
                            </td>
                            <td>
                                @php
                                $itemStatusClass = [
                                    'Match' => 'bg-green',
                                    'Variance' => 'bg-yellow',
                                    'Pending' => 'bg-blue',
                                    'Missing' => 'bg-red',
                                    'Excess' => 'bg-purple'
                                ][$item['status']];
                                @endphp
                                <span class="badge {{ $itemStatusClass }}">{{ $item['status'] }}</span>
                            </td>
                            <td>{{ $item['notes'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Summary and Verification -->
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">Summary</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Total Items Checked</label>
                        <div class="form-control-plaintext">{{ count($items) }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Items with Variance</label>
                        <div class="form-control-plaintext">
                            @php
                                $varianceCount = 0;
                                foreach ($items as $item) {
                                    if ($item['status'] == 'Variance') {
                                        $varianceCount++;
                                    }
                                }
                                echo $varianceCount;
                            @endphp
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Average Discrepancy</label>
                        <div class="form-control-plaintext">
                            @php
                                $totalDiscrepancy = 0;
                                $discrepancyCount = 0;
                                foreach ($items as $item) {
                                    if (is_numeric($item['difference_percent'])) {
                                        $totalDiscrepancy += abs($item['difference_percent']);
                                        $discrepancyCount++;
                                    }
                                }
                                $avgDiscrepancy = $discrepancyCount > 0 ? $totalDiscrepancy / $discrepancyCount : 0;
                                echo number_format($avgDiscrepancy, 2) . '%';
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">Verification</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Verified By</label>
                        <div class="form-control-plaintext">
                            @php
                                $verifiedBy = [
                                    '1' => 'Jane Smith',
                                    '2' => 'Sarah Williams',
                                    '5' => 'Emily Davis',
                                    '6' => 'Michael Brown',
                                    '9' => 'Jane Smith',
                                    '10' => 'Sarah Williams',
                                ];
                                echo isset($verifiedBy[$id]) ? $verifiedBy[$id] : 'Not verified yet';
                            @endphp
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Verification Date</label>
                        <div class="form-control-plaintext">
                            @php
                                $verificationDates = [
                                    '1' => '2023-11-16',
                                    '2' => '2023-11-21',
                                    '5' => '2023-12-06',
                                    '6' => '2023-12-07',
                                    '9' => '2023-12-10',
                                    '10' => '2023-12-11',
                                ];
                                echo isset($verificationDates[$id]) ? $verificationDates[$id] : '-';
                            @endphp
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comments</label>
                        <div class="form-control-plaintext">
                            @php
                                $comments = [
                                    '1' => 'All discrepancies are within acceptable range. No further action required.',
                                                                        '2' => 'Inventory adjustments have been made in the system to reflect actual quantities. Discrepancies are within acceptable range.',
                                    '5' => 'Minor discrepancies noted. Inventory adjusted accordingly.',
                                    '6' => 'All items verified and system updated. No significant issues found.',
                                    '9' => 'Discrepancies in cement inventory require investigation. Follow-up with supplier recommended.',
                                    '10' => 'Inventory counts verified and system updated. All variances documented and approved.',
                                ];
                                echo isset($comments[$id]) ? $comments[$id] : '-';
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="d-flex mt-4">
        <a href="{{ route('warehouse.stock-opname') }}" class="btn btn-outline-secondary me-2">
            <i class="ti ti-arrow-left"></i> Back to List
        </a>
        
        @php
            $status = $statuses[$id] ?? 'Completed';
        @endphp
        
        @if($status == 'In Progress')
        <button class="btn btn-primary me-2">
            <i class="ti ti-check"></i> Complete Count
        </button>
        @elseif($status == 'Completed')
        <button class="btn btn-success me-2">
            <i class="ti ti-clipboard-check"></i> Verify
        </button>
        <button class="btn btn-warning me-2">
            <i class="ti ti-adjustments"></i> Adjust Inventory
        </button>
        @endif
        
        @if($status != 'Verified')
        <button class="btn btn-danger ms-auto">
            <i class="ti ti-trash"></i> Delete
        </button>
        @endif
    </div>
</div>
@endsection

