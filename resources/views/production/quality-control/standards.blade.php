@extends('layouts.app')

@section('title', 'Quality Control Standards')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Quality Control Standards
                </h2>
                <div class="text-muted mt-1">Manage quality standards and specifications</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                                        <a href="{{ route('production.quality-control') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left me-2"></i>
                        Back to Quality Control
                    </a>
                    <button type="button" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#addStandardModal">
                        <i class="ti ti-plus me-2"></i>
                        Add New Standard
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Quality Standards</h3>
                <div class="card-actions">
                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-select" id="filterCategory">
                                <option value="">All Categories</option>
                                <option value="slump">Slump Test</option>
                                <option value="compression">Compression Test</option>
                                <option value="air-content">Air Content</option>
                                <option value="temperature">Temperature</option>
                                <option value="unit-weight">Unit Weight</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" id="filterStatus">
                                <option value="">All Statuses</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Standard ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Min Value</th>
                                <th>Max Value</th>
                                <th>Unit</th>
                                <th>Reference</th>
                                <th>Status</th>
                                <th class="w-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $standards = [
                                [
                                    'id' => 'STD001',
                                    'name' => 'Slump for General Concrete',
                                    'category' => 'Slump Test',
                                    'min' => '7.5',
                                    'max' => '12.5',
                                    'unit' => 'cm',
                                    'reference' => 'SNI 1972:2008',
                                    'status' => 'active'
                                ],
                                [
                                    'id' => 'STD002',
                                    'name' => 'Slump for Pumped Concrete',
                                    'category' => 'Slump Test',
                                    'min' => '10.0',
                                    'max' => '15.0',
                                    'unit' => 'cm',
                                    'reference' => 'SNI 1972:2008',
                                    'status' => 'active'
                                ],
                                [
                                    'id' => 'STD003',
                                    'name' => 'K-225 Compressive Strength',
                                    'category' => 'Compression Test',
                                    'min' => '22.5',
                                    'max' => '',
                                    'unit' => 'MPa',
                                    'reference' => 'SNI 1974:2011',
                                    'status' => 'active'
                                ],
                                [
                                    'id' => 'STD004',
                                    'name' => 'K-250 Compressive Strength',
                                    'category' => 'Compression Test',
                                    'min' => '25.0',
                                    'max' => '',
                                    'unit' => 'MPa',
                                    'reference' => 'SNI 1974:2011',
                                    'status' => 'active'
                                ],
                                [
                                    'id' => 'STD005',
                                    'name' => 'K-300 Compressive Strength',
                                    'category' => 'Compression Test',
                                    'min' => '30.0',
                                    'max' => '',
                                    'unit' => 'MPa',
                                    'reference' => 'SNI 1974:2011',
                                    'status' => 'active'
                                ],
                                [
                                    'id' => 'STD006',
                                    'name' => 'K-350 Compressive Strength',
                                    'category' => 'Compression Test',
                                    'min' => '35.0',
                                    'max' => '',
                                    'unit' => 'MPa',
                                    'reference' => 'SNI 1974:2011',
                                    'status' => 'active'
                                ],
                                [
                                    'id' => 'STD007',
                                    'name' => 'K-400 Compressive Strength',
                                    'category' => 'Compression Test',
                                    'min' => '40.0',
                                    'max' => '',
                                    'unit' => 'MPa',
                                    'reference' => 'SNI 1974:2011',
                                    'status' => 'active'
                                ],
                                [
                                    'id' => 'STD008',
                                    'name' => 'Air Content for Normal Concrete',
                                    'category' => 'Air Content',
                                    'min' => '1.0',
                                    'max' => '3.0',
                                    'unit' => '%',
                                    'reference' => 'ASTM C231',
                                    'status' => 'active'
                                ],
                                [
                                    'id' => 'STD009',
                                    'name' => 'Air Content for Exposed Concrete',
                                    'category' => 'Air Content',
                                    'min' => '4.0',
                                    'max' => '7.0',
                                    'unit' => '%',
                                    'reference' => 'ASTM C231',
                                    'status' => 'active'
                                ],
                                [
                                    'id' => 'STD010',
                                    'name' => 'Maximum Concrete Temperature',
                                    'category' => 'Temperature',
                                    'min' => '',
                                    'max' => '35.0',
                                    'unit' => '°C',
                                    'reference' => 'ACI 305R',
                                    'status' => 'active'
                                ],
                                [
                                    'id' => 'STD011',
                                    'name' => 'Minimum Concrete Temperature',
                                    'category' => 'Temperature',
                                    'min' => '10.0',
                                    'max' => '',
                                    'unit' => '°C',
                                    'reference' => 'ACI 306R',
                                    'status' => 'active'
                                ],
                                [
                                    'id' => 'STD012',
                                    'name' => 'Normal Weight Concrete',
                                    'category' => 'Unit Weight',
                                    'min' => '2200',
                                    'max' => '2400',
                                    'unit' => 'kg/m³',
                                    'reference' => 'ASTM C138',
                                    'status' => 'active'
                                ],
                                [
                                    'id' => 'STD013',
                                    'name' => 'Lightweight Concrete',
                                    'category' => 'Unit Weight',
                                    'min' => '1440',
                                    'max' => '1840',
                                    'unit' => 'kg/m³',
                                    'reference' => 'ASTM C138',
                                    'status' => 'inactive'
                                ],
                                [
                                    'id' => 'STD014',
                                    'name' => 'Heavy Weight Concrete',
                                    'category' => 'Unit Weight',
                                    'min' => '3200',
                                    'max' => '4000',
                                    'unit' => 'kg/m³',
                                    'reference' => 'ASTM C138',
                                    'status' => 'draft'
                                ],
                                [
                                    'id' => 'STD015',
                                    'name' => 'K-450 Compressive Strength',
                                    'category' => 'Compression Test',
                                    'min' => '45.0',
                                    'max' => '',
                                    'unit' => 'MPa',
                                    'reference' => 'SNI 1974:2011',
                                    'status' => 'active'
                                ]
                            ];
                            
                            $statusBadges = [
                                'active' => 'bg-success',
                                'inactive' => 'bg-secondary',
                                'draft' => 'bg-warning'
                            ];
                            @endphp

                            @foreach($standards as $standard)
                                <tr>
                                    <td>{{ $standard['id'] }}</td>
                                    <td>{{ $standard['name'] }}</td>
                                    <td>{{ $standard['category'] }}</td>
                                    <td>{{ $standard['min'] ?: '-' }}</td>
                                    <td>{{ $standard['max'] ?: '-' }}</td>
                                    <td>{{ $standard['unit'] }}</td>
                                    <td>{{ $standard['reference'] }}</td>
                                    <td>
                                        <span class="badge {{ $statusBadges[$standard['status']] }}">
                                            {{ ucfirst($standard['status']) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editStandardModal">
                                                <i class="ti ti-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <ul class="pagination">
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
</div>

<!-- Add Standard Modal -->
<div class="modal modal-blur fade" id="addStandardModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Quality Standard</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label required">Standard Name</label>
                    <input type="text" class="form-control" placeholder="e.g. Slump for General Concrete">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Category</label>
                        <select class="form-select">
                            <option value="">Select Category</option>
                            <option value="slump">Slump Test</option>
                            <option value="compression">Compression Test</option>
                            <option value="air-content">Air Content</option>
                            <option value="temperature">Temperature</option>
                            <option value="unit-weight">Unit Weight</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Unit</label>
                        <input type="text" class="form-control" placeholder="e.g. cm, MPa, %, °C">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Minimum Value</label>
                        <input type="number" step="0.1" class="form-control" placeholder="Leave blank if not applicable">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Maximum Value</label>
                        <input type="number" step="0.1" class="form-control" placeholder="Leave blank if not applicable">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Reference Standard</label>
                        <input type="text" class="form-control" placeholder="e.g. SNI 1972:2008, ASTM C143">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Status</label>
                        <select class="form-select">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" rows="3" placeholder="Detailed description of the standard"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary ms-auto">
                    <i class="ti ti-plus me-2"></i>
                    Add Standard
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Standard Modal -->
<div class="modal modal-blur fade" id="editStandardModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Quality Standard</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label required">Standard Name</label>
                    <input type="text" class="form-control" value="Slump for General Concrete">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Category</label>
                        <select class="form-select">
                            <option value="">Select Category</option>
                            <option value="slump" selected>Slump Test</option>
                            <option value="compression">Compression Test</option>
                            <option value="air-content">Air Content</option>
                            <option value="temperature">Temperature</option>
                            <option value="unit-weight">Unit Weight</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Unit</label>
                        <input type="text" class="form-control" value="cm">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Minimum Value</label>
                        <input type="number" step="0.1" class="form-control" value="7.5">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Maximum Value</label>
                        <input type="number" step="0.1" class="form-control" value="12.5">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Reference Standard</label>
                        <input type="text" class="form-control" value="SNI 1972:2008">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Status</label>
                        <select class="form-select">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" rows="3">Standard slump test requirements for general concrete applications according to SNI 1972:2008.</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary ms-auto">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter functionality
        const filterCategory = document.getElementById('filterCategory');
        const filterStatus = document.getElementById('filterStatus');
        const tableRows = document.querySelectorAll('tbody tr');
        
        function applyFilters() {
            const categoryValue = filterCategory.value.toLowerCase();
            const statusValue = filterStatus.value.toLowerCase();
            
            tableRows.forEach(row => {
                const category = row.cells[2].textContent.toLowerCase();
                const status = row.cells[7].textContent.trim().toLowerCase();
                
                const categoryMatch = !categoryValue || category.includes(categoryValue);
                const statusMatch = !statusValue || status === statusValue;
                
                if (categoryMatch && statusMatch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
        
        filterCategory.addEventListener('change', applyFilters);
        filterStatus.addEventListener('change', applyFilters);
    });
</script>
@endsection


