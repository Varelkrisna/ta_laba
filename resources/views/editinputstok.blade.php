@extends('layouts.main')
@section('header')

    <main id="main" class="main">

        <div class="container mt-4">
    <h4 class="text-center bg-light p-2">EDIT INPUT STOK</h4>


        <div class="card mb-5 px-4 py-3">
    <form action="/updateinputstok/{{ $data->id }}" method="post" enctype="multipart/form-data">

    <div class="row">
        @csrf
        <div class="col-md-6">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ $data->kategori }}">
        </div>

        <div class="col-md-6">
            <label for="subkategori" class="form-label">Sub Kategori</label>
            <input type="text" name="sub_kategori" class="form-control" value="{{ $data->sub_kategori }}">
        </div>

        <div class="col-md-6 mt-3">
            <label for="namaProduk" class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="{{ $data->nama_produk }}">
        </div>

        <div class="col-md-6 mt-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $data->stok }}">
        </div>

        <div class="col-md-6 mt-3">
            <label for="hargaJual" class="form-label">Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control" value="{{ $data->harga_jual }}">
        </div>

        <div class="col-md-6 mt-3">
            <label for="hargaBeli" class="form-label">Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control" value="{{ $data->harga_beli }}" readonly>
        </div>

        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-info text-white">Save</button>
        </div>
    </div>
</form>
</div>
</div>
        </main>
@endsection
