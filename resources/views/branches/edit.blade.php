@extends('layouts.app')

@section('title', 'Edit Branch')

@section('content')
    @php
        $branches = [
            1 => [
                'id' => 1,
                'code' => 'JKT-001',
                'name' => 'Jakarta Utara Plant',
                'location' => 'Jakarta Utara, DKI Jakarta',
                'address' => 'Jl. Industri Raya No. 123, Kawasan Industri Pulogadung, Jakarta Utara',
                'manager' => 'Budi Santoso',
                'phone' => '(021) 5678-9012',
                'email' => 'jakarta.utara@qalcuity.com',
                'status' => 'Active',
                'capacity' => '120',
                'established' => '2015-03-15',
                'employees' => 45,
                'mixers' => 12,
                'pumps' => 8,
                'area' => '15,000',
                'certifications' => ['ISO 9001:2015', 'ISO 14001:2015', 'OHSAS 18001:2007'],
                'notes' =>
                    'This is our flagship plant serving the northern Jakarta area with high capacity production.',
            ],
            // Add more branches as needed
        ];

        $branch = $branches[$id] ?? null;
    @endphp

    @if (!$branch)
        <div class="container-xl">
            <div class="empty">
                <div class="empty-icon">
                    <i class="ti ti-alert-circle"></i>
                </div>
                <p class="empty-title">Branch not found</p>
                <p class="empty-subtitle text-muted">
                    The branch you are trying to edit does not exist or has been removed.
                </p>
                <div class="empty-action">
                    <a href="{{ route('branches.index') }}" class="btn btn-primary">
                        <i class="ti ti-arrow-left"></i>
                        Back to Branch List
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="page-header d-print-none mb-4">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">Branch Management</div>
                        <h2 class="page-title">Edit Branch: {{ $branch['name'] }}</h2>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('branches.detail', $branch['id']) }}"
                                class="btn btn-outline-secondary d-none d-sm-inline-block">
                                <i class="ti ti-arrow-left"></i>
                                Back to Branch Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-12">
                        <form class="card">
                            <div class="card-header">
                                <h3 class="card-title">Branch Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label required">Branch Code</label>
                                        <input type="text" class="form-control" name="code"
                                            value="{{ $branch['code'] }}">
                                        <div class="form-text text-muted">
                                            Branch code must be unique and follow the format: [CITY]-[NUMBER]
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required">Branch Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $branch['name'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required">Location</label>
                                        <input type="text" class="form-control" name="location"
                                            value="{{ $branch['location'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="Active" {{ $branch['status'] == 'Active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="Inactive"
                                                {{ $branch['status'] == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                            <option value="Maintenance"
                                                {{ $branch['status'] == 'Maintenance' ? 'selected' : '' }}>Maintenance
                                            </option>
                                            <option value="Under Construction"
                                                {{ $branch['status'] == 'Under Construction' ? 'selected' : '' }}>Under
                                                Construction</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label required">Address</label>
                                        <textarea class="form-control" name="address" rows="3">{{ $branch['address'] }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body border-top">
                                <h3 class="card-title mb-4">Contact Information</h3>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label required">Branch Manager</label>
                                        <input type="text" class="form-control" name="manager"
                                            value="{{ $branch['manager'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required">Phone Number</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $branch['phone'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $branch['email'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required">Establishment Date</label>
                                        <input type="date" class="form-control" name="established"
                                            value="{{ $branch['established'] }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card-body border-top">
                                <h3 class="card-title mb-4">Capacity & Resources</h3>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label required">Production Capacity (m³/hour)</label>
                                        <input type="number" class="form-control" name="capacity"
                                            value="{{ $branch['capacity'] }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required">Number of Employees</label>
                                        <input type="number" class="form-control" name="employees"
                                            value="{{ $branch['employees'] }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Number of Mixers</label>
                                        <input type="number" class="form-control" name="mixers"
                                            value="{{ $branch['mixers'] }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Number of Pumps</label>
                                        <input type="number" class="form-control" name="pumps"
                                            value="{{ $branch['pumps'] }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Area Size (m²)</label>
                                        <input type="text" class="form-control" name="area"
                                            value="{{ $branch['area'] }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card-body border-top">
                                <h3 class="card-title mb-4">Certifications</h3>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="certifications[]"
                                                value="ISO 9001:2015"
                                                {{ in_array('ISO 9001:2015', $branch['certifications']) ? 'checked' : '' }}>
                                            <span class="form-check-label">ISO 9001:2015 (Quality Management)</span>
                                        </label>
                                        <label class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="certifications[]"
                                                value="ISO 14001:2015"
                                                {{ in_array('ISO 14001:2015', $branch['certifications']) ? 'checked' : '' }}>
                                            <span class="form-check-label">ISO 14001:2015 (Environmental Management)</span>
                                        </label>
                                        <label class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="certifications[]"
                                                value="OHSAS 18001:2007"
                                                {{ in_array('OHSAS 18001:2007', $branch['certifications']) ? 'checked' : '' }}>
                                            <span class="form-check-label">OHSAS 18001:2007 (Occupational Health and
                                                Safety)</span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" name="certifications[]"
                                                value="SNI"
                                                {{ in_array('SNI', $branch['certifications'] ?? []) ? 'checked' : '' }}>
                                            <span class="form-check-label">SNI (Standar Nasional Indonesia)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body border-top">
                                <h3 class="card-title mb-4">Additional Information</h3>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Notes</label>
                                        <textarea class="form-control" name="notes" rows="3">{{ $branch['notes'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
