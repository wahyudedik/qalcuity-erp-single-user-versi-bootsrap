@extends('layouts.app')

@section('title', 'Raw Material Details')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Raw Material Details
                </h2>
                <div class="text-muted mt-1">Detailed information about the raw material</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.raw-materials') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back to Materials
                    </a>
                    <a href="{{ route('production.raw-materials.edit', $id) }}" class="btn btn-primary d-none d-sm-inline-block">
                        <i class="ti ti-edit"></i>
                        Edit Material
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        @php
        $materials = [
            1 => [
                'id' => 1,
                'code' => 'CEM-PCC-01',
                'name' => 'Portland Composite Cement',
                'category' => 'Cement',
                'description' => 'Portland Composite Cement (PCC) is a blended cement containing OPC clinker, gypsum and cementitious supplementary materials.',
                'stock' => 15800,
                'unit' => 'kg',
                'reorder_level' => 5000,
                'last_updated' => '2023-10-15',
                'status' => 'Available',
                'supplier' => 'Cement Industries Ltd',
                'location' => 'Silo A',
                'specifications' => [
                    'Strength Class' => '42.5 N',
                    'Setting Time' => '45-60 minutes',
                    'Fineness' => '370-420 m²/kg',
                    'Soundness' => '< 10 mm',
                    'Compressive Strength (28 days)' => '42.5-62.5 MPa'
                ],
                 'quality_parameters' => [
                    'Chemical Composition' => 'Meets ASTM C150',
                    'Clinker Content' => '65-79%',
                    'Limestone Content' => '6-20%',
                    'Gypsum Content' => '3-5%',
                    'Fly Ash Content' => '0-15%'
                ],
                'usage_history' => [
                    ['date' => '2023-10-15', 'quantity' => 1200, 'batch' => 'B-2023-1015-01'],
                    ['date' => '2023-10-14', 'quantity' => 1500, 'batch' => 'B-2023-1014-03'],
                    ['date' => '2023-10-13', 'quantity' => 1350, 'batch' => 'B-2023-1013-02'],
                    ['date' => '2023-10-12', 'quantity' => 1400, 'batch' => 'B-2023-1012-04'],
                    ['date' => '2023-10-11', 'quantity' => 1250, 'batch' => 'B-2023-1011-01'],
                ],
                'receiving_history' => [
                    ['date' => '2023-10-15', 'quantity' => 5000, 'po' => 'PO-2023-156', 'supplier' => 'Cement Industries Ltd'],
                    ['date' => '2023-10-05', 'quantity' => 10000, 'po' => 'PO-2023-142', 'supplier' => 'Cement Industries Ltd'],
                    ['date' => '2023-09-25', 'quantity' => 8000, 'po' => 'PO-2023-128', 'supplier' => 'Cement Industries Ltd'],
                ],
                'cost' => [
                    'unit_cost' => 1.25,
                    'currency' => 'USD',
                    'last_purchase_date' => '2023-10-15',
                    'last_purchase_price' => 1.25,
                    'average_cost' => 1.22
                ]
            ]
        ];
        
        // Get the material based on the ID
        $material = $materials[$id] ?? null;
        
        if (!$material) {
            // Fallback if material not found
            $material = $materials[1];
        }
        @endphp

        <div class="row row-cards">
            <!-- Material Overview Card -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Material Overview</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <div class="me-auto">
                                    <span class="text-muted d-block">Material Code</span>
                                    <strong>{{ $material['code'] }}</strong>
                                </div>
                                <span class="badge bg-success">{{ $material['status'] }}</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <span class="text-muted d-block">Material Name</span>
                            <strong>{{ $material['name'] }}</strong>
                        </div>
                        <div class="mb-3">
                            <span class="text-muted d-block">Category</span>
                            <strong>{{ $material['category'] }}</strong>
                        </div>
                        <div class="mb-3">
                            <span class="text-muted d-block">Description</span>
                            <p>{{ $material['description'] }}</p>
                        </div>
                        <div class="mb-3">
                            <span class="text-muted d-block">Primary Supplier</span>
                            <strong>{{ $material['supplier'] }}</strong>
                        </div>
                        <div class="mb-3">
                            <span class="text-muted d-block">Storage Location</span>
                            <strong>{{ $material['location'] }}</strong>
                        </div>
                        <div class="mb-3">
                            <span class="text-muted d-block">Last Updated</span>
                            <strong>{{ $material['last_updated'] }}</strong>
                        </div>
                    </div>
                </div>
                
                <!-- Cost Information Card -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Cost Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <span class="text-muted d-block">Unit Cost</span>
                            <strong>{{ $material['cost']['unit_cost'] }} {{ $material['cost']['currency'] }}/{{ $material['unit'] }}</strong>
                        </div>
                        <div class="mb-3">
                            <span class="text-muted d-block">Last Purchase Date</span>
                            <strong>{{ $material['cost']['last_purchase_date'] }}</strong>
                        </div>
                        <div class="mb-3">
                            <span class="text-muted d-block">Last Purchase Price</span>
                            <strong>{{ $material['cost']['last_purchase_price'] }} {{ $material['cost']['currency'] }}/{{ $material['unit'] }}</strong>
                        </div>
                        <div class="mb-3">
                            <span class="text-muted d-block">Average Cost (Last 3 Months)</span>
                            <strong>{{ $material['cost']['average_cost'] }} {{ $material['cost']['currency'] }}/{{ $material['unit'] }}</strong>
                        </div>
                        <div class="mb-3">
                            <span class="text-muted d-block">Current Inventory Value</span>
                            <strong>{{ number_format($material['stock'] * $material['cost']['unit_cost'], 2) }} {{ $material['cost']['currency'] }}</strong>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Stock Information Card -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Stock Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <span class="text-muted d-block">Current Stock</span>
                                    <div class="h1">{{ number_format($material['stock']) }} {{ $material['unit'] }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <span class="text-muted d-block">Reorder Level</span>
                                    <div class="h3">{{ number_format($material['reorder_level']) }} {{ $material['unit'] }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="progress mb-3">
                            @php
                            $stockPercentage = min(100, ($material['stock'] / ($material['reorder_level'] * 3)) * 100);
                            $progressClass = 'bg-success';
                            
                            if ($stockPercentage < 30) {
                                $progressClass = 'bg-danger';
                            } elseif ($stockPercentage < 60) {
                                $progressClass = 'bg-warning';
                            }
                            @endphp
                            
                            <div class="progress-bar {{ $progressClass }}" style="width: {{ $stockPercentage }}%" role="progressbar" aria-valuenow="{{ $stockPercentage }}" aria-valuemin="0" aria-valuemax="100" aria-label="Stock Level">
                                <span class="visually-hidden">{{ $stockPercentage }}% Stock Level</span>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <button class="btn btn-primary">
                                    <i class="ti ti-plus me-1"></i> Add Stock
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-outline-primary">
                                    <i class="ti ti-minus me-1"></i> Adjust Stock
                                </button>
                            </div>
                        </div>
                        
                        <!-- Stock History Chart -->
                        <div class="mt-4">
                            <h4>Stock History (Last 30 Days)</h4>
                            <div id="stock-history-chart" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Technical Specifications Card -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Technical Specifications</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Physical Properties</h4>
                                <table class="table table-vcenter">
                                    <tbody>
                                        @foreach($material['specifications'] as $key => $value)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td>{{ $value }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4>Chemical Properties</h4>
                                <table class="table table-vcenter">
                                    <tbody>
                                        @foreach($material['quality_parameters'] as $key => $value)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td>{{ $value }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Usage History Card -->
            <div class="col-lg-6 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usage History</h3>
                    </div>
                    <div class="card-body">
                        <div id="usage-history-chart" style="height: 250px;"></div>
                        <div class="table-responsive mt-3">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Quantity</th>
                                        <th>Batch</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($material['usage_history'] as $usage)
                                    <tr>
                                        <td>{{ $usage['date'] }}</td>
                                        <td>{{ number_format($usage['quantity']) }} {{ $material['unit'] }}</td>
                                        <td>{{ $usage['batch'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-link">View All Usage History</a>
                    </div>
                </div>
            </div>
            
            <!-- Receiving History Card -->
            <div class="col-lg-6 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Receiving History</h3>
                    </div>
                    <div class="card-body">
                        <div id="receiving-history-chart" style="height: 250px;"></div>
                        <div class="table-responsive mt-3">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Quantity</th>
                                        <th>PO Number</th>
                                        <th>Supplier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($material['receiving_history'] as $receiving)
                                    <tr>
                                        <td>{{ $receiving['date'] }}</td>
                                        <td>{{ number_format($receiving['quantity']) }} {{ $material['unit'] }}</td>
                                        <td>{{ $receiving['po'] }}</td>
                                        <td>{{ $receiving['supplier'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-link">View All Receiving History</a>
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
        // Stock History Chart
        var stockHistoryOptions = {
            series: [{
                name: 'Stock Level',
                data: [12500, 13200, 14500, 13800, 12900, 11700, 10500, 9800, 8600, 7400, 
                       6200, 5000, 9000, 8500, 7800, 7200, 6500, 5800, 5100, 4400, 
                       3700, 3000, 7500, 6800, 6100, 5400, 4700, 4000, 10800, 15800]
            }],
            chart: {
                height: 250,
                type: 'line',
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            grid: {
                row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: Array.from({length: 30}, (_, i) => {
                    const date = new Date();
                    date.setDate(date.getDate() - 29 + i);
                    return date.toLocaleDateString('en-US', {month: 'short', day: 'numeric'});
                }),
                labels: {
                    rotate: -45,
                    style: {
                        fontSize: '10px'
                    }
                }
            },
            yaxis: {
                                title: {
                    text: 'Quantity (kg)'
                }
            },
            colors: ['#206bc4'],
            markers: {
                size: 4
            }
        };

        var stockHistoryChart = new ApexCharts(document.querySelector("#stock-history-chart"), stockHistoryOptions);
        stockHistoryChart.render();

        // Usage History Chart
        var usageHistoryOptions = {
            series: [{
                name: 'Usage',
                data: [1250, 1400, 1350, 1500, 1200]
            }],
            chart: {
                type: 'bar',
                height: 250,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: false,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['Oct 11', 'Oct 12', 'Oct 13', 'Oct 14', 'Oct 15'],
            },
            yaxis: {
                title: {
                    text: 'Quantity (kg)'
                }
            },
            colors: ['#4299e1']
        };

        var usageHistoryChart = new ApexCharts(document.querySelector("#usage-history-chart"), usageHistoryOptions);
        usageHistoryChart.render();

        // Receiving History Chart
        var receivingHistoryOptions = {
            series: [{
                name: 'Received',
                data: [8000, 10000, 5000]
            }],
            chart: {
                type: 'bar',
                height: 250,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: false,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['Sep 25', 'Oct 05', 'Oct 15'],
            },
            yaxis: {
                title: {
                    text: 'Quantity (kg)'
                }
            },
            colors: ['#2fb344']
        };

        var receivingHistoryChart = new ApexCharts(document.querySelector("#receiving-history-chart"), receivingHistoryOptions);
        receivingHistoryChart.render();
    });
</script>
@endsection

               
