@extends('layouts.app')

@section('title', 'Mix Design')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Mix Design Management
                </h2>
                <div class="text-muted mt-1">Manage concrete mix formulations</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.mix-design.testing') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-flask me-2"></i>
                        Testing Results
                    </a>
                    <a href="{{ route('production.mix-design.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-plus me-2"></i>
                        Create New Mix Design
                    </a>
                    <a href="{{ route('production.mix-design.create') }}" class="btn btn-primary d-sm-none">
                        <i class="ti ti-plus"></i>
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
                <h3 class="card-title">Mix Design List</h3>
                <div class="card-actions">
                    <div class="row">
                        <div class="col">
                            <select class="form-select" id="filter-strength">
                                <option value="">All Strengths</option>
                                <option value="K-175">K-175</option>
                                <option value="K-225">K-225</option>
                                <option value="K-250">K-250</option>
                                <option value="K-300">K-300</option>
                                <option value="K-350">K-350</option>
                                <option value="K-400">K-400</option>
                                <option value="K-450">K-450</option>
                                <option value="K-500">K-500</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select" id="filter-status">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="testing">In Testing</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>
                        <div class="col">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Search mix designs...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Strength Class</th>
                            <th>Slump</th>
                            <th>Created Date</th>
                            <th>Last Modified</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $mixDesigns = [
                            [
                                'id' => 'MD-001',
                                'name' => 'Standard K-225 Mix',
                                'strength' => 'K-225',
                                'slump' => '12 ± 2 cm',
                                'created' => '2023-05-10',
                                'modified' => '2023-09-15',
                                'status' => 'active'
                            ],
                            [
                                'id' => 'MD-002',
                                'name' => 'High Strength K-400',
                                'strength' => 'K-400',
                                'slump' => '10 ± 2 cm',
                                'created' => '2023-06-22',
                                'modified' => '2023-08-30',
                                'status' => 'active'
                            ],
                            [
                                'id' => 'MD-003',
                                'name' => 'Eco-Friendly K-250',
                                'strength' => 'K-250',
                                'slump' => '12 ± 2 cm',
                                'created' => '2023-07-05',
                                'modified' => '2023-09-01',
                                'status' => 'testing'
                            ]
                        ];
                        
                        // Generate more dummy data
                        $strengths = ['K-175', 'K-225', 'K-250', 'K-300', 'K-350', 'K-400', 'K-450', 'K-500'];
                        $statuses = ['active', 'testing', 'archived'];
                        $slumps = ['8 ± 2 cm', '10 ± 2 cm', '12 ± 2 cm', '15 ± 2 cm', '18 ± 2 cm'];
                        
                        for ($i = 4; $i <= 15; $i++) {
                            $strength = $strengths[array_rand($strengths)];
                            $status = $statuses[array_rand($statuses)];
                            $slump = $slumps[array_rand($slumps)];
                            $created = date('Y-m-d', strtotime('-' . rand(30, 365) . ' days'));
                            $modified = date('Y-m-d', strtotime('-' . rand(1, 29) . ' days'));
                            
                            $mixDesigns[] = [
                                'id' => 'MD-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                                'name' => $strength . ' ' . ($i % 3 == 0 ? 'High Workability' : ($i % 2 == 0 ? 'Standard' : 'Eco-Friendly')),
                                'strength' => $strength,
                                'slump' => $slump,
                                'created' => $created,
                                'modified' => $modified,
                                'status' => $status
                            ];
                        }
                        @endphp
                        
                        @foreach($mixDesigns as $design)
                        <tr>
                            <td>{{ $design['id'] }}</td>
                            <td>
                                <a href="{{ route('production.mix-design.detail', ['id' => substr($design['id'], 3)]) }}" class="text-reset">
                                    {{ $design['name'] }}
                                </a>
                            </td>
                            <td>{{ $design['strength'] }}</td>
                            <td>{{ $design['slump'] }}</td>
                            <td>{{ $design['created'] }}</td>
                            <td>{{ $design['modified'] }}</td>
                            <td>
                                <span class="badge bg-{{ $design['status'] == 'active' ? 'success' : ($design['status'] == 'testing' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($design['status']) }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('production.mix-design.detail', ['id' => substr($design['id'], 3)]) }}" class="btn btn-sm btn-outline-primary">
                                        View
                                    </a>
                                    <a href="{{ route('production.mix-design.edit', ['id' => substr($design['id'], 3)]) }}" class="btn btn-sm btn-outline-secondary">
                                        Edit
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-delete">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Showing <span>1</span> to <span>{{ count($mixDesigns) }}</span> of <span>{{ count($mixDesigns) }}</span> entries</p>
                <ul class="pagination m-0 ms-auto">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class="ti ti-chevron-left"></i>
                            prev
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
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

<!-- Delete Confirmation Modal -->
<div class="modal modal-blur fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Are you sure?</div>
                <div>If you proceed, you will lose this mix design data.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete this mix design</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter functionality can be implemented here
    });
</script>
@endsection
