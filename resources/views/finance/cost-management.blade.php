@extends('layouts.app')

@section('title', 'Cost Management')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Cost Management
                    </h2>
                    <div class="text-muted mt-1">Manage and analyze all company expenses</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-add-cost">
                            <i class="ti ti-plus"></i>
                            Add New Cost
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none" data-bs-toggle="modal"
                            data-bs-target="#modal-add-cost">
                            <i class="ti ti-plus"></i>
                        </a>
                        <a href="#" class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-file-export"></i>
                            Export
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <!-- Cost Summary Cards -->
                <div class="col-12">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-primary text-white avatar">
                                                <i class="ti ti-building-factory"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Production Costs
                                            </div>
                                            <div class="text-muted">
                                                Rp 1,250,000,000
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-green text-white avatar">
                                                <i class="ti ti-truck-delivery"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Operational Costs
                                            </div>
                                            <div class="text-muted">
                                                Rp 750,000,000
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-yellow text-white avatar">
                                                <i class="ti ti-users"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Administrative Costs
                                            </div>
                                            <div class="text-muted">
                                                Rp 350,000,000
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-red text-white avatar">
                                                <i class="ti ti-cash"></i>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Total Costs
                                            </div>
                                            <div class="text-muted">
                                                Rp 2,350,000,000
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cost Breakdown Chart -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cost Breakdown</h3>
                        </div>
                        <div class="card-body">
                            <div id="cost-breakdown-chart" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Cost Trend -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Monthly Cost Trend</h3>
                        </div>
                        <div class="card-body">
                            <div id="monthly-cost-trend" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <!-- Cost Categories -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cost Categories</h3>
                            <div class="card-actions">
                                <div class="row g-2">
                                    <div class="col">
                                        <div class="input-icon">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-search"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Search categories...">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select">
                                            <option value="all">All Categories</option>
                                            <option value="production">Production</option>
                                            <option value="operational">Operational</option>
                                            <option value="administrative">Administrative</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Budget</th>
                                        <th>Actual</th>
                                        <th>Variance</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $costCategories = [
                                            [
                                                'id' => 1,
                                                'category' => 'Raw Materials',
                                                'type' => 'Production',
                                                'budget' => 800000000,
                                                'actual' => 825000000,
                                                'variance' => -25000000,
                                                'status' => 'Over Budget',
                                            ],
                                            [
                                                'id' => 2,
                                                'category' => 'Labor',
                                                'type' => 'Production',
                                                'budget' => 425000000,
                                                'actual' => 410000000,
                                                'variance' => 15000000,
                                                'status' => 'Under Budget',
                                            ],
                                            [
                                                'id' => 3,
                                                'category' => 'Fuel & Transportation',
                                                'type' => 'Operational',
                                                'budget' => 350000000,
                                                'actual' => 375000000,
                                                'variance' => -25000000,
                                                'status' => 'Over Budget',
                                            ],
                                            [
                                                'id' => 4,
                                                'category' => 'Equipment Maintenance',
                                                'type' => 'Operational',
                                                'budget' => 200000000,
                                                'actual' => 180000000,
                                                'variance' => 20000000,
                                                'status' => 'Under Budget',
                                            ],
                                            [
                                                'id' => 5,
                                                'category' => 'Utilities',
                                                'type' => 'Operational',
                                                'budget' => 175000000,
                                                'actual' => 195000000,
                                                'variance' => -20000000,
                                                'status' => 'Over Budget',
                                            ],
                                            [
                                                'id' => 6,
                                                'category' => 'Salaries & Benefits',
                                                'type' => 'Administrative',
                                                'budget' => 250000000,
                                                'actual' => 245000000,
                                                'variance' => 5000000,
                                                'status' => 'Under Budget',
                                            ],
                                            [
                                                'id' => 7,
                                                'category' => 'Office Expenses',
                                                'type' => 'Administrative',
                                                'budget' => 75000000,
                                                'actual' => 70000000,
                                                'variance' => 5000000,
                                                'status' => 'Under Budget',
                                            ],
                                            [
                                                'id' => 8,
                                                'category' => 'Marketing & Advertising',
                                                'type' => 'Administrative',
                                                'budget' => 50000000,
                                                'actual' => 35000000,
                                                'variance' => 15000000,
                                                'status' => 'Under Budget',
                                            ],
                                        ];
                                    @endphp

                                    @foreach ($costCategories as $category)
                                        <tr>
                                            <td>{{ $category['category'] }}</td>
                                            <td>{{ $category['type'] }}</td>
                                            <td>Rp {{ number_format($category['budget'], 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($category['actual'], 0, ',', '.') }}</td>
                                            <td class="{{ $category['variance'] >= 0 ? 'text-green' : 'text-red' }}">
                                                {{ $category['variance'] >= 0 ? '+' : '' }}Rp
                                                {{ number_format($category['variance'], 0, ',', '.') }}
                                            </td>
                                            <td>
                                                <span
                                                    class="badge {{ $category['variance'] >= 0 ? 'bg-green' : 'bg-red' }}">
                                                    {{ $category['status'] }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="#" class="btn btn-sm btn-outline-primary"
                                                        data-bs-toggle="modal" data-bs-target="#modal-view-details"
                                                        data-id="{{ $category['id'] }}">
                                                        Details
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Recent Cost Transactions -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent Cost Transactions</h3>
                            <div class="card-actions">
                                <a href="#" class="btn btn-outline-primary btn-sm">
                                    View All Transactions
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Amount</th>
                                        <th>Recorded By</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $transactions = [];
                                        $descriptions = [
                                            'Purchase of cement',
                                            'Diesel fuel for trucks',
                                            'Monthly electricity bill',
                                            'Equipment repair',
                                            'Staff salaries',
                                            'Office supplies',
                                            'Aggregate materials',
                                            'Plant maintenance',
                                            'Water supply bill',
                                            'Vehicle insurance',
                                        ];
                                        $categories = [
                                            'Raw Materials',
                                            'Fuel & Transportation',
                                            'Utilities',
                                            'Equipment Maintenance',
                                            'Salaries & Benefits',
                                            'Office Expenses',
                                        ];
                                        $users = ['Ahmad Fauzi', 'Siti Rahayu', 'Budi Santoso', 'Dewi Lestari'];

                                        // Generate 10 random transactions
                                        for ($i = 1; $i <= 10; $i++) {
                                            $date = date('Y-m-d', strtotime('-' . rand(0, 30) . ' days'));
                                            $transactions[] = [
                                                'id' => 'TRX-' . date('Ymd') . '-' . sprintf('%04d', $i),
                                                'date' => $date,
                                                'description' => $descriptions[array_rand($descriptions)],
                                                'category' => $categories[array_rand($categories)],
                                                'amount' => rand(1000000, 50000000),
                                                'recorded_by' => $users[array_rand($users)],
                                            ];
                                        }

                                        // Sort by date (newest first)
                                        usort($transactions, function ($a, $b) {
                                            return strtotime($b['date']) - strtotime($a['date']);
                                        });
                                    @endphp

                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction['id'] }}</td>
                                            <td>{{ date('d M Y', strtotime($transaction['date'])) }}</td>
                                            <td>{{ $transaction['description'] }}</td>
                                            <td>{{ $transaction['category'] }}</td>
                                            <td>Rp {{ number_format($transaction['amount'], 0, ',', '.') }}</td>
                                            <td>{{ $transaction['recorded_by'] }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                        type="button" data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-eye me-2"></i>
                                                            View Details
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="ti ti-edit me-2"></i>
                                                            Edit
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="ti ti-trash me-2"></i>
                                                            Delete
                                                        </a>
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
    </div>

    <!-- Add New Cost Modal -->
    <div class="modal modal-blur fade" id="modal-add-cost" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Cost</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Cost Category</label>
                        <select class="form-select">
                            <option value="">Select a category</option>
                            @foreach ($costCategories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['category'] }}
                                    ({{ $category['type'] }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Amount</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" placeholder="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter cost description"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Payment Method</label>
                                <select class="form-select">
                                    <option value="cash">Cash</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                    <option value="credit">Credit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Reference Number</label>
                                <input type="text" class="form-control" placeholder="Invoice/Receipt number">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Attach Receipt</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" rows="2" placeholder="Additional notes"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary ms-auto">
                        <i class="ti ti-plus"></i>
                        Add Cost
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Cost Details Modal -->
    <div class="modal modal-blur fade" id="modal-view-details" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cost Category Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h3 class="category-name">Raw Materials</h3>
                            <p class="text-muted category-type">Production</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <span class="badge bg-red">Over Budget</span>
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                                    <div class="text-muted mb-1">Budget</div>
                                    <div class="h3 m-0">Rp 800,000,000</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                                    <div class="text-muted mb-1">Actual</div>
                                    <div class="h3 m-0">Rp 825,000,000</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                                    <div class="text-muted mb-1">Variance</div>
                                    <div class="h3 m-0 text-red">-Rp 25,000,000</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="card-title">Monthly Breakdown</h4>
                        </div>
                        <div class="card-body">
                            <div id="category-monthly-chart" style="height: 250px;"></div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Recent Transactions</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Reference</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>15 Aug 2023</td>
                                        <td>Purchase of cement</td>
                                        <td>Rp 125,000,000</td>
                                        <td>INV-20230815-001</td>
                                    </tr>
                                    <tr>
                                        <td>10 Aug 2023</td>
                                        <td>Aggregate materials</td>
                                        <td>Rp 85,000,000</td>
                                        <td>INV-20230810-003</td>
                                    </tr>
                                    <tr>
                                        <td>05 Aug 2023</td>
                                        <td>Steel reinforcement</td>
                                        <td>Rp 110,000,000</td>
                                        <td>INV-20230805-002</td>
                                    </tr>
                                    <tr>
                                        <td>01 Aug 2023</td>
                                        <td>Admixtures and additives</td>
                                        <td>Rp 45,000,000</td>
                                        <td>INV-20230801-005</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        <i class="ti ti-edit"></i>
                        Edit Budget
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- ApexCharts JS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cost Breakdown Chart
            var costBreakdownOptions = {
                series: [53.2, 31.9, 14.9],
                chart: {
                    type: 'donut',
                    height: 300
                },
                labels: ['Production', 'Operational', 'Administrative'],
                colors: ['#206bc4', '#4eac5b', '#f59f00'],
                legend: {
                    position: 'bottom'
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '50%',
                            labels: {
                                show: true,
                                name: {
                                    show: true
                                },
                                value: {
                                    show: true,
                                    formatter: function(val) {
                                        return 'Rp ' + val.toLocaleString('id-ID');
                                    }
                                },
                                total: {
                                    show: true,
                                    label: 'Total',
                                    formatter: function(w) {
                                        return 'Rp 2,350,000,000';
                                    }
                                }
                            }
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return 'Rp ' + val.toLocaleString('id-ID');
                        }
                    }
                }
            };

            var costBreakdownChart = new ApexCharts(document.querySelector("#cost-breakdown-chart"),
                costBreakdownOptions);
            costBreakdownChart.render();

            // Monthly Cost Trend Chart
            var monthlyTrendOptions = {
                series: [{
                    name: 'Production',
                    data: [180, 190, 210, 205, 220, 235, 240]
                }, {
                    name: 'Operational',
                    data: [100, 110, 105, 115, 110, 105, 120]
                }, {
                    name: 'Administrative',
                    data: [50, 45, 55, 50, 55, 60, 55]
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                    stacked: true,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '60%',
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                },
                yaxis: {
                    labels: {
                        formatter: function(val) {
                            return 'Rp ' + (val / 1000000) + ' M';
                        }
                    }
                },
                legend: {
                    position: 'top'
                },
                fill: {
                    opacity: 1
                },
                colors: ['#206bc4', '#4eac5b', '#f59f00'],
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return 'Rp ' + val.toLocaleString('id-ID');
                        }
                    }
                }
            };

            var monthlyTrendChart = new ApexCharts(document.querySelector("#monthly-cost-trend"),
                monthlyTrendOptions);
            monthlyTrendChart.render();

            // Category Monthly Chart (for modal)
            var categoryMonthlyOptions = {
                series: [{
                    name: 'Budget',
                    data: [110, 115, 120, 115, 125, 110, 105]
                }, {
                    name: 'Actual',
                    data: [105, 120, 125, 110, 130, 120, 115]
                }],
                chart: {
                    type: 'line',
                    height: 250,
                    toolbar: {
                        show: false
                    }
                },
                stroke: {
                    width: [3, 3],
                    curve: 'smooth'
                },
                grid: {
                    borderColor: '#e9ecef',
                },
                xaxis: {
                    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                },
                yaxis: {
                    labels: {
                        formatter: function(val) {
                            return 'Rp ' + (val / 1000000) + ' M';
                        }
                    }
                },
                legend: {
                    position: 'top'
                },
                colors: ['#206bc4', '#f76707'],
                markers: {
                    size: 4
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return 'Rp ' + val.toLocaleString('id-ID');
                        }
                    }
                }
            };

            var categoryMonthlyChart = new ApexCharts(document.querySelector("#category-monthly-chart"),
                categoryMonthlyOptions);
            categoryMonthlyChart.render();

            // Handle modal data
            var viewDetailsModal = document.getElementById('modal-view-details');
            if (viewDetailsModal) {
                viewDetailsModal.addEventListener('show.bs.modal', function(event) {
                    var button = event.relatedTarget;
                    var categoryId = button.getAttribute('data-id');

                    // Here you would typically fetch the data for the specific category
                    // For demo purposes, we're just using static data

                    // You could update the modal content based on the category ID
                    // For example:
                    // var categoryData = getCategoryData(categoryId);
                    // document.querySelector('.category-name').textContent = categoryData.name;
                    // etc.
                });
            }
        });
    </script>
@endsection
