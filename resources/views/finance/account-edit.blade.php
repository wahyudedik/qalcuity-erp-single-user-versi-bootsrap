@extends('layouts.app')

@section('title', 'Edit Akun')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Akuntansi & Pembukuan
                    </div>
                    <h2 class="page-title">
                        Edit Akun
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('finance.accounting') }}"
                            class="btn btn-outline-secondary d-none d-sm-inline-block">
                            <i class="ti ti-arrow-left"></i>
                            Batal
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
                <div class="row row-cards">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Akun</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Kode Akun</label>
                                            <input type="text" class="form-control" name="account_code" value="1-1000">
                                            <small class="form-hint">Format: [kategori]-[nomor], contoh: 1-1000</small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Nama Akun</label>
                                            <input type="text" class="form-control" name="account_name" value="Kas">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Kategori</label>
                                            <select class="form-select" name="category">
                                                <option value="asset" selected>Aset</option>
                                                <option value="liability">Kewajiban</option>
                                                <option value="equity">Ekuitas</option>
                                                <option value="income">Pendapatan</option>
                                                <option value="expense">Beban</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label required">Tipe</label>
                                            <select class="form-select" name="type">
                                                <option value="debit" selected>Debit</option>
                                                <option value="credit">Kredit</option>
                                            </select>
                                            <small class="form-hint">Saldo normal akun</small>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea class="form-control" name="description" rows="3">Akun untuk mencatat transaksi kas perusahaan.</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-select" name="status">
                                                <option value="active" selected>Aktif</option>
                                                <option value="inactive">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Pengaturan Tambahan</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Akun Induk</label>
                                    <select class="form-select" name="parent_account">
                                        <option value="">Tidak Ada</option>
                                        <option value="1-0000">1-0000 - Aset Lancar</option>
                                    </select>
                                    <small class="form-hint">Pilih akun induk jika ini adalah sub-akun</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="reconcile" checked>
                                        <span class="form-check-label">Dapat Direkonsiliasi</span>
                                    </label>
                                    <small class="form-hint d-block">Aktifkan jika akun ini perlu direkonsiliasi secara
                                        berkala (seperti akun bank)</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="tax_relevant">
                                        <span class="form-check-label">Relevan untuk Pajak</span>
                                    </label>
                                    <small class="form-hint d-block">Aktifkan jika akun ini relevan untuk perhitungan
                                        pajak</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Saldo Awal</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Saldo Awal</label>
                                    <input type="date" class="form-control" name="opening_balance_date"
                                        value="2023-08-01">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jumlah Saldo Awal</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" class="form-control" name="opening_balance"
                                            value="500000000">
                                    </div>
                                    <small class="form-hint">Saldo awal akun pada tanggal yang ditentukan</small>
                                </div>
                                <div class="alert alert-info" role="alert">
                                    <i class="ti ti-info-circle me-2"></i>
                                    Mengubah saldo awal akan mempengaruhi laporan keuangan. Pastikan perubahan ini sudah
                                    benar.
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Audit</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Dibuat Oleh</label>
                                    <div class="form-control-plaintext">Admin Sistem</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Dibuat</label>
                                    <div class="form-control-plaintext">01 Agustus 2023, 09:15</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Terakhir Diubah</label>
                                    <div class="form-control-plaintext">15 Agustus 2023, 14:30</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-footer text-end">
                                <div class="d-flex">
                                    <a href="{{ route('finance.accounting') }}" class="btn btn-outline-secondary d-none d-sm-inline-block">Batal</a>
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        <i class="ti ti-device-floppy me-1"></i>
                                        Simpan Perubahan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
