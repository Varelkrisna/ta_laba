@extends('layouts.main')

@section('header')
<main id="main" class="main">
    <div class="container py-4">
        <!-- Judul -->
        <h4 class="text-center bg-light py-2 rounded">Gaji Karyawan Bulan Ini</h4>

        <!-- Form Card -->
        <div class="card shadow-sm px-4 py-4 rounded-4">
            <form action="{{ route('insertgajikaryawan') }}" method="post">
                @csrf

                <!-- Tanggal -->
                <div class="mb-4">
                    <label for="tanggal_gaji" class="form-label fw-semibold text-muted">Tanggal Gajian</label>
                    <div class="input-group">
                        <input type="date" id="tanggal_gaji" name="tanggal_gaji" class="form-control rounded-pill" required>
                    </div>
                </div>

                <!-- Detail Gaji -->
                <div class="mb-3">
                    <h6 class="fw-bold text-primary border-bottom pb-2">Detail Gaji</h6>
                    <div class="row mb-2 fw-bold text-muted">
                        <div class="col-md-6">Nama Karyawan</div>
                        <div class="col-md-3 text-end">Gaji Pokok</div>
                        <div class="col-md-3 text-end">Gaji Bulan Ini</div>
                    </div>

                    @foreach ($data as $kar)
                    <div class="row mb-2 align-items-center">
                        <input type="hidden" name="id_karyawan[]" value="{{ $kar->id }}">
                        <div class="col-md-6">
                            <input type="text" class="form-control rounded-pill" name="nama[]" value="{{ $kar->nama }}" readonly>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control text-end rounded-pill gaji-input" name="gaji[]" value="{{ number_format($kar->gaji, 2, ',', '.') }}" readonly>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control text-end rounded-pill gaji_bulanini-input" name="gaji_bulanini[]" placeholder="0">
                        </div>
                    </div>
                    @endforeach

                </div>

                <!-- Total dan Tombol -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="fw-bold">
                        Total Gaji: <span id="total">Rp 0</span>
                    </div>
                    <button type="submit" class="btn btn-info text-white px-4 py-2 rounded-pill">Save</button>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Script Perhitungan Total -->
<script>
    function parseRupiahToNumber(str) {
        if (!str) return 0;
        return parseFloat(str.replace(/[^\d,-]/g, '').replace(',', '.')) || 0;
    }

    function formatToRupiah(number) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 2
        }).format(number);
    }

    function updateTotal() {
    let total = 0;

    document.querySelectorAll('.gaji_bulanini-input').forEach(el => {
        const gaji_bulanini = parseRupiahToNumber(el.value);
        total += gaji_bulanini;
    });

    document.getElementById('total').innerText = formatToRupiah(total);
}


    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.gaji-input, .gaji_bulanini-input').forEach(el => {
            el.addEventListener('input', updateTotal);
        });

        updateTotal(); // kalkulasi awal
    });
</script>
@endsection
