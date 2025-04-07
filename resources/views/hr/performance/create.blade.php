@extends('layouts.app')

@section('title', 'Create Performance Review')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Create New Performance Review
                    </h2>
                    <div class="text-muted mt-1">Create a new employee performance evaluation</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.performance.index') }}"
                            class="btn btn-outline-primary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left me-2"></i>
                            Back to Performance List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <form action="#" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Review Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label required">Employee</label>
                                        <select class="form-select" name="employee_id" required>
                                            <option value="">Select Employee</option>
                                            @php
                                                $employees = [
                                                    [
                                                        'id' => 1,
                                                        'name' => 'Ahmad Fauzi',
                                                        'department' => 'Production',
                                                        'position' => 'Plant Manager',
                                                    ],
                                                    [
                                                        'id' => 2,
                                                        'name' => 'Siti Rahayu',
                                                        'department' => 'Finance',
                                                        'position' => 'Finance Manager',
                                                    ],
                                                    [
                                                        'id' => 3,
                                                        'name' => 'Budi Santoso',
                                                        'department' => 'Sales',
                                                        'position' => 'Sales Executive',
                                                    ],
                                                    [
                                                        'id' => 4,
                                                        'name' => 'Dewi Lestari',
                                                        'department' => 'HR',
                                                        'position' => 'HR Specialist',
                                                    ],
                                                    [
                                                        'id' => 5,
                                                        'name' => 'Eko Prasetyo',
                                                        'department' => 'Warehouse',
                                                        'position' => 'Warehouse Supervisor',
                                                    ],
                                                    [
                                                        'id' => 6,
                                                        'name' => 'Fitri Handayani',
                                                        'department' => 'Production',
                                                        'position' => 'Quality Control Officer',
                                                    ],
                                                    [
                                                        'id' => 7,
                                                        'name' => 'Gunawan Wibowo',
                                                        'department' => 'Finance',
                                                        'position' => 'Accountant',
                                                    ],
                                                    [
                                                        'id' => 8,
                                                        'name' => 'Hadi Nugroho',
                                                        'department' => 'Sales',
                                                        'position' => 'Marketing Specialist',
                                                    ],
                                                    [
                                                        'id' => 9,
                                                        'name' => 'Indah Permata',
                                                        'department' => 'HR',
                                                        'position' => 'Recruitment Officer',
                                                    ],
                                                    [
                                                        'id' => 10,
                                                        'name' => 'Joko Susilo',
                                                        'department' => 'Warehouse',
                                                        'position' => 'Inventory Clerk',
                                                    ],
                                                ];
                                            @endphp

                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee['id'] }}">{{ $employee['name'] }} -
                                                    {{ $employee['position'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required">Department</label>
                                        <select class="form-select" name="department" required>
                                            <option value="">Select Department</option>
                                            <option value="Production">Production</option>
                                            <option value="Finance">Finance</option>
                                            <option value="Sales">Sales</option>
                                            <option value="HR">HR</option>
                                            <option value="Warehouse">Warehouse</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label required">Review Period</label>
                                        <select class="form-select" name="period" required>
                                            <option value="">Select Period</option>
                                            <option value="Q1 2023">Q1 2023</option>
                                            <option value="Q2 2023">Q2 2023</option>
                                            <option value="Q3 2023">Q3 2023</option>
                                            <option value="Q4 2023" selected>Q4 2023</option>
                                            <option value="Annual 2023">Annual 2023</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required">Review Type</label>
                                        <select class="form-select" name="type" required>
                                            <option value="">Select Type</option>
                                            <option value="Quarterly">Quarterly</option>
                                            <option value="Annual">Annual</option>
                                            <option value="Probation">Probation</option>
                                            <option value="Project-based">Project-based</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label required">Reviewer</label>
                                        <select class="form-select" name="reviewer_id" required>
                                            <option value="">Select Reviewer</option>
                                            <option value="1">Bambang Suryanto - Production Director</option>
                                            <option value="2">Ratna Dewi - HR Manager</option>
                                            <option value="3">Hendro Wijaya - Finance Director</option>
                                            <option value="4">Kartika Sari - Sales Manager</option>
                                            <option value="5">Doni Kusuma - Warehouse Manager</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required">Due Date</label>
                                        <input type="date" class="form-control" name="due_date" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Review Template</label>
                                    <select class="form-select" name="template_id">
                                        <option value="">Select Template (Optional)</option>
                                        <option value="1">Production Staff Template</option>
                                        <option value="2">Sales Staff Template</option>
                                        <option value="3">Finance Staff Template</option>
                                        <option value="4">HR Staff Template</option>
                                        <option value="5">Warehouse Staff Template</option>
                                        <option value="6">Management Template</option>
                                    </select>
                                    <small class="form-hint">Selecting a template will pre-populate KPI categories and
                                        criteria</small>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Performance Criteria</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <h4>1. Job Knowledge & Skills (25%)</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-8">
                                            <label class="form-label">Technical Knowledge</label>
                                            <p class="form-hint">Evaluates understanding of technical aspects required for
                                                the job</p>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" name="criteria[technical_knowledge]">
                                                <option value="">Select Rating</option>
                                                <option value="5">5 - Exceptional</option>
                                                <option value="4">4 - Exceeds Expectations</option>
                                                <option value="3">3 - Meets Expectations</option>
                                                <option value="2">2 - Needs Improvement</option>
                                                <option value="1">1 - Unsatisfactory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-8">
                                            <label class="form-label">Problem Solving</label>
                                            <p class="form-hint">Ability to analyze situations and implement effective
                                                solutions</p>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" name="criteria[problem_solving]">
                                                <option value="">Select Rating</option>
                                                <option value="5">5 - Exceptional</option>
                                                <option value="4">4 - Exceeds Expectations</option>
                                                <option value="3">3 - Meets Expectations</option>
                                                <option value="2">2 - Needs Improvement</option>
                                                <option value="1">1 - Unsatisfactory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label">Comments</label>
                                            <textarea class="form-control" name="comments[job_knowledge]" rows="2"
                                                placeholder="Add comments about job knowledge and skills..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h4>2. Quality of Work (25%)</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-8">
                                            <label class="form-label">Accuracy & Thoroughness</label>
                                            <p class="form-hint">Evaluates precision and completeness of work</p>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" name="criteria[accuracy]">
                                                <option value="">Select Rating</option>
                                                <option value="5">5 - Exceptional</option>
                                                <option value="4">4 - Exceeds Expectations</option>
                                                <option value="3">3 - Meets Expectations</option>
                                                <option value="2">2 - Needs Improvement</option>
                                                <option value="1">1 - Unsatisfactory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-8">
                                            <label class="form-label">Efficiency</label>
                                            <p class="form-hint">Ability to complete tasks in a timely manner with minimal
                                                resources</p>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" name="criteria[efficiency]">
                                                <option value="">Select Rating</option>
                                                <option value="5">5 - Exceptional</option>
                                                <option value="4">4 - Exceeds Expectations</option>
                                                <option value="3">3 - Meets Expectations</option>
                                                <option value="2">2 - Needs Improvement</option>
                                                <option value="1">1 - Unsatisfactory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label">Comments</label>
                                            <textarea class="form-control" name="comments[quality]" rows="2"
                                                placeholder="Add comments about quality of work..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h4>3. Productivity & Performance (20%)</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-8">
                                            <label class="form-label">Meeting Targets</label>
                                            <p class="form-hint">Ability to meet or exceed established targets</p>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" name="criteria[targets]">
                                                <option value="">Select Rating</option>
                                                <option value="5">5 - Exceptional</option>
                                                <option value="4">4 - Exceeds Expectations</option>
                                                <option value="3">3 - Meets Expectations</option>
                                                <option value="2">2 - Needs Improvement</option>
                                                <option value="1">1 - Unsatisfactory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-8">
                                            <label class="form-label">Volume of Work</label>
                                            <p class="form-hint">Amount of work completed relative to expectations</p>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" name="criteria[volume]">
                                                <option value="">Select Rating</option>
                                                <option value="5">5 - Exceptional</option>
                                                <option value="4">4 - Exceeds Expectations</option>
                                                <option value="3">3 - Meets Expectations</option>
                                                <option value="2">2 - Needs Improvement</option>
                                                <option value="1">1 - Unsatisfactory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label">Comments</label>
                                            <textarea class="form-control" name="comments[productivity]" rows="2"
                                                placeholder="Add comments about productivity and performance..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h4>4. Communication & Teamwork (15%)</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-8">
                                            <label class="form-label">Communication Skills</label>
                                            <p class="form-hint">Effectiveness in verbal and written communication</p>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" name="criteria[communication]">
                                                <option value="">Select Rating</option>
                                                <option value="5">5 - Exceptional</option>
                                                <option value="4">4 - Exceeds Expectations</option>
                                                <option value="3">3 - Meets Expectations</option>
                                                <option value="2">2 - Needs Improvement</option>
                                                <option value="1">1 - Unsatisfactory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-8">
                                            <label class="form-label">Teamwork</label>
                                            <p class="form-hint">Ability to work effectively with others</p>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" name="criteria[teamwork]">
                                                <option value="">Select Rating</option>
                                                <option value="5">5 - Exceptional</option>
                                                <option value="4">4 - Exceeds Expectations</option>
                                                <option value="3">3 - Meets Expectations</option>
                                                <option value="2">2 - Needs Improvement</option>
                                                <option value="1">1 - Unsatisfactory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label">Comments</label>
                                            <textarea class="form-control" name="comments[communication]" rows="2"
                                                placeholder="Add comments about communication and teamwork..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <h4>5. Initiative & Innovation (15%)</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-8">
                                            <label class="form-label">Initiative</label>
                                            <p class="form-hint">Self-motivation and ability to take action without
                                                prompting</p>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" name="criteria[initiative]">
                                                <option value="">Select Rating</option>
                                                <option value="5">5 - Exceptional</option>
                                                <option value="4">4 - Exceeds Expectations</option>
                                                <option value="3">3 - Meets Expectations</option>
                                                <option value="2">2 - Needs Improvement</option>
                                                <option value="1">1 - Unsatisfactory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-8">
                                            <label class="form-label">Innovation</label>
                                            <p class="form-hint">Ability to generate new ideas and approaches</p>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select" name="criteria[innovation]">
                                                <option value="">Select Rating</option>
                                                <option value="5">5 - Exceptional</option>
                                                <option value="4">4 - Exceeds Expectations</option>
                                                <option value="3">3 - Meets Expectations</option>
                                                <option value="2">2 - Needs Improvement</option>
                                                <option value="1">1 - Unsatisfactory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label">Comments</label>
                                            <textarea class="form-control" name="comments[initiative]" rows="2"
                                                placeholder="Add comments about initiative and innovation..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <h4>Overall Assessment</h4>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Strengths</label>
                                            <textarea class="form-control" name="strengths" rows="3"
                                                placeholder="Describe the employee's key strengths..."></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Areas for Improvement</label>
                                            <textarea class="form-control" name="improvements" rows="3"
                                                placeholder="Describe areas where the employee can improve..."></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label">Development Plan</label>
                                            <textarea class="form-control" name="development_plan" rows="3"
                                                placeholder="Outline a development plan for the employee..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Review Status</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="Draft" selected>Draft</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Approved">Approved</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Visibility</label>
                                    <select class="form-select" name="visibility">
                                        <option value="private" selected>Private (Reviewer Only)</option>
                                        <option value="management">Management Team</option>
                                        <option value="employee">Employee & Management</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="notify_employee">
                                        <span class="form-check-label">Notify Employee</span>
                                    </label>
                                    <small class="form-hint">Send an email notification to the employee</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="require_acknowledgment">
                                        <span class="form-check-label">Require Acknowledgment</span>
                                    </label>
                                    <small class="form-hint">Employee must acknowledge receipt of review</small>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Performance Score</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Overall Rating</label>
                                    <select class="form-select" name="overall_rating">
                                        <option value="">Select Rating</option>
                                        <option value="5">5 - Exceptional (90-100)</option>
                                        <option value="4">4 - Exceeds Expectations (80-89)</option>
                                        <option value="3">3 - Meets Expectations (70-79)</option>
                                        <option value="2">2 - Needs Improvement (60-69)</option>
                                        <option value="1">1 - Unsatisfactory (Below 60)</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Final Score</label>
                                    <input type="number" class="form-control" name="final_score" min="0"
                                        max="100" placeholder="0-100">
                                    <small class="form-hint">Leave blank for automatic calculation based on criteria
                                        ratings</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Performance Trend</label>
                                    <select class="form-select" name="trend">
                                        <option value="">Select Trend</option>
                                        <option value="improving">Improving</option>
                                        <option value="stable">Stable</option>
                                        <option value="declining">Declining</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Attachments</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Supporting Documents</label>
                                    <input type="file" class="form-control" name="attachments[]" multiple>
                                    <small class="form-hint">Upload relevant documents (max 5MB each)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('hr.performance.index') }}"
                                class="btn btn-outline-secondary me-2">Cancel</a>
                            <button type="submit" name="save_draft" class="btn btn-outline-primary me-2">Save as
                                Draft</button>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Employee selection changes department
            const employeeSelect = document.querySelector('select[name="employee_id"]');
            const departmentSelect = document.querySelector('select[name="department"]');

            if (employeeSelect && departmentSelect) {
                employeeSelect.addEventListener('change', function() {
                    const employeeId = this.value;
                    if (!employeeId) return;

                    // This would normally be an AJAX call to get employee details
                    // For demo purposes, we're using a simple mapping
                    const departmentMap = {
                        '1': 'Production',
                        '2': 'Finance',
                        '3': 'Sales',
                        '4': 'HR',
                        '5': 'Warehouse',
                        '6': 'Production',
                        '7': 'Finance',
                        '8': 'Sales',
                        '9': 'HR',
                        '10': 'Warehouse'
                    };

                    if (departmentMap[employeeId]) {
                        departmentSelect.value = departmentMap[employeeId];
                    }
                });
            }
        });
    </script>
@endsection
