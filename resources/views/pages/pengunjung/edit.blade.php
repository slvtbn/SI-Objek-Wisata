@extends('master')

@section('title', 'Edit Data Pengunjung')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="row">
        <div class="col-md-8">
          <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-child"></i></span>
            <div class="info-box-content">
              <h4 class="text-bold">Pengunjung</h4>
              <h5>Edit Data Pengunjung</h5>
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
             <form role="form" action="{{url('/pengunjung/update/'.$pengunjung->id_pengunjung)}}" method="post">
                {{csrf_field()}} 
                {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="id_pengunjung">Id</label>
                        <input type="text" class="form-control" id="id_pengunjung" placeholder="Masukkan Id" name="id_pengunjung" value="{{$pengunjung->id_pengunjung}}" autocomplete="off">
                        @if($errors->has('id_pengunjung'))
                        <span class="text-danger">
                            <strong>{{$errors->first('id_pengunjung')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Objek Wisata</label>
                        <select class="form-control" name="id_ow" id="id_ow">
                        <option value="">--- Pilih Objek Wisata ---</option>
                        @foreach($objek as $o)
                            <option value="{{$o->id_ow}}" 
                            @if($o->id_ow === $pengunjung->id_ow)
                              selected
                            @endif
                            >{{$o->nama}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{$pengunjung->tanggal}}" autocomplete="off">
                        @if($errors->has('tanggal'))
                        <span class="text-danger">
                            <strong>{{$errors->first('tanggal')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="jlh_pengunjung">Jumlah Pengunjung</label>
                        <input type="text" class="form-control" id="jlh_pengunjung" value="{{$pengunjung->jlh_pengunjung}}" name="jlh_pengunjung" autocomplete="off">
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