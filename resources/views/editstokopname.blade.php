@extends('layouts.main')

@section('header')
<main id="main" class="main">
    <div class="container mt-4">
        <h4 class="text-center bg-light p-2">EDIT STOK OPNAME - {{ $data->first()->tanggal_opname ?? '' }}</h4>

        <div class="card mb-5 px-4 py-3">
            <form action="{{ route('updatestokopname', $data->first()->tanggal_opname ?? '') }}" method="post">
                @csrf
                @method('post')
                <div class="card mb-3">
                    <div class="card-header fw-bold">Informasi Transaksi</div>
                    <div class="card-body">
                        <label for="tanggal_opname" class="form-label">Tanggal Opname</label>
                        <input type="date" id="tanggal_opname" name="tanggal_opname" class="form-control" value="{{ $data->first()->tanggal_opname ?? '' }}" readonly>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header fw-bold">Detail Stok Opname</div>
                    <div class="card-body">
                        <div class="row mb-2 fw-bold">
                            <div class="col-md-3">Nama Barang</div>
                            <div class="col-md-2">Stok Awal</div>
                            <div class="col-md-2">Stok Akhir</div>
                            <div class="col-md-3">Keterangan</div>
                        </div>

                        @foreach ($data as $item)
                        <div class="row mb-2">
                            <input type="hidden" name="id[]" value="{{ $item->id }}">
                            <div class="col-md-3">
                                <input type="text" class="form-control" value="{{ $item->inputStok->nama_produk ?? 'Data Produk Tidak Ditemukan' }}" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" value="{{ $item->inputStok->stok ?? 0 }}" readonly data-stok-awal="{{ $item->inputStok->stok ?? 0 }}" data-harga-beli="{{ $item->inputStok->harga_beli ?? 0 }}">
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control stok-akhir-input" name="stok_akhir[]" value="{{ $item->stok_akhir }}" required>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="keterangan[]" value="{{ $item->keterangan }}" placeholder="Opsional">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="d-flex justify-content-end align-items-center">
                    <div class="me-3">
                        <strong>Total Selisih Nilai:</strong> <span id="total-selisih-nilai">Rp 0</span>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('stokopname') }}" class="btn btn-secondary">Batal</a>
                    </div>
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
                const row = input.closest('.row');
                const stokAwalInput = row.querySelector('input[readonly][data-stok-awal]');
                const hargaBeliInput = row.querySelector('input[readonly][data-harga-beli]');

                const stokAwal = parseInt(stokAwalInput.dataset.stokAwal) || 0;
                const stokAkhir = parseInt(input.value) || 0;
                const hargaBeli = parseFloat(hargaBeliInput.dataset.hargaBeli) || 0;
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

        hitungTotalSelisihNilai(); // Hitung saat halaman pertama kali dimuat
    });
</script>
@endsection
