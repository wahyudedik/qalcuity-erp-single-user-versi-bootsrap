@extends('layouts.app')

@section('title', 'Mix Design Detail')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Mix Design Detail
                    </h2>
                    <div class="text-muted mt-1">Viewing mix design information</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('production.mix-design.index') }}"
                            class="btn btn-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left me-2"></i>
                            Back to List
                        </a>
                        <a href="{{ route('production.mix-design.edit', ['id' => $id]) }}"
                            class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-edit me-2"></i>
                            Edit Mix Design
                        </a>
                        <button class="btn btn-danger d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-delete">
                            <i class="ti ti-trash me-2"></i>
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <!-- Basic Information Card -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Mix Design Information</h3>
                            <div class="card-actions">
                                <span class="badge bg-success">Active</span>
                            </div>
                        </div>
                        <div class="card-body">
                            @php
                                // Generate data based on ID
                                $names = [
                                    '001' => 'Standard K-225 Mix',
                                    '002' => 'High Strength K-400',
                                    '003' => 'Eco-Friendly K-250',
                                ];
                                $name = $names[$id] ?? 'K-' . (200 + intval($id) * 25) . ' Standard Mix';

                                $strengths = [
                                    '001' => 'K-225',
                                    '002' => 'K-400',
                                    '003' => 'K-250',
                                ];
                                $strength = $strengths[$id] ?? 'K-' . (200 + intval($id) * 25);

                                $slumps = [
                                    '001' => '12 ± 2 cm',
                                    '002' => '10 ± 2 cm',
                                    '003' => '12 ± 2 cm',
                                ];
                                $slumpOptions = ['8 ± 2 cm', '10 ± 2 cm', '12 ± 2 cm', '15 ± 2 cm', '18 ± 2 cm'];
                                $slump = $slumps[$id] ?? $slumpOptions[intval($id) % count($slumpOptions)];

                                $descriptions = [
                                    '001' =>
                                        'Standard mix design for general construction purposes. Suitable for foundations, slabs, and other non-structural elements.',
                                    '002' =>
                                        'High-strength mix design for structural elements requiring superior load-bearing capacity. Suitable for columns, beams, and high-rise construction.',
                                    '003' =>
                                        'Eco-friendly mix design with reduced cement content and incorporation of fly ash. Provides good workability and reduced carbon footprint.',
                                ];
                                $description =
                                    $descriptions[$id] ??
                                    'Standard mix design for general construction purposes with strength class ' .
                                        'K-' .
                                        (200 + intval($id) * 25) .
                                        '.';
                            @endphp

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-label">Mix Design ID</div>
                                    <div class="form-control-plaintext">MD-{{ str_pad($id, 3, '0', STR_PAD_LEFT) }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label">Name</div>
                                    <div class="form-control-plaintext">{{ $name }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label">Strength Class</div>
                                    <div class="form-control-plaintext">{{ $strength }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label">Target Slump</div>
                                    <div class="form-control-plaintext">{{ $slump }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label">Created Date</div>
                                    <div class="form-control-plaintext">
                                        {{ date('Y-m-d', strtotime('-' . (30 + intval($id) * 5) . ' days')) }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label">Last Modified</div>
                                    <div class="form-control-plaintext">
                                        {{ date('Y-m-d', strtotime('-' . intval($id) * 2 . ' days')) }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label">Created By</div>
                                    <div class="form-control-plaintext">John Doe</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label">Last Modified By</div>
                                    <div class="form-control-plaintext">Jane Smith</div>
                                </div>
                                <div class="col-12">
                                    <div class="form-label">Description</div>
                                    <div class="form-control-plaintext">{{ $description }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Performance Characteristics Card -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Performance Characteristics</h3>
                        </div>
                        <div class="card-body">
                            @php
                                $strengthValue = intval(substr($strength ?? 'K-300', 2));
                            @endphp

                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="form-label">Target Compressive Strength (28 days)</div>
                                    <div class="form-control-plaintext">{{ $strengthValue * 0.83 }} MPa</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-label">Water-Cement Ratio</div>
                                    <div class="form-control-plaintext">
                                        @if (isset($cement) && $cement > 0)
                                            {{ round($water / $cement, 2) }}
                                        @else
                                            N/A
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-label">Density</div>
                                    <div class="form-control-plaintext">{{ 2300 + ($strengthValue - 200) / 10 }} kg/m³
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-label">Initial Setting Time</div>
                                    <div class="form-control-plaintext">{{ 45 + (intval($id) % 30) }} minutes</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-label">Final Setting Time</div>
                                    <div class="form-control-plaintext">{{ 240 + (intval($id) % 60) }} minutes</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Test Results Card -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Test Results</h3>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">7-day Strength</label>
                                    <div class="progress mb-2">
                                        @php
                                            $sevenDayStrength = round($strengthValue * 0.83 * 0.7);
                                            $percentage = round(($sevenDayStrength / ($strengthValue * 0.83)) * 100);
                                        @endphp
                                        <div class="progress-bar bg-primary" style="width: {{ $percentage }}%"
                                            role="progressbar" aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                            aria-valuemax="100" aria-label="{{ $percentage }}% Complete">
                                            <span class="visually-hidden">{{ $percentage }}% Complete</span>
                                        </div>
                                    </div>
                                    <div class="form-control-plaintext">{{ $sevenDayStrength }} MPa ({{ $percentage }}% of
                                        target)</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">28-day Strength</label>
                                    <div class="progress mb-2">
                                        @php
                                            $twentyEightDayStrength = round(
                                                $strengthValue * 0.83 * (1 + rand(-5, 10) / 100),
                                            );
                                            $percentage = round(($twentyEightDayStrength / ($strengthValue * 0.83)) * 100);
                                        @endphp
                                        <div class="progress-bar bg-{{ $percentage >= 100 ? 'success' : 'warning' }}"
                                            style="width: {{ min($percentage, 100) }}%" role="progressbar"
                                            aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"
                                            aria-label="{{ $percentage }}% Complete">
                                            <span class="visually-hidden">{{ $percentage }}% Complete</span>
                                        </div>
                                    </div>
                                    <div class="form-control-plaintext">{{ $twentyEightDayStrength }} MPa
                                        ({{ $percentage }}% of target)</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label">Slump Test</div>
                                    <div class="form-control-plaintext">{{ substr($slump, 0, 2) - 1 + rand(0, 4) }} cm
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label">Air Content</div>
                                    <div class="form-control-plaintext">{{ 1.5 + rand(0, 20) / 10 }}%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mix Composition Card -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Mix Composition (per m³)</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Material</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th>Source/Specification</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        // Base values that will be adjusted based on strength
                                        $baseValues = [
                                            'cement' => 350,
                                            'water' => 175,
                                            'sand' => 750,
                                            'aggregate' => 1050,
                                            'admixture' => 3.5,
                                        ];

                                        // Adjust based on strength class
                                        $strengthValue = intval(substr($strength ?? 'K-300', 2));
                                        $factor = $strengthValue / 300;

                                        $cement = round($baseValues['cement'] * $factor);
                                        $water = round($baseValues['water'] * (1 - ($factor - 1) * 0.1));
                                        $sand = round($baseValues['sand'] * (1 - ($factor - 1) * 0.05));
                                        $aggregate = round($baseValues['aggregate'] * (1 + ($factor - 1) * 0.05));
                                        $admixture = round($baseValues['admixture'] * $factor, 1);
                                    @endphp
                                    <tr>
                                        <td>Cement (PCC)</td>
                                        <td>{{ $cement }}</td>
                                        <td>kg</td>
                                        <td>Type I Portland Cement</td>
                                    </tr>
                                    <tr>
                                        <td>Water</td>
                                        <td>{{ $water }}</td>
                                        <td>liters</td>
                                        <td>Clean, potable water</td>
                                    </tr>
                                    <tr>
                                        <td>Fine Aggregate (Sand)</td>
                                        <td>{{ $sand }}</td>
                                        <td>kg</td>
                                        <td>River sand, FM 2.6-3.0</td>
                                    </tr>
                                    <tr>
                                        <td>Coarse Aggregate</td>
                                        <td>{{ $aggregate }}</td>
                                        <td>kg</td>
                                        <td>Crushed stone, 20mm max</td>
                                    </tr>
                                    <tr>
                                        <td>Superplasticizer</td>
                                        <td>{{ $admixture }}</td>
                                        <td>liters</td>
                                        <td>Sika ViscoCrete or equivalent</td>
                                    </tr>
                                    @if (intval($id) % 3 == 0)
                                        <tr>
                                            <td>Fly Ash</td>
                                            <td>{{ round($cement * 0.2) }}</td>
                                            <td>kg</td>
                                            <td>Class F Fly Ash</td>
                                        </tr>
                                    @endif
                                    @if (intval($id) % 5 == 0)
                                        <tr>
                                            <td>Silica Fume</td>
                                            <td>{{ round($cement * 0.1) }}</td>
                                            <td>kg</td>
                                            <td>Densified Silica Fume</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Usage History Card -->
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title">Usage History</h3>
                            <div class="ms-auto">
                                <a href="{{ route('production.mix-design.testing') }}"
                                    class="btn btn-outline-primary btn-sm">
                                    <i class="ti ti-flask me-1"></i>
                                    View Test Reports
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                @php
                                    $usageCount = 3 + (intval($id) % 5);
                                    $totalVolume = 0;
                                @endphp

                                @for ($i = 0; $i < $usageCount; $i++)
                                    @php
                                        $date = date('Y-m-d', strtotime('-' . ($i * 3 + rand(1, 5)) . ' days'));
                                        $volume = 10 + rand(5, 50);
                                        $totalVolume += $volume;
                                        $projects = [
                                            'Apartment Complex',
                                            'Office Building',
                                            'Highway Project',
                                            'Bridge Construction',
                                            'Shopping Mall',
                                            'Residential Development',
                                        ];
                                        $project = $projects[rand(0, count($projects) - 1)];
                                    @endphp
                                    <div class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="badge bg-blue">{{ $date }}</span>
                                            </div>
                                            <div class="col text-truncate">
                                                <span class="text-reset d-block">{{ $project }}</span>
                                                <div class="d-block text-muted text-truncate mt-n1">{{ $volume }} m³
                                                    produced</div>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="btn btn-sm btn-outline-secondary">
                                                    <i class="ti ti-file-text"></i>
                                                    Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex align-items-center">
                                <div>Total Usage:</div>
                                <div class="ms-auto">
                                    <span class="text-muted">{{ $totalVolume }} m³</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommended Applications Card -->
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Recommended Applications</h3>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                @php
                                    $applications = [
                                        'foundations' => [
                                            'icon' => 'building-foundation',
                                            'name' => 'Foundations',
                                            'suitable' => true,
                                        ],
                                        'slabs' => [
                                            'icon' => 'layout-board-split',
                                            'name' => 'Slabs & Pavements',
                                            'suitable' => true,
                                        ],
                                        'columns' => [
                                            'icon' => 'pillar',
                                            'name' => 'Columns & Beams',
                                            'suitable' => $strengthValue > 300,
                                        ],
                                        'walls' => [
                                            'icon' => 'wall',
                                            'name' => 'Walls',
                                            'suitable' => true,
                                        ],
                                        'precast' => [
                                            'icon' => 'box',
                                            'name' => 'Precast Elements',
                                            'suitable' => $strengthValue > 350,
                                        ],
                                        'mass' => [
                                            'icon' => 'stack-3',
                                            'name' => 'Mass Concrete',
                                            'suitable' => $strengthValue < 250,
                                        ],
                                        'water' => [
                                            'icon' => 'droplet',
                                            'name' => 'Water Structures',
                                            'suitable' => $strengthValue > 300 && intval($id) % 3 == 0,
                                        ],
                                        'roads' => [
                                            'icon' => 'road',
                                            'name' => 'Roads & Highways',
                                            'suitable' => $strengthValue > 250,
                                        ],
                                    ];
                                @endphp

                                @foreach ($applications as $app)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <span
                                                    class="avatar {{ $app['suitable'] ? 'bg-green-lt' : 'bg-muted-lt' }}">
                                                    <i class="ti ti-{{ $app['icon'] }}"></i>
                                                </span>
                                            </div>
                                            <div>
                                                {{ $app['name'] }}
                                                @if ($app['suitable'])
                                                    <span class="badge bg-green-lt ms-2">Suitable</span>
                                                @else
                                                    <span class="badge bg-muted-lt ms-2">Not Recommended</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Environmental Considerations Card -->
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Environmental Considerations</h3>
                        </div>
                        <div class="card-body">
                            @php
                                $hasFlyAsh = intval($id) % 3 == 0;
                                $hasSilicaFume = intval($id) % 5 == 0;
                                $cementReduction = 0;

                                if ($hasFlyAsh) {
                                    $cementReduction += 20;
                                }

                                if ($hasSilicaFume) {
                                    $cementReduction += 10;
                                }

                                $co2Reduction = $cementReduction * 0.8;
                            @endphp

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-label">Cement Reduction</div>
                                    <div class="form-control-plaintext">
                                        @if ($cementReduction > 0)
                                            <span class="text-success">{{ $cementReduction }}% reduction</span>
                                        @else
                                            <span class="text-muted">Standard cement content</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label">CO₂ Footprint</div>
                                    <div class="form-control-plaintext">
                                        @if ($co2Reduction > 0)
                                            <span class="text-success">{{ $co2Reduction }}% reduction</span>
                                        @else
                                            <span class="text-muted">Standard</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label">Recycled Materials</div>
                                    <div class="form-control-plaintext">
                                        @if ($hasFlyAsh)
                                            <span class="badge bg-green me-1">Fly Ash</span>
                                        @endif
                                        @if ($hasSilicaFume)
                                            <span class="badge bg-green me-1">Silica Fume</span>
                                        @endif
                                        @if (!$hasFlyAsh && !$hasSilicaFume)
                                            <span class="text-muted">None</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-label">Environmental Rating</div>
                                    <div class="form-control-plaintext">
                                        @if ($cementReduction >= 25)
                                            <span class="badge bg-green">Eco-Friendly</span>
                                        @elseif($cementReduction > 0)
                                            <span class="badge bg-lime">Reduced Impact</span>
                                        @else
                                            <span class="badge bg-muted">Standard</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal modal-blur fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">Are you sure?</div>
                    <div>If you proceed, you will lose this mix design data.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete this mix
                        design</button>
                </div>
            </div>
        </div>
    </div>
@endsection
