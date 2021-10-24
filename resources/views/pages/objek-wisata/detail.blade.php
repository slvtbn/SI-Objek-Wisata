@extends('master')
@section('title', 'Detail Data Objek Wisata')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="row">
          <div class="col-md-8">
            <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-map-pin"></i> </span>
              <div class="info-box-content">
                <h4 class="text-bold">Objek Wisata</h4>
                <h5>Detail Objek Wisata</h5>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
        <div class="box">
            <div class="box-header">
              <a href="/ow/edit/{{$detail->id_ow}}" class="btn btn-primary"><i class="fa fa-edit" style="padding-right: 5px;"></i>Edit</a>
              <a href="/ow/hapus/{{$detail->id_ow}}" class="btn btn-danger"><i class="fa fa-trash" style="padding-right: 5px;"></i>Hapus</a>
              <a href="/ow/export_objek/{{$detail->id_ow}}" class="btn bg-navy"><i class="fa fa-download" style="padding-right: 5px;"></i>Report Data PDF</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped">
                  <tbody>
                      <tr>
                        <th width="20%">Id</th>
                        <td>{{$detail->id_ow}}</td>
                      </tr>
                      <tr>
                        <th>Nama</th>
                        <td>{{$detail->nama}}</td>
                      </tr>
                      <tr>
                        <th>Alamat</th>
                        <td>{{$detail->alamat}}</td>
                      </tr>
                      <tr>
                        <th>Kecamatan</th>
                        <td>{{$detail->kecamatan->nama}}</td>
                      </tr>
                      <tr>
                        <th>Fasilitas</th>
                        <td>
                        @foreach($fasilitas as $f)
                          <img src="{{ asset('gambar_icon/'.$f->icon)}}" alt="" width="50" style="padding-right:10px ">  
                          {{$f->keterangan}} <br>
                        @endforeach
                        </td>
                      </tr>
                      <tr>
                        <th>Foto</th>
                        <td><img src="{{asset('objek_gambar/'.$detail->gambar)}}" alt="" width="50%"></td>
                      </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection