@extends('master')

@section('title', 'Data Pemasukkan')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-md-8">
          <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-credit-card"></i></span>
            <div class="info-box-content">
              <h4 class="text-bold">Pemasukan</h4>
              <h5>Data Pemasukan</h5>
            </div>
          </div>
        </div>
      </div>
      <ol class="breadcrumb">
        <li><a href="#">Data Pemasukkan</a></li>
        <li class="active">Data Pemasukkan</li>
      </ol>
    </section>
    <section class="content">
        <div class="box">
          <div class="box-header">
              <a href="/pemasukan/tambah" class="btn btn-warning"><i class="fa fa-plus" style="padding-right: 5px;"></i>Tambah Data</a>
              <a href="/pemasukan/export" class="btn bg-navy"><i class="fa fa-download" style="padding-right: 5px;"></i>Report Data PDF</a>
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
                          <th width="15%">Jumlah Pemasukan</th>
                          <th width="15%" class="text-center">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php
                      $no = 1;
                      @endphp
                      @foreach($pemasukan as $p)
                      <tr>
                          <td>{{$no++}}</td>
                          <td>{{$p->id_pemasukan}}</td>
                          <td>{{$p->objek}}</td>
                          <td>{{\Carbon\Carbon::parse($p->tanggal)->isoFormat('D MMMM Y')}}</td>
                          <td>{{$p->jlh_pemasukan}}</td>
                          <td class="text-center">
                              <a href="/pemasukan/edit/{{$p->id_pemasukan}}" class="text-primary text-bold"><i class="fa fa-edit" style="padding-right: 5px;"></i>Edit</a>
                              |
                              <a href="/pemasukan/hapus/{{$p->id_pemasukan}}" class="text-red text-bold"><i class="fa fa-trash" style="padding-right: 5px;"></i>Hapus</a>
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