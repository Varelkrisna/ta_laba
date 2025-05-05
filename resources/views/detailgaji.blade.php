@extends('layouts.main')

@section('header')
<main id="main" class="main">
    <div class="container py-4">
        <!-- Judul -->
        <h4 class="text-center bg-light py-2 rounded">Detail Gaji - {{ date('F Y', strtotime($tanggal_gaji)) }}</h4>

        <!-- Tabel Gaji -->
        <table class="table table-bordered mt-4">
            <thead class="table-light">
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Gaji Bulan Ini</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $grand_total = 0; @endphp
                @foreach($data as $item)
                @php
                    $gaji_bulan_ini = $item->gaji_bulanini ?? 0;
                    $total = $gaji_bulan_ini;
                    $grand_total += $total;
                @endphp
                <tr>
                    <td>{{ $item->tambahkaryawan->nama ?? '-' }}</td>
                    <td>Rp {{ number_format($gaji_bulan_ini, 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($total, 2, ',', '.') }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr class="table-warning fw-bold">
                    <td colspan="2" class="text-end">Total Keseluruhan:</td>
                    <td>Rp {{ number_format($grand_total, 2, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>

        <!-- Tombol Kembali -->
        <a href="{{ route('cosctgaji') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</main>
@endsection
