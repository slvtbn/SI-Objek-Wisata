<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use File;
use PDF;

class FasilitasController extends Controller
{
    public function tampil() {
        $fasilitas = Fasilitas::get();
        return \view('pages.fasilitas.fasilitas', ['fasilitas' => $fasilitas]);
    }

    public function tambah() {
        return \view('pages.fasilitas.tambah'); 
    }

    public function upload(Request $request) {
        $this->validate($request, [
            'id_fasilitas' => 'required',
            'keterangan' => 'required',
            'icon' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $icon = $request->file('icon');
        $nama_icon = time()."_".$icon->getClientOriginalName();

        $simpan_icon = 'gambar_icon';
        $icon->move($simpan_icon, $nama_icon);

        Fasilitas::create([
            'id_fasilitas' => $request->id_fasilitas,
            'keterangan' => $request->keterangan,
            'icon' => $nama_icon
        ]);

        return \redirect('/fasilitas')->with("Success", "Data Fasilitas Berhasil Ditambahkan");
                                     
    }

    public function edit($id_fasilitas) {
        $fasilitas = Fasilitas::find($id_fasilitas);
        return \view('pages.fasilitas.edit',['fasilitas'=>$fasilitas]);
    }

    public function update($id_fasilitas, Request $request) {
        $this->validate($request, [
            'id_fasilitas' => 'required',
            'icon' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'required'
        ]);

        $fasilitas = Fasilitas::find($id_fasilitas);
        $fasilitas->id_fasilitas = $request->id_fasilitas;
        $fasilitas->keterangan = $request->keterangan;

        if($request->hasfile('icon')) {
            File::delete('gambar_icon/'.$fasilitas->icon);
            $icon = $request->file('icon');
            $nama_icon = time()."_".$icon->getClientOriginalName();
            $simpan_icon = 'gambar_icon';
            $icon->move($simpan_icon, $nama_icon);
            $fasilitas->icon = $nama_icon;
        }

        $fasilitas->save();
        return \redirect('/fasilitas')->with("Success", "Data Fasilitas Berhasil Diubah");
    }

    public function hapus($id_fasilitas) {
        // hapus file
        $fasilitas = Fasilitas::where('id_fasilitas', $id_fasilitas)->first();
        File::delete('gambar_icon/'.$fasilitas->icon);

        // hapus data
        Fasilitas::where('id_fasilitas', $id_fasilitas)->delete();
        return \redirect('/fasilitas')->with("Success", "Data Fasilitas Berhasi Dihapus");
    }

    public function export() {
        $fasilitas = Fasilitas::all();

        // return view('pages.kecamatan.kecamatan_pdf', ['kecamatan' => $kecamatan]);
        $pdf = PDF::loadview('pages.fasilitas.fasilitas_pdf', ['fasilitas' => $fasilitas]);
        return $pdf->download('laporan-fasilitas.pdf');
    }
}
