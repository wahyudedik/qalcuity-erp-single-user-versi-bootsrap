@extends('layouts.app')

@section('title', 'Edit Shift')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Edit Shift
                    </h2>
                    <div class="text-muted mt-1">Modify shift information</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.shifts.detail', $id) }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left"></i>
                            Back to Details
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
                            <h3 class="card-title">Shift Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">Shift Code</label>
                                    <input type="text" class="form-control" value="MS-01" required>
                                    <small class="form-hint">Example: MS-01 (Morning Shift 01)</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">Shift Name</label>
                                    <input type="text" class="form-control" value="Morning Shift" required>
                                    <small class="form-hint">Example: Morning Shift</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">Start Time</label>
                                    <input type="time" class="form-control" value="07:00" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">End Time</label>
                                    <input type="time" class="form-control" value="15:00" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">Branch</label>
                                    <select class="form-select" required>
                                        <option value="">Select Branch</option>
                                        <option value="1" selected>Jakarta Plant</option>
                                        <option value="2">Surabaya Plant</option>
                                        <option value="3">Bandung Plant</option>
                                        <option value="all">All Plants</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status</label>
                                    <div class="form-selectgroup">
                                        <label class="form-selectgroup-item">
                                            <input type="radio" name="status" value="active"
                                                class="form-selectgroup-input" checked>
                                            <span class="form-selectgroup-label">Active</span>
                                        </label>
                                        <label class="form-selectgroup-item">
                                            <input type="radio" name="status" value="inactive"
                                                class="form-selectgroup-input">
                                            <span class="form-selectgroup-label">Inactive</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Break Times</label>
                                <div class="table-responsive mb-2">
                                    <table class="table table-vcenter card-table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Type</th>
                                                <th class="w-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>09:00</td>
                                                <td>09:15</td>
                                                <td>Short Break</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-danger">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>12:00</td>
                                                <td>13:00</td>
                                                <td>Lunch Break</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-danger">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <input type="time" class="form-control" placeholder="Start time">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="time" class="form-control" placeholder="End time">
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select">
                                            <option value="short">Short Break</option>
                                            <option value="lunch">Lunch Break</option>
                                            <option value="prayer">Prayer Break</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-outline-primary w-100">
                                            <i class="ti ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Applicable Days</label>
                                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-wrap">
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="days[]" value="monday"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Monday</span>
                                            </span>
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="days[]" value="tuesday"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Tuesday</span>
                                            </span>
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="days[]" value="wednesday"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Wednesday</span>
                                            </span>
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="days[]" value="thursday"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Thursday</span>
                                        </span>
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="days[]" value="friday"
                                            class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Friday</span>
                                            </span>
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="days[]" value="saturday"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Saturday</span>
                                            </span>
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="days[]" value="sunday"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-3">
                                                <span class="form-selectgroup-check"></span>
                                            </span>
                                            <span class="form-selectgroup-label-content">
                                                <span class="form-selectgroup-title strong mb-1">Sunday</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Overtime Rules</label>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text">Regular Rate</span>
                                            <input type="number" class="form-control" value="1.5" step="0.1"
                                                min="1">
                                            <span class="input-group-text">x</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text">Holiday Rate</span>
                                            <input type="number" class="form-control" value="2.0" step="0.1"
                                                min="1">
                                            <span class="input-group-text">x</span>
                                        </div>
                                    </div>
                                </div>
                                <small class="form-hint">Define overtime multipliers for this shift</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3">Standard morning shift for production staff. Includes regular breaks and lunch period. This shift is responsible for the main production activities during daytime hours.</textarea>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-link link-secondary"
                                onclick="window.location='{{ route('hr.shifts.detail', $id) }}'">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
