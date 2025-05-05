@extends('layouts.main')

@section('header')
<main id="main" class="main d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="container d-flex justify-content-center">
        <!-- Card -->
        <div class="card shadow-lg" style="width: 350px; border-radius: 20px; overflow: hidden;">
            <!-- Header -->
            <div class="card-header text-center bg-light" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                <h5 class="m-0">Tambah Supplier</h5>
            </div>

            <!-- Body -->
            <form action="/inserttambahsup" method="post">
                @csrf
            <div class="card-body text-center bg-light">

                <label class="form-label fw-bold">Supplier</label>
                <input type="text" name="supplier" class="form-control text-center mb-2" style="border-radius: 10px;" placeholder="Masukkan Supplier">

                <label class="form-label fw-bold">PIC Supplier</label>
                <input type="text" name="pic_supplier" class="form-control text-center mb-2" style="border-radius: 10px;" placeholder="Masukkan PIC supplier">

                <label class="form-label fw-bold">Alamat</label>
                <input type="text" name="alamat" class="form-control text-center mb-2" style="border-radius: 10px;" placeholder="Masukkan Alamat">

                <label class="form-label fw-bold">No. HP</label>
                <input type="text" name="no_hp" class="form-control text-center mb-3" style="border-radius: 10px;" placeholder="Masukkan No HP">


                <button type="submit" class="btn btn-primary w-50" style="border-radius: 10px;">Save</button>
            </div>
        </div>
    </div>

</main>
@endsection
