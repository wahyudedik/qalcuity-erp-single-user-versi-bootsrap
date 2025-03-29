@extends('layouts.app')

@section('title', 'Edit Penggajian')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Edit Penggajian
                    </h2>
                    <div class="text-muted mt-1">ID: PAY-2023{{ str_pad(request()->route('id'), 4, '0', STR_PAD_LEFT) }}
                    </div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('finance.payroll.detail', request()->route('id')) }}"
                            class="btn btn-outline-secondary">
                            <i class="ti ti-eye"></i>
                            Lihat Detail
                        </a>
                        <a href="{{ route('finance.payroll') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <form action="#" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Dasar</h3>
                            </div>
                            <div class="card-body">
                                @php
                                    $employees = [
                                        'Ahmad Fauzi',
                                        'Budi Santoso',
                                        'Citra Dewi',
                                        'Dian Purnama',
                                        'Eko Prasetyo',
                                        'Fitri Handayani',
                                        'Gunawan Wibowo',
                                        'Hendra Kusuma',
                                        'Indah Permata',
                                        'Joko Widodo',
                                        'Kartika Sari',
                                        'Lukman Hakim',
                                    ];
                                    $departments = ['Produksi', 'Keuangan', 'HR', 'Marketing', 'IT', 'Operasional'];
                                    $id = request()->route('id');
                                    $employee = $employees[$id - 1] ?? 'Karyawan';
                                    $department = $departments[rand(0, count($departments) - 1)];
                                    $position = ['Staff', 'Supervisor', 'Manager', 'Senior Manager'][rand(0, 3)];

                                    $baseSalary = rand(3000000, 8000000);
                                    $allowance = rand(500000, 2000000);
                                    $overtime = rand(0, 500000);
                                    $bonus = rand(0, 1000000);

                                    $tax = round($baseSalary * 0.05);
                                    $bpjs = round($baseSalary * 0.02);
                                    $loan = rand(0, 300000);
                                    $absence = rand(0, 200000);
                                @endphp

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">ID Penggajian</label>
                                        <input type="text" class="form-control"
                                            value="PAY-2023{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Periode</label>
                                        <select class="form-select">
                                            <option value="july-2023" selected>Juli 2023</option>
                                            <option value="august-2023">Agustus 2023</option>
                                            <option value="september-2023">September 2023</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Karyawan</label>
                                        <input type="text" class="form-control" value="{{ $employee }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">ID Karyawan</label>
                                        <input type="text" class="form-control"
                                            value="EMP-{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Departemen</label>
                                        <input type="text" class="form-control" value="{{ $department }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Jabatan</label>
                                        <input type="text" class="form-control"
                                            value="{{ $position }} {{ $department }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Tanggal Pembayaran</label>
                                        <input type="date" class="form-control" value="2023-07-28">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-select">
                                            <option value="paid" selected>Dibayar</option>
                                            <option value="pending">Tertunda</option>
                                            <option value="cancelled">Dibatalkan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Komponen Pendapatan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Gaji Pokok</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control"
                                                value="{{ number_format($baseSalary, 0, ',', '.') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tunjangan</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control"
                                                value="{{ number_format($allowance, 0, ',', '.') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Lembur</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control"
                                                value="{{ number_format($overtime, 0, ',', '.') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Bonus</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control"
                                                value="{{ number_format($bonus, 0, ',', '.') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Pendapatan Lainnya</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Komponen Potongan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Pajak Penghasilan (PPh 21)</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control"
                                                value="{{ number_format($tax, 0, ',', '.') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">BPJS Kesehatan & Ketenagakerjaan</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control"
                                                value="{{ number_format($bpjs, 0, ',', '.') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Cicilan Pinjaman</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control"
                                                value="{{ number_format($loan, 0, ',', '.') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Potongan Ketidakhadiran</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control"
                                                value="{{ number_format($absence, 0, ',', '.') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Potongan Lainnya</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Catatan</h3>
                            </div>
                            <div class="card-body">
                                <textarea class="form-control" rows="3" placeholder="Catatan tambahan...">Penggajian untuk periode Juli 2023. Termasuk bonus prestasi kerja.</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ringkasan</h3>
                            </div>
                            <div class="card-body">
                                @php
                                    $totalEarnings = $baseSalary + $allowance + $overtime + $bonus;
                                    $totalDeductions = $tax + $bpjs + $loan + $absence;
                                    $netSalary = $totalEarnings - $totalDeductions;
                                @endphp

                                <div class="mb-3">
                                    <label class="form-label">Total Pendapatan</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control"
                                            value="{{ number_format($totalEarnings, 0, ',', '.') }}" readonly>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Total Potongan</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control"
                                            value="{{ number_format($totalDeductions, 0, ',', '.') }}" readonly>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Gaji Bersih</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control fw-bold"
                                            value="{{ number_format($netSalary, 0, ',', '.') }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Kehadiran & Cuti</h3>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label class="form-label">Hari Kerja</label>
                                        <input type="number" class="form-control" value="22">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Hadir</label>
                                        <input type="number" class="form-control" value="{{ 22 - rand(0, 3) }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label class="form-label">Cuti Diambil</label>
                                        <input type="number" class="form-control" value="{{ rand(0, 3) }}">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Cuti Sakit</label>
                                        <input type="number" class="form-control" value="{{ rand(0, 2) }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Terlambat</label>
                                        <input type="number" class="form-control" value="{{ rand(0, 5) }}">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Sisa Cuti</label>
                                        <input type="number" class="form-control" value="{{ 12 - rand(0, 5) }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Metode Pembayaran</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Metode</label>
                                    <select class="form-select">
                                        <option value="bank_transfer" selected>Transfer Bank</option>
                                        <option value="cash">Tunai</option>
                                        <option value="check">Cek</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Bank</label>
                                    <select class="form-select">
                                        <option value="bca" selected>BCA</option>
                                        <option value="mandiri">Mandiri</option>
                                        <option value="bni">BNI</option>
                                        <option value="bri">BRI</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nomor Rekening</label>
                                    <input type="text" class="form-control" value="1234567890">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Atas Nama</label>
                                    <input type="text" class="form-control" value="{{ $employee }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('finance.payroll') }}" class="btn btn-outline-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Format currency inputs
            const formatCurrency = (input) => {
                // Remove non-digit characters
                let value = input.value.replace(/\D/g, '');

                // Format with thousand separator
                if (value) {
                    value = parseInt(value).toLocaleString('id-ID');
                }

                input.value = value;
            };

            // Apply to all currency inputs
            document.querySelectorAll('.input-group input').forEach(input => {
                input.addEventListener('blur', function() {
                    formatCurrency(this);
                });

                input.addEventListener('focus', function() {
                    this.value = this.value.replace(/\./g, '');
                });
            });

            // Calculate totals when inputs change
            const calculateTotals = () => {
                // Get all income components
                const baseSalary = parseInt(document.querySelector('input[value*="' + {{ $baseSalary }} +
                    '"]').value.replace(/\./g, '')) || 0;
                const allowance = parseInt(document.querySelector('input[value*="' + {{ $allowance }} +
                    '"]').value.replace(/\./g, '')) || 0;
                const overtime = parseInt(document.querySelector('input[value*="' + {{ $overtime }} + '"]')
                    .value.replace(/\./g, '')) || 0;
                const bonus = parseInt(document.querySelector('input[value*="' + {{ $bonus }} + '"]')
                    .value.replace(/\./g, '')) || 0;

                // Get all deduction components
                const tax = parseInt(document.querySelector('input[value*="' + {{ $tax }} + '"]')
                    .value.replace(/\./g, '')) || 0;
                const bpjs = parseInt(document.querySelector('input[value*="' + {{ $bpjs }} + '"]')
                    .value.replace(/\./g, '')) || 0;
                const loan = parseInt(document.querySelector('input[value*="' + {{ $loan }} + '"]')
                    .value.replace(/\./g, '')) || 0;
                const absence = parseInt(document.querySelector('input[value*="' + {{ $absence }} + '"]')
                    .value.replace(/\./g, '')) || 0;

                // Calculate totals
                const totalEarnings = baseSalary + allowance + overtime + bonus;
                const totalDeductions = tax + bpjs + loan + absence;
                const netSalary = totalEarnings - totalDeductions;

                // Update summary fields
                document.querySelector('input[value*="' + {{ $totalEarnings }} + '"]').value = totalEarnings
                    .toLocaleString('id-ID');
                document.querySelector('input[value*="' + {{ $totalDeductions }} + '"]').value =
                    totalDeductions.toLocaleString('id-ID');
                document.querySelector('input[value*="' + {{ $netSalary }} + '"]').value = netSalary
                    .toLocaleString('id-ID');
            };

            // Add event listeners to all input fields that affect totals
            document.querySelectorAll('.input-group input').forEach(input => {
                input.addEventListener('change', calculateTotals);
            });
        });
    </script>
@endsection
