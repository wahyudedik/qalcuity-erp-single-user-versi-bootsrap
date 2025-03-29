@extends('layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Edit Pelanggan
                    </h2>
                    <ol class="breadcrumb breadcrumb-arrows  mt-2 mb-2" aria-label="breadcrumbs">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sales.customer-management') }}">Manajemen
                                Pelanggan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Pelanggan</li>
                    </ol>
                </div>
            </div>
        </div>

        @php
            // Generate dummy data for the customer
            $customerTypes = ['Korporasi', 'Individu', 'Pemerintah'];
            $statuses = ['Aktif', 'Tidak Aktif'];
            $cities = ['Jakarta', 'Bandung', 'Surabaya', 'Semarang', 'Yogyakarta'];

            $type = $customerTypes[array_rand($customerTypes)];
            $status = $statuses[array_rand($statuses)];
            $city = $cities[array_rand($cities)];

            if ($type == 'Korporasi') {
                $name = 'PT. Maju Bersama Sejahtera';
                $contact = 'sales@majubersama.co.id';
                $phone = '021-5551234';
                $contactPerson = 'Budi Santoso';
                $contactPersonPosition = 'Purchasing Manager';
                $contactPersonPhone = '081234567890';
            } elseif ($type == 'Pemerintah') {
                $name = 'Dinas Pekerjaan Umum ' . $city;
                $contact = 'dpu.' . strtolower(str_replace(' ', '', $city)) . '@gov.id';
                $phone = '021-5559876';
                $contactPerson = 'Ir. Ahmad Suparman';
                $contactPersonPosition = 'Kepala Dinas';
                $contactPersonPhone = '081298765432';
            } else {
                $name = 'Budi Santoso';
                $contact = 'budi.santoso@gmail.com';
                $phone = '081234567890';
                $contactPerson = null;
                $contactPersonPosition = null;
                $contactPersonPhone = null;
            }

            $customer = [
                'id' => $id,
                'name' => $name,
                'type' => $type,
                'email' => $contact,
                'phone' => $phone,
                'address' => 'Jl. Raya ' . $city . ' No. ' . rand(1, 100),
                'city' => $city,
                'province' => 'Jawa Barat',
                'postal_code' => rand(10000, 99999),
                'status' => $status,
                'credit_limit' => rand(10000000, 100000000),
                'payment_terms' => rand(7, 30),
                'tax_id' =>
                    '01.' .
                    rand(100, 999) .
                    '.' .
                    rand(100, 999) .
                    '.' .
                    rand(1, 9) .
                    '-' .
                    rand(100, 999) .
                    '.' .
                    rand(100, 999),
                'contact_person' => $contactPerson,
                'contact_person_position' => $contactPersonPosition,
                'contact_person_phone' => $contactPersonPhone,
                'notes' => 'Pelanggan ini memiliki histori pembayaran yang baik dan selalu tepat waktu.',
            ];
        @endphp

        <form action="#" method="post" class="card">
            <div class="card-header">
                <h3 class="card-title">Informasi Pelanggan</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">ID Pelanggan</label>
                        <input type="text" class="form-control" name="customer_id" value="{{ $customer['id'] }}"
                            readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Tipe Pelanggan</label>
                        <select class="form-select" name="customer_type">
                            @foreach ($customerTypes as $customerType)
                                <option value="{{ $customerType }}"
                                    {{ $customer['type'] == $customerType ? 'selected' : '' }}>{{ $customerType }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="customer_name" value="{{ $customer['name'] }}"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Status</label>
                        <select class="form-select" name="status">
                            @foreach ($statuses as $statusOption)
                                <option value="{{ $statusOption }}"
                                    {{ $customer['status'] == $statusOption ? 'selected' : '' }}>{{ $statusOption }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $customer['email'] }}"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Telepon</label>
                        <input type="text" class="form-control" name="phone" value="{{ $customer['phone'] }}"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">NPWP</label>
                        <input type="text" class="form-control" name="tax_id" value="{{ $customer['tax_id'] }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Batas Kredit (Rp)</label>
                        <input type="number" class="form-control" name="credit_limit"
                            value="{{ $customer['credit_limit'] }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Termin Pembayaran (hari)</label>
                        <input type="number" class="form-control" name="payment_terms"
                            value="{{ $customer['payment_terms'] }}" required>
                    </div>
                </div>

                <div class="hr-text">Alamat</div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label required">Alamat</label>
                        <textarea class="form-control" name="address" rows="2" required>{{ $customer['address'] }}</textarea>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Kota</label>
                        <input type="text" class="form-control" name="city" value="{{ $customer['city'] }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Provinsi</label>
                        <input type="text" class="form-control" name="province" value="{{ $customer['province'] }}"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label required">Kode Pos</label>
                        <input type="text" class="form-control" name="postal_code"
                            value="{{ $customer['postal_code'] }}" required>
                    </div>
                </div>

                @if ($customer['type'] == 'Korporasi' || $customer['type'] == 'Pemerintah')
                    <div class="hr-text">Kontak Person</div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label required">Nama Kontak Person</label>
                            <input type="text" class="form-control" name="contact_person"
                                value="{{ $customer['contact_person'] }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label required">Jabatan</label>
                            <input type="text" class="form-control" name="contact_person_position"
                                value="{{ $customer['contact_person_position'] }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label required">Telepon Kontak Person</label>
                            <input type="text" class="form-control" name="contact_person_phone"
                                value="{{ $customer['contact_person_phone'] }}" required>
                        </div>
                    </div>
                @endif

                <div class="hr-text">Catatan</div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Catatan</label>
                        <textarea class="form-control" name="notes" rows="3">{{ $customer['notes'] }}</textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <div class="d-flex">
                    <a href="{{ route('sales.customer-management') }}" class="btn btn-link">Batal</a>
                    <button type="submit" class="btn btn-primary ms-auto">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
