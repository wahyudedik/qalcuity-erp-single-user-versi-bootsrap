@extends('layouts.app')

@section('title', 'Employee Payslip')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Employee Payslip
                </h2>
                <div class="text-muted mt-1">July 2023 Payslip for Budi Santoso</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.payroll.detail', 1) }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left"></i>
                        Back
                    </a>
                    <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                        <i class="ti ti-printer"></i>
                        Print Payslip
                    </button>
                    <button type="button" class="btn btn-success">
                        <i class="ti ti-mail"></i>
                        Email Payslip
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h1 class                        ="m-0">Qalcuity ERP</h1>
                        <p class="h3">PAYSLIP</p>
                        <address>
                            PT Qalcuity Concrete Indonesia<br>
                            Jl. Industri Raya No. 123<br>
                            Jakarta Utara, 14250<br>
                            Indonesia
                        </address>
                    </div>
                    <div class="col-6 text-end">
                        <img src="https://placehold.co/200x60?text=Qalcuity+Logo" alt="Qalcuity Logo">
                        <p class="mt-3">
                            <strong>Payroll Period:</strong> July 2023<br>
                            <strong>Payment Date:</strong> 01-08-2023<br>
                            <strong>Payslip No:</strong> PSL-2023-07-1001
                        </p>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h3>Employee Information</h3>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-2">
                                    <strong>Employee Name:</strong> Budi Santoso
                                </div>
                                <div class="mb-2">
                                    <strong>Employee ID:</strong> EMP-1001
                                </div>
                                <div class="mb-2">
                                    <strong>Department:</strong> Production
                                </div>
                                <div class="mb-2">
                                    <strong>Position:</strong> Production Manager
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-2">
                                    <strong>Bank Account:</strong> BCA - 1234567890
                                </div>
                                <div class="mb-2">
                                    <strong>Tax ID (NPWP):</strong> 01.234.567.8-123.000
                                </div>
                                <div class="mb-2">
                                    <strong>BPJS Ketenagakerjaan:</strong> 1234567890123
                                </div>
                                <div class="mb-2">
                                    <strong>BPJS Kesehatan:</strong> 0001234567890
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h3>Attendance Summary</h3>
                        <div class="row">
                            <div class="col-3">
                                <div class="mb-2">
                                    <strong>Working Days:</strong> 22 days
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-2">
                                    <strong>Days Present:</strong> 21 days
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-2">
                                    <strong>Leave Taken:</strong> 1 day
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-2">
                                    <strong>Overtime Hours:</strong> 24 hours
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h3>Earnings & Deductions</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center">Earnings</th>
                                        <th colspan="2" class="text-center">Deductions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Basic Salary</td>
                                        <td class="text-end">Rp 12.000.000</td>
                                        <td>Income Tax (PPh 21)</td>
                                        <td class="text-end">Rp 1.200.000</td>
                                    </tr>
                                    <tr>
                                        <td>Position Allowance</td>
                                        <td class="text-end">Rp 2.500.000</td>
                                        <td>BPJS Ketenagakerjaan (2%)</td>
                                        <td class="text-end">Rp 240.000</td>
                                    </tr>
                                    <tr>
                                        <td>Meal Allowance</td>
                                        <td class="text-end">Rp 1.000.000</td>
                                        <td>BPJS Kesehatan (1%)</td>
                                        <td class="text-end">Rp 120.000</td>
                                    </tr>
                                    <tr>
                                        <td>Transport Allowance</td>
                                        <td class="text-end">Rp 800.000</td>
                                        <td>Loan Repayment</td>
                                        <td class="text-end">Rp 500.000</td>
                                    </tr>
                                    <tr>
                                        <td>Overtime Pay</td>
                                        <td class="text-end">Rp 1.800.000</td>
                                        <td>Absence Deduction</td>
                                        <td class="text-end">Rp 0</td>
                                    </tr>
                                    <tr>
                                        <td>Performance Bonus</td>
                                        <td class="text-end">Rp 1.500.000</td>
                                        <td>Other Deductions</td>
                                        <td class="text-end">Rp 0</td>
                                    </tr>
                                    <tr>
                                        <th>Total Earnings</th>
                                        <th class="text-end">Rp 19.600.000</th>
                                        <th>Total Deductions</th>
                                        <th class="text-end">Rp 2.060.000</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card bg-primary-lt">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h3 class="mb-0">Net Salary</h3>
                                    </div>
                                    <div class="col-6 text-end">
                                        <h2 class="mb-0">Rp 17.540.000</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <h3>Year-to-Date Summary</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th class="text-end">Current Month</th>
                                        <th class="text-end">Year to Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Gross Earnings</td>
                                        <td class="text-end">Rp 19.600.000</td>
                                        <td class="text-end">Rp 137.200.000</td>
                                    </tr>
                                    <tr>
                                        <td>Taxable Income</td>
                                        <td class="text-end">Rp 18.600.000</td>
                                        <td class="text-end">Rp 130.200.000</td>
                                    </tr>
                                    <tr>
                                        <td>Tax Paid (PPh 21)</td>
                                        <td class="text-end">Rp 1.200.000</td>
                                        <td class="text-end">Rp 8.400.000</td>
                                    </tr>
                                    <tr>
                                        <td>BPJS Ketenagakerjaan</td>
                                        <td class="text-end">Rp 240.000</td>
                                        <td class="text-end">Rp 1.680.000</td>
                                    </tr>
                                    <tr>
                                        <td>BPJS Kesehatan</td>
                                        <td class="text-end">Rp 120.000</td>
                                        <td class="text-end">Rp 840.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="text-muted">
                            <p><strong>Note:</strong> This is a computer-generated document. No signature is required.</p>
                            <p>For any payroll queries, please contact HR Department at hr@qalcuity.com or ext. 123.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

