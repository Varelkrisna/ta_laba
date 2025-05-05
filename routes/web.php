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

//TAMBAH KATEGORI
Route::get('/tambahkategori', [pageController::class, 'tambahkategori'])->name('tambahkategori');
Route::post('/tambahkategori', [pageController::class, 'kirimkategori'])->name('kirimkategori');
Route::post('/tambahsubkategori', [pageController::class, 'kirimsubkategori'])->name('kirimsubkategori');

// INPUT STOK
Route::get('/inputstok', [pageController::class, 'inputstok'])->name('inputstok');
Route::get('/forminputstok', [pageController::class, 'forminputstok'])->name('forminputstok');
Route::post('/insertinputstok', [pageController::class, 'insertinputstok'])->name('insertinputstok');
Route::get('/editinputstok/{id}', [PageController::class, 'editinputstok'])->name('editinputstok');
Route::post('/updateinputstok/{id}', [pageController::class, 'updateinputstok'])->name('updateinputstok');
Route::get('/delete/{id}', [pageController::class, 'delete'])->name('delete');

Route::get('/subkategori/{id}', [pageController::class, 'getsubkategori'])->name('getsubkategori');


// STOK OPNAME
Route::get('/stokopname', [pageController::class, 'stokopname'])->name('stokopname');
Route::get('/formstokopname', [pageController::class, 'formstokopname'])->name('formstokopname');
Route::post('/insertstokopname', [pageController::class, 'insertstokopname'])->name('insertstokopname');
Route::get('/editstokopname/{tanggal_opname}', [pageController::class, 'editstokopname'])->name('editstokopname');
Route::post('/updatestokopname/{tanggal_opname}', [pageController::class, 'updatestokopname'])->name('updatestokopname');
Route::get('/deletestokopname/{tanggal_opname}', [pageController::class, 'deletestokopname'])->name('deletestokopname');
Route::get('/stokopname/detail/{tanggal_opname}', [pageController::class, 'showstokopnamedetail'])->name('showstokopnamedetail');

//TAMBAH SUPPLIER
Route::get('/tambahsupplier', [pageController::class, 'tambahsupplier'])->name('tambahsupplier');
Route::get('/formtambahsup', [pageController::class, 'formtambahsup'])->name('formtambahsup');
Route::post('/inserttambahsup', [pageController::class, 'inserttambahsup'])->name('inserttambahsup');


//BIAYA KESELURUHAN
Route::get('/listmekanik', [pageController::class, 'listmekanik'])->name('listmekanik');
Route::get('/formtambahkar', [pageController::class, 'formtambahkar'])->name('formtambahkar');
Route::post('/inserttambahkar', [pageController::class, 'inserttambahkar'])->name('inserttambahkar');
Route::delete('/deletekaryawan/{id}', [pageController::class, 'deletekaryawan'])->name('deletekaryawan');
Route::get('/inputgaji', [pageController::class, 'inputgaji'])->name('inputgaji');
Route::post('/insertgajikaryawan', [pageController::class, 'insertgajikaryawan'])->name('insertgajikaryawan');
Route::get('/cosctgaji/detail/{tanggal_gaji}', [pageController::class, 'showgajidetail'])->name('showgajidetail');
Route::get('/deletegaji/{tanggal_gaji}', [pageController::class, 'deletegaji'])->name('deletegaji');

Route::get('/cosctbiaya', [pageController::class, 'cosctbiaya'])->name('cosctbiaya');
Route::get('/daftarcosctbiaya', [pageController::class, 'daftarcosctbiaya'])->name('daftarcosctbiaya');
Route::get('/deletebiaya/{tanggal_bayar}', [pageController::class, 'deletebiaya'])->name('deletebiaya');
Route::get('/detailcosctbiaya/detail/{tanggal_bayar}', [pageController::class, 'detailcosctbiaya'])->name('detailcosctbiaya');
Route::post('/insertbiayaoprasional', [pageController::class, 'insertbiayaoprasional'])->name('insertbiayaoprasional');
Route::get('/cosctgaji', [pageController::class, 'cosctgaji'])->name('cosctgaji');
Route::get('/cosct', [pageController::class, 'cosct'])->name('cosct');
Route::get('/tambahkategoribiaya', [pageController::class, 'tambahkategoribiaya'])->name('tambahkategoribiaya');
Route::post('/cosctbiaya', [pageController::class, 'kirimkategoribiaya'])->name('kirimkategoribiaya');


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
