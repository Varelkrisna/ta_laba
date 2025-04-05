@extends('layouts.main')
@section('header')
    <main id="main" class="main">

        <div class="container mt-4">
            <h4 class="text-center bg-light p-2">CREATE PURCHASE</h4>


    <!-- Transaction Information -->
    <div class="card mb-3">
        <div class="card-header fw-bold">Transaction Information</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Supplier</label>
                    <input type="text" class="form-control" value="Honda" >
                </div>
                <div class="col-md-6">
                    <label class="form-label">Purchase Date</label>
                    <input type="date" class="form-control" value="2024-02-01" >
                </div>
                <div class="col-md-6 mt-2">
                    <label class="form-label">Supplier Pic Name</label>
                    <input type="text" class="form-control" value="Hendro" readonly>
                </div>
                <div class="col-md-6 mt-2">
                    <label class="form-label">Required Date</label>
                    <input type="date" class="form-control" value="2024-02-03"  >
                </div>
            </div>
        </div>
    </div>

    <!-- Purchase Detail -->
    <div class="card mb-3">
        <div class="card-header fw-bold">Purchase Detail</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" value="Oli Yamalube" >
                </div>
                <div class="col-md-2">
                    <label class="form-label">Qty</label>
                    <input type="number" class="form-control" value="5" >
                </div>
                <div class="col-md-2">
                    <label class="form-label">Harga Beli</label>
                    <input type="text" class="form-control" value="3" >
                </div>
                <div class="col-md-3">
                    <label class="form-label">Total</label>
                    <input type="text" class="form-control text-danger" value="30.000" readonly>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn btn-primary">Add Product</button>
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
                    <label class="form-label">Additional Information</label>
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
