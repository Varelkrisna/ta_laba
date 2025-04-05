<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inputstok;
use App\Models\Stokopname;

class pageController extends Controller
{
    public function inputstok(Request $request)
{
    $query = InputStok::query(); // Menggunakan query builder agar bisa menerapkan filter

    if ($request->has('search') && !empty($request->search)) {
        $query->where('sub_kategori', 'like', '%' . $request->search . '%');
    }

    $data = $query->get();

    return view('inputstok', compact('data'))->with('title', 'Input Stok');
}

    public function forminputstok(){
        $data=inputstok::all();
        return view('forminputstok', ["title" => "forminputstok"]);
    }
    public function insertinputstok(Request $request){
        // dd($request->all());
        inputstok::create($request->all());
        return redirect()->route('inputstok')->with('success', 'Data Berhasil Ditambahkan');
    }
    // untuk menuju view edit
    public function editinputstok($id){
        $data = inputstok::find($id);
        return view('editinputstok', compact('data'), ["title" => "editinputstok"]);
    }
    // untuk setelah melakukan edit
    public function updateinputstok(Request $request, $id){
        $data = inputstok::find($id);
        $data->update($request->all());
        return redirect()->route('inputstok')->with('success', 'Data Berhasil Diupdate');
    }
    public function delete($id){
        $data = inputstok::find($id);
        $data->delete();
        return redirect()->route('inputstok')->with('success', 'Data Berhasil Dihapus');

    }

    // -----------------------------------------------------------------------------------------------
    // STOK OPNAME

    public function formstokopname() {
        // Ambil data dari tabel inputstok
        $data = Inputstok::all();

        return view('formstokopname', [
            "title" => "Form Stok Opname",
            "data" => $data
        ]);
    }

    public function insertstokopname(Request $request)
    {

        // Simpan data ke dalam tabel stokopname
        foreach ($request->stok_akhir as $index => $stok_akhir) {
            Stokopname::create([
                'tanggal_opname' => $request->tanggal_opname,
                'nama_produk' => $request->nama_produk[$index],
                'stok' => $request->stok[$index],
                'stok_akhir' => $stok_akhir,
                'keterangan' => $request->keterangan[$index] ?? null,
            ]);
        }

        return redirect()->route('stokopname')->with('success', 'Data stok opname berhasil disimpan.');
    }

    public function stokopname(Request $request) {

        // Ambil hanya data tanggal opname tanpa detail barang
        $data = Stokopname::select('tanggal_opname')->distinct()->get();
        return view('stokopname', compact('data'))->with('title', 'Stok Opname');
    }
}
