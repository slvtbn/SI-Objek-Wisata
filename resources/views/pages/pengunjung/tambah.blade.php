@extends ('master')

@section('title', 'Tambah Data Pengunjung')
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
              <h5>Tambah Data Pengunjung</h5>
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
            <form role="form" action="{{url('/pengunjung/upload')}}" method="post"> 
                {{csrf_field()}} 
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    {{$error}} <br>
                    @endforeach
                </div>
                @endif
                <div class="box-body">
                    <div class="form-group">
                        <label for="id_pengunjung">Id</label>
                        <input type="text" class="form-control" id="id_pengunjung" placeholder="Masukkan Id" name="id_pengunjung" autocomplete="off">
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
                            <option value="{{$o->id_ow}}">{{$o->nama}}</option>
                        @endforeach
                        </select>
                        <span class="text-danger">
                            <strong>{{$errors->first('id_ow')}}</strong>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal" autocomplete="off">
                        @if($errors->has('tanggal'))
                        <span class="text-danger">
                            <strong>{{$errors->first('tanggal')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="jlh_pengunjung">Jumlah Pengunjung</label>
                        <input type="text" class="form-control" id="jlh_pengunjung" name="jlh_pengunjung" placeholder="Masukkan Jumlah Pengunjung" autocomplete="off">
                        @if($errors->has('jlh_pengunjung'))
                        <span class="text-danger">
                            <strong>{{$errors->first('jlh_pengunjung')}}</strong>
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