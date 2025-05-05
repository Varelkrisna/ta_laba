@extends('layouts.main')
@section('header')
<main id="main" class="main d-flex flex-column justify-content-center align-items-center" style="min-height: 45vh; background-color: #f8f9fa;">

    <style>
        .btn-custom-animated {
            font-size: 1.25rem;
            padding: 0.75rem 2rem;
            border-radius: 30px;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom-animated:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        }
    </style>

    <div class="text-center mb-5">
        <h2 class="fw-bold mb-2">Kelola Data Biaya</h2>
        <p class="text-muted">Pilih menu di bawah untuk mengelola data biaya dan gaji</p>
    </div>

    <div class="d-flex gap-4">
        <a href="/daftarcosctbiaya" class="btn btn-primary btn-custom-animated">
            <i class="bi bi-cash-stack me-2"></i> Biaya
        </a>

        <a href="/cosctgaji" class="btn btn-success btn-custom-animated">
            <i class="bi bi-currency-dollar me-2"></i> Input Gaji
        </a>
    </div>

</main>
@endsection
