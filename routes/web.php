<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes (protected by auth middleware)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Finance Module Routes
Route::get('/finance/accounting', function () {
    return view('finance.accounting');
})->middleware('auth')->name('finance.accounting');

// Payroll routes
Route::get('/finance/payroll', function () {
    return view('finance.payroll');
})->middleware('auth')->name('finance.payroll');

// Cost Management route
Route::get('/finance/cost-management', function () {
    return view('finance.cost-management');
})->middleware('auth')->name('finance.cost-management');

// Payroll detail route
Route::get('/finance/payroll/{id}/detail', function ($id) {
    return view('finance.payroll-detail');
})->middleware('auth')->name('finance.payroll.detail');

// Payroll edit route
Route::get('/finance/payroll/{id}/edit', function ($id) {
    return view('finance.payroll-edit');
})->middleware('auth')->name('finance.payroll.edit');

// Transaction routes
Route::get('/finance/transaction/{id}/detail', function ($id) {
    return view('finance.transaction-detail');
})->middleware('auth')->name('finance.transaction.detail');

Route::get('/finance/transaction/{id}/edit', function ($id) {
    return view('finance.transaction-edit');
})->middleware('auth')->name('finance.transaction.edit');

// Journal routes
Route::get('/finance/journal/{id}/detail', function ($id) {
    return view('finance.journal-detail');
})->middleware('auth')->name('finance.journal.detail');

Route::get('/finance/journal/{id}/edit', function ($id) {
    return view('finance.journal-edit');
})->middleware('auth')->name('finance.journal.edit');

// Account routes
Route::get('/finance/account/{id}/detail', function ($id) {
    return view('finance.account-detail');
})->middleware('auth')->name('finance.account.detail');

Route::get('/finance/account/{id}/edit', function ($id) {
    return view('finance.account-edit');
})->middleware('auth')->name('finance.account.edit');

// Financial Reports route
Route::get('/finance/reports', function () {
    return view('finance.reports');
})->middleware('auth')->name('finance.reports');

// Sales Module Routes
Route::get('/sales/customer-management', function () {
    return view('sales.customer-management');
})->middleware('auth')->name('sales.customer-management');

Route::get('/sales/customer/{id}/detail', function ($id) {
    return view('sales.customer-detail', ['id' => $id]);
})->middleware('auth')->name('sales.customer.detail');

Route::get('/sales/customer/{id}/edit', function ($id) {
    return view('sales.customer-edit', ['id' => $id]);
})->middleware('auth')->name('sales.customer.edit');

Route::get('/sales/customer/create', function () {
    return view('sales.customer-create');
})->middleware('auth')->name('sales.customer.create');

// Sales Module Routes - Quotes & Contracts
Route::get('/sales/quotes-contracts', function () {
    return view('sales.quotes-contracts');
})->middleware('auth')->name('sales.quotes-contracts');

Route::get('/sales/quote/{id}/detail', function ($id) {
    return view('sales.quote-detail', ['id' => $id]);
})->middleware('auth')->name('sales.quote.detail');

Route::get('/sales/quote/{id}/edit', function ($id) {
    return view('sales.quote-edit', ['id' => $id]);
})->middleware('auth')->name('sales.quote.edit');

Route::get('/sales/quote/create', function () {
    return view('sales.quote-create');
})->middleware('auth')->name('sales.quote.create');

Route::get('/sales/contract/{id}/detail', function ($id) {
    return view('sales.contract-detail', ['id' => $id]);
})->middleware('auth')->name('sales.contract.detail');

Route::get('/sales/contract/{id}/edit', function ($id) {
    return view('sales.contract-edit', ['id' => $id]);
})->middleware('auth')->name('sales.contract.edit');

Route::get('/sales/contract/create', function () {
    return view('sales.contract-create');
})->middleware('auth')->name('sales.contract.create');

Route::get('/sales/contracts', function () {
    return view('sales.contract-list');
})->middleware('auth')->name('sales.contracts');
