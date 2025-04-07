@extends('layouts.app')

@section('title', 'Edit Performance Review')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Performance Review
                </h2>
                <div class="text-muted mt-1">Update employee performance evaluation</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.performance.detail', 1) }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                        <i class="ti ti-eye me-2"></i>
                        View Review
                    </a>
                    <a href="{{ route('hr.performance.index') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left me-2"></i>
                        Back to List
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
            @method('PUT')
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
                                        <option value="1" selected>Ahmad Fauzi - Plant Manager</option>
                                        <option value="2">Siti Rahayu - Finance Manager</option>
                                        <option value="3">Budi Santoso - Sales Executive</option>
                                        <option value="4">Dewi Lestari - HR Specialist</option>
                                        <option value="5">Eko Prasetyo - Warehouse Supervisor</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Department</label>
                                    <select class="form-select" name="department" required>
                                        <option value="Production" selected>Production</option>
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
                                        <option value="Quarterly" selected>Quarterly</option>
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
                                        <option value="1" selected>Bambang Suryanto - Production Director</option>
                                        <option value="2">Ratna Dewi - HR Manager</option>
                                        <option value="3">Hendro Wijaya - Finance Director</option>
                                        <option value="4">Kartika Sari - Sales Manager</option>
                                        <option value="5">Doni Kusuma - Warehouse Manager</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Due Date</label>
                                    <input type="date" class="form-control" name="due_date" value="2023-12-20" required>
                                </div>
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
                                        <p class="form-hint">Evaluates understanding of technical aspects required for the job</p>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-select" name="criteria[technical_knowledge]">
                                            <option value="">Select Rating</option>
                                            <option value="5" selected>5 - Exceptional</option>
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
                                        <p class="form-hint">Ability to analyze situations and implement effective solutions</p>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-select" name="criteria[problem_solving]">
                                            <option value="">Select Rating</option>
                                            <option value="5">5 - Exceptional</option>
                                            <option value="4" selected>4 - Exceeds Expectations</option>
                                            <option value="3">3 - Meets Expectations</option>
                                            <option value="2">2 - Needs Improvement</option>
                                            <option value="1">1 - Unsatisfactory</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Comments</label>
                                        <textarea class="form-control" name="comments[job_knowledge]" rows="2">Ahmad demonstrates exceptional technical knowledge of concrete production processes and batch plant operations. His problem-solving skills are excellent, particularly when dealing with unexpected production challenges. He consistently applies his expertise to improve plant efficiency.</textarea>
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
                                            <option value="4" selected>4 - Exceeds Expectations</option>
                                            <option value="3">3 - Meets Expectations</option>
                                            <option value="2">2 - Needs Improvement</option>
                                            <option value="1">1 - Unsatisfactory</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <label class="form-label">Efficiency</label>
                                        <p class="form-hint">Ability to complete tasks in a timely manner with minimal resources</p>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-select" name="criteria[efficiency]">
                                            <option value="">Select Rating</option>
                                            <option value="5">5 - Exceptional</option>
                                            <option value="4" selected>4 - Exceeds Expectations</option>
                                            <option value="3">3 - Meets Expectations</option>
                                            <option value="2">2 - Needs Improvement</option>
                                            <option value="1">1 - Unsatisfactory</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Comments</label>
                                        <textarea class="form-control" name="comments[quality]" rows="2">Ahmad consistently delivers high-quality work with minimal errors. His attention to detail ensures that production standards are maintained. He has implemented several process improvements that have increased plant efficiency by approximately 12% this quarter.</textarea>
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
                                            <option value="5" selected>5 - Exceptional</option>
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
                                            <option value="4" selected>4 - Exceeds Expectations</option>
                                            <option value="3">3 - Meets Expectations</option>
                                            <option value="2">2 - Needs Improvement</option>
                                            <option value="1">1 - Unsatisfactory</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Comments</label>
                                        <textarea class="form-control" name="comments[productivity]" rows="2">Ahmad has exceeded all production targets this quarter, achieving 115% of the planned output. He manages his team effectively to handle peak production periods and has successfully reduced downtime by implementing preventive maintenance schedules.</textarea>
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
                                            <option value="3" selected>3 - Meets Expectations</option>
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
                                            <option value="4" selected>4 - Exceeds Expectations</option>
                                            <option value="3">3 - Meets Expectations</option>
                                            <option value="2">2 - Needs Improvement</option>
                                            <option value="1">1 - Unsatisfactory</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Comments</label>
                                        <textarea class="form-control" name="comments[communication]" rows="2">Ahmad works well with his team and other departments. His team members respect his leadership. However, he could improve his written communication, particularly in production reports and documentation. He has shown improvement in this area compared to previous reviews.</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <h4>5. Initiative & Innovation (15%)</h4>
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <label class="form-label">Initiative</label>
                                        <p class="form-hint">Self-motivation and ability to take action without prompting</p>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-select" name="criteria[initiative]">
                                            <option value="">Select Rating</option>
                                            <option value="5">5 - Exceptional</option>
                                            <option value="4" selected>4 - Exceeds Expectations</option>
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
                                            <option value="4" selected>4 - Exceeds Expectations</option>
                                            <option value="3">3 - Meets Expectations</option>
                                            <option value="2">2 - Needs Improvement</option>
                                            <option value="1">1 - Unsatisfactory</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Comments</label>
                                        <textarea class="form-control" name="comments[initiative]" rows="2">Ahmad proactively identifies and resolves production issues before they escalate. His innovative approach to optimizing the concrete mix design has resulted in cost savings while maintaining quality standards. He has proposed several process improvements that have been implemented successfully.</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <h4>Overall Assessment</h4>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Strengths</label>
                                        <textarea class="form-control" name="strengths" rows="3">Ahmad's technical expertise, leadership abilities, and commitment to quality are his greatest strengths. He has excellent knowledge of concrete production processes and consistently meets or exceeds production targets. His ability to troubleshoot equipment issues quickly minimizes downtime. He has earned the respect of his team and maintains high morale in the production department.</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label class="form-label">Areas for Improvement</label>
                                        <textarea class="form-control" name="improvements" rows="3">Ahmad should focus on improving his written communication skills, particularly in documentation and reporting. While he communicates effectively verbally, his written reports sometimes lack detail and clarity. Additionally, he could benefit from delegating more tasks to develop his team members' capabilities.</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Development Plan</label>
                                        <textarea class="form-control" name="development_plan" rows="3">1. Attend the technical writing workshop scheduled for January 2024.
2. Implement a structured delegation plan to develop team members' skills.
3. Participate in the advanced concrete technology certification program.
4. Schedule monthly cross-departmental meetings to improve coordination with sales and logistics teams.</textarea>
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
                                    <option value="Draft">Draft</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Approved" selected>Approved</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Visibility</label>
                                <select class="form-select" name="visibility">
                                    <option value="private">Private (Reviewer Only)</option>
                                    <option value="management">Management Team</option>
                                    <option value="employee" selected>Employee & Management</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="notify_employee" checked>
                                    <span class="form-check-label">Notify Employee</span>
                                </label>
                                <small class="form-hint">Send an email notification to the employee</small>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="require_acknowledgment" checked>
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
                                    <option value="4" selected>4 - Exceeds Expectations (80-89)</option>
                                    <option value="3">3 - Meets Expectations (70-79)</option>
                                    <option value="2">2 - Needs Improvement (60-69)</option>
                                    <option value="1">1 - Unsatisfactory (Below 60)</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Final Score</label>
                                <input type="number" class="form-control" name="final_score" min="0" max="100" value="85">
                                <small class="form-hint">Leave blank for automatic calculation based on criteria ratings</small>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Performance Trend</label>
                                <select class="form-select" name="trend">
                                    <option value="">Select Trend</option>
                                    <option value="improving" selected>Improving</option>
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
                                <label class="form-label">Current Attachments</label>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex align-items-center p-2">
                                        <div class="me-2">
                                            <i class="ti ti-file-spreadsheet text-primary"></i>
                                        </div>
                                        <div class="flex-fill">
                                            Production_Metrics_Q4_2023.xlsx
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-outline-danger btn-icon btn-sm">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center p-2">
                                        <div class="me-2">
                                            <i class="ti ti-file-text text-primary"></i>
                                        </div>
                                        <div class="flex-fill">
                                            Team_Feedback_Ahmad.pdf
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-outline-danger btn-icon btn-sm">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center p-2">
                                        <div class="me-2">
                                            <i class="ti ti-file-description text-primary"></i>
                                        </div>
                                        <div class="flex-fill">
                                            Self_Assessment_Form.docx
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-outline-danger btn-icon btn-sm">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Add New Attachments</label>
                                <input type="file" class="form-control" name="attachments[]" multiple>
                                <small class="form-hint">Upload relevant documents (max 5MB each)</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Review History</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-success"></span>
                                        </div>
                                        <div class="col text-truncate">
                                            <span class="text-reset d-block">Review Approved</span>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                By Bambang Suryanto on Dec 20, 2023
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-info"></span>
                                        </div>
                                        <div class="col text-truncate">
                                            <span class="text-reset d-block">Employee Acknowledged</span>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                Ahmad Fauzi on Dec 18, 2023
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-primary"></span>
                                        </div>
                                        <div class="col text-truncate">
                                            <span class="text-reset d-block">Shared with Employee</span>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                By Bambang Suryanto on Dec 17, 2023
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-secondary"></span>
                                        </div>
                                        <div class="col text-truncate">
                                            <span class="text-reset d-block">Review Completed</span>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                By Bambang Suryanto on Dec 15, 2023
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('hr.performance.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
                        <button type="submit" name="save_draft" class="btn btn-outline-primary me-2">Save Changes</button>
                        <button type="submit" class="btn btn-primary">Update & Share</button>
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
        // Add any JavaScript needed for the edit form
    });
</script>
@endsection
