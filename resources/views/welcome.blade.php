<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qalcuity ERP - Enterprise Resource Planning System</title>

    <!-- Tabler.io CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">

    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.30.0/tabler-icons.min.css">

    <style>
        .hero-section {
            background: linear-gradient(135deg, #0061f2 0%, #6610f2 100%);
            color: white;
            padding: 6rem 0;
        }

        .feature-icon {
            width: 4rem;
            height: 4rem;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            background: rgba(var(--tblr-primary-rgb), 0.1);
            color: var(--tblr-primary);
            margin-bottom: 1rem;
        }

        .module-card {
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .module-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .footer {
            background-color: #f8fafc;
            padding: 3rem 0;
        }
    </style>
</head>

<body>
    <div class="page">
        <!-- Header -->
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="." class="text-decoration-none">
                        <span class="fw-bold"
                            style="background: linear-gradient(135deg, #0061f2 0%, #6610f2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Qalcuity
                            ERP</span>
                    </a>
                </h1>

                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item d-flex me-3">
                        @auth
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                        @endauth
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#features">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#modules">Modules</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <div class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-3 fw-bold mb-3">Comprehensive ERP Solution for Concrete Industry</h1>
                        <p class="fs-4 mb-4">Streamline your operations, enhance productivity, and drive growth with our
                            integrated enterprise resource planning system.</p>
                        @auth
                            <a href="#" class="btn btn-light btn-lg">Go to Dashboard</a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-light btn-lg me-2">Get Started</a>
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">Sign In</a>
                        @endauth
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="https://via.placeholder.com/600x400?text=Qalcuity+ERP" alt="Qalcuity ERP"
                            class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="py-5" id="features">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Key Features</h2>
                    <p class="text-muted">Designed specifically for the concrete industry</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="d-flex flex-column h-100">
                            <div class="feature-icon">
                                <i class="ti ti-building-factory"></i>
                            </div>
                            <h3 class="h4">Operational Excellence</h3>
                            <p class="text-muted flex-grow-1">Streamline production, delivery, and procurement processes
                                with integrated workflows.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex flex-column h-100">
                            <div class="feature-icon">
                                <i class="ti ti-certificate"></i>
                            </div>
                            <h3 class="h4">Quality Management</h3>
                            <p class="text-muted flex-grow-1">Ensure consistent product quality with comprehensive
                                testing and quality control tools.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex flex-column h-100">
                            <div class="feature-icon">
                                <i class="ti ti-chart-pie"></i>
                            </div>
                            <h3 class="h4">Financial Insights</h3>
                            <p class="text-muted flex-grow-1">Gain complete visibility into your financial performance
                                with integrated accounting tools.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex flex-column h-100">
                            <div class="feature-icon">
                                <i class="ti ti-users"></i>
                            </div>
                            <h3 class="h4">HR Management</h3>
                            <p class="text-muted flex-grow-1">Efficiently manage your workforce with comprehensive HR
                                tools and performance tracking.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex flex-column h-100">
                            <div class="feature-icon">
                                <i class="ti ti-truck"></i>
                            </div>
                            <h3 class="h4">Logistics & Delivery</h3>
                            <p class="text-muted flex-grow-1">Optimize your delivery routes and track your fleet in
                                real-time for maximum efficiency.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex flex-column h-100">
                            <div class="feature-icon">
                                <i class="ti ti-device-analytics"></i>
                            </div>
                            <h3 class="h4">Business Intelligence</h3>
                            <p class="text-muted flex-grow-1">Make data-driven decisions with powerful analytics and
                                reporting capabilities.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modules Section -->
        <div class="bg-light py-5" id="modules">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Comprehensive Modules</h2>
                    <p class="text-muted">Tailored for every aspect of your concrete business</p>
                </div>

                <div class="row g-4">
                    <!-- Module 1: Finance -->
                    <div class="col-md-4 col-lg-3">
                        <div class="card module-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar bg-primary-lt">
                                        <i class="ti ti-cash text-primary"></i>
                                    </div>
                                    <h3 class="h5 ms-3 mb-0">Finance</h3>
                                </div>
                                <ul class="list-unstyled text-muted">
                                    <li><i class="ti ti-point-filled text-primary me-2"></i>Accounting & Bookkeeping
                                    </li>
                                    <li><i class="ti ti-point-filled text-primary me-2"></i>Payroll Management</li>
                                    <li><i class="ti ti-point-filled text-primary me-2"></i>Cost Management</li>
                                    <li><i class="ti ti-point-filled text-primary me-2"></i>Financial Reporting</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Module 2: Sales -->
                    <div class="col-md-4 col-lg-3">
                        <div class="card module-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar bg-green-lt">
                                        <i class="ti ti-shopping-cart text-green"></i>
                                    </div>
                                    <h3 class="h5 ms-3 mb-0">Sales</h3>
                                </div>
                                <ul class="list-unstyled text-muted">
                                    <li><i class="ti ti-point-filled text-green me-2"></i>Customer Management</li>
                                    <li><i class="ti ti-point-filled text-green me-2"></i>Quotes & Contracts</li>
                                    <li><i class="ti ti-point-filled text-green me-2"></i>Invoicing & Payments</li>
                                    <li><i class="ti ti-point-filled text-green me-2"></i>Sales Analytics</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Module 3: Production -->
                    <div class="col-md-4 col-lg-3">
                        <div class="card module-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar bg-blue-lt">
                                        <i class="ti ti-building-factory text-blue"></i>
                                    </div>
                                    <h3 class="h5 ms-3 mb-0">Production</h3>
                                </div>
                                <ul class="list-unstyled text-muted">
                                    <li><i class="ti ti-point-filled text-blue me-2"></i>Production Planning</li>
                                    <li><i class="ti ti-point-filled text-blue me-2"></i>Raw Material Management</li>
                                    <li><i class="ti ti-point-filled text-blue me-2"></i>Quality Control</li>
                                    <li><i class="ti ti-point-filled text-blue me-2"></i>Mix Design</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Module 4: Warehouse -->
                    <div class="col-md-4 col-lg-3">
                        <div class="card module-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar bg-yellow-lt">
                                        <i class="ti ti-building-warehouse text-yellow"></i>
                                    </div>
                                    <h3 class="h5 ms-3 mb-0">Warehouse</h3>
                                </div>
                                <ul class="list-unstyled text-muted">
                                    <li><i class="ti ti-point-filled text-yellow me-2"></i>Raw Material Inventory</li>
                                    <li><i class="ti ti-point-filled text-yellow me-2"></i>Finished Product Inventory
                                    </li>
                                    <li><i class="ti ti-point-filled text-yellow me-2"></i>Silo Management</li>
                                    <li><i class="ti ti-point-filled text-yellow me-2"></i>Stock Opname</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Module 5: HR -->
                    <div class="col-md-4 col-lg-3">
                        <div class="card module-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar bg-purple-lt">
                                        <i class="ti ti-users text-purple"></i>
                                    </div>
                                    <h3 class="h5 ms-3 mb-0">HR</h3>
                                </div>
                                <ul class="list-unstyled text-muted">
                                    <li><i class="ti ti-point-filled text-purple me-2"></i>Employee Data</li>
                                    <li><i class="ti ti-point-filled text-purple me-2"></i>Attendance</li>
                                    <li><i class="ti ti-point-filled text-purple me-2"></i>Shift Management</li>
                                    <li><i class="ti ti-point-filled text-purple me-2"></i>Training & Development</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Module 6: Delivery -->
                    <div class="col-md-4 col-lg-3">
                        <div class="card module-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar bg-red-lt">
                                        <i class="ti ti-truck-delivery text-red"></i>
                                    </div>
                                    <h3 class="h5 ms-3 mb-0">Delivery</h3>
                                </div>
                                <ul class="list-unstyled text-muted">
                                    <li><i class="ti ti-point-filled text-red me-2"></i>Delivery Routes</li>
                                    <li><i class="ti ti-point-filled text-red me-2"></i>Fleet Management</li>
                                    <li><i class="ti ti-point-filled text-red me-2"></i>Scheduling</li>
                                    <li><i class="ti ti-point-filled text-red me-2"></i>GPS Tracking</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Module 7: Purchasing -->
                    <div class="col-md-4 col-lg-3">
                        <div class="card module-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar bg-cyan-lt">
                                        <i class="ti ti-shopping text-cyan"></i>
                                    </div>
                                    <h3 class="h5 ms-3 mb-0">Purchasing</h3>
                                </div>
                                <ul class="list-unstyled text-muted">
                                    <li><i class="ti ti-point-filled text-cyan me-2"></i>Supplier Management</li>
                                    <li><i class="ti ti-point-filled text-cyan me-2"></i>Purchase Orders</li>
                                    <li><i class="ti ti-point-filled text-cyan me-2"></i>Supplier Evaluation</li>
                                    <li><i class="ti ti-point-filled text-cyan me-2"></i>Procurement Analytics</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Module 8: Maintenance -->
                    <div class="col-md-4 col-lg-3">
                        <div class="card module-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar bg-orange-lt">
                                        <i class="ti ti-tool text-orange"></i>
                                    </div>
                                    <h3 class="h5 ms-3 mb-0">Maintenance</h3>
                                </div>
                                <ul class="list-unstyled text-muted">
                                    <li><i class="ti ti-point-filled text-orange me-2"></i>Mixer Maintenance</li>
                                    <li><i class="ti ti-point-filled text-orange me-2"></i>Pump Maintenance</li>
                                    <li><i class="ti ti-point-filled text-orange me-2"></i>Vehicle Maintenance</li>
                                    <li><i class="ti ti-point-filled text-orange me-2"></i>Batch Plant Maintenance</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- View All Modules Button -->
                    <div class="col-12 text-center mt-4">
                        <button class="btn btn-primary" id="viewAllModules">
                            View All 52 Modules <i class="ti ti-chevron-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Industry-Specific Section -->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="https://via.placeholder.com/600x400?text=Concrete+Industry+ERP"
                            alt="Concrete Industry ERP" class="img-fluid rounded shadow">
                    </div>
                    <div class="col-lg-6">
                        <h2 class="fw-bold mb-4">Tailored for Concrete Industry</h2>
                        <div class="mb-4">
                            <h4><i class="ti ti-flask me-2 text-primary"></i> Mix Design Management</h4>
                            <p class="text-muted">Optimize your concrete formulations with advanced mix design tools.
                            </p>
                        </div>
                        <div class="mb-4">
                            <h4><i class="ti ti-test-pipe me-2 text-primary"></i> Quality Testing</h4>
                            <p class="text-muted">Comprehensive testing modules for material and product quality
                                assurance.</p>
                        </div>
                        <div class="mb-4">
                            <h4><i class="ti ti-building me-2 text-primary"></i> Batch Plant Operations</h4>
                            <p class="text-muted">Streamline your batch plant operations with real-time monitoring and
                                control.</p>
                        </div>
                        <div>
                            <h4><i class="ti ti-truck me-2 text-primary"></i> Concrete Delivery</h4>
                            <p class="text-muted">Specialized tools for managing concrete delivery logistics and
                                timing.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials Section -->
        <div class="bg-light py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Trusted by Industry Leaders</h2>
                    <p class="text-muted">See what our customers have to say</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex mb-3">
                                    <span class="text-warning me-1"><i class="ti ti-star-filled"></i></span>
                                    <span class="text-warning me-1"><i class="ti ti-star-filled"></i></span>
                                    <span class="text-warning me-1"><i class="ti ti-star-filled"></i></span>
                                    <span class="text-warning me-1"><i class="ti ti-star-filled"></i></span>
                                    <span class="text-warning"><i class="ti ti-star-filled"></i></span>
                                </div>
                                <p class="card-text">"Qalcuity ERP has transformed our operations. The batch plant
                                    monitoring and quality control features have significantly improved our product
                                    consistency."</p>
                            </div>
                            <div class="card-footer bg-transparent">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-md me-3"
                                        style="background-image: url(https://via.placeholder.com/128)"></span>
                                    <div>
                                        <div class="font-weight-medium">John Doe</div>
                                        <div class="text-muted">Operations Director, ABC Concrete</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex mb-3">
                                    <span class="text-warning me-1"><i class="ti ti-star-filled"></i></span>
                                    <span class="text-warning me-1"><i class="ti ti-star-filled"></i></span>
                                    <span class="text-warning me-1"><i class="ti ti-star-filled"></i></span>
                                    <span class="text-warning me-1"><i class="ti ti-star-filled"></i></span>
                                    <span class="text-warning me-1"><i class="ti ti-star-filled"></i></span>
                                </div>
                                <p class="card-text">"The delivery management module has reduced our logistics costs by
                                    15%. The real-time GPS tracking and route optimization are game-changers for our
                                    business."</p>
                            </div>
                            <div class="card-footer bg-transparent">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-md me-3"
                                        style="background-image: url(https://via.placeholder.com/128)"></span>
                                    <div>
                                        <div class="font-weight-medium">Jane Smith</div>
                                        <div class="text-muted">Logistics Manager, XYZ Concrete</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex mb-3">
                                    <span class="text-warning me-1"><i class="ti ti-star-filled"></i></span>
                                    <span class="text-warning me-1"><i class="ti ti-star-filled"></i></span>
                                    <span class="text-warning me-1"><i class="ti ti-star-filled"></i></span>
                                    <span class="text-warning me-1"><i class="ti ti-star-filled"></i></span>
                                    <span class="text-warning"><i class="ti ti-star-half"></i></span>
                                </div>
                                <p class="card-text">"The financial reporting and analytics have given us unprecedented
                                    visibility into our operations. We can now make data-driven decisions with
                                    confidence."</p>
                            </div>
                            <div class="card-footer bg-transparent">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-md me-3"
                                        style="background-image: url(https://via.placeholder.com/128)"></span>
                                    <div>
                                        <div class="font-weight-medium">Robert Johnson</div>
                                        <div class="text-muted">CFO, DEF Concrete Solutions</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="py-5 bg-primary text-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 mb-4 mb-lg-0">
                        <h2 class="fw-bold mb-0">Ready to transform your concrete business?</h2>
                        <p class="lead mb-0">Get started with Qalcuity ERP today and see the difference.</p>
                    </div>
                    <div class="col-lg-3 text-lg-end">
                        @auth
                            <a href="#" class="btn btn-lg btn-light">Go to Dashboard</a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-lg btn-light">Start Free Trial</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-4">
                        <h1 class="navbar-brand mb-4">
                            <span class="fw-bold"
                                style="background: linear-gradient(135deg, #0061f2 0%, #6610f2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Qalcuity
                                ERP</span>
                        </h1>
                        <p class="text-muted">Comprehensive enterprise resource planning system designed specifically
                            for the concrete industry.</p>
                        <div class="social-links mt-3">
                            <a href="#" class="me-2"><i class="ti ti-brand-facebook"></i></a>
                            <a href="#" class="me-2"><i class="ti ti-brand-twitter"></i></a>
                            <a href="#" class="me-2"><i class="ti ti-brand-linkedin"></i></a>
                            <a href="#"><i class="ti ti-brand-instagram"></i></a>
                        </div>
                    </div>

                    <div class="col-6 col-lg-2">
                        <h5 class="fw-bold mb-4">Modules</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Finance</a>
                            </li>
                            <li class="mb-2"><a href="#"
                                    class="text-decoration-none text-muted">Production</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Sales</a>
                            </li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Delivery</a>
                            </li>
                            <li class="mb-2"><a href="#"
                                    class="text-decoration-none text-muted">Warehouse</a></li>
                            <li><a href="#" class="text-decoration-none text-muted">View All</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-lg-2">
                        <h5 class="fw-bold mb-4">Company</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted">About Us</a>
                            </li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Careers</a>
                            </li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Blog</a>
                            </li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted">Press</a>
                            </li>
                            <li><a href="#" class="text-decoration-none text-muted">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4">
                        <h5 class="fw-bold mb-4">Stay Updated</h5>
                        <p class="text-muted">Subscribe to our newsletter for the latest updates and features.</p>
                        <form class="mt-3">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Your email address"
                                    aria-label="Your email address">
                                <button class="btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="border-top my-4"></div>

                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-0 text-muted">© 2023 Qalcuity ERP. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="#"
                                    class="text-decoration-none text-muted">Privacy Policy</a></li>
                            <li class="list-inline-item"><span class="text-muted">•</span></li>
                            <li class="list-inline-item"><a href="#"
                                    class="text-decoration-none text-muted">Terms of Service</a></li>
                            <li class="list-inline-item"><span class="text-muted">•</span></li>
                            <li class="list-inline-item"><a href="#"
                                    class="text-decoration-none text-muted">Cookie Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Tabler.io JS -->
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

    <script>
        // View All Modules Button
        document.getElementById('viewAllModules').addEventListener('click', function() {
            Swal.fire({
                title: 'All 52 Modules',
                html: `
                    <div class="text-start">
                        <h5 class="mt-3">Core Operations</h5>
                        <ul class="list-unstyled">
                            <li><i class="ti ti-point-filled text-primary me-2"></i>Finance & Accounting</li>
                            <li><i class="ti ti-point-filled text-primary me-2"></i>Sales & Marketing</li>
                            <li><i class="ti ti-point-filled text-primary me-2"></i>Production Management</li>
                            <li><i class="ti ti-point-filled text-primary me-2"></i>Inventory & Warehouse</li>
                            <li><i class="ti ti-point-filled text-primary me-2"></i>Human Resources</li>
                            <li><i class="ti ti-point-filled text-primary me-2"></i>Delivery & Logistics</li>
                            <li><i class="ti ti-point-filled text-primary me-2"></i>Procurement</li>
                            <li><i class="ti ti-point-filled text-primary me-2"></i>Maintenance</li>
                        </ul>
                        
                        <h5 class="mt-3">Industry-Specific</h5>
                        <ul class="list-unstyled">
                            <li><i class="ti ti-point-filled text-success me-2"></i>Mix Design Management</li>
                            <li><i class="ti ti-point-filled text-success me-2"></i>Batch Plant Operations</li>
                            <li><i class="ti ti-point-filled text-success me-2"></i>Quality Testing</li>
                            <li><i class="ti ti-point-filled text-success me-2"></i>Laboratory Management</li>
                            <li><i class="ti ti-point-filled text-success me-2"></i>QHSE</li>
                            <li><i class="ti ti-point-filled text-success me-2"></i>Project Management</li>
                        </ul>
                        
                        <h5 class="mt-3">Advanced Features</h5>
                        <ul class="list-unstyled">
                            <li><i class="ti ti-point-filled text-info me-2"></i>Business Intelligence</li>
                            <li><i class="ti ti-point-filled text-info me-2"></i>Risk Management</li>
                            <li><i class="ti ti-point-filled text-info me-2"></i>IoT Integration</li>
                            <li><i class="ti ti-point-filled text-info me-2"></i>Sustainability Management</li>
                            <li><i class="ti ti-point-filled text-info me-2"></i>Mobile Access</li>
                            <li><i class="ti ti-point-filled text-info me-2"></i>Customer Portal</li>
                        </ul>
                        
                        <p class="mt-3 text-muted">And many more specialized modules for concrete industry...</p>
                    </div>
                `,
                width: 600,
                confirmButtonText: 'Close',
                confirmButtonColor: '#206bc4',
                showClass: {
                    popup: 'animate__animated animate__fadeIn'
                }
            });
        });

        // Show success message for logged in users
        @auth
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Welcome back!',
                text: 'You are logged in as {{ Auth::user()->name }}',
                icon: 'success',
                confirmButtonColor: '#206bc4',
                timer: 3000,
                timerProgressBar: true
            });
        });
        @endauth
    </script>
</body>

</html>
