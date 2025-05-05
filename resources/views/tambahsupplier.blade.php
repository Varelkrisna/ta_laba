@extends('layouts.main')
@section('header')
    <main id="main" class="main">
        <div class="mb-4">
            <a href="/formtambahsup" class="btn btn-primary rounded-pill px-2 py-2 fw-semibold">
                <i class="bi bi-plus-circle me-1"></i> Tambah Supplier
            </a>
        </div>
        <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">SUPPLIER</h5>
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
                    <th scope="col">Supllier </th>
                    <th scope="col">PIC Supplier</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomer Telpon</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                @endphp
               @foreach ($data as $tambahsup)
               <tr>

                   <th scope="row">{{ $no++ }}</th>
                   <td>{{ $tambahsup->supplier }}</td>
                   <td>{{ $tambahsup->pic_supplier }}</td>
                   <td>{{ $tambahsup->alamat }}</td>
                   <td>{{ $tambahsup->no_hp }}</td>
                   <td>
                       <a href="" class="btn btn-sm btn-warning">
                           <i class="bi bi-pencil-fill"></i>
                       </a>
                       <a href="" class="btn btn-sm btn-danger">
                           <i class="bi bi-trash-fill"></i>
                       </a>
                   </td>
               </tr>
           @endforeach

                </tbody>
              </table>
            </div>
          </div>



    </main>
@endsection
