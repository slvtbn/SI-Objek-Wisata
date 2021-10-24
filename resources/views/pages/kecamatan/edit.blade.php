@extends('master')

@section('title', 'Edit Data Kecamatan')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
       <div class="row">
        <div class="col-md-8">
          <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa  fa-map-o"></i></span>
            <div class="info-box-content">
              <h4 class="text-bold">Kecamatan</h4>
              <h5>Edit Data Kecamatan</h5>
            </div>
          </div>
        </div>
      </div>
        <ol class="breadcrumb">
            <li><a href="#">Data Kecamatan</a></li>
            <li class="active">Data Kecamatan</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <form role="form" action="{{url('/kecamatan/update/'.$kecamatan->id_kecamatan)}}" method="post">
                {{csrf_field()}} 
                {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="id_kecamatan">Id</label>
                        <input type="text" class="form-control" id="id_kecamatan" placeholder="Masukkan Id" name="id_kecamatan" value="{{$kecamatan->id_kecamatan}}" autocomplete="off">
                        @if($errors->has('id_kecamatan'))
                        <span class="text-danger">
                            <strong>{{$errors->first('id_kecamatan')}}</strong>
                        </span>
                    @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="nama" class="form-control" id="nama" placeholder="Masukkan Nama Kecamatan" name="nama" value="{{$kecamatan->nama}}" autocomplete="off">
                        @if($errors->has('nama'))
                        <span class="text-danger">
                            <strong>{{$errors->first('nama')}}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="box-footer">
                    <input type="submit" class="btn btn-warning" value="Simpan">
                </div>
            </form>
        </div>
    </section>
</div>
@endsection