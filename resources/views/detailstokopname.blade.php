@extends('layouts.main')

@section('header')
<main id="main" class="main">

        <div class="container mt-2">
            <h4 class="text-center bg-light p-2">Detail Stok Opname - {{ $tanggal_opname }}</h4>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Subkategori</th>
                    <th>Nama Produk</th>
                    <th>Stok Awal</th>
                    <th>Stok Akhir</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->inputStok->subkategori->sub_kategori ?? '-' }}</td>
                        <td>{{ $item->inputStok->nama_produk ?? '-' }}</td>
                        <td>{{ $item->inputstok->stok }}</td>
                        <td>{{ $item->stok_akhir }}</td>
                        <td>{{ $item->keterangan ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('stokopname') }}" class="btn btn-secondary mt-3">Kembali</a>

        @php
    $warna = $total_kerugian < 0 ? 'text-danger' : 'text-success';
    $format_rupiah = 'Rp ' . number_format(abs($total_kerugian), 0, ',', '.');
@endphp

<div class="mt-3">
    <strong>Total Nominal {{ $total_kerugian < 0 ? 'Kerugian' : 'Keuntungan' }}:</strong>
    <span class="{{ $warna }}">{{ $format_rupiah }}</span>
</div>

    </div>

</main>
@endsection
