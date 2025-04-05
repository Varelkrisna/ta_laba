@extends('layouts.main')
@section('header')
    <main id="main" class="main">

        <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">SUPPLIER</h5>
                <a href="/formtambahsup" class=" btn btn-sm btn-primary "><i
                    class="fas fa-download fa-sm text-white-50"></i>+</a>
        </div>
              </div>
              <table class="table table-success table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Supllier </th>
                    <th scope="col">PIC Supplier</th>
                    <th scope="col">Nomer Telpon</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>
                        <button class="btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>



    </main>
@endsection
