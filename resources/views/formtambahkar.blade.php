@extends('layouts.main')

@section('header')
<main id="main" class="main d-flex justify-content-center align-items-center" style="height: 70vh;">

    <div class="container d-flex justify-content-center">
        <!-- Card -->
        <div class="card shadow-lg" style="width: 350px; border-radius: 20px; overflow: hidden;">
            <!-- Header -->
            <div class="card-header text-center bg-light" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                <h5 class="m-0">Tambah Karyawan</h5>
            </div>

            <!-- Body -->
            <div class="card-body text-center bg-light">

                <label class="form-label fw-bold">Nama</label>
                <input type="text" class="form-control text-center mb-2" style="border-radius: 10px;" placeholder="Masukkan Nama">

                <label class="form-label fw-bold">Alamat</label>
                <input type="text" class="form-control text-center mb-2" style="border-radius: 10px;" placeholder="Masukkan Alamat">

                <label class="form-label fw-bold">No. HP</label>
                <input type="text" class="form-control text-center mb-3" style="border-radius: 10px;" placeholder="Masukkan No HP">


                <button class="btn btn-primary w-50" style="border-radius: 10px;">Save</button>
            </div>
        </div>
    </div>

</main>
@endsection
