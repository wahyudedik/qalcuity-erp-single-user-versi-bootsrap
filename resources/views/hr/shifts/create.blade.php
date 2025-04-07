@extends('layouts.app')

@section('title', 'Create New Shift')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Create New Shift
                </h2>
                <div class="text-muted mt-1">Define a new work shift</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.shifts.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left"></i>
                        Back to Shifts
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
                                <input type="text" class="form-control" placeholder="Enter shift code" required>
                                <small class="form-hint">Example: MS-01 (Morning Shift 01)</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Shift Name</label>
                                <input type="text" class="form-control" placeholder="Enter shift name" required>
                                <small class="form-hint">Example: Morning Shift</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Start Time</label>
                                <input type="time" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">End Time</label>
                                <input type="time" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Branch</label>
                                <select class="form-select" required>
                                    <option value="">Select Branch</option>
                                    <option value="1">Jakarta Plant</option>
                                    <option value="2">Surabaya Plant</option>
                                    <option value="3">Bandung Plant</option>
                                    <option value="all">All Plants</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-selectgroup">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="status" value="active" class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Active</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="status" value="inactive" class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">Inactive</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Break Times</label>
                            <div class="row g-2">
                                <div class="col-md-5">
                                    <input type="time" class="form-control" placeholder="Start time">
                                </div>
                                <div class="col-md-5">
                                    <input type="time" class="form-control" placeholder="End time">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-outline-primary w-100">
                                        <i class="ti ti-plus"></i>
                                        Add
                                    </button>
                                </div>
                            </div>
                            <small class="form-hint">Add break times for this shift</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Applicable Days</label>
                            <div class="form-selectgroup form-selectgroup-boxes d-flex flex-wrap">
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="days[]" value="monday" class="form-selectgroup-input" checked>
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
                                    <input type="checkbox" name="days[]" value="tuesday" class="form-selectgroup-input" checked>
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
                                    <input type="checkbox" name="days[]" value="wednesday" class="form-selectgroup-input" checked>
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
                                    <input type="checkbox" name="days[]" value="thursday" class="form-selectgroup-input" checked>
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Thursday</span>
                                        </span>
                                    </span>
                                </label>
                                <label class="form-selectgroup-item">
                                    <input type="checkbox" name="days[]" value="friday" class="form-selectgroup-input" checked>
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
                                    <input type="checkbox" name="days[]" value="saturday" class="form-selectgroup-input">
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
                                    <input type="checkbox" name="days[]" value="sunday" class="form-selectgroup-input">
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
                                        <input type="number" class="form-control" placeholder="1.5" step="0.1" min="1">
                                        <span class="input-group-text">x</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text">Holiday Rate</span>
                                        <input type="number" class="form-control" placeholder="2.0" step="0.1" min="1">
                                        <span class="input-group-text">x</span>
                                    </div>
                                </div>
                            </div>
                            <small class="form-hint">Define overtime multipliers for this shift</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Enter additional information about this shift"></textarea>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="button" class="btn btn-link link-secondary" onclick="window.location='{{ route('hr.shifts.index') }}'">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Save Shift
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
