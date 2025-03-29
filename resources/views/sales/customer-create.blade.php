@extends('layouts.app')

@section('title', 'Tambah Pelanggan Baru')

@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Tambah Pelanggan Baru
                </h2>
                <ol class="breadcrumb breadcrumb-arrows mt-2 mb-2" aria-label="breadcrumbs">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sales.customer-management') }}">Manajemen Pelanggan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Pelanggan</li>
                </ol>
            </div>
        </div>
    </div>

    <form action="#" method="post" class="card">
        <div class="card-header">
            <h3 class="card-title">Informasi Pelanggan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Tipe Pelanggan</label>
                    <select class="form-select" name="customer_type" id="customer_type" required>
                        <option value="">Pilih Tipe Pelanggan</option>
                        <option value="Korporasi">Korporasi</option>
                        <option value="Individu">Individu</option>
                        <option value="Pemerintah">Pemerintah</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Nama Pelanggan</label>
                    <input type="text" class="form-control" name="customer_name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Telepon</label>
                    <input type="text" class="form-control" name="phone" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">NPWP</label>
                    <input type="text" class="form-control" name="tax_id">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Batas Kredit (Rp)</label>
                    <input type="number" class="form-control" name="credit_limit" value="10000000" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Termin Pembayaran (hari)</label>
                    <input type="number" class="form-control" name="payment_terms" value="30" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Status</label>
                    <select class="form-select" name="status" required>
                        <option value="Aktif" selected>Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
            </div>

            <div class="hr-text">Alamat</div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label required">Alamat</label>
                    <textarea class="form-control" name="address" rows="2" required></textarea>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label required">Kota</label>
                    <input type="text" class="form-control" name="city" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label required">Provinsi</label>
                    <input type="text" class="form-control" name="province" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label required">Kode Pos</label>
                    <input type="text" class="form-control" name="postal_code" required>
                </div>
            </div>

            <div id="contact_person_section" class="d-none">
                <div class="hr-text">Kontak Person</div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Nama Kontak Person</label>
                        <input type="text" class="form-control" name="contact_person">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Jabatan</label>
                        <input type="text" class="form-control" name="contact_person_position">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Telepon Kontak Person</label>
                        <input type="text" class="form-control" name="contact_person_phone">
                    </div>
                </div>
            </div>

            <div class="hr-text">Catatan</div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea class="form-control" name="notes" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <div class="d-flex">
                <a href="{{ route('sales.customer-management') }}" class="btn btn-link">Batal</a>
                <button type="submit" class="btn btn-primary ms-auto">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const customerTypeSelect = document.getElementById('customer_type');
        const contactPersonSection = document.getElementById('contact_person_section');
        
        customerTypeSelect.addEventListener('change', function() {
            if (this.value === 'Korporasi' || this.value === 'Pemerintah') {
                contactPersonSection.classList.remove('d-none');
                const inputs = contactPersonSection.querySelectorAll('input');
                inputs.forEach(input => {
                    input.setAttribute('required', 'required');
                });
            } else {
                contactPersonSection.classList.add('d-none');
                const inputs = contactPersonSection.querySelectorAll('input');
                inputs.forEach(input => {
                    input.removeAttribute('required');
                });
            }
        });
    });
</script>
@endsection
