@extends('layouts.app')

@section('title', 'Add New Employee')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Add New Employee
                </h2>
                <div class="text-muted mt-1">Create a new employee record</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('hr.employees.index') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-arrow-left me-1"></i>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3 class="mb-3">Personal Information</h3>
                    </div>
                    
                                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Full Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter full name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Employee ID</label>
                            <input type="text" class="form-control" name="employee_id" placeholder="EMP0001" required>
                            <small class="form-hint">Leave blank for auto-generation</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Date of Birth</label>
                            <input type="date" class="form-control" name="birth_date" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Gender</label>
                            <select class="form-select" name="gender" required>
                                <option value="">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Marital Status</label>
                            <select class="form-select" name="marital_status">
                                <option value="">Select marital status</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Blood Type</label>
                            <select class="form-select" name="blood_type">
                                <option value="">Select blood type</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Religion</label>
                            <select class="form-select" name="religion">
                                <option value="">Select religion</option>
                                <option value="islam">Islam</option>
                                <option value="christianity">Christianity</option>
                                <option value="catholicism">Catholicism</option>
                                <option value="hinduism">Hinduism</option>
                                <option value="buddhism">Buddhism</option>
                                <option value="confucianism">Confucianism</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nationality</label>
                            <input type="text" class="form-control" name="nationality" placeholder="Enter nationality" value="Indonesian">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">National ID (KTP)</label>
                            <input type="text" class="form-control" name="national_id" placeholder="Enter KTP number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">NPWP</label>
                            <input type="text" class="form-control" name="tax_id" placeholder="Enter NPWP number">
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3 class="mb-3">Contact Information</h3>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email address" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Phone Number</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Enter phone number" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Emergency Contact Name</label>
                            <input type="text" class="form-control" name="emergency_contact_name" placeholder="Enter emergency contact name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Emergency Contact Phone</label>
                            <input type="tel" class="form-control" name="emergency_contact_phone" placeholder="Enter emergency contact phone">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label required">Address</label>
                            <textarea class="form-control" name="address" rows="3" placeholder="Enter full address" required></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3 class="mb-3">Employment Information</h3>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Department</label>
                            <select class="form-select" name="department" required>
                                <option value="">Select department</option>
                                <option value="production">Production</option>
                                <option value="finance">Finance</option>
                                <option value="hr">Human Resources</option>
                                <option value="sales">Sales</option>
                                <option value="warehouse">Warehouse</option>
                                <option value="delivery">Delivery</option>
                                <option value="quality">Quality Control</option>
                                <option value="maintenance">Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Position</label>
                            <select class="form-select" name="position" required>
                                <option value="">Select position</option>
                                <option value="manager">Manager</option>
                                <option value="supervisor">Supervisor</option>
                                <option value="staff">Staff</option>
                                <option value="operator">Operator</option>
                                <option value="driver">Driver</option>
                                <option value="technician">Technician</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Branch</label>
                            <select class="form-select" name="branch" required>
                                <option value="">Select branch</option>
                                <option value="jakarta">Jakarta</option>
                                <option value="bandung">Bandung</option>
                                <option value="surabaya">Surabaya</option>
                                <option value="semarang">Semarang</option>
                                <option value="medan">Medan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Employment Status</label>
                            <select class="form-select" name="employment_status" required>
                                <option value="">Select status</option>
                                <option value="permanent">Permanent</option>
                                <option value="contract">Contract</option>
                                <option value="probation">Probation</option>
                                <option value="internship">Internship</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label required">Join Date</label>
                            <input type="date" class="form-control" name="join_date" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Contract End Date</label>
                            <input type="date" class="form-control" name="contract_end_date">
                            <small class="form-hint">Required for contract employees</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Reporting To</label>
                            <select class="form-select" name="reporting_to">
                                <option value="">Select supervisor</option>
                                <option value="1">Production Manager</option>
                                <option value="2">Finance Manager</option>
                                <option value="3">HR Manager</option>
                                <option value="4">Sales Manager</option>
                                <option value="5">Warehouse Manager</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Work Schedule</label>
                            <select class="form-select" name="work_schedule">
                                <option value="">Select work schedule</option>
                                <option value="regular">Regular (Mon-Fri, 08:00-17:00)</option>
                                <option value="shift1">Shift 1 (06:00-14:00)</option>
                                <option value="shift2">Shift 2 (14:00-22:00)</option>
                                <option value="shift3">Shift 3 (22:00-06:00)</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3 class="mb-3">Payroll Information</h3>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Basic Salary</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="basic_salary" placeholder="Enter basic salary">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Allowances</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="allowances" placeholder="Enter allowances">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Payment Method</label>
                            <select class="form-select" name="payment_method">
                                <option value="">Select payment method</option>
                                <option value="bank_transfer">Bank Transfer</option>
                                <option value="cash">Cash</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Bank Account</label>
                            <input type="text" class="form-control" name="bank_account" placeholder="Enter bank account number">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Bank Name</label>
                            <select class="form-select" name="bank_name">
                                <option value="">Select bank</option>
                                <option value="bca">BCA</option>
                                <option value="mandiri">Mandiri</option>
                                <option value="bni">BNI</option>
                                <option value="bri">BRI</option>
                                <option value="cimb">CIMB Niaga</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Tax Status</label>
                            <select class="form-select" name="tax_status">
                                <option value="">Select tax status</option>
                                <option value="tk0">TK/0 (Single, No Dependents)</option>
                                <option value="tk1">TK/1 (Single, 1 Dependent)</option>
                                <option value="tk2">TK/2 (Single, 2 Dependents)</option>
                                <option value="tk3">TK/3 (Single, 3 Dependents)</option>
                                <option value="k0">K/0 (Married, No Dependents)</option>
                                <option value="k1">K/1 (Married, 1 Dependent)</option>
                                <option value="k2">K/2 (Married, 2 Dependents)</option>
                                <option value="k3">K/3 (Married, 3 Dependents)</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3 class="mb-3">Documents</h3>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                                                        <label class="form-label">Profile Photo</label>
                            <input type="file" class="form-control" name="profile_photo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">CV/Resume</label>
                            <input type="file" class="form-control" name="cv">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">KTP</label>
                            <input type="file" class="form-control" name="ktp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Employment Contract</label>
                            <input type="file" class="form-control" name="contract">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Certificates</label>
                            <input type="file" class="form-control" name="certificates[]" multiple>
                            <small class="form-hint">You can select multiple files</small>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3 class="mb-3">Skills & Certifications</h3>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Skills</label>
                            <textarea class="form-control" name="skills" rows="2" placeholder="Enter skills (comma separated)"></textarea>
                            <small class="form-hint">Example: Batch Plant Operation, Quality Control, Mix Design</small>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Certifications</label>
                            <div class="table-responsive">
                                <table class="table table-vcenter" id="certifications-table">
                                    <thead>
                                        <tr>
                                            <th>Certification Name</th>
                                            <th>Issuing Organization</th>
                                            <th>Issue Date</th>
                                            <th>Expiry Date</th>
                                            <th width="1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="certification_name[]" placeholder="Certification name">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="certification_org[]" placeholder="Issuing organization">
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" name="certification_issue_date[]">
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" name="certification_expiry_date[]">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-icon btn-outline-danger" onclick="removeRow(this)">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5">
                                                <button type="button" class="btn btn-outline-success btn-sm" onclick="addCertificationRow()">
                                                    <i class="ti ti-plus me-1"></i>
                                                    Add Certification
                                                </button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3 class="mb-3">Additional Information</h3>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" name="notes" rows="3" placeholder="Enter any additional notes about the employee"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="form-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('hr.employees.index') }}" class="btn btn-outline-secondary w-100">
                                <i class="ti ti-x me-1"></i>
                                Cancel
                            </a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="ti ti-plus me-1"></i>
                                Create Employee
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function addCertificationRow() {
        const table = document.getElementById('certifications-table').getElementsByTagName('tbody')[0];
        const newRow = table.insertRow();
        
        newRow.innerHTML = `
            <td>
                <input type="text" class="form-control" name="certification_name[]" placeholder="Certification name">
            </td>
            <td>
                <input type="text" class="form-control" name="certification_org[]" placeholder="Issuing organization">
            </td>
            <td>
                <input type="date" class="form-control" name="certification_issue_date[]">
            </td>
            <td>
                <input type="date" class="form-control" name="certification_expiry_date[]">
            </td>
            <td>
                <button type="button" class="btn btn-icon btn-outline-danger" onclick="removeRow(this)">
                    <i class="ti ti-trash"></i>
                </button>
            </td>
        `;
    }
    
    function removeRow(button) {
        const row = button.closest('tr');
        row.remove();
    }
</script>
@endsection


