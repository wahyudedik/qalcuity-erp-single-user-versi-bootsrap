@extends('layouts.app')

@section('title', 'Add New Branch')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">Branch Management</div>
                <h2 class="page-title">Add New Branch</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('branches.index') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to Branches
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
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Branch Code</label>
                                <input type="text" class="form-control" name="code" placeholder="e.g. JKT-002">
                                <div class="form-text text-muted">
                                    Branch code must be unique and follow the format: [CITY]-[NUMBER]
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Branch Name</label>
                                <input type="text" class="form-control" name="name" placeholder="e.g. Jakarta Barat Plant">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Location</label>
                                <input type="text" class="form-control" name="location" placeholder="e.g. Jakarta Barat, DKI Jakarta">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Status</label>
                                <select class="form-select" name="status">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Maintenance">Maintenance</option>
                                    <option value="Under Construction">Under Construction</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label required">Address</label>
                                <textarea class="form-control" name="address" rows="3" placeholder="Full address of the branch"></textarea>
                            </div>
                        </div>

                        <h3 class="card-title mt-4">Contact Information</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Branch Manager</label>
                                <input type="text" class="form-control" name="manager" placeholder="Full name of branch manager">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Phone Number</label>
                                <input type="text" class="form-control" name="phone" placeholder="e.g. (021) 1234-5678">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="e.g. branch.name@qalcuity.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Establishment Date</label>
                                <input type="date" class="form-control" name="established">
                            </div>
                        </div>

                        <h3 class="card-title mt-4">Capacity & Resources</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Production Capacity (m³/hour)</label>
                                <input type="number" class="form-control" name="capacity" placeholder="e.g. 100">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Number of Employees</label>
                                <input type="number" class="form-control" name="employees" placeholder="e.g. 45">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Number of Mixers</label>
                                <input type="number" class="form-control" name="mixers" placeholder="e.g. 10">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Number of Pumps</label>
                                <input type="number" class="form-control" name="pumps" placeholder="e.g. 8">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Area Size (m²)</label>
                                <input type="text" class="form-control" name="area" placeholder="e.g. 15,000">
                            </div>
                        </div>

                        <h3 class="card-title mt-4">Certifications</h3>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="certifications[]" value="ISO 9001:2015">
                                    <span class="form-check-label">ISO 9001:2015 (Quality Management)</span>
                                </label>
                                <label class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="certifications[]" value="ISO 14001:2015">
                                    <span class="form-check-label">ISO 14001:2015 (Environmental Management)</span>
                                </label>
                                <label class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="certifications[]" value="OHSAS 18001:2007">
                                    <span class="form-check-label">OHSAS 18001:2007 (Occupational Health and Safety)</span>
                                </label>
                                <label class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="certifications[]" value="SNI">
                                    <span class="form-check-label">SNI (Standar Nasional Indonesia)</span>
                                </label>
                            </div>
                        </div>

                        <h3 class="card-title mt-4">Additional Information</h3>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="3" placeholder="Any additional information about this branch"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <a href="{{ route('branches.index') }}" class="btn btn-link">Cancel</a>
                            <button type="submit" class="btn btn-primary ms-auto">Create Branch</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
