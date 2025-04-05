@extends('layouts.main')
@section('header')
<main id="main" class="main">
    <link rel="stylesheet" href="style.css">

    <a href="/cosctbiaya" class="btn btn-primary btn-custom mb-3">
        <i class="fa-sm text-white-50"></i> Biaya
    </a>
    <a href="/cosctgaji" class="btn btn-primary btn-custom mb-3">
        <i class="fa-sm text-white-50"></i> Input Gaji
    </a>



<div class="row justify-content-center mt-4">
  <div class="col-md-5">
    <form action="{{ url('/') }}" method="GET" class="d-flex w-100">
        <input type="date" name="search" value="{{ request('search') }}" class="form-control"
         aria-label="Search">

    </form>
  </div>
</div>

<table class="table table-warning table-striped mt-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kategori </th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Otto</td>
      <td>
          <button class="btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i></button>
      </td>
    </tr>
  </tbody>
</table>

        </main>
@endsection
