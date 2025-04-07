@extends('layouts.app')

@section('title', 'Create Mix Design')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Create New Mix Design
                </h2>
                <div class="text-muted mt-1">Define a new concrete mix formulation</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.mix-design.index') }}" class="btn btn-secondary d-none d-sm-inline-block">
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
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Basic Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Mix Design Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="e.g. Standard K-225 Mix" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Strength Class</label>
                                        <select class="form-select" name="strength_class" required>
                                            <option value="">Select Strength Class</option>
                                            <option value="K-175">K-175</option>
                                            <option value="K-225">K-225</option>
                                            <option value="K-250">K-250</option>
                                            <option value="K-300">K-300</option>
                                            <option value="K-350">K-350</option>
                                            <option value="K-400">K-400</option>
                                            <option value="K-450">K-450</option>
                                            <option value="K-500">K-500</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Target Slump</label>
                                        <select class="form-select" name="target_slump" required>
                                            <option value="">Select Target Slump</option>
                                            <option value="8 ± 2 cm">8 ± 2 cm</option>
                                            <option value="10 ± 2 cm">10 ± 2 cm</option>
                                            <option value="12 ± 2 cm">12 ± 2 cm</option>
                                            <option value="15 ± 2 cm">15 ± 2 cm</option>
                                            <option value="18 ± 2 cm">18 ± 2 cm</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Status</label>
                                        <select class="form-select" name="status" required>
                                            <option value="testing">In Testing</option>
                                            <option value="active">Active</option>
                                            <option value="archived">Archived</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Describe the purpose and characteristics of this mix design"></textarea>
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
                                        <input type="number" class="form-control" name="cement" placeholder="e.g. 350" required step="0.1">
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
                                            <option value="PCC">PCC (Portland Composite Cement)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Water (liters)</label>
                                        <input type="number" class="form-control" name="water" placeholder="e.g. 175" required step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Water-Cement Ratio</label>
                                        <input type="number" class="form-control" name="water_cement_ratio" placeholder="e.g. 0.5" required step="0.01" min="0.25" max="0.7">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Fine Aggregate/Sand (kg)</label>
                                        <input type="number" class="form-control" name="fine_aggregate" placeholder="e.g. 750" required step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Sand Specification</label>
                                        <input type="text" class="form-control" name="sand_spec" placeholder="e.g. River sand, FM 2.6-3.0">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Coarse Aggregate (kg)</label>
                                        <input type="number" class="form-control" name="coarse_aggregate" placeholder="e.g. 1050" required step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Aggregate Specification</label>
                                        <input type="text" class="form-control" name="aggregate_spec" placeholder="e.g. Crushed stone, 20mm max">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Add Supplementary Cementitious Materials</label>
                                <div class="form-selectgroup">
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="add_fly_ash" value="1" class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">Fly Ash</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="add_silica_fume" value="1" class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">Silica Fume</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="add_ggbs" value="1" class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">GGBS</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="row mb-3 fly-ash-inputs d-none">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Fly Ash (kg)</label>
                                        <input type="number" class="form-control" name="fly_ash" placeholder="e.g. 70" step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Fly Ash Type</label>
                                        <select class="form-select" name="fly_ash_type">
                                            <option value="Class F">Class F</option>
                                            <option value="Class C">Class C</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3 silica-fume-inputs d-none">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Silica Fume (kg)</label>
                                        <input type="number" class="form-control" name="silica_fume" placeholder="e.g. 35" step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Silica Fume Type</label>
                                                                                <select class="form-select" name="silica_fume_type">
                                            <option value="Densified">Densified</option>
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
                                        <input type="checkbox" name="add_retarder" value="1" class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">Retarder</span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" name="add_accelerator" value="1" class="form-selectgroup-input">
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
                                        <input type="number" class="form-control" name="superplasticizer" placeholder="e.g. 3.5" step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Brand/Type</label>
                                        <input type="text" class="form-control" name="superplasticizer_type" placeholder="e.g. Sika ViscoCrete">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3 retarder-inputs d-none">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Retarder (liters)</label>
                                        <input type="number" class="form-control" name="retarder" placeholder="e.g. 1.5" step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Brand/Type</label>
                                        <input type="text" class="form-control" name="retarder_type" placeholder="e.g. Sika Plastiment">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3 accelerator-inputs d-none">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Accelerator (liters)</label>
                                        <input type="number" class="form-control" name="accelerator" placeholder="e.g. 2.0" step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Brand/Type</label>
                                        <input type="text" class="form-control" name="accelerator_type" placeholder="e.g. Sika Rapid">
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
                                <input type="number" class="form-control" name="target_strength" placeholder="e.g. 25" required step="0.1">
                                <small class="form-hint">28-day characteristic strength</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Early Strength (MPa)</label>
                                <input type="number" class="form-control" name="early_strength" placeholder="e.g. 15" step="0.1">
                                <small class="form-hint">7-day expected strength</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Target Density (kg/m³)</label>
                                <input type="number" class="form-control" name="target_density" placeholder="e.g. 2350" step="1">
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
                                <input type="number" class="form-control" name="air_content" placeholder="e.g. 2.0" step="0.1" min="0" max="8">
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
                                    <option value="foundations">Foundations</option>
                                    <option value="slabs">Slabs</option>
                                    <option value="columns">Columns</option>
                                    <option value="beams">Beams</option>
                                    <option value="walls">Walls</option>
                                    <option value="pavements">Pavements</option>
                                    <option value="precast">Precast Elements</option>
                                    <option value="mass_concrete">Mass Concrete</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Environmental Exposure</label>
                                <select class="form-select" name="exposure">
                                    <option value="mild">Mild</option>
                                    <option value="moderate">Moderate</option>
                                    <option value="severe">Severe</option>
                                    <option value="very_severe">Very Severe</option>
                                    <option value="extreme">Extreme</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Temperature Range (°C)</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <input type="number" class="form-control" name="min_temp" placeholder="Min" step="1">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" class="form-control" name="max_temp" placeholder="Max" step="1">
                                    </div>
                                </div>
                                <small class="form-hint">Ambient temperature range for application</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Special Properties</label>
                                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                                    <label class="form-selectgroup-item flex-fill">
                                        <input type="checkbox" name="properties[]" value="high_strength" class="form-selectgroup-input">
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
                                        <input type="checkbox" name="properties[]" value="high_workability" class="form-selectgroup-input">
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
                                        <input type="checkbox" name="properties[]" value="eco_friendly" class="form-selectgroup-input">
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
                                <a href="{{ route('production.mix-design.index') }}" class="btn btn-link">Cancel</a>
                                <button type="submit" class="btn btn-primary ms-auto">Save Mix Design</button>
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


