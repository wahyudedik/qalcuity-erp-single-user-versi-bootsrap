@extends('layouts.app')

@section('title', 'Detail Penggajian')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Detail Penggajian
                </h2>
                <div class="text-muted mt-1">ID: PAY-2023{{ str_pad(request()->route('id'), 4, '0', STR_PAD_LEFT) }}</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-outline-primary" onclick="window.print();">
                        <i class="ti ti-printer"></i>
                        Cetak
                    </a>
                    <a href="{{ route('finance.payroll.edit', request()->route('id')) }}" class="btn btn-primary">
                        <i class="ti ti-edit"></i>
                        Edit
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
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <p class="h3">Qalcuity ERP</p>
                        <address>
                            Jl. Industri No. 123<br>
                            Kawasan Industri Pulogadung<br>
                            Jakarta Timur, DKI Jakarta<br>
                            Indonesia
                        </address>
                    </div>
                    <div class="col-6 text-end">
                        <p class="h3">Slip Gaji</p>
                        <p class="text-muted">Periode: Juli 2023</p>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-6">
                        <p class="h4">Informasi Karyawan</p>
                        @php
                        $employees = [
                            'Ahmad Fauzi', 'Budi Santoso', 'Citra Dewi', 'Dian Purnama', 
                            'Eko Prasetyo', 'Fitri Handayani', 'Gunawan Wibowo', 'Hendra Kusuma',
                            'Indah Permata', 'Joko Widodo', 'Kartika Sari', 'Lukman Hakim'
                        ];
                        $departments = ['Produksi', 'Keuangan', 'HR', 'Marketing', 'IT', 'Operasional'];
                        $id = request()->route('id');
                        $employee = $employees[$id-1] ?? 'Karyawan';
                        $department = $departments[rand(0, count($departments)-1)];
                        $position = ['Staff', 'Supervisor', 'Manager', 'Senior Manager'][rand(0, 3)];
                        @endphp
                        <table class="table table-transparent table-responsive">
                            <tr>
                                <td class="fw-bold">Nama</td>
                                <td>: {{ $employee }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">ID Karyawan</td>
                                <td>: EMP-{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Departemen</td>
                                <td>: {{ $department }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Jabatan</td>
                                <td>: {{ $position }} {{ $department }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Tanggal Bergabung</td>
                                <td>: {{ date('d M Y', strtotime('-'.rand(1, 5).' years')) }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6 text-end">
                        <p class="h4">Informasi Pembayaran</p>
                        <table class="table table-transparent table-responsive">
                            <tr>
                                <td class="fw-bold">ID Slip</td>
                                <td>: PAY-2023{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Periode</td>
                                <td>: 1 - 31 Juli 2023</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Tanggal Pembayaran</td>
                                <td>: 28 Juli 2023</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Metode Pembayaran</td>
                                <td>: Transfer Bank</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Status</td>
                                <td>: <span class="badge bg-success">Dibayar</span></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Rincian Gaji</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Pendapatan</th>
                                            <th colspan="2">Potongan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $baseSalary = rand(3000000, 8000000);
                                        $allowance = rand(500000, 2000000);
                                        $overtime = rand(0, 500000);
                                        $bonus = rand(0, 1000000);
                                        
                                        $tax = round($baseSalary * 0.05);
                                        $bpjs = round($baseSalary * 0.02);
                                        $loan = rand(0, 300000);
                                        $absence = rand(0, 200000);
                                        
                                        $totalEarnings = $baseSalary + $allowance + $overtime + $bonus;
                                        $totalDeductions = $tax + $bpjs + $loan + $absence;
                                        $netSalary = $totalEarnings - $totalDeductions;
                                        @endphp
                                        <tr>
                                            <td>Gaji Pokok</td>
                                            <td class="text-end">Rp {{ number_format($baseSalary, 0, ',', '.') }}</td>
                                            <td>Pajak Penghasilan (PPh 21)</td>
                                            <td class="text-end">Rp {{ number_format($tax, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tunjangan</td>
                                            <td class="text-end">Rp {{ number_format($allowance, 0, ',', '.') }}</td>
                                            <td>BPJS Kesehatan & Ketenagakerjaan</td>
                                            <td class="text-end">Rp {{ number_format($bpjs, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lembur ({{ rand(5, 20) }} jam)</td>
                                            <td class="text-end">Rp {{ number_format($overtime, 0, ',', '.') }}</td>
                                            <td>Cicilan Pinjaman</td>
                                            <td class="text-end">Rp {{ number_format($loan, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Bonus</td>
                                            <td class="text-end">Rp {{ number_format($bonus, 0, ',', '.') }}</td>
                                            <td>Potongan Ketidakhadiran</td>
                                            <td class="text-end">Rp {{ number_format($absence, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr class="bg-light">
                                            <td class="fw-bold">Total Pendapatan</td>
                                            <td class="text-end fw-bold">Rp {{ number_format($totalEarnings, 0, ',', '.') }}</td>
                                            <td class="fw-bold">Total Potongan</td>
                                            <td class="text-end fw-bold">Rp {{ number_format($totalDeductions, 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="fw-bold text-end h3">Gaji Bersih</td>
                                            <td class="fw-bold text-end h3">Rp {{ number_format($netSalary, 0, ',', '.') }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Kehadiran & Cuti</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <th class="text-end">Jumlah</th>
                                            <th>Deskripsi</th>
                                            <th class="text-end">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Hari Kerja</td>
                                            <td class="text-end">22 hari</td>
                                            <td>Cuti Tahunan Diambil</td>
                                            <td class="text-end">{{ rand(0, 3) }} hari</td>
                                        </tr>
                                        <tr>
                                            <td>Hadir</td>
                                            <td class="text-end">{{ 22 - rand(0, 3) }} hari</td>
                                            <td>Sisa Cuti Tahunan</td>
                                            <td class="text-end">{{ 12 - rand(0, 5) }} hari</td>
                                        </tr>
                                        <tr>
                                            <td>Terlambat</td>
                                            <td class="text-end">{{ rand(0, 5) }} kali</td>
                                            <td>Cuti Sakit</td>
                                            <td class="text-end">{{ rand(0, 2) }} hari</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <p class="text-muted">
                            <strong>Catatan:</strong> Slip gaji ini diterbitkan secara elektronik dan sah tanpa tanda tangan. Jika ada pertanyaan mengenai rincian gaji, silakan hubungi Departemen HR.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
