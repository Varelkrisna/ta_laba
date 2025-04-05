@extends('layouts.main')

@section('header')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">STOK OPNAME</h5>
                <a href="{{ route('formstokopname') }}" class="btn btn-sm btn-primary">+</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ url('/stokopname') }}" method="GET" class="d-flex w-100">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Cari Tanggal Opname..." aria-label="Search" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                </form>
            </div>
        </div>

        @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @endif

        <table class="table table-success table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Opname Date</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($data as $stokopname)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $stokopname->tanggal_opname }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
