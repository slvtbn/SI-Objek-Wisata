<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use App\Models\Objek_Wisata;
use PDF;

class PemasukkanController extends Controller
{
    public function tampil() {
       $pemasukan = Pemasukan::join('tb_objek', 'tb_pemasukan.id_ow', '=', 'tb_objek.id_ow')
                      ->select('tb_pemasukan.*', 'tb_objek.nama as objek')
                      ->get();
        return \view('pages.pemasukan.pemasukan', ['pemasukan' => $pemasukan]);
    }

    public function tambah() {
        $pemasukan = Pemasukan::all();
        $objek = Objek_Wisata::all();
        return view('pages.pemasukan.tambah', ['pemasukan'=>$pemasukan, 'objek'=>$objek]);
    }

    public function upload(Request $request) {
        $this->validate($request, [
            'id_pemasukan' => 'required',
            'id_ow' => 'required',
            'tanggal' => 'required',
            'jlh_pemasukan' => 'required'
        ]);

        echo $request->jlh_pemasukan;

        Pemasukan::create([
            'id_pemasukan' => $request->id_pemasukan,
            'id_ow' => $request->id_ow,
            'tanggal' => $request->tanggal,
            'jlh_pemasukan' => $request->jlh_pemasukan
        ]);

        return \redirect('/pemasukan')->with('Success', 'Data Pemasukan Berhasil Ditambahkan');
    }

    public function edit($id_pemasukan) {
        $pemasukan = Pemasukan::find($id_pemasukan);
        $objek = Objek_Wisata::all();
        return view('pages.pemasukan.edit', compact('pemasukan', 'objek'));
    }

    public function update(Request $request, $id_pemasukan) {
        $this->validate($request, [
            'id_pemasukan' => 'required',
            'id_ow' => 'required',
            'tanggal' => 'required',
            'jlh_pemasukan' => 'required'
        ]);

        $pemasukan = Pemasukan::find($id_pemasukan);
        $pemasukan->id_pemasukan = $request->id_pemasukan;
        $pemasukan->id_ow = $request->id_ow;
        $pemasukan->tanggal = $request->tanggal;
        $pemasukan->jlh_pemasukan = $request->jlh_pemasukan;

        $pemasukan->save();
        return \redirect('/pemasukan')->with('Success', 'Data Pemasukan Berhasil Diubah');
    }

    public function hapus($id_pemasukan) {
        $pemasukan = Pemasukan::find($id_pemasukan);
        $pemasukan->delete();
        return \redirect('/pemasukan')->with('Success', 'Data Pemasukan Berhasil Dihapus');
    }

    public function export() {
        $pemasukan = Pemasukan::join('tb_objek', 'tb_pemasukan.id_ow', "=", 'tb_objek.id_ow')
                              ->select('tb_pemasukan.*', 'tb_objek.nama as objek')
                              ->get();

        $pdf = PDF::loadview('pages.pemasukan.pemasukan_pdf', compact('pemasukan'));
        return $pdf->download('laporan-pemasukan.pdf');
    }
}
