@extends('layouts.main')
@section('header')
    <main id="main" class="main">

        <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">REPORT</h5>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ url('') }}" method="GET" class="d-flex w-100">
                            <input type="month" name="search" value="{{ request('search') }}" class="form-control" aria-label="Search">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                    </div>

                    @if(request('search'))
                        @php
                            $date = \Carbon\Carbon::createFromFormat('Y-m', request('search'));
                        @endphp
                        <p>Periode: <strong>{{ $date->translatedFormat('F Y') }}</strong></p>
                    @endif

        </div>
              </div>
              <table class="table table-success table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">PRINT</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>
                        <button class="btn btn-sm btn-primary"><i>PRINT</i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>



    </main>
@endsection
