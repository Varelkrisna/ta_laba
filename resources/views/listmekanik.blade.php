@extends('layouts.main')
@section('header')
<main id="main" class="main">
<div class="container py-4">
    <!-- Button Tambah -->
    <div class="mb-4">
        <a href="/formtambahkar" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold">
            <i class="bi bi-plus-circle me-1"></i> Tambah Karyawan
        </a>
    </div>

    <!-- Card List -->
    <div class="row g-4">
        @foreach($data as $mekanik)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4 position-relative p-3 d-flex flex-row align-items-center" style="background-color: #f8f9fc;">

                    <!-- Tombol X Hapus -->
                    <form action="{{ route('deletekaryawan', $mekanik->id) }}" method="POST" style="position: absolute; top: 10px; right: 10px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;" onclick="return confirm('Yakin ingin menghapus karyawan ini?')">
                            <i class="bi bi-x fs-5 text-white"></i>
                        </button>
                    </form>


                    <!-- Isi Card -->
                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="bi bi-person fs-4 text-secondary"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 fw-bold text-dark">{{ $mekanik->nama }}</h6>
                        <small class="text-primary">Rp {{ number_format($mekanik->gaji, 2, ',', '.') }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ route('cosctgaji') }}" class="btn btn-secondary mt-3">Kembali</a>

</div>
</main>
@endsection
