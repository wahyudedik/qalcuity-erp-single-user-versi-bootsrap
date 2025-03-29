<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title gradient-text" id="mobileSidebarLabel">Qalcuity ERP</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
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
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#finance-mobile">
                    <span class="nav-link-icon">
                        <i class="ti ti-cash"></i>
                    </span>
                    <span class="nav-link-title">Finance</span>
                </a>
                <div class="collapse" id="finance-mobile">
                    <ul class="navbar-nav ps-4">
                        <li><a class="nav-link" href="{{ route('finance.accounting') }}">Accounting & Bookkeeping</a></li>
                        <li><a class="nav-link" href="{{ route('finance.payroll') }}">Payroll</a></li>
                        <li><a class="nav-link" href="{{ route('finance.cost-management') }}">Cost Management</a></li>
                        <li><a class="nav-link" href="{{ route('finance.reports') }}">Financial Reports</a></li>
                    </ul>
                </div>
            </li>

            <!-- Sales Module -->
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#sales-mobile">
                    <span class="nav-link-icon">
                        <i class="ti ti-shopping-cart"></i>
                    </span>
                    <span class="nav-link-title">Sales</span>
                </a>
                <div class="collapse" id="sales-mobile">
                    <ul class="navbar-nav ps-4">
                        <li><a class="nav-link" href="{{ route('sales.customer-management') }}">Customer Management</a></li>
                        <li><a class="nav-link" href="{{ route('sales.quotes-contracts') }}">Quotes & Contracts</a></li>
                        <li><a class="nav-link" href="#">Invoicing & Payments</a></li>
                    </ul>
                </div>
            </li>

            <!-- Production Module -->
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#production-mobile">
                    <span class="nav-link-icon">
                        <i class="ti ti-building-factory"></i>
                    </span>
                    <span class="nav-link-title">Production</span>
                </a>
                <div class="collapse" id="production-mobile">
                    <ul class="navbar-nav ps-4">
                        <li><a class="nav-link" href="#">Production Planning</a></li>
                        <li><a class="nav-link" href="#">Raw Material Management</a></li>
                        <li><a class="nav-link" href="#">Quality Control</a></li>
                        <li><a class="nav-link" href="#">Mix Design</a></li>
                        <li><a class="nav-link" href="#">Batch Plant Monitoring</a></li>
                    </ul>
                </div>
            </li>

            <!-- More modules can be added following the same pattern -->
            
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
            
            <li class="nav-item mt-3">
                <form action="{{ route('logout') }}" method="POST" class="px-3">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="ti ti-logout me-2"></i>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
