@extends('layouts.main')
@section('header')
    <main id="main" class="main">

        <div class="container mt-4">
            <h4 class="text-center bg-light p-2">INPUT STOK</h4>


        <div class="card mb-5 px-4 py-3">
            <form action="/insertinputstok" method="post">

            <div class="row">
                @csrf
                <div class="col-md-6">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="subkategori" class="form-label">Sub Kategori</label>
                    <input type="text" name="sub_kategori" id="subkategori" class="form-control">
                </div>

                <div class="col-md-6 mt-3">
                    <label for="namaProduk" class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" id="namaProduk" class="form-control">
                </div>

                <div class="col-md-6 mt-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" name="stok" id="stok" class="form-control" value="">
                </div>

                <div class="col-md-6 mt-3">
                    <label for="hargaJual" class="form-label">Harga Jual</label>
                    <input type="number" name="harga_jual" id="hargaJual" class="form-control">
                </div>

                <div class="col-md-6 mt-3">
                    <label for="hargaBeli" class="form-label">Harga Beli</label>
                    <input type="number" name="harga_beli" id="hargaBeli" class="form-control">
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
