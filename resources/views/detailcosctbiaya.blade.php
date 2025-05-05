@extends('layouts.main')

@section('header')
<main id="main" class="main">
    <div class="container py-4">
        <h4 class="text-center bg-light py-2 rounded">Detail Biaya Operasional - {{ date('F Y', strtotime($tanggal_bayar)) }}</h4>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Jenis Biaya</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->tambahkategori->nama_kategoribiaya ?? '-' }}</td>
                        <td>Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr class="fw-bold">
                    <td colspan="2" class="text-end">Total</td>
                    <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('daftarcosctbiaya') }}" class="btn btn-secondary mt-3">Kembali</a>

    </div>
</main>
@endsection
