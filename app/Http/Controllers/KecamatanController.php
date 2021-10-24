<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use PDF;

class KecamatanController extends Controller
{
    public function tampil() {
        $kecamatan = Kecamatan::all();
        return \view('pages.kecamatan.kecamatan', ['kecamatan'=>$kecamatan]);
    }

    public function tambah() {
        return \view('pages.kecamatan.tambah');
    }

    public function upload(Request $request) {
        $this->validate($request, [
            'id_kecamatan' => 'required',
            'nama' => 'required'
        ]);

        Kecamatan::create([
            'id_kecamatan' => $request->id_kecamatan,
            'nama' => $request->nama
        ]);
        
        return \redirect('/kecamatan')->with('Success', 'Data Kecamatan Berhasil Ditambahkan');
    }

    public function edit($id_kecamatan) {
        $kecamatan = Kecamatan::find($id_kecamatan);
        return \view('pages.kecamatan.edit',['kecamatan'=>$kecamatan]);
    }

    public function update($id_kecamatan, Request $request) {
        $this->validate($request, [
            'id_kecamatan' => 'required',
            'nama' => 'required'
        ]);

        $kecamatan = Kecamatan::find($id_kecamatan);
        $kecamatan->id_kecamatan = $request->id_kecamatan;
        $kecamatan->nama = $request->nama;
        $kecamatan->save();
        return \redirect('/kecamatan')->with("Success", "Data Kecamatan Berhasil Diubah");
    }

    public function hapus($id_kecamatan) {
        $kecamatan = Kecamatan::find($id_kecamatan);
        $kecamatan->delete();
        return \redirect('/kecamatan')->with("Success", "Data Kecamatan Berhasil Dihapus");
    }

    public function export() {
        $kecamatan = Kecamatan::all();
        $pdf = PDF::loadview('pages.kecamatan.kecamatan_pdf', ['kecamatan' => $kecamatan]);
        return $pdf->download('laporan-kecamatan.pdf');
    }
}
