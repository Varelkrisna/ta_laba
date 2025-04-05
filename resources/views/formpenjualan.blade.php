@extends('layouts.main')

@section('header')
<main id="main" class="main">
    <div class="container mt-4">
        <h4 class="text-left bg-light p-2">Transaksi Penjualan</h4>

        <!-- Form Customer & Karyawan -->
        <div class="card mb-3">
            <div class="row justify-content-center mt-2" >
                <input type="date" class="form-control" style="max-width: 250px;" >
            </div>
            <div class="card-body mt-3">
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
                <button class="btn btn-secondary">🔍</button>
            </div>

        </div>

        <!-- Grid Produk Utama -->
        <div class="row">
            <div class="col-md-8">
                <div class="row g-2">
                    @foreach(['OLI', 'KAMPAS', 'BUSI', 'AKI', 'BAN DALAM', 'STOPLAM', 'Jasa Service'] as $item)
                        <div class="col-4">
                            <button class="btn btn-primary w-100 p-3"
                                onclick="showSubProducts('{{ $item }}')">
                                {{ $item }}
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Grid Produk Terkait -->
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="row g-2" id="sub-product-grid">
                    <!-- Produk terkait akan ditampilkan di sini -->
                </div>
            </div>
        </div>

    </div>

    <script>
        // Data produk terkait berdasarkan kategori utama
        const subProducts = {
            "OLI": [
                { name: "Oli Top 1", price: 120000 },
                { name: "Oli Federal", price: 95000 },
                { name: "Oli Castrol", price: 110000 }
            ],
            "KAMPAS": [
                { name: "Kampas Rem CBR", price: 175000 },
                { name: "Kampas Rem Supra", price: 80000 }
            ],
            "BUSI": [
                { name: "Busi NGK", price: 45000 },
                { name: "Busi Denso", price: 60000 }
            ],
            "STOPLAM": [
                { name: "Waktu T10-2019", price: 290000 },
                { name: "Supra 125", price: 255000 },
                { name: "Cbr 250 2020", price: 1450000 }
            ]
        };

        function showSubProducts(category) {
            let productGrid = document.getElementById('sub-product-grid');

            if (subProducts[category]) {
                let productHtml = subProducts[category].map(product => `
                    <div class="col-4">
                        <button class="btn btn-warning w-100 p-3">${product.name} <br> Rp ${product.price.toLocaleString()}</button>
                    </div>
                `).join('');

                productGrid.innerHTML = productHtml;
            } else {
                productGrid.innerHTML = "<p class='text-muted'>Tidak ada produk terkait</p>";
            }
        }
    </script>

</main>
@endsection
