@extends('layouts.main')

@section('header')
<main id="main" class="main">
    <div class="container mt-4">
        <h4 class="text-center bg-light p-2">Create Opname Stok</h4>

        <div class="card mb-5 px-4 py-3">
            <form action="{{ route('insertstokopname') }}" method="post">
                @csrf

                <!-- Transaction Information -->
                <div class="card mb-3">
                    <div class="card-header fw-bold">Transaction Information</div>
                    <div class="card-body">
                        <label for="tanggal_opname" class="form-label">Opname Date</label>
                        <input type="date" id="tanggal_opname" name="tanggal_opname" class="form-control" required>
                    </div>
                </div>

                <!-- Stok Opname Detail -->
                <div class="card mb-3">
                    <div class="card-header fw-bold">Stok Opname Detail</div>
                    <div class="card-body">
                        <div class="row mb-2 fw-bold">
                            <div class="col-md-3">Nama Barang</div>
                            <div class="col-md-2">Stock Awal</div>
                            <div class="col-md-2">Stok Akhir</div>
                            <div class="col-md-3">Keterangan</div>
                        </div>

                        @foreach ($data as $index => $inputstok)
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="nama_produk[]" value="{{ $inputstok->nama_produk }}" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="stok[]" value="{{ $inputstok->stok }}" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="stok_akhir[]" required>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="keterangan[]" placeholder="Opsional">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Tombol Save -->
                <div class="text-end">
                    <button type="submit" class="btn btn-info text-white">Save</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
