@extends('layouts.app')

@section('title', 'Create Production Plan')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Create Production Plan
                    </h2>
                    <div class="text-muted mt-1">Schedule new production activities</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('production.planning') }}" class="btn btn-outline-secondary">
                            <i class="ti ti-arrow-left"></i>
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <form action="#" method="post">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Plan Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Branch</label>
                                    <select class="form-select" required>
                                        <option value="">Select Branch</option>
                                        <option value="1">Jakarta Plant</option>
                                        <option value="2">Surabaya Plant</option>
                                        <option value="3">Bandung Plant</option>
                                        <option value="4">Medan Plant</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Batch Plant</label>
                                    <select class="form-select" required>
                                        <option value="">Select Batch Plant</option>
                                        <option value="1">Plant A</option>
                                        <option value="2">Plant B</option>
                                        <option value="3">Plant C</option>
                                        <option value="4">Mobile Plant</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label required">Production Date</label>
                                    <input type="date" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option value="scheduled">Scheduled</option>
                                        <option value="in-progress">In Progress</option>
                                        <option value="completed">Completed</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" rows="3"
                                    placeholder="Enter any special instructions or notes for this production plan"></textarea>
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
                                        <tr>
                                            <td>
                                                <input type="time" class="form-control" name="schedule[0][time]"
                                                    required>
                                            </td>
                                            <td>
                                                <select class="form-select" name="schedule[0][mix_design]" required>
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
                                                <input type="number" class="form-control" name="schedule[0][volume]"
                                                    min="1" required>
                                            </td>
                                            <td>
                                                <select class="form-select" name="schedule[0][customer]" required>
                                                    <option value="">Select Customer</option>
                                                    <option value="1">PT Pembangunan Jaya</option>
                                                    <option value="2">PT Wijaya Karya</option>
                                                    <option value="3">PT Adhi Karya</option>
                                                    <option value="4">PT Total Bangun Persada</option>
                                                    <option value="5">PT Hutama Karya</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-select" name="schedule[0][project]" required>
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
                                        </tr>
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
                                        <input class="form-check-input" type="checkbox" id="aggregateMoisture">
                                        <label class="form-check-label" for="aggregateMoisture">
                                            Aggregate Moisture Test
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="mixConsistency">
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
                                <textarea class="form-control" rows="2" placeholder="Enter any additional quality control requirements"></textarea>
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
                                    <option value="1">John Doe (Batch Plant Operator)</option>
                                    <option value="2">Jane Smith (Quality Control)</option>
                                    <option value="3">Robert Johnson (Loader Operator)</option>
                                    <option value="4">Michael Brown (Batch Plant Operator)</option>
                                    <option value="5">Sarah Davis (Quality Control)</option>
                                </select>
                                <small class="form-hint">Hold Ctrl/Cmd to select multiple operators</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label required">Mixer Trucks</label>
                                <select class="form-select" multiple>
                                    <option value="1">Truck #001 (8m³)</option>
                                    <option value="2">Truck #002 (8m³)</option>
                                    <option value="3">Truck #003 (8m³)</option>
                                    <option value="4">Truck #004 (6m³)</option>
                                    <option value="5">Truck #005 (6m³)</option>
                                    <option value="6">Truck #006 (10m³)</option>
                                    <option value="7">Truck #007 (10m³)</option>
                                </select>
                                <small class="form-hint">Hold Ctrl/Cmd to select multiple trucks</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Concrete Pumps</label>
                                <select class="form-select" multiple>
                                    <option value="1">Pump #001 (Stationary)</option>
                                    <option value="2">Pump #002 (Stationary)</option>
                                    <option value="3">Pump #003 (Boom 36m)</option>
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
                                <i class="ti ti-check me-2"></i> Sufficient materials available for estimated production
                                volume
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="ti ti-device-floppy me-2"></i> Save Production Plan
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
            let rowIndex = 0;

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

            // Remove row event for initial row
            document.querySelector('.remove-row').addEventListener('click', function() {
                if (document.querySelectorAll('#scheduleTable tbody tr').length > 1) {
                    this.closest('tr').remove();
                } else {
                    alert('At least one schedule item is required');
                }
            });
        });
    </script>
@endsection
