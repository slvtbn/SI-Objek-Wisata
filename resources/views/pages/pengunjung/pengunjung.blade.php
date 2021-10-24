@extends('master')
@section('title', 'Data Pengunjung')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-md-8">
          <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-child"></i></span>
            <div class="info-box-content">
              <h4 class="text-bold">Pengunjung</h4>
              <h5>Data Pengunjung</h5>
            </div>
          </div>
        </div>
      </div>
      <ol class="breadcrumb">
        <li><a href="#">Data Pengunjung</a></li>
        <li class="active">Data Pengunjung</li>
      </ol>
    </section>
    <section class="content">
        <div class="box">
          <div class="box-header">
              <a href="/pengunjung/tambah" class="btn btn-warning"><i class="fa fa-plus" style="padding-right: 5px;"></i>Tambah Data</a>
              <a href="/pengunjung/export" class="btn bg-navy"><i class="fa fa-download" style="padding-right: 5px;"></i>Report Data PDF</a>
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
                          <th>Objek Wisata</th>
                          <th>Tanggal</th>
                          <th width="15%">Jumlah Pengunjung</th>
                          <th width="15%" class="text-center">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php
                      $no = 1;
                      @endphp
                      @foreach($pengunjung as $p)
                      <tr>
                          <td>{{$no++}}</td>
                          <td>{{$p->id_pengunjung}}</td>
                          <td>{{$p->objek}}</td>
                          <td>{{\Carbon\Carbon::parse($p->tanggal)->isoFormat('D MMMM Y')}}</td>
                          <td>{{$p->jlh_pengunjung}}</td>
                          <td class="text-center">
                              <a href="/pengunjung/edit/{{$p->id_pengunjung}}" class="text-primary text-bold"><i class="fa fa-edit" style="padding-right: 5px;"></i>Edit</a>
                              |
                              <a href="/pengunjung/hapus/{{$p->id_pengunjung}}" class="text-red text-bold"><i class="fa fa-trash" style="padding-right: 5px;"></i>Hapus</a>
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