<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes (protected by auth middleware)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Finance Module Routes
Route::middleware('auth')->group(function () {
    // Accounting
    Route::get('/finance/accounting', function () {
        return view('finance.accounting');
    })->name('finance.accounting');

    // Payroll
    Route::get('/finance/payroll', function () {
        return view('finance.payroll');
    })->name('finance.payroll');

    Route::get('/finance/payroll/{id}/detail', function ($id) {
        return view('finance.payroll-detail');
    })->name('finance.payroll.detail');

    Route::get('/finance/payroll/{id}/edit', function ($id) {
        return view('finance.payroll-edit');
    })->name('finance.payroll.edit');

    // Cost Management
    Route::get('/finance/cost-management', function () {
        return view('finance.cost-management');
    })->name('finance.cost-management');

    // Transactions
    Route::get('/finance/transaction/{id}/detail', function ($id) {
        return view('finance.transaction-detail');
    })->name('finance.transaction.detail');

    Route::get('/finance/transaction/{id}/edit', function ($id) {
        return view('finance.transaction-edit');
    })->name('finance.transaction.edit');

    // Journals
    Route::get('/finance/journal/{id}/detail', function ($id) {
        return view('finance.journal-detail');
    })->name('finance.journal.detail');

    Route::get('/finance/journal/{id}/edit', function ($id) {
        return view('finance.journal-edit');
    })->name('finance.journal.edit');

    // Accounts
    Route::get('/finance/account/{id}/detail', function ($id) {
        return view('finance.account-detail');
    })->name('finance.account.detail');

    Route::get('/finance/account/{id}/edit', function ($id) {
        return view('finance.account-edit');
    })->name('finance.account.edit');

    // Reports
    Route::get('/finance/reports', function () {
        return view('finance.reports');
    })->name('finance.reports');
});

// Sales Module Routes
Route::middleware('auth')->group(function () {
    // Customer Management
    Route::get('/sales/customer-management', function () {
        return view('sales.customer-management');
    })->name('sales.customer-management');

    Route::get('/sales/customer/{id}/detail', function ($id) {
        return view('sales.customer-detail', ['id' => $id]);
    })->name('sales.customer.detail');

    Route::get('/sales/customer/{id}/edit', function ($id) {
        return view('sales.customer-edit', ['id' => $id]);
    })->name('sales.customer.edit');

    Route::get('/sales/customer/create', function () {
        return view('sales.customer-create');
    })->name('sales.customer.create');

    // Quotes & Contracts
    Route::get('/sales/quotes-contracts', function () {
        return view('sales.quotes-contracts');
    })->name('sales.quotes-contracts');

    Route::get('/sales/quote/{id}/detail', function ($id) {
        return view('sales.quote-detail', ['id' => $id]);
    })->name('sales.quote.detail');

    Route::get('/sales/quote/{id}/edit', function ($id) {
        return view('sales.quote-edit', ['id' => $id]);
    })->name('sales.quote.edit');

    Route::get('/sales/quote/create', function () {
        return view('sales.quote-create');
    })->name('sales.quote.create');

    Route::get('/sales/contract/{id}/detail', function ($id) {
        return view('sales.contract-detail', ['id' => $id]);
    })->name('sales.contract.detail');

    Route::get('/sales/contract/{id}/edit', function ($id) {
        return view('sales.contract-edit', ['id' => $id]);
    })->name('sales.contract.edit');

    Route::get('/sales/contract/create', function () {
        return view('sales.contract-create');
    })->name('sales.contract.create');

    Route::get('/sales/contracts', function () {
        return view('sales.contract-list');
    })->name('sales.contracts');

    // Invoicing & Payments
    Route::get('/sales/invoices', function () {
        return view('sales.invoices');
    })->name('sales.invoices');

    Route::get('/sales/invoice/create', function () {
        return view('sales.invoice-create');
    })->name('sales.invoice.create');

    Route::get('/sales/invoice/{id}/detail', function ($id) {
        return view('sales.invoice-detail', ['id' => $id]);
    })->name('sales.invoice.detail');

    Route::get('/sales/invoice/{id}/edit', function ($id) {
        return view('sales.invoice-edit', ['id' => $id]);
    })->name('sales.invoice.edit');

    Route::get('/sales/payments', function () {
        return view('sales.payments');
    })->name('sales.payments');

    Route::get('/sales/payment/create', function () {
        return view('sales.payment-create');
    })->name('sales.payment.create');

    Route::get('/sales/payment/{id}/detail', function ($id) {
        return view('sales.payment-detail', ['id' => $id]);
    })->name('sales.payment.detail');
});

// Branch Management Routes
Route::prefix('branches')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('branches.index');
    })->name('branches.index');

    Route::get('/create', function () {
        return view('branches.create');
    })->name('branches.create');

    Route::get('/{id}', function ($id) {
        return view('branches.detail', ['id' => $id]);
    })->name('branches.detail');

    Route::get('/{id}/edit', function ($id) {
        return view('branches.edit', ['id' => $id]);
    })->name('branches.edit');

    Route::get('/performance', function () {
        return view('branches.performance');
    })->name('branches.performance');
});

// Production Module Routes
Route::middleware('auth')->group(function () {
    // Production Planning
    Route::get('/production/planning', function () {
        return view('production.planning');
    })->name('production.planning');

    Route::get('/production/planning/{id}/detail', function ($id) {
        return view('production.planning-detail', ['id' => $id]);
    })->name('production.planning.detail');

    Route::get('/production/planning/{id}/edit', function ($id) {
        return view('production.planning-edit', ['id' => $id]);
    })->name('production.planning.edit');

    Route::get('/production/planning/create', function () {
        return view('production.planning-create');
    })->name('production.planning.create');

    // Raw Material Management
    Route::get('/production/raw-materials', function () {
        return view('production.raw-materials.index');
    })->name('production.raw-materials');

    Route::get('/production/raw-materials/create', function () {
        return view('production.raw-materials.create');
    })->name('production.raw-materials.create');

    Route::get('/production/raw-materials/{id}', function ($id) {
        return view('production.raw-materials.detail', ['id' => $id]);
    })->name('production.raw-materials.detail');

    Route::get('/production/raw-materials/{id}/edit', function ($id) {
        return view('production.raw-materials.edit', ['id' => $id]);
    })->name('production.raw-materials.edit');
});

// Production Module Routes - Quality Control
Route::middleware('auth')->group(function () {
    // Quality Control
    Route::get('/production/quality-control', function () {
        return view('production.quality-control.index');
    })->name('production.quality-control');

    Route::get('/production/quality-control/create', function () {
        return view('production.quality-control.create');
    })->name('production.quality-control.create');

    Route::get('/production/quality-control/{id}', function ($id) {
        return view('production.quality-control.detail', ['id' => $id]);
    })->name('production.quality-control.detail');

    Route::get('/production/quality-control/{id}/edit', function ($id) {
        return view('production.quality-control.edit', ['id' => $id]);
    })->name('production.quality-control.edit');

    // Quality Control Standards
    Route::get('/production/quality-control/standards', function () {
        return view('production.quality-control.standards');
    })->name('production.quality-control.standards');
});

// Production Module Routes - Machine Maintenance
Route::middleware('auth')->group(function () {
    // Machine Maintenance
    Route::get('/production/machine-maintenance', function () {
        return view('production.machine-maintenance.index');
    })->name('production.machine-maintenance');

    Route::get('/production/machine-maintenance/create', function () {
        return view('production.machine-maintenance.create');
    })->name('production.machine-maintenance.create');

    Route::get('/production/machine-maintenance/{id}', function ($id) {
        return view('production.machine-maintenance.detail', ['id' => $id]);
    })->name('production.machine-maintenance.detail');

    Route::get('/production/machine-maintenance/{id}/edit', function ($id) {
        return view('production.machine-maintenance.edit', ['id' => $id]);
    })->name('production.machine-maintenance.edit');

    // Maintenance Schedule
    Route::get('/production/machine-maintenance/schedule', function () {
        return view('production.machine-maintenance.schedule');
    })->name('production.machine-maintenance.schedule');
});

// Production Module Routes - Mix Design
Route::middleware('auth')->group(function () {
    // Mix Design
    Route::get('/production/mix-design', function () {
        return view('production.mix-design.index');
    })->name('production.mix-design.index');

    Route::get('/production/mix-design/create', function () {
        return view('production.mix-design.create');
    })->name('production.mix-design.create');

    Route::get('/production/mix-design/{id}', function ($id) {
        return view('production.mix-design.detail', ['id' => $id]);
    })->name('production.mix-design.detail');

    Route::get('/production/mix-design/{id}/edit', function ($id) {
        return view('production.mix-design.edit', ['id' => $id]);
    })->name('production.mix-design.edit');

    Route::get('/production/mix-design/testing', function () {
        return view('production.mix-design.testing');
    })->name('production.mix-design.testing');
});

// Production Module Routes - Batch Plant Monitoring
Route::middleware('auth')->group(function () {
    // Batch Plant Monitoring
    Route::get('/production/batch-plant', function () {
        return view('production.batch-plant.index');
    })->name('production.batch-plant');

    Route::get('/production/batch-plant/dashboard', function () {
        return view('production.batch-plant.dashboard');
    })->name('production.batch-plant.dashboard');

    Route::get('/production/batch-plant/history', function () {
        return view('production.batch-plant.history');
    })->name('production.batch-plant.history');

    Route::get('/production/batch-plant/alerts', function () {
        return view('production.batch-plant.alerts');
    })->name('production.batch-plant.alerts');

    Route::get('/production/batch-plant/settings', function () {
        return view('production.batch-plant.settings');
    })->name('production.batch-plant.settings');
});

// Production Module Routes - Strength Testing
Route::middleware('auth')->group(function () {
    // Strength Testing
    Route::get('/production/strength-testing', function () {
        return view('production.strength-testing.index');
    })->name('production.strength-testing');

    Route::get('/production/strength-testing/create', function () {
        return view('production.strength-testing.create');
    })->name('production.strength-testing.create');

    Route::get('/production/strength-testing/{id}', function ($id) {
        return view('production.strength-testing.detail', ['id' => $id]);
    })->name('production.strength-testing.detail');

    Route::get('/production/strength-testing/{id}/edit', function ($id) {
        return view('production.strength-testing.edit', ['id' => $id]);
    })->name('production.strength-testing.edit');

    Route::get('/production/strength-testing/reports', function () {
        return view('production.strength-testing.reports');
    })->name('production.strength-testing.reports');

    Route::get('/production/strength-testing/standards', function () {
        return view('production.strength-testing.standards');
    })->name('production.strength-testing.standards');
});

// Warehouse Module Routes
Route::middleware('auth')->group(function () {
    // Raw Material Inventory
    Route::get('/warehouse/raw-materials', function () {
        return view('warehouse.raw-materials.index');
    })->name('warehouse.raw-materials');

    Route::get('/warehouse/raw-materials/create', function () {
        return view('warehouse.raw-materials.create');
    })->name('warehouse.raw-materials.create');

    Route::get('/warehouse/raw-materials/{id}', function ($id) {
        return view('warehouse.raw-materials.detail', ['id' => $id]);
    })->name('warehouse.raw-materials.detail');

    Route::get('/warehouse/raw-materials/{id}/edit', function ($id) {
        return view('warehouse.raw-materials.edit', ['id' => $id]);
    })->name('warehouse.raw-materials.edit');

    Route::get('/warehouse/raw-materials/stock-movement', function () {
        return view('warehouse.raw-materials.stock-movement');
    })->name('warehouse.raw-materials.stock-movement');

    Route::get('/warehouse/raw-materials/low-stock', function () {
        return view('warehouse.raw-materials.low-stock');
    })->name('warehouse.raw-materials.low-stock');
});

// Warehouse Module Routes - Finished Product Inventory
Route::middleware('auth')->group(function () {
    // Finished Product Inventory
    Route::get('/warehouse/finished-products', function () {
        return view('warehouse.finished-products.index');
    })->name('warehouse.finished-products');

    Route::get('/warehouse/finished-products/create', function () {
        return view('warehouse.finished-products.create');
    })->name('warehouse.finished-products.create');

    Route::get('/warehouse/finished-products/{id}', function ($id) {
        return view('warehouse.finished-products.detail', ['id' => $id]);
    })->name('warehouse.finished-products.detail');

    Route::get('/warehouse/finished-products/{id}/edit', function ($id) {
        return view('warehouse.finished-products.edit', ['id' => $id]);
    })->name('warehouse.finished-products.edit');

    Route::get('/warehouse/finished-products/stock-movement', function () {
        return view('warehouse.finished-products.stock-movement');
    })->name('warehouse.finished-products.stock-movement');

    Route::get('/warehouse/finished-products/low-stock', function () {
        return view('warehouse.finished-products.low-stock');
    })->name('warehouse.finished-products.low-stock');
});

// Warehouse Module Routes - Silo Management
Route::middleware('auth')->group(function () {
    // Silo Management
    Route::get('/warehouse/silo-management', function () {
        return view('warehouse.silo-management.index');
    })->name('warehouse.silo-management');

    Route::get('/warehouse/silo-management/history', function () {
        return view('warehouse.silo-management.history');
    })->name('warehouse.silo-management.history');

    Route::get('/warehouse/silo-management/alerts', function () {
        return view('warehouse.silo-management.alerts');
    })->name('warehouse.silo-management.alerts');

    Route::get('/warehouse/silo-management/maintenance', function () {
        return view('warehouse.silo-management.maintenance');
    })->name('warehouse.silo-management.maintenance');
});

// Warehouse Module Routes - Stock Opname
Route::middleware('auth')->group(function () {
    // Stock Opname
    Route::get('/warehouse/stock-opname', function () {
        return view('warehouse.stock-opname.index');
    })->name('warehouse.stock-opname');

    Route::get('/warehouse/stock-opname/create', function () {
        return view('warehouse.stock-opname.create');
    })->name('warehouse.stock-opname.create');

    Route::get('/warehouse/stock-opname/{id}', function ($id) {
        return view('warehouse.stock-opname.detail', ['id' => $id]);
    })->name('warehouse.stock-opname.detail');

    Route::get('/warehouse/stock-opname/{id}/edit', function ($id) {
        return view('warehouse.stock-opname.edit', ['id' => $id]);
    })->name('warehouse.stock-opname.edit');

    Route::get('/warehouse/stock-opname/history', function () {
        return view('warehouse.stock-opname.history');
    })->name('warehouse.stock-opname.history');

    Route::get('/warehouse/stock-opname/reports', function () {
        return view('warehouse.stock-opname.reports');
    })->name('warehouse.stock-opname.reports');
});

// HR Module Routes
Route::middleware('auth')->group(function () {
    // Employee Data
    Route::get('/hr/employees', function () {
        return view('hr.employees.index');
    })->name('hr.employees.index');

    Route::get('/hr/employees/create', function () {
        return view('hr.employees.create');
    })->name('hr.employees.create');

    Route::get('/hr/employees/{id}', function ($id) {
        return view('hr.employees.detail', ['id' => $id]);
    })->name('hr.employees.detail');

    Route::get('/hr/employees/{id}/edit', function ($id) {
        return view('hr.employees.edit', ['id' => $id]);
    })->name('hr.employees.edit');

    Route::get('/hr/employees/import', function () {
        return view('hr.employees.import');
    })->name('hr.employees.import');

    Route::get('/hr/employees/export', function () {
        return view('hr.employees.export');
    })->name('hr.employees.export');
});

// HR Module Routes - Attendance Management
Route::middleware('auth')->prefix('hr/attendance')->name('hr.attendance.')->group(function () {
    // Attendance List
    Route::get('/', function () {
        return view('hr.attendance.index');
    })->name('index');

    // Create New Attendance Record
    Route::get('/create', function () {
        return view('hr.attendance.create');
    })->name('create');

    // View Attendance Detail
    Route::get('/{id}', function ($id) {
        return view('hr.attendance.detail', ['id' => $id]);
    })->name('detail');

    // Edit Attendance Record
    Route::get('/{id}/edit', function ($id) {
        return view('hr.attendance.edit', ['id' => $id]);
    })->name('edit');

    // Attendance Reports
    Route::get('/reports/view', function () {
        return view('hr.attendance.reports');
    })->name('reports');

    // Bulk Attendance Entry
    Route::get('/bulk-entry', function () {
        return view('hr.attendance.bulk-entry');
    })->name('bulk-entry');

    // Process Bulk Attendance
    Route::post('/bulk-entry', function () {
        // This would handle the form submission
        return redirect()->route('hr.attendance.index')
            ->with('success', 'Attendance data has been successfully saved for multiple employees.');
    })->name('bulk-entry.store');

    // Import Attendance
    Route::get('/import', function () {
        return view('hr.attendance.import');
    })->name('import');

    // Export Attendance
    Route::get('/export', function () {
        return view('hr.attendance.export');
    })->name('export');

    // Mobile App Preview
    Route::get('/mobile-app', function () {
        return view('hr.attendance.mobile-app');
    })->name('mobile-app');

    // Location Settings
    Route::get('/locations', function () {
        return view('hr.attendance.locations');
    })->name('locations');

    // Location Create
    Route::get('/locations/create', function () {
        return view('hr.attendance.location-create');
    })->name('locations.create');

    // Location Edit
    Route::get('/locations/{id}/edit', function () {
        return view('hr.attendance.location-edit');
    })->name('locations.edit');
});

// HR Module Routes - Shift Management
Route::middleware('auth')->prefix('hr/shifts')->name('hr.shifts.')->group(function () {
    // Shift List
    Route::get('/', function () {
        return view('hr.shifts.index');
    })->name('index');

    // Create New Shift
    Route::get('/create', function () {
        return view('hr.shifts.create');
    })->name('create');

    // View Shift Detail
    Route::get('/{id}', function ($id) {
        return view('hr.shifts.detail', ['id' => $id]);
    })->name('detail');

    // Edit Shift
    Route::get('/{id}/edit', function ($id) {
        return view('hr.shifts.edit', ['id' => $id]);
    })->name('edit');

    // Shift Assignment
    Route::get('/assignment', function () {
        return view('hr.shifts.assignment');
    })->name('assignment');

    // Shift Schedule
    Route::get('/schedule', function () {
        return view('hr.shifts.schedule');
    })->name('schedule');

    // Shift Reports
    Route::get('/reports', function () {
        return view('hr.shifts.reports');
    })->name('reports');

    // Shift Rotation Management
    Route::get('/rotation/manage', function () {
        return view('hr.shifts.rotation');
    })->name('rotation');
});

// HR Module Routes - Leave Management
Route::middleware('auth')->prefix('hr/leave')->name('hr.leave.')->group(function () {
    // Leave List
    Route::get('/', function () {
        return view('hr.leave.index');
    })->name('index');

    // Create New Leave Request
    Route::get('/create', function () {
        return view('hr.leave.create');
    })->name('create');

    // View Leave Detail
    Route::get('/{id}', function ($id) {
        return view('hr.leave.detail', ['id' => $id]);
    })->name('detail');

    // Edit Leave Request
    Route::get('/{id}/edit', function ($id) {
        return view('hr.leave.edit', ['id' => $id]);
    })->name('edit');

    // Leave Reports
    Route::get('/reports/view', function () {
        return view('hr.leave.reports');
    })->name('reports');

    // Leave Balance
    Route::get('/balance', function () {
        return view('hr.leave.balance');
    })->name('balance');

    // Leave Types
    Route::get('/types', function () {
        return view('hr.leave.types');
    })->name('types');

    // Leave Type Create
    Route::get('/types/create', function () {
        return view('hr.leave.type-create');
    })->name('types.create');

    // Leave Type Edit
    Route::get('/types/{id}/edit', function ($id) {
        return view('hr.leave.type-edit', ['id' => $id]);
    })->name('types.edit');

    // Leave Approval
    Route::get('/approval', function () {
        return view('hr.leave.approval');
    })->name('approval');
});

// HR Module Routes - Payroll Management
Route::middleware('auth')->prefix('hr/payroll')->name('hr.payroll.')->group(function () {
    // Payroll List
    Route::get('/', function () {
        return view('hr.payroll.index');
    })->name('index');

    // Create New Payroll Period
    Route::get('/create', function () {
        return view('hr.payroll.create');
    })->name('create');

    // View Payroll Period Detail
    Route::get('/{id}', function ($id) {
        return view('hr.payroll.detail', ['id' => $id]);
    })->name('detail');

    // Edit Payroll Period
    Route::get('/{id}/edit', function ($id) {
        return view('hr.payroll.edit', ['id' => $id]);
    })->name('edit');

    // Process Payroll
    Route::get('/process', function () {
        return view('hr.payroll.process');
    })->name('process');

    // Payroll Reports
    Route::get('/reports', function () {
        return view('hr.payroll.reports');
    })->name('reports');

    // Salary Components
    Route::get('/components', function () {
        return view('hr.payroll.components');
    })->name('components');

    // Salary Component Create
    Route::get('/components/create', function () {
        return view('hr.payroll.component-create');
    })->name('components.create');

    // Salary Component Edit
    Route::get('/components/{id}/edit', function ($id) {
        return view('hr.payroll.component-edit', ['id' => $id]);
    })->name('components.edit');

    // Tax Settings
    Route::get('/tax-settings', function () {
        return view('hr.payroll.tax-settings');
    })->name('tax-settings');

    // Employee Salary Structure
    Route::get('/salary-structure', function () {
        return view('hr.payroll.salary-structure');
    })->name('salary-structure');

    // Employee Salary Structure Edit
    Route::get('/salary-structure/{id}/edit', function ($id) {
        return view('hr.payroll.salary-structure-edit', ['id' => $id]);
    })->name('salary-structure.edit');

    // Payslips
    Route::get('/payslips', function () {
        return view('hr.payroll.payslips');
    })->name('payslips');

    // Generate Payslip
    Route::get('/payslips/generate', function () {
        return view('hr.payroll.generate-payslips');
    })->name('payslips.generate');

    // View Payslip
    Route::get('/payslips/{id}', function ($id) {
        return view('hr.payroll.payslip-detail', ['id' => $id]);
    })->name('payslips.detail');
});

// HR Module Routes - Training Management
Route::middleware('auth')->prefix('hr/training')->name('hr.training.')->group(function () {
    // Training List
    Route::get('/', function () {
        return view('hr.training.index');
    })->name('index');

    // Training Calendar
    Route::get('/calendar', function () {
        return view('hr.training.calendar');
    })->name('calendar');

    // Training Needs Assessment
    Route::get('/needs-assessment', function () {
        return view('hr.training.needs-assessment');
    })->name('needs-assessment');

    // Create New Training
    Route::get('/create', function () {
        return view('hr.training.create');
    })->name('create');

    // View Training Detail
    Route::get('/{id}', function ($id) {
        return view('hr.training.detail', ['id' => $id]);
    })->name('detail');

    // Edit Training
    Route::get('/{id}/edit', function ($id) {
        return view('hr.training.edit', ['id' => $id]);
    })->name('edit');

    // Training Reports
    Route::get('/reports/view', function () {
        return view('hr.training.reports');
    })->name('reports');

    // Training Providers
    Route::get('/providers', function () {
        return view('hr.training.providers');
    })->name('providers');

    // Training Materials
    Route::get('/materials', function () {
        return view('hr.training.materials');
    })->name('materials');

    // Training Evaluations
    Route::get('/evaluations', function () {
        return view('hr.training.evaluations');
    })->name('evaluations');

    // Training Certifications
    Route::get('/certifications', function () {
        return view('hr.training.certifications');
    })->name('certifications');
});

// HR Module Routes - Performance Management
Route::middleware('auth')->prefix('hr/performance')->name('hr.performance.')->group(function () {
    // Performance List
    Route::get('/', function () {
        return view('hr.performance.index');
    })->name('index');

    // Create New Performance Review
    Route::get('/create', function () {
        return view('hr.performance.create');
    })->name('create');

    // View Performance Detail
    Route::get('/{id}', function ($id) {
        return view('hr.performance.detail', ['id' => $id]);
    })->name('detail');

    // Edit Performance Review
    Route::get('/{id}/edit', function ($id) {
        return view('hr.performance.edit', ['id' => $id]);
    })->name('edit');

    // KPI Dashboard
    Route::get('/dashboard', function () {
        return view('hr.performance.dashboard');
    })->name('dashboard');

    // KPI Templates
    Route::get('/templates', function () {
        return view('hr.performance.templates');
    })->name('templates');

    // Create KPI Template
    Route::get('/templates/create', function () {
        return view('hr.performance.template-create');
    })->name('templates.create');

    // Edit KPI Template
    Route::get('/templates/{id}/edit', function ($id) {
        return view('hr.performance.template-edit', ['id' => $id]);
    })->name('templates.edit');

    // Department KPIs
    Route::get('/department', function () {
        return view('hr.performance.department');
    })->name('department');

    // Performance Reports
    Route::get('/reports', function () {
        return view('hr.performance.reports');
    })->name('reports');
});

// Delivery Module Routes
Route::middleware('auth')->group(function () {
    // Delivery Routes
    Route::get('/delivery/routes', function () {
        return view('delivery.routes.index');
    })->name('delivery.routes');

    Route::get('/delivery/routes/create', function () {
        return view('delivery.routes.create');
    })->name('delivery.routes.create');

    Route::get('/delivery/routes/{id}', function ($id) {
        return view('delivery.routes.detail', ['id' => $id]);
    })->name('delivery.routes.detail');

    Route::get('/delivery/routes/{id}/edit', function ($id) {
        return view('delivery.routes.edit', ['id' => $id]);
    })->name('delivery.routes.edit');
});

// Delivery Module Routes - Fleet Management
Route::middleware('auth')->group(function () {
    // Fleet Management
    Route::get('/delivery/fleet', function () {
        return view('delivery.fleet.index');
    })->name('delivery.fleet');

    Route::get('/delivery/fleet/create', function () {
        return view('delivery.fleet.create');
    })->name('delivery.fleet.create');

    Route::get('/delivery/fleet/{id}', function ($id) {
        return view('delivery.fleet.detail', ['id' => $id]);
    })->name('delivery.fleet.detail');

    Route::get('/delivery/fleet/{id}/edit', function ($id) {
        return view('delivery.fleet.edit', ['id' => $id]);
    })->name('delivery.fleet.edit');

    Route::get('/delivery/fleet/maintenance', function () {
        return view('delivery.fleet.maintenance');
    })->name('delivery.fleet.maintenance');

    Route::get('/delivery/fleet/fuel-tracking', function () {
        return view('delivery.fleet.fuel-tracking');
    })->name('delivery.fleet.fuel-tracking');

    Route::get('/delivery/fleet/reports', function () {
        return view('delivery.fleet.reports');
    })->name('delivery.fleet.reports');
});

// Delivery Module Routes - Scheduling
Route::middleware('auth')->group(function () {
    // Delivery Scheduling
    Route::get('/delivery/scheduling', function () {
        return view('delivery.scheduling.index');
    })->name('delivery.scheduling');

    Route::get('/delivery/scheduling/create', function () {
        return view('delivery.scheduling.create');
    })->name('delivery.scheduling.create');

    Route::get('/delivery/scheduling/{id}', function ($id) {
        return view('delivery.scheduling.detail', ['id' => $id]);
    })->name('delivery.scheduling.detail');

    Route::get('/delivery/scheduling/{id}/edit', function ($id) {
        return view('delivery.scheduling.edit', ['id' => $id]);
    })->name('delivery.scheduling.edit');

    Route::get('/delivery/scheduling/calendar', function () {
        return view('delivery.scheduling.calendar');
    })->name('delivery.scheduling.calendar');

    Route::get('/delivery/scheduling/reports', function () {
        return view('delivery.scheduling.reports');
    })->name('delivery.scheduling.reports');
});
