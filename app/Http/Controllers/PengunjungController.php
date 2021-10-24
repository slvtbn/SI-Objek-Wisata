<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;
use App\Models\Objek_Wisata;
use PDF;

class PengunjungController extends Controller
{
    public function tampil() {
        $pengunjung = Pengunjung::join('tb_objek', 'tb_pengunjung.id_ow', '=', 'tb_objek.id_ow')
                      ->select('tb_pengunjung.*', 'tb_objek.nama as objek')
                      ->get();
        return \view('pages.pengunjung.pengunjung', ['pengunjung' => $pengunjung]);
    }

    public function tambah() {
        $objek = Objek_Wisata::all();
        return \view('pages.pengunjung.tambah', ['objek' => $objek]);
    }

    public function upload(Request $request) {
        $this->validate($request, [
            'id_pengunjung' => 'required',
            'id_ow' => 'required',
            'tanggal' => 'required',
            'jlh_pengunjung' => 'required'
        ]); 

        Pengunjung::create([
            'id_pengunjung' => $request->id_pengunjung,
            'id_ow' => $request->id_ow,
            'tanggal' => $request->tanggal,
            'jlh_pengunjung' => $request->jlh_pengunjung
        ]);

        return \redirect('/pengunjung')->with('Success', 'Data Pengunjung Berhasil Ditambahkan');
    }

    public function edit($id_pengunjung) {
        $pengunjung = Pengunjung::find($id_pengunjung);
        $objek = Objek_Wisata::all();
        return \view('pages.pengunjung.edit', \compact('pengunjung', 'objek'));
    }

    public function update(Request $request, $id_pengunjung) {
        $this->validate($request, [
            'id_pengunjung' => 'required',
            'id_ow' => 'required', 
            'tanggal' => 'required', 
            'jlh_pengunjung' => 'required'
        ]);

        $pengunjung = Pengunjung::find($id_pengunjung);
        $pengunjung->id_pengunjung = $request->id_pengunjung;
        $pengunjung->id_ow = $request->id_ow;
        $pengunjung->tanggal = $request->tanggal;
        $pengunjung->jlh_pengunjung = $request->jlh_pengunjung;

        $pengunjung->save();
        return \redirect ('/pengunjung')->with('Success', 'Data Pengunjung Berhasil Diubah');
    }

    public function hapus($id_pengunjung) {
        $pengunjung = Pengunjung::find($id_pengunjung);
        $pengunjung->delete();
        return \redirect('/pengunjung')->with('Success', 'Data Pengunjung Berhasil Dihapus');
    }

    public function export() {
        $pengunjung = Pengunjung::join('tb_objek', 'tb_pengunjung.id_ow', "=", 'tb_objek.id_ow')
                                ->select('tb_pengunjung.*', 'tb_objek.nama as objek')
                                ->get();
        
        $pdf = PDF::loadview('pages.pengunjung.pengunjung_pdf', compact('pengunjung'));
        return $pdf->download('laporan-pengunjung.pdf');
    }
}
