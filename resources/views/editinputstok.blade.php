@extends('layouts.main')
@section('header')

    <main id="main" class="main">

        <div class="container mt-4">
    <h4 class="text-center bg-light p-2">EDIT INPUT STOK</h4>


        <div class="card mb-5 px-4 py-3">
    <form action="/updatestokopname/{{ $data->id }}" method="post" enctype="multipart/form-data">

    <div class="row">
        @csrf
        <div class="col-md-6">
            <label class="form-label fw-bold">Kategori</label>
            <select class="form-select" name="id_kategori" id="kategoriSelect">
                <option disabled {{ !$data->subkategori ? 'selected' : '' }}>Pilih Kategori</option>
                @foreach ($kategori as $kt)
                    <option value="{{ $kt->id }}" {{ $kt->id == $data->subkategori->tambahkategori->id ? 'selected' : '' }}>
                        {{ $kt->nama_kategori }}
                    </option>
                @endforeach
            </select>

        </div>

        <div class="col-md-6">
            <label class="form-label fw-bold">SubKategori</label>
            <select class="form-select" name="id_subkategori" id="subkategoriSelect">
                <option value="">Pilih SubKategori</option>
            </select>

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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Saat halaman dimuat, auto load subkategori berdasarkan kategori yg sedang terpilih
        let currentKategoriId = $('#kategoriSelect').val();
        let selectedSubkategoriId = {{ $data->id_subkategori }};
        if (currentKategoriId) {
            loadSubkategori(currentKategoriId, selectedSubkategoriId);
        }

        $('#kategoriSelect').on('change', function () {
            let kategoriId = $(this).val();
            loadSubkategori(kategoriId);
        });

        function loadSubkategori(kategoriId, selected = null) {
            $.ajax({
                url: '/subkategori/' + kategoriId,
                type: 'GET',
                success: function (data) {
                    $('#subkategoriSelect').empty().append('<option value="">Pilih SubKategori</option>');
                    $.each(data, function (index, sub) {
                        let selectedAttr = (sub.id == selected) ? 'selected' : '';
                        $('#subkategoriSelect').append('<option value="' + sub.id + '" ' + selectedAttr + '>' + sub.sub_kategori + '</option>');
                    });
                }
            });
        }
    });
</script>

@endsection
