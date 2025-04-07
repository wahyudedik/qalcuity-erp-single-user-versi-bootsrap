@extends('layouts.app')

@section('title', 'Maintenance Record Detail')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Maintenance Record Detail
                </h2>
                <div class="text-muted mt-1">Viewing maintenance record MNT-2023-{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('production.machine-maintenance.edit', $id) }}" class="btn btn-primary">
                        <i class="ti ti-edit me-2"></i>
                        Edit Record
                    </a>
                    <a href="#" class="btn btn-outline-primary" onclick="window.print();">
                        <i class="ti ti-printer me-2"></i>
                        Print Record
                    </a>
                    <a href="{{ route('production.machine-maintenance') }}" class="btn">
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
        <div class="row row-cards">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Maintenance Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Maintenance ID</div>
                                <div class="datagrid-content">MNT-2023-{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Machine</div>
                                <div class="datagrid-content">Batch Plant A</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Machine Serial Number</div>
                                <div class="datagrid-content">BP-2018-A-45678</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Maintenance Type</div>
                                <div class="datagrid-content">Preventive</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Maintenance Date</div>
                                <div class="datagrid-content">{{ date('Y-m-d', strtotime("-" . rand(1, 30) . " days")) }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Status</div>
                                <div class="datagrid-content">
                                    <span class="badge bg-success">Completed</span>
                                </div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Technician</div>
                                <div class="datagrid-content">John Smith</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Duration</div>
                                <div class="datagrid-content">4 hours</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Cost</div>
                                <div class="datagrid-content">Rp 2.500.000</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Parts Replaced</div>
                                <div class="datagrid-content">Mixer Belt, Hydraulic Fluid, Filter</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Maintenance Description</h3>
                    </div>
                    <div class="card-body">
                        <p>Scheduled preventive maintenance for Batch Plant A. The following tasks were performed:</p>
                        <ul>
                            <li>Replaced worn mixer belt with new one</li>
                            <li>Changed hydraulic fluid and filter</li>
                            <li>Inspected and cleaned all electrical connections</li>
                            <li>Calibrated weighing system</li>
                            <li>Lubricated all moving parts</li>
                            <li>Checked and adjusted belt tension</li>
                            <li>Tested emergency stop system</li>
                        </ul>
                        <p>All systems are functioning properly after maintenance. Recommended to schedule next preventive maintenance in 3 months.</p>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Maintenance History</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Technician</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $types = ['Preventive', 'Corrective', 'Routine'];
                                    $technicians = ['John Smith', 'Maria Rodriguez', 'Ahmed Hassan'];
                                    $descriptions = [
                                        'Regular maintenance and inspection',
                                        'Replaced worn parts and lubricated',
                                        'Fixed hydraulic system issue',
                                        'Calibrated weighing system',
                                        'Emergency repair of mixer motor'
                                    ];
                                @endphp

                                @for ($i = 1; $i <= 5; $i++)
                                    @php
                                        $date = date('Y-m-d', strtotime("-" . ($i * 60 + rand(1, 30)) . " days"));
                                        $type = $types[array_rand($types)];
                                        $technician = $technicians[array_rand($technicians)];
                                        $description = $descriptions[array_rand($descriptions)];
                                    @endphp
                                    <tr>
                                        <td>{{ $date }}</td>
                                        <td>{{ $type }}</td>
                                        <td>{{ $technician }}</td>
                                        <td>{{ $description }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Machine Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Machine Type</div>
                                <div class="datagrid-content">Batch Plant</div>
                            </div>
                                                        <div class="datagrid-item">
                                <div class="datagrid-title">Model</div>
                                <div class="datagrid-content">ConcreteMax 3000</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Manufacturer</div>
                                <div class="datagrid-content">Liebherr</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Year</div>
                                <div class="datagrid-content">2018</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Capacity</div>
                                <div class="datagrid-content">120 m³/hour</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Location</div>
                                <div class="datagrid-content">Main Plant, Jakarta</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Last Inspection</div>
                                <div class="datagrid-content">{{ date('Y-m-d', strtotime("-45 days")) }}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Next Scheduled Maintenance</div>
                                <div class="datagrid-content">{{ date('Y-m-d', strtotime("+45 days")) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Maintenance Metrics</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-baseline">
                            <div class="h1 mb-0 me-2">87.5%</div>
                            <div class="me-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    8% <i class="ti ti-trending-up"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mt-1">
                            <div class="text-muted">Operational Efficiency</div>
                        </div>
                        <div class="progress mt-3">
                            <div class="progress-bar bg-primary" style="width: 87.5%" role="progressbar" aria-valuenow="87.5" aria-valuemin="0" aria-valuemax="100" aria-label="87.5% Complete">
                                <span class="visually-hidden">87.5% Complete</span>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-baseline mt-4">
                            <div class="h1 mb-0 me-2">98.2%</div>
                            <div class="me-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    2% <i class="ti ti-trending-up"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mt-1">
                            <div class="text-muted">Uptime</div>
                        </div>
                        <div class="progress mt-3">
                            <div class="progress-bar bg-green" style="width: 98.2%" role="progressbar" aria-valuenow="98.2" aria-valuemin="0" aria-valuemax="100" aria-label="98.2% Complete">
                                <span class="visually-hidden">98.2% Complete</span>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-baseline mt-4">
                            <div class="h1 mb-0 me-2">12</div>
                            <div class="me-auto">
                                <span class="text-red d-inline-flex align-items-center lh-1">
                                    +2 <i class="ti ti-trending-up"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mt-1">
                            <div class="text-muted">MTTR (Hours)</div>
                        </div>
                        
                        <div class="d-flex align-items-baseline mt-4">
                            <div class="h1 mb-0 me-2">1250</div>
                            <div class="me-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    +150 <i class="ti ti-trending-up"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mt-1">
                            <div class="text-muted">MTBF (Hours)</div>
                        </div>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Attachments</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item py-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ti ti-file-text text-primary fs-2"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="font-weight-medium">Maintenance Report.pdf</div>
                                        <div class="text-muted">2.4 MB</div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-icon btn-sm">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item py-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ti ti-photo text-primary fs-2"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="font-weight-medium">Before Maintenance.jpg</div>
                                        <div class="text-muted">1.8 MB</div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-icon btn-sm">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item py-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ti ti-photo text-primary fs-2"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="font-weight-medium">After Maintenance.jpg</div>
                                        <div class="text-muted">1.7 MB</div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-icon btn-sm">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item py-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ti ti-file-spreadsheet text-primary fs-2"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="font-weight-medium">Parts Inventory.xlsx</div>
                                        <div class="text-muted">0.5 MB</div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-icon btn-sm">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

