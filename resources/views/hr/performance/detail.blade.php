@extends('layouts.app')

@section('title', 'Performance Review Details')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Performance Review Details
                    </h2>
                    <div class="text-muted mt-1">Employee performance evaluation details</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-outline-primary d-none d-sm-inline-block" onclick="window.print()">
                            <i class="ti ti-printer me-2"></i>
                            Print Review
                        </a>
                        <a href="{{ route('hr.performance.edit', 1) }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-edit me-2"></i>
                            Edit Review
                        </a>
                        <a href="{{ route('hr.performance.index') }}"
                            class="btn btn-outline-secondary d-none d-sm-inline-block">
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
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Review Information</h3>
                            <div class="card-actions">
                                <span class="badge bg-success">Approved</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="datagrid">
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Employee</div>
                                    <div class="datagrid-content">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-2"
                                                style="background-image: url(https://placehold.co/128x128)"></span>
                                            <div>
                                                <div>Ahmad Fauzi</div>
                                                <div class="text-muted">Plant Manager</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Department</div>
                                    <div class="datagrid-content">Production</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Review Period</div>
                                    <div class="datagrid-content">Q4 2023</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Review Type</div>
                                    <div class="datagrid-content">Quarterly</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Reviewer</div>
                                    <div class="datagrid-content">Bambang Suryanto - Production Director</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Review Date</div>
                                    <div class="datagrid-content">December 15, 2023</div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Overall Rating</div>
                                    <div class="datagrid-content">
                                        <div class="d-flex align-items-center">
                                            <span class="text-success me-2">4 - Exceeds Expectations</span>
                                            <div class="progress progress-sm flex-grow-1">
                                                <div class="progress-bar bg-success" style="width: 85%" role="progressbar"
                                                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="visually-hidden">85%</span>
                                                </div>
                                            </div>
                                            <span class="ms-2 text-muted">85/100</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="datagrid-item">
                                    <div class="datagrid-title">Performance Trend</div>
                                    <div class="datagrid-content">
                                        <span class="text-green d-inline-flex align-items-center lh-1">
                                            Improving <i class="ti ti-trending-up ms-1"></i>
                                        </span>
                                    </div>
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
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>1. Job Knowledge & Skills (25%)</h4>
                                    <span class="badge bg-success">4.5/5</span>
                                </div>

                                <div class="datagrid mb-3">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Technical Knowledge</div>
                                        <div class="datagrid-content">
                                            <div class="d-flex align-items-center">
                                                <span class="text-success me-2">5 - Exceptional</span>
                                                <div class="progress progress-sm flex-grow-1">
                                                    <div class="progress-bar bg-success" style="width: 100%"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Problem Solving</div>
                                        <div class="datagrid-content">
                                            <div class="d-flex align-items-center">
                                                <span class="text-success me-2">4 - Exceeds Expectations</span>
                                                <div class="progress progress-sm flex-grow-1">
                                                    <div class="progress-bar bg-success" style="width: 80%"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="text-muted mb-1">Comments:</div>
                                    <div class="card card-body bg-light-subtle">
                                        Ahmad demonstrates exceptional technical knowledge of concrete production processes
                                        and batch plant operations. His problem-solving skills are excellent, particularly
                                        when dealing with unexpected production challenges. He consistently applies his
                                        expertise to improve plant efficiency.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>2. Quality of Work (25%)</h4>
                                    <span class="badge bg-success">4/5</span>
                                </div>

                                <div class="datagrid mb-3">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Accuracy & Thoroughness</div>
                                        <div class="datagrid-content">
                                            <div class="d-flex align-items-center">
                                                <span class="text-success me-2">4 - Exceeds Expectations</span>
                                                <div class="progress progress-sm flex-grow-1">
                                                    <div class="progress-bar bg-success" style="width: 80%"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Efficiency</div>
                                        <div class="datagrid-content">
                                            <div class="d-flex align-items-center">
                                                <span class="text-success me-2">4 - Exceeds Expectations</span>
                                                <div class="progress progress-sm flex-grow-1">
                                                    <div class="progress-bar bg-success" style="width: 80%"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="text-muted mb-1">Comments:</div>
                                    <div class="card card-body bg-light-subtle">
                                        Ahmad consistently delivers high-quality work with minimal errors. His attention to
                                        detail ensures that production standards are maintained. He has implemented several
                                        process improvements that have increased plant efficiency by approximately 12% this
                                        quarter.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>3. Productivity & Performance (20%)</h4>
                                    <span class="badge bg-success">4.5/5</span>
                                </div>

                                <div class="datagrid mb-3">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Meeting Targets</div>
                                        <div class="datagrid-content">
                                            <div class="d-flex align-items-center">
                                                <span class="text-success me-2">5 - Exceptional</span>
                                                <div class="progress progress-sm flex-grow-1">
                                                    <div class="progress-bar bg-success" style="width: 100%"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Volume of Work</div>
                                        <div class="datagrid-content">
                                            <div class="d-flex align-items-center">
                                                <span class="text-success me-2">4 - Exceeds Expectations</span>
                                                <div class="progress progress-sm flex-grow-1">
                                                    <div class="progress-bar bg-success" style="width: 80%"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="text-muted mb-1">Comments:</div>
                                    <div class="card card-body bg-light-subtle">
                                        Ahmad has exceeded all production targets this quarter, achieving 115% of the
                                        planned output. He manages his team effectively to handle peak production periods
                                        and has successfully reduced downtime by implementing preventive maintenance
                                        schedules.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>4. Communication & Teamwork (15%)</h4>
                                    <span class="badge bg-primary">3.5/5</span>
                                </div>

                                <div class="datagrid mb-3">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Communication Skills</div>
                                        <div class="datagrid-content">
                                            <div class="d-flex align-items-center">
                                                <span class="text-primary me-2">3 - Meets Expectations</span>
                                                <div class="progress progress-sm flex-grow-1">
                                                    <div class="progress-bar bg-primary" style="width: 60%"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Teamwork</div>
                                        <div class="datagrid-content">
                                            <div class="d-flex align-items-center">
                                                <span class="text-success me-2">4 - Exceeds Expectations</span>
                                                <div class="progress progress-sm flex-grow-1">
                                                    <div class="progress-bar bg-success" style="width: 80%"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="text-muted mb-1">Comments:</div>
                                    <div class="card card-body bg-light-subtle">
                                        Ahmad works well with his team and other departments. His team members respect his
                                        leadership. However, he could improve his written communication, particularly in
                                        production reports and documentation. He has shown improvement in this area compared
                                        to previous reviews.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>5. Initiative & Innovation (15%)</h4>
                                    <span class="badge bg-success">4/5</span>
                                </div>

                                <div class="datagrid mb-3">
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Initiative</div>
                                        <div class="datagrid-content">
                                            <div class="d-flex align-items-center">
                                                <span class="text-success me-2">4 - Exceeds Expectations</span>
                                                <div class="progress progress-sm flex-grow-1">
                                                    <div class="progress-bar bg-success" style="width: 80%"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="datagrid-item">
                                        <div class="datagrid-title">Innovation</div>
                                        <div class="datagrid-content">
                                            <div class="d-flex align-items-center">
                                                <span class="text-success me-2">4 - Exceeds Expectations</span>
                                                <div class="progress progress-sm flex-grow-1">
                                                    <div class="progress-bar bg-success" style="width: 80%"
                                                        role="progressbar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="text-muted mb-1">Comments:</div>
                                    <div class="card card-body bg-light-subtle">
                                        Ahmad proactively identifies and resolves production issues before they escalate.
                                        His innovative approach to optimizing the concrete mix design has resulted in cost
                                        savings while maintaining quality standards. He has proposed several process
                                        improvements that have been implemented successfully.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <h4>Overall Assessment</h4>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="text-muted mb-1">Strengths:</div>
                                        <div class="card card-body bg-light-subtle">
                                            Ahmad's technical expertise, leadership abilities, and commitment to quality are
                                            his greatest strengths. He has excellent knowledge of concrete production
                                            processes and consistently meets or exceeds production targets. His ability to
                                            troubleshoot equipment issues quickly minimizes downtime. He has earned the
                                            respect of his team and maintains high morale in the production department.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-muted mb-1">Areas for Improvement:</div>
                                        <div class="card card-body bg-light-subtle">
                                            Ahmad should focus on improving his written communication skills, particularly
                                            in documentation and reporting. While he communicates effectively verbally, his
                                            written reports sometimes lack detail and clarity. Additionally, he could
                                            benefit from delegating more tasks to develop his team members' capabilities.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-muted mb-1">Development Plan:</div>
                                        <div class="card card-body bg-light-subtle">
                                            1. Attend the technical writing workshop scheduled for January 2024.<br>
                                            2. Implement a structured delegation plan to develop team members' skills.<br>
                                            3. Participate in the advanced concrete technology certification program.<br>
                                            4. Schedule monthly cross-departmental meetings to improve coordination with
                                            sales and logistics teams.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Review Summary</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div id="chart-review-radar" style="height: 250px;"></div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <div>Overall Performance Score</div>
                                    <div class="ms-auto text-success">85/100</div>
                                </div>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-success" style="width: 85%" role="progressbar"></div>
                                </div>

                                <div class="d-flex align-items-center mb-2">
                                    <div>Previous Review Score</div>
                                    <div class="ms-auto text-primary">82/100</div>
                                </div>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-primary" style="width: 82%" role="progressbar"></div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div>Improvement</div>
                                    <div class="ms-auto">
                                        <span class="text-green d-inline-flex align-items-center lh-1">
                                            +3% <i class="ti ti-trending-up ms-1"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Review Timeline</h3>
                        </div>
                        <div class="card-body">
                            <ul class="timeline">
                                <li class="timeline-event">
                                    <div class="timeline-event-icon bg-success">
                                        <i class="ti ti-check"></i>
                                    </div>
                                    <div class="timeline-event-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-muted float-end">Dec 20, 2023</div>
                                                <h4>Review Approved</h4>
                                                <p class="text-muted">Approved by Bambang Suryanto</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-event">
                                    <div class="timeline-event-icon bg-info">
                                        <i class="ti ti-user-check"></i>
                                    </div>
                                    <div class="timeline-event-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-muted float-end">Dec 18, 2023</div>
                                                <h4>Employee Acknowledged</h4>
                                                <p class="text-muted">Ahmad Fauzi acknowledged the review</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-event">
                                    <div class="timeline-event-icon bg-primary">
                                        <i class="ti ti-send"></i>
                                    </div>
                                    <div class="timeline-event-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-muted float-end">Dec 17, 2023</div>
                                                <h4>Shared with Employee</h4>
                                                <p class="text-muted">Review shared with Ahmad Fauzi</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-event">
                                    <div class="timeline-event-icon bg-secondary">
                                        <i class="ti ti-edit"></i>
                                    </div>
                                    <div class="timeline-event-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-muted float-end">Dec 15, 2023</div>
                                                <h4>Review Completed</h4>
                                                <p class="text-muted">Bambang Suryanto completed the review</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-event">
                                    <div class="timeline-event-icon bg-dark">
                                        <i class="ti ti-file-plus"></i>
                                    </div>
                                    <div class="timeline-event-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-muted float-end">Dec 1, 2023</div>
                                                <h4>Review Initiated</h4>
                                                <p class="text-muted">Q4 2023 review process started</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Attachments</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="me-2">
                                        <i class="ti ti-file-spreadsheet text-primary" style="font-size: 1.5rem;"></i>
                                    </div>
                                    <div class="flex-fill">
                                        <div>Production_Metrics_Q4_2023.xlsx</div>
                                        <div class="text-muted">Added Dec 15, 2023</div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-outline-primary btn-icon">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="me-2">
                                        <i class="ti ti-file-text text-primary" style="font-size: 1.5rem;"></i>
                                    </div>
                                    <div class="flex-fill">
                                        <div>Team_Feedback_Ahmad.pdf</div>
                                        <div class="text-muted">Added Dec 14, 2023</div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-outline-primary btn-icon">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="me-2">
                                        <i class="ti ti-file-description text-primary" style="font-size: 1.5rem;"></i>
                                    </div>
                                    <div class="flex-fill">
                                        <div>Self_Assessment_Form.docx</div>
                                        <div class="text-muted">Added Dec 10, 2023</div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-outline-primary btn-icon">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Comments</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="d-flex mb-3">
                                    <span class="avatar me-2"
                                        style="background-image: url(https://placehold.co/128x128)"></span>
                                    <div>
                                        <div class="font-weight-medium">Ahmad Fauzi</div>
                                        <div class="text-muted">Dec 18, 2023</div>
                                        <div class="mt-1">
                                            Thank you for the detailed feedback. I appreciate the recognition of my
                                            technical skills and will work on improving my written communication as
                                            suggested.
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <span class="avatar me-2"
                                        style="background-image: url(https://placehold.co/128x128)"></span>
                                    <div>
                                        <div class="font-weight-medium">Bambang Suryanto</div>
                                        <div class="text-muted">Dec 17, 2023</div>
                                        <div class="mt-1">
                                            Ahmad has been a valuable asset to the production team. His technical expertise
                                            and leadership have significantly contributed to our production efficiency this
                                            quarter.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <label class="form-label">Add Comment</label>
                                <textarea class="form-control mb-2" rows="3" placeholder="Type your comment here..."></textarea>
                                <button type="button" class="btn btn-primary">Post Comment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Radar chart for performance criteria
            var radarOptions = {
                series: [{
                    name: 'Current Review',
                    data: [4.5, 4, 4.5, 3.5, 4],
                }, {
                    name: 'Previous Review',
                    data: [4, 3.5, 4, 3, 3.5],
                }],
                chart: {
                    height: 250,
                    type: 'radar',
                    toolbar: {
                        show: false
                    }
                },
                xaxis: {
                    categories: ['Job Knowledge', 'Quality', 'Productivity', 'Communication', 'Initiative']
                },
                yaxis: {
                    show: false,
                    min: 0,
                    max: 5
                },
                colors: ['#206bc4', '#adbdcc'],
                markers: {
                    size: 4
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val.toFixed(1) + '/5';
                        }
                    }
                }
            };

            var radarChart = new ApexCharts(document.querySelector("#chart-review-radar"), radarOptions);
            radarChart.render();
        });
    </script>
@endsection
