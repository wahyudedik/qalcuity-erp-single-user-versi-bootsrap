<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Qalcuity ERP</title>

    <!-- Tabler.io CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">

    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.30.0/tabler-icons.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">

    <style>
        :root {
            --primary-color: #0061f2;
            --secondary-color: #6610f2;
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 70px;
        }

        .navbar-vertical {
            background: #fff;
            border-right: 1px solid rgba(0, 0, 0, .05);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .05);
            width: var(--sidebar-width);
            transition: width 0.3s ease;
        }

        .navbar-vertical.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        .page-wrapper {
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s ease;
        }

        .navbar-vertical.collapsed+.page-wrapper {
            margin-left: var(--sidebar-collapsed-width);
        }

        .navbar-brand {
            padding: 1.5rem 1rem;
        }

        .navbar-vertical .navbar-nav .nav-link {
            padding: 0.75rem 1.5rem;
            color: #495057;
            border-radius: 0.25rem;
            margin: 0.2rem 0.75rem;
            transition: all 0.2s ease;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .navbar-vertical .navbar-nav .nav-link:hover,
        .navbar-vertical .navbar-nav .nav-link.active {
            background: linear-gradient(135deg, rgba(0, 97, 242, 0.1) 0%, rgba(102, 16, 242, 0.1) 100%);
            color: var(--primary-color);
        }

        .navbar-vertical .navbar-nav .nav-link-icon {
            color: #6c757d;
            margin-right: 0.75rem;
            display: inline-block;
            width: 1.25rem;
            text-align: center;
        }

        .navbar-vertical.collapsed .nav-link-title,
        .navbar-vertical.collapsed .module-divider,
        .navbar-vertical.collapsed .navbar-brand-text {
            display: none;
        }

        .navbar-vertical.collapsed .navbar-nav .nav-link {
            text-align: center;
            padding: 0.75rem;
            margin: 0.2rem auto;
            width: 50px;
        }

        .navbar-vertical.collapsed .navbar-nav .nav-link-icon {
            margin-right: 0;
            font-size: 1.25rem;
        }

        .navbar-vertical .navbar-nav .nav-item:hover .nav-link-icon,
        .navbar-vertical .navbar-nav .nav-link.active .nav-link-icon {
            color: var(--primary-color);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .1);
            border-radius: 0.5rem;
        }

        .dropdown-item {
            padding: 0.5rem 1.5rem;
            color: #495057;
        }

        .dropdown-item:hover {
            background-color: rgba(0, 97, 242, 0.05);
            color: var(--primary-color);
        }

        .gradient-text {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .module-divider {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #adb5bd;
            padding: 1rem 1.5rem 0.5rem;
            margin-top: 0.5rem;
        }

        /* Simplified header */
        .navbar-light {
            background: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
        }

        /* Sidebar toggle button */
        .sidebar-toggle {
            background: transparent;
            border: none;
            color: #495057;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .sidebar-toggle:hover {
            background-color: rgba(0, 97, 242, 0.1);
            color: var(--primary-color);
        }

        /* Mobile menu button */
        .mobile-menu-btn {
            background: transparent;
            border: none;
            color: #495057;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .mobile-menu-btn:hover {
            background-color: rgba(0, 97, 242, 0.1);
            color: var(--primary-color);
        }

        /* Mobile header */
        .mobile-header {
            display: none;
            background: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
            padding: 0.75rem 1rem;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
        }

        /* Offcanvas sidebar styles */
        #mobileSidebar .nav-link {
            padding: 0.75rem 1.5rem;
            color: #495057;
        }

        #mobileSidebar .nav-link:hover,
        #mobileSidebar .nav-link.active {
            background: linear-gradient(135deg, rgba(0, 97, 242, 0.1) 0%, rgba(102, 16, 242, 0.1) 100%);
            color: var(--primary-color);
        }

        #mobileSidebar .module-divider {
            padding: 1rem 1.5rem 0.5rem;
        }

        @media (max-width: 992px) {
            .navbar-vertical {
                display: none;
            }

            .page-wrapper {
                margin-left: 0 !important;
                padding-top: 60px;
            }

            .mobile-header {
                display: flex;
            }

            .navbar-light {
                display: none;
            }

            .page-body {
                padding-top: 1rem;
            }
        }
    </style>

    @yield('styles')
</head>

<body>
    <div class="page">
        <!-- Mobile Header -->
        <div class="mobile-header d-lg-none">
            <div class="d-flex align-items-center justify-content-between w-100">
                <button class="mobile-menu-btn" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#mobileSidebar">
                    <i class="ti ti-menu-2"></i>
                </button>
                <h1 class="m-0">
                    <span class="gradient-text">Qalcuity ERP</span>
                </h1>
                <div class="dropdown">
                    <a href="#" class="nav-link p-0" data-bs-toggle="dropdown">
                        <span class="avatar avatar-sm"
                            style="background-image: url(https://placehold.co/128x128)"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="#" class="dropdown-item">
                            <i class="ti ti-user me-2"></i>
                            Profile
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ti ti-settings me-2"></i>
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="ti ti-logout me-2"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Sidebar Component -->
        <x-mobile-sidebar />

        <!-- Desktop Sidebar -->
        <aside class="navbar navbar-vertical navbar-expand-lg d-none d-lg-block" id="sidebar">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand">
                    <a href="{{ url('/dashboard') }}">
                        <span class="gradient-text navbar-brand-text">Qalcuity ERP</span>
                        <span class="gradient-text d-none" id="brand-icon">Q</span>
                    </a>
                </h1>

                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">
                                <span class="nav-link-icon">
                                    <i class="ti ti-dashboard"></i>
                                </span>
                                <span class="nav-link-title">Dashboard</span>
                            </a>
                        </li>

                        <div class="module-divider">Core Modules</div>

                        <!-- Finance Module -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-finance" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button">
                                <span class="nav-link-icon">
                                    <i class="ti ti-cash"></i>
                                </span>
                                <span class="nav-link-title">Finance</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('finance.accounting') }}">Accounting & Bookkeeping</a>
                                <a class="dropdown-item" href="{{ route('finance.payroll') }}">Payroll</a>
                                <a class="dropdown-item" href="{{ route('finance.cost-management') }}">Cost Management</a>
                                <a class="dropdown-item" href="{{ route('finance.reports') }}">Financial Reports</a>
                            </div>
                        </li>

                        <!-- Sales Module -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-sales" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button">
                                <span class="nav-link-icon">
                                    <i class="ti ti-shopping-cart"></i>
                                </span>
                                <span class="nav-link-title">Sales</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('sales.customer-management') }}">Customer Management</a>
                                <a class="dropdown-item" href="{{ route('sales.quotes-contracts') }}">Quotes & Contracts</a>
                                <a class="dropdown-item" href="#">Invoicing & Payments</a>
                            </div>
                        </li>

                        <!-- Production Module -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-production" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button">
                                <span class="nav-link-icon">
                                    <i class="ti ti-building-factory"></i>
                                </span>
                                <span class="nav-link-title">Production</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Production Planning</a>
                                <a class="dropdown-item" href="#">Raw Material Management</a>
                                <a class="dropdown-item" href="#">Quality Control</a>
                                <a class="dropdown-item" href="#">Mix Design</a>
                                <a class="dropdown-item" href="#">Batch Plant Monitoring</a>
                            </div>
                        </li>

                        <!-- Warehouse Module -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-warehouse" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button">
                                <span class="nav-link-icon">
                                    <i class="ti ti-building-warehouse"></i>
                                </span>
                                <span class="nav-link-title">Warehouse</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Raw Material Inventory</a>
                                <a class="dropdown-item" href="#">Finished Product Inventory</a>
                                <a class="dropdown-item" href="#">Silo Management</a>
                                <a class="dropdown-item" href="#">Stock Opname</a>
                            </div>
                        </li>

                        <div class="module-divider">Resources</div>

                        <!-- HR Module -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-hr" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button">
                                <span class="nav-link-icon">
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="nav-link-title">HR</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Employee Data</a>
                                <a class="dropdown-item" href="#">Attendance</a>
                                <a class="dropdown-item" href="#">Shift Management</a>
                                <a class="dropdown-item" href="#">Training</a>
                            </div>
                        </li>

                        <!-- Delivery Module -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-delivery" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button">
                                <span class="nav-link-icon">
                                    <i class="ti ti-truck-delivery"></i>
                                </span>
                                <span class="nav-link-title">Delivery</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Delivery Routes</a>
                                <a class="dropdown-item" href="#">Fleet Management</a>
                                <a class="dropdown-item" href="#">Scheduling</a>
                                <a class="dropdown-item" href="#">GPS Tracking</a>
                                <a class="dropdown-item" href="#">Delivery Orders</a>
                            </div>
                        </li>

                        <!-- Purchasing Module -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-purchasing" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button">
                                <span class="nav-link-icon">
                                    <i class="ti ti-shopping-bag"></i>
                                </span>
                                <span class="nav-link-title">Purchasing</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Supplier Management</a>
                                <a class="dropdown-item" href="#">Purchase Orders</a>
                                <a class="dropdown-item" href="#">Supplier Evaluation</a>
                            </div>
                        </li>

                        <!-- Maintenance Module -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-maintenance" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button">
                                <span class="nav-link-icon">
                                    <i class="ti ti-tool"></i>
                                </span>
                                <span class="nav-link-title">Maintenance</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Equipment Maintenance</a>
                                <a class="dropdown-item" href="#">Vehicle Maintenance</a>
                                <a class="dropdown-item" href="#">Plant Maintenance</a>
                            </div>
                        </li>

                        <div class="module-divider">Analytics & Management</div>

                        <!-- Projects Module -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-projects" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button">
                                <span class="nav-link-icon">
                                    <i class="ti ti-clipboard-check"></i>
                                </span>
                                <span class="nav-link-title">Projects</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Contract Management</a>
                                <a class="dropdown-item" href="#">Project Timeline</a>
                                <a class="dropdown-item" href="#">Progress Tracking</a>
                            </div>
                        </li>

                        <!-- QHSE Module -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-qhse" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button">
                                <span class="nav-link-icon">
                                    <i class="ti ti-shield-check"></i>
                                </span>
                                <span class="nav-link-title">QHSE</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Health & Safety</a>
                                <a class="dropdown-item" href="#">ISO Management</a>
                                <a class="dropdown-item" href="#">Environmental Control</a>
                            </div>
                        </li>

                        <!-- Laboratory Module -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-laboratory" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button">
                                <span class="nav-link-icon">
                                    <i class="ti ti-flask"></i>
                                </span>
                                <span class="nav-link-title">Laboratory</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Material Testing</a>
                                <a class="dropdown-item" href="#">Quality Testing</a>
                                <a class="dropdown-item" href="#">R&D Mix Design</a>
                            </div>
                        </li>

                        <!-- Analytics Module -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-analytics" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button">
                                <span class="nav-link-icon">
                                    <i class="ti ti-chart-bar"></i>
                                </span>
                                <span class="nav-link-title">Analytics</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Executive Dashboard</a>
                                <a class="dropdown-item" href="#">Profitability Analysis</a>
                                <a class="dropdown-item" href="#">KPI Monitoring</a>
                                <a class="dropdown-item" href="#">Demand Forecasting</a>
                                <a class="dropdown-item" href="#">Integrated Reporting</a>
                            </div>
                        </li>

                        <div class="module-divider">System</div>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-icon">
                                    <i class="ti ti-settings"></i>
                                </span>
                                <span class="nav-link-title">Settings</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-icon">
                                    <i class="ti ti-users-group"></i>
                                </span>
                                <span class="nav-link-title">User Management</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-link-icon">
                                    <i class="ti ti-help"></i>
                                </span>
                                <span class="nav-link-title">Help & Support</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <div class="page-wrapper">
            <!-- Desktop Header with Sidebar Toggle -->
            <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex">
                <div class="container-fluid">
                    <!-- Sidebar Toggle Button -->
                    <button class="sidebar-toggle me-3" id="sidebar-toggle" title="Toggle sidebar">
                        <i class="ti ti-menu-2"></i>
                    </button>

                    <div class="d-flex flex-grow-1">
                        <form action="" method="get" class="d-flex me-auto">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="search" class="form-control" placeholder="Search..."
                                    aria-label="Search">
                            </div>
                        </form>
                    </div>

                    <div class="navbar-nav">
                        <!-- CCTV Icon -->
                        <div class="nav-item d-none d-md-flex me-3">
                            <a href="#" class="nav-link px-0" title="CCTV">
                                <i class="ti ti-device-cctv"></i>
                            </a>
                        </div>

                        <!-- Chat Icon -->
                        <div class="nav-item d-none d-md-flex me-3">
                            <a href="#" class="nav-link px-0" title="Chat">
                                <i class="ti ti-messages"></i>
                            </a>
                        </div>

                        <div class="nav-item dropdown d-none d-md-flex me-3">
                            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                aria-label="Show notifications">
                                <i class="ti ti-bell"></i>
                                <span class="badge bg-red"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Notifications</h3>
                                    </div>
                                    <div class="list-group list-group-flush list-group-hoverable">
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                        class="status-dot status-dot-animated bg-green d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">Production target
                                                        reached</a>
                                                    <div class="d-block text-muted text-truncate mt-n1">Production line
                                                        A has reached its daily target.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="nav-item d-none d-md-flex me-3">
                            <div class="btn-list">
                                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode">
                                    <i class="ti ti-moon"></i>
                                </a>
                                <a href="?theme=light" class="nav-link px-0 hide-theme-light"
                                    title="Enable light mode">
                                    <i class="ti ti-sun"></i>
                                </a>
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown">
                                <span class="avatar avatar-sm"
                                    style="background-image: url(https://placehold.co/128x128)"></span>
                                <div class="d-none d-xl-block ps-2">
                                    <div>{{ Auth::user()->name ?? 'User Name' }}</div>
                                    <div class="mt-1 small text-muted">Administrator</div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <a href="#" class="dropdown-item">
                                    <i class="ti ti-user me-2"></i>
                                    Profile
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="ti ti-settings me-2"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="ti ti-logout me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>

            <!-- Simplified Footer -->
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item"><a href="#"
                                        class="link-secondary">Documentation</a></li>
                                <li class="list-inline-item"><a href="#" class="link-secondary">Help</a></li>
                                <li class="list-inline-item"><a href="#" class="link-secondary">Support</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright © {{ date('Y') }} <a href="." class="link-secondary">Qalcuity
                                        ERP</a>. All
                                    rights reserved.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Tabler.io JS -->
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const brandIcon = document.getElementById('brand-icon');
            const brandText = document.querySelector('.navbar-brand-text');

            // Check if sidebar state is saved in localStorage
            const sidebarCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';

            // Apply initial state
            if (sidebarCollapsed) {
                sidebar.classList.add('collapsed');
                brandIcon.classList.remove('d-none');
                brandText.classList.add('d-none');
            }

            // Toggle sidebar on button click
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');

                    // Toggle brand display
                    if (sidebar.classList.contains('collapsed')) {
                        brandIcon.classList.remove('d-none');
                        brandText.classList.add('d-none');
                        localStorage.setItem('sidebar-collapsed', 'true');
                    } else {
                        brandIcon.classList.add('d-none');
                        brandText.classList.remove('d-none');
                        localStorage.setItem('sidebar-collapsed', 'false');
                    }
                });
            }

            // SweetAlert2 configuration for notifications
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            // Flash messages handling
            @if (session('success'))
                Toast.fire({
                    icon: 'success',
                    title: "{{ session('success') }}"
                });
            @endif

            @if (session('error'))
                Toast.fire({
                    icon: 'error',
                    title: "{{ session('error') }}"
                });
            @endif

            @if (session('info'))
                Toast.fire({
                    icon: 'info',
                    title: "{{ session('info') }}"
                });
            @endif

            @if (session('warning'))
                Toast.fire({
                    icon: 'warning',
                    title: "{{ session('warning') }}"
                });
            @endif
        });
    </script>

    @yield('scripts')
</body>

</html>
