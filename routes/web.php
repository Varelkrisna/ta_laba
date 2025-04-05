<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/login', [
    LoginController::class, 'login' ]);

Route::get('/', function () {
    return view('login' , [
        "title" => "login"
    ]);
});
Route::get('/dashboard', function () {
    return view('dashboard', [
        "title" => "dashboard"
    ]);
});

// INPUT STOK
Route::get('/inputstok', [pageController::class, 'inputstok'])->name('inputstok');
Route::get('/forminputstok', [pageController::class, 'forminputstok'])->name('forminputstok');
Route::post('/insertinputstok', [pageController::class, 'insertinputstok'])->name('insertinputstok');
Route::get('/editinputstok/{id}', [PageController::class, 'editinputstok'])->name('editinputstok');
Route::post('/updateinputstok/{id}', [pageController::class, 'updateinputstok'])->name('updateinputstok');
Route::get('/delete/{id}', [pageController::class, 'delete'])->name('delete');

// STOK OPNAME
Route::get('/stokopname', [pageController::class, 'stokopname'])->name('stokopname');
Route::get('/formstokopname', [pageController::class, 'formstokopname'])->name('formstokopname');
Route::post('/insertstokopname', [pageController::class, 'insertstokopname'])->name('insertstokopname');

//PEMBELIAN
Route::get('/pembelian', function () {
    return view('pembelian', [
        "title" => "pembelian"
    ]);
});
Route::get('/penjualan', function () {
    return view('penjualan', [
        "title" => "penjualan"
    ]);
});

Route::get('/cosct', function () {
    return view('cosct', [
        "title" => "cosct"
    ]);
});
Route::get('/report', function () {
    return view('report', [
        "title" => "report"
    ]);
});


Route::get('/formpembelian', function () {
    return view('formpembelian', [
        "title" => "formpembelian"
    ]);
});
Route::get('/cosctbiaya', function () {
    return view('cosctbiaya', [
        "title" => "cosctbiaya"
    ]);
});
Route::get('/cosctgaji', function () {
    return view('cosctgaji', [
        "title" => "cosctgaji"
    ]);
});
Route::get('/tambahsupplier', function () {
    return view('tambahsupplier', [
        "title" => "tambahsupplier"
    ]);
});
Route::get('/formtambahkar', function () {
    return view('formtambahkar', [
        "title" => "formtambahkar"
    ]);
});
Route::get('/formtambahsup', function () {
    return view('formtambahsup', [
        "title" => "formtambahsup"
    ]);
});
Route::get('/formpenjualan', function () {
    return view('formpenjualan', [
        "title" => "formpenjualan"
    ]);
});
Route::get('/formpenjualan2', function () {
    return view('formpenjualan2', [
        "title" => "formpenjualan2"
    ]);
});
