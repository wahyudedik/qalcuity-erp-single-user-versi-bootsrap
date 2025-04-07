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

            <!-- Branch Management Module -->
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#branches-mobile">
                    <span class="nav-link-icon">
                        <i class="ti ti-building-factory-2"></i>
                    </span>
                    <span class="nav-link-title">Branches</span>
                </a>
                <div class="collapse" id="branches-mobile">
                    <ul class="navbar-nav ps-4">
                        <li><a class="nav-link" href="{{ route('branches.index') }}">Branch List</a></li>
                        <li><a class="nav-link" href="{{ route('branches.create') }}">Add New Branch</a></li>
                        <li><a class="nav-link" href="{{ route('branches.performance') }}">Performance Dashboard</a>
                        </li>
                    </ul>
                </div>
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
                        <li><a class="nav-link" href="{{ route('finance.accounting') }}">Accounting & Bookkeeping</a>
                        </li>
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
                        <li><a class="nav-link" href="{{ route('sales.customer-management') }}">Customer Management</a>
                        </li>
                        <li><a class="nav-link" href="{{ route('sales.quotes-contracts') }}">Quotes & Contracts</a>
                        </li>
                        <li><a class="nav-link" href="{{ route('sales.invoices') }}">Invoicing & Payments</a></li>
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
                        <li><a class="nav-link" href="{{ route('production.planning') }}">Production Planning</a></li>
                        <li><a class="nav-link" href="{{ route('production.raw-materials') }}">Raw Material
                                Management</a></li>
                        <li><a class="nav-link" href="{{ route('production.quality-control') }}">Quality Control</a>
                        </li>
                        <li><a class="nav-link" href="{{ route('production.machine-maintenance') }}">Machine
                                Maintenance</a></li>
                        <li><a class="nav-link" href="{{ route('production.mix-design.index') }}">Mix Design</a></li>
                        <li><a class="nav-link" href="{{ route('production.batch-plant') }}">Batch Plant Monitoring</a>
                        </li>
                        <li><a class="nav-link" href="{{ route('production.strength-testing') }}">Strength Testing</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Warehouse Module -->
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#warehouse-mobile">
                    <span class="nav-link-icon">
                        <i class="ti ti-building-warehouse"></i>
                    </span>
                    <span class="nav-link-title">Warehouse</span>
                </a>
                <div class="collapse" id="warehouse-mobile">
                    <ul class="navbar-nav ps-4">
                        <li><a class="nav-link" href="{{ route('warehouse.raw-materials') }}">Raw Material
                                Inventory</a></li>
                        <li><a class="nav-link" href="{{ route('warehouse.finished-products') }}">Finished Product
                                Inventory</a></li>
                        <li><a class="nav-link" href="{{ route('warehouse.silo-management') }}">Silo Management</a>
                        </li>
                        <li><a class="nav-link" href="{{ route('warehouse.stock-opname') }}">Stock Opname</a></li>
                    </ul>
                </div>
            </li>

            <!-- HR Module -->
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#hr-mobile">
                    <span class="nav-link-icon">
                        <i class="ti ti-users"></i>
                    </span>
                    <span class="nav-link-title">Human Resources</span>
                </a>
                <div class="collapse" id="hr-mobile">
                    <ul class="navbar-nav ps-4">
                        <li><a class="nav-link" href="{{ route('hr.employees.index') }}">Employee Management</a>
                        </li>
                        <li><a class="nav-link" href="{{ route('hr.attendance.index') }}">Attendance</a></li>
                        <li><a class="nav-link" href="{{ route('hr.shifts.index') }}">Shift Management</a></li>
                        <li><a class="nav-link" href="{{ route('hr.leave.index') }}">Leave Management</a></li>
                        <li><a class="nav-link" href="{{ route('hr.payroll.index') }}">Payroll</a></li>
                        <li><a class="nav-link" href="{{ route('hr.training.index') }}">Training & Development</a>
                        </li>
                        <li><a class="nav-link" href="{{ route('hr.performance.index') }}">Performance Management</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Delivery Module -->
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#delivery-mobile">
                    <span class="nav-link-icon">
                        <i class="ti ti-truck-delivery"></i>
                    </span>
                    <span class="nav-link-title">Delivery</span>
                </a>
                <div class="collapse" id="delivery-mobile">
                    <ul class="navbar-nav ps-4">
                        <li><a class="dropdown-item" href="{{ route('delivery.routes') }}">Delivery Routes</a></li>
                        <li><a class="dropdown-item" href="{{ route('delivery.fleet') }}">Fleet Management</a></li>
                        <li><a class="dropdown-item" href="{{ route('delivery.scheduling') }}">Scheduling</a></li>
                        <li><a class="nav-link" href="#">Fleet Management</a></li>
                    </ul>
                </div>
            </li>

            <!-- More modules can be added following the same pattern -->

            <div class="module-divider">System</div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('production.batch-plant.settings') }}">
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
