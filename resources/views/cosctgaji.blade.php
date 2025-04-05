@extends('layouts.main')
@section('header')
    <main id="main" class="main">

        <div class="container mt-3">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center p-3 bg-light border rounded position-relative">
                <h5 class=" text-center w-100">Gaji Karyawan</h5>
                <a href="/formtambahkar" class=" btn btn-sm btn-primary "><i
                    class="fas fa-download fa-sm text-white-50"></i>+</a>
            </div>

    <!-- Transaction Information -->
    <link rel="stylesheet" href="style.css">
    <div class="container mt-4">
        <div class="card-container">
            <div class="profile-card">
                <a href="" class="delete-icon">&times;</a>
                <h5>Susilo Yuhu</h5>
                <div class="mb-2">
                    <label class="form-label">Gaji Pokok</label>
                    <input type="text" class="form-control" value="1.500.000" disabled>
                </div>
            </div>
            <div class="empty-card"></div>
        </div>
    </div>

</div>
    </main>
@endsection
