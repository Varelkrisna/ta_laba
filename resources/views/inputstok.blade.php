@extends('layouts.main')
@section('header')
    <main id="main" class="main">

        <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">INPUT STOK</h5>
                <a href="/forminputstok" class=" btn btn-sm btn-primary "><i
                    class="fas fa-download fa-sm text-white-50"></i>+</a>
            </div>
        </div >
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="{{ url('/inputstok') }}" method="GET" class="d-flex w-100">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                placeholder="Sub Kategori..." aria-label="Search" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </form>
    </div>
</div>

              @if ($message = Session::get('success'))
              <div class="alert alert-success" role="alert">
                  {{ $message }}
                </div>
              @endif
              <table class="table table-success table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Sub Kategori</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $inputstok)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $inputstok->kategori }}</td>
                        <td>{{ $inputstok->sub_kategori }}</td>
                        <td>{{ $inputstok->nama_produk }}</td>
                        <td>{{ $inputstok->stok }}</td>
                        <td>{{ $inputstok->harga_jual }}</td>
                        <td>{{ $inputstok->harga_beli }}</td>
                        <td>
                            <a href="/editinputstok/{{ $inputstok->id }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a href="/delete/{{ $inputstok->id }}" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i>

                        </td>
                      </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>



    </main>
@endsection
