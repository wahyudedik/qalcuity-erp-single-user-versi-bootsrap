@extends('layouts.app')

@section('title', 'Branch Details')

@section('content')
    @php
        $branches = [
            1 => [
                'id' => 1,
                'code' => 'JKT-001',
                'name' => 'Jakarta Utara Plant',
                'location' => 'Jakarta Utara, DKI Jakarta',
                'address' => 'Jl. Industri Raya No. 123, Kawasan Industri Pulogadung, Jakarta Utara',
                'manager' => 'Budi Santoso',
                'phone' => '(021) 5678-9012',
                'email' => 'jakarta.utara@qalcuity.com',
                'status' => 'Active',
                'capacity' => '120 m³/hour',
                'established' => '2015-03-15',
                'employees' => 45,
                'mixers' => 12,
                'pumps' => 8,
                'area' => '15,000 m²',
                'monthly_production' => '18,500 m³',
                'monthly_revenue' => 'Rp 9,250,000,000',
                'operational_cost' => 'Rp 6,800,000,000',
                'profit_margin' => '26.5%',
                'quality_rating' => '4.8/5.0',
                'certifications' => ['ISO 9001:2015', 'ISO 14001:2015', 'OHSAS 18001:2007'],
                'main_customers' => ['PT Pembangunan Jaya', 'PT Wijaya Karya', 'PT Total Bangun Persada'],
            ],
            // Other branches would be defined here
        ];

        $branch = $branches[$id] ?? null;
    @endphp

    @if(!$branch)
        <div class="container-xl">
            <div class="empty">
                <div class="empty-icon">
                    <i class="ti ti-alert-circle"></i>
                </div>
                <p class="empty-title">Branch not found</p>
                <p class="empty-subtitle text-muted">
                    The branch you are looking for does not exist or has been removed.
                </p>
                <div class="empty-action">
                    <a href="{{ route('branches.index') }}" class="btn btn-primary">
                        <i class="ti ti-arrow-left"></i>
                        Back to Branch List
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">Branch Details</div>
                        <h2 class="page-title">{{ $branch['name'] }}</h2>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="{{ route('branches.index') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                                <i class="ti ti-arrow-left"></i>
                                Back to Branches
                            </a>
                            <a href="{{ route('branches.edit', $branch['id']) }}"
                                class="btn btn-primary d-none d-sm-inline-block">
                                <i class="ti ti-edit"></i>
                                Edit Branch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar avatar-lg me-3" style="background-color: #206bc4; color: #fff">
                                        <span class="avatar-text">{{ substr($branch['name'], 0, 2) }}</span>
                                    </div>
                                    <div>
                                        <h3 class="mb-0">{{ $branch['name'] }}</h3>
                                        <div class="text-muted">{{ $branch['code'] }}</div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="mb-2">
                                        <span
                                            class="badge bg-{{ $branch['status'] == 'Active' ? 'success' : ($branch['status'] == 'Maintenance' ? 'warning' : 'danger') }} me-1"></span>
                                        {{ $branch['status'] }}
                                    </div>

                                    <div class="datagrid mb-3">
                                        <div class="datagrid-item">
                                            <div class="datagrid-title">Location</div>
                                            <div class="datagrid-content">{{ $branch['location'] }}</div>
                                        </div>
                                        <div class="datagrid-item">
                                            <div class="datagrid-title">Manager</div>
                                            <div class="datagrid-content">{{ $branch['manager'] }}</div>
                                        </div>
                                        <div class="datagrid-item">
                                            <div class="datagrid-title">Phone</div>
                                            <div class="datagrid-content">{{ $branch['phone'] }}</div>
                                        </div>
                                        <div class="datagrid-item">
                                            <div class="datagrid-title">Email</div>
                                            <div class="datagrid-content">{{ $branch['email'] }}</div>
                                        </div>
                                        <div class="datagrid-item">
                                            <div class="datagrid-title">Established</div>
                                            <div class="datagrid-content">{{ $branch['established'] }}</div>
                                        </div>
                                        <div class="datagrid-item">
                                            <div class="datagrid-title">Employees</div>
                                            <div class="datagrid-content">{{ $branch['employees'] }}</div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="datagrid-title">Address</div>
                                        <div class="datagrid-content">{{ $branch['address'] }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Certifications</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    @foreach ($branch['certifications'] as $certification)
                                        <li class="mb-2">
                                            <span class="badge bg-blue me-1">
                                                <i class="ti ti-certificate"></i>
                                            </span>
                                            {{ $certification }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Main Customers</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    @foreach ($branch['main_customers'] as $customer)
                                        <li class="mb-2">
                                            <span class="badge bg-azure me-1">
                                                <i class="ti ti-building"></i>
                                            </span>
                                            {{ $customer }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="row row-cards">
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="subheader">Production Capacity</div>
                                        </div>
                                        <div class="h1 mb-3">{{ $branch['capacity'] }}</div>
                                        <div class="d-flex mb-2">
                                            <div>Utilization</div>
                                            <div class="ms-auto">
                                                <span class="text-green d-inline-flex align-items-center lh-1">
                                                    85% <i class="ti ti-trending-up"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 85%" role="progressbar"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                aria-label="85% Complete">
                                                <span class="visually-hidden">85% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="subheader">Monthly Production</div>
                                        </div>
                                        <div class="h1 mb-3">{{ $branch['monthly_production'] }}</div>
                                        <div class="d-flex mb-2">
                                            <div>vs Last Month</div>
                                            <div class="ms-auto">
                                                <span class="text-green d-inline-flex align-items-center lh-1">
                                                    7.2% <i class="ti ti-trending-up"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 75%" role="progressbar"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                aria-label="75% Complete">
                                                <span class="visually-hidden">75% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="subheader">Quality Rating</div>
                                        </div>
                                        <div class="h1 mb-3">{{ $branch['quality_rating'] }}</div>
                                        <div class="d-flex mb-2">
                                            <div>vs Target (4.5)</div>
                                            <div class="ms-auto">
                                                <span class="text-green d-inline-flex align-items-center lh-1">
                                                    +0.3 <i class="ti ti-trending-up"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" style="width: 96%" role="progressbar"
                                                aria-valuenow="96" aria-valuemin="0" aria-valuemax="100"
                                                aria-label="96% Complete">
                                                <span class="visually-hidden">96% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="subheader">Profit Margin</div>
                                        </div>
                                        <div class="h1 mb-3">{{ $branch['profit_margin'] }}</div>
                                        <div class="d-flex mb-2">
                                            <div>vs Target (25%)</div>
                                            <div class="ms-auto">
                                                <span class="text-green d-inline-flex align-items-center lh-1">
                                                    +1.5% <i class="ti ti-trending-up"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-blue" style="width: 88%" role="progressbar"
                                                aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"
                                                aria-label="88% Complete">
                                                <span class="visually-hidden">88% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Production Performance (Last 6 Months)</h3>
                            </div>
                            <div class="card-body">
                                <div id="chart-production" style="height: 250px;"></div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Equipment</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="datagrid">
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Mixers</div>
                                                <div class="datagrid-content">{{ $branch['mixers'] }}</div>
                                            </div>
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Pumps</div>
                                                <div class="datagrid-content">{{ $branch['pumps'] }}</div>
                                            </div>
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Batching Plants</div>
                                                <div class="datagrid-content">2</div>
                                            </div>
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Loaders</div>
                                                <div class="datagrid-content">4</div>
                                            </div>
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Lab Equipment</div>
                                                <div class="datagrid-content">Complete</div>
                                            </div>
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Maintenance Status</div>
                                                <div class="datagrid-content">
                                                    <span class="status status-green">Good</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Financial Overview</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="datagrid">
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Monthly Revenue</div>
                                                <div class="datagrid-content">{{ $branch['monthly_revenue'] }}</div>
                                            </div>
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Operational Cost</div>
                                                <div class="datagrid-content">{{ $branch['operational_cost'] }}</div>
                                            </div>
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">YTD Revenue</div>
                                                <div class="datagrid-content">Rp 82,450,000,000</div>
                                            </div>
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">YTD Profit</div>
                                                <div class="datagrid-content">Rp 21,837,250,000</div>
                                            </div>
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Budget Utilization</div>
                                                <div class="datagrid-content">
                                                    <div class="d-flex align-items-center">
                                                        <span class="me-2">92%</span>
                                                        <div class="progress progress-sm flex-grow-1">
                                                            <div class="progress-bar bg-blue" style="width: 92%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Cost Efficiency</div>
                                                <div class="datagrid-content">
                                                    <div class="d-flex align-items-center">
                                                        <span class="me-2">87%</span>
                                                        <div class="progress progress-sm flex-grow-1">
                                                            <div class="progress-bar bg-green" style="width: 87%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                series: [{
                    name: 'Production Volume (m³)',
                    data: [14500, 15200, 16800, 17300, 18100, 18500]
                }, {
                    name: 'Target Volume (m³)',
                    data: [15000, 15000, 16000, 17000, 18000, 18000]
                }],
                chart: {
                    height: 250,
                    type: 'line',
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#206bc4', '#f59f00'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                grid: {
                    borderColor: '#e7e7e7',
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                },
                yaxis: {
                    title: {
                        text: 'Volume (m³)'
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " m³"
                        }
                    }
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-production"), options);
            chart.render();
        });
    </script>
@endsection
