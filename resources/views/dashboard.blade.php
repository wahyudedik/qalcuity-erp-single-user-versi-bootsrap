@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                    <div class="text-muted mt-1">Welcome to Qalcuity ERP System</div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <a href="#" class="btn">
                                <i class="ti ti-calendar me-2"></i> Today: {{ date('d M Y') }}
                            </a>
                        </span>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus me-2"></i> New Project
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon">
                            <i class="ti ti-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <!-- Stats Cards -->
            <div class="row row-deck row-cards mb-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Total Sales</div>
                                <div class="ms-auto lh-1">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">Today</a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item active" href="#">Today</a>
                                            <a class="dropdown-item" href="#">This Week</a>
                                            <a class="dropdown-item" href="#">This Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">Rp 75,600,000</div>
                            <div class="d-flex mb-2">
                                <div>Conversion rate</div>
                                <div class="ms-auto">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        7% <i class="ti ti-trending-up ms-1"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                                    <span class="visually-hidden">75% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Production Volume</div>
                                <div class="ms-auto lh-1">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">Today</a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item active" href="#">Today</a>
                                            <a class="dropdown-item" href="#">This Week</a>
                                            <a class="dropdown-item" href="#">This Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">245 m³</div>
                            <div class="d-flex mb-2">
                                <div>Capacity utilization</div>
                                <div class="ms-auto">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        9% <i class="ti ti-trending-up ms-1"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-blue" style="width: 82%" role="progressbar" aria-valuenow="82"
                                    aria-valuemin="0" aria-valuemax="100" aria-label="82% Complete">
                                    <span class="visually-hidden">82% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Active Deliveries</div>
                                <div class="ms-auto lh-1">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">Today</a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item active" href="#">Today</a>
                                            <a class="dropdown-item" href="#">This Week</a>
                                            <a class="dropdown-item" href="#">This Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">18</div>
                            <div class="d-flex mb-2">
                                <div>On-time delivery rate</div>
                                <div class="ms-auto">
                                    <span class="text-yellow d-inline-flex align-items-center lh-1">
                                        0% <i class="ti ti-minus ms-1"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-red" style="width: 95%" role="progressbar"
                                    aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" aria-label="95% Complete">
                                    <span class="visually-hidden">95% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader">Quality Score</div>
                                <div class="ms-auto lh-1">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">This Week</a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item active" href="#">This Week</a>
                                            <a class="dropdown-item" href="#">This Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h1 mb-3">92.8%</div>
                            <div class="d-flex mb-2">
                                <div>Pass rate</div>
                                <div class="ms-auto">
                                    <span class="text-green d-inline-flex align-items-center lh-1">
                                        4% <i class="ti ti-trending-up ms-1"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" style="width: 93%" role="progressbar"
                                    aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" aria-label="93% Complete">
                                    <span class="visually-hidden">93% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Production Chart -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Production Overview</h3>
                        </div>
                        <div class="card-body">
                            <div id="production-chart" style="height: 20rem;"></div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent Activities</h3>
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="status-dot status-dot-animated bg-green d-block"></span>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Batch #45782 completed</a>
                                        <div class="d-block text-muted text-truncate mt-n1">
                                            Quality test passed with 95% score
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="list-group-item-actions">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="status-dot status-dot-animated bg-red d-block"></span>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Mixer #3 maintenance alert</a>
                                        <div class="d-block text-muted text-truncate mt-n1">
                                            Scheduled maintenance required
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="list-group-item-actions">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="status-dot status-dot-animated bg-yellow d-block"></span>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">New order #ORD-7845</a>
                                        <div class="d-block text-muted text-truncate mt-n1">
                                            PT. Konstruksi Jaya - 120 m³ for Project Gedung A
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="list-group-item-actions">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="status-dot status-dot-animated bg-blue d-block"></span>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Delivery completed</a>
                                        <div class="d-block text-muted text-truncate mt-n1">
                                            Truck #TR-12 delivered order #ORD-7842
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="list-group-item-actions">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="status-dot status-dot-animated bg-green d-block"></span>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Raw material received</a>
                                        <div class="d-block text-muted text-truncate mt-n1">
                                            25 tons of cement received from Supplier A
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class="list-group-item-actions">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <!-- Upcoming Deliveries -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Upcoming Deliveries</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Volume</th>
                                        <th>Delivery Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ORD-7846</td>
                                        <td>PT. Bangun Perkasa</td>
                                        <td>85 m³</td>
                                        <td>Today, 14:30</td>
                                        <td><span class="badge bg-yellow">Preparing</span></td>
                                    </tr>
                                    <tr>
                                        <td>ORD-7847</td>
                                        <td>CV. Maju Jaya</td>
                                        <td>45 m³</td>
                                        <td>Today, 16:00</td>
                                        <td><span class="badge bg-blue">Scheduled</span></td>
                                    </tr>
                                    <tr>
                                        <td>ORD-7848</td>
                                        <td>PT. Konstruksi Utama</td>
                                        <td>120 m³</td>
                                        <td>Tomorrow, 08:00</td>
                                        <td><span class="badge bg-blue">Scheduled</span></td>
                                    </tr>
                                    <tr>
                                        <td>ORD-7849</td>
                                        <td>PT. Beton Sejahtera</td>
                                        <td>65 m³</td>
                                        <td>Tomorrow, 10:30</td>
                                        <td><span class="badge bg-blue">Scheduled</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Inventory Status -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Inventory Status</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Material</th>
                                        <th>Current Stock</th>
                                        <th>Unit</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cement (OPC)</td>
                                        <td>85</td>
                                        <td>Tons</td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-start mt-1">
                                                    <span>65%</span>
                                                </div>
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-green" style="width: 65%"></div>
                                            </div>
                                        </td>
                                        <td><a href="#" class="btn btn-sm btn-primary">Order</a></td>
                                    </tr>
                                    <tr>
                                        <td>Sand</td>
                                        <td>120</td>
                                        <td>m³</td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-start mt-1">
                                                    <span>82%</span>
                                                </div>
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-green" style="width: 82%"></div>
                                            </div>
                                        </td>
                                        <td><a href="#" class="btn btn-sm btn-outline-primary">Order</a></td>
                                    </tr>
                                    <tr>
                                        <td>Aggregate (20mm)</td>
                                        <td>45</td>
                                        <td>m³</td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-start mt-1">
                                                    <span>25%</span>
                                                </div>
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-red" style="width: 25%"></div>
                                            </div>
                                        </td>
                                        <td><a href="#" class="btn btn-sm btn-primary">Order</a></td>
                                    </tr>
                                    <tr>
                                        <td>Admixture</td>
                                        <td>350</td>
                                        <td>Liters</td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-start mt-1">
                                                    <span>45%</span>
                                                </div>
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-yellow" style="width: 45%"></div>
                                            </div>
                                        </td>
                                        <td><a href="#" class="btn btn-sm btn-primary">Order</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.35.3/dist/apexcharts.min.js"></script>
    <script>
        // Production Chart
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                series: [{
                    name: 'Production Volume',
                    data: [180, 220, 205, 250, 230, 245, 260]
                }],
                chart: {
                    type: 'bar',
                    height: 320,
                    toolbar: {
                        show: false,
                    }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 3,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val + " m³";
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#304758"]
                    }
                },
                xaxis: {
                    categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Today"],
                    position: 'bottom',
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#D8E3F0',
                                colorTo: '#BED1E6',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                    }
                },
                yaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: true,
                        formatter: function(val) {
                            return val + " m³";
                        }
                    }
                },
                colors: ['#206bc4']
            };

            var chart = new ApexCharts(document.querySelector("#production-chart"), options);
            chart.render();
        });

        // Show welcome message
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Welcome to Dashboard!',
                text: 'You are now logged in to Qalcuity ERP System',
                icon: 'success',
                confirmButtonColor: '#206bc4',
                timer: 3000,
                timerProgressBar: true
            });
        });
    </script>
@endsection
