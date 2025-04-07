@extends('layouts.app')

@section('title', 'Training Program Details')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Training Program Details
                </h2>
                <div class="text-muted mt-1">View training program information</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.training.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to Training List
                    </a>
                    <a href="{{ route('hr.training.edit', $id) }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-pencil"></i>
                        Edit Training
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    $trainingCategories = ['Technical Skills', 'Safety', 'Leadership', 'Quality Management', 'Soft Skills', 'Certification'];
    $trainingProviders = ['Internal', 'External - ABC Training', 'External - Safety First', 'External - Leadership Institute', 'External - Quality Experts'];
    $statuses = ['scheduled', 'in-progress', 'completed', 'cancelled'];
    $statusBadges = [
        'scheduled' => 'bg-blue',
        'in-progress' => 'bg-yellow',
        'completed' => 'bg-green',
        'cancelled' => 'bg-red'
    ];
    
    // Generate dummy data based on ID
    $category = $trainingCategories[$id % count($trainingCategories)];
    $provider = $trainingProviders[$id % count($trainingProviders)];
    $status = $statuses[$id % count($statuses)];
    $startDate = \Carbon\Carbon::now()->subDays(rand(-30, 30))->format('Y-m-d');
    $endDate = \Carbon\Carbon::parse($startDate)->addDays(rand(1, 5))->format('Y-m-d');
    $participants = rand(5, 25);
    $maxParticipants = $participants + rand(0, 10);
    $cost = rand(500000, 5000000);
    
    if($category == 'Technical Skills') {
        $title = "Batch Plant Operation Training #{$id}";
        $description = "Comprehensive training on batch plant operation procedures, maintenance, and troubleshooting for concrete production.";
        $objectives = "- Understand batch plant components and their functions\n- Learn proper startup and shutdown procedures\n- Master quality control during production\n- Troubleshoot common issues\n- Implement preventive maintenance";
    } elseif($category == 'Safety') {
        $title = "Workplace Safety Protocol #{$id}";
        $description = "Essential safety training for all employees working in concrete production facilities to prevent accidents and ensure compliance with safety regulations.";
        $objectives = "- Identify workplace hazards\n- Understand proper PPE usage\n- Learn emergency response procedures\n- Implement safe working practices\n- Comply with safety regulations";
    } elseif($category == 'Leadership') {
        $title = "Leadership Development Program #{$id}";
        $description = "Comprehensive leadership training for supervisors and managers to enhance team management and operational efficiency.";
        $objectives = "- Develop effective communication skills\n- Learn team management techniques\n- Master conflict resolution\n- Implement performance management\n- Strategic planning and execution";
    } elseif($category == 'Quality Management') {
        $title = "Quality Control Standards #{$id}";
        $description = "Training on quality control procedures and standards for concrete production to ensure consistent product quality.";
        $objectives = "- Understand quality standards and specifications\n- Master testing procedures\n- Implement quality control processes\n- Documentation and reporting\n- Continuous improvement techniques";
    } elseif($category == 'Soft Skills') {
        $title = "Communication Skills Workshop #{$id}";
        $description = "Workshop focused on enhancing communication skills for better workplace collaboration and customer interaction.";
        $objectives = "- Improve verbal and written communication\n- Enhance active listening skills\n- Master presentation techniques\n- Develop negotiation skills\n- Effective customer communication";
    } else {
        $title = "Concrete Mix Design Certification #{$id}";
        $description = "Professional certification program for concrete mix design specialists to ensure compliance with industry standards.";
        $objectives = "- Master mix design principles\n- Learn material property analysis\n- Understand performance requirements\n- Implement quality control\n- Achieve industry certification";
    }
@endphp

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Training Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Training Title</div>
                                <div class="datagrid-content">{{ $title }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Category</div>
                                <div class="datagrid-content">{{ $category }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Status</div>
                                <div class="datagrid-content">
                                    <span class="badge {{ $statusBadges[$status] }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Provider</div>
                                <div class="datagrid-content">{{ $provider }}</div>
                            </div>
                                                        <div class="datagrid-item">
                                <div class="datagrid-title">Start Date</div>
                                <div class="datagrid-content">{{ $startDate }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">End Date</div>
                                <div class="datagrid-content">{{ $endDate }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Location</div>
                                <div class="datagrid-content">
                                    @if(strpos($provider, 'External') !== false)
                                        {{ explode(' - ', $provider)[1] }} Training Center
                                    @else
                                        Qalcuity Training Room {{ rand(1, 5) }}
                                    @endif
                                </div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Cost per Participant</div>
                                <div class="datagrid-content">IDR {{ number_format($cost, 0, ',', '.') }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Participants</div>
                                <div class="datagrid-content">{{ $participants }} / {{ $maxParticipants }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Certification</div>
                                <div class="datagrid-content">
                                    @if($category == 'Certification' || rand(0, 1))
                                        <span class="badge bg-green-lt">Yes</span>
                                    @else
                                        <span class="badge bg-muted-lt">No</span>
                                    @endif
                                </div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Mandatory</div>
                                <div class="datagrid-content">
                                    @if($category == 'Safety' || rand(0, 1))
                                        <span class="badge bg-red-lt">Yes</span>
                                    @else
                                        <span class="badge bg-muted-lt">No</span>
                                    @endif
                                </div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Trainer</div>
                                <div class="datagrid-content">
                                    @if(strpos($provider, 'External') !== false)
                                        {{ explode(' - ', $provider)[1] }} Certified Trainer
                                    @else
                                        @php
                                            $trainers = ['John Doe', 'Jane Smith', 'Robert Johnson', 'Maria Garcia', 'David Lee'];
                                        @endphp
                                        {{ $trainers[$id % count($trainers)] }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Description</h3>
                    </div>
                    <div class="card-body">
                        <p>{{ $description }}</p>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Learning Objectives</h3>
                    </div>
                    <div class="card-body">
                        <pre>{{ $objectives }}</pre>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Participants</h3>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="ti ti-plus"></i> Add Participant
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th class="w-1">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $departments = ['Production', 'Quality Control', 'Maintenance', 'Administration', 'Sales', 'Logistics'];
                                        $positions = ['Operator', 'Supervisor', 'Manager', 'Technician', 'Assistant', 'Specialist'];
                                        $participantStatuses = ['registered', 'confirmed', 'attended', 'completed', 'absent'];
                                        $participantStatusBadges = [
                                            'registered' => 'bg-blue-lt',
                                            'confirmed' => 'bg-purple-lt',
                                            'attended' => 'bg-yellow-lt',
                                            'completed' => 'bg-green-lt',
                                            'absent' => 'bg-red-lt'
                                        ];
                                    @endphp

                                    @for ($i = 1; $i <= min(10, $participants); $i++)
                                        @php
                                            $department = $departments[array_rand($departments)];
                                            $position = $positions[array_rand($positions)];
                                            $participantStatus = $participantStatuses[array_rand($participantStatuses)];
                                            if ($status == 'cancelled') {
                                                $participantStatus = 'registered';
                                            } elseif ($status == 'completed') {
                                                $participantStatus = rand(0, 10) > 2 ? 'completed' : 'absent';
                                            }
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar me-2" style="background-image: url(https://placehold.co/128x128)"></span>
                                                    <div>
                                                        <div>Employee {{ $id * 100 + $i }}</div>
                                                        <div class="text-muted">emp{{ $id * 100 + $i }}@qalcuity.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $department }}</td>
                                            <td>{{ $position }}</td>
                                            <td>
                                                <span class="badge {{ $participantStatusBadges[$participantStatus] }}">
                                                    {{ ucfirst($participantStatus) }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="{{ route('hr.training.employee-records.detail', $id * 100 + $i) }}" class="btn btn-sm btn-icon btn-ghost-secondary">
                                                        <i class="ti ti-eye"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-icon btn-ghost-secondary">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Training Schedule</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="avatar bg-blue-lt">
                                        <i class="ti ti-calendar-event"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                        <strong>Start Date:</strong> {{ $startDate }}
                                    </div>
                                    <div class="text-muted">{{ \Carbon\Carbon::parse($startDate)->format('l') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="avatar bg-green-lt">
                                        <i class="ti ti-calendar-stats"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                        <strong>End Date:</strong> {{ $endDate }}
                                    </div>
                                    <div class="text-muted">{{ \Carbon\Carbon::parse($endDate)->format('l') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="avatar bg-purple-lt">
                                        <i class="ti ti-clock"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                        <strong>Duration:</strong> {{ \Carbon\Carbon::parse($startDate)->diffInDays(\Carbon\Carbon::parse($endDate)) + 1 }} days
                                    </div>
                                    <div class="text-muted">{{ rand(4, 8) }} hours per day</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Training Materials</h3>
                        <div class="card-actions">
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="ti ti-plus"></i> Add Material
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar bg-blue-lt">
                                            <i class="ti ti-file-text"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <a href="#" class="text-reset">Training Manual.pdf</a>
                                        </div>
                                        <div class="text-muted">2.4 MB</div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="btn btn-icon btn-ghost-secondary">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar bg-red-lt">
                                            <i class="ti ti-presentation"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <a href="#" class="text-reset">Presentation Slides.pptx</a>
                                        </div>
                                        <div class="text-muted">5.7 MB</div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="btn btn-icon btn-ghost-secondary">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar bg-green-lt">
                                            <i class="ti ti-file-spreadsheet"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <a href="#" class="text-reset">Assessment Form.xlsx</a>
                                        </div>
                                        <div class="text-muted">1.2 MB</div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="btn btn-icon btn-ghost-secondary">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar bg-yellow-lt">
                                            <i class="ti ti-video"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <a href="#" class="text-reset">Tutorial Video.mp4</a>
                                        </div>
                                        <div class="text-muted">45.8 MB</div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="btn btn-icon btn-ghost-secondary">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Training Evaluation</h3>
                    </div>
                    <div class="card-body">
                        @if($status == 'completed')
                            <div class="mb-3">
                                <div class="d-flex mb-2">
                                    <div>Overall Rating</div>
                                    <div class="ms-auto">
                                        <span class="text-yellow">
                                            @php
                                                $rating = rand(35, 50) / 10;
                                                                                                $fullStars = floor($rating);
                                                $halfStar = $rating - $fullStars > 0 ? 1 : 0;
                                                $emptyStars = 5 - $fullStars - $halfStar;
                                            @endphp
                                            @for($i = 0; $i < $fullStars; $i++)
                                                <i class="ti ti-star-filled"></i>
                                            @endfor
                                            @if($halfStar)
                                                <i class="ti ti-star-half-filled"></i>
                                            @endif
                                            @for($i = 0; $i < $emptyStars; $i++)
                                                <i class="ti ti-star"></i>
                                            @endfor
                                            {{ $rating }}/5
                                        </span>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-yellow" style="width: {{ ($rating/5)*100 }}%" role="progressbar" aria-valuenow="{{ ($rating/5)*100 }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ ($rating/5)*100 }}% Complete">
                                        <span class="visually-hidden">{{ ($rating/5)*100 }}% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex mb-2">
                                    <div>Content Quality</div>
                                    <div class="ms-auto">
                                        @php
                                            $contentRating = rand(35, 50) / 10;
                                            $contentFullStars = floor($contentRating);
                                            $contentHalfStar = $contentRating - $contentFullStars > 0 ? 1 : 0;
                                            $contentEmptyStars = 5 - $contentFullStars - $contentHalfStar;
                                        @endphp
                                        <span class="text-yellow">
                                            @for($i = 0; $i < $contentFullStars; $i++)
                                                <i class="ti ti-star-filled"></i>
                                            @endfor
                                            @if($contentHalfStar)
                                                <i class="ti ti-star-half-filled"></i>
                                            @endif
                                            @for($i = 0; $i < $contentEmptyStars; $i++)
                                                <i class="ti ti-star"></i>
                                            @endfor
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex mb-2">
                                    <div>Trainer Effectiveness</div>
                                    <div class="ms-auto">
                                        @php
                                            $trainerRating = rand(35, 50) / 10;
                                            $trainerFullStars = floor($trainerRating);
                                            $trainerHalfStar = $trainerRating - $trainerFullStars > 0 ? 1 : 0;
                                            $trainerEmptyStars = 5 - $trainerFullStars - $trainerHalfStar;
                                        @endphp
                                        <span class="text-yellow">
                                            @for($i = 0; $i < $trainerFullStars; $i++)
                                                <i class="ti ti-star-filled"></i>
                                            @endfor
                                            @if($trainerHalfStar)
                                                <i class="ti ti-star-half-filled"></i>
                                            @endif
                                            @for($i = 0; $i < $trainerEmptyStars; $i++)
                                                <i class="ti ti-star"></i>
                                            @endfor
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex mb-2">
                                    <div>Facilities & Organization</div>
                                    <div class="ms-auto">
                                        @php
                                            $facilityRating = rand(35, 50) / 10;
                                            $facilityFullStars = floor($facilityRating);
                                            $facilityHalfStar = $facilityRating - $facilityFullStars > 0 ? 1 : 0;
                                            $facilityEmptyStars = 5 - $facilityFullStars - $facilityHalfStar;
                                        @endphp
                                        <span class="text-yellow">
                                            @for($i = 0; $i < $facilityFullStars; $i++)
                                                <i class="ti ti-star-filled"></i>
                                            @endfor
                                            @if($facilityHalfStar)
                                                <i class="ti ti-star-half-filled"></i>
                                            @endif
                                            @for($i = 0; $i < $facilityEmptyStars; $i++)
                                                <i class="ti ti-star"></i>
                                            @endfor
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('hr.training.evaluations') }}" class="btn btn-primary w-100">
                                    View Detailed Evaluations
                                </a>
                            </div>
                        @elseif($status == 'cancelled')
                            <div class="empty">
                                <div class="empty-icon">
                                    <i class="ti ti-mood-sad"></i>
                                </div>
                                <p class="empty-title">Training was cancelled</p>
                                <p class="empty-subtitle text-muted">
                                    No evaluations available for cancelled training programs.
                                </p>
                            </div>
                        @else
                            <div class="empty">
                                <div class="empty-icon">
                                    <i class="ti ti-clock"></i>
                                </div>
                                <p class="empty-title">Not yet evaluated</p>
                                <p class="empty-subtitle text-muted">
                                    Evaluations will be available after the training is completed.
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


