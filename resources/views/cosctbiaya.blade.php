@extends('layouts.main')
@section('header')
    <main id="main" class="main">

        <div class="container mt-4">
            <h4 class="text-center bg-light p-2">Biaya</h4>


    <!-- Transaction Information -->
    <div class="card mb-3">
        <div class="card-header fw-bold">Transaction Information</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Kategori</label>
                    <input type="text" class="form-control" value="">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal</label>
                    <input type="date" class="form-control" value="">
                </div>
                <div class="col-md-6 mt-2">
                    <label class="form-label">Biaya</label>
                    <input type="text" class="form-control" value="">
                </div>
            </div>
        </div>
    </div>


    <!-- Transaction Summary -->
    <div class="card mb-3">
        <div class="card-header fw-bold">Transaction Summary</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <label class="form-label">Information</label>
                    <input type="text" class="form-control" value="Keterangan" >
                </div>
                <div class="col-md-4">
                    <label class="form-label">Purchase Total</label>
                    <input type="text" class="form-control text-danger" value="-60.000" readonly>
                </div>
            </div>
        </div>
    </div>

    <!-- Save Button -->
    <div class="text-end">
        <button type="button" class="btn btn-info text-white px-4">Save</button>
    </div>


    </main>
@endsection
