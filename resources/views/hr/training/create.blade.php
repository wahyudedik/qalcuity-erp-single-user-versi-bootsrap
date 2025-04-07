@extends('layouts.app')

@section('title', 'Create Training Program')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Create Training Program
                </h2>
                <div class="text-muted mt-1">Add a new training program</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.training.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to Training List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <form action="#" method="post" class="card">
            <div class="card-header">
                <h3 class="card-title">Training Program Details</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Training Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter training title" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Training Category</label>
                        <select class="form-select" name="category_id" required>
                            <option value="">Select category</option>
                            <option value="1">Technical Skills</option>
                            <option value="2">Safety</option>
                            <option value="3">Leadership</option>
                            <option value="4">Quality Management</option>
                            <option value="5">Soft Skills</option>
                            <option value="6">Certification</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Start Date</label>
                        <input type="date" class="form-control" name="start_date" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">End Date</label>
                        <input type="date" class="form-control" name="end_date" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Training Provider</label>
                        <select class="form-select" name="provider_id" required>
                            <option value="">Select provider</option>
                            <option value="1">Internal</option>
                            <option value="2">External - ABC Training</option>
                            <option value="3">External - Safety First</option>
                            <option value="4">External - Leadership Institute</option>
                            <option value="5">External - Quality Experts</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Training Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Enter training location" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Maximum Participants</label>
                        <input type="number" class="form-control" name="max_participants" min="1" value="20" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Cost per Participant (IDR)</label>
                        <input type="number" class="form-control" name="cost" min="0" value="0" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="4" placeholder="Enter training description"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Learning Objectives</label>
                    <textarea class="form-control" name="objectives" rows="4" placeholder="Enter learning objectives"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Prerequisites</label>
                        <textarea class="form-control" name="prerequisites" rows="3" placeholder="Enter prerequisites if any"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Materials Needed</label>
                        <textarea class="form-control" name="materials" rows="3" placeholder="Enter materials needed"></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Trainer Information</label>
                    <input type="text" class="form-control" name="trainer_info" placeholder="Enter trainer name and qualifications">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Certification Provided</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="certification_provided">
                            <span class="form-check-label">Yes, certification will be provided</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mandatory Training</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_mandatory">
                            <span class="form-check-label">Yes, this training is mandatory</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Create Training Program</button>
            </div>
        </form>
    </div>
</div>
@endsection
