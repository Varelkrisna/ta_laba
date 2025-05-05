<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inputstok;
use App\Models\Stokopname;
use App\Models\Tambahkategori;
use App\Models\Subkategori;
use App\Models\Tambahsupplier;
use App\Models\Tambahkaryawan;
use App\Models\Kategoribiaya;
use App\Models\Cosctbiaya;
use App\Models\Gajikaryawan;


class pageController extends Controller
{
    public function tambahkategori(){
        $kategori = Tambahkategori::all();
        return view('tambahkategori',compact('kategori'))->with('title','tambahkategori');
    }
    public function kirimkategori(Request $request){
        Tambahkategori::create([
            'nama_kategori'=>$request->nama_kategori
        ]);
        return redirect()->route('tambahkategori');
    }

    public function kirimsubkategori(Request $request){
        Subkategori::create([
            'id_kategori'=>$request->id_kategori,
            'sub_kategori'=>$request->sub_kategori
        ]);
        return redirect()->route('tambahkategori');
    }
//-----------------------------------------------------------------------------------
//INPUTSTOK
public function inputstok(Request $request)
{
    $query = InputStok::with('subkategori');

    if ($request->has('search') && !empty($request->search)) {
        $query->whereHas('subkategori', function ($q) use ($request) {
            $q->where('sub_kategori', 'like', '%' . $request->search . '%');
        });
    }

    $data = $query->get();

    return view('inputstok', compact('data'))->with('title', 'Input Stok');
}


    public function getsubkategori($id){
       $subkategori=Subkategori::where('id_kategori',$id)->get();
       return response()->json($subkategori);
    }
    public function forminputstok(){
        $kategori=Tambahkategori::all();
        $data=inputstok::all();
        return view('forminputstok', ["title" => "forminputstok", 'kategori'=>$kategori]);
    }
    public function insertinputstok(Request $request){
        // dd($request->all());
        inputstok::create($request->all());
        return redirect()->route('inputstok')->with('success', 'Data Berhasil Ditambahkan');
    }
    // untuk menuju view edit
    public function editinputstok($id){
        $data = InputStok::with('subkategori.tambahkategori')->find($id);
        $kategori=Tambahkategori::all();
        return view('editinputstok', compact('data', 'kategori'), ["title" => "editinputstok"]);
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
        foreach ($request->id_inputstok as $index => $id_inputstok) {
            Stokopname::create([
                'id_inputstok' => $id_inputstok,
                'tanggal_opname' => $request->tanggal_opname,
                'stok_akhir' => $request->stok_akhir[$index],
                'keterangan' => $request->keterangan[$index] ?? null,
                'total' => $request->total_selisih_nilai ?? 0, // Simpan total selisih nilai jika diperlukan
            ]);
        }
        return redirect()->route('stokopname')->with('success', 'Data stok opname berhasil disimpan');
    }

    public function stokopname(Request $request) {
        // Ambil hanya data tanggal opname tanpa detail barang
        $data = Stokopname::select('tanggal_opname')->distinct()->get();
        return view('stokopname', compact('data'))->with('title', 'Stok Opname');
    }
    public function editstokopname($tanggal_opname)
    {
        $data = Stokopname::with('inputStok')->where('tanggal_opname', $tanggal_opname)->get();
        return view('editstokopname', compact('data'), ["title" => "Edit Stok Opname"]);
    }
    public function updatestokopname(Request $request, $tanggal_opname)
    {
        $stokAkhirs = $request->input('stok_akhir');
        $keterangans = $request->input('keterangan');
        $ids = $request->input('id'); // Asumsi Anda mengirimkan ID stok opname untuk setiap baris

        if (is_array($ids) && is_array($stokAkhirs) && is_array($keterangans)) {
            foreach ($ids as $index => $id) {
                Stokopname::where('id', $id)
                    ->where('tanggal_opname', $tanggal_opname) // Tambahkan verifikasi tanggal
                    ->update([
                        'stok_akhir' => $stokAkhirs[$index],
                        'keterangan' => $keterangans[$index],
                    ]);
            }
            return redirect()->route('stokopname')->with('success', 'Data Stok Opname Berhasil Diperbarui');
        }

        return redirect()->back()->with('error', 'Data update tidak valid.');
    }
    public function deletestokopname($tanggal_opname)
    {
        Stokopname::where('tanggal_opname', $tanggal_opname)->delete();
        return redirect()->route('stokopname')->with('success', 'Data Stok Opname Berhasil Dihapus');
    }
    public function showstokopnamedetail($tanggal_opname)
    {
    $data = Stokopname::with(['inputStok.subkategori.tambahkategori'])
        ->where('tanggal_opname', $tanggal_opname)
        ->get();

    $total_kerugian = 0;

    foreach ($data as $item) {
        $stok_awal = $item->inputStok->stok ?? 0;
        $stok_akhir = $item->stok_akhir ?? 0;
        $harga_beli = $item->inputStok->harga_beli ?? 0;
        $selisih = $stok_akhir - $stok_awal;
        $total_kerugian += ($selisih * $harga_beli);
    }

    return view('detailstokopname', compact('data', 'tanggal_opname', 'total_kerugian'))->with('title', 'showstokopnamedetail');;
}


    // -----------------------------------------------------------------------------------------------
    // TAMBAH SUPPLIER
    public function tambahsupplier(Request $request) {
        $data=Tambahsupplier::all();
        return view('tambahsupplier', compact('data'))->with('title', 'tambahsupplier');
    }
    public function formtambahsup() {
        $data=Tambahsupplier::all();
        return view('formtambahsup', ["title" => "formtambahsup"]);

    }
    public function inserttambahsup(Request $request){
        Tambahsupplier::create($request->all());
        return redirect()->route('tambahsupplier')->with('success', 'Data Berhasil Ditambahkan');
    }


    //----------------------------------------------------------------------------------------------------------------
    //BIAYA KARYAWAN
    public function listmekanik(Request $request) {
        $data=Tambahkaryawan::all();
        return view('listmekanik', compact('data'))->with('title', 'listmekanik');
    }

    public function formtambahkar() {
        $data=Tambahkaryawan::all();
        return view('formtambahkar', ["title" => "formtambahkar"]);

    }
    public function inserttambahkar(Request $request){
        Tambahkaryawan::create($request->all());
        return redirect()->route('listmekanik')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function deletekaryawan($id)
    {
        Tambahkaryawan::where('id', $id)->delete();
        return redirect()->route('listmekanik')->with('success', 'Karyawan berhasil dihapus');
    }

    public function inputgaji() {
        $data = Tambahkaryawan::all();

        return view('inputgaji', ["title" => "inputgaji","data" => $data]);

    }
    public function insertGajiKaryawan(Request $request)
    {
        // Iterasi untuk setiap karyawan yang akan diinputkan gajinya
        foreach ($request->id_karyawan as $key => $id_karyawan) {
            $gaji_bulanini = str_replace(['Rp', ','], '', $request->gaji_bulanini[$key]);  // Menghilangkan format Rp dan koma

            // Menyimpan data gaji ke tabel Gajikaryawan
            Gajikaryawan::create([
                'id_karyawan' => $id_karyawan,
                'tanggal_gaji' => $request->tanggal_gaji,
                'gaji_bulanini' => $gaji_bulanini,
                'total' => $gaji_bulanini,  // Bisa dihitung sesuai kebutuhan
            ]);

            // Update gaji tetap di tabel Tambahkaryawan jika diperlukan
            $karyawan = Tambahkaryawan::find($id_karyawan);
            if ($karyawan) {
                // Menyimpan atau mengupdate gaji tetap jika perlu
                $karyawan->update([
                    'gaji' => $gaji_bulanini, // Update gaji tetap dengan gaji bulan ini
                ]);
            }
        }

        return redirect()->route('cosctgaji')->with('success', 'Data Gaji Berhasil Disimpan');
    }



    public function cosctgaji(Request $request) {
        // Ambil hanya data tanggal opname tanpa detail barang
        $data = Gajikaryawan::select('tanggal_gaji')->distinct()->get();
        return view('cosctgaji', compact('data'))->with('title', 'cosctgaji');
    }
    public function showgajidetail($tanggal_gaji)
    {
        $data = Gajikaryawan::with('tambahkaryawan')
            ->where('tanggal_gaji', $tanggal_gaji)
            ->get();

        return view('detailgaji', compact('data', 'tanggal_gaji'))->with('title', 'Detail Gaji');
    }

    public function deletegaji($tanggal_gaji)
    {
        Gajikaryawan::where('tanggal_gaji', $tanggal_gaji)->delete();
        return redirect()->route('cosctgaji')->with('success', 'Data GajiBerhasil Dihapus');
    }



    public function tambahkategoribiaya(){
        $kategoribiaya = Kategoribiaya::all();
        return view('tambahkategoribiaya',compact('kategoribiaya'))->with('title','tambahkategoribiaya');
    }
    public function kirimkategoribiaya(Request $request){
        Kategoribiaya::create([
            'nama_kategoribiaya'=>$request->nama_kategoribiaya
        ]);
        return redirect()->route('tambahkategoribiaya');
    }
    public function insertbiayaoprasional(Request $request)
    {
        $tanggal_bayar = $request->tanggal_bayar; // Ambil tanggal dari form

        foreach ($request->id_kategoribiaya as $key => $kategori) {
            Cosctbiaya::create([
                'tanggal_bayar' => $tanggal_bayar,
                'id_kategoribiaya' => $kategori,
                'nominal' => $request->nominal[$key],
            ]);
        }

        return redirect()->route('daftarcosctbiaya')->with('success', 'Biaya operasional berhasil disimpan');
    }

    public function cosctbiaya() {
        $kategoribiaya=Kategoribiaya::all();
        return view('cosctbiaya', compact('kategoribiaya'))->with('title', 'cosctbiaya');
    }

    public function daftarcosctbiaya(Request $request) {
        // Ambil hanya data tanggal opname tanpa detail barang
        $data = Cosctbiaya::select('tanggal_bayar')->distinct()->get();
        return view('daftarcosctbiaya', compact('data'))->with('title', 'daftarcosctbiaya');
    }
    public function detailcosctbiaya($tanggal_bayar)
    {
        $data = Cosctbiaya::with('tambahkategori')
            ->where('tanggal_bayar', $tanggal_bayar)
            ->get();

        $total = $data->sum('nominal');

        return view('detailcosctbiaya', compact('data', 'tanggal_bayar', 'total'))->with('title', 'Detail Biaya Operasional');
    }

    public function deletebiaya($tanggal_bayar)
    {
        Cosctbiaya::where('tanggal_bayar', $tanggal_bayar)->delete();
        return redirect()->route('daftarcosctbiaya')->with('success', 'Data Biaya Berhasil Dihapus');
    }

    public function cosct() {

        return view('cosct')->with('title', 'cosct');
    }

}
