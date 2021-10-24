@extends('master')
@section('title', ' Data Objek Wisata')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-md-8">
          <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-map-pin"></i> </span>
            <div class="info-box-content">
              <h4 class="text-bold">Objek Wisata</h4>
              <h5> Data Objek Wisata</h5>
            </div>
          </div>
        </div>
      </div>
      <ol class="breadcrumb">
        <li><a href="#">Data Objek Wisata</a></li>
        <li class="active">Data Objek Wisata </li>
      </ol>
    </section>
    <section class="content">
        <div class="box">
          <div class="box-header">
              <a href="/ow/tambah" class="btn btn-warning"><i class="fa fa-plus" style="padding-right: 5px;"></i>Tambah Data</a>
              <a href="/ow/export" class="btn bg-navy"><i class="fa fa-download" style="padding-right: 5px;"></i>Report Data PDF</a>
          </div>
          <div class="box-body">
            @if($message = Session::get('Success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
		        <strong>{{ $message }}</strong>
            </div>
            @endif
              <table class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="5%">No</th>
                          <th>Id</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Kecamatan</th>
                          <th width="15%" class="text-center">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php
                      $no = 1;
                      @endphp
                      @foreach($objek_wisata as $ow)
                      <tr>
                          <td>{{$no++}}</td>
                          <td>{{$ow->id_ow}}</td>
                          <td>{{$ow->nama}}</td>
                          <td>{{$ow->alamat}}</td>
                          <td>{{$ow->kecamatan}}</td>
                          <td class="text-center">
                              <a href="/ow/detail/{{$ow->id_ow}}" class="text-primary text-bold"><i class="fa fa-info" style="padding: 5px;"></i>Detail</a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
        </div>
    </section>
</div>  
@endsection