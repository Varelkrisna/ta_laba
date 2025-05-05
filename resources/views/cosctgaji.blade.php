@extends('layouts.main')

@section('header')
<main id="main" class="main">
    <div class="container py-4">

        <div class="d-flex flex-wrap justify-content-center gap-3">
            <!-- Button Card 1 -->
            <a href="/listmekanik" class="text-decoration-none">
                <div class="card shadow-sm rounded-4 border-0 px-3 py-3 text-center" style="width: 15rem; background-color: #f7d99c;">
                    <div class="d-flex flex-column align-items-center">
                        <div class="bg-warning-subtle rounded-circle p-2 mb-2">
                            <i class="bi bi-currency-dollar fs-4 text-warning"></i>
                        </div>
                        <h6 class="mb-0 fw-bold text-dark">List Mechanic</h6>
                        <small class="text-primary">Kelola Data Mechanic</small>
                    </div>
                </div>
            </a>

            <!-- Button Card 2 -->
            <a href="/inputgaji" class="text-decoration-none">
                <div class="card shadow-sm rounded-4 border-0 px-3 py-3 text-center" style="width: 15rem; background-color: #f7d99c;">
                    <div class="d-flex flex-column align-items-center">
                        <div class="bg-warning-subtle rounded-circle p-2 mb-2">
                            <i class="bi bi-currency-dollar fs-4 text-warning"></i>
                        </div>
                        <h6 class="mb-0 fw-bold text-dark">Input Data Gaji</h6>
                        <small class="text-primary">Detail Data Gaji Bulanan</small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Stok Opname -->
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Gaji Karyawan</h5>
                </div>
            </div>

            <!-- Form Search -->
            <div class="row justify-content-center mb-3">
                <div class="col-md-6">
                    <form action="" method="GET" class="d-flex w-100">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Cari Tanggal Penggajian" aria-label="Search" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </form>
                </div>
            </div>

            <!-- Flash Message -->
            @if (session('success'))
                <div class="alert alert-success mx-3">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel -->
            <table class="table table-success table-striped mb-0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Penggajian</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
                    @foreach ($data as $tanggal_gaji)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <!-- Format tanggal menggunakan date() dan strtotime() -->
                            <td>{{ date('F Y', strtotime($tanggal_gaji->tanggal_gaji)) }}</td>
                            <td>
                                <a href="{{ route('showgajidetail', $tanggal_gaji->tanggal_gaji) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('deletegaji', $tanggal_gaji->tanggal_gaji) }}" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</main>
@endsection
