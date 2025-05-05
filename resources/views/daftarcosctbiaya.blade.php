@extends('layouts.main')

@section('header')
<main id="main" class="main">
    <div class="container py-4">
        <div class="mb-4">
            <a href="/cosctbiaya" class="btn btn-primary rounded-pill px-2 py-2 fw-semibold">
                <i class="bi bi-plus-circle me-1"></i> Tambah Biaya
            </a>
        </div>
            <!-- Tabel -->
            <table class="table table-success table-striped mb-0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Pembayaran Biaya Oprasional</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ date('F Y', strtotime($item->tanggal_bayar)) }}</td>
                        <td>
                            <a href="{{ route('detailcosctbiaya', ['tanggal_bayar' => $item->tanggal_bayar]) }}" class="btn btn-sm btn-info">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="{{ route('deletebiaya', $item->tanggal_bayar) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</main>
@endsection
