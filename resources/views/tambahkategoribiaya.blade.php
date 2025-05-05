@extends('layouts.main')

@section('header')
<main id="main" class="main d-flex justify-content-center align-items-center" style="height: 70vh;">

    <div class="container d-flex justify-content-center">
        <!-- Card -->
        <form action="/cosctbiaya" method="POST">
            @csrf
        <div class="card  mx-4" style="width: 350px; border-radius: 20px; overflow: hidden;">
            <!-- Header -->
            <div class="card-header text-center bg-light" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                <h5 class="m-0">Tambah Kategori Biaya</h5>
            </div>

            <!-- Body -->
            <div class="card-body text-center ">

                <label class="form-label fw-bold">Kategori</label>
                <input type="text" name="nama_kategoribiaya" class="form-control text-center mb-2" style="border-radius: 10px;" placeholder="Masukkan Kategori Biaya">


                <button type="submit" class="btn btn-primary w-50  d-flex justify-content-center align-items-center" style="border-radius: 10px;">Save</button>
            </div>

        </div>
        <a href="{{ route('cosctbiaya') }}" class="btn btn-secondary" >Kembali</a>

    </div>

</main>
@endsection
