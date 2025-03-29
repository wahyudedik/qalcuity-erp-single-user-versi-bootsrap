@extends('layouts.app')

@section('title', 'Penggajian')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Penggajian
                </h2>
                <div class="text-muted mt-1">Manajemen penggajian karyawan</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-new-payroll">
                        <i class="ti ti-plus"></i>
                        Tambah Penggajian
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none" data-bs-toggle="modal" data-bs-target="#modal-new-payroll">
                        <i class="ti ti-plus"></i>
                    </a>
                    <a href="#" class="btn btn-outline-secondary d-none d-sm-inline-block">
                        <i class="ti ti-file-export"></i>
                        Export
                    </a>
                    <a href="#" class="btn btn-outline-secondary d-sm-none">
                        <i class="ti ti-file-export"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Penggajian</h3>
                <div class="card-actions">
                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-select" id="period-filter">
                                <option value="current">Periode Saat Ini (Juli 2023)</option>
                                <option value="previous">Periode Sebelumnya (Juni 2023)</option>
                                <option value="custom">Periode Kustom</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="ti ti-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Cari karyawan...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="text-muted">
                        Tampilkan
                        <div class="mx-2 d-inline-block">
                            <select class="form-select form-select-sm" id="entries-select">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        entri
                    </div>
                    <div class="ms-auto text-muted">
                        Status:
                        <div class="ms-2 d-inline-block">
                            <select class="form-select form-select-sm">
                                <option value="all">Semua</option>
                                <option value="paid">Dibayar</option>
                                <option value="pending">Tertunda</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                    <thead>
                        <tr>
                            <th>ID Gaji</th>
                            <th>Karyawan</th>
                            <th>Departemen</th>
                            <th>Periode</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Potongan</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th class="w-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $departments = ['Produksi', 'Keuangan', 'HR', 'Marketing', 'IT', 'Operasional'];
                        $statuses = ['Dibayar', 'Tertunda'];
                        $employees = [
                            'Ahmad Fauzi', 'Budi Santoso', 'Citra Dewi', 'Dian Purnama', 
                            'Eko Prasetyo', 'Fitri Handayani', 'Gunawan Wibowo', 'Hendra Kusuma',
                            'Indah Permata', 'Joko Widodo', 'Kartika Sari', 'Lukman Hakim'
                        ];
                        
                        for ($i = 1; $i <= 12; $i++):
                            $baseSalary = rand(3000000, 8000000);
                            $allowance = rand(500000, 2000000);
                            $deduction = rand(100000, 500000);
                            $total = $baseSalary + $allowance - $deduction;
                            $status = $statuses[rand(0, 1)];
                            $statusClass = $status == 'Dibayar' ? 'bg-success' : 'bg-warning';
                        @endphp
                        <tr>
                            <td>PAY-{{ 2023 }}{{ str_pad($i, 4, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $employees[$i-1] }}</td>
                            <td>{{ $departments[rand(0, count($departments)-1)] }}</td>
                            <td>Juli 2023</td>
                            <td>Rp {{ number_format($baseSalary, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($allowance, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($deduction, 0, ',', '.') }}</td>
                            <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
                            <td><span class="badge {{ $statusClass }}">{{ $status }}</span></td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('finance.payroll.detail', $i) }}" class="btn btn-sm btn-info">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    <a href="{{ route('finance.payroll.edit', $i) }}" class="btn btn-sm btn-primary">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger">
                                        <i class="ti ti-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @php
                        endfor;
                        @endphp
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Menampilkan <span>1</span> sampai <span>12</span> dari <span>12</span> entri</p>
                <ul class="pagination m-0 ms-auto">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class="ti ti-chevron-left"></i>
                            Prev
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            Next
                            <i class="ti ti-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal for new payroll -->
<div class="modal modal-blur fade" id="modal-new-payroll" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Penggajian Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Periode Penggajian</label>
                    <select class="form-select">
                        <option value="july-2023">Juli 2023</option>
                        <option value="august-2023">Agustus 2023</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Karyawan</label>
                            <select class="form-select">
                                @foreach($employees as $employee)
                                <option value="{{ $loop->index + 1 }}">{{ $employee }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Departemen</label>
                            <select class="form-select">
                                @foreach($departments as $department)
                                <option value="{{ $loop->index + 1 }}">{{ $department }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Gaji Pokok</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" value="5,000,000">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Tunjangan</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" value="1,500,000">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Lembur</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" value="250,000">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Bonus</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" value="0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Potongan Pajak</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" value="250,000">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Potongan BPJS</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" value="100,000">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea class="form-control" rows="3" placeholder="Catatan tambahan..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Batal
                </a>
                <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                    <i class="ti ti-plus"></i>
                    Tambah Penggajian
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Period filter change handler
        document.getElementById('period-filter').addEventListener('change', function() {
            if (this.value === 'custom') {
                Swal.fire({
                    title: 'Pilih Periode',
                                        html: `
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="form-label">Dari</label>
                                <input type="month" class="form-control" id="period-from" value="2023-01">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Sampai</label>
                                <input type="month" class="form-control" id="period-to" value="2023-07">
                            </div>
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Terapkan',
                    cancelButtonText: 'Batal',
                    focusConfirm: false,
                    preConfirm: () => {
                        const from = document.getElementById('period-from').value;
                        const to = document.getElementById('period-to').value;
                        return { from, to }
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Here you would typically filter the data based on the selected period
                        Toast.fire({
                            icon: 'success',
                            title: `Periode diubah: ${result.value.from} hingga ${result.value.to}`
                        });
                    }
                });
            }
        });
    });
</script>
@endsection

