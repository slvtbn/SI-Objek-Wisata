<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Objek_Wisata;
use App\Models\Kecamatan;
use App\Models\Fasilitas;
use File;
use Session;
use PDF;

class OWController extends Controller
{
    public function tampil() {
        $objek_wisata = Objek_Wisata::join('tb_kecamatan', 'tb_objek.id_kecamatan', '=', 'tb_kecamatan.id_kecamatan')
                      ->select('tb_objek.*', 'tb_kecamatan.nama as kecamatan')
                      ->get();
        return \view('pages.objek-wisata.objek-wisata', ['objek_wisata' => $objek_wisata]);
    }

    public function tambah() {
        $kecamatan = Kecamatan::all();
        $fasilitas = Fasilitas::all();
        return \view('pages.objek-wisata.tambah', ['kecamatan' => $kecamatan, 'fasilitas' => $fasilitas]);
    }

    public function detail($id_ow) {
        $detail = Objek_Wisata::find($id_ow);

        $id_fasilitas = (explode(",",$detail->id_fasilitas));
        $fasilitas = Fasilitas::where(function($query) use($id_fasilitas) { 
            foreach($id_fasilitas as $id){
                $query->orWhere('id_fasilitas', $id);
            }
        })->get();
        return view('pages.objek-wisata.detail', \compact('detail', 'fasilitas'));
    }

    public function upload(Request $request) {
        $this->validate($request, [
            'id_ow' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'id_kecamatan' => 'required',
            'id_fasilitas' => 'required|array|min:1',
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:50000',
        ]);

        $gambar = $request->file('gambar');
        $nama_gambar = uniqid()."_".$gambar->getClientOriginalName();

        $simpan_gambar = 'objek_gambar';
        $gambar->move($simpan_gambar, $nama_gambar);

        Objek_Wisata::create([
            'id_ow' => $request->id_ow,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'id_kecamatan' => $request->id_kecamatan,
            'id_fasilitas' => implode(',', $request->id_fasilitas),
            'gambar' => $nama_gambar
        ]);

        return \redirect('/ow')->with("Success", "Data Objek Wisata Berhasil Ditambahkan");
    }

    public function edit($id_ow) {
        $objek = Objek_Wisata::find($id_ow);

        $id_fasilitas = (explode(",",$objek->id_fasilitas));
        $fasilitas_objek = Fasilitas::where(function($query) use($id_fasilitas) { 
            foreach($id_fasilitas as $id){
                $query->orWhere('id_fasilitas', $id);
            }
        })->get();

        $kecamatan = Kecamatan::all();
        $fasilitas = Fasilitas::all();
        return view('pages.objek-wisata.edit', \compact('objek', 'kecamatan', 'fasilitas', 'fasilitas_objek'));
    }

    public function update(Request $request, $id_ow) {
        $this->validate($request, [
            'id_ow' => 'required',
            'nama' => 'required', 
            'alamat' => 'required', 
            'id_kecamatan' => 'required', 
            'id_fasilitas' => 'required', 
            'gambar' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $objek = Objek_Wisata::find($id_ow);
        $objek->id_ow = $request->id_ow;
        $objek->nama = $request->nama;
        $objek->alamat = $request->alamat;
        $objek->id_kecamatan = $request->id_kecamatan;
        $objek->id_fasilitas = \implode(',', $request->id_fasilitas);

        if($request->hasfile('gambar')) {
            File::delete('objek_gambar/'.$objek->gambar);
            $gambar = $request->file('gambar');
            $nama_gambar = uniqid()."_".$gambar->getClientOriginalName();
            $simpan_gambar = 'objek_gambar';
            $gambar->move($simpan_gambar, $nama_gambar);
            $objek->gambar = $nama_gambar;
        }

        $objek->save();
        return \redirect('/ow')->with("Success", "Data Objek Wisata Berhasil Diubah");
    }

    public function hapus($id_ow) {
        // hapus file
        $objek = Objek_Wisata::where('id_ow', $id_ow)->first();
        File::delete('objek_gambar/'.$objek->gambar);

        // hapus data
        $objek = Objek_Wisata::find($id_ow);
        $objek->delete();
        return \redirect ('/ow')->with("Success", "Data Objek Wisata Berhasil Dihapus");
    }

    public function export() {
        $objek_wisata = Objek_Wisata::join('tb_kecamatan', 'tb_objek.id_kecamatan', '=', 'tb_kecamatan.id_kecamatan')
        ->select('tb_objek.*', 'tb_kecamatan.nama as kecamatan')
        ->get();

        $pdf = PDF::loadview('pages.objek-wisata.laporan-objek_pdf', compact('objek_wisata'));
        return $pdf->download('laporan-objek.pdf');
    }

      public function export_objek($id_ow) {
        $detail = Objek_Wisata::find($id_ow);
        $id_fasilitas = (explode(",",$detail->id_fasilitas));
        $fasilitas = Fasilitas::where(function($query) use($id_fasilitas) { 
            foreach($id_fasilitas as $id){
                $query->orWhere('id_fasilitas', $id);
            }
        })->get();

        $pdf = PDF::loadview('pages.objek-wisata.objek-wisata_pdf', \compact('detail', 'fasilitas'));
        return $pdf->download('laporan-detail-objek.pdf');
    }


}
