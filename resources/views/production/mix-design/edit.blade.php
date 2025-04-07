@extends('layouts.app')

@section('title', 'Edit Mix Design')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Mix Design
                </h2>
                <div class="text-muted mt-1">Modify existing mix design formulation</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.mix-design.detail', ['id' => $id]) }}" class="btn btn-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left me-2"></i>
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <form action="#" method="post">
            <div class="row row-cards">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Basic Information</h3>
                        </div>
                        <div class="card-body">
                            @php
                                // Generate dummy data based on ID
                                $names = [
                                    '001' => 'Standard K-225 Mix',
                                    '002' => 'High Strength K-400',
                                    '003' => 'Eco-Friendly K-250'
                                ];
                                $name = $names[$id] ?? 'K-' . (200 + (intval($id) * 25)) . ' Standard Mix';
                                
                                $strengths = [
                                    '001' => 'K-225',
                                    '002' => 'K-400',
                                    '003' => 'K-250'
                                ];
                                $strength = $strengths[$id] ?? 'K-' . (200 + (intval($id) * 25));
                                
                                $slumps = [
                                    '001' => '12 ± 2 cm',
                                    '002' => '10 ± 2 cm',
                                    '003' => '12 ± 2 cm'
                                ];
                                $slumpOptions = ['8 ± 2 cm', '10 ± 2 cm', '12 ± 2 cm', '15 ± 2 cm', '18 ± 2 cm'];
                                $slump = $slumps[$id] ?? $slumpOptions[intval($id) % count($slumpOptions)];
                                
                                $descriptions = [
                                    '001' => 'Standard mix design for general construction purposes. Suitable for foundations, slabs, and other non-structural elements.',
                                    '002' => 'High-strength mix design for structural elements requiring superior load-bearing capacity. Suitable for columns, beams, and high-rise construction.',
                                    '003' => 'Eco-friendly mix design with reduced cement content and incorporation of fly ash. Provides good workability and reduced carbon footprint.'
                                ];
                                $description = $descriptions[$id] ?? 'Standard mix design for general construction purposes with strength class ' . 'K-' . (200 + (intval($id) * 25)) . '.';
                                
                                // Status based on ID
                                $statuses = ['active', 'testing', 'archived'];
                                $status = $statuses[intval($id) % 3];
                                
                                // Base values that will be adjusted based on strength
                                $strengthValue = intval(substr($strength, 2));
                                $factor = $strengthValue / 300;
                                
                                $cement = round(350 * $factor);
                                $water = round(175 * (1 - ($factor - 1) * 0.1));
                                $sand = round(750 * (1 - ($factor - 1) * 0.05));
                                $aggregate = round(1050 * (1 + ($factor - 1) * 0.05));
                                $admixture = round(3.5 * $factor, 1);
                                
                                $hasFlyAsh = intval($id) % 3 == 0;
                                $hasSilicaFume = intval($id) % 5 == 0;
                                $flyAshAmount = $hasFlyAsh ? round($cement * 0.2) : 0;
                                $silicaFumeAmount = $hasSilicaFume ? round($cement * 0.1) : 0;
                            @endphp
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Mix Design Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Strength Class</label>
                                        <select class="form-select" name="strength_class" required>
                                            <option value="K-175" {{ $strength == 'K-175' ? 'selected' : '' }}>K-175</option>
                                            <option value="K-225" {{ $strength == 'K-225' ? 'selected' : '' }}>K-225</option>
                                            <option value="K-250" {{ $strength == 'K-250' ? 'selected' : '' }}>K-250</option>
                                            <option value="K-300" {{ $strength == 'K-300' ? 'selected' : '' }}>K-300</option>
                                            <option value="K-350" {{ $strength == 'K-350' ? 'selected' : '' }}>K-350</option>
                                            <option value="K-400" {{ $strength == 'K-400' ? 'selected' : '' }}>K-400</option>
                                            <option value="K-450" {{ $strength == 'K-450' ? 'selected' : '' }}>K-450</option>
                                            <option value="K-500" {{ $strength == 'K-500' ? 'selected' : '' }}>K-500</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Target Slump</label>
                                        <select class="form-select" name="target_slump" required>
                                            <option value="8 ± 2 cm" {{ $slump == '8 ± 2 cm' ? 'selected' : '' }}>8 ± 2 cm</option>
                                            <option value="10 ± 2 cm" {{ $slump == '10 ± 2 cm' ? 'selected' : '' }}>10 ± 2 cm</option>
                                            <option value="12 ± 2 cm" {{ $slump == '12 ± 2 cm' ? 'selected' : '' }}>12 ± 2 cm</option>
                                            <option value="15 ± 2 cm" {{ $slump == '15 ± 2 cm' ? 'selected' : '' }}>15 ± 2 cm</option>
                                            <option value="18 ± 2 cm" {{ $slump == '18 ± 2 cm' ? 'selected' : '' }}>18 ± 2 cm</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Status</label>
                                        <select class="form-select" name="status" required>
                                            <option value="testing" {{ $status == 'testing' ? 'selected' : '' }}>In Testing</option>
                                            <option value="active" {{ $status == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="archived" {{ $status == 'archived' ? 'selected' : '' }}>Archived</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3">{{ $description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Mix Composition (per m³)</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Cement (kg)</label>
                                        <input type="number" class="form-control" name="cement" value="{{ $cement }}" required step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Cement Type</label>
                                        <select class="form-select" name="cement_type">
                                            <option value="Type I">Type I (Ordinary Portland Cement)</option>
                                            <option value="Type II">Type II (Moderate Sulfate Resistance)</option>
                                            <option value="Type III">Type III (High Early Strength)</option>
                                            <option value="Type IV">Type IV (Low Heat of Hydration)</option>
                                            <option value="Type V">Type V (High Sulfate Resistance)</option>
                                            <option value="PCC" selected>PCC (Portland Composite Cement)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Water (liters)</label>
                                        <input type="number" class="form-control" name="water" value="{{ $water }}" required step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Water-Cement Ratio</label>
                                        <input type="number" class="form-control" name="water_cement_ratio" value="{{ round($water / $cement, 2) }}" required step="0.01" min="0.25" max="0.7">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Fine Aggregate/Sand (kg)</label>
                                        <input type="number" class="form-control" name="fine_aggregate" value="{{ $sand }}" required step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Sand Specification</label>
                                        <input type="text" class="form-control" name="sand_spec" value="River sand, FM 2.6-3.0">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Coarse Aggregate (kg)</label>
                                        <input type="number" class="form-control" name="coarse_aggregate" value="{{ $aggregate }}" required step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Aggregate Specification</label>
                                        <input type="text" class="form-control" name="aggregate_spec" value="Crushed stone, 20mm max">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Add Supplementary Cementitious Materials</label>
                                <div class="form-selectgroup">
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="add_fly_ash" value="1" class="form-selectgroup-input" {{ $hasFlyAsh ? 'checked' : '' }}>
                                        <span class="form-selectgroup-label">Fly Ash</span>
                                    </label>
                                                                        <label class="form-selectgroup-item">
                                        <input type="checkbox" name="add_silica_fume" value="1" class="form-selectgroup-input" {{ $hasSilicaFume ? 'checked' : '' }}>
                                        <span class="form-selectgroup-label">Silica Fume</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="add_ggbs" value="1" class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">GGBS</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="row mb-3 fly-ash-inputs {{ $hasFlyAsh ? '' : 'd-none' }}">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Fly Ash (kg)</label>
                                        <input type="number" class="form-control" name="fly_ash" value="{{ $flyAshAmount }}" step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Fly Ash Type</label>
                                        <select class="form-select" name="fly_ash_type">
                                            <option value="Class F" selected>Class F</option>
                                            <option value="Class C">Class C</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3 silica-fume-inputs {{ $hasSilicaFume ? '' : 'd-none' }}">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Silica Fume (kg)</label>
                                        <input type="number" class="form-control" name="silica_fume" value="{{ $silicaFumeAmount }}" step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Silica Fume Type</label>
                                        <select class="form-select" name="silica_fume_type">
                                            <option value="Densified" selected>Densified</option>
                                            <option value="Undensified">Undensified</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3 ggbs-inputs d-none">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">GGBS (kg)</label>
                                        <input type="number" class="form-control" name="ggbs" placeholder="e.g. 100" step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">GGBS Grade</label>
                                        <select class="form-select" name="ggbs_grade">
                                            <option value="Grade 80">Grade 80</option>
                                            <option value="Grade 100">Grade 100</option>
                                            <option value="Grade 120">Grade 120</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Add Chemical Admixtures</label>
                                <div class="form-selectgroup">
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="add_superplasticizer" value="1" class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Superplasticizer</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="add_retarder" value="1" class="form-selectgroup-input" {{ intval($id) % 2 == 0 ? 'checked' : '' }}>
                                        <span class="form-selectgroup-label">Retarder</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="add_accelerator" value="1" class="form-selectgroup-input" {{ intval($id) % 4 == 0 ? 'checked' : '' }}>
                                        <span class="form-selectgroup-label">Accelerator</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="add_air_entraining" value="1" class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">Air Entraining</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="row mb-3 superplasticizer-inputs">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Superplasticizer (liters)</label>
                                        <input type="number" class="form-control" name="superplasticizer" value="{{ $admixture }}" step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Brand/Type</label>
                                        <input type="text" class="form-control" name="superplasticizer_type" value="Sika ViscoCrete">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3 retarder-inputs {{ intval($id) % 2 == 0 ? '' : 'd-none' }}">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Retarder (liters)</label>
                                        <input type="number" class="form-control" name="retarder" value="{{ intval($id) % 2 == 0 ? 1.5 : '' }}" step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Brand/Type</label>
                                        <input type="text" class="form-control" name="retarder_type" value="Sika Plastiment">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3 accelerator-inputs {{ intval($id) % 4 == 0 ? '' : 'd-none' }}">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Accelerator (liters)</label>
                                        <input type="number" class="form-control" name="accelerator" value="{{ intval($id) % 4 == 0 ? 2.0 : '' }}" step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Brand/Type</label>
                                        <input type="text" class="form-control" name="accelerator_type" value="Sika Rapid">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3 air-entraining-inputs d-none">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Air Entraining Agent (liters)</label>
                                        <input type="number" class="form-control" name="air_entraining" placeholder="e.g. 0.5" step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Brand/Type</label>
                                        <input type="text" class="form-control" name="air_entraining_type" placeholder="e.g. Sika AER">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Performance Targets</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label required">Target Compressive Strength (MPa)</label>
                                <input type="number" class="form-control" name="target_strength" value="{{ $strengthValue * 0.83 }}" required step="0.1">
                                <small class="form-hint">28-day characteristic strength</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Early Strength (MPa)</label>
                                <input type="number" class="form-control" name="early_strength" value="{{ round($strengthValue * 0.83 * 0.7) }}" step="0.1">
                                <small class="form-hint">7-day expected strength</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Target Density (kg/m³)</label>
                                <input type="number" class="form-control" name="target_density" value="{{ 2300 + (($strengthValue - 200) / 10) }}" step="1">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Maximum Aggregate Size (mm)</label>
                                <select class="form-select" name="max_aggregate_size">
                                    <option value="10">10 mm</option>
                                    <option value="20" selected>20 mm</option>
                                    <option value="25">25 mm</option>
                                    <option value="40">40 mm</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Air Content (%)</label>
                                <input type="number" class="form-control" name="air_content" value="{{ 1.5 + (intval($id) % 20) / 10 }}" step="0.1" min="0" max="8">
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Application & Conditions</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Recommended Applications</label>
                                <select class="form-select" name="applications" multiple>
                                    <option value="foundations" selected>Foundations</option>
                                    <option value="slabs" selected>Slabs</option>
                                    <option value="columns" {{ $strengthValue > 300 ? 'selected' : '' }}>Columns</option>
                                    <option value="beams" {{ $strengthValue > 300 ? 'selected' : '' }}>Beams</option>
                                    <option value="walls" selected>Walls</option>
                                    <option value="pavements" {{ $strengthValue > 250 ? 'selected' : '' }}>Pavements</option>
                                    <option value="precast" {{ $strengthValue > 350 ? 'selected' : '' }}>Precast Elements</option>
                                    <option value="mass_concrete" {{ $strengthValue < 250 ? 'selected' : '' }}>Mass Concrete</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Environmental Exposure</label>
                                <select class="form-select" name="exposure">
                                    <option value="mild" {{ $strengthValue < 250 ? 'selected' : '' }}>Mild</option>
                                    <option value="moderate" {{ ($strengthValue >= 250 && $strengthValue < 350) ? 'selected' : '' }}>Moderate</option>
                                    <option value="severe" {{ ($strengthValue >= 350 && $strengthValue < 400) ? 'selected' : '' }}>Severe</option>
                                    <option value="very_severe" {{ ($strengthValue >= 400 && $strengthValue < 450) ? 'selected' : '' }}>Very Severe</option>
                                    <option value="extreme" {{ $strengthValue >= 450 ? 'selected' : '' }}>Extreme</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Temperature Range (°C)</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <input type="number" class="form-control" name="min_temp" value="15" step="1">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" class="form-control" name="max_temp" value="32" step="1">
                                    </div>
                                </div>
                                <small class="form-hint">Ambient temperature range for application</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Special Properties</label>
                                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                                    <label class="form-selectgroup-item flex-fill">
                                        <input type="checkbox" name="properties[]" value="high_strength" class="form-selectgroup-input" {{ $strengthValue > 350 ? 'checked' : '' }}>
                                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                                            <div class="me-3">
                                                <i class="ti ti-shield-check"></i>
                                            </div>
                                            <div>
                                                High Strength
                                            </div>
                                        </div>
                                    </label>
                                    <label class="form-selectgroup-item flex-fill">
                                                                               <input type="checkbox" name="properties[]" value="high_workability" class="form-selectgroup-input" {{ substr($slump, 0, 2) > 12 ? 'checked' : '' }}>
                                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                                            <div class="me-3">
                                                <i class="ti ti-wave-sine"></i>
                                            </div>
                                            <div>
                                                High Workability
                                            </div>
                                        </div>
                                    </label>
                                    <label class="form-selectgroup-item flex-fill">
                                        <input type="checkbox" name="properties[]" value="eco_friendly" class="form-selectgroup-input" {{ $hasFlyAsh ? 'checked' : '' }}>
                                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                                            <div class="me-3">
                                                <i class="ti ti-leaf"></i>
                                            </div>
                                            <div>
                                                Eco-Friendly
                                            </div>
                                        </div>
                                    </label>
                                    <label class="form-selectgroup-item flex-fill">
                                        <input type="checkbox" name="properties[]" value="sulfate_resistant" class="form-selectgroup-input">
                                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                                            <div class="me-3">
                                                <i class="ti ti-droplet-half-2"></i>
                                            </div>
                                            <div>
                                                Sulfate Resistant
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <a href="{{ route('production.mix-design.detail', ['id' => $id]) }}" class="btn btn-link">Cancel</a>
                                <button type="submit" class="btn btn-primary ms-auto">Update Mix Design</button>
                            </div>
                        </div>
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
        // Toggle supplementary materials inputs
        document.querySelector('input[name="add_fly_ash"]').addEventListener('change', function() {
            document.querySelector('.fly-ash-inputs').classList.toggle('d-none', !this.checked);
        });
        
        document.querySelector('input[name="add_silica_fume"]').addEventListener('change', function() {
            document.querySelector('.silica-fume-inputs').classList.toggle('d-none', !this.checked);
        });
        
        document.querySelector('input[name="add_ggbs"]').addEventListener('change', function() {
            document.querySelector('.ggbs-inputs').classList.toggle('d-none', !this.checked);
        });
        
        // Toggle admixture inputs
        document.querySelector('input[name="add_superplasticizer"]').addEventListener('change', function() {
            document.querySelector('.superplasticizer-inputs').classList.toggle('d-none', !this.checked);
        });
        
        document.querySelector('input[name="add_retarder"]').addEventListener('change', function() {
            document.querySelector('.retarder-inputs').classList.toggle('d-none', !this.checked);
        });
        
        document.querySelector('input[name="add_accelerator"]').addEventListener('change', function() {
            document.querySelector('.accelerator-inputs').classList.toggle('d-none', !this.checked);
        });
        
        document.querySelector('input[name="add_air_entraining"]').addEventListener('change', function() {
            document.querySelector('.air-entraining-inputs').classList.toggle('d-none', !this.checked);
        });
        
        // Auto-calculate water-cement ratio when water or cement changes
        const waterInput = document.querySelector('input[name="water"]');
        const cementInput = document.querySelector('input[name="cement"]');
        const waterCementRatioInput = document.querySelector('input[name="water_cement_ratio"]');
        
        function updateWaterCementRatio() {
            if (waterInput.value && cementInput.value) {
                const ratio = (parseFloat(waterInput.value) / parseFloat(cementInput.value)).toFixed(2);
                waterCementRatioInput.value = ratio;
            }
        }
        
        waterInput.addEventListener('input', updateWaterCementRatio);
        cementInput.addEventListener('input', updateWaterCementRatio);
        
        // Auto-populate target strength based on strength class selection
        const strengthClassSelect = document.querySelector('select[name="strength_class"]');
        const targetStrengthInput = document.querySelector('input[name="target_strength"]');
        const earlyStrengthInput = document.querySelector('input[name="early_strength"]');
        
        strengthClassSelect.addEventListener('change', function() {
            if (this.value) {
                const strengthValue = parseInt(this.value.substring(2));
                const targetMPa = (strengthValue * 0.83).toFixed(1);
                targetStrengthInput.value = targetMPa;
                earlyStrengthInput.value = (targetMPa * 0.7).toFixed(1);
            }
        });
    });
</script>
@endsection
