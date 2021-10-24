@extends ('master')

@section('title', 'Tambah Data Pemasukan')
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
              <h5>Tambah Data Pemasukan</h5>
            </div>
          </div>
        </div>
      </div>
        <ol class="breadcrumb">
            <li><a href="#">Data Pemasukan</a></li>
            <li class="active">Data Pemasukan</li>
        </ol>
    </section>
    <section class="content">
       <div class="box">
            <form role="form" action="{{url('/pemasukan/upload')}}" method="post"> 
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
                        <label for="id_pemasukan">Id</label>
                        <input type="text" class="form-control" id="id_pemasukan" placeholder="Masukkan Id" name="id_pemasukan" autocomplete="off">
                        @if($errors->has('id_pemasukan'))
                        <span class="text-danger">
                            <strong>{{$errors->first('id_pemasukan')}}</strong>
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
                        <label for="jlh_pemasukan">Jumlah Pemasukan</label>
                        <input type="text" class="form-control" id="jlh_pemasukan" name="jlh_pemasukan" placeholder="Masukkan Jumlah pemasukan" autocomplete="off">
                        @if($errors->has('jlh_pemasukan'))
                        <span class="text-danger">
                            <strong>{{$errors->first('jlh_pemasukan')}}</strong>
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