@extends('layouts.app')

@section('title', 'Delivery Scheduling')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .status-badge {
        min-width: 100px;
        text-align: center;
        font-weight: 500;
    }
    .table-actions {
        white-space: nowrap;
    }
    .filter-container {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1.5rem;
        border: 1px solid rgba(98, 105, 118, 0.16);
    }
    .card-table tr:hover {
        background-color: rgba(0, 97, 242, 0.03);
    }
    .search-container {
        max-width: 300px;
    }
    .date-range-container {
        max-width: 250px;
    }
    .schedule-id {
        font-weight: 600;
        color: #1e293b;
    }
    .customer-name {
        font-weight: 500;
    }
    .project-name {
        color: #475569;
    }
    .volume-value {
        font-weight: 500;
        text-align: right;
    }
    .mix-design {
        text-align: center;
        font-family: monospace;
        font-size: 0.9rem;
        background-color: #f1f5f9;
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
        display: inline-block;
    }
    .date-time {
        white-space: nowrap;
    }
    .btn-filter {
        border-radius: 30px;
        padding: 0.375rem 1rem;
        font-weight: 500;
    }
    .btn-filter.active {
        background-color: #0d6efd;
        color: white;
    }
    .pagination {
        margin-bottom: 0;
    }
</style>
@endsection

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Delivery Management
                </div>
                <h2 class="page-title">
                    Delivery Scheduling
                </h2>
                <div class="text-muted mt-1">Manage and track concrete delivery schedules</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                    <div class="me-3 d-none d-md-block search-container">
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <i class="ti ti-search"></i>
                            </span>
                            <input type="text" id="search-input" class="form-control" placeholder="Search schedules...">
                        </div>
                    </div>
                    <div class="btn-list">
                        <a href="{{ route('delivery.scheduling.calendar') }}" class="btn btn-outline-primary d-none d-sm-inline-block">
                            <i class="ti ti-calendar me-2"></i>
                            Calendar View
                        </a>
                        <a href="{{ route('delivery.scheduling.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="ti ti-plus me-2"></i>
                            New Schedule
                        </a>
                        <div class="dropdown d-none d-md-inline-block">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical me-2"></i>
                                More
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-file-export me-2"></i>
                                    Export Data
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-printer me-2"></i>
                                    Print Schedule
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-file-import me-2"></i>
                                    Import Data
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <i class="ti ti-settings me-2"></i>
                                    Schedule Settings
                                </a>
                            </div>
                        </div>
                        <a href="{{ route('delivery.scheduling.create') }}" class="btn btn-primary d-sm-none">
                            <i class="ti ti-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="filter-container d-flex flex-wrap align-items-center mb-3">
                <div class="me-3 mb-2">
                    <div class="btn-group">
                        <a href="#" class="btn btn-filter active">All</a>
                        <a href="#" class="btn btn-filter">Scheduled</a>
                        <a href="#" class="btn btn-filter">In Progress</a>
                        <a href="#" class="btn btn-filter">Completed</a>
                        <a href="#" class="btn btn-filter">Cancelled</a>
                    </div>
                </div>
                <div class="ms-auto date-range-container mb-2">
                    <div class="input-icon">
                        <span class="input-icon-addon">
                            <i class="ti ti-calendar"></i>
                        </span>
                        <input type="text" id="date-range" class="form-control" placeholder="Select date range">
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>Schedule ID</th>
                            <th>Customer</th>
                            <th>Project</th>
                            <th>Date & Time</th>
                            <th class="text-end">Volume</th>
                            <th class="text-center">Mix Design</th>
                            <th class="text-center">Status</th>
                            <th class="w-1">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $statuses = ['scheduled', 'in-progress', 'completed', 'cancelled'];
                            $statusBadgeClasses = [
                                'scheduled' => 'bg-blue',
                                'in-progress' => 'bg-yellow',
                                'completed' => 'bg-green',
                                'cancelled' => 'bg-red',
                            ];

                            $customers = [
                                'PT Pembangunan Jaya',
                                'CV Karya Mandiri',
                                'PT Konstruksi Utama',
                                'PT Bangun Persada',
                                'CV Maju Jaya',
                            ];

                            $projects = [
                                'Apartment Tower A',
                                'Office Building B',
                                'Highway Section C',
                                'Shopping Mall D',
                                'Residential Complex E',
                            ];

                            $mixDesigns = ['K-250', 'K-300', 'K-350', 'K-400', 'K-450'];
                        @endphp

                        @for ($i = 1; $i <= 15; $i++)
                                                        @php
                                $status = $statuses[array_rand($statuses)];
                                $date = date('Y-m-d', strtotime('+' . rand(-7, 14) . ' days'));
                                $time = sprintf('%02d:%02d', rand(7, 16), rand(0, 59));
                                $volume = rand(5, 50);
                                $customer = $customers[array_rand($customers)];
                                $project = $projects[array_rand($projects)];
                                $mixDesign = $mixDesigns[array_rand($mixDesigns)];
                            @endphp
                            <tr>
                                <td>
                                    <span class="schedule-id">SCH-{{ 1000 + $i }}</span>
                                </td>
                                <td>
                                    <div class="customer-name">{{ $customer }}</div>
                                </td>
                                <td>
                                    <div class="project-name">{{ $project }}</div>
                                </td>
                                <td>
                                    <div class="date-time">
                                        <div>{{ date('d M Y', strtotime($date)) }}</div>
                                        <div class="text-muted">{{ $time }}</div>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <span class="volume-value">{{ $volume }} m³</span>
                                </td>
                                <td class="text-center">
                                    <span class="mix-design">{{ $mixDesign }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="badge {{ $statusBadgeClasses[$status] }} status-badge">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>
                                <td class="table-actions">
                                    <div class="btn-group">
                                        <a href="{{ route('delivery.scheduling.detail', $i) }}"
                                            class="btn btn-icon btn-outline-primary" title="View Details">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        <a href="{{ route('delivery.scheduling.edit', $i) }}"
                                            class="btn btn-icon btn-outline-primary" title="Edit Schedule">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-icon btn-outline-danger" 
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $i }}" 
                                            title="Delete Schedule">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal modal-blur fade" id="deleteModal{{ $i }}"
                                        tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete Schedule</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-center mb-3">
                                                        <i class="ti ti-alert-triangle text-danger" style="font-size: 3rem;"></i>
                                                    </div>
                                                    <p>Are you sure you want to delete schedule <strong>SCH-{{ 1000 + $i }}</strong>?</p>
                                                    <p class="text-muted">This action cannot be undone and all associated data will be permanently removed.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link link-secondary me-auto"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Yes, delete schedule</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <div class="d-flex mt-4 align-items-center">
                <div class="text-muted me-auto">
                    Showing <span class="fw-bold">1-15</span> of <span class="fw-bold">48</span> schedules
                </div>
                <ul class="pagination ms-auto">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class="ti ti-chevron-left"></i>
                            prev
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            next
                            <i class="ti ti-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize date range picker
        flatpickr("#date-range", {
            mode: "range",
            dateFormat: "Y-m-d",
            defaultDate: [new Date(), new Date(new Date().setDate(new Date().getDate() + 7))],
            onChange: function(selectedDates, dateStr, instance) {
                if (selectedDates.length === 2) {
                    // You would typically filter the table here based on the selected date range
                    console.log("Date range selected:", dateStr);
                    // For demonstration, we'll just show a toast notification
                    showToast('Date range filter applied: ' + dateStr, 'success');
                }
            }
        });

        // Search functionality
        const searchInput = document.getElementById('search-input');
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');

            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Status filter buttons
        const filterButtons = document.querySelectorAll('.btn-filter');
        filterButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                const status = this.textContent.trim().toLowerCase();
                const tableRows = document.querySelectorAll('tbody tr');
                
                if (status === 'all') {
                    tableRows.forEach(row => {
                        row.style.display = '';
                    });
                } else {
                    tableRows.forEach(row => {
                        const statusCell = row.querySelector('.status-badge');
                        const rowStatus = statusCell.textContent.trim().toLowerCase();
                        
                        if (rowStatus === status) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                }
                
                // Show toast notification
                showToast('Filtered by status: ' + (status === 'all' ? 'All' : status), 'info');
            });
        });

        // Helper function to show toast notifications
        function showToast(message, type = 'info') {
            // Check if SweetAlert2 is available
            if (typeof Swal !== 'undefined') {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
                
                Toast.fire({
                    icon: type,
                    title: message
                });
            } else {
                // Fallback to console
                console.log(message);
            }
        }

        // Add hover effect to action buttons
        const actionButtons = document.querySelectorAll('.table-actions .btn');
        actionButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.classList.remove('btn-outline-primary', 'btn-outline-danger');
                if (this.classList.contains('ti-trash')) {
                    this.classList.add('btn-danger');
                } else {
                    this.classList.add('btn-primary');
                }
            });
            
            button.addEventListener('mouseleave', function() {
                this.classList.remove('btn-primary', 'btn-danger');
                if (this.querySelector('.ti-trash')) {
                    this.classList.add('btn-outline-danger');
                } else {
                    this.classList.add('btn-outline-primary');
                }
            });
        });
    });
</script>
@endsection
