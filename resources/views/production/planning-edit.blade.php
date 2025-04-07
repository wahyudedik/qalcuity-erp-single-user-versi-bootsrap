@extends('layouts.app')

@section('title', 'Edit Production Plan')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Production Plan
                </h2>
                <div class="text-muted mt-1">Plan ID: PP-{{ str_pad($id, 5, '0', STR_PAD_LEFT) }}</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.planning.detail', $id) }}" class="btn btn-outline-secondary">
                        <i class="ti ti-arrow-left"></i>
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>

    <form action="#" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Plan Details</h3>
                    </div>
                    <div class="card-body">
                        @php
                        $branches = ['Jakarta Plant', 'Surabaya Plant', 'Bandung Plant', 'Medan Plant'];
                        $batchPlants = ['Plant A', 'Plant B', 'Plant C', 'Mobile Plant'];
                        $statuses = ['Scheduled', 'In Progress', 'Completed', 'Cancelled'];
                        
                        $branch = $branches[array_rand($branches)];
                        $batchPlant = $batchPlants[array_rand($batchPlants)];
                        $status = $statuses[array_rand($statuses)];
                        $date = date('Y-m-d', strtotime("+".rand(1,10)." days"));
                        @endphp
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label required">Branch</label>
                                <select class="form-select" required>
                                    <option value="">Select Branch</option>
                                    @foreach($branches as $index => $branchOption)
                                    <option value="{{ $index+1 }}" {{ $branch == $branchOption ? 'selected' : '' }}>{{ $branchOption }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label required">Batch Plant</label>
                                <select class="form-select" required>
                                    <option value="">Select Batch Plant</option>
                                    @foreach($batchPlants as $index => $plantOption)
                                    <option value="{{ $index+1 }}" {{ $batchPlant == $plantOption ? 'selected' : '' }}>{{ $plantOption }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label required">Production Date</label>
                                <input type="date" class="form-control" value="{{ $date }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <select class="form-select">
                                    @foreach($statuses as $statusOption)
                                    <option value="{{ strtolower($statusOption) }}" {{ $status == $statusOption ? 'selected' : '' }}>{{ $statusOption }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                                               <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" rows="3" placeholder="Enter any special instructions or notes for this production plan">Production plan for {{ $date }}. Special attention to high-strength concrete batches scheduled for the morning. Ensure adequate supply of admixtures for hot weather conditions.</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Production Schedule</h3>
                        <button type="button" class="btn btn-sm btn-primary" id="addScheduleItem">
                            <i class="ti ti-plus"></i> Add Time Slot
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table" id="scheduleTable">
                                <thead>
                                    <tr>
                                        <th>Time Slot</th>
                                        <th>Mix Design</th>
                                        <th>Volume (m³)</th>
                                        <th>Customer</th>
                                        <th>Project</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $mixDesigns = ['K-225', 'K-250', 'K-300', 'K-350', 'K-400', 'K-450', 'K-500'];
                                    $customers = ['PT Pembangunan Jaya', 'PT Wijaya Karya', 'PT Adhi Karya', 'PT Total Bangun Persada', 'PT Hutama Karya'];
                                    $projects = ['Apartment Tower', 'Office Building', 'Highway Project', 'Bridge Construction', 'Shopping Mall', 'Industrial Complex'];
                                    
                                    $startTime = strtotime('07:00');
                                    for ($i = 0; $i < 5; $i++) {
                                        $timeSlot = date('H:i', $startTime);
                                        $startTime += 3600;
                                        $mixDesign = $mixDesigns[array_rand($mixDesigns)];
                                        $volume = rand(10, 50);
                                        $customer = $customers[array_rand($customers)];
                                        $customerIndex = array_search($customer, $customers) + 1;
                                        $project = $projects[array_rand($projects)];
                                        $projectIndex = array_search($project, $projects) + 1;
                                    @endphp
                                    <tr>
                                        <td>
                                            <input type="time" class="form-control" name="schedule[{{ $i }}][time]" value="{{ $timeSlot }}" required>
                                        </td>
                                        <td>
                                            <select class="form-select" name="schedule[{{ $i }}][mix_design]" required>
                                                <option value="">Select Mix</option>
                                                @foreach($mixDesigns as $mix)
                                                <option value="{{ $mix }}" {{ $mixDesign == $mix ? 'selected' : '' }}>{{ $mix }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="schedule[{{ $i }}][volume]" value="{{ $volume }}" min="1" required>
                                        </td>
                                        <td>
                                            <select class="form-select" name="schedule[{{ $i }}][customer]" required>
                                                <option value="">Select Customer</option>
                                                @foreach($customers as $index => $customerOption)
                                                <option value="{{ $index+1 }}" {{ $customer == $customerOption ? 'selected' : '' }}>{{ $customerOption }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select" name="schedule[{{ $i }}][project]" required>
                                                <option value="">Select Project</option>
                                                @foreach($projects as $index => $projectOption)
                                                <option value="{{ $index+1 }}" {{ $project == $projectOption ? 'selected' : '' }}>{{ $projectOption }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger remove-row">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @php
                                    }
                                    @endphp
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Quality Control Requirements</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="slumpTest" checked>
                                    <label class="form-check-label" for="slumpTest">
                                        Slump Test
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="temperatureCheck" checked>
                                    <label class="form-check-label" for="temperatureCheck">
                                        Temperature Check
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="compressionTest" checked>
                                    <label class="form-check-label" for="compressionTest">
                                        Compression Test Sample
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="aggregateMoisture" checked>
                                    <label class="form-check-label" for="aggregateMoisture">
                                        Aggregate Moisture Test
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="mixConsistency" checked>
                                    <label class="form-check-label" for="mixConsistency">
                                        Mix Consistency Check
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="waterCementRatio">
                                    <label class="form-check-label" for="waterCementRatio">
                                        Water-Cement Ratio Check
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Additional Quality Requirements</label>
                            <textarea class="form-control" rows="2" placeholder="Enter any additional quality control requirements">Perform additional slump tests for high-strength concrete mixes. Monitor temperature closely due to hot weather forecast.</textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Resource Allocation</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">Operators</label>
                            <select class="form-select" multiple>
                                <option value="1" selected>John Doe (Batch Plant Operator)</option>
                                <option value="2" selected>Jane Smith (Quality Control)</option>
                                <option value="3">Robert Johnson (Loader Operator)</option>
                                <option value="4" selected>Michael Brown (Batch Plant Operator)</option>
                                <option value="5">Sarah Davis (Quality Control)</option>
                            </select>
                            <small class="form-hint">Hold Ctrl/Cmd to select multiple operators</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label required">Mixer Trucks</label>
                            <select class="form-select" multiple>
                                <option value="1" selected>Truck #001 (8m³)</option>
                                <option value="2" selected>Truck #002 (8m³)</option>
                                <option value="3" selected>Truck #003 (8m³)</option>
                                <option value="4">Truck #004 (6m³)</option>
                                <option value="5" selected>Truck #005 (6m³)</option>
                                <option value="6">Truck #006 (10m³)</option>
                                <option value="7">Truck #007 (10m³)</option>
                            </select>
                            <small class="form-hint">Hold Ctrl/Cmd to select multiple trucks</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Concrete Pumps</label>
                            <select class="form-select" multiple>
                                <option value="1" selected>Pump #001 (Stationary)</option>
                                <option value="2">Pump #002 (Stationary)</option>
                                <option value="3" selected>Pump #003 (Boom 36m)</option>
                                <option value="4">Pump #004 (Boom 42m)</option>
                            </select>
                            <small class="form-hint">Hold Ctrl/Cmd to select multiple pumps</small>
                        </div>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Raw Material Verification</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Cement Stock</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="120" readonly>
                                <span class="input-group-text">tons</span>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Sand Stock</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="350" readonly>
                                <span class="input-group-text">tons</span>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Aggregate Stock</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="480" readonly>
                                <span class="input-group-text">tons</span>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Fly Ash Stock</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="75" readonly>
                                <span class="input-group-text">tons</span>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Admixture Stock</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="1200" readonly>
                                <span class="input-group-text">liters</span>
                            </div>
                        </div>
                        
                        <div class="alert alert-success" role="alert">
                            <i class="ti ti-check me-2"></i> Sufficient materials available for estimated production volume
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="ti ti-device-floppy me-2"></i> Update Production Plan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let rowIndex = 4; // Starting from 5 as we already have 5 rows
        
        // Add new schedule row
        document.getElementById('addScheduleItem').addEventListener('click', function() {
            rowIndex++;
            const tbody = document.querySelector('#scheduleTable tbody');
            const newRow = document.createElement('tr');
            
            newRow.innerHTML = `
                <td>
                    <input type="time" class="form-control" name="schedule[${rowIndex}][time]" required>
                </td>
                <td>
                    <select class="form-select" name="schedule[${rowIndex}][mix_design]" required>
                        <option value="">Select Mix</option>
                        <option value="K-225">K-225</option>
                        <option value="K-250">K-250</option>
                        <option value="K-300">K-300</option>
                        <option value="K-350">K-350</option>
                        <option value="K-400">K-400</option>
                        <option value="K-450">K-450</option>
                        <option value="K-500">K-500</option>
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control" name="schedule[${rowIndex}][volume]" min="1" required>
                </td>
                <td>
                    <select class="form-select" name="schedule[${rowIndex}][customer]" required>
                        <option value="">Select Customer</option>
                        <option value="1">PT Pembangunan Jaya</option>
                        <option value="2">PT Wijaya Karya</option>
                        <option value="3">PT Adhi Karya</option>
                        <option value="4">PT Total Bangun Persada</option>
                        <option value="5">PT Hutama Karya</option>
                    </select>
                </td>
                <td>
                    <select class="form-select" name="schedule[${rowIndex}][project]" required>
                        <option value="">Select Project</option>
                                                <option value="1">Apartment Tower</option>
                        <option value="2">Office Building</option>
                        <option value="3">Highway Project</option>
                        <option value="4">Bridge Construction</option>
                        <option value="5">Shopping Mall</option>
                    </select>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger remove-row">
                        <i class="ti ti-trash"></i>
                    </button>
                </td>
            `;
            
            tbody.appendChild(newRow);
            
            // Add event listener to the new remove button
            newRow.querySelector('.remove-row').addEventListener('click', function() {
                this.closest('tr').remove();
            });
        });
        
        // Remove row event for existing rows
        document.querySelectorAll('.remove-row').forEach(button => {
            button.addEventListener('click', function() {
                if (document.querySelectorAll('#scheduleTable tbody tr').length > 1) {
                    this.closest('tr').remove();
                } else {
                    alert('At least one schedule item is required');
                }
            });
        });
    });
</script>
@endsection


