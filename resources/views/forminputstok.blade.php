@extends('layouts.main')

@section('header')
<main id="main" class="main">
    <div class="container py-4">
        <h4 class="text-center fw-bold mb-4 bg-light p-2 rounded-3">INPUT STOK</h4>

        <div class="card shadow-sm rounded-4 px-4 py-4">
            <form action="/insertinputstok" method="POST">
                @csrf
                <div class="row g-3">

                    <!-- Kategori -->
                    <div class="col-md-6">
                        <label class="form-label text-muted">Kategori</label>
                        <select class="form-select rounded-pill" name="id_kategori" id="kategoriSelect">
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach ($kategori as $kt)
                                <option value="{{ $kt->id }}">{{ $kt->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Subkategori -->
                    <div class="col-md-6">
                        <label class="form-label text-muted">SubKategori</label>
                        <select class="form-select rounded-pill" name="id_subkategori" id="subkategoriSelect">
                            <option value="" disabled selected>Pilih SubKategori</option>
                        </select>
                    </div>

                    <!-- Nama Produk -->
                    <div class="col-md-6">
                        <label class="form-label text-muted">Nama Produk</label>
                        <input type="text" name="nama_produk" id="namaProduk" class="form-control rounded-pill" placeholder="Masukkan Nama Produk">
                    </div>

                    <!-- Stok -->
                    <div class="col-md-6">
                        <label class="form-label text-muted">Stok</label>
                        <input type="number" name="stok" id="stok" class="form-control rounded-pill" placeholder="Jumlah Stok">
                    </div>

                    <!-- Harga Jual -->
                    <div class="col-md-6">
                        <label class="form-label text-muted">Harga Jual</label>
                        <input type="number" name="harga_jual" id="hargaJual" class="form-control rounded-pill" placeholder="Harga Jual">
                    </div>

                    <!-- Harga Beli -->
                    <div class="col-md-6">
                        <label class="form-label text-muted">Harga Beli</label>
                        <input type="number" name="harga_beli" id="hargaBeli" class="form-control rounded-pill" placeholder="Harga Beli">
                    </div>

                </div>

                <!-- Tombol Save -->
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">Save</button>
                </div>
            </form>
        </div>
    </div>
</main>

{{-- Script untuk load subkategori --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#kategoriSelect').on('change', function () {
            var kategoriId = $(this).val();
            if (kategoriId) {
                $.ajax({
                    url: '/subkategori/' + kategoriId,
                    type: 'GET',
                    success: function (data) {
                        $('#subkategoriSelect').empty().append('<option value="">Pilih SubKategori</option>');
                        $.each(data, function (key, value) {
                            $('#subkategoriSelect').append('<option value="' + value.id + '">' + value.sub_kategori + '</option>');
                        });
                    }
                });
            } else {
                $('#subkategoriSelect').empty().append('<option value="">Pilih SubKategori</option>');
            }
        });
    });
</script>
@endsection
