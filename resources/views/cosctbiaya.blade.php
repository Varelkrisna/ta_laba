@extends('layouts.main')

@section('header')
<main id="main" class="main">

    <div class="container py-2">
        <div class="mb-4">
            <a href="/tambahkategoribiaya" class="btn btn-primary rounded-pill px-2 py-2 fw-semibold">
                <i class="bi bi-plus-circle me-1"></i> Tambah Kategori Biaya
            </a>
        </div>

        <!-- FORM BIAYA OPERASIONAL -->
        <div class="card rounded-4 shadow-sm px-4 py-3">
            <h6 class="fw-bold text-primary border-bottom pb-2">Form Biaya Operasional</h6>
            <form action="{{ route('insertbiayaoprasional') }}" method="POST">
                @csrf

                <!-- Periode -->
                <div class="mb-4 col-md-6">
                    <label class="form-label text-muted">Periode</label>
                    <div class="input-group">
                        <input type="date" name="tanggal_bayar" class="form-control rounded-pill" required>
                    </div>
                </div>

                <!-- Container Dinamis untuk Input Biaya -->
                <div id="biaya-container">
                    <div class="row g-3 align-items-center mb-4 biaya-item">
                        <div class="col-md-4">
                            <label class="form-label text-muted">Jenis Biaya</label>
                            <select class="form-select" name="id_kategoribiaya[]" aria-label="Pilih Kategori Biaya">
                                <option selected>Pilih Kategori Biaya</option>
                                @foreach ($kategoribiaya as $kt)
                                    <option value="{{ $kt->id }}">{{ $kt->nama_kategoribiaya }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-muted">Nominal</label>
                            <input type="number" name="nominal[]" class="form-control rounded-pill" placeholder="Input Nominal" required>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <!-- Tombol hapus, disembunyikan untuk baris pertama -->
                            <button type="button" class="btn btn-danger btn-sm rounded-circle remove-biaya d-none">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tombol Tambah dan Submit -->
                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <button type="button" id="add-biaya" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                        <i class="bi bi-plus"></i>
                    </button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>

</main>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addBtn = document.getElementById('add-biaya');
        const container = document.getElementById('biaya-container');

        addBtn.addEventListener('click', function () {
            const items = container.querySelectorAll('.biaya-item');
            const lastItem = items[items.length - 1];
            const newItem = lastItem.cloneNode(true);

            // Reset nilai input dan select
            newItem.querySelectorAll('input, select').forEach(input => input.value = '');

            // Tampilkan tombol hapus di baris baru
            const removeBtn = newItem.querySelector('.remove-biaya');
            removeBtn.classList.remove('d-none');

            container.appendChild(newItem);
        });

        // Event delegation untuk tombol hapus
        container.addEventListener('click', function (e) {
            if (e.target.closest('.remove-biaya')) {
                const item = e.target.closest('.biaya-item');
                item.remove();
            }
        });
    });
</script>
@endpush
