@extends('layouts.app')

@section('title', 'Edit Training Program')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Training Program
                </h2>
                <div class="text-muted mt-1">Update training program details</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.training.detail', $id) }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to Training Details
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
        <form action="#" method="post" class="card">
            <div class="card-header">
                <h3 class="card-title">Training Program Details</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Training Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $title }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Training Category</label>
                        <select class="form-select" name="category_id" required>
                            <option value="">Select category</option>
                            @foreach($trainingCategories as $index => $cat)
                                <option value="{{ $index + 1 }}" {{ $cat == $category ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Start Date</label>
                        <input type="date" class="form-control" name="start_date" value="{{ $startDate }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">End Date</label>
                        <input type="date" class="form-control" name="end_date" value="{{ $endDate }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Training Provider</label>
                        <select class="form-select" name="provider_id" required>
                            <option value="">Select provider</option>
                            @foreach($trainingProviders as $index => $prov)
                                <option value="{{ $index + 1 }}" {{ $prov == $provider ? 'selected' : '' }}>{{ $prov }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Training Location</label>
                        <input type="text" class="form-control" name="location" value="{{ strpos($provider, 'External') !== false ? explode(' - ', $provider)[1] . ' Training Center' : 'Qalcuity Training Room ' . rand(1, 5) }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Maximum Participants</label>
                        <input type="number" class="form-control" name="max_participants" min="1" value="{{ $maxParticipants }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Cost per Participant (IDR)</label>
                        <input type="number" class="form-control" name="cost" min="0" value="{{ $cost }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Status</label>
                        <select class="form-select" name="status" required>
                            @foreach($statuses as $stat)
                                <option value="{{ $stat }}" {{ $stat == $status ? 'selected' : '' }}>{{ ucfirst($stat) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Trainer Information</label>
                        <input type="text" class="form-control" name="trainer_info" value="{{ strpos($provider, 'External') !== false ? explode(' - ', $provider)[1] . ' Certified Trainer' : 'John Doe' }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="4">{{ $description }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Learning Objectives</label>
                    <textarea class="form-control" name="objectives" rows="4">{{ $objectives }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Prerequisites</label>
                        <textarea class="form-control" name="prerequisites" rows="3">@if($category == 'Technical Skills')Basic knowledge of concrete production@elseif($category == 'Certification')Minimum 2 years of experience in concrete production@else@endif</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Materials Needed</label>
                        <textarea class="form-control" name="materials" rows="3">Training manual, notebook, safety equipment</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Certification Provided</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="certification_provided" {{ ($category == 'Certification' || rand(0, 1)) ? 'checked' : '' }}>
                            <span class="form-check-label">Yes, certification will be provided</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mandatory Training</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_mandatory" {{ ($category == 'Safety' || rand(0, 1)) ? 'checked' : '' }}>
                            <span class="form-check-label">Yes, this training is mandatory</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <div class="d-flex">
                    <a href="{{ route('hr.training.detail', $id) }}" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary ms-auto">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
