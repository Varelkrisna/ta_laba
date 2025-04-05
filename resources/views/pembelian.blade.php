@extends('layouts.main')
@section('header')
    <main id="main" class="main">

        <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">PEMBELIAN</h5>
                <a href="/formpembelian" class=" btn btn-sm btn-primary "><i
                    class="fas fa-download fa-sm text-white-50"></i>+</a>
        </div>
              </div>
              <table class="table table-success table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">PO Number <input type="text" id="ponumber" class="form-control" value=""></th>
                    <th scope="col">PO Date <input type="date" id="podate" class="form-control" value=""></th></th>
                    <th scope="col">Requaired Date <input type="date" id="reqdate" class="form-control" value=""></th></th>
                    <th scope="col">Supllier <input type="text" id="supplier" class="form-control" value=""></th></th>
                    <th scope="col">TOTAL</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@Rp.12.000.000</td>
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
