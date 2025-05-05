@extends('layouts.main')

@section('header')
<main id="main" class="main">
    <div class="container py-4">

        <!-- HEADER -->
        <h4 class="text-center bg-light rounded-3 py-2 mb-4">Opname Stok</h4>

        <!-- CARD TRANSAKSI -->
        <div class="card rounded-4 shadow-sm mb-4 px-4 py-3">
            <form action="{{ route('insertstokopname') }}" method="POST">
                @csrf
                <!-- PERIODE OPNAME -->
                <div class="mb-4">
                    <label for="tanggal_opname" class="form-label fw-semibold text-muted">Tanggal Opname</label>
                    <div class="input-group">
                        <input type="date" id="tanggal_opname" name="tanggal_opname" class="form-control rounded-pill" required>
                    </div>
                </div>

                <!-- DAFTAR PRODUK OPNAME -->
                <div class="card-body p-0">
                    <div class="row fw-semibold text-muted mb-2 border-bottom pb-2">
                        <div class="col-md-3">Nama Produk</div>
                        <div class="col-md-2">Stok Awal</div>
                        <div class="col-md-2">Stok Akhir</div>
                        <div class="col-md-3">Keterangan</div>
                    </div>

                    @foreach ($data as $inputstok)
                    <div class="row align-items-center mb-3">
                        <input type="hidden" name="id_inputstok[]" value="{{ $inputstok->id }}">
                        <div class="col-md-3">
                            <input type="text" class="form-control rounded-pill" value="{{ $inputstok->nama_produk }}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control rounded-pill" value="{{ $inputstok->stok }}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control rounded-pill stok-akhir-input" name="stok_akhir[]" value="{{ $inputstok->stok }}" data-stok-awal="{{ $inputstok->stok }}" data-harga-beli="{{ $inputstok->harga_beli }}" required>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control rounded-pill" name="keterangan[]" placeholder="Opsional">
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- TOTAL DAN BUTTON -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="fw-bold text-primary">
                        Total Selisih Nilai: <span id="total-selisih-nilai">Rp 0</span>
                    </div>
                    <button type="submit" class="btn btn-info text-white px-4 py-2 rounded-pill">Save</button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stokAkhirInputs = document.querySelectorAll('.stok-akhir-input');
        const totalSelisihNilaiElement = document.getElementById('total-selisih-nilai');
        let totalSelisihNilai = 0;

        function hitungTotalSelisihNilai() {
            totalSelisihNilai = 0;
            stokAkhirInputs.forEach(function(input) {
                const stokAwal = parseInt(input.dataset.stokAwal) || 0;
                const stokAkhir = parseInt(input.value) || 0;
                const hargaBeli = parseFloat(input.dataset.hargaBeli) || 0;
                const selisihStok = stokAkhir - stokAwal;
                totalSelisihNilai += (selisihStok * hargaBeli);
            });

            const formattedTotal = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(totalSelisihNilai);

            totalSelisihNilaiElement.textContent = formattedTotal;
        }

        stokAkhirInputs.forEach(function(input) {
            input.addEventListener('change', hitungTotalSelisihNilai);
            input.addEventListener('keyup', hitungTotalSelisihNilai);
        });

        hitungTotalSelisihNilai();
    });
</script>
@endsection
