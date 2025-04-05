@extends('layouts.main')
@section('header')
<main id="main" class="main">
     <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">PENJUALAN</h5>
                <a href="/formpenjualan" class=" btn btn-sm btn-primary "><i
                    class="fas fa-download fa-sm text-white-50"></i>+</a>
        </div>
              </div>
              <table class="table table-success table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date Transaction <input type="date" id="datetransaction" class="form-control" value=""></th>
                    <th scope="col">Total<input type="text" id="total" class="form-control" value=""></th></th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                        <button class="btn btn-sm btn-warning"><i class="bi bi-view-fill"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-print-fill"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>


        </main>
@endsection

