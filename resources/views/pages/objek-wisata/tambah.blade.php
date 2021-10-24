@extends ('master')
@section('title', 'Tambah Data Objek Wisata')
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
                    <h5>Tambah Data Objek Wisata</h5>
                </div>
            </div>
        </div>
      </div>
        <ol class="breadcrumb">
            <li><a href="#">Data Objek Wisata</a></li>
            <li class="active">Data Objek Wisata</li>
        </ol>
    </section>
    <section class="content">
       <div class="box">
            <form role="form" action="{{url('/ow/upload')}}" method="post" enctype="multipart/form-data"> 
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
                        <label for="id_ow">Id</label>
                        <input type="text" class="form-control" id="id_ow" placeholder="Masukkan Id" name="id_ow" autocomplete="off">
                        @if($errors->has('id_ow'))
                        <span class="text-danger">
                            <strong>{{$errors->first('id_ow')}}</strong>
                        </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Objek Wisata" name="nama" autocomplete="off">
                        @if($errors->has('nama'))
                        <span class="text-danger">
                            <strong>{{$errors->first('nama')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat" name="alamat" autocomplete="off">
                        @if($errors->has('alamat'))
                        <span class="text-danger">
                            <strong>{{$errors->first('alamat')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select class="form-control" name="id_kecamatan" id="id_kecamatan">
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatan as $k)
                            <option value="{{$k->id_kecamatan}}">{{$k->nama}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                    <label>Fasilitas</label>
                    @foreach($fasilitas as $f)
                        <div class="checkbox">
                            <label>
                            <input type="checkbox" name="id_fasilitas[]" id="id_fasilitas" value="{{$f->id_fasilitas}}">
                            {{$f->keterangan}}
                            </label>
                        </div>
                    @endforeach
                    @if($errors->has('id_fasilitas'))
                    <span class="text-danger">
                        <strong>{{$errors->first('id_fasilitas')}}</strong>
                    </span>
                    @endif
                    </div>

                    <div class="form-group">
                        <label for="inputGambar">Masukkan Gambar</label>
                        <input type="file" id="inputGambar" name="gambar">
                        @if($errors->has('gambar')) 
                        <span class="text-danger">
                            <strong>{{$errors->first('gambar')}}</strong>
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