@extends('layouts.app')

@section('title', 'Branch Management')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Branch Management
                </h2>
                <div class="text-muted mt-1">Manage all company branches</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('branches.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-plus"></i>
                        Add New Branch
                    </a>
                    <a href="{{ route('branches.create') }}" class="btn btn-primary d-sm-none btn-icon">
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
                <h3 class="card-title">All Branches</h3>
                <div class="card-actions">
                    <div class="row g-2">
                        <div class="col">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Search branches...">
                            </div>
                        </div>
                        <div class="col-auto">
                            <select class="form-select">
                                <option value="all">All Regions</option>
                                <option value="west">West Region</option>
                                <option value="central">Central Region</option>
                                <option value="east">East Region</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Branch Code</th>
                                <th>Branch Name</th>
                                <th>Location</th>
                                <th>Manager</th>
                                <th>Status</th>
                                <th>Production Capacity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $branches = [
                                [
                                    'id' => 1,
                                    'code' => 'JKT-001',
                                    'name' => 'Jakarta Utara Plant',
                                    'location' => 'Jakarta Utara, DKI Jakarta',
                                    'manager' => 'Budi Santoso',
                                    'status' => 'Active',
                                    'capacity' => '120 m³/hour'
                                ],
                                [
                                    'id' => 2,
                                    'code' => 'BDG-001',
                                    'name' => 'Bandung Central',
                                    'location' => 'Bandung, Jawa Barat',
                                    'manager' => 'Dewi Lestari',
                                    'status' => 'Active',
                                    'capacity' => '90 m³/hour'
                                ],
                                [
                                    'id' => 3,
                                    'code' => 'SBY-001',
                                    'name' => 'Surabaya Plant',
                                    'location' => 'Surabaya, Jawa Timur',
                                    'manager' => 'Agus Widodo',
                                    'status' => 'Active',
                                    'capacity' => '100 m³/hour'
                                ],
                                [
                                    'id' => 4,
                                    'code' => 'MDN-001',
                                    'name' => 'Medan Operations',
                                    'location' => 'Medan, Sumatera Utara',
                                    'manager' => 'Siti Rahayu',
                                    'status' => 'Active',
                                    'capacity' => '80 m³/hour'
                                ],
                                [
                                    'id' => 5,
                                    'code' => 'DPS-001',
                                    'name' => 'Denpasar Plant',
                                    'location' => 'Denpasar, Bali',
                                    'manager' => 'Made Wijaya',
                                    'status' => 'Maintenance',
                                    'capacity' => '75 m³/hour'
                                ],
                                [
                                    'id' => 6,
                                    'code' => 'MKS-001',
                                    'name' => 'Makassar Operations',
                                    'location' => 'Makassar, Sulawesi Selatan',
                                    'manager' => 'Andi Firmansyah',
                                    'status' => 'Active',
                                    'capacity' => '85 m³/hour'
                                ],
                                [
                                    'id' => 7,
                                    'code' => 'PLB-001',
                                    'name' => 'Palembang Plant',
                                    'location' => 'Palembang, Sumatera Selatan',
                                    'manager' => 'Rini Puspita',
                                    'status' => 'Active',
                                    'capacity' => '70 m³/hour'
                                ],
                                [
                                    'id' => 8,
                                    'code' => 'SMG-001',
                                    'name' => 'Semarang Central',
                                    'location' => 'Semarang, Jawa Tengah',
                                    'manager' => 'Hendra Gunawan',
                                    'status' => 'Inactive',
                                    'capacity' => '90 m³/hour'
                                ]
                            ];
                            @endphp

                            @foreach($branches as $branch)
                            <tr>
                                <td>{{ $branch['code'] }}</td>
                                <td>
                                    <a href="{{ route('branches.detail', $branch['id']) }}">{{ $branch['name'] }}</a>
                                </td>
                                <td>{{ $branch['location'] }}</td>
                                <td>{{ $branch['manager'] }}</td>
                                <td>
                                    @if($branch['status'] == 'Active')
                                    <span class="badge bg-success">Active</span>
                                    @elseif($branch['status'] == 'Maintenance')
                                    <span class="badge bg-warning">Maintenance</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $branch['capacity'] }}</td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{ route('branches.detail', $branch['id']) }}" class="btn btn-sm btn-info">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <a href="{{ route('branches.edit', $branch['id']) }}" class="btn btn-sm btn-primary">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>8</span> entries</p>
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
@endsection
