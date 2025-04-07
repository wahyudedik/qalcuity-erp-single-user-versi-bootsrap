@extends('layouts.app')

@section('title', 'Training Evaluations')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Training Evaluations
                    </h2>
                    <div class="text-muted mt-1">View and manage training feedback and evaluations</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('hr.training.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Back to Training List
                        </a>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#evaluationTemplateModal">
                            <i class="ti ti-plus"></i>
                            Create Evaluation Template
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">Evaluation Templates</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Template Name</th>
                                    <th>Category</th>
                                    <th>Questions</th>
                                    <th>Last Updated</th>
                                    <th>Status</th>
                                    <th class="w-1">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $templates = [
                                        [
                                            'id' => 1,
                                            'name' => 'Technical Training Evaluation',
                                            'category' => 'technical',
                                            'questions' => 12,
                                            'updated_at' => '2023-05-15',
                                            'status' => 'active',
                                        ],
                                        [
                                            'id' => 2,
                                            'name' => 'Safety Training Feedback',
                                            'category' => 'safety',
                                            'questions' => 10,
                                            'updated_at' => '2023-06-22',
                                            'status' => 'active',
                                        ],
                                        [
                                            'id' => 3,
                                            'name' => 'Leadership Development Assessment',
                                            'category' => 'leadership',
                                            'questions' => 15,
                                            'updated_at' => '2023-04-10',
                                            'status' => 'active',
                                        ],
                                        [
                                            'id' => 4,
                                            'name' => 'Quality Management Training Evaluation',
                                            'category' => 'quality',
                                            'questions' => 8,
                                            'updated_at' => '2023-07-05',
                                            'status' => 'active',
                                        ],
                                        [
                                            'id' => 5,
                                            'name' => 'Soft Skills Workshop Feedback',
                                            'category' => 'soft-skills',
                                            'questions' => 10,
                                            'updated_at' => '2023-03-18',
                                            'status' => 'inactive',
                                        ],
                                        [
                                            'id' => 6,
                                            'name' => 'Certification Program Assessment',
                                            'category' => 'certification',
                                            'questions' => 20,
                                            'updated_at' => '2023-02-28',
                                            'status' => 'active',
                                        ],
                                    ];
                                @endphp

                                @foreach ($templates as $template)
                                    <tr>
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#viewTemplateModal">{{ $template['name'] }}</a>
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $template['category'] == 'technical'
                                                    ? 'bg-blue'
                                                    : ($template['category'] == 'safety'
                                                        ? 'bg-red'
                                                        : ($template['category'] == 'leadership'
                                                            ? 'bg-purple'
                                                            : ($template['category'] == 'quality'
                                                                ? 'bg-cyan'
                                                                : ($template['category'] == 'soft-skills'
                                                                    ? 'bg-green'
                                                                    : 'bg-yellow')))) }}">
                                                {{ ucfirst(str_replace('-', ' ', $template['category'])) }}
                                            </span>
                                        </td>
                                        <td>{{ $template['questions'] }} questions</td>
                                        <td>{{ \Carbon\Carbon::parse($template['updated_at'])->format('M d, Y') }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $template['status'] == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                {{ ucfirst($template['status']) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#viewTemplateModal">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#editTemplateModal">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-icon btn-ghost-secondary" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="#" class="dropdown-item">
                                                            <i class="ti ti-copy me-2"></i>
                                                            Duplicate
                                                        </a>
                                                        <a href="#" class="dropdown-item">
                                                            <i class="ti ti-file-export me-2"></i>
                                                            Export
                                                        </a>
                                                        <a href="#"
                                                            class="dropdown-item {{ $template['status'] == 'active' ? 'text-danger' : 'text-success' }}">
                                                            <i
                                                                class="ti ti-{{ $template['status'] == 'active' ? 'ban' : 'check' }} me-2"></i>
                                                            {{ $template['status'] == 'active' ? 'Deactivate' : 'Activate' }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Evaluations</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Training</th>
                                    <th>Template</th>
                                    <th>Responses</th>
                                    <th>Average Rating</th>
                                    <th>Completion</th>
                                    <th>Date</th>
                                    <th class="w-1">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $trainingTitles = [
                                        'technical' => [
                                            'Batch Plant Operation',
                                            'Equipment Maintenance',
                                            'Production Process',
                                        ],
                                        'safety' => ['Workplace Safety', 'Emergency Response', 'First Aid Training'],
                                        'leadership' => ['Team Management', 'Leadership Skills', 'Conflict Resolution'],
                                        'quality' => ['Quality Control', 'ISO Standards', 'Testing Procedures'],
                                        'soft-skills' => ['Communication', 'Time Management', 'Customer Service'],
                                        'certification' => [
                                            'Mix Design Certification',
                                            'Quality Assurance',
                                            'Technical Certification',
                                        ],
                                    ];

                                    $evaluations = [];
                                    foreach ($templates as $template) {
                                        $category = $template['category'];
                                        $title = $trainingTitles[$category][array_rand($trainingTitles[$category])];

                                        $evaluations[] = [
                                            'id' => rand(1, 100),
                                            'training_title' => $title,
                                            'template_name' => $template['name'],
                                            'category' => $category,
                                            'responses' => rand(5, 30),
                                            'rating' => rand(65, 95) / 10,
                                            'completion' => rand(70, 100),
                                            'date' => \Carbon\Carbon::now()->subDays(rand(1, 60))->format('Y-m-d'),
                                        ];
                                    }

                                    // Sort by date (newest first)
                                    usort($evaluations, function ($a, $b) {
                                        return strcmp($b['date'], $a['date']);
                                    });
                                @endphp

                                @foreach ($evaluations as $evaluation)
                                    <tr>
                                        <td>{{ $evaluation['training_title'] }}</td>
                                        <td>{{ $evaluation['template_name'] }}</td>
                                        <td>{{ $evaluation['responses'] }} responses</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span
                                                    class="{{ $evaluation['rating'] >= 8.0 ? 'text-success' : ($evaluation['rating'] >= 7.0 ? 'text-warning' : 'text-danger') }} me-2">
                                                    {{ $evaluation['rating'] }}/10
                                                </span>
                                                <div class="stars">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= floor($evaluation['rating'] / 2))
                                                            <i class="ti ti-star-filled text-yellow"></i>
                                                        @elseif ($i - 0.5 <= $evaluation['rating'] / 2)
                                                            <i class="ti ti-star-half-filled text-yellow"></i>
                                                        @else
                                                            <i class="ti ti-star text-muted"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 me-2">
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-primary"
                                                            style="width: {{ $evaluation['completion'] }}%"
                                                            role="progressbar"
                                                            aria-valuenow="{{ $evaluation['completion'] }}"
                                                            aria-valuemin="0" aria-valuemax="100"
                                                            aria-label="{{ $evaluation['completion'] }}% Complete">
                                                            <span class="visually-hidden">{{ $evaluation['completion'] }}%
                                                                Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>{{ $evaluation['completion'] }}%</div>
                                            </div>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($evaluation['date'])->format('M d, Y') }}</td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="#" class="btn btn-sm btn-icon btn-ghost-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#viewEvaluationModal">
                                                    <i class="ti ti-chart-bar"></i>
                                                </a>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-icon btn-ghost-secondary" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="#" class="dropdown-item">
                                                            <i class="ti ti-file-export me-2"></i>
                                                            Export Results
                                                        </a>
                                                        <a href="#" class="dropdown-item">
                                                            <i class="ti ti-mail me-2"></i>
                                                            Send Reminder
                                                        </a>
                                                        <a href="#" class="dropdown-item">
                                                            <i class="ti ti-file-text me-2"></i>
                                                            Generate Report
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Evaluation Template Modal -->
    <div class="modal modal-blur fade" id="evaluationTemplateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Evaluation Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Template Name</label>
                        <input type="text" class="form-control" name="template_name"
                            placeholder="Enter template name">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category">
                                <option value="technical">Technical Skills</option>
                                <option value="safety">Safety</option>
                                <option value="leadership">Leadership</option>
                                <option value="quality">Quality Management</option>
                                <option value="soft-skills">Soft Skills</option>
                                <option value="certification">Certification</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Rating Scale</label>
                            <select class="form-select" name="rating_scale">
                                <option value="1-5">1-5 Scale</option>
                                <option value="1-10">1-10 Scale</option>
                                <option value="agree">Agreement Scale</option>
                                <option value="satisfaction">Satisfaction Scale</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Instructions</label>
                        <textarea class="form-control" name="instructions" rows="2" placeholder="Instructions for respondents"></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label m-0">Questions</label>
                            <button type="button" class="btn btn-sm btn-outline-primary">
                                <i class="ti ti-plus"></i> Add Question
                            </button>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="question-item mb-3 pb-3 border-bottom">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="fw-bold">Question 1</div>
                                        <div>
                                            <button type="button" class="btn btn-sm btn-icon btn-ghost-secondary">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <input type="text" class="form-control"
                                            value="How would you rate the overall quality of the training?">
                                    </div>
                                    <div class="mb-2">
                                        <select class="form-select form-select-sm">
                                            <option value="rating">Rating Scale</option>
                                            <option value="text">Text Response</option>
                                            <option value="multiple">Multiple Choice</option>
                                            <option value="checkbox">Checkbox</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="question-item mb-3 pb-3 border-bottom">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="fw-bold">Question 2</div>
                                        <div>
                                            <button type="button" class="btn btn-sm btn-icon btn-ghost-secondary">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <input type="text" class="form-control"
                                            value="How knowledgeable was the trainer on the subject matter?">
                                    </div>
                                    <div class="mb-2">
                                        <select class="form-select form-select-sm">
                                            <option value="rating">Rating Scale</option>
                                            <option value="text">Text Response</option>
                                            <option value="multiple">Multiple Choice</option>
                                            <option value="checkbox">Checkbox</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="question-item mb-3 pb-3 border-bottom">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="fw-bold">Question 3</div>
                                        <div>
                                            <button type="button" class="btn btn-sm btn-icon btn-ghost-secondary">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <input type="text" class="form-control"
                                            value="Was the training content relevant to your job responsibilities?">
                                    </div>
                                    <div class="mb-2">
                                        <select class="form-select form-select-sm">
                                            <option value="rating">Rating Scale</option>
                                            <option value="text">Text Response</option>
                                            <option value="multiple">Multiple Choice</option>
                                            <option value="checkbox">Checkbox</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="question-item">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="fw-bold">Question 4</div>
                                        <div>
                                            <button type="button" class="btn btn-sm btn-icon btn-ghost-secondary">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <input type="text" class="form-control"
                                            value="What suggestions do you have for improving this training?">
                                    </div>
                                    <div class="mb-2">
                                        <select class="form-select form-select-sm">
                                            <option value="text">Text Response</option>
                                            <option value="rating">Rating Scale</option>
                                            <option value="multiple">Multiple Choice</option>
                                            <option value="checkbox">Checkbox</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary ms-auto">
                        <i class="ti ti-device-floppy"></i>
                        Save Template
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Template Modal -->
    <div class="modal modal-blur fade" id="viewTemplateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Technical Training Evaluation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <span class="text-muted">Category:</span>
                                <span class="badge bg-blue ms-2">Technical</span>
                            </div>
                            <div>
                                <span class="text-muted">Rating Scale:</span>
                                <span class="ms-2">1-5 Scale</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="mb-2">
                                <span class="text-muted">Questions:</span>
                                <span class="ms-2">12 questions</span>
                            </div>
                            <div>
                                <span class="text-muted">Last Updated:</span>
                                <span class="ms-2">May 15, 2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-muted mb-2">Instructions:</div>
                        <div class="card bg-light">
                            <div class="card-body">
                                Please rate each aspect of the training on a scale of 1 to 5, where 1 is "Poor" and 5 is
                                "Excellent". Your feedback is valuable and will help us improve future training sessions.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-muted mb-2">Questions:</div>
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="fw-bold mb-1">1. How would you rate the overall quality of the training?
                                    </div>
                                    <div class="text-muted small">Rating Scale (1-5)</div>
                                </li>
                                <li class="list-group-item">
                                    <div class="fw-bold mb-1">2. How knowledgeable was the trainer on the subject matter?
                                    </div>
                                    <div class="text-muted small">Rating Scale (1-5)</div>
                                </li>
                                <li class="list-group-item">
                                    <div class="fw-bold mb-1">3. Was the training content relevant to your job
                                        responsibilities?</div>
                                    <div class="text-muted small">Rating Scale (1-5)</div>
                                </li>
                                <li class="list-group-item">
                                    <div class="fw-bold mb-1">4. How effective were the training materials (handouts,
                                        slides, etc.)?</div>
                                    <div class="text-muted small">Rating Scale (1-5)</div>
                                </li>
                                <li class="list-group-item">
                                    <div class="fw-bold mb-1">5. How well did the training meet your expectations?</div>
                                    <div class="text-muted small">Rating Scale (1-5)</div>
                                </li>
                                <li class="list-group-item">
                                    <div class="fw-bold mb-1">6. How would you rate the practical exercises and
                                        demonstrations?</div>
                                    <div class="text-muted small">Rating Scale (1-5)</div>
                                </li>
                                <li class="list-group-item">
                                    <div class="fw-bold mb-1">7. How confident do you feel applying the skills learned in
                                        this training?</div>
                                    <div class="text-muted small">Rating Scale (1-5)</div>
                                </li>
                                <li class="list-group-item">
                                    <div class="fw-bold mb-1">8. What aspects of the training did you find most valuable?
                                    </div>
                                    <div class="text-muted small">Text Response</div>
                                </li>
                                <li class="list-group-item">
                                    <div class="fw-bold mb-1">9. What aspects of the training could be improved?</div>
                                    <div class="text-muted small">Text Response</div>
                                </li>
                                <li class="list-group-item">
                                    <div class="fw-bold mb-1">10. Would you recommend this training to colleagues?</div>
                                    <div class="text-muted small">Multiple Choice (Yes/No/Maybe)</div>
                                </li>
                                <li class="list-group-item">
                                    <div class="fw-bold mb-1">11. What additional training topics would be beneficial for
                                        your role?</div>
                                    <div class="text-muted small">Text Response</div>
                                </li>
                                <li class="list-group-item">
                                    <div class="fw-bold mb-1">12. Any other comments or suggestions?</div>
                                    <div class="text-muted small">Text Response</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary ms-auto" data-bs-dismiss="modal"
                        data-bs-toggle="modal" data-bs-target="#editTemplateModal">
                        <i class="ti ti-pencil"></i>
                        Edit Template
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Evaluation Results Modal -->
    <div class="modal modal-blur fade" id="viewEvaluationModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Evaluation Results: Batch Plant Operation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <span class="text-muted">Template:</span>
                                <span class="ms-2">Technical Training Evaluation</span>
                            </div>
                            <div>
                                <span class="text-muted">Date:</span>
                                <span class="ms-2">June 15, 2023</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="mb-2">
                                <span class="text-muted">Responses:</span>
                                <span class="ms-2">18 of 20 (90%)</span>
                            </div>
                            <div>
                                <span class="text-muted">Average Rating:</span>
                                <span class="ms-2 text-success">8.5/10</span>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Rating Summary</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <div class="text-truncate">Overall Quality</div>
                                    <div class="ms-auto">4.2/5</div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 84%" role="progressbar"
                                        aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="84% Complete">
                                        <span class="visually-hidden">84% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <div class="text-truncate">Trainer Knowledge</div>
                                    <div class="ms-auto">4.5/5</div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 90%" role="progressbar"
                                        aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="90% Complete">
                                        <span class="visually-hidden">90% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <div class="text-truncate">Content Relevance</div>
                                    <div class="ms-auto">4.3/5</div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 86%" role="progressbar"
                                        aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="86% Complete">
                                        <span class="visually-hidden">86% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <div class="text-truncate">Training Materials</div>
                                    <div class="ms-auto">3.8/5</div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 76%" role="progressbar"
                                        aria-valuenow="76" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="76% Complete">
                                        <span class="visually-hidden">76% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <div class="text-truncate">Met Expectations</div>
                                    <div class="ms-auto">4.0/5</div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 80%" role="progressbar"
                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="80% Complete">
                                        <span class="visually-hidden">80% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <div class="text-truncate">Practical Exercises</div>
                                    <div class="ms-auto">4.4/5</div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 88%" role="progressbar"
                                        aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="88% Complete">
                                        <span class="visually-hidden">88% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex align-items-center mb-1">
                                    <div class="text-truncate">Confidence in Skills</div>
                                    <div class="ms-auto">3.9/5</div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 78%" role="progressbar"
                                        aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"
                                        aria-label="78% Complete">
                                        <span class="visually-hidden">78% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="card-title">Recommendation</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="display-6 text-success mb-1">72%</div>
                                    <div class="text-muted">Yes</div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="display-6 text-warning mb-1">22%</div>
                                    <div class="text-muted">Maybe</div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="display-6 text-danger mb-1">6%</div>
                                    <div class="text-muted">No</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Feedback Highlights</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="fw-bold mb-1">Most Valuable Aspects</div>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        "The hands-on practice with the batch plant control system was extremely helpful."
                                    </li>
                                    <li class="list-group-item">
                                        "The troubleshooting scenarios helped me understand how to handle real-world
                                        problems."
                                    </li>
                                    <li class="list-group-item">
                                        "The detailed explanation of the mixing process and quality control parameters."
                                    </li>
                                </ul>
                            </div>
                            <div class="mb-3">
                                <div class="fw-bold mb-1">Areas for Improvement</div>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        "More time needed for hands-on practice with the equipment."
                                    </li>
                                    <li class="list-group-item">
                                        "Training materials could be more comprehensive with better diagrams."
                                    </li>
                                    <li class="list-group-item">
                                        "Would like more specific examples related to our plant configuration."
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <div class="fw-bold mb-1">Additional Training Requests</div>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        "Advanced troubleshooting for batch plant equipment"
                                    </li>
                                    <li class="list-group-item">
                                        "Mix design optimization techniques"
                                    </li>
                                    <li class="list-group-item">
                                        "Quality control testing procedures"
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary ms-auto">
                        <i class="ti ti-file-export"></i>
                        Export Report
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Template Modal -->
    <div class="modal modal-blur fade" id="editTemplateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Evaluation Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Template Name</label>
                        <input type="text" class="form-control" name="template_name"
                            value="Technical Training Evaluation">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category">
                                <option value="technical" selected>Technical Skills</option>
                                <option value="safety">Safety</option>
                                <option value="leadership">Leadership</option>
                                <option value="quality">Quality Management</option>
                                <option value="soft-skills">Soft Skills</option>
                                <option value="certification">Certification</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Rating Scale</label>
                            <select class="form-select" name="rating_scale">
                                <option value="1-5" selected>1-5 Scale</option>
                                <option value="1-10">1-10 Scale</option>
                                <option value="agree">Agreement Scale</option>
                                <option value="satisfaction">Satisfaction Scale</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Instructions</label>
                        <textarea class="form-control" name="instructions" rows="2">Please rate each aspect of the training on a scale of 1 to 5, where 1 is "Poor" and 5 is "Excellent". Your feedback is valuable and will help us improve future training sessions.</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label m-0">Questions</label>
                            <button type="button" class="btn btn-sm btn-outline-primary">
                                <i class="ti ti-plus"></i> Add Question
                            </button>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <!-- Existing questions from the view template modal -->
                                <div class="question-item mb-3 pb-3 border-bottom">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="fw-bold">Question 1</div>
                                        <div>
                                            <button type="button" class="btn btn-sm btn-icon btn-ghost-secondary">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <input type="text" class="form-control"
                                            value="How would you rate the overall quality of the training?">
                                    </div>
                                    <div class="mb-2">
                                        <select class="form-select form-select-sm">
                                            <option value="rating" selected>Rating Scale</option>
                                            <option value="text">Text Response</option>
                                            <option value="multiple">Multiple Choice</option>
                                            <option value="checkbox">Checkbox</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- More questions would be listed here -->
                                <!-- For brevity, only showing one question in the edit modal -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary ms-auto">
                        <i class="ti ti-device-floppy"></i>
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
