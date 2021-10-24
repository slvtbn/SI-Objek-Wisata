@extends('master')

@section('title', 'Data Fasilitas')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="row">
        <div class="col-md-8">
          <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa  fa-coffee"></i></span>
            <div class="info-box-content">
              <h4 class="text-bold">Fasilitas</h4>
              <h5>Data Fasilitas</h5>
            </div>
          </div>
        </div>
      </div>
      <ol class="breadcrumb">
        <li><a href="#">Data Fasilitas</a></li>
        <li class="active">Data Fasilitas</li>
      </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <a href="/fasilitas/tambah" class="btn btn-warning"><i class="fa fa-plus" style="padding-right: 5px;"></i>Tambah Data</a>
                <a href="/fasilitas/export" class="btn bg-navy"><i class="fa fa-download" style="padding-right: 5px;"></i>Report Data PDF</a>
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
                            <th>Icon</th>
                            <th>Keterangan</th>
                            <th width="15%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($fasilitas as $f)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$f->id_fasilitas}}</td>
                            <td><img src="{{url('/gambar_icon/'.$f->icon)}}" width="40px"></td>
                            <td>{{$f->keterangan}}</td>   
                            <td class="text-center">
                                <a href="/fasilitas/edit/{{$f->id_fasilitas}}" class="text-primary text-bold"><i class="fa fa-edit" style="padding-right: 5px;"></i>Edit</a>
                                |
                                <a href="/fasilitas/hapus/{{$f->id_fasilitas}}" class="text-red text-bold"><i class="fa fa-trash" style="padding-right: 5px;"></i>Hapus</a>
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

