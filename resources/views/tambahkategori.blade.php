@extends('layouts.main')

@section('header')
<main id="main" class="main d-flex justify-content-center align-items-center" style="height: 70vh;">

    <div class="container d-flex justify-content-center">
        <!-- Card -->
        <form action="/tambahkategori" method="POST">
            @csrf
        <div class="card  mx-4" style="width: 350px; border-radius: 20px; overflow: hidden;">
            <!-- Header -->
            <div class="card-header text-center bg-light" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                <h5 class="m-0">Tambah Kategori</h5>
            </div>

            <!-- Body -->
            <div class="card-body text-center ">

                <label class="form-label fw-bold">Kategori</label>
                <input type="text" name="nama_kategori" class="form-control text-center mb-2" style="border-radius: 10px;" placeholder="Masukkan Kategori">


                <button type="submit" class="btn btn-primary w-50" style="border-radius: 10px;">Save</button>
            </div>
        </div>
        </form>

        <form action="/tambahsubkategori" method="POST">
            @csrf
        <div class="card  mx-4" style="width: 350px; border-radius: 20px; overflow: hidden;">
            <!-- Header -->
            <div class="card-header text-center bg-light" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                <h5 class="m-0">Tambah Sub Kategori</h5>
            </div>

            <!-- Body -->
            <div class="card-body text-center ">

                <label class="form-label fw-bold">Kategori</label>
                <select class="form-select" name="id_kategori" aria-label="Default select example">
                    <option selected>Pilih Kategori</option>
                    @foreach ($kategori as $kt)
                    <option value="{{ $kt->id }}">{{ $kt->nama_kategori }}</option>
                    @endforeach
                  </select>

                <label class="form-label fw-bold">Sub Kategori</label>
                <input type="text" name="sub_kategori" class="form-control text-center mb-2" style="border-radius: 10px;" placeholder="Masukkan Subkategori">

                <button type="submit" class="btn btn-primary w-50" style="border-radius: 10px;">Save</button>
            </div>
        </div>
    </form>
    </div>

</main>
@endsection
