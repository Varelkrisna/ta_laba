@extends('layouts.main')

@section('header')
<main id="main" class="main">
    <div class="container mt-4">
        <h4 class="text-left bg-light p-2">Transaksi Penjualan</h4>

        <!-- Form Customer & Karyawan -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Nama Customer</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Customer">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Karyawan</label>
                        <select class="form-control">
                            <option selected>Pilih Karyawan</option>
                            <option value="1">Karyawan A</option>
                            <option value="2">Karyawan B</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search & Date -->
        <div class="d-flex justify-content-between mb-3">
            <div class="input-group" style="max-width: 250px;">
                <input type="text" class="form-control" placeholder="Cari produk...">
                <button class="btn btn-secondary">
                    SEARCH
                </button>
            </div>
            <input type="date" class="form-control" style="max-width: 200px;">
        </div>

        <!-- Product Grid -->
        <div class="row">
            <div class="col-md-8">
                <div class="row g-2">
                    @foreach(['OLI', 'KAMPAS', 'BUSI', 'AKI', 'BAN DALAM', 'STOPLAM', 'Jasa Service'] as $item)
                        <div class="col-4">
                            <button class="btn btn-primary w-100 p-3"
                                onclick="redirectToPage()">
                                {{ $item }}
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <script>
            function redirectToPage() {
                window.location.href = "/formpenjualan2";
            }
        </script>


            <!-- Cart Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="text-muted">No item</p>
                        <hr>
                        <p><strong>Total: Rp 0</strong></p>
                        <button class="btn btn-primary w-100">Save Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
